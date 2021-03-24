<?php

namespace App\Policies;

use App\Models\Commande;
use App\Models\Pizza;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PizzaPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function view()
    {
        return true;
    }

    public function create(User $user){
        return $user->isAdmin();
    }

    public function update(User $user){
        return $user->isAdmin() ;
    }

    public function delete(User $user,){
        return $user->isAdmin();
    }
}
