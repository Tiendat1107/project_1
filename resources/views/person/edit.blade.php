@extends('home')
@section('main')
    <div class="content">
        <form role="form" action="{{ route('person.update', $person->id) }}" method="post">
                {{ csrf_field() }}
            <div class="page-header">
                <div class="page-title">
                    <h4>Person & User</h4>
                    <h5>Edit Person</h5>
                </div>
            </div>
            <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div  class="form-group">
                                    <label>Full Name</label>
                                    <input value="{{ $person->full_name}}" name="full_name" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="gender" class="select">
                                        <option>---SELECT---</option>
                                        <option value="Male" {{ $person->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ $person->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div  class="form-group">
                                    <label>Phone</label>
                                    <input value="{{ $person->phone_number}}" name="phone_number" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div  class="form-group">
                                    <label>Birthdate</label>
                                    <input value="{{ $person->birthdate}}" name="birthdate" type="date">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input value="{{ $person->address}}" name="address" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Company</label>
                                    <select name="company_id" class="select">
                                        <option value="">Select Company</option>
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}" {{ $person->company_id == $company->id ? 'selected' : '' }}>
                                                {{ $company->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>     
                        </div>
                    </div>
            </div>
            <div class="page-header">
                <div class="page-title">
                    <h5>Add User</h5>
                </div>
            </div>
            <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div  class="form-group">
                                    <label>email</label>
                                    <input value="{{ $person->user->email }}" name="email" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div  class="form-group">
                                    <label>password</label>
                                    <input value="{{ $person->user->password }}" name="password" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="roles">Select Role:</label><br>
                                    @foreach ($roles as $role)
                                        <input type="checkbox" id="role_{{ $role->id }}" name="value[]" value="{{ $role->id }}"
                                            {{ $person->user->roles->contains($role->id) ? 'checked' : '' }}>
                                        <label for="role_{{ $role->id }}">{{ $role->role }}</label><br>
                                    @endforeach
                                </div> 
                            </div> 
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div  class="form-group">
                                    <label>Active/Inactive</label>
                                    <select name="is_active" class="select">
                                        <option>---SELECT---</option>
                                        <option value="1" {{ $person->user->is_active == 1 ? 'selected'  : '' }}>Active</option>
                                        <option value="0" {{ $person->user->is_active == 0 ? 'selected'  : '' }}>Inactive</option>
                                    </select>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                                <a href="{{ route('person.index') }}" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </div>
            </div>
        </form>
    </div>
@endsection
