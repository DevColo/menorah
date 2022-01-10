@extends('default')

@section('content1')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: #48525e;color:#a2abb7;">{!!$formName!!}</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('addCampus.store')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('schoolName') ? ' has-error' : '' }}">
                            <label for="schoolName" class="col-md-4 control-label">Campus Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="campusName" placeholder="Campus Name" value="{{ old('campusName') }}" required autofocus>

                                @if ($errors->has('campusName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('campusName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            <div class="form-group{{ $errors->has('campus_code') ? ' has-error' : '' }}">
                            <label for="schoolName" class="col-md-4 control-label">Campus ID</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="campus_code" placeholder='' value="No Id" required autofocus>
                            </div>
                        </div>
                            <div class="form-group{{ $errors->has('schoolName') ? ' has-error' : '' }}">
                            <label for="schoolName" class="col-md-4 control-label">Select School</label>

                            <div class="col-md-6">
                                   <select name="schoolName" class="form-control">
                                    <option>{!!$schoolinfo!!}</option>
                                
                                       </select>
                 


                                @if ($errors->has('schoolName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('schoolName') }}</strong>
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
