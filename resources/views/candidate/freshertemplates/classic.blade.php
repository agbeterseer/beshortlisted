<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Classic</title>
    
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
    body{
        color: #000000;
    }
    .header_title{
    background-color: #e1e1e1; width: 100%;
    }
        .leftpad{
        height: 20%;
        width: 100%;
        padding-left: 10px; 
        background-color: #e1e1e1; text-align: left; 
        font-weight: bold; 


    }
 
table {
    border-collapse: collapse;
    width: 100%;
}
  
th, td {
    padding: 5px;
    text-align: left;
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
                        <span class="caption-subject bold uppercase">Resume</span>
                    </div>
                 <a href="{{url('/templates')}}" class="btn red mt-ladda-btn ladda-button btn-outline"> Close </a>
                  <a href="javascript:window.print();" class="btn blue mt-ladda-btn ladda-button btn-outline"> PRINT </a>
                </div>
                <div class="portlet-body">
 
                                        <div class="careerfy-profile-title">
 
 
 @if($document)
 <table width="100%" align="left" border="0"> 
 <tr>
 <td style="height: 20px;"><strong> Name: </strong> </td> <td>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</td>
 </tr>
  <tr>
 <td><strong> Address:</strong></td> <td>{{Auth::user()->contact_address}}</td>
 </tr>
  <tr>
 <td><strong> Email Address:</strong></td> <td> {{Auth::user()->email}} </td>
 </tr>
  <tr>
 <td><strong>Phone:</strong></td> <td>{{$document->phonenumber}} </td>
 </tr>
 </table>  
@endif
                                        </div>
 

                                                <div class="space">&nbsp;</div>
                                              <div class="careerfy-profile-title" >
 <table width="100%" align="left" border="0"> <tr>
                                <td  class="leftpad">
                                CAREER OBJECTIVES  
                                </td></tr></table>   
@if($career)
                               {{$career->summary}}
                               @endif
    <div class="space">&nbsp;</div>
                                              <div class="careerfy-profile-title">
                                               
                                              <div class="careerfy-profile-title" >
                                                   <table width="100%" align="left" border="0"> <tr>
                                <td  class="leftpad"> 
                                EDUCATIONAL QUALIFICATION
                                </td></tr></table>   



                                                    <table width="100%" border="1"> 
                                                        <tr>
                                                            <th>Qualification/ Course</th>
                                                            <th>Institutions</th>
                                                            <th>Duration</th>
                                                           <!--  <th>Grade</th>  -->
                                                        </tr>

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
                                                        <tr>
                                                            <td>{{$educational->qualificaiton}} {{$educational->feild_of_study}}</td>
                                                            <td>{{$educational->school_name}}</td>
                                                            <td>{{ date('M, Y', strtotime($dt)) }} - {{ date('M, Y', strtotime($ddt)) }}</td>
                                                            <!-- <td>3.5</td> -->

                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        @endif
                                                    </table>
                                              </div>
 
                                       <!--     <div class="leftpad"><h4> <strong style="vertical-align: middle;">Area of Interest</strong>.</h4> </div> -->
                                            <div class="space">&nbsp;</div>
        @if(!$jobskills->isEmpty())
                                 <table width="100%" align="left" border="0"> <tr>
                                <td class="leftpad"> 
                                AREA OF INTEREST
                                </td></tr></table> 

<div class="skills_inner">
@foreach($jobskills as $jobskill)
 <span class="jellybean">{{$jobskill->job_skill}},&nbsp;</span> 
@endforeach

</div>
 @else
 @endif

     <div class="space">&nbsp;</div>
     @if($person_info)
      @if($person_info->association)
            <table width="100%" align="left" border="0"> 

                <tr>
                                <td class="leftpad"> 
                                ASSOCIATIONS
                                </td></tr></table> 

        {{$person_info->association}}
        @else

        @endif
        <p></p>
          @if($jobcertifications->isEmpty())
 <table width="100%" align="left" border="0"> <tr>
                                <td class="leftpad"> 
                                TRAINING ATTENDED
                                </td></tr></table> 
                                <ul>
                              
                                @foreach($jobcertifications as $jobcertification)
<li>{{$jobcertification->name}} &nbsp; {{ date('M, Y', strtotime($jobcertification->date_received)) }}</li>
@endforeach
</ul>
  <div class="space">&nbsp;</div>
 @else

@endif   
                               
      <!--                            <table width="100%" align="left" border="0"> <tr>
                                <td class="leftpad"> 
                                WORKSHOP ATTENDED
                                </td></tr></table> 
 <ul> 
<li> Prfoesional workshop of Programmers </li>
<li>Prfoesional workshop Interpersonal Skills.</li>
<li>Prfoesional workshop on AutoCAD, Surfer, Arc GIS, Microsoft</li>
 
 
</ul> -->
 
 <table width="100%" align="left" border="0"> <tr>
                                <td class="leftpad"> 
                                HOBBIES
                                </td></tr></table> 
<br>
{{$person_info->interest}}, &nbsp;

  <div class="space">&nbsp;</div>
@else

@endif

<!-- 
 <table width="100%" align="left" border="0"> <tr>
                                <td class="leftpad"> 
                                PERSONAL INFORMATION
                                </td></tr></table> 
 <ul> 
<li> Good listener with internal locus of control</li>
<li>Interpersonal Skills.</li>
<li>Good computer skills with knowledge of various applications and office packages
 like. AutoCAD, Surfer, Arc GIS, Microsoft</li>
 <li>office, Corel Draw, Land desktop etc.</li>
<li> Strategic planner and tactical execution of projects.</li>
<li> Ability to separate facts from opinion.</li>
<li> Knowledge of market trend and effective team player.</li>
 </ul> -->

@if(!$referee_list->isEmpty())
 <table width="100%" align="left" border="0"> <tr>
                                <td class="leftpad"> 
                                REFEREES
                      
                                </td></tr></table> 
 
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
<div class="space">&nbsp;</div>
                  
</div>
<!-- 
    <div class="careerfy-blog-grid-text" align="center">
    <div class="careerfy-blog-tag"> <a href="#"> </a> </div>
    <a href="{{route('export_classic')}}" class="btn blue mt-ladda-btn ladda-button btn-outline">Generate</a>
    </div>
 -->

  <!--       <form action="{{route('export_classic')}}"  method="POST"> 
        <input type="text" name="resume_id" hidden="hidden" value="{{$user_single_resume_by_date->id}}">
        {{csrf_field()}}
        <button  class="btn blue mt-ladda-btn ladda-button btn-outline" >  <i class="fa fa-download"></i>PDF</button>

        </form> -->

            </div>

            <!-- END EXAMPLE TABLE PORTLET-->
        </div>


    </div>
    <!-- Wrapper -->

    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->


</body>

</html>
