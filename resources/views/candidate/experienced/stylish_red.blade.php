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
@php($color_ = 'white')
@php($font_color = '#fc4b37')
<style type="text/css">
    
    .leftpad{
        height: 20%;
        width: 100%;
        padding-left: 10px; 
        text-align: left; 
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
    /*border: {{$color_}};*/
}

th, td {
    padding: 8px; /*
    border-top: 2px solid #ddd;
    border-bottom: 2px solid #ddd;*/
    /*border-color: {{$font_color}};*/
}

.resume_title{
font-weight: bold;
color: {{$font_color}};

}
.resume_profession{
  font-size: 14px; 
 text-align: center;

  font-weight: bold;
}

.center2{
  width: 100%;
  height: 100px;
  display: block;
  overflow: hidden;
  color: #ffffff;
  background-color: {{$font_color}};
  table{
    border-color: {{$font_color}};
  }


}
.triangle {
width: 0;
height: 0;
border-style: solid;
border-width: 100px 100px 0 100px;
border-color: #fc4b37 transparent transparent transparent;
margin-left: 20px;
margin-top: -45px;
padding-bottom: -123px;
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
                   <a href="javascript:window.print();" class="btn red mt-ladda-btn ladda-button btn-outline"> PRINT </a>
                </div>
                <div class="portlet-body">  
                   @if($document)
                            <table class="center2"> 
                                <tr>
                                <td width="50%" class="t_label" valign="middle">             
                          <div align="left">
                          <strong> <span style="font-size: 25px;" class="uppercase">{{Auth::user()->firstname}} {{Auth::user()->lastname}} </span></strong> <br>
                           <span class="resume_profession" >{{$user_single_resume_by_date->pr_caption}}</span><br>
               
                          </div> </td> 
                      <td width="50%" valign="middle"  align="right"> 
                                <div class="space">&nbsp;</div>
                                <strong> <div style="padding-right: 10px;"> 
                           {{Auth::user()->contact_address}} <br>
                          {{$document->phonenumber}} | {{Auth::user()->email}}<br></strong>  
                           </td>  </tr></table> @endif
                                 </div>
<div class="triangle"></div>
 <br>        
                          <table> 
                                <tr>
                                <td width="20%" class="resume_title" valign="top">CAREER OBJECTIVES </td> <td width="80%">  @if($career)
                                              {{$career->summary}}
                                              @else
                                              N/A
                                            @endif</td>
                                </tr></table>      
 <hr>
 @if(!$work_histories->isEmpty())
                           <table> 
                          <tr>
                          <td width="20%" valign="top" class="resume_title">EXPERIENCE </td> <td width="80%">
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
<strong>{{$work_history->position_title}}</strong>
 <br>  
           <span style="margin-top: 20px;"> 
         <span class="job_description detail highlightable"  >
 {!! $work_history->responsibilities !!}
<br></span>
                                 </span>    
                          </td>
                          </tr></table> 
@endforeach
@else
@endif

                          <hr style="   margin-top: -6px;
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;">
     @if(!$educationaList->isEmpty())
                            <table> 
                            <tr>
                            <td width="20%" class="resume_title" valign="top">EDUCATIONAL QUALIFICATION </td> 
                            <td width="80%">
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
<ul>
  <li>  <div id="textbox">
  <span class="alignleft">{{$educational->school_name}}</span>
  <span class="alignright">{{ date('M, Y', strtotime($dt)) }} - {{ date('M, Y', strtotime($ddt)) }}</span><br>
</div>
<div style="clear: both;"></div>
<strong>{{$educational->qualificaiton}} {{$educational->feild_of_study}}</strong></li>
          @endforeach
          @else
          @endif
 <div class="space">&nbsp;</div>

</ul> 

                            </td>
                            </tr></table>  
                            <hr style="   margin-top: -6px;
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;">

  
<!-- <div class="space">&nbsp;</div> -->

   
 <!-- <span class="space">&nbsp;</span> --> 
  @if(!$jobskills->isEmpty())
               <table> <tr>
               <td width="20%" class="resume_title" valign="top">AREA OF INTEREST </td>
               <td>                            <div class="skills_inner">
@foreach($jobskills as $jobskill)
  <span style="margin-top: 20px;">  <span class="jellybean">{{$jobskill->job_skill}},&nbsp;</span>      </span>
@endforeach

</div>
 @else
@endif </td>
               </tr></table>  
               @if($jobcertifications->isEmpty())
                 <table><tr>
                  <td width="20%" class="resume_title" valign="top">TRAINING ATTENDED</td> <td>                                 <<ul> 
                                @foreach($jobcertifications as $jobcertification)
<li>{{$jobcertification->name}} &nbsp; {{ date('M, Y', strtotime($jobcertification->date_received)) }}</li>
@endforeach
</ul>
  <div class="space">&nbsp;</div>
 @else

@endif </td></tr></table> 
       
                  <table > <tr>
                    <td width="20%" class="resume_title" valign="top">HOBBIES </td><td>  {{$person_info->interest}},</td></tr></table>

                    <hr style="   margin-top: -6px;
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;">
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
