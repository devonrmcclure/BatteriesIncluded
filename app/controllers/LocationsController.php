<?php

class LocationsController extends \BaseController {

	public function __construct()
	{
	    $this->beforeFilter('auth', array('except' => array('show')));
	    $this->beforeFilter('pass_expired', array('except' => array('show')));
	}

    /**
     * Create the locations-contact page view.
     * @return [View] [load the view for the locations-contact page]
     */
    public function show()
    {
    	$locations = Locations::orderBy('city', 'ASC')->get();
        return View::make('locations')
        			->with('locations', $locations);
    }

    /**
     * The following methods are for an Admin to add/edit/delete a Location
     */

    public function index() {
    	return View::make('admin.manage.locations');
    }
}