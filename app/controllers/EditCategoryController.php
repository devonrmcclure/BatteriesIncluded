<?php

class EditCategoryController extends \BaseController {

    /**
     * Apply a before filter to check if a user is logged in.
     */
    public function __construct()
    {
        $this->beforeFilter('auth');
        $this->beforeFilter('pass_expired');
    }


    public function showIndex()
    {
        $categories    = Category::orderBy('category_name', 'ASC')->get();
        return View::make('admin.edit.catagories')
                    ->with('categories', $categories);
    }

    public function getCategory($id)
    {
        $category = Category::find($id);
        return View::make('admin.edit.category')
                    ->with('category', $category);
    }

    /**
     * Update the category name in the database.
     * @return [Redirect] [Redirect to the categories edit page with a success or error message.]
     */
    public function putEditCategory()
    {
        $data = Input::all();

        if($data['category-name'] != '')
        {
            $category = Category::find($data['category-id']);
            $oldName  = $category->category_name;
            $category->category_name = $data['category-name'];
            $category->updated_at = Carbon::now();
            $category->save();

            return Redirect::to($_ENV['URL'] . '/admin/edit/categories')
                            ->with('alert-class', 'success')
                            ->with('flash-message', 'The category <b>' . $oldName . '</b> was successfully updated to <b>' . $category->category_name . '</b>!');
        } else {
            return Redirect::to($_ENV['URL'] . '/admin/edit/categories')
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'You can not have an empty category name!');
        }
    }
}