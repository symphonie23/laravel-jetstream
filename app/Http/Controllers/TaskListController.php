<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tasklists = TaskList::all();

        return view('tasklists.create', compact('tasklists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
       $taskList = new TaskList();
        $taskList->name = $request->input('name');
        $taskList->created_by = $request->input('created_by');
        $taskList->save();
        return redirect()->route('tasklists.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $tasklist = TaskList::findOrFail($id);
        $tasks = $tasklist->tasks->where('deleted_by', NULL);
        return view('tasklists.show', ['tasklist' => $tasklist, 'tasks' => $tasks]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskList  $tasklist
     * @return \Illuminate\View\View
     */
    public function edit(TaskList $tasklist)
    {
        return view('tasklists.edit', compact('tasklist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaskList  $tasklist
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, TaskList $tasklist)
    {
        $tasklist->update([
            'name' => $request->name,
        ]);

        return redirect()->route('tasklists.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
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