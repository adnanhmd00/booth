<?php

namespace App\Http\Controllers;

use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Http\Request;
use App\Models\Assembly;

class AssemblyController extends Controller
{
    public function index(){
        $assemblies = Assembly::all();
        return view('assembly.assembly', compact('assemblies'));
    }

    public function store(Request $request){
        $assembly = new Assembly;
        $assembly->truncate();
        $tr_district = GoogleTranslate::trans($request->district, 'hi', 'en');
        $tr_assembly = GoogleTranslate::trans($request->assembly, 'hi', 'en');
        $assembly->district = $tr_district;
        $assembly->assembly = $tr_assembly;
        $assembly->status = 1;
        if($assembly->save()){
            return back()->with('success', 'Assembly saved successfully');
        }
    }
}
