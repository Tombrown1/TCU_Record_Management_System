<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;
use App\Models\Subunit;
use App\Models\Skills;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     // This listed function helps me to route my blade file page when created
    public function index()
    {
        // $user = Auth::user();
        return view('home');
    }

    public function unit_members(){
        $members = Member::paginate(20);
        // $female_members = Member::where('gender', 'Female')->get(); 
        
        //return $female_members;
        return view('unit_members', compact('members'));
    }

    public function probation(){
        $members = Member::paginate(30);

        return view('probation', compact('members'));
    }

    public function cable_network(){
        $members = Member::where('subunit_id', 1)->get();
        return view('cable_network', compact('members'));
    }
    
     public function camera(){
         $members = Member::where('subunit_id', 2)->get();
        return view('camera', compact('members'));
    }

    public function console(){
        $members = Member::Where('subunit_id', 3)->get();
        return view('console', compact('members'));
    }

    public function production_sales(){
        $production = Member::where('subunit_id', 4)->get();
        return view('production_sales', compact('production'));
    }

    public function posting(){
        $member_cat2 = Member::where('category', 'Full Member')->get();
        $subunits = Subunit::all();
        $member_cat = Member::where('category', 'Probation')->get(); 
        return view('posting', compact('subunits', 'member_cat', 'member_cat2'));
    } 
    public function add_member(){
        $skills = Skills::get();
        $subunits = Subunit::get();
        return view('add_member', compact('subunits', 'skills'));
    }

// Function to edit a user/member by fetching its single id using find method!
    public function edit_member($id){
        $member = Member::find($id);
        $subunits = Subunit::get();
        return view('editmember', compact('member', 'subunits'));
    }
}