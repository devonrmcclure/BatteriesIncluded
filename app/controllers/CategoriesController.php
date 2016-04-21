<?php

class CategoriesController extends \BaseController {

    /**
     * Apply a before filter to check if a user is logged in.
     */
    public function __construct()
    {
        $this->beforeFilter('auth');
        $this->beforeFilter('pass_expired');
    }


    public function index()
    {
        $requiredPermissions = ['manage_category'];
        if(!parent::checkPermissions($requiredPermissions))
        {
            return Redirect::back()
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'You do not have the required permissions to do that!');
        }
        $categories = Category::orderBy('category_name', 'ASC')->get();

        foreach($categories as $category) {
            $child = $category->category_name;

            if(isset($category->parent_id)) {
                $parent = Category::find($category->parent_id);
                $parentCategories[$child]['parent'] = $parent->category_name;
            } else {
                $parentCategories[$child]['parent'] = NULL;
            }
        }

        return View::make('admin.manage.categories')
                    ->with('categories', $categories)
                    ->with('parentCategories', $parentCategories);
    }

    public function create() {
        $requiredPermissions = ['add_category'];
        if(!parent::checkPermissions($requiredPermissions))
        {
            return Redirect::back()
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'You do not have the required permissions to do that!');
        }
        $categories = Category::orderBy('category_name', 'ASC')->get();

        return View::make('admin.add.category')
                    ->with('categories', $categories);
    }

    public function store() {
        $requiredPermissions = ['add_category'];
        if(!parent::checkPermissions($requiredPermissions))
        {
            return Redirect::back()
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'You do not have the required permissions to do that!');
        }
        $data = Input::all();

        $category = new Category;

        if($data['category-name'] != '')
        {
            // If the Parent Category is anything other than "Select Parent Category", update that as well.
            if($data['parentcategory-id'] != 'selectparentcategory') {
                $category->parent_id = $data['parentcategory-id'];
            }
            $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $data['category-name']);
            $slug = preg_replace("/[^a-zA-Z0-9\/_| -]/", '', $slug);
            $slug = strtolower(trim($slug, '-'));
            $slug = preg_replace("/[\/_| -]+/", '-', $slug);

            $category->category_name = $data['category-name'];
            $category->slug = $slug;
            $category->created_at = Carbon::now();
            $category->updated_at = Carbon::now();
            $category->save();

            $log = new Logs();
            $log->user_id = Auth::user()->id;
            $log->action = "Created the category <b>" . $data['category-name'] . "</b>";
            $log->save();

            return Redirect::to($_ENV['URL'] . '/admin/categories')
                            ->with('alert-class', 'success')
                            ->with('flash-message', 'The category <b>' . $data['category-name'] . '</b> was successfully added!');
        } else {
            return Redirect::to($_ENV['URL'] . '/admin/categories/create')
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'You can not have an empty category name!')
                            ->withInput();
        }
    }

    public function edit($id)
    {
        $requiredPermissions = ['edit_category'];
        if(!parent::checkPermissions($requiredPermissions))
        {
            return Redirect::back()
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'You do not have the required permissions to do that!');
        }
        $category = Category::find($id);
        $categories = Category::orderBy('category_name', 'ASC')->get();
        return View::make('admin.edit.category')
                    ->with('category', $category)
                    ->with('categories', $categories);
    }

    /**
     * Update the category name in the database.
     * @return [Redirect] [Redirect to the categories edit page with a success or error message.]
     */
    public function update($id)
    {
        $requiredPermissions = ['edit_category'];
        if(!parent::checkPermissions($requiredPermissions))
        {
            return Redirect::back()
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'You do not have the required permissions to do that!');
        }
        $data = Input::all();
        $category = Category::find($id);

        if($data['category-name'] != '')
        {
            // If the Parent Category is anything other than "Select Parent Category", update that as well.
            if($data['parentcategory-id'] != 'selectparentcategory') {
                $category->parent_id = $data['parentcategory-id'];
            }
            $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $data['category-name']);
            $slug = preg_replace("/[^a-zA-Z0-9\/_| -]/", '', $slug);
            $slug = strtolower(trim($slug, '-'));
            $slug = preg_replace("/[\/_| -]+/", '-', $slug);

            $oldName  = $category->category_name;
            $category->category_name = $data['category-name'];
            $category->slug = $slug;
            $category->updated_at = Carbon::now();
            $category->save();

            $log = new Logs();
            $log->user_id = Auth::user()->id;
            $log->action = "Updated the category <b>" . $data['category-name'] . "</b>";
            $log->save();

            if($oldName !== $data['category-name']) {
                return Redirect::to($_ENV['URL'] . '/admin/categories')
                                ->with('alert-class', 'success')
                                ->with('flash-message', 'The category <b>' . $oldName . '</b> was successfully updated to <b>' . $category->category_name . '</b>!');
            } else {
                return Redirect::to($_ENV['URL'] . '/admin/categories')
                                ->with('alert-class', 'success')
                                ->with('flash-message', 'The category <b>' . $oldName . '</b> was successfully updated!');
            }
        } else {
            return Redirect::to($_ENV['URL'] . '/admin/categories/' . $id . '/edit')
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'You can not have an empty category name!');
        }
    }
}