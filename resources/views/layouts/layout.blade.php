<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    @yield('styles')
</head>

<body>

<div class="d-flex">

    {{-- SIDEBAR (ONLY ADMIN) --}}
    @if(auth()->check() && auth()->user()->role === 'admin')
        @include('layouts.sidebar')
    @endif

    {{-- MAIN CONTENT --}}
    <div class="flex-grow-1 p-3">
        @yield('content')
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

@yield('scripts')

</body>
</html>