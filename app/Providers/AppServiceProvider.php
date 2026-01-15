<?php

namespace App\Providers;

use App\Models\Task;
use App\Models\Project;
use App\Models\Discussion;
use App\Models\Resource;
use App\Policies\TaskPolicy;
use App\Policies\ProjectPolicy;
use App\Policies\DiscussionPolicy;
use App\Policies\ResourcePolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Task::class, TaskPolicy::class);
        Gate::policy(Project::class, ProjectPolicy::class);
        Gate::policy(Discussion::class, DiscussionPolicy::class);
        Gate::policy(Resource::class, ResourcePolicy::class);
    }
}
