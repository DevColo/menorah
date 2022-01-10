@extends('default')

@section('content1')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: #48525e;color:#a2abb7;">{!!$formName!!}</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('addYear.store')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('schoolName') ? ' has-error' : '' }}">
                            <label for="year" class="col-md-4 control-label">Academic Year:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="year" placeholder="YYYY"  required autofocus>
                                 <span class="help-block"> Provide Academic Year </span>

                                @if ($errors->has('year'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                               <div class="form-group{{ $errors->has('schoolName') ? ' has-error' : '' }}">
                            <label for="syear" class="col-md-4 control-label">Academic Year Start Date:</label>

                            <div class="col-md-6">
                             <input class="form-control" id="mask_date2" type="text"  name="sYear"  required=""  />
                             <span class="help-block"> Provide the start date of academics year </span>

                                @if ($errors->has('sYear'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('sYear') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('schoolName') ? ' has-error' : '' }}">
                            <label for="eYear" class="col-md-4 control-label">Academic Year End  Date:</label>

                            <div class="col-md-6">
                              <input class="form-control" id="mask_date" name="eYear" type="text" required=""  />
                            <span class="help-block" > Provide the start date of academics year </span>

                                @if ($errors->has('eYear'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('eYear') }}</strong>
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

 <script src="{!!('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js')!!}" type="text/javascript"></script>

          <script src="{!!('assets/pages/scripts/form-input-mask.min.js')!!}" type="text/javascript"></script>

@endsection
