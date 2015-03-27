<?php

class FAQ extends Eloquent {

    protected $table = 'faq';

    public function faq()
    {
        return $this->hasMany('Questions');
    }
}