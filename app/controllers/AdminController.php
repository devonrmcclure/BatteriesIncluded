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

		$pass1 = $data['pass1'];
		$pass2 = $data['pass2'];

		if($pass1 === $pass2 && $pass1 != '' && $pass2 != '')
		{
			$user->password = Hash::make($pass1);
			$user->last_password_change = Carbon::now();
			$user->updated_at = Carbon::now();
			$user->save();

			return Redirect::to($_ENV['URL'] . '/admin')
					->with('alert-class', 'alert-success')
					->with('flash-message', 'Password for <b>' . $user->username . '</b> has been updated!');
		} else {
			return Redirect::to($_ENV['URL'] . '/admin/password')
					->with('alert-class', 'alert-danger')
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


}
