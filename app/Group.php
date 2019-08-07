<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $visible = ['id', 'name', 'records'];

    public function records()
    {
        return $this->hasMany('App\Record');
    }
}
