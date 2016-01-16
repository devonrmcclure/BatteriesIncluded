<?php

class RolesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /roles
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles = Role::orderBy('name', 'ASC')->get();
		return View::make('admin.manage.roles')
					->with('roles', $roles);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /roles/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$permissions = Permissions::orderBy('permission', 'ASC')->whererole_id(1)->get();
		return View::make('admin.add.role')
		        ->with('permissions', $permissions);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /roles
	 *
	 * @return Response
	 */
	public function store()
	{
		/* This is a two step process. First, create the role itself, the assign permissions to the role after it's created*/

		$data = Input::all();

		//TODO: Make sure the role doesn't already exist.
		if(Role::wherename($data['role-name'])->first())
		{
			return Redirect::to('/admin/roles/create')
			                ->with('alert-class', 'error')
			                ->with('flash-message', 'Role already exists!')
			                ->withInput();
		} else {
			$role = new Role;
			$role->name = $data['role-name'];
			$role->save();

			/* Once the role is created, get the ID from the database, and assign permissions to it.*/
			$roleID = Role::wherename($data['role-name'])->first();
			$roleID = $roleID->id;

			foreach($data['permissions'] as $permission)
			{
				$permissions = new Permissions;
				$permissions->role_id = $roleID;
				$permissions->permission = $permission;
				$permissions->save();
			}

			return Redirect::to('/admin/roles')
			                ->with('alert-class', 'success')
			                ->with('flash-message', 'Role <b>' . $data['role-name'] . '</b> has been successfully added!');
		}





		echo count($data['permissions']);
	}

	/**
	 * Display the specified resource.
	 * GET /roles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /roles/{id}/edit
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
	 * PUT /roles/{id}
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
	 * DELETE /roles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$role = Role::find($id);
		//First we need to delete the permissions from the DB.
		$permissions = Permissions::whererole_id($role->id)->get();
		foreach($permissions as $permission)
		{
			$permission->delete();
		}
		$oldName = $role->name;
		$role->delete();
		return Redirect::to('/admin/roles')
		                ->with('alert-class', 'success')
		                ->with('flash-message', 'Role <b>' . $oldName . '</b> has been deleted!');
	}

}