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
    .make_x{
        background-color: #ffffff; border-color: #ffffff; color: red;
    }
    .make_red{
        background-color: red; border-color: red;
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
<div class="space"></div>
                 @if(session()->has('message.level'))
                        <div class="alert alert-{{ session('message.level') }}"> 
                        {!! session('message.content') !!}
                        </div>
                        @endif

                        
                                @if(Session()->has('success'))
                        <div class="alert alert-success"> 
                        {!! Session::get('success') !!}
                        </div>
                        @endif
                       @if(Session()->has('error'))
                        <div class="alert alert-danger"> 
                        {!! Session::get('error') !!}
                        </div>
                        @endif
 
    <!-- Main Section -->
   
                            <div class="careerfy-typo-wrap">
                                <div class="careerfy-employer-dasboard" style="background-color: #ffffff;">
                          <form method="POST" action="{{route('e_update.post')}}" class="mt-repeater" >
                                        {{ csrf_field() }}
                                        <input type="hidden" name="tag_id" value="{{$tag->id}}">
                                        <div class="careerfy-employer-box-section">
                                            <!-- Profile Title -->
                                            <div class="careerfy-profile-title">
                                                <h2>Edit a Job</h2>
                                            </div>
                                            <!-- New Job -->
                                      
                                            <ul class="careerfy-row careerfy-employer-profile-form">
                                                <li class="careerfy-column-6">
                                                    <label>Job Title *</label>
                                                    <input value="{{$tag->job_title}}" placeholder="Enter Title" onblur="if(this.value == '') { this.value ='Enter Title'; }" onfocus="if(this.value =='Enter Title') { this.value = ''; }" type="text" name="job_title" required="required">
                                                </li>
                                                <li class="careerfy-column-6">
                                                    <label>Deadline Submission *</label>
                                                    <input value="{{$tag->deadline_submission}}" placeholder="Enter Deadline Submission" maxlength="50"  type="text" name="deadline_submission" required="required">
                                                </li>
                                    
                                                <li class="careerfy-column-6">
                                                    <label>Email Address</label>
                                                    <input value="{{$tag->email_address}}"    type="text" name="email_address" >
                                                </li>
        
                                                <li class="careerfy-column-6">
                                                    <label>Job Category/ *</label>
                                                    <div class="careerfy-profile-select">
                                                        <select name="job_category" required="required"> 
                                                        <option value="{{$tag->job_category}}">@foreach($industry_professions as $industry_profession) @if($tag->job_category === $industry_profession->id) {{$industry_profession->name}} @endif @endforeach</option>
                                                        <option value="">Select a Category</option>
                                                        @foreach($industry_professions as $industry_profession)
                                                        <option value="{{$industry_profession->id}}">{{$industry_profession->name}}</option> 
                                                        @endforeach  
                                                        </select>
                                                    </div>
                                                </li>
                                                <li class="careerfy-column-6">
                                                    <label>Job Type *</label>
                                                    <div class="careerfy-profile-select">
                                                        <select name="job_type" required="required">
                                                 <option value="{{$tag->job_type}}">@foreach($employement_terms as $employement_term) @if($employement_term->id === $tag->job_type) {{$employement_term->name}} @endif @endforeach</option>
                                                            <option value="">Select a Type</option>
                                                            @foreach($employement_terms as $employement_term)
                                                            <option value="{{$employement_term->id}}">{{$employement_term->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </li>
                                                <li class="careerfy-column-6">
                                                    <label>Job Level *</label>
                                                    
                                                    <div class="careerfy-profile-select">
                                                        <select name="p_job_level" required="required" >
                                              <option value="{{$tag->job_level}}">@foreach($jobcareer_levels as $jobcareer_level) @if($tag->job_level === $jobcareer_level->id) {{$jobcareer_level->name}} @endif @endforeach </option>
                                                         <option>Select Career Level</option>
                                                         @foreach($jobcareer_levels as $jobcareer_level)
                                               <option value="{{$jobcareer_level->id}}">{{$jobcareer_level->name}}</option>
                                                            @endforeach
                                                        </select>
                                                       
                                                    </div>
                                                </li>
                                                <li class="careerfy-column-6">
                                                    <label>Gender <span class="required">*</span></label>
                                                    <div class="careerfy-profile-select">
                                                        <select name="p_gender" required="required">
                                           <option value="{{$tag->gender}}">{{$tag->gender}}</option> 
                                                        <option>Select a Gender</option> 
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            <option value="All">All</option>
                                                        </select>
                                                    </div>
                                                </li>

                                                <li class="careerfy-column-6">
                                                    <label>Salary From</label>
                                                    <div class="careerfy-profile-select"> 
                                                        <select name="p_salary_range" required="required">
                                                    <option value="{{$tag->salary_range}}">{{$tag->salary_range}}</option> 
                                                        <option value="">Select Salary Range</option>
                                                        <option value="N50,000-N100,000">N50,000-N100,000</option>
                                                        <option value="N150,000-N250,000">N150,000-N250,000</option>
                                                        <option value="N350,000-N600,000">N350,000-N600,000</option>
                                                        <option value="N750,000-N1,000,000">N750,000-N1,000,000</option>
                                                        <option value="N1,000,000-N5,000,000">N1,000,000-N5,000,000</option>
                                                        <option value="N5,050,000-N10,000,000">N5,050,000-N10,000,000</option>
                                                        <option value="N10,000,000-N15,000,000">N10,000,000-N15,000,000</option>
                                                        <option value="N15,000,000-Above">N15,000,000-Above</option>

                                                        </select>
                                                    </div>
                                                </li>
 
                                                <li class="careerfy-column-6">
                                                    <label>Experience*</label>
                                                    <div class="careerfy-profile-select">
                                                        <select name="p_experience" required="required">
                                              <option value="{{$tag->experience}}">{{$tag->experience}}</option> 
                                                        <option value="">Select Experience</option>
                                                            <option value="0-5">0-5</option>
                                                            <option value="6-10">6-10</option>
                                                            <option value="11-15">11-15</option>
                                                            <option value="16-20">16-20</option>
                                                            <option value="25 Above">25 Above</option>
                                                        </select>
                                                    </div>
                                                </li>
                                                <li class="careerfy-column-6">
                                                    <label>Industry*</label>
                                                    <div class="careerfy-profile-select">
                                                         <select name="p_industry" required="required">

                                                  <option value="{{$tag->industry}}">@foreach($industries as $industry) @if($industry->id === $tag->industry)   {{$industry->name}} @endif @endforeach</option> 
                                                         <option value="">Select Industry</option>
                                                          @foreach($industries as $industry)  
                                                            <option value="{{$industry->id}}">{{$industry->name}}</option>
                                                          @endforeach
                                                        </select>
                                                    </div>
                                                </li>
                                                <li class="careerfy-column-6">
                                                    <label>Qualification*</label>
                                                    <div class="careerfy-profile-select">
                                                    <select name="p_qualification" required="required">
                                                     <option value="{{$tag->qualification}}"> @foreach($educational_levels as $educational_level) @if($educational_level->id === $tag->qualification) {{$educational_level->name}} @endif @endforeach</option> 
                                                    <option value="">Select Qualification</option>
                                                    @foreach($educational_levels as $educational_level)
                                                    <option value="{{$educational_level->id}}">{{$educational_level->name}}</option>
                                                    @endforeach   
                                                    </select>
                                                    </div>
                                                </li>
                                                <li class="careerfy-column-6">
                                                    <label>Application Deadline Date</label>
                                                    <div class="careerfy-profile-select">
                                            <input type="date" name="end_date" required="required" value="{{$tag->end_date}}">
                                                    </div>
                                                </li>
                                                         <li class="careerfy-column-12">
                                                 <label>Field Of Study *</label>
                                         <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">          
                                             <div class="careerfy-checkbox-toggle scroll_div"  >
                                             <br>
                                           <ul class="careerfy-checkbox">
                                               @foreach($fields_of_study_list as $fields_of_study)
                                                <li>
   
 
                <input type="checkbox" id="r_{{$fields_of_study->id}}" name="fieldsos[]" value="{{$fields_of_study->id}}" />
                                                    <label for="r_{{$fields_of_study->id}}"><span></span>{{$fields_of_study->fields}}</label>
                                                    <small>10</small>
 

                                                </li>
                                                @endforeach 
                                            </ul> 
                                                
                                        </div>
                                        </div> 
                                                </li>
                                <li class="careerfy-column-12">
                                                    <label>Description *</label>
                                                <textarea name="description" required="required" id="summernote_1"  >{{$tag->description}}</textarea>
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
                                              <option value="{{$tag->country}}">{{$tag->country}}</option>
                                                           <option value="">Select Country</option>
                                                        @foreach($countries as $country) 
                                                            <option>{{$country->name_en}}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </li>
                                                <li class="careerfy-column-6">
                                                    <label>Region *</label>
                                                    <div class="careerfy-profile-select">
                                                        <select name="p_region" required="required">
                                                    <option value="{{$tag->region}}">@foreach($regions as $region) @if($region->id === $tag->region) {{$region->name}} @endif @endforeach</option>
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
                                          <option value="{{$tag->city}}">@foreach($cities as $city) @if($city->name == $tag->city) {{$city->name}} @endif @endforeach</option>
                                                           <option value="">Select City</option>
                                                         @foreach($cities as $city) 
                                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </li> 
                                                <li class="careerfy-column-6">
                                                <label>Full Address *</label>
                                                <input placeholder="Enter Full Address" required="required" type="text" name="full_address" value="{{$tag->full_address}}">
                                                </li>  
                                            </ul>
                                        </div>
 

                                                     <div class="careerfy-employer-box-section">
                                            <div class="careerfy-profile-title"><h2>Assessment</h2></div>
                                            <ul class="careerfy-row careerfy-employer-profile-form">
                                            <div class="note note-primary">
 <p> 
 Enter question(s), one at a time and then click 'Add' button <br>
<br>
Eg. Do You have Experience in building API's?
</p>
</div>
                                <div class="portlet-body form"> 
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="mt-repeater form-horizontal">
                                            
                                            <div data-repeater-list="group_b">
                                            @foreach($job_assessments as $job_assessment)
                                                <div data-repeater-item class="mt-repeater-item">
                                            <div class="mt-repeater-input" > 
                                    <textarea name="assessment" class="form-control" required="required" placeholder="Do You have Experience in building API's?">{{$job_assessment->question}}</textarea>
                             </div>
                     <div class="mt-repeater-input" >
                            <input type="hidden" name="requirement_id" value="{{$job_assessment->id}}">
                            
                             </div>
                     
                                                                  <div class="mt-repeater-input">
                                                        <a href="javascript:;" data-repeater-delete class="careerfy-employer-profile-submit" style="border-color: red; background-color: red;">
                                                            <i class="fa fa-close"></i> Delete</a>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                            <a href="javascript:;" data-repeater-create class="careerfy-employer-profile-submit" >
                                                <i class="fa fa-plus"></i> Add Input</a>
                                        </div>
                                    </div>
                                </div>


                            </div>


                                            </ul>
                                        </div>
 
                                        <input type="submit" class="careerfy-employer-profile-submit" value="Update Setting">
                                    </form>
                                </div>
                            </div>
          
            <!-- Main Section -->

@endsection