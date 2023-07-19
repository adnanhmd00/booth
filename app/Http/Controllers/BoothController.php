<?php

namespace App\Http\Controllers;

use Stichoza\GoogleTranslate\GoogleTranslate;

use Illuminate\Http\Request;
use App\Models\Booth;
use App\Models\Assembly;
use Str;
use Auth;

class BoothController extends Controller
{
    public function index(){
        $booths = Booth::all();
        return view('booth.booths', compact('booths'));
    }

    public function create(){
        return view('booth.create');
    }

    public function store(Request $request){ 
        $booth = new Booth;
        $assembly = Assembly::first();
        $name = GoogleTranslate::trans($request->name, 'hi', 'en');
        $center = GoogleTranslate::trans($request->center, 'hi', 'en');
        $booth->name = $name;
        $booth->center = $center;
        $booth->district = $assembly->district;
        $booth->assembly = $assembly->assembly;
        if($booth->save()){
            return redirect()->route('booths')->with('success', 'Booth created successfully');
        }
    }

    public function translateName(Request $request){ 
        $tr = new GoogleTranslate('hi'); // Translates into Hindi
        if($request->name != ''){
            $name = $tr->translate($request->name);
            if($tr->getLastDetectedSource() == 'hi'){
                // \Log::info(GoogleTranslate::trans($name, 'en', 'hi'));
                $translate_in_english = GoogleTranslate::trans($name, 'en', 'hi');
                $name = GoogleTranslate::trans($translate_in_english, 'hi', 'en');
            }
        }
        return $name;
    }

    public function translateCenter(Request $request){
        $tr = new GoogleTranslate('hi'); // Translates into English
        
        if($request->center != ''){
            $center = $tr->translate($request->center);
            if($tr->getLastDetectedSource() == 'hi'){
                // \Log::info(GoogleTranslate::trans($name, 'en', 'hi'));
                $translate_in_english = GoogleTranslate::trans($center, 'en', 'hi');
                $center = GoogleTranslate::trans($translate_in_english, 'hi', 'en');
            }
        }

        return $center;
    }
}
