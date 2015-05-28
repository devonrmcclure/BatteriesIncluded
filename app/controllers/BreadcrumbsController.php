<?php

class BreadcrumbsController extends \BaseController {

    public $crumbs = array();

    public function drawBreadcrumbs($category)
    {

        foreach($category as $crumb)
        {
            //Is it a top level category?
            if(!$crumb->parent_id)
            {
                $this->crumbs[] = "<li><a href=\"" . $_ENV['URL'] . "/catalog/" . $crumb->category_name . "\">" . $crumb->category_name . "</a>";
            } else {
                // If it's not a top level category, get the parent categor(ies).
                $parent = Category::whereid($crumb->parent_id)->get();
                $this->crumbs[] = "<li><a href=\"" . $_ENV['URL'] . "/catalog/" . $crumb->category_name . "\">" . $crumb->category_name . "</a>";
                // Loop through all categories.
                $this->drawBreadcrumbs($parent);
            }
        }
        return $this->crumbs;
    }
}