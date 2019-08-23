<!DOCTYPE html>
<html lang="en">

<head>

    <title>Job Board</title>
    
    <!-- Css -->
 
        @include('partials.job_board_header')
<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    
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
   </style>
   <style type="text/css">
    body{background-color: #FAFAFA;}
</style>
 
</head>

<body>
 
    <!-- Wrapper -->
    <div class="careerfy-wrapper">

        <!-- Header -->

 <header id="careerfy-header" class="careerfy-header-one">
            <div class="container">
                <div class="row">
                    <aside class="col-md-2">
  <a href="{{asset('/')}}" class="careerfy-logo" style="margin-top: 10px;" ><img src="{{asset('logo/logo2.jpg')}}" alt="TREEPHR" width="200" height="00">  </a> 
                
                   <!--   <a href="#" class="careerfy-logo" style="margin-top: 10px;"><img src="{{asset('logo/logo2.jpg')}}"" alt=""></a> --></aside> 
                    <aside class="col-md-6">
                        <nav class="careerfy-navigation">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#careerfy-navbar-collapse-1" aria-expanded="false">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="careerfy-navbar-collapse-1">
                                <ul class="navbar-nav">
                          @foreach($menus as $menu) 
                       <li> <a href="{{$menu->routes}}"> {{$menu->name}}</a> </li>
                          @endforeach 
                                </ul>
                            </div>
                      </nav>
                    </aside>
                    <aside class="col-md-4 showHide">
                        <div class="careerfy-right">
                            <ul class="careerfy-user-section hide_inner">
                                <li><a class="careerfy-color" href="{{route('sign.up')}}">Register</a></li>
                                <li><a class="careerfy-color" href="{{route('auth.login')}}">Sign in</a></li>
                            </ul>
                              @if(Auth::user())
                                 
                            <a href="{{route('post.jobs')}}" class="careerfy-simple-btn careerfy-bgcolor post_job"><span> <i class="careerfy-icon careerfy-arrows-2"></i> Post Job</span></a>
                             @endif
                             @if(!Auth::user())
                          <a href="{{route('post.jobs')}}" class="careerfy-simple-btn careerfy-bgcolor post_job "><span> <i class="careerfy-icon careerfy-arrows-2"></i> Post Job</span></a>
                            @endif
                        </div>
                    </aside>
                </div>
            </div>
        </header>

  
        <!-- Header -->
        
        <!-- Banner v #1E3142 -->
        <!-- Banner -->

        <!-- Main Content -->
        <div class="careerfy-main-content" style="margin-top: -50px;">
        
            <!-- Main Section -->

  
 <div class="space">&nbsp;</div>
  <div class="col-md-6 col-md-offset-3 careerfy-typo-wrap">
     <div class="portlet light bordered">
        <div class="modal-inner-area">&nbsp;</div>
 <div align="center"> <h2>Login</h2></div>
           
           @if ($errors->has('credentials'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('credentials') }}</strong>
                                    </span>
                                    @endif
 
                    <div id="candidate" class="tab-pane fade in active"> 
              <form class="login-form" role="form" method="POST" action="{{ route('login') }}" id="candidate">
                {{ csrf_field() }}
    <div class="careerfy-user-form">
                        <ul>
                            <li>
                                <label>Email Address:</label>
                                <input  type="text" name="email">
                                <i class="careerfy-icon careerfy-mail"></i>
                                                     @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </li>
                            <li>
                                <label>Password:</label>
                                <input  type="password" name="password"  class="form-control">
                                <i class="careerfy-icon careerfy-multimedia"></i>

                      @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </li>
                            <li>
                                <input type="submit" value="Sign In">
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                        <div class="careerfy-user-form-info">
                         <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>| <a href="{{route('sign.up')}}">Sign Up</a>
                            <div class="careerfy-checkbox">
                                <input type="checkbox" id="r10" name="rr" />
                                <label for="r10"><span></span> Remember Password</label>
                            </div>
                        </div>
                    </div>
</form>
                    <div class="careerfy-box-title careerfy-box-title-sub">
                        <span>Or Sign In With</span>
                    </div>
                    <div class="clearfix"></div>
                    <ul class="careerfy-login-media">
                  <li><a href="{{ url('/auth/facebook') }}"><i class="fa fa-facebook"></i> Sign In with Facebook</a></li>
                        <li><a href="{{ url('/auth/google') }}" data-original-title="google"><i class="fa fa-google"></i> Sign In with Google</a></li>
                    </ul>

                    </div>
  
                <div class="clearfix"></div> 
                      <div class="clearfix"></div>
        
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

        </div>
        <!-- Main Content -->
        
        <!-- Footer -->
  
     @include('partials.job_footer')
        <!-- Footer -->

    </div>
    <!-- Wrapper -->

    <!-- ModalLogin Box -->
      <!-- ModalLogin Box -->
   
    <!-- Modal Signup Box -->
 
      
@if(session()->has('flash-message'))
    <div class="alert alert-danger text-center" role="alert">
        {{ session()->get('flash-message') }}
    </div>
@endif

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('recruit/script/jquery.js')}}"></script>
    <script src="{{ asset('recruit/script/bootstrap.js')}}"></script>

 <script type="text/javascript">
    function password_generator( len ) {
    var length = (len)?(len):(10);
    var string = "abcdefghijklmnopqrstuvwxyz"; //to upper 
    var numeric = '0123456789';
    var punctuation = '!@#$%^&*()_+~`|}{[]\:;?><,./-=';
    var password = "";
    var character = "";
    var crunch = true;
    while( password.length<length ) {
        entity1 = Math.ceil(string.length * Math.random()*Math.random());
        entity2 = Math.ceil(numeric.length * Math.random()*Math.random());
        entity3 = Math.ceil(punctuation.length * Math.random()*Math.random());
        hold = string.charAt( entity1 );
        hold = (password.length%2==0)?(hold.toUpperCase()):(hold);
        character += hold;
        character += numeric.charAt( entity2 );
        character += punctuation.charAt( entity3 );
        password = character;
    }
    password=password.split('').sort(function(){return 0.5-Math.random()}).join('');
    return password.substr(0,len);
}
 
</script>
 
    <script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
</script>
  
  
 
</body>

</html>