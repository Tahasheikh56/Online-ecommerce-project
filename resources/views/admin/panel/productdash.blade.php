@extends("admin.layout.master")

@section("content")

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 5 Table</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container">
        <h2>Bootstrap 5 Table</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example row -->
                @foreach ($product as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->title }}</td>
                    <td>{{ $p->description }}</td>
                    <td>${{ $p->price }}</td>
                    <td>{{ $p->quantity }}</td>
                    <td>
                        @if($p->status == "Active")
                        <span class="text-success">Active</span>
                        @else
                        <span class="text-danger">InActive</span>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Action
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#">
                                        <!-- Button to trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal_{{ $p->id }}">
                                            Open Modal
                                        </button>
                                    </a></li>
                                <li><a class="dropdown-item" href="#" onclick="status_change( {{$p->id}} )">
                                        @if($p->status == "Active")
                                        <button type="button" class="btn btn-danger">InActive</button>
                                        @else
                                        <button type="button" class="btn btn-success">Active</button>
                                        @endif
                                    </a></li>
                                <li><a class="dropdown-item" href="#" onclick="status_delete( {{$p->id}} )"> <button type="button" class="btn btn-danger">Delete</button> </a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <!-- modal for edit -->
                <!-- Modal -->
                <div class="modal fade" id="myModal_{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Form</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container mt-4">
                                    <!-- First Column -->
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title_{{ $p->id }}" name="title" value="{{ $p->title }}" placeholder="Enter title">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <input type="text" class="form-control" id="description_{{ $p->id }}" name="description" value="{{ $p->description }}" rows="3" placeholder="Enter description" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" class="form-control" id="price_{{ $p->id }}" name="price" value="{{ $p->price }}" placeholder="Enter price">
                                    </div>
                                    <!-- Second Column -->
                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="number" class="form-control" id="quantity_{{ $p->id }}" name="quantity" value="{{ $p->quantity }}" placeholder="Enter quantity">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="update_product({{ $p->id }})">Save changes</button>
                                <!-- You can add additional buttons here -->
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function update_product(id) {
        let title = document.getElementById('title_' + id).value;
        let description = document.getElementById('description_' + id).value;
        let price = document.getElementById('price_' + id).value;
        let quantity = document.getElementById('quantity_' + id).value;
        var data = {
            'id': id,
            'title': title,
            'description': description,
            'price': price,
            'quantity': quantity
        };
        $.ajax({
            type: "POST",
            url: "{{ route('admin.update_product') }}",
            data: data,
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: data.status,
                    timer: 3000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                    toast: true,
                    position: 'top-end',
                });
                location.reload();
            },
            error: function(xhr, textstatus, errorthrown) {
                console.log(xhr.responseText);
            }
        });
    }

    function status_delete(id) {
        var data = {
            'id': id
        };
        $.ajax({
            type: "POST",
            url: "{{ route('admin.status_delete') }}",
            data: data,
            dataType: "json",
            encode: true,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: data.status,
                    timer: 3000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                    toast: true,
                    position: 'top-end',
                });
                location.reload();
            },
            error: function(xhr, textstatus, errorthrown) {
                console.log(xhr.responseText);
            }
        });
    }

    function status_change(id) {
        var data = {
            'id': id
        };
        $.ajax({
            type: "POST",
            url: "{{ route('admin.status_change') }}",
            data: data,
            dataType: "json",
            encode: true,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: data.status,
                    timer: 3000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                    toast: true,
                    position: 'top-end',
                });
                location.reload();
            },
            error: function(xhr, textstatus, errorthrown) {
                console.log(xhr.responseText);
            }
        });
    }
</script>

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