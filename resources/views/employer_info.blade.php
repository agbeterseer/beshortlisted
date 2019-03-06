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
<div class="space">&nbsp;</div>
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
                                <p>A better career is out there. We'll help you find it.</p>
                            </section>
                            <div class="careerfy-plain-services careerfy-typo-wrap categories-list"  >
                                <ul class="row">
                                    <li class="col-md-4">
                                        <i class="careerfy-icon careerfy-curriculum"></i>
                                        <h2>CV Search</h2>
                                        <p>CV Search</p>
                                    </li>
                             <li class="col-md-4">
                                        <i class="careerfy-icon careerfy-handshake"></i>
                                        <h2>Display jobs</h2>
                                        <p>And because we understand the importance of staying connected </p>
                                    </li>
                                    <li class="col-md-4">
                                        <i class="careerfy-icon careerfy-briefcase-1"></i>
                                        <h2>Advertise a Job</h2>
                                        <p>Advertise a Job</p>
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
                            <section class="careerfy-fancy-title">
                                <h2>Plans that grow with your business</h2>
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