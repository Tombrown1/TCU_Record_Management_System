<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\skills;
use App\Models\Posting;
use App\Models\Prof_Skill;
use App\Models\studio_related_skills;
use Storage;

class LogicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        //
    }

    public function allMember(){
        $allmembers = Member::latest()->paginate(30);
    }

    public function personal_Info(Request $request){
        // dd($request);
            $this->validate($request, [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email',
                'work_phone' => 'required',
                'home_phone' => 'required',
                'dob' => 'required',
                'pob' => 'required',
                'image'=> 'mimes:jpg,bmp,png,gif',
                'gender' => 'required|string',
                'resident_address' => 'required',
                'marital_status' => 'required',
                'category' => 'required',
                'subunit_id' => 'required',
                
            ]);
            // return $request->firstname;

        $member = new Member;

        $member->firstname = $request->firstname;
        $member->lastname = $request->lastname;
        $member->email = $request->email;
        $member->work_phone = $request->work_phone;
        $member->home_phone = $request->home_phone;
        $member->dob = $request->dob;
        $member->pob = $request->pob;
        $member->gender = $request->gender;
        $member->resident_address = $request->resident_address;
        $member->marital_status = $request->marital_status;
        $member->category = $request->category;
        $member->subunit_id = $request->subunit_id;
        
        if($request->hasfile('image')){
            request()->validate([
                'image' => 'required',
                'image' => 'mimes:gif,jpg,png,jpge,jpeg'
                //'image' => 'mimes:doc,pdf,docx,txt,zip,gif,jpg,png,jpge,jpeg'
            ]);
            $file = $request->file('image');
            $path = Storage::disk('public')->putFile('passport',$file);
           // return $path;
           $member->image = $path;
        }
        if($member->save()){
            session(['last_id' => $member->id]);
            return back()->with('success', 'Personal Information save successfully');
        }

    }

    public function next_of_kin(Request $request){
        $this->validate($request, [
            'fname_next_of_kin' => 'required',
            'lname_next_of_kin' => 'required',
            'phone_next_of_kin' => 'required',
            'relate_next_of_kin' => 'required',
            'gender_next_of_kin' => 'required',
            'address_next_of_kin' => 'required',
        ]);

        $member_id = session()->get('last_id');
        $nextofKin = Member::find($member_id);

        // $nextofKin = new Member();
        $nextofKin->fname_next_of_kin = $request->fname_next_of_kin;
        $nextofKin->lname_next_of_kin = $request->lname_next_of_kin;
        $nextofKin->phone_next_of_kin = $request->phone_next_of_kin;
        $nextofKin->relate_next_of_kin = $request->relate_next_of_kin;
        $nextofKin->gender_next_of_kin = $request->gender_next_of_kin;
        $nextofKin->address_next_of_kin = $request->address_next_of_kin;

        if($nextofKin->save()){
            return back()->with('success', 'Next of Kin Information save successfully');
        }            
    }
       

    public function edit_personal_Info(Request $request, $id){
        // return $request;
        $member = Member::find($id);

        $member->firstname = $request->firstname;
        $member->lastname = $request->lastname;
        $member->email = $request->email;
        $member->work_phone = $request->work_phone;
        $member->home_phone = $request->home_phone;
        $member->dob = $request->dob;
        $member->pob = $request->pob;
        $member->gender = $request->gender;
        $member->resident_address = $request->resident_address;
        $member->marital_status = $request->marital_status;
        $member->category = $request->category;
        $member->subunit_id = $request->subunit_id;

            if($request->hasfile('image')){
                request()->validate([
                    'image' => 'required',
                    'image' => 'mimes:gif,png,jpeg,jpg'
                ]);
                $file = $request->file('image');
                $path = Storage::disk('public')->putFile('passport',$file);

                $member->image = $path;
            }
           
        if($member->save()){
            return back()->with('success', 'Personal Information Updated successfully');
            // return redirect()->route('add_member')->with('success', 'Personal Information Updated successfully');
        }
    }

    public function edit_nextofKin(Request $request, $id){
        $nextofKin = Member::find($id);

        $nextofKin->fname_next_of_kin = $request->fname_next_of_kin;
        $nextofKin->lname_next_of_kin = $request->lname_next_of_kin;
        $nextofKin->phone_next_of_kin = $request->phone_next_of_kin;
        $nextofKin->relate_next_of_kin = $request->relate_next_of_kin;
        $nextofKin->gender_next_of_kin = $request->gender_next_of_kin;
        $nextofKin->address_next_of_kin = $request->address_next_of_kin;    

        if($nextofKin->save()){
            return back()->with('success', 'Next of Kin Record Updated');
        }
        // return $nextofKin;
    }

    public function add_skill(Request $request){
        $this->validate($request, [
            'skill_name' => 'required'
        ]);

        $skill = new Skills;
        $skill->name = $request->skill_name;

        if($skill->save()){
            return back()->with('success', 'New Skill Added Successfully');
        }
    }

    public function  profession_related_skill(Request $request){
        $this->validate($request, [
            'profession' => 'required',
            'skills' => 'required',
                     
        ]);
       
           
        $member_id = session()->get('last_id');
        $member = Member::find($member_id);
        $member->profession = $request->profession;
        $member->save();
    
        $skills = $request->skills;
        foreach($skills as $skill_id){
            $studio_skill = new studio_related_skills;

            $studio_skill->member_id = $member_id;
            $studio_skill->skill_id = $skill_id;
            $studio_skill->save();
        }

        return back()->with('success', 'Professional Skill save successfully');

           
       

    }

    public function postMember(Request $request){
        // dd($request);
        
        $this->validate($request, [
            'member_id' => 'required',
            'subunit_id' => 'required',
            'duration' => 'required',
            'posting_status' => 'required',
            'duration' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $postings = new Posting;

        $postings->member_id = $request->member_id;
        $postings->subunit_id = $request->subunit_id;
        $postings->duration = $request->duration;
        $postings->posting_status = $request->posting_status;
        $postings->start_date = $request->start_date;
        $postings->end_date = $request->end_date;

        // dd($postings);

        if($postings->save()){
            return back()->with('success', 'Posting Completed Successfully!');
        }
        //return back()->with('success', 'Posting Completed Successfully!');
    }
    
    public function skills(Request $request){
        
    }

    public function profession(Request $request){
        
    }

    public function deleteMember(Request $request, $id){
        $delMember = Member::destroy($id);
            return back()->with('success', 'Data deleted successfully!');
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $res = Member::find($id)->delete;
    }
}
