<x-app-layout>
    @include('layouts.side-bar')
    <div class="container-fluid col-md-10 position-absolute end-0">
        <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="card-header">
                <br><h1><b>Dashboard</b></h1><br>
            </div>

            <div class= "p-1 d-flex justify-content-around">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>50</h3>
                        <p>TASK LISTS</p>
                        <i class="fa fa-flag"></i>
                    </div>
                    
                    <a href="#" class="small-box-footer">
                        SHOW INFO <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>100</h3>
                        <p>PENDING TASKS</p>
                        <i class="fa fa-info"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        SHOW INFO <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>150</h3>
                        <p>COMPLETED TASKS</p>
                        <i class="fa fa-check-circle"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        SHOW INFO <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>  
            </div>

<div class="table_header">
                <h1><b>Pending Tasks</b></h1>
                <form action="{{ url('/tasklists') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="search">
                        <button type="submit" class="btn btn-outline-secondary"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
            <br>
            <div class="card">
                <div class="table_section">
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th class="col-sm-5">Task Name</th>
                                <th class="col-sm-3">Deadline</th>
                                <th class="col-sm-1">Status</th>
                                <th class="col-sm-3">Actions</th>
                            </tr>
                        </thead>
                       
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="container1">
                PAGINATE HERE
            </div>
        </div>
    </div>
</x-app-layout>