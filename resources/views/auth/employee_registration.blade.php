<!DOCTYPE html>
<html lang="en">

<head>

    <title>Job Board</title>
    
    <!-- Css -->
 
        @include('partials.job_board_header')

    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style type="text/css">
    .careerfy-parallex-box {
    background: url(img/parallex-box-bg.png);
    background-position: left bottom;
    background-repeat: no-repeat;
    background-color: #4f87fb;
    padding: 137px 60px 136px 60px;
    text-align: center;
}
    .search-web {
    background: url(img/search-web.png);
    background-position: left bottom;
    background-repeat: no-repeat; 
    text-align: center;
}
.singup a:hover {
 color: #ffffff;
}
</style>
   <style type="text/css">
table {
    border-collapse: collapse;
    width: 100%;
}
th, td {
    height: 10px;
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    border-color: #13B5EA;
}
tr:hover {background-color:#f5f5f5;}
     
              body{background-color: #FAFAFA;}

   </style>
   <style type="text/css">
    .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
</style>
</head>

<body>
 
    <!-- Wrapper -->
    <div class="careerfy-wrapper">

        <!-- Header -->
 @include('partials.job_menu')
        <!-- Header -->
        
        <!-- Banner v #1E3142 -->
        <!-- Banner -->
 <div class="careerfy-main-content" style="margin-top: -50px;">
        <!-- Main Content --> 
          <div class="space">&nbsp;</div>
          <div class="space">&nbsp;</div>
<div class="col-md-8 col-md-offset-2">
    <div class="center"><h2>Create an Employee Account</h2> 
<br>
     <div class="space">&nbsp;</div>
          <div class="space">&nbsp;</div>
<!-- Reach top talent and find the right candidate today  -->
    </div>
   
            @if(Session()->has('error-year'))
            <div class="alert alert-danger"> 
            {!! Session::get('error-year') !!}
            </div>
            @endif
     <!-- <div class="portlet light bordered" > -->
  <form class="careerfy-row careerfy-employer-profile-form" method="POST" action="{{ route('register.employee') }}"  >
                        {{ csrf_field() }} 
           <div class="panel panel-default"> 
                <div class="panel-body"> 
                  <div class="col-md-12" > 
                     <div><h2>Personal Information</h2>  </div>
                 <div class="tab-content">
                    <div id="personal" class="tab-pane fade in active">
                   <input type="hidden" name="account_type" value="employee" >
                    <div class="careerfy-user-form careerfy-user-form-coltwo">
                        <ul>
                          <li>
                                <label>Email Address:<span class="required" style="color: red">*</span></label>
                                <input onblur="if(this.value == '') { this.value ='Enter Your Email Address'; }" onfocus="if(this.value =='Enter Your Email Address') { this.value = ''; }" type="text" name="email"  >
                                <i class="careerfy-icon careerfy-mail"></i>
                                     @if ($errors->has('email2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email2') }}</strong>
                                    </span>
                                @endif
                            </li>
                     
                    <li>
                      <label>Password: <span class="required" style="color: red">*</span></label> 
                                <input id="password" type="password"  name="password" required class="form-control">
<i class="careerfy-icon careerfy-typo-wrap"></i>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </li>
                                                            <li> 
                            <label>Confirm Password:<span class="required" style="color: red">*</span></label>  
                                <input id="password-confirm" type="password"  name="password_confirmation" class="form-control">
                                 <i class="careerfy-icon careerfy-typo-lock"></i> 
                                    </li>
                             <li>
                                <label>Phone Number:<span class="required" style="color: red">*</span></label>
                                <input value="Enter Your Phone Number" onblur="if(this.value == '') { this.value ='Enter Your Phone Number'; }" onfocus="if(this.value =='Enter Your Phone Number') { this.value = ''; }" type="number" name="phone" maxlength="11">
                                <i class="careerfy-icon careerfy-technology"></i>
                            </li>
                        
                        <li>
                                <label>First Name:<span class="required" style="color: red">*</span></label>
       <input onblur="if(this.value == '') { this.value ='Enter Your Name'; }" onfocus="if(this.value =='Enter Your Name') { this.value = ''; }" type="text" name="firstname">
                                <i class="careerfy-icon careerfy-user"></i>
                              @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </li>
                            <li>
                                <label>Last Name:<span class="required" style="color: red">*</span></label>
                                <input onblur="if(this.value == '') { this.value ='Enter Your Name'; }" onfocus="if(this.value =='Enter Your Name') { this.value = ''; }" type="text" name="lastname">
                                <i class="careerfy-icon careerfy-user"></i>
                            </li>
                        <li>
                                <label>Gender:<span class="required" style="color: red">*</span></label>
                          <select name="gender" id="gender" required="required" style="background-color: #ffffff; font-size: 13px; font-weight: normal;">
                          <option value="" selected="selected">Select</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option> 
                          </select>
                              @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </li>
                            <li>
                                <label>Date Of Birth:<span class="required" style="color: red">*</span></label>
                                <input onblur="if(this.value == '') { this.value ='Enter Date of Birth'; }" onfocus="if(this.value =='Enter Date of Birth') { this.value = ''; }" type="date" name="date_of_birth" class="form-control"  required="required">
                            </li>
                          </ul>

                           </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> 

             <div class="panel panel-default"> 
                <div class="panel-body"> 
                  <div class="col-md-12" > 
                          <div><h2>Work Expirence</h2>  </div>
                 <div class="tab-content">
                    <div id="personal" class="tab-pane fade in active">

 <div class="row">
<div class="col-md-6"> 
<div class="form-group"> 
<div class="col-md-12" style="overflow-x:auto;">
<label>From: <span class="required">*</span>  </label> 
<div class="careerfy-three-column-row"> 
<div class="careerfy-profile-select careerfy-three-column">
    <select name="work_from_year" id="from_year" required="required" style="font-size: 14px; color: #000000;">
    <option value="" selected="selected">Year</option>
        @foreach($recruityear_list as $recruityear)
      <option value="{{$recruityear->name}}">{{$recruityear->name}}</option>
      @endforeach
                </select>
            </div> 
  <div class="careerfy-profile-select careerfy-three-column">    
<select name="work_from_month" id="work_from_month" required="required" style="font-size: 14px; color: #000000;">
 <option value="" selected="selected">Month</option>
<option value="1">January</option>
<option value="2">February</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">August</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">Novermber</option>
<option value="12">December</option>
</select>
                                       
                </div>
            </div>
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->


<div class="col-md-6">
<div class="form-group"> 
<div class="col-md-12" style="overflow-x:auto;">
<label> To: <span class="required">*</span> </label>
<div class="careerfy-three-column-row"> 
           <div class="careerfy-profile-select careerfy-three-column">
  <select name="end_year" id="end_year"  style="font-size: 14px; color: #000000; display: block;" >
 
    <option value="" selected="selected">Year</option>
    @foreach($recruityear_list as $recruityear)
      <option value="{{$recruityear->name}}">{{$recruityear->name}}</option>
      @endforeach
 </select>
<!--    <select name="end_year" id="end_year2" style="font-size: 16px; color: #000000; display: none;"  >
 
    <option value="" >Year</option>
    @foreach($recruityear_list as $recruityear)
      <option value="{{$recruityear->name}}">{{$recruityear->name}}</option>
      @endforeach
 </select> -->
     </div>
<div class="careerfy-profile-select careerfy-three-column">                                            
<select name="end_month" id="end_month_work" style="font-size: 14px; color: #000000; display: block;">
<option value="" selected="selected">Month</option>
<option value="1">January</option>
<option value="2">February</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">August</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">Novermber</option>
<option value="12">December</option>
</select>
 </div> 
<input type="checkbox" name="current" value="1" id="present" style="display: block;"> 
 
<input type="checkbox" name="current" value="0" id="present2" hidden="hidden"> 
    </div>
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->

 </div>
 <div class="space">&nbsp;</div>
   
                      <div class="careerfy-user-form careerfy-user-form-coltwo">  
                      <ul> 
                        <li>
                                <label>Company Name: <span class="required" style="color: red">*</span></label>
       <input placeholder="Enter Company Name" type="text" name="company_name"> 
                              @if ($errors->has('number_of_employees'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number_of_employees') }}</strong>
                                    </span>
                                @endif
                            </li>
                          <li>
                                <label>Position Title: <span class="required" style="color: red">*</span></label>
                                <input placeholder="Eg. Software Developer" type="text" name="position_title" required="required">
                               @if ($errors->has('position_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('position_title') }}</strong>
                                    </span>
                                @endif                               
                            </li>

                            <li>
   <label>Availability:<span class="required" style="color: red">*</span></label> 
<!--  <select name="career_level" id="career_level" required="required" style="background-color: #ffffff; font-size: 13px; font-weight: normal;">
  <option value="" selected="selected">Please Select</option>
 @foreach($job_career_levelList as $job_career_level)
    <option value="{{$job_career_level->id}}">{{$job_career_level->name}}</option>
    @endforeach 
</select> -->
 <select name="availability" required="required" style="background-color: #ffffff; font-size: 13px; font-weight: normal;"> 
 <option value="">Select one</option>
   <option value="now">Immediate</option>
    <option value="1 week">1 week</option>
    <option value="2 weeks">2 weeks</option>
    <option value="1 month" selected="selected">1 month</option>
    <option value="2 months">2 months</option>
    <option value="date">Specific date</option>
</select>
                            </li>
                            <li>
                                <label>Work Location:<span class="required" style="color: red">*</span></label>
                        <select name="country"  required="required" style="background-color: #ffffff; font-size: 13px; font-weight: normal;">
                        <option value="" selected="selected">Select</option> 
                        @foreach($countries as $country)
                        <option value="{{$country->code}}">{{$country->name_en}}</option>
                        @endforeach
                        </select> 
                              @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </li>
<li>                         <label>Industry: <span class="required" style="color: red">*</span></label>
               <select name="industry"  required="required" style="background-color: #ffffff; font-size: 13px; font-weight: normal;">
                        <option value="" selected="selected">Select</option> 
                        @foreach($industries as $industry)
                        <option value="{{$industry->id}}">{{$industry->name}}</option>
                        @endforeach
                        </select>
                                <i class="careerfy-icon careerfy-world"></i>
                               @if ($errors->has('website'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif   
                              </li> 
                            <li>
                                <label>Function:<span class="required" style="color: red">*</span></label>
                        <select name="profession" required="required" style="background-color: #ffffff; font-size: 13px; font-weight: normal;">
                        <option value="" selected="selected">Select</option>  
                        @foreach($industry_profession as $industry_pr)
                        <option value="{{$industry_pr->id}}">{{$industry_pr->name}}</option>
                        @endforeach
                        </select> 
                              @if ($errors->has('profession'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profession') }}</strong>
                                    </span>
                                @endif
                     </li> 
                  </ul>  
                   </div>
                        <ul class="careerfy-user-form careerfy-user-form-coltwo"> 
                          <li> 
                      Upload CV <input type="file" name="upload-cv">  </li>
                            <div class="space">&nbsp;</div> 
 <input type="checkbox" name="newsletter" checked="checked" > I would like to receive top jobs and career tips
                        </ul>
                    </div>
                  </div>
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div>
                        <div class="center" style="align-content: center;">
                          <button type="submit" class="btn dark btn" data-dismiss="modal">Create Account</button>
                            <a href="{{url('/login')}}" class="btn dark btn-outline" data-dismiss="modal">Do you have an account already?</a>
                                <div class="space">&nbsp;</div>
                           <label style="font-size: 15px;">By clicking "Create Account", you agree to our<br>
                            <div class="space">&nbsp;</div>
                            <span style=""><a href="{{route('single.page', 'terms-of-use')}}" target="_blank">TERMS & CONDITIONS</a> and <a href="{{route('display.policy')}}" target="_blank">PRIVACY POLICY</a></span></label> 
                        </div>
                </div>
              </div>
            </div>
   
                     <!-- class="tab-pane fade" -->
  
 </form>

                    </div>
          
                </div> 

                    
               

 </div>
 
</div>
</div>
</div>

       

          <!-- Main Section -->
 

            <!-- Main Section -->

            <!-- Main Section -->
            
            <!-- Main Section -->

            <!-- Main Section -->
  
            <!-- Main Section -->

            <!-- Main Section -->
        
            <!-- Main Section -->

            <!-- Main Section -->
             
            <!-- Main Section -->

            <!-- Main Section -->
         
            <!-- Main Section -->

            <!-- Main Section -->
         
            <!-- Main Section -->

        </div>
        <!-- Main Content -->
        
        <!-- Footer -->
  
     @include('partials.job_footer')
        <!-- Footer -->

    </div>
    <!-- Wrapper -->

    <!-- ModalLogin Box -->
      <!-- ModalLogin Box -->
    <div class="careerfy-modal fade careerfy-typo-wrap" id="JobSearchModalSignup">
        <div class="modal-inner-area">&nbsp;</div>
        <div class="modal-content-area">
            <div class="modal-box-area">

                <div class="careerfy-modal-title-box">
                    <h2>Login to your account</h2>
                    <span class="modal-close"><i class="fa fa-times"></i></span>
                </div>
              <form class="login-form" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                    <div class="careerfy-box-title">
                        <span>Choose your Account Type</span>
                    </div>
                    <div class="careerfy-user-options">
                        <ul>
                            <li class="active">
                                <a href="#">
                                     <i class="careerfy-icon careerfy-user"></i>
                                     <span>Candidate</span>
                                     <small>I want to discover awesome companies.</small>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                     <i class="careerfy-icon careerfy-building"></i>
                                     <span>Employer</span>
                                     <small>I want to attract the best talent.</small>
                                </a>
                            </li>
                        </ul>
                    </div> 

              
                    <div class="careerfy-user-form">
                        <ul>
                            <li>
                                <label>Email Address:</label>
                                <input value="Enter Your Email Address" onblur="if(this.value == '') { this.value ='Enter Your Email Address'; }" onfocus="if(this.value =='Enter Your Email Address') { this.value = ''; }" type="text" name="username" autocomplete="off">
                                <i class="careerfy-icon careerfy-mail"></i>
                            </li>
                            <li>
                                <label>Password:</label>
                                <input value="Enter Password" onblur="if(this.value == '') { this.value ='Enter Password'; }" onfocus="if(this.value =='Enter Password') { this.value = ''; }" type="password" class="form-control" name="password" autocomplete="off">
                                <i class="careerfy-icon careerfy-multimedia"></i>
                            </li>
                            <li>
                       
                                <input type="submit" value="Sign In">
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                        <div class="careerfy-user-form-info">
                            <p>Forgot Password? | <a href="#">Sign Up</a></p>
                            <div class="careerfy-checkbox">
                                <input type="checkbox" id="r10" name="rr" />
                                <label for="r10"><span></span> Remember Password</label>
                            </div>
                        </div>
                    </div>
               
                    <div class="careerfy-box-title careerfy-box-title-sub">
                        <span>Or Sign In With</span>
                    </div>
                    <div class="clearfix"></div>
                    <ul class="careerfy-login-media">
                        <li><a href="{{ url('/auth/facebook') }}" target="_blank"><i class="fa fa-facebook"></i> Sign In with Facebook</a></li>
                        <li><a href="#" data-original-title="google"><i class="fa fa-google"></i> Sign In with Google</a></li>
                        <li><a href="#" data-original-title="twitter"><i class="fa fa-twitter"></i> Sign In with Twitter</a></li>
                        <li><a href="#" data-original-title="linkedin"><i class="fa fa-linkedin"></i> Sign In with LinkedIn</a></li>
                    </ul>
                </form>
                
            </div>
        </div>
    </div>
    <!-- Modal Signup Box -->
 
      
@if(session()->has('flash-message'))
    <div class="alert alert-danger text-center" role="alert">
        {{ session()->get('flash-message') }}
    </div>
@endif

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('recruit/script/jquery.js')}}"></script>
    <script src="{{ asset('recruit/script/bootstrap.js')}}"></script>
 <script src="{{ asset('css/assets/global/plugins/bootstrap-summernote/summernote.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('recruit/script/slick-slider.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/counter.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/fancybox.pack.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/isotope.min.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/functions.js')}}"></script>
    <script src="{{ asset('recruit/script/functions.js')}}"></script>
        <script src="{{ asset('css/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}" type="text/javascript"></script>
          <script src="{{ asset('js/selectform.js') }}"></script>
<script src="{{ asset('css/assets/pages/scripts/components-bootstrap-tagsinput.min.js')}}" type="text/javascript"></script>
      <script src="{{ asset('css/assets/global/plugins/jquery-repeater/jquery.repeater.js')}}" type="text/javascript"></script>
      <script src="{{ asset('css/assets/pages/scripts/form-repeater.min.js')}}" type="text/javascript"></script>
 
 <script type="text/javascript">
    
 
    $(document).ready(function() {
        $('#summernote_1').summernote({
            height:'300px'
        });
        // body...
    });
    $(document).ready(function() {
        $('#summernote_2').summernote({
            height:'300px',
        });
        // body...
    });
    $('#clear').on('click', function() {
        $('#summernote_1').summernote('code', null);
    });
        $('#clear').on('click', function() {
        $('#summernote_2').summernote('code', null);
    });
</script>
 
    <script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
</script>
 <script>
    
    $("#qualification").change(function() { 
    
    if ( $(this).val() == "Specific Qualification") {
    $("#qualification").hide();
    $("#availability_date").show();
}
    else{
    
        $("#qualification").show();
        $("#availability_date").hide();
    }
});
$("#present").click(function(){
  //  alert($(this).val());
    //$("#end_month").hide();
    //document.getElementById('myInput').value = ''
  document.getElementById('end_month_work').value = ''; 
  
  document.getElementById('end_year').value = ''; 
  
});
$("#present2").click(function(){
  //  alert($(this).val());
    //$("#end_month").hide();
    //document.getElementById('myInput').value = ''
  document.getElementById('end_month_work').value = ''; 
  
  document.getElementById('end_year').value = ''; 
    document.getElementById('present2').value = ''; 
  
  
});
  $("#end_year").change(function() { 
 //alert($(this).val());
    if ( $(this).val() !=null) {
        $("#present2").show();
        $("#present").hide();
  //document.getElementById('present').style.display = 'none';
   //document.getElementById('work_to_present').style.display = 'block';
        
    }
    else{
document.getElementById('end_month_work').value = ''; 
document.getElementById('present').style.display = 'block';
document.getElementById('present2').style.display = 'none';
    }
});
  $("#end_month").change(function() { 
//alert($(this).val());
    if ( $(this).val() !=null) {
        $("#present2").show();
        $("#present").hide();
  //document.getElementById('present').style.display = 'none';
   //document.getElementById('work_to_present').style.display = 'block';
        
    }
    else{
document.getElementById('work_to_present').style.display = 'none';
document.getElementById('present').style.display = 'block';
 
    }
}); 
 (function( $ ) {
    'use strict';
    if ( $.isFunction($.fn[ 'summernote_1' ]) ) {
        $(function() {
            $('#summernote_1').themePluginSummerNote({
                height: 180,
                codemirror: {
                    "theme": "ambiance"
                },
                toolbar: [               
                    ['style', ['bold', 'italic', 'underline', 'clear']]
                ]
            });
        });
    }
}).apply(this, [ jQuery ]);

 function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

 </script>

 
 
</body>

</html>