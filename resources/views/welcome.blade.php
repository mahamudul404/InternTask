<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InternTask</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .btn-custom {
            transition: transform 0.3s ease;
        }

        .btn-custom:hover {
            transform: translateY(-5px);
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">InternTask</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <!-- If the user is logged in -->
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link"
                                    style="text-decoration: none;">Logout</button>
                            </form>
                        </li>
                    @else
                        <!-- If the user is not logged in -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5 text-center">
        <h1 class="mb-4">Welcome to InternTask</h1>
        <p class="lead mb-5">Get started with one of the options below:</p>
        <div class="row">
            <div class="col-md-6 mb-4">
                <a href=" {{ route('upload.images') }} " class="btn btn-primary btn-lg btn-block btn-custom w-100">
                    <i class="fas fa-images me-2"></i> Multiple Image Upload
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a href="  {{ route('products.index') }} " class="btn btn-success btn-lg btn-block btn-custom w-100">
                    <i class="fas fa-tasks me-2"></i> CRUD Operations using AJAX
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
