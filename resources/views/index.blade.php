@extends('layouts.jobboard', [
  'page_header' => 'Candidates',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' => '',
  'index' => 'active'
])
@section('content') 
<style type="text/css">
    .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
.ellipsis {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
</style>
    <!-- Wrapper --> 
        <!-- Header --> 
        <!-- Header -->
                @if(Session()->has('success'))
                        <div class="alert alert-success"> 
                        {!! Session::get('success') !!}
                        </div>
                        @endif
        <!-- Banner -->
    
        <div class="careerfy-banner careerfy-typo-wrap" style="margin-top: -10px;"> 
            <span class="careerfy-banner-transparent"></span>
            <div class="careerfy-banner-caption">
                <div class="container"> 
                <div class="text-content"> 
                     <h1>We Meet You at Your Desk</h1>
                    <p>Build a profile which places you in the ideal position to be recruited</p> 
                </div>
                   
                    <form class="careerfy-banner-search" action="{{route('job.listing')}}" method="GET" id="find_jobs"> 
                        <ul>
                            <li>

                        <div class="careerfy-select-style"> 
                                  <select name="location"  required="required">
                                    <option value="">Select City</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option> 
                                        @endforeach 
                                    </select>
                                </div>
                            </li>
                   <li>
                                      <div class=" careerfy-select-style">
                                    <select name="job_function" required="required" >
                                    <option value="">Select Job Function</option>
                                    @foreach($industry_professions as $industry_profession)
                                        <option value="{{$industry_profession->id}}">{{$industry_profession->name}}</option>
                                        @endforeach
                                     
                                </select>
                                </div>
                               
                            </li>
                            <li> 
                                <div class="careerfy-select-style">
                        <select name="s"  required="required">
                                    <option value="">Select Industry</option>
                                    @foreach($industries as $industry)
                                        <option value="{{$industry->id}}">{{$industry->name}}</option> 
                                        @endforeach 
                                    </select>
                                </div>
                            
                            </li>

                             <li class="careerfy-banner-submit"> <input type="submit" value=""> <i class="careerfy-icon careerfy-search"></i> </li>
                        </ul>
                    </form>
                    <div class="careerfy-banner-btn">
                        <a href="{{route('show.resume')}}" class="careerfy-bgcolorhover"><i class="careerfy-icon careerfy-up-arrow"></i> Build Your Resume</a>
                        <a href="{{route('post.jobs')}}" class="careerfy-bgcolorhover"><i class="careerfy-icon careerfy-portfolio"></i> Hiring? Post a job for free</a>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Banner -->
  <div class="space">&nbsp;</div>
            <div class="careerfy-main-section animation-test" >
                <div class="container">
                    <div class="row">
                 <div class="careerfy-element-text" align="center" data-os-animation="fadeIn">
                       <h2>Featured Jobs Listings</h2>
                        </div> 
                        <div class="col-md-12 careerfy-typo-wrap">
                            <!-- Fancy Title -->  
                          <div class="space">&nbsp;</div>
                            <!-- Featured Jobs Listings  jobs-->
                            <div class="careerfy-job-listing careerfy-featured-listing" >
                                <ul class="careerfy-row">
                                @forelse($featured_jobs as $job)
                                    <li class="careerfy-column-6" >
                                        <div class="careerfy-table-layer" style="background-color: #ffffff;">
                                            <div class="careerfy-table-row">
                                       <figure><a href="{{route('job.description', $job->id)}}"><img src="{{asset('/img/job.png')}}" alt=""></a></figure>
                                                <div class="careerfy-featured-listing-text">
                                                    <h2><a href="{{route('job.description', $job->id)}}"> {{ ucwords($job->job_title)}}</a><small class="careerfy-jobdetail-postinfo">Featured</small></h2>
                                                    <a href="#" class="careerfy-like-list"><i class="careerfy-icon careerfy-heart"></i></a>
                                                    <time datetime="2008-02-14 20:00">Post Date: {{ date('M d, Y', strtotime($job->updated_at)) }}  |  &nbsp;&nbsp;Apply Before: <span style="color: orange;">{{ date('M d, Y', strtotime($job->end_date)) }}</span></time> 
                                                    <div class="careerfy-featured-listing-options">
                                                    <ul>
                                                        <li><i class="careerfy-icon careerfy-maps-and-flags"></i> <a href="#">{{$job->country}},</a> <a href="#">{{$job->city}}</a></li>
                                                        <br>
                         @foreach($industry_professions as $profession)
                                                         @if($profession->id === $job->job_category) 
                                                        <li class="ellipsis" title="{{$profession->name}}"><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> <a href="#"> 
{{ mb_strimwidth($profession->name, 0, 22, "...") }}
                                                         </a></li>@endif @endforeach
                                                        <li>| <i>  @foreach($employement_term_list as $employement_term) @if($employement_term->id === $job->job_type){{$employement_term->name}} @endif @endforeach</i></li>
                                                    </ul>
                                                        <a href="{{route('apply.job', $job->id)}}" class="careerfy-option-btn">@foreach($employement_term_list as $employement_term) @if($employement_term->id === $job->job_type)Apply @endif @endforeach</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li> 
                                        @empty
                                        <li class="careerfy-column-6">
                                            <div class="careerfy-table-row">
                                       <figure><a href=""><img src="{{asset('/img/job.png')}}" alt=""></a></figure>
                                                <div class="careerfy-featured-listing-text"> 
                                                    <div class="careerfy-featured-listing-options"> 
                                                         No Record(s) Found
                                                    </div>
                                                </div>
                                            </div>
                                       

                                         </li>
                                    @endforelse 
                                </ul>
                            </div>
                            <!-- Featured Jobs Listings -->
                            <div class="careerfy-plain-btn"> <a href="{{route('list.job', 'job-list')}}">View All Jobs</a> </div>
                        </div>

                    </div>
                </div>
            </div>

  <!-- Main Section -->
            <div class="careerfy-main-section careerfy-counter-styletwo-full">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <!-- FancyTitle -->
                            <div class="careerfy-fancy-title careerfy-fancy-title-four">
                                <h2 style="color: #fff;">Our Successful Milestones</h2>
                                <p style="color: #fff;">We're your first step to becoming everything you want to be.</p>
                                <span> <i class="fa fa-circle" style="color: #fff;"></i> <i class="fa fa-circle circle-two-size" style="color: #fff;"></i> <i class="fa fa-circle circle-three-size" style="color: #fff;"></i> </span>
                            </div>
                            <!-- FancyTitle -->
                            <!-- Counter -->
                            <div class="careerfy-counter careerfy-counter-styletwo">
                                <ul class="row">
                                    <li class="col-md-3">
                                        <i class="careerfy-icon careerfy-briefcase-1 "></i>
                                        <span class="word-counter">{{$jobs_count}}</span>
                                        <small>Jobs Addes</small>
                                    </li>
                                    <li class="col-md-3">
                                        <i class="careerfy-icon careerfy-hospital"></i>
                                        <span class="word-counter">{{$company_count}}</span>
                                        <small>Companies Registered</small>
                                    </li>
                                    <li class="col-md-3">
                                        <i class="careerfy-icon careerfy-accounting"></i>
                                        <span class="word-counter">{{$resume_count}}</span>
                                        <small>Candidtate Profiles</small>
                                    </li>
                                    <li class="col-md-3">
                                        <i class="careerfy-icon careerfy-briefcase-1"></i>
                                        <span class="word-counter">{{$job_match_count}}</span>
                                        <small>Positions Matched</small>
                                    </li>
                                </ul>
                            </div>
                            <!-- Counter -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- Main Section -->

            <!-- Main Section -->
            <div class="careerfy-main-section careerfy-services-stylefour-full">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <!-- Services -->
                            <div class="careerfy-services careerfy-services-stylefour">
                                <ul class="row">
                                    <li class="col-md-4">
                                        <div class="careerfy-services-stylefour-wrap" style="background-color: #ffbb44;">
                                            <i class="careerfy-icon careerfy-people-1"></i>
                                            <h2>Post a job offer</h2>
                                            <p>Attract candidates that best fit you</p>
                                        </div>
                                    </li>
                                    <li class="col-md-4">
                                        <div class="careerfy-services-stylefour-wrap active">
                                            <i class="careerfy-icon careerfy-target"></i>
                                            <h2>Find your candidate</h2>
                                            <p>Get the Top 10 candidates, Thanks to our autmatch</p>
                                            <a href="#" class="careerfy-services-stylefour-btn"><small class="careerfy-icon careerfy-right-arrow"></small></a>
                                        </div>
                                    </li>
                                    <li class="col-md-4">
                                        <div class="careerfy-services-stylefour-wrap" style="background-color: #ed6950;">
                                            <i class="careerfy-icon careerfy-human-resources"></i>
                                            <h2>Hire the best one</h2>
                                            <p>Access candidates’ profiles</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- Services -->
                        </div>

                    </div>
                </div>
            </div>
        <!-- Main Content -->
        <div class="careerfy-main-content" > 
            <!-- Main Section -->
  <!--           <div class="careerfy-main-section careerfy-counter-full">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12"> 
                            <div class="careerfy-counter">
                                <ul class="row">
                                    <li class="col-md-4">
                                        <span class="word-counter">{{$jobs_count}}</span>
                                        <small>Jobs Added</small>
                                    </li>
                                    <li class="col-md-4">
                                        <span class="word-counter">{{$resume_count}}</span>
                                        <small>Active Resumes</small>
                                    </li>
                                    <li class="col-md-4">
                                        <span class="word-counter">{{$job_match_count}}</span>
                                        <small>Positions Matched</small>
                                    </li>
                                </ul>
                            </div> 
                        </div> 
                    </div>
                </div>
            </div> -->
            <!-- Main Section -->
       
            <!-- Main Section -->



                  <div class="careerfy-main-sectiont" >
                <div class="container">
                    <div class="row">
                 <div class="careerfy-element-text" align="center" data-os-animation="fadeIn">
                       <h2>Lastest Jobs Listings</h2>
                        </div> 
                        <div class="col-md-12 careerfy-typo-wrap">
                            <!-- Fancy Title -->  
                          <div class="space">&nbsp;</div>
                            <!-- Featured Jobs Listings  jobs animation-test-->
                            <div class="careerfy-job-listing careerfy-featured-listing" >
                                <ul class="careerfy-row">
                                @forelse($jobs as $job)
                                    <li class="careerfy-column-6 " >
                                        <div class="careerfy-table-layer" style="background-color: #ffffff;">
                                            <div class="careerfy-table-row">
                                       <figure><a href="{{route('job.description', $job->id)}}"><img src="{{asset('/img/job.png')}}" alt=""></a></figure>
                                                <div class="careerfy-featured-listing-text">
                                                    <h2><a href="{{route('job.description', $job->id)}}"> {{ ucwords($job->job_title)}}<!--  <span>Featured</span> --></a></h2>
                                                    <a href="#" class="careerfy-like-list"><i class="careerfy-icon careerfy-heart"></i></a>
                                                    <time datetime="2008-02-14 20:00">Post Date: {{ date('M d, Y', strtotime($job->updated_at)) }}  |  &nbsp;&nbsp;Apply Before: <span style="color: orange;">{{ date('M d, Y', strtotime($job->end_date)) }}</span></time> 
                                                    <div class="careerfy-featured-listing-options">
                                                    <ul>
                                                        <li><i class="careerfy-icon careerfy-maps-and-flags"></i> <a href="#">{{$job->country}},</a> <a href="#">{{$job->city}}</a></li>
                                                        <br>
                               @foreach($industry_professions as $profession)
                                                         @if($profession->id === $job->job_category) 
                                                        <li class="ellipsis" title="{{$profession->name}}"><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> <a href="#"> 
{{ mb_strimwidth($profession->name, 0, 22, "...") }}
                                                         </a></li>@endif @endforeachs
                                                        <li>| <i>  @foreach($employement_term_list as $employement_term) @if($employement_term->id === $job->job_type){{$employement_term->name}} @endif @endforeach</i></li>
                                                    </ul>
                                                        <a href="{{route('apply.job', $job->id)}}" class="careerfy-option-btn">@foreach($employement_term_list as $employement_term) @if($employement_term->id === $job->job_type)Apply @endif @endforeach</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li> 
                                        @empty
                                        <li class="careerfy-column-6"> No Record(s) Found </li>
                                    @endforelse 
                                </ul>
                            </div>
                            <!-- Featured Jobs Listings -->
                            <div class="careerfy-plain-btn"> <a href="{{route('list.job', 'job-list')}}">View All Jobs</a> </div>
                        </div>

                    </div>
                </div>
            </div>


            <!-- Main Section -->
                    <div class="space">&nbsp;</div>
                    <div class="space">&nbsp;</div>
            <!-- Main Section -->
            <div class="" style="background-color: #ffffff;">
                <div class="container">
                    <div class="row">
        <div class="careerfy-element-text" align="center">
        <h2>Popular Job Functions</h2> 
        </div> 
  <div class="col-md-12 careerfy-typo-wrap">
<table>
    <thead>
      <tr>
        <th><strong>Functions</strong></th>
        <th><strong>Location</strong></th>
        <th><strong>Job Type</strong></th>
      </tr>
    </thead>
    <tbody> 
    @forelse($jobs_8 as $job)
        <tr>
        <td width="50%"><i class="careerfy-icon {{$job->industry}}"></i> <a href="{{route('job.description', $job->id)}}">{{$job->job_title}}  </a> | @foreach($industries as $industry) @if($industry->id === $job->industry) {{ $industry->name}} @endif @endforeach </td>
        <td width="25%"> <i class="fa fa-map-marker"></i>  {{$job->city}} </td>
        <td width="25%"><i class="careerfy-icon careerfy-filter-tool-black-shape"></i>@foreach($employement_terms as $employement_term) @if($employement_term->id === $job->job_type) {{$employement_term->name}}@endif @endforeach </td>
      </tr> 
    @empty 
    @endforelse
    </tbody>
  </table>
        <div class="space">&nbsp;</div>
        <div class="space">&nbsp;</div>
                          </div>
                    </div>
                </div>
            </div>
        <div class="space">&nbsp;</div>
                    <div class="space">&nbsp;</div>
            <!-- Main Section -->
            <div class="" style="background-color: #ffffff;">
                <div class="container">
                    <div class="row">
        <div class="careerfy-element-text" align="center">
        <h2>Popular Industries</h2> 
        </div> 
          <div class="col-md-12 careerfy-typo-wrap">
                 <div class="space">&nbsp;</div>
                  <div class="space">&nbsp;</div>
                          </div>
                          
                        <div class="col-md-15 careerfy-typo-wrap industry_text">
                            @foreach($industries as $industry)
                            <div class="col-md-4">
                                <li>@foreach($job_function_count as $function_count) @if($function_count->industry === $industry->id) <span style="font-weight: bold;"> ({{ $function_count->total}}) </span> 
                                          @endif  @endforeach <a href="{{route('job_opening', $industry->id)}}"> {{$industry->name}} </a>
                                </li>
                            </div>
                            @endforeach
                                        </div>
                 
                    <div class="space">&nbsp;</div>
                    <div class="space">&nbsp;</div>
                    <div class="space">&nbsp;</div>
                    <div class="space">&nbsp;</div>
                    </div>
                </div>
            </div>

                      </div>

            <!-- Main Section -->
            </div>
                    <div class="space">&nbsp;</div>
                    <div class="space">&nbsp;</div>
                    <div class="space">&nbsp;</div>
                    <div class="space">&nbsp;</div>
                    <div class="careerfy-main-section" >
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 careerfy-parallex-box">
                            <div class="careerfy-parallex-box-wrap">
                                <h2>Start your Career Today by Singing Up Now!</h2>
                                <p> Get the notified with the latest job ad sent to your inbox. Be informed; who is hiring, who is offering what, and others.</p>
                       <a href="#email_subscription" class="careerfy-static-btn careerfy-parallex-box-btn"  >Sing Up for Newsletter</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                     <div class="careerfy-subheader careerfy-subheader-without-bg">
                            <div class="careerfy-parallex-text" style="color: white !important;">
                                <h2 style="color: white !important;">Millions of jobs. <br> Find the one that’s right for you.</h2>
                                <p>Search all the open positions on the web.</p>
                        <a href="{{route('list.job', 'job-list')}}" class="careerfy-static-btn careerfy-bgcolor"  ><span>Search Jobs</span></a>
                            </div>
                            <img src="{{assets('recruit/images/jobsearch.png')}}">
                        </div>
                      </div>
                  </div>
                </div>
            </div>
            <!-- Main Section -->
<!--             <div class="careerfy-main-section careerfy-parallex-full animation-test"  style="background-color: #ffffff;">
                <div class="container">
                    <div class="row">
                        <aside class="col-md-6 careerfy-typo-wrap">
                            <div class="careerfy-parallex-text">
                                
                                <h2>{{$page_information->name}}</h2>
                                <p>{{$page_information->description}} </p> 
                            </div>
                        </aside>
                     <aside class="col-md-6 careerfy-typo-wrap"> <div class="careerfy-right">
                            <img src="{{asset('/uploads/banners')}}/{{$page_information->image}}" alt=""></div> </aside>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- Main Content -->
        <style type="text/css">
.element-to-hide{
    visibility:hidden;
}
.slideRight {
    visibility: visible;
    animation-name: slideRight;
    -webkit-animation-name: slideRight;
    animation-duration: 1.5s;
    -webkit-animation-duration: 1.5s;
    animation-timing-function: ease-in-out;
    -webkit-animation-timing-function: ease-in-out;
}
@keyframes slideRight {
    0% {
        transform: translateX(-150%);
    }
    50% {
        transform: translateX(8%);
    }
    65% {
        transform: translateX(-4%);
    }
    80% {
        transform: translateX(4%);
    }
    95% {
        transform: translateX(-2%);
    }
    100% {
        transform: translateX(0%);
    }
}
@-webkit-keyframes slideRight {
    0% {
        -webkit-transform: translateX(-150%);
    }
    50% {
        -webkit-transform: translateX(8%);
    }
    65% {
        -webkit-transform: translateX(-4%);
    }
    80% {
        -webkit-transform: translateX(4%);
    }
    95% {
        -webkit-transform: translateX(-2%);
    }
    100% {
        -webkit-transform: translateX(0%);
    }
}
</style>
@if(session()->has('flash-message'))
    <div class="alert alert-danger text-center" role="alert">
        {{ session()->get('flash-message') }}
    </div>
@endif
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
@endsection



 
