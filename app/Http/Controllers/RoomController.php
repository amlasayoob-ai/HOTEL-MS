<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{


    public function store(Request $request)
    {
        $request->validate([
            'user_id'        => 'required|exists:users,id',
            'Room_price'     => 'required|numeric',
            'Room_type'      => 'required|string|max:255',
            'Room_condition' => 'required|string|max:255',
        ]);

        Room::create([
            'user_id'        => $request->user_id,
            'Room_price'     => $request->Room_price,
            'Room_type'      => $request->Room_type,
            'Room_condition' => $request->Room_condition,
        ]);

        return redirect()
            ->route('admin.rooms')
            ->with('success', ' Room added successfully!');
    }

    public function index()
    {
        $rooms = Room::all();
        return view('admin.rooms', compact('rooms'));
    }


    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        $request->validate([
            'Room_price'     => 'required|numeric',
            'Room_type'      => 'required|string',
            'Room_condition' => 'required|string',
        ]);

        $room->update($request->only([
            'Room_price',
            'Room_type',
            'Room_condition',
        ]));

        return redirect()->route('admin.rooms')
            ->with('success', ' Room updated successfully');
    }

    public function destroy($id)
    {
        Room::findOrFail($id)->delete();

        return redirect()->route('admin.rooms')
            ->with('success', ' Room deleted successfully');
    }
}
