<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barbershop extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function barbers()
    {
        return $this->hasMany(Barber::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'user_id',
        'logo',
        'cover_image',
        'city',
        'state',
        'zip_code'
    ];
}
