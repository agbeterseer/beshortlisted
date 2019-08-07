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
    <!-- Wrapper -->
    <div class="careerfy-wrapper">
        <!-- Header -->
@include('partials.job_menu')
        <!-- Header -->     
        <!-- Banner -->
        <!-- Banner -->
        <!-- Main Content -->
        <div class="careerfy-main-content" style="margin-top: -50px;">
 
<style type="text/css">
    .scroll_div{
    overflow:scroll;
    overflow-x:hidden;
    overflow-y:scroll;
    height:200px;
    }
 
 .white_background{
  background-color: #ffffff;
 }
</style>
@include('partials.employee_breadcomb')
         @if(Session()->has('error'))
        <div class="alert alert-danger"> 
        {!! Session::get('error') !!}
        </div>
        @endif
     <!-- SubHeader careerfy-subheader-without-bg--> 
        <!-- SubHeader -->

        <!-- Main Content -->
        <div class="careerfy-main-content">
            <!-- Main Section -->
            <div class="careerfy-main-section">
                <div class="container">
                    <div class="row">
                         <?php  $number_of_applicants = \App\Application::where('tag_id', $tag->id)->count(); ?>
                        <!-- Job Detail List -->
                        <div class="careerfy-column-12">
                            <div class="careerfy-typo-wrap">
                                <figure class="careerfy-jobdetail-list">
                                    <span class="careerfy-jobdetail-listthumb"> <figure><a href=" "><img src="{{asset('/img/job.png')}}" alt=""></a></figure></span>
                                    <figcaption>
                                        <h2>{{$tag->job_title}}</h2>
                                        <span><small class="careerfy-jobdetail-type">@foreach($employement_terms as $employement_term) @if($tag->job_type === $employement_term->id)  {{$employement_term->name}} @endif @endforeach
                                        </small><!-- <small class="careerfy-jobdetail-postinfo">Posted now</small> --></span>
                                        <ul class="careerfy-jobdetail-options">
                                            <li><i class="fa fa-map-marker"></i> {{$tag->full_address}} <!-- <a href="#" class="careerfy-jobdetail-view">View om Map</a> --></li>
                                            <li><i class="careerfy-icon careerfy-calendar"></i> <strong>Post Date:</strong> {{ date('M d, Y', strtotime($tag->created_at)) }} </li>
                                            <li><i class="careerfy-icon careerfy-calendar"></i> <strong>Apply Before:</strong> {{ date('M d, Y', strtotime($tag->end_date)) }}</li>
                                            <li><i class="careerfy-icon careerfy-summary"></i> Applications {{$number_of_applicants}}</li>
                                            <!-- <li><a href="#"><i class="careerfy-icon careerfy-view"></i> Views 3806</a></li> -->
                                        </ul>
                                        <a href="{{route('apply.job', $tag->id)}}" class="careerfy-jobdetail-type active"><i class="careerfy-icon careerfy-add-list"></i> Apply</a>
                                        <!-- <a href="#" class="careerfy-jobdetail-btn"><i class="careerfy-icon careerfy-envelope"></i> Email Job</a> -->
                                                         <ul class="careerfy-jobdetail-media">
                                            <li><span>Share:</span></li>
                                             <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fbeshortlisted.com%2Fjob%2Fjob-descriptions%2F{{$tag->id}}%2F&amp;src=sdkpreparse" data-original-title="facebook" class="careerfy-icon careerfy-facebook-logo-in-circular-button-outlined-social-symbol" data-href="https://beshortlisted.com/job/job-descriptions/{{$tag->id}}"></a></li> 
                                            <li><a href="https://twitter.com/share?url=https://beshortlisted.com/job/job-descriptions/{{$tag->id}}" data-original-title="twitter" class="careerfy-icon careerfy-twitter-circular-button"></a></li>
                                            <li> 
   <a class="careerfy-icon careerfy-linkedin" href="https://www.linkedin.com/shareArticle?url=https%3A%2F%2Fbeshortlisted.com%2Fjob-descriptions%2F{{$tag->id}}%2F&amp;title=job+description&amp;mini=true" target="_blank" data-original-title="linkedin" class="careerfy-icon careerfy-linkedin"> </a>
 

            </li>
                                        </ul> 
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <!-- Job Details List -->
 
                        <!-- Job Detail Content --> 
                        <div class="careerfy-column-8" >
                            <div class="careerfy-typo-wrap">
                                <div class="careerfy-jobdetail-content white_background">
                                <div class="careerfy-content-title"><h2>Job Summary</h2></div>
                                     <div class="careerfy-description">
                                            @if($tag->job_summary)
                                        <p>{!! $tag->job_summary !!}</p>
                                        @else
                                        N/A
                                        @endif
                                    </div>
                                    <div class="careerfy-content-title"><h2>Job Description</h2></div>
                                    <div class="careerfy-jobdetail-services">
                                        <ul class="careerfy-row">
                                            <li class="careerfy-column-4">
                                                <i class="careerfy-icon careerfy-salary"></i>
                                                <div class="careerfy-services-text"><strong>Salary Range</strong> <small>{{$tag->salary_range}}</small></div>
                                            </li>
                                            <li class="careerfy-column-4">
                                                <i class="careerfy-icon careerfy-social-media"></i>
                                                <div class="careerfy-services-text"><strong>Career Level </strong><small> @foreach($jobcareer_levels as $jobcareer_level) @if($tag->job_level === $jobcareer_level->id) {{$jobcareer_level->name}} @endif @endforeach</small></div>
                                            </li>
                                            <li class="careerfy-column-4">
                                                <i class="careerfy-icon careerfy-briefcase"></i>
                                                <div class="careerfy-services-text"><strong>Experience </strong><small> {{$tag->experience}} Years <div style="color: #ffffff;">Experienced (Non-Manager)</div></small></div>
                                            </li>
                                            <li class="careerfy-column-4">
                                                <i class="careerfy-icon careerfy-user"></i>
                                                <div class="careerfy-services-text"><strong>Gender </strong><small> {{$tag->gender}}<div style="color: #ffffff;">Experienced (Non-Manager)</div> </small></div>
                                            </li>
                                            <li class="careerfy-column-4">
                                                <i class="careerfy-icon careerfy-network"></i>
                                                <div class="careerfy-services-text"><strong>Industry</strong> <small>@foreach($industries as $industry) @if($tag->industry === $industry->id) {{$industry->name}} @endif @endforeach</small></div>
                                            </li>
                                            <li class="careerfy-column-4">
                                                <i class="careerfy-icon careerfy-mortarboard"></i>
                                                <div class="careerfy-services-text">Qualification <small>@foreach($educational_levels as $educational_level) @if($tag->qualification === $educational_level->id) {{$educational_level->name}} @endif @endforeach   </small></div>
                                            </li>
                                        </ul>
                                    </div>
                                      <div class="careerfy-content-title"><h2>Technical Requirements</h2></div> 
                                    <div class="careerfy-description">
                                        {!! $tag->description !!}
                                    </div>
                            
                                    <div class="careerfy-content-title"><h2>Job Funtions</h2></div>
                                    <div class="careerfy-description">
                                    @if($tag->job_roles)  
                                     {!! $tag->job_roles !!}
                                    @else
                                        N/A
                                    @endif
                                    </div>
 
 

  <div class="space">&nbsp;</div> 
  <div class="space">&nbsp;</div>
  <div class="space">&nbsp;</div>
  <div class="space">&nbsp;</div>

    <!-- <span style="color: red;">Kindly answer the evaluation question(s) below to begin your screening process</span> -->
     <a href="{{route('apply.job', $tag->id)}}" class="careerfy-applyjob-btn"><i class="careerfy-icon careerfy-add-list"></i>APPLY </a>
                                </div> 

                                <!-- display jobs in the same industry -->
                                <div class="careerfy-section-title"><h2>Other jobs you may like</h2></div>
                                <div class="careerfy-job careerfy-joblisting-classic careerfy-jobdetail-joblisting"> 
                                    <ul class="careerfy-row">
                                       @foreach($get_Job_by_common_industries as $common_job) 
                                        <li class="careerfy-column-12">
                                            <div class="careerfy-joblisting-classic-wrap">
                                                <figure><a href="#"><img src="{{asset('/img/job.png')}}" alt=""></a></figure>
                                                <div class="careerfy-joblisting-text">
                                                    <div class="careerfy-list-option">
                                                        <h2><a href="{{route('job.description', $common_job->id)}}"> {{$common_job->job_title}}</a> <!-- <span>Featured</span> --></h2>
                                                        <ul>
                                                      
                                                           <li style="color: #F1630D";><i class="careerfy-icon careerfy-filter-tool-black-shape"></i>  
                            <strong>Apply Before:</strong> {{ date('M d, Y', strtotime($common_job->end_date)) }}</li>
                                                            <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> @foreach($industry_professions as $profession) @if($profession->id === $common_job->job_category){{$profession->name}} @endif @endforeach

                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="careerfy-job-userlist">
                                                        <a href="#" class="careerfy-option-btn">Freelance</a>
                                                        <a href="#" class="careerfy-job-like"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </li>
                                         @endforeach 
                                </div>


                            </div>
                        </div>
                        <!-- Job Detail Content -->
                        <!-- Job Detail SideBar -->
                        <aside class="careerfy-column-4">
                            <div class="careerfy-typo-wrap">
                       
                                <div class="widget widget_add">
                                    <img src="{{asset('/img/job.png')}}" alt="">
                                </div>
                                <div class="careerfy-widget-title"><h2>More Jobs from  @foreach($get_all_user_list as $user) @if($user->id === $tag->client) {{$user->name}}@endif @endforeach</h2></div>

                                <div class="widget widget_view_jobs white_background" >
                                <!-- get employee that posted this job -->
                                                                        <ul>
                                    @foreach($get_Job_by_common_industries_similler as $similar_job)
                                        <li>
                                            <h6><a href="{{route('job.description', $similar_job->id)}}">{{$similar_job->job_title}} </a></h6>
                                            <span>{{$similar_job->salary_range}} per annum</span>
                                            <small>{{$similar_job->country}},  @foreach($cities as $city) @if($similar_job->city === $city->id) {{$city->name}} @endif @endforeach</small>
                                        </li>
                              @endforeach
                       
                                    </ul>
                                    <a href="{{route('list.job', 'job-list')}}" class="widget_view_jobs_btn">View all jobs <i class="careerfy-icon careerfy-arrows32"></i></a>
                                </div>
                            </div>
                        </aside>
                        <!-- Job Detail SideBar -->

                    </div>
                </div>
            </div>
            <!-- Main Section -->

        </div>
        <!-- Main Content -->
         
        <!-- Footer -->
               @include('partials.job_footer')
        <!-- Footer -->
    </div>
    <!-- Wrapper -->

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


 </div>
 </body>
 </html>