<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     *
     * @param  \App\Models\User  $user
     * @param  string  $ability
     * @return void|bool
     */
    public function before(User $user, $ability)
    {
        if ($user->isAdminOrManager()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        // todo: change view so users only see projects they are allowed to see
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Project  $project
     * @return mixed
     */
    public function view(User $user, Project $project)
    {
        $array1 = $user->teams->pluck('title')->toArray();
        $array2 = $project->teams->pluck('title')->toArray();

        $result = array_intersect($array1, $array2);

        return count($result) > 0;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @param Project $project
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdminOrManager();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Project  $project
     * @return mixed
     */
    public function update(User $user, Project $project)
    {
        return $user->isAdminOrManager();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Project  $project
     * @return mixed
     */
    public function delete(User $user, Project $project)
    {
        return $user->isAdminOrManager();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  Project  $project
     * @return mixed
     */
    public function restore(User $user, Project $project)
    {
        return $user->isAdminOrManager();
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Project  $project
     * @return mixed
     */
    public function forceDelete(User $user, Project $project)
    {
        return $user->isAdminOrManager();
    }
}
