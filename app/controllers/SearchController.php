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
            return Redirect::to('/catalog');
        } else {
            $products[] = Product::where('product_name', 'LIKE', "%$search%", 'OR');
            $products[] = Product::where('product_description', 'LIKE', "%$search%")->get();

            $menuItems = Category::orderBy('category_name', 'ASC')->whereparent_id(NULL)->get();
            $menu = new CatalogController;
            $menu = $menu->drawMenu($menuItems);

            return View::make('search.results')
                ->with('products', $products)
                ->with('menu', $menu)
                ->with('search', $search);
        }
    }
}