<?php

class SearchController extends \BaseController {

    /**
     * Get results from search query and return them to the users.
     * @return [View] [create a view with returned results.]
     */
    public function getResults()
    {
        $search = Input::get('search');
        if($search == '')
        {
            return Redirect::to($_ENV['URL'] . '/catalog');
        } else {
            $products = Product::where('product_name', 'LIKE', '%'.$search.'%')->paginate(9);
            $categories = Category::orderby('category_name', 'ASC')->get();

            return View::make('search.results')
                ->with('products', $products)
                ->with('categories', $categories)
                ->with('search', $search);
        }
    }
}