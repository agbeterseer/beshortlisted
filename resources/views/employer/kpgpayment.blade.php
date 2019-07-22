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
 <!-- Main Section -->
                        @if(Session()->has('error'))
                            <div class="alert alert-danger"> 
                            {!! Session::get('error') !!}
                            </div>
                        @endif
            <div class="careerfy-main-section careerfy-plain-services-full">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <!-- Fancy Title -->
                            <section class="careerfy-fancy-title">
                                <h2>Payment method</h2>
                                <!-- <p>A better career is out there. We'll help you find it to use.</p> {{ route('pay') }} -->
                            </section>
                            <div class="careerfy-plain-services">
                             <div class="careerfy-employer-payments">
                                  <!--           <h2>Payment method</h2> -->
                                             <div class="careerfy-payment-method-wrap">
           <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form"> 
        <div class="row" style="margin-bottom:40px;">
          <div class="col-md-8 col-md-offset-2">
            <p>
                     <div class="careerfy-employer-payments">
                                            <h2>Your package</h2>
                                             <div class="careerfy-employer-payments-wrap">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>Select</th>
                                                            <th>Title</th>
                                                            <th>Price</th>
                                                            <th>Jobs Units</th> 
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="careerfy-payments-checkbox">
                                                                    <input id="p1" name="rr" type="checkbox" checked="checked">
                                                                    <label for="p1"><span></span></label>
                                                                </div>
                                                            </td>
                                                            <td><span>{{$package_record->title}}</span></td>
                                                            <td>{{$package_record->price}}</td>
                                                            <td>{{$package_record->jobs_posting}}</td>
                                                        
                                                        </tr> 
                                                    </tbody>
                                                </table>
                                             </div>
                                        </div>
            </p> 
            <input type="hidden" name="email" value="{{$user->email}}"> {{-- required --}}
            <input type="hidden" name="orderID" value="#{{$orderID}}">
            <input type="hidden" name="amount" value="{{$package_record->price}}"> {{-- required in kobo --}}
            <input type="hidden" name="quantity" value="{{$package_record->jobs_posting}}">
            <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
            {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

             <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}} 

     
                  <div class="form-group">
                            <div class="col-md-6 ">
                                <button type="submit" class="btn btn-primary">
                                    Pay Now!
                                </button>
                            </div>
                        </div>
                                   <a href="#"><img src="{{asset('recruit/images/payment-method-card-1.jpg')}}" alt=""></a>
                                                <a href="#"><img src="{{asset('recruit/images/payment-method-card-2.jpg')}}" alt=""></a>
                                                <a href="#"><img src="{{asset('recruit/images/payment-method-card-3.jpg')}}" alt=""></a>
                                                <a href="#"><img src="{{asset('recruit/images/payment-method-card-4.jpg')}}" alt=""></a>
                                                <i class="careerfy-icon careerfy-checked"></i>
          </div>
        </div>
</form>
                                     
                                             </div>
                                          <!--    <div class="careerfy-payment-method-wrap careerfy-light">
                                                <a href="#"><img src="extra-images/payment-method-card-5.jpg" alt=""></a>
                                                <i class="careerfy-icon careerfy-checked"></i>
                                             </div> -->
                                        </div>
<!--                                 <ul class="row">
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
    Card Number: 4123450131001381
Expiry Date: any date in the future
CVV: 883
                                </ul> -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Main Section -->
            <!-- Main Section -->
  
            </div>

              <!-- Main Section -->
              <!-- Main Section -->
 
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


          

                  
        <!-- Main Content -->
@endsection

