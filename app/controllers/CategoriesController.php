 <?php

class CategoriesController extends \BaseController {

    /**
     * Apply a before filter to check if a user is logged in.
     */
    public function __construct()
    {
        $this->beforeFilter('auth');
        $this->beforeFilter('pass_expired');
    }


    public function index()
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();

        foreach($categories as $category) {
            $child = $category->category_name;

            if(isset($category->parent_id)) {
                $parent = Category::find($category->parent_id);
                $parentCategories[$child]['parent'] = $parent->category_name;
            } else {
                $parentCategories[$child]['parent'] = NULL;
            }
        }

        return View::make('admin.manage.categories')
                    ->with('categories', $categories)
                    ->with('parentCategories', $parentCategories);
    }

    public function create() {}

    public function store() {}

    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::orderBy('category_name', 'ASC')->get();
        return View::make('admin.edit.category')
                    ->with('category', $category)
                    ->with('categories', $categories);
    }

    /**
     * Update the category name in the database.
     * @return [Redirect] [Redirect to the categories edit page with a success or error message.]
     */
    public function update($id)
    {
        $data = Input::all();
        $category = Category::find($id);

        if($data['category-name'] != '')
        {
            // If the Parent Category is anything other than "Select Parent Category", update that as well.
            if($data['parentcategory-id'] != 'selectparentcategory') {
                $category->parent_id = $data['parentcategory-id'];
            }
            $oldName  = $category->category_name;
            $category->category_name = $data['category-name'];
            $category->updated_at = Carbon::now();
            $category->save();

            return Redirect::to($_ENV['URL'] . '/admin/categories')
                            ->with('alert-class', 'success')
                            ->with('flash-message', 'The category <b>' . $oldName . '</b> was successfully updated to <b>' . $category->category_name . '</b>!');
        } else {
            return Redirect::to($_ENV['URL'] . '/admin/categories/' . $id . '/edit')
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'You can not have an empty category name!');
        }
    }
}