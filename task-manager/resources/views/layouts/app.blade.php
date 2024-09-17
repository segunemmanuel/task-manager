<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"  crossorigin="anonymous">
    <!-- Optional: Include your own custom CSS -->
    {{--  <link rel="stylesheet" href="{{ asset('css/app.css') }}">  --}}
</head>
<body>

    <!-- Header Section -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('tasks.index')}}">Task Management</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('tasks.index')}}">Tasks</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('tasks.create')}}">Create Task</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Projects</a>
                        </li>
                        <li class="nav-item">
                            {{--  <a class="nav-link" href="{{ route('projects.create') }}">Create Project</a>  --}}
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content Section -->
    <main class="container mt-4">
        @yield('content') <!-- Content will be injected here by Laravel Blade templates -->
    </main>

    <!-- Footer Section -->
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            {{--  <span class="text-muted">&copy; {{ date('Y') }} Task Management System. All rights reserved.</span>  --}}
        </div>
    </footer>

    <!-- Bootstrap JS and Popper.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- Optional: Include your own custom JavaScript -->
    {{--  <script src="{{ asset('js/app.js') }}"></script>  --}}
</body>
</html>
