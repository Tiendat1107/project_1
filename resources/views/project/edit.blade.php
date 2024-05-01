@extends('home')

@section('main')
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Project</h4>
            <h6>Edit Project</h6>
        </div>
    </div>  
    <div class="card">
        <form role="form" action="{{ route('project.update', $project->id) }}" method="post">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Code</label>
                            <input value="{{$project->code}}" type="text" name="code">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Name</label>
                            <input value="{{$project->name}}" type="text" name="name">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description">{{$project->description}}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Company</label>
                            <select name="company_id" id="company" class="select company">
                                <option value="">Select Company</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" {{ $project->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Person</label>
                            <select name="person_id[]" id="person" class="select" multiple>
                                @foreach ($project['persons'] as $person)
                                    <option value="{{ $person->id }}" {{ $project->id == $person->id ? 'selected' : '' }}>{{ $person->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    

                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Submit</button>
                        <a href="{{ route('project.index') }}" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
