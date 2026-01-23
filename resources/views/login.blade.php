<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white shadow-lg rounded-lg w-full max-w-md p-8">
    <h2 class="text-3xl font-bold text-center text-indigo-600 mb-6">
        Login
    </h2>

    {{-- ✅ Success message (after register) --}}
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- ❌ Error message (login fail) --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-3 rounded mb-4">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf

        <div class="mb-3">
            <label class="block mb-1">Email</label>
            <input type="email"
                   name="email"
                   value="{{ old('email') }}"
                   placeholder="Enter your email"
                   required
                   class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-400">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Password</label>
            <input type="password"
                   name="password"
                   placeholder="Enter your password"
                   required
                   class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-400">
        </div>

        <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 transition">
            Login
        </button>

        <p class="text-center mt-4 text-gray-600">
            Don’t have an account?
            <a href="{{ route('reg.view') }}"
               class="text-indigo-600 hover:underline">
                Register
            </a>
        </p>
    </form>
</div>

</body>
</html>
