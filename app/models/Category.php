<?php

class Category extends Eloquent {

    public function products()
    {
        return $this->hasMany('Products');
    }

    public function subCategories()
    {
        return $this->hasMany('Subcategory');
    }
}