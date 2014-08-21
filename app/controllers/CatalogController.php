<?php

class CatalogController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('csfr', array('on' => 'post'));
    }

	public function index()
	{
		return View::make('catalog')
            ->with('products', Product::all());
	}
}
