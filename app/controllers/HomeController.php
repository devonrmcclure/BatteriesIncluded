<?php

class HomeController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth', array('except' => array('show')));
        $this->beforeFilter('pass_expired', array('except' => array('show')));
    }


    /**
     * Show homes on the main /home page. This is the only method that isn't part of the Admin interface.
     */
    public function show()
    {
        $contents = Home::orderBy('created_at', 'DESC')->get();
        $carousels = Carousel::orderBy('id', 'ASC')->get();
        return View::make('index')
                    ->with('carousels', $carousels)
                    ->with('contents', $contents);
    }


    /**
     * The following methods are for an Admin to add/edit/delete content on the home page
     */

    /*
     * Show all carousel items and choose which on to edit along with main page content.
     *
     */
    public function index()
    {
        //Get all carousel images and show them, and all main page content.
        // Get all content and order them by the set priority.
        $contents = Home::orderBy('created_at', 'DESC')->get();

        return View::make('admin.manage.home')
                    ->with('contents', $contents);
    }

    public function create() {
        return View::make('admin.add.home');
    }

    public function store() {
        $data = Input::all();

        if($data['home-heading'] == '' || $data['home-content'] == '') {
            return Redirect::to('/admin/home/create')
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'Please fill out all fields to add content!')
                            ->withInput();

        } else {
            $home = new Home;
            $home->heading = $data['home-heading'];
            $home->content = $data['home-content'];
            $home->created_at = Carbon::now();
            $home->updated_at = Carbon::now();
            $home->save();
            return Redirect::to('/admin/home')
                ->with('alert-class', 'success')
                ->with('flash-message', 'Home content successfully created!');
        }

    }

    public function edit($id)
    {
        if($content = Home::find($id))
        {
            return View::make('admin.edit.home')
                    ->with('content', $content);
        } else {
            // home doesn't exits (IE: User enters a number in the URL)
            return Redirect::to('/admin/home')
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'The content you requested does\'nt exist!');
        }
    }

    public function update($id)
    {
        $data = Input::all();
        $home  = Home::find($id);

        if($data['home-heading'] != '' || $data['home-content'] != '')
        {
            $home->heading = $data['home-heading'];
            $home->content = $data['home-content'];
            $home->updated_at = Carbon::now();
            $home->save();
            return Redirect::to('/admin/home')
                            ->with('flash-message', 'Content has been successfully updated!')
                            ->with('alert-class', 'success');

        } else {
            return Redirect::to('/admin/home/' . $home->id . '/edit')
                            ->with('flash-message', 'Please fill out all fields to update content!')
                            ->with('alert-class', 'error');
        }
    }

    public function destroy($id) {
        $home = Home::find($id);
        $oldName = $home->heading;
        $home->delete();
        return Redirect::to('/admin/home')
                        ->with('alert-class', 'success')
                        ->with('flash-message', 'Content <b>' . $oldName . '</b> has been deleted!');
    }
}