<?php

class Logs extends Eloquent {

    public function user()
    {
        return $this->belongsTo('User');
    }
}