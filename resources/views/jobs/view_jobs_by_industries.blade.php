
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
   'resume_' => 'active'
])

@section('content')
@include('partials.employee_breadcomb')
 <div class="careerfy-main-content">
             <!-- Main Section -->
        <div class="space">&nbsp;</div>
         <div class="space">&nbsp;</div>
          <div class="space">&nbsp;</div>
                  <div class="careerfy-main-section animation-test" >
                <div class="container">
                    <div class="row">
                 <div class="careerfy-element-text" align="center" data-os-animation="fadeIn">
                       <h2>Jobs Listings</h2>
                        </div> 
                        <div class="col-md-12 careerfy-typo-wrap">
                            <!-- Fancy Title -->  
                          <div class="space">&nbsp;</div>
                            <!-- Featured Jobs Listings  jobs-->
                            <div class="careerfy-job-listing careerfy-featured-listing" >
                                <ul class="careerfy-row">
                             @forelse($jobs_by_industries as $job)
                               
                                    <li class="careerfy-column-6 animation-test" >
                                        <div class="careerfy-table-layer" style="background-color: #ffffff;">
                                            <div class="careerfy-table-row">
                                       <figure><a href="{{route('job.description', $job->id)}}"><img src="{{asset('/img/job.png')}}" alt=""></a></figure>
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
                            <!-- <div class="careerfy-plain-btn"> <a href="{{route('list.job', 'job-list')}}">View All Jobs</a> </div> -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- Main Section -->
 

              <!-- Main Section -->
  
            <!-- Main Section -->



 </div>
@endsection
