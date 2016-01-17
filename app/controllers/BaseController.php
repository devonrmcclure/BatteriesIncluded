<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	protected function checkPermissions($permissions)
	{
		$user = Auth::user();
		$hasPermission = [];

		for($i = 0; $i < count($permissions); $i++)
		{
			for($ii = 0; $ii < count($user->role->permissions); $ii++)
			{
				if($user->role->permissions[$ii]->permission == $permissions[$i])
				{
					$hasPermission[] = $permissions[$i];
					break;
				}
			}
		}
		if($hasPermission == $permissions) {
			return true;
		} else {
			return false;
		}
	}

}
