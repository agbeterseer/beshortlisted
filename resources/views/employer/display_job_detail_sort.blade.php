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
@include('partials.employer_menu')
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
    <div class="space">&nbsp;</div>
<nav class="nav-tabs navbar-inverse">
  <div class="container-fluid">
 
    <ul class="nav navbar-nav">
    <li class="active"><a href="#all" style="padding-top: 15px; padding-bottom: 15px;">MANAGE JOBS&nbsp;  </a> </li>
      <li ><a href="#draft" style="padding-top: 15px; padding-bottom: 15px;">CANDIDATES </a> </li>
      <li><a href="#awaiting" style="padding-top: 15px; padding-bottom: 15px;">ACCOUNTS </a></li>
      <li><a href="#blacklist" style="padding-top: 15px; padding-bottom: 15px;">PROFILE </a></li>
      <li><a href="#not_active" style="padding-top: 15px; padding-bottom: 15px;">JOB ALERTS </a></li>
        <li><a href="#active" style="padding-top: 15px; padding-bottom: 15px;">PACKAGES </a></li>
    </ul>
  </div>
</nav>
 
                            <!-- FilterAble -->
                            <!-- JobGrid -->
 
 
                       
   <!--      <div class="careerfy-job-subheader careerfy-subheader-without-bg">
 
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        
                    </div>
                </div>
            </div>
        </div> -->
        <!-- SubHeader -->

        <!-- Main Content -->
        <div class="careerfy-main-content">

     <!-- SubHeader -->
            <!-- Main Section -->
            <div class="careerfy-main-section">
                 <div class="tabbable-line boxless tabbable-reversed"  style="padding-left: 37px; padding-right: 37px;">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                        <a href="#tab_0" data-toggle="tab">JOB DETAILS </a>
                                        </li>
                                        <li>
                                            <a href="#tab_1" data-toggle="tab">UNSORTED &nbsp;<span class="badge">{{$applicants_count}}</span></a>
                                        </li>
                                        <li>
                                            <a href="#tab_2" data-toggle="tab">AUTO-MATCH &nbsp;<span class="badge">0</span></a>
                                        </li>
                                        <li>
                                            <a href="#tab_3" data-toggle="tab">REJECTED &nbsp;<span class="badge">0</span></a>
                                        </li> 
                                        <li>
                                            <a href="#tab_4" data-toggle="tab">IN REVIEW &nbsp;<span class="badge">0</span></a>
                                        </li>
                                         <li>
                                            <a href="#tab_5" data-toggle="tab">SHORTLISTED &nbsp;<span class="badge">0</span></a>
                                        </li>
                                        <li>
                                            <a href="#tab_6" data-toggle="tab">OFFERED &nbsp;<span class="badge">0</span></a>
                                        </li>
                                        <li>
                                            <a href="#tab_7" data-toggle="tab">HIRE &nbsp;<span class="badge">0</span></a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_0">
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
                                            <li><i class="fa fa-map-marker"></i> {{$tag->full_address}}  
                                            <li><i class="careerfy-icon careerfy-calendar"></i> Post Date:{{ date('M d, Y', strtotime($tag->created_at)) }} </li>
                                            <li><i class="careerfy-icon careerfy-calendar"></i> Apply Before: {{ date('M d, Y', strtotime($tag->end_date)) }}</li>
                                            <li><i class="careerfy-icon careerfy-summary"></i> Applications 4</li>
                                            <!-- <li><a href="#"><i class="careerfy-icon careerfy-view"></i> Views 3806</a></li> -->
                                        </ul>
                                        <a href="{{route('edit.jobpost', $tag->id)}}" class="careerfy-employer-profile-submit"><i class="careerfy-icon careerfy-edit"></i> Edit Post</a>
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
                                                <div class="careerfy-services-text">Gender <small>{{$tag->gender}}</small></div>
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
                           <!--          <div class="careerfy-content-title"><h2>Job Description</h2></div> -->
                                    <div class="careerfy-description">
                                        <p>{!! $tag->description !!}</p>
                                    </div> 
                                    <div class="careerfy-content-title"><h2>Required skills</h2></div>
                                    <div class="careerfy-jobdetail-tags">
                                    @foreach($skillsets as $skillset)
                                        <a href="#">{{$skillset->title}}</a>
                                        @endforeach
                                   <!--      <a href="#">Civils</a>
                                        <a href="#">food</a>
                                        <a href="#">17th edition</a>
                                        <a href="#">electrical</a>
                                        <a href="#">engineer</a>
                                        <a href="#">engineer</a>
                                        <a href="#">engineering</a>
                                        <a href="#">dairy</a>
                                        <a href="#">projects</a>
                                        <a href="#">Maintenance engineer</a> -->
                                    </div>
                                </div>
                                <!-- display jobs in the same industry -->
                             
                            </div>
                        </div>
                        <!-- Job Detail Content -->
                        <!-- Job Detail SideBar -->
                        <aside class="careerfy-column-4">
                            <div class="careerfy-typo-wrap">
                                <div class="widget widget_apply_job">
                                    <div class="widget_apply_job_wrap">
                                        <a href="#" class="careerfy-applyjob-btn">Edit </a>
                                        <span>Application ends in 4d 5h 3m</span>
                                        <div class="careerfy-applywith-title"><small>OR apply with</small></div>
                                        <p>Know someone who would be perfect for  this role this role? Be a pal, let them know.</p>
                               <!--          <ul>
                                            <li><a href="#"><i class="careerfy-icon careerfy-facebook-logo-1"></i> Facebook</a></li>
                                            <li><a href="#"><i class="careerfy-icon careerfy-linkedin-logo"></i> LinkedIn</a></li>
                                        </ul> -->
                                    </div>
                                    <a href="#" class="careerfy-sendmessage-btn"><i class="careerfy-icon careerfy-envelope"></i> Send a message</a>
                                </div>
                    
                                <div class="widget widget_add">
                                    <img src="img/extra-images/jobdetail-add.jpg" alt="">
                                </div>
                                <div class="widget widget_view_jobs">
                                    <div class="careerfy-widget-title"><h2>More Jobs from {{Auth::user()->name}}</h2></div>
                                    <ul>
                                        <li>
                                            <h6><a href="#">Electrical & Mechanical Engineer / Site Maintenance Technician</a></h6>
                                            <span>£32,000 - £35,000 per annum</span>
                                            <small>Netherlands, Rotterdam</small>
                                        </li>
                                        <li>
                                            <h6><a href="#">Electrical Maintenance Engineer PLCs</a></h6>
                                            <span>£25,000 - £33,000 per annum</span>
                                            <small>London, United Kingdom</small>
                                        </li>
                                        <li>
                                            <h6><a href="#">Electrical Maintenance Engineer FMCG Manufacturer</a></h6>
                                            <span>£30,000 - £33,000 per annum</span>
                                            <small>Sutton-in-Ashfield, Nottinghamshire</small>
                                        </li>
                                    </ul>
                                    <a href="#" class="widget_view_jobs_btn">View all jobs <i class="careerfy-icon careerfy-arrows32"></i></a>
                                </div>
                            </div>
                        </aside>
                        <!-- Job Detail SideBar -->

                    </div> 
                </div>
 
                                        </div>
                                        <div class="tab-pane" id="tab_1">
                            <div class="careerfy-main-section">
                <div class="container">
                    <div class="row">
                        
         <aside class="careerfy-column-4">
 
                            <div class="careerfy-typo-wrap">
                                <form class="careerfy-search-filter">
                          <!--           <div class="careerfy-search-filter-wrap careerfy-without-toggle">
                                        <h2><a href="#">Top Employer</a></h2>
                                        <div class="careerfy-search-box">
                                            <input value="Search" onblur="if(this.value == '') { this.value ='Search'; }" onfocus="if(this.value =='Search') { this.value = ''; }" type="text">
                                            <input type="submit" value="">
                                            <i class="careerfy-icon careerfy-search"></i>
                                        </div>
                                        <div class="careerfy-location-box">
                                            <input value="All Locaions" onblur="if(this.value == '') { this.value ='All Locaions'; }" onfocus="if(this.value =='All Locaions') { this.value = ''; }" type="text">
                                            <i class="careerfy-icon careerfy-location"></i>
                                        </div>
                                    </div> -->
                                    <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Gender</a></h2>
                                        <div class="careerfy-checkbox-toggle">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="radio" id="g1" name="gender" value="Male" />
                                                    <label for="g1"><span></span>Male</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="g2"  name="gender" value="Female" />
                                                    <label for="g2"><span></span> Female</label>
                                                </li>
                                              
                                            </ul>
                                        </div>
                                    </div>
                          
                              <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Job Function</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div">
                                            <ul class="careerfy-checkbox">
                                               @foreach($professions as $profession)
                                                <li>
                                                    <input type="radio" id="r_{{$profession->id}}" name="profession" value="{{$profession->id}}" />
                                                    <label for="r_{{$profession->id}}"><span></span>{{$profession->name}}</label>
                                                    <small>10</small>
                                                </li>
                                                @endforeach 
                                            </ul>
                              <!-- 
                              <a href="#" class="careerfy-seemore">+ see more</a> -->
                                        </div>
                                    </div>
                                    <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Industries</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div">
                                            <ul class="careerfy-checkbox">
                                            @foreach($industries as $industry)  
                                                <li>
                                                <input type="radio" id="i_{{$industry->id}}" name="industry" value="{{$industry->id}}" />
                                                    <label for="i_{{$industry->id}}"><span></span>{{$industry->name}}</label>
                                                    <small>10</small>
                                                </li>
                                                @endforeach
                                       
                                            </ul>
                                        
                                        </div>
                                    </div>

                  <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Minimum Salary</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="radio" id="salary1" name="salary" value="N50,000-N100,000" />
                                                    <label for="salary1"><span></span>N50,000-N100,000</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="salary2" name="salary" value="N150,000-N250,000" />
                                                    <label for="salary2"><span></span>N150,000-N250,000</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="salary3"  name="salary" value="N350,000-N600,000" />
                                                    <label for="salary3"><span></span>N350,000-N600,000</label>
                                                </li>
                                               <li>
                                                    <input type="radio" id="salary4"  name="salary" value="N750,000-N1,000," />
                                                    <label for="salary4"><span></span>N750,000-N1,000,000</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="salary5"  name="salary" value="N1,000,000-N5,000,000" />
                                                    <label for="salary5"><span></span>N1,000,000-N5,000,000</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="salary6"  name="salary" value="N550,000-N10,000,000" />
                                                    <label for="salary6"><span></span>N5,050,000-N10,000,000</label>
                                                </li>
                                                  <li>
                                                    <input type="radio" id="salary7"  name="salary" value="N10,000,000-N15,000,000" />
                                                    <label for="salary7"><span></span>N10,000,000-N15,000,000</label>
                                                </li>
                                                  <li>
                                                    <input type="radio" id="salary8"  name="salary" value="N15,000,000-Above" />
                                                    <label for="salary8"><span></span>N15,000,000-Above</label>
                                                </li>

                                            </ul>
                                        </div>
                                </div>
                                <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Availability</a></h2>
                                        <div class="careerfy-checkbox-toggle">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="radio" id="avail1" name="avail" value="now" />
                                                    <label for="avail1"><span></span>Immediate</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="avail2" name="avail" value="1 week" />
                                                    <label for="avail2"><span></span>1 week</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="avail3"  name="avail" value="2 weeks" />
                                                    <label for="avail3"><span></span>2 weeks</label>
                                                </li>
                                               <li>
                                                    <input type="radio" id="avail4"  name="avail" value="1 month" />
                                                    <label for="avail4"><span></span>1 month</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="avail5"  name="avail" value="2 months" />
                                                    <label for="avail5"><span></span>2 months</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="avail6"  name="avail" value="Specific date" />
                                                    <label for="avail6"><span></span>Specific date</label>
                                                </li>
                                            </ul>
                                        </div>
                                </div>
                                               <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Years Of Experience</a></h2>
                                        <div class="careerfy-checkbox-toggle">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="radio" id="g1yoe" name="yoe" value="0-5" />
                                                    <label for="g1yoe"><span></span>0-5</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="g2yoe"  name="yoe" value="6-10" />
                                                    <label for="g2yoe"><span></span>6-10</label>
                                                </li>
                                               <li>
                                                    <input type="radio" id="g3yoe"  name="yoe" value="11-15" />
                                                    <label for="g3yoe"><span></span>11-15</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="g4yoe"  name="yoe" value="16-20" />
                                                    <label for="g4yoe"><span></span>16-20</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="g5yoe"  name="yoe" value="20 Above" />
                                                    <label for="g5yoe"><span></span>20 Above</label>
                                                </li>
                                            </ul>
                                        </div>
                                </div>
                                <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Age</a></h2>
                                        <div class="careerfy-checkbox-toggle">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="radio" id="rag1" name="ag" value="18-25" />
                                                    <label for="rag1"><span></span>18-25</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="rag2" name="ag" value="26-30" />
                                                    <label for="rag2"><span></span>26-30</label>
                                                </li>
                                                    <li>
                                                    <input type="radio" id="rag3" name="ag" value="31-35" />
                                                    <label for="rag3"><span></span>31-35</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="rag4" name="ag" value="36-40" />
                                                    <label for="rag4"><span></span>36-40</label>
                                                </li>
                                                     <li>
                                                    <input type="radio" id="rag5" name="ag" value="41-45" />
                                                    <label for="rag5"><span></span>41-45</label>
                                                </li> 
                                                <li>
                                                    <input type="radio" id="rag6" name="ag" value="46-50" />
                                                    <label for="rag6"><span></span>46-50</label>
                                                </li> 
                                                <li>
                                                    <input type="radio" id="rag7" name="ag" value="51 Above" />
                                                    <label for="rag7"><span></span>51 Above</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                               <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Qualification</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div">
                                            <ul class="careerfy-checkbox">
                                             @foreach($educational_levels as $educational_levels)
                                                    <li>
                                                    <input type="radio" id="qu_{{$educational_levels->id}}" name="qu" value="{{$educational_levels->id}}" />
                                                    <label for="qu_{{$educational_levels->id}}"><span></span>{{$educational_levels->name}}</label>
                                                </li>
                                                @endforeach
                                        
                                                 </ul>
                                        </div>
                                    </div>
                            
                                         <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Location</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" >
                                            <ul class="careerfy-checkbox">
                                            @foreach($cities as $city) 
                                                <li>
                                                    <input type="radio" id="r{{$city->id}}" name="city" value="{{$city->id}}" />
                                                    <label for="r{{$city->id}}"><span></span>{{$city->name}}</label>
                                                </li> 
                                            @endforeach 
                                            </ul> 
                                        </div>
                                    </div>
                                 
                         
                                    <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Employement Terms</a></h2>
                                        <div class="careerfy-checkbox-toggle">
                                            <ul class="careerfy-checkbox">
                                  @foreach($employement_terms as $employement_term)
                                                <li>
                                                    <input type="radio" id="jr{{$employement_term->id}}" name="job" value="{{$employement_term->id}}" />
                                                    <label for="jr{{$employement_term->id}}"><span></span>{{$employement_term->name}}</label>
                                                    <small>4</small>
                                                </li>
                                @endforeach
                                          
                                            </ul>
                                        </div>
                                    </div>

                             <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Career Level</a></h2>
                                        <div class="careerfy-checkbox-toggle croll_div">
                                            <ul class="careerfy-checkbox">
                                  @foreach($jobcareer_levels as $jobcareer_level)
                                                <li>
                                                    <input type="radio" id="jc{{$jobcareer_level->id}}" name="career_level" value="{{$jobcareer_level->id}}" />
                                                    <label for="jc{{$jobcareer_level->id}}"><span></span>{{$jobcareer_level->name}}</label>
                                                    <small>4</small>
                                                </li>
                                @endforeach
                                          
                                            </ul>
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </aside>

                                <!-- JobGrid -->
                   <div class="careerfy-column-8">
                            <div class="careerfy-typo-wrap">
                                <!-- FilterAble -->
                    
 
                                <!-- Candidate Listings -->
                                   <div class="careerfy-candidate careerfy-candidate-default">
                                    <ul class="careerfy-row">

                                    @foreach($applicants as $applicant)
                                        <li class="careerfy-column-12">
                                            <div class="careerfy-candidate-default-wrap">
                                                <figure><a href="#"><img src="extra-images/candidate-listing-thumb-1.jpg" alt=""></a></figure>
                                                <div class="careerfy-candidate-default-text">
                                                    <div class="careerfy-candidate-default-left">
                                                        <h2><a href="#"> {{$applicant->user_id}}</a> <i class="careerfy-icon careerfy-check-mark"></i></h2>
                                                        <ul>
                                                            <li>Fashion Designer at <a href="#" class="careerfy-candidate-default-studio">Yup Studio</a></li>
                                                            <li><i class="fa fa-map-marker"></i> Netherlands, Rotterdam</li>
                                                            <li><i class="careerfy-icon careerfy-envelope"></i> <a href="#">hoang@gmail.com</a></li>
                                                        </ul>
                                                    </div>
                                           <a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> View CV</a>
                                                    <a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                       
                                    
                                    </ul>
                                </div>
                                <!-- End job listing-->
                                <!-- Pagination -->


                                <!--End Pagination -->
                            </div>
                        </div>
 
                        </div>
                        </div>
                        </div>
                                        </div>
                                        <div class="tab-pane" id="tab_2">
                                        Terseer2
                                        </div>
                                        <div class="tab-pane" id="tab_3">
                                        Terseer3
                                        </div>
                                        <div class="tab-pane" id="tab_4">
                                        Terseer4
                                        </div>
                                        <div class="tab-pane" id="tab_5">
                                        Terseer5
                                        </div>
                                        <div class="tab-pane" id="tab_6">
                                        Terseer6
                                        </div>
                                        <div class="tab-pane" id="tab_7">
                                        Terseer7
                                        </div>
                                         
                                        </div>
                                        <!--End tab content --> 

        

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