<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\Discussion;
use App\Models\Announcement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        $announcements = Announcement::with('user')
            ->latest()
            ->take(3)
            ->get();
        
        $recentProjects = $user->projects()
            ->with('owner')
            ->latest()
            ->take(2)
            ->get();
        
        $recentTasks = $user->tasks()
            ->latest()
            ->take(3)
            ->get();
        
        $recentDiscussions = Discussion::with(['user', 'project'])
            ->latest()
            ->take(3)
            ->get();
        
        return view('dashboard', compact(
            'announcements',
            'recentProjects',
            'recentTasks',
            'recentDiscussions'
        ));
    }
}
