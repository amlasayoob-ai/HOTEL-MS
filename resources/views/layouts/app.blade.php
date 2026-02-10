<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white text-black border-r border-gray-300">
        <div class="p-6 text-2xl font-bold border-b border-gray-300">
            {{ ucfirst(Auth::user()->role) }} Panel
        </div>

        <nav class="mt-6">

            {{-- ADMIN --}}
            @if(Auth::user()->role === 'admin')
                <a href="/app" class="block px-6 py-3 hover:bg-gray-200">Dashboard</a>
                <a href="/admin/user-table" class="block px-6 py-3 hover:bg-gray-200">Manage Users</a>
                <a href="/admin/rooms" class="block px-6 py-3 hover:bg-gray-200">Rooms</a>
                <a href="#" class="block px-6 py-3 hover:bg-gray-200">Bookings</a>
            @endif

            {{-- MANAGER --}}
            @if(Auth::user()->role === 'manager')
                <a href="/dashboard" class="block px-6 py-3 hover:bg-gray-200">Dashboard</a>
                <a href="#" class="block px-6 py-3 hover:bg-gray-200">Rooms</a>
            @endif

            {{-- STAFF --}}
            @if(Auth::user()->role === 'staff')
                <a href="/dashboard" class="block px-6 py-3 hover:bg-gray-200">My Bookings</a>
            @endif

            {{-- USER --}}
            @if(Auth::user()->role === 'user')
                <a href="/dashboard" class="block px-6 py-3 hover:bg-gray-200">My Dashboard</a>
                <a href="/bookings" class="block px-6 py-3 hover:bg-gray-200">Bookings</a>
                <a href="/rooms" class="block px-6 py-3 hover:bg-gray-200">Rooms</a>
                <a href="/profile" class="block px-6 py-3 hover:bg-gray-200">Profile</a>
            @endif

            <!-- LOGOUT -->
            <form method="POST" action="{{ route('logout') }}" class="mt-6">
                @csrf
                <button class="w-full text-left px-6 py-3 hover:bg-red-100 text-red-600 font-semibold">
                    Logout
                </button>
            </form>

        </nav>
    </aside>

    <!-- PAGE CONTENT -->
    <main class="flex-1 p-8 bg-black">

        <!-- Optional page title -->
        <div class="mb-6 text-white">
            @yield('page-title')
        </div>

        <!-- CONTENT AREA (SAFE FOR FORMS) -->
        <div class="bg-white text-gray-800 p-6 rounded-lg shadow">
            @yield('content')
        </div>

    </main>

</div>

</body>
</html>
