<?php

namespace App\Http\Controllers;

use App\Models\Filial;
use Illuminate\Http\Request;

class FilialController extends Controller
{
    public function index(){
        $filials = Filial::latest()->paginate(20);
        return view('filial.index',[
            'filials' => $filials
        ]);
    }

    public function create(){
        return view('filial.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'status' => 'required',
        ]);
        Filial::create($request->all());
        return redirect()->route('filial.index')->with('success','Filial created successfully');
    }

    public function show($id){
        $filial = Filial::find($id);
        return view('filial.show',[
            'filial' => $filial,
        ]);
    }

    public function edit($id){
        $filial = Filial::find($id);
        return view('filial.edit',[
            'filial' => $filial,
        ]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'status' => 'required',
        ]);
        $filial = Filial::find($id);
        $filial->update($request->all());
        return redirect()->route('filial.index')
            ->with('success','Filial updated successfully');
    }

    public function destroy($id){
        Filial::where('id',$id)->delete();
        return redirect()->route('filial.index')
            ->with('success','Filial deleted successfully');
    }

}
