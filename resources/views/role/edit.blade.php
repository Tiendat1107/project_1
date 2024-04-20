@extends('home')
@section('main')
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Country</h4>
            <h6>Add Country</h6>
        </div>
    </div>  
    <div class="card">
        <form role="form" action="{{ route('role.update', $role->id) }}" method="post">
            {{ csrf_field() }}
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Role</label>
                        <input value="role" type="text" name="role">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description">{{$role->description}}</textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-submit me-2">Submit</button>
                    <a href="{{ route('role.index') }}" class="btn btn-cancel">Cancel</a>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
