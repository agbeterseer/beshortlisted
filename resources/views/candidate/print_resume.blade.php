@extends('layouts.jobboard', [
  'page_header' => 'Candidates',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' => '',
  'resume_' => 'active'
])

@section('content')
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div> 
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div> 
@include('partials.employee_breadcomb')
      <div class="careerfy-main-section careerfy-dashboard-fulltwo">
                <div class="container " id="page" style="" >
            <div class="careerfy-employer-dasboard">
<div class="careerfy-employer-box-section" style="background-color: #FFFFFF;"> 


        <div class="col-md-8 col-md-offset-2">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Resume</span>
                    </div>
                
                </div>
                <div class="portlet-body"> 
                                        <div class="resume_title" align="center">
                                       <strong> <span style="font-size: 25px;" class="uppercase">{{Auth::user()->firstname}} {{Auth::user()->lastname}} </span></strong> <br>
                                  <strong>  Flat 100A Block B NIA Quarters Karu-Site Abuja, Nigeria.</strong><br>
                                        <strong>07030355396 | </strong>{{$document->email}}<br>
                                        </div>
                                        <div class="space">&nbsp;</div>

@if($document)
<div class="col-md-12 ">  
<div class="" id="user_profile"> 
 <div class="pageactionIn">
 <div class="title4">
<span class="progressbar">
<span style="width: 40%;"><span></span></span>
</span>
  
</div>

 <div class="overviewtitle2">
<span class="ovtitle"><strong>Age</strong></span>
<span class="detail highlightable">{{$document->age}}</span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle"><strong>Date of Birth</strong></span>
<span class="detail highlightable">{{ date('M d, Y', strtotime($document->date_of_birth)) }}  </span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle"><strong>Gender</strong></span>
<span class="detail highlightable"> {{$document->gender}} </span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle"><strong> Nationality</strong></span>
<span class="detail highlightable">  @foreach($countries as $country)  @if($country->code === $document->nationality) {{$country->name_en}} @endif @endforeach</span>
</div>



 <div class="overviewtitle2">
<span class="ovtitle"><strong>Willing to relocate:</strong></span>
<span class="detail highlightable">{{$document->relocate_nationaly}}   </span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle"><strong>Educational Level:</strong></span>
<span class="detail highlightable">

@foreach($educationallevels as $educationallevel)  
@if($educationallevel->id == $document->educational_level) {{$educationallevel->name}} @endif @endforeach</span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle"><strong>Career Level:</strong></span>
<span class="detail highlightable"> @foreach($job_career_levelList as $job_career_level) @if($job_career_level->id == $document->career_level) {{$job_career_level->name}}  @endif @endforeach </span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle"><strong> Minimum Salary:</strong></span>
<span class="detail highlightable">{{$document->minimum_salary}} / Year</span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle"><strong>Availability:</strong></span>
<span class="detail highlightable"> {{$document->availability}}</span>
</div> 
 </div> 
</div>
</div>
@else

@endif
<div class="space">&nbsp;</div>
                                            
                @if($career)
<div class="col-md-12 " >

<div class="pageactionIn" id="education_topsection">
<div class="title4">
 
<h4> Career Objectives</h4>
<hr>
</div>
{{$career->summary}}
 </div>
 
</div>
@else

@endif                                
                                              
<div class="space">&nbsp;</div>

@if(!$educationaList->isEmpty())

<div class="col-md-12 cv_content">
<div class="" id=" ">
<div class="title4">
 

<h4>Education History </h4>
<hr>
</div>
@foreach($educationaList as $educational)

<?php
    $dt->year   = $educational->start_year;
    $dt->month  = $educational->start_month;

    $ddt->year   = $educational->end_year;
    $ddt->month  = $educational->end_month;

    //$dtt->addYear($dt);  
    $yer = $ddt->diffInYears($dt);     
    $weeks = $ddt->diffInWeeks($dt);                
    $months = $ddt->diffInMonths($dt);  
?>
<div class="education_inner several2">
 
<div class="overviewtitle2">
<span class="ovtitle">Degree</span>
<span class="detail">{{$educational->qualificaiton}}<strong> {{$educational->feild_of_study}}</strong></span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Graduation period</span>
<span class="highlightable">{{ date('M, Y', strtotime($dt)) }} - {{ date('M, Y', strtotime($ddt)) }}  ( {{$yer}} years, )</span>
 
</div>

<div class="overviewtitle2">
<span class="ovtitle">School</span>
<span class="highlightable">
{{$educational->school_name}}
 </span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Country</span>
<span class="highlightable"> @foreach($countries as $country)  @if($country->code === $educational->country) {{$country->name_en}} @endif @endforeach </span>
</div>

</div>
 <div class="space">&nbsp;</div>
@endforeach
</div>
</div>


@else

@endif
<div class="space">&nbsp;</div>
@if(!$work_histories->isEmpty())
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="work_history_topsection">
<div class="title4">
 
<h4>Work History</h4>
  <hr>
</div>
<?php $count = 0; ?>
@foreach($work_histories as $work_history)

<?php 
    $dt->year = $work_history->start_year;
    $dt->month = $work_history->start_month;

    $ddt->year = $work_history->end_year;
    $ddt->month = $work_history->end_month;
  
    $yer = $ddt->diffInYears($dt);     
   
    $months = $ddt->diffInMonths($dt);    
?>
<div class="workhistory_inner several2">  
<div class="overviewtitle2">
<span class="ovtitle">Position Title</span>
<span class="highlightable"><strong> {{$work_history->position_title}}  </strong></span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Employment period</span>
<span class="highlightable"> {{ date('M, Y', strtotime($dt)) }} - 
@if($work_history->end_year === null && $work_history->end_month === null && $work_history->present == '1') Present
@elseif($work_history->end_year === null && $work_history->end_month === null && $work_history->present == '2')
Previous
@else
 {{ date('M, Y', strtotime($ddt)) }}  ({{$yer}} year(s) ) @endif</span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Company</span>
<span class="highlightable">{{$work_history->company_name}}</span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Country</span>
<span class="highlightable"> @foreach($countries as $country) @if($work_history->country === $country->code) {{$country->name_en}} @endif @endforeach</span>
</div>


<div class="overviewtitle2">
<span class="ovtitle">Industry</span>
<span class="highlightable"> @foreach($work_history->industries as $industry) {{$industry->name}}  @endforeach</span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Position Type</span>
<span class="highlightable">@foreach($work_history->industryprofessions as $profession) {{$profession->name}}  @endforeach </span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Position Description</span>
<span class="job_description detail highlightable">
 {!! $work_history->responsibilities !!} </span>
</div>
</div>
@endforeach
</div>
</div>

@else

@endif

<div class="space">&nbsp;</div>
@if(!$jobcertifications->isEmpty())

<div class="col-md-12">
  <h4>Certification</h4>
  <hr>
@foreach($jobcertifications as $jobcertification)
<div class="">
  
<div class="overviewtitle2">
<span class="ovtitle">Certification Name</span>
<span class="highlightable"><strong> {{$jobcertification->name}} </strong></span>
</div>
<div class="overviewtitle2">
<span class="ovtitle">Date Received</span>
<span class="highlightable">{{ date('M, Y', strtotime($jobcertification->date_received)) }}</span>
</div>

</div>
@endforeach
 
</div>
@else

@endif
 


@if($person_info)
<div class="col-md-12 cv_content" >
<div class="pageactionIn" id="additional_information_topsection">
<div class="title4">
<p class="editov2"><a class="edits" href="{{route('update.pinformation', $person_info->id)}}">Edit</a></p>
<h4>Personal Information</h4>
 <hr>
</div>

<div class="overviewtitle2 overviewtype3 several2">
<span class="ovtitle">Interests</span>
<div class="highlightable">{{$person_info->interest}}</div>
</div>

<div class="overviewtitle2 overviewtype3 several2">
<span class="ovtitle">Associations</span>
<div class="highlightable">{{$person_info->association}} </div>
</div>

<div class="overviewtitle2 overviewtype3 several2">
<span class="ovtitle">Awards</span>
<div class="highlightable"> None {{$person_info->award}} </div>
</div>

<div class="overviewtitle2 overviewtype3 several2">
<span class="ovtitle">Personal page</span>
<span class="highlightable"><a class="breakword" href="https://www.linkedin.com/in/terseer-agbe-61287677/" rel="external">{{$person_info->personal_page}}</a></span>
</div>

</div>
 </div>
 @else

@endif
 
        <div class="space">&nbsp;</div>
 
                                    
                 </div>
                </div>
              <!-- END EXAMPLE TABLE PORTLET-->
              </div>



         </div>
      </div>
    </div>
</div>


 @endsection