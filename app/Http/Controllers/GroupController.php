<?php

namespace App\Http\Controllers;

use App\Models\Cource;
use App\Models\Filial;
use App\Models\Group;
use App\Models\Room;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::latest()->paginate(20);
        return view('group.index',[
            'groups' => $groups
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cources = Cource::where('status',1)->latest()->get()->pluck('name','id');
        $filials = Filial::where('status',1)->latest()->get()->pluck('name','id');
        return view('group.create',[
            'cources' => $cources,
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
            'cource_id' => 'required',
            'status' => 'required',
            'type' => 'required',
        ]);
        $group = Group::create([
            'name' => $request->name,
            'type' => $request->type,
            'start_time' => $request->start_time,
            'cource_id' => $request->cource_id,
            'filial_id' => $request->filial_id,
            'max_student' => $request->max_student,
            'status' => $request->status,
        ]);
        return redirect()->route('group.show',$group->id)->with('success','Group created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rooms = Room::where('status',1)->latest()->get();
        $group = Group::find($id);
        return view('group.show',[
            'group' => $group,
            'rooms' => $rooms,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
