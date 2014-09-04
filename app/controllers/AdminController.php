<?php

class AdminController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth', array('except' => array('showLogin', 'postLogin')));
	}

	/**
	 * Show index for the Admin page if logged in.
	 * @return [type] [description]
	 */
	public function showIndex()
	{
		$products = Product::all();

		return View::make('admin.index')->with('products', $products);
	}

	public function showLogin()
	{
		// View make login page.
		if(Auth::guest())
		{
			return View::make('admin.login');
		} else {
			return Redirect::to($_ENV['URL'] . '/admin');
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
				return Redirect::to($_ENV['URL'] . '/admin');
			} else {
				return Redirect::to($_ENV['URL'] . '/admin/login')
					->with('alert-class', 'alert-danger')
					->with('flash-message', 'The username and password combination does not exist!');
			}
		} else {
			return Redirect::to($_ENV['URL']);
		}
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

		return Redirect::to($_ENV['URL'] . '/');
	}


}
