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
        // Get all category names and order them Alphabetically.
        $data = Category::orderBy('category_name', 'ASC')->get();

        // Get all subcategories for a parent category for linking purposes.
        foreach($data as $i)
        {
            $subCatLinks = Subcategory::orderBy('subcategory_name', 'ASC')->whereparent_category($i->id)->get();
        }

		return View::make('catalog')
            ->with('products', Product::orderBy('created_at', 'DESC')->paginate(9))
            ->with('categories', $data)
            ->with('subCategories', NULL) // Must be null for if statements in catalog view.
            ->with('subCategoryLinks', $subCatLinks)
            ->with('categoryLinks', $data);

	}

    /**
     * Show all products for a specific category.
     * @param  [string] $category [pass in the category to be able to get all the sub categories and products in that category]
     * @return [View]           [create the view with the applicable products]
     */
    public function showCategory($category)
    {
        /*
            If the passed in $category is equal to a Category Name, show all products in that Parent Category, and show links on the left for Subcategories with that $category as a Parent Category.
         */
        if(count(Category::wherecategory_name($category)->get()) != 0)
        {
            $categoryLinks = Category::orderBy('category_name', 'ASC')->get();
            $data = Category::wherecategory_name($category)->get();

            foreach($data as $i)
            {
                $subCatLinks = Subcategory::orderBy('subcategory_name', 'ASC')->whereparent_category($i->id)->get();
            }
            foreach($data as $i)
            {
                $products = Product::orderBy('product_name', 'ASC')->wherecategory_id($i->id)->paginate(9);
            }
            return View::make('catalog')
                ->with('products', $products)
                ->with('categories', $data)
                ->with('subCategories', NULL)
                ->with('subCategoryLinks', $subCatLinks)
                ->with('categoryLinks', $categoryLinks);

            /*
                If the passed in $category is equal to a Subcategory get and show all Products in that Subcategory with links on the left of other Subcategories in the Parent Category.
             */
        } elseif(count(Subcategory::wheresubcategory_name($category)->get()) != 0)
        {
            $categoryLinks = Category::orderBy('category_name', 'ASC')->get();
            $data = Subcategory::wheresubcategory_name($category)->get();

            foreach($data as $i)
            {
                $subCatLinks = Subcategory::orderBy('subcategory_name', 'ASC')->whereparent_category($i->parent_category)->get();
            }
            foreach($data as $i)
            {
                $parentCat = Category::whereid($i->parent_category)->get();
            }
            foreach($data as $i)
            {
                $products = Product::orderBy('product_name', 'ASC')->wheresubcategory_id($i->id)->paginate(9);
            }

            return View::make('catalog')
                ->with('products', $products)
                ->with('categories', $parentCat)
                ->with('subCategories', $data)
                ->with('subCategoryLinks', $subCatLinks)
                ->with('categoryLinks', $categoryLinks);
        } else {
            // Redirect to main page if category/subcategory doesn't exist.
            return Redirect::to($_ENV['URL'] . '/catalog');
        }
    }
}
