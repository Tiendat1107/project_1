@extends('home')

@section('main')
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Task</h4>
            <h6>Add Task</h6>
        </div>
    </div>  
    <div class="card">
        <form role="form" action="{{ route('task.store') }}" method="post">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Project</label>
                            <select name="project_id" id="project" class="select">
                                <option value="">Select Project</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Person</label>
                            <select name="person_id" id="person" class="select">
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Start Time</label>
                            <input type="date" name="start_time">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>End Time</label>
                            <input type="date" name="end_time">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div  class="form-group">
                            <label>Priority</label>
                            <select name="priority" class="select">
                                <option>---SELLECT---</option>
                                <option value="1">High</option>
                                <option value="2">Average</option>
                                <option value="3">Low</option>
                            </select>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div  class="form-group">
                            <label>Status</label>
                            <select name="status" class="select">
                                <option>---SELLECT---</option>
                                <option value="1">New</option>
                                <option value="2">In Progress</option>                         
                                <option value="3">Completed</option>
                                <option value="4">On Hold</option>
                            </select>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Submit</button>
                        <a href="{{ route('task.index') }}" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

