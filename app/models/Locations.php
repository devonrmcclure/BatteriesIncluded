<?php

class Locations extends Eloquent {

    public function locations()
    {
        return $this->hasMany('Hours');
    }
}