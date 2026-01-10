<?php
// database/seeders/TestDataSeeder.php
namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\Announcement;
use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    public function run()
    {
        // Create users
        $owner = User::factory()->create([
            'name' => 'Ahmad Faris',
            'email' => 'owner@example.com'
        ]);

        $user = User::factory()->create([
            'name' => 'Nur Aisyah',
            'email' => 'user@example.com'
        ]);

        // Create project
        $project = Project::create([
            'title' => 'EduConnect Web Platform Development',
            'description' => 'Development of a collaborative web-based platform...',
            'owner_id' => $owner->id,
            'status' => 'In Progress'
        ]);

        // Assign user to project
        $project->users()->attach($user->id, ['user_status' => 'In Progress']);

        // Create announcement
        Announcement::create([
            'title' => 'System Update & Project Reminder',
            'content' => 'Please be reminded that all project members should update their task progress by Friday...',
            'user_id' => $owner->id
        ]);
    }
}
