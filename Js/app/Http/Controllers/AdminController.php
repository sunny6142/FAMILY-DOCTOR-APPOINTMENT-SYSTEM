<?php

namespace App\Http\Controllers;

use App\RequestMentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use response;
use Illuminate\Support\Facades\input;

use App\User;
use App\Admin;
use App\request_mentor;
use App\mentors;
use App\start_up_info;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;

use Auth;
use Session;
use Validator;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */  
    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('admin_Dashboard');
    }

    public function createcategory()
    {
        return view('create_category');
    }

    public function createcategory_Post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required|min:1|max:50'
        ]);
        if($validator->fails()){
            return response()->json(array('errors'=> $validator->errors()));
           //   return response()->json($validator);
            //    return Redirect::route('login#toregister')->withErrors($validator);
        }
        else{
            DB::table('category')
                ->insert(['category' => $request->category]);
        }
    }

    public function listcategory()
    {
        $category= DB::table('category')->paginate(25);
        
     //   ->get(); 
        return view('list_category',compact('category'));
//  
    }

    public function edit_category($id)
    {
        $category= DB::table('category')
        ->where(['cat_id' => $id])->get();
        
        return view('edit_category',compact('category','id'));
    
    }

    public function editdoctor_post(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:1|max:50',
            'category' => 'required',
            'introduction' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(array('errors'=> $validator->errors()));
           //   return response()->json($validator);
            //    return Redirect::route('login#toregister')->withErrors($validator);
        }
        else{

            $val = $request->all();

            $imgset = 0;
            if($file = $request->hasFile('image')){
                
                $file = $request->file('image') ;
                $fileName = sha1(date('YmdHis') . str_random(30)).$file->getClientOriginalName() ;
                $destinationPath = public_path().'/images/' ;
                $file->move($destinationPath,$fileName);
                // $logo = $fileName;
                $request->image = $fileName;
                $imgset = 1;
            }
            else{
                unset($val['image']);
            }
            
            if($imgset == 0)
            {
                $res = DB::table('doctors')
                            ->where('doctors_id', $request->doctors_id)
                            ->update(['name' => $request->name,
                                    'introduction' => $request->introduction,
                                    'category' => $request->category]);
            }
            else{
                $res = DB::table('doctors')
                            ->where('doctors_id', $request->doctors_id)
                            ->update(['name' => $request->name,
                                    'introduction' => $request->introduction,
                                    'category' => $request->category,
                                    'image' => $request->image]);
            }
            
        }

        return response()->json($res);
    }

    public function edit_category_POST(Request $request)
    {

        //dump($request->all());
        $res = DB::table('category')
                ->where('cat_id', $request->id)
                ->update(['category' => $request->category]); 
        
        return response()->json($res);
    }

    public function delete_category(Request $request)
    {
        DB::table('category')->where(['cat_id' => $request->id])->delete();
    }

    public function update_categorylist()
    {
        $category= DB::table('category')->paginate(25);
        //->get(); 
        return response()->json($category);
    }

    public function add_doctor()
    {
        $category    = DB::table('category')->get();
        
        return view('add_doctor',compact('category'));
    }
    
    public function add_doctor_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:1|max:50',
            'category' => 'required',
            'introduction' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(array('errors'=> $validator->errors()));
           //   return response()->json($validator);
            //    return Redirect::route('login#toregister')->withErrors($validator);
        }
        else{

            $val = $request->all();

            
            if($file = $request->hasFile('image')){
                
                $file = $request->file('image') ;
                $fileName = sha1(date('YmdHis') . str_random(30)).$file->getClientOriginalName() ;
                $destinationPath = public_path().'/images/' ;
                $file->move($destinationPath,$fileName);
                // $logo = $fileName;
                $request->image = $fileName;
            }
            else{
                unset($val['image']);
            }
            
            DB::table('doctors')
                ->insert(['name' => $request->name,
                          'introduction' => $request->introduction,
                          'category' => $request->category,
                          'image' => $request->image]);
        }
    }

    public function listdoctor()
    {
        
        $doctor= DB::table('doctors')
                    ->leftJoin('category','category.cat_id','=','doctors.category')->paginate(25);
        
     //   ->get(); 
        return view('list_doctor',compact('doctor'));
//        return view('list_mentor',compact('mentor'));
    }

    public function layout_editdoc($val)
    {
        $category    = DB::table('category')->get();

        $doctors= DB::table('doctors')
        ->where(['doctors_id' => $val])->get();
      //  dump($doctors[0]->name);
        return view('edit_doctor',compact('doctors','category','val'));
    }

    public function deletedoc(Request $request)
    {
        DB::table('doctors')->where(['doctors_id' => $request->doctors_id])->delete();
    }

    public function update_doctorlist(Request $request)
    {
        $doctors= DB::table('doctors')->paginate(25);
        //->get(); 
        return response()->json($doctors);
    }

    public function searchdoc(Request $request)
    {
        $doctors= DB::table('doctors')
                    ->where('name', 'LIKE', $request->name."%")
                    ->paginate(25);
        //->get(); 
        return response()->json($doctors);
    }

    public function data()
    {
        $appointment= DB::table('appointment')
                    ->leftJoin('users','appointment.users','=','users.users_id')
                    ->leftJoin('doctors','appointment.doctors','=','doctors.doctors_id')
                    ->select('doctors.*','users.*','appointment.*')->paginate(25);
        
        $doctors= DB::table('doctors')->get();

     //   dump($appointment);
        //   ->get(); 
        return view('data',compact('appointment','doctors'));
    }

    public function searchbydoctor(Request $request)
    {
        $doctors= DB::table('appointment')
                    ->leftJoin('users','users.users_id','=','appointment.users')
                    ->leftJoin('doctors','doctors.doctors_id','=','appointment.doctors')
                    ->select('doctors.*','users.*','appointment.*')
                    ->where('doctors.name', 'LIKE', $request->name."%")
                    ->paginate(25);
        //->get(); 
        return response()->json($doctors);
    }

    public function searchbyphone(Request $request)
    {
        $doctors= DB::table('appointment')
                    ->leftJoin('users','users.users_id','=','appointment.users')
                    ->leftJoin('doctors','doctors.doctors_id','=','appointment.doctors')
                    ->select('doctors.*','users.*','appointment.*')
                    ->where('users.phone', 'LIKE', $request->name."%")
                    ->orwhere('users.id_number', 'LIKE', $request->name."%")
                    ->paginate(25);
        //->get(); 
        return response()->json($doctors);
    }

    public function deleteappointment_id(Request $request)
    {
        DB::table('appointment')->where(['appointment_id' => $request->appointment_id])->delete();
    }

    public function update_datalist(Request $request)
    {
        $appointment= DB::table('appointment')
        ->leftJoin('users','users.users_id','=','appointment.users')
        ->leftJoin('doctors','doctors.doctors_id','=','appointment.doctors')
        ->select('doctors.*','users.*','appointment.*')->paginate(25);

        //->get(); 
        return response()->json($appointment);
    }

    public function listmentor()
    {
        $professional_expertise  = DB::table('professional_expertise')->get();
        $industry_vertical_experience = DB::table('industry_vertical_experience')->orderBy('industry_experience', 'ASC')->get();
        $areas_of_business_and_management_competence  = DB::table('areas_of_business_and_management_competence')->get();
        $gender    = DB::table('gender')->get();
        $mentor= DB::table('admins')
        ->where('roll', '=', 2)->paginate(25);
        
     //   ->get(); 
        return view('list_mentor',compact('mentor','professional_expertise','industry_vertical_experience','areas_of_business_and_management_competence','gender'));
//        return view('list_mentor',compact('mentor'));
    }
    public function liststartup()
    {
        $gender    = DB::table('gender')->get();
        $startup = DB::table('users')
            ->leftJoin('start_up_info', 'start_up_info.user_id', '=', 'users.id')
            ->where('roll', '=', 3)->paginate(25);

        //   ->get();
        return view('list_startup',compact('startup','gender'));
//        return view('list_mentor',compact('mentor'));
    }

    public function layout_addmentor()
    {
        $professional_expertise  = DB::table('professional_expertise')->get();
        $industry_vertical_experience = DB::table('industry_vertical_experience')->orderBy('industry_experience', 'ASC')->get();
        $areas_of_business_and_management_competence  = DB::table('areas_of_business_and_management_competence')->get();
        $gender    = DB::table('gender')->get();
        
     //   ->get(); 
        return view('add_mentor',compact('professional_expertise','industry_vertical_experience','areas_of_business_and_management_competence','gender'));
    }

    public function layout_viewmentor($val)
    {
        $professional_expertise  = DB::table('professional_expertise')->get();
        $industry_vertical_experience = DB::table('industry_vertical_experience')->orderBy('industry_experience', 'ASC')->get();
        $areas_of_business_and_management_competence  = DB::table('areas_of_business_and_management_competence')->get();
        $gender    = DB::table('gender')->get();
        $mentor= DB::table('admins')
        ->where(['roll' => 2, 'id' => $val])->get();
        
        return view('view_mentor',compact('mentor','professional_expertise','industry_vertical_experience','areas_of_business_and_management_competence','gender'));

    }

    public function layout_viewstartup($val)
    {
        $nature_of_startup  = DB::table('nature_of_startup')->orderBy('nature', 'ASC')->get();
        $industry   = DB::table('type_of_industry')->orderBy('industry', 'ASC')->get();
        $categories    = DB::table('start_up_categories')->orderBy('categories', 'ASC')->get();
        $yn    = DB::table('yn')->get();
        $ipr_val    = DB::table('ipr_val')->get();
        $qualification    = DB::table('qualification')->get();
        $start_up_stage    = DB::table('start_up_stage')->get();
        $innovative_val    = DB::table('innovative_val')->get();
        $know_about_us    = DB::table('know_about_us')->get();
        $founders    = DB::table('founders')
            ->select('founders.*','qualification.qualification')
            ->leftJoin('qualification', 'qualification.id', '=', 'founders.qualification')
            ->where('founders.users_id', '=', $val)->get();

        $gender    = DB::table('gender')->get();
        $startup = DB::table('users')
            ->leftJoin('start_up_info', 'start_up_info.user_id', '=', 'users.id')
            ->where(['roll' => 3, 'id' => $val])->paginate(25);

        $start_up_info  =  DB::table('start_up_info')
            ->select('how_know_about_us')
            ->where('start_up_info.user_id', '=', $val)
            ->get();
        return view('view_startup',compact('startup','gender','founders','start_up_info','nature_of_startup','industry','categories','yn','ipr_val','qualification','start_up_stage','innovative_val','know_about_us'));

    }

    public function layout_editmentor($val)
    {
        $professional_expertise  = DB::table('professional_expertise')->get();
        $industry_vertical_experience = DB::table('industry_vertical_experience')->orderBy('industry_experience', 'ASC')->get();
        $areas_of_business_and_management_competence  = DB::table('areas_of_business_and_management_competence')->get();
        $gender    = DB::table('gender')->get();
        $mentor= DB::table('admins')
        ->where(['roll' => 2, 'id' => $val])->get();
        
        return view('edit_mentor',compact('mentor','professional_expertise','industry_vertical_experience','areas_of_business_and_management_competence','gender'));
    }
    public function adminmentorapproval()
    {
      //  $request_mentor = request_mentor::sortable()->paginate(5);

        $request_mentor  = DB::table('request_mentor')
                                ->leftJoin('professional_expertise', 'request_mentor.professional_expertise', '=', 'professional_expertise.id')
                                ->leftJoin('industry_vertical_experience', 'request_mentor.industry_vertical_experience', '=', 'industry_vertical_experience.id')
                                ->leftJoin('mentoring_session_time', 'request_mentor.mentoring_session_time', '=', 'mentoring_session_time.id')
                                ->leftJoin('request_mentor_status', 'request_mentor.request_mentor_status', '=', 'request_mentor_status.id')
                                ->leftJoin('users', 'request_mentor.user', '=', 'users.id')
                                ->leftJoin('start_up_info', 'request_mentor.user', '=', 'start_up_info.user_id')
                                ->leftJoin('mentors','mentors.request_mentor','=','request_mentor.request_mentor_id')
                                ->select('mentors.*','start_up_info.start_up_name','start_up_info.logo','users.*', 'professional_expertise.*', 'request_mentor_status.*','mentoring_session_time.*','industry_vertical_experience.*','request_mentor.*')
                                ->where('mentors.created_at','<',Carbon::now()->subDay())
                                ->orwhere('mentors.created_at','=',null)
                                ->whereIn('request_mentor.request_mentor_status', [1, 2])
                                
                                ->orderBy('request_mentor.request_mentor_id','DESC')
                                ->paginate(25); 
        
        return view('admin_mentor_approval',compact('request_mentor'));
//
    }

    public function adminmentorapproval_ajax()
    {
        $request_mentor  = DB::table('request_mentor')
                            ->leftJoin('professional_expertise', 'request_mentor.professional_expertise', '=', 'professional_expertise.id')
                            ->leftJoin('industry_vertical_experience', 'request_mentor.industry_vertical_experience', '=', 'industry_vertical_experience.id')
                            ->leftJoin('mentoring_session_time', 'request_mentor.mentoring_session_time', '=', 'mentoring_session_time.id')
                            ->leftJoin('request_mentor_status', 'request_mentor.request_mentor_status', '=', 'request_mentor_status.id')
                            ->leftJoin('users', 'request_mentor.user', '=', 'users.id')
                            ->leftJoin('start_up_info', 'request_mentor.user', '=', 'start_up_info.user_id')
                            ->leftJoin('mentors','mentors.request_mentor','=','request_mentor.request_mentor_id')
                            ->select('mentors.*','start_up_info.start_up_name','start_up_info.logo','users.*', 'professional_expertise.*', 'request_mentor_status.*','mentoring_session_time.*','industry_vertical_experience.*','request_mentor.*')
                            ->where('mentors.created_at','<',Carbon::now()->subDay())
                            ->orwhere('mentors.created_at','=',null)
                            ->whereIn('request_mentor.request_mentor_status', [1, 2])
                            
                            ->orderBy('request_mentor.request_mentor_id','DESC')
                            ->paginate(25); 
        //->get(); 
        return response()->json($request_mentor);
    //    return view('list_mentor',compact('mentor','professional_expertise','industry_vertical_experience','areas_of_business_and_management_competence','gender'));
//        return view('list_mentor',compact('mentor'));
    }

    public function adminmentordeny()
    {
        $request_mentor  = DB::table('request_mentor')
        ->leftJoin('professional_expertise', 'request_mentor.professional_expertise', '=', 'professional_expertise.id')
        ->leftJoin('industry_vertical_experience', 'request_mentor.industry_vertical_experience', '=', 'industry_vertical_experience.id')
        ->leftJoin('mentoring_session_time', 'request_mentor.mentoring_session_time', '=', 'mentoring_session_time.id')
        ->leftJoin('request_mentor_status', 'request_mentor.request_mentor_status', '=', 'request_mentor_status.id')
        ->leftJoin('users', 'request_mentor.user', '=', 'users.id')
        ->leftJoin('start_up_info', 'request_mentor.user', '=', 'start_up_info.user_id')
        ->leftJoin('mentors','mentors.request_mentor','=','request_mentor.request_mentor_id')
        ->select('mentors.*','start_up_info.start_up_name','start_up_info.logo','users.*', 'professional_expertise.*', 'request_mentor_status.*','mentoring_session_time.*','industry_vertical_experience.*','request_mentor.*')
        ->whereIn('request_mentor.request_mentor_status', [4])
        ->orderBy('request_mentor.request_mentor_id','DESC')
        ->paginate(25); 

         return view('admin_mentor_deny',compact('request_mentor'));
    }

    public function adminmentorapproved()
    {
      //  $request_mentor = request_mentor::sortable()->paginate(5);

        $request_mentor  = DB::table('request_mentor')
                            ->leftJoin('professional_expertise', 'request_mentor.professional_expertise', '=', 'professional_expertise.id')
                            ->leftJoin('industry_vertical_experience', 'request_mentor.industry_vertical_experience', '=', 'industry_vertical_experience.id')
                            ->leftJoin('mentoring_session_time', 'request_mentor.mentoring_session_time', '=', 'mentoring_session_time.id')
                            ->leftJoin('request_mentor_status', 'request_mentor.request_mentor_status', '=', 'request_mentor_status.id')
                            ->leftJoin('users', 'request_mentor.user', '=', 'users.id')
                            ->leftJoin('start_up_info', 'request_mentor.user', '=', 'start_up_info.user_id')
                            ->leftJoin('mentors','mentors.request_mentor','=','request_mentor.request_mentor_id')
                            ->select('mentors.*','start_up_info.start_up_name','start_up_info.logo','users.*', 'professional_expertise.*', 'request_mentor_status.*','mentoring_session_time.*','industry_vertical_experience.*','request_mentor.*')
                            ->where('mentors.created_at','>=',Carbon::now()->subDay())
                            ->orwhere('mentors.mentor_status','=',2)
                            ->orderBy('request_mentor.request_mentor_id','DESC')
                            ->paginate(25); 
    
        return view('admin_mentor_approved',compact('request_mentor'));
//
    }

    public function Admin_Deny_Mentor_Request(Request $request)
    {

        DB::transaction(function() use ($request) {
            
            DB::table('mentors')->where('request_mentor', '=', $request->request_mentor)->delete();

            DB::table('request_mentor')
                ->where('request_mentor_id', $request->request_mentor)
                ->update(['request_mentor_status' => 4]); 
        });
    }

    public function message_startup($id)
    {
        $query  = DB::table('request_mentor')
        ->leftJoin('mentors', 'request_mentor.request_mentor_id', '=', 'mentors.request_mentor')
      // ->groupBy('request_mentor.request_mentor_id','request_mentor.user' , 'request_mentor.professional_expertise','request_mentor.industry_vertical_experience'
      // ,'request_mentor.mentoring_session_time','request_mentor.problem','request_mentor.request_mentor_status')
      ->leftJoin('users', 'users.id', '=', 'request_mentor.user')
      
       // ->join('message','mentors.id','=','message.mentors')
        ->leftjoin('message', function($join)
        {
            $join->on('mentors.id', '=', 'message.mentors');
        })

        ->select('users.id as userid', 'users.name','message.id as messageid', 'message.sender' , 'message.message')
        ->where(['mentors.admins' => Auth::user()->id, 'mentors.mentor_status' => 2])
        ->orderBy('message.created_at', 'desc')
        //->groupBy('user','id','message')
        ->get();

      //  dump($query);
     
        $messages = [];
        $current_message = [];

        $status = [];
        $i = 0;

        foreach($query as $val) {

          //  if( isset($status[$val->userid]) ){
          
             array_push($messages, ['users_id' => $val->userid,
             'name' => $val->name ,
             'messageid' => $val->messageid,
             'sender' =>  $val->sender,
             'message' => $val->message] );  
            
        }

        for($i = sizeof($messages)-1; $i >= 0; $i--)
        {
            if(!isset($status[ $messages[$i]["users_id"] ]) )
            {
                dump( $messages[$i]["users_id"] );
                $status[ $messages[$i]["users_id"] ] = $messages[$i]["users_id"]; 
            }
            else
            {
                unset($messages[$i]);
            //    dump( $messages[$i] );
            }
        }

       
        return view('message', compact('messages'));
    }

    public function mentor_startup_list()
    {
        $startup  = DB::table('mentors')
        ->leftJoin('request_mentor', 'mentors.request_mentor', '=', 'request_mentor.request_mentor_id')
        ->leftJoin('users', 'request_mentor.user', '=', 'users.id')
        ->leftJoin('start_up_info','start_up_info.user_id','=', 'users.id')
        ->leftJoin('mentoring_session_time','request_mentor.mentoring_session_time','=','mentoring_session_time.id')
        ->leftJoin('professional_expertise', 'request_mentor.professional_expertise', '=', 'professional_expertise.id')
        ->leftJoin('industry_vertical_experience', 'request_mentor.industry_vertical_experience', '=', 'industry_vertical_experience.id')
      
        ->select('professional_expertise.*','industry_vertical_experience.*','users.*', 'mentors.*' ,'start_up_info.*','mentoring_session_time.*','request_mentor.*')
     //  ->select('request_mentor.*')
        ->where(['mentors.admins' => Auth::user()->id, 'mentor_status' => 2])
        ->paginate(25);

        $list = $startup->toArray()['data'];
        //   ->get(); 
    //       dump($list);

        return view('mentor_startup', compact('list','startup'));
    }

    public function mentor_startup_approval($mentor_status)
    {
       $request_mentor  = DB::table('mentors')
                            ->leftJoin('request_mentor', 'mentors.request_mentor', '=', 'request_mentor.request_mentor_id')
                            ->leftJoin('users', 'request_mentor.user', '=', 'users.id')
                            ->leftJoin('start_up_info','start_up_info.user_id','=', 'users.id')
                            ->leftJoin('mentoring_session_time','request_mentor.mentoring_session_time','=','mentoring_session_time.id')
                            ->leftJoin('professional_expertise', 'request_mentor.professional_expertise', '=', 'professional_expertise.id')
                            ->leftJoin('industry_vertical_experience', 'request_mentor.industry_vertical_experience', '=', 'industry_vertical_experience.id')
                          
                            ->select('professional_expertise.*','industry_vertical_experience.*','users.*', 'mentors.*' ,'start_up_info.*','mentoring_session_time.*','request_mentor.*')
                         //  ->select('request_mentor.*')
                            ->where(['mentors.admins' => Auth::user()->id, 'mentor_status' => $mentor_status])
                            ->paginate(25);

        $list = $request_mentor->toArray()['data'];
    
        return view('mentor_startup_approval',compact('list','request_mentor','mentor_status'));

    }

     public function mentor_startup_approvePOST(Request $request)
    {

        DB::transaction(function() use ($request) {
            
            $meetingdate = json_decode($request->meetingdate);
            $starttime = json_decode($request->starttime);
            $endtime = json_decode($request->endtime);
            $venu = json_decode($request->venu);

            for($i = 0; $i < count($meetingdate); $i++) {
                 $meetingdate[$i]->starttime = $starttime[$i]->value; 
                 $meetingdate[$i]->endtime = $endtime[$i]->value; 
                 $meetingdate[$i]->venu = $venu[$i]->value; 
             }
         //    dump($starttime);
             
             $arr = [];
             foreach($meetingdate as $val) {
                  array_push($arr, ['request_mentor' => $request->id,
                  'date' => $val->value ,
                  'start_time' => $val->starttime,
                  'venu' => $val->venu,
                  'end_time' =>  $val->endtime]);
             }

            DB::table('day_and_time')->insert($arr);
            
            DB::table('mentors')
                ->where('request_mentor', $request->id)
                ->update(['mentor_status' => 2]); 
        });
    }
            

    public function mentor_feedback($req_m)
    {
        $technology_domain_area   = DB::table('professional_expertise')->get();
        $business_domain_area  = DB::table('industry_vertical_experience')->orderBy('industry_experience', 'ASC')->get();
        $mentoring_session_time   = DB::table('mentoring_session_time')->get();
        $yn    = DB::table('yn')->get();

        $mentor = DB::table('request_mentor')
        ->leftJoin('mentors', 'mentors.request_mentor', '=', 'request_mentor.request_mentor_id')
        ->leftJoin('admins', 'mentors.admins', '=', 'admins.id')
        ->leftJoin('start_up_info', 'start_up_info.user_id', '=', 'request_mentor.user')
        ->leftJoin('professional_expertise', 'admins.professional_expertise', '=', 'professional_expertise.id')
        ->leftJoin('mentoring_session_time', 'mentoring_session_time.id', '=', 'request_mentor.mentoring_session_time')
        ->leftJoin('industry_vertical_experience', 'admins.industry_vertical_experience', '=', 'industry_vertical_experience.id')
        ->leftJoin('areas_of_business_and_management_competence', 'admins.areas_of_business_and_management_competence', '=', 'areas_of_business_and_management_competence.id')
        ->select('request_mentor.*','start_up_info.*','mentoring_session_time.*','mentors.*','admins.*','professional_expertise.*','industry_vertical_experience.*','areas_of_business_and_management_competence.*')
        ->where(['request_mentor.request_mentor_id' => $req_m ])        
        ->get();
        
    //    dump($mentor);
        return view('mentor_feedback_layout',compact('req_m','mentor','yn','technology_domain_area','business_domain_area','mentoring_session_time'));
    }

    public function mentor_feedback_Post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'request_mentor' => 'required',
            'another' => 'required',
            'qualitative_feedback' => 'required|min:20|max:300',
        ]);

        if($validator->fails()){
            return response()->json(array('errors'=> $validator->errors()));
        }
        else{
            DB::transaction(function() use ($request) {
                
                $dates = json_decode($request->dates);
                $ponits = json_decode($request->ponits);
         
                // dump(son_decode($request->femail));
                
                 for($i = 0; $i < count($dates); $i++) {
                    $dates[$i]->ponits = $ponits[$i]->value; 
                 }
            //    dump($name);
            $arr = [];
                foreach($dates as $val) {
                //     dump($val );
                     array_push($arr, ['request_mentor' => $request->request_mentor,
                     'date' => $val->value ,
                     'points' => $val->ponits]);
                 }
                 
              //   dump($arr);
                $v = ['request_mentor' => $request->request_mentor,
                      'qualitative' => $request->qualitative_feedback,
                      'punctuality' => $request->pun,
                      'team_quality' => $request->quality,
                      'domain_knowledge' => $request->domain,
                      'another_session' => $request->another,
                      'areas_of_business_and_management_competence' => $request->mbusiness_domain_area,
                      'mentoring_session_time'=>$request->mentoring_session_time ];

                DB::table('mentor_feedback')->insert($v);
                DB::table('mentor_mildstone')->insert($arr);

                //return response()->json($request_mentor);
            });
            
        }
    }


    public function mentorprofile()
    {
     //   $start_up_info    = DB::table('start_up_info')->get();
      //  dump($start_up_info);
        return view('mentor_profile');
    }
    
    public function mentorsuggestion($id, $pe, $ive)
    {
        // requert mentor id  = > $id
         $mentorlist= DB::table('admins')
                        ->select('areas_of_business_and_management_competence.*','industry_vertical_experience.*','professional_expertise.*','admins.*')
                    ->where(['admins.roll' => 2])
                    ->leftJoin('professional_expertise', 'admins.professional_expertise', '=', 'professional_expertise.id')
                    ->leftJoin('industry_vertical_experience', 'admins.industry_vertical_experience', '=', 'industry_vertical_experience.id')
                    ->leftJoin('areas_of_business_and_management_competence', 'admins.areas_of_business_and_management_competence', '=', 'areas_of_business_and_management_competence.id')
                 
                    ->orderBy('admins.professional_expertise', 'desc')
                    ->orderBy('admins.industry_vertical_experience', 'desc')->paginate(25);
                    
             //       ORDER BY `admins`.`professional_expertise`= '$pe' DESC,`admins`.`industry_vertical_experience` = '$ive' DESC"\

            //$admins= DB::table('admins') ->where(['admins.roll' => 2])->paginate(25);

        //$mentorlist =  DB::select("SELECT * FROM `admins`  WHERE `admins`.`roll` = 2 ORDER BY `admins`.`professional_expertise`= '$pe' DESC,`admins`.`professional_expertise` = '$ive' DESC" );

        // $mentorlist =  DB::select("SELECT `admins`.*,`mentors`.mentor_status,`mentors`.user_status,`industry_vertical_experience`.industry_experience, `professional_expertise`.expertise,`request_mentor`.request_mentor_status FROM `admins` LEFT JOIN `mentors` ON `mentors`.admins = `admins`.id AND `mentors`.request_mentor = $id LEFT JOIN `request_mentor` ON `request_mentor`.request_mentor_id = `mentors`.request_mentor LEFT JOIN `professional_expertise` ON `professional_expertise`.id = `admins`.professional_expertise LEFT JOIN `industry_vertical_experience` ON `industry_vertical_experience`.id = `admins`.industry_vertical_experience  WHERE `admins`.`roll` = 2 ORDER BY `admins`.`professional_expertise`= '$pe' DESC,`admins`.`industry_vertical_experience` = '$ive' DESC" );

     //   ->get();
        $status = DB::table('mentors')
                    
                    ->where(['request_mentor' => $id])
                    ->where('created_at','>=',Carbon::now()->subDay())
                    ->first();
        
        $status_2 = DB::table('mentors')

                    ->where(['request_mentor' => $id])
                    ->where('created_at','<',Carbon::now()->subDay())
                    ->first();
                    //dump($status);
                    //dump($status_2);
                 //   return;
     //   unset( $mentorlist[0] );

        //$mentorlist = $admins;
        //$mentorlist = $admins->toArray()['data'];
         

               
        /*$L = count($mentorlist);

        if(count($mentors) > 0)
        
        for($i = 0; $i < count($mentors); $i++) {
            for($j = 0; $j < $L; $j++) {
                if( isset($mentorlist[$j]) )
                if($mentors[$i]->admins == $mentorlist[$j]->id )
                {
                    unset( $mentorlist[$j] );
                    break;
                }
            }
        }*/
   
     //   unset($val['image']);
    // dump($admins[0]->id);
        return view('admin_mentor_suggestion',compact('mentorlist','id','pe','ive','status','status_2'));

    }

    public function mentorsuggestionPOST(Request $request)
    {
        DB::transaction(function() use ($request) {
            
            DB::table('mentors')->where('request_mentor', '=', $request->request_mentor)->delete();
            
            $mentors = new mentors;
            
            $mentors->request_mentor = $request->request_mentor;
            $mentors->admins = $request->admin;
          //  dump($request);
            $mentors->save();
    
            //----- Update Mentor status
            DB::table('request_mentor')
                ->where('request_mentor_id', $request->request_mentor)
                ->update(['request_mentor_status' => 2]);
    
        });

        
    }
    public function mentorsuggestionAll(Request $request)
    {
           // requert mentor id  = > $id
           $mentorlist= DB::table('admins')
                    ->where(['admins.roll' => 2, 'admins.professional_expertise' => $request->pe, 'admins.industry_vertical_experience'=>$request->ive])
                    ->get(); 
            $mentors= DB::table('mentors')
                    ->where(['request_mentor' => $request->request_mentor])->get();
            //   unset( $mentorlist[0] );

      //      $mentorlist = $admins->toArray()['data'];
      //dump($request->id);

            $L = count($mentorlist);
            if(count($mentors) > 0)
                for($i = 0; $i < count($mentors); $i++) {
                    for($j = 0; $j < $L; $j++) {
                        if( isset($mentorlist[$j]) )
                        if($mentors[$i]->admins == $mentorlist[$j]->id )
                        {
                            unset( $mentorlist[$j] );
                            break;
                        }
                    }
                }

            $arr = [];
            $m = new mentors;
                
 //           dump($mentorlist);
            for($j = 0; $j < $L; $j++) {
                if( isset($mentorlist[$j]) )
                array_push($arr, ['request_mentor' => $request->request_mentor,
                'admins' =>$mentorlist[$j]->id ]);
                
            }

            mentors::insert($arr);

           //----- Update Mentor status
            DB::table('request_mentor')
            ->where('request_mentor_id', $request->request_mentor)
            ->update(['request_mentor_status' => 2]);

    }
    public function Addmentor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:35',
            'gender' => 'required',
            'mobile' => 'required|regex:/[789][0-9]{9}/',
            'telephone_office' => 'required|max:20',
            'telephone_home' => 'required | max:20',
            'dob' => 'required',
            'email' => 'required|email|unique:admins|max:100',
            'address' => 'required|min:5|max:100',
            'company_name' => 'required|min:3|max:50',
            'about_you' => 'required|min:20|max:250',
            'primary_and_secondary_objectives' => 'required|min:20|max:250',
            'professional_expertise' => 'required',
            'industry_vertical_experience' => 'required',
            'areas_of_business_and_management_competence' => 'required',
            'time_commitment' => 'required|numeric|max:10',
            'designation' => 'required|min:3|max:50',
            'designation' => 'required|min:3|max:50',
            'days_of_week' =>'required',
            'suitable_time' => 'required',
            'linked_in' => '',
            'facebook' => '',
            'twitter' => '',
            'password' => 'required|min:6|max:16|confirmed'
        ]);
        if($validator->fails()){
            return response()->json(array('errors'=> $validator->errors()));
           //   return response()->json($validator);
            //    return Redirect::route('login#toregister')->withErrors($validator);
        }
        else{
            $val = $request->all();

            if($file = $request->hasFile('image')){
                
                    $file = $request->file('image') ;
                    $fileName = sha1(date('YmdHis') . str_random(30)).$file->getClientOriginalName() ;
                    $destinationPath = public_path().'/images/' ;
                    $file->move($destinationPath,$fileName);
                // $logo = $fileName;
                    $val['image'] = $fileName ;
            }
            else{
                unset($val['image']);
            }
            $val['password'] = bcrypt($val['password']);
            unset($val['password_confirmation']);
            $mentor = Admin::create($val);
            return response()->json($mentor);
        }
    }

    public function Updatementor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:35',
            'gender' => 'required',
            'mobile' => 'required|regex:/[789][0-9]{9}/',
            'telephone_office' => 'required|max:20',
            'telephone_home' => 'required | max:20',
            'dob' => 'required',
            'address' => 'required|min:5|max:100',
            'company_name' => 'required|min:3|max:50',
            'about_you' => 'required|min:20|max:250',
            'primary_and_secondary_objectives' => 'required|min:20|max:250',
            'professional_expertise' => 'required',
            'industry_vertical_experience' => 'required',
            'areas_of_business_and_management_competence' => 'required',
            'time_commitment' => 'required|numeric|max:10',
            'designation' => 'required|min:3|max:50',
            'designation' => 'required|min:3|max:50',
            'days_of_week' =>'required',
            'suitable_time' => 'required',
            'linked_in' => '',
            'facebook' => '',
            'twitter' => '',
            'password' => 'nullable|min:6|max:16|confirmed'
        ]);
        if($validator->fails()){
            return response()->json(array('errors'=> $validator->errors()));
           //   return response()->json($validator);
            //    return Redirect::route('login#toregister')->withErrors($validator);
        }
        else{

            $val = Admin::find($request->id);
            
        //    dump($val->name);
            
            $val->name = $request->name;
            $val->gender = $request->gender;
            $val->mobile = $request->mobile;
            $val->telephone_office = $request->telephone_office;
            $val->telephone_home = $request->telephone_home;
            $val->dob = $request->dob;
            $val->address = $request->address;
            $val->company_name = $request->company_name;
            $val->about_you = $request->about_you;
            $val->primary_and_secondary_objectives = $request->primary_and_secondary_objectives;
            $val->professional_expertise = $request->professional_expertise;
            $val->industry_vertical_experience = $request->industry_vertical_experience;
            $val->areas_of_business_and_management_competence = $request->areas_of_business_and_management_competence;
            $val->time_commitment = $request->time_commitment;
            $val->designation = $request->designation;
            $val->designation = $request->designation;
            $val->days_of_week = $request->days_of_week;
            $val->suitable_time = $request->suitable_time;
            $val->linked_in = $request->linked_in;
            $val->facebook = $request->facebook;
            $val->twitter = $request->twitter;
            

            if($file = $request->hasFile('image')){
                    $file = $request->file('image') ;
                    $fileName = sha1(date('YmdHis') . str_random(30)).$file->getClientOriginalName() ;
                    $destinationPath = public_path().'/images/' ;
                    $file->move($destinationPath,$fileName);
                    $val->image = $request->image;
            }
            else{
                unset($val['image']);
            }
            if($request->password){
           //     dump("asdddddd");
                $val->password =  bcrypt($request->password);
            }
       //     dump($request->password);
            $val->save();

            return response()->json($val);
        }
    }

    public function listmentor_ajax()
    {
        $mentor= DB::table('admins')
        ->where('roll', '=', 2)->paginate(25);
        //->get(); 
        return response()->json($mentor);
    //    return view('list_mentor',compact('mentor','professional_expertise','industry_vertical_experience','areas_of_business_and_management_competence','gender'));
//        return view('list_mentor',compact('mentor'));
    }

    public function liststartup_ajax()
    {
        $mentor= DB::table('admins')
            ->where('roll', '=', 2)->paginate(25);
        //->get();
        return response()->json($mentor);
        //    return view('list_mentor',compact('mentor','professional_expertise','industry_vertical_experience','areas_of_business_and_management_competence','gender'));
//        return view('list_mentor',compact('mentor'));
    }

    public function Deletementor(Request $request)
    {
        $res = DB::table('admins')->where('id', '=', $request->id)->delete();
        return response()->json($res);
    }


    /* Update 1*/

    public function list_connection($id)
    {  
        $mentors  = DB::table('mentors')
        ->leftJoin('request_mentor', 'mentors.request_mentor', '=', 'request_mentor.request_mentor_id')
        ->leftJoin('mentor_feedback', 'mentors.request_mentor', '=', 'mentor_feedback.request_mentor')
        ->leftJoin('user_feedback', 'mentors.request_mentor', '=', 'user_feedback.request_mentor')
        ->leftJoin('users', 'request_mentor.user', '=', 'users.id')
        ->leftJoin('start_up_info','start_up_info.user_id','=', 'users.id')
        ->leftJoin('admins','admins.id','=', 'mentors.admins')
        ->select('mentor_feedback.*','user_feedback.*','admins.*','mentors.*' ,'start_up_info.*','request_mentor.*')
     //  ->select('request_mentor.*')
        ->where(['user_status' => 2, 'admins.id'=> $id])
        ->paginate(25);

        $list = $mentors->toArray()['data'];
        //   ->get(); 
        //   dump($list);
        return view('list_connection', compact('list','mentors'));
    }

    public function list_startup_connection($id)
    {  
        $mentors  = DB::table('mentors')
        ->leftJoin('request_mentor', 'mentors.request_mentor', '=', 'request_mentor.request_mentor_id')
        ->leftJoin('mentor_feedback', 'mentors.request_mentor', '=', 'mentor_feedback.request_mentor')
        ->leftJoin('user_feedback', 'mentors.request_mentor', '=', 'user_feedback.request_mentor')
        ->leftJoin('users', 'request_mentor.user', '=', 'users.id')
        ->leftJoin('start_up_info','start_up_info.user_id','=', 'users.id')
        ->leftJoin('admins','admins.id','=', 'mentors.admins')
        ->select('mentor_feedback.*','user_feedback.*','admins.*','mentors.*' ,'start_up_info.*','request_mentor.*')
     //  ->select('request_mentor.*')
        ->where(['user_status' => 2, 'users.id'=> $id])
        ->paginate(25);

        $list = $mentors->toArray()['data'];
        //   ->get(); 
        //   dump($list);
        return view('list_connection', compact('list','mentors'));
    }

    public function mentor_profile_view($id)
    {
        $admin    = DB::table('admins')
                        ->leftJoin('professional_expertise', 'admins.professional_expertise', '=', 'professional_expertise.id')
                        ->leftJoin('industry_vertical_experience', 'admins.industry_vertical_experience', '=', 'industry_vertical_experience.id')
                        ->leftJoin('areas_of_business_and_management_competence', 'admins.areas_of_business_and_management_competence', '=', 'areas_of_business_and_management_competence.id')
        
                        ->where(['admins.id' => $id])
                        ->get();
        //  dump($admin);
          return view('mentor_profile_view',compact('admin'));
    }
    
    public function Accept_Mentor_View($mid)
    {
        $mentor = DB::table('day_and_time')
        ->leftJoin('mentors', 'mentors.request_mentor', '=', 'day_and_time.request_mentor')
        ->leftJoin('admins', 'mentors.admins', '=', 'admins.id')
//            ->leftJoin('start_up_info', 'start_up_info.user_id', '=', 'request_mentor.user')
        ->leftJoin('professional_expertise', 'admins.professional_expertise', '=', 'professional_expertise.id')
        ->leftJoin('industry_vertical_experience', 'admins.industry_vertical_experience', '=', 'industry_vertical_experience.id')
        ->leftJoin('areas_of_business_and_management_competence', 'admins.areas_of_business_and_management_competence', '=', 'areas_of_business_and_management_competence.id')
        ->select('mentors.*','admins.*','professional_expertise.*','industry_vertical_experience.*','areas_of_business_and_management_competence.*','day_and_time.*')
   
        ->where(['day_and_time.request_mentor' => $mid])
        
        ->get();
     //   dump($mentor);
        return view('accept_mentor_View',compact('technology_domain_area','business_domain_area','mentoring_session_time','mentor')); 
    }

    public function mentor_feedback_view($mrid)
    {

        $technology_domain_area   = DB::table('professional_expertise')->get();
        $business_domain_area  = DB::table('industry_vertical_experience')->orderBy('industry_experience', 'ASC')->get();
        $mentoring_session_time   = DB::table('mentoring_session_time')->get();
        $yn    = DB::table('yn')->get();

        $mentor = DB::table('request_mentor')
        ->leftJoin('mentors', 'mentors.request_mentor', '=', 'request_mentor.request_mentor_id')
        ->leftJoin('admins', 'mentors.admins', '=', 'admins.id')
        ->leftJoin('start_up_info', 'start_up_info.user_id', '=', 'request_mentor.user')
        ->leftJoin('professional_expertise', 'admins.professional_expertise', '=', 'professional_expertise.id')
        ->leftJoin('mentoring_session_time', 'mentoring_session_time.id', '=', 'request_mentor.mentoring_session_time')
        ->leftJoin('industry_vertical_experience', 'admins.industry_vertical_experience', '=', 'industry_vertical_experience.id')
        ->leftJoin('areas_of_business_and_management_competence', 'admins.areas_of_business_and_management_competence', '=', 'areas_of_business_and_management_competence.id')
        ->select('request_mentor.*','start_up_info.*','mentoring_session_time.*','mentors.*','admins.*','professional_expertise.*','industry_vertical_experience.*','areas_of_business_and_management_competence.*')
        ->where(['request_mentor.request_mentor_id' => $mrid ])        
        ->get();
        
        $req_m = $mrid;

        $mentor_feedback = DB::table('mentor_feedback')
                                ->where(['request_mentor' => $mrid])
                                ->get();
        $mentor_mildstone = DB::table('mentor_mildstone')
                                ->where(['request_mentor' => $mrid])
                                ->get();
       // dump($mentor_mildstone);
        return view('mentor_feedback_view',compact('mentor_mildstone','mentor_feedback','req_m','mentor','yn','technology_domain_area','business_domain_area','mentoring_session_time'));
    }
    public function startup_feedback_view($req_m)
    {
        $technology_domain_area   = DB::table('professional_expertise')->get();
        $business_domain_area  = DB::table('industry_vertical_experience')->orderBy('industry_experience', 'ASC')->get();
        $mentoring_session_time   = DB::table('mentoring_session_time')->get();
        $yn    = DB::table('yn')->get();

        $mentor = DB::table('request_mentor')
        ->leftJoin('mentors', 'mentors.request_mentor', '=', 'request_mentor.request_mentor_id')
        ->leftJoin('admins', 'mentors.admins', '=', 'admins.id')
//      ->leftJoin('start_up_info', 'start_up_info.user_id', '=', 'request_mentor.user')
        ->leftJoin('professional_expertise', 'admins.professional_expertise', '=', 'professional_expertise.id')
        ->leftJoin('mentoring_session_time', 'mentoring_session_time.id', '=', 'request_mentor.mentoring_session_time')
        ->leftJoin('industry_vertical_experience', 'admins.industry_vertical_experience', '=', 'industry_vertical_experience.id')
        ->leftJoin('areas_of_business_and_management_competence', 'admins.areas_of_business_and_management_competence', '=', 'areas_of_business_and_management_competence.id')
        ->select('request_mentor.*','mentoring_session_time.*','mentors.*','admins.*','professional_expertise.*','industry_vertical_experience.*','areas_of_business_and_management_competence.*')
        ->where(['request_mentor.request_mentor_id' => $req_m ])        
        ->get();
        
        $startup_feedback = DB::table('user_feedback')
                ->where(['request_mentor' => $req_m])
                ->get();
        $startup_mildstone = DB::table('user_mildstone')
                ->where(['request_mentor' => $req_m])
                ->get();

        //dump($startup_feedback);
        return view('startup_feedback_view',compact('startup_mildstone','startup_feedback','req_m','mentor','yn','technology_domain_area','business_domain_area','mentoring_session_time'));
    }

    public function user_profile_view($id)
    {
        $users    = DB::table('users')
                        ->where(['id' => $id])
                        ->get();

        $ipr_stats    = DB::table('ipr_stats')
                        ->leftJoin('ipr_val', 'ipr_stats.ipr_id', '=', 'ipr_val.id')
                        ->where('users_id', '=', $id)
                        ->get(); 

        $innovative_stats    = DB::table('innovative_stats')
                                ->leftJoin('innovative_val', 'innovative_stats.innovative_id', '=', 'innovative_val.id')
                                ->where('users_id', '=', $id)
                                ->get(); 

        $founders    = DB::table('founders')
                        ->leftjoin('qualification','founders.qualification','=','qualification.id')
                        ->where('users_id', '=', $id)
                        ->get();
                                //  dump($ipr_stats);
        $start_up_info  =  DB::table('start_up_info')
                        ->leftJoin('nature_of_startup', 'start_up_info.nature_of_startup', '=', 'nature_of_startup.id')
                        ->leftJoin('type_of_industry', 'start_up_info.industry', '=', 'type_of_industry.id')

                        ->leftJoin('start_up_categories', 'start_up_info.categorie', '=', 'start_up_categories.id')
                        
                        ->leftJoin('start_up_stage', 'start_up_info.current_stage', '=', 'start_up_stage.id')

                        ->leftJoin('know_about_us', 'start_up_info.how_know_about_us', '=', 'know_about_us.id')

                        ->select('start_up_info.*', 'nature_of_startup.*', 'type_of_industry.*','start_up_stage.*','start_up_categories.*','know_about_us.*')
                        ->where('start_up_info.user_id', '=', $id)
                        ->get();
      //    dump($users);
        return view('user_profile_view',compact('users','start_up_info','ipr_stats','founders','innovative_stats'));
    }

    /* End Update 1*/

    public function autotirggerfeedback()
    {
        $feedback  = DB::table('mentors')
            ->leftJoin('mentor_feedback', 'mentors.request_mentor', '=', 'mentor_feedback.request_mentor')
            ->leftJoin('day_and_time', 'mentors.request_mentor', '=', 'day_and_time.request_mentor')
            ->select('day_and_time.*')
            ->where('day_and_time.date','<',Carbon::now() )
            ->where(['day_and_time.approval' => 1])
            ->first();

        dump($feedback->request_mentor);
    }
    public function Logout(){
        auth()->logout();
    
        session()->flash('message', 'Some goodbye message');
    
        return redirect('admin/login');
    }
}
