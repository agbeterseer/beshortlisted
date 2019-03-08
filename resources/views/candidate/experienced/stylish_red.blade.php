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
                        <span class="caption-subject bold uppercase"> Fresher's Resume</span>
                    </div>
                 <a href="{{url('/templates')}}" class="btn red mt-ladda-btn ladda-button btn-outline"> Close </a>
                   <a href="javascript:window.print();" class="btn red mt-ladda-btn ladda-button btn-outline"> PRINT </a>
                </div>
                <div class="portlet-body">  
                            <table class="center2"> 
                                <tr>
                                <td width="50%" class="t_label" valign="middle">             
                          <div align="left">
                          <strong> <span style="font-size: 25px;" class="uppercase">Terseer Agbe </span></strong> <br>
                           <span class="resume_profession" >Software Developer </span><br>
               
                          </div> </td> 
                      <td width="50%" valign="middle"  align="right"> 
                                <div class="space">&nbsp;</div>
                                <strong> <div style="padding-right: 10px;"> 
                           Flat 100A Block B NIA Quarters Karu-Site Abuja, Nigeria. <br>
                          07030355396|agbe.terseer@gmail<br></strong> 
                          </div>
                         
                           </td> 
                           
                                </tr></table> 
                               
<div class="triangle"></div>
 <br>
 
<!-- <div class="space">&nbsp;</div> {{asset('/img/terseer.jpg')}} -->
                                            
                          <table> 
                                <tr>
                                <td width="20%" class="resume_title" valign="top">CAREER OBJECTIVES </td> <td width="80%"> Nulla bibendum commodo rhoncus. Sed mattis magna nunc, ac varius quam pharetra vitae. Praesent vitae ipsum eu magna pretium aliquam. Curabitur interdum quis velit non tincidunt. Donec pretium gravida erat, a faucibus velit egestas eget. Nulla bibendum commodo rhoncus. Sed mattis magna nunc, ac varius quam itae ipsum eu magna pretium aliquam. Curabitur interdum quis velit non tincidunt. Donec pretium gravida erat, a faucibus velit egestas eget</td>
                                </tr></table>     
                                           
                                          
 <!-- <div class="space">&nbsp;</div> -->
 <hr>
                           <table> 
                          <tr>
                          <td width="20%" valign="top" class="resume_title">EXPERIENCE </td> <td width="80%">


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
<br></span>
                                 </span>    
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
                            <table> 
                            <tr>
                            <td width="20%" class="resume_title" valign="top">EDUCATIONAL QUALIFICATION </td> 
                            <td width="80%">

<ul>
  <li>  <div id="textbox">
  <span class="alignleft">University Of Agriculture Makurdi</span>
  <span class="alignright">2009-2014.</span><br>
</div>
<div style="clear: both;"></div>
<strong>BSC. Mathematics / Computer Sci</strong></li>

 <div class="space">&nbsp;</div>

<li>

<div id="textbox">
  <span class="alignleft">University Of Agriculture Makurdi</span>
  <span class="alignright">2009-2014.</span><br>
</div>
<div style="clear: both;"></div>
<strong> BSC. Mathematics / Computer Sci</strong></li>
 <div class="space">&nbsp;</div>
 <li>
<div id="textbox">
  <span class="alignleft">University Of Agriculture Makurdi</span>
  <span class="alignright">2009-2014.</span><br>
</div>
<div style="clear: both;"></div>
<strong>BSC. Mathematics / Computer Sci</strong></li>
 <div class="space">&nbsp;</div>
 <li>
<div id="textbox">
  <span class="alignleft">University Of Agriculture Makurdi</span>
  <span class="alignright">2009-2014.</span><br>
</div>
<div style="clear: both;"></div>
<strong>BSC. Mathematics / Computer Sci</strong></li>
 <div class="space">&nbsp;</div>
 <li>
<div id="textbox">
  <span class="alignleft">University Of Agriculture Makurdi</span>
  <span class="alignright">2009-2014.</span><br>
</div>
<div style="clear: both;"></div>
<strong>BSC. Mathematics / Computer Sci</strong></li>
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
               <table> <tr>
               <td width="20%" class="resume_title" valign="top">AREA OF INTEREST </td>
               <td>velit non tincidunt. Donec pretium gravida erat, a faucibus velit egestas eget </td>
               </tr></table>  
                 <table><tr>
                  <td width="20%" class="resume_title" valign="top">TRAINING ATTENDED</td> <td>velit non tincidunt. Donec pretium gravida erat, a faucibus velit egestas eget</td></tr></table> 
       
                  <table > <tr>
                    <td width="20%" class="resume_title" valign="top">WORKSHOP ATTENDED </td><td>velit non tincidunt. Donec pretium gravida erat, a faucibus velit egestas eget</td></tr></table>

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
