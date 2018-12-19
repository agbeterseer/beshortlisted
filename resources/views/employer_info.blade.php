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
   'resume_' => '',
   'employer_infor' => 'active'
])

@section('content')
 <div class="careerfy-main-content" style="background-color: #ffffff;">
             <!-- Main Section -->
                       
 <!-- Main Section -->
            <div class="careerfy-main-section careerfy-plain-services-full">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <!-- Fancy Title -->
                            <section class="careerfy-fancy-title">
                                <h2>What We Have</h2>
                                <p>A better career is out there. We'll help you find it to use.</p>
                            </section>
                            <div class="careerfy-plain-services">
                                <ul class="row">
                                    <li class="col-md-4">
                                        <i class="careerfy-icon careerfy-curriculum"></i>
                                        <h2>CV Search</h2>
                                        <p>Amet, consectetur adipiscing elit. Sed eu ante eget nisl convallis tempus. Phasellus ante lectus, tincidunt tincidunt dui a, rhoncus interdum est.</p>
                                    </li>
                             <li class="col-md-4">
                                        <i class="careerfy-icon careerfy-handshake"></i>
                                        <h2>Display jobs</h2>
                                        <p>And because we understand the importance of staying connected, Nimble enables people to send mobile airtime top-ups.</p>
                                    </li>
                                    <li class="col-md-4">
                                        <i class="careerfy-icon careerfy-briefcase-1"></i>
                                        <h2>Advertise a Job</h2>
                                        <p>Sit amet consectetur adipiscing elit. Sed eu ante eget nisl convallis tempus. Phasellus ante lectus, tincidunt tincidunt dui a, rhoncus interdum est.</p>
                                    </li>
                         <!--            <li class="col-md-4">
                                        <i class="careerfy-icon careerfy-office2"></i>
                                        <h2>For Agencies</h2>
                                        <p>Over the coming years Ismail worked with a number of remittance businesses as well as international policy makers.</p>
                                    </li>
                                    <li class="col-md-4">
                                        <i class="careerfy-icon careerfy-handshake"></i>
                                        <h2>Display jobs</h2>
                                        <p>And because we understand the importance of staying connected, Nimble enables people to send mobile airtime top-ups.</p>
                                    </li>
                                    <li class="col-md-4">
                                        <i class="careerfy-icon careerfy-search-1"></i>
                                        <h2>Temp Search</h2>
                                        <p>Millions of us now rely on Mobile Money services instead of bank accounts, so we offer transfers directly to them.</p>
                                    </li> -->
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Main Section -->
            <!-- Main Section -->
  
         

              <!-- Main Section -->
              <!-- Main Section -->
            <div class="careerfy-main-section careerfy-packages-priceplane-full">
                <div class="container">
                    <div class="row"> 
                        <div class="col-md-12">
                            <!-- Fancy Title -->
                            <section class="careerfy-fancy-title">
                                <h2>Plans that grow with your business</h2>
                                <p>30 Day Money Back Guarantee. 100% satisfied or your money back</p>
                            </section>
                        </div>

                        @foreach($plans as $plan)
                        <div class="col-md-3">
                        @if($plan->id === 1)
                          
                                  <div class="careerfy-packages-priceplane active">
                          
                                <h2>{{$plan->title}}</h2>
                                <div class="packages-priceplane-price">
                                    <strong><small>N</small>{{$plan->price}}.00</strong>
                                          @if($plan->title ===  'Basic')
                                   <span>Free</span>
                                    @else
                                     <span>Per month</span>
                                    @endif
                                </div>
                                <ul>
                     <?php $properties = \App\Planpackage::find($plan->id)->properties; ?>
                                @foreach($properties as $property_)
                                <li><i class="careerfy-icon careerfy-check-square"></i> {{$property_->property}}</li>
                                @endforeach
         
                                    <?php ?> 
                                </ul>
                                <a href="{{route('employer.payment', $plan->id)}}" class="careerfy-packages-priceplane-btn">Proceed</a>
                            </div>
                        </div>
                            @else
                 <div class="careerfy-packages-priceplane">
                                <h2> {{$plan->title}}</h2>
                                <div class="packages-priceplane-price">
                                    <strong><small>N</small>{{$plan->price}}.00</strong>
                                    @if($plan->title ===  'Basic')
                                   <span>Free</span>
                                    @else
                                     <span>Per month</span>
                                    @endif
                                </div>
                                <ul>
                                <?php $properties = \App\Planpackage::find($plan->id)->properties; ?>
                                @foreach($properties as $property_)
                                <li><i class="careerfy-icon careerfy-check-square"></i> {{$property_->property}}</li>
                                @endforeach
         
                                    <?php ?> 
                                </ul>
                                <a href="{{route('employer.payment', $plan->id)}}" class="careerfy-packages-priceplane-btn">Proceed</a>
                            </div>
                        </div>
                          @endif
                        @endforeach

 
                  <!--       <div class="col-md-3">
                            <div class="careerfy-packages-priceplane active">
                                <h2>Standard Jobs</h2>
                                <div class="packages-priceplane-price">
                                    <strong><small>N</small>99.00</strong>
                                    <span>Per month</span>
                                </div>
                                <ul>
                                    <li><i class="careerfy-icon careerfy-check-square"></i> 1 job posting</li>
                                    <li><i class="careerfy-icon careerfy-check-square"></i> Featured On Demand</li>
                                    <li><i class="careerfy-icon careerfy-check-square"></i> Job displayed for 20 days</li>
                                    <li><i class="careerfy-icon careerfy-check-square"></i> Premium Support 24/7</li>
                                </ul>
                                <a href="#" class="careerfy-packages-priceplane-btn">Proceed</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="careerfy-packages-priceplane">
                                <h2>Golden Package</h2>
                                <div class="packages-priceplane-price">
                                    <strong><small>N</small>199.00</strong>
                                    <span>Per month</span>
                                </div>
                                <ul>
                                    <li><i class="careerfy-icon careerfy-check-square"></i> 1 job posting</li>
                                    <li><i class="careerfy-icon careerfy-check-square"></i> Featured On Demand</li>
                                    <li><i class="careerfy-icon careerfy-check-square"></i> Job displayed for 20days</li>
                                    <li><i class="careerfy-icon careerfy-check-square"></i> Premium Support 24/7</li>
                                </ul>
                                <a href="#" class="careerfy-packages-priceplane-btn">Proceed</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="careerfy-packages-priceplane">
                                <h2>Supper Jobs</h2>
                                <div class="packages-priceplane-price">
                                    <strong><small>N</small>399.00</strong>
                                    <span>Per month</span>
                                </div>
                                <ul>
                                    <li><i class="careerfy-icon careerfy-check-square"></i> 1 job posting</li>
                                    <li><i class="careerfy-icon careerfy-check-square"></i> Featured On Demand</li>
                                    <li><i class="careerfy-icon careerfy-check-square"></i> Job displayed for 20 days</li>
                                    <li><i class="careerfy-icon careerfy-check-square"></i> Premium Support 24/7</li>
                                </ul>
                                <a href="#" class="careerfy-packages-priceplane-btn">Proceed</a>
                            </div>
                        </div> -->

                    </div>
                </div>
             
            <!-- Main Section -->
            <!-- Main Section -->
<!--  <div class="careerfy-main-section">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <section class="careerfy-fancy-title">
                                <h2>From Our Blogs</h2>
                                <p>A better career is out there. We'll help you find it to use.</p>
                            </section>
                       
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
            </div> -->


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