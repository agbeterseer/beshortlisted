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
.center2 {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%; 
  text-align:center;
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
          <div class=" col-md-offset-2">
          <div class="center">
          <h2>Create an Employer Account</h2> 
        </div>
      </div>
<div class="col-md-8 col-md-offset-2">
    <div class="center">
<br>
     <div class="space">&nbsp;</div>
          <div class="space">&nbsp;</div>
<!-- Reach top talent and find the right candidate today  -->
    </div> 
                    @if(Session()->has('error-email'))
            <div class="alert alert-danger"> 
            {!! Session::get('error-email') !!}
            </div>
            @endif 

            
      <form class="careerfy-row careerfy-employer-profile-form" method="POST" action="{{ route('employer.postsigup') }}"   name="frm">
                        {{ csrf_field() }} 
<input type="hidden" name="account_type" value="employer" >
     <!-- <div class="portlet light bordered" > -->
          <div class="panel panel-default"> 
          <div class="panel-body">
          <div class="col-md-12" > 
  <div class="center"><h2>Personal Information</h2>  </div>
 
                     <!-- class="tab-pane fade" -->
             <div class="tab-content">
                    <div id="personal" class="tab-pane fade in active">

                    <div class="careerfy-user-form careerfy-user-form-coltwo">
                        <ul>
                          <li>
                                <label>Email Address:</label>
                                <input onblur="if(this.value == '') { this.value ='Enter Your Email Address'; }" onfocus="if(this.value =='Enter Your Email Address') { this.value = ''; }" type="text" name="email"  >
                                <i class="careerfy-icon careerfy-mail"></i>
                                     @if ($errors->has('email2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email2') }}</strong>
                                    </span>
                                @endif
                            </li>
                     
                    <li>
                      <label >Password</label> 
                                <input id="password" type="password"  name="password" required class="form-control">
<i class="careerfy-icon careerfy-typo-wrap"></i>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </li>
                                                            <li> 
                            <label>Confirm Password</label>  
                                <input id="password-confirm" type="password"  name="password_confirmation" class="form-control">
                                 <i class="careerfy-icon careerfy-typo-wrap"></i> 
                                    </li>
                             <li>
                                <label>Phone Number:</label>
                                <input type="text" name="phone" maxlength="11" id="phone" onkeypress="onlyNumbers()" >
                                <i class="careerfy-icon careerfy-technology"></i>
                            </li>
                        
                        <li>
                                <label>First Name:</label>
       <input onblur="if(this.value == '') { this.value ='Enter Your Name'; }" onfocus="if(this.value =='Enter Your Name') { this.value = ''; }" type="text" name="firstname">
                                <i class="careerfy-icon careerfy-user"></i>
                              @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </li>
                            <li>
                                <label>Last Name:</label>
                                <input onblur="if(this.value == '') { this.value ='Enter Your Name'; }" onfocus="if(this.value =='Enter Your Name') { this.value = ''; }" type="text" name="lastname">
                                <i class="careerfy-icon careerfy-user"></i>
                            </li></ul>
                            <div class="center"><h2>Company Information</h2>  </div>

                            <ul>
                 <li>
                                <label>Comany Name:</label>
                                <input onblur="if(this.value == '') { this.value ='Enter Comany Name'; }" onfocus="if(this.value =='Enter Comany Name') { this.value = ''; }" type="text" name="comany_name" required="required">
                               @if ($errors->has('comany_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comany_name') }}</strong>
                                    </span>
                                @endif                               
                            </li>
                          <li>
                                <label>Number of Employees:</label>
       <input placeholder="Number of Employees" type="number" name="number_of_employees"> 
                              @if ($errors->has('number_of_employees'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number_of_employees') }}</strong>
                                    </span>
                                @endif
                            </li>
                            <li>
                                <label>Industry:<span class="required">*</span></label>     
                                <select name="industry" required="required" style="background-color: #ffffff; font-size: 13px; font-weight: normal;">                             
                                 <option value="">Select Industry</option>
                                    @foreach($industries as $industry)
                                        <option value="{{$industry->id}}">{{$industry->name}}</option> 
                                        @endforeach 
                                    </select> 
                            </li>
                            <li>
                                <label>Type of Employer:</label>
                                <select name="type_of_employer"  required="required" style="background-color: #ffffff; font-size: 13px; font-weight: normal;">
                                    <option value="">Select One</option> 
                                        <option value="Direct Employer">Direct Employer</option>
                                        <option value="Recruitment Agency">Recruitment Agency</option>   
                                    </select> 
                              @if ($errors->has('type_of_employer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type_of_employer') }}</strong>
                                    </span>
                                @endif
                            </li>
                        </ul>
                           </div>
                                 <ul class="careerfy-column-12"> 
                                                       <li>
                                <label>Website (start with http://)</label>
                                <input onblur="if(this.value == '') { this.value ='https://www.yourwebsite.com'; }" onfocus="if(this.value =='https://www.yourwebsite.com') { this.value = ''; }" type="text" name="website" required="required">
                                <i class="careerfy-icon careerfy-world"></i>
                               @if ($errors->has('website'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif                               
                            </li>
                        </ul>
                            <div class="center"><h2>Company Contact Person</h2>  </div>
                           <div class="careerfy-column-8 careerfy-user-form" >
                         
                           <ul class="careerfy-column-12"> 
                          <li>
                                <label> Contact Person:</label>
       <input onblur="if(this.value == '') { this.value ='Name of Contact Person'; }" onfocus="if(this.value =='Name of Contact Person') { this.value = ''; }" type="text" name="contact_person" required="required"> 
                              @if ($errors->has('contact_person'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact_person') }}</strong>
                                    </span>
                                @endif
                            </li>
                            <li>
                                <label>Email Notificaition:</label>
                                <input onblur="if(this.value == '') { this.value ='Email of Contact Person'; }" onfocus="if(this.value =='Email of Contact Person') { this.value = ''; }" type="email" name="email_notificaiton" class="form-control" required="required"> 
                            </li>
                             <li>
                                <label>Phone Number:</label>
       <input  type="text" name="contact_phone_number" required="required" maxlength="11" onkeypress="onlyNumbers()" id="phone"> 
                              @if ($errors->has('contact_phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact_phone_number') }}</strong>
                                    </span>
                                @endif
                            </li>
                             <li>
                                <label>Country:</label> 
                                  <select name="country"  required="required" style="background-color: #ffffff; font-size: 13px; font-weight: normal;">
                                    <option value="">Select City</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->code}}">{{$country->name_en}}</option> 
                                        @endforeach 
                                    </select> 
                                 </li>                
                                    <li>
                                         <label>Description *</label>
                                        <textarea name="contact_address" required="required" > </textarea>
                                    </li>
                            <li class="careerfy-column-12">
           
                         </li>
                        </ul>
                  <div class="space">&nbsp;</div>
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div> 

 </div>
                        <div class="center2"> 
                                <button type="submit" class="btn dark btn" data-dismiss="modal">Submit</button>
                            <a href="{{url('/login')}}" class="btn dark btn-outline" data-dismiss="modal">Do you have an account already?</a> 
                                <div class="space">&nbsp;</div>
                              <label style="font-size: 15px;">By clicking "Submit", you agree to our<br>
                            <div class="space">&nbsp;</div>
                            <div><a href="{{route('single.page', 'terms-of-use')}}" target="_blank">Terms & Conditions</a> and <a href="{{route('display.policy')}}" target="_blank"> Privacy Policy</a></div></label> 
                           </div> 

                    </div>
          
                </div>  
                 </form>
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
           function accountNumber(){          
            $('#account_number').keypress(function(e) {
                var a = [];
                var k = e.which;

                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
            });
        }
  function onlyNumbers(){          
            $('#phone').keypress(function(e) {
                var a = [];
                var k = e.which;

                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
            });
        }
 

function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}
 </script>

 
 
</body>

</html>