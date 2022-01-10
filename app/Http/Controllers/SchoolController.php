<?php

namespace App\Http\Controllers;

use\App\User;
use App\School;
use Illuminate\Http\Request;
use Redirect;
use \Validator;
use DataTables;
use DB;
use Auth;

class SchoolController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    |  School Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new School as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |S
    */

   // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }



     public function index(){

        return view('registerNewSchool');
     }



     

   
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
     //name email address city country username password rpassword


    public function store(Request $request){


         $input = $request->all();

         

  $v = Validator::make($request->all(),[
            'schoolName' => 'required|string|max:255|unique:school',
            'schoolEmail'=> 'required|string|email|max:255|unique:school',
            'email'      => 'required|string|email|max:255|unique:users',
            'address'    => 'required|string|max:255',
            //'city'       => 'required|string|max:255',
            //'country'    => 'required|string|max:255',
            //'password'   => 'required|string|min:6|confirmed',
        ],[
       'schoolName.required'=>'Required School Name',
       'schoolName.unique'  =>'School Already Exist',
       'schoolEmail.unique' =>'Email Already Exits',
       'email.unique'       =>'Email Already Exist',
       'address.required'   =>'Required Address',
       'city.required'      =>'Required City',
       'country.required'   =>'Required Country',
       'password.min'       =>'Required six character or more'


     ]);

      

    if ($v->fails())
    {
      // dd($input);
        return redirect()->back()->withErrors($v->errors())->withInput();
    }
    else{

            
         

 
         if($input['school_id']==null||'NO ID'){
             $flair = (DB::table('school')->count()) +1;
            }else{
                $school_id=$input['school_id'];
            }
             if($flair<=9){
            
            $school_id="000".$flair; 
              }
            if($flair<=99 && $flair>9){
            $school_id="00".$flair; 
            }
            if($flair>99 && $flair<=999){
            $school_id="0".$flair; 
            }
            if ($flair>999999){
            $school_id=$flair; 
            }

         
         $saveSchool=array();
 //'name','email', 'role','createBy','user_attitude','password'
       
        $saveSchoolinfo=array(
         'name'         =>$input['schoolName'],
         'email'        =>$input['email'],
         'role'         =>'Administrator',
         'user_attitude'=>'active',
         'password'     =>bcrypt($input['password']),
         'createdBy'    =>0,
        );
        $inputSchool=User::create($saveSchoolinfo);
        
        $saveSchool=array(
         'user_id'      =>$inputSchool->id,
         'schoolName'   =>$input['schoolName'],
         'schoolEmail'  =>$input['schoolEmail'],
         'school_id'    =>$school_id,
         'city/Town'    =>$input['city'],
         'country'      =>$input['country'],
         'address'      =>$input['address'],
         'tnc'          =>$input['tnc'],
         'active'       =>1,
        );



        //dd(Auth::user()->id);
       $schoolCreate = School::create($saveSchool);
    //dd($schoolCreate);
        //$schoolCreate=DB::table('school')->insert($saveSchool);
    \Session::flash('msg','You can now login Succefully');
       return Redirect::to('login');
        
    }
}

}



