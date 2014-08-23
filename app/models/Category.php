<?php

class Category extends Eloquent {

    public function product()
    {
        return $this->hasMany('Products');
    }

    public function subcategory()
    {
        return $this->hasMany('Subcategory');
    }
}