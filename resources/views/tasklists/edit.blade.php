@extends('tasks.layout')
@section('content')
<div class="row d-flex justify-content-center">
  <div class="col-md-12">
  <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
      <div class="card-header">
        <center><h2>Edit Task List</h2>
      </div>
      <div class="card-body">
        <form action="{{ url('tasklists/' .$tasklist->id) }}" method="post">
          {!! csrf_field() !!}
          @method("PATCH")
          <label>Task List Name:</label>
          <input type="text" name="name" id="name" placeholder="{{ $tasklist->name }}" class="form-control"><br>
          <!--button to go back to the tasklists page-->
          <input type="submit" value="Update" class="btn float-end" style="background-color: #2AAA8A; color:white;">
          <a href="{{ url('/tasklists') }}" class="btn btn-outline-danger float-end mx-2" title="Back to Tasks">Cancel</a>
         </form>
      </div>
    </div>
  </div>
</div>
@stop