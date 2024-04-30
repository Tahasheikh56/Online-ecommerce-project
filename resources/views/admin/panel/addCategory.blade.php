@extends('admin.layout.Master')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Title</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS (optional) -->
    <!-- You can include this if you want to use Bootstrap's JavaScript components -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <!-- Your HTML content here -->
        <div class="row">
            <!-- Table -->
            <div class="col-md-6">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->name }}</td>
                            
                                @if ($c->status == "Active")
                                <td><span class="text-success fs-6">Active</span></td>
                                @else
                                <td><span class="text-danger fs-6">Inactive</span></td>
                                @endif
                            
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $c->id }}">Edit</button>
                                <a href="{{ route('admin.deleteCategories', ['id' => $c->id]) }}" class="btn btn-danger">Delete </a>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal_{{ $c->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.updateCategories', ['id' => $c->id]) }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Category Name</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $c->name }}" placeholder="Enter category name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status</label>
                                                <select class="form-select" id="status" name="status" value="{{ $c->status }}">
                                                    <option value="active">Active</option>
                                                    <option value="inActive">Inactive</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Form -->
            <div class="col-md-4 ms-4">
                <form action="{{ route('admin.addCategories') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="active">Active</option>
                            <option value="inActive">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- SweetAlert Script to Show Status -->
<script>
    @if(session('status'))
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session("status") }}',
        timer: 3000,
        showConfirmButton: false,
        timerProgressBar: true,
        toast: true,
        position: 'top-end',
    });
    @endif
</script>
@endsection