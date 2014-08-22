<?php

class Subcategory extends Eloquent {

    public function products()
    {
        return $this->hasMany('Product');
    }

    public function category()
    {
        return $this->belongsTo('Category');
    }
}