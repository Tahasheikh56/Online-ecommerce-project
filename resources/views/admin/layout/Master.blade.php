<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="{{ asset('admin/assets/style.css') }}">

	<title>AdminHub</title>
</head>
<body>
 
@include('admin.components.header')
@include('admin.components.navbar')
@yield('content')


<script src="{{ asset('admin/assets/js/script.js') }}"></script>

<script>
    document.querySelector('.dropdown img').onclick = function() {
        var dropdowns = document.querySelector('.dropdown-content');
        if (dropdowns.style.display === 'block') {
            dropdowns.style.display = 'none';
        } else {
            dropdowns.style.display = 'block';
        }
    }
</script>

</body>
</html>