<?php

class DeleteProductsController extends \BaseController {

    /**
     * Apply a before filter to check if a user is logged in.
     */
    public function __construct()
    {
        $this->beforeFilter('auth');
        $this->beforeFilter('pass_expired');
    }

    /**
     * Show the information of a specific product.
     * @param  [int] $id [the ID of the product in the database]
     * @return [View]     [Show the specific product]
     */
    public function getProduct($id)
    {
        $product = Product::find($id);
        $subCategories = Subcategory::orderBy('subcategory_name', 'ASC')->get();

        return View::make('admin.delete.product')
                    ->with('product', $product)
                    ->with('subCategories', $subCategories);
    }

    /**
     * TODO: Validate that the product actually got deleted.
     *
     * Delete the specific product.
     * @param  [int] $id [the ID of the product in the database]
     * @return [Redirect]     [Redirect back to products edit/delete page with a success or error message]
     */
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $oldName = $product->product_name;
        $product->delete();

        return Redirect::to($_ENV['URL'] . '/admin/edit/products')
                        ->with('alert-class', 'alert-success')
                        ->with('flash-message', 'Product <b>' . $oldName . '</b> has been deleted!');
    }
}