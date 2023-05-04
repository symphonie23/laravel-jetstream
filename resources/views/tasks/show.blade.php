<x-app-layout>
  @include('layouts.side-bar')
  <div class="container-fluid col-md-10 position-absolute end-0">
    <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
        <div class="card-header">
          <br><center><h1>View Task</h1><br>
        </div><br>
      <div class="card">
        <div class= "p-4">
          @if ($tasks)
          <label>Task Name</label></br>
          <input type="text" name="name" id="name" class="form-control" value="{{ $tasks->name }}" disabled></br>
          @endif

          @if ($tasks)
          <label>Task Description</label></br>
          <input type="text" name="desc" id="desc" class="form-control" value="{{ $tasks->desc }}" disabled></br>
          @endif

          @if ($tasks)
          <label>Deadline</label></br>
          <input type="datetime-local" name="deadline_at" id="deadline_at" class="form-control" value="{{ $tasks->deadline_at }}" disabled></br>
          @endif

        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-md float-end me-2">
            Close
        </a>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>