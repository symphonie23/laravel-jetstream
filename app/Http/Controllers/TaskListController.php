<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskListController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query('search');
        $tasklists = TaskList::where('created_by', auth()->user()->id)
                        ->where('deleted_by', NULL)
                        ->when($query, function ($q) use ($query) {
                            $q->where('name', 'like', '%' . $query . '%');
                        })
                        ->paginate(5);
        $counts = [];
        foreach ($tasklists as $tasklist) {
            $totalTasks = $tasklist->taskCount();
            $completedTasks = $tasklist->tasksCompleted();
            $counts[$tasklist->id] = [
                'total' => $totalTasks,
                'completed' => $completedTasks,
            ];
        }
        return view('tasklists.index', compact('tasklists', 'counts'));
    }

    public function create()
    {
        $tasklists = TaskList::all();

        return view('tasklists.create', compact('tasklists'));
    }

    public function store(Request $request)
    {
       $taskList = new TaskList();
        $taskList->name = $request->input('name');
        $taskList->created_by = $request->input('created_by');
        $taskList->save();
        return redirect()->route('tasklists.index');
    }

    public function show($id)
    {
        $tasklist = TaskList::findOrFail($id);
    
        $tasks = $tasklist->tasks
                        ->where('deleted_by', NULL)
                        ->orderBy('deadline_at', 'asc')
                        ->get()
                        ->map(function ($task) {
                            $task->formatted_deadline = $task->deadline_at ? Carbon::parse($task->deadline_at)->format('m-d-Y') : '';
                            return $task;
                        });
    
        return view('tasklists.show', ['tasklist' => $tasklist, 'tasks' => $tasks]);
    }
    
    
    public function edit(TaskList $tasklist)
    {
        return view('tasklists.edit', compact('tasklist'));
    }

    public function update(Request $request, TaskList $tasklist)
    {
        $tasklist->update([
            'name' => $request->name,
        ]);

        return redirect()->route('tasklists.index');
    }

    public function destroy(Request $request, $id)
    {
        $tasklist = TaskList::findOrFail($id);
        $tasklist->update([
            'deleted_by' => $request->deleted_by,
            'deleted_at' => $request->deleted_at
        ]);

        return redirect()->route('tasklists.index');
    }
}