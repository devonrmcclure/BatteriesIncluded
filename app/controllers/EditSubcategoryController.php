<?php

class EditSubcategoryController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth', array('except' => array('showLogin', 'postLogin')));
    }

    public function getEditSubcategory()
    {
        $data = Input::all();

        $subcategory = Subcategory::find($data['subcategory-name']);
        $categories  = Category::orderBy('category_name', 'ASC')->get();
        return View::make('admin.edit.subcategory')
                    ->with('categories', $categories)
                    ->with('subCategory', $subcategory);
    }

    public function putEditsubcategory()
    {
        $data = Input::all();

        if($data['subcategory-name'] != '' && $data['parentcategory-name'] != 'selectparentcategory')
        {
            $subCategory = Subcategory::find($data['subcategory-id']);
            $category    = Category::find($data['parentcategory-name']);
            $oldName  = $subCategory->subcategory_name;
            $oldParentCat = $category->category_name;
            $subCategory->parent_category = $data['parentcategory-name'];
            $parentCat    = Category::find($subCategory->parent_category);
            $parentCat    = $parentCat->category_name;
            $subCategory->subcategory_name = $data['subcategory-name'];
            $subCategory->updated_at = new DateTime();
            $subCategory->save();

            //Update products accordingly
            $categoryID = Subcategory::find($data['subcategory-id']);
            $categoryID = $categoryID->parent_category;
            $products   = Product::wheresubcategory_id($subCategory->id)->get();
            foreach($products as $product)
            {
                $product->category_id = $categoryID;
                $product->updated_at  = new DateTime();
                $product->save();
            }

            return Redirect::to($_ENV['URL'] . '/admin/edit/categories')
                            ->with('alert-class', 'alert-success')
                            ->with('flash-message', 'Subcategory updated!');

        } else {
            return Redirect::to($_ENV['URL'] . '/admin/edit/categories')
                            ->with('alert-class', 'alert-danger')
                            ->with('flash-message', 'You can not have an empty subcategory name!');
        }
    }

}