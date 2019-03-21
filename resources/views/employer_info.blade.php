@extends('layouts.jobboard', [
  'page_header' => 'Employer',
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
<style type="text/css">
    .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
</style>
@if(Auth::check())
@include('partials.employer_breadcomb')
@endif  
             <div class="careerfy-main-section careerfy-parallax-style4-full">
                <div class="container">
                    <div class="row">
                        
                        <!-- Parallax -->
                        <div class="col-md-7 careerfy-parallax-style4">
                            <span>60 Days Posting Period</span>
                            <h2>Unlimited access to your Candidate Pool</h2>
                            <p>We will match candidates that best fit your job post.</p>
                            <a href="{{route('post.jobs')}}" class="careerfy-parallax-style4-btn">Post a Job</a>
                        </div>
                        <div class="col-md-5"><img src="{{asset('/recruit/images/parallex-style4-img.png')}}" alt=""></div>
                        <!-- Parallax -->

                    </div>
                </div>
            </div>
 <div class="careerfy-main-content" style="background-color: #ffffff;">
             <!-- Main Section --> 

 <!-- Main Section -->
             <div class="careerfy-main-section careerfy-plain-services-full">
                <div class="container">
                    <div class="row"> 
                        <div class="col-md-12">
                            <!-- Fancy Title -->
                        @if(session()->has('no_unit_infor'))
                        <div class="alert alert-danger"> 
                        {!! Session::get('no_unit_infor') !!}
                        </div>
                        @endif 
                            <section >
                              <div align="center">
                                <h2>Why beshortlisted is different</h2>
                                <p>A better career is out there. We'll help you find it.</p>
                                </div>
                            </section>
                            <div class="careerfy-plain-services careerfy-typo-wrap categories-list"  >
                                <ul class="row">
                                    <li class="col-md-4">
                                        <i class="careerfy-icon careerfy-curriculum"></i>
                                        <h2>CV Search</h2>
                                        <p>Find CV’s specific to your industry and Vacant<br> position, Choose Industry, Choose position Years of experience, View profiles </p>
                                    </li>
                             <li class="col-md-4">
                                        <i class="careerfy-icon careerfy-handshake"></i>
                                        <h2>Display jobs</h2>
                                        <p>Job Matching -Benefit from our robust database <br>and reduce recruitment time. Get recommendations in 72 hours of your requestoGuaranteed<br> 80% interview attendanceoWe do the candidate sourcing & pre-screening for youoSave time </p>
                                    </li>
                                    <li class="col-md-4">
                                        <i class="careerfy-icon careerfy-briefcase-1"></i>
                                        <h2>Advertise a Job</h2>
                                        <p>60 Days Posting Period <br>
                                          Unlimited access to your Candidate <br>Pool Track Applications. Access candidates’ profiles
                                          Unlimited Applications Bulk Post <br>(Payfor multiple Job post). Pay for multiple post<br>
                                          Be able to post for 1year with purchased post </p>
                                    </li> 
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
                       <div class="careerfy-main-section careerfy-services-stylethree-full">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <!-- FancyTitle -->
                                     <section >
                              <div align="center">
                                <h2>How Does it  Work?</h2>
                                <p>Just 3 steps, we will match you with your best fit.</p>
                                </div>
                            </section>
 
                            <!-- FancyTitle -->
                            <!-- Services -->
                            <div class="careerfy-services careerfy-services-stylethree">
                                <ul class="row">
                                    <li class="col-md-4">
                                        <div class="careerfy-services-stylethree-wrap"> 
                                            <img src="{{asset('/img/iconv8-01.png')}}" alt="" class="center">
                                            <h2>Post</h2>
                                            <p>Post a job openning, get reviewed and published </p>
                                            <span>01</span>
                                        </div>
                                    </li>
                                    <li class="col-md-4">
                                        <div class="careerfy-services-stylethree-wrap"> 
                                             <img src="{{asset('img/iconv8-03.png')}}" alt="" class="center">
                                            <h2>Target</h2>
                                            <p>Get candidates that match your requirement with automatch.</p>
                                            <span>02</span>
                                        </div>
                                    </li>
                                    <li class="col-md-4">
                                        <div class="careerfy-services-stylethree-wrap">
                                           <img src="{{asset('/img/iconv8-02.png')}}" alt="" class="center"> 
                                            <h2>Hire</h2>
                                            <p>Hire the best fit for the Job</p>
                                            <span>03</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- Services -->
                        </div>

                    </div>
                </div>
            </div>

            <!-- Main Section -->
            <!-- Main Section -->
  
<div class="careerfy-priceplan-style5-wrap">
      <div class="container">
   @foreach($plans as $plan) 
       @if($plan->make_active === 1) 
                                <div class="col-md-4 active"> 
                                    <div class="careerfy-priceplan-style5">
                                      @if($plan->make_active === 1) 

                                      <div class="active-plan">Most popular</div>
                                      @endif
                                        <h6>{{$plan->title}} </h6>
                                        <span><strong>N</strong>{{$plan->price}}<small>/yr</small></span>
                                        <ul>
                            <?php $properties = \App\Planpackage::find($plan->id)->properties; ?>
                                @foreach($properties as $property_)
                                <li> <i class="careerfy-icon careerfy-check-square"></i>{{$property_->property}}</li>
                                @endforeach
         
                                    <?php ?> 
                              <!--               <li>10 <small>Job Posts</small></li>
                                            <li>No Access</li>
                                            <li>No Support</li> -->
                                        </ul>
                                        <div class="clearfix"></div>
                                        <a href="{{route('employer.payment', $plan->id)}}" class="careerfy-priceplan-style5-btn">Buy now</a>
                                    </div>
                                    </div>
 
                                    @else
                                <div class="col-md-4"> 
                                    <div class="careerfy-priceplan-style5">
                                       <h6>{{$plan->title}} </h6>
                                        <span><strong>N</strong>{{$plan->price}}<small>/yr</small></span>
                                        <ul>
                            <?php $properties = \App\Planpackage::find($plan->id)->properties; ?>
                                @foreach($properties as $property_)
                                <li><i class="careerfy-icon careerfy-check-square"></i> {{$property_->property}}</li>
                                @endforeach
         
                                    <?php ?> 
                              <!--               <li>10 <small>Job Posts</small></li>
                                            <li>No Access</li>
                                            <li>No Support</li> -->
                                        </ul>
                                        <div class="clearfix"></div>
                                        <a href="{{route('employer.payment', $plan->id)}}" class="careerfy-priceplan-style5-btn">Buy now</a>
                                    </div>
                                    </div>
                                  @endif


                                @endforeach
  
                              </div>
                            </div>       

              <!-- Main Section -->
              <!-- Main Section -->

 
 
 </div>
@endsection