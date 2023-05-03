<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\TaskList;
use Carbon\Carbon;
use Illuminate\View\View;
 
class TaskController extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
        $tasks = Task::paginate(5);
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $task_lists = TaskList::whereNull('deleted_at')
            ->whereNull('deleted_by')
            ->get();
        return view('tasks.create', compact('task_lists'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        $task = Task::create($input);
        $taskListId = $task->task_list_id;
        return redirect()->route('tasklists.show', ['tasklist' => $taskListId])->with('flash_message', 'Task Added!');
    }   

    /**
     * Display the specified resource.
     *
     * @param  string $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show(string $id): RedirectResponse|View
    {
        $task = Task::find($id);
    
        if (!$task) {
            return redirect('/tasks/error');
        }
    
        $tasks = Task::where('task_list_id', $task->tasklist_id)
                    ->orderBy('deadline_at', 'asc')
                    ->get()
                    ->map(function ($task) {
                        $task->formatted_deadline = $task->deadline_at ? Carbon::parse($task->deadline_at)->format('m-d-Y') : '';
                        return $task;
                    });
        return view('tasks.show')->with('tasks', $task);
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id): View
    {
        $task = Task::find($id);
        $tasklists = TaskList::all();
        return view('tasks.edit', ['task_lists' => $tasklists])->with('tasks', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $task = Task::find($id);
        
        if (!$task) {
            return redirect('tasklists')->with('flash_message', 'Task not found!');
        }
        
        $input = $request->all();
       
        if ($request->has('done')) {
            $input['finished_at'] = now();
        } else {
            $input['finished_at'] = null;
        }
        
        if (!$task->update($input)) {
            return redirect('tasklists')->with('flash_message', 'Task update failed!');
        }
        
        $tasklist_id = $task->task_list_id;
        return redirect()->route('tasklists.show', ['tasklist' => $tasklist_id])->with('flash_message', 'Task updated!');
    }
    
    /**
     * Deletes a task.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(Request $request, $id): RedirectResponse
    {
        // Find the task with the given id
        $task = Task::findOrFail($id);

        // Get the task list id to redirect back to the task list after deletion
        $tasklist_id = $task->tasklist->id;

        // Update the task with the deleted_by and deleted_at fields
        $task->update([
            'deleted_by' => $request->deleted_by,
            'deleted_at' => $request->deleted_at
        ]);

        // Redirect back to the task list with a flash message indicating the task has been deleted
        return redirect()->route('tasklists.show', ['tasklist' => $tasklist_id])->with('flash_message', 'Task Deleted!');
    }  

}