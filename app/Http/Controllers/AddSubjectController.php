<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\SchoolSujects;
use App\ClassSubject;
use DB;
use Auth;
use Validator;
use Redirect;
use DataTables;

class AddSubjectController extends Controller
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
   

    public function createSubject(){
        /**
        *This method show the User the page 
        *
        */
      $formName='Create a Class';

      $school_id=DB::table('school')
                     ->where('user_id',Auth::user()->id)
                     ->pluck('id');

      $school_id=$school_id[0];
 

        /*
         *fetching user created Classes
         *
         */

      $class=DB::table('class')
                        ->where('user_id',Auth::user()->id)
                        ->pluck('className','id');

       
        
      //$schoolName=$schoolName[0];

      return view('createSubject',compact('formName','class'));
    }

   public function store(Request $request){

     $data=$request->all();

     // $uniqueSubject =DB::table('subjects')
     //               ->where('user_id',Auth::user()->id)
     //               ->where('subjectName',$data['subjectName'])
     //               ->pluck('subjectName')->count();

     $value=$data['applicableClasses'];

     
     $value=$value[0];

     $value=intval($value);



     $subject_count=DB::table('subjects')
                    ->join('class_subjects','class_subjects.subject_id','=','subjects.id')
                     ->where('class_id',$value)
                     ->where('subjectName',$data['subjectName'])->count();

                    

    //Show This Errors if the User Input a already Create Class

    if ($subject_count>0) {
       \Session::flash('msgErr','You have already Created This Subject' );

       return redirect()->back()->withInput();
    }else{
        
        $vforSubjects = Validator::make($request->all(),[
            'subjectName' => 'required|string|min:3|max:255|',
        ],[ 
          'subjectName.required'  => 'Required Campus Name',
          'subjectName.unique'    => 'Sorry This Campus already Exist',
          'subjectName.min'       => 'Sorry Class Name Required three or more'
       ]);

      if ($vforSubjects->fails()) {
        
        return redirect()->back()->withErrors($vforSubjects->errors())->withInput();
      }else{
         
         //declaring Variable
         $user_id=Auth::user()->id;
         $data=$request->all();

          if($data['subject_code']==null||'NO ID'){
             $flair = (DB::table('subjects')->count()) +1;
            }else{
                $staff_id=$data['subject_code'];
            }
             if($flair<=9){
            
            $subject_code="00".$flair; 
            }
            if($flair<=99 && $flair>9){
            $subject_code="00".$flair; 
            }
            if($flair>99 && $flair<=999){
            $subject_code="0".$flair; 
            }
            if ($flair>999999){
            $subject_code=$flair; 
            }

            $uniqueSubject=DB::table('subjects')
                              ->where('user_id',Auth::user()->id)
                              ->where('subjectName',$data['subjectName'])
                              ->count();

            if($uniqueSubject==0){

          $subjectData=array(
          'user_id'     =>$user_id,
          'subjectName' =>$data['subjectName'],
          'subject_code'=>$subject_code,
          'active'      =>1,
        );

          

       
          //Save that User Created Subject Data
          $saveSubjectData=SchoolSujects::create($subjectData);
            }
             $subjectName =$data['subjectName'];
      

            //check for the subject Id
          $subject_id = DB::table('subjects')
                           ->where('user_id',Auth::user()->id)
                           ->where('subjectName',$subjectName)
                           ->pluck('id');

          $subject_id=$subject_id[0];

        

          //Store Applicable Classes Value as key that point to the Value
          foreach($data['applicableClasses'] as $key =>$value) {
            
             $classesSubjectData=array(
            'user_id'  =>$user_id,
            'class_id' =>$value,
            'subject_id' =>$subject_id,
              );



           $saveclassesSubjectData=ClassSubject::create($classesSubjectData);

          }
               \Session::flash('msg','Subject Created Sucessfully' );

         return  Redirect::to('createSubject');

        
        
      }

    }

      //Validates 
    

   }

   public function show(){
    $formName='View Subject';
    
        // $users=DB::table('campus')
        //   ->join('campus_classes','campus_classes.campus_id','=','campus.id')
        //   ->join('class','class.id','=','campus_classes.class_id')
        //   ->join('class_subjects','class_subjects.class_id','=','class.id')
        //   ->join('subjects','subjects.id','=','class_subjects.subject_id')
        //   ->get();  
        //   dd($users); 
    return view('viewSubject',compact('formName'));
   }


   

    
 public function anyData(){

            // $users = DB::table('subjects')
            //          ->where('subjects.user_id','=',Auth::user()->id)
            //           ->join('class_subjects','class_subjects.subject_id','=','subjects.id')
            //          ->join('class','class.id','=','class_subjects.class_id')
            //          ->join('campus_classes','campus_classes.class_id','=','class.id')
            //          ->join('campus','campus.id','=','campus_classes.campus_id')
            //          ->get();

     //return DataTables::of($this->query())->make(true);

       $users=DB::table('campus')
          ->where('campus.user_id','=',Auth::user()->id)
          ->join('campus_classes','campus_classes.campus_id','=','campus.id')
          ->join('class','class.id','=','campus_classes.class_id')
          ->join('class_subjects','class_subjects.class_id','=','class.id')
          ->join('subjects','subjects.id','=','class_subjects.subject_id')
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
                return '<a href="ViewAcademic/show/'.$user->id.'" class="btn btn-success"  style="margin-right:3px;">Edit<i class=" la la-bullseye" style="margin-right:3px;"></i></a>'.'<a href="ViewAcademic/destroy/'.$user->id.'" class="btn btn-danger" style="margin-right:3px;">Delete<i class="la la-times"></i></a>';
            })


         ->rawColumns(array("action","Status"))

         ->make(true);
    }



}


