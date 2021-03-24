<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory /*, Notifiable*/;

    public $timestamps=false;

    protected $hidden=['mdp'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login',
        'mdp',
        'nom',
        'prenom'
    ];

    protected $attributes=['type'=>'user'];

    public function getAuthPassword()
    {
        return $this->mdp;
    }

    public function isAdmin(){
        return $this->type == 'admin';
    }

    public function commande(){
        return $this->hasMany(Commande::class,'user_id');
    }
}
