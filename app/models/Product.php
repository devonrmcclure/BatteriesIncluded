<?php

class Product extends Eloquent {

    public function category()
    {
        return $this->belongsTo('Category');
    }

    public function subcategory()
    {
        return $this->belongsTo('Subcategory');
    }
}