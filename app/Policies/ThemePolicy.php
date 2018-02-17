<?php

namespace App\Policies;

use App\User;
use App\Theme;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThemePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(User $user)
    {
        return $user->admin==1;
    }

    public function update(User $user)
    {
      return $user->admin==1;
    }

    public function delete(User $user)
    {
        return $user->admin==1;
    }
}
