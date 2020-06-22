<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $guarded = [];

    public function branch()
    {
        return $this->belongsTo(Brench::class, 'branch_id', 'id');
    }

}
