<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasks = Task::orderBy('priority', 'asc')->get(); // Order tasks by 'priority' in ascending order
        // Return the 'index' view with the sorted tasks
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         // Fetch all projects from the database
         $projects = Project::all();  // Retrieve all projects

         // Return the 'create' view and pass the projects to it
         return view('tasks.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
            'priority' => 'required|integer|min:1',
        ]);

        //  Create a New Task Record and Save It to the Database
        $task = new Task();
        $task->name = $validatedData['name'];
        $task->project_id = $validatedData['project_id'];
        $task->priority = $validatedData['priority'];
        $task->save();  // Save the task to the database

        //  Redirect or Return a Response After Saving the Task
        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $task = Task::findOrFail($id);  // Fetch the task by ID or return 404
        $projects = Project::all();  // Fetch all projects for the dropdown

        return view('tasks.edit', compact('task', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
            'priority' => 'required|integer|min:1',
        ]);

        $task = Task::findOrFail($id);  // Fetch the task by ID
        $task->name = $validatedData['name'];
        $task->project_id = $validatedData['project_id'];
        $task->priority = $validatedData['priority'];
        $task->save();  // Save the updated task

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the task by ID
        $task = Task::findOrFail($id);  // Find the task or return a 404 if not found

        // Delete the task
        $task->delete();

        // Redirect back to the tasks index page with a success message
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }


    public function reorder(Request $request)
    {
        $taskIds = $request->tasks;  // Get the new order of task IDs from the request

        // Update the priority for each task based on the new order
        foreach ($taskIds as $index => $taskId) {
            $task = Task::find($taskId);
            if ($task) {
                $task->priority = $index + 1;  // Set the new priority (1-based index)
                $task->save();
            }
        }

        return response()->json(['status' => 'success']);  // Return a JSON response
    }

}
