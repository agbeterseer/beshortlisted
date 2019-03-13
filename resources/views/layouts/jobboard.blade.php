<!DOCTYPE html>
<html lang="en">
<head>
    <title>Job Board</title>
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
.responsive {
  width: 100%;
  height: auto;
}
   </style> 
   <style type="text/css"> 
    .scroll_div{
    overflow:scroll;
    overflow-x:hidden;
    overflow-y:scroll;
    height:200px;
    }
    .mini_header{
border-color: white !important;

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
        <!-- Main Content -->
        <div class="careerfy-main-content" style="margin-top: -40px;">
        @yield('content')
       
   
        </div>
        <!-- Main Content -->
        <!-- Footer -->
     @include('partials.job_footer')
        <!-- Footer -->
    </div>
     <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
    <!-- Wrapper -->

    <!-- ModalLogin Box -->
      <!-- ModalLogin Box -->
    
<!--     <div class="careerfy-modal fade careerfy-typo-wrap" id="JobSearchModalSignup">
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
    </div> -->


    <!-- Modal Signup Box -->
    <!-- <div class="careerfy-modal fade careerfy-typo-wrap" id="JobSearchModalLogin">
        <div class="modal-inner-area">&nbsp;</div>
        <div class="modal-content-area">
            <div class="modal-box-area">

                <div class="careerfy-modal-title-box">
                    <h2>Signup to your account</h2>
                    <span class="modal-close"><i class="fa fa-times"></i></span>
                </div>
             
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
             <form class="form-horizontal" method="POST" action="{{ route('register') }}">
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
                            <button type="submit"> Sign Up Candidate</button>
                            </li>
                        </ul>
                    </div>
</form>
</div>
<div id="employee" class="tab-pane fade">

  <form class="form-horizontal" method="POST" action="{{ route('register') }}" id="employee" >
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
                                <label>Password:</label>
                                <input value="password" type="password" name="email">
                                <i class="careerfy-icon careerfy-mail"></i>
                            </li>
                            <li>
                                <label>Confirm Password:</label>
                                <input value="password"  type="password" name="pb">
                                <i class="careerfy-icon careerfy-technology"></i>
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
                        <li><a href="{{ url('/auth/facebook') }}"  target="_blank"><i class="fa fa-facebook"></i> Sign In with Facebook</a></li>
                        <li><a href="{{ url('/auth/google') }}" data-original-title="google"  target="_blank"><i class="fa fa-google"></i> Sign In with Google</a></li>
                        <li><a href="#" data-original-title="twitter"><i class="fa fa-twitter"></i> Sign In with Twitter</a></li>
                        <li><a href="{{ url('/auth/likedin') }}" data-original-title="linkedin"><i class="fa fa-linkedin"></i> Sign In with LinkedIn</a></li>
                    </ul>
         
                
            </div>
        </div>
    </div> -->
      
@if(session()->has('flash-message'))
    <div class="alert alert-danger text-center" role="alert">
        {{ session()->get('flash-message') }}
    </div>
@endif

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('recruit/script/jquery-3.3.1.min.js')}}"></script>
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
      <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/masking-input.js" data-autoinit="true"></script> 
<script src="{{ asset('js/card/jquery.payform.min.js')}}" charset="utf-8"></script>
<script src="{{ asset('js/card/script.js')}}"></script>

 <script type="text/javascript">
 

 $(window).scroll(function () {
    $('.animation-test').each(function () {
        var imagePos = $(this).offset().top;
        var imageHeight = $(this).height();
        var topOfWindow = $(window).scrollTop();

        if (imagePos < topOfWindow + imageHeight && imagePos + imageHeight > topOfWindow) {
            $(this).addClass("slideRight");
        } else {
            $(this).removeClass("slideRight");
        }
    });
});

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
    //$("#end_month").hide();
    //document.getElementById('myInput').value = ''
  document.getElementById('end_month_work').value = ''; 
  document.getElementById('end_year').value = ''; 
  
});

  $("#end_month").change(function() { 
    if ( $(this).val() !=null) {

        $("#present2").show();
        $("#present").hide();        
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

 <script type="text/javascript">

 $('#job_location').change(function() {
    var location = [];
    var profession = [];
    var job_type = [];
 

    function itemExistsChecker(cboxValue) {
          
    var len = location.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (location[i] == cboxValue) {
          return true;
        }
      }
    }
          
    location.push(cboxValue);
  } 
   
  {
    $('#job_location :checked').each(function() { 
     var cboxValue = $(this).val(); 
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    }); 
 //console.log(location);
 
JobFilterIndex(location,profession,job_type);
 
  }
});

 $('#job_terms').change(function() {
    var location = [];
    var profession = [];
    var job_type = [];

    function itemExistsChecker(cboxValue) {
          
    var len = job_type.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (job_type[i] == cboxValue) {
          return true;
        }
      }
    }
          
    job_type.push(cboxValue);
  } 
   
  {
    $('#job_terms :checked').each(function() { 
     var cboxValue = $(this).val(); 
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    }); 
 //console.log(job_type);
 
JobFilterIndex(location,profession,job_type);
 
  }
});

 $('#job_profession').change(function() {
    var location = [];
    var profession = [];
    var job_type = [];

    function itemExistsChecker(cboxValue) {
          
    var len = profession.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (profession[i] == cboxValue) {
          return true;
        }
      }
    }
          
    profession.push(cboxValue);
  } 
   
  {
    $('#job_profession :checked').each(function() { 
     var cboxValue = $(this).val(); 
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue); 
    }); 
 //console.log(profession);
JobFilterIndex(location,profession,job_type);
 
  }
});
function isEmpty(obj) {
    for(var key in obj) {
        if(obj.hasOwnProperty(key))
            return false;
    }
    return true;
}
 function JobFilterIndex(location, profession, job_type){
    console.log(location);
    console.log(profession);
    console.log(job_type);
    var check_section = 'rejected';
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/jobfilter', 
            data:{
                '_token':$('input[name=_token').val(),
                'location':location,
                'profession':profession,
                'job_type':job_type,
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
             },
            success:function(data){
          console.log(data); 
           $('#job_section').empty(); 
        // window.location.reload(); 
     },
     complete:function(data){
    // Hide image container  
    $("#loader").hide();
    },
    }).done(function (data) {
  var code = data.jobs;
 
  var employement_term_list = data.employement_term_list;
  var industry_professions = data.industry_professions;
  var jobs_list = data.jobs_list;
  var candidates_name = '';
  var user = null;
  var resume_id = null;
  var job_id = data.job_id; 
   var apply_route = location.href ='/candidates/job-details';
    if(isEmpty(code['data'])) {
        $('#job_section').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
 
    }
    console.log(code['data']); 
  var job_title = '';
  var job_terms = '';
  var job_title = '';
  var category = '';
     // hired list
      $.each(code['data'], function(key, value){
            var id = value.id; 

  if(value.status === 1 && value.active === 1){

    employement_term = getJobTerms(employement_term_list, value.job_type);
    profession_name = getJobFunction(industry_professions, value.job_category);
    job_title = value.job_title;
    category = getJobTermsCategory(employement_term_list, value.job_type);
     var content2 = '<li class="careerfy-column-12"><div class="careerfy-joblisting-classic-wrap"><figure><a href="'+apply_route+'/ '+value.id+'"><img src="/img/extra-images/job-listing-logo-1.png" alt=""></a></figure><div class="careerfy-joblisting-text"><div class="careerfy-list-option"><h2><a href="">'+job_title+' </a> <span>Featured</span></h2><ul><li><a href="#" class="careerfy-option-btn careerfy-'+category+'" style="color:#ffffff;">'+employement_term+'</a></li><li><i class="careerfy-icon careerfy-maps-and-flags"></i> '+value.country+', '+value.city+'</li><li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i>'+profession_name+'</li></ul></div><div class="careerfy-job-userlist"> <a href="'+apply_route+'/'+value.id+'" class="careerfy-option-btn careerfy-'+category+'">Apply</a><a href="#" class="careerfy-job-like"><i class="fa fa-heart"></i></a></div><div class="clearfix"></div></div></div></li>';

        $('#job_section').append(content2);

}else{
console.log('am here');

}
      });
   
  });
}

function getJobTerms(terms,category) {
var employement_term = '';
  $.each(terms, function(key, value) {
      
        if (value['id'] === category) {  
 
             employement_term = value['name'];
             }
  });
 
  return employement_term;
}

function getJobTermsCategory(terms,category) {
var category = '';
  $.each(terms, function(key, value) {
      
        if (value['id'] === category) {  
 
             category = value['category'];
             }
  });
 
  return category;
}

function getJobFunction(i_professions, job_type) {
var profession_name = '';

  $.each(i_professions, function(key, value) {
 
        if (value['id'] === job_type) {  
 
             profession_name = value['name'];
             }
  });
    
  return profession_name;
}
      

</script>
 <script>
    $(".delete").on("submit", function(){
        return confirm("Do you want to delete this item?");
    });
  $(":input").inputmask(); 
$("#phone").inputmask({"mask": "(999) 999-9999"});
</script>
<script type="text/javascript">

    document.addEventListener('DOMContentLoaded', () => {

  // Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach( el => {
      el.addEventListener('click', () => {

        // Get the target from the "data-target" attribute
        const target = el.dataset.target;
        const $target = document.getElementById(target);

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});

    var expandCollapse = function(){
        if ( $(window).width() < 768 ) {
            $(function(){
                // add a class .collapse to a div .showHide
                $('.showHide').addClass('collapse'); //showHide
                // set display: "" in css for the toggle button .btn.btn-primary
                $('.hide_right').removeClass('collapse');// removes display property to make it visible
            });
        }
        else {
            $(function(){
                // remove a class .collapse from a div .showHide
                $('.showHide').removeClass('collapse');
                // set display: none in css for the toggle button .btn.btn-primary  
                $('.hide_right').css('display', 'none');// hides button display on bigger screen
            });
        }
    }
    $(window).resize(expandCollapse); // calls the function when the window first loads    
</script>

</body>

</html>
