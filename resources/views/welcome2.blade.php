<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rhizome Consulting</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- <link href="{{ asset('css/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> -->
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link href="{{ asset('css/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/landing.min.css')}}" rel="stylesheet">
     <!-- <link href="{{ asset('css/assets/pages/css/login.min.css') }}" rel="stylesheet">#364150 -->
  </head>
  <body>

    <div class="overlay"></div>
    <div class="masthead">
      <div class="masthead-bg"></div>
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-12 my-auto">
            <div class="masthead-content text-white py-5 py-md-0">
              <h1 class="mb-3">CV-DBMS </h1>
              <!-- <p class="mb-5">Building a rubost CV management system.  </p> -->
                <!-- <strong>January 2019</strong>! Sign up for updates using the form below! -->
              <div class="input-group input-group-newsletter">
           <!--      <input type="email" class="form-control" placeholder="Enter email..." aria-label="Enter email..." aria-describedby="basic-addon"> -->
                <div class="content">
            <!-- BEGIN LOGIN FORM login-form -->
             <form class="login-form" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                <h3 class="form-title font-green">Sign In</h3>
        

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">                    
             <!-- <label class="control-label visible-ie8 visible-ie9">Username</label> -->
            <input class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off" placeholder="Email Address" name="email" value="{{ old('email') }}" required="required" />
                                 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
               </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <!-- <label class="control-label visible-ie8 visible-ie9">Password</label> -->
                    <input   class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" value="{{ old('password') }}" required="required" /> 

                      @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                      @endif
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-secondary">Login</button>
                    <label class="rememberme check mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" value="1" />Remember
                        <span></span>
                    </label>
  <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                    <!-- <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a> -->
                </div>
        
      
            </form>
            <!-- END LOGIN FORM -->
            <!-- BEGIN FORGOT PASSWORD FORM -->
      
            <!-- END FORGOT PASSWORD FORM -->
            <!-- BEGIN REGISTRATION FORM -->

            <!-- END REGISTRATION FORM -->
        </div>

           
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

   <!--  <div class="social-icons">
      <ul class="list-unstyled text-center mb-0">
        <li class="list-unstyled-item">
          <a href="#">
            <i class="fa fa-doc"></i>
          </a>
        </li>
        <li class="list-unstyled-item">
          <a href="#">
            <i class="fa fa-download"></i>

          </a>
        </li>
        <li class="list-unstyled-item">
          <a href="#">
            <i class="fa fa-briefcase"></i>
         
          </a>
        </li>
      </ul>
    </div> -->

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('css/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('css/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ asset('css/vendor/vide/jquery.vide.min.js')}}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ asset('js/landing.min.js')}}"></script> 
  </body>

</html>




<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rhizome Consulting</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- <link href="{{ asset('css/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> -->
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link href="{{ asset('css/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/landing.min.css')}}" rel="stylesheet">
     <!-- <link href="{{ asset('css/assets/pages/css/login.min.css') }}" rel="stylesheet">#364150 -->
  </head>
  <body>

    <div class="overlay"></div>
    <div class="masthead">
      <div class="masthead-bg"></div>
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-12 my-auto">
            <div class="masthead-content text-white py-5 py-md-0">
              <h1 class="mb-3">CV-DBMS </h1>
              <!-- <p class="mb-5">Building a rubost CV management system.  </p> -->
                <!-- <strong>January 2019</strong>! Sign up for updates using the form below! -->
              <div class="input-group input-group-newsletter">
           <!--      <input type="email" class="form-control" placeholder="Enter email..." aria-label="Enter email..." aria-describedby="basic-addon"> -->
                <div class="content">
            <!-- BEGIN LOGIN FORM login-form -->
             <form class="login-form" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                <h3 class="form-title font-green">Sign In</h3>
        

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">                    
             <!-- <label class="control-label visible-ie8 visible-ie9">Username</label> -->
            <input class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off" placeholder="Email Address" name="email" value="{{ old('email') }}" required="required" />
                                 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
               </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <!-- <label class="control-label visible-ie8 visible-ie9">Password</label> -->
                    <input   class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" value="{{ old('password') }}" required="required" /> 

                      @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                      @endif
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-secondary">Login</button>
                    <label class="rememberme check mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" value="1" />Remember
                        <span></span>
                    </label>
  <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                    <!-- <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a> -->
                </div>
        
      
            </form>
            <!-- END LOGIN FORM -->
            <!-- BEGIN FORGOT PASSWORD FORM -->
      
            <!-- END FORGOT PASSWORD FORM -->
            <!-- BEGIN REGISTRATION FORM -->

            <!-- END REGISTRATION FORM -->
        </div>

           
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

   <!--  <div class="social-icons">
      <ul class="list-unstyled text-center mb-0">
        <li class="list-unstyled-item">
          <a href="#">
            <i class="fa fa-doc"></i>
          </a>
        </li>
        <li class="list-unstyled-item">
          <a href="#">
            <i class="fa fa-download"></i>

          </a>
        </li>
        <li class="list-unstyled-item">
          <a href="#">
            <i class="fa fa-briefcase"></i>
         
          </a>
        </li>
      </ul>
    </div> -->

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('css/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('css/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ asset('css/vendor/vide/jquery.vide.min.js')}}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ asset('js/landing.min.js')}}"></script> 
  </body>

</html>


@extends('layouts.jobboard', [
  'page_header' => 'Candidates',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' => 'active'
])

@section('content')

      <form class="form-horizontal" method="POST" action="{{ action('Auth\RegisterController@store') }}">
                        candidate
                         {{ csrf_field() }}
    <input type="text" name="text">
    <button type="submit"> sign up</button>

</form>
       <form class="form-horizontal tab-pane" method="POST" action="{{route('register')}}" id="candidate" >
                    {{ csrf_field() }}
                  <input type="hidden" name="account_type" value="candidate" />
           

                            </li>
                            <li class="careerfy-user-form-coltwo-full">
                                <label>Categories:</label>
                                <div class="careerfy-profile-select">
                                    <select name="category">
                                        <option>Sales & Marketing</option>
                                        <option>Sales & Marketing</option>
                                    </select>
                                </div>
                            </li>
                            <li class="careerfy-user-form-coltwo-full">
                                <img src="extra-images/login-robot.png" alt="">
                            </li>
                            <li class="careerfy-user-form-coltwo-full">
                  
                                <input type="submit" value="Sign Up candidate">
                            </li>
                        </ul>
                    </div>
</form>
  <div class="col-md-8 col-md-offset-2 careerfy-typo-wrap" id="JobSearchModalLogin">
        <div class="modal-inner-area">&nbsp;</div>
        <div class="modal-content-area">
            <div class="modal-box-area">

                <form>
                    <div class="careerfy-box-title">
                        <span>Choose your Account Type</span>
                    </div>
             
                    <div class="careerfy-user-options nav-tabs">
                        <ul>
                            <li class="active candidate" >
                                <a href="#candidate">
                                     <i class="careerfy-icon careerfy-user"></i>
                                     <span>Candidate</span>
                                     <small>I want to discover awesome companies.</small>
                                </a>
                            </li>
                            <li class="employee">
                                <a href="#employee" >
                                     <i class="careerfy-icon careerfy-building"></i>
                                     <span>Employer</span>
                                     <small>I want to attract the best talent.</small>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content">
                    <div id="candidate" class="tab-pane fade in active">
       <form class="form-horizontal tab-pane" method="POST" action=" " id="candidate" >
                    {{ csrf_field() }}
                  <input type="hidden" name="account_type" value="candidate" />
           
                    candidate
                    <div class="careerfy-user-form careerfy-user-form-coltwo">
                        <ul>
                            <li>
                                <label>First Name:</label>
                                <input value="Enter Your Name" onblur="if(this.value == '') { this.value ='Enter Your Name'; }" onfocus="if(this.value =='Enter Your Name') { this.value = ''; }" type="text" name="firstname">
                                <i class="careerfy-icon careerfy-user"></i>
                            </li>
                            <li>
                                <label>Last Name:</label>
                                <input value="Enter Your Name" onblur="if(this.value == '') { this.value ='Enter Your Name'; }" onfocus="if(this.value =='Enter Your Name') { this.value = ''; }" type="text" name="lastname">
                                <i class="careerfy-icon careerfy-user"></i>
                            </li>
                            <li>
                                <label>Email Address:</label>
                                <input value="Enter Your Email Address" onblur="if(this.value == '') { this.value ='Enter Your Email Address'; }" onfocus="if(this.value =='Enter Your Email Address') { this.value = ''; }" type="text" name="email" hidden="hidden">
                                <i class="careerfy-icon careerfy-mail"></i>
                            </li>
                            <li>
                                <label>Phone Number:</label>
                                <input value="Enter Your Phone Number" onblur="if(this.value == '') { this.value ='Enter Your Phone Number'; }" onfocus="if(this.value =='Enter Your Phone Number') { this.value = ''; }" type="text" name="phone_number">
                                <i class="careerfy-icon careerfy-technology"></i>
                            </li>

                                    <li>
                                <label>Password:</label>
                                <input  onblur="if(this.value == '') { this.value ='password'; }" onfocus="if(this.value =='password') { this.value = ''; }" type="password" name="password" class="form-control">
                                <i class="careerfy-icon careerfy-key"></i>
                            </li>
                            <li>
                                <label>Confirm Password:</label>
                                <input onblur="if(this.value == '') { this.value ='password'; }" onfocus="if(this.value =='password') { this.value = ''; }" type="password" name="confirm_password" class="form-control">
                                <i class="careerfy-icon careerfy-password"></i>
                            </li>
                            <li class="careerfy-user-form-coltwo-full">
                                <label>Categories:</label>
                                <div class="careerfy-profile-select">
                                    <select name="category">
                                        <option>Sales & Marketing</option>
                                        <option>Sales & Marketing</option>
                                    </select>
                                </div>
                            </li>
                            <li class="careerfy-user-form-coltwo-full">
                                <img src="extra-images/login-robot.png" alt="">
                            </li>
                            <li class="careerfy-user-form-coltwo-full">
                  
                                <input type="submit" value="Sign Up candidate">
                            </li>
                        </ul>
                    </div>
</form>
</div>
<div id="employee" class="tab-pane fade">

  <form class="form-horizontal" method="POST" action="" id="employee" >
                        {{ csrf_field() }}
employee

<input type="hidden" name="account_type" value="employer" >
                    <div class="careerfy-user-form careerfy-user-form-coltwo">
                        <ul>
                            <li>
                                <label>First Name:</label>
                                <input value="Enter Your Name" onblur="if(this.value == '') { this.value ='Enter Your Name'; }" onfocus="if(this.value =='Enter Your Name') { this.value = ''; }" type="text" name="firstname">
                                <i class="careerfy-icon careerfy-user"></i>
                            </li>
                            <li>
                                <label>Last Name:</label>
                                <input value="Enter Your Name" onblur="if(this.value == '') { this.value ='Enter Your Name'; }" onfocus="if(this.value =='Enter Your Name') { this.value = ''; }" type="text" name="lastname">
                                <i class="careerfy-icon careerfy-user"></i>
                            </li>
                            <li>
                                <label>Email Address:</label>
                                <input value="Enter Your Email Address" onblur="if(this.value == '') { this.value ='Enter Your Email Address'; }" onfocus="if(this.value =='Enter Your Email Address') { this.value = ''; }" type="text" name="email">
                                <i class="careerfy-icon careerfy-mail"></i>
                            </li>
                            <li>
                                <label>Phone Number:</label>
                                <input value="Enter Your Phone Number" onblur="if(this.value == '') { this.value ='Enter Your Phone Number'; }" onfocus="if(this.value =='Enter Your Phone Number') { this.value = ''; }" type="text" name="pb">
                                <i class="careerfy-icon careerfy-technology"></i>
                            </li>

                                    <li>
                           <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label>Password:</label>
                                <input  type="password" name="password" class="form-control">
                                <i class="careerfy-icon careerfy-mail"></i>
                                           @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </li>
                            <li>
                              <div class="form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                                <label>Confirm Password:</label>
                                <input value="password"  type="password" name="confirm_password" class="form-control">
                                <i class="careerfy-icon careerfy-technology"></i>
                                        @if ($errors->has('confirm_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('confirm_password') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </li>
                            <li class="careerfy-user-form-coltwo-full">
                                <label>Categories:</label>
                                <div class="careerfy-profile-select">
                                    <select name="category">
                                        <option>Sales & Marketing</option>
                                        <option>Sales & Marketing</option>
                                    </select>
                                </div>
                            </li>
                            <li class="careerfy-user-form-coltwo-full">
                                <img src="extra-images/login-robot.png" alt="">
                            </li>
                            <li class="careerfy-user-form-coltwo-full">
                                <input type="submit" value="Sign Up Employer">
                            </li>
                        </ul>
                    </div>
</form>
</div>
</div>

                    <div class="careerfy-box-title careerfy-box-title-sub">
                        <span>Or Sign Up With</span>
                    </div>
                    <div class="clearfix"></div>
                    <ul class="careerfy-login-media">
                        <li><a href="{{ url('/auth/facebook') }}"><i class="fa fa-facebook"></i> Sign In with Facebook</a></li>
                        <li><a href="{{ url('/auth/google') }}" data-original-title="google"><i class="fa fa-google"></i> Sign In with Google</a></li>
                        <li><a href="#" data-original-title="twitter"><i class="fa fa-twitter"></i> Sign In with Twitter</a></li>
                        <li><a href="{{ url('/auth/likedin') }}" data-original-title="linkedin"><i class="fa fa-linkedin"></i> Sign In with LinkedIn</a></li>
                    </ul>
                </form>
                
            </div>
        </div>
    </div>

@endsection
