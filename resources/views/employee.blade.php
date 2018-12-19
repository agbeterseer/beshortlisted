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
                                <h2>Featured Jobs Listings</h2>
                                <p>A better career is out there. We'll help you find it to use.</p>
                            </section>
                            <!-- Featured Jobs Listings -->
                            <div class="careerfy-job-listing careerfy-featured-listing">
                                <ul class="careerfy-row">
                                    <li class="careerfy-column-6">
                                         <div class="careerfy-blog-grid-text">
                                            <div class="careerfy-table-row">
                                                <figure><a href="#"><img src="extra-images/featured-listing-1.jpg" alt=""></a></figure>
                                                <div class="careerfy-featured-listing-text">
                                                    <h2><a href="#">Dropbox -- UX designer</a></h2>
                                                    <a href="#" class="careerfy-like-list"><i class="careerfy-icon careerfy-heart"></i></a>
                                                    <time datetime="2008-02-14 20:00">September 15, 2017</time>
                                                    <div class="careerfy-featured-listing-options">
                                                        <ul>
                                                            <li><i class="careerfy-icon careerfy-maps-and-flags"></i> <a href="#">Rennes,</a> <a href="#">France</a></li>
                                                            <br>
                                                            <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> <a href="#">Accountancy</a></li>
                                                        </ul>
                                                        <a href="#" class="careerfy-option-btn">Freelance</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="careerfy-column-6">
                                         <div class="careerfy-blog-grid-text">
                                            <div class="careerfy-table-row">
                                                <figure><a href="#"><img src="extra-images/featured-listing-2.jpg" alt=""></a></figure>
                                                <div class="careerfy-featured-listing-text">
                                                    <h2><a href="#">Dropbox -- UX designer</a></h2>
                                                    <a href="#" class="careerfy-like-list"><i class="careerfy-icon careerfy-heart"></i></a>
                                                    <time datetime="2008-02-14 20:00">September 15, 2017</time>
                                                    <div class="careerfy-featured-listing-options">
                                                        <ul>
                                                            <li><i class="careerfy-icon careerfy-maps-and-flags"></i> <a href="#">Derry,</a> <a href="#">United Kingdom</a></li>
                                                            <br>
                                                            <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> <a href="#">Automotive</a></li>
                                                        </ul>
                                                        <a href="#" class="careerfy-option-btn careerfy-blue">Full time</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="careerfy-column-6">
                                        <div class="careerfy-blog-grid-text">
                                            <div class="careerfy-table-row">
                                                <figure><a href="#"><img src="extra-images/featured-listing-3.jpg" alt=""></a></figure>
                                                <div class="careerfy-featured-listing-text">
                                                    <h2><a href="#">Dropbox -- UX designer</a></h2>
                                                    <a href="#" class="careerfy-like-list"><i class="careerfy-icon careerfy-heart"></i></a>
                                                    <time datetime="2008-02-14 20:00">September 15, 2017</time>
                                                    <div class="careerfy-featured-listing-options">
                                                        <ul>
                                                            <li><i class="careerfy-icon careerfy-maps-and-flags"></i> <a href="#">Aberdeen,</a> <a href="#">United Kingdom</a></li>
                                                            <br>
                                                            <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> <a href="#">Banking</a></li>
                                                        </ul>
                                                        <a href="#" class="careerfy-option-btn careerfy-red">Temporary</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="careerfy-column-6">
                                         <div class="careerfy-blog-grid-text">
                                            <div class="careerfy-table-row">
                                                <figure><a href="#"><img src="extra-images/featured-listing-4.jpg" alt=""></a></figure>
                                                <div class="careerfy-featured-listing-text">
                                                    <h2><a href="#">Dropbox -- UX designer</a></h2>
                                                    <a href="#" class="careerfy-like-list"><i class="careerfy-icon careerfy-heart"></i></a>
                                                    <time datetime="2008-02-14 20:00">September 15, 2017</time>
                                                    <div class="careerfy-featured-listing-options">
                                                        <ul>
                                                            <li><i class="careerfy-icon careerfy-maps-and-flags"></i> <a href="#">Saint-Etienne,</a> <a href="#">France</a></li>
                                                            <br>
                                                            <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> <a href="#">Restaurant</a></li>
                                                        </ul>
                                                        <a href="#" class="careerfy-option-btn careerfy-green">Part time</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="careerfy-column-6">
                                        <div class="careerfy-blog-grid-text">
                                            <div class="careerfy-table-row">
                                                <figure><a href="#"><img src="extra-images/featured-listing-5.jpg" alt=""></a></figure>
                                                <div class="careerfy-featured-listing-text">
                                                    <h2><a href="#">Dropbox -- UX designer</a></h2>
                                                    <a href="#" class="careerfy-like-list"><i class="careerfy-icon careerfy-heart"></i></a>
                                                    <time datetime="2008-02-14 20:00">September 15, 2017</time>
                                                    <div class="careerfy-featured-listing-options">
                                                        <ul>
                                                            <li><i class="careerfy-icon careerfy-maps-and-flags"></i> <a href="#">London,</a> <a href="#">United Kingdom</a></li>
                                                            <br>
                                                            <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> <a href="#">Real Estate</a></li>
                                                        </ul>
                                                        <a href="#" class="careerfy-option-btn careerfy-blue">Full time</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="careerfy-column-6">
                                         <div class="careerfy-blog-grid-text">
                                            <div class="careerfy-table-row">
                                                <figure><a href="#"><img src="extra-images/featured-listing-6.jpg" alt=""></a></figure>
                                                <div class="careerfy-featured-listing-text">
                                                    <h2><a href="#">Dropbox -- UX designer</a></h2>
                                                    <a href="#" class="careerfy-like-list"><i class="careerfy-icon careerfy-heart"></i></a>
                                                    <time datetime="2008-02-14 20:00">September 15, 2017</time>
                                                    <div class="careerfy-featured-listing-options">
                                                        <ul>
                                                            <li><i class="careerfy-icon careerfy-maps-and-flags"></i> <a href="#">Rennes,</a><br> <a href="#">France</a></li>
                                                            <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> <a href="#">Education</a></li>
                                                        </ul>
                                                        <a href="#" class="careerfy-option-btn">Freelance</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- Featured Jobs Listings -->
                            <div class="careerfy-plain-btn"> <a href="#">View All Jobs</a> </div>
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
                                    <li class="col-md-4">
                                        <figure><a href="#"><img src="extra-images/blog-grid-1.jpg" alt=""></a></figure>
                                        <div class="careerfy-blog-grid-text">
                                            <div class="careerfy-blog-tag"> <a href="#">Culture</a> </div>
                                            <h2><a href="#">Are You Paid Fairly? See Your Market Worth in Seconds</a></h2>
                                            <ul class="careerfy-blog-grid-option">
                                                <li>BY <a href="#" class="careerfy-color">Click mag staff</a></li>
                                                <li><time datetime="2008-02-14 20:00">OCT 6, 2016</time></li>
                                            </ul>
                                            <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est.</p>
                                            <a href="#" class="careerfy-read-more careerfy-bgcolor">Read Articles</a>
                                        </div>
                                    </li>
                                    <li class="col-md-4">
                                        <figure><a href="#"><img src="extra-images/blog-grid-2.jpg" alt=""></a></figure>
                                        <div class="careerfy-blog-grid-text">
                                            <div class="careerfy-blog-tag"> <a href="#">ENTERTAINMENT</a> </div>
                                            <h2><a href="#">Are You Paid Fairly? See Your Market Worth in Seconds</a></h2>
                                            <ul class="careerfy-blog-grid-option">
                                                <li>BY <a href="#" class="careerfy-color">Click mag staff</a></li>
                                                <li><time datetime="2008-02-14 20:00">OCT 6, 2016</time></li>
                                            </ul>
                                            <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est.</p>
                                            <a href="#" class="careerfy-read-more careerfy-bgcolor">Read Articles</a>
                                        </div>
                                    </li>
                                    <li class="col-md-4">
                                        <figure><a href="#"><img src="extra-images/blog-grid-3.jpg" alt=""></a></figure>
                                        <div class="careerfy-blog-grid-text">
                                            <div class="careerfy-blog-tag"> <a href="#">Living</a> </div>
                                            <h2><a href="#">Are You Paid Fairly? See Your Market Worth in Seconds</a></h2>
                                            <ul class="careerfy-blog-grid-option">
                                                <li>BY <a href="#" class="careerfy-color">Click mag staff</a></li>
                                                <li><time datetime="2008-02-14 20:00">OCT 6, 2016</time></li>
                                            </ul>
                                            <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est.</p>
                                            <a href="#" class="careerfy-read-more careerfy-bgcolor">Read Articles</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


                        <div class="careerfy-main-section careerfy-parallex-full">
                <div class="container">
                    <div class="row">

                        <aside class="col-md-6 careerfy-typo-wrap">
                            <div class="careerfy-parallex-text">
                                <h2>Millions of jobs. <br> Find the one that’s right for you.</h2>
                                <p>Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on over 600,000 companies worldwide. The right job is out there.</p>
                                <a href="{{route('job.listing')}}" class="careerfy-static-btn careerfy-bgcolor"><span>Search Jobs</span></a>
                            </div>
                        </aside>
                        <aside class="col-md-6 careerfy-typo-wrap"> <div class="careerfy-right"><img src="extra-images/parallex-thumb-1.png" alt=""></div> </aside>

                    </div>
                </div>
            </div>


 </div>
@endsection