<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects()
            ->with('owner')
            ->get();
        
        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        $this->authorize('view', $project);
        return view('projects.show', compact('project'));
    }

    public function updateStatus(Request $request, Project $project)
    {
        $request->validate([
            'status' => 'required|in:Planning,In Progress,Completed'
        ]);

        $project->users()->updateExistingPivot(auth()->id(), [
            'user_status' => $request->status
        ]);

        return back()->with('success', 'Status updated successfully');
    }
}
