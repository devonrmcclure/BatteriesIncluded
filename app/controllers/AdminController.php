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
			if(Auth::attempt(array('username' => $username, 'password' => 'root')))
			{
				//Auth::login(Auth::user());
				return Redirect::to('http://batteriesincluded.dev/admin');
			} else {
				return Redirect::to('http://batteriesincluded.dev/admin/login')
					->with('alert-class', 'alert-danger')
					->with('flash-message', 'The username and password combination does not exist!');
			}
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
			if($type)
			{
				switch($type)
				{
					case 'product':
						// Show Catalog add form.
						return View::make('admin.add.product');
						break;
					case 'category':
						return View::make('admin.add.category');
						break;
					case 'subcategory':
						return $type . ' added';
						break;
					default:
						return '404';
				}
			} else {
				return 'add index added';
			}
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
						echo $data['product_name'];
						return $type . ' added';
						break;
					case 'category':
						$category = new Category;
						$category->category_name = $data['category-name'];
						$category->created_at = new DateTime();
						$category->updated_at = new DateTime();
						$category->save();
						return Redirect::to('http://batteriesincluded.dev/admin/add/category')
										->with('flash-message', 'Category ' . $data['category-name'] . ' has been successfully added!')
										->with('alert-class', 'alert-success');
						break;
					case 'subcategory':
						return $type . ' added';
						break;
					default:
						return '404';
				}
			} else {
				return 'add index added';
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
