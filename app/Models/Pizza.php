<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    public $fillable=['nom','description','prix'];

    function commande(){
        return $this->belongsToMany(Commande::class,'commande_pizza','pizza_id','commande_id');
    }
}
