<?php

namespace App\Http\Controllers;

use App\Models\Filial;
use App\Models\RoomTasks;
use Illuminate\Http\Request;

class RoomTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = RoomTasks::latest()->paginate(20);
        return view('room-task.index',[
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filials = Filial::where('status',1)->get()->pluck('name','id');
        return view('room-task.create',[
            'filials' => $filials,
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
        RoomTasks::create($request->all());
        return redirect()->route('task-room.index')->with('success','Room Task created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $roomTasks = RoomTasks::find($id);
        return view('room-task.show',[
            'roomTasks' => $roomTasks,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $roomTasks = RoomTasks::find($id);
        $filials = Filial::where('status',1)->get()->pluck('name','id');
        return view('room-task.edit',[
            'filials' => $filials,
            'roomTasks' => $roomTasks,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'filial_id' => 'required',
            'status' => 'required',
        ]);
        $roomTasks = RoomTasks::find($id);
        $roomTasks->update($request->all());
        return redirect()->route('task-room.index')->with('success','Room Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        RoomTasks::find($id)->delete();
        return redirect()->route('task-room.index')->with('success','Room Task deleted successfully');
    }
}
