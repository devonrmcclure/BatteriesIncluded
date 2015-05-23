<?php

class CatalogController extends \BaseController {

    /**
     * Apply a beforeFilter of csfr to prevent csfr.
     */
    public function __construct()
    {
        $this->beforeFilter('csfr', array('on' => 'post'));
    }

    /**
     * Show the catalog index page sorting products by most recently added.
     * @return [View] [views/catalog/]
     */
	public function showIndex()
	{
        $menuItems = Category::orderBy('category_name', 'ASC')->whereparent_id(NULL)->get();
        $menu = new CatalogMenuController;
        $menu = $menu->drawMenu($menuItems);

        $category = NULL;
        $products = new ProductsController;
        $products = $products->getProducts($category);

		return View::make('catalog')
            ->with('menu', $menu)
            ->with('products', $products);
	}

    /**
     * Show all products for a specific category.
     * @param  [string] $category [pass in the category to be able to get all the sub categories and products in that category]
     * @return [View]           [create the view with the applicable products]
     */
    public function showCategory($category)
    {
        $menuItems = Category::orderBy('category_name', 'ASC')->wherecategory_name($category)->get();
        if(count($menuItems) == 0)
            {
                return View::make('404');
            }
        $menu = new CatalogMenuController;
        $menu = $menu->drawMenu($menuItems);

        $category = Category::orderBy('category_name', 'ASC')->wherecategory_name($category)->get();
        $crumbs = new BreadcrumbsController;
        $crumbs = $crumbs->drawBreadcrumbs($category);

        $products = new ProductsController;
        $products = $products->getProducts($category);

        /*echo '<pre>';
        var_dump($products);
        echo '</pre>';
        die;*/

        // TODO: Create a class to get all products from all sub categories. So essentially add a query of products to the breadcrumbs code.

        return View::make('catalog')
            ->with('menu', $menu)
            ->with('breadcrumbs', $crumbs)
            ->with('category', $category)
            ->with('products', $products);
    }



}
