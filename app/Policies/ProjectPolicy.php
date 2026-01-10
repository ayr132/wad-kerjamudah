<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;

class ProjectPolicy
{
    public function view(User $user, Project $project)
    {
        return $project->users->contains($user) || $project->owner_id === $user->id;
    }
}
