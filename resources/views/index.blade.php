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
    <!-- Wrapper --> 
        <!-- Header --> 
        <!-- Header -->
                @if(Session()->has('success'))
                        <div class="alert alert-success"> 
                        {!! Session::get('success') !!}
                        </div>
                        @endif
        <!-- Banner -->
        <div class="careerfy-banner careerfy-typo-wrap">
            <span class="careerfy-banner-transparent"></span>
            <div class="careerfy-banner-caption">
                <div class="container">
                    <div class="text-content" > 
                     <h1>Aim Higher. Reach Farther. Dream Bigger.</h1>
                    <p>A better career is out there. We'll help you find it.</p> </div>
                    <form class="careerfy-banner-search" action="{{route('job.listing')}}" method="GET" id="find_jobs">
                        <div class=" col-md-4 careerfy-select-style">
                                    <select name="s"  required="required">
                                    <option value="">Select Industry</option>
                                    @foreach($industries as $industry)
                                        <option value="{{$industry->id}}">{{$industry->name}}</option> 
                                        @endforeach 
                                    </select>
                                </div>
             <div class=" col-md-2 careerfy-select-style"> 
                                    <select name="location"  required="required">
                                    <option value="">Select City</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option> 
                                        @endforeach 
                                    </select>
                                </div> 
                         <div class="col-md-4 careerfy-select-style">
                                    <select name="job_function" required="required" >
                                    <option value="">Select Job Function</option>
                                    @foreach($industry_professions as $industry_profession)
                                        <option value="{{$industry_profession->id}}">{{$industry_profession->name}}</option>
                                        @endforeach
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
 
        <!-- Main Content -->
        <div class="careerfy-main-content" style="background-color: #ffffff;"> 
            <!-- Main Section -->
            <div class="careerfy-main-section careerfy-counter-full">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Counter -->
                            <div class="careerfy-counter">
                                <ul class="row">
                                    <li class="col-md-4">
                                        <span class="word-counter">{{$jobs_count}}<!-- 123,012 --></span>
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
                            <!-- Counter -->
                        </div> 
                    </div>
                </div>
            </div>
            <!-- Main Section -->
       
            <!-- Main Section -->
            <div class="careerfy-main-section animation-test">
                <div class="container">
                    <div class="row">
                 <div class="careerfy-element-text" align="center" data-os-animation="fadeIn">
                       <h2>Featured Jobs Listings</h2>
                        </div> 
                        <div class="col-md-12 careerfy-typo-wrap">
                            <!-- Fancy Title -->  
                          <div class="space">&nbsp;</div>
                            <!-- Featured Jobs Listings  jobs-->
                            <div class="careerfy-job-listing careerfy-featured-listing">
                                <ul class="careerfy-row">
                                @forelse($jobs as $job)
                                    <li class="careerfy-column-6 animation-test">
                                        <div class="careerfy-table-layer">
                                            <div class="careerfy-table-row">
                                     <!--     <figure><a href="{{route('apply.job', $job->id)}}"><img src="{{asset('img/extra-images/featured-listing-1.jpg')}}" alt="" height="65" width="65"></a></figure> -->
                                                <div class="careerfy-featured-listing-text">
                                                    <h2><a href="{{route('job.description', $job->id)}}"> {{$job->job_title}}<!--  <span>Featured</span> --></a></h2>
                                                    <a href="#" class="careerfy-like-list"><i class="careerfy-icon careerfy-heart"></i></a>
                                                    <time datetime="2008-02-14 20:00">Post Date: {{ date('M d, Y', strtotime($job->updated_at)) }}  |  &nbsp;&nbsp;Apply Before: <span style="color: orange;">{{ date('M d, Y', strtotime($job->end_date)) }}</span></time> 
                                                    <div class="careerfy-featured-listing-options">
                                                    <ul>
                                                        <li><i class="careerfy-icon careerfy-maps-and-flags"></i> <a href="#">{{$job->country}},</a> <a href="#">{{$job->city}}</a></li>
                                                        <br>
                                                        <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> <a href="#">@foreach($industry_professions as $profession) @if($profession->id === $job->job_category){{$profession->name}} @endif @endforeach</a></li>
                                                        <li>| <i>  @foreach($employement_term_list as $employement_term) @if($employement_term->id === $job->job_type){{$employement_term->name}} @endif @endforeach</i></li>
                                                    </ul>
                                                        <a href="#" class="careerfy-option-btn">@foreach($employement_term_list as $employement_term) @if($employement_term->id === $job->job_type)featured @endif @endforeach</a>
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
        <td width="50%"><i class="careerfy-icon {{$job->industry}}"></i> {{$job->job_title}}@foreach($industries as $industry) @if($industry->id === $job->industry) {{ $industry->name}} @endif @endforeach </td>
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
                        <div class="col-md-12 careerfy-typo-wrap">
                            <div class="categories-list"> 
                                <ul class="careerfy-row">
                                @foreach($industries_paginage as $industry)
                                    <li class="careerfy-column-3">
                                        <i class="careerfy-icon {{$industry->icon}}"></i>
                                        <a href="#">{{$industry->name}}</a>
                                        <span> @foreach($job_function_count as $function_count) @if($function_count->job_category === $industry->id) {{ $function_count->total}}  @endif @endforeach Open Vacancie(s) </span>
                                    </li>
                                    @endforeach
                  
                                </ul>
                            </div>
                            <div class="careerfy-plain-btn"> <a href="{{route('list_industries')}}">Browse All Industries</a> </div> 
                        </div>
                    </div>
                </div>
            </div>
                    <div class="space">&nbsp;</div>
                    <div class="space">&nbsp;</div>
                    <div class="space">&nbsp;</div>
                    <div class="space">&nbsp;</div>
                      </div>
            <!-- Main Section -->
<div class="jobsearch-main-section careerfy-element-list-full animation-test">
                <div class="container">
                    <div class="row">
                    <section class="careerfy-element-text h2_center" >
                           &nbsp;&nbsp;<h2 class="h2_center">How it works?</h2>        
                        <div class="space">&nbsp;</div>
                        <div class="space">&nbsp;</div>
                        <div class="space">&nbsp;</div>
                        <div class="space">&nbsp;</div>
                        <div class="careerfy-element-text col-md-3 h2_center">
                            <h2>Just 3 steps</h2>
                            we will match you with your best fit.
                 <!--            <a href="#">Our Services <i class="careerfy-icon careerfy-right-arrow-long"></i></a> -->
                        </div>
                        <div class="col-md-8 ">
                            <ul class="careerfy-element-list row">
                                <li class="col-md-4">
                                    <img src="{{asset('/img/iconv8-01.png')}}" alt="">
                                    <h3>Post a job offer</h3>
                                </li>
                                <li class="col-md-4">
                                 <img src="{{asset('img/iconv8-03.png')}}" alt="">
                                    <h3>Find your candidate</h3>
                                </li>
                                <li class="col-md-4">
                                         <img src="{{asset('/img/iconv8-02.png')}}" alt="">
                                    <h3>Hire the best one</h3>
                                </li>
                            </ul>
                        </div>
                    </div>
            </section>
                </div>
            </div>
                    <div class="space">&nbsp;</div>
                    <div class="space">&nbsp;</div>
                    <div class="space">&nbsp;</div>
                    <div class="space">&nbsp;</div>
                    <div class="careerfy-main-section animation-test" >
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
                        <a href="#find_jobs" class="careerfy-static-btn careerfy-bgcolor"  ><span>Search Jobs</span></a>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
            <!-- Main Section -->
            <div class="careerfy-main-section careerfy-parallex-full animation-test">
                <div class="container">
                    <div class="row">
                        <aside class="col-md-6 careerfy-typo-wrap">
                            <div class="careerfy-parallex-text">
                                <h2>Millions of jobs. <br> Find the one that’s right for you.</h2>
                                <p>Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on over 600,000 companies worldwide. The right job is out there.</p>
                                <a href="#" class="careerfy-static-btn careerfy-bgcolor"><span>User Jobs</span></a>
                            </div>
                        </aside>
                        <aside class="col-md-6 careerfy-typo-wrap"> <div class="careerfy-right"><img src="{{asset('/recruit/extra-images/parallex-thumb-1.png')}}" alt=""></div> </aside>
                    </div>
                </div>
            </div>
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



 
