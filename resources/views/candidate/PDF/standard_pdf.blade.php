<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Standard Resume</title>
 

<style type="text/css">
         body,h1,h2,h3,h4,h5,h6{font-family:"Open Sans",sans-serif};
    .leftpad{
        height: 20%;
        width: 100%;
        padding-left: 10px; 
        font-weight: bold;

    }
    .alignleft {
    float: left;
}
.alignright {
    float: right;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}
hr { 
  
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
    background-color: 
}
</style>
</head>

<body>
    
   <div class="col-md-8">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
      
                <div class="portlet-body"> 
                                        <div class="careerfy-profile-title" align="center">
                                         <br>
                                       <strong>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</strong> <br>
                                        <strong> {{Auth::user()->contact_address}}</strong> <br>
                                        <strong> {{Auth::user()->email}}</strong> <br>
                                        <strong>{{$document->phonenumber}} </strong> 
                                        </div>
                <div class="space">&nbsp;</div>

                                        <div><h4> <strong style="vertical-align: middle;">Career Objectives</strong>.</h4></div>
                                            <hr>
                         {{$career->summary}}
                                          <!-- EDUCATIONAL QUALIFICATION-->
                                              <div class="space">&nbsp;</div>
@if(!$educationaList->isEmpty())
         <div ><h4> <strong style="vertical-align: middle;"> Educational Qualification</strong>.</h4></div>
                                            <hr>
@foreach($educationaList as $educational)

<?php
    $dt->year   = $educational->start_year;
    $dt->month  = $educational->start_month;

    $ddt->year   = $educational->end_year;
    $ddt->month  = $educational->end_month;

    //$dtt->addYear($dt);  
    $yer = $ddt->diffInYears($dt);     
    $weeks = $ddt->diffInWeeks($dt);                  // 62
    $months = $ddt->diffInMonths($dt);  
?>
<div id="textbox">
  <span class="alignleft">{{$educational->school_name}}</span>
  <span class="alignright">{{ date('M, Y', strtotime($dt)) }} - {{ date('M, Y', strtotime($ddt)) }}</span><br>
</div>
<div style="clear: both;"></div>
{{$educational->qualificaiton}} {{$educational->feild_of_study}}
               <div class="space">&nbsp;</div>                                   
          @endforeach
          @else
          @endif
 
 

 @if(!$work_histories->isEmpty())
<div ><h4> <strong style="vertical-align: middle;"> Work Experience</strong>.</h4></div>
<hr> 
  <?php $count = 0; ?>
@foreach($work_histories as $work_history)

<?php 
    $dt->year = $work_history->start_year;
    $dt->month = $work_history->start_month;

    $ddt->year = $work_history->end_year;
    $ddt->month = $work_history->end_month;
  
    $yer = $ddt->diffInYears($dt);     
    // $weeks = $ddt->diffInWeeks($dt);                  // 62
    $months = $ddt->diffInMonths($dt);    
?>      
 <span class="space">&nbsp;</span>
 <div id="textbox">
  <span class="alignleft"> <strong>{{$work_history->company_name}}</strong></span>
  <span class="alignright"> {{ date('M, Y', strtotime($dt)) }} - 
@if($work_history->end_year === null && $work_history->end_month === null && $work_history->present == '1') Present
@elseif($work_history->end_year === null && $work_history->end_month === null && $work_history->present == '2')
Previous
@else
 {{ date('M, Y', strtotime($ddt)) }}  ({{$yer}} year(s) ) @endif</span><br>
</div>

<div style="clear: both;"></div>
Sotfware Developer
 <br> 
 <br> 
 <strong>Description:</strong>
  <span style="margin-top: 20px;">  {!! $work_history->responsibilities !!} </span>

@endforeach
@else
@endif


                             <div class="space">&nbsp;</div>
                                     @if(!$jobskills->isEmpty())
                              
<h4> <strong style="vertical-align: middle;"> Area of Interest</strong>.</h4>
<hr>
                     
<div class="skills_inner">
@foreach($jobskills as $jobskill)
  <span style="margin-top: 20px;">  <span class="jellybean">{{$jobskill->job_skill}},&nbsp;</span>      </span>
@endforeach

</div>
 @else
@endif
 
   <div class="space">&nbsp;</div>
 @if($person_info)
      @if($person_info->association) 
            <h4><strong> ASSOCIATIONS </strong>  </h4> 
        {{$person_info->association}}
        @else

        @endif
        <p></p>
          @if($jobcertifications->isEmpty())
 
<h4> <strong style="vertical-align: middle;"> Training Attended</strong>.</h4>
<hr>
     <ul> 
                                @foreach($jobcertifications as $jobcertification)
<li>{{$jobcertification->name}} &nbsp; {{ date('M, Y', strtotime($jobcertification->date_received)) }}</li>
@endforeach
</ul>
  <div class="space">&nbsp;</div>
 @else

@endif   
   <h4> <strong style="vertical-align: middle;"> Hobbies</strong>.</h4>
<hr>                  
 
{{$person_info->interest}}, &nbsp;

  <div class="space">&nbsp;</div>
@else

@endif 


@if(!$referee_list->isEmpty()) 
    <h4> <strong style="vertical-align: middle;"> Referees</strong>.</h4>
<hr>                    
   
 <ul>
 @foreach($referee_list as $referee)
     <li><strong> {{$referee->name}}</strong><br>
     {{$referee->position}}</br>
     {{$referee->office_address}}<br>
    <strong> {{$referee->phone_number}} | {{$referee->email}}</strong><br>
     </li>
<div class="space">&nbsp;</div>
 @endforeach
 </ul>
 @else

 @endif

        
                                    
                </div>

  
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    <!-- Wrapper -->
     
    <!-- Wrapper -->

    <!-- ModalLogin Box -->
    
    <!-- Modal Signup Box -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 

</body>

</html>
