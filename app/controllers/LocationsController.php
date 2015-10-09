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

    	$mr = Hours::orderBy('day', 'ASC')->wherelocations_id(1)->get();
    	$gf = Hours::orderBy('day', 'ASC')->wherelocations_id(2)->get();
    	$nm = Hours::orderBy('day', 'ASC')->wherelocations_id(3)->get();
    	$rm = Hours::orderBy('day', 'ASC')->wherelocations_id(4)->get();
    	$wr = Hours::orderBy('day', 'ASC')->wherelocations_id(5)->get();
        return View::make('locations')
        			->with('locations', $locations)
        			->with('mr', $mr)
        			->with('gf', $gf)
        			->with('nm', $nm)
        			->with('rm', $rm)
        			->with('wr', $wr);
    }

    /**
     * The following methods are for an Admin to add/edit/delete a Location
     */

    public function index() {
    	$locations = Locations::orderBy('city', 'ASC')->get();
    	return View::make('admin.manage.locations')
    				->with('locations', $locations);
    }

    public function edit($id) {
    	$location = Locations::whereid($id)->first();

    	return View::make('admin.edit.location')
    				->with('location', $location);
    }

    public function update($id) {

    	$data = Input::all();
    	$location = Locations::find($id);

    	if($data['location-address'] != '' && $data['location-email'] != '' && $data['location-phone'] != '' && $data['location-description'] != '') {
    	    //Check if a file is being uploaded
    	    if($file = Input::file('image'))
    	    {
    	        $destinationPath = 'img/locations/';
    	        $filename = $file->getClientOriginalName();
    	        $uploadSuccess = Input::file('image')->move($destinationPath, $filename);
    	    } else {
    	        $filename = $location->image;
    	    }


    	    //Upload the location.
    	    $location->address = $data['location-address'];
    	    $location->email = $data['location-email'];
    	    $location->phone = $data['location-phone'];
    	    $location->description = $data['location-description'];
    	    $location->image = $filename;
    	    $location->updated_at = Carbon::now();
    	    $location->save();

    	    return Redirect::to('/admin/locations')
    	                    ->with('alert-class', 'success')
    	                    ->with('flash-message', 'Location <b>' . $location->city . '</b> has been successfully updated!');


    	} elseif($data['location-address'] == '') {
    	    return Redirect::to('/admin/locations/'. $location->id . '/edit')
    	                    ->with('alert-class', 'error')
    	                    ->with('flash-message', 'Please enter an address!')
    	                    ->withInput();
    	} elseif($data['location-email'] == '') {
    	    return Redirect::to('/admin/locations/'. $location->id . '/edit')
    	                    ->with('alert-class', 'error')
    	                    ->with('flash-message', 'Please enter an email!')
    	                    ->withInput();

    	} elseif($data['location-phone'] == '') {
    	    return Redirect::to('/admin/locations/'. $location->id . '/edit')
    	                    ->with('alert-class', 'error')
    	                    ->with('flash-message', 'Please enter a phone number!')
    	                    ->withInput();

    	} elseif($data['location-description'] == '') {
    	    return Redirect::to('/admin/locations/'. $location->id . '/edit')
    	                    ->with('alert-class', 'error')
    	                    ->with('flash-message', 'Please enter a description')
    	                    ->withInput();

    	} else {
    	    return Redirect::to('/admin/locations/'. $location->id . '/edit')
    	                    ->with('alert-class', 'error')
    	                    ->with('flash-message', 'Unknown error!')
    	                    ->withInput();
    	}
    }
}