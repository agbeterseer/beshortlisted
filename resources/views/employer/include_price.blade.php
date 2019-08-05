<div class="careerfy-priceplan-style5-wrap">
      <div class="container"> 
   @foreach($plans as $plan) 
       @if($plan->make_active === 1) 
                                <div class="col-md-4 active""> 
                                    <div class="careerfy-priceplan-style5" >
                                      @if($plan->make_active === 1) 

                                      <div class="active-plan">Most popular</div>
                                      @endif
                                      <div style="border: solid 0px #eeeeee; margin: 10px 10px 10px 10px;">
                                        <h6>{{$plan->title}} </h6>
                                        <div class="space">&nbsp;</div>
                                        <span><strong>N</strong>{{number_format($plan->price,2)}}<small></small></span>
                                        <a href="{{route('employer.payment', $plan->id)}}" class="careerfy-priceplan-style5-btn">Buy now</a>
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
                                <div class="col-md-4"> 
                                    <div class="careerfy-priceplan-style5"> 
                                            <div style="border: solid 0px #eeeeee; margin: 10px 10px 10px 10px;"> 
                                  <h6>{{$plan->title}} </h6>
                                  <span><strong>N</strong> {{number_format($plan->price,2)}}<small></small></span>
                                  <div class="space">&nbsp;</div>
                                   <a href="{{route('employer.payment', $plan->id)}}" class="careerfy-priceplan-style5-btn">Buy now</a>
                                            <div class="space">&nbsp;</div>
        
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