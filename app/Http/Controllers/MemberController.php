<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Booth;

class MemberController extends Controller
{
    public function index(){
        $members = Member::orderBy('booth_id', 'asc')->paginate(12);
        $booths = Booth::all();
        return view('members.members', compact('members', 'booths'));
    }

    public function create(){
        return view('members.create');
    }
}
