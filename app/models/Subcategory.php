<?php

class Subcategory extends Eloquent {

    public function product()
    {
        return $this->hasMany('Product');
    }

    public function category()
    {
        return $this->belongsTo('Category');
    }
}