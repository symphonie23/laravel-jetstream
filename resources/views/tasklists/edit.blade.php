<x-app-layout>
  @include('layouts.side-bar')
  <div class="container-fluid col-md-10 position-absolute end-0">
    <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
      <div class="card-header">
        <center><h2>Edit Task List</h2>
      </div>
      <div class="row">
      <div class="col-md-6">
      <div class="form-group">
        <form action="{{ url('tasklists/' .$tasklist->id) }}" method="post">
          {!! csrf_field() !!}
          @method("PATCH")
          <label>Task List Name:</label>
          <input type="text" name="name" id="name" placeholder="{{ $tasklist->name }}" class="form-control"><br>
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
          <input type="submit" value="Update" class="btn float-end" style="background-color: #2AAA8A; color:white;">
          <a href="{{ url('/tasklists') }}" class="btn btn-secondary float-end mx-2" title="Back to Tasks">Cancel</a>
         </form>
        </div>
      </div>
    </div>
  </div>  
</div>
</x-app-layout>