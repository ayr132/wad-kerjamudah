<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $tasks = auth()->user()->tasks()
            ->orderBy('position')
            ->get()
            ->groupBy('status');

        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:To Do,In Progress,Completed'
        ]);

        auth()->user()->tasks()->create($request->all());

        return back()->with('success', 'Task created successfully');
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);

        $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'status' => 'sometimes|in:To Do,In Progress,Completed',
            'position' => 'sometimes|integer'
        ]);

        $task->update($request->all());

        return response()->json(['success' => true]);
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();

        return back()->with('success', 'Task deleted successfully');
    }
}
