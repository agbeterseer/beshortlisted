      
@extends('layouts.jobboard', [
  'page_header' => 'Candidates',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' => 'active'
])

@section('content')
<div class="space">&nbsp;</div>
@include('partials.employee_breadcomb') 
      <div class="careerfy-main-section careerfy-dashboard-fulltwo">
                <div class="container " id="page" style="" >
            <div class="careerfy-employer-dasboard">
<div class="careerfy-employer-box-section" style="background-color: #FFFFFF;"> 

    <div class="col-md-12" > 
 <div class="portlet light bordered">

                 @if(session()->has('message.level'))
                        <div class="alert alert-{{ session('message.level') }}"> 
                        {!! session('message.content') !!}
                        </div>
                        @endif
                       @if(Session()->has('error'))
                        <div class="alert alert-danger"> 
                        {!! Session::get('error') !!}
                        </div>
                        @endif
        @if(Session()->has('success'))
                        <div class="alert alert-success"> 
                        {!! Session::get('success') !!}
                        </div>
  <div class="portlet-title">
<div class="pageactionIn pageaction forml" id="work_history_topsection">
<div class="title">
<div class="actions">
<p class="editov2"><a class="delete" href="{{route('delete.referee', $referee->id)}}">Delete</a></p>
</div>
<h3>EDIT REFEREE</h3>
</div>
  </div>
 </div>
<div align="center">
<form class="form-horizontal" action="{{ route('update.referee') }}" method="post" role="form">
{{ csrf_field() }}
<input type="hidden" name="referee_id" value="{{$referee->id}}" hidden="hidden"> 
      <div class="form-group{{ $errors->has('referee_name') ? ' has-error' : '' }}">
                            <label for="referee_name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="referee_name" type="text" class="form-control" name="referee_name" value="{{ $referee->name }}" required autofocus>

                                @if ($errors->has('referee_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('referee_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                            <label for="position" class="col-md-4 control-label">Position</label>

                            <div class="col-md-6">
                                <input id="position" type="text" class="form-control" name="position" value="{{$referee->position}}"  required>

                                @if ($errors->has('position'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                              <div class="form-group{{ $errors->has('office_address') ? ' has-error' : '' }}">
                            <label for="office_address" class="col-md-4 control-label">Office Address</label>

                            <div class="col-md-6">
                                <input id="office_address" type="text" class="form-control" name="office_address" value="{{ $referee->office_address }}" required autofocus>

                                @if ($errors->has('office_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('office_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                            <label for="phone_number" class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="number" class="form-control" name="phone_number" value="{{$referee->phone_number}}"  required>

                                @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 
                        <div class="form-group{{ $errors->has('refereer_email') ? ' has-error' : '' }}">
                            <label for="refereer_email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="refereer_email" type="email" class="form-control" name="refereer_email" value="{{$referee->email}}"  required>

                                @if ($errors->has('refereer_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('refereer_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<!-- END EXAMPLE TABLE PORTLET-->
<div class="modal-footer">
<a href="{{url('/index/resume')}}" class="btn dark btn-outline" data-dismiss="modal">Close</a>
<button type="submit" class="btn green">Save changes</button>
</div>
</form>
</div>
</div>

</div> 

</div>
 </div>
</div>

</div> 
 

@endsection