<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use DataTables;
use Auth;
use App\AcademicYearModel;

class AcademicYearController extends Controller

{
    //This Controller Create a The Academic Year

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
    	

    $formName='Create  Academics Year';

    return view('createAcademicYear',compact('formName'));
    }

    public function store(Request $request){

     $data=$request->all();

     $uniqueYear=DB::table('yearbook')
                    ->where('user_id',Auth::user()->id)
                    ->where('year',$data['year'])
                    ->pluck('id')->count();

    

     if ($uniqueYear>0) {
     	\Session::flash('msgErr','You have Already Add this Year');
     	return redirect()->back();
     }else{

        //        'year', 'startdate', 'enddate','user_id',

 
     	    $validation = Validator::make($request->all(),[ 
          'year'          =>'numeric|max:2100|min:1800',
           ],[
          'year.required' =>'Academic Year is required',
          'year.numeric'  =>'Sorry Year must be a number',
          'year.min'      =>'Sorry the year must be a valid Year Min',
       
           ]);

          if ($validation->fails()) {
          	\Session::flash('msgErr','Look Like your Input have some Errors');
          	return redirect()->back()->withErrors($validation->errors())->withInput();
          }

          if($data['sYear']===$data['eYear']){
          	\Session::flash('msgErr','It seem like you made a Error Your Academics Year Start Date<br> can not be the same as Your Academics Year End Date');
          	return redirect()->back()->withInput();
          }else{

          	$yearData=array(
             'year'     =>$data['year'],
             'startdate'=>date('Y-m-d', strtotime(str_replace('-', '/', $data['sYear']))),
             'enddate'  =>date('Y-m-d', strtotime(str_replace('-', '/', $data['eYear']))),
             'user_id'  =>Auth::user()->id,
     	    );

            $saveYearData=AcademicYearModel::create($yearData);

            \Session::flash('msg','Academic Year Created Successfully');

            return redirect()->back();

          }


     }
  
    }


    public function show()
    {
      

   $formName='View Academic Year';





    return view('viewAcademicYear',compact('formName'));


    }



    
    public function YearData(){

            $users = DB::table('yearbook')
                     ->where('active', '<>', 3)
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
