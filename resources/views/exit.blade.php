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
