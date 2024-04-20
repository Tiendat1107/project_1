@extends('home')
@section('main')
    <div class="content">
        <form role="form" action="{{ route('person.store') }}" method="post">
                {{ csrf_field() }}
            <div class="page-header">
                <div class="page-title">
                    <h4>Person & User</h4>
                    <h5>Add Person</h5>
                </div>
            </div>
            <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div  class="form-group">
                                    <label>Full Name</label>
                                    <input name="full_name" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div  class="form-group">
                                    <label>Gender</label>
                                    <select name="gender" class="select">
                                        <option>---SELLECT---</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div  class="form-group">
                                    <label>Phone</label>
                                    <input name="phone_number" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div  class="form-group">
                                    <label>Birthdate</label>
                                    <input name="birthdate" type="date">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input  name="address" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <select name="company_id">
                                        <option value="">Company</option>
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
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
                                    <input name="email" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div  class="form-group">
                                    <label>password</label>
                                    <input name="password" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="roles">Select Role:</label><br>
                                    @foreach ($roles as $role)
                                        <input type="checkbox" id="role_{{ $role->id }}" name="value[]" value="{{ $role->id }}">
                                        <label for="role_{{ $role->id }}">{{ $role->role }}</label><br>
                                    @endforeach
                                </div> 
                            </div> 
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div  class="form-group">
                                    <label>Active/Inactive</label>
                                    <select name="is_active" class="select">
                                        <option>---SELLECT---</option>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
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
