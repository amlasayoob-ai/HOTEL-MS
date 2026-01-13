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

    <form method="POST" action="{{ route('register.submit') }}">
        @csrf

        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" required
                   class="w-full border p-2 mb-2 rounded">
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" placeholder="Email" required
                   class="w-full border p-2 mb-2 rounded">
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="password" placeholder="Password" required
                   class="w-full border p-2 mb-2 rounded">
        </div>

        <div>
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required
                   class="w-full border p-2 mb-2 rounded">
        </div>

        <div>
            <label>Role</label>
            <select name="role" class="w-full border p-2 mb-2 rounded">
                <option value="user">User</option>
            </select>
        </div>

        <div>
            <label>Address</label>
            <textarea name="address" placeholder="Address" required
                      class="w-full border p-2 mb-2 rounded"></textarea>
        </div>

        <div>
            <label>Phone Number</label>
            <input type="text" name="phone_number" placeholder="Phone Number" required
                   class="w-full border p-2 mb-4 rounded">
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">
            Register
        </button>
    </form>

     <p class="text-center mt-4 text-gray-600">
            already have an account?
            <a href="{{ route('login.form') }}"
               class="text-indigo-600 hover:underline">
                Login
            </a>
</div>

</body>
</html>
