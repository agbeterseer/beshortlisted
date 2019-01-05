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
 
</style>

         @if(Session()->has('error'))
        <div class="alert alert-danger"> 
        {!! Session::get('error') !!}
        </div>
        @endif
     <!-- SubHeader careerfy-subheader-without-bg-->
        <div class="careerfy-job-subheader careerfy-subheader-without-bg">
             <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        
                    </div>
                </div>
            </div>
        </div> 
        <!-- SubHeader -->

        <!-- Main Content -->
        <div class="careerfy-main-content" id="page">
            <!-- Main Section -->
            <div class="careerfy-main-section">
                <div class="container">
                    <div class="row">
                        
                        <!-- Job Detail List -->
                        <div class="careerfy-column-12">
                            <div class="careerfy-typo-wrap">
                                <figure class="careerfy-jobdetail-list">
                                    <span class="careerfy-jobdetail-listthumb"><img src="img/extra-images/job-detail-logo-1.png" alt=""></span>
                                    <figcaption>
                                        <h2>{{$tag->job_title}}</h2>
                                        <span><small class="careerfy-jobdetail-type">@foreach($employement_terms as $employement_term) @if($tag->job_type === $employement_term->id)  {{$employement_term->name}} @endif @endforeach</small> Huntington Learning Center <small class="careerfy-jobdetail-postinfo">Posted now</small></span>
                                        <ul class="careerfy-jobdetail-options">
                                            <li><i class="fa fa-map-marker"></i> {{$tag->full_address}} <a href="#" class="careerfy-jobdetail-view">View om Map</a></li>
                                            <li><i class="careerfy-icon careerfy-calendar"></i> Post Date:{{ date('M d, Y', strtotime($tag->created_at)) }} </li>
                                            <li><i class="careerfy-icon careerfy-calendar"></i> Apply Before: {{ date('M d, Y', strtotime($tag->end_date)) }}</li>
                                            <li><i class="careerfy-icon careerfy-summary"></i> Applications 4</li>
                                            <!-- <li><a href="#"><i class="careerfy-icon careerfy-view"></i> Views 3806</a></li> -->
                                        </ul>
                                 <!--        <a href="#" class="careerfy-jobdetail-btn active"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a> -->
                                  <!--       <a href="#" class="careerfy-jobdetail-btn"><i class="careerfy-icon careerfy-envelope"></i> Email Job</a>
                                        <ul class="careerfy-jobdetail-media">
                                            <li><span>Share:</span></li>
                                            <li><a href="#" data-original-title="facebook" class="careerfy-icon careerfy-facebook-logo-in-circular-button-outlined-social-symbol"></a></li>
                                            <li><a href="#" data-original-title="twitter" class="careerfy-icon careerfy-twitter-circular-button"></a></li>
                                            <li><a href="#" data-original-title="linkedin" class="careerfy-icon careerfy-linkedin"></a></li>
                                        </ul> -->
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <!-- Job Detail List -->

                        <!-- Job Detail Content -->
                        <div class="careerfy-column-8">
                            <div class="careerfy-typo-wrap">
                                <div class="careerfy-jobdetail-content">
                                    <div class="careerfy-content-title"><h2>Job Detail</h2></div>
                                    <div class="careerfy-jobdetail-services">
                                        <ul class="careerfy-row">
                                            <li class="careerfy-column-4">
                                                <i class="careerfy-icon careerfy-salary"></i>
                                                <div class="careerfy-services-text">Offerd Salary <small>{{$tag->salary_range}}</small></div>
                                            </li>
                                            <li class="careerfy-column-4">
                                                <i class="careerfy-icon careerfy-social-media"></i>
                                                <div class="careerfy-services-text">Career Level <small> @foreach($jobcareer_levels as $jobcareer_level) @if($tag->job_level === $jobcareer_level->id) {{$jobcareer_level->name}} @endif @endforeach</small></div>
                                            </li>
                                            <li class="careerfy-column-4">
                                                <i class="careerfy-icon careerfy-briefcase"></i>
                                                <div class="careerfy-services-text">Experience <small> {{$tag->experience}} Years </small></div>
                                            </li>
                                            <li class="careerfy-column-4">
                                                <i class="careerfy-icon careerfy-user"></i>
                                                <div class="careerfy-services-text">Gender <small> {{$tag->gender}} </small></div>
                                            </li>
                                            <li class="careerfy-column-4">
                                                <i class="careerfy-icon careerfy-network"></i>
                                                <div class="careerfy-services-text">Industry <small>@foreach($industries as $industry) @if($tag->industry === $industry->id) {{$industry->name}} @endif @endforeach</small></div>
                                            </li>
                                            <li class="careerfy-column-4">
                                                <i class="careerfy-icon careerfy-mortarboard"></i>
                                                <div class="careerfy-services-text">Qualification <small>@foreach($educational_levels as $educational_level) @if($tag->qualification === $educational_level->id) {{$educational_level->name}} @endif @endforeach   </small></div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="careerfy-description">
                                        <p>{!! $tag->description !!}</p>
                                    </div>
                                    <div class="careerfy-content-title"><h2>Job Requirements</h2></div>
                                    <div class="careerfy-description"> 
                                     <ol>
                                     @foreach($job_requirements as $job_requirement)
                                        <li>{{$job_requirement->title}}</li>
                                        @endforeach
                                    </ol>
                                     </div>
                                     <div class="careerfy-content-title"><h2>Required skills</h2></div>
                                    <div class="careerfy-jobdetail-tags">
                                    @foreach($skillsets as $skillset)
                                        <a href="#">{{$skillset->title}} </a>
                                        @endforeach 
                                    </div> 
  <div class="space">&nbsp;</div>
    <span style="color: red;">Kindly answer the evaluation question(s) below to begin your screening process</span>
<form method="POST" action="{{route('make.application')}}" name="requirements"> 
   {{ csrf_field() }}
   <input type="hidden" name="tag_id" value="{{$tag->id}}">
   <input type="hidden" name="user_id" value="{{$user->id}}">
                                   <div class="careerfy-content-title"><h2>Evaluation Questions</h2></div>
                                    <div class="careerfy-jobdetail-services">
                                            <ul>
                                             @foreach($job_assessments as $job_assessment)
                                            <li>
                                               <div class="row">  
                                               <div class="col-md-12">
                                                   <div class="col-md-6">
                                    <input type="hidden" name="job_assessment_id[]" value="{{$job_assessment->id}}">
                                         {{$job_assessment->question}} <span class="required">*</span>
                                               </div>
                                 <div class="col-md-3">
                                 <select name="job_assessment_answer[]" required="required">
                                 <option value="">Choose Answer</option>
                                     <option value="YES">YES</option>
                                     <option value="NO">NO</option>
                                 </select></div> 
                                               </div> 
                                               </div> 
                                                </li>
                                                @endforeach 
                                                 </ul>
                                                 </div>
                                    <div class="widget widget_apply_job">
                                    <div class="widget_apply_job_wrap"> 
                                      @php
                                      $check = 'first';
                                      @endphp
                                <span style="color: red;"> Please note, Choosing resume is optional</span> 
                               <input type="hidden" name="check" value="{{$check}}">
                               <input type="hidden" name="resume" value="{{$user_single_resume_by_date->id}}"> 

                                    <select name="resume_name">
                                    <option value="">Choose Resume</option>
                                     @foreach($resume_list as $resume)
                                     <option value="{{$resume->id}}">{{$resume->pr_caption}}</option>
                                     @endforeach
                                     </select>
                                     <div class="space">&nbsp;</div> 
                                    <div class="space">&nbsp;</div> 
                                    <input type="submit" name="" value="Apply" class="careerfy-applyjob-btn">
                                    <span style="color: red;">Application ends in 4d 5h 3m</span>
                                    <div class="careerfy-applywith-title"><small><!-- OR apply with --></small></div>
                                    <p>Know someone who would be perfect for  this role this role? Be a pal, let them know.</p>
                                     
                                    </div>
                               
                                    <a href="#" class="careerfy-sendmessage-btn"><i class="careerfy-icon careerfy-envelope"></i> Send a message</a>
                                </div>
                               </form> 
                                </div> 

                                <!-- display jobs in the same industry -->
                                <div class="careerfy-section-title"><h2>Other jobs you may like</h2></div>
                                <div class="careerfy-job careerfy-joblisting-classic careerfy-jobdetail-joblisting">
                             
                                    <ul class="careerfy-row">
                                       @foreach($get_Job_by_common_industries as $common_job)

                               
                                        <li class="careerfy-column-12">
                                            <div class="careerfy-joblisting-classic-wrap">
                                                <figure><a href="#"><img src="img/extra-images/job-listing-logo-1.png" alt=""></a></figure>
                                                <div class="careerfy-joblisting-text">
                                                    <div class="careerfy-list-option">
                                                        <h2><a href="#"> {{$common_job->job_title}}</a> <span>Featured</span></h2>
                                                        <ul>
                                                            <li><a href="#">@ Massimo Artemisis</a></li>
                                                            <li><i class="careerfy-icon careerfy-maps-and-flags"></i>{{$common_job->country}}, {{$common_job->city}}</li>
                                                            <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> @foreach($industry_professions as $profession) @if($profession->id === $common_job->job_category){{$profession->name}} @endif @endforeach</li>
                                                        </ul>
                                                    </div>
                                                    <div class="careerfy-job-userlist">
                                                        <a href="#" class="careerfy-option-btn"> {{$common_job->job_type}}Freelance</a>
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
                            <!--     <div class="widget widget_apply_job">
                                    <div class="widget_apply_job_wrap">
                                        <a href="#" class="careerfy-applyjob-btn">Apply for the job</a>
                                        <span>Application ends in 4d 5h 3m</span>
                                        <div class="careerfy-applywith-title"><small>OR apply with</small></div>
                                        <p>Know someone who would be perfect for  this role this role? Be a pal, let them know.</p>
                                        <ul>
                                            <li><a href="#"><i class="careerfy-icon careerfy-facebook-logo-1"></i> Facebook</a></li>
                                            <li><a href="#"><i class="careerfy-icon careerfy-linkedin-logo"></i> LinkedIn</a></li>
                                        </ul>
                                    </div>
                                    <a href="#" class="careerfy-sendmessage-btn"><i class="careerfy-icon careerfy-envelope"></i> Send a message</a>
                                </div> -->
                            <!--     <div class="widget jobsearch_widget_map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d22589232.038285658!2d-103.9763543971716!3d46.28054447273778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1507595834401"></iframe>
                                </div> -->
                                <div class="widget widget_add">
                                    <img src="img/extra-images/jobdetail-add.jpg" alt="">
                                </div>
                                <div class="widget widget_view_jobs">
                                <!-- get employee that posted this job -->
                                    <div class="careerfy-widget-title"><h2>More Jobs from  @foreach($get_all_user_list as $user) @if($user->id === $tag->client) {{$user->name}}@endif @endforeach</h2></div>
                                    <ul>
                                    @foreach($get_Job_by_common_industries_similler as $similar_job)
                                        <li>
                                            <h6><a href="#">{{$similar_job->job_title}} </a></h6>
                                            <span>{{$similar_job->salary_range}} per annum</span>
                                            <small>{{$similar_job->country}},  @foreach($cities as $city) @if($similar_job->city === $city->id) {{$city->name}} @endif @endforeach</small>
                                        </li>
                                        @endforeach
                                  <!--       <li>
                                            <h6><a href="#">Electrical Maintenance Engineer PLCs</a></h6>
                                            <span>£25,000 - £33,000 per annum</span>
                                            <small>London, United Kingdom</small>
                                        </li>
                                        <li>
                                            <h6><a href="#">Electrical Maintenance Engineer FMCG Manufacturer</a></h6>
                                            <span>£30,000 - £33,000 per annum</span>
                                            <small>Sutton-in-Ashfield, Nottinghamshire</small>
                                        </li> -->
                                    </ul>
                                    <a href="#" class="widget_view_jobs_btn">View all jobs <i class="careerfy-icon careerfy-arrows32"></i></a>
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
    <script src="{{ asset('recruit/script/slick-slider.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/counter.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/fancybox.pack.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/isotope.min.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/functions.js')}}"></script>
    <script src="{{ asset('recruit/script/functions.js')}}"></script>
    <script src="{{ asset('css/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('css/assets/global/plugins/bootstrap-summernote/summernote.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('css/assets/global/plugins/jquery-repeater/jquery.repeater.js')}}" type="text/javascript"></script>
         <script src="{{ asset('css/assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('css/assets/pages/scripts/form-repeater.min.js')}}" type="text/javascript"></script>


 </div>
 </body>
 </html>