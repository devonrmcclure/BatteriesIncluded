<?php

/**
 * This class does not control a page. It is used by CatalogController.php to generate the
 * navigation based on what page the use is on.
 */


class CatalogMenuController extends \BaseController {

    public $text = '';
    public $productCount;

    function hasChildren($parent)
    {
        if(count(Category::whereparent_id($parent->id)->get()) > 0)
        {

            return true;
        } else {
            return false;
        }
    }

    function getChildren()
    {
        return Category::whereparent_id($item->id);
    }

    function drawMenu($items)
    {
        // Loop through each item and generate the navigation.
        $productCount = new ProductsController;
        $productCount = $productCount->productCount($items);
        foreach($items as $item)
        {

            //var_dump($productCount);
            $this->text .= "<li class=\"catalog-nav-item\"><a href=\"" . $_ENV['URL'] . "/catalog/" . $item->category_name . "\">" . $item->category_name ." (" . $productCount[$item->category_name] . ")</a>";
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
}