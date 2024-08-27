<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TeamServices\TeamService;

class HomeController extends Controller
{
    //
    protected $team;
    public function __construct(TeamService $rep){
        $this->team=$rep;
    }
    public function index(){
        $matches=$this->team->matchOrga();
        $match=$this->team->matchProche();
        return view('layouts.dashboard',compact('match','matches'));
    }
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
    
        if ($request->file('image')) {
            $file = $request->file('image');
            
            $filename = time() . '.' . $file->getClientOriginalExtension();
             $file->move(public_path('assets/images/uploads'), $filename);
    
            return response()->json(['success' => true, 'filename' => $filename]);
        }
     
        return response()->json(['success' => false, 'message' => 'Image upload failed.']);
    }

    
}
