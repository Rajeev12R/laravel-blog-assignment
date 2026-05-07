<!DOCTYPE html>
<html>
<head>
    <title>Blog Management System</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
        .card {
            border: none;
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,.1) !important;
        }
        .card-img-top {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .form-control, .form-select {
            border-radius: 8px;
            padding: 0.6rem 1rem;
            border: 1px solid #dee2e6;
        }
        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 0.25rem rgba(13,110,253,.15);
        }
        .btn {
            border-radius: 8px;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand"
           href="{{ route('home') }}">

            Blog System

        </a>

    </div>

</nav>

<div class="container py-4">

    @yield('content')

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

@stack('scripts')

</body>
</html>