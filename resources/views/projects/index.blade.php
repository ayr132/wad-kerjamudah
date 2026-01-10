<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @forelse($projects as $project)
                        <div class="border rounded-lg p-6 hover:shadow-lg transition">
                            <h3 class="text-lg font-bold mb-2">{{ $project->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ $project->description }}</p>
                            
                            <div class="mb-3">
                                <span class="text-sm text-gray-500">Owner: </span>
                                <span class="text-sm font-medium">{{ $project->owner->name }}</span>
                            </div>

                            <div class="mb-4">
                                <span class="text-sm text-gray-500">Status: </span>
                                <span class="text-sm font-medium">{{ $project->pivot->user_status }}</span>
                            </div>

                            <form action="{{ route('projects.update-status', $project) }}" method="POST" class="flex gap-2">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="Planning" {{ $project->pivot->user_status === 'Planning' ? 'selected' : '' }}>Planning</option>
                                    <option value="In Progress" {{ $project->pivot->user_status === 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="Completed" {{ $project->pivot->user_status === 'Completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                    Update
                                </button>
                            </form>
                        </div>
                    @empty
                        <div class="col-span-2 text-center py-12">
                            <p class="text-gray-500">No projects assigned to you yet.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>