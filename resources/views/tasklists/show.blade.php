<?php
/**
 * View for displaying a task list and its associated tasks.
 *
 * @param \App\Models\TaskList $tasklist The task list to display.
 * @param \Illuminate\Pagination\LengthAwarePaginator $tasks A paginator containing the tasks to display.
 * @return void
 */
?>
<x-app-layout>
@include('layouts.side-bar')
<div class="container-fluid col-md-12 position-absolute end-0">
    <div class="table-container">
        <div class="card p-3 bg-body-tertiary">
            <div class="table_header">
                <h1><b>{{ $tasklist->name }}</b></h1>
                <form action="{{ url('/tasklists') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="search">
                        <button type="submit" class="btn btn-outline-secondary"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
            <br>
            <div class="card">
                <div class="table_section">
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th class="col-sm-5">Task Name</th>
                                <th class="col-sm-3">Deadline</th>
                                <th class="col-sm-1">Status</th>
                                <th class="col-sm-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks->sortBy('deadline_at') as $item)
                            <tr>
                                <td class="align-middle">{{ $item->name }}</td>
                                <td class="text-center align-middle">
                                    @if ($item->deadline_at)
                                        {{ \Carbon\Carbon::parse($item->deadline_at)->format('m-d-Y H:i:s') }}
                                    @endif
                                </td>
                                <td class="text-center align-middle">
                                    @if($item->finished_at)
                                        <span class="badge bg-success">DONE</span>
                                    @else
                                        <span class="badge bg-danger">NOT DONE</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('/tasks/' . $item->id) }}" title="View Task">
                                        <button class="btn btn-outline-info btn-sm m-1"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
                                    </a>
                                    <a href="{{ url('/tasks/' . $item->id . '/edit') }}" title="Edit Task">
                                        <button class="btn btn-outline-primary btn-sm m-1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                    </a>
                                    <form method="POST" action="{{ url('/tasks/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-outline-danger btn-sm m-1" title="Delete Task" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="container1">
            {{ $tasks->links() }}
            </div>
        </div>
    </div>
</x-app-layout>