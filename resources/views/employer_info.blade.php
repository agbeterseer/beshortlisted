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
@if(Auth::check())
@include('partials.employer_breadcomb')
@endif 
<div class="space">&nbsp;</div>
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
                                          Unlimited access to your Candidate Pool Track Applications. Access candidates’ profiles<br>
                                          Unlimited Applications Bulk Post (Payfor multiple Job post). Pay for multiple post<br>
                                          Be able to post for 1year with purchased post </p>
                                    </li> 
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
                            <section  >
                                 <div align="center">
                                <h2>Plans that grow with your business</h2>
                              </div>
                                <!-- <p>30 Day Money Back Guarantee. 100% satisfied or your money back</p> -->
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
                    </div>
                </div>
 
 
 </div>
@endsection