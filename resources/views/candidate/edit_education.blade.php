
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
<style>
  .input_select_style{
font-size: 16px;
color: #000000;
}
.table_header{
  background-color: #F5F5F5;
}
</style>
@section('content')
<div class="space">&nbsp;</div>
@include('partials.employee_breadcomb') 

      <div class="careerfy-main-section careerfy-dashboard-fulltwo">
                <div class="container " id="page" style="" >
            <div class="careerfy-employer-dasboard">
<div class="careerfy-employer-box-section" style="background-color: #FFFFFF;"> 

 
    <div class="col-md-12 " >
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
           
 <div class="portlet light bordered">

                      @if(Session()->has('success'))
                        <div class="alert alert-success"> 
                        {!! Session::get('success') !!}
                        </div>
                        @endif
                       @if(Session()->has('error'))
                        <div class="alert alert-danger"> 
                        {!! Session::get('error') !!}
                        </div>
                        @endif
 

                <div class="portlet-title "> 
<div class="pageactionIn pageaction forml" id="work_history_topsection">
<div class="title">
<div class="actions">
<p class="editov2"><a class="delete" href="{{route('delete.education', $education->id)}}">Delete</a></p>
</div>

</div>
<h4>Edit Education</h4>
                </div>
                </div>



<!--   <div class="portlet-title ">
<div class="pageactionIn pageaction forml" id="work_history_topsection">
<div class="title">
<div class="actions">
<p class="editov2"><a class="delete" href="{{route('delete.education', $education->id)}} ">Delete</a></p>
</div>
<h3>Edit Education</h3>
</div>

                </div>
                </div> -->

<form class="form-horizontal" action="{{ route('update.education') }}" method="post" role="form" name="form2">
          {{ csrf_field() }}
<input type="hidden" name="resume" value="{{$user_single_resume_by_id->id}}" >
<input type="hidden" name="education" value="{{$education->id}} ">
  
<div class="row">
 <div class="col-md-6">
 <label class="control-label col-md-3">Start Date: <span class="required">*</span></label>
<div class="form-group">
<div class="col-md-8">
<div class="careerfy-three-column-row"> 
      <div class="careerfy-profile-select careerfy-three-column">
      <select name="education_start_date" class="form-control" style="font-size: 16px; color: #000000;" required="required" id="education_start_date">
      <option value="{{$education->start_year}}"  selected="selected">{{$education->start_year}}</option>
      <option value="">...Year...</option>
      @foreach($recruityear_list as $recruityear)
      <option value="{{$recruityear->name}}">{{$recruityear->name}}</option>
      @endforeach
      </select>
            </div>
<div class="careerfy-profile-select careerfy-three-column">                                                
<select name="start_month" id="start_month" style="font-size: 16px; color: #000000;">
<option value="{{$education->start_month}}"  selected="selected">{{$education->start_month}}</option>

<option value="">Month</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>
                                       
                </div>

            </div>
   
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->


<div class="col-md-6" >
<div class="form-group"> 
<label class="control-label col-md-3">End Date: <span class="required">*</span> </label>
<div class="col-md-8">
<div class="careerfy-three-column-row"> 
    <div class="careerfy-profile-select careerfy-three-column" >
        <select name="educationend_year" id="educationend_year " style="font-size: 16px; color: #000000;"> 
        <option value="{{$education->end_year}}" selected="selected"  >{{$education->end_year}}</option>
        <option value="" class="input_select_style" >Year</option>
          @foreach($recruityear_list as $recruityear)
      <option value="{{$recruityear->name}}" class="input_select_style">{{$recruityear->name}}</option>
      @endforeach
                </select>
            </div>
<div class="careerfy-profile-select careerfy-three-column">                                                
<select name="end_month" id="end_month" required="required" style="font-size: 16px; color: #000000;">
<option value="{{$education->end_month}}" selected="selected">{{$education->end_month}}</option>
<option value="">Month</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>                      
      </div>
    </div>

</div>
</div>
<!-- /input-group -->
</div>
<p></p>
</div>
 
<!-- <form role="form"> -->
<div class="row">
<div class="col-md-6">
<div class="form-group"> 
<label class="control-label col-md-3">Qualification <span class="required">*</span></label>
<div class="col-md-8">
 
<select name="qualification" class="form-control" id="qualification" required>
<option value="{{$education->qualification}}"> @foreach($qualifications as $qua) @if($qua->id === $education->qualification) {{$qua->qualification}} @endif @endforeach</option>
@foreach($qualifications as $qualify)

<option value="{{$qualify->id}}">{{$qualify->qualification}}</option>
@endforeach
 
   <!-- <option value="Specific Qualification">Specific Qualification</option>       -->
</select>

<p></p>

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->


<div class="col-md-6">
<div class="form-group"> 
<label class="control-label col-md-3">Feild of Study:<span class="required">*</span> </label>
<div class="col-md-8">
 
 <input type="text" class="form-control" name="feild_of_study" value="{{$education->feild_of_study}}" placeholder="Eg. Mathematics / Computer Sc." required>
  
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
<label class="control-label col-md-3">School Name <span class="required">*</span> </label>
<div class="col-md-8">
 
 <input type="text" class="form-control" name="school_name" value="{{$education->school_name}}"  required="required">

</select>

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<div class="col-md-6">
<div class="form-group"> 
<label class="control-label col-md-3">Country <span class="required">*</span></label>
<div class="col-md-8">
 

<select name="country" class="form-control" required="required" >
<option value="{{$education->country}}">@foreach($countries as $coun) @if($coun->code === $education->country) {{$coun->name_en}} @endif @endforeach</option>
@foreach($countries as $country)
 <option value="{{$country->code}}">{{$country->name_en}}</option>
@endforeach
</select>

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
</div>

 
          
    
 </div>
</div>
<div class="modal-footer">
<a href="{{url('/index/resume')}}" class="btn dark btn-outline" data-dismiss="modal">Close</a>
<button type="submit" class="btn green">Save changes</button>
</div>

       
  
 </div>
 </form>

</div>
</div>
</div>
</div>

 @endsection