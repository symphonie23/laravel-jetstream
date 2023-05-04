<x-app-layout>
@include('layouts.side-bar')
    <div class="container-fluid col-md-10 position-absolute end-0">
    <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
        <div class="card-header">
          <br><center><h1><b>Create Task List</b></h1><br>
        </div><br>
        <!-- Start Row -->

        <div class="card">
        <div class= "p-4">

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <form action="{{ url('tasklists') }}" method="post">
                {!! csrf_field() !!}
                <label for="name"><b>Task List Name</b></label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="name"><b>Start Date</b></label>
              <input type="date" name="created_at" id="created_at" class="form-control " value="{{ ('created_at') }}" />
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="name"><b>End Date</b></label>
              <input type="date" name="deadline_at" id="deadline_at" class="form-control" value="{{ ('deadline_at') }}" />
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