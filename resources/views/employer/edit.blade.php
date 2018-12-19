@extends('layouts.employer_layout', [
  'page_header' => 'Employer',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'employer' => '',
  'profile' => '',
  'manage_jobs' => '',
  'job_post' => '',
  'profile' => 'active',
  'shortlisted' => '',
  'transaction' => '',
  'package' => '',
])


@section('content')

    <!-- Main Section -->
                         @if(session()->has('message.level'))
                        <div class="alert alert-{{ session('message.level') }}"> 
                        {!! session('message.content') !!}
                        </div>
                        @endif
 
                
                            <div class="careerfy-typo-wrap">
  <form class="careerfy-employer-dasboard" id="frm" method="POST" action="{{route('employer.update', $client->id)}}"  enctype="multipart/form-data">
                                   {{ method_field('PATCH')}}
                        {{ csrf_field() }}
                                    <div class="careerfy-employer-box-section" style="background-color: #ffffff;">
                                        <div class="careerfy-profile-title"><h2>Welcome {{Auth::user()->name}}</h2></div>
                                        <ul class="careerfy-row careerfy-employer-profile-form">
                                            <li class="careerfy-column-6">
                                                <label>Company Name *</label>
                 <input value="{{$client->name}}"  onblur="if(this.value == '') { this.value ='raveholdings'; }" onfocus="if(this.value =='raveholdings') { this.value = ''; }" type="text" maxlength="50" name="name" required="required">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Email *</label>
    <input class="form-control" value="{{$client->email}}" onblur="if(this.value == '') { this.rvalue ='employer@localhost.com'; }" onfocus="if(this.value =='employer@localhost.com') { this.value = ''; }" type="email"  id="email" maxlength="20" required="required" name="email">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Phone *</label>
     
  <input class="form-control" name="phone_number" type="text" maxlength="11" placeholder="(XXX) XXX-XXXX" onkeypress="return isNumber(event)"  required="required" value="{{$client->phone_number}}" />
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Website</label>
                                 <input value="{{$client->website}}" onblur="if(this.value == '') { this.value ='http://rhizomeng.com'; }" onfocus="if(this.value =='http://rhizomeng.com') { this.value = ''; }" type="text" name="website" maxlength="100">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Category</label>
                                                <div class="careerfy-profile-select">
                                                    <select name="category" class="form-control" required="required">
                                                    <option value="{{$client->category}}">{{$client->category}}</option>
                                                    <option value="">Select Category</option>
                                                         @foreach($industries as $industry)  
                                                            <option value="{{$industry->id}}">{{$industry->name}}</option>
                                                          @endforeach
                                                    </select>
                                                </div>
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Founded Date *</label>
                                                   
                           <input value="{{$client->founded_date}}" class="form-control" onblur="if(this.value == '') { this.value ='10/10/2008'; }" onfocus="if(this.value =='10/10/2008') { this.value = ''; }" type="date" name="founded_date">
                     
                                            </li>
                                            <li class="careerfy-column-12">
                                                <label>Description *</label>
                                                <textarea class="form-control" name="description" id="description" required="required" placeholder="">{{$client->description}}</textarea>
                                            </li>
                                        </ul>
                                    </div>
                            <div class="careerfy-employer-box-section" style="background-color: #ffffff;"> 
                                            <div class="careerfy-profile-title"><h2>Address / Location</h2></div>
                                            <ul class="careerfy-row careerfy-employer-profile-form">
                                                <li class="careerfy-column-6">
                                                    <label>Country *</label>
                                                    <div class="careerfy-profile-select">
                                                        <select name="p_country" required="required" id="country">
                                                         <option value="{{$client->country}}">{{$client->country}}</option>
                                                           <option value="">Select Country</option>
                                                        @foreach($countries as $country)
                                                        @if($country->name_en === 'Nigeria') 
                                                            <option value="{{$country->name_en}}">{{$country->name_en}}</option>
                                                            @endif
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </li>
                                                <li class="careerfy-column-6">
                                                    <label>Region *</label>
                                                    <div class="careerfy-profile-select">
                                                        <select name="p_region" required="required"> 
                                                         <option value="{{$client->region}}">{{$client->region}}</option>
                                                           <option value="">Select Region</option>
                                                    @foreach($regions as $region) 
                                                            <option value="{{$region->id}}">{{$region->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </li>
                                                <li class="careerfy-column-6">
                                                    <label>City / Town *</label>
                                                    <div class="careerfy-profile-select">
                                                        <select name="p_city" required="required" id="city">
                                              <option value="{{$client->city}}">{{$client->city}}</option>
                                                           <option value="">Select City</option>
                                                         @foreach($cities as $city) 
                                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </li> 
                                                <li class="careerfy-column-10">
                                                <label>Full Address *</label>
                                                <input placeholder="Enter Full Address" required="required" type="text" name="full_address" maxlength="250" value="{{$client->full_address}}" >
                                                </li>  
                                            </ul>
                                        </div>
                                    <div class="careerfy-employer-box-section" style="background-color: #ffffff;">
                                        <div class="careerfy-profile-title"><h2>Company Social</h2></div>
                                        <ul class="careerfy-row careerfy-employer-profile-form">
                                            <li class="careerfy-column-6">
                                                <label>Facebook</label>
                                                <input value="https://facebook.com/" onblur="if(this.value == '') { this.value ='https://facebook.com/'; }" onfocus="if(this.value =='https://facebook.com/') { this.value = ''; }" type="text" name="facebook">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Twitter</label>
                                                <input value="https://twitter.com/" onblur="if(this.value == '') { this.value ='https://twitter.com/'; }" onfocus="if(this.value =='https://twitter.com/') { this.value = ''; }" type="text" name="twitter">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Google Plus</label>
                                                <input value="https://google-plus.com/" onblur="if(this.value == '') { this.value ='https://google-plus.com/'; }" onfocus="if(this.value =='https://google-plus.com/') { this.value = ''; }" type="text" name="googleplus">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Youtube</label>
                                                <input value="https://youtube.com/" onblur="if(this.value == '') { this.value ='https://youtube.com/'; }" onfocus="if(this.value =='https://youtube.com/') { this.value = ''; }" type="text" name="youtube">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Vimeo</label>
                                                <input value="https://vimeo.com/" onblur="if(this.value == '') { this.value ='https://vimeo.com/'; }" onfocus="if(this.value =='https://vimeo.com/') { this.value = ''; }" type="text" name="vimeo">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Linkedin</label>
                                                <input value="https://linkedin.com/" onblur="if(this.value == '') { this.value ='https://linkedin.com/'; }" onfocus="if(this.value =='https://linkedin.com/') { this.value = ''; }" type="text" name="linkedin"> 
                                            </li>
                                        </ul>
                                    </div>
                       <!--              <div class="careerfy-employer-box-section" style="background-color: #ffffff;">
                                        <div class="careerfy-profile-title"><h2>Comapany Photos</h2></div>
                                        <div class="careerfy-company-photo">
                                            <img src="images/employer-profile-nonphoto.png" alt="">
                                            <h2>Drag & Drop Photos here to upload</h2>
                                            <small>You can upload up to 5 images under your profile</small>
                                            <div class="careerfy-fileUpload">
                                                <span><i class="careerfy-icon careerfy-upload"></i> Upload Images</span>
                                                <input type="file" class="careerfy-upload" />
                                            </div>
                                        </div>
                                        <div class="careerfy-company-gallery none-element">
                                            <ul class="careerfy-row">
                                                <li class="careerfy-column-3">
                                                    <figure>
                                                        <a href="#"><img src="extra-images/employer-company-photo-1.jpg" alt=""></a>
                                                        <figcaption>
                                                            <span>Peca8 World</span>
                                                            <div class="careerfy-company-links">
                                                                <a href="#" class="careerfy-icon careerfy-edit"></a>
                                                                <a href="#" class="careerfy-icon careerfy-rubbish"></a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                                <li class="careerfy-column-3">
                                                    <figure>
                                                        <a href="#"><img src="extra-images/employer-company-photo-1.jpg" alt=""></a>
                                                        <figcaption>
                                                            <span>Peca8 World</span>
                                                            <div class="careerfy-company-links">
                                                                <a href="#" class="careerfy-icon careerfy-edit"></a>
                                                                <a href="#" class="careerfy-icon careerfy-rubbish"></a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                                <li class="careerfy-column-3">
                                                    <figure>
                                                        <a href="#"><img src="extra-images/employer-company-photo-1.jpg" alt=""></a>
                                                        <figcaption>
                                                            <span>Peca8 World</span>
                                                            <div class="careerfy-company-links">
                                                                <a href="#" class="careerfy-icon careerfy-edit"></a>
                                                                <a href="#" class="careerfy-icon careerfy-rubbish"></a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                                <li class="careerfy-column-3">
                                                    <figure>
                                                        <a href="#"><img src="extra-images/employer-company-photo-1.jpg" alt=""></a>
                                                        <figcaption>
                                                            <span>Peca8 World</span>
                                                            <div class="careerfy-company-links">
                                                                <a href="#" class="careerfy-icon careerfy-edit"></a>
                                                                <a href="#" class="careerfy-icon careerfy-rubbish"></a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                                <li class="careerfy-column-3">
                                                    <figure>
                                                        <a href="#"><img src="extra-images/employer-company-photo-1.jpg" alt=""></a>
                                                        <figcaption>
                                                            <span>Peca8 World</span>
                                                            <div class="careerfy-company-links">
                                                                <a href="#" class="careerfy-icon careerfy-edit"></a>
                                                                <a href="#" class="careerfy-icon careerfy-rubbish"></a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> -->
                                    <input type="submit" class="careerfy-employer-profile-submit" value="Save Setting">
                                </form>
                            </div>
              
 <!--   <div class="careerfy-main-content" >
                            <div class="careerfy-typo-wrap" style="background-color: #ffffff;">
        <form class="careerfy-employer-dasboard" id="frm" method="POST" action="{{route('employer.update', $client->id)}}"  enctype="multipart/form-data">
                                   {{ method_field('PATCH')}}
                        {{ csrf_field() }}
                                    <div class="careerfy-employer-box-section">
                                        <div class="careerfy-profile-title"><h2>Welcome {{Auth::user()->name}}</h2></div>
                                        <ul class="careerfy-row careerfy-employer-profile-form">
                                            <li class="careerfy-column-6">
                                                <label>Company Name *</label>
                 <input value="{{$client->name}}"  onblur="if(this.value == '') { this.value ='raveholdings'; }" onfocus="if(this.value =='raveholdings') { this.value = ''; }" type="text" maxlength="50" name="name" required="required">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Email *</label>
    <input class="form-control" value="{{$client->email}}" onblur="if(this.value == '') { this.rvalue ='employer@localhost.com'; }" onfocus="if(this.value =='employer@localhost.com') { this.value = ''; }" type="email"  id="email" maxlength="20" required="required" name="email">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Phone *</label>
     
  <input class="form-control" name="phone_number" type="text" maxlength="11" placeholder="(XXX) XXX-XXXX" onkeypress="return isNumber(event)"  required="required" value="{{$client->phone_number}}" />
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Website</label>
                                 <input value="{{$client->website}}" onblur="if(this.value == '') { this.value ='http://rhizomeng.com'; }" onfocus="if(this.value =='http://rhizomeng.com') { this.value = ''; }" type="text" name="website" maxlength="100">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Category</label>
                                                <div class="careerfy-profile-select">
                                                    <select name="category" class="form-control" required="required">
                                                    <option value="{{$client->category}}">{{$client->category}}</option>
                                                    <option value="">Select Category</option>
                                                         @foreach($industries as $industry)  
                                                            <option value="{{$industry->id}}">{{$industry->name}}</option>
                                                          @endforeach
                                                    </select>
                                                </div>
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Founded Date *</label>
                                                   
                           <input value="{{$client->founded_date}}" class="form-control" onblur="if(this.value == '') { this.value ='10/10/2008'; }" onfocus="if(this.value =='10/10/2008') { this.value = ''; }" type="date" name="founded_date">
                     
                                            </li>
                                            <li class="careerfy-column-12">
                                                <label>Description *</label>
                                                <textarea class="form-control" name="description" id="description" required="required" placeholder="">{{$client->description}}</textarea>
                                            </li>
                                        </ul>
                                    </div>
                            <div class="careerfy-employer-box-section">
                                            <div class="careerfy-profile-title"><h2>Address / Location</h2></div>
                                            <ul class="careerfy-row careerfy-employer-profile-form">
                                                <li class="careerfy-column-6">
                                                    <label>Country *</label>
                                                    <div class="careerfy-profile-select">
                                                        <select name="p_country" required="required" id="country">
                                                         <option value="{{$client->country}}">{{$client->country}}</option>
                                                           <option value="">Select Country</option>
                                                        @foreach($countries as $country)
                                                        @if($country->name_en === 'Nigeria') 
                                                            <option value="{{$country->name_en}}">{{$country->name_en}}</option>
                                                            @endif
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </li>
                                                <li class="careerfy-column-6">
                                                    <label>Region *</label>
                                                    <div class="careerfy-profile-select">
                                                        <select name="p_region" required="required"> 
                                                         <option value="{{$client->region}}">{{$client->region}}</option>
                                                           <option value="">Select Region</option>
                                                    @foreach($regions as $region) 
                                                            <option value="{{$region->id}}">{{$region->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </li>
                                                <li class="careerfy-column-6">
                                                    <label>City / Town *</label>
                                                    <div class="careerfy-profile-select">
                                                        <select name="p_city" required="required" id="city">
                                              <option value="{{$client->city}}">{{$client->city}}</option>
                                                           <option value="">Select City</option>
                                                         @foreach($cities as $city) 
                                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </li> 
                                                <li class="careerfy-column-10">
                                                <label>Full Address *</label>
                                                <input placeholder="Enter Full Address" required="required" type="text" name="full_address" maxlength="250" value="{{$client->full_address}}" >
                                                </li>  
                                            </ul>
                                        </div>
                                    <div class="careerfy-employer-box-section">
                                        <div class="careerfy-profile-title"><h2>Company Social</h2></div>
                                        <ul class="careerfy-row careerfy-employer-profile-form">
                                            <li class="careerfy-column-6">
                                                <label>Facebook</label>
                                                <input value="https://facebook.com/" onblur="if(this.value == '') { this.value ='https://facebook.com/'; }" onfocus="if(this.value =='https://facebook.com/') { this.value = ''; }" type="text" name="facebook">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Twitter</label>
                                                <input value="https://twitter.com/" onblur="if(this.value == '') { this.value ='https://twitter.com/'; }" onfocus="if(this.value =='https://twitter.com/') { this.value = ''; }" type="text" name="twitter">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Google Plus</label>
                                                <input value="https://google-plus.com/" onblur="if(this.value == '') { this.value ='https://google-plus.com/'; }" onfocus="if(this.value =='https://google-plus.com/') { this.value = ''; }" type="text" name="googleplus">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Youtube</label>
                                                <input value="https://youtube.com/" onblur="if(this.value == '') { this.value ='https://youtube.com/'; }" onfocus="if(this.value =='https://youtube.com/') { this.value = ''; }" type="text" name="youtube">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Vimeo</label>
                                                <input value="https://vimeo.com/" onblur="if(this.value == '') { this.value ='https://vimeo.com/'; }" onfocus="if(this.value =='https://vimeo.com/') { this.value = ''; }" type="text" name="vimeo">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Linkedin</label>
                                                <input value="https://linkedin.com/" onblur="if(this.value == '') { this.value ='https://linkedin.com/'; }" onfocus="if(this.value =='https://linkedin.com/') { this.value = ''; }" type="text" name="linkedin"> 
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="careerfy-employer-box-section">
                                        <div class="careerfy-profile-title"><h2>Comapany Photos</h2></div>
                                        <div class="careerfy-company-photo">
                                            <img src="images/employer-profile-nonphoto.png" alt="">
                                            <h2>Drag & Drop Photos here to upload</h2>
                                            <small>You can upload up to 5 images under your profile</small>
                                            <div class="careerfy-fileUpload">
                                                <span><i class="careerfy-icon careerfy-upload"></i> Upload Images</span>
                                                <input type="file" class="careerfy-upload" />
                                            </div>
                                        </div>
                                        <div class="careerfy-company-gallery none-element">
                                            <ul class="careerfy-row">
                                                <li class="careerfy-column-3">
                                                    <figure>
                                                        <a href="#"><img src="extra-images/employer-company-photo-1.jpg" alt=""></a>
                                                        <figcaption>
                                                            <span>Peca8 World</span>
                                                            <div class="careerfy-company-links">
                                                                <a href="#" class="careerfy-icon careerfy-edit"></a>
                                                                <a href="#" class="careerfy-icon careerfy-rubbish"></a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                                <li class="careerfy-column-3">
                                                    <figure>
                                                        <a href="#"><img src="extra-images/employer-company-photo-1.jpg" alt=""></a>
                                                        <figcaption>
                                                            <span>Peca8 World</span>
                                                            <div class="careerfy-company-links">
                                                                <a href="#" class="careerfy-icon careerfy-edit"></a>
                                                                <a href="#" class="careerfy-icon careerfy-rubbish"></a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                                <li class="careerfy-column-3">
                                                    <figure>
                                                        <a href="#"><img src="extra-images/employer-company-photo-1.jpg" alt=""></a>
                                                        <figcaption>
                                                            <span>Peca8 World</span>
                                                            <div class="careerfy-company-links">
                                                                <a href="#" class="careerfy-icon careerfy-edit"></a>
                                                                <a href="#" class="careerfy-icon careerfy-rubbish"></a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                                <li class="careerfy-column-3">
                                                    <figure>
                                                        <a href="#"><img src="extra-images/employer-company-photo-1.jpg" alt=""></a>
                                                        <figcaption>
                                                            <span>Peca8 World</span>
                                                            <div class="careerfy-company-links">
                                                                <a href="#" class="careerfy-icon careerfy-edit"></a>
                                                                <a href="#" class="careerfy-icon careerfy-rubbish"></a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                                <li class="careerfy-column-3">
                                                    <figure>
                                                        <a href="#"><img src="extra-images/employer-company-photo-1.jpg" alt=""></a>
                                                        <figcaption>
                                                            <span>Peca8 World</span>
                                                            <div class="careerfy-company-links">
                                                                <a href="#" class="careerfy-icon careerfy-edit"></a>
                                                                <a href="#" class="careerfy-icon careerfy-rubbish"></a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <input type="submit" class="careerfy-employer-profile-submit" value="Save Setting">
                                </form>
                            </div>
</div>
 -->



@endsection