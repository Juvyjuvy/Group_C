<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <!-- Include SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    @yield('content')
<script>
document.getElementById("loginForm").addEventListener("submit", function(event){
    event.preventDefault(); // Prevent form submission
    // Your logic to validate and submit the form
    // For demonstration, let's show a SweetAlert
    Swal.fire({
        icon: 'success',
        title: 'Signed in successfully!',
        showConfirmButton: false,
        timer: 1500
    });
});
</script>

</body>
</html>
