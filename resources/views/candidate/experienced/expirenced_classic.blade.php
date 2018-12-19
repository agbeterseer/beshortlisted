<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Candidate Profile Setting</title>
    
    <!-- Css -->
<!--    <link href="{{ asset('recruit/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{ asset('recruit/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{ asset('recruit/css/flaticon.css')}}" rel="stylesheet">
    <link href="{{ asset('recruit/css/slick-slider.css')}}" rel="stylesheet">
    <link href="{{ asset('recruit/plugin-css/fancybox.css')}}" rel="stylesheet">
    <link href="{{ asset('recruit/plugin-css/plugin.css')}}" rel="stylesheet">
    <link href="{{ asset('recruit/css/color.css')}}" rel="stylesheet">
    <link href="{{ asset('recruit/style.css')}}" rel="stylesheet">
    <link href="{{ asset('recruit/css/responsive.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic-ext,vietnamese" rel="stylesheet">
     -->
@include('partials.app_css')


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<style type="text/css">
    
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
}
</style>
</head>

<body>
    
    <div class="col-md-8">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Fresher's Standard Resume</span>
                    </div>
                
                </div>
                <div class="portlet-body"> 
                                        <div class="careerfy-profile-title" align="left">
                                         <br>
                                       <strong> Name: </strong> {{Auth::user()->firstname}} {{Auth::user()->lastname}}<br>
                                        <strong> Address:</strong> {{Auth::user()->contact_address}}.<br>
                                        <strong> Email Address:</strong> {{Auth::user()->email}}<br>
                                        <strong>Phone:</strong> {{$document->phonenumber}}
                                        </div>
                <div class="space">&nbsp;</div>

                                        <div><h4> <strong style="vertical-align: middle;">Career Objectives</strong>.</h4></div>
                                            <hr>
                                              {{$career->summary}}
                                          <!-- EDUCATIONAL QUALIFICATION-->
                    
  <div class="space">&nbsp;</div>
 
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
                                                 <form action="{{route('export_classic_experienced')}}"  method="POST"> 
        <input type="text" name="resume_id" hidden="hidden" value="{{$user_single_resume_by_date->id}}">
        {{csrf_field()}}
        <button  class="btn blue mt-ladda-btn ladda-button btn-outline" >  <i class="fa fa-download"></i>PDF</button>

        </form>           
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    <!-- Wrapper -->
     
    <!-- Wrapper -->

    <!-- ModalLogin Box -->
    
    <!-- Modal Signup Box -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('recruit/script/jquery.js')}}"></script>
    <script src="{{ asset('recruit/script/bootstrap.js')}}"></script>
    <script src="{{ asset('recruit/script/slick-slider.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/counter.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/fancybox.pack.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/isotope.min.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/functions.js')}}"></script>
    <script src="{{ asset('recruit/script/functions.js')}}"></script>

</body>

</html>
