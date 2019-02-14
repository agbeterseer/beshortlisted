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
 <div class="careerfy-main-content" style="background-color: #ffffff;">
             <!-- Main Section -->
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div>  
                        <section class="careerfy-fancy-title">
                                <h2>employee section</h2>
                        </section>
                                     <!-- Main Section -->
            <div class="careerfy-main-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 careerfy-typo-wrap">
                            <!-- Fancy Title -->
                            <section class="careerfy-fancy-title">
                                <h2>Featured Jobs Listings</h2>
                                <p>A better career is out there. We'll help you find it to use.</p>
                            </section>
                            <!-- Featured Jobs Listings -->
                            <div class="careerfy-job-listing careerfy-featured-listing">
                                <ul class="careerfy-row">
                                    @forelse($featured_tags as $job)
                                                    <li class="careerfy-column-6 animation-test">
                                        <div class="careerfy-table-layer">
                                            <div class="careerfy-table-row">
                                
                                                <div class="careerfy-featured-listing-text">
                                                    <h2><a href="{{route('job.description', $job->id)}}"> {{$job->job_title}}<!--  <span>Featured</span> --></a></h2>
                                                    <a href="#" class="careerfy-like-list"><i class="careerfy-icon careerfy-heart"></i></a>
                                                    <time datetime="2008-02-14 20:00">Post Date: {{ date('M d, Y', strtotime($job->updated_at)) }}  |  &nbsp;&nbsp;Apply Before: <span style="color: orange;">{{ date('M d, Y', strtotime($job->end_date)) }}</span></time> 
                                                    <div class="careerfy-featured-listing-options">
                                                    <ul>
                                                        <li><i class="careerfy-icon careerfy-maps-and-flags"></i> <a href="#">{{$job->country}},</a> <a href="#">{{$job->city}}</a></li>
                                                        <br>
                                                        <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> <a href="#">@foreach($industry_professions as $profession) @if($profession->id === $job->job_category){{$profession->name}} @endif @endforeach</a></li>
                                           
                                                    </ul>
                                                
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
                            <div class="careerfy-plain-btn"> <a href="#">View All Jobs</a> </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Main Section -->
            <div class="careerfy-main-section careerfy-parallex-full">
                <div class="container">
                    <div class="row">-
                        <aside class="col-md-6 careerfy-typo-wrap">
                            <div class="careerfy-parallex-text">
                                <h2>Millions of jobs. <br> Find the one that’s right for you.</h2>
                                <p>Search all the open positions on the web. Get your own personalised salary estimate. The right job is out there.</p>
                                <a href="#" class="careerfy-static-btn careerfy-bgcolor"><span>Search Jobs</span></a>
                            </div>
                        </aside>
                        <aside class="col-md-6 careerfy-typo-wrap"> <div class="careerfy-right">
                            <img src="extra-images/parallex-thumb-1.png" alt=""></div> </aside>
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
                                <p>A better career is out there. We'll help you find it to use.</p>
                            </section>
                            <!-- Blog -->
                            <div class="careerfy-blog careerfy-blog-grid">
                                <ul class="row">
                                    @forelse($posts as $post)
                                    <li class="col-md-4">
                                <!-- <figure><a href="#"><img src="extra-images/blog-grid-1.jpg" alt=""></a></figure> -->
                                        <div class="careerfy-blog-grid-text">
                                            <div class="careerfy-blog-tag"> <a href="#">{{$post->category}}</a> </div>
                                            <h2><a href="{{$post->url}}"> {{$post->title}}</a></h2>
                                            <ul class="careerfy-blog-grid-option">
                                                <li>BY <a href="#" class="careerfy-color">Click mag staff</a></li>
                                                <li><time datetime="2008-02-14 20:00">OCT 6, 2016</time></li>
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