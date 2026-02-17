<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;


class ProjectPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function update(User $user, Project $project): bool
{
    return true; // Todos los logueados pueden editar (o comprueba si es dueño)
}

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Project $project): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Project $project): bool
    {
        return $user->role === 'admin';
    }

}
