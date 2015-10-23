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
     * The following methods are for an Admin to edit a Location
     */

    public function index() {
    	$locations = Locations::orderBy('city', 'ASC')->get();
    	return View::make('admin.manage.locations')
    				->with('locations', $locations);
    }

    public function edit($id) {
    	$location = Locations::whereid($id)->first();
    	$hours    = Hours::wherelocations_id($id)->get();

    	return View::make('admin.edit.location')
    				->with('location', $location)
    				->with('hours', $hours);
    }

    public function update($id) {

    	$data 	  = Input::all();
    	$location = Locations::find($id);
    	$hours    = Hours::wherelocations_id($id)->get();

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

    	    //Check the hours for updating.
    	    //TODO: Some validation.
    	    //
    	    if(
    	    	preg_match("/\d\d:\d\d:\d\d/", $data['Sunday-open']) &&
    	    	preg_match("/\d\d:\d\d:\d\d/", $data['Sunday-close']) &&
    	    	preg_match("/\d\d:\d\d:\d\d/", $data['Monday-open']) &&
    	    	preg_match("/\d\d:\d\d:\d\d/", $data['Monday-close']) &&
    	    	preg_match("/\d\d:\d\d:\d\d/", $data['Tuesday-open']) &&
    	    	preg_match("/\d\d:\d\d:\d\d/", $data['Tuesday-close']) &&
    	    	preg_match("/\d\d:\d\d:\d\d/", $data['Wednesday-open']) &&
    	    	preg_match("/\d\d:\d\d:\d\d/", $data['Wednesday-close']) &&
    	    	preg_match("/\d\d:\d\d:\d\d/", $data['Thursday-open']) &&
    	    	preg_match("/\d\d:\d\d:\d\d/", $data['Thursday-close']) &&
    	    	preg_match("/\d\d:\d\d:\d\d/", $data['Friday-open']) &&
    	    	preg_match("/\d\d:\d\d:\d\d/", $data['Friday-close']) &&
    	    	preg_match("/\d\d:\d\d:\d\d/", $data['Saturday-open']) &&
    	    	preg_match("/\d\d:\d\d:\d\d/", $data['Saturday-close'])
    	    ) {
    	    	$hours[0]->open = $data['Sunday-open'];
    	    	$hours[0]->close = $data['Sunday-close'];
    	    	$hours[0]->save();
    	    	$hours[1]->open = $data['Monday-open'];
    	    	$hours[1]->close = $data['Monday-close'];
    	    	$hours[1]->save();
    	    	$hours[2]->open = $data['Tuesday-open'];
    	    	$hours[2]->close = $data['Tuesday-close'];
    	    	$hours[2]->save();
    	    	$hours[3]->open = $data['Wednesday-open'];
    	    	$hours[3]->close = $data['Wednesday-close'];
    	    	$hours[3]->save();
    	    	$hours[4]->open = $data['Thursday-open'];
    	    	$hours[4]->close = $data['Thursday-close'];
    	    	$hours[4]->save();
    	    	$hours[5]->open = $data['Friday-open'];
    	    	$hours[5]->close = $data['Friday-close'];
    	    	$hours[5]->save();
    	    	$hours[6]->open = $data['Saturday-open'];
    	    	$hours[6]->close = $data['Saturday-close'];
    	    	$hours[6]->save();
    	    } else {
    	    	return Redirect::to('/admin/locations/'. $location->id . '/edit')
    	    	                ->with('alert-class', 'error')
    	    	                ->with('flash-message', 'Please make sure the times are in the format 00:00:00!')
    	    	                ->withInput();
    	    }
    	    //
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