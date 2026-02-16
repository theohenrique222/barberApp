<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{
    protected $fillable = [
        'user_id'
    ];
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
