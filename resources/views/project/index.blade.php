@extends('home')
@section('main')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Country</h4>
                <h6>List Country</h6>
            </div>
            <div class="page-btn">
                <a href="{{ route('project.create') }}" class="btn btn-added">
                    <img src="{{ asset('public/img/icons/plus.svg') }}" alt="img" class="me-1">
                    Add New Project
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                            <tr>
                                <th>
                                    <label class="checkboxs">
                                        <input type="checkbox" id="select-all">
                                        <span class="checkmarks"></span>
                                    </label>
                                </th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Description</th>
                                <th>Company</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $list)
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>{{ $list->name }}</td>
                                    <td>{{ $list->code }}</td>
                                    <td>{{ $list->description }}</td>
                                    <td>{{ $list->company->name }}</td>
                                    <td>
                                        <a class="me-3" href="{{ route('project.edit', $list->id) }}">
                                            <img src="{{ asset('public/img/icons/edit.svg') }}" alt="Edit">
                                        </a>
                                        <a class="confirm-text" href="{{ route('project.destroy', $list->id) }}">
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
