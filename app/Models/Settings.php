<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'is_site_active', 'program_status', 'program_end_date',
    ];

    protected $with = ['localeTrans', 'trans'];


    public function localeTrans()
    {
        return $this->hasOne(SettingsTrans::class, 'setting_id', 'id')->where('lang_code', session('locale'));
    }

    public function trans()
    {
        return $this->hasMany(SettingsTrans::class, 'setting_id', 'id');
    }
}
