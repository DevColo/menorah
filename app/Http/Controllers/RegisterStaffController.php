<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use App\RegisterStaffModel;
use Redirect;
use Illuminate\Support\Facades\Input;
use App\User;
use Auth;
use DataTables;
use App\StaffCampus;

class RegisterStaffController extends Controller
{
    

 public function __construct()
    {
      $this->middleware('auth');
    }


    public function index(){
        $staffCampus=DB::table('campus')
                        ->where('user_id',Auth::user()->id)
                        ->pluck('campusName','id');


    	return view('createStaff',compact('staffCampus'));
    }


   public function store(Request $request){
     $data=$request->all();
        
     $firstName=$data['fName'];
     $middleName=$data['mName'];
     $lastname=$data['lName'];

     $uniqueStaff= DB::table('staff')
         ->where('user_id',Auth::user()->id)
         ->where('firstName',$firstName)
         ->where('middleName',$middleName)
         ->where('lastName',$lastname)->count();

         if($uniqueStaff>0) {
         	\Session::flash('msgErr','This Staff Already Exist');
         	return  redirect()->back()->withInput();
         }else{

        $validation = Validator::make($request->all(),[ 
        'file'                 =>'mimes:jpeg,jpg,png|max:10000',
        'pNumber'              =>'numeric|min:9',
        'email'                =>'nullable|email|string|unique:staff,email',
        'fName'                =>'required|string|max:255|min:3',
        'lName'                =>'required|string|max:255|min:3',
        'mName'                =>'required|string|max:255|min:3',
        'sAddress'             =>'required|string|max:255|min:3',
        'sCity'                =>'required|string|max:255|min:3',
        'sNationality'         =>'required|string|max:255|min:3',
        'role'                 =>'required|string|max:255|min:3',
        'religion'             =>'required|string|max:255|min:3',
        'pdefect'              =>'required|string|max:255|min:3'
     ]);

        if ($validation->fails()){
        	\Session::flash('msgErr','Some of Your Input have Errors');
        	return redirect()->back()->withErrors($validation->errors())->withInput();
        }else{

        	if($data['staff_code']==null||'NO ID'){
             $flair = (DB::table('staff')->count()) +1;
            }else{
                $staff_id=$data['staff_code'];
            }
             if($flair<=9){
            
            $staff_id="00".$flair; 
            }
            if($flair<=99 && $flair>9){
            $staff_id="00".$flair; 
            }
            if($flair>99 && $flair<=999){
            $staff_id="0".$flair; 
            }
            if ($flair>999999){
            $staff_id=$flair; 
            }
     
        	   $file = Input::file('file');
            if ($file==null) {
               $file_name=null;
              }
            if($file!==null){
               $file_name =$data['fName'].$data['lName'].$data['mName'].str_random(5).'.'.$file->getClientOriginalExtension();
               $file->move(public_path("images"), $file_name);
                }


        	$staffData=array(
            'user_id'       =>Auth::user()->id,
            'staff_code'    =>$staff_id,
            'staff_photo'   =>$file_name,
            'firstName'     =>$data['fName'],
            'middleName'    =>$data['mName'],
            'lastName'      =>$data['lName'],
            'email'         =>$data['email'],
            'phoneNumber'   =>$data['pNumber'],
           // 'dofBirth'      =>$data['country'],
            'dofBirth'      => date('Y-m-d', strtotime(str_replace('-', '/', $data['dofBirth']))),
            'Address'       =>$data['sAddress'],
            'city'     =>$data['sCity'],
            'Nationality'   =>$data['sNationality'],
            'country'       =>$data['country'],
            'sex'           =>$data['gender'],
            'marriageStatus'=>$data['rSatus'],
            'employmentDate'=>date('Y-m-d', strtotime(str_replace('-', '/', $data['eDate']))),
            'Religion'      =>$data['religion'],
            'pdefect'       =>$data['pdefect'],
            'active'        =>1,
        	);

                     //  'name','email', 'role','user_attitude','password','createdBy'

        	$saveStaffData=RegisterStaffModel::create($staffData);

        	$staffFirstName = DB::table('staff')
        	               ->where('user_id',Auth::user()->id)
                           ->where('firstName',$data['fName'])
                           ->where('middleName',$data['mName'])
                           ->where('lastName',$data['lName'])->pluck('firstName');

            $staffMiddleName = DB::table('staff')
        	               ->where('user_id',Auth::user()->id)
                           ->where('firstName',$data['fName'])
                           ->where('middleName',$data['mName'])
                           ->where('lastName',$data['lName'])->pluck('middleName');

            $staffLastName = DB::table('staff')
        	               ->where('user_id',Auth::user()->id)
                           ->where('firstName',$data['fName'])
                           ->where('middleName',$data['mName'])
                           ->where('lastName',$data['lName'])->pluck('lastName');

        //get me staff id
        $staff_ID=DB::table('staff')
                     ->where('user_id','=',Auth::user()->id)
                     ->where('firstName',$data['fName'])
                     ->where('middleName',$data['mName'])
                     ->where('lastName',$data['lName'])
                     ->pluck('id');




        $staff_ID=$staff_ID[0];

        


             $staffCampusData=array(
             'user_id'  =>Auth::user()->id,
             'staff_id' =>$staff_ID,
             'campus_id'=>intval($data['campus']),
            );            
             $saveStaffCampusData=StaffCampus::create($staffCampusData);


                 //Sorting the Array to Resolve Errors at Runtime
            $staffFirstName =$staffFirstName[0];
            $staffMiddleName=$staffMiddleName[0];
            $staffLastName  =$staffLastName[0];

            //declaring variable to store string Literals

            $staffRole='Staff';



        	$staffUserData=array(
             'name'         =>$staffFirstName.' '.$staffMiddleName.' '.$staffLastName,
             'email'        =>$staff_id,
             'role'         =>$staffRole,
             'user_attitude'=>'active',
             'password'     =>bcrypt(123456),
             'createdBy'    =>Auth::user()->id,

        	);

        	$saveStaffUserData=User::create($staffUserData);

        	

            \Session::flash('msg','Staff Created Sucessfully');
          return  redirect()->back();


         }
        }

   }


   public function show(){
     $formName='View Staff Details';
     $id=24;

     $campusName=DB::table('campus')
                    ->where('user_id','=',Auth::user()->id)
                    ->pluck('campusName');
     // $users = DB::table('staff')
     //                 ->where('id',$id)->get();
                    
     //        dd($users[0]);

     $staff_photo='img/Student.png';
     
     return view('viewStaff',compact('formName','staff_photo','campusName'));
   }

public function anyData(){


              $users= DB::table('campus')
                        ->where('campus.user_id','=',Auth::user()->id)
                        ->join('staff_campus','staff_campus.campus_id','=','campus.id')
                        ->join('staff','staff.id','=','staff_campus.staff_id')
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
                return '<a  class="btn btn-success edit" id="'.$user->id.'" style="margin-right:3px;" data-toggle="modal" href="editStaff/'.$user->id.'">Edit<i class=" la la-bullseye" style="margin-right:3px;"></i></a>'.'<a class="btn btn-danger" style="margin-right:3px;">Delete<i class="la la-times"></i></a>';
            })


         ->rawColumns(array("action","Status"))

         ->make(true);
    }

    // public function fetchData(Request $request){
     
    //  $id=$request->input('id');
    //  $staff = DB::table('staff')
    //                  ->where('user_id',Auth::user()->id)
    //                  ->where('id',$id)->get();
                    
    // $staff=$staff[0];

    // $staff_campusid=DB::table('staff_campus')
    //                  ->where('staff_campus.staff_id',$id)
    //                  ->pluck('campus_id');


    // $staff_campusid=$staff_campusid[0];


    // $campus_id=DB::table('campus')
    //              ->where('campus.id','=',$staff_campusid)
    //              ->pluck('campusName');

    // $campus_id=$campus_id[0];

    // // $chooseCampus=DB::table('campus')
    // //                  ->where('campaus.user_id','=',Auth::user()->id)
    // //                  ->where('id','<>',$campus_id)
    // //                  ->pluck('id','campusName');





    //  $output=array(
    //   'fName' =>$staff->firstName,
    //   'lName' =>$staff->lastName,
    //   'mName' =>$staff->middleName,
    //   'images'=>$staff->staff_photo,
    //   'campusName'=>$campus_id,
    //  );


    //  echo json_encode($output);

    //  // if ($staff->staff_photo!==null) {
    //  //     $staff_photo=$staff->$staff_photo;

    //  //    view('viewStaff',compact('staff_photo'));
    //  // }
    //  // $game='/img/Student.png';
    //  //  return view('viewStaff',compact('staff_photo','game'));

    // }

    public function edit($id){
   

    $Data=DB::table('staff')
              ->where('staff.user_id','=',Auth::user()->id)
                 ->find($id);

   

 //pointer
    $id=$Data->id;
    $staff_photo=$Data->staff_photo;
    $staff_code=$Data->staff_code;
    $firstName=$Data->firstName;
    $middleName=$Data->middleName;
    $lastName=$Data->lastName;
    $email=$Data->email;
    $phoneNumber=$Data->phoneNumber;
    $dofBirth=$Data->dofBirth;
    $Address=$Data->Address;
    $city=$Data->city;
    $Nationality=$Data->Nationality;
    $country=$Data->country;
    $sex=$Data->sex;
    $marriageStatus=$Data->marriageStatus;
    $employmentDate=$Data->employmentDate;
    $Religion=$Data->Religion;
    $physicalDefect=$Data->physicalDefect;
    $active=$Data->active;

     //changing the date format
    $dofBirth=date('d/m/Y',strtotime(str_replace('/', '-', $dofBirth)));
    $employDate=date('d/m/Y',strtotime(str_replace('/', '-', $employmentDate)));

   //get Role

    $fullName=$firstName.' '.$middleName.' '.$lastName;

    $Role=DB::table('users')
             ->where('createdBy',Auth::user()->id)
             ->where('name','=',$fullName)
             ->pluck('role');
        
             
    $Role=$Role[0];

    
    
    $staffcampusName=DB::table('staff_campus')
                  ->where('staff_campus.user_id','=',Auth::user()->id)
                  ->where('staff_campus.staff_id','=',$id)
                  ->join('campus','campus.id','=','staff_campus.campus_id')
                  ->pluck('campusName','campus.id');
                  //->get();


    //setting the Image

   if ($staff_photo==null) {
       $staff_photo='img/Administrator.png';
   }else{
      $staff_photo='images/'.$staff_photo;
   }
   
   //Campus Name
    $campusName=DB::table('campus')
                   ->where('campus.user_id',Auth::user()->id)
                   ->pluck('campusName','id');



     


     

   return view('editStaff',compact('id','staff_code','staff_photo','firstName','middleName','lastName','email','phoneNumber','dofBirth','Address','city','Nationality','country','sex','marriageStatus','employDate','Religion','physicalDefect','active','staffcampusName','Role','campusName'));
 
    }

}
