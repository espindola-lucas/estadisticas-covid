<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CovidStatistic extends Model
{
    use HasFactory;

    protected $fillable = ['cases', 'dead', 'created_at', 'city_id', 'user_id'];

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
