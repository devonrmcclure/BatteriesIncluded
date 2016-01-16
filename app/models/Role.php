<?php

class Role extends Eloquent {

    public function users()
    {
        return $this->hasOne('User');
    }

    public function permissions()
    {
        return $this->hasMany('Permissions');
    }
}