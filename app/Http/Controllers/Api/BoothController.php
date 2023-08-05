<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booth;
use App\Models\Member;

class BoothController extends Controller
{
    public function getBooth(){
        $booths = Booth::where('status', 1)->get(['id', 'name', 'center']);
        $arr = [];
        foreach($booths as $booth){
            $bth = array('id' => $booth->id, 'searcheable name' => $booth->id .' '. $booth->name, 'name' => $booth->name, 'center' => $booth->center);
            $members = Member::where('booth_id', $booth->id)->get();
            $count = count($members);
            $bth['members'] = $count;
            array_push($arr, $bth);
        }
        return response()->json([
            'data' => $arr,
            'status' => 200
        ]);
    }
}
