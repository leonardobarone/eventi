<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'user_id',
        'title_it',
        'title_en',
        'description_it',
        'description_en',
        'place',
        'date',
        'phone_1',
        'phone_2',
        'whatsapp_1',
        'whatsapp_2',
        'site',
        'organizer',
        'playbill'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
