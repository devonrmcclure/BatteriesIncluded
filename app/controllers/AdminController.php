<?php

class AdminController extends \BaseController {

	/**
	 * Apply a beforeFilter of auth to check if a user is logged in, except on showLogin and postLogin.
	 */
	public function __construct()
	{
		$this->beforeFilter('auth', array('except' => array('showLogin', 'postLogin')));
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
			return Redirect::to($_ENV['URL'] . '/admin');
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
	 * Log the user out.
	 *
	 * @return [Redirect] [to index]
	 */
	public function destroy()
	{
		Auth::logout();

		return Redirect::to($_ENV['URL']);
	}


}
