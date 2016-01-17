<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /user
	 *
	 * @return Response
	 */
	public function index()
	{
		$requiredPermissions = ['manage_user'];
		if(!parent::checkPermissions($requiredPermissions))
		{
		    return Redirect::back()
		                    ->with('alert-class', 'error')
		                    ->with('flash-message', 'You do not have the required permissions to do that!');
		}
		$users = User::orderBy('username', 'ASC')->get();
		return View::make('admin.manage.users')
					->with('users', $users);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /user/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$requiredPermissions = ['add_user'];
		if(!parent::checkPermissions($requiredPermissions))
		{
		    return Redirect::back()
		                    ->with('alert-class', 'error')
		                    ->with('flash-message', 'You do not have the required permissions to do that!');
		}
		$roles = Role::orderBy('name', 'ASC')->get();
		return View::make('admin.add.user')
		        ->with('roles', $roles);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /user
	 *
	 * @return Response
	 */
	public function store()
	{
		$requiredPermissions = ['add_user'];
		if(!parent::checkPermissions($requiredPermissions))
		{
		    return Redirect::back()
		                    ->with('alert-class', 'error')
		                    ->with('flash-message', 'You do not have the required permissions to do that!');
		}
		$data = Input::all();
		//REMINDER: Set force_password_change to 1
		//Check if user exists.
		if($data['username'] == "") {
			return Redirect::to('/admin/users/create')
			                ->with('alert-class', 'error')
			                ->with('flash-message', 'Please enter a username!')
			                ->withInput();
		}
		elseif(User::whereusername($data['username'])->first())
		{
			return Redirect::to('/admin/users/create')
			                ->with('alert-class', 'error')
			                ->with('flash-message', 'User already exists. Please choose a different username!')
			                ->withInput();
		} elseif($data['pass1'] == "" || $data['pass2'] == "") {

				return Redirect::to('/admin/users/create')
				                ->with('alert-class', 'error')
				                ->with('flash-message', 'Please enter a password!')
				                ->withInput();
		} elseif($data['pass1'] !== $data['pass2']) {
			return Redirect::to('/admin/users/create')
			                ->with('alert-class', 'error')
			                ->with('flash-message', 'Passwords do not match!')
			                ->withInput();

		} elseif($data['role'] == "selectrole") {
			return Redirect::to('/admin/users/create')
			                ->with('alert-class', 'error')
			                ->with('flash-message', 'Please select a role!')
			                ->withInput();
		} else {
			$user = new User;
			$user->username = $data['username'];
			$user->password = Hash::make($data['pass1']);
			$user->role_id = $data['role'];
			$user->force_password_change = 1;
			$user->save();

			return Redirect::to('/admin/users')
			                ->with('alert-class', 'success')
			                ->with('flash-message', 'User created!')
			                ->withInput();
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /user/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$requiredPermissions = ['edit_user'];
		if(!parent::checkPermissions($requiredPermissions))
		{
		    return Redirect::back()
		                    ->with('alert-class', 'error')
		                    ->with('flash-message', 'You do not have the required permissions to do that!');
		}
		$user = User::find($id);
		$roles = Role::orderBy('name', 'ASC')->get();
		return View::make('admin.edit.user')
					->with('user', $user)
					->with('roles', $roles);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$requiredPermissions = ['edit_user'];
		if(!parent::checkPermissions($requiredPermissions))
		{
		    return Redirect::back()
		                    ->with('alert-class', 'error')
		                    ->with('flash-message', 'You do not have the required permissions to do that!');
		}
		$data = Input::all();
		$user = User::find($id);

		if($data['username'] == "")
		{
			return Redirect::to('/admin/users/create')
			                ->with('alert-class', 'error')
			                ->with('flash-message', 'Please enter a username!')
			                ->withInput();
		}

		if($data['username'] != $user->username)
		{
			$user->username = $data['username'];
		}

		if($data['pass1'] != "" || $data['pass2'] != "") {
			if($data['pass1'] !== $data['pass2']) {
				return Redirect::to('/admin/users/create')
				                ->with('alert-class', 'error')
				                ->with('flash-message', 'Passwords do not match!')
				                ->withInput();
			} else {
				$user->password = Hash::make($data['pass1']);
				$user->force_password_change = 1;
			}
		}
		if($data['role'] != "selectrole") {
			$user->role_id = $data['role'];
		}
			$user->save();

			return Redirect::to('/admin/users')
			                ->with('alert-class', 'success')
			                ->with('flash-message', 'User updated!')
			                ->withInput();
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$requiredPermissions = ['delete_user'];
		if(!parent::checkPermissions($requiredPermissions))
		{
		    return Redirect::back()
		                    ->with('alert-class', 'error')
		                    ->with('flash-message', 'You do not have the required permissions to do that!');
		}
		$user = User::find($id);
		$oldName = $user->username;
		$user->delete();
		return Redirect::to('/admin/users')
		                ->with('alert-class', 'success')
		                ->with('flash-message', 'User <b>' . $oldName . '</b> has been deleted!');
	}

}