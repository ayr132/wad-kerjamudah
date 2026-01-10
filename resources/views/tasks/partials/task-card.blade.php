<div class="bg-gray-50 p-3 rounded border border-gray-200 cursor-move" data-task-id="{{ $task->id }}">
    <h4 class="font-medium text-sm mb-1">{{ $task->title }}</h4>
    @if($task->description)
        <p class="text-xs text-gray-600 mb-2">{{ Str::limit($task->description, 50) }}</p>
    @endif
    <div class="flex justify-end">
        <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Are you sure?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:text-red-800 text-xs">Delete</button>
        </form>
    </div>
</div>