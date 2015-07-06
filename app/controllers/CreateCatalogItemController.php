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
        return View::make('admin.add.catalog')
                    ->with('categories', $categories);
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
                            ->with('alert-class', 'error');
        } else {
            if($data['parent-category'] == 'selectparentcategory')
            {
                $category = new Category;
                $category->category_name = $data['category-name'];
                $category->parent_id = NULL;
                $category->created_at = Carbon::now();
                $category->updated_at = Carbon::now();
                $category->save();
                return Redirect::to($_ENV['URL'] . '/admin/add')
                                ->with('flash-message', 'Category <b>' . $data['category-name'] . '</b> has been successfully added!')
                            ->with('alert-class', 'success');
            } else {
                    //If there is a parent category, add that.
                    $category = new Category;
                    $category->category_name = $data['category-name'];
                    $category->parent_id = $data['parent-category'];
                    $category->created_at = Carbon::now();
                    $category->updated_at = Carbon::now();
                    $category->save();
                    return Redirect::to($_ENV['URL'] . '/admin/add')
                                    ->with('flash-message', 'Category <b>' . $data['category-name'] . '</b> has been successfully added!')
                                ->with('alert-class', 'success');
            }
        }
    }

    /**
     * Create a Product
     * @return [Redirect] [redirect to the create catalog item index with success or error message]
     */
    public function postCreateProduct()
    {
        $data = Input::all();
        if($data['productcategory-name'] != 'selectproductcategory')
        {
            $productExists = Product::whereproduct_name($data['product-name'])->first();
            $productEmpty  = $data['product-name'];
            $categoryID = Category::find($data['productcategory-name']);
            if($productExists || $productEmpty == '')
            {
                return Redirect::to($_ENV['URL'] . '/admin/add')
                                ->with('flash-message', 'Product already exists or left empty so not added!')
                                ->with('alert-class', 'error')
                                ->withInput();
            } else if($data['product-brand'] == '') {
                return Redirect::to($_ENV['URL'] . '/admin/add')
                                ->with('flash-message', 'Please enter a Brand!')
                                ->with('alert-class', 'error')
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
                $product->category_id = $data['productcategory-name'];
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
                                ->with('alert-class', 'success');
            }
        } else {
            return Redirect::to($_ENV['URL'] . '/admin/add')
                            ->with('flash-message', 'Please select a category!')
                            ->with('alert-class', 'error')
                            ->withInput();
        }
    }
}