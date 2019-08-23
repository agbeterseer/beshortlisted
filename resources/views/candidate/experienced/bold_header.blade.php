<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bold Header</title>
    
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
@php($font_color = '#12193f')
<style type="text/css">
    
/*    .leftpad{
        height: 20%;;
        width: 100%;
        padding-left: 10px; 
        text-align: left; 
        font-weight: bold;

    }*/
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

* {
    box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
    float: left;
    width: 50%;
    padding: 10px;
    height: all;
    /*height: 300px;  Should be removed. Only for demonstration */
}
.left {
    width: 35%;
    color: #ffffff;
    font-weight: bold;
    height: auto-fill;
  background-color:{{$font_color}};

}
.center2{
  width: 100%;
  height: 250px;
  display: block;
  overflow: hidden;
  background-color: {{$font_color}}

}

.resume_name{
  font-weight: bold;
  font-size: 25px;
  /*text-align: center;*/
  /*text-align: center;*/
}
.resume_profession{
  font-size: 19px; 
 /*text-align: center;*/
  font-weight: bold;
}
.right {
  width: 65%;
  /*background-color:#cccccc;*/
}
/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .column {
        width: 100%;
    }
}
.topbar{
width:50px;
height:110px;
background-color:#475;
overflow:scroll;
}

    .header_title{
    background-color: #e1e1e1; width: 100%;
    }
        .leftpad{
        height: 20%;
        width: 100%;
        padding-left: 10px;
        text-align: center; 
        font-weight: bold;
        background-color: {{$font_color}};
        color:#ffffff; 
 
    }
table {
    border-collapse: collapse;
    width: 100%;
}
  
th, td {
    padding: 15px;
    text-align: left;
}
</style>
</head>

<body>
    
    <div class="col-md-9">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Bolder Header</span>&nbsp; 
                    </div>
                 <a href="{{url('/templates')}}" class="btn red mt-ladda-btn ladda-button btn-outline"> Close </a>
                   <a href="javascript:window.print();" class="btn red mt-ladda-btn ladda-button btn-outline"> PRINT </a>
                </div>
<div class="portlet-body"> 
 

<div class="center2">
 <span class="space">&nbsp;</span> 
<table>
  <tr>
    <td valign="middle" width="40%" align="right" > 
     <div class="resume_pic" align="right">  
    <img src="{{asset('/uploads/avatars/')}}/{{ $user->avatar }}" class="img-circle" alt="Picture" height="150px;" width="150px;">
</div>
    </td><td valign="bottom" width="60%" align="left">   
    <div class="resume_title"> 
    <strong><span style="font-size: 25px;" class="uppercase">@if($document){{Auth::user()->firstname}} {{Auth::user()->lastname}} @endif</span></strong><br>
    <span class="resume_profession">Software Developer </span></div></td>
  </tr>
</table>  
    </div>
     <span class="space">&nbsp;</span>



 <div class="row"> <div class="col-md-6"> <div class="form-group"> 
<table width="100%" align="center" border="0"> <tr>
<td  class="leftpad">
CAREER OBJECTIVES  
</td></tr></table>
<div class="space">&nbsp;</div> 
<span>   
                        @if($career)
                         {{$career->summary}}
                         @else
                         N/A
                         @endif
                                     
</span></div> </div>
  <div class="col-md-6"> <div class="form-group">
<table width="100%" align="left" border="0"> <tr>
<td  class="leftpad">
EXPERIENCE  
</td></tr></table>
<div class="space">&nbsp;</div> 
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
  <span class="alignleft">{{$work_history->company_name}}</span>
  <span class="alignright">{{ date('M, Y', strtotime($dt)) }} - 
@if($work_history->end_year === null && $work_history->end_month === null && $work_history->present == '1') Present
@elseif($work_history->end_year === null && $work_history->end_month === null && $work_history->present == '2')
Previous
@else
 {{ date('M, Y', strtotime($ddt)) }}  ({{$yer}} year(s) ) @endif</span><br>
</div>

<div style="clear: both;"></div>
<strong>{{$work_history->position_title}} </strong>
 <br>  
           <span style="margin-top: 20px;"> 
                                 <span class="job_description detail highlightable"  >
 {!! $work_history->responsibilities !!}
<br></span> </span></div> 
@endforeach
@else
@endif
</div>
</div>

<div class="row">
<div class="col-md-6"> <div class="form-group"> 
 <table width="100%" align="left" border="0"> <tr>
<td  class="leftpad"> CONTACT </td></tr></table>
<div class="space">&nbsp;</div> 
@if($document)
   <i class="fa fa-envelope-o img-circle" aria-hidden="true"></i> {{Auth::user()->email}} <br>
   <div class="space">&nbsp;</div> 
   <i class="fa fa-phone img-circle" aria-hidden="true" ></i> {{$document->phonenumber}} <br>
   <div class="space">&nbsp;</div> 
    <i class="fa fa-map-marker" aria-hidden="true"></i> {{Auth::user()->contact_address}} 
    <br>
    @else
    @endif
</div></div>
<div class="col-md-6"> <div class="form-group">
@if(!$educationaList->isEmpty()) 
   <table width="100%" align="left" border="0"> <tr>
<td  class="leftpad">
EDUCATION  
</td></tr></table>
<span class="space">&nbsp;</span> 
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
</div></div></div>
          @endforeach
          @else
          @endif
 
<div class="row">
  <div class="col-md-6"> <div class="form-group">
    @if(!$jobskills->isEmpty())
 <table width="100%" align="left" border="0"> <tr>
<td  class="leftpad">
TECHNICAL SKILLS  
</td></tr></table>
<div class="space">&nbsp;</div> 
<div class="skills_inner">
@foreach($jobskills as $jobskill)
  <span style="margin-top: 20px;">  <span class="jellybean">{{$jobskill->job_skill}},&nbsp;</span>      </span>
@endforeach

</div>
 @else
@endif
  </div></div>
   <div class="col-md-6"> <div class="form-group">
 <table width="100%" align="left" border="0"> <tr>
<td  class="leftpad">
HOBBIES 
</td></tr></table>
<div class="space">&nbsp;</div> 
{{$person_info->interest}}, 
</div></div>
</div>


<div class="row">
  <div class="col-md-6"> <div class="form-group">
      @if(!$referee_list->isEmpty()) 
 <table width="100%" align="left" border="0"> <tr>
<td  class="leftpad">
REFERENCE 
</td></tr></table>
<div class="space">&nbsp;</div> 
 @foreach($referee_list as $referee)
     <li><strong> {{$referee->name}}</strong><br>
     {{$referee->position}}<br>
     {{$referee->office_address}}<br>
    <strong> {{$referee->phone_number}} | {{$referee->email}}</strong><br>
     </li></ul>
<div class="space">&nbsp;</div>
 @endforeach 
 @else

 @endif
  </div></div>
   <div class="col-md-6"> <div class="form-group">
 
<div class="space">&nbsp;</div> 
 
</div></div>
</div>
 
 
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
