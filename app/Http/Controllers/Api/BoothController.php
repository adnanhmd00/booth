<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booth;
use App\Models\Member;

class BoothController extends Controller
{
    public function getBooth(){
        $booths = Booth::where('status', 1)->get();
        $arr = [];
        foreach($booths as $booth){
            $members = Member::where('booth_id', $booth->id)->get();
            $count = count($members);
            $booth = $booth;
            $booth['members'] = $count;
            array_push($arr, $booth);
        }
        return response()->json([
            'data' => $arr,
            'status' => 200
        ]);
    }
}
