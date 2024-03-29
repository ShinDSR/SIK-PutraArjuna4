<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomFacility;

class RoomFacilityController extends Controller
{
    public function index()
    {
        $roomFacilities = RoomFacility::all();
        return view('room_facilities.index', compact('roomFacilities'));
    }

    public function create()
    {
        return view('room_facilities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required|max:30',
            'deskripsi_fasilitas' => 'required|max:100',
        ]);

        RoomFacility::create($request->all());

        return redirect()->route('room_facilities.index')
            ->with('success', 'Room Facility created successfully.');
    }

    // public function show($id)
    // {
    //     $roomFacility = RoomFacility::find($id);
    //     return view('room_facilities.show', compact('roomFacility'));
    // }

    public function edit(RoomFacility $roomFacility)
    {
        return view('room_facilities.edit', compact('roomFacility'));
    }

    public function update(Request $request, RoomFacility $roomFacility)
    {
        $request->validate([
            'nama_fasilitas' => 'required|max:30',
            'deskripsi_fasilitas' => 'required|max:100',
        ]);

        $roomFacility->update($request->all());

        return redirect()->route('room_facilities.index')
            ->with('success', 'Room Facility updated successfully');
    }

    public function destroy(RoomFacility $roomFacility)
    {
        $roomFacility->delete();

        return redirect()->route('room_facilities.index')
            ->with('success', 'Room Facility deleted successfully');
    }
}
