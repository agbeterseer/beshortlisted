<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resume</title>
    
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
@php($font_color = '#3C658A')
<style type="text/css">
    
    .leftpad{
        height: 20%;;
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
}

/*th, td {
    padding: 8px; 
    border-top: 2px solid #ddd;
    border-bottom: 2px solid #ddd;
    border-color: {{$color_}};
} #2a3aea
*/
.t_label{
  font-weight: bold;
  color:  {{$font_color}};

}
.resume_title{
  height: 100px;
background-color: {{$font_color}};
color: {{$color_}};


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
                        <span class="caption-subject bold uppercase">Resume</span>&nbsp;
                    </div>
                 <a href="{{url('/templates')}}" class="btn red mt-ladda-btn ladda-button btn-outline"> Close </a>
                   <a href="javascript:window.print();" class="btn blue mt-ladda-btn ladda-button btn-outline"> PRINT </a>
                </div>
        <div class="portlet-body"> 

                         <table class="resume_title"> 
                                <tr>
                                <td width="20%" class="t_label" valign="top"><div  align="right" style="padding-bottom: -1290px; padding-left: 10px; position: absolute;">
<div class="resume_pic" align="left">
<img src="{{asset('/uploads/avatars/')}}/{{ $profile_pix->pix }}" alt="Picture" height="150px;" width="150px;">
<!-- <p class="editov2"><a class="edits" ><i class="icon-plus"></i>Edit</a></p> -->
</div>
@if($document)
</div></td> <td width="80%" valign="bottom" align="right"> <strong> <span style="font-size: 25px; padding-right: 10px;" class="uppercase">{{Auth::user()->firstname}} {{Auth::user()->lastname}} </span></strong></td>
                                </tr></table> 

 <br>

                          <div align="right">
                          <strong> {{Auth::user()->contact_address}}</strong><br>
                          <strong>{{$document->phonenumber}} |</strong>{{Auth::user()->email}}<br>
                          </div>
<hr>
@endif
                                            
                          <table> 
                                <tr>
                                <td width="20%" class="t_label" valign="top">CAREER OBJECTIVES </td> <td width="80%"> @if($career)
                         {{$career->summary}}
                         @else
                         NA
                         @endif
                       </td>
                                </tr></table>     
                                       <hr>          
       
                           <table> 
                          <tr>
                          <td width="20%" class="t_label" valign="top">EXPERIENCE </td> <td width="80%">
                             @if(!$work_histories->isEmpty())
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
  <span class="alignleft"><strong>{{$work_history->company_name}}</strong></span>
  <span class="alignright"><strong>{{ date('M, Y', strtotime($dt)) }} - 
@if($work_history->end_year === null && $work_history->end_month === null && $work_history->present == '1') Present
@elseif($work_history->end_year === null && $work_history->end_month === null && $work_history->present == '2')
Previous
@else
 {{ date('M, Y', strtotime($ddt)) }}  ({{$yer}} year(s) ) @endif</strong></span><br>
</div>
 <div style="clear: both;"></div> 
{{$work_history->position_title}}
 <br> 
 <br> 

                          <span style="margin-top: 20px;"> 
                          <span class="job_description detail highlightable" style="font-size: 12px;">
 {!! $work_history->responsibilities !!} 

</span>
@endforeach
@else
@endif
                          </td>
                          </tr></table> 
                  <hr>
                  @if(!$educationaList->isEmpty())
                            <table> 
                            <tr>
                            <td width="20%" class="t_label">EDUCATIONAL QUALIFICATION </td> 

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
                            <td width="80%">{{$educational->school_name}}<br>{{$educational->feild_of_study}}<br>{{ date('M, Y', strtotime($dt)) }} - {{ date('M, Y', strtotime($ddt)) }} </td>
     @endforeach
          @else
          @endif
                            </tr></table>  

<hr>
 <!-- <span class="space">&nbsp;</span> --> 
  @if(!$jobskills->isEmpty())
               <table> <tr>
               <td width="20%" class="t_label">AREA OF INTEREST </td>
              
               <td><div class="skills_inner">
@foreach($jobskills as $jobskill)
  <span style="margin-top: 20px;">  <span class="jellybean">{{$jobskill->job_skill}},&nbsp;</span>      </span>
@endforeach

</div> </td>
                @else
@endif
               </tr></table>  
             <hr>
                 <table><tr>
                      @if($jobcertifications->isEmpty())
                  <td width="20%" class="t_label">TRAINING ATTENDED</td> <td><hr>
     <ul> 
                                @foreach($jobcertifications as $jobcertification)
<li>{{$jobcertification->name}} &nbsp; {{ date('M, Y', strtotime($jobcertification->date_received)) }}</li>
@endforeach
</ul>
  <div class="space">&nbsp;</div></td>
                   @else

@endif   
                </tr></table> 
        @if($person_info)
      @if($person_info->association) 
                  <table> <tr>
                    <td width="20%" class="t_label">ASSOCIATIONS </td><td width="80%">
                      {{$person_info->association}}</td></tr></table>         
        
        @else

        @endif
        @endif


@if(!$referee_list->isEmpty()) 
                  <table> <tr>
                    <td width="20%" class="t_label">REFEREES </td><td width="80%">
 <ul>
 @foreach($referee_list as $referee)
     <li><strong> {{$referee->name}}</strong><br>
     {{$referee->position}}<br>
     {{$referee->office_address}}<br>
    <strong> {{$referee->phone_number}} | {{$referee->email}}</strong><br>
     </li>
<div class="space">&nbsp;</div>
 @endforeach
 </ul>
 @else

 @endif
                  </td></tr></table> 
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
