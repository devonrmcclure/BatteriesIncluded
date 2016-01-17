<?php

class CarouselController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
        $this->beforeFilter('pass_expired');
    }

    /*
     * Show all carousel items and choose which on to edit.
     *
     */
    public function index()
    {
        $requiredPermissions = ['manage_carousel'];
        if(!parent::checkPermissions($requiredPermissions))
        {
            return Redirect::back()
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'You do not have the required permissions to do that!');
        }
        //Get all carousel images and show them
        $carousels = Carousel::orderBy('created_at', 'DESC')->get();

        return View::make('admin.manage.carousels')
                    ->with('carousels', $carousels);
    }

    public function create() {
        $requiredPermissions = ['add_carousel'];
        if(!parent::checkPermissions($requiredPermissions))
        {
            return Redirect::back()
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'You do not have the required permissions to do that!');
        }
        return View::make('admin.add.carousel');
    }

    public function store() {
        $requiredPermissions = ['add_carousel'];
        if(!parent::checkPermissions($requiredPermissions))
        {
            return Redirect::back()
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'You do not have the required permissions to do that!');
        }
        if(count(Carousel::orderBy('id', 'ASC')->get()) == 10) {
            return Redirect::to('/admin/carousels')
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'You can not have more than 10 carousels. Please edit or delete an existing one!')
                            ->withInput();
        }

        $data = Input::all();

        if($data['carousel-title'] == '' || $data['carousel-info'] == '') {
            return Redirect::to('/admin/carousels/create')
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'Please fill out all fields to add a carousel!')
                            ->withInput();

        }

        elseif(!$file = Input::file('image')) {
            return Redirect::to('/admin/carousels/create')
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'Please upload a file!')
                            ->withInput();
        } else {

            $destinationPath = 'img/carousel/';
            $filename = $file->getClientOriginalName();
            $uploadSuccess = Input::file('image')->move($destinationPath, $filename);

            $carousel = new Carousel;
            $carousel->title = $data['carousel-title'];
            $carousel->info = $data['carousel-info'];
            $carousel->image = $filename;
            $carousel->created_at = Carbon::now();
            $carousel->updated_at = Carbon::now();
            $carousel->save();
            return Redirect::to('/admin/carousels')
                ->with('alert-class', 'success')
                ->with('flash-message', 'Carousel successfully created!');
        }

    }

    public function edit($id)
    {
        $requiredPermissions = ['edit_carousel'];
        if(!parent::checkPermissions($requiredPermissions))
        {
            return Redirect::back()
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'You do not have the required permissions to do that!');
        }
        if($carousel = Carousel::find($id))
        {
            return View::make('admin.edit.carousel')
                    ->with('carousel', $carousel);
        } else {
            // carousel doesn't exits (IE: User enters a number in the URL)
            return Redirect::to('/admin/carousels')
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'The carousel you requested does\'nt exist!');
        }
    }

    public function update($id)
    {
        $requiredPermissions = ['edit_carousel'];
        if(!parent::checkPermissions($requiredPermissions))
        {
            return Redirect::back()
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'You do not have the required permissions to do that!');
        }
        $data = Input::all();
        $carousel  = Carousel::find($id);

        if($data['carousel-title'] != '' || $data['carousel-info'] != '')
        {
            // Update priority if it is set, otherwise don't update the priority.
           if($file = Input::file('image'))
           {
               $destinationPath = 'img/carousel/';
               $filename = $file->getClientOriginalName();
               $uploadSuccess = Input::file('image')->move($destinationPath, $filename);
           } else {
               $filename = $carousel->image;
           }

                $carousel->title = $data['carousel-title'];
                $carousel->info = $data['carousel-info'];
                $carousel->image = $filename;
                $carousel->updated_at = Carbon::now();
                $carousel->save();
                return Redirect::to('/admin/carousels')
                                ->with('flash-message', 'Carousel has been successfully updated!')
                                ->with('alert-class', 'success');

        } else {
            return Redirect::to('/admin/carousels/' . $carousel->id . '/edit')
                            ->with('flash-message', 'Please fill out all fields to update a carousel!')
                            ->with('alert-class', 'error');
        }
    }

    public function destroy($id) {
        $requiredPermissions = ['delete_carousel'];
        if(!parent::checkPermissions($requiredPermissions))
        {
            return Redirect::back()
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'You do not have the required permissions to do that!');
        }
        $carousel = Carousel::find($id);
        $oldName = $carousel->title;
        $carousel->delete();
        return Redirect::to('/admin/carousels')
                        ->with('alert-class', 'success')
                        ->with('flash-message', 'Carousel <b>' . $oldName . '</b> has been deleted!');
    }
}