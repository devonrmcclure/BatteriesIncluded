<?php

class CatalogController extends \BaseController {

    public $text = '';
    public $crumbs = array();

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
        $menu = $this->drawMenu($menuItems);

        $products = Product::orderBy('created_at', 'DESC')->take(12)->get();
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
        $menu = $this->drawMenu($menuItems);

        $categories = Category::orderBy('category_name', 'ASC')->wherecategory_name($category)->get();
        $crumbs = $this->drawBreadcrumbs($categories);

        $products = $this->getProducts($categories);

        /*foreach($categories as $cat)
        {
            $this->products[] = Product::wherecategory_id($cat->id)->get();
        }*/

        return View::make('catalog')
            ->with('menu', $menu)
            ->with('breadcrumbs', $crumbs)
            ->with('category', $category)
            ->with('products', $products);
    }

    public function showSingleProduct($slug) {
        $menuItems = Category::orderBy('category_name', 'ASC')->whereparent_id(NULL)->get();
        $menu = $this->drawMenu($menuItems);

        $product = Product::whereslug($slug)->first();

        return View::make('catalog')
            ->with('menu', $menu)
            ->with('product', $product)
            ->with('singleProduct', true);
    }

    function hasChildren($parent)
    {
        if(count(Category::whereparent_id($parent->id)->get()) > 0)
        {

            return true;
        } else {
            return false;
        }
    }

    function drawMenu($items)
    {
        foreach($items as $item)
        {

            //var_dump($productCount);
            $this->text .= "<li class=\"catalog-nav-item\"><a href=\"/catalog/" . $item->category_name . "\">" . $item->category_name . "</a>";
                if($this->hasChildren($item))
                {
                    $this->text .= "<ul class=\"list-group-inner\">";
                    $this->drawMenu(Category::whereparent_id($item->id)->orderBy('category_name', 'ASC')->get());
                    $this->text .= "</ul>";
                }
            $this->text .= "</li>";
        }

        return $this->text;
    }

    public function drawBreadcrumbs($category)
    {

        foreach($category as $crumb)
        {
            //Is it a top level category?
            if(!$crumb->parent_id)
            {
                $this->crumbs[] = "<li><a href=\"/catalog/" . $crumb->category_name . "\">" . $crumb->category_name . "</a></li>";
            } else {
                // If it's not a top level category, get the parent categor(ies).
                $parent = Category::whereid($crumb->parent_id)->get();
                $this->crumbs[] = "<li><a href=\"/catalog/" . $crumb->category_name . "\">" . $crumb->category_name . "</a></li>";
                // Loop through all categories.
                $this->drawBreadcrumbs($parent);
            }
        }
        return $this->crumbs;
    }

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
}