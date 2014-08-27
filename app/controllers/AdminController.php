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
			return View::make('admin.index');
		}
	}

	public function showLogin()
	{
		// View make login page.

		if(Auth::guest())
		{
			// Get login info then attempt to login.
			if(Auth::attempt(array('username' => 'Batteries Included', 'password' => 'root')))
			{
				//Auth::login(Auth::user());
				return Redirect::to('http://batteriesincluded.dev/admin');
			} else {
				return 'penis';
			}
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
