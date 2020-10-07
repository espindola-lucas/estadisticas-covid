<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'population'];
    public function statistics()
    {
        return $this->hasMany('App\Models\CovidStatistic');
    }
}
