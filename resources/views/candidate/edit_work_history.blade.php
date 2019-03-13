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

 
   <style type="text/css">
       .cv_content{
        margin-top: -5px;
        margin-bottom: 20px;
       }
       .edits{
        background-image: url(img/005_19.gif);
       }
       .adds{
         background-image: url(img/005_41.gif);
       }

       .several2 {
      margin-top: 11px;
      padding-top: 12px;
      border-top: 1px dotted #cdcdcd;
    }

    input{
        background-color: #ffffff;
    }
    table{
        border-collapse: 0px;
    }

.forml .boxheights {
    overflow: auto;
    padding: 3px 5px 5px;
    resize: vertical;
    border: 1px solid #d7d7d7;
    height: 240px;
}
strong{
  font-weight: bold;
}
#page .pageaction .title {
    background: #f5f5f5;
    border-bottom: 1px solid #d7d7d7;
    padding: 5px 13px;
    position: relative;
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

                        @php 
                        $workhistory = 'work_history';

                        @endphp
                <div class="portlet-title ">

<div class="pageactionIn pageaction forml" id="work_history_topsection">
<div class="title">
<div class="actions">
<p class="editov2"><a class="delete" href="{{route('delete.work', [$work_history->id, 'work_history'])}}">Delete</a></p>
</div>
<h3>Edit Work History</h3>
</div>

                </div>
                </div>


<!-- BEGIN EXAMPLE TABLE PORTLET-->
<!-- <div class="portlet light bordered">
<div class="portlet-body"> -->
 <!-- <pre> Specifications</pre> -->
 
<form class="form-horizontal" action="{{ route('update.work_history') }}" method="post" role="form" name="workform">
{{ csrf_field() }} 
<input type="hidden" name="resume" value="{{$user_single_resume_by_id->id}}">
<input type="hidden" name="work_history" value="{{$work_history->id}}">
   <input type="hidden" value="workhistory" name="work_history">
 <div class="row">
<div class="col-md-6"> 
<div class="form-group"> 
<div class="col-md-8" style="overflow-x:auto;">
<label>From: <span class="required">*</span>  </label> 
<div class="careerfy-three-column-row"> 
<div class="careerfy-profile-select careerfy-three-column">
    <select name="work_from_year" id="from_year" required="required" style="font-size: 16px; color: #000000;">
    <option value="{{$work_history->start_year}}">{{$work_history->start_year}}</option>
    <option value="" >Year</option>
    @foreach($recruityear_list as $recruityear)
    <option value="{{$recruityear->name}}">{{$recruityear->name}}</option>
    @endforeach
    </select>
            </div>
<div class="careerfy-profile-select careerfy-three-column">                                                
<select name="work_from_month" id="work_from_month" required="required" style="font-size: 16px; color: #000000;">
<option value="{{$work_history->start_month}}" selected="selected">{{$work_history->start_month}}</option>
<option value=""">Month</option>
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


<div class="col-md-6">
<div class="form-group"> 
<div class="col-md-8" style="overflow-x:auto;">
<label> To: <span class="required">*</span> </label>
<div class="careerfy-three-column-row"> 
          <div class="careerfy-profile-select careerfy-three-column">
  <select name="end_year" id="end_year"  style="font-size: 16px; color: #000000; display: block;" required="required" >
  <option value="{{$work_history->end_year}}"  selected="selected" >{{$work_history->end_year}}</option>
    <option value="">Year</option>
    @foreach($recruityear_list as $recruityear)
      <option value="{{$recruityear->name}}">{{$recruityear->name}}</option>
      @endforeach
 </select>
<!--    <select name="end_year" id="end_year2" style="font-size: 16px; color: #000000; display: none;"  >
 
    <option value="" >Year</option>
    @foreach($recruityear_list as $recruityear)
      <option value="{{$recruityear->name}}">{{$recruityear->name}}</option>
      @endforeach
 </select> -->
     </div>

<div class="careerfy-profile-select careerfy-three-column">                                            
<select name="end_month" id="end_month" style="font-size: 16px; color: #000000; ">
 <option value="{{$work_history->end_month}}" selected="selected">{{$work_history->end_month}}</option>
<option value=""  >Month</option>
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
<!-- <select name="end_month" id="end_month2" style="font-size: 16px; color: #000000; display: none;">
 
<option value="" selected="selected">Month</option>
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
</select> -->
 </div>
 <label>Present.</label>
 @if($work_history->present === 1)
<input type="checkbox" name="current" value="{{$work_history->present}}" id="present" style="display: block;" checked="checked"> 
@else
<input type="checkbox" name="current" value="1" id="present" style="display: block;"> 
@endif
<input type="checkbox" name="current" value="0" id="present2" hidden="hidden"> 
    </div>
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->

 </div>
<p></p>
 <div class="workhistory_inner several2">
<!-- <form role="form"> -->
<div class="row">
<div class="col-md-6">
<div class="form-group"> 

<div class="col-md-8">
 <label> Position Title <span class="required">*</span></label>  
 
 <input type="text" name="position_title" id="position_title" value="{{$work_history->position_title}}" placeholder="Eg. Software Developer" class="form-control">

<p></p>
 <label>Career Level:<span class="required">*</span> </label> 
 <select name="career_level" class="form-control" id="career_level" required="required">
 <option value="{{$work_history->career_level}}" selected="selected"> @foreach($job_career_levelList as $job_career_level) @if($job_career_level->id === $work_history->career_level) {{$job_career_level->name}} @endif @endforeach</option>
  <option value="" >Please Select</option>
 @foreach($job_career_levelList as $job_career_level)
    <option value="{{$job_career_level->id}}">{{$job_career_level->name}}</option>
    @endforeach

</select> 

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->


<div class="col-md-6">
<div class="form-group"> 
<div class="col-md-8">
 <label> Company Name <span class="required">*</span></label>
 <input type="text" class="form-control" name="company_name" value="{{$work_history->company_name}}" required="required" placeholder="Enter Company Name">
<p></p>

 
<label>Work Location <span class="required">*</span></label>

<select name="country" class="form-control" required="required" >
 <option value="{{$work_history->country}}">@foreach($countries as $country) @if($country->code === $work_history->country) {{$country->name_en}} @endif @endforeach</option>
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
<!-- /.row -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label>Industries <span class="required">*</span> </label>
<div class="col-md-12 pageaction forml">

<div class="boxheights" style="font-size: smaller;">
<ul class="jsize7_2 sizespace2 selectfield">
      
 
     @foreach($work_history->industries as $industry)
<li>
 
 <label>
@if($work_industry_single->industry_id === $industry->id) 
<input type="checkbox" name="work_industries[]" id="work_industries_{{$industry->id}}" value="{{$industry->id}}" checked="checked">{{$industry->name}}  
</label>  
<label>@else
<input type="checkbox" name="work_industries[]" id="work_industries_{{$industry->id}}" value="{{$industry->id}}">
 {{$industry->name}} 
 @endif  </li>
 </label> @endforeach
  
---------------------------
 @foreach($industries as $industry)
<label><input type="checkbox" name="work_industries[]" id="work_industries_{{$industry->id}}" value="{{$industry->id}}">{{$industry->name}}  
</label> 
@endforeach
</ul>
<div class="clear"></div>
</div>
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
<div class="col-md-12 pageaction forml">
 
Functions: <span class="required">*</span>
<div class="boxheights" style="font-size: smaller;">
<ul class="jsize7_2 sizespace2 selectfield">

@foreach($work_history->industryprofessions as $profession) {{$profession->name}}  @endforeach
 @foreach($industries as $industry)

 <li class="group-parent">{{$industry->name}}</li>

 @foreach($industry_profession as $industry_pr) 


 @if($industry->id === $industry_pr->industry_id )
 <li><label class="group_children" for="function-{{$industry_pr->id}}">
<input type="checkbox" id="function-{{$industry_pr->id}}" name="professions_[]" class="group_function_{{$industry_pr->id}}" value="{{$industry_pr->id}}">{{$industry_pr->name}}</label></li>

<!-- @foreach($work_history->industryprofessions as $work_experience_id)    
@if($work_experience_id->id === $industry_pr->id) 
  
 <li><label class="group_children" for="function-{{$industry_pr->id}}">
<input type="checkbox" id="function-{{$industry_pr->id}}" name="professions_[]" class="group_function_{{$industry_pr->id}}" value="{{$industry_pr->id}}" checked="checked">{{$industry_pr->name}}</label></li>


 @endif 
 @endforeach 
 -->

 @endif 

<!-- 

 @if($industry->id === $industry_pr->industry_id ) 

 <li><label class="group_children" for="function-{{$industry_pr->id}}">
<input type="checkbox" id="function-{{$industry_pr->id}}" name="professions_[]" class="group_function_{{$industry_pr->id}}" value="{{$industry_pr->id}}">{{$industry_pr->name}}</label></li> @endif -->

 @endforeach 



@endforeach

 
---------- ---- ----
 </ul>
 

</div>
</div>
</div>
</div>
</div>
  

<!-- </form> -->
 
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label > </label>
<div class="col-md-12">
Responsibilities and Achievements
<p class="textarea"> 
<textarea name="responsibilities" id="summernote_1" class="form-control" >{{$work_history->responsibilities}}</textarea>
<!-- <textarea class="form-control" placeholder="Design and Implementation of Document Management System 
• Analysis and design of database and user interface Unit testing 
• Developing user manuals" name="responsibilities" style="margin-top: 0px; margin-bottom: 0px; height: 130px;"></textarea>  -->
</p>
 
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->

<!-- /.col-md-6 -->
</div>
 
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