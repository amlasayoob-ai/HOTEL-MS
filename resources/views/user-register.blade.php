<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white shadow-lg rounded-lg w-full max-w-md p-8">
    <h2 class="text-3xl font-bold text-center text-indigo-600 mb-6">Create Account</h2>

    <!-- FIXED: Changed route to 'admin.register.submit' -->
    <form method="POST" action="{{ route('register.store') }}">
        @csrf

        <div>
            <label class="block text-gray-700 mb-1">Name</label>
            <input type="text" name="name" placeholder="Name" required
                   class="w-full border p-2 mb-2 rounded">
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Email</label>
            <input type="email" name="email" placeholder="Email" required
                   class="w-full border p-2 mb-2 rounded">
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Password</label>
            <input type="password" name="password" placeholder="Password" required
                   class="w-full border p-2 mb-2 rounded">
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Confirm Password</label>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required
                   class="w-full border p-2 mb-2 rounded">
        </div>

        <div>
            
            <input type="hidden" name="role" placeholder="role" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Address</label>
            <textarea name="address" placeholder="Address" required
                      class="w-full border p-2 mb-2 rounded"></textarea>
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Phone Number</label>
            <input type="text" name="phone_number" placeholder="Phone Number" required
                   class="w-full border p-2 mb-4 rounded">
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">
            Register
        </button>
    </form>

    
</div>

</body>
</html>