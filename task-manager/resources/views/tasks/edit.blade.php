@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Task</h1>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Task Edit Form -->
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf <!-- CSRF token for security -->
        @method('PUT') <!-- Specify the HTTP method as PUT -->

        <!-- Task Name Input -->
        <div class="form-group mt-3">
            <label for="name">Task Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $task->name) }}" placeholder="Enter task name" required>
        </div>

        <!-- Task Priority Input -->
        <div class="form-group mt-3">
            <label for="priority">Priority:</label>
            <input type="number" class="form-control" id="priority" name="priority" value="{{ old('priority', $task->priority) }}" placeholder="Enter task priority" required min="1">
        </div>

        <!-- Project Selection Dropdown -->
        <div class="form-group mt-3">
            <label for="project_id">Select Project:</label>
            <select class="form-control" id="project_id" name="project_id" required>
                <option value="" disabled>Select a project</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-4">Update Task</button>
    </form>
</div>
@endsection
