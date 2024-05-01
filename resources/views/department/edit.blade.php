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
        <form role="form" action="{{ route('department.update', $department->id) }}" method="post">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Code</label>
                            <input value="{{ $department->code }}" type="text" name="code">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Name</label>
                            <input value="{{ $department->name }}" type="text" name="name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <select name="company_id" class="select">
                                <option value="">Company</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" {{ $company->id == $department->company_id ? 'selected' : '' }}>{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div  class="form-group">
                            <label>Department</label>
                            <select name="parent_id" class="select">
                                <option value="">---SELLECT---</option>
                                @foreach($departments as $list)
                                <option value="{{ $list->id }}" {{ $list->id == $department->parent_id ? 'selected' : '' }}>{{ $list->name }}</option>                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Submit</button>
                        <a href="{{ route('department.index') }}" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
