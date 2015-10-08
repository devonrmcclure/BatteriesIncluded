<?php

class Hours extends Eloquent {

    public function locations()
    {
        return $this->belongsTo('locations');
    }
}