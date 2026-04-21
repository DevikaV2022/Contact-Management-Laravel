<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    @yield('styles')
</head>

<body style="margin:0;">

  <div class="d-flex" style="min-height:100vh;">

    {{-- SIDEBAR (ONLY ADMIN) --}}
    @auth
      @if(auth()->user()->role === 'admin')
        <div style="width:250px; flex-shrink:0;">
            @include('layouts.sidebar')
        </div>
      @endif
    @endauth

    {{-- MAIN CONTENT --}}
    <div class="flex-grow-1 p-3">
        @yield('content')
    </div>

</div>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.15.3/dist/echo.iife.js"></script>

@auth
<script>
    Echo.private('user.{{ auth()->id() }}')
    .listen('UserLoggedOut', () => {
        window.location.href = "/login";
    });
</script>
@endauth
@yield('scripts')

</body>
</html>