<?php

class Questions extends Eloquent {

    public function faq()
    {
        return $this->belongsTo('FAQ');
    }
}