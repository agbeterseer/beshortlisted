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
                        <section class="careerfy-fancy-title">
                                <h2>Welcome to employee section</h2>
                        </section>
            <div class="careerfy-main-section careerfy-parallex-full">
                <div class="container">
                    <div class="row">

                        <aside class="col-md-6 careerfy-typo-wrap">
                            <div class="careerfy-parallex-text">
                                <h2>Millions of jobs. <br> Find the one that’s right for you.</h2>
                                <p>Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on over 600,000 companies worldwide. The right job is out there.</p>
                                <a href="#" class="careerfy-static-btn careerfy-bgcolor"><span>Search Jobs</span></a>
                            </div>
                        </aside>
                        <aside class="col-md-6 careerfy-typo-wrap"> <div class="careerfy-right"><img src="extra-images/parallex-thumb-1.png" alt=""></div> </aside>

                    </div>
                </div>
            </div>
            <!-- Main Section -->

              <!-- Main Section -->
            <div class="careerfy-main-section">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 careerfy-typo-wrap">
                            <!-- Fancy Title -->
                            <section class="careerfy-fancy-title">
                                <h2>{{$post->title}}</h2>
                         
                            </section>
                            <!-- Featured Jobs Listings -->
                            <div class="careerfy-job-listing" style="text-align: center;" >
                               {!!  $post->content !!}

                            </div>
                            <!-- Featured Jobs Listings -->
                           
                        </div>

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
                                    @if($post->post_type === 'blog')
                                    <li class="col-md-4">
                                        <figure><a href="#"><img src="extra-images/blog-grid-1.jpg" alt=""></a></figure>
                                        <div class="careerfy-blog-grid-text">
                                            <div class="careerfy-blog-tag"> <a href="#">{{$post->category}}</a> </div>
                                            <h2><a href="{{$post->url}}"> {{$post->title}}</a></h2>
                                            <ul class="careerfy-blog-grid-option">
                                                <li>BY <a href="#" class="careerfy-color">Click mag staff</a></li>
                                                <li><time datetime="2008-02-14 20:00">OCT 6, 2016</time></li>
                                            </ul>
                                            <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est.</p>
                                            <a href="#" class="careerfy-read-more careerfy-bgcolor">Read Articles</a>
                                        </div>
                                    </li>
                                    @endif
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