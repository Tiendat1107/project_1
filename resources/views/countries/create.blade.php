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
        <form role="form" action="{{ route('countries.store') }}" method="post">
            {{ csrf_field() }}
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Code</label>
                        <input type="text" name="code" class="@error('code') is-invalid @enderror">
                        @error('code')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="@error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"></textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-submit me-2">Submit</button>
                    <a href="{{ route('countries.index') }}" class="btn btn-cancel">Cancel</a>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
