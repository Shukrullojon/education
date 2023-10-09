<?php

namespace App\Http\Controllers;

use App\Models\PC;
use App\Models\PT;
use App\Models\PU;
use Illuminate\Http\Request;

class PTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pts = PT::latest()->paginate(20);
        return view('pt.index',[
            'pts' => $pts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pcs = PC::latest()->get()->pluck('name','id');
        return view('pt.create',[
            'pcs' => $pcs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'question' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'answer' => 'required',
            'p_c_id' => 'required',
        ]);
        PT::create($request->all());
        return redirect()->route('pt.index')->with('success','Placement Test created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pt = PT::find($id);
        return view('pt.show',[
            'pt' => $pt,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pcs = PC::get()->pluck('name','id');
        $pt = PT::find($id);
        return view('pt.edit',[
            'pt' => $pt,
            'pcs' => $pcs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'question' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'answer' => 'required',
            'p_c_id' => 'required',
        ]);
        $pt = PT::find($id);
        $pt->update($request->all());
        return redirect()->route('pt.index')
            ->with('success','Placement Test updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PT::where('id',$id)->delete();
        return redirect()->route('pt.index')
            ->with('success','Placement Test deleted successfully');
    }

    public function results(){
        $pus = PU::latest()->paginate(30);
        return view('pt.result',[
            'pus' => $pus,
        ]);
    }

}
