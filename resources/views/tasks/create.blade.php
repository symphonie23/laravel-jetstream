@extends('tasks.layout')
@section('content')
<div class="row d-flex justify-content-center">
  <div class="col-md-12">
    <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
      <div class="card-header">
        <center><h2>Create Task</h2>
      </div>
      <div class="card-body">
        <form action="{{ url('tasks') }}" method="post">
          {!! csrf_field() !!}
          <label>Task List</label>
          <select name="task_list_id" id="task_list_id" class="form-control">
            @foreach ($task_lists as $task_list)
              <option value="{{ $task_list->id }}">{{ $task_list->name }}</option>
            @endforeach
          </select><br> <!-- this section is for the tasklist-->
          <label>Task Name</label>
          <input type="text" name="name" id="name" class="form-control"><br>
          <label>Task Description</label><br>
          <input type="text" name="desc" id="desc" class="form-control ckeditor"><br>
          <label for="deadline">Deadline:</label>
          <input type="datetime-local" name="deadline_at" id="deadline_at" class="form-control" value="{{ ('deadline_at') }}" />
          <br>
          <!--save button-->
          <button type="submit" class="btn btn-success btn-md float-end" style="background-color: #2AAA8A; color:white;">
              Save
          </button>
          <a href="{{ url()->previous() }}" class="btn btn-secondary btn-md float-end me-2">
              Cancel
          </a>
        </form>
      </div>
    </div>
  </div>
</div>
@stop