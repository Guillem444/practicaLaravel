<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;


class ProjectPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function edit(User $user, Project $project): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Project $project): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Project $project): bool
    {
        return $user->role === 'admin';
    }

}
