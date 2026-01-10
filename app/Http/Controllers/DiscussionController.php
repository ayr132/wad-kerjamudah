<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function index()
    {
        $discussions = Discussion::with(['user', 'project'])
            ->latest()
            ->get();
        
        return view('discussions.index', compact('discussions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'project_id' => 'nullable|exists:projects,id'
        ]);

        auth()->user()->discussions()->create($request->all());

        return back()->with('success', 'Comment posted successfully');
    }

    public function destroy(Discussion $discussion)
    {
        $this->authorize('delete', $discussion);
        $discussion->delete();

        return back()->with('success', 'Comment deleted successfully');
    }
}