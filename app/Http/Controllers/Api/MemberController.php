<?php

namespace App\Http\Controllers\Api;

use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Booth;
use Storage;
use Str;

class MemberController extends Controller
{
    public function getMember($id){
        $members = Member::where('booth_id', $id)->orderBy('booth_id', 'desc')->get();
        $booth = Booth::where('id', $id)->first();
        $data = array($members, $booth);
        $data = [];
        $data['booth'] = $booth;
        $data['booth']['member'] = $members;

        return response()->json([
            'data' => $data,
            'message' => 'All Member List inside booth',
            'status' => 200
        ]);
    }

    public function getMemberList($id){
        $members = Member::where('booth_id', $id)->orderBy('booth_id', 'desc')->get();

        return response()->json([
            'data' => $members,
            'message' => 'All Member List inside this booth',
            'status' => 200
        ]);
    }


    public function addMember(Request $request){
        $members = Member::where('booth_id', $request->booth_id)->get();
        $count = count($members);
        if($count < 6){
            $member = new Member;
            $name = GoogleTranslate::trans($request->name, 'hi', 'en');
            $village = GoogleTranslate::trans($request->village, 'hi', 'en');

            $member->booth_id = $request->booth_id;

            if($request->hasFile('img')){
                // $random = Str::random(15);
                // $imgName = $random.'.'.$request->img->extension();
                // $member->img = $request->img->storeAs('member-img', $imgName, 'public');
                $fileName = time() . '.' . $request->img->extension();
                $request->img->move(public_path('images'), $fileName);
            }
            
            $member->phone = $request->phone;

            $member->name = $name;
            $member->village = $village;
            $member->img = $fileName;

            $booth = Booth::where('id', $request->booth_id)->first();
            $member->booth_name = $booth->name;
            $member->booth_center = $booth->center;
            $member->booth_district = $booth->district;
            $member->booth_assembly = $booth->assembly;
            if($member->save()){
                return response()->json([
                    'data' => $member,
                    'message' => 'Member added successfully',
                    'status' => 200
                ]);
            }
        }else{
            return response()->json([
                'message' => 'Maximum number of members already added',
                'status' => 404
            ]);
        }
    }

    public function updateMember(Request $request, $id){
        $member = Member::findOrFail($id);
        $member->booth_id = $request->booth_id;
        $name = GoogleTranslate::trans($request->name, 'hi', 'en');
        $member->name = $name;
        if($request->hasFile('img')){
            // $random = Str::random(15);
            // $imgName = $random.'.'.$request->img->extension();
            // $member->img = $request->img->storeAs('member-img', $imgName, 'public');
            $fileName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('images'), $fileName);
        }
        $member->phone = $request->phone;
        $village = GoogleTranslate::trans($request->village, 'hi', 'en');
        $member->village = $village;
        if($member->save()){
            return response()->json([
                'data' => $member,
                'message' => 'Member updated successfully',
                'status' => 200
            ]);
        }
    }
}
