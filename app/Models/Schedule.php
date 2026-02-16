<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'barber_id'
    ];
    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }
}
