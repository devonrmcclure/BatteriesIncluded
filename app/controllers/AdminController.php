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
			if($type)
			{
				$categories = Category::all();
				$subCategories = Subcategory::all();
				switch($type)
				{
					case 'product':
						// Show Catalog add form.
						return View::make('admin.add.product')
									->with('categories', $categories)
									->with('subCategories', $subCategories);
						break;
					case 'category':
						return View::make('admin.add.category');
						break;
					case 'subcategory':
						$categories = Category::all();
						return View::make('admin.add.subcategory')
									->with('categories', $categories);
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
						if($data['parentcategory-name'] != 'selectparentcategory' && $data['subcategory-name'] != 'selectsubcategory')
						{
							$productExists = Product::whereproduct_name($data['product-name'])->first();
							if($productExists)
							{
								return Redirect::to('http://batteriesincluded.dev/admin/add/product')
												->with('flash-message', 'Product <b>' . $data['product-name'] . '</b> already exists so not added!')
												->with('alert-class', 'alert-danger');
							} else {
								$product = new Product;
								$product->category_id = $data['parentcategory-name'];
								$product->subcategory_id = $data['subcategory-name'];
								$product->product_name = $data['product-name'];
								$product->product_description = $data['product-description'];
								$product->price = $data['product-price'];
								$product->image = '';
								$product->created_at = new DateTime();
								$product->updated_at = new DateTime();
								$product->save();
								return Redirect::to('http://batteriesincluded.dev/admin/add/product')
												->with('flash-message', 'Product <b>' . $data['product-name'] . '</b> has been successfully added!')
												->with('alert-class', 'alert-success');
								break;
							}
						} else {
							return Redirect::to('http://batteriesincluded.dev/admin/add/product')
											->with('flash-message', 'Please select a category and subcategory!')
											->with('alert-class', 'alert-danger')
											->withInput();
						}
						break;
					case 'category':
						$categoryExists = Category::wherecategory_name($data['category-name'])->first();
						if($categoryExists)
						{
							return Redirect::to('http://batteriesincluded.dev/admin/add/category')
											->with('flash-message', 'Category <b>' . $data['category-name'] . '</b> already exists so not added!')
											->with('alert-class', 'alert-danger');
						} else {
							$category = new Category;
							$category->category_name = $data['category-name'];
							$category->created_at = new DateTime();
							$category->updated_at = new DateTime();
							$category->save();
							return Redirect::to('http://batteriesincluded.dev/admin/add/category')
											->with('flash-message', 'Category <b>' . $data['category-name'] . '</b> has been successfully added!')
											->with('alert-class', 'alert-success');
							break;
						}
					case 'subcategory':

						if($data['parentcategory-name'] != 'selectparentcategory')
						{
							$subcategoryExists = Subcategory::wheresubcategory_name($data['subcategory-name'])->first();
							if($subcategoryExists)
							{
								return Redirect::to('http://batteriesincluded.dev/admin/add/subcategory')
												->with('flash-message', 'Subcategory <b>' . $data['subcategory-name'] . '</b> already exists so not added!')
												->with('alert-class', 'alert-danger');
							} else {
								$subCategory = new Subcategory;
								$subCategory->parent_category = $data['parentcategory-name'];
								$subCategory->subcategory_name = $data['subcategory-name'];
								$subCategory->created_at = new DateTime();
								$subCategory->updated_at = new DateTime();
								$subCategory->save();
								return Redirect::to('http://batteriesincluded.dev/admin/add/subcategory')
												->with('flash-message', 'Subcategory <b>' . $data['subcategory-name'] . '</b> has been successfully added!')
												->with('alert-class', 'alert-success');
								break;
							}
						} else {
							return Redirect::to('http://batteriesincluded.dev/admin/add/subcategory')
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
