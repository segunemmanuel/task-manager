@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Manage Tasks</h1>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tasks List -->
    <ul id="taskList" class="list-group mt-4">
        @foreach($tasks as $task)
            <li class="list-group-item" data-id="{{ $task->id }}">
                {{ $task->name }} (Priority: {{ $task->priority }})
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm float-end">Edit</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="float-end me-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>

<!-- Include SortableJS Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>

<!-- JavaScript for Drag-and-Drop Functionality -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var taskList = document.getElementById('taskList');

        // Initialize Sortable
        new Sortable(taskList, {
            animation: 150,
            onEnd: function (/**Event*/evt) {
                // Get task IDs in the new order
                let taskIds = Array.from(taskList.children).map(item => item.dataset.id);

                // Send AJAX request to update task order in the database
                axios.post('{{ route("tasks.reorder") }}', {
                    tasks: taskIds,
                    _token: '{{ csrf_token() }}'
                }).then(response => {
                    console.log('Tasks reordered successfully');
                }).catch(error => {
                    console.error('An error occurred while reordering tasks:', error);
                });
            }
        });
    });
</script>
@endsection
