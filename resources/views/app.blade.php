<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white text-black border-r border-gray-300">
        <div class="p-6 text-2xl font-bold border-b border-gray-300">
            {{ ucfirst(Auth::user()->role) }} Panel
        </div>

        <nav class="mt-6">

            {{-- ADMIN SIDEBAR --}}
            @if(Auth::user()->role == 'admin')
                <a href="#" class="block px-6 py-3 hover:bg-gray-200">Dashboard</a>
                <a href="admin/register" class="block px-6 py-3 hover:bg-gray-200">Manage Users</a>
                <a href="#" class="block px-6 py-3 hover:bg-gray-200">Users</a>
                <a href="#" class="block px-6 py-3 hover:bg-gray-200">Managers</a>
                <a href="#" class="block px-6 py-3 hover:bg-gray-200">Staff</a>
                <a href="#" class="block px-6 py-3 hover:bg-gray-200">Bookings</a>
                <a href="#" class="block px-6 py-3 hover:bg-gray-200">Payments</a>
            @endif

            {{-- MANAGER SIDEBAR --}}
            @if(Auth::user()->role == 'manager')
                <a href="#" class="block px-6 py-3 hover:bg-gray-200">Dashboard</a>
                <a href="#" class="block px-6 py-3 hover:bg-gray-200">Bookings</a>
                <a href="#" class="block px-6 py-3 hover:bg-gray-200">Rooms</a>
                <a href="#" class="block px-6 py-3 hover:bg-gray-200">Staff</a>
            @endif

            {{-- STAFF SIDEBAR --}}
            @if(Auth::user()->role == 'staff')
                <a href="#" class="block px-6 py-3 hover:bg-gray-200">Dashboard</a>
                <a href="#" class="block px-6 py-3 hover:bg-gray-200">My Bookings</a>
                <a href="#" class="block px-6 py-3 hover:bg-gray-200">Room Status</a>
            @endif

            {{-- USER SIDEBAR --}}
            @if(Auth::user()->role == 'user')
                <a href="#" class="block px-6 py-3 hover:bg-gray-200">My Dashboard</a>
                <a href="#" class="block px-6 py-3 hover:bg-gray-200">My Bookings</a>
                <a href="#" class="block px-6 py-3 hover:bg-gray-200">Payments</a>
            @endif

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}" class="mt-6">
                @csrf
                <button type="submit"
                    class="w-full text-left px-6 py-3 hover:bg-red-100 text-red-600 font-semibold">
                    Logout
                </button>
            </form>

        </nav>
    </aside>

    <!-- Main Content (Dashboard) -->
    <main class="flex-1 p-8 bg-black text-white">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Dashboard</h1>
            <span class="text-gray-300">
                Welcome, {{ Auth::user()->name }}
            </span>
        </div>

        <div class="bg-gray-900 p-6 rounded shadow">
            <h2 class="text-xl font-bold">
                {{ ucfirst(Auth::user()->role) }} Dashboard
            </h2>
            <p class="mt-2 text-gray-300">
                This page is visible only for <b>{{ Auth::user()->role }}</b>.
            </p>
        </div>
    </main>

</div>

</body>
</html>
