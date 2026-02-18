<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'barber_id',
        'date',
        'start_time',
        'end_time',
        'interval_minutes'
    ];
    protected $casts = [
        'date' => 'date',
        'start_time' => 'datetime:H:i:s',
        'end_time' => 'datetime:H:i:s',
    ];
    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }
    public function appointment()
    {
        return $this->hasOne(Appointment::class);
    }
}
