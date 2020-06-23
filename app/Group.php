<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded = [];

    public function subGroup()
    {
        return $this->hasMany(Group::class, 'group_id', 'id');

    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
}
