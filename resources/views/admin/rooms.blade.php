@extends('layouts.app')

@section('title', 'Rooms')

@section('content')

<div class="p-10">

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="mb-4 rounded bg-green-100 px-4 py-3 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <!-- ADD BUTTON -->
    <button onclick="openAddModal()"
        class="mb-6 rounded bg-indigo-600 px-6 py-2 text-white hover:bg-indigo-700">
        + Add Room
    </button>

    <!-- ================= ADD ROOM MODAL ================= -->
    <div id="addRoomModal"
        class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-50">

        <div class="w-full max-w-lg rounded bg-white p-6 shadow-lg">
            <h2 class="mb-4 text-xl font-bold">Add Room</h2>

            <form action="{{ url('admin/room.save') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label>Room No (User ID)</label>
                    <input type="number" name="user_id" required
                        class="w-full rounded border px-3 py-2">
                </div>

                <div>
                    <label>Room Price</label>
                    <input type="number" name="Room_price" required
                        class="w-full rounded border px-3 py-2">
                </div>

                <div>
                    <label>Room Type</label>
                    <input type="text" name="Room_type" required
                        class="w-full rounded border px-3 py-2">
                </div>

                <div>
                    <label>Room Condition</label>
                    <input type="text" name="Room_condition" required
                        class="w-full rounded border px-3 py-2">
                </div>

                <div class="flex justify-end gap-3">
                    <button type="button" onclick="closeAddModal()"
                        class="rounded bg-gray-300 px-4 py-2">
                        Cancel
                    </button>

                    <button type="submit"
                        class="rounded bg-indigo-600 px-5 py-2 text-white">
                        Save Room
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ================= ROOMS LIST ================= -->
    <h1 class="mb-6 text-2xl font-bold">Rooms List</h1>

    @if($rooms->count() > 0)
        @foreach($rooms as $room)
            <div class="mb-4 flex items-center justify-between rounded bg-white p-4 shadow">

                <!-- DETAILS -->
                <div>
                    <p><b>User ID:</b> {{ $room->user_id }}</p>
                    <p><b>Price:</b> {{ $room->Room_price }}</p>
                    <p><b>Type:</b> {{ $room->Room_type }}</p>
                    <p><b>Condition:</b> {{ $room->Room_condition }}</p>
                </div>

                <!-- ACTIONS -->
                <div class="flex gap-2">
                    <button
                        onclick="openEditModal(
                            {{ $room->id }},
                            {{ $room->user_id }},
                            '{{ $room->Room_price }}',
                            '{{ $room->Room_type }}',
                            '{{ $room->Room_condition }}'
                        )"
                        class="rounded bg-yellow-500 px-4 py-2 text-white hover:bg-yellow-600">
                        Edit
                    </button>

                    <form action="{{ route('rooms.destroy', $room->id) }}" method="POST"
                          onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button
                            class="rounded bg-red-600 px-4 py-2 text-white hover:bg-red-700">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    @else
        <p class="text-red-600">No rooms found</p>
    @endif
</div>

<!-- ================= EDIT ROOM MODAL ================= -->
<div id="editRoomModal"
     class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-50">

    <div class="w-full max-w-lg rounded bg-white p-6 shadow-lg">
        <h2 class="mb-4 text-xl font-bold">Edit Room</h2>

        <form id="editRoomForm" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label>Room No (User ID)</label>
                <input type="number" id="edit_user_id" readonly
                       class="w-full rounded border bg-gray-100 px-3 py-2">
            </div>

            <div>
                <label>Room Price</label>
                <input type="number" name="Room_price" id="edit_price" required
                       class="w-full rounded border px-3 py-2">
            </div>

            <div>
                <label>Room Type</label>
                <input type="text" name="Room_type" id="edit_type" required
                       class="w-full rounded border px-3 py-2">
            </div>

            <div>
                <label>Room Condition</label>
                <input type="text" name="Room_condition" id="edit_condition" required
                       class="w-full rounded border px-3 py-2">
            </div>

            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeEditModal()"
                        class="rounded bg-gray-300 px-4 py-2">
                    Cancel
                </button>

                <button type="submit"
                        class="rounded bg-indigo-600 px-5 py-2 text-white">
                    Update Room
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ================= SCRIPTS ================= -->
<script>
    function openAddModal() {
        document.getElementById('addRoomModal').classList.remove('hidden');
        document.getElementById('addRoomModal').classList.add('flex');
    }

    function closeAddModal() {
        document.getElementById('addRoomModal').classList.add('hidden');
        document.getElementById('addRoomModal').classList.remove('flex');
    }

    function openEditModal(id, userId, price, type, condition) {

        document.getElementById('edit_user_id').value = userId;
        document.getElementById('edit_price').value = price;
        document.getElementById('edit_type').value = type;
        document.getElementById('edit_condition').value = condition;

        document.getElementById('editRoomForm').action = `/admin/rooms/${id}`;

        document.getElementById('editRoomModal').classList.remove('hidden');
        document.getElementById('editRoomModal').classList.add('flex');
    }

    function closeEditModal() {
        document.getElementById('editRoomModal').classList.add('hidden');
        document.getElementById('editRoomModal').classList.remove('flex');
    }
</script>

@endsection
