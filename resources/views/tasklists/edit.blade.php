<x-app-layout>
  @include('layouts.side-bar')
  <div class="container-fluid col-md-10 position-absolute end-0">
    <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
      <div class="card-header">
        <br><center><h1>Edit Tasklist</h1><br>
      </div><br>

      <div class="card">
        <div class= "p-4">
        <form action="{{ url('tasklists/' .$tasklist->id) }}" method="post">
          {!! csrf_field() !!}
          @method("PATCH")
          <label>Task List Name:</label>
          <input type="text" name="name" id="name" placeholder="{{ $tasklist->name }}" class="form-control"><br>
          <!--button to go back to the tasklists page-->
          <input type="submit" value="Update" class="btn float-end" style="background-color: #2AAA8A; color:white;">
          <a href="{{ url('/tasklists') }}" class="btn btn-secondary float-end mx-2" title="Back to Tasks">Cancel</a>
         </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>