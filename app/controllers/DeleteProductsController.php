<?php

class DeleteProductsController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth', array('except' => array('showLogin', 'postLogin')));
    }

    public function getProduct($id)
    {
        $product = Product::find($id);
        $subCategories = Subcategory::orderBy('subcategory_name', 'ASC')->get();

        return View::make('admin.delete.product')
                    ->with('product', $product)
                    ->with('subCategories', $subCategories);
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();

        return Redirect::to($_ENV['URL'] . '/admin/edit/products')
                        ->with('alert-class', 'alert-success')
                        ->with('flash-message', 'Product Deleted!');
    }
}