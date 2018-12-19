<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Candidate Profile Setting</title>
<!--      <link href="{{ asset('css/assets/global/plugins/jqvmap/jqvmap/jqvmap.css')}}" rel="stylesheet" type="text/css" /> -->
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif] # fc4b37-->
@php($color_ = 'white')
@php($font_color = '#0990f7')
<style type="text/css">
     .leftpad{
        height: 40px;
        width: 100%;
        padding-left: 10px;
        text-align: center; 
        font-weight: bold;
        background-color: {{$font_color}};
        color:#ffffff; 
 
    }
    
/*    .leftpad{
        height: 20%;
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
 
/* Create two equal columns that floats next to each other */
.column {
    float: left;
    width: 50%;
    padding: 10px;
    height: all;
    /*height: 300px;  Should be removed. Only for demonstration */
}
.left {
    width: 25%;
    color: #ffffff;
    font-weight: bold;
    height: auto-fill;
  background-color:{{$font_color}};
  .inner{
    background-color:{{$font_color}};
  }

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
 .resume_name{
  font-weight: bold;
  font-size: 25px;
  /*text-align: center;*/
  text-align: center;
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
  /*height: 70%;*/

  color: #ffffff;
  background-color: {{$font_color}};
  table{
    border-color: {{$font_color}};
  }


}
 

table {
    border-collapse: collapse;
    width: 100%;
}
  
/*th, td {
    padding: 15px;
    text-align: left;
}*/
 .resume_label{
  color: {{$font_color}};
}
 
  
 #halfCircle {

     height:45px;
     width:90px;
     border-radius: 90px 90px 0 0;
     background:green;
}

</style>
@include('partials.app_css')
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
           
    <table  width="100%"> <tr>
    <td  class="t_label " valign="middle"   colspan="2" width="100%">  
    <table class="center2" style="background-color: {{$font_color}}"><tr><td width="50%" align="right">  
    <div class="resume_pic">
    <div class="space">&nbsp;</div> 
    <img src="{{asset('/img/terseer.jpg')}}" class="img-circle" alt="Picture" height="180px;" width="150px;"> 
   
    </div>
       <div style=" "> <span class="uppercase resume_name">Terseer Agbe </span><br>
      <span class="resume_profession" >Software Developer </span><br></div>
       </td><td align="right" width="50%">  </td></tr></table>
                          </td></tr></table> 
 <br>
  
 <i class="top"></i>
 <div class="resume_label"> <h4>  <strong style="vertical-align: middle;">  CAREER OBJECTIVES </strong>.</h4></div>
<div class="space">&nbsp;</div> 
<span>   
 Nulla bibendum commodo rhoncus. Sed mattis magna nunc, ac varius quam pharetra vitae. Praesent vitae ipsum eu magna pretium aliquam. Curabitur interdum quis velit non tincidunt. Donec pretium gravida erat, a faucibus velit egestas eget. Nulla bibendum commodo rhoncus. Sed mattis magna nunc, ac varius quam itae ipsum eu magna pretium aliquam. Curabitur interdum quis velit non tincidunt. Donec pretium gravida erat, a faucibus velit egestas eget
</span>
<span class="space">&nbsp;</span>
 <div class="row"> <div class="col-md-6"> <div class="form-group">   
 <div class="resume_label"> <h4>  <strong style="vertical-align: middle;"> AREA OF INTEREST </strong>.</h4></div>
<div class="space">&nbsp;</div> 
<ul>
  <li>API</li>
  <li>Distributed Computing</li>
  <li>Robotics</li>
  <li>Natural Language Processing</li>
  <li>Augmented reality</li>
</ul> 
<br> 
   <span class="space">&nbsp;</span>
 <span class="space">&nbsp;</span>
<div class="resume_label"> <h4>  <strong style="vertical-align: middle;">  CONTACT </strong>.</h4></div>
<div class="space">&nbsp;</div> 
   <i class="fa fa-envelope-o img-circle" aria-hidden="true"></i> agbe.terseer@gmail.com <br>
   <i class="fa fa-phone img-circle" aria-hidden="true" ></i> 07030355396 <br>
   <i class="fa fa-map-marker" aria-hidden="true"></i> Flat 100A Block B NIA Quarters Karu-Site Abuja, Nigeria. 
    <br>
<span class="space">&nbsp;</span>
 <div class="resume_label"> <h4>  <strong style="vertical-align: middle;"> TECHNICAL SKILLS   </strong>.</h4></div>
<div class="space">&nbsp;</div>  
                                     
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="easy-pie-chart">
                                                    <div class="number transactions" data-percent="55">
                                                       <span class="number transactions" data-counter="counterup" data-value="55"></span>%</div>
                                                    <a class="title" href="javascript:;"> Java
                                                        <i class="icon-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="margin-bottom-10 visible-sm"> </div>
                                            <div class="col-md-4">
                                                <div class="easy-pie-chart">
                                                    <div class="number visits" data-percent="85">
                                                       <!--  <span>+85</span>% -->
                                    <span class="number visits" data-counter="counterup" data-value="85"></span>%</div>
                                                    <a class="title" href="javascript:;"> Javascript
                                                        <i class="icon-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="margin-bottom-10 visible-sm"> </div>
                                            <div class="col-md-4">
                                                <div class="easy-pie-chart">
                                                    <div class="number bounce" data-percent="46">
                                                        <!-- <span>-46</span>%  -->
                                                           <span class="number bounce" data-counter="counterup" data-value="46"></span>% </div>
                                                 
                                                    <a class="title" href="javascript:;"> Hibernate
                                                        <i class="icon-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                                    <div class="col-md-4">
                                                <div class="easy-pie-chart">
                                                    <div class="number bounce" data-percent="46">
                                                        <!-- <span>-46</span>%  -->
                                                           <span class="number bounce" data-counter="counterup" data-value="46"></span>% </div>
                                                 
                                                    <a class="title" href="javascript:;"> Springboot
                                                        <i class="icon-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                   



</div> </div>

  <div class="col-md-6"> <div class="form-group">
 

   <div class="resume_label"> <h4>  <strong style="vertical-align: middle;">  EXPERIENCE </strong>.</h4></div>
<div class="space">&nbsp;</div> 
 <div id="textbox">
  <span class="alignleft">Panet Technologies.</span>
  <span class="alignright">2009-2014.</span><br>
</div>

<div style="clear: both;"></div>
<strong>Sotfware Developer</strong>
 <br>  
           <span style="margin-top: 20px;"> 
                                 <span class="job_description detail highlightable"  >
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
<br></span> </span></div> </div></div>
<div class="row">
<div class="col-md-6"> <div class="form-group">
 <div class="resume_label"> <h4>  <strong style="vertical-align: middle;">REFERENCE </strong>.</h4></div>
<div class="space">&nbsp;</div> 
<ul>
  <li>Java</li>
  <li>JavaScript</li>
  <li>Cloud </li>
  <li>Laravel</li>
  <li>Springboot</li>
  <li>Hibernate</li>
 </ul> 

</div></div>
<div class="col-md-6"> <div class="form-group"> 
 <div class="resume_label"> <h4>  <strong style="vertical-align: middle;">EDUCATION </strong>.</h4></div>
<span class="space">&nbsp;</span> 
<div id="textbox">
  <span class="alignleft">University Of Agriculture Makurdi</span>
  <span class="alignright">2009-2014.</span><br>
</div>
<div style="clear: both;"></div>
Mathematics / Computer Sci
</div></div></div>

<div class="row">
  <div class="col-md-6"> <div class="form-group">

  </div></div>

   <div class="col-md-6"> <div class="form-group">
 
</div></div>
</div>


<!-- <div class="row">
  <div class="col-md-6"> <div class="form-group">
  Nothing
  </div></div>
   <div class="col-md-6"> <div class="form-group">
 
<div class="space">&nbsp;</div> 
   Nothing
</div></div>
</div>
 -->
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    <!-- Wrapper -->
     
    <!-- Wrapper -->

    <!-- ModalLogin Box -->
    
    <!-- Modal Signup Box -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="{{ asset('css/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script> -->
   <!--  <script src="{{ asset('recruit/script/jquery.js')}}"></script>
    <script src="{{ asset('recruit/script/bootstrap.js')}}"></script>
    <script src="{{ asset('recruit/script/slick-slider.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/counter.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/fancybox.pack.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/isotope.min.js')}}"></script> -->
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
