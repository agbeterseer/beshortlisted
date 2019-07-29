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

     <style>
     div.b {
    line-height: 30px;
    font-size:14px;
}

     </style>
     <style>
	button2 important! {
		font-family: 'Comic Sans MS';
		font-size: 2em;
		padding: 0.5em 1em;
		color: royalblue;
		background: gold;
		border-radius: 6em;
		box-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        border-radius: 65px o!;
	}
</style>
<div class="careerfy-main-content" style="background-color: #ffffff; ">
 <!-- Main Section -->
            <div class="careerfy-main-section careerfy-plain-services-full">
                <div class="container">
                    <div class="row">  
 <!-- //{{route('employer.make_upgrade')}} -->
 <input type="hidden" name="id" value="{{$id}}">
  <input type="hidden" name="employer_package" value="{{$employer_package->package_id}}">
    <input type="hidden" name="employer_package_units" value="{{$employer_package->units}}">
                        <div class="col-md-12">
                            <!-- Fancy Title -->
                            <div class="col-md-6">
                        <section class="careerfy-fancy-title">
                                <h2>Package Upgrade</h2> 
                            </section>
                            <div align="center" class="b">
You are currently on   @foreach($packages as $package)  @if($package->id === $employer_package->package_id)<strong> {{$package->title}} </strong> @endif @endforeach
and your current unit is:  {{$employer_package->units}}
  
  <div class="b" >
    <br>Upgrading to another package at this time <br>will result in lost of units from the previous plan,
    However you will be credited afresh with the upgraded plan.
  </div> 
   </div> 
  </div>

<div class="col-md-6">
         @if($plan) 
                                <div class="col-md-12 active"> 
                                    <div class="careerfy-priceplan-style5" >
                                      @if($plan->make_active === 1) 

                                      <div class="active-plan">Most popular</div>
                                      @endif 
                                        <h6>{{$plan->title}} </h6>

                                        <a href="{{route('upgrade.payment', $plan->id)}}" class="careerfy-priceplan-style5-btn">Buy now</a>
                                         <div class="space">&nbsp;</div>
                                        <span><strong>N</strong>{{number_format($plan->price,2)}}<small></small></span> 
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
                                    @endif 
</div>


                        </div> 

                    </div>
                </div>
            </div>
           

            <!-- Main Section -->
            <!-- Main Section -->
  
            </div>
 
@endsection