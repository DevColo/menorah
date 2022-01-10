<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\SchoolClass;
use App\CampusClasses;
use DB;
use Auth;
use Validator;
use DataTables;
use Redirect;



class ClassController extends Controller
{    //
      public function __construct()
    {
        $this->middleware('auth');
    }

    public function createClass(){
        /**
        *This method show the User createClass  page 
        *
        */
     $formName='Create a Class';

     $schoolName=DB::table('school')
                     ->where('user_id',Auth::user()->id)
                     ->pluck('schoolName');
       $schoolName=$schoolName[0];

        /*
         *fetching user created Campuses
         *
         */

        $campusName=DB::table('campus')
                        ->where('user_id',Auth::user()->id)
                        ->pluck('campusName','id');

        
     

    	return view('createClass',compact('formName','schoolName','campusName'));
    }

 
public function store(Request $request){

    /**
     * This method Store user defined Classes with respect to Campuses
     *
     *
     */

    /**
     * Created By George S Mulbah ll
     */

      $data=$request->all();
      


  
     /**
     *  flashing the user Errors inorder to prevent Repeation of Created Data 
     *
     */

       $unique = DB::table('class')
                   ->where('user_id',Auth::user()->id)
                   ->where('className',$data['className'])
                   ->pluck('className')->count();

     





   


   
    $vforClass = Validator::make($request->all(),[
            'className' => 'required|string|min:3|max:255',
        ],[ 
          'className.required'  => 'Required Campus Name',
          'className.min'       => 'Sorry Class Name Required three or more'
       ]);

    if($vforClass->fails()){

       \Session::flash('msgErr',' Your Input has Errors try again' );

return redirect()->back()->withErrors($vforClass->errors())->withInput();


    }else{
       $input=$request->all();
     $value=$input['campusName'];
     
     $value=$value[0];
     intval($value);


      $class_count=DB::table('class')
                    ->join('campus_classes','campus_classes.class_id','=','class.id')
                     ->where('campus_id',$value)
                     ->where('className',$input['className'])->count();

    


    if ($class_count>0) {
       \Session::flash('msgErr','You have Already assign this Class ');
       return redirect()->back()->withInput();
    }

        //declaring Variables
      $user_id=Auth::user()->id;
      
     

     
        

            if($input['class_code']==null|| 'No Id'){
             $flair = (DB::table('class')->count()) +1;
            
             if($flair<=9){
            $class_code="000".$flair; 
            }
            if($flair<=99 && $flair>9){
            $class_code="00".$flair; 
            }
            if($flair>99 && $flair<=999){
            $class_code="0".$flair; 
            }
            if ($flair>999999){
            $class_code=$flair; 
            }
        }else{
          $class_code=$input['class_code'];
        }


            $uniqueSubject=DB::table('class')
                              ->where('user_id',Auth::user()->id)
                              ->where('className',$data['className'])
                              ->count();

            if($uniqueSubject==0){


           $classdata=array(
          'user_id'   =>$user_id,
          'className' =>$input['className'],
          'class_code'=>$class_code,
          'active'    =>1,
        );

         $saveClassdData=SchoolClass::create($classdata);
        

            }
      
        
        $class_id=DB::table('class')
                     ->where('user_id',Auth::user()->id)
                     ->where('className',$input['className'])
                     ->pluck('id');
         //class_id pointer
        $class_id=$class_id[0];

        foreach($input['campusName'] as $key=>$value){

      
          $campusClassesData=array(
            'user_id'  =>$user_id,
            'campus_id'=>$value,
            'class_id' =>$class_id,
          );

          $saveCampusClassesData=CampusClasses::create($campusClassesData);
        }

        

         //dd($saveCampusClassesData);


       //dd($saveClassdData);
          \Session::flash('msg','Class Created Sucessfully' );

         return  Redirect::to('createClass');

          
          
   
}


         


    }

public function show(){

$formName='View Classes ';


  return view('viewClass',compact('formName'));
}


public function anyData(){

   
 $users = DB::table('class')
                     ->where('class.user_id','=',Auth::user()->id)
                     ->join('campus_classes','campus_classes.class_id','=','class.id')
                     ->join('campus','campus.id','=','campus_classes.campus_id')
                     ->get();

 return Datatables::of($users)

           ->addColumn('Status', function ($user) {
              
              if($user->active==1){

              return  '<button class="btn btn-info"><i class="glyphicon glyphicon-edit"></i>Active</button>';

              }else{

            return  '<button class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i>Deactivated</button>';
     
              }

           
            })

           ->addColumn('action', function ($user) {
                return '<a href="ViewClass/show/'.$user->id.'" class="btn btn-success"  style="margin-right:3px;">Edit<i class=" la la-bullseye" style="margin-right:3px;"></i></a>'.'<a href="ViewClass/destroy/'.$user->id.'" class="btn btn-danger" style="margin-right:3px;">Delete<i class="la la-times"></i></a>';
            })


         ->rawColumns(array("action","Status"))

         ->make(true);
}




}
