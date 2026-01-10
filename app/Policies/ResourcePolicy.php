<?php

namespace App\Policies;

use App\Models\Resource;
use App\Models\User;

class ResourcePolicy
{
    public function delete(User $user, Resource $resource)
    {
        return $user->id === $resource->user_id;
    }
}
