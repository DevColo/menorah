@extends('default')

@section('css')
<link rel="stylesheet" type="text/css" href="{!! asset('js/libs/datatables-net/media/css/dataTables.bootstrap4.min.css') !!}">

<link rel="stylesheet" type="text/css" href="{!! asset('js/libs/datatables-net/media/css/dataTables.bootstrap4.css') !!}">

@stop


@section('content1')



<meta name="csrf-token" content="{{ csrf_token() }}">

<h1>{!!$formName!!}</h1>
<table class="table table-bordered" id="users-table" width="100%" style="padding:0px;">
        <thead>
            <tr>
                
                <th width="10%">Image</th>
                <th width="8%">First Name</th>
                <th width="5%">Middle Name</th>
                <th width="10%">last Name</th>
                <th width="1%">Student Code</th>
                <th width="8%">Class Name</th>
                <th width="5%">Campus Name</th>
                <th width="12%">Status</th>
                <th width="40%">Action</th>
            </tr>
        </thead>
    </table>
    <style type="text/css">
        .text-center{
            text-align: center;
        }
    </style>

@section('title')

@stop

@section('scripts')
<script src="{!! asset('js/libs/datatables-net/media/js/jquery.dataTables.min.js') !!}"></script>

<script src="{!! asset('js/libs/datatables-net/media/js/dataTables.bootstrap4.min.js') !!}"></script>

<script src="{!! asset('js/libs/datatables-net/media/js/dataTables.bootstrap4.js') !!}"></
</script>
 <script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


$('#users-table').DataTable({
  processing: true,
  serverSide: true,

     ajax: {
            url: '/ViewStudent/data',
            method: 'POST'
        },
 

 columns: [

                   // { data: 'id',          name: 'id' },
                    { data: 'student_photo',   name: 'student_photo' ,
                      render:function(data,type,full,meta){
                        if(data==null){
                            return "<img  width='70' src={{URL::asset('img/Student.png')}} />";
                        }else{

                            return "<img width='70' src={{URL::to('/')}}/images/"+data+"/>";
                        }
                      }
                     },
                    { data: 'firstName',   name: 'firstName' },
                    { data: 'middleName',  name:'middleName'},
                    { data: 'lastName'  ,  name: 'lastName'},
                    { data: 'student_code',name: 'student_code'},
                    { data: 'className',   name: 'className'},
                    { data: 'campusName',  name: 'campusName'},
                    { data: 'Status',      name: 'Status',orderable: false, searchable: false},
                    { data: 'action', name: 'action',orderable: false, searchable: false}

                ],

                columnDefs: [
  {
      "targets": 0, // your case first column
      "className": "text-center",
      "width": "4%"
 },
 {
      "targets": 2,
      "className": "text-right",
 }],


//order: [ [0, 'desc'] ]

               
            });


        </script>
@stop
@stop