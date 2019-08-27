     
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


 <a href="{{route('display.pix', Auth::user()->id)}}" class="employer-dashboard-thumb"><img src="/uploads/avatars/{{$user->avatar }}" alt=""></a>
                 
              <figcaption>
              
              <a class="careerfy-fileUpload" href="{{route('display.pix', Auth::user()->id)}}">
              <span><i class="careerfy-icon careerfy-add"></i> Upload Photo</span> 
              </a>
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

</li>
                       

                <li class=""><a href="{{route('get.resume', $resume->id)}}"> {{$resume->pr_caption}}  </a>
                  <div class="progress">
                  </div>
                </li>

                                     @endif
                                     @endforeach

                        <li><a href="{{route('show.cation')}}"><i class="careerfy-icon careerfy-resume"></i> Create Resume</a></li>
                   
          
                                    </ul>
                                </div>
                            </div>
              <!--  <div class="careerfy-typo-wrap">
                     
                                <div class="widget widget_add">
                                    <img src="img/extra-images/jobdetail-add.jpg" alt="">
                                </div>
                                <div class="widget widget_view_jobs"> 
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
                                    <a href="{{route('list.job', 'job-list')}}" class="widget_view_jobs_btn">View all jobs <i class="careerfy-icon careerfy-arrows32"></i></a>
                                </div>
                            </div> -->
                            <div class="careerfy-typo-wrap">
                            <!-- Select jobs that have not yet expire -->
                          <ul>
                            @forelse($tags as $tag)
 
                                          <li>
                                            <div class="careerfy-joblisting-classic-wrap">
                                                <figure><a href="{{route('job.description', $tag->id)}}"><img src="{{asset('/img/job.png')}}" alt="" height="20" width="20"></a></figure>
                                                <div class="careerfy-joblisting-text">
                                                    <div class="careerfy-list-option">
                                                        <h6><a href="{{route('job.description', $tag->id)}}">{{$tag->job_title}}</a></h6>
                                                        <ul>                                    
                                                            <!-- <li><a href="#">@ Mindshare</a></li> -->
                                        <li><i class="careerfy-icon careerfy-maps-and-flags"></i> 
                                                            {{$tag->country}},   @foreach($cities as $city) @if($tag->city === $city->id) {{$city->name}} @endif @endforeach
                                                          </li>
                         </ul>

                          <!-- <i class="careerfy-icon careerfy-filter-tool-black-shape"></i> -->
                                     @foreach($job_category_list as $job_category) @if($job_category->id === $tag->job_type) 
                                        <div class="careerfy-job-userlist">
                                  <a href="#" class="careerfy-option-btn careerfy-blue">{{$job_category->name}}</a>
                                                    
                                                    </div>
                                       @endif  @endforeach
 
@if($section_candidatelist_count === 1)
<a href=" " class="careerfy-applyjob">view</a>
@endif 
@if($section_candidatelist_count === 2 )
<a href=" " class="careerfy-applyjob">view</a>
@endif
@if($section_candidatelist_count === 3)

 <a href="{{route('apply.job',  $tag->id)}}" class="careerfy-applyjob">Apply</a> 
@endif

@if($section_candidatelist_count === 4) 
 <a href="{{route('apply.job',  $tag->id)}}" class="careerfy-applyjob">Apply</a> 
@endif

@if($section_candidatelist_count === 5)
 <a href="{{route('apply.job',  $tag->id)}}" class="careerfy-applyjob">Apply</a> 
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

                        





