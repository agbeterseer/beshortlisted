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
                        <span class="caption-subject bold uppercase"> Fresher's Resume</span>
                    </div>
                
                </div>
        <div class="portlet-body"> 

                         <table class="resume_title"> 
                                <tr>
                                <td width="20%" class="t_label" valign="top"><div  align="right" style="padding-bottom: -1290px; padding-left: 10px; position: absolute;">
<div class="resume_pic" align="left">
<img src="{{asset('/img/terseer.jpg')}}" alt="Picture" height="150px;" width="150px;">
<!-- <p class="editov2"><a class="edits" ><i class="icon-plus"></i>Edit</a></p> -->
</div>

</div></td> <td width="80%" valign="bottom" align="right"> <strong> <span style="font-size: 25px; padding-right: 10px;" class="uppercase">Terseer Agbe </span></strong></td>
                                </tr></table> 

 <br>

                          <div align="right">
                          <strong>  Flat 100A Block B NIA Quarters Karu-Site Abuja, Nigeria.</strong><br>
                          <strong>07030355396|</strong> agbe.terseer@gmail<br>
                          </div>
<hr>
                                            
                          <table> 
                                <tr>
                                <td width="20%" class="t_label" valign="top">CAREER OBJECTIVES </td> <td width="80%"> Nulla bibendum commodo rhoncus. Sed mattis magna nunc, ac varius quam pharetra vitae. Praesent vitae ipsum eu magna pretium aliquam. Curabitur interdum quis velit non tincidunt. Donec pretium gravida erat, a faucibus velit egestas eget. Nulla bibendum commodo rhoncus. Sed mattis magna nunc, ac varius quam itae ipsum eu magna pretium aliquam. Curabitur interdum quis velit non tincidunt. Donec pretium gravida erat, a faucibus velit egestas eget</td>
                                </tr></table>     
                                       <hr>          
       
                           <table> 
                          <tr>
                          <td width="20%" class="t_label" valign="top">EXPERIENCE </td> <td width="80%">
 <div id="textbox">
  <span class="alignleft"><strong>Panet Technologies.</strong></span>
  <span class="alignright"><strong>2009-2014.</strong></span><br>
</div>

<div style="clear: both;"></div>
Sotfware Developer<br>



                          <span style="margin-top: 20px;"> 
                          <span class="job_description detail highlightable" style="font-size: 12px;">
Duties: Design and Implementation of Document Management System
<br>•   Analysis and design of database and user interface Unit testing 
<br>•   Developing user manuals
<br>•   Study and analyze the Rhizome operations, processes and procedures to determine the best database design 
<br>•   Deploying on AWS cloud hosting
<span class="space">&nbsp;</span><br>
Duties: Design and Implementation of Human Resource Management System
<br>•   Study and analyze the Rhizome operations, processes and procedures to determine the best database design
<br>•   Unit testing 
<br>•   Developed user manuals
<br>•   Deploying application on Aws cloud hosting 
<br>•   Setting up all application servers
<br>Security:
<br>•   Conducted Pentest on both platforms
<br>•   Protected Queries from SQL injection
<br>•   Conduct software validation for Human Resource Management System platform 
<br>•   Securing connection with OpenSSL 
<br>•   Conduct software validation on database platform 
<br></span>
                          </td>
                          </tr></table> 
                  <hr>
                            <table> 
                            <tr>
                            <td width="20%" class="t_label">EDUCATIONAL QUALIFICATION </td> <td width="80%">University Of Agriculture Makurdi<br>Mathematics / Computer Sci<br>2009-2014. </td>
                            </tr></table>  

<hr>
 <!-- <span class="space">&nbsp;</span> --> 
               <table> <tr>
               <td width="20%" class="t_label">AREA OF INTEREST </td>
               <td>velit non tincidunt. Donec pretium gravida erat, a faucibus velit egestas eget </td>
               </tr></table>  
             <hr>
                 <table><tr>
                  <td width="20%" class="t_label">TRAINING ATTENDED</td> <td>velit non tincidunt. Donec pretium gravida erat, a faucibus velit egestas eget</td></tr></table> 
       <hr>
                  <table> <tr>
                    <td width="20%" class="t_label">WORKSHOP ATTENDED </td><td width="80%">velit non tincidunt. Donec pretium gravida erat, a faucibus velit egestas eget</td></tr></table>
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
