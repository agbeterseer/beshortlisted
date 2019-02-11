@extends('layouts.employer_layout', [
  'page_header' => 'Employer',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'profile' => 'active',
  'manage_jobs' =>'',
  'job_post' => ''

])

@section('content')
    <!-- Main Section -->
    
                         @if(session()->has('message.level'))
                        <div class="alert alert-{{ session('message.level') }}"> 
                        {!! session('message.content') !!}
                        </div>
                        @endif
              

                            <div class="careerfy-typo-wrap">
 <form class="careerfy-employer-dasboard" id="frm" method="POST" action="{{route('add.card')}}"  enctype="multipart/form-data">
                                        {{ csrf_field() }} 
                            <div class="careerfy-employer-box-section">
                                   <div class="careerfy-profile-title"><h2>Add Card</h2></div>
                                    <ul class="careerfy-row careerfy-employer-profile-form">
                                            <li class="careerfy-column-6">
                                                <label>Card Number</label>
                                                <input value="1234 4567 7891 1234" onblur="if(this.value == '') { this.value ='1234 4567 7891 1234'; }" onfocus="if(this.value =='1234 4567 7891 1234') { this.value = ''; }" type="text" name="card_number">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Expiration Date</label>
                                                <input value="09/18" onblur="if(this.value == '') { this.value ='09/18'; }" onfocus="if(this.value =='09/18') { this.value = ''; }" type="text" name="expiration_date">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Card Holder’s Name</label>
                                                <input value="Victoria Kolomie" onblur="if(this.value == '') { this.value ='Victoria Kolomie'; }" onfocus="if(this.value =='Victoria Kolomie') { this.value = ''; }" type="text" name="card_holder_name">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>CVV</label>
                                                <input value="CVV" onblur="if(this.value == '') { this.value ='CVV'; }" onfocus="if(this.value =='CVV') { this.value = ''; }" type="text" name="cvv">
                                            </li>
                                        </ul>
                                        </div>
                                    
                                    <input type="submit" class="careerfy-employer-profile-submit" value="Save Setting">
                                </form>
                            </div> 

@endsection