<!-- resources/views/website/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Login Form
        </div>
        <div class="card-body">
        @if(session("status"))
          <div class="alert alert-danger">{{ session("status") }}</div>
          @endif
          <form action="{{ route('user.logining') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
              @error("email")
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
              @error("password")
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <p><a href="{{ route('register') }}">Create new account?</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
