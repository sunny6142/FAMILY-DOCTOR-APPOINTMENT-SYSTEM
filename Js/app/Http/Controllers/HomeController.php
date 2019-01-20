<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use response;
use Illuminate\Support\Facades\input;

use App\User;
use App\request_mentor;
use App\start_up_info;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;
use Session;
use Validator;
use Carbon\Carbon;


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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= DB::table('category')
        ->leftJoin('doctors','doctors.category','=','category.cat_id')
        ->select(DB::raw('count(doctors.category) as val'),'category.cat_id','category.category')
        ->groupBy('doctors.category', 'category.cat_id','category.category')
        ->orderBy('category.cat_id', 'ASC')
        ->paginate(25);

        $doctor = DB::table('appointment')
            ->leftJoin('doctors','doctors.doctors_id','=','appointment.doctors')
            ->where(['appointment.users' => Auth::user()->users_id])
            ->get(); 
     
        //    dump($doctor);
        if(!$doctor->isEmpty() )
        {
            
            return view('change_doctor',compact('doctor'));
        }
        else
            return view('home',compact('categories'));
    }

    public function choose_category()
    {
        $categories= DB::table('category')
        ->leftJoin('doctors','doctors.category','=','category.cat_id')
        ->select(DB::raw('count(doctors.category) as val'),'category.cat_id','category.category')
        ->groupBy('doctors.category', 'category.cat_id','category.category')
        ->paginate(25);

    //    dump($categories);
        return view('home',compact('categories'));
    }

    public function choosedoctor($cat)
    {
        $doctor = DB::table('doctors')->where(['category' => $cat])
                        ->paginate(25);
        
        $categories = DB::table('category')
                        ->where(['cat_id' => $cat])
                        ->get(); 
    
        return view('choose_doctor',compact('doctor','categories'));
    }

    public function selectdoctor($id)
    {
        $doctor = DB::table('doctors')
                    ->leftJoin('category','category.cat_id','=','doctors.category')
                    ->where(['doctors_id' => $id])
                    ->get(); 
       // dump($doctor);   
        return view('select_doctor',compact('doctor'));
    }

    public function confirm_doctor(Request $request)
    {
        DB::transaction(function() use ($request) {
            DB::table('appointment')->where('users', '=', Auth::user()->users_id)->delete();
            DB::table('appointment')
            ->insert(['users' => Auth::user()->users_id, 'doctors' => $request->id]);
        });
    }

    public function edit_profile()
    {
        $nature_of_startup  = DB::table('nature_of_startup')->orderBy('nature', 'ASC')->get();
        $industry   = DB::table('type_of_industry')->orderBy('industry', 'ASC')->get();
        $categories    = DB::table('start_up_categories')->orderBy('categories', 'ASC')->get();
        $yn    = DB::table('yn')->get();
        //$ipr_val    = DB::table('ipr_val')
        //                    leftjoin('ipr_statsHide')->get();
        $qualification    = DB::table('qualification')->get();
        $start_up_stage    = DB::table('start_up_stage')->get();
        //$innovative_val    = DB::table('innovative_val')->get();
        $know_about_us    = DB::table('know_about_us')->get();

        $ipr_val    = DB::table('ipr_stats')
                    ->leftJoin('ipr_val', 'ipr_stats.ipr_id', '=', 'ipr_val.id')
                    ->where('users_id', '=', Auth::user()->id)
                    ->get(); 

        $innovative_val    = DB::table('innovative_stats')
                ->leftJoin('innovative_val', 'innovative_stats.innovative_id', '=', 'innovative_val.id')
                ->where('users_id', '=', Auth::user()->id)
                ->get(); 


        $start_up_info  =  DB::table('start_up_info')
                            ->select('start_up_info.*')
                            ->where('start_up_info.user_id', '=', Auth::user()->id)
                            ->get();
        
        $founders  =  DB::table('founders')
                            ->select('founders.*')
                            ->where('founders.users_id', '=', Auth::user()->id)
                            ->get();

        //dump($start_up_info);                 
        return view('edit_startup_home',compact('founders','start_up_info','nature_of_startup','industry','categories','yn','ipr_val','qualification','start_up_stage','innovative_val','know_about_us'));

    }

    public function profile()
    {
     //   $start_up_info    = DB::table('start_up_info')->get();
        $ipr_stats    = DB::table('ipr_stats')
                                  ->leftJoin('ipr_val', 'ipr_stats.ipr_id', '=', 'ipr_val.id')
                                  ->where('users_id', '=', Auth::user()->id)
                                  ->get(); 
      
        $innovative_stats    = DB::table('innovative_stats')
                                  ->leftJoin('innovative_val', 'innovative_stats.innovative_id', '=', 'innovative_val.id')
                                  ->where('users_id', '=', Auth::user()->id)
                                  ->get(); 

        $founders    = DB::table('founders')
                            ->leftjoin('qualification','founders.qualification','=','qualification.id')
                            ->where('users_id', '=', Auth::user()->id)
                            ->get();
                                   //  dump($ipr_stats);
        $start_up_info  =  DB::table('start_up_info')
                            ->leftJoin('nature_of_startup', 'start_up_info.nature_of_startup', '=', 'nature_of_startup.id')
                            ->leftJoin('type_of_industry', 'start_up_info.industry', '=', 'type_of_industry.id')

                            ->leftJoin('start_up_categories', 'start_up_info.categorie', '=', 'start_up_categories.id')
                            
                            ->leftJoin('start_up_stage', 'start_up_info.current_stage', '=', 'start_up_stage.id')

                            ->leftJoin('know_about_us', 'start_up_info.how_know_about_us', '=', 'know_about_us.id')

                            ->select('start_up_info.*', 'nature_of_startup.*', 'type_of_industry.*','start_up_stage.*','start_up_categories.*','know_about_us.*')
                           ->where('start_up_info.user_id', '=', Auth::user()->id)
                            ->get();
      
      //  dump($start_up_info);
        return view('user_profile',compact('start_up_info','ipr_stats','founders','innovative_stats'));
    }

    public function Request_Mentor()
    {
        $technology_domain_area   = DB::table('professional_expertise')->get();
        $business_domain_area  = DB::table('industry_vertical_experience')->orderBy('industry_experience', 'ASC')->get();
        $mentoring_session_time   = DB::table('mentoring_session_time')->get();

        $mentor = DB::table('request_mentor')
                    ->leftJoin('mentors', 'mentors.request_mentor', '=', 'request_mentor.request_mentor_id')
                    ->leftJoin('admins', 'mentors.admins', '=', 'admins.id')
        //            ->leftJoin('start_up_info', 'start_up_info.user_id', '=', 'request_mentor.user')
                    ->leftJoin('professional_expertise', 'admins.professional_expertise', '=', 'professional_expertise.id')
                    ->leftJoin('industry_vertical_experience', 'admins.industry_vertical_experience', '=', 'industry_vertical_experience.id')
                    ->leftJoin('areas_of_business_and_management_competence', 'admins.areas_of_business_and_management_competence', '=', 'areas_of_business_and_management_competence.id')
                    ->select('request_mentor.*','mentors.*','admins.*','professional_expertise.*','industry_vertical_experience.*','areas_of_business_and_management_competence.*')
                    ->where(['request_mentor.user' => Auth::user()->id,  'mentors.mentor_status'=>2, 'mentors.user_status' => 1])
                    ->get();
        
    //    dump($mentor);            
        return view('request_mentor',compact('technology_domain_area','business_domain_area','mentoring_session_time','mentor'));
    }

    public function Approved_Mentor_by_user()
    {
        $technology_domain_area   = DB::table('professional_expertise')->get();
        $business_domain_area  = DB::table('industry_vertical_experience')->orderBy('industry_experience', 'ASC')->get();
        $mentoring_session_time   = DB::table('mentoring_session_time')->get();

        $mentor = DB::table('request_mentor')
                    ->leftJoin('mentors', 'mentors.request_mentor', '=', 'request_mentor.request_mentor_id')
                    ->leftJoin('admins', 'mentors.admins', '=', 'admins.id')
        //            ->leftJoin('start_up_info', 'start_up_info.user_id', '=', 'request_mentor.user')
                    ->leftJoin('professional_expertise', 'admins.professional_expertise', '=', 'professional_expertise.id')
                    ->leftJoin('industry_vertical_experience', 'admins.industry_vertical_experience', '=', 'industry_vertical_experience.id')
                    ->leftJoin('areas_of_business_and_management_competence', 'admins.areas_of_business_and_management_competence', '=', 'areas_of_business_and_management_competence.id')
                    ->select('admins.*')
               
                    ->where(['request_mentor.user' => Auth::user()->id,  'mentors.mentor_status'=>2, 'mentors.user_status' => 2])
                    
                    ->get();
                    
        return view('Approved_mentor_by_startup.blade.php',compact('technology_domain_area','business_domain_area','mentoring_session_time','mentor'));
    }

      /* Update 1*/
  
      public function list_startup_connection()
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
          ->where(['user_status' => 2, 'users.id'=> Auth::user()->id])
          ->paginate(25);
  
          $list = $mentors->toArray()['data'];
          //   ->get(); 
          //   dump($list);
          return view('Approved_mentor_by_startup', compact('list','mentors'));
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

    public function Accept_Mentor($mid)
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
        return view('accept_mentor',compact('technology_domain_area','business_domain_area','mentoring_session_time','mentor')); 
    }

    public function Accept_Mentor_Post(Request $req)
    {
        //working 
        //dump($req->all());
        $mentor = DB::table('request_mentor')
                    ->leftJoin('mentors', 'mentors.request_mentor', '=', 'request_mentor.request_mentor_id')
                    ->leftJoin('admins', 'mentors.admins', '=', 'admins.id')
            //      ->leftJoin('start_up_info', 'start_up_info.user_id', '=', 'request_mentor.user')
                    ->select('admins.*')
                    ->where(['request_mentor.request_mentor_id' => $req->request_mentor ])        
                    ->get();
        

        DB::transaction(function() use ($req) {
            
            DB::table('day_and_time')
                ->where('id', $req->id)
                ->update(['approval' => 1]); 

            DB::table('mentors')
                ->where('request_mentor', $req->request_mentor)
                ->update(['user_status' => 2]); 

            //Send mail to admin and mentor
            
            $msg = '<body style="padding:5px">Dear Sir,
                        <br><br><br> Thank you very much for accepting our mentoring request. We are confirming the time, date & location for the same as mentioned below,
                        <br><br>
                        Mentoring Session Date : '.$req->date.'.<br>
                        Mentoring Session Time : '.$req->start_time.' - '.$req->end_time.'.<br>
                        Mentoring Session Venue : '.$req->venu.'<br>
                        <br>
                        Regards,<br>
                        Team Mentorgateway<br>
                        <a href="www.mentorgateway.com" target="_blank"> www.mentorgateway.com </a> <br>
                        <a href="mailto:info@mentorgateway.com" target="_top"> info@mentorgateway.com </a> <br>
                        <a href="tel:9825013774">+91 98250 13774</a><br>                
                    </body>';
            //$mentor[0]->email
            //mail("sunny6142@gmail.com", "AIC", "Testing", "Header" );
        });
    }

    public function Req_Mentor()
    {
        $technology_domain_area   = DB::table('professional_expertise')->get();
        $business_domain_area  = DB::table('industry_vertical_experience')->orderBy('industry_experience', 'ASC')->get();
        $mentoring_session_time   = DB::table('mentoring_session_time')->get();
        return view('request_mentor_layout',compact('technology_domain_area','business_domain_area','mentoring_session_time'));
    }

    public function startup_feedback($req_m)
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
        
        //dump($mentor);
        return view('startup_feedback_layout',compact('req_m','mentor','yn','technology_domain_area','business_domain_area','mentoring_session_time'));
    }

    public function startup_feedback_Post(Request $request)
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
                      'problem_understanding' => $request->und,
                      'allotted_enough_time' => $request->all,
                      'expectation' => $request->expection,
                      'overall_experience' => $request->overall,
                      'another_session' => $request->another,
                      'areas_of_business_and_management_competence' => $request->mbusiness_domain_area ];

                DB::table('user_feedback')->insert($v);
                DB::table('user_mildstone')->insert($arr);

                //return response()->json($request_mentor);
            });
            
        }
    }

    public function Request_Mentor_Post(Request $request)
    {
      //  dump($request->all());

        $validator = Validator::make($request->all(), [
            'professional_expertise' => 'required',
            'industry_vertical_experience' => 'required',
            'problem' => 'required|min:20|max:200',
            'mentoring_session_time' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(array('errors'=> $validator->errors()));
           //   return response()->json($validator);
            //    return Redirect::route('login#toregister')->withErrors($validator);
        }
        else{
            $request_mentor = request_mentor::Create(['user' => Auth::user()->id,
                                                    'professional_expertise' => $request->professional_expertise,
                                                    'industry_vertical_experience' => $request->industry_vertical_experience,
                                                    'problem' => $request->problem,
                                                    'mentoring_session_time' => $request->mentoring_session_time]);
            return response()->json($request_mentor);
        }
    }

    
    public function submitForm(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'start_up_name' => 'required|max:100',
            'nature_of_startup' => 'required',
            'industry' => 'required',
            'categorie' => 'required',
            'office_address' => 'required|min:5|max:100',
            'no_of_founders' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(array('errors'=> $validator->errors()));
        }
        else{
            $start_up_info = start_up_info::updateOrCreate(
                ['user_id' => Auth::user()->id],
                $request->all()
            );
           
            return response()->json($start_up_info);
        }
            
    }

    public function submitForm2(Request $request)
    {
      /* 
       $validator = Validator::make($request->all(), [
            'fname.*.value' => 'required',
            'fdesignation.*.value' => 'required',
            'fmobile.*.value' => 'required',
            'femail.*.value' => 'required|email|unique:users',
        ]);
       
        if($validator->fails()){
            return response()->json(array('errors'=> $validator->errors()));
        }
        else {
           
        } */
        // dump($request->all());
       
       $name = json_decode($request->fname);
       $fdesignation = json_decode($request->fdesignation);
       $fmobile = json_decode($request->fmobile);
       $femail = json_decode($request->femail);
       $fqualification = json_decode($request->fqualification);

        for($i = 0; $i < count($name); $i++) {
           $name[$i]->designation = $fdesignation[$i]->value; 
           $name[$i]->mobile = $fmobile[$i]->value; 
           $name[$i]->email = $femail[$i]->value; 
           $name[$i]->qualification = $fqualification[$i]->value; 
        }
   //    dump($name);
   $arr = [];
       foreach($name as $val) {
       //     dump($val );
            array_push($arr, ['users_id' => Auth::user()->id,
            'name' => $val->value ,
            'designation' => $val->designation,
            'contact' =>  $val->mobile,
            'email_id' => $val->email,
            'qualification' => $val->qualification]);
        }
        
     //   dump($arr);
      
        DB::table('founders')->where('users_id', '=', Auth::user()->id)->delete();
        DB::table('founders')->insert($arr);
            
    }

    public function submitForm3(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cne' => 'required|numeric',
            'csd' => 'required',
            'iprval' => 'required',
            'innovative_p' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(array('errors'=> $validator->errors()));
        }
        else{
            DB::transaction(function() use ($request) {
                $applied_for = json_decode($request->applied_for);
                $registered = json_decode($request->registered);
                $application_no = json_decode($request->application_no);
                $ipr_id = json_decode($request->ipr_id);

                $innovative_v = json_decode($request->innovative_v);
                $improvement_v = json_decode($request->improvement_v);
                $inno_id = json_decode($request->inno_id);

            //  dump($ipr_id);
                    $logo = '';
                if($file = $request->hasFile('logo')){
                    
                        $file = $request->file('logo') ;
                        $fileName = sha1(date('YmdHis') . str_random(30)).$file->getClientOriginalName() ;
                        $destinationPath = public_path().'/images/' ;
                        $file->move($destinationPath,$fileName);
                        $logo = $fileName ;
                    }

                    if($logo != '')
                    $start_up_info = start_up_info::updateOrCreate(
                        ['user_id' => Auth::user()->id],
                        ['number_of_employees' => $request->cne, 
                        'current_stage' => $request->csd,
                        'ipr_status' => $request->iprval,
                        'innovative_status' => $request->innovative_p,
                        'logo' => $logo ]
                        //$request->all()
                    );
                    else{
                        $start_up_info = start_up_info::updateOrCreate(
                            ['user_id' => Auth::user()->id],
                            ['number_of_employees' => $request->cne, 
                            'current_stage' => $request->csd,
                            'ipr_status' => $request->iprval,
                            'innovative_status' => $request->innovative_p]
                            //$request->all()
                        );

                    }
                //    var_dump($start_up_info);
                
                    for($i = 0; $i < count($applied_for); $i++) {
                    $applied_for[$i]->registered_granted = $registered[$i]->value; 
                    $applied_for[$i]->application_no = $application_no[$i]->value;
                    $applied_for[$i]->ipr_id = $ipr_id[$i]->value;
                    }

                    for($i = 0; $i < count($innovative_v); $i++) {
                        $innovative_v[$i]->improvement = $improvement_v[$i]->value; 
                        $innovative_v[$i]->innovative_id = $inno_id[$i]->value; 
                    }
            //      dump($innovative_v );
                $ipr_stats = [];
                foreach($applied_for as $val) {
                        array_push($ipr_stats, ['users_id' => Auth::user()->id,
                        'applied_for' => $val->value ,
                        'registered_granted' => $val->registered_granted,
                        'ipr_id' => $val->ipr_id,
                        'application_no' => $val->application_no]);
                    }

                    $innovative_stats = [];
                    foreach($innovative_v as $v) {
                        array_push($innovative_stats, ['users_id' => Auth::user()->id,
                        'innovative' => $v->value,
                        'innovative_id' => $v->innovative_id,
                        'improvement' => $v->improvement]);
                    }
                //   dump($arr);
            
                DB::table('innovative_stats')->where('users_id', '=', Auth::user()->id)->delete();
                DB::table('innovative_stats')->insert($innovative_stats);

                DB::table('ipr_stats')->where('users_id', '=', Auth::user()->id)->delete();
                DB::table('ipr_stats')->insert($ipr_stats);
            });
        }
    }

    public function submitForm4(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'about_your_startup' => 'required|min:20|max:200',
            'problem' => 'required|min:20|max:200',
            'solution' => 'required|min:20|max:200',
            'uniqueness' => 'required|min:20|max:200',
            'revenue_method' => 'required|min:20|max:200',
            'competitors' => 'required|min:20|max:200',
        ]);

        if($validator->fails()){
            return response()->json(array('errors'=> $validator->errors()));
        }
        else{
            $start_up_info = start_up_info::updateOrCreate(
                ['user_id' => Auth::user()->id],
                $request->all()
            );
            
            return response()->json($start_up_info);
        }
    }

    public function submitForm5(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'revenue' => 'required|numeric',
            'name_of_incubator' => 'required|min:3|max:50',
            'date_of_incubator' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(array('errors'=> $validator->errors()));
        }

       $start_up_info = start_up_info::updateOrCreate(
           ['user_id' => Auth::user()->id],
           $request->all()
       );
      
       return response()->json($start_up_info);
    }

    public function submitForm6(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'how_know_about_us' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(array('errors'=> $validator->errors()));
        }
    //    dump($request->all());
       $start_up_info = start_up_info::updateOrCreate(
           ['user_id' => Auth::user()->id],
           $request->all()
       );
      
       return response()->json($start_up_info);
    }
    public function Logout(){
        auth()->logout();
    
        session()->flash('message', 'Some goodbye message');
    
        return redirect('/');
    }
}
