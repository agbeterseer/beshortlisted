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
</head>
<body>
<script>
 window.Laravel = <?php echo json_encode([
 'csrfToken' => csrf_token(),
 ]); ?>
</script>
<style type="text/css">

body, h1, h2, h3, h4, h5, h6 {
    font-family: "Open Sans",sans-serif;
}
.careerfy-main-content, .careerfy-main-section {
    float: left;
    width: 100%;
}
.careerfy-main-content {
    padding: 50px 0px 10px 0px;
}
.careerfy-column-12 {
    float: left;
    padding: 0px 15px;

}
.careerfy-joblisting-classic > ul > li {
    margin-bottom: 20px;
}
.careerfy-job ul li {
    list-style: none;
}
.careerfy-typo-wrap li {
    line-height: 28px;
}
.careerfy-column-12 {
    width: 100%;
}

.careerfy-option-btn.careerfy-blue {
    background-color: #186fc9;
}

.careerfy-job-userlist .careerfy-option-btn {
    float: left;
    margin-right: 15px;
    min-width: 104px;
    text-align: center;
}

 .nac{
    padding-top: 15px;
    padding-bottom: 15px;
 }
 h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
    color: #333333;
}

a {
    text-shadow: none;
    color: #337ab7;
}
a, ul.main_menu a:hover {
    text-decoration: none;
}
 
</style>

 
    <!-- Wrapper -->
    <div class="careerfy-wrapper">
        <!-- Header -->
 
        <!-- Header -->     
        <!-- Banner -->
        <!-- Banner -->
        <!-- Main Content -->
        <div class="careerfy-main-content" style="margin-top: -50px;">
<style type="text/css">
    .make_x{
        background-color: #ffffff; border-color: #ffffff; color: red;
    }
    .make_red{
        background-color: red; border-color: red;
    }

</style>
             
 
  <div class="careerfy-main-section">
                <div class="container">
                    <div class="row">  
  <div class="careerfy-column-12 careerfy-typo-wrap">
        <div class="careerfy-main-content">
  
            <div class="careerfy-main-section">
                <div class="container">
                    <div class="row">
            
                        <div class="careerfy-column-9 careerfy-typo-wrap">
                            <div class="careerfy-typo-wrap">
                                <!-- FilterAble -->
                           
                                <!-- FilterAble -->
                                <!-- JobGrid -->
                                <div class="careerfy-job careerfy-joblisting-classic">
                                    <ul >
                                        <li class="careerfy-column-12">
                                            <div class="careerfy-joblisting-classic-wrap">
                                                <figure><a href="#"><img src="/img/extra-images/job-listing-logo-1.png" alt=""></a></figure>
                                                <div class="careerfy-joblisting-text">
                                                    <div class="careerfy-list-option">
                                              <h2><a href=" "> {{$content['tag']->job_title}} </a> <span>Featured</span></h2>
                                                <ul>
                                        <li><a href="#"> {{ $content['email_address'] }} </a></li>
                                        <li><i class="careerfy-icon careerfy-maps-and-flags"></i> {{ $content['country'] }}, {{ $content['city'] }}</li>
                                        <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> 
                                        {{ $content['job_category'] }} </li> 
                                        </ul>
                                                    </div>
                                                    <div class="careerfy-job-userlist">
                                                        <a href="#" class="careerfy-option-btn">Freelance</a>
                                                        <a href="{{$content['apply']}}" class="careerfy-job-like"><i class="fa fa-heart"></i>Apply</a>
                                                    </div>
                                                <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </li>
                                         
                                      
                                <!-- Pagination -->
                      
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Main Section -->
    <!-- Main Section -->
  
        <!-- Footer -->
    </div>
   
    
   </div>
   </div>
   </div>
  </div>
   </div>
  
</body>

</html>
