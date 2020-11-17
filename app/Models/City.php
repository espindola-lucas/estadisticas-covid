<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'population', 'image', 'user_id'];
    
    public function statistics()
    {
        return $this->hasMany('App\Models\CovidStatistic');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
