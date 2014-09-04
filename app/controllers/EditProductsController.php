<?php

class EditProductsController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

    public function showIndex()
    {
        $data = Category::orderBy('category_name', 'ASC')->get(); // Get all category names and order them Alphabetically.

        foreach($data as $i)
        {
            $subCatLinks = Subcategory::orderBy('subcategory_name', 'ASC')->whereparent_category($i->id)->get();
        }

        return View::make('admin.edit.products')
            ->with('products', Product::orderBy('product_name', 'ASC')->paginate(9));
    }

    public function postEditProducts($id)
    {

        $product = Product::find($id);
        $subCategories = Subcategory::orderBy('subcategory_name', 'ASC')->get();

        return View::make('admin.edit.product')
                    ->with('product', $product)
                    ->with('subCategories', $subCategories);
    }

    public function putEditProducts($id)
    {
        $data = Input::all();
        if($data['productsubcategory-name'] != '')
        {
            $product = Product::find($id);
            //Update products accordingly
            $categoryID = Subcategory::find($data['productsubcategory-name']);
            $categoryID = $categoryID->parent_category;
            $file = Input::file('image');
            if($file)
            {
                $destinationPath = 'public/img/catalog/';
                $filename = $file->getClientOriginalName();
                $uploadSuccess = Input::file('image')->move($destinationPath, $filename);
            } else {
                $filename = 'no_image.png';
            }

            $product->category_id = $categoryID;
            $product->subCategory_id = $data['productsubcategory-name'];
            $product->product_name = $data['product-name'];
            $product->product_description = $data['product-description'];
            $product->price = $data['product-price'];
            $product->image = $filename;
            $product->updated_at = new DateTime();
            $product->save();

            return Redirect::to($_ENV['URL'] . '/admin/edit/products')
                            ->with('alert-class', 'alert-success')
                            ->with('flash-message', 'Subcategory updated!');

        } else {
            return Redirect::to($_ENV['URL'] . '/admin/edit/products')
                            ->with('alert-class', 'alert-danger')
                            ->with('flash-message', 'You can not have an empty subcategory name!');
        }
    }

}