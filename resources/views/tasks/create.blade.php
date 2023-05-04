<?php
/**
 * The create task view.
 *
 * This view allows users to create a new task and assign it to a task list.
 * It includes a form with fields for task name, task list, start and end dates, status, and description.
 * Users can submit the form to create the task or cancel and go back to the task lists page.
 *
 * @param  \Illuminate\Database\Eloquent\Collection $task_lists The collection of task lists available to assign the task to
 */
?>
<x-app-layout>
  @include('layouts.side-bar')
  <div class="container-fluid col-md-12 position-absolute end-0">
    <div class="table-container">
      <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
      <div class="card-header">
        <br><center><h1><b>Create Task</b></h1><br>
      </div><br>

      <div class="card">
        <div class= "p-4">
          <form action="{{ url('tasks') }}" method="post">
            {!! csrf_field() !!}
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="name"><b>Task Name</b></label>
                  <input type="text" name="name" id="name" class="form-control">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="project_id"><b>Task List</b></label>
                  <select name="task_list_id" id="task_list_id" class="form-control">
                    @foreach ($task_lists as $task_list)
                      <option value="{{ $task_list->id }}">{{ $task_list->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div><br>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="name"><b>Start Date</b></label>
                <input type="datetime-local" name="start_date" id="start_date" class="form-control " value="">
              </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="name"><b>End Date</b></label>
                <input type="datetime-local" name="deadline_at" id="deadline_at" class="form-control" value="{{ ('deadline_at') }}" />
              </div>
            </div>
          </div><br>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="name"><b>Description</b></label>
                <textarea name="desc" id="desc" class="form-control" rows="5"></textarea>
              </div>
            </div>
          </div><br>

          <!--save button-->
          <input type="submit" value="Save" class="btn btn-success btn-md float-end" style="background-color: #2AAA8A; color:white;">
          <!--button to go back to the tasklists page-->
          <a href="{{ url('/tasks') }}" class="btn btn-secondary btn-md float-end  mx-2" title="Back to Task Lists">Cancel</a><br>
        </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>