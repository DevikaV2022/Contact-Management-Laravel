<style>
    .sidebar {
        width: 250px;
        min-height: 100vh;
        background: linear-gradient(180deg, #18a558, #198754);
        color: white;
    }

    .sidebar .nav-link {
        color: white;
        padding: 10px 15px;
        margin-bottom: 8px;
        border-radius: 8px;
        transition: 0.3s;
    }

    /* Hover */
    .sidebar .nav-link:hover {
        background: white;
        color: #18a558;
    }

    /* Active */
    .sidebar .nav-link.active {
        background: white;
        color: #18a558;
        font-weight: bold;
    }

    .profile-img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
    }
</style>

<div class="sidebar d-flex flex-column p-3">

    <!-- Logo -->
    <div class="text-center mb-3">
        <img src="https://i.pinimg.com/736x/b4/1f/f4/b41ff478e42e31fd71584d9dae338ffa.jpg"
             class="profile-img"
             alt="logo">
    </div>

    <!-- Admin Name -->
    <div class="text-center mb-3">
        <h5>{{ Auth::user()->name ?? 'Admin' }}</h5>
    </div>

    <!-- MENU -->
    <nav class="nav flex-column mt-3">

       <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
        Dashboard
       </a>

       <a href="{{ route('admin.contact') }}" class="nav-link {{ request()->is('contact-list') ? 'active' : '' }}">
        Contact List
       </a>

       <a href="{{ route('admin.manage') }}" class="nav-link {{ request()->is('manage-contact') ? 'active' : '' }}">
        Manage Contact
       </a>

    </nav>

    <!-- LOGOUT -->
    <div class="mt-auto">

        <form method="POST" action="{{ route('logout') }}" onsubmit="return confirmLogout()">
            @csrf
            <button class="btn btn-light w-100 mt-3">
                Logout
            </button>
        </form>

    </div>

</div>

<script>
function confirmLogout() {
    return confirm("Are you sure you want to logout?");
}
</script>