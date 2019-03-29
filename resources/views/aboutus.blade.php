<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us</title>
    @include('partials.job_board_header') 
    <!-- Css -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/flaticon.css" rel="stylesheet">
    <link href="css/slick-slider.css" rel="stylesheet">
    <link href="plugin-css/fancybox.css" rel="stylesheet">
    <link href="plugin-css/plugin.css" rel="stylesheet">
    <link href="css/color.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic-ext,vietnamese" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
      <style type="text/css">
              body{background-color: #ffffff;}
         </style>
    <!-- Wrapper -->
    <div class="careerfy-wrapper">

        <!-- Header -->
     @include('partials.job_menu')
        <!-- Header -->
        
        <!-- SubHeader -->
 @include('partials.employee_breadcomb') 
        <!-- SubHeader -->

        <!-- Main Content -->
        <div class="careerfy-main-content">
            
            <!-- Main Section -->
            <div class="careerfy-main-section careerfy-about-text-full">
                <div class="container">
                    <div class="row">

                        <div class="col-md-6 careerfy-typo-wrap">
                            <div class="careerfy-about-text">
                                <h2>About Our Company</h2>
                                {!! $page->content !!}  
                            </div>
                        </div>
                        <div class="col-md-6 careerfy-typo-wrap"><div class="careerfy-about-thumb"><img src="{{asset('extra-images/about-us-thumb.png')}}" alt=""></div></div>
                        <div class="col-md-12 careerfy-typo-wrap">
                            <div class="careerfy-modren-counter">
                                <ul class="row">
                                    <li class="col-md-4">
                                        <i class="careerfy-icon careerfy-paper careerfy-color"></i>
                                        <span class="word-counter">{{$jobs_count}}</span>
                                        <small>Jobs Addes</small>
                                    </li>
                                    <li class="col-md-4">
                                        <i class="careerfy-icon careerfy-resume-document careerfy-color"></i>
                                        <span class="word-counter">{{$resume_count}}</span>
                                        <small>Active Resumes</small>
                                    </li>
                                    <li class="col-md-4">
                                        <i class="careerfy-icon careerfy-briefcase careerfy-color"></i>
                                        <span class="word-counter">{{$job_match_count}}</span>
                                        <small>Positions Matched</small>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Main Section -->

            <!-- Main Section -->
 
            <!-- Main Section -->

            <!-- Main Section -->
            <div class="careerfy-main-section careerfy-classic-services-full">
                <div class="container">
                    <div class="row">
                        
                        <div class="careerfy-typo-wrap">
                            <section class="careerfy-fancy-title">
                                <h2>Our Featured Services</h2>
                                <p>A better career is out there. We'll help you find it to use.</p>
                            </section>
                            <div class="careerfy-classic-services">
                                <ul class="row">
                           <!--          <li class="col-md-4">
                                        <span>1</span>
                                        <i class="careerfy-icon careerfy-coding"></i>
                                        <h2>Cross Browsers</h2>
                                        <p>Etiam lobortis egestas orci vitaa laort ed at nunc nec mas pretiuem lao.</p>
                                    </li> -->
                                   <li class="col-md-4">
                                        <span>1</span>
                                        <i class="careerfy-icon careerfy-24-hours"></i>
                                        <h2>Quick Support</h2>
                                        <p>Our team are hands on to giving you a technical aid if need be.</p>
                                    </li>
                                    <li class="col-md-4">
                                        <span>2</span>
                                        <i class="careerfy-icon careerfy-support"></i>
                                        <h2>Easy Online Resume</h2>
                                        <p>Our system is build to hand detailed online resume. You as well have multiple Resume Profile.</p>
                                    </li>
                                    <li class="col-md-4">
                                        <span>3</span>
                                        <i class="careerfy-icon careerfy-pen"></i>
                                        <h2>Modern CV Templates</h2>
                                        <p>Make use of our state-of-the-art templates to generate your resume.</p>
                                    </li>
                
                           <!--          <li class="col-md-4">
                                        <span>5</span>
                                        <i class="careerfy-icon careerfy-company-workers"></i>
                                        <h2>Permanent Staffing</h2>
                                        <p>Etiam lobortis egestas orci vitaa laort ed at nunc nec mas pretiuem lao.</p>
                                    </li>
                                    <li class="col-md-4">
                                        <span>6</span>
                                        <i class="careerfy-icon careerfy-graphic"></i>
                                        <h2>Payroll Management</h2>
                                        <p>Etiam lobortis egestas orci vitaa laort ed at nunc nec mas pretiuem lao.</p>
                                    </li> -->
                                </ul>
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

        </div>
        <!-- Main Content -->
        
        <!-- Footer -->
  @include('partials.job_footer')
        <!-- Footer -->

    </div>
    <!-- Wrapper -->

    
    <!-- Modal Signup Box -->
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
@include('partials.job_board_javascript')

</body>

</html>
