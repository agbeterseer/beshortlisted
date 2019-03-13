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
       td {
    height: 50px;
    vertical-align: middle;
}
th, td {
    padding: 15px;
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
                        <span class="caption-subject bold uppercase"> TabularResume</span>
                    </div>
                 <a href="{{url('/templates')}}" class="btn red mt-ladda-btn ladda-button btn-outline"> Close </a>
                  <a href="javascript:window.print();" class="btn blue mt-ladda-btn ladda-button btn-outline"> PRINT </a>
                </div>
<div class="portlet-body">
@if($document)
<div class="careerfy-profile-title"> 
<br>

<strong> Name: </strong>{{Auth::user()->firstname}} {{Auth::user()->lastname}}<br>
<strong> Address:</strong>{{Auth::user()->contact_address}}
<br>
<strong> Email Address:</strong> {{Auth::user()->email}} <br>
<strong>Phone:</strong> {{$document->phonenumber}}
</div>
@endif
<hr>

 
 <h4> <strong>CAREER OBJECTIVES</strong>.</h4> 
@if($career) 
{{$career->summary}}
@endif

  <div class="careerfy-profile-title" >
    <h4><strong> EDUCATIONAL QUALIFICATION</strong></h4>
        <table width="100%" border="1"> 
            <tr>
                <th>Qualification/ Course</th>
                <th>Institutions</th>
                <th>Duration</th>
                <!-- <th>Grade</th>  -->
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
        @if(!$jobskills->isEmpty())
                              
                       <h4><strong>AREA OF INTEREST</strong></h4>
                            

<div class="skills_inner">
@foreach($jobskills as $jobskill)
 <span class="jellybean">{{$jobskill->job_skill}},&nbsp;</span> 
@endforeach

</div>
 @else
@endif
 @if($person_info)
      @if($person_info->association) 
            <h4><strong> ASSOCIATIONS </strong>  </h4> 
        {{$person_info->association}}
        @else

        @endif
        <p></p>
          @if($jobcertifications->isEmpty())
 
  <h4><strong> TRAINING ATTENDED</strong>  </h4> 
     <ul> 
                                @foreach($jobcertifications as $jobcertification)
<li>{{$jobcertification->name}} &nbsp; {{ date('M, Y', strtotime($jobcertification->date_received)) }}</li>
@endforeach
</ul>
  <div class="space">&nbsp;</div>
 @else

@endif   
   
     <h4><strong>  HOBBIES </strong>  </h4>                     
<br>
{{$person_info->interest}}, &nbsp;

  <div class="space">&nbsp;</div>
@else

@endif 


@if(!$referee_list->isEmpty())
 
                              <h4><strong>   REFEREES</strong>  </h4>  
                      
   
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

 <!--        <form action="{{route('export_tabular')}}"  method="POST"> 
        <input type="text" name="resume_id" hidden="hidden" value="{{$user_single_resume_by_date->id}}">
        {{csrf_field()}}
        <button  class="btn blue mt-ladda-btn ladda-button btn-outline" >  <i class="fa fa-download"></i>PDF</button>

        </form> -->
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    <!-- Wrapper -->
    
        <!-- Main Content -->
        
 
        <!-- Footer -->

    </div>
    <!-- Wrapper -->

    
 

</body>

</html>
