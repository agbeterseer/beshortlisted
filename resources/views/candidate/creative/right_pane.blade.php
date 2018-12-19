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
@php($color_ = 'white')
@php($font_color = '#4d9eea')
@php($inner_color = '#1e2c72')
@php($stat_color = '#12193f')
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
    width: 60%;
    color: #ffffff;
    font-weight: bold;
    /*height: auto-fill;*/
  background-color:{{$font_color}};
  .inner{
    background-color:{{$font_color}};
  }

}

.resume_name{
  font-weight: bold;
  font-size: 25px;
  /*text-align: center;*/
  text-align: center;
}
.resume_profession{
  font-size: 19px; 
 text-align: center;
  font-weight: bold;
}
.right {

    color: #ffffff;
    font-weight: bold;
    /*height: auto-fill;*/
  background-color:{{$font_color}};

  /*background-color:#cccccc;*/
}
  .inner{
    background-color:{{$inner_color}};
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

.circle-icon {
    color:#ffffff;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    text-align: center;
    line-height: 100px;
    vertical-align: center;
    padding: 10px;
    background-color:{{$font_color}};
}
.icon-background {
    color: #c0ffc0;
}
.progress_bg{

 background-color: #cccccc;
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
                        <span class="caption-subject bold uppercase"> Fresher's Resume</span>
                    </div>
                
                </div>


        <div class="portlet-body">  
        <div class="row">
          <div class="col-md-7">
            <div class="from-group">
   <div> <h4> <strong style="vertical-align: middle;">  <i class="fa fa-briefcase circle-icon" aria-hidden="true" ></i> EXPERIENCE</strong>.</h4></div>
<hr> 
<!--  <i class="fa fa-times-circle pull-right fa-2x" style="background: radial-gradient(white 50%, transparent 50%); color: red;" aria-hidden="true"></i> -->
         
  <strong> Panet Technologies</strong>.<br>
   <strong>Sotfware Developer</strong> <br>  
   2009-2014 <br>

 <span style="margin-top: 20px;"> 
      <span class="job_description detail highlightable">
Duties: Design and Implementation of Document Management System
<ul> 
<li> Analysis and design of database and user interface Unit testing </li>
<li> Developing user manuals</li>
<li> Study and analyze the Rhizome operations, processes and procedures to determine the best database design</li>
<li> Deploying on AWS cloud hosting</li>
</ul>
<span class="space">&nbsp;</span><br>

Duties: Design and Implementation of Human Resource Management System
<ul> 
<li>Study and analyze the Rhizome operations, processes and procedures to determine the best database design </li>
 <li>Unit testing</li>
 <li>Developed user manuals</li>
 <li>Deploying application on Aws cloud hosting </li>
 <li>Setting up all application servers</li>
  </ul>
  <label>Security: </label> 
  <ul>
 <li>Conducted Pentest on both platforms</li>
 <li>Protected Queries from SQL injection</li>
 <li>Conduct software validation for Human Resource Management System platform</li>
 <li>Securing connection with OpenSSL</li>
 <li>Conduct software validation on database platform</li>
</ul>
<br></span>
                                 </span>                                      
<div class="space">&nbsp;</div>
<div><h4> <strong style="vertical-align: middle;"><i class="fa fa-graduation-cap circle-icon" aria-hidden="true"></i> EDUCATION</strong>.</h4></div>
                       <ul>
  <li>   
  University Of Agriculture Makurdi <br> 
<strong>BSC. Mathematics / Computer Sci</strong><br>
 2009-2014. <br>
</li>
  <div class="space">&nbsp;</div>
<li> 
   University Of Agriculture Makurdi <br> 
<strong> BSC. Mathematics / Computer Sci</strong><br>
   2009-2014. <br>
</li>
<div class="space">&nbsp;</div>
 <li> 
   University Of Agriculture Makurdi <br> 
<strong> BSC. Mathematics / Computer Sci</strong><br>
   2009-2014. <br>
</li>
<div class="space">&nbsp;</div>
<li> 
   University Of Agriculture Makurdi <br> 
<strong> BSC. Mathematics / Computer Sci</strong><br>
   2009-2014. <br>
</li>
<div class="space">&nbsp;</div>
<li> 
   University Of Agriculture Makurdi <br> 
<strong> BSC. Mathematics / Computer Sci</strong><br>
   2009-2014. <br>
</li>
<div class="space">&nbsp;</div>
</ul>
<div class="space">&nbsp;</div>
<h4> <strong style="vertical-align: middle;"> <i class="fa fa-gear circle-icon" aria-hidden="true" ></i> 
Training ATTENDED</strong>.</h4>
<ul>
  <li>Conducted Pentest on both platforms</li>
  <li>Protected Queries from SQL injection</li>
  <li>Conduct software validation for Human Resource Management System platform </li>
  <li>Securing connection with OpenSSL</li>
  <li>Conduct software validation on database platform</li>
</ul>

    <div class="space">&nbsp;</div>
<h4> <strong style="vertical-align: middle;"> <i class="fa fa-wrench circle-icon" aria-hidden="true" ></i>
WORKSHOP ATTENDED</strong></h4>
<ul>
  <li>Conducted Pentest on both platforms</li>
  <li>Protected Queries from SQL injection</li>
  <li>Conduct software validation for Human Resource Management System platform </li>
  <li>Securing connection with OpenSSL</li>
  <li>Conduct software validation on database platform</li>
</ul>


    </div>
 </div>
  <div class="col-md-3 right">
     <div class="from-group"> 
     <div  align="center" class="inner" >
     <span class="space">&nbsp;</span> 
    <div class="resume_pic" align="center">
    <img src="{{asset('/img/terseer.jpg')}}" class="img-circle" alt="Picture" height="180px;" width="150px;"> 
    </div>
    <span class="uppercase resume_name">Terseer Agbe </span> <br>
  <span class="resume_profession">Software Developer </span><br>
    </div>
    <div>
    </div>
    <!-- <p>Some text..</p>  fa fa-phone-->
     <div class="space">&nbsp;</div>
     <div class="space">&nbsp;</div>  
   <i class="fa fa-envelope-o" aria-hidden="true"></i> agbe.terseer@gmail.com <br>
   <div class="space">&nbsp;</div> 
   <i class="fa fa-phone img-circle" aria-hidden="true" ></i> 07030355396 <br>
   <div class="space">&nbsp;</div> 
<i class="fa fa-map-marker" aria-hidden="true"></i> Flat 100A Block B NIA Quarters Karu-Site Abuja, Nigeria. <br>
   
    <div class="space">&nbsp;</div> 
   <div align="center">  <i class="fa fa fa-rocket" aria-hidden="true"></i>  TECHNICAL SKILL.</div><br>
    <div class="space">&nbsp;</div>  
    
<div class="progress progress_bg" >

  <div class="progress-bar progress-bar-success" role="progressbar"  style="width: 10%; " aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"><span style="color: #ffffff;">Java(10%)</span></div>
</div>

<div class="progress progress_bg">
  <div class="progress-bar progress-bar-info" role="progressbar" style="width: 25%; " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span style="color: #ffffff;">Javascript(25%)</span></div>
</div>
 
<div class="progress progress_bg">
  <div class="progress-bar" role="progressbar" style="width: 50%; background-color: {{$stat_color}};" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><span style="color: #ffffff;">Cloud hosting(50%)</span></div>
</div>

<div class="progress progress_bg">
  <div class="progress-bar " role="progressbar" style="width: 75%; background-color: {{$stat_color}};" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><span style="color: #ffffff;">Springboot(75%)</span></div>
</div>
<div class="progress progress_bg">
  <div class="progress-bar" role="progressbar" style="width: 100%; background-color: {{$stat_color}};" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><span style="color: #ffffff;">Hibernate(100%)</span></div>
</div>
      <div class="space" style="padding-bottom: 10%;">&nbsp;</div>
  <div class="space">&nbsp;</div>
 <strong style="vertical-align: middle;"> <i class="fa fa-book img-circle" aria-hidden="true" ></i> AREA OF INTEREST</strong>. 
<ul>
  <li>API</li>
  <li>Distributed Computing</li>
  <li>Robotics</li>
  <li>Natural Language Processing</li>
  <li>Augmented reality</li>
</ul>

 

            </div>
          </div>



        </div>

<!-- <div class="row">
  <div class="column left" > 
 
  </div>
  <div class="column right" >

  </div>
</div> -->

                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    <!-- Wrapper -->
     
    <!-- Wrapper -->

    <!-- ModalLogin Box -->
    
    <!-- Modal Signup Box -->




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('css/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('css/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('css/assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('css/assets/global/plugins/counterup/jquery.waypoints.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('css/assets/global/plugins/counterup/jquery.counterup.min.js') }}" type="text/javascript"</script>
<script src="{{ asset('css/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('css/assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<!--         <script src="{{ asset('css/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script> -->
         <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
<!--         <script src="{{ asset('css/assets/global/plugins/moment.min.js') }}" type="text/javascript"></script> -->
<!--         <script src="{{ asset('css/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}" type="text/javascript"></script> -->
         <script src="{{ asset('css/assets/global/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('css/assets/global/plugins/morris/raphael-min.js') }}" type="text/javascript"></script>
<!--         <script src="{{ asset('css/assets/global/pluginsw/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script> -->
        <script src="{{ asset('css/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js') }}" type="text/javascript"></script>
         
        <script src="{{ asset('css/assets/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
      <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
         
            <script src="{{ asset('css/assets/global/scripts/datatable.js') }}" type="text/javascript"></script>

          <script src="{{ asset('css/assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>

       <script src="{{ asset('css/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->

        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ asset('css/assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('css/assets/pages/scripts/table-datatables-managed.min.js') }}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
         <script src="{{ asset('css/assets/pages/scripts/dashboard.min.js') }}" type="text/javascript"></script>
         <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
         <script src="{{ asset('css/assets/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('css/assets/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('css/assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('css/assets/layouts/global/scripts/quick-nav.min.js') }}" type="text/javascript"></script>
</body>

</html>
