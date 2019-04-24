
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Reset Password</title>
    
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
                    <aside class="col-md-2"> <a href="{{asset('/')}}" class="careerfy-logo" style="margin-top: 0px;"><img src="{{asset('logo/logo2.jpg')}}" alt="TREEPHR"></a> </aside>
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
                            <li class="active"><a href="{{asset('/')}}">Home</a></li>  
                            <li><a href="{{route('list.job', 'job-list')}}"> Jobs</a> </li>
                                  <li><a href="{{route('employer_infor')}}">Employer</a></li> 
                                <li><a href="{{route('candidates')}}">Candidates</a> </li>
                       <li><a href="#">Contact</a>  
                    </li> 
                 </div>
                      </nav>
                    </aside>
                    <aside class="col-md-4">
                        <div class="careerfy-right">
                            <ul class="careerfy-user-section hide_inner">
                                  @if(!Auth::user())
                                <!-- <li>  <a class="careerfy-color careerfy-open-signin-tab" href="#">DOOO</a></li> -->
                               <li><a class="careerfy-color" href="{{ route('sign.up') }}">Register</a>
                               </li> 
                               <li><a class="careerfy-color " href="{{ url('/login') }}">Sign in</a></li>
                                @else 
                              
                                  <li> <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="icon-key"></i> Logout 
                                        </a>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> {{ csrf_field() }}
                                        </form> </li>
                                @endif
                            </ul>
                             @if(Auth::user())
                                 
                            <a href="{{route('post.jobs')}}" class="careerfy-simple-btn careerfy-bgcolor"><span> <i class="careerfy-icon careerfy-arrows-2"></i> Post Job</span></a> 
                            @endif
                             @if(!Auth::user())
                          <a href="{{route('post.jobs')}}" class="careerfy-simple-btn careerfy-bgcolor"><span> <i class="careerfy-icon careerfy-arrows-2"></i> Post Job</span></a>
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
        
        <!-- Main Section  --> 
 <div class="space">&nbsp;</div>
  <div class="col-md-6 col-md-offset-3 careerfy-typo-wrap">
     <div class="portlet light bordered">
        <div class="modal-inner-area">&nbsp;</div>
 <div align="center"> <h2>Reset Password</h2></div>
                         @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif   
                    <div id="candidate" class="tab-pane fade in active">

                   <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                    {{ csrf_field() }}
                       <input type="hidden" name="token" value="{{ $token }}">


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
                                 <input id="password" type="password" class="form-control" name="password" required>
                                <i class="careerfy-icon careerfy-multimedia"></i>
                               @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </li> 
                            <li>
                                <label>Confirm Password:</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required> 
                                <i class="careerfy-icon careerfy-multimedia"></i>
                   @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </li> 
                            <li>
                                                <div class="col-md-6 col-md-offset-4">
                                <input type="submit" value="Reset Password">
                            </div>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </form> 
                    <div class="clearfix"></div> 
                    </div> 
    </div>
</div>
 
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
 </script>

 
</body>

</html>
