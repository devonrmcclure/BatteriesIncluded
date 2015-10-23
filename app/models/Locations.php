<?php

class Locations extends Eloquent {

    public function hours()
    {
        return $this->hasMany('Hours');
    }
}