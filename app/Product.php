<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function sub_group()
    {
        return $this->belongsTo(Group::class, 'sub_group_id', 'id');
    }


}
