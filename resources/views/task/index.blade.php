@extends('home')
@section('main')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Task</h4>
                <h6>List Task</h6>
            </div>
            <div class="page-btn">
                <a href="{{ route('task.create') }}" class="btn btn-added">
                    <img src="{{ asset('public/img/icons/plus.svg') }}" alt="img" class="me-1">
                    Add New Project
                </a>
            </div>
            <div class="page-btn">
                <a href="{{ route('export.excel') }}" class="btn btn-success">
                    <img src="{{ asset('public/img/icons/plus.svg') }}" alt="img" class="me-1">
                    Export Excel
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card mb-0">
                    <form action="{{ route('task.filter') }}" method="GET">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="row">
                                    <div class="col-lg col-sm-6 col-12">
                                        <div class="form-group">
                                            <select name="project_id" class="select">
                                                <option value="">Select Project</option>
                                                @foreach ($tasks as $list)
                                                    <option value="{{$list->project->id}}">{{$list->project->name}}</option>
                                                @endforeach
                                               
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg col-sm-6 col-12">
                                        <div class="form-group">
                                            <select name="person_id" class="select">
                                                <option value="">Select Person</option>
                                                @foreach ($tasks as $list)
                                                <option value="{{$list->person->id }}">{{$list->person->full_name }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-sm-6 col-12">
                                        <div type="submit" class="form-group">
                                            <a class="btn btn-filters ms-auto"><img
                                                    src="{{asset('public/img/icons/search-whites.svg')}}" alt="img"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <label class="checkboxs">
                                        <input type="checkbox" id="select-all">
                                        <span class="checkmarks"></span>
                                    </label>
                                </th>
                                <th>Project</th>
                                <th>Person</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Priority</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $list)
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>{{ $list->project->name }}</td>
                                    <td>{{ $list->person->full_name }}</td>
                                    <td>{{ $list->start_time }}</td>
                                    <td>{{ $list->end_time }}</td>
                                    <td>{{ $list->priority }}</td>
                                    <td>{{ $list->name }}</td>
                                    <td>{{ $list->status }}</td>
                                    <td>
                                        <a class="me-3" href="{{ route('task.edit', $list->id) }}">
                                            <img src="{{ asset('public/img/icons/edit.svg') }}" alt="Edit">
                                        </a>
                                        <a class="confirm-text" href="{{ route('task.destroy', $list->id) }}">
                                            <img src="{{ asset('public/img/icons/delete.svg') }}" alt="Delete">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
