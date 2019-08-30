<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us</title>
    @include('partials.job_board_header') 
    <!-- Css -->
    
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
                            <div class="careerfy-about-text" style="text-align: justify; line-height: 46px; ">
                                <h2>About Us</h2>
                             
                                {!!  $about->history !!}  
                                                           
                            </div>
                        </div>
                              <div class="col-md-6 careerfy-typo-wrap"><div class="careerfy-about-thumb"><img src="{{asset('/uploads/banners')}}/{{$about->banner}} " alt=""></div></div>

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
                            </section>
                            <div class="careerfy-classic-services">
                                  <ul class="row">
                                    <li class="col-md-4">
                                        <span>1</span>
                                        <i class="careerfy-icon careerfy-coding"></i>
                                        <h2>Our Vision</h2>
                                       {!! $about->vision !!}
                                    </li>
                                    <li class="col-md-4">
                                        <span>2</span>
                                        <i class="careerfy-icon careerfy-support"></i>
                                        <h2>Our Mission</h2>
                                        {!! $about->mission !!} 
                                    </li>
                                    <li class="col-md-4">
                                        <span>3</span>
                                        <i class="careerfy-icon careerfy-pen"></i>
                                        <h2>Our Core Values</h2>
                                        {!!  $about->values !!} 
                                    </li>
                                    @if($about->philosophy)
                                    <li class="col-md-4">
                                        <span>4</span>
                                        <i class="careerfy-icon careerfy-24-hours"></i>
                                        <h2>Philosophy</h2>
                                       {!! $about->philosophy !!}
                                    </li>
                                    @endif
<!--                                     <li class="col-md-4">
                                        <span>5</span>
                                        <i class="careerfy-icon careerfy-company-workers"></i>
                                        <h2>Permanent Staffing</h2>
                                        <p>Etiam lobortis egestas orci vitaa laort ed at nunc nec mas pretiuem lao.</p>
                                    </li> -->
<!--                                     <li class="col-md-4">
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
