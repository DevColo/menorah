@extends('default')

@section('css')
<link rel="stylesheet" type="text/css" href="{!! asset('js/libs/datatables-net/media/css/dataTables.bootstrap4.min.css') !!}">

<link rel="stylesheet" type="text/css" href="{!! asset('js/libs/datatables-net/media/css/dataTables.bootstrap4.css') !!}">

@stop


@section('content1')

@section('title')
{!! $formName!!}
@stop

<meta name="csrf-token" content="{{ csrf_token() }}">

<h1>{!!$formName!!}</h1>
<table class="table table-bordered" id="year-table" width="100%" style="padding:0px;">
        <thead>
            <tr>
                <th width="10%">Id</th>
                <th width="17%">Subject Name</th>
                <th width="13%">Subject Code</th>
                <th width="13%">Class Name</th>
                <th width="13%">Campus Name</th>
                <th width="15%">Status</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
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


$('#year-table').DataTable({
  processing: true,
  serverSide: true,

     ajax: {
            url: '/ViewSubject/data',
            method: 'POST'
        },
 

 columns: [

                    { data: 'id', name: 'id' },
                    { data: 'subjectName', name: 'subjectName' },
                    { data: 'subject_code', name: 'subject_code' },
                    { data: 'className' , name:'className'},
                    { data: 'campusName', name:'campusName'},
                    { data: 'Status', name: 'Status',orderable: false, searchable: false},
                    { data: 'action', name: 'action',orderable: false, searchable: false}

                ],


order: [ [0, 'desc'] ]

               
            });


        </script>
@stop
@stop