@extends('tasks.layout')
@section('content')

<div class="row d-flex justify-content-center">
  <div class="col-md-12">
    <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
        <div class="table_header">
            <h2>Tasks</h2>
            <div>
            <a href="{{ url('/tasklists') }}" class="btn btn-secondary btn-md" title="Back to Task Lists">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Task Lists
                    </a>
                <a href="{{ url('/tasks/create') }}" class="btn btn-success btn-md" title="Add New Task" style="background-color: #2AAA8A; color:white;">
                    <i class="fa fa-plus" aria-hidden="true"></i> Create a Task
                </a>
            </div>
        </div>
        <div class="card">
            <div class="table_section">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th class="col-sm-1">ID</th>
                            <th class="col-sm-8">Task Name</th>
                            <th class="col-sm-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $item)
                        <tr>
                            <td class="text-center align-middle">{{ $item->id }}</td>
                            <td class="align-middle">{{ $item->name }}</td>
                            <td class="text-center">
                                <a href="{{ url('/tasks/' . $item->id) }}" title="View Task"><button class="btn btn-outline-info btn-sm m-1"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                <a href="{{ url('/tasks/' . $item->id . '/edit') }}" title="Edit Task"><button class="btn btn-outline-primary btn-sm m-1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                <form method="POST" action="{{ url('/tasks/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
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
        </div>
    </div>
</div>
@endsection