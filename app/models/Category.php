<?php

class Category extends Eloquent {

    public function products()
    {
        return $this->hasMany('Products');
    }

    public function subcategory()
    {
        return $this->hasMany('Subcategory');
    }
}