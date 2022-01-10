@extends('default')
@section('css')
<link rel="stylesheet" type="text/css" href="{!! asset('multiselect/chosen.min.css') !!}"  />
@endsection
@section('content1')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: #48525e;color:#a2abb7;">{!!$formName!!}</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('addClass.store')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('className') ? ' has-error' : '' }}">
                            <label for="className" class="col-md-4 control-label">Class Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="className" placeholder="Class Name" value="" required autofocus>

                                @if ($errors->has('className'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('className') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            <div class="form-group{{ $errors->has('class_code') ? ' has-error' : '' }}">
                            <label for="school_id" class="col-md-4 control-label">Class code</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="chosen-container form-control" name="class_code" placeholder='' value="No Id" required autofocus>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('campusName[]') ? ' has-error' : '' }}">
                            <label for="" class="col-md-4 control-label">Select Campus</label>
                            <div class="col-md-6">
                                   <select name="campusName[]" id="select" class="form-control" multiple="multiple" style="width: 200px;">
                                    @foreach($campusName as $keys => $values)
                                    <option value="{!!$keys!!}">{!!$values!!}</option>
                                      @endforeach
                                       </select>
                 


                                @if ($errors->has('campusName[]'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('campusName[]') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                
                          <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-outline green">
                                    Create
                                </button>
                            </div>
                        </div>  

                      </form>
            </div>
                   </div>
                     </div>
                     </div>
                          </div>

                     
          
                  

@endsection

@section('scripts')
<script src="{!! asset('multiselect/jquery-3.4.1.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('multiselect/chosen.jquery.min.js') !!}"></script>
<script type="text/javascript">
$(document).ready(function() {

  $("#select").chosen();
 // $('#subjects').chosen();

});
</script>
@stop