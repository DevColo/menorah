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
                    <form class="form-horizontal" method="POST" action="{{route('addSubject.store')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('schoolName') ? ' has-error' : '' }}">
                            <label for="subjectName" class="col-md-4 control-label">Subjects Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="subjectName" placeholder="Subjects Name" value="" required autofocus>

                                @if ($errors->has('subjectName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subjectName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            <div class="form-group{{ $errors->has('school_id') ? ' has-error' : '' }}">
                            <label for="school_id" class="col-md-4 control-label">Subject ID</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="chosen-container form-control" name="subject_code" placeholder='' value="No Id" required autofocus>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('applicableClasses[]') ? ' has-error' : '' }}">
                            <label for="" class="col-md-4 control-label">Select Classes</label>
                            <div class="col-md-6">
                                   <select name="applicableClasses[]" id="select" class="form-control" multiple="multiple" style="width: 200px;">
                                    @foreach($class as $keys => $values)
                                    <option value="{!!$keys!!}">{!!$values!!}</option>
                                      @endforeach
                                       </select>
                 


                                @if ($errors->has('applicableClasses[]'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('applicable') }}</strong>
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

                        <!--        <select  multiple="" id="select" >
                     @foreach($class as $keys =>$values)
                            <option value="{!!$keys!!}">{!!$values!!}</option>
                                      @endforeach
                                </select>-->
          
                  

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