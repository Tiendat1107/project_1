@extends('home')
@section('main')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Country</h4>
                <h6>List Country</h6>
            </div>
            <div class="page-btn">
                <a href="{{ route('person.create') }}" class="btn btn-added">
                    <img src="{{ asset('public/img/icons/plus.svg') }}" alt="img" class="me-1">
                    Add New Person & User
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
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Company</th>
                                <th>Active/Inactive</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($people as $list)
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td>{{ $list->full_name }}</td>
                                <td>{{ $list->gender }}</td>
                                <td>{{ $list->phone_number }}</td>
                                <td>{{ optional($list->user)->email }}</td>
                                <td>{{ optional($list->company)->name }}</td>
                                <td>{{ optional($list->user)->is_active ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <a class="me-3" href="{{ route('user.role', $list->user->id) }}">
                                        <img src="{{asset('public/img/icons/eye.svg')}}" alt="Eye">
                                    <a class="me-3" href="{{ route('person.edit', $list->id) }}">
                                        <img src="{{ asset('public/img/icons/edit.svg') }}" alt="Edit">
                                    </a>
                                    <a class="confirm-text" href="{{ route('person.destroy', $list->id) }}">
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
