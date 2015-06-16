<?php

class ProductsController extends \BaseController {

    public $products = array();
    public $productCount = array();
    public $pagination;


    public function hasChild($categoryID)
    {
        if(Category::whereparent_id($categoryID)->get())
        {
            return true;
        } else {
            return false;
        }
    }

    // Get products for displaying.
    public function makeProducts($category = '')
    {
        if(!$category)
        {
            $this->products[] = Product::orderBy('created_at', 'DESC')->take(12)->get();
            //$this->pagination = Paginator::make($this->products, count($this->products), 9);
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
    public function getProducts($category = '')
    {
        $this->makeProducts($category);
        return $this->products;
    }

    // Get the count of products
    public function productCount($categories = '')
    {
        foreach($categories as $category)
        {
            $this->roductCount[$category->category_name] = count(Product::wherecategory_id($category->id)->get());
        }
        /*echo '<pre>';
        var_dump($this->productCount);
        echo '</pre>';
        die;*/
        return $this->productCount;
    }
}