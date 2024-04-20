@extends('home')
@section('main')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Role</h4>
                <h6>List </h6>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="productdetails">
                            <ul class="product-bar">
                                <li>
                                    <h4>User</h4>
                                    <h6>{{ $user_role['user']->email }}</h6>
                                </li>
                                <li>
                                    <h4>Category</h4>
                                    <h6>{{ $user_role['user']->is_active }}</h6>
                                </li>
                                <li>
                                    <h4>Role</h4>
                                    <h6>
                                        @foreach ($user_role['roles'] as $role)
                                        <li>{{ $role->role }}</li>
                                        @endforeach
                                    </h6>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>

    </div>
</div>
@endsection