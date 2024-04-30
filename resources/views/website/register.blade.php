<!-- resources/views/website/register.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Signup Form
        </div>
        <div class="card-body">
          @if(session("status"))
          <div class="alert alert-danger">{{ session("status") }}</div>
          @endif
          <form action="{{ route('user.registeration') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" value="{{ old('name') }}" name="name" placeholder="Enter username">
             @error("name")
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror
             </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email" placeholder="Enter email">
             @error("email")
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" value="{{ old('password') }}" name="password" placeholder="Enter password">
              @error("password")
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror
            </div>
            <div class="form-group">
              <label for="confirmPassword">Confirm Password</label>
              <input type="password" class="form-control" id="confirmPassword" value="{{ old('password_confirmation') }}" name="password_confirmation" placeholder="Confirm password">
              @error("password_confirmation")
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror
            </div>
            <div class="form-group">
              <label for="confirmPassword">Profile Image</label>
              <input type="file" class="form-control" id="confirmPassword" value="{{ old('image') }}" name="image">
              @error("image")
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
            <a href="{{ route('login') }}">Already have an account?</a>
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
