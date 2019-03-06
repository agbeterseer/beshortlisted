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
                                <h2>Blog Post</h2>
                        </section>
    
            <!-- Main Section -->

              <!-- Main Section -->
            <div class="careerfy-main-section">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 careerfy-typo-wrap">
                            <!-- Fancy Title -->
                            <section class="careerfy-fancy-title">
                                <h2>{{$post->title}}d</h2> 
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
            <div class="space">&nbsp;</div>
            <div class="space">&nbsp;</div>
            <div class="space">&nbsp;</div>
            <div class="space">&nbsp;</div>
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
                                            <h2><a href="{{$post->url}}">{{$post->title}}</a></h2>
                                            <ul class="careerfy-blog-grid-option">
                                                <li>BY <a href="#" class="careerfy-color"><!-- name --></a></li>
                                                <li><time datetime="2008-02-14 20:00">OCT 6, 2016</time></li>
                                            </ul>
                                            <!-- <p></p> -->
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