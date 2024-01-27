<?php

namespace App\Policies;

use App\Models\Tsirp;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TsirpPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Tsirp $tsirp
     * @return Response|bool
     */
    public function view(User $user, Tsirp $tsirp)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Tsirp $tsirp
     * @return Response|bool
     */
    public function delete(User $user, Tsirp $tsirp)
    {
        //
        return $this->update($user, $tsirp);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Tsirp $tsirp
     * @return Response|bool
     */
    public function update(User $user, Tsirp $tsirp)
    {
        //
        return $tsirp->user()->is($user);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Tsirp $tsirp
     * @return Response|bool
     */
    public function restore(User $user, Tsirp $tsirp)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Tsirp $tsirp
     * @return Response|bool
     */
    public function forceDelete(User $user, Tsirp $tsirp)
    {
        //
    }
}
