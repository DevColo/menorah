<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Validator;
use App\RegisterStudent;
use Illuminate\Support\Facades\Input;
use App\User;
use App\StudentClass;
use Redirect;
use DataTables;


class RegisterStudentController extends Controller
{
    /*
     *This Controller handle the Registration of Students
     */

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
    public function index(){



      $studentClass=DB::table('class')
                       ->where('user_id',Auth::user()->id)
                       ->pluck('className','id');
      $studentCampus=DB::table('campus')
                        ->where('user_id',Auth::user()->id)
                        ->pluck('campusName','id');


    return view('createStudent',compact('studentClass','studentCampus'));

    }

    public function store(Request $request){
    /*
     *This methods Add Student to a Class
     */
      $data=$request->all();
      $studentFirstName  =$data['fName'];
      $studentLastName   =$data['lName'];
      $studentMiddleName =$data['mName'];

      //Unique Students


      $uniqueStudent=DB::table('students')
                        ->where('user_id',Auth::user()->id)
                        ->where('firstName',$studentFirstName)
                        ->where('lastName',$studentLastName)
                        ->where('middleName',$studentMiddleName)
                        ->pluck('firstName','lastName','middleName')
                        ->count();

     
      if ($uniqueStudent>0) {

          \Session::flash('msgErr','Students Already Exists');
          return  redirect()->back()->withInput();
      }else{



       //Send Student information in the DB


    
 
      $validation = Validator::make($request->all(),[ 
        'file'                 =>'mimes:jpeg,jpg,png|max:10000',
        'pNumber'              =>'numeric|min:9',
        'email'                =>'nullable|email|string|unique:students,studentEmail',
       'fName'                =>'required|string|max:255|min:3',
        'lName'                =>'required|string|max:255|min:3',
        'mName'                =>'required|string|max:255|min:3',
        'sAddress'             =>'required|string',
        'sCity'                =>'required|string',
        'sNationality'         =>'required|string',
        //
        'pSchoolName'          =>'required|string|min:2',
        'pSchoolAdress'        =>'required|string',
        'fFullName'            =>'required|string',
        'fOccupation'          =>'required|string',
        'mFullName'            =>'required|string',
        'mOccupation'          =>'required|string',
        'gContact'             =>'numeric|min:9',
        'religion'             =>'nullable|string',],[
        'email.required'       =>'The Email must be Required',
        'email.unique  '       =>'The Email Already Exist',
        'fName.required'       =>'Reqired first Name',
        'lName.required'       =>'Required last Name',
        'sNationality.required'=>'Contact number of Relation is Required',
        'country.required'     =>'Nationality Required',
        'gContact.numeric'     =>'Guardian Contact must be a Number',
        'gContact.min'         =>' Guardian Contact must have a Minimum Character of 9',
        'pNumber.numeric'      =>'The Students phone Number must be a Number',
        'pSchoolName.string'   =>'The Student School Name must not be letter not number',
        'pSchoolAdress.string' =>'The Student School Address must be letter not number'

     ]);

     
// dd($data);


    if ($validation->fails())
    {
        
         \Session::flash('msgErr','Some of Your Input have Errors');
         return redirect()->back()->withErrors($validation->errors())->withInput();
    }
    else{
       
    

        //moving User Image File
       $file = Input::file('file');
       if ($file==null) {
         $file_name=null;
       }
       if($file!==null){
         $file_name =rand().'.'.$file->getClientOriginalName();
         $file->move(public_path("images"), $file_name);
       }
    

   
     
          $studentData=array(
        'student_photo' =>$file_name,
        'user_id' => Auth::user()->id,
        'firstName'       =>$data['fName'],
        'lastName'        =>$data['lName'],
        'middleName'      =>$data['mName'],
        'Nationality'     =>$data['sNationality'],
        'address'         =>$data['sAddress'],
        'studentEmail'    =>$data['email'],
        'phone'           =>$data['pNumber'],
        'cOFBirth'        =>$data['country'],
        'dOfBirth'        => date('Y-m-d', strtotime(str_replace('-', '/', $data['dofBirth']))),
        'city'            =>$data['sCity'],
        'sex'             =>$data['gender'],
        'fatherfullName'  =>$data['fFullName'],
        'father_living'   =>$data['fl_d'],
        'fatherOccupation'=>$data['fOccupation'],
        'motherfullName'  =>$data['mFullName'],
        'mother_living'   =>$data['ml_d'],
        'mother_Occupation'=>$data['mOccupation'],
        'guardianContact' =>$data['gContact'],
        'Religion'        =>$data['religion'],
        'physical_defects'=>$data['pdefect'],
        'previousSchoolName'=>$data['pSchoolName'],
        'previousSchoolAddress'=>$data['pSchoolAdress'],
        'active'               =>1,
               );
          $saveStudentData=RegisterStudent::create($studentData);

         if($data['student_id']==null||'NO ID'){
             $flair = (DB::table('students')->count()) +1;
            }else{
                $student_id=$input['school_id'];
            }
             if($flair<=9){
            
            $student_id="000".$flair; 
            }
            if($flair<=99 && $flair>9){
            $student_id="00".$flair; 
            }
            if($flair>99 && $flair<=999){
            $student_id="0".$flair; 
            }
            if ($flair>999999){
            $student_id=$flair; 
            }



             $studentCampus=DB::table('campus')
                            ->where('user_id',Auth::user()->id)
                            ->where('id',$data['campus'])
                            ->pluck('campus_code');

             $studentCampus=$studentCampus[0];

             $studentClass=DB::table('class')
                               ->where('user_id',Auth::user()->id)
                               ->where('id',$data['studentClass'])
                               ->pluck('class_code');

            $studentCampusid=DB::table('campus')
                               ->where('user_id',Auth::user()->id)
                               ->where('id',$data['campus'])
                               ->pluck('id');
            $studentCampusid=$studentCampusid[0];

             $studentClassid=DB::table('class')
                               ->where('user_id',Auth::user()->id)
                               ->where('id',$data['studentClass'])
                               ->pluck('id');

            $studentClassid=$studentClassid[0];

            $uniquestudentid=DB::table('students')
                          ->where('user_id',Auth::user()->id)
                          ->where('firstName',$data['fName'])
                          ->where('lastName',$data['lName'])
                          ->where('middleName',$data['mName'])
                          ->pluck('id');

            $uniquestudentid=$uniquestudentid[0];


            $studentClassData=array(
            'user_id'      =>Auth::user()->id,
            'campus_id'    =>$studentCampusid,
            'class_id'     =>$studentClassid,
            'student_id'   =>$uniquestudentid,
            'student_code' =>$student_id,
            'active'       =>1
            );

            $saveStudentClassData=StudentClass::create($studentClassData);

            //'user_id','campus_id','class_id','student_id','student_code','active'
            
             $studentUser=array(
             'name'         =>$data['fName'].' '.$data['mName'].' '.$data['lName'],
             'email'        =>$student_id,
             'role'         =>'Students',
             'user_attitude'=>'active',
             'password'     =>bcrypt($studentCampus.'@'.$student_id),
             'createdBy'    =>Auth::user()->id,



            ); 
              $saveStudentUser=User::create($studentUser);
                 
              \Session::flash('msg','Student Created Successfully');
                return Redirect::to('registerStudent');

            //dd($campusName);





         
        //$file = Input::file('file');
     
    }

}
}

public function show(){
  $formName='View Student';

       // $users= DB::table('campus')
       //                  ->where('campus.user_id','=',Auth::user()->id)
       //                  ->join('students_class','students_class.campus_id','=','campus.id')
       //                ->join('class','class.id','=','students_class.class_id')
       //                ->join('students','students.id','students_class.student_id')
       //                ->get();
       //  dd($users);

  return view('viewStudent',compact('formName'));
}

// public function anyData(){

//     $users = DB::table('students')
//                     ->where('student.user_id','=',Auth::user()->id)
//                     ->get();


//  return Datatables::of($users)

//            ->addColumn('Status', function ($user) {
              
//               if($user->active==1){

//               return  '<button class="btn btn-info"><i class="glyphicon glyphicon-edit"></i>Active</button>';

//               }else{

//             return  '<button class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i>Deactivated</button>';
     
//               }

           
//             })

//            ->addColumn('action', function ($user) {
//                 return '<a href="ViewAcademic/show/'.$user->id.'" class="btn btn-success"  style="margin-right:3px;">Edit<i class=" la la-bullseye" style="margin-right:3px;"></i></a>'.'<a href="ViewAcademic/destroy/'.$user->id.'" class="btn btn-danger" style="margin-right:3px;">Delete<i class="la la-times"></i></a>';
//             })


//          ->rawColumns(array("action","Status"))

//          ->make(true);
// }

public function anyData(){

          // $users = DB::table('students')
          //            ->where('students.user_id','=',Auth::user()->id)
          //            ->join('students_class','students_class.student_id','students.id')
          //             ->join('class','class.id','students_class.class_id')
          //             ->join('campus','campus.id','=','students_class.campus_id')
          //            //->join('campus_classes','campus_classes.class_id','=','students_class.class_id')
          //            //->join('campus','campus.id','=','campus_classes.campus_id')
          //            ->get();
              $users= DB::table('campus')
                        ->where('campus.user_id','=',Auth::user()->id)
                        ->join('students_class','students_class.campus_id','=','campus.id')
                      ->join('class','class.id','=','students_class.class_id')
                      ->join('students','students.id','students_class.student_id')
                      ->get();
  

     //return DataTables::of($this->query())->make(true);

      return Datatables::of($users)

           ->addColumn('Status', function ($user) {
              
              if($user->active==1){

              return  '<button class="btn btn-info"><i class="glyphicon glyphicon-edit"></i>Active</button>';

              }else{

            return  '<button class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i>Deactivated</button>';
     
              }

           
            })

            ->addColumn('action', function ($user) {
                return '<a href="ViewAcademic/show/'.$user->id.'" class="btn btn-success"  style="margin-right:3px;">Edit<i class=" la la-bullseye" style="margin-right:3px;"></i></a>'.'<a href="ViewAcademic/destroy/'.$user->id.'" class="btn btn-danger" style="margin-right:3px;">Delete<i class="la la-times"></i></a>';
            })


         ->rawColumns(array("action","Status"))

         ->make(true);
    }

}
