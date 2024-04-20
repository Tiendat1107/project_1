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
        <form role="form" action="{{ route('company.update', $company->id) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Name</label>
                        <input value={{$company->name}} type="text" name="name">
                       
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Code</label>
                        <input value={{$company->code}} type="text" name="code">
                        
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>address</label>
                        <input value={{$company->address}} type="text" name="address">
                    </div>
                </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Submit</button>
                        <a href="{{ route('company.index') }}" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
