<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    function user(){
        return $this->belongsTo(User::class,'id');
    }

    function pizza(){
        return $this->belongsToMany(Pizza::class,'commande_pizza','commande_id','user_id');
    }



}
