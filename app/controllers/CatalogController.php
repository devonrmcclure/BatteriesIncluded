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

        $products = new ProductsController;
        $products = $products->getProducts(NULL, 12);

        $featured = Product::orderBy('featured', 'DESC')->first();

		return View::make('catalog')
            ->with('menu', $menu)
            ->with('products', $products)
            ->with('featured', $featured);
	}

    /**
     * Show all products for a specific category.
     * @param  [string] $category [pass in the category to be able to get all the sub categories and products in that category]
     * @return [View]           [create the view with the applicable products]
     */
    public function showCategory($category)
    {
        $menuItems = Category::orderBy('category_name', 'ASC')->whereparent_id(NULL)->get();
        $menu = new CatalogMenuController;
        $menu = $menu->drawMenu($menuItems);

        $categories = Category::orderBy('category_name', 'ASC')->wherecategory_name($category)->get();
        $crumbs = new BreadcrumbsController;
        $crumbs = $crumbs->drawBreadcrumbs($categories);

        $products = new ProductsController;
        $products = $products->getProducts($categories);

        return View::make('catalog')
            ->with('menu', $menu)
            ->with('breadcrumbs', $crumbs)
            ->with('category', $category)
            ->with('products', $products);
    }

    public function showSingleProduct($id) {
        $menuItems = Category::orderBy('category_name', 'ASC')->whereparent_id(NULL)->get();
        $menu = new CatalogMenuController;
        $menu = $menu->drawMenu($menuItems);

        $product = Product::whereid($id)->first();

        return View::make('catalog')
            ->with('menu', $menu)
            ->with('product', $product)
            ->with('singleProduct', true);
    }


}
