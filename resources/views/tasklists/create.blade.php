@extends('tasks.layout')
@section('content')
<div class="row d-flex justify-content-center">
  <div class="col-md-12">
    <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
      <div class="card-header">
        <center><h2>Create Task Lists</h2>
      </div>
      <div class="card-body">
        <form action="{{ url('tasklists') }}" method="post">
          {!! csrf_field() !!}
          <label>Task List Name:</label>
          <input type="text" name="name" id="name" class="form-control">
          <br>
           <!--save button-->
          <input type="submit" value="Save" class="btn btn-success btn-md float-end" style="background-color: #2AAA8A; color:white;">
          <!--button to go back to the tasklists page-->
          <a href="{{ url('/tasklists') }}" class="btn btn-secondary btn-md float-end mx-2" title="Back to Task Lists">
            Cancel
          </a>
        </form>
      </div>
    </div>
  </div>
</div>
@stop