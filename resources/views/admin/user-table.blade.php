@extends('layouts.app')

@section('title', 'Users List')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-white">Users List</h1>

    <button onclick="openAddModal()"
        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        + Add User
    </button>
</div>

@if(session('success'))
    <div class="bg-green-200 text-green-800 p-3 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif

<table class="min-w-full bg-white border border-gray-300 text-black">
    <thead class="bg-gray-800 text-white">
        <tr>
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Role</th>
            <th class="px-4 py-2">Phone</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>

    <tbody>
    @foreach($users as $user)
        <tr class="border-b text-center">
            <td class="px-4 py-2">{{ $user->id }}</td>
            <td class="px-4 py-2">{{ $user->name }}</td>
            <td class="px-4 py-2">{{ $user->email }}</td>
            <td class="px-4 py-2">{{ $user->role }}</td>
            <td class="px-4 py-2">{{ $user->phone_number }}</td>
            <td class="px-4 py-2 flex justify-center gap-2">

                <button
                    onclick='openEditModal(
                        @json($user->id),
                        @json($user->name),
                        @json($user->email),
                        @json($user->role),
                        @json($user->phone_number),
                        @json($user->address)
                    )'
                    class="bg-blue-500 text-white px-3 py-1 rounded">
                    Edit
                </button>

                <form method="POST"
                      action="{{ route('users.destroy', $user->id) }}">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Are you sure?')"
                        class="bg-red-500 text-white px-3 py-1 rounded">
                        Delete
                    </button>
                </form>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{-- ADD USER MODAL --}}
<div id="addModal"
     class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white p-6 rounded w-96">
        <h2 class="text-xl font-bold mb-4 text-center">Add User</h2>

        <form method="POST" action="{{ route('register.submit') }}">
            @csrf

            <input class="w-full border p-2 mb-2" name="name" placeholder="Name" required>
            <input class="w-full border p-2 mb-2" name="email" type="email" placeholder="Email" required>
            <input class="w-full border p-2 mb-2" name="password" type="password" placeholder="Password" required>
            <input class="w-full border p-2 mb-2" name="password_confirmation" type="password" placeholder="Confirm Password" required>

            <select name="role" class="w-full border p-2 mb-2">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>

            <input class="w-full border p-2 mb-2" name="address" placeholder="Address">
            <input class="w-full border p-2 mb-4" name="phone_number" placeholder="Phone">

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeAddModal()" class="bg-gray-400 px-4 py-1 rounded">Cancel</button>
                <button class="bg-green-600 text-white px-4 py-1 rounded">Save</button>
            </div>
        </form>
    </div>
</div>

{{-- EDIT MODAL --}}
<div id="editModal"
     class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white p-6 rounded w-96">
        <h2 class="text-xl font-bold mb-4">Edit User</h2>

        <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <input id="edit_name" name="name" class="w-full border p-2 mb-2">
            <input id="edit_email" name="email" class="w-full border p-2 mb-2">
            <input id="edit_role" name="role" class="w-full border p-2 mb-2">
            <input id="edit_phone" name="phone_number" class="w-full border p-2 mb-2">
            <input id="edit_address" name="address" class="w-full border p-2 mb-4">

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeEditModal()" class="bg-gray-400 px-4 py-1 rounded">Cancel</button>
                <button class="bg-blue-600 text-white px-4 py-1 rounded">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
function openAddModal(){ addModal.classList.remove('hidden') }
function closeAddModal(){ addModal.classList.add('hidden') }

function openEditModal(id,name,email,role,phone,address){
    editModal.classList.remove('hidden')
    edit_name.value=name
    edit_email.value=email
    edit_role.value=role
    edit_phone.value=phone
    edit_address.value=address
    editForm.action = `/admin/users/${id}`
}
function closeEditModal(){ editModal.classList.add('hidden') }
</script>

@endsection
