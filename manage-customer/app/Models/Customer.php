<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use HasFactory,Notifiable;
    protected $table = 'customer';
    public $timestamp = false;

    public function city(){
        return $this->belongsTo('App\Models\City');
    }
}
