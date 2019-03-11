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
  'job_post' => 'active',
  'profile' => '',
  'shortlisted' => '',
  'transaction' => '',
  'package' => '',
])


@section('content')
<style type="text/css">
    p{
        font-family:  'Open Sans', sans-serif;
    }
</style>
<style type="text/css"> 
    .scroll_div{
    overflow:scroll;
    overflow-x:hidden;
    overflow-y:scroll;
    height:200px;
    }
    .mini_header{
border-color: white !important;

    }

</style> 
<!--    <td height="80" align="center" valign="middle" bgcolor="#00aecc" style="font-family:Arial, Helvetica, sans-serif; color:#ffffff;"><div style="font-size:15px;"><b>R</b></div><div style="font-size:15px;"><b>C</b></div>
                <form method="POST" action="{{route('tag.store')}}" class="mt-repeater" >
                                        {{ csrf_field() }} 
   </td> -->
                        <!-- <div class="careerfy-column-12 careerfy-typo-wrap"> -->
    <!-- Main Section -->

                              <div class="lds-ripplee" style="display: none;"><div></div><div></div></div>
                               <div id="info"></div>
                            <div id="confirmation"></div>
                              {{ csrf_field() }} 

               <div class="careerfy-typo-wrap hideme">
                 
      <div class="tabbable-line boxless tabbable-reversed">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                        <a href="#tab_0" data-toggle="tab">PROFILE  &nbsp; </a>
                                        </li>
                                        <li>
                                      <a href="#tab_1" data-toggle="tab">BILLING &nbsp; </a>
                                        </li>
                              <!--           <li>
                                            <a href="#tab_2" data-toggle="tab">OTHERS &nbsp; </a>
                                        </li> -->
                                 
                                    </ul>
                                      <div class="tab-content">
                                        <div class="tab-pane active" id="tab_0">
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
                                        <div class="careerfy-profile-title"><h2> {{Auth::user()->name}}</h2></div>
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
   
                                    <input type="submit" class="careerfy-employer-profile-submit" value="Save Setting">
                                </form>
                            </div>
                                     </div> 
                                <div class="tab-pane" id="tab_1">
                                                                 <div class="careerfy-typo-wrap">
 <form  id="frm" method="POST" action="{{route('add.card')}}"  >
                                        {{ csrf_field() }} 
                            <div class="careerfy-employer-box-section" style="background-color: #ffffff;">
                                   <div class="careerfy-profile-title"><h2>Add Card</h2></div>
                                    <ul class="careerfy-row careerfy-employer-profile-form">
                                            <li class="careerfy-column-6">
                                                <label for="cardNumber">Card Number</label>
                     <!--      <input value="1234 4567 7891 1234" onblur="if(this.value == '') { this.value ='1234 4567 7891 1234'; }" onfocus="if(this.value =='1234 4567 7891 1234') { this.value = ''; }" type="text" name="card_number"> -->
                    
            <input type="text" class="form-control" id="cardNumber" name="card_number">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label for="date">Expiration Date</label>
                             <!-- <input value="09/18" onblur="if(this.value == '') { this.value ='09/18'; }" onfocus="if(this.value =='09/18') { this.value = ''; }" type="text" name="expiration_date"> -->
                 <input id="cc" type="text" placeholder="MM/YY" class="masked" pattern="(1[0-2]|0[1-9])\/(1[5-9]|2\d)" data-valid-example="05/18" name="expiration_date"/>
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label for="owner">Card Holder’s Name</label>
                                                <input value="Terseer Agbe" onblur="if(this.value == '') { this.value ='Terseer Agbe'; }" onfocus="if(this.value =='Terseer Agbe') { this.value = ''; }" type="text" name="card_holder_name">
                                            </li>
                                            <li class="careerfy-column-6" class="form-group CVV">
                                                <label>CVV</label>
                          <!--                       <input value="CVV" onblur="if(this.value == '') { this.value ='CVV'; }" onfocus="if(this.value =='CVV') { this.value = ''; }" type="text" name="cvv"> -->
                                                 <input type="text" name="cvv" class="form-control" id="cvv" maxlength="3">
                                            </li>
                                        </ul>
                                        </div>
                                    
                                    <input type="submit" class="careerfy-employer-profile-submit" value="Save Card">
                                </form>
  
                                 </div>
                                <!-- <div class="tab-pane" id="tab_2"> </div> -->
                             </div>

                </div>
            </div>
                    </div>
 <!-- </div> -->

     @endsection


