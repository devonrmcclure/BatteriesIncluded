<?php

class CatalogController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('csfr', array('on' => 'post'));
    }

	public function index()
	{
        $data = Category::orderBy('category_name', 'ASC')->get(); // Get all category names and order them Alphabetically.
		return View::make('catalog')
            ->with('products', Product::all())
            ->with('categories', $data)
            ->with('categoryLinks', $data);

	}

    public function showCategory($category)
    {
        $products;
        $categoryLinks = Category::orderBy('category_name', 'ASC')->get();
        $data = Category::wherecategory_name($category)->get();
        foreach($data as $i)
        {
          $products = Product::wherecategory_id($i->id)->get();
        }
        return View::make('catalog')
            ->with('products', $products)
            ->with('categories', $data)
            ->with('categoryLinks', $categoryLinks);
    }
}
