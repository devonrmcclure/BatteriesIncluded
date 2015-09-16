<?php

class ProductsController extends \BaseController {

    public $products = array();
    public $productCount = array();

    // Get products for displaying.
    public function makeProducts($category = '', $maxProducts = NULL)
    {
        if(!$category)
        {
            if($maxProducts) {
                $this->products[] = Product::orderBy('created_at', 'DESC')->take($maxProducts)->get();
            } else {
                $this->products[] = Product::orderBy('created_at', 'DESC')->get();
            }
        } else {
            // Get all products in this category
            foreach($category as $cat)
            {
                $this->products[] = Product::wherecategory_id($cat->id)->get();
            }

            // Does this category have a subcategory?
            foreach($category as $cat)
            {
                $subCats = Category::whereparent_id($cat->id)->get();
                $this->getProducts($subCats);
            }
            //$this->pagination = Paginator::make($this->products, count($this->products), 9);
        }
    }

    // Return the products
    public function getProducts($category = '', $maxProducts = NULL)
    {
        $this->makeProducts($category, $maxProducts);
        return $this->products;
    }

    // Get the count of products
    public function productCount($categories = '')
    {
        foreach($categories as $category)
        {
            $this->productCount[$category->category_name] = count(Product::wherecategory_id($category->id)->get());
        }
        /*echo '<pre>';
        var_dump($this->productCount);
        echo '</pre>';
        die;*/
        return $this->productCount;
    }
}