<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stylish Red</title>
    
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
        background-color: #e1e1e1; text-align: left; 
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


</style>
</head>

<body>
    
    <div class="col-md-8">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Stylish Red &nbsp;</span>
                    </div>
                 <a href="{{url('/templates')}}" class="btn red mt-ladda-btn ladda-button btn-outline"> Close </a>
                  <a href="javascript:window.print();" class="btn blue mt-ladda-btn ladda-button btn-outline"> PRINT </a>
                </div>
                <div class="portlet-body"> 
                                      @if($document)
                                        <div class="careerfy-profile-title" align="center">
 
                                       <strong> <span style="font-size: 25px;" class="uppercase">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</span></strong> <br>
                                        <strong>{{Auth::user()->contact_address}}</strong><br>
                                        <strong>{{$document->phonenumber}}|</strong> {{Auth::user()->email}}<br>

                                        </div>
                                        @endif
<div class="space">&nbsp;</div>
                                            
                                <table width="100%" align="left" border="0"> <tr>
                                <td  class="leftpad"> 
                                              CAREER OBJECTIVES
                                </td></tr></table>     
                                        
                          <!--               <div class="leftpad"><h4> <strong style="vertical-align: middle;">Career Objectives</strong>.</h4></div> -->

                                            @if($career)
                                              {{$career->summary}}
                                              @else
                                              N/A
                                            @endif
                                          
                                              <div class="space">&nbsp;</div>
                                           
                             <table width="100%" align="left" border="0"> <tr>
                                <td  class="leftpad"> 
                                EDUCATIONAL QUALIFICATION
                                </td></tr></table>     
                                <div class="space">&nbsp;</div>  
                                @if(!$educationaList->isEmpty())
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
          @endforeach
          @else
          @endif

<div class="space">&nbsp;</div>
 @if(!$work_histories->isEmpty())
<table width="100%" align="left" border="0"> <tr>
<td  class="leftpad">  EXPERIENCE
</td></tr></table>
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
                <br>
                <br>
 <span class="space">&nbsp;</span>
 <div id="textbox">
  <span class="alignleft">{{$work_history->company_name}}</span>
  <span class="alignright">{{ date('M, Y', strtotime($dt)) }} - 
@if($work_history->end_year === null && $work_history->end_month === null && $work_history->present == '1') Present
@elseif($work_history->end_year === null && $work_history->end_month === null && $work_history->present == '2')
Previous
@else
 {{ date('M, Y', strtotime($ddt)) }}  ({{$yer}} year(s) ) @endif</span><br>
</div>

<div style="clear: both;"></div>
{{$work_history->position_title}}
 <br>  
           <span style="margin-top: 20px;"> 
                                 <span class="job_description detail highlightable" style="font-size: 12px;">
{!! $work_history->responsibilities !!}
</span>
                                 </span>

@endforeach
@else
@endif


                             <div class="space">&nbsp;</div>
                             @if(!$jobskills->isEmpty())
                                 <table width="100%" align="left" border="0"> <tr>
                                <td  class="leftpad"> 
                                AREA OF INTEREST
                                </td></tr></table> 
                                <br>
                                 <p> </p>       
                                 <span style="margin-top: 20px;">
                            <div class="skills_inner">
@foreach($jobskills as $jobskill)
  <span style="margin-top: 20px;">  <span class="jellybean">{{$jobskill->job_skill}},&nbsp;</span>      </span>
@endforeach

</div>
 @else
@endif
                                 </span>
                                 <div class="space">&nbsp;</div>
@if($jobcertifications->isEmpty())
                                <table width="100%" align="left" border="0"> <tr>
                                <td style="" class="leftpad">   
                           
                                TRAINING ATTENDED
                                </td></tr></table> 
                                <br>
                                
                                 <ul> 
                                @foreach($jobcertifications as $jobcertification)
<li>{{$jobcertification->name}} &nbsp; {{ date('M, Y', strtotime($jobcertification->date_received)) }}</li>
@endforeach
</ul>
  <div class="space">&nbsp;</div>
 @else

@endif  
                                      <div class="space">&nbsp;</div>
                                <table width="100%" align="left" border="0"> <tr>
                                <td class="leftpad">
                               HOBBIES
                                </td></tr></table>     
                                        
                                        <br>
                          {{$person_info->interest}},
        
                                        <div class="space">&nbsp;</div>
 
@if(!$referee_list->isEmpty())  
                   <table width="100%" align="left" border="0"> <tr>
                                <td class="leftpad">
                               REFEREES
                                </td></tr></table>
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
