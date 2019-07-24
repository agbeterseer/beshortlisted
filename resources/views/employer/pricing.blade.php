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
@include('partials.employer_breadcomb')
 <div class="careerfy-main-content" style="background-color: #ffffff;">
             <!-- Main Section -->
                         <div class="col-md-12">
                            <!-- Fancy Title -->
                            <section class="careerfy-fancy-title">
                                <h2>Plans that grow with your business</h2>
                                <p></p>
                            </section>
                        </div>     
 <!-- Main Section -->
  
           
           
 </div>
 <div class="space">&nbsp;</div>
 <div class="space">&nbsp;</div>
 <div class="careerfy-priceplan-style5-wrap">
      <div class="container"> 
   @foreach($plans as $plan) 
       @if($plan->make_active === 1) 
                                <div class="col-md-4 active""> 
                                    <div class="careerfy-priceplan-style5" >
                                      @if($plan->make_active === 1) 

                                      <div class="active-plan">Most popular</div>
                                      @endif
                                      <div style="border: solid 1px #eeeeee; margin: 10px 10px 10px 10px;">
                                        <h4>{{$plan->title}} </h4>

                                        <a href="{{route('employer.payment', $plan->id)}}" class="careerfy-priceplan-style5-btn">Buy now</a>
                                         <div class="space">&nbsp;</div>
                                        <span><strong>N</strong>{{number_format($plan->price,2)}}<small></small></span>

                                      </div>
                                      <div class="space">&nbsp;</div>
                                       <div class="price_list"> <ul>
                            <?php $properties = \App\Planpackage::find($plan->id)->properties; ?>
                                @foreach($properties as $property_)
                                <li><div class="align_left"> <i class="careerfy-icon careerfy-check-square"></i>&nbsp;{{$property_->property}}</div></li>
                                @endforeach
         
                                    <?php ?>
                                        </ul></div>
                                        <div class="clearfix"></div>
 
                                    </div>
                                    </div>
 
                                    @else
                                <div class="col-md-4 active"> 
                                    <div class="careerfy-priceplan-style5">
                                   
                                            <div style="border: solid 1px #eeeeee; margin: 10px 10px 10px 10px;"> 
                                  <h4>{{$plan->title}} </h4>
                                            <a href="{{route('employer.payment', $plan->id)}}" class="careerfy-priceplan-style5-btn">Buy now</a>
                                            <div class="space">&nbsp;</div>
        <span><strong>N</strong> {{number_format($plan->price,2)}}<small></small></span>
                                            </div>
                                <div class="space">&nbsp;</div>
                                      <div class="price_list" >  <ul >
                            <?php $properties = \App\Planpackage::find($plan->id)->properties; ?>
                                @foreach($properties as $property_)
                                <li > <div class="align_left"><i class="careerfy-icon careerfy-check-square"></i> {{$property_->property}}</div>

                                </li>
          

                           
                                @endforeach
         
                                    <?php ?> 
                                        </ul></div>
                                        <div class="clearfix"></div>

                                   
                                    </div>
                               
                                    </div>
                                  @endif


                                @endforeach
   
                            </div> 
                            </div>   
@endsection