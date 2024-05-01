@extends('home')
@section('main')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Compay-Depart</h4>
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
                                    <h4>Company</h4>
                                    <h6>{{ $depart_company['company']->name }}</h6>
                                </li>
                                <li>
                                    <h4>Department</h4>
                                    <h6>
                                        @foreach ($depart_company['department'] as $depart)
                                            <li>{{ $depart->name }}</li>
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