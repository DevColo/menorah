<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use App\Campus;
use Auth;
use Validator;
use DataTables;

class CampusController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

     public function createCampus(){

     $formName='Create Your Campus';
     
     $user_id=Auth::user()->id;

    

     $id=DB::table('school')
            ->where('user_id',$user_id)
            ->pluck('id');

     $id=$id[0];

     

    

     $schoolinfo= DB::table('school')
                     ->where('user_id',$user_id)
                     ->pluck('schoolName','id');
     
     $schoolinfo=$schoolinfo[$id]; 

    

     return view('createCampus',compact('formName','schoolinfo'));
    }

    public function store(Request $request){
     
        $campusData= $request->all();

        $uniqueCampus= DB::table('campus')->where('user_id', Auth::user()->id)->where('campusName', $campusData['campusName'])->pluck('campusName')->count();
        if ($uniqueCampus>0) {
            \Session::flash('msgErr','You have already created this campus');
            return redirect()->back();
        }
     $vforCampus= Validator::make($request->all(),[
        'campusName' => 'required|string|max:255',
        ],[
       'campusName.required'=>'Required School Name',
       'campusName.unique'  =>'Campus Name already Exist',
     ]);

    if($vforCampus->fails()){
        
       \Session::flash('msgErr',' Your Input has Errors try again' );
        return redirect()->back()->withErrors($vforCampus->errors())->withInput();
     }
     else{

        $data=$request->all();



        

        if($data['campus_code']==null||'No ID'){
            $flair = (DB::table('campus')->count()) +1;
        
        if($flair<=9){
            $campus_code="000".$flair; 
        }
        if($flair<=99 && $flair>9){
            $campus_code="00".$flair; 
        }
        if($flair>99 && $flair<=999){
            $campus_code="0".$flair; 
        }
        if ($flair>999999){
            $campus_code=$flair; 
        }

       }else{
        $campus_code=$data['campus_code'];
       }
       $user_id = Auth::user()->id;
       $school_id=DB::table('school')->where('user_id',$user_id)->pluck('id');
       $school_id=$school_id[0];
      
       //'user_id','school_id','campusName','campus_id',
       $campusData=array(
       'user_id'   =>$user_id,
       'school_id' =>$school_id,
       'campusName'=>$data['campusName'],
       'campus_code' =>$campus_code,

       );

       $saveCampusData=Campus::create($campusData);
      // dd($saveCampusData);
         //$saveCampusData=DB::table('campus')->insert($campusData);

       \Session::flash('msg','Campus Created Sucessfully' );

       return Redirect::to('createCampus');

       
    }
}


    public function show()
    {
      

   $formName='View Academic Year';





    return view('viewCampus',compact('formName'));


    }
public function anyData(){

            $users = DB::table('campus')
                     ->where('active', '<>', 2)
                     ->where('user_id',Auth::user()->id)
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
