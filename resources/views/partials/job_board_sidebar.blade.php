     
<style type="text/css">
  
    .mylistresumes_resume_progress {
  padding-top: 10px;
  &.resumesearchable {
    padding-top: 0px;
  }
  .mylistresumes_resume2 {
    padding-top: 8px;
    font-size: 11px;
    position: relative;
    line-height: 13px;
    border-bottom: 1px dotted #cdcdcd;
  }
  h4 {
    font-size: 11px;
  }
  .mylistresumes_resume {
    .side1, .side2 {
    background: #e1e1e1;
    }
    .side1 {
    padding: 0 3px 0 0;
    }
    .side2 {
    padding: 0 0 0 4px;
    position: absolute;
    right: 0;
    bottom: 0;
    }
  }
  }
  h5{
    font-size: 11px;
    padding: 0 3px 0 0;
  }
  .new{
    height: 10px; position: relative; font-size: 10px; padding-left: 0px;
  }
</style>


     <aside class="careerfy-column-3 page" >
                            <div class="careerfy-typo-wrap">
                                <div class="careerfy-employer-dashboard-nav"  style="background-color: #FFFFFF;">
 <figure>
<!--  <div class="resume_pic_outer">
<div class="resume_pic">
<img src="{{asset('/img/terseer.jpg')}}" alt="Picture" class="employer-dashboard-thumb">
<p class="editov2"><a class="edits" ><i class="icon-plus"></i>Edit</a></p>
</div>
</div> -->

 <a href="{{route('display.pix', Auth::user()->id)}}" class="employer-dashboard-thumb"><img src="/uploads/avatars/{{$profile_pix->pix }}" alt=""></a>
                 
              <figcaption>
              
              <div class="careerfy-fileUpload">
              <span><i class="careerfy-icon careerfy-add"></i> Upload Photo</span>
              <input type="file" class="careerfy-upload" name="avatar" />
              </div>
              @if(Auth::user())
              <h4> {{Auth::user()->name}}</h4>
              <span class="careerfy-dashboard-subtitle">{{$pr_caption->pr_caption}}</span>
              @endif
              </figcaption>
</figure>


                                    <ul>
                                      <span class="progressbar">
                                        <span style="width: 40%;"><span></span></span>
                                        </span>
                                         
                                      @foreach($resumes as $resume)
 @if($resume->status === 1)
<li class="active"><a href="{{route('get.resume', $resume->id)}}"><i class="careerfy-icon careerfy-resume"></i> {{$resume->pr_caption}}  </a>
@else
<!-- <div class="resumename" style="font-size: 8px;"><span class="title2">{{$resume->pr_caption}}</span>
<span class="progressbar">
<span style="width: 60%;"><span></span></span>
</span>
<span class="progress">60% complete</span>
<span class="clear"></span>

</div> -->

<!-- <div class="overviewtitle2 overviewtype3 several2">
<span class="ovtitle"><a href="" class="side1"> Professional Profile</a></span>
<div class="highlightable">+ 20%</div>
</div>
<div class="overviewtitle2 overviewtype3 several2">
<span class="ovtitle"><a href=""  style="background-color: #E1E1E1">Work Experience</a></span>
<div class="highlightable">+ 20%</div>
</div>
-->
</li>
                       

                <li class=""><a href="{{route('get.resume', $resume->id)}}"> {{$resume->pr_caption}}  </a>
                  <div class="progress">
             <!--      <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                  <span class="sr-only">70% Complete</span>
                  </div> -->
                  </div>
                </li>

                                     @endif
                                     @endforeach

                        <li><a href="{{route('show.cation')}}"><i class="careerfy-icon careerfy-resume"></i> Create Resume</a></li>
                   
                                  
                                    <!--
                                      <li class="active"><a href="candidate-dashboard-profile-seting.html"><i class="careerfy-icon careerfy-user"></i> My Profile</a></li>
                                         <li><a href="candidate-dashboard-saved-jobs.html"><i class="careerfy-icon careerfy-heart"></i> Saved jobs</a></li>
                                        <li><a href="candidate-dashboard-applied-jobs.html"><i class="careerfy-icon careerfy-briefcase-1"></i> Applied jobs</a></li>
                                        <li><a href="candidate-dashboard-job-alert.html"><i class="careerfy-icon careerfy-alarm"></i> Job Alerts</a></li>
                                        <li><a href="candidate-dashboard-cv-manager.html"><i class="careerfy-icon careerfy-id-card"></i> CV Manager</a></li>
                                        <li><a href="candidate-dashboard-changed-password.html"><i class="careerfy-icon careerfy-multimedia"></i> Change Password</a></li>
                                        <li><a href="index.html"><i class="careerfy-icon careerfy-logout"></i> Logout</a></li> -->
                                    </ul>
                                </div>
                            </div>
               <div class="careerfy-typo-wrap">
                     
                                <div class="widget widget_add">
                                    <img src="img/extra-images/jobdetail-add.jpg" alt="">
                                </div>
                                <div class="widget widget_view_jobs">
                                <!-- get employee that posted this job -->
                                    <div class="careerfy-widget-title"><h2> </h2></div>
                                    <ul>
                                    @forelse($job_by_candidate_list as $similar_job)
                                        <li>
                                            <h6><a href="#">{{$similar_job->job_title}} </a></h6>
                                            <span>{{$similar_job->salary_range}} per annum</span>
                                            <small>{{$similar_job->country}},  @foreach($cities as $city) @if($similar_job->city === $city->id) {{$city->name}} @endif @endforeach</small>
                                        </li>
                                        @empty
                                        <li>No Jobs Available</li>
                                        @endforelse
                                    </ul>
                                    <a href="#" class="widget_view_jobs_btn">View all jobs <i class="careerfy-icon careerfy-arrows32"></i></a>
                                </div>
                            </div>
                            <div class="careerfy-typo-wrap">
                            <!-- Select jobs that have not yet expire -->
                          <ul>
                            @forelse($tags as $tag)
 
                                          <li>
                                            <div class="careerfy-joblisting-classic-wrap">
                                                <figure><a href="#"><img src="img/extra-images/job-listing-logo-3.png" alt=""></a></figure>
                                                <div class="careerfy-joblisting-text">
                                                    <div class="careerfy-list-option">
                                                        <h6><a href="#">{{$tag->job_title}}</a></h6>
                                                        <ul>                                    
                                                            <!-- <li><a href="#">@ Mindshare</a></li> -->
                                        <li><i class="careerfy-icon careerfy-maps-and-flags"></i> 
                                                            {{$tag->country}},   @foreach($cities as $city) @if($tag->city === $city->id) {{$city->name}} @endif @endforeach
                                                          </li>
                         </ul>

                          <i class="careerfy-icon careerfy-filter-tool-black-shape"></i>
                                     @foreach($job_category_list as $job_category) @if($job_category->id === $tag->job_type) 
                                        <div class="careerfy-job-userlist">
                                  <a href="#" class="careerfy-option-btn careerfy-blue">{{$job_category->name}}</a>
                                                        <a href="#" class="careerfy-job-like"><i class="fa fa-heart"></i></a>
                                                    </div>
                                       @endif  @endforeach
 
@if($section_candidatelist_count === 1)
<a href=" " class="careerfy-applyjob">view</a>
@endif 
@if($section_candidatelist_count === 2 )
<a href=" " class="careerfy-applyjob">view</a>
@endif
@if($section_candidatelist_count === 3)

<a href=" " class="careerfy-applyjob">view</a>
@endif

@if($section_candidatelist_count === 4) 
 <a href="{{route('apply.job',  $tag->id)}}" class="careerfy-applyjob">Apply</a> 
@endif

@if($section_candidatelist_count === 5)
 <a href="" class="careerfy-green">view</a> 
@endif

@if($section_candidatelist_count === 6)
 <!-- <a href="{{route('stage_one.application', [$user_single_resume_by_date->id, $tag->id, $check])}}" class="careerfy-applyjob">Apply</a>  -->
 <a href="{{route('apply.job',  $tag->id)}}" class="careerfy-applyjob">Apply</a> 
@endif

@if($section_candidatelist_count === 7)
 <!-- <a href="{{route('stage_one.application', [$user_single_resume_by_date->id, $tag->id, $check])}}" class="careerfy-applyjob">Apply</a>  -->
 <a href="{{route('apply.job',  $tag->id)}}" class="careerfy-applyjob">Apply</a> 
@endif
 </div>
                                  
                  
                                                <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <div class="space">&nbsp;</div>
                                        @empty
                                        
                              @endforelse
                              </ul>
                            </div>
             
                        </aside>

                        





