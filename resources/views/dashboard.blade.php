<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Home') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Announcements Section --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-6 p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Announcements</h3>
                </div>
                
                @forelse($announcements as $announcement)
                    <div class="mb-4 pb-4 border-b last:border-b-0">
                        <h4 class="font-semibold text-gray-900">{{ $announcement->title }}</h4>
                        <p class="text-sm text-gray-600 mt-1">{{ $announcement->content }}</p>
                        <div class="text-xs text-gray-500 mt-2">
                            Posted by {{ $announcement->user->name }} • {{ $announcement->created_at->format('d F Y') }}
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm">No announcements yet.</p>
                @endforelse
            </div>

            {{-- Three Column Layout --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- My Projects --}}
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">My Projects</h3>
                        <a href="{{ route('projects.index') }}" class="text-blue-600 hover:text-blue-800 text-sm">View All</a>
                    </div>
                    
                    @forelse($recentProjects as $project)
                        <div class="mb-4 pb-4 border-b last:border-b-0">
                            <h4 class="font-medium text-gray-900 text-sm">{{ $project->title }}</h4>
                            <p class="text-xs text-gray-600 mt-1 line-clamp-2">{{ Str::limit($project->description, 60) }}</p>
                            <div class="text-xs text-gray-500 mt-2">
                                Owner: {{ $project->owner->name }}
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500 text-sm">No projects assigned.</p>
                    @endforelse
                </div>

                {{-- My Tasks --}}
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">My Tasks</h3>
                        <a href="{{ route('tasks.index') }}" class="text-blue-600 hover:text-blue-800 text-sm">View All</a>
                    </div>
                    
                    @forelse($recentTasks as $task)
                        <div class="mb-3 pb-3 border-b last:border-b-0">
                            <div class="flex items-center justify-between">
                                <span class="font-medium text-gray-900 text-sm">{{ $task->title }}</span>
                                <span class="text-xs px-2 py-1 rounded
                                    @if($task->status === 'To Do') bg-red-100 text-red-800
                                    @elseif($task->status === 'In Progress') bg-yellow-100 text-yellow-800
                                    @else bg-green-100 text-green-800
                                    @endif">
                                    {{ $task->status }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500 text-sm">No tasks yet.</p>
                    @endforelse
                </div>

                {{-- Discussions --}}
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Discussions</h3>
                        <a href="{{ route('discussions.index') }}" class="text-blue-600 hover:text-blue-800 text-sm">View All</a>
                    </div>
                    
                    @forelse($recentDiscussions as $discussion)
                        <div class="mb-3 pb-3 border-b last:border-b-0">
                            <div class="font-medium text-gray-900 text-sm">{{ $discussion->user->name }}</div>
                            <p class="text-xs text-gray-600 mt-1">{{ Str::limit($discussion->content, 60) }}</p>
                            @if($discussion->project)
                                <div class="text-xs text-blue-600 mt-1">Project: {{ $discussion->project->title }}</div>
                            @endif
                        </div>
                    @empty
                        <p class="text-gray-500 text-sm">No discussions yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
