<?php

class EditCategorySubcategoryController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

    public function showIndex()
    {
        $categories    = Category::orderBy('category_name', 'ASC')->get();
        $subCategories = Subcategory::orderBy('subcategory_name', 'ASC')->get();
        return View::make('admin.edit.catagories')
                    ->with('categories', $categories)
                    ->with('subCategories', $subCategories);
    }

}