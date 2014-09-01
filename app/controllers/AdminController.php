<?php

class AdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function showIndex()
	{
		// View make Admin dashboard
		//
		//
		if(Auth::guest())
		{
			return Redirect::to('http://batteriesincluded.dev/admin/login');
		} else
		{
			$products = Product::all();

			return View::make('admin.index')->with('products', $products);
		}
	}

	public function showLogin()
	{
		// View make login page.
		if(Auth::guest())
		{
			return View::make('admin.login');
		} else
		{
			return Redirect::to('http://batteriesincluded.dev/admin');
		}



	}

	public function postLogin()
	{
		if(Auth::guest())
		{
			$username = Input::get('username');
			$password = Input::get('password');
			// Get login info then attempt to login.
			if(Auth::attempt(array('username' => $username, 'password' => $password)))
			{
				//Auth::login(Auth::user());
				return Redirect::to('http://batteriesincluded.dev/admin');
			} else {
				return Redirect::to('http://batteriesincluded.dev/admin/login')
					->with('alert-class', 'alert-danger')
					->with('flash-message', 'The username and password combination does not exist!');
			}
		} else {
			return 'what?';
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate($type = NULL)
	{
		if(Auth::guest())
		{
			return Redirect::to('http://batteriesincluded.dev/admin/login');
		} else {
			$categories    = Category::orderBy('category_name', 'ASC')->get();;
			$subCategories = Subcategory::orderBy('subcategory_name', 'ASC')->get();;
			return View::make('admin.add.catalog')
						->with('categories', $categories)
						->with('subCategories', $subCategories);
		}
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($type = NULL)
	{
		if(Auth::guest())
		{
			return Redirect::to('http://batteriesincluded.dev/admin/login');
		} else {
			if($type)
			{
				$data = Input::all();
				switch($type)
				{
					case 'product':
						// TOTO: Added catalog item to catalog.
						if($data['productsubcategory-name'] != 'selectproductsubcategory')
						{
							$productExists = Product::whereproduct_name($data['product-name'])->first();
							$productEmpty  = $data['product-name'];
							$categoryID = Subcategory::find($data['productsubcategory-name']);
							if($productExists || $productEmpty == '')
							{
								return Redirect::to('http://batteriesincluded.dev/admin/add/')
												->with('flash-message', 'Product already exists or left empty so not added!')
												->with('alert-class', 'alert-danger')
												->withInput();
							} else {
								// TODO: Auto set parent category based on sub category. (Take out category choosing and ony have subcategory option)
								$product = new Product;
								$product->category_id = $categoryID->parent_category;
								$product->subcategory_id = $data['productsubcategory-name'];
								$product->product_name = $data['product-name'];
								$product->product_description = $data['product-description'];
								$product->price = $data['product-price'];
								$product->image = '';
								$product->created_at = new DateTime();
								$product->updated_at = new DateTime();
								$product->save();
								return Redirect::to('http://batteriesincluded.dev/admin/add/')
												->with('flash-message', 'Product <b>' . $data['product-name'] . '</b> has been successfully added!')
												->with('alert-class', 'alert-success');
								break;
							}
						} else {
							return Redirect::to('http://batteriesincluded.dev/admin/add/')
											->with('flash-message', 'Please select a subcategory!')
											->with('alert-class', 'alert-danger')
											->withInput();
						}
						break;
					case 'category':
						$categoryExists = Category::wherecategory_name($data['category-name'])->first();
						$categoryEmpty  = $data['category-name'];
						if($categoryExists || $categoryEmpty == '')
						{
							return Redirect::to('http://batteriesincluded.dev/admin/add/')
											->with('flash-message', 'Category already exists or left empty so not added!')
											->with('alert-class', 'alert-danger');
						} else {
							$category = new Category;
							$category->category_name = $data['category-name'];
							$category->created_at = new DateTime();
							$category->updated_at = new DateTime();
							$category->save();
							return Redirect::to('http://batteriesincluded.dev/admin/add/')
											->with('flash-message', 'Category <b>' . $data['category-name'] . '</b> has been successfully added!')
											->with('alert-class', 'alert-success');
							break;
						}
					case 'subcategory':

						if($data['parentcategory-name'] != 'selectparentcategory')
						{
							$subcategoryExists = Subcategory::wheresubcategory_name($data['subcategory-name'])->first();
							$subCategoryEmpty  = $data['subcategory-name'];
							if($subcategoryExists || $subCategoryEmpty == '')
							{
								return Redirect::to('http://batteriesincluded.dev/admin/add/')
												->with('flash-message', 'Subcategory already exists or left empty so not added!')
												->with('alert-class', 'alert-danger')
												->withInput();
							} else {
								$subCategory = new Subcategory;
								$subCategory->parent_category = $data['parentcategory-name'];
								$subCategory->subcategory_name = $data['subcategory-name'];
								$subCategory->created_at = new DateTime();
								$subCategory->updated_at = new DateTime();
								$subCategory->save();
								return Redirect::to('http://batteriesincluded.dev/admin/add/')
												->with('flash-message', 'Subcategory <b>' . $data['subcategory-name'] . '</b> has been successfully added!')
												->with('alert-class', 'alert-success');
								break;
							}
						} else {
							return Redirect::to('http://batteriesincluded.dev/admin/add/')
											->with('flash-message', 'Please select a parent category!')
											->with('alert-class', 'alert-danger')
											->withInput();
						}
					default:
						return '404';
				}
			} else {
				return 'add index';
			}
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

		return Redirect::to('http://batteriesincluded.dev/');
	}


}
