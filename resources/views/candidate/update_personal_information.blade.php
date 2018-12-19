      
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
<style type="text/css">
  .textarea{
     background-color: #F5F5F5;
    resize: vertical;
margin-top: 0px; 
margin-bottom: 0px; 
height: 92px;
}
</style>
       <div class="careerfy-main-section careerfy-dashboard-fulltwo">
                <div class="container " id="page" style="" >
            <div class="careerfy-employer-dasboard">
<div class="careerfy-employer-box-section" style="background-color: #FFFFFF;"> 

 <div class="col-md-12 ">
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
                <div class="portlet-title ">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark "></i>
                        <span class="caption-subject bold ">EDIT PERSONAL INFORMATION</span>
                    </div>                
                </div>

<form class="form-horizontal" action="{{ route('personal.information') }}" method="post" role="form">
{{ csrf_field() }}
<!-- <form role="form"> -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-12">
Interests <span class="required">*</span>
<textarea class="form-control textarea" placeholder="" name="interest" required="required" style="margin-top: 0px; margin-bottom: 0px; height: 100px; ">{{$person_info->interest}}</textarea>  
<p></p>
 <pre>Eg. Photography, Marathon, Yoga, Rock Climbing, Football, Fishing, Snowboard, Investment etc.</pre>
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->

<!-- <form role="form"> -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-12">
Associations <span class="required">*</span>
<textarea class="form-control textarea" placeholder="" name="associations" required="required" style="margin-top: 0px; margin-bottom: 0px; height: 100px; ">{{$person_info->association}}</textarea> 
 
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->

<!-- <form role="form"> -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-12">
Awards <span class="required">*</span>
<textarea class="form-control textarea" placeholder="" name="award" required="required" style="margin-top: 0px; margin-bottom: 0px; height: 100px; ">{{$person_info->award}}</textarea> 

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<!-- /.col-md-6 -->
</div>

<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-12">
Trainings <span class="required">*</span>
<textarea class="form-control textarea" placeholder="" name="training" required="required" style="margin-top: 0px; margin-bottom: 0px; height: 100px; ">{{$person_info->training}}</textarea> 

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->
<!-- <form role="form"> -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-12">
Personal page <span class="required">*</span>
<input type="text" name="personal_page" class="form-control" value="{{$person_info->personal_page}}" placeholder="Eg. http://linkedin/profile-page">
 
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->
<!-- END EXAMPLE TABLE PORTLET-->
</div>
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
@endsection