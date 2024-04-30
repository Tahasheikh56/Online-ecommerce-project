<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Card Example</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        @foreach($product as $p)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset($p->image) }}" width="100px" alt="" srcset="">
                        <h5 class="card-title">{{ $p->title }}</h5>
                        <p class="card-text">{{ $p->description }}</p>
                        <p class="card-text">{{ $p->price }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Bootstrap Bundle JS (Popper.js + Bootstrap JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
