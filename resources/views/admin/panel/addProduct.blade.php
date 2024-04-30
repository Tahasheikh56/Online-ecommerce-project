@extends("admin.layout.master")
@section("content")

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="ms-5 mt-2">Add Product</h2>
        <form action="{{ route('admin.product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- First Column -->
                <div class="col-md-4 ms-5">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter price">
                    </div>
                </div>
                <!-- Second Column -->
                <div class="col-md-4 ms-5">
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="other_media" class="form-label">Other Media</label>
                        <input type="file" class="form-control" id="other_media" name="other_media[]" multiple>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Third Column -->
                <div class="col-md-4 ms-5">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <!-- Fourth Column -->
                <div class="col-md-4 ms-5">
                    <div class="mb-3">
                        <label for="status" class="form-label">Categories</label>
                        <select class="form-select" id="status" name="category_id">
                        <option disabled selected>Select Categories</option>
                            @if($category)
                            @foreach($category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                               @else
                               <option>No Categories</option>
                               @endif
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary ms-5">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- SweetAlert Script to Show Status -->
    <script>
        @if (session('status'))
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