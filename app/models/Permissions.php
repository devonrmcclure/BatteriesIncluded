<?php

class Permissions extends Eloquent {

    public function role()
    {
        return $this->hasMany('Role');
    }

    public function user()
    {
    	return $this->hasManyThrough('Users', 'Role');
    }
}