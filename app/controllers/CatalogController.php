<?php

class CatalogController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('csfr', array('on' => 'post'));
    }

	public function index()
	{
        $data = Category::orderBy('category_name', 'ASC')->get(); // Get all category names and order them Alphabetically.

        foreach($data as $i)
        {
            $subCatLinks = Subcategory::orderBy('subcategory_name', 'ASC')->whereparent_category($i->id)->get();
        }

		return View::make('catalog')
            ->with('products', Product::paginate(16))
            ->with('categories', $data)
            ->with('subCategories', NULL)
            ->with('subCategoryLinks', $subCatLinks)
            ->with('categoryLinks', $data);

	}

    public function showCategory($category)
    {

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
                $products = Product::orderBy('product_name', 'ASC')->wherecategory_id($i->id)->paginate(16);
            }
            return View::make('catalog')
                ->with('products', $products)
                ->with('categories', $data)
                ->with('subCategories', NULL)
                ->with('subCategoryLinks', $subCatLinks)
                ->with('categoryLinks', $categoryLinks);

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
                $products = Product::orderBy('product_name', 'ACS')->wheresubcategory_id($i->id)->paginate(16);
            }

            return View::make('catalog')
                ->with('products', $products)
                ->with('categories', $parentCat)
                ->with('subCategories', $data)
                ->with('subCategoryLinks', $subCatLinks)
                ->with('categoryLinks', $categoryLinks);
        } else {
            // 404 error.
            return 'Hi';
        }
    }
}
