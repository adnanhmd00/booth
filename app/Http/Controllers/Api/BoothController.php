<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booth;

class BoothController extends Controller
{
    public function getBooth(){
        $booths = Booth::where('status', 1)->get();
        return response()->json([
            'data' => $booths,
            'status' => 200
        ]);
    }
}
