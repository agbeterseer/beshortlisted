<!DOCTYPE html>
<html lang="en">
<head>
    <title>Job Board</title>
    <!-- Css -->
        @include('partials.job_board_header')
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<script>
 window.Laravel = <?php echo json_encode([
 'csrfToken' => csrf_token(),
 ]); ?>
</script>
    <!-- Wrapper -->
    <div class="careerfy-wrapper">
        <!-- Header -->
@include('partials.employer_menu')
        <!-- Header -->     
        <!-- Banner -->
@include('partials.employer_breadcomb') 
        <!-- Banner -->
        <!-- Main Content -->
        <div class="careerfy-main-content" style="margin-top: -50px;">

 
   <style type="text/css">
       .cv_content{
        margin-top: -5px;
        margin-bottom: 20px;
       }
       .edits{
        background-image: url(../../img/005_19.gif);
       }
       .adds{
         background-image: url(../../img/005_41.gif);
       }

       .several2 {
      margin-top: 11px;
      padding-top: 12px;
      border-top: 1px dotted #cdcdcd;
    }

    input{
        background-color: #ffffff;
    }
    table{
        border-collapse: 0px;
    }

.forml .boxheights {
    overflow: auto;
    padding: 3px 5px 5px;
    resize: vertical;
    border: 1px solid #d7d7d7;
    height: 240px;
}
strong{
  font-weight: bold;
}
.textarea{
     background-color: #F5F5F5;
    resize: vertical;
margin-top: 0px; 
margin-bottom: 0px; 
height: 92px;
}
.apply_select_l.select_add a .line {
    background-image: url(../../img/add_icon.png);
}

.careerfy-resume-addbtn2 {
    float: right;
    background-color: #13b5ea;
    font-size: 10px;
    color: #ffffff;
    text-transform: uppercase;
    padding: 12px 12px;
    border-radius: 40px;
    line-height: 1;
    margin-top: 1px;

   </style>
         @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
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
        @if(session()->has('message.level'))
        <div class="alert alert-{{ session('message.level') }}"> 
        {!! session('message.content') !!}
        </div>
        @endif

 @php
$check = 'second';
 @endphp
 
            <!-- Main Section -->
            <div class="careerfy-main-section careerfy-dashboard-fulltwo">
                <div class="container " id="page" style="" >
                    <div class=" ">

              <aside class="careerfy-column-3 page" >
         <div class="careerfy-typo-wrap">
    <div class="careerfy-employer-dashboard-nav"  style="background-color: #FFFFFF;">
 <figure>
 


 <a href="#" class="employer-dashboard-thumb"><img src="/uploads/avatars/{{$user->avatar }}" alt=""></a>


              <figcaption>
              
             <!--  <div class="careerfy-fileUpload">
              <span><i class="careerfy-icon careerfy-add"></i> Upload Photo</span>
              <input type="file" class="careerfy-upload" name="avatar" />
              </div> -->
               
              <h4> {{$candidate->name}}</h4>
              <span class="careerfy-dashboard-subtitle">UI/UX Designer</span>
            
              </figcaption>
          </figure>


                                </div>
                            </div>
    
                            <div class="careerfy-typo-wrap">
                            <!-- Select jobs that have not yet expire -->
                        
                            </div>
             
                        </aside> 
 

    <div class="careerfy-column-9 pageaction">
    <div class="careerfy-typo-wrap"  style="background-color: #FFFFFF;">
    <div id="resume_title" class="title3" >
 
<h3> {{$user_single_resume_by_date->pr_caption}}</h3>                               <h3>      
@if($section_candidatelist_count === 1)
                                  <a href="" class="careerfy-green">20% completed </a> 
@endif 
@if($section_candidatelist_count === 2 )
<a href="" class="careerfy-green">30% completed</a>
@endif
@if($section_candidatelist_count === 3)
 <a href=" " class="careerfy-green">50% completed</a>
@endif

@if($section_candidatelist_count === 4)
<a href=" " class="careerfy-green">60%  completed </a>
@endif

@if($section_candidatelist_count === 5)
<a href="" class="careerfy-green">80% completed</a>
@endif

@if($section_candidatelist_count === 6)
<a href="" class="careerfy-green">90% completed</a>
@endif

@if($section_candidatelist_count === 7)
 
@endif
 
<!-- 
@if($document && $jobcertifications && $jobskills && $person_info) 
40%
@endif -->
</h3>
</div>
<div class="careerfy-employer-dasboard">
<div class="careerfy-employer-box-section" style="background-color: #FFFFFF;"> 

@if($document)
<div class="col-md-12 cv_content">  
<div class="" id="user_profile"> 
 <div class="pageactionIn">
 <div class="title4">
<span class="progressbar">
<span style="width: 40%;"><span></span></span>
</span>
 
<div class="user_name"> <h4 class="highlightable">{{$candidate->firstname}} {{$candidate->lastname}}</h4> </div>
</div>

 <div class="overviewtitle2">
<span class="ovtitle"><strong>Age</strong></span>
<span class="detail highlightable">{{$document->age}}</span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle"><strong>Date of Birth</strong></span>
<span class="detail highlightable">{{ date('M d, Y', strtotime($document->date_of_birth)) }}  </span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle"><strong>Gender</strong></span>
<span class="detail highlightable"> {{$document->gender}} </span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle"><strong> Nationality</strong></span>
<span class="detail highlightable">  @foreach($countries as $country)  @if($country->code === $document->nationality) {{$country->name_en}} @endif @endforeach</span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle"><strong>Email</strong></span>
<span class="detail highlightable"> {{$document->email}}</span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle"><strong>Willing to relocate:</strong></span>
<span class="detail highlightable">{{$document->relocate_nationaly}}   </span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle"><strong>Educational Level:</strong></span>
<span class="detail highlightable">

@foreach($educationallevels as $educationallevel)  
@if($educationallevel->id == $document->educational_level) {{$educationallevel->name}} @endif @endforeach</span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle"><strong>Career Level:</strong></span>
<span class="detail highlightable"> @foreach($job_career_levelList as $job_career_level) @if($job_career_level->id == $document->career_level) {{$job_career_level->name}}  @endif @endforeach </span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle"><strong> Minimum Salary:</strong></span>
<span class="detail highlightable">{{$document->minimum_salary}} / Year</span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle"><strong>Availability:</strong></span>
<span class="detail highlightable"> {{$document->availability}}</span>
</div> 
 </div> 
</div>
</div>
@else
<!--  <div class="col-md-12 cv_content" >

<div class="pageactionIn" id="education_topsection">

<div class="apply_select_l select_add" id="summary_topsection">
<a class="action"  data-toggle="modal" data-style="slide-left" data-spinner-color="#333" href="#static_summary">
<span class="outer"><span class="line"><span class="inner"> 
 Add Profile
</span></span></span></a>
</div> 
 </div>
</div>
 -->
<!-- <div class="careerfy-candidate-resume-wrap">    
            <div class="careerfy-candidate-title"> <h4>
            <i class="careerfy-icon careerfy-mortarboard"></i> Profile 
            <a href="javascript:void(0)" class="careerfy-resume-addbtn" style="width: 30%" ><span class="fa fa-plus"></span> Add Profile</a>
            </h4> </div>

                                <div class="careerfy-add-popup">

          <div class="careerfy-candidate-title"> <h2>
          Add Job Profile
          <a href="#" class="careerfy-resume-addbtn" style="background-color: red"><span class="fa fa-minus"></span></a>
          </h2> </div>
 

<form class="form-horizontal" action="{{ route('add.profile') }}" method="post" role="form">
                                            {{ csrf_field() }}
  <input type="hidden" value="job_profile" name="jobprofile">
 <input type="hidden" name="resume" value="{{$user_single_resume_by_date->id}}">
                                                    <ul class="careerfy-row careerfy-employer-profile-form">
                             
                                                           <li class="careerfy-column-6">
                                                            <label>First Name *</label>
                                                            
                                                 <input id="firstname" type="text" class="form-control" name="firstname"     placeholder=" Enter First Name"   required>
 
                                                        </li>
                                                        <li class="careerfy-column-6">
                                                            <label>Last Name *</label>
                                                             
                                                <input id="lasttname" type="text" class="form-control" name="lastname" placeholder=" Enter Last Name" required>
 
                                                        </li>
                                                        <li class="careerfy-column-6">
                                                            <label>Date of Birth *</label> 
                                                            <div class="careerfy-profile-select">
                                                            <input id="date_of_birth" type="date" class="form-control"  name="date_of_birth" placeholder=" Enter Date of birth"   required> 
                                                       </div>
                                                        </li>
                                                        <li class="careerfy-column-6">
                                                            <label>Gender *</label> 
                                                            <div class="careerfy-profile-select">
                                               <select name="gender" class="form-control">
                                                  <option value="">...select one...</option>
                                                  <option value="Male">Male</option>
                                                  <option value="Female">Female</option>
                                              </select>
                                              </div> 
                                                        </li>
                                                        <li class="careerfy-column-6">
                                                            <label>Nationality</label> 
                                                            <div class="careerfy-profile-select">
                                                        <select name="nationality" class="form-control" required="required" >
                                                        <option value="">...select one...</option>
                                                          @foreach($countries as $country)
                                                           <option value="{{$country->code}}">{{$country->name_en}}</option>
                                                          @endforeach
                                                          </select> 
                                                          </div>
                                                        </li>
                                                        <li class="careerfy-column-6">
                                                            <label>Email*</label> 
  <input id="email" type="email" value="{{Auth::user()->email}}"  class="form-control" name="email" placeholder="Enter email" required> 
                                         </li>
    <li class="careerfy-column-6">
<label>Region *</label>
<div class="careerfy-profile-select"> 
<select name="region" class="form-control"  required="required" >
        <option value="">...Select Region...</option>
                @foreach($regions as $region)
        <option value="{{$region->id}}">{{$region->name}}</option>
        @endforeach
        </select>  
        </div>
            @if ($errors->has('region'))
                <span class="help-block">
                    <strong>{{ $errors->first('region') }}</strong>
                </span>
            @endif
    </li>
        <li class="careerfy-column-6">
<label>City* </label>
<div class="careerfy-profile-select">
    <select name="location" id="location" class="form-control" required="required" >
           <option value="">...Select City...</option>
   </select> 
                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif

        </li>



                        <div class="workhistory_inner several2">
                                               <li class="careerfy-column-6">
                                                            <label>Educational Level</label> 
                                                            <div class="careerfy-profile-select">
                                    <select name="eucational_level" class="form-control" required>
                                      <option value="">...select one...</option>
                                    @foreach($educationallevels as $educationallevel)
                                    <option value="{{$educationallevel->id}}">{{$educationallevel->name}}</option>
                                    @endforeach
                                  </select> 
                                  </div>
                                                        </li>
                                                      <li class="careerfy-column-6">
                                                      <label>Career Level *</label> 
                                                      <div class="careerfy-profile-select">
                                                      <select name="career_level" class="form-control" required="required">
                                                      <option value="">...select one...</option>
                                                      @foreach($job_career_levelList as $job_career_level)
                                                      <option value="{{$job_career_level->id}}">{{$job_career_level->name}}</option>
                                                      @endforeach
                                                      </select> 
                                                      </div>
                                                      </li>

                                                      <li class="careerfy-column-6">
                                                      <label>Minimum Salary</label> 
                                                     <div class="careerfy-profile-select">
                                                    <select name="minimum_salary" class="form-control" required >
                                                        <option value=""  selected="selected">...select one...</option>
                                                          <option value="N50,000-N100,000">N50,000-N100,000</option>
                                                          <option value="N150,000-N250,000">N150,000-N250,000</option>
                                                          <option value="N350,000-N600,000">N350,000-N600,000</option>
                                                          <option value="N750,000-N1,000,000">N750,000-N1,000,000</option>
                                                          <option value="N1,000,000-N5,000,000">N1,000,000-N5,000,000</option>
                                                           <option value="N550,000-N10,000,000">N550,000-N10,000,000</option>
                                                          <option value="N10,000,000-N15,000,000">N10,000,000-N15,000,000</option>
                                                          <option value="15,000,000-Above">N15,000,000-Above</option>  
                                                          </select>   
                                                          </div>
                                                      </li>
                                                        <li class="careerfy-column-6">
                                                        <label>Availability *</label> 
                                                        <div class="careerfy-profile-select">
                                                              <select name="availability" class="form-control" >
                                                        <option value=""  selected="selected">...select one...</option>
                                                          <option value="now">Immediate</option>
                                                          <option value="1 week">1 week</option>
                                                          <option value="2 weeks">2 weeks</option>
                                                          <option value="1 month">1 month</option>
                                                          <option value="2 months">2 months</option>
                                                          <option value="date">Specific date</option>
                                                          </select> 
                                                          </div>
                                                            </li>

                                                    <li class="careerfy-column-6">
                                                      <label>Desired employment terms</label> 
                                                      <div class="careerfy-profile-select">
                                                <select name="employment_terms" class="form-control" required="required"> 
                                                <option value="">...select one...</option>
                                                @foreach($employementterms as $employementterm)
                                                <option value="{{$employementterm->id}}">{{$employementterm->name}}</option>
                                                @endforeach
                                                </select> 
                                                </div>
                                                      </li>
                                                        <li class="careerfy-column-6">
                                                        <label>Willing to relocate *</label> 
                                                        <div class="careerfy-profile-select">
                                                      <select name="relocate" class="form-control" required="required">
                                                      <option value="">...select one...</option>
                                                      <option value="YES">YES</option>
                                                      <option value="NO">NO</option> 
                                                      </select> 
                                                      </div>
                                                            </li>  

                                                            <li class="careerfy-column-6">
                                             <label> Contact Address <span class="required">*</span> </label>
    <textarea name="full_adress" class="form-control" placeholder="Enter Contact Address" required="required"> </textarea>
                                                            </li>
                                                            <li class="careerfy-column-6">
         <label >Phone Number <span class="required">*</span></label>
 <input type="number" name="phonenumber"  class="form-control"  required="required">
 


                                                        </div> 
                                                        <li class="careerfy-column-12">
                                                            <input type="submit" value="Add Profile">
                                                        </li>
                                                    </ul>
                                                    </form>
                                                </div>
                                             
                                            </div>
 -->

@endif
 
    <!-- <div class="careerfy-fileUpload">
        <span><i class="careerfy-icon careerfy-add"></i> Add  Basic Information</span>
        <input type="file" class="careerfy-upload" />
        </div> -->


<!-- <div class="careerfy-profile-title"><h4></h4></div> static_summary -->
@if($career)
<div class="col-md-12 cv_content" >

<div class="pageactionIn" id="education_topsection">
<div class="title4">
<p class="editov2">
<!-- <a class="edits"  href="{{route('career.summary', [$user_single_resume_by_date->id, $career->id])}}">Edit</a></p> -->
<h4>Career Objective / Summary</h4>
</div>
{{$career->summary}}
 </div>
 
</div>
@else
 
<!-- <div class="careerfy-candidate-resume-wrap">    
                                                <div class="careerfy-candidate-title"> <h4>
  <i class="careerfy-icon careerfy-mortarboard"></i>CAREER OBJECTIVES
                                                    <a href="javascript:void(0)" class="careerfy-resume-addbtn" style="width: 30%"><span class="fa fa-plus"></span>  Add Career Objectives</a>
                                                </h4> </div>
                                <div class="careerfy-add-popup">
                                <div class="careerfy-candidate-title"> <h2>
                                Career Objectives
                                <a href="#" class="careerfy-resume-addbtn" style="background-color: red"><span class="fa fa-minus"></span></a>
                                </h2> </div>
                          <form class="form-horizontal" action="{{ route('add.career_summary') }}" method="post" role="form">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="resume" value="{{$user_single_resume_by_date->id}}">
                                   <input type="hidden" value="career_summary" name="careersummary">
                                                    <ul class="careerfy-row careerfy-employer-profile-form">
                                                        <li class="careerfy-column-12">
                                                            <label>Title *</label> 

                                                       <textarea class="form-control" placeholder="A result-driven and dedicated Application Developer, seeking a software engineering position to utilize logical thinking skills and programming expertise to provide the company with excellent software solutions" name="career_summary" required="required"></textarea> 

                                                        </li>
                                                        <li class="careerfy-column-12">
                                                            <input type="submit" value="Add Objectives">
                                                        </li>
                                                    </ul>
                                                    </form>
                                                </div>
                                            
                                            </div> -->

@endif
@if(!$jobskills->isEmpty())

<div class="col-md-12 cv_content">
<div class="pageactionIn" id="education_topsection">
<!-- <div class="careerfy-profile-title"><h4>Specialties and Skills</h4></div>   static_skills-->
<div class="title4">
<!-- <p class="editov2"><a href="{{ route('update_skill.form', $user_single_resume_by_date->id) }}" class="edits">Edit</a> -->
<!-- <p class="editov2">
<a href="javascript:void(0)" class="careerfy-resume-addbtn"><span class="fa fa-plus"></span> Add Skills</a>
-->
</p> 
<h4><i class="careerfy-icon careerfy-design-skills"></i>Specialties and Skills</h4>
</div>
 
<div class="skills_inner">
@foreach($jobskills as $jobskill)
 <span class="jellybean">{{$jobskill->job_skill}}</span> 
@endforeach
<!-- <span class="jellybean">Java</span>
<span class="jellybean">php</span>
<span class="jellybean">Javascript</span>
<span class="jellybean">hibernate</span>
<span class="jellybean">Spring Tomcat</span>
<span class="jellybean">LAMP</span>
<span class="jellybean">XAMP</span> <i class="careerfy-icon careerfy-social-media"></i>
<span class="jellybean">Netbean</span> -->
</div>
</div> </div>
@else
    <!--               <div class="careerfy-candidate-resume-wrap">    
                                                <div class="careerfy-candidate-title"> <h4>
                                                    <i class="careerfy-icon careerfy-design-skills"></i> Skills 
                                                    <a href="javascript:void(0)" class="careerfy-resume-addbtn" style="width: 30%"><span class="fa fa-plus"></span>  Add Skills</a>
                                                </h4> </div>

                                                <div class="careerfy-add-popup">
                                                 
          <pre> Write your skills in the box below with percentage. <br>click on Add Skill button to add more skills<br> Eg. "Java 80%, php 71%, Javascript, hibernate, Spring Tomcat, LAMP, XAMP, Netbean"</pre>                              
         <a href="javascript:void(0)"  data-dismiss="modal" class="careerfy-resume-addbtn" style="background-color: red" ><span class="fa fa-minus"></span></a>
<p></p>
 
 <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="form-group">
                                        <form action="{{ route('add.skill') }}" class="mt-repeater form-horizontal" method="POST">
                                          {{ csrf_field() }} 
                                          <input type="hidden" name="resume" value="{{$user_single_resume_by_date->id}}">
                                        
                                            <div data-repeater-list="group-a">
                                                <div data-repeater-item class="mt-repeater-item">
                                               
                                                    <div class="mt-repeater-input"> 
                                                    <div class="mt-repeater">
                                                        <div data-repeater-list="group_b">
  <div data-repeater-item class="careerfy-row careerfy-employer-profile-form">
   <div class="careerfy-column-5"><label >Skill</label>
   <input type="text" class="form-control" name="skill" placeholder="Eg. Java"> </div>
    <div class="careerfy-column-3"><label >(%) </label> 
    <input type="text" class="form-control" name="percentage" placeholder=" Eg. 89%"> </div>
     <div class="careerfy-column-2">
     <a href="javascript:;" data-repeater-delete class="btn btn-danger">
<i class="fa fa-close"></i>
</a> </div>
 </div>
   <div data-repeater-item class="careerfy-row careerfy-employer-profile-form">
   <div class="careerfy-column-5"><label >Skill</label>
   <input type="text" class="form-control" name="skill" placeholder="Eg. hibernate"> </div>
    <div class="careerfy-column-3"><label >(%) </label> 
    <input type="text" class="form-control" name="percentage" placeholder=" Eg. 89%"> </div>
     <div class="careerfy-column-2">
     <a href="javascript:;" data-repeater-delete class="btn btn-danger">
<i class="fa fa-close"></i>
</a> </div>
 </div>
  <div data-repeater-item class="careerfy-row careerfy-employer-profile-form">
   <div class="careerfy-column-5"><label >Skill</label>
   <input type="text" class="form-control" name="skill" placeholder="Eg. php"> </div>
    <div class="careerfy-column-3"><label >(%) </label> 
    <input type="text" class="form-control" name="percentage" placeholder=" Eg. 89%"> </div>
     <div class="careerfy-column-2">
     <a href="javascript:;" data-repeater-delete class="btn btn-danger">
<i class="fa fa-close"></i>
</a> </div>
 </div>
    <div data-repeater-item class="careerfy-row careerfy-employer-profile-form">
   <div class="careerfy-column-5"><label >Skill</label>
   <input type="text" class="form-control" name="skill" placeholder="Eg. Springboot"> </div>
    <div class="careerfy-column-3"><label >(%) </label> 
    <input type="text" class="form-control" name="percentage" placeholder=" Eg. 89%"> </div>
     <div class="careerfy-column-2">
     <a href="javascript:;" data-repeater-delete class="btn btn-danger">
<i class="fa fa-close"></i>
</a> </div>
 </div>
    <div data-repeater-item class="careerfy-row careerfy-employer-profile-form">
   <div class="careerfy-column-5"><label >Skill</label>
   <input type="text" class="form-control" name="skill" placeholder="Eg. Android"> </div>
    <div class="careerfy-column-3"><label >(%) </label> 
    <input type="text" class="form-control" name="percentage" placeholder=" Eg. 89%"> </div>
     <div class="careerfy-column-2">
     <a href="javascript:;" data-repeater-delete class="btn btn-danger">
<i class="fa fa-close"></i>
</a> </div>
 </div>
 
                                                        </div>
                                                        <hr>
                                                        <a href="javascript:;" data-repeater-create class="btn btn-info mt-repeater-add">
                                                            <i class="fa fa-plus"></i> Add Input</a>
                                                        <br>
                                                        <br> 
                                                        </div> 
                                                        </div>
          <div class="mt-repeater-input">
              <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete">
                  <i class="fa fa-close"></i> Delete</a>
          </div>
                                                </div>
                                            </div>
                              <input type="submit" value="Save Skills">
                                        </form>
                                    </div>
                                </div>
   </div>

                                                      
                                                </div>
                                            </div> -->

@endif


@if(!$educationaList->isEmpty())

<div class="col-md-12 cv_content">
<div class="pageactionIn" id="education_topsection">
<div class="title4">
<!-- <p class="editov2"><a class="adds"  href="{{route('show.education_form', $user_single_resume_by_date->id)}}" >Add Education</a></p> -->

<h4> <i class="careerfy-icon careerfy-mortarboard"></i>Educational History </h4>
</div>
@foreach($educationaList as $educational)

<?php
    $dt->year   = $educational->start_year;
    $dt->month  = $educational->start_month;

    $ddt->year   = $educational->end_year;
    $ddt->month  = $educational->end_month;

    //$dtt->addYear($dt);  
    $yer = $ddt->diffInYears($dt);     
    $weeks = $ddt->diffInWeeks($dt);                  // 62
    $months = $ddt->diffInMonths($dt);  
?>
<div class="education_inner several2">
<div class="actions">
<!-- <p class="editov2"><a  data-toggle="modal" data-style="slide-left"  href="{{ route('show.update', array('code'=>$educational->id, 'resume'=>$user_single_resume_by_date->id)) }}" class="edits">Edit</a></p> -->
 
</div>

<div class="overviewtitle2">
<span class="ovtitle">Degree</span>
<span class="detail">{{$educational->qualificaiton}}<strong> {{$educational->feild_of_study}}</strong></span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Graduation period</span>
<span class="highlightable">{{ date('M, Y', strtotime($dt)) }} - {{ date('M, Y', strtotime($ddt)) }}  ( {{$yer}} years, )</span>
 
</div>

<div class="overviewtitle2">
<span class="ovtitle">School</span>
<span class="highlightable">
{{$educational->school_name}}
 </span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Country</span>
<span class="highlightable"> @foreach($countries as $country)  @if($country->code === $educational->country) {{$country->name_en}} @endif @endforeach </span>
</div>

</div>
 
@endforeach
</div>
</div>

@else

<!--  <div class="col-md-12 cv_content" >

<div class="pageactionIn" id="education_topsection">

<div class="apply_select_l select_add" id="summary_topsection">
<a class="action" data-toggle="modal" data-style="slide-left" data-spinner-color="#333" href="#static_education">
<span class="outer"><span class="line"><span class="inner"> 
 Add Education 
</span></span></span></a>

</div>
 </div>
</div> -->

<!-- div class="careerfy-candidate-resume-wrap">    
                                                <div class="careerfy-candidate-title"> <h4>
                                <i class="careerfy-icon careerfy-mortarboard"></i>EDUCATION 
                  <a href="javascript:void(0)" class="careerfy-resume-addbtn" style="width: 30%"><span class="fa fa-plus"></span> Add Education</a>
                                                </h4> </div>

              <div class="careerfy-add-popup">

                  <ul class="careerfy-row careerfy-employer-profile-form">
  <form class="form-horizontal" action="{{ route('add.education') }}" method="post" role="form" name="form23">
{{ csrf_field() }}
<input type="hidden" name="resume" value="{{$user_single_resume_by_date->id}}">
   <input type="hidden" value="education" name="education_section">
   <li class="careerfy-column-6">
         Start Date: <span class="required">*</span> 
             <div class="careerfy-three-column-row"> 
      <div class="careerfy-profile-select careerfy-three-column">
      <select name="education_start_date" class="form-control" style="font-size: 16px; color: #000000;" required="required" id="education_start_date">
      <option value="" selected="selected">Year</option>
      @foreach($recruityear_list as $recruityear)
      <option value="{{$recruityear->name}}">{{$recruityear->name}}</option>
      @endforeach
      </select>
            </div>
<div class="careerfy-profile-select careerfy-three-column">                                                
<select name="start_month" id="start_month" style="font-size: 16px; color: #000000;">
<option value="" selected="selected">Month</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>
                                       
      </div> 
  </div>

                                                    </li>

                                                        <li class="careerfy-column-6">
                                                        End Date: <span class="required">*</span> 
<div class="careerfy-three-column-row"> 
    <div class="careerfy-profile-select careerfy-three-column">
        <select name="educationend_year" id="educationend_year" class="form-control" style="font-size: 16px; color: #000000;"> 
        <option value="" selected="selected">Year</option>
          @foreach($recruityear_list as $recruityear)
      <option value="{{$recruityear->name}}">{{$recruityear->name}}</option>
      @endforeach
                </select>
            </div>
<div class="careerfy-profile-select careerfy-three-column">                                                
<select name="end_month" id="end_month" required="required" class="form-control" style="font-size: 16px; color: #000000;">
<option value="" selected="selected">Month</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>                      
      </div>
      </div>
</li>
<li class="careerfy-column-6"> 
Qualification <span class="required">*</span> 
<div class="careerfy-profile-select">
<select name="qualification" class="form-control" id="qualification" required>
@foreach($qualifications as $qualify)
<option value="{{$qualify->id}}">{{$qualify->qualification}}</option>
@endforeach
<option value="Specific Qualification">Specific Qualification</option>      
</select>
</div>
</li>
<li class="careerfy-column-6">
    School Name <span class="required">*</span>
 <input type="text" class="form-control" name="school_name" placeholder="Eg. University Of Agriculture Makurdi"  required="required">
<p></p>
</li>
<li class="careerfy-column-6">
Feild of Study:<span class="required">*</span>
<input type="text" class="form-control" name="feild_of_study" placeholder="Eg. Mathematics / Computer Sc." required>
</li>
<li class="careerfy-column-6">
  Country <span class="required">*</span>
  <div class="careerfy-profile-select">
<select name="country" class="form-control" required="required" >
<option value="" selected="selected">Country</option>
@foreach($countries as $country)
 <option value="{{$country->code}}">{{$country->name_en}}</option>
@endforeach
</select>
</div>
</li>
      <li class="careerfy-column-12">
      <input type="submit" value="Add education"> 
      </li>
      
 
           </form>
      </ul>
                                               
                                                </div> -->
                                             <!--    <div class="careerfy-resume-education">
                                                    <ul class="careerfy-row">
                                                        <li class="careerfy-column-12">
                                                            <div class="careerfy-resume-education-wrap">
                                                                <small>2002 - 2004</small>
                                                                <h2><a href="#">Masters in Fine Arts</a></h2>
                                                                <span>Walters University</span>
                                                            </div>
                                                            <div class="careerfy-resume-education-btn">
                                                                <a href="#" class="careerfy-icon careerfy-edit"></a>
                                                                <a href="#" class="careerfy-icon careerfy-rubbish"></a>
                                                            </div>
                                                        </li>
                                                        <li class="careerfy-column-12">
                                                            <div class="careerfy-resume-education-wrap">
                                                                <small>2012 - 2015</small>
                                                                <h2><a href="#">Tommers College</a></h2>
                                                                <span>Bachlors in Fine Arts</span>
                                                            </div>
                                                            <div class="careerfy-resume-education-btn">
                                                                <a href="#" class="careerfy-icon careerfy-edit"></a>
                                                                <a href="#" class="careerfy-icon careerfy-rubbish"></a>
                                                            </div>
                                                        </li>
                                                        <li class="careerfy-column-12">
                                                            <div class="careerfy-resume-education-wrap">
                                                                <small>2014 - 2015</small>
                                                                <h2><a href="#">Diploma in Fine Arts</a></h2>
                                                                <span>Imperieal Institute of Art Direction</span>
                                                            </div>
                                                            <div class="careerfy-resume-education-btn">
                                                                <a href="#" class="careerfy-icon careerfy-edit"></a>
                                                                <a href="#" class="careerfy-icon careerfy-rubbish"></a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div> -->
                                            </div>


@endif
 

@if(!$work_histories->isEmpty())
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="work_history_topsection">
<div class="title4">
<!-- <p class="editov2"><a class="adds" data-toggle="modal" data-style="slide-left" data-spinner-color="#333" href="#static_work" >Add Work History</a></p> -->
<h4> <i class="careerfy-icon careerfy-social-media"></i>Work History</h4>
</div>
<?php $count = 0; ?>
@foreach($work_histories as $work_history)

<?php 
    $dt->year = $work_history->start_year;
    $dt->month = $work_history->start_month;

    $ddt->year = $work_history->end_year;
    $ddt->month = $work_history->end_month;
  
    $yer = $ddt->diffInYears($dt);     
    // $weeks = $ddt->diffInWeeks($dt);                  // 62
    $months = $ddt->diffInMonths($dt);    
?>
<div class="workhistory_inner several2">
<div class="actions">
<!-- <p class="editov2"><a class="edits" href="{{ route('show.work_history', array('code'=>$work_history->id, 'resume'=>$user_single_resume_by_date->id)) }}">Edit</a></p> -->
</div>

<div class="overviewtitle2">
<span class="ovtitle">Position Title</span>
<span class="highlightable"><strong> {{$work_history->position_title}}  </strong></span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Employment period</span>
<span class="highlightable"> {{ date('M, Y', strtotime($dt)) }} - 
@if($work_history->end_year === null && $work_history->end_month === null && $work_history->present == '1') Present
@elseif($work_history->end_year === null && $work_history->end_month === null && $work_history->present == '2')
Previous
@else
 {{ date('M, Y', strtotime($ddt)) }}  ({{$yer}} year(s) ) @endif</span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Company</span>
<span class="highlightable">{{$work_history->company_name}}</span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Country</span>
<span class="highlightable"> @foreach($countries as $country) @if($work_history->country === $country->code) {{$country->name_en}} @endif @endforeach</span>
</div>


<div class="overviewtitle2">
<span class="ovtitle">Industry</span>
<span class="highlightable"> @foreach($work_history->industries as $industry) {{$industry->name}}  @endforeach</span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Position Type</span>
<span class="highlightable">@foreach($work_history->industryprofessions as $profession) {{$profession->name}}  @endforeach </span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Position Description</span>
<span class="job_description detail highlightable">
 {!! $work_history->responsibilities !!} </span>
</div>
</div>
@endforeach
</div>
</div>

@else
<!--  <div class="col-md-12 cv_content" >

<div class="pageactionIn" id="work_history_topsection">

<div class="apply_select_l select_add" id="work_history_topsection">
<a class="action  " data-toggle="modal" data-style="slide-left" data-spinner-color="#333" href="#static_work">
<span class="outer"><span class="line"><span class="inner"> 
 Add Work Experience 
</span></span></span></a>

</div>
 </div>
</div> -->
     <!--   <div class="careerfy-candidate-resume-wrap">    
                                                <div class="careerfy-candidate-title"> <h4>
                                                    <i class="careerfy-icon careerfy-social-media"></i>EXPERIENCE
<a class="careerfy-resume-addbtn2" style="width: 30%" data-toggle="modal" data-style="slide-left" data-spinner-color="#333" href="#static_work"><span class="fa fa-plus"></span> Add experience</a>
                                                </h4> </div>

                                                <div class="careerfy-add-popup">
                   
                                                </div>
                                       
                                            </div> -->

@endif

@if($jobcertifications->isEmpty())
 
   <!--       <div class="careerfy-candidate-resume-wrap">    
                <div class="careerfy-candidate-title"> <h2>
                <i class="careerfy-icon careerfy-briefcase"></i> Certification 
                <a href="" class="careerfy-resume-addbtn" style="width: 30%" data-toggle="modal" data-style="slide-left" data-spinner-color="#333" ><span class="fa fa-plus"></span>  Add Certification </a>
                </h2> </div>
                                                <div class="careerfy-add-popup">
                                                    <a href="javascript:void(0)"  data-dismiss="modal" class="careerfy-resume-addbtn" style="background-color: red" ><span class="fa fa-minus"></span></a>
<form class="form-horizontal" action="{{ route('add.certificate') }}" method="post" role="form">
{{ csrf_field() }}
<input type="hidden" name="resume" value="{{$user_single_resume_by_date->id}}"> 
    <ul class="careerfy-row careerfy-employer-profile-form">
    <li><div class="portlet-title table_header">
<div class="caption font-dark">

<span class="caption-subject bold ">Add Certifications</span>
</div>                
</div></li>
                                                        <li class="careerfy-column-6">
                                                <label>Certification Name  <span class="required">*</span></label>
                            <input id="certification_name" type="text" class="form-control" name="certification_name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('certification_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('certification_name') }}</strong>
                                    </span>
                                @endif
                                                        </li>
                                                        <li class="careerfy-column-6">
                                <label >Date Received <span class="required">*</span></label>
                                      <input id="" type="date" class="form-control" name="date_received"  required>

                                @if ($errors->has('date_received'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_received') }}</strong>
                                    </span>
                                @endif
                                                        </li>
                                                   
                                                        <li class="careerfy-column-12">
                                                            <input type="submit" value="Add Certification">
                                                        </li>
                                                    </ul>
                                                    </form>
                                                </div>
 
                                            </div> -->

@else
<!-- {{route('show.certificate')}} -->
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="certifications_topsection several2">
<div class="title4">
<!-- <p class="editov2"><a class="adds" href="#certificate" data-toggle="modal" data-style="slide-left" data-spinner-color="#333">Add Certification</a></p> -->
<h4>Certifications</h4>
</div>
@foreach($jobcertifications as $jobcertification)
<div class="certification_inner several2">
<div class="actions">
<!-- <p class="editov2"><a class="edits" href="{{route('edit.certificate', $jobcertification->id)}}">Edit</a></p> -->
</div>

<div class="overviewtitle2">
<span class="ovtitle">Certification Name</span>
<span class="highlightable"><strong> {{$jobcertification->name}} </strong></span>
</div>
<div class="overviewtitle2">
<span class="ovtitle">Date Received</span>
<span class="highlightable">{{ date('M, Y', strtotime($jobcertification->date_received)) }}</span>
</div>

</div>
@endforeach

</div>
</div>

@endif

@if($person_info)
<div class="col-md-12 cv_content" >
<div class="pageactionIn" id="additional_information_topsection">
<div class="title4">
<!-- <p class="editov2"><a class="edits" href="{{route('update.pinformation', $person_info->id)}}">Edit</a></p> -->
<h4>Personal Information</h4>
</div>

<div class="overviewtitle2 overviewtype3 several2">
<span class="ovtitle">Interests</span>
<div class="highlightable">{{$person_info->interest}}</div>
</div>

<div class="overviewtitle2 overviewtype3 several2">
<span class="ovtitle">Associations</span>
<div class="highlightable">{{$person_info->association}} </div>
</div>

<div class="overviewtitle2 overviewtype3 several2">
<span class="ovtitle">Awards</span>
<div class="highlightable"> None {{$person_info->award}} </div>
</div>

<div class="overviewtitle2 overviewtype3 several2">
<span class="ovtitle">Training</span>
<div class="highlightable"> None {{$person_info->training}} </div>
</div>
<div class="overviewtitle2 overviewtype3 several2">
<span class="ovtitle">Personal page</span>
<span class="highlightable"><a class="breakword" href="https://www.linkedin.com/in/terseer-agbe-61287677/" rel="external">{{$person_info->personal_page}}</a></span>
</div>

</div>
 </div>
 @else
<!--     <div class="careerfy-candidate-resume-wrap" >    
    <div class="careerfy-candidate-title"> <h2>
    <i class="careerfy-icon careerfy-user"></i> Personal Information 
    <a href="#static_personal" class="careerfy-resume-addbtn2" style="width: 30%" data-toggle="modal" data-style="slide-left" data-spinner-color="#333" ><span class="fa fa-plus"></span>  Add Personal Information </a>
    </h2> </div>

    </div> -->
 

@endif



 @if($referee_list->isEmpty())

 
  <!--        <div class="careerfy-candidate-resume-wrap">    
                <div class="careerfy-candidate-title"> <h2>
                <i class="careerfy-icon careerfy-briefcase"></i> Referee
                <a href="" class="careerfy-resume-addbtn" style="width: 30%" data-toggle="modal" data-style="slide-left" data-spinner-color="#333" ><span class="fa fa-plus"></span>  Add Referee </a>
                </h2> </div>
                                                <div class="careerfy-add-popup">
                                                    <a href="javascript:void(0)"  data-dismiss="modal" class="careerfy-resume-addbtn" style="background-color: red" ><span class="fa fa-minus"></span></a>
<form class="form-horizontal" action="{{ route('add.referee') }}" method="post" role="form">
{{ csrf_field() }}
<input type="hidden" name="resume" value="{{$user_single_resume_by_date->id}}"> 
    <ul class="careerfy-row careerfy-employer-profile-form">
    <li><div class="portlet-title table_header">
<div class="caption font-dark">

<span class="caption-subject bold ">Add Referee</span>
</div>                
</div></li>
                                  <li class="careerfy-column-6">
                           <label>Name  <span class="required" style="color: red">*</span></label>
                  <input id="referee_name" type="text" class="form-control" name="referee_name" placeholder="Enter Name"  required >

                                @if ($errors->has('certification_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('certification_name') }}</strong>
                                    </span>
                                @endif
                                                        </li>
                                                        <li class="careerfy-column-6">
                                <label >Position <span class="required" style="color: red">*</span></label>
                                      <input id="position" type="text" class="form-control" placeholder="Enter Position" name="position"  required>

                                @if ($errors->has('date_received'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_received') }}</strong>
                                    </span>
                                @endif
                                                        </li>

                                                        <li class="careerfy-column-6">
                                   <label>Office Address  <span class="required" style="color: red">*</span></label>
                            <input id="office_address" type="text" class="form-control" placeholder="Enter Office Address" name="office_address" value="{{ old('name') }}" required>

                                @if ($errors->has('certification_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('certification_name') }}</strong>
                                    </span>
                                @endif
                                                        </li>
                                                        <li class="careerfy-column-6">
                                <label >Phone Number <span class="required" style="color: red">*</span></label>
                                      <input id="phonenumber_re" type="number" class="form-control" placeholder="Enter Phone Number" name="phonenumber_re"  required>

                                @if ($errors->has('date_received'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_received') }}</strong>
                                    </span>
                                @endif
                                                        </li>
                                                                                   <li class="careerfy-column-6">
                                <label >Email <span class="required" style="color: red">*</span></label>
                                      <input id="refereer_email" type="refereer_email" class="form-control" placeholder="Enter Email" name="refereer_email"  required>

                                @if ($errors->has('refereer_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('refereer_email') }}</strong>
                                    </span>
                                @endif
                                                        </li>
                                                        <li class="careerfy-column-12">
                                                            <input type="submit" value="Add Referee">
                                                        </li>
                                                    </ul>
                                                    </form>
                                                </div>
 
                                            </div> -->
@else
 
<!-- {{route('show.certificate')}} -->
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="certifications_topsection several2">
<div class="title4">
<p class="editov2"><a class="adds" href="#referee_" data-toggle="modal" data-style="slide-left" data-spinner-color="#333">Add Referee</a></p>
<h4>Referee</h4>

</div>
@foreach($referee_list as $referee)
<div class="certification_inner several2">
<div class="actions">
<p class="editov2"><a class="edits" href="{{route('edit.referee', $referee->id)}}">Edit</a></p>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Name</span>
<span class="highlightable"> {{$referee->name}} </span>
</div>
<div class="overviewtitle2">
<span class="ovtitle">Position</span>
<span class="highlightable">{{$referee->position }}</span>
</div>
<div class="overviewtitle2">
<span class="ovtitle">Office Address</span>
<span class="highlightable">{{$referee->office_address}}</span>
</div>
<div class="overviewtitle2">
<span class="ovtitle">Phone Number</span>
<span class="highlightable">{{  $referee->phone_number }}</span>
</div>
<div class="overviewtitle2">
<span class="ovtitle">Email</span>
<span class="highlightable">{{  $referee->email }}</span>
</div>
</div>
@endforeach

</div>
</div>

 @endif
 

 
 
 
 
 <a href="{{route('display.templates')}}" class="careerfy-resume-addbtn"><span class="fa fa-plus"></span> Convert Resume To PDF</a>
 
 

<!-- wards was here -->
<!-- <div class="col-md-12 cv_content">
<div class="careerfy-candidate-resume-wrap">    
 
                                                  <form name="form1" action="{{route('add.award')}}" method="POST"> 
                                                  {{ csrf_field() }}
                                    <input type="hidden" name="resume" value="{{$user_single_resume_by_date->id}}" >
                                                <div class="careerfy-add-popup">
                                                <a href="#" class="careerfy-resume-addbtn"><span class="fa fa-plus"></span>close</a>
                                                    <ul class="careerfy-row careerfy-employer-profile-form">
                                                        <li class="careerfy-column-12">
                                                            <label>Award Title *</label>
                              <input type="text" name="title" required="required" maxlength="100" placeholder="Enter Title">
                               <span class="help-block">Note! Maxlength is 50 chars.   </span>
                                                        </li>
                                                        <li class="careerfy-column-6">
                                                            <label>Year *</label>
                                                            <div class="careerfy-profile-select">
                                              
                                                    <select name="yeaofaward" class="form-control" required="required" id="education_start_date">
                                                    <option value="" selected="selected">Year</option>
                                                    @foreach($recruityear_list as $recruityear)
                                                    <option value="{{$recruityear->name}}">{{$recruityear->name}}</option>
                                                    @endforeach
                                                    </select>
                                                            </div>
                                                        </li>
                                                        <li class="careerfy-column-6">
                                                            <label>Company *</label>
                        <input type="text" name="company_name"  required="required" maxlength="50">
                                                        </li>
                                                        <li class="careerfy-column-12">
                                                            <label>Description *</label>
                                           
                                        <textarea name="description" class="form-control" maxlength="50" placeholder="Enter name of the body"></textarea>
                                         <span class="help-block">Note! Maxlength is 50 chars.   </span>
                                                        </li>
                                                        <li class="careerfy-column-12">
                                                        <button type="submit"> Add Award</button> 
                                                        </li>
                                                    </ul>
                                                </div>
                                                    </form>

<div class="pageactionIn" id="certifications_topsection several2">
<div class="title4">
<p class="editov2"> 
      <a href="#" class="careerfy-resume-addbtn"><span class="fa fa-plus"></span> Add Award</a>
</p>
<h4><i class="careerfy-icon careerfy-trophy"></i>Award</h4>
</div>
@foreach($awards as $award)
<div class="certification_inner several2">
<div class="actions">
<p class="editov2"><a class="edits" href="{{route('edit.award', $award->id)}}">Edit</a></p>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Award Name</span>
<span class="highlightable"><strong> {{$award->title}} </strong></span>
</div>
<div class="overviewtitle2">
<span class="ovtitle">Date Received</span>
<span class="highlightable">{{$award->date_awarded}}</span>
</div>

</div>
@endforeach

</div>
</div>

</div> -->


<!--      <div class="careerfy-candidate-resume-wrap">    
                                                <div class="careerfy-candidate-title"> <h2>
                                                    <i class="careerfy-icon careerfy-trophy"></i> Honors & Awards 
                                                    <a href="#" class="careerfy-resume-addbtn"><span class="fa fa-plus"></span> Add Award</a>
                                                </h2> </div>
                                                  <form name="form1" action="{{route('add.award')}}" method="POST"> 
                                                  {{ csrf_field() }}
                                    <input type="hidden" name="resume" value="{{$user_single_resume_by_date->id}}" >
                                                <div class="careerfy-add-popup">
                                                    <ul class="careerfy-row careerfy-employer-profile-form">
                                                        <li class="careerfy-column-12">
                                                            <label>Award Title *</label>
                              <input type="text" name="title" required="required" maxlength="100" placeholder="Enter Title">
                               <span class="help-block">Note! Maxlength is 50 chars.   </span>
                                                        </li>
                                                        <li class="careerfy-column-6">
                                                            <label>Year *</label>
                                                            <div class="careerfy-profile-select">
                                              
                                                    <select name="yeaofaward" class="form-control" required="required" id="education_start_date">
                                                    <option value="" selected="selected">Year</option>
                                                    @foreach($recruityear_list as $recruityear)
                                                    <option value="{{$recruityear->name}}">{{$recruityear->name}}</option>
                                                    @endforeach
                                                    </select>
                                                            </div>
                                                        </li>
                                                        <li class="careerfy-column-6">
                                                            <label>Company *</label>
                        <input type="text" name="company_name"  required="required" maxlength="50">
                                                        </li>
                                                        <li class="careerfy-column-12">
                                                            <label>Description *</label>
                                           
                                        <textarea name="description" class="form-control" maxlength="50" placeholder="Enter name of the body"></textarea>
                                         <span class="help-block">Note! Maxlength is 50 chars.   </span>
                                                        </li>
                                                        <li class="careerfy-column-12">
                                                        <button type="submit"> Add Award</button> 
                                                        </li>
                                                    </ul>
                                                </div>
                                                    </form>


                       

                                            </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 

<div class="modal fade bs-modal-lg" id="static_profile" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">Edit your Profile</h4>
</div>
<div class="modal-body">

<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet light bordered">
<div class="portlet-body">
 <!-- <pre> Specifications</pre> -->
<form class="form-horizontal" action="{{ route('add.profile') }}" method="post" role="form">
{{ csrf_field() }}


<!-- <form role="form"> -->
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-8">
First Name
<input id="firstname" type="text" class="form-control" name="firstname"     placeholder=" Enter First Name"   required>

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<div class="col-md-6">
<div class="form-group"> 
<label class="control-label col-md-3"> </label>
<div class="col-md-8">
Last Name:
<input id="lasttname" type="text" class="form-control" name="lastname" placeholder=" Enter Last Name"   required>

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->

<!-- <form role="form"> -->
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-8">
Date of Birth
<input id="date_of_birth" type="date" class="form-control" value="" name="date_of_birth" placeholder=" Enter Date of birth"   required>

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<div class="col-md-6">
<div class="form-group"> 
<label class="control-label col-md-3"> </label>
<div class="col-md-8">
Gender
 <select name="gender" class="form-control"> 
    <option value="">...select one...</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
</select>
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->

<div class="workhistory_inner several2">
<!-- <form role="form"> -->
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-8">
Nationality
<input id="nationality" type="text" value=" " class="form-control" name="nationality" placeholder=" Enter Nationality"   required>

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<div class="col-md-6">
<div class="form-group"> 
<label class="control-label col-md-3"> </label>
<div class="col-md-8">
Email:
 <input id="email" type="email" value=" " class="form-control" name="email" placeholder="Enter email" required>
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->
</div>
<div class="workhistory_inner several2">
<!-- <form role="form"> -->
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-8">
Educational Level:
@if($document)
<select name="eucational_level" class="form-control" required>
{{$document->educational_level}}
<option value="">@foreach($educationallevels as $educationallevel) @if($document->educational_level === $educationallevel->id) {{$educationallevel->name}}
  @endif @endforeach </option>
  <option value="">...select one...</option>
  @foreach($educationallevels as $educationallevel)
  <option value="{{$educationallevel->id}}">{{$educationallevel->name}}</option>
  @endforeach
</select>
 @endif

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<div class="col-md-6">
<div class="form-group"> 
<label class="control-label col-md-3"> </label>
<div class="col-md-8">
Career Level:
 <select name="career_level" class="form-control" required="required">


 
<option value="0">Please Select</option>
@foreach($job_career_levelList as $job_career_level)

 <option value="{{$job_career_level->id}}">{{$job_career_level->name}}</option>
@endforeach
 
</select> 

</select>
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->
</div>

<div class="workhistory_inner several2">

<!-- <form role="form"> -->
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-8">
Minimum Salary:
<input id="minimum_salary" type="text" value=" " class="form-control" name="minimum_salary" placeholder=" Enter Minimum Salary"   required>

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<div class="col-md-6">
<div class="form-group"> 
<label class="control-label col-md-3"> </label>
<div class="col-md-8">
Availability:
 <select name="availability" class="form-control" >
 
 <option value="">...Select one ...</option>
   <option value="now">Immediate</option>
    <option value="1_week">1 week</option>
    <option value="2_weeks">2 weeks</option>
    <option value="1_month" selected="selected">1 month</option>
    <option value="2_months">2 months</option>
    <option value="date">Specific date</option>
</select>
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->


<!-- <form role="form"> -->
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-8">
 Desired employment terms <span class="required">*</span>
 <select name="employment_terms" class="form-control" required="required"> 
 
<option value="">... Select one ...</option>
  @foreach($employementterms as $employementterm)
<option value="{{$employementterm->id}}">{{$employementterm->name}}</option>
 @endforeach

</select>

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<div class="col-md-6">
<div class="form-group"> 
<label class="control-label col-md-3"> </label>
<div class="col-md-8">
Willing to relocate::
 <select name="relocate" class="form-control" required="required">
 
 <option value="">... Select one ...</option>
    <option value="YES">YES</option>
    <option value="NO">NO</option> 
</select>
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->

</div>
<!-- 
<pre>Eg. "Marketing Manager, Media, Tokyo", "Bilingual Sales, Airlines, Osaka", <br>"PHP Programmer, Education, California." (Position, industry, location, years of experience, certificates)</pre> -->
</div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->
 

                                                     </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn green">Save changes</button>
                                                    </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

            <!-- Main Section -->
<div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">PR Caption (this will be visible to Employers)</h4>
</div>
<div class="col-md-15">
<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet light bordered">
<div class="portlet-body">
<form class="form-horizontal" action="{{ route('add.caption') }}" method="post" role="form" name="caption_form">
{{ csrf_field() }}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
<div class="col-md-12">
Title  
<input id="namec" type="text" class="form-control" name="name" placeholder=" Enter title here" value="{{$user_single_resume_by_date->pr_caption}}"   required>
@if ($errors->has('name'))
<span class="help-block">
<strong>{{ $errors->first('name') }}</strong>
</span>
@endif
</div>
</div>
<pre>Eg. "Marketing Manager, Media, Tokyo", "Bilingual Sales, Airlines, Osaka", <br>"PHP Programmer, Education, California." (Position, industry, location, years of experience, certificates)</pre>
</div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->
</div>
<div class="modal-footer">
<button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
<!--    <button type="button" class="btn green">Continue Task</button> -->
<button  type="submit" class="btn blue mt-ladda-btn ladda-button btn-outline" data-style="slide-left" data-spinner-color="#333">
<span class="ladda-label">
<i class="icon-plus"></i> Submit</span>
</button>
</div>
</form>
</div>
</div>
</div>

 <div id="static_update" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title"> Update PR Caption: (this will be visible to Employers)</h4>
</div>
<div class="col-md-15">
<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet light bordered">
<div class="portlet-body">
<form class="form-horizontal" action="{{ route('update.caption') }}" method="post" role="form" name="caption_form">
{{ csrf_field() }}
<input type="hidden" name="resume" value="{{$user_single_resume_by_date->id}}" >
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
<div class="col-md-12">
Title  
<input id="name" type="text" class="form-control" name="name" placeholder=" Enter title here" value="{{$user_single_resume_by_date->pr_caption}}"   required>
@if ($errors->has('name'))
<span class="help-block">
<strong>{{ $errors->first('name') }}</strong>
</span>
@endif
</div>
</div>
<pre>Eg. "Marketing Manager, Media, Tokyo", "Bilingual Sales, Airlines, Osaka", <br>"PHP Programmer, Education, California." (Position, industry, location, years of experience, certificates)</pre>
<div class="modal-footer">
<button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
<!--    <button type="button" class="btn green">Continue Task</button> -->
<button  type="submit" class="btn blue mt-ladda-btn ladda-button btn-outline" data-style="slide-left" data-spinner-color="#333">
<span class="ladda-label">
<i class="icon-plus"></i> Submit</span>
</button>
</div>
</form>
</div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->
</div>

</div>
</div>
</div>




  <div class="modal fade bs-modal-lg" id="referee_" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">Referee</h4>
</div>
<div class="modal-body">

<!-- BEGIN EXAMPLE TABLE PORTLET-->
<!-- <div class="portlet light bordered">
<div class="portlet-body"> -->
 <!-- <pre> Specifications</pre> -->
            <!-- BEGIN EXAMPLE TABLE PORTLET-->


                 @if(session()->has('message.level'))
                        <div class="alert alert-{{ session('message.level') }}"> 
                        {!! session('message.content') !!}
                        </div>
                        @endif
                       @if(Session()->has('error'))
                        <div class="alert alert-danger"> 
                        {!! Session::get('error') !!}
                        </div>
                        @endif
 
<form class="form-horizontal" action="{{ route('add.referee') }}" method="post" role="form">
{{ csrf_field() }}
<input type="hidden" name="resume" value="{{$user_single_resume_by_date->id}}">
   <input type="hidden" value="referee" name="referee">
  
      <div class="form-group{{ $errors->has('referee_name') ? ' has-error' : '' }}">
                            <label for="referee_name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="referee_name" type="text" class="form-control" name="referee_name"   required autofocus>

                                @if ($errors->has('referee_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('referee_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                            <label for="position" class="col-md-4 control-label">Position</label>

                            <div class="col-md-6">
                                <input id="position" type="text" class="form-control" name="position"  required>

                                @if ($errors->has('position'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                              <div class="form-group{{ $errors->has('office_address') ? ' has-error' : '' }}">
                            <label for="office_address" class="col-md-4 control-label">Office Address</label>

                            <div class="col-md-6">
                                <input id="office_address" type="text" class="form-control" name="office_address"  required>

                                @if ($errors->has('office_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('office_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phonenumber_re') ? ' has-error' : '' }}">
                            <label for="phonenumber_re" class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phonenumber_re" type="number" class="form-control" name="phonenumber_re" required>

                                @if ($errors->has('phonenumber_re'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phonenumber_re') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 
                        <div class="form-group{{ $errors->has('refereer_email') ? ' has-error' : '' }}">
                            <label for="refereer_email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="refereer_email" type="email" class="form-control" name="refereer_email" required>

                                @if ($errors->has('refereer_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('refereer_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<!-- END EXAMPLE TABLE PORTLET-->
<div class="modal-footer">
<a href=" " class="btn dark btn-outline" data-dismiss="modal">Close</a>
<button type="submit" class="btn green">Save changes</button>
</div>
</form>



<!-- END EXAMPLE TABLE PORTLET-->
</div>

</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>


  

  <div class="modal fade bs-modal-lg" id="certificate" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">Certificate</h4>
</div>
<div class="modal-body">

<!-- BEGIN EXAMPLE TABLE PORTLET-->
<!-- <div class="portlet light bordered">
<div class="portlet-body"> -->
 <!-- <pre> Specifications</pre> -->
            <!-- BEGIN EXAMPLE TABLE PORTLET-->


                 @if(session()->has('message.level'))
                        <div class="alert alert-{{ session('message.level') }}"> 
                        {!! session('message.content') !!}
                        </div>
                        @endif
                       @if(Session()->has('error'))
                        <div class="alert alert-danger"> 
                        {!! Session::get('error') !!}
                        </div>
                        @endif
 
<form class="form-horizontal" action="{{ route('add.certificate') }}" method="post" role="form">
{{ csrf_field() }}
<input type="hidden" name="resume" value="{{$user_single_resume_by_date->id}}">
   <input type="hidden" value="certificate" name="certificate_section">
      <div class="form-group{{ $errors->has('certification_name') ? ' has-error' : '' }}">
                            <label for="certification_name" class="col-md-4 control-label">Certification Name</label>

                            <div class="col-md-6">
                                <input id="certification_" type="text" class="form-control" name="certification_name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('certification_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('certification_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('date_received') ? ' has-error' : '' }}">
                            <label for="date_received" class="col-md-4 control-label">Date Received</label>

                            <div class="col-md-6">
                                <input id="" type="date" class="form-control" name="date_received"  required>

                                @if ($errors->has('date_received'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_received') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

 
 
<!-- END EXAMPLE TABLE PORTLET-->
<div class="modal-footer">
<a href="{{url('/index/resume')}}" class="btn dark btn-outline" data-dismiss="modal">Close</a>
<button type="submit" class="btn green">Save changes</button>
</div>
</form>



<!-- END EXAMPLE TABLE PORTLET-->
</div>

</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>




<div class="modal fade bs-modal-lg" id="static_summary" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">Career Objective and/or Summary</h4>
</div>
<div class="modal-body">

<!-- BEGIN EXAMPLE TABLE PORTLET-->
<!-- <div class="portlet light bordered">
<div class="portlet-body"> -->
 <!-- <pre> Specifications</pre> -->
<form class="form-horizontal" action="{{ route('add.career_summary') }}" method="post" role="form">
{{ csrf_field() }}
<!-- <form role="form"> -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-12">
Title <span class="required">*</span>
<textarea class="form-control" placeholder="A result-driven and dedicated Application Developer, seeking a software engineering position to utilize logical thinking skills and programming expertise to provide the company with excellent software solutions" name="career_summary" required="required"></textarea> 
<input type="hidden" name="resume" value="{{$user_single_resume_by_date->id}}" >
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->
<div class="modal-footer">
<button type="submit" class="btn dark btn-outline" data-dismiss="modal">Close</button>
<button type="submit" class="btn green">Save changes</button>
</div>
</form>
<!-- END EXAMPLE TABLE PORTLET-->
</div>

</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>


                              
<div class="modal fade bs-modal-lg" id="static_skills" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
  <h4 class="modal-title">Add Specialties and Skills</h4>
</div>
<div class="modal-body">

<!-- BEGIN EXAMPLE TABLE PORTLET-->
 
<form class="form-horizontal" action="{{ route('add.skill') }}" method="post" role="form" name="form4">
{{ csrf_field() }}

<!-- <form role="form"> -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-12">
 <pre> Write your skills in the box below and press 'Enter' key after every entry<br> Eg. "Java, php, Javascript, hibernate, Spring Tomcat, LAMP, XAMP, Netbean"</pre>
<p></p>
Skills

<select multiple data-role="tagsinput" class="form-contro" name="multi[]" required>
</select>
<input type="hidden" name="resume" value="{{$user_single_resume_by_date->id}}" >

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->

<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->
<div class="modal-footer">
<button type="submit" class="btn dark btn-outline" data-dismiss="modal">Close</button>
<button type="submit" class="btn green">Save changes</button>
</div>
</form>
<!-- END EXAMPLE TABLE PORTLET-->
</div>

</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>


<div class="modal fade bs-modal-lg" id="static_editskills" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
  <h4 class="modal-title">Edit Specialties and Skills</h4>
</div>
<div class="modal-body">

<!-- BEGIN EXAMPLE TABLE PORTLET-->
 
<form class="form-horizontal" action="{{ route('update.skill') }}" method="post" role="form" name="form3">
{{ csrf_field() }}

<!-- <form role="form"> -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-12">
 <pre> Write your skills in the box below and press 'Enter' key after every entry<br> Eg. "Java, php, Javascript, hibernate, Spring Tomcat, LAMP, XAMP, Netbean"</pre>
<p></p>
Skills

<select multiple data-role="tagsinput" class="form-contro" name="multi[]" required>
       
          @foreach($jobskills as $jobskill)
          <option value="{{$jobskill->job_skill}}">{{$jobskill->job_skill}}</option>
          @endforeach

</select>
<input type="hidden" name="resume" value="{{$user_single_resume_by_date->id}}" >

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->

<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->
<div class="modal-footer">
<button type="submit" class="btn dark btn-outline" data-dismiss="modal">Close</button>
<button type="submit" class="btn green">Save changes</button>
</div>
</form>
<!-- END EXAMPLE TABLE PORTLET-->
</div>

</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>



 

<div class="modal fade bs-modal-lg" id="static_work" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">Add Work History</h4>
</div>
<div class="modal-body">

<!-- BEGIN EXAMPLE TABLE PORTLET-->
<!-- <div class="portlet light bordered">
<div class="portlet-body"> -->
 <!-- <pre> Specifications</pre> -->
 
<form class="form-horizontal" action="{{ route('add.work_history') }}" method="post" role="form" name="workform">
{{ csrf_field() }} 
<input type="hidden" name="resume" value="{{$user_single_resume_by_date->id}}">
   <input type="hidden" value="workhistory" name="work_history">
 <div class="row">
<div class="col-md-6"> 
<div class="form-group"> 
<div class="col-md-8" style="overflow-x:auto;">
<label>From: <span class="required">*</span>  </label> 
<div class="careerfy-three-column-row"> 
<div class="careerfy-profile-select careerfy-three-column">
    <select name="work_from_year" id="from_year" required="required" style="font-size: 16px; color: #000000;">
    <option value="" selected="selected">Year</option>
        @foreach($recruityear_list as $recruityear)
      <option value="{{$recruityear->name}}">{{$recruityear->name}}</option>
      @endforeach
                </select>
            </div>
 
                <div class="careerfy-profile-select careerfy-three-column">                                                
<select name="work_from_month" id="work_from_month" required="required" style="font-size: 16px; color: #000000;">
 <option value="" selected="selected">Month</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>
                                       
                </div>
            </div>
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->


<div class="col-md-6">
<div class="form-group"> 
<div class="col-md-8" style="overflow-x:auto;">
<label> To: <span class="required">*</span> </label>
<div class="careerfy-three-column-row"> 
           <div class="careerfy-profile-select careerfy-three-column">
  <select name="end_year" id="end_year"  style="font-size: 16px; color: #000000; display: block;" >
 
    <option value="" selected="selected">Year</option>
    @foreach($recruityear_list as $recruityear)
      <option value="{{$recruityear->name}}">{{$recruityear->name}}</option>
      @endforeach
 </select>
<!--    <select name="end_year" id="end_year2" style="font-size: 16px; color: #000000; display: none;"  >
 
    <option value="" >Year</option>
    @foreach($recruityear_list as $recruityear)
      <option value="{{$recruityear->name}}">{{$recruityear->name}}</option>
      @endforeach
 </select> -->
     </div>
<div class="careerfy-profile-select careerfy-three-column">                                            
<select name="end_month" id="end_month_work" style="font-size: 16px; color: #000000; display: block;">
<option value="" selected="selected">Month</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>
 </div>
 
<input type="checkbox" name="current" value="1" id="present" style="display: block;"> 
 
<input type="checkbox" name="current" value="0" id="present2" hidden="hidden"> 
    </div>
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->

 </div>
<p></p>
 <div class="workhistory_inner several2">
<!-- <form role="form"> -->
<div class="row">
<div class="col-md-6">
<div class="form-group"> 

<div class="col-md-8">
 <label> Position Title <span class="required">*</span></label>  
 
 <input type="text" name="position_title" id="position_title" placeholder="Eg. Software Developer" class="form-control" required="required">

<p></p>
 <label>Career Level:<span class="required">*</span> </label> 
 <select name="career_level" class="form-control" id="career_level" required="required">
  <option value="" selected="selected">Please Select</option>
 @foreach($job_career_levelList as $job_career_level)
    <option value="{{$job_career_level->id}}">{{$job_career_level->name}}</option>
    @endforeach

</select> 

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->


<div class="col-md-6">
<div class="form-group"> 
<div class="col-md-8">
 <label> Company Name <span class="required">*</span></label>
 <input type="text" class="form-control" name="company_name" required="required" placeholder="Enter Company Name">
<p></p>

 
<label>Work Location <span class="required">*</span></label>

<select name="country" class="form-control" required="required" >
  <option value="" selected="selected">Please Select</option>

@foreach($countries as $country)
 <option value="{{$country->code}}">{{$country->name_en}}</option>
@endforeach
</select>
   
</div>
</div>
<!-- /input-group -->
</div>



<!-- /.col-md-6 -->
</div>
</div>
<!-- /.row -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-12 pageaction forml">
Industries <span class="required">*</span>
<div class="boxheights" style="font-size: smaller;">
<ul class="jsize7_2 sizespace2 selectfield">
@foreach($industries as $industry)
<li>
<label><input type="checkbox" name="work_industries[]" id="work_industries_{{$industry->id}}" value="{{$industry->id}}"> {{$industry->name}}</label></li>
 
@endforeach
---------------------------

</ul>

<div class="clear"></div>
</div>
 
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->

<!-- /.col-md-6 -->
</div>


<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-12 pageaction forml">
Functions: <span class="required">*</span>
<div class="boxheights" style="font-size: smaller;">
<ul class="jsize7_2 sizespace2 selectfield">
 @foreach($industries as $industry)
 <li class="group-parent">{{$industry->name}}</li>
 @foreach($industry_profession as $industry_pr)
 @if($industry->id === $industry_pr->industry_id)
<li>
<label class="group_children" for="function-{{$industry_pr->id}}">
<input type="checkbox" id="function-{{$industry_pr->id}}" name="professions_[]" class="group_function_{{$industry_pr->id}}" value="{{$industry_pr->id}}">{{$industry_pr->name}}</label></li>
@endif
 @endforeach
 @endforeach
---------- ---- ----
 </ul>
 </div>
</div>
</div>
</div>
</div>

<!-- </form> -->
 
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-12">
Responsibilities and Achievements
 <textarea name="responsibilities" class="form-control" id="summernote_2"></textarea>
 
</div>

</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->

<!-- /.col-md-6 -->
</div>
 
    </div>
    <div class="modal-footer">
    <button type="submit" class="btn dark btn-outline" data-dismiss="modal">Close</button>
    <button type="submit" class="btn green">Save changes</button>

    </div>
    </form>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
 

<div class="modal fade bs-modal-lg" id="static_personal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">Personal Information</h4>
</div>
<div class="modal-body">

<!-- BEGIN EXAMPLE TABLE PORTLET-->
<!-- <div class="portlet light bordered">
<div class="portlet-body"> -->
 <!-- <pre> Specifications</pre> -->
<form class="form-horizontal" action="{{ route('personal.information') }}" method="post" role="form">
{{ csrf_field() }}
<input type="hidden" name="resume" value="{{$user_single_resume_by_date->id}}">
<input type="hidden" value="personalinfor" name="pinfor">
<!-- <form role="form"> -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-12">
Interests 
<textarea class="form-control textarea" placeholder="" name="interest" style="margin-top: 0px; margin-bottom: 0px; height: 100px; "></textarea> 
 
<span style="color:#827e7e;">Eg. Photography, Marathon, Yoga, Rock Climbing, Football, Fishing, Snowboard, Investment etc.</span>
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->

<!-- <form role="form"> -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-12">
Associations 
<textarea class="form-control textarea"  name="associations" style="margin-top: 0px; margin-bottom: 0px; height: 100px; "></textarea> 
<span style="color:#827e7e;">Eg. (ITAN) Information Technology Association of Nigeria </span>
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->

<!-- <form role="form"> -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-12">
Awards 
<textarea class="form-control textarea" name="award" style="margin-top: 0px; margin-bottom: 0px; height: 100px; "></textarea> 

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<!-- /.col-md-6 -->
</div>

<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-12">
Training 
<textarea class="form-control textarea" name="training" style="margin-top: 0px; margin-bottom: 0px; height: 100px; "></textarea> 

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->
<!-- <form role="form"> -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-12">
Personal page <span class="required">*</span>
<input type="text" name="personal_page" class="form-control" placeholder="Eg. https://www.linkedin.com/in/terseer-agbe-61287677/">
 
  <span style="color:#827e7e;">Eg. Personal website, portfolio, ... etc.</span>
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->
<!-- END EXAMPLE TABLE PORTLET-->
</div>
<div class="modal-footer">
<button type="submit" class="btn dark btn-outline" data-dismiss="modal">Close</button>
<button type="submit" class="btn green">Save changes</button>
</div>
</form>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
      @include('partials.job_footer')
        <!-- Footer -->
    </div>


    </body>

</html>