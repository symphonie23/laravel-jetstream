<?php
/**
 * View for creating a new task list
 *
 * @var string $url URL to submit form to
 * @var string $created_at Value for the created_at field
 * @var string $deadline_at Value for the deadline_at field
 */
?>
<x-app-layout>
  @include('layouts.side-bar')
  <div class="container-fluid col-md-12 position-absolute end-0">
    <div class="table-container">
    <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
      <div class="card-header">
        <br><center><h1>Create Tasklist</h1><br>
      </div><br>

      <div class="card">
        <div class= "p-4">
          <form action="{{ url('tasklists') }}" method="post">
            {!! csrf_field() !!}
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="name"><b>Tasklist Name</b></label>
                  <input type="text" name="name" id="name" class="form-control">
                </div>
              </div>
            </div><br>

            <div class= "row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="name"><b>Start Date</b></label>
                  <input type="datetime-local" name="created_at" id="created_at" class="form-control " value="{ ('created_at') }}">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="name"><b>End Date</b></label>
                  <input type="datetime-local" name="deadline_at" id="deadline_at" class="form-control" value="{{ ('deadline_at') }}" />
                </div>
              </div>
            </div>
          
          <div class="col-md-12">
            <div class="text-center" style="margin-top:30px;margin-bottom:10px">
              <input type="submit" value="Save" class="btn btn-success btn-md float-end" style="background-color: #2AAA8A; color:white;">
              <a href="{{ url('/tasklists') }}" class="btn btn-secondary btn-md float-end mx-2" title="Back to Task Lists">
                Cancel
              </a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>