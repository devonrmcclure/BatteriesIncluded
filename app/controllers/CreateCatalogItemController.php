<?php

class CreateCatalogItemController extends \BaseController {

    /**
     * Apply a beforeFilter of auth to check if a user is logged in.
     */
    public function __construct()
    {
        $this->beforeFilter('auth');
        $this->beforeFilter('pass_expired');
    }

    /**
     * Show index for creating catalog items (Category, Subcategory, Product)
     * @return [View] [create the view for adding items to the catalog.]
     */
    public function showIndex()
    {
        $categories    = Category::orderBy('category_name', 'ASC')->get();
        $subCategories = Subcategory::orderBy('subcategory_name', 'ASC')->get();
        return View::make('admin.add.catalog')
                    ->with('categories', $categories)
                    ->with('subCategories', $subCategories);
    }

    /**
     * Create a Category.
     * @return [Redirect] [redirect to the create catalog item index with success or error message]
     */
    public function postCreateCategory()
    {
        $data = Input::all();
        $categoryExists = Category::wherecategory_name($data['category-name'])->first();
        $categoryEmpty  = $data['category-name'];
        if($categoryExists || $categoryEmpty == '')
        {
            return Redirect::to($_ENV['URL'] . '/admin/add')
                            ->with('flash-message', 'Category already exists or left empty so not added!')
                            ->with('alert-class', 'alert-danger');
        } else {
            $category = new Category;
            $category->category_name = $data['category-name'];
            $category->created_at = Carbon::now();
            $category->updated_at = Carbon::now();
            $category->save();
            return Redirect::to($_ENV['URL'] . '/admin/add')
                            ->with('flash-message', 'Category <b>' . $data['category-name'] . '</b> has been successfully added!')
                            ->with('alert-class', 'alert-success');
        }
    }

    /**
     * Create a Subcategory
     * @return [Redirect] [redirect to the create catalog item index with success or error message]
     */
    public function postCreateSubcategory()
    {
        $data = Input::all();
        if($data['parentcategory-name'] != 'selectparentcategory')
        {
            $subcategoryExists = Subcategory::wheresubcategory_name($data['subcategory-name'])->first();
            $subCategoryEmpty  = $data['subcategory-name'];
            if($subcategoryExists || $subCategoryEmpty == '')
            {
                return Redirect::to($_ENV['URL'] . '/admin/add')
                                ->with('flash-message', 'Subcategory already exists or left empty so not added!')
                                ->with('alert-class', 'alert-danger')
                                ->withInput();
            } else {
                $subCategory = new Subcategory;
                $subCategory->parent_category = $data['parentcategory-name'];
                $subCategory->subcategory_name = $data['subcategory-name'];
                $subCategory->created_at = Carbon::now();
                $subCategory->updated_at = Carbon::now();
                $subCategory->save();
                return Redirect::to($_ENV['URL'] . '/admin/add')
                                ->with('flash-message', 'Subcategory <b>' . $data['subcategory-name'] . '</b> has been successfully added!')
                                ->with('alert-class', 'alert-success');
            }
        } else {
            return Redirect::to($_ENV['URL'] . '/admin/add')
                            ->with('flash-message', 'Please select a parent category!')
                            ->with('alert-class', 'alert-danger')
                            ->withInput();
        }
    }

    /**
     * Create a Product
     * @return [Redirect] [redirect to the create catalog item index with success or error message]
     */
    public function postCreateProduct()
    {
        $data = Input::all();
        if($data['productsubcategory-name'] != 'selectproductsubcategory')
        {
            $productExists = Product::whereproduct_name($data['product-name'])->first();
            $productEmpty  = $data['product-name'];
            $categoryID = Subcategory::find($data['productsubcategory-name']);
            if($productExists || $productEmpty == '')
            {
                return Redirect::to($_ENV['URL'] . '/admin/add')
                                ->with('flash-message', 'Product already exists or left empty so not added!')
                                ->with('alert-class', 'alert-danger')
                                ->withInput();
            } else if($data['product-brand'] == '') {
                return Redirect::to($_ENV['URL'] . '/admin/add')
                                ->with('flash-message', 'Please enter a Brand!')
                                ->with('alert-class', 'alert-danger')
                                ->withInput();
            } else {
                //Upload File
                if($file = Input::file('image'))
                {
                    $destinationPath = 'img/catalog/';
                    $filename = $file->getClientOriginalName();
                    $uploadSuccess = Input::file('image')->move($destinationPath, $filename);
                } else {
                    $filename = 'no_image.png';
                }
                $product = new Product;
                $product->category_id = $categoryID->parent_category;
                $product->subcategory_id = $data['productsubcategory-name'];
                $product->product_name = $data['product-name'];
                $product->product_description = $data['product-description'];
                $product->brand = $data['product-brand'];
                $product->quantity = $data['product-quantity'];
                $product->price = $data['product-price'];
                $product->image = $filename;
                $product->created_at = Carbon::now();
                $product->updated_at = Carbon::now();
                $product->save();
                return Redirect::to($_ENV['URL'] . '/admin/add')
                                ->with('flash-message', 'Product <b>' . $data['product-name'] . '</b> has been successfully added!')
                                ->with('alert-class', 'alert-success');
            }
        } else {
            return Redirect::to($_ENV['URL'] . '/admin/add')
                            ->with('flash-message', 'Please select a subcategory!')
                            ->with('alert-class', 'alert-danger')
                            ->withInput();
        }
    }
}