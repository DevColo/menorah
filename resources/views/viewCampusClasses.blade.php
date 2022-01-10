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
<table class="table table-bordered" id="users-table" width="100%" style="padding:0px;">
        <thead>
            <tr>
                <th width="13%">Class Name</th>
                <th width="13%">Class Code</th>
                <th width="8%">Status</th>
                <th width="17%">Action</th>
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


$('#users-table').DataTable({
  processing: true,
  serverSide: true,

     ajax: {
            url: '/ViewClass/data',
            method: 'POST'
        },
 

 columns: [

                    { data: 'className',   name: 'className'  },
                    { data: 'class_code',  name: 'class_code' },
                    { data: 'Status',      name: 'Status',orderable: false, searchable: false},
                    { data: 'action', name: 'action',orderable: false, searchable: false}

                ],




               
            });


        </script>
@stop
@stop