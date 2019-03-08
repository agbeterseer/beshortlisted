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
    <![endif]  #364150  '8e3636'= red  '378465'= green  '0990f7'= blue  '2d7287' = gray -->
@php($color_ = 'white')
@php($font_color = '#2d7287')
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

/** {
    box-sizing: border-box;
}
*/
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
    /*height: auto-fill;*/
    /*background-color:{{$font_color}}; For browsers that do not support gradients */
    background-color: #8e3636; 
    background-image: linear-gradient(to bottom right, {{$font_color}} 30%, #1c0909 30%);
  /*background-image: linear-gradient(to bottom right, #8e3636, #1c0909);*1
*/
  .inne2{
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

.circle-icon {
   background: #cccccc;
    width: 40px;
    height: 40px;
    border-radius: 60%;
    text-align: center;
    line-height: 100px;
    vertical-align: center;
    padding: 10px;
}

 
.icon-background {
    color: #cccccc;
}
 

/*i:hover {color: #777;}*/
/*i:active {color: #777;text-shadow: 1px 0px #fff}*/
a {text-decoration: none}
.nav li {
  position: relative;
  display: inline-block;
  margin-right: 14px;
}
nav li:before {
    content: " ";
    width: 0; height: 0;
    
    border-left: 25px solid transparent;
    border-right: 25px solid transparent;
    position: absolute;
    top: -20px;
    left: 0;
    border-bottom: 20px solid {{$font_color}};
}

nav li {
    margin-top: 20px;
    width: 50px;
    height: 20px;
    
    position: relative;
    text-align: center;
    vertical-align: middle;
    background-color: {{$font_color}};
}

nav li:after {
    content: "";
    width: 0;
    position: absolute;
    bottom: -20px;
    left: 0px;
   
    border-left: 25px solid transparent;
    border-right: 25px solid transparent;
     border-top: 20px solid {{$font_color}};
}

.resume_label{
  color: {{$font_color}};
}

 
/* */
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
                 <a href="{{url('/templates')}}" class="btn red mt-ladda-btn ladda-button btn-outline"> Close </a>
                   <a href="javascript:window.print();" class="btn red mt-ladda-btn ladda-button btn-outline"> PRINT </a>
                </div>
        <div class="portlet-body">  


 <div class="row">
  <div class="column left" >

 

                   <div  align="center" >
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
   <i class="fa fa-envelope-o " aria-hidden="true"></i> agbe.terseer@gmail.com <br>
   <div class="space">&nbsp;</div> 
   <i class="fa fa-phone " aria-hidden="true" ></i> 07030355396 <br>
   <div class="space">&nbsp;</div> 
    <i class="fa fa-map-marker" aria-hidden="true"></i> Flat 100A Block B NIA Quarters Karu-Site Abuja, Nigeria. <br>
   
    <div class="space">&nbsp;</div>  
   <div style="margin-top:30px;"> 
   <nav>
  <ul class="nav">     
    <li > <i class="fa fa-rocket" style="color: white; padding-right:-10px;" ></i> </li>
    </ul>
    </nav>
    <span style="padding-left: 50px;">  TECHNICAL SKILL.</span></div><br>

 <div class="progress">

  <div class="progress-bar" role="progressbar"  style="width: 10%; background-color: {{$font_color}};" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"><span style="color: #000000;">Java(10%)</span></div>
</div>

<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 25%; background-color: {{$font_color}};" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span style="color: #000000;">Javascript(25%)</span></div>
</div>
 
<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 50%; background-color: {{$font_color}};" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><span style="color: #000000;">Cloud hosting(50%)</span></div>
</div>

<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 75%; background-color: {{$font_color}};" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><span style="color: #000000;">Springboot(75%)</span></div>
</div>
<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 100%; background-color: {{$font_color}};" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><span style="color: #000000;">Hibernate(100%)</span></div>
</div>
 
   <div class="space" style="padding-bottom: 10%;">&nbsp;</div>
  <div class="space">&nbsp;</div>
     <nav>
  <ul class="nav">     
    <li > <i class="fa fa-book" style="color: white;" ></i> </li>
    </ul>

    </nav>
 <strong style="vertical-align: middle;"><span style="padding-left: 50px;">AREA OF INTEREST</span></strong>. 
<ul>
  <li>API</li>
  <li>Distributed Computing</li>
  <li>Robotics</li>
  <li>Natural Language Processing</li>
  <li>Augmented reality</li>
</ul>


  </div>
 <div class="column right" >

   <div class="resume_label">
   <nav>
  <ul class="nav">     
    <li > <i class="fa fa fa-briefcase" style="color: white; padding-right:-10px;" ></i> </li>
    </ul>
    </nav>
  <h4> 
   <strong style="vertical-align: middle;"><span style="padding-left: 50px;"> EXPERIENCE</span></strong>.</h4></div>
 
<hr>
 
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

        <div class="space">&nbsp;</div>
        <div class="resume_label">
        <nav>
  <ul class="nav">     
    <li > <i class="fa fa-graduation-cap" style="color: white;" ></i> </li>
    </ul>
    </nav>
        <h4>  <strong style="vertical-align: middle;"><span style="padding-left: 50px;"> EDUCATION</span></strong>.</h4></div>

<hr>
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

<div class="space">&nbsp;</div>
   <div class="resume_label">
  <nav>
  <ul class="nav">     
    <li > <i class="fa fa-rocket" style="color: white;" ></i> </li>
    </ul>
    </nav>
<h4><strong style="vertical-align: middle;">  <span style="padding-left: 50px;">
 TRAINING ATTENDED</span></h4></strong>.</div>
<ul>
  <li>Conducted Pentest on both platforms</li>
  <li>Protected Queries from SQL injection</li>
  <li>Conduct software validation for Human Resource Management System platform </li>
  <li>Securing connection with OpenSSL</li>
  <li>Conduct software validation on database platform</li>
</ul>

<div class="space">&nbsp;</div>
 <div class="resume_label">

 
  <nav>
  <ul class="nav">     
    <li > <i class="fa fa-wrench" style="color: white;" ></i> </li>
    </ul>
    </nav>
 <h4>
 <strong style="vertical-align: middle;"><span style="padding-left: 50px;">
WORKSHOP ATTENDED</span></strong></h4></div>
<ul>
  <li>Conducted Pentest on both platforms</li>
  <li>Protected Queries from SQL injection</li>
  <li>Conduct software validation for Human Resource Management System platform </li>
  <li>Securing connection with OpenSSL</li>
  <li>Conduct software validation on database platform</li>
</ul>
  </div>

  </div>
 
<!--         <div class="row">
          <div class="col-md-6 left">
            <div class="from-group"> 
    </div>
 </div> 
  <div class="col-md-8">
     <div class="from-group"> 
       </div>
     </div> 
        </div> -->

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
