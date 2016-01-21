<?php

class LogsController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
        $this->beforeFilter('pass_expired');
    }

    public function show()
    {
        $requiredPermissions = ['view_logs'];
        if(!parent::checkPermissions($requiredPermissions))
        {
            return Redirect::back()
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'You do not have the required permissions to do that!');
        }

        $logs = Logs::orderBy('created_at', 'DESC')->get();

        return View::make('admin.manage.logs')
                ->with('logs', $logs);
    }
}