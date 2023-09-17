<?php

namespace App\Http\Controllers;

use App\Models\Cource;
use App\Models\Filial;
use Illuminate\Http\Request;

class CourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cources = Cource::latest()->paginate(20);
        return view('cource.index',[
            'cources' => $cources
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filials = Filial::where('status',1)->get()->pluck('name','id');
        return view('cource.create',[
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
        Cource::create($request->all());
        return redirect()->route('cource.index')->with('success','Cource created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cource $cource)
    {
        return view('cource.show',[
            'cource' => $cource,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cource $cource)
    {
        $filials = Filial::where('status',1)->get()->pluck('name','id');
        return view('cource.edit',[
            'cource' => $cource,
            'filials' => $filials,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cource $cource)
    {
        $this->validate($request, [
            'name' => 'required',
            'filial_id' => 'required',
            'status' => 'required',
        ]);
        $cource->update($request->all());
        return redirect()->route('cource.index')->with('success','Cource updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cource $cource)
    {
        $cource->delete();
        return redirect()->route('cource.index')->with('success','Cource deleted successfully');
    }

}
