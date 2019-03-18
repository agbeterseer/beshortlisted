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
                                <div class="careerfy-employer-dasboard" style="background-color: #ffffff;">
                                    <div  class="mt-repeater" >
                                     <form method="POST" action="{{ action('TagController@SaveJob') }}" class="mt-repeater" >
                                        {{ csrf_field() }} 
                                        <div class="careerfy-employer-box-section">
                                            <!-- Profile Title -->
                                            <div class="careerfy-profile-title">
                                                <h2>Post a New Job</h2>
                                            </div>
                                            <!-- New Job -->
                                        <!--     <nav class="careerfy-employer-jobnav">
                                                <ul>
                                                    <li class="active"><a href="employer-dashboard-newjob.html"><i class="careerfy-icon careerfy-briefcase-1"></i> <span>Job Detail</span></a></li>
                                                    <li><a href="#"><i class="careerfy-icon careerfy-credit-card"></i> <span>Package & Payments</span></a></li>
                                                    <li><a href="#"><i class="careerfy-icon careerfy-checked"></i> <span>Confirmation</span></a></li>
                                                </ul>
                                            </nav> -->
                                            <ul class="careerfy-row careerfy-employer-profile-form">
                                                           <li class="careerfy-column-12">
                                                    <label>Job Summary</label>
                                                    <textarea name="job_summary" placeholder="Enter Job Summary"></textarea>
                                                </li>
                                                <li class="careerfy-column-6">
                                                    <label>Job Title *</label>
                                                    <input placeholder="Enter Title" onblur="if(this.value == '') { this.value ='Enter Title'; }" onfocus="if(this.value =='Enter Title') { this.value = ''; }" type="text" name="job_title" required="required">
                                                </li>
                                                 <li class="careerfy-column-6"> 
                                                    <label>Application Deadline Date *</label>
                                                    <div class="careerfy-profile-select">
                                            <input type="date" name="end_date" required="required" class="form-control">
                                                    </div>
                                                </li>
                            <!--                     <li class="careerfy-column-6">
                                                    <label>Deadline Submission *</label>
                                                    <input placeholder="Enter Deadline Submission" onblur="if(this.value == '') { this.value ='Enter Deadline Submission'; }" onfocus="if(this.value =='Enter Deadline Submission') { this.value = ''; }" type="text" name="deadline_submission" required="required">
                                                </li> -->
                                         
                                                <li class="careerfy-column-6">
                                                    <label>Email Address *</label>
                                   <input value="{{Auth::user()->email}}"  type="text" name="email_address" required="required" >
                                                </li>
                                  <!--               <li class="careerfy-column-6">
                                                    <label>Username</label>
                                                    <input onblur="if(this.value == '') { this.value ='Graveholdings'; }" onfocus="if(this.value =='Graveholdings') { this.value = ''; }" type="text" name="username">
                                                </li> -->
                                                <li class="careerfy-column-6">
                                                    <label>Job Category / Position *</label>
                                                    <div class="careerfy-profile-select">
                                                        <select name="job_category" required="required"> 
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
                                                         <option>Select a Level</option>
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
                                                        <option>Select Gender</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            <option value="All">All</option>
                                                        </select>
                                                    </div>
                                                </li>

                                                <li class="careerfy-column-6">
                                                    <label>Salary Range</label>
                                                    <div class="careerfy-profile-select"> 
                                                        <select name="p_salary_range" required="required">
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
                                                        <option value="">Select Experience</option>
                                                            <!-- <option value="0-5">0-5</option> -->
                                                            <option value="5-10">5-10</option>
                                                            <option value="6-11">6-11</option>
                                                            <option value="12-15">12-15</option>
                                                            <option value="16-20">16-20</option>
                                                            <option value="25 Above">25 Above</option>
                                                        </select>
                                                    </div>
                                                </li>
                                                <li class="careerfy-column-6">
                                                    <label>Industry*</label>
                                                    <div class="careerfy-profile-select">
                                                         <select name="p_industry" required="required">
                                                         <option value="">Select Industry</option>
                                                          @foreach($industries as $industry)  
                                                            <option value="{{$industry->id}}">{{$industry->name}}</option>
                                                          @endforeach
                                                        </select>
                                                    </div>
                                                </li>
                                                <li class="careerfy-column-6">
                                                    <label>Minimum Qualification*</label>
                                                    <div class="careerfy-profile-select">
                                                    <select name="p_qualification" required="required">
                                                    <option value="">Select Qualification</option>
                                                    @foreach($educational_levels as $educational_levels)
                                                    <option value="{{$educational_levels->id}}">{{$educational_levels->name}}</option>
                                                    @endforeach   
                                                    </select>
                                                    </div>
                                                </li>
                               <!--                      <li class="careerfy-column-6"> 
                                                    <label>Application Deadline Date *</label>
                                                    <div class="careerfy-profile-select">
                                            <input type="date" name="end_date" required="required" class="form-control">
                                                    </div>
                                                </li> -->
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
                                                    <small></small>
                                                </li>
                                                @endforeach 
                                            </ul> 
                                                
                                        </div>
                                        </div> 
                                                </li>
                                             <li class="careerfy-column-12">
                                                    <label>Description / Responsibilities / Qualifications, Experience  *</label>
                                                <textarea name="job_roles" required="required" id="summernote_3"></textarea>
                                                </li>
                                                <li class="careerfy-column-12">
                                                    <label>Description / Responsibilities / Qualifications, Experience  *</label>
                                                <textarea name="description" required="required" id="summernote_1"></textarea>
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="careerfy-employer-box-section">
                                            <div class="careerfy-profile-title"><h2>Job Address / Location</h2></div>
                                            <ul class="careerfy-row careerfy-employer-profile-form">
                                                <li class="careerfy-column-6">
                                                    <label>Country *</label>
                                                    <div class="careerfy-profile-select">

                                                        <select name="p_country" required="required" id="country">
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
                                                        <select name="region" required="required">
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
 <select name="location" id="location" class="form-control" required="required" >
           <option value="">...Select City...</option>
   </select> 
                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                                                    </div>
                                                </li> 
                                                <li class="careerfy-column-6">
                                                <label>Full Address *</label>
                                                <input placeholder="Enter Full Address" required="required" type="text" name="full_address">
                                                </li>  
                                            </ul>
                                        </div>

                                                     <div class="careerfy-employer-box-section">
                                            <div class="careerfy-profile-title"><h2>Assessment</h2></div>
                                            <ul class="careerfy-row careerfy-employer-profile-form">
                                            <div class="note note-primary">
  
1. Enter question(s), one at a time and then click 'Add' button <br> 
2. click on 'Delete' to remove a question 
<br>
Eg. Do You have Experience in building API's?
 
</div>
                                <div class="portlet-body form"> 
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="mt-repeater form-horizontal">
                                            
                                            <div data-repeater-list="group_b">
                                                <div data-repeater-item class="mt-repeater-item">
                                                
                                                    <div class="mt-repeater-input" >
                                            
                                    <textarea name="assessment" class="form-control" required="required" placeholder="Do You have Experience in building API's?"></textarea>
                             </div>
                                                                  <div class="mt-repeater-input">
                                                        <a href="javascript:;" data-repeater-delete class="careerfy-employer-profile-submit" style="border-color: red; background-color: red;">
                                                            <i class="fa fa-close"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                            <a href="javascript:;" data-repeater-create class="careerfy-employer-profile-submit" >
                                                <i class="fa fa-plus"></i> Add Assessement</a>
                                            </div>
                                         </div>
                                     </div> 
                                </div>
                             </ul>
                          </div>
                          <button class="careerfy-employer-profile-submit" >Save Job </button>
           <!-- <input type="submit" class="careerfy-employer-profile-submit" value="Save Job" name="save_job">  -->
                            </form>
                         </div>
                        </div> 
                    </div>
 <!-- </div> -->

     @endsection