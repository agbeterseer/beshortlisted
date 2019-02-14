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
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div> 
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div> 
                 <div class="space">&nbsp;</div>
        <div class="space">&nbsp;</div> 
                         <div class="space">&nbsp;</div>
        <div class="space">&nbsp;</div>
          <div class="careerfy-main-section">
                <div class="container">
                 
                    <div class="row">

         <div class="careerfy-employer-box-section" style="background-color: #ffffff;">
                                            <div class="careerfy-profile-title"><h2>Address / Location</h2></div>



                                                           <aside class="col-md-6 careerfy-typo-wrap">
                            <div class="careerfy-parallex-text">
                              @foreach($contact as $cont)
                              <div class="row">
                            <div class="col-md-3"> <label>Country :</label></div>
                            <div class="col-md-3">@foreach($countries as $country) @if($country->code === $cont->country){{$country->name_en}} @endif @endforeach<br></div>
                          </div> 
                          <div class="row">
                            <div class="col-md-3"> <label>State :</label></div>
                            <div class="col-md-3">{{$cont->state}}<br></div>
                          </div> 
                         <div class="row">
                            <div class="col-md-3"> <label>City :</label></div>
                            <div class="col-md-3">{{$cont->city}}<br></div>
                          </div> 
                          <div class="row">
                            <div class="col-md-3"> <label>Street Name :</label></div>
                            <div class="col-md-3">{{$cont->street_name}}<br></div>
                          </div>
                          <div class="row">
                            <div class="col-md-3"> <label>Postal Code :</label></div>
                            <div class="col-md-3">{{$cont->postalcode}}<br></div>
                          </div> 
                           <div class="row">
                            <div class="col-md-3"> <label>Phone Number :</label></div>
                            <div class="col-md-3">{{$cont->phonenumber}}<br></div>
                          </div> 
                            <div class="row">
                            <div class="col-md-3"> <label>Email :</label></div>
                            <div class="col-md-3">{{$cont->email}}<br></div>
                          </div> 
  
                                @endforeach
            
                            </div>
                        </aside>
                                                
                                        </div>
 
            
                            </div>
                        </aside>
<!--                         <aside class="col-md-6 careerfy-typo-wrap"> <div class="careerfy-right">
                            <img src="{{asset('recruit/extra-images/parallex-thumb-1.png')}}" alt=""></div> </aside> -->
                    </div>
                </div>
            </div>

         
         <div class="careerfy-main-content"> 
                   @if(Session()->has('success'))
                        <div class="alert alert-success"> 
                        {!! Session::get('success') !!}
                        </div>
                  @else
            <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center element-top-80 element-bottom-20 os-animation normal" data-os-animation="fadeIn" data-os-animation-delay="0s"> Get in touch </h1>
                            <div class="divider-border divider-border-center element-top-20 element-bottom-20 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0s">
                                <div class="divider-border-inner"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8"> 
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                              <form class="contact-form" method="POST" action="{{route('post.message')}}"  >
                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-icon-group"> <i class="fa fa-user"></i> <input class="form-control" id="name" name="name" placeholder="Your name *" type="text" required="required"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-icon-group"> <i class="fa fa-envelope"></i> <input class="form-control" id="email" name="email" placeholder="Your email *" type="email" required="required"> </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-icon-group"> <i class="fa fa-pencil"></i> <textarea class="form-control" id="message" name="message" placeholder="Your message" rows="10" required="required"></textarea> </div>
                                        <div class="text-center"> 

                                          <input type="submit" value="Send email" class="btn btn-primary"> </div>

                                        <div class="messages text-center"></div>

       
                                    </form>
                                    <div class="divider-wrapper">
                                        <div class="visible-xs element-height-80"></div>
                                        <div class="visible-sm element-height-80"></div>
                                        <div class="visible-md element-height-80"></div>
                                        <div class="visible-lg element-height-80"></div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </div>


                </div>
      @endif


              </div>
  

@endsection