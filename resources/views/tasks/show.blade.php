@extends('tasks.layout')

@section('content')

<div class="row d-flex justify-content-center">
  <div class="col-md-12">
    <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
      <div class="card-header">
        <center><h2>Task</h2>
      </div>
      <div class="card-body">
        @if ($tasks)
        <label>Task Name</label></br>
        <input type="text" name="name" id="name" class="form-control" value="{{ $tasks->name }}" disabled></br>
        @endif

        @if ($tasks)
        <label>Task Description</label></br>
        <input type="text" name="desc" id="desc" class="form-control" value="{{ $tasks->desc }}" disabled></br>
        @endif

        @if ($tasks)
        <label>Task Description</label></br>
        <input type="datetime-local" name="deadline_at" id="deadline_at" class="form-control" value="{{ $tasks->deadline_at }}" disabled></br>
        @endif

        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-md float-end me-2">
            Close
        </a>
      </div>
    </div>
  </div>
</div>
@stop