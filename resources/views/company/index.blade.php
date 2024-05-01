@extends('home')
@section('main')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Country</h4>
                <h6>List Country</h6>
            </div>
            <div class="page-btn">
                <a href="{{ route('department.create') }}" class="btn btn-added">
                    <img src="{{ asset('public/img/icons/plus.svg') }}" alt="img" class="me-1">
                    Add New Department
                </a>
            </div>
            <div class="page-btn">
                <a href="{{ route('company.create') }}" class="btn btn-added">
                    <img src="{{ asset('public/img/icons/plus.svg') }}" alt="img" class="me-1">
                    Add New Company
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
                                <th>Name</th>
                                <th>Code</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $list)
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td>{{ $list->name }}</td>
                                <td>{{ $list->code }}</td>
                                <td>{{ $list->address }}</td>
                                <td>
                                    <a class="me-3" href="{{ route('depart_company', $list->id) }}">
                                        <img src="{{asset('public/img/icons/eye.svg')}}" alt="Eye">
                                    </a>
                                    <a class="me-3" href="{{ route('company.edit', $list->id) }}">
                                        <img src="{{ asset('public/img/icons/edit.svg') }}" alt="Edit">
                                    </a>
                                    <a class="confirm-text" href="{{ route('company.destroy', $list->id) }}">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-bootstrap/0.5pre/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: "departments.json", 
            dataType: "json",
            success: function(data) {
                buildTree(data);
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });

        function buildTree(data) {
            var tree = $("#departmentTree");
            $.each(data, function(index, department) {
                var node = $("<li>").appendTo(tree);
                $("<span>").text(department.name).appendTo(node);
                if (department.children && department.children.length > 0) {
                    var subTree = $("<ul>").appendTo(node);
                    buildTree(department.children, subTree);
                }
            });
        }
    });
    
</script>
@endsection
