@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Create Task</h1>
    <!-- Task creation form -->
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <!-- Task Name Input -->
        <div class="form-group mt-3">
            <label for="name">Task Name:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter task name" required>
        </div>

        <!-- Task Priority Input -->
        <div class="form-group mt-3">
            <label for="priority">Priority:</label>
            <input type="number" class="form-control" id="priority" name="priority" placeholder="Enter task priority" required min="1">
        </div>

        <!-- Project Selection Dropdown -->
        <div class="form-group mt-3">
            <label for="project_id">Select Project:</label>
            <select class="form-control" id="project_id" name="project_id" required>
                <option value="" disabled selected>Select a project</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-4">Create Task</button>
    </form>
</div>
@endsection
