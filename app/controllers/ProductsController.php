<?php

class ProductsController extends \BaseController {

    public function index() {
        $products = Product::orderBy('created_at', 'DESC')->get();

        return View::make('admin.manage.products')
                ->with('products', $products);
    }

    public function create() {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        return View::make('admin.add.product')
                ->with('categories', $categories);
    }

    public function store() {
        $data = Input::all();

        if($data['productcategory-id'] != 'selectproductcategory' && $data['product-brand'] != '' && $data['product-name'] != '') {
            //Check if product is already created.
            if(Product::whereproduct_name($data['product-name'])->first()) {
                return Redirect::to($_ENV['URL'] . '/admin/products/create')
                                ->with('alert-class', 'error')
                                ->with('flash-message', 'Product already exists!')
                                ->withInput();
            }

            //Check if a file is being uploaded
            if($file = Input::file('image'))
            {
                $destinationPath = 'img/catalog/';
                $filename = $file->getClientOriginalName();
                $uploadSuccess = Input::file('image')->move($destinationPath, $filename);
            } else {
                $filename = 'no_image.png';
            }

            if(isset($data['featured']))
            {
                $featured = Carbon::now();
            } else {
                $featured = '0000-00-00 00:00:00';
            }


            //Upload the Product.
            $product = new Product;
            $product->category_id = $data['productcategory-id'];
            $product->product_name = $data['product-name'];
            $product->product_description = $data['product-description'];
            $product->brand = $data['product-brand'];
            $product->quantity = $data['product-quantity'];
            $product->price = $data['product-price'];
            $product->image = $filename;
            $product->featured = $featured;
            $product->created_at = Carbon::now();
            $product->updated_at = Carbon::now();
            $product->save();

            return Redirect::to($_ENV['URL'] . '/admin/products')
                            ->with('alert-class', 'success')
                            ->with('flash-message', 'Product <b>' . $data['product-name'] . '</b> has been successfully added!');


        } elseif($data['product-name'] == '') {
            return Redirect::to($_ENV['URL'] . '/admin/products/create')
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'Please enter a product name!')
                            ->withInput();
        } elseif($data['productcategory-id'] == 'selectproductcategory') {
            return Redirect::to($_ENV['URL'] . '/admin/products/create')
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'Please enter a category!')
                            ->withInput();
        } elseif($data['product-brand'] == '') {
            return Redirect::to($_ENV['URL'] . '/admin/products/create')
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'Please enter a brand!')
                            ->withInput();

        } else {
            return Redirect::to($_ENV['URL'] . '/admin/products/add')
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'Unknown error!')
                            ->withInput();
        }
    }

    public function edit($id) {
        $product    = Product::find($id);
        $categories = Category::orderBy('category_name', 'ASC')->get();

        return View::make('admin.edit.product')
                ->with('product', $product)
                ->with('categories', $categories);
    }

    /**
     * Update the product with the input data.
     * @param  [int] $id [ID of the product in the database]
     * @return [Redirect]     [redirect back to the products index page with a success or error message]
     */
    public function update($id)
    {

        $data = Input::all();
        $product = Product::find($id);

        if($data['product-brand'] != '' && $data['product-name'] != '') {

            if($data['productcategory-id'] != 'selectproductcategory') {
                $product->category_id = $data['productcategory-id'];
            }

            //Check if a file is being uploaded
            if($file = Input::file('image'))
            {
                $destinationPath = 'img/catalog/';
                $filename = $file->getClientOriginalName();
                $uploadSuccess = Input::file('image')->move($destinationPath, $filename);
            } else {
                $filename = $product->image;
            }

            if(isset($data['featured']))
            {
                $featured = Carbon::now();
            } else {
                $featured = '0000-00-00 00:00:00';
            }


            //Upload the Product.
            $product->product_name = $data['product-name'];
            $product->product_description = $data['product-description'];
            $product->brand = $data['product-brand'];
            $product->quantity = $data['product-quantity'];
            $product->price = $data['product-price'];
            $product->image = $filename;
            $product->featured = $featured;
            $product->updated_at = Carbon::now();
            $product->save();

            return Redirect::to($_ENV['URL'] . '/admin/products')
                            ->with('alert-class', 'success')
                            ->with('flash-message', 'Product <b>' . $data['product-name'] . '</b> has been successfully updated!');


        } elseif($data['product-name'] == '') {
            return Redirect::to($_ENV['URL'] . '/admin/products/'. $product->id . '/edit')
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'Please enter a product name!')
                            ->withInput();
        }elseif($data['product-brand'] == '') {
            return Redirect::to($_ENV['URL'] . '/admin/products/'. $product->id . '/edit')
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'Please enter a brand!')
                            ->withInput();

        } else {
            return Redirect::to($_ENV['URL'] . '/admin/products/'. $product->id . '/edit')
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'Unknown error!')
                            ->withInput();
        }
    }

    public function show($id) {
        $product = Product::find($id);
        $oldName = $product->product_name;
        $product->delete();
        return Redirect::to($_ENV['URL'] . '/admin/products')
                        ->with('alert-class', 'success')
                        ->with('flash-message', 'Product <b>' . $oldName . '</b> has been deleted!');
    }


    /* To be removed
    */
    public $product;
    public $products = array();
    public $productCount = array();

    // Get products for displaying.
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

    // Get the count of products
    public function productCount($categories = '')
    {
        foreach($categories as $category)
        {
            $this->productCount[$category->category_name] = count(Product::wherecategory_id($category->id)->get());
        }
        /*echo '<pre>';
        var_dump($this->productCount);
        echo '</pre>';
        die;*/
        return $this->productCount;
    }

    public function getProductByID($id)
    {
        $product = Product::whereid($id)->first();

        return $product;
    }
}