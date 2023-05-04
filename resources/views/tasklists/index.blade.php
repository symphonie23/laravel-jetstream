<?php
/**
 * Blade view file for displaying a list of task lists.
 *
 * This file defines the HTML markup for a page that displays a table of task lists
 * and provides links to view, edit, and delete individual tasks. The task lists are
 * retrieved from the database using the `$tasklists` variable, and the number of
 * completed and total tasks for each task list is calculated using the `$counts`
 * variable.
 *
 * @var \Illuminate\Pagination\LengthAwarePaginator $tasklists The collection of task lists to display.
 * @var array $counts An array mapping task list IDs to the number of completed and total tasks for each task list.
 */
?>
<x-app-layout>
    @include('layouts.side-bar')
    <div class="container-fluid col-md-10 position-absolute end-0">
        <div class="card p-3 bg-body-tertiary">
            <div class="table_header">
                <h1><b>Task Lists</b></h1>
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
                                <th class="col-sm-3"><center>Task List Name</th>
                                <th class="col-sm-2"><center>Duration</th>
                                <th class="col-sm-2"><center>Status</th>
                                <th class="col-sm-2"><center>Last Updated</th>
                                <th class="col-sm-3"><center>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasklists as $tasklist)
                            <tr>
                                <td class="align-middle text-center">{{ $tasklist->name }}</td>
                                <td class="text-center align-middle">
                                    @if ($tasklist->created_at)
                                        {{ \Carbon\Carbon::parse($tasklist->created_at)->format('m-d-Y') }}
                                    @endif
                                    <br>
                                    @if ($tasklist->deadline_at)
                                        {{ \Carbon\Carbon::parse($tasklist->deadline_at)->format('m-d-Y') }}
                                    @endif
                                </td>
                                <td class="text-center align-middle">
                                    <span class="badge rounded-pill 
                                        @if ($counts[$tasklist->id]['completed'] == $counts[$tasklist->id]['total'])
                                            bg-success
                                        @else
                                            bg-danger
                                        @endif
                                        ">
                                        @if ($counts[$tasklist->id]['completed'] == $counts[$tasklist->id]['total'])
                                            Completed
                                        @else
                                            Pending
                                        @endif
                                    </span>
                                </td>
                                <td class="text-center align-middle">
                                    {{ \Carbon\Carbon::parse($tasklist->updated_at)->diffForHumans() }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('/tasklists/' . $tasklist->id) }}" title="View Task"><button class="btn btn-outline-info btn-sm m-1"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                    <a href="{{ url('/tasklists/' . $tasklist->id . '/edit') }}" title="Edit Task"><button class="btn btn-outline-primary btn-sm m-1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                    <form method="POST" action="{{ url('/tasklists/' . $tasklist->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-outline-danger btn-sm m-1" title="Delete Task" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
                {{ $tasklists->links() }}
            </div>
        </div>
    </div>
</x-app-layout>