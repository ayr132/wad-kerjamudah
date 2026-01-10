<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Discussions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Post Comment Form --}}
                <div class="mb-6 pb-6 border-b">
                    <h3 class="text-lg font-semibold mb-4">Post a Comment</h3>
                    <form action="{{ route('discussions.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <textarea name="content" rows="3" required placeholder="Share your thoughts..."
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                        </div>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Post Comment
                        </button>
                    </form>
                </div>

                {{-- Discussion List --}}
                <h3 class="text-lg font-semibold mb-4">All Discussions</h3>
                <div class="space-y-4">
                    @forelse($discussions as $discussion)
                        <div class="border-l-4 border-blue-500 pl-4 py-3">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <div class="font-semibold text-gray-900">{{ $discussion->user->name }}</div>
                                    <p class="text-gray-700 mt-2">{{ $discussion->content }}</p>
                                    @if($discussion->project)
                                        <div class="text-sm text-blue-600 mt-2">
                                            Project: {{ $discussion->project->title }}
                                        </div>
                                    @endif
                                    <div class="text-xs text-gray-500 mt-2">
                                        {{ $discussion->created_at->diffForHumans() }}
                                    </div>
                                </div>
                                @can('delete', $discussion)
                                    <form action="{{ route('discussions.destroy', $discussion) }}" method="POST" 
                                        onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 text-sm ml-4">
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500 text-center py-8">No discussions yet. Start the conversation!</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>