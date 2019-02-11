<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/style3.css')}}">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous"> -->
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('recruit/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{ asset('recruit/css/flaticon.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic-ext,vietnamese" rel="stylesheet">

                  <link href="{{ asset('css/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css')}}" rel="stylesheet" type="text/css" />

         <style type="text/css">
              body{background-color: #FAFAFA;}
         </style>
<style type="text/css">
    .header {
  padding: 10px 16px;
  background: #555;
  color: #f1f1f1;
  position: relative;
}

/* Page content */
.content {
  padding: 16px;
}

/* The sticky class is added to the header with JS when it reaches its scroll position */
.sticky {
  position: fixed;
  top: 0;
  width: 100%
}

/* Add some top padding to the page content to prevent sudden quick movement (as the header gets a new position at the top of the page (position:fixed and top:0) */
.sticky + .content {
  padding-top: 102px;
}


</style>
</head> 
<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>

            <div class="sidebar-header">
                <h3>beShortlisted</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Dummy Heading</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">  <i class="fas fa-home"></i>Home</a>
                     <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fas fa-briefcase"></i>About</a>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-copy"></i>Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Candidate</a>
                </li>
                <li>
                    <a href="#">Employer</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
                  <li>
                    <a href="#">Logout</a>
                </li>
               <li>
                    <a href="#">Login</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="" class="article">Request Employer Account</a>
                </li>
                <li>
                    <a href="" class="download">Back to article</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  header myHeader-->
        <div id="content1">
           
            <nav class="navbar navbar-expand-lg navbar-light bg-light header navbar-fixed-top" id="myHeader">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button> 
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                              <form class="form-inline" id="search">
                                <select name="" class="form-control col-md-4">
                                    <option value="Information Technology">Information Technology</option>
                                </select>
                                <select name="" class="form-control col-md-3">
                                    <option value="">Location</option>
                                    <option value="Information Technology">Information Technology</option>
                                </select>
                                <select name="" class="form-control col-md-3">
                                    <option value="">Industry</option>
                                    <option value="Information Technology">Information Technology</option>
                                </select>

    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Find Job</button>
  </form>
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                      <!--   <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <i class="fas fa-home"></i>
                            </li> -->
                       
                        </ul>
                    </div>
                </div>
            </nav>

     <div class="careerfy-banner careerfy-typo-wrap">
            <span class="careerfy-banner-transparent"></span>
            <div class="careerfy-banner-caption">
                <div class="container">
                    <div class="text-content">                    <h1>Aim Higher. Reach Farther. Dream Bigger.</h1>
                    <p>A better career is out there. We'll help you find it.</p> </div>

                    <form class="careerfy-banner-search" action="{{route('job.listing')}}" method="GET" id="find_jobs">
                     
                        
                        <div class=" col-md-4 careerfy-select-style">
                                    <select name="s"  required="required">
                                    <option value="">Select Industry</option>
                                  
                                    </select>
                                </div>
                               
                             
             <div class=" col-md-2 careerfy-select-style"> 
                                    <select name="location"  required="required">
                                    <option value="">Select City</option>
                               
                                    </select>
                                </div> 
                         
                                <div class="col-md-4 careerfy-select-style">
                                    <select name="job_function" required="required" >
                                    <option value="">Select Job Function</option>
                                   
                                    </select>
                                </div>
                            <div class="col-md-1 careerfy-banner-submit"> <input type="submit" value="Find A Job"> <i class="careerfy-icon careerfy-search-box"></i> </div>

                      
                    </form> 
                      

                 
                    <div class="careerfy-banner-btn">
                        <a href="{{route('show.resume')}}" class="careerfy-bgcolorhover"><i class="careerfy-icon careerfy-up-arrow"></i> Build Your Resume</a>
                        <a href="{{route('post.jobs')}}" class="careerfy-bgcolorhover"><i class="careerfy-icon careerfy-portfolio"></i> Hiring? Post a job for free</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner -->
 <div class="container">
   
            <h2>Collapsible Sidebar Using Bootstrap 4</h2>
            <p
DigitalOcean <support@support.digitalocean.com>
Thu, 6 Dec 2018, 15:34
to me

Please verify that it’s you

Your sign in attempt seems a little different than usual. This could be because you are signing in from a different device or a different location.

If you are attempting to sign-in, please use the following code to confirm your identity:

217234

Here are the details of the sign-in attempt:
Thursday, December 12/06/18 at 15:34 WAT
Account: agbe.terseer@gmail.com
Location: NG
IP Address: 105.112.113.48
Operating system: Windows 10 64-bit
Browser: Chrome

If this wasn’t you, please reset your password. Like always, if you have any questions please respond to this email to open a support ticket.
</p>
            <p>
DigitalOcean <support@support.digitalocean.com>
Thu, 6 Dec 2018, 15:34
to me

Please verify that it’s you

Your sign in attempt seems a little different than usual. This could be because you are signing in from a different device or a different location.

If you are attempting to sign-in, please use the following code to confirm your identity:

217234

Here are the details of the sign-in attempt:
Thursday, December 12/06/18 at 15:34 WAT
Account: agbe.terseer@gmail.com
Location: NG
IP Address: 105.112.113.48
Operating system: Windows 10 64-bit
Browser: Chrome

If this wasn’t you, please reset your password. Like always, if you have any questions please respond to this email to open a support ticket.
</p>

            <div class="line"></div>

            <h2>Lorem Ipsum Dolor</h2>
            <p>
DigitalOcean <support@support.digitalocean.com>
Thu, 6 Dec 2018, 15:34
to me

Please verify that it’s you

Your sign in attempt seems a little different than usual. This could be because you are signing in from a different device or a different location.

If you are attempting to sign-in, please use the following code to confirm your identity:

217234

Here are the details of the sign-in attempt:
Thursday, December 12/06/18 at 15:34 WAT
Account: agbe.terseer@gmail.com
Location: NG
IP Address: 105.112.113.48
Operating system: Windows 10 64-bit
Browser: Chrome

If this wasn’t you, please reset your password. Like always, if you have any questions please respond to this email to open a support ticket.
</p>

            <div class="line"></div>

            <h2>Lorem Ipsum Dolor</h2>
            <p>
DigitalOcean <support@support.digitalocean.com>
Thu, 6 Dec 2018, 15:34
to me

Please verify that it’s you

Your sign in attempt seems a little different than usual. This could be because you are signing in from a different device or a different location.

If you are attempting to sign-in, please use the following code to confirm your identity:

217234

Here are the details of the sign-in attempt:
Thursday, December 12/06/18 at 15:34 WAT
Account: agbe.terseer@gmail.com
Location: NG
IP Address: 105.112.113.48
Operating system: Windows 10 64-bit
Browser: Chrome

If this wasn’t you, please reset your password. Like always, if you have any questions please respond to this email to open a support ticket.
</p>

            <div class="line"></div>

            <h3>Lorem Ipsum Dolor</h3>
            <p>
DigitalOcean <support@support.digitalocean.com>
Thu, 6 Dec 2018, 15:34
to me

Please verify that it’s you

Your sign in attempt seems a little different than usual. This could be because you are signing in from a different device or a different location.

If you are attempting to sign-in, please use the following code to confirm your identity:

217234

Here are the details of the sign-in attempt:
Thursday, December 12/06/18 at 15:34 WAT
Account: agbe.terseer@gmail.com
Location: NG
IP Address: 105.112.113.48
Operating system: Windows 10 64-bit
Browser: Chrome

If this wasn’t you, please reset your password. Like always, if you have any questions please respond to this email to open a support ticket.
.</p>
   
 </div>



        </div>
    </div>

    <div class="overlay"></div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });

        // When the user scrolls the page, execute myFunction 
window.onscroll = function() {myFunction()};
// Get the header
var header = document.getElementById("myHeader");
// Get the offset position of the navbar
var sticky = header.offsetTop;
// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
    </script>
<script>
$(window).scroll(function() {
    if ($(this).scrollTop()>300)
     {
        $('.myDiv').hide(1000);
     }
    else
     {
      $('.myDiv').show(1000);
     }
 });
</script>
 

 
</body>

</html>