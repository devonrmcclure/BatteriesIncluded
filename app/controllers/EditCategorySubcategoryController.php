<?php

class EditCategorySubcategoryController extends \BaseController {

    /**
     * Apply a before filter to check if a user is logged in.
     */
    public function __construct()
    {
        $this->beforeFilter('auth');
        $this->beforeFilter('pass_expired');
    }

    /**
     * Show the index for editing a category or a subcategory.
     * @return [View] [create the index for editing a category or subcategory]
     */
    public function showIndex()
    {
        $categories    = Category::orderBy('category_name', 'ASC')->get();
        $subCategories = Subcategory::orderBy('subcategory_name', 'ASC')->get();
        return View::make('admin.edit.catagories')
                    ->with('categories', $categories)
                    ->with('subCategories', $subCategories);
    }

}