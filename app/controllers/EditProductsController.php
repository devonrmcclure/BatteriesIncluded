<?php

class EditProductsController extends \BaseController {

    /**
     * Apply a before filter to check if a user is logged in.
     */
    public function __construct()
    {
        $this->beforeFilter('auth');
    }

    /**
     * Show the index for editing a product.
     * @return [View] [create the view with each product in the database]
     */
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

    /**
     * Create the view for editing a specific product.
     * @param  [int] $id [ID of the product in the database]
     * @return [View]     [create the view for editing a product]
     */
    public function postEditProducts($id)
    {

        if($product = Product::find($id))
        {
            $subCategories = Subcategory::orderBy('subcategory_name', 'ASC')->get();

            return View::make('admin.edit.product')
                    ->with('product', $product)
                    ->with('subCategories', $subCategories);
        } else {
            // Product doesn't exits (IE: User enters a number in the URL)
            return Redirect::to($_ENV['URL'] . '/admin/edit/products')
                            ->with('alert-class', 'alert-danger')
                            ->with('flash-message', 'The product you requested does\'nt exist!');
        }
    }

    /**
     * Update the product with the input data.
     * @param  [int] $id [ID of the product in the database]
     * @return [Redirect]     [redirect back to the products index page with a success or error message]
     */
    public function putEditProducts($id)
    {
        $data = Input::all();
        if($data['productsubcategory-name'] != '' && $data['product-name'] != '')
        {
            $product = Product::find($id);
            //Update products accordingly
            $categoryID = Subcategory::find($data['productsubcategory-name']);
            $categoryID = $categoryID->parent_category;
            if($file = Input::file('image'))
            {
                $destinationPath = 'img/catalog/';
                $filename = $file->getClientOriginalName();
                $uploadSuccess = Input::file('image')->move($destinationPath, $filename);
            } else {
                $filename = $product->image;
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
                            ->with('flash-message', 'Product <b>' . $product->product_name . '</b> updated!');

        } else {
            return Redirect::to($_ENV['URL'] . '/admin/edit/products')
                            ->with('alert-class', 'alert-danger')
                            ->with('flash-message', 'You can not have an empty product or subcategory name!');
        }
    }

}