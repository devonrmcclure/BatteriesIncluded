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

        /*One time, create all slugs for a product*/
        $permissions = ['manage_product', 'add_product', 'edit_product', 'delete_product', 'manage_category', 'add_category', 'edit_category', 'manage_user', 'add_user', 'edit_user', 'delete_user', 'manage_faq', 'add_faq', 'edit_faq', 'delete_faq', 'manage_carousel', 'add_carousel', 'edit_carousel', 'delete_carousel', 'manage_home_content', 'add_home_content', 'edit_home_content', 'delete_home_content', 'manage_service', 'add_service', 'edit_service', 'delete_service', 'manage_location', 'add_location', 'edit_location', 'delete_location', 'manage_role', 'add_role', 'edit_role', 'delete_role'];


        /*for($i = 0; $i < count($permissions); $i++)
        {
            $permission = new Permissions;
            $permission->role_id = 1;
            $permission->permission = $permissions[$i];
            $permission->save();
        }
        die;*/
        /*foreach($products as $product) {
            $id = $product->id;
            echo $id . "<br/>";
            $slug = strtolower(str_replace(" ", "-", $product->product_name));
            $product1->slug = $slug;
            echo $slug . "<br/>";
        }*/


        /*Testing Permission relationships*/
        if(Auth::check()){
            $user = Auth::user();
            if(!parent::checkPermissions($permissions))
            {
                return Redirect::back()
                                ->with('alert-class', 'error')
                                ->with('flash-message', 'You do not have the required permissions to do that!');
            }

            echo $user->username . "<br/>";
            echo $user->role->name . "<br/>";

            foreach($user->role->permissions as $permission)
            {
                echo "Permission: <b>" . $permission->permission . "</b></br>";
            }
            die;
        }

        /*One time, create all slugs for a product
        $products = Product::all();

        foreach($products as $product) {
            $id = $product->id;
            echo $id . "<br/>";
            $product1 = Product::find($id);
            $slug = strtolower(str_replace(" ", "-", $product->product_name));
            $product1->slug = $slug;
            $product1->save();
            echo $slug . "<br/>";
        }
        die;*/
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
        $requiredPermissions = ['manage_home_content'];
        if(!parent::checkPermissions($requiredPermissions))
        {
            return Redirect::back()
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'You do not have the required permissions to do that!');
        }
        //Get all carousel images and show them, and all main page content.
        // Get all content and order them by the set priority.
        $contents = Home::orderBy('created_at', 'DESC')->get();

        return View::make('admin.manage.home')
                    ->with('contents', $contents);
    }

    public function create() {
        $requiredPermissions = ['add_home_content'];
        if(!parent::checkPermissions($requiredPermissions))
        {
            return Redirect::back()
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'You do not have the required permissions to do that!');
        }
        return View::make('admin.add.home');
    }

    public function store() {
        $requiredPermissions = ['add_home_content'];
        if(!parent::checkPermissions($requiredPermissions))
        {
            return Redirect::back()
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'You do not have the required permissions to do that!');
        }
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
        $requiredPermissions = ['edit_home_content'];
        if(!parent::checkPermissions($requiredPermissions))
        {
            return Redirect::back()
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'You do not have the required permissions to do that!');
        }
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
        $requiredPermissions = ['edit_home_content'];
        if(!parent::checkPermissions($requiredPermissions))
        {
            return Redirect::back()
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'You do not have the required permissions to do that!');
        }
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
        $requiredPermissions = ['delete_home_content'];
        if(!parent::checkPermissions($requiredPermissions))
        {
            return Redirect::back()
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'You do not have the required permissions to do that!');
        }
        $home = Home::find($id);
        $oldName = $home->heading;
        $home->delete();
        return Redirect::to('/admin/home')
                        ->with('alert-class', 'success')
                        ->with('flash-message', 'Content <b>' . $oldName . '</b> has been deleted!');
    }
}