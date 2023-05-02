@extends('tasks.layout')
@section('content')
<div class="row d-flex justify-content-center">

<div class="col-md-12">
    <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="table_header">
            <h3>Task Lists</h3>
                <div>
                    <a href="{{ url('/tasklists/create') }}" class="btn btn-md" style="background-color: #2AAA8A; color:white;" title="Add New Task">
                        <i class="fa fa-plus" aria-hidden="true"></i> Create Task List
                    </a>
                </div>
            </div>  
            <br>
               <div class="search-container mb-3">
            <form action="{{ url('/tasklists') }}" method="GET">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <button type="submit" class="btn btn-outline-secondary"><i class="fa fa-search"></i></button>
        </div>
    </form>
</div>
        <div class="card">
            <div class="table_section">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th class="col-sm-1"><center>ID</th>
                                <th class="col-sm-5"><center>Task List Name</th>
                                <th class="col-sm-3"><center>Status</th>
                                <th class="col-sm-"><center>Manage</th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach($tasklists as $tasklist)
                            <tr>
                                <td class="align-middle"><center>{{ $tasklist->id }}</td>
                                    <td class= "align-middle"><center>{{ $tasklist->name }}</td>
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
                                    </td>
                                    <td class="text-center">
                             <div class="dropdown">
                             <a class="btn btn-primary btn-o dropdown-toggle" href="#" role="button" id="cogDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cog"></i>
                            </a>
                                <div class="dropdown-content">
                                <a href="{{ url('/tasklists/' . $tasklist->id) }}" title="View Task"><button class="btn btn-outline-info btn-sm m-1"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                <a href="{{ url('/tasklists/' . $tasklist->id . '/edit') }}" title="Edit Task"><button class="btn btn-outline-primary btn-sm m-1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                <form method="POST" action="{{ url('/tasklists/' . $tasklist->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-outline-danger btn-sm m-1" title="Delete Task" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                              </div>
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
    </div>
@endsection