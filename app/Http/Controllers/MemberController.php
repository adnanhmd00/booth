<?php

namespace App\Http\Controllers;

use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Booth;
use Storage;
use Str;

class MemberController extends Controller
{
    public function index(){
        $members = Member::orderBy('booth_id', 'asc')->paginate(12);
        $booths = Booth::all();
        return view('members.members', compact('members', 'booths'));
    }

    public function create($id){
        $members = Member::where('booth_id', $id)->get();
        return view('members.create', compact('id', 'members'));
    }

    public function store(Request $request, $id){
        $members = Member::where('booth_id', $id)->get();
        $count = count($members);

        $inputs = $request->all();
        

        if($count < 6){
            $member = new Member;
            $name = GoogleTranslate::trans($request->name, 'hi', 'en');
            $village = GoogleTranslate::trans($request->village, 'hi', 'en');

            $member->booth_id = $id;

            if($request->hasFile('img')){
                // $random = Str::random(15);
                // $imgName = $random.'.'.$request->img->extension();
                // $member->img = $request->img->storeAs('member-img', $imgName, 'public');

                $random = Str::random(10);
                $fileName = $random . '.' . $request->img->extension();
                $request->img->move(public_path('images'), $fileName);
            }
            
            $member->name = $name;
            $member->phone = $inputs['phone'];
            $member->village = $village;
            $member->img = isset($fileName) ? $fileName : '';

            $booth = Booth::findOrFail($id);
            $member->booth_name = $booth->name;
            $member->booth_center = $booth->center;
            $member->booth_district = $booth->district;
            $member->booth_assembly = $booth->assembly;
            if($member->save()) {
                return back()->with('success', 'नया सदस्य सफलतपूर्वक जुड़ गया');
            }
        }else{
            return back()->with('error', '6 सदस्य पहले से ही मौजूद हैं');
        }
    }

    public function edit($id){
        $member = Member::findOrFail($id);
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, $id){
        $members = Member::where('booth_id', $id)->get();
        $count = count($members);

        $inputs = $request->all();
            $member = Member::findOrFail($id);
            $name = GoogleTranslate::trans($request->name, 'hi', 'en');
            $village = GoogleTranslate::trans($request->village, 'hi', 'en');

            if($request->hasFile('img')){
                // $random = Str::random(15);
                // $imgName = $random.'.'.$request->img->extension();
                // $member->img = $request->img->storeAs('member-img', $imgName, 'public');

                $random = Str::random(10);
                $fileName = $random . '.' . $request->img->extension();
                $request->img->move(public_path('images'), $fileName);
            }
            
            $member->name = $name;
            $member->phone = $inputs['phone'];
            $member->village = $village;
            $member->img = isset($fileName) ? $fileName : $member->img;
            if($member->save()) {
                return redirect()->route('member.create', $member->booth_id)->with('success', 'सदस्य सफलतपूर्वक अपडेट हो गया');
            }
    }
}
