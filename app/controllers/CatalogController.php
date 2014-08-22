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
            ->with('categories', $data);

	}
}
