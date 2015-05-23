<?php

class ProductsController extends \BaseController {

    public $products = array();
    public $pagination;


    public function getChild($categoryID)
    {
        if(Category::whereparent_id($categoryID)->get())
        {
            return true;
        } else {
            return false;
        }
    }

    public function makeProducts($category)
    {
        if(!$category)
        {
            $this->products[] = Product::orderBy('created_at', 'ASC')->get();
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

    public function getProducts($category)
    {
        $this->makeProducts($category);
        return $this->products;
    }
}