<?php

class FAQ extends Eloquent {

    public function faq()
    {
        return $this->hasMany('Questions');
    }
}