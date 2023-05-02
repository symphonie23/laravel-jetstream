@extends('tasks.layout')
@section('content')
<div class="row d-flex justify-content-center">
  <div class="col-md-12">

    <div class="four_zero_four_bg">
    <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
    <div style="display: flex; justify-content: center;">
          <img src="https://media.tenor.com/phf8L9aIy5gAAAAj/mimibubu.gif" style="width: 230px; height: 230px;">
    </div>
      <h1 class="text-center ">404</h1>  
    <center><h3> Looks like you're lost!

</h3>
    
    <p>The page you are looking for is not available!</p>
    
  <a href="{{ url('/tasks') }}" class="btn btn-success" title="Back to Tasks">Go to Tasks</a>
</div>   
</form>
      </div>
    </div>
  </div>
</div>
@stop