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
 
 <div class="col-md-12 ">
<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet light bordered">
               <div class="portlet-title table_header">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark "></i>
                        <span class="caption-subject bold uppercase ">Edit Profile</span>
                    </div>                
                </div>
        @if(session()->has('message.level'))
        <div class="alert alert-{{ session('message.level') }}"> 
        {!! session('message.content') !!}
        </div>
        @endif

 <!-- <pre> Specifications</pre> -->
<form class="form-horizontal" action="{{ route('update.candidate_profile') }}" method="post" role="form">
{{ csrf_field() }}
<input type="hidden" name="document_id" value="{{$document->id}}">
<input type="hidden" name="resume" value="{{$resume_id}}">
<!-- <form role="form"> -->
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3">First Name <span class="required"> *</span> </label>
<div class="col-md-8">

<input id="firstname" type="text" class="form-control" name="firstname" value="{{$user->firstname}}" placeholder=" Enter First Name"   required>
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<div class="col-md-6">
<div class="form-group"> 
<label class="control-label col-md-3"> Last Name <span class="required"> *</span></label>
<div class="col-md-8">

<input id="lasttname" type="text" class="form-control" name="lastname" value="{{$user->lastname}}" placeholder=" Enter Last Name"   required>

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->

<!-- <form role="form"> -->
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3"> Date of Birth <span class="required"> *</span></label>
<div class="col-md-8">

<input id="date_of_birth" type="date" value="{{$document->date_of_birth}}" class="form-control" name="date_of_birth" placeholder=" Enter Date of birth" required>

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<div class="col-md-6">
<div class="form-group"> 
<label class="control-label col-md-3">Gender<span class="required"> *</span> </label>
<div class="col-md-8"> 
 <select name="gender" class="form-control"> 
 <option value="{{$document->gender}}" selected="selected">{{$document->gender}}</option>
    <option value="">...select one...</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
</select>
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->

<div class="workhistory_inner several2">
<!-- <form role="form"> -->
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3">Nationality<span class="required"> *</span></label>
<div class="col-md-8">
          <select name="nationality" class="form-control" required="required" >
          <option value="{{$document->nationality}}">@foreach($countries as $country)  @if($country->code === $document->nationality) {{$country->name_en}} @endif @endforeach</option>
          <option value="">...select one...</option>
          @foreach($countries as $country)
          <option value="{{$country->code}}">{{$country->name_en}}</option>
          @endforeach
          </select>

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<div class="col-md-6">
<div class="form-group"> 
<label class="control-label col-md-3">Email<span class="required"> *</span></label>
<div class="col-md-8">
 <input id="email" type="email" value="{{$document->email}}" class="form-control" name="email" placeholder="Enter email" required>

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->
</div>
<div class="workhistory_inner several2">
<!-- <form role="form"> -->
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3">Region<span class="required"> *</span></label>
<div class="col-md-8"> 
<select name="region" class="form-control"  required="required" >
   <option value="{{$document->region_id}}" selected="selected">@foreach($regions as $region) @if($document->region_id == $region->id){{$region->name}}  @endif    @endforeach</option>
        <option value="">...Select Region...</option>
        @foreach($regions as $region)
        <option value="{{$region->id}}">{{$region->name}}</option>
        @endforeach
        </select>  
            @if ($errors->has('region'))
                <span class="help-block">
                    <strong>{{ $errors->first('region') }}</strong>
                </span>
            @endif


</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<div class="col-md-6">
<div class="form-group"> 
<label class="control-label col-md-3">City<span class="required"> *</span> </label>
<div class="col-md-8">
    <select name="location" id="location" class="form-control" required="required" >
     <option value="{{$document->city_id}}" selected="selected">{{$document->city_id}}</option>
           <option value="">...Select City...</option>
   </select> 
                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->
</div>
<div class="workhistory_inner several2">
<!-- <form role="form"> -->
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3">Educational Level <span class="required"> *</span> </label>
<div class="col-md-8">
 
@if($document)
<select name="eucational_level" class="form-control" required>
<option value="{{$document->educational_level}}" selected="selected">@foreach($educationallevels as $educationallevel)  
@if($educationallevel->id == $document->educational_level) {{$educationallevel->name}} @endif @endforeach </option>
  <option value="">...select one...</option>
  @foreach($educationallevels as $educationallevel)
  <option value="{{$educationallevel->id}}">{{$educationallevel->name}}</option>
  @endforeach
</select>
 @endif

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<div class="col-md-6">
<div class="form-group"> 
<label class="control-label col-md-3">Career Level </label>
<div class="col-md-8">

 <select name="career_level" class="form-control" required="required">
 <option value="{{$document->career_level}}" selected="selected">@foreach($job_career_levelList as $job_career_level) @if($job_career_level->id == $document->career_level) {{$job_career_level->name}}  @endif @endforeach</option>
<option value="">Please Select</option>
@foreach($job_career_levelList as $job_career_level)
 <option value="{{$job_career_level->id}}">{{$job_career_level->name}}</option>
@endforeach
 
</select> 

</select>
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->
</div>

<div class="workhistory_inner several2">

<!-- <form role="form"> -->
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3">Minimum Salary: <span class="required"> *</span></label>
<div class="col-md-8">
 <select name="minimum_salary" class="form-control" required > 
 <option value="{{$document->minimum_salary}}"  selected="selected">{{$document->minimum_salary}}</option>
                                                        <option value="">...Select Salary...</option>
                                                          <option value="N50,000-N100,000">N50,000-N100,000</option>
                                                          <option value="N150,000-N250,000">N150,000-N250,000</option>
                                                          <option value="N350,000-N600,000">N350,000-N600,000</option>
                                                          <option value="N750,000-N1,000,000">N750,000-N1,000,000</option>
                                                          <option value="N1,000,000-N5,000,000">N1,000,000-N5,000,000</option>
                                                           <option value="N550,000-N10,000,000">N550,000-N10,000,000</option>
                                                          <option value="N10,000,000-N15,000,000">N10,000,000-N15,000,000</option>
                                                          <option value="15,000,000-Above">N15,000,000-Above</option>  
                                                          </select>   
 
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<div class="col-md-6">
<div class="form-group"> 
<label class="control-label col-md-3">Availability </label>
<div class="col-md-8">

 <select name="availability" class="form-control" >
  <option value="{{$document->availability}}"  selected="selected">{{$document->availability}}</option>
 <option value="">...Select one ...</option>
   <option value="now">Immediate</option>
    <option value="1 week">1 week</option>
    <option value="2 weeks">2 weeks</option>
    <option value="1 month" selected="selected">1 month</option>
    <option value="2 months">2 months</option>
    <!-- <option value="date">Specific date</option> -->
</select>
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->


<!-- <form role="form"> -->
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3"> Employment terms <span class="required">*</span> </label>
<div class="col-md-8">
 <select name="employment_terms" class="form-control" required="required"> 
 <option value="{{$document->d_employment_term}}" selected="selected"> 
 @foreach($employementterms as $employementterm) 
 @if($employementterm->id == $document->d_employment_term) 
 {{$employementterm->name}} 
 @endif  
 @endforeach </option>
<option value="">... Select one ...</option>
  @foreach($employementterms as $employementterm)
<option value="{{$employementterm->id}}">{{$employementterm->name}}</option>
 @endforeach

</select>

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<div class="col-md-6">
<div class="form-group"> 
<label class="control-label col-md-3">Willing to relocate? </label>
<div class="col-md-8"> 
 <select name="relocate" class="form-control" required="required">
<option value="{{$document->relocate_nationaly}}" selected="selected">{{$document->relocate_nationaly}}</option>
 <option value="">... Select one ...</option>
    <option value="YES">YES</option>
    <option value="NO">NO</option> 
</select>
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3"> Contact Address <span class="required">*</span> </label>
<div class="col-md-8">
    <textarea name="full_adress" class="form-control" placeholder="Enter Contact Address" required="required">{{Auth::user()->contact_address}}</textarea>

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<div class="col-md-6">
<div class="form-group"> 
<label class="control-label col-md-3">Phone Number <span class="required">*</span></label>
<div class="col-md-8"> 
 <input type="number" name="phonenumber" value="{{$document->phonenumber}}"  class="form-control"  required="required">
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
</div>


<div class="row"> 
  <div class="col-md-12">
  <div class="form-group"> 
 
 

   
</div>

 </div>
 
</div>

</div>
<!-- 
<pre>Eg. "Marketing Manager, Media, Tokyo", "Bilingual Sales, Airlines, Osaka", <br>"PHP Programmer, Education, California." (Position, industry, location, years of experience, certificates)</pre> -->
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

 @endsection