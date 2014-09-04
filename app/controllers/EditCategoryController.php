<?php

class EditCategoryController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }



    public function getEditCategory()
    {
        $data = Input::all();

        $category = Category::find($data['category-name']);

        return View::make('admin.edit.category')
                    ->with('category', $category);
    }

    public function putEditCategory()
    {
        $data = Input::all();

        if($data['category-name'] != '')
        {
            $category = Category::find($data['category-id']);
            $oldName  = $category->category_name;
            $category->category_name = $data['category-name'];
            $category->updated_at = new DateTime();
            $category->save();

            return Redirect::to($_ENV['URL'] . '/admin/edit/categories')
                            ->with('alert-class', 'alert-success')
                            ->with('flash-message', 'The category <b>' . $oldName . '</b> was successfully updated to <b>' . $category->category_name . '</b>!');
        } else {
            return Redirect::to($_ENV['URL'] . '/admin/edit/categories')
                            ->with('alert-class', 'alert-danger')
                            ->with('flash-message', 'You can not have an empty category name!');
        }
    }
}