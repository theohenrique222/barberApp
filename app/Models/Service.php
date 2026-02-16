<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name', 
        'description', 
        'price'
    ];
    public function barbers()
    {
        return $this->belongsToMany(Barber::class);
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
