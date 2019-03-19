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
@if(Auth::check())
@include('partials.employee_breadcomb') 
@endif
 <div class="careerfy-main-content">   
<!--                         <section class="careerfy-fancy-title">
                                <h2>Welcome candidate</h2>
                        </section>  -->
                                     <!-- Main Section -->
            <div class="careerfy-main-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 ">
                            <!-- Fancy Title -->
                            <section class="careerfy-fancy-title">
                                <h2>Featured Jobs Listings</h2>
                                <p>Find jobs that fit, your industry, your experience and a current role on your dashboard.<br>{Tailor dashboard by industry and role}, receive newsletters and job notifications.</p>
                            </section>
                            <!-- Featured Jobs Listings -->
                            <div class="careerfy-job-listing careerfy-featured-listing">
                                <ul class="careerfy-row">
                                    @forelse($featured_tags as $job)
                                                    <li class="careerfy-column-6 animation-test">
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
                                             <a href="{{route('apply.job', $job->id)}}" class="careerfy-option-btn"> Apply </a>    </ul>
                                                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li> 

        

                                    @empty
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
            <div class="careerfy-main-section careerfy-parallex-full" style="background-color: #ffffff;">
                <div class="container">
                    <div class="row">-
                        <aside class="col-md-6 careerfy-typo-wrap">
                            <div class="careerfy-parallex-text">

                                <h2>{{$page_information->name}}</h2>
                                <p>{{$page_information->description}}</p>
                                <!-- <a href="#" class="careerfy-static-btn careerfy-bgcolor"><span>Search Jobs</span></a> -->
                            </div>
                        </aside>
                        <aside class="col-md-6 careerfy-typo-wrap"> <div class="careerfy-right">
                            <img src="{{asset('/uploads/banners')}}/{{$page_information->image}}" alt=""></div> </aside>
                    </div>
                </div>
            </div>
            <!-- Main Section -->
 
 <div class="careerfy-main-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Fancy Title -->
                            <section class="careerfy-fancy-title">
                                <h2>From Our Blogs</h2>
                                <!-- <p>A better career is out there. We'll help you find it to use.</p> -->
                            </section>
                            <!-- Blog -->
                            <div class="careerfy-blog careerfy-blog-grid"  style="background-color: #ffffff;">
                                <ul class="row">
                                    @forelse($posts as $post)
                                    <li class="col-md-4">
                            <figure><a href="#"><img src="{{ asset('/uploads/banners')}}/{{ $post->image_link }}" alt="" height="351" width="192"></a></figure>
                                        <div class="careerfy-blog-grid-text">
                                            <div class="careerfy-blog-tag"> <a href="#">{{$post->category}}</a> </div>
                                            <h2><a href="{{$post->url}}"> {{ str_limit($post->title, $limit = 29, $end = '...') }}</a></h2>
                                            <ul class="careerfy-blog-grid-option">
                                                <li>BY <a href="#" class="careerfy-color">Click mag staff</a></li>
                                                <li><time datetime="2008-02-14 20:00">{{$post->created_at}}</time></li>
                                            </ul>
                                            <p> </p>
                                            <a href="{{route('blog.show', $post->id)}}" class="careerfy-read-more careerfy-bgcolor">Read Articles</a>
                                        </div>
                                    </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 
 </div>
@endsection