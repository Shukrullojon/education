<?php

namespace App\Http\Controllers;

use App\Models\Filial;
use App\Models\Room;
use App\Models\RoomTasks;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::latest()->paginate(20);
        return view('room.index',[
            'rooms' => $rooms,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filials = Filial::where('status',1)->get()->pluck('name','id');
        $tasks = RoomTasks::where('status',1)->get();
        return view('room.create',[
            'filials' => $filials,
            'tasks' => $tasks,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'filial_id' => 'required',
            'status' => 'required',
        ]);
        $room = Room::create($request->all());
        //$room->syncPermissions($request->input('tasks'));
        $room->roomTask()->attach($request->input('tasks'));
        return redirect()->route('room.index')->with('success','Room created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return view('room.show',[
            'room' => $room,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $filials = Filial::where('status',1)->get()->pluck('name','id');
        $tasks = RoomTasks::where('status',1)->get();
        return view('room.edit',[
            'room' => $room,
            'filials' => $filials,
            'tasks' => $tasks,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $this->validate($request, [
            'name' => 'required',
            'filial_id' => 'required',
            'status' => 'required',
        ]);
        $room->update($request->all());
        return redirect()->route('room.index')->with('success','Room updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('room.index')->with('success','Room deleted successfully');
    }
}
