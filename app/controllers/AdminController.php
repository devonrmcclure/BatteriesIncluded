<?php

class AdminController extends \BaseController {

	/**
	 * Apply a beforeFilter of auth to check if a user is logged in, except on showLogin and postLogin.
	 */
	public function __construct()
	{
		$this->beforeFilter('auth', array('except' => array('showLogin', 'postLogin')));
		$this->beforeFilter('pass_expired', array('except' => array('showLogin', 'postLogin', 'getUpdatePassword', 'putUpdatePassword')));
	}

	/**
	 * Show index for the Admin page if logged in.
	 * @return [View] [views/admin/index/]
	 */
	public function showIndex()
	{
		return View::make('admin.index');
	}

	/**
	 * Show the login form if the user is not logged in. Otherwise redirect to admin main page.
	 * @return [View/Redirect] [loginform/admin page]
	 */
	public function showLogin()
	{
		// View make login page.
		if(Auth::guest())
		{
			return View::make('admin.login');
		} else {
			return Redirect::to('/admin');
		}

	}

	/**
	 * Process the log in form and return back to the login page if there's an error.
	 * @return [Redirect] [redirect to the correct page]
	 */
	public function postLogin()
	{
		if(Auth::guest())
		{
			$username = Input::get('username');
			$password = Input::get('password');
			// Get login info then attempt to login.
			if(Auth::attempt(array('username' => $username, 'password' => $password)))
			{
				return Redirect::to('/admin');
			} else {
				return Redirect::to('/admin/login')
					->with('alert-class', 'error')
					->with('flash-message', 'The username and password combination does not exist!');
			}
		} else {
			return Redirect::to($_ENV['URL']);
		}
	}

	/**
	 * Update the user's password. Upon first login, force change of password. After every 3 months (90 days) required password change again.
	 * @return [View] [make the view for changing password]
	 */
	public function getUpdatePassword()
	{
		return View::make('admin.edit.password');
	}

	/**
	 * Update the user's password. Upon first login, force change of password. After every 3 months (90 days) required password change again.
	 * @return [Redirect] [redirect to correct page after checking update]
	 */
	public function putUpdatePassword()
	{
		$user = Auth::user();
		$data = Input::all();

		$currentPass = $data['currentPass'];
		$userPass = Auth::user()->password;
		$pass1 = $data['pass1'];
		$pass2 = $data['pass2'];

		if($pass1 === $pass2 && $pass1 != '' && $pass2 != '' && Hash::check($currentPass, Auth::user()->password))
		{
			$user->password = Hash::make($pass1);
			$user->last_password_change = Carbon::now();
			$user->updated_at = Carbon::now();
			$user->save();

			return Redirect::to($_ENV['URL'] . '/admin')
					->with('alert-class', 'success')
					->with('flash-message', 'Password for <b>' . $user->username . '</b> has been updated!');
		} else {
			return Redirect::to($_ENV['URL'] . '/admin/settings/password')
					->with('alert-class', 'error')
					->with('flash-message', 'The passwords did not match!');
		}
	}

	/**
	 * Log the user out.
	 *
	 * @return [Redirect] [to index]
	 */
	public function destroy()
	{
		Auth::logout();

		return Redirect::to($_ENV['URL']);
	}

	public function addIndex() {
		return View::make('admin.add.index');
	}

	public function addFAQ() {
		return View::make('admin.add.faqs');
	}

	public function postFAQ() {
		// > Get information
		// > Check for completeness
		// > Post to DB
		// > Redirect to add FAQ page with success or error message.
		$data = Input::all();
		if($data['faq-question'] == '' || $data['faq-answer'] == '')
		{
		    return Redirect::to($_ENV['URL'] . '/admin/add/faq')
		    				->with('alert-class', 'error')
		                    ->with('flash-message', 'Please fill out all fields to add a FAQ!');

		} else {
		    $FAQ = new FAQ;
		    $FAQ->question = $data['faq-question'];
		    $FAQ->answer = $data['faq-answer'];
		    $FAQ->priority = $data['priority'];
		    $FAQ->created_at = Carbon::now();
		    $FAQ->updated_at = Carbon::now();
		    $FAQ->save();
		    return Redirect::to('/admin/add/faq')
		    	->with('alert-class', 'success')
		    	->with('flash-message', 'FAQ Successfully created!');
		}
	}

	public function productIndex() {
		$products = new ProductsController;
		$products = $products->getProducts();

		return View::make('admin.manage.products')
				->with('products', $products);
	}

	public function productAdd() {
		$categories = Category::orderBy('category_name', 'ASC')->get();
		return View::make('admin.add.product')
				->with('categories', $categories);
	}

	public function productEdit($id) {

		$product    = new ProductsController;
		$product    = $product->getProductByID($id);
		$categories = Category::orderBy('category_name', 'ASC')->get();

		return View::make('admin.edit.product')
				->with('product', $product)
				->with('categories', $categories);
	}

	public function postProduct() {

		$data = Input::all();

		if($data['productcategory-id'] != 'selectproductcategory' && $data['product-brand'] != '' && $data['product-name'] != '') {
			//Check if product is already created.
			if(Product::whereproduct_name($data['product-name'])->first()) {
				return Redirect::to($_ENV['URL'] . '/admin/products/add')
								->with('alert-class', 'error')
				                ->with('flash-message', 'Product already exists!')
				               	->withInput();
			}

			//Check if a file is being uploaded
			if($file = Input::file('image'))
			{
			    $destinationPath = 'img/catalog/';
			    $filename = $file->getClientOriginalName();
			    $uploadSuccess = Input::file('image')->move($destinationPath, $filename);
			} else {
			    $filename = 'no_image.png';
			}

			if(isset($data['featured']))
			{
			    $featured = Carbon::now();
			} else {
				$featured = '0000-00-00 00:00:00';
			}


			//Upload the Product.
			$product = new Product;
			$product->category_id = $data['productcategory-id'];
			$product->product_name = $data['product-name'];
			$product->product_description = $data['product-description'];
			$product->brand = $data['product-brand'];
			$product->quantity = $data['product-quantity'];
			$product->price = $data['product-price'];
			$product->image = $filename;
			$product->featured = $featured;
			$product->created_at = Carbon::now();
			$product->updated_at = Carbon::now();
			$product->save();

			return Redirect::to($_ENV['URL'] . '/admin/products')
							->with('alert-class', 'success')
			                ->with('flash-message', 'Product <b>' . $data['product-name'] . '</b> has been successfully added!');


		} elseif($data['product-name'] == '') {
			return Redirect::to($_ENV['URL'] . '/admin/products/add')
							->with('alert-class', 'error')
			                ->with('flash-message', 'Please enter a product name!')
			               	->withInput();
		} elseif($data['productcategory-id'] == 'selectproductcategory') {
			return Redirect::to($_ENV['URL'] . '/admin/products/add')
							->with('alert-class', 'error')
			                ->with('flash-message', 'Please enter a category!')
			               	->withInput();
		} elseif($data['product-brand'] == '') {
			return Redirect::to($_ENV['URL'] . '/admin/products/add')
							->with('alert-class', 'error')
			                ->with('flash-message', 'Please enter a brand!')
			               	->withInput();

		} else {
			return Redirect::to($_ENV['URL'] . '/admin/products/add')
							->with('alert-class', 'error')
			                ->with('flash-message', 'Unknown error!')
			               	->withInput();
		}
	}

	public function manageIndex() {
		return View::make('admin.manage.index');
	}

	public function settingsIndex() {
		return View::make('admin.settings.index');
	}
}
