<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    // protected $hidden = ['id', 'created_at'];
    protected $visible = ['id', 'cost', 'date', 'type', 'group_id', 'comment', 'updated_at'];
    protected $filliable  = [""];

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

}
