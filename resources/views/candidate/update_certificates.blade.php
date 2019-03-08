      
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
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div> 
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div> 
@include('partials.employee_breadcomb') 
    <div class="col-md-8" id="page">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
           
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
  
  <div class="portlet-title">
<div class="pageactionIn pageaction forml" id="work_history_topsection">
<div class="title">
<div class="actions">
<p class="editov2"><a class="delete" href="{{route('delete.certification', $certificate_record->id)}}">Delete</a></p>
</div>
<h3>EDIT CERTIFICATION</h3>
</div>
  </div>
 </div>
<div align="center">
<form class="form-horizontal" action="{{ route('update.certificate') }}" method="post" role="form">
{{ csrf_field() }}
<input type="hidden" name="certificate_id" value="{{$certificate_record->id}}" hidden="hidden"> 
      <div class="form-group{{ $errors->has('certification_name') ? ' has-error' : '' }}">
                            <label for="certification_name" class="col-md-4 control-label">Certification Name</label>

                            <div class="col-md-6">
                                <input id="certification_name" type="text" class="form-control" name="certification_name" value="{{ $certificate_record->name }}" required autofocus>

                                @if ($errors->has('certification_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('certification_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('date_received') ? ' has-error' : '' }}">
                            <label for="date_received" class="col-md-4 control-label">Date Received</label>

                            <div class="col-md-6">
                                <input id="" type="date" class="form-control" name="date_received" value="{{$certificate_record->date_received}}"  required>

                                @if ($errors->has('date_received'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_received') }}</strong>
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
 
@endsection