<x-app-layout>
  @include('layouts.side-bar')
  <div class="container-fluid col-md-10 position-absolute end-0">
    <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
      <div class="card-header">
        <br><center><h1><b>Edit Task</b></h1><br>
      </div><br>
      <div class="card">
        <div class= "p-4">
          <form action="{{ url('tasks/' .$tasks->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")

            <div class="row">
              <div class="col-md-6">
                <label>Task List</label></br>
                <input type="hidden" name="id" id="id" value="{{$tasks->id}}" />
                <select name="task_list_id" id="task_list_id" class="form-control">
                  @foreach ($task_lists as $task_list)
                    <option value="{{ $task_list->id }}">{{ $task_list->name }}</option>
                  @endforeach
                </select>
              </div>
              
              <div class="col-md-6">
                <label for="name">Task Name</label></br>
                <input type="text" name="name" id="name" value="{{$tasks->name}}" class="form-control">
              </div>
            </div><br>
            
            <div class="row">
              <div class="col-md-12">
                <label>Task Description</label></br>
                <input type="text" name="desc" id="desc" value="{{$tasks->desc}}" class="form-control">
              </div>
            </div><br>

            <div class="row">
              <div class="col-md-12">
                <label for="deadline">Deadline:</label>
                <input type="datetime-local" name="deadline_at" id="deadline_at" class="form-control" value="{{ ('deadline_at') }}" />
                </div>
            </div><br>
            <input class="mx-2 my-2" type="checkbox" name="done" {{ $tasks->finished_at ? 'checked' : '' }}>
            <label for="done" class= "leads">Task Done</label>
              <!--button to go back to the tasklists page-->
            <input type="submit" value="Update" class="btn float-end" style="background-color: #2AAA8A; color:white;">
            <a href="#" class="btn btn-secondary btn-md float-end  mx-2" title="Cancel" onclick="history.back()">
              Cancel
            </a>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>