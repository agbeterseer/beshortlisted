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
    <style type="text/css">
        body{

        }
    </style>
</head>
<body>
<script>
 window.Laravel = <?php echo json_encode([
 'csrfToken' => csrf_token(),
 ]); ?>






</script>

<style type="text/css">
 
        
  
.lds-ripple {
  display: inline-block;
  position: relative;
  width: 64px;
  height: 64px;
}
.lds-ripple div {
  position: absolute;
  border: 4px solid #13B5EA;
  opacity: 1;
  border-radius: 50%;
  animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
}
.lds-ripple div:nth-child(2) {
  animation-delay: -0.5s;
}

@keyframes lds-ripple {
  0% {
    top: 28px;
    left: 28px;
    width: 0;
    height: 0;
    opacity: 1;
  }
  100% {
    top: -1px;
    left: -1px;
    width: 58px;
    height: 58px;
    opacity: 0;
  }
}
<?php foreach ($applications as $key => $value): ?> 
.lds-ripplee {
  display: inline-block;
  position: relative;
  width: 64px;
  height: 64px;

}
.lds-ripplee{{$value->user_id}} div {
  position: absolute;
  border: 4px solid #13B5EA;
  opacity: 1;
  border-radius: 50%;
  animation: lds-ripplee 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;

}
.lds-ripplee{{$value->user_id}} div:nth-child(2) {
  animation-delay: -0.5s;
}
@keyframes lds-ripplee{{$value->user_id}} {
  0% {
    top: 28px;
    left: 28px;
    width: 0;
    height: 0;
    opacity: 1;
  }
  100% {
    top: -1px;
    left: -1px;
    width: 58px;
    height: 58px;
    opacity: 0;
  }
}
  <?php endforeach ?>    

</style>
    <!-- Wrapper -->
    <div class="careerfy-wrapper">
        <!-- Header -->
@include('partials.employer_menu')
        <!-- Header -->     
        <!-- Banner -->
        <!-- Banner -->
        <!-- Main Content -->
        @include('partials.employer_breadcomb')
   <div class="careerfy-main-content" style="margin-top: -40px;">
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
 
 
        <!-- Main Content -->
        <div class="careerfy-main-content" style="margin-top: -40px;"> 
                    <div class="container">
                    <div class="col-md-12">
                        <div class="col-md-6"><h2><a href="{{route('dashboard')}}"> Manage Jobs</a></h2></div>
                         <div class="col-md-6"></div>
                    </div>

                <div class="col-md-12">
                    
                    <div class="col-md-6" style="text-align: left;">    <h2>{{$job_record->job_title}}</h2>
    @foreach($industries as $industry)
        @if($industry->id === $job_record->industry)
            {{$industry->name}}
        @endif
    @endforeach
                @foreach($professions as $industry_profession)
            @if($industry_profession->id === $job_record->job_category)
             {{$industry_profession->name}} || {{$job_record->city}}
            @endif
                @endforeach</div>
                    <div class="col-md-6" style="text-align: right;"> Status @if($job_record->status === 1 && $job_record->active === 1)<span class="badge" style="background-color: green;"> ONLINE</span> @else<span class="badge" style="background-color: red;">OFFLINE</span>  @endif</div>
                </div>
            </div>
 
            <!-- Main Section -->

        <!-- SubHeader -->
 
        <!-- SubHeader -->
   
   <!-- Main Section -->

     <div class="careerfy-main-section" style="background-color: #ffffff;">
                <div class="container">

                 <div class="tabbable-line boxless tabbable-reversed">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                        <a href="#tab_01" data-toggle="tab">UNSORTED  &nbsp;<span class="badge"> <div id="sorted_count">{{$sorted_count}}</div></span> </a>
                                        </li>
                                        <li>
                                      <a href="#tab_11" data-toggle="tab">REJECTED &nbsp;<span class="badge"> 
                                      <div id="reject_count">{{$rejected_count}}</div></span></a>
                                        </li>
                                        <li>
                                            <a href="#tab_12" data-toggle="tab"> IN REVIEW &nbsp;<span class="badge"><div id="review_count">{{$review_count}}</div> </span></a>
                                        </li>
                                        <li>
                                            <a href="#tab_13" data-toggle="tab">SHORTLISTED &nbsp;<span class="badge">
                                            <div id="shortlist_count">{{$shortlisted_count}}</div></span></a>
                                        </li> 

                                         <li>
                                            <a href="#tab_14" data-toggle="tab">OFFERED &nbsp;<span class="badge">
                                            <div id="offered_count">{{$offered_count}}</div></span></a>
                                        </li> 
                                        <li>
                                            <a href="#tab_15" data-toggle="tab">HIRED &nbsp;<span class="badge"><div id="hired_count">{{$hired_count}}</div></span></a>
                                        </li> 
                                        <li>
                                        <a href="#tab_16" data-toggle="tab">AUTOMATCH &nbsp;<span class="badge"><div id="auto_count">0</div></span></a>
                                        </li>
                                    </ul>
                                      <div class="tab-content">
                                        <div class="tab-pane active" id="tab_01">
   <!-- <div class="careerfy-candidate-default-wrap">   -->
   <aside class="careerfy-column-4">
<div class="careerfy-typo-wrap" >

<div class="careerfy-search-filter"> 
<div class="careerfy-candidate careerfy-candidate-default">
<div class="careerfy-search-filter-wrap careerfy-without-toggle">
<div >
<div id="" data-toggle="collapse" data-target="#expand_inreview"> 
<i class="careerfy-icon careerfy-sort"></i>  <h2>Filter</h2>
</div>
</div></div>
<ul class="careerfy-row nav-tabs tabs-left" id="applicants_list">
 
 <?php $countme = 0; ?>
 @if(!$List_applicants_by_job_id->isEmpty())
@forelse($List_applicants_by_job_id as $List_applicant)
   
<li class="careerfy-column-12">
 
 <a href="#tab_6_1{{$List_applicant->id}}" data-toggle="tab">
                                          

                                            <div class="careerfy-candidate-default-wrap"> 
                                                <figure> 
                                                    <?php $record = \App\RecruitProfilePix::where('status', 1)->where('user_id', $List_applicant->user_id)->orderBy('created_at', 'DESC')->first(); ?>
                                              @if($record)<img src="/uploads/avatars/{{ $record->pix }}" alt="">@else  
                                                @endif
                                               </figure> 
                                                <div class="careerfy-candidate-default-text">
                                                    <div class="careerfy-candidate-default-left">
                                                        <h2>
                            @foreach($documentList as $document) @if($List_applicant->document_id === $document->id) {{$document->candidates_name}} {{$document->id}} {{$document->user_id}}@endif @endforeach  <i class="careerfy-icon careerfy-check-mark"></i></h2>
                                                        <ul class="careerfy-column-12" >

                                                        <!-- to get work experience; get job_id from application table and resume_id, then goto workexperience table and find by resume_id and jpob_id  -->
                                                   @if(!$work_experiences->isEmpty())
                                                        @foreach($work_experiences as $work_experience)
                                                        @if($work_experience->userfk === $List_applicant->user_id && $work_experience->present === 1)
                                                            <li>{{$work_experience->position_title}} at <span href="#" class="careerfy-candidate-default-studio">{{$work_experience->company_name}}</span></li>
                                                        @endif
                                                        @endforeach                                                
                                                            @else
                                                             N/A
                                                             @endif
                                                        </ul>
                                                    </div>
                                              <!--       <a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a> -->
                                                </div>
                                            </div>

                                             </a>
                                        </li>


 <?php $countme++; ?>
@empty

@endforelse
@else
<li class="careerfy-column-12"> No Record(s) Found</li>
 
@endif
                             </ul>
                                </div> 
                                </div>
 
                            </div>
                        </aside>  
                                     
                                            <div class="col-md-8 col-sm-8 col-xs-8">
         <div id="expand_unsorted" class="collapse"> 
  <div class="cscroll_div scroll_div" >
            <div class="container "> 
            
                <div class="row"> 
                    <div class="col-md-8">
                    <div class="col-md-8">   

                         <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Gender</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="gender_unsorted">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="g1_unsorted" name="gender[]" value="Male" />
                                                    <label for="g1_unsorted"><span></span>Male</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g2_unsorted"  name="gender[]" value="Female" />
                                                    <label for="g2_unsorted"><span></span> Female</label>
                                                </li>
                                     <!--            <li>
                                                    <input type="checkbox" id="g2"  name="gender" value="All" />
                                                    <label for="g2"><span></span> Both</label>
                                                </li> -->
                                              
                                            </ul>
                                        </div>
                                    </div> </div>
                                                           <div class="col-md-8">                                          
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Location</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="location_unsorted" >
                                            <ul class="careerfy-checkbox">
                                            @foreach($cities as $city) 
                                                <li>
                                                    <input type="checkbox" id="r{{$city->id}}_unsorted" name="city[]" value="{{$city->id}}" />
                                                    <label for="r{{$city->id}}_unsorted"><span></span>{{$city->name}}</label>
                                                </li> 
                                            @endforeach 
                                            </ul> 
                                        </div>
                                    </div> </div>

                        <div class="col-md-8">       <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Job Function</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="profession_unsorted">
                                            <ul class="careerfy-checkbox">
                                               @foreach($professions as $profession)
                                                <li>
                                                    <input type="checkbox" id="r_{{$profession->id}}_unsorted" name="profession[]" value="{{$profession->id}}" />
                                                    <label for="r_{{$profession->id}}_unsorted"><span></span>{{$profession->name}}</label>
                                                    <small></small>
                                                </li>
                                                @endforeach 
                                            </ul> 
                                        </div>
                                    </div>
                            </div>

                                    <div class="col-md-8">
        <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Career Level</a></h2>
                                        <div class="careerfy-checkbox-toggle croll_div" id="career_level_unsorted">
                                            <ul class="careerfy-checkbox">
                                  @foreach($jobcareer_levels as $jobcareer_level)
                                                <li>
                                 <input type="checkbox" id="jc{{$jobcareer_level->id}}_unsorted" name="career_level[]" value="{{$jobcareer_level->id}}" />
                                                    <label for="jc{{$jobcareer_level->id}}_unsorted"><span></span>{{$jobcareer_level->name}}</label>
                                                    <small>4</small>
                                                </li>
                                @endforeach
                                          
                                            </ul>
                                        </div>
                                    </div>

                                    </div>
                    </div>
                </div>

                <div class="row"> 
                <div class="col-md-8">
                    <div class="col-md-8"> 
                  <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Minimum Salary</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="salary_unsorted">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="salary1_unsorted" name="salary[]" value="N50,000-N100,000" />
                                                    <label for="salary1_unsorted"><span></span>N50,000-N100,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary2_unsorted" name="salary[]" value="N150,000-N250,000" />
                                                    <label for="salary2_unsorted"><span></span>N150,000-N250,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary3_unsorted"  name="salary[]" value="N350,000-N600,000" />
                                                    <label for="salary3_unsorted"><span></span>N350,000-N600,000</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="salary4_unsorted"  name="salary[]" value="N750,000-N1,000," />
                                                    <label for="salary4_unsorted"><span></span>N750,000-N1,000,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary5_unsorted"  name="salary[]" value="N1,000,000-N5,000,000" />
                                                    <label for="salary5_unsorted"><span></span>N1,000,000-N5,000,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary6_unsorted"  name="salary[]" value="N550,000-N10,000,000" />
                                                    <label for="salary6_unsorted"><span></span>N5,050,000-N10,000,000</label>
                                                </li>
                                                  <li>
                                                    <input type="checkbox" id="salary7_unsorted"  name="salary[]" value="N10,000,000-N15,000,000" />
                                                    <label for="salary7_unsorted"><span></span>N10,000,000-N15,000,000</label>
                                                </li>
                                                  <li>
                                                    <input type="checkbox" id="salary8_unsorted"  name="salary[]" value="N15,000,000-Above" />
                                                    <label for="salary8_unsorted"><span></span>N15,000,000-Above</label>
                                                </li>

                                            </ul>
                                        </div>
                                </div></div>
                    <div class="col-md-8">                 <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Availability</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="availability_unsorted">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="avail1_unsorted" name="avail[]" value="now" />
                                                    <label for="avail1_unsorted"><span></span>Immediate</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail2_unsorted" name="avail[]" value="1 week" />
                                                    <label for="avail2_unsorted"><span></span>1 week</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail3_unsorted"  name="avail[]" value="2 weeks" />
                                                    <label for="avail3_unsorted"><span></span>2 weeks</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="avail4_unsorted"  name="avail[]" value="1 month" />
                                                    <label for="avail4_unsorted"><span></span>1 month</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail5_unsorted"  name="avail[]" value="2 months" />
                                                    <label for="avail5_unsorted"><span></span>2 months</label>
                                                </li>
  <!--                                               <li>
                                                    <input type="checkbox" id="avail6_hired"  name="avail[]" value="Specific date" />
                                                    <label for="avail6_hired"><span></span>Specific date</label>
                                                </li> -->
                                            </ul>
                                        </div>
                                </div>  </div>
                    <div class="col-md-8"> 
                    <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Years Of Experience</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="yearofexperience_unsorted">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="g1yoe_unsorted" name="yoe[]" value="0-5" />
                                                    <label for="g1yoe_unsorted"><span></span>0-5</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g2yoe_unsorted"  name="yoe[]" value="6-10" />
                                                    <label for="g2yoe_unsorted"><span></span>6-10</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="g3yoe_unsorted"  name="yoe[]" value="11-15" />
                                                    <label for="g3yoe_unsorted"><span></span>11-15</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g4yoe_unsorted"  name="yoe[]" value="16-20" />
                                                    <label for="g4yoe_unsorted"><span></span>16-20</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g5yoe_unsorted"  name="yoe[]" value="20 Above" />
                                                    <label for="g5yoe_unsorted"><span></span>20 Above</label>
                                                </li>
                                            </ul>
                                        </div>
                                </div> </div> 
                </div> 
                </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-8">                                <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Age</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="age_unsorted">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="rag1_unsorted" name="ag" value="18-25" />
                                                    <label for="rag1_unsorted"><span></span>18-25</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="rag2_unsorted" name="ag" value="26-30" />
                                                    <label for="rag2_unsorted"><span></span>26-30</label>
                                                </li>
                                                    <li>
                                                    <input type="checkbox" id="rag3_unsorted" name="ag" value="31-35" />
                                                    <label for="rag3_unsorted"><span></span>31-35</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="rag4_unsorted" name="ag" value="36-40" />
                                                    <label for="rag4_unsorted"><span></span>36-40</label>
                                                </li>
                                                     <li>
                                                    <input type="checkbox" id="rag5_unsorted" name="ag" value="41-45" />
                                                    <label for="rag5_unsorted"><span></span>41-45</label>
                                                </li> 
                                                <li>
                                                    <input type="checkbox" id="rag6_unsorted" name="ag" value="46-50" />
                                                    <label for="rag6_unsorted"><span></span>46-50</label>
                                                </li> 
                                                <li>
                                                    <input type="checkbox" id="rag7_unsorted" name="ag" value="51 Above" />
                                                    <label for="rag7_unsorted"><span></span>51 Above</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> </div>
                            <div class="col-md-8">                                
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Qualification</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div"  >
                               <div id="qualify_unsorted">

                                            <ul class="careerfy-checkbox">
                                             @foreach($educationallevels as $educational_level)
                                                    <li>
                                         <input type="checkbox" id="qu_{{$educational_level->id}}" name="qu[]" value="{{$educational_level->id}}" />
                                                    <label for="qu_{{$educational_level->id}}"><span></span>{{$educational_level->name}}</label>
                                                </li>
                                                @endforeach
                                        
                                                 </ul>
                                                 </div>
                                        </div>
                                    </div> </div>
     
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-8"> 
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Employement Terms</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="job_terms_unsorted">
                                            <ul class="careerfy-checkbox">
                                  @foreach($employement_terms as $employement_term)
                                                <li>
                                   <input type="checkbox" id="jr{{$employement_term->id}}_unsorted" name="job[]" value="{{$employement_term->id}}" />
                                                    <label for="jr{{$employement_term->id}}_unsorted"><span></span>{{$employement_term->name}}</label>
                                                    <small>4</small>
                                                </li>
                                @endforeach
                                          
                                            </ul>
                                        </div>
                                    </div></div>
                            
                        </div>


                    </div>
            
            </div>
        </div>
          </div> 
                                                <div class="tab-content" >


                                                 @if(!$List_applicants_by_job_id->isEmpty())
                                                         <?php $countme2 = 0; ?>
                                                @forelse($List_applicants_by_job_id as $List_applicant)
                                                       @if($countme2 === 0)
                                                 <div class="tab-pane active" id="tab_6_1{{$List_applicant->id}}">
                                                 @else
                                                 <div class="tab-pane fade" id="tab_6_1{{$List_applicant->id}}">
                                                 @endif 
                                                  
                                   
 

              <div class="col-md-12 cv_content"  >

                    <div id="savedescription{{$List_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="rejected" name="rejected{{$List_applicant->id}}">
                    <input type="hidden" value="{{$List_applicant->id}}" name="application_id{{$List_applicant->id}}">
                    <input type="hidden" value="{{$List_applicant->user_id}}" name="user_id{{$List_applicant->id}}">
                     <input type="hidden" value="{{$List_applicant->tag_id}}" name="job_id{{$List_applicant->tag_id}}">
                        <i class="icon-plus"></i> REJECT
                    </div>
                                   
                     <div id="in_review{{$List_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="in_review" name="in_review{{$List_applicant->id}}">
                    <input type="hidden" value="{{$List_applicant->id}}" name="application_id{{$List_applicant->id}}">
                    <input type="hidden" value="{{$List_applicant->user_id}}" name="user_id{{$List_applicant->id}}">
                     <input type="hidden" value="{{$List_applicant->tag_id}}" name="job_id{{$List_applicant->tag_id}}">
                        <i class="icon-plus"></i> KEEP IN VIEW
                    </div>
 
                 <div id="shortlist{{$List_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="shortlist" name="shortlist{{$List_applicant->id}}">
                    <input type="hidden" value="{{$List_applicant->id}}" name="application_id{{$List_applicant->id}}">
                    <input type="hidden" value="{{$List_applicant->user_id}}" name="user_id{{$List_applicant->id}}">
                     <input type="hidden" value="{{$List_applicant->tag_id}}" name="job_id{{$List_applicant->tag_id}}">
                        <i class="icon-plus"></i> SHORTLIST
                    </div> 

                  <div id="offered{{$List_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="offer" name="offer{{$List_applicant->id}}">
                    <input type="hidden" value="{{$List_applicant->id}}" name="application_id{{$List_applicant->id}}">
                    <input type="hidden" value="{{$List_applicant->user_id}}" name="user_id{{$List_applicant->id}}">
                     <input type="hidden" value="{{$List_applicant->tag_id}}" name="job_id{{$List_applicant->tag_id}}">
                        <i class="icon-plus"></i> OFFER
                    </div>
            <div id="hire{{$List_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="hire" name="hire{{$List_applicant->id}}">
                    <input type="hidden" value="{{$List_applicant->id}}" name="application_id{{$List_applicant->id}}">
                    <input type="hidden" value="{{$List_applicant->user_id}}" name="user_id{{$List_applicant->id}}">
                     <input type="hidden" value="{{$List_applicant->tag_id}}" name="job_id{{$List_applicant->tag_id}}">
                        <i class="icon-plus"></i> HIRE
                    </div>
              <div id="hire{{$List_applicant->id}}" class="btn  mt-ladda-btn mini_header" data-toggle="collapse" data-target="#expand_unsorted" >
                   
                       <i class="careerfy-icon careerfy-sort"></i> Sort
                    </div>
                     <div class="space">&nbsp;</div> 

                                </div>
                                  <div class="space">&nbsp;</div> 
                                  <div id="emalForm">
  <button type="button" class="btn green mt-ladda-btn ladda-button btn-outline" data-toggle="collapse" data-target="#{{$List_applicant->id}}"><i class="careerfy-icon careerfy-envelope" ></i>Send Email</button>
            <div class="space">&nbsp;</div> 
                                  <div class="lds-ripplee{{$List_applicant->user_id}}" style="display: none;"><div></div><div></div></div>
                              <div id="info"></div>
<div id="emailsent{{$List_applicant->user_id}}"></div>
  <div id="{{$List_applicant->id}}" class="collapse">
     <div class="col-md-7">
        <div class="row" id="sendEmailStatus{{$List_applicant->user_id}}">
        
 {!! Form::model($List_applicant, ['files' => true]) !!}
  {{ csrf_field() }}
<div class="space"></div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-body settings-block">
 <div class="space">&nbsp;</div> 
   <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            {!! Form::label('title', 'Subject') !!} 
            <input type="tex" name="title{{$List_applicant->user_id}}"> 
            <input type="hidden" name="email_address" value="{{$List_applicant->email}}">
            <input type="hidden" name="name" value="{{$List_applicant->candidates_name}}">
            <small class="text-danger">{{ $errors->first('title') }}</small>
          </div>
 <div class="space">&nbsp;</div> 
          <div class="form-group{{ $errors->has('body_of_email') ? ' has-error' : '' }}">
            {!! Form::label('body_of_email', 'Email') !!}
         <textarea name="body_of_email{{$List_applicant->user_id}}" class="form-control" required="required"></textarea> 
            <small class="text-danger">{{ $errors->first('body_of_email') }}</small>
          </div>
    <div class="space">&nbsp;</div> 
    <button type="submit" class="btn blue mt-ladda-btn ladda-button btn-outline btn-block" id="sendEmail{{$List_applicant->user_id}}">Send Email</button> 
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}   
        
        </div>
      </div>
  </div>
  </div>
 @foreach($documentList as $document)
@if($List_applicant->document_id === $document->id)  
   <div class="space">&nbsp;</div>
 
<div class="col-md-12 cv_content">  
<div class="" id="user_profile"> 
 <div class="pageactionIn">
 <div class="title4">
<div class="user_name"> <h4 class="highlightable">{{$document->candidates_name}}</h4> </div>  
                                        
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Age</span>

<span class="detail highlightable"><strong>{{$document->age}}</strong></span>

</div>

 <div class="overviewtitle2">
<span class="ovtitle">Date of Birth</span>
<span class="detail highlightable"><strong>{{ date('M d, Y', strtotime($document->date_of_birth)) }}  </strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Gender</span>
<span class="detail highlightable"><strong> {{$document->gender}} </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Nationality</span>
<span class="detail highlightable"><strong> @foreach($countries as $country)  @if($country->code === $List_applicant->nationality) {{$country->name_en}} @endif @endforeach </strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Location</span>
<span class="detail highlightable"><strong>  {{$List_applicant->city_id}}</strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Email</span>
<span class="detail highlightable"><strong>{{$document->email}}</strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Willing to relocate:</span>
<span class="detail highlightable"><strong>{{$List_applicant->relocate_nationaly}} </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Educational Level:</span>
<span class="detail highlightable"><strong>       
@foreach($educationallevels as $educational_level)
                                      @if($educational_level->id === $document->educational_level)
                                                    {{$educational_level->name}} 
                                             @endif
                                                @endforeach </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Employment Terms:</span>
<span class="detail highlightable"><strong> @foreach($employement_terms as $employement_term) @if($employement_term->id == $List_applicant->d_employment_term) {{$employement_term->name}} @endif @endforeach</strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Career Level:</span>
<span class="detail highlightable"><strong> @foreach($jobcareer_levels as $job_career_level) @if($job_career_level->id == $document->career_level) {{$job_career_level->name}}  @endif @endforeach{{$List_applicant->career_level}} </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle"> Minimum Salary:</span>
<span class="detail highlightable"><strong>{{$List_applicant->minimum_salary}} / Year</strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Availability:</span>
<span class="detail highlightable"><strong> {{$List_applicant->availability}}</strong></span>
</div> 
 </div> 
</div>
</div>
@endif
@endforeach



<div class="space">&nbsp;</div>
 
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="education_topsection">
<div class="title4">
<p class="editov2"> </p>
 
<h4>Career Objective / Summary</h4>
@foreach($careerlist as $career)
@if($career->resume_id === $List_applicant->resume_id)
{{ $career->summary }}
@endif
@endforeach
 
 </div>
</div>
</div>
<div class="space">&nbsp;</div>

<div class="col-md-12 cv_content">
<div class="pageactionIn" id="education_topsection"> 
<div class="title4">
<h4><i class="careerfy-icon careerfy-design-skills"></i>Specialties and Skills</h4>
</div>
 
<div class="skills_inner">
@foreach($jobskills as $jobskill)
@if($jobskill->resumeid === $List_applicant->resume_id)
 
 <span class="jellybean">{{$jobskill->job_skill}}</span> 
@endif
@endforeach

</div>
</div> </div>
<div class="space">&nbsp;</div>
 

<div class="col-md-12 cv_content">
<div class="pageactionIn" id="education_topsection">
<div class="title4">
<h4> <i class="careerfy-icon careerfy-mortarboard"></i>Educational History </h4>
</div>
@foreach($educationaList as $educational)
@if($educational->resume_id === $List_applicant->resume_id)
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
 @endif
@endforeach
</div>
</div>
 
<div class="space">&nbsp;</div>
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="work_history_topsection">
<div class="title4">
 
<h4> <i class="careerfy-icon careerfy-social-media"></i>Work History</h4>
</div>
 
@foreach($work_histories as $work_history)
@if($work_history->resumefk === $List_applicant->resume_id)
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
@endif
@endforeach
</div>
</div>
<div class="space">&nbsp;</div>
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="certifications_topsection several2">
<div class="title4">
 
<h4>Certifications</h4>
</div>
@foreach($jobcertifications as $jobcertification)
@if($jobcertification->user_id === $List_applicant->user_id)
<div class="certification_inner several2">
 
<div class="overviewtitle2">
<span class="ovtitle">Certification Name</span>
<span class="highlightable"><strong> {{$jobcertification->name}} </strong></span>
</div>
<div class="overviewtitle2">
<span class="ovtitle">Date Received</span>
<span class="highlightable">{{ date('M, Y', strtotime($jobcertification->date_received)) }}</span>
</div>

</div>
@endif
@endforeach
</div>
</div>

<div class="space">&nbsp;</div>
<div class="col-md-12 cv_content" >
<div class="pageactionIn" id="additional_information_topsection">
<div class="title4">
 
<h4>Personal Information</h4>
</div>
@foreach($person_info_list as $person_info)
@if($person_info->user_id === $List_applicant->user_id)
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
<span class="ovtitle">Personal page</span>
<span class="highlightable"><a class="breakword" href="#" rel="external">{{$person_info->personal_page}}</a></span>
</div>
@endif
@endforeach
</div>
 </div>
  
                                                    </div>
                                                     <?php $countme2++; ?>
                                                    @empty
                                        <div class="careerfy-employer-confitmation">
<div align="center">   <img src="{{asset('img/NoRecordFound.png')}}" height="400" width="400" alt="" align="center"></div>
<div class="clearfix"></div>
</div>
                                                    @endforelse
                                                    @else
                                                                                     <div class="careerfy-employer-confitmation">
<div align="center">   <img src="{{asset('img/NoRecordFound.png')}}" height="300" width="300" alt="" align="center"></div>
<div class="clearfix"></div>
</div>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>



                                <div class="tab-pane" id="tab_11">
                               <!--  <h2>Rejected</h2> -->
   <aside class="careerfy-column-4">
 
<div class="careerfy-typo-wrap">
<form class="careerfy-search-filter"> 
<div class="careerfy-candidate careerfy-candidate-default">
<div class="careerfy-search-filter-wrap careerfy-without-toggle">
<div >
<div id="" data-toggle="collapse" data-target="#expand_rejected"> 
<i class="careerfy-icon careerfy-sort"></i>  <h2>Filter Rejected</h2>
</div>
</div></div>

<ul class="careerfy-row nav-tabs tabs-left" id="reject_section">
<!-- <ul> -->
  @if(!$rejected_list->isEmpty())
 <?php $reviewcr = 0; ?>
@forelse($rejected_list as $rejected_applicant)
   
<li class="careerfy-column-12"> 
      <a href="#tab_6_1{{$rejected_applicant->id}} " data-toggle="tab"> 
                                            <div class="careerfy-candidate-default-wrap"> 
                                                  <?php $record = \App\RecruitProfilePix::where('status', 1)->where('user_id', $rejected_applicant->user_id)->orderBy('created_at', 'DESC')->first(); ?>
                                                <figure>
                                                  @if($record)<img src="/uploads/avatars/{{ $record->pix }}" alt="">@else  
                                                    @endif 
                                                </figure> 
                                                <div class="careerfy-candidate-default-text">
                                                    <div class="careerfy-candidate-default-left">
                                                        <h2>
                            @foreach($documentList as $document) @if($rejected_applicant->document_id === $document->id) {{$document->candidates_name}} @endif @endforeach  <i class="careerfy-icon careerfy-check-mark"></i></h2>
                                                        <ul class="careerfy-column-12" >

                                                        <!-- to get work experience; get job_id from application table and resume_id, then goto workexperience table and find by resume_id and jpob_id  -->
                                                   
                                                        @foreach($work_experiences as $work_experience)
                                              @if($work_experience->userfk === $rejected_applicant->user_id && $work_experience->present === 1)
                                                            <li>{{$work_experience->position_title}} at <span href="#" class="careerfy-candidate-default-studio">{{$work_experience->company_name}}</span></li>
                                                            @endif
                                                        @endforeach
                                                        </ul>
                                                    </div>
                                              <!--       <a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a> -->
                                                </div>
                                            </div> </a>
                                        </li>

 <?php $reviewcr++; ?>
@empty
                                           <div class="careerfy-employer-confitmation">
<div align="center">   <img src="{{asset('img/NoRecordFound.png')}}" height="400" width="400" alt="" align="center"></div>
<div class="clearfix"></div>
</div>
@endforelse
 
 @else
<li class="careerfy-column-12"> No Record(s) Found</li>
 @endif
                                    </ul>
                                </div> 
                                </form>
 
                            </div>
                        </aside>  
 

                                            <div class="col-md-8 col-sm-8 col-xs-8">

                                                     <div id="expand_rejected" class="collapse"> 
  <div class="cscroll_div scroll_div" >
            <div class="container "> 
            
                <div class="row"> 
                    <div class="col-md-8">
                    <div class="col-md-8">   

                         <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Gender</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="gender_rejected">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="g1_rejected" name="gender[]" value="Male" />
                                                    <label for="g1_rejected"><span></span>Male</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g2_rejected"  name="gender[]" value="Female" />
                                                    <label for="g2_rejected"><span></span> Female</label>
                                                </li>
                                     <!--   <li>
                                                    <input type="checkbox" id="g2"  name="gender" value="All" />
                                                    <label for="g2"><span></span> Both</label>
                                                </li> -->
                                              
                                            </ul>
                                        </div>
                                    </div> </div>
                                                           <div class="col-md-8">                                          
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Location</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="location_rejected" >
                                            <ul class="careerfy-checkbox">
                                            @foreach($cities as $city) 
                                                <li>
                                                    <input type="checkbox" id="r{{$city->id}}_rejected" name="city[]" value="{{$city->id}}" />
                                                    <label for="r{{$city->id}}_rejected"><span></span>{{$city->name}}</label>
                                                </li> 
                                            @endforeach 
                                            </ul> 
                                        </div>
                                    </div> </div>

                        <div class="col-md-8">       <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Job Function</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="profession_rejected">
                                            <ul class="careerfy-checkbox">
                                               @foreach($professions as $profession)
                                                <li>
                                                    <input type="checkbox" id="r_{{$profession->id}}_rejected" name="profession[]" value="{{$profession->id}}" />
                                                    <label for="r_{{$profession->id}}_rejected"><span></span>{{$profession->name}}</label>
                                                    <small>10</small>
                                                </li>
                                                @endforeach 
                                            </ul> 
                                        </div>
                                    </div>
                            </div>

                                    <div class="col-md-8">
        <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Career Level</a></h2>
                                        <div class="careerfy-checkbox-toggle croll_div" id="career_level_rejected">
                                            <ul class="careerfy-checkbox">
                                  @foreach($jobcareer_levels as $jobcareer_level)
                                                <li>
                                 <input type="checkbox" id="jc{{$jobcareer_level->id}}_rejected" name="career_level[]" value="{{$jobcareer_level->id}}" />
                                                    <label for="jc{{$jobcareer_level->id}}_rejected"><span></span>{{$jobcareer_level->name}}</label>
                                                    <small>4</small>
                                                </li>
                                @endforeach
                                          
                                            </ul>
                                        </div>
                                    </div>

                                    </div>
                    </div>
                </div>

                <div class="row"> 
                <div class="col-md-8">
                    <div class="col-md-8"> 
                  <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Minimum Salary</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="salary__rejected">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="salary1_rejected" name="salary[]" value="N50,000-N100,000" />
                                                    <label for="salary1_rejected"><span></span>N50,000-N100,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary2_rejected" name="salary[]" value="N150,000-N250,000" />
                                                    <label for="salary2_rejected"><span></span>N150,000-N250,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary3_rejected"  name="salary[]" value="N350,000-N600,000" />
                                                    <label for="salary3_rejected"><span></span>N350,000-N600,000</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="salary4_rejected"  name="salary[]" value="N750,000-N1,000," />
                                                    <label for="salary4_rejected"><span></span>N750,000-N1,000,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary5_rejected"  name="salary[]" value="N1,000,000-N5,000,000" />
                                                    <label for="salary5_rejected"><span></span>N1,000,000-N5,000,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary6_rejected"  name="salary[]" value="N550,000-N10,000,000" />
                                                    <label for="salary6_rejected"><span></span>N5,050,000-N10,000,000</label>
                                                </li>
                                                  <li>
                                                    <input type="checkbox" id="salary7_rejected"  name="salary[]" value="N10,000,000-N15,000,000" />
                                                    <label for="salary7_rejected"><span></span>N10,000,000-N15,000,000</label>
                                                </li>
                                                  <li>
                                                    <input type="checkbox" id="salary8_rejected"  name="salary[]" value="N15,000,000-Above" />
                                                    <label for="salary8_rejected"><span></span>N15,000,000-Above</label>
                                                </li>

                                            </ul>
                                        </div>
                                </div></div>
                    <div class="col-md-8">                 <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Availability</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="availability_rejected">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="avail1_rejected" name="avail[]" value="now" />
                                                    <label for="avail1_rejected"><span></span>Immediate</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail2_rejected" name="avail[]" value="1 week" />
                                                    <label for="avail2_rejected"><span></span>1 week</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail3_rejected"  name="avail[]" value="2 weeks" />
                                                    <label for="avail3_rejected"><span></span>2 weeks</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="avail4_rejected"  name="avail[]" value="1 month" />
                                                    <label for="avail4_rejected"><span></span>1 month</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail5_rejected"  name="avail[]" value="2 months" />
                                                    <label for="avail5_rejected"><span></span>2 months</label>
                                                </li>
  <!--                                               <li>
                                                    <input type="checkbox" id="avail6_hired"  name="avail[]" value="Specific date" />
                                                    <label for="avail6_hired"><span></span>Specific date</label>
                                                </li> -->
                                            </ul>
                                        </div>
                                </div>  </div>
                    <div class="col-md-8"> 
                    <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Years Of Experience</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="yearofexperience_rejected">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="g1yoe_rejected" name="yoe[]" value="0-5" />
                                                    <label for="g1yoe_rejected"><span></span>0-5</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g2yoe_rejected"  name="yoe[]" value="6-10" />
                                                    <label for="g2yoe_rejected"><span></span>6-10</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="g3yoe_rejected"  name="yoe[]" value="11-15" />
                                                    <label for="g3yoe_rejected"><span></span>11-15</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g4yoe_rejected"  name="yoe[]" value="16-20" />
                                                    <label for="g4yoe_rejected"><span></span>16-20</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g5yoe_rejected"  name="yoe[]" value="20 Above" />
                                                    <label for="g5yoe_rejected"><span></span>20 Above</label>
                                                </li>
                                            </ul>
                                        </div>
                                </div> </div> 
                </div> 
                </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-8">                                <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Age</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="age_rejected">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="rag1_rejected" name="ag" value="18-25" />
                                                    <label for="rag1_rejected"><span></span>18-25</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="rag2_rejected" name="ag" value="26-30" />
                                                    <label for="rag2_rejected"><span></span>26-30</label>
                                                </li>
                                                    <li>
                                                    <input type="checkbox" id="rag3_rejected" name="ag" value="31-35" />
                                                    <label for="rag3_rejected"><span></span>31-35</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="rag4_rejected" name="ag" value="36-40" />
                                                    <label for="rag4_rejected"><span></span>36-40</label>
                                                </li>
                                                     <li>
                                                    <input type="checkbox" id="rag5_rejected" name="ag" value="41-45" />
                                                    <label for="rag5_rejected"><span></span>41-45</label>
                                                </li> 
                                                <li>
                                                    <input type="checkbox" id="rag6_rejected" name="ag" value="46-50" />
                                                    <label for="rag6_rejected"><span></span>46-50</label>
                                                </li> 
                                                <li>
                                                    <input type="checkbox" id="rag7_rejected" name="ag" value="51 Above" />
                                                    <label for="rag7_rejected"><span></span>51 Above</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> </div>
                            <div class="col-md-8">                                
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Qualification</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div"  >
                       <div id="qualify_rejected">

                                            <ul class="careerfy-checkbox">
                                             @foreach($educationallevels as $educational_level)
                                                    <li>
                                         <input type="checkbox" id="qu_{{$educational_level->id}}_rejected" name="qu[]" value="{{$educational_level->id}}" />
                                                    <label for="qu_{{$educational_level->id}}_rejected"><span></span>{{$educational_level->name}}</label>
                                                </li>
                                                @endforeach
                                        
                                                 </ul>
                                                 </div>
                                        </div>
                                    </div> </div>
     
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-8"> 
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Employement Terms</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="job_terms_rejected">
                                            <ul class="careerfy-checkbox">
                                  @foreach($employement_terms as $employement_term)
                                                <li>
                                   <input type="checkbox" id="jr{{$employement_term->id}}_rejected" name="job[]" value="{{$employement_term->id}}" />
                                                    <label for="jr{{$employement_term->id}}_rejected"><span></span>{{$employement_term->name}}</label>
                                                    <small>4</small>
                                                </li>
                                @endforeach
                                          
                                            </ul>
                                        </div>
                                    </div></div>
                            
                        </div>


                    </div>
            
            </div>
        </div>
          </div> 
                    
                                                <div class="tab-content" id="tab_rejected">
                @if(!$rejected_list->isEmpty())
                <?php $countme4 = 0; ?> 
                @forelse($rejected_list as $rejected_applicant) 
                  @if($countme4 === 0)
                 <div class="tab-pane active" id="tab_6_1{{$rejected_applicant->id}}">
                 @else
                 <div class="tab-pane fade" id="tab_6_1{{$rejected_applicant->id}}">
                 @endif   

@foreach($documentList as $document)
@if($rejected_applicant->document_id === $document->id)  
              <div class="col-md-12 cv_content">

                    <div id="savedescription{{$rejected_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="rejected" name="rejected{{$rejected_applicant->id}}">
                    <input type="hidden" value="{{$rejected_applicant->id}}" name="application_id{{$rejected_applicant->id}}">
                    <input type="hidden" value="{{$rejected_applicant->user_id}}" name="user_id{{$rejected_applicant->id}}">
                     <input type="hidden" value="{{$rejected_applicant->tag_id}}" name="job_id{{$rejected_applicant->tag_id}}">
                        <i class="icon-plus"></i> REJECT
                    </div>
                                   
                     <div id="in_review{{$rejected_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="in_review" name="in_review{{$rejected_applicant->id}}">
                    <input type="hidden" value="{{$rejected_applicant->id}}" name="application_id{{$rejected_applicant->id}}">
                    <input type="hidden" value="{{$rejected_applicant->user_id}}" name="user_id{{$rejected_applicant->id}}">
                     <input type="hidden" value="{{$rejected_applicant->tag_id}}" name="job_id{{$rejected_applicant->tag_id}}">
                        <i class="icon-plus"></i> KEEP IN VIEW
                    </div>
 
                 <div id="shortlist{{$rejected_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="in_review" name="shortlist{{$rejected_applicant->id}}">
                    <input type="hidden" value="{{$rejected_applicant->id}}" name="application_id{{$rejected_applicant->id}}">
                    <input type="hidden" value="{{$rejected_applicant->user_id}}" name="user_id{{$rejected_applicant->id}}">
                     <input type="hidden" value="{{$rejected_applicant->tag_id}}" name="job_id{{$rejected_applicant->tag_id}}">
                        <i class="icon-plus"></i> SHORTLIST
                    </div> 

                  <div id="offered{{$rejected_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="offer" name="offer{{$rejected_applicant->id}}">
                    <input type="hidden" value="{{$rejected_applicant->id}}" name="application_id{{$rejected_applicant->id}}">
                    <input type="hidden" value="{{$rejected_applicant->user_id}}" name="user_id{{$rejected_applicant->id}}">
                     <input type="hidden" value="{{$rejected_applicant->tag_id}}" name="job_id{{$rejected_applicant->tag_id}}">
                        <i class="icon-plus"></i> OFFER
                    </div>
            <div id="hire{{$rejected_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="hire" name="hire{{$rejected_applicant->id}}">
                    <input type="hidden" value="{{$rejected_applicant->id}}" name="application_id{{$rejected_applicant->id}}">
                    <input type="hidden" value="{{$rejected_applicant->user_id}}" name="user_id{{$rejected_applicant->id}}">
                     <input type="hidden" value="{{$rejected_applicant->tag_id}}" name="job_id{{$rejected_applicant->tag_id}}">
                        <i class="icon-plus"></i> HIRE
                    </div>
             <div id="toggle{{$rejected_applicant->id}}" class="btn  mt-ladda-btn mini_header" data-toggle="collapse" data-target="#expand_rejected" >
                   
                       <i class="careerfy-icon careerfy-sort"></i> Sort
                    </div>
  

                                </div>
                                  <div class="space">&nbsp;</div> 
                                  <div id="emalForm">
  <button type="button" class="btn blue mt-ladda-btn ladda-button btn-outline" data-toggle="collapse" data-target="#{{$rejected_applicant->id}}"><i class="careerfy-icon careerfy-envelope" ></i>Send Email</button>
            <div class="space">&nbsp;</div> 
                          <div class="lds-ripplee{{$rejected_applicant->user_id}}" style="display: none;"><div></div><div></div></div>
                              <div id="info"></div>
<div id="emailsent{{$rejected_applicant->user_id}}"></div>
  <div id="{{$rejected_applicant->id}}" class="collapse">
     <div class="col-md-7">
        <div class="row" id="sendEmailStatus{{$rejected_applicant->user_id}}">
        
        
 {!! Form::model($rejected_applicant, ['files' => true]) !!}
  {{ csrf_field() }}
<div class="space"></div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-body settings-block">
 <div class="space">&nbsp;</div> 
   <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            {!! Form::label('title', 'Subject') !!} 
            <input type="text" name="title{{$rejected_applicant->user_id}}" class="form-control" required="required"> 
            <input type="hidden" name="email_address{{$rejected_applicant->user_id}}" value="{{$rejected_applicant->email}}">
            <input type="hidden" name="name{{$rejected_applicant->user_id}}" value="{{$rejected_applicant->candidates_name}}">
            <small class="text-danger">{{ $errors->first('title') }}</small>
          </div>
 <div class="space">&nbsp;</div> 
          <div class="form-group{{ $errors->has('body_of_email') ? ' has-error' : '' }}">
            {!! Form::label('body_of_email', 'Email') !!}
         <textarea name="body_of_email{{$rejected_applicant->user_id}}" class="form-control" required="required"></textarea> 
            <small class="text-danger">{{ $errors->first('body_of_email') }}</small>
          </div>
    <div class="space">&nbsp;</div> 
    <button class="btn blue mt-ladda-btn ladda-button btn-outline btn-block" id="sendEmail{{$rejected_applicant->user_id}}">Send Email</button>
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}   
        
        </div>
      </div>
  </div>
  </div>

   <div class="space">&nbsp;</div>
<div class="col-md-12 cv_content">  
<div class="" id="user_profile"> 
 <div class="pageactionIn">
 <div class="title4">
<div class="user_name"> <h4 class="highlightable">{{$document->candidates_name}}</h4> </div>  
                                        
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Age</span>

<span class="detail highlightable"><strong>{{$document->age}}</strong></span>

</div>

 <div class="overviewtitle2">
<span class="ovtitle">Date of Birth</span>
<span class="detail highlightable"><strong>{{ date('M d, Y', strtotime($document->date_of_birth)) }}  </strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Gender</span>
<span class="detail highlightable"><strong> {{$document->gender}} </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Nationality</span>
<span class="detail highlightable"><strong>  Nationality</strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Email</span>
<span class="detail highlightable"><strong>{{$document->email}}</strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Willing to relocate:</span>
<span class="detail highlightable"><strong>{{$document->relocate_nationaly}} </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Educational Level:</span>
<span class="detail highlightable"><strong>

level</strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Career Level:</span>
<span class="detail highlightable"><strong>career level </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle"> Minimum Salary:</span>
<span class="detail highlightable"><strong>{{$document->minimum_salary}} / Year</strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Availability:</span>
<span class="detail highlightable"><strong> {{$document->availability}}</strong></span>
</div> 
 </div> 
</div>
</div>
@endif
@endforeach



<div class="space">&nbsp;</div>
 
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="education_topsection">
<div class="title4">
<p class="editov2"> </p>
 
<h4>Career Objective / Summary</h4>
@foreach($careerlist as $career)
@if($career->resume_id === $rejected_applicant->resume_id)
{{ $career->summary }}
@endif
@endforeach
 
 </div>
</div>
</div>
<div class="space">&nbsp;</div>

<div class="col-md-12 cv_content">
<div class="pageactionIn" id="education_topsection"> 
<div class="title4">
<h4><i class="careerfy-icon careerfy-design-skills"></i>Specialties and Skills</h4>
</div>
 
<div class="skills_inner">
@foreach($jobskills as $jobskill)
@if($jobskill->resumeid === $rejected_applicant->resume_id)
 
 <span class="jellybean">{{$jobskill->job_skill}}</span> 
@endif
@endforeach

</div>
</div> </div>
<div class="space">&nbsp;</div>
 

<div class="col-md-12 cv_content">
<div class="pageactionIn" id="education_topsection">
<div class="title4">
<h4> <i class="careerfy-icon careerfy-mortarboard"></i>Educational History </h4>
</div>
@foreach($educationaList as $educational)
@if($educational->resume_id === $rejected_applicant->resume_id)
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
 @endif
@endforeach
</div>
</div>
 
<div class="space">&nbsp;</div>
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="work_history_topsection">
<div class="title4">
 
<h4> <i class="careerfy-icon careerfy-social-media"></i>Work History</h4>
</div>
 
@foreach($work_histories as $work_history)
@if($work_history->resumefk === $rejected_applicant->resume_id)
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
@endif
@endforeach
</div>
</div>
<div class="space">&nbsp;</div>
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="certifications_topsection several2">
<div class="title4">
 
<h4>Certifications</h4>
</div>
@foreach($jobcertifications as $jobcertification)
@if($jobcertification->user_id === $rejected_applicant->user_id)
<div class="certification_inner several2">
 
<div class="overviewtitle2">
<span class="ovtitle">Certification Name</span>
<span class="highlightable"><strong> {{$jobcertification->name}} </strong></span>
</div>
<div class="overviewtitle2">
<span class="ovtitle">Date Received</span>
<span class="highlightable">{{ date('M, Y', strtotime($jobcertification->date_received)) }}</span>
</div>

</div>
@endif
@endforeach
</div>
</div>

<div class="space">&nbsp;</div>
<div class="col-md-12 cv_content" >
<div class="pageactionIn" id="additional_information_topsection">
<div class="title4">
 
<h4>Personal Information</h4>
</div>
@foreach($person_info_list as $person_info)
@if($person_info->user_id === $rejected_applicant->user_id)
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
<span class="ovtitle">Personal page</span>
<span class="highlightable"><a class="breakword" href="#" rel="external">{{$person_info->personal_page}}</a></span>
</div>
@endif
@endforeach
</div>
 </div>


                                                    </div>
                                                     <?php $countme4++; ?>
                                                    @empty
                                           <div class="careerfy-employer-confitmation">
<div align="center">   <img src="{{asset('img/NoRecordFound.png')}}" height="300" width="300" alt="" align="center"></div>
<div class="clearfix"></div>
</div>
                                                    @endforelse

                                                @else
                                                                                         <div class="careerfy-employer-confitmation">
<div align="center">   <img src="{{asset('img/NoRecordFound.png')}}" height="300" width="300" alt="" align="center"></div>
<div class="clearfix"></div>
</div>
                                                @endif

                                                </div>
                                            </div>

                                </div>

                                <div class="tab-pane" id="tab_12"> 
 
   <aside class="careerfy-column-4"> 
<div class="careerfy-typo-wrap">
<form class="careerfy-search-filter"> 
<div class="careerfy-candidate careerfy-candidate-default">

<div class="careerfy-search-filter-wrap careerfy-without-toggle">
<div >
<div id="" data-toggle="collapse" data-target="#expand_inreview"> 
<i class="careerfy-icon careerfy-sort"></i>  <h2>Filter In-Review</h2>
</div>
</div></div>

<ul class="careerfy-row nav-tabs tabs-left" id="review_section">
<!-- <ul> -->
 @if(!$review_list->isEmpty())
 <?php $reviewc = 0; ?>
@forelse($review_list as $review_applicant) 
<li class="careerfy-column-12">
 
      <a href="#tab_6_1{{$review_applicant->id}}" data-toggle="tab">
 

                                            <div class="careerfy-candidate-default-wrap"> 
                                                <figure>
                              <?php $record = \App\RecruitProfilePix::where('status', 1)->where('user_id', $review_applicant->user_id)->orderBy('created_at', 'DESC')->first(); ?>
                                                  @if($record)<img src="/uploads/avatars/{{ $record->pix }}" alt="">@else  
                                                    @endif
                                                </figure> 
                                                <div class="careerfy-candidate-default-text">
                                                    <div class="careerfy-candidate-default-left">
                                                        <h2>
                            @foreach($documentList as $document) @if($review_applicant->document_id === $document->id) {{$document->candidates_name}} @endif @endforeach  <i class="careerfy-icon careerfy-check-mark"></i></h2>
                                                        <ul class="careerfy-column-12" >

                                                        <!-- to get work experience; get job_id from application table and resume_id, then goto workexperience table and find by resume_id and jpob_id  -->
                                                   
                                                        @foreach($work_experiences as $work_experience)
                                                        @if($work_experience->userfk === $review_applicant->user_id && $work_experience->present === 1)
                                                            <li>{{$work_experience->position_title}} at <span href="#" class="careerfy-candidate-default-studio">{{$work_experience->company_name}}</span></li>
                                                            @endif
                                                        @endforeach
                                                        </ul>
                                                    </div>
                                              <!--       <a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a> -->
                                                </div>
                                            </div> </a>
                                        </li>

 <?php $reviewc++; ?>
@empty
@endforelse

@else
<li class="careerfy-column-12"> No Record(s) Found</li>
@endif
 
                                    </ul>
                                </div> 
                                </form>
 
                            </div>
                        </aside>  


                                            <div class="col-md-8 col-sm-8 col-xs-8">

        <div id="expand_inreview" class="collapse"> 
  <div class="cscroll_div scroll_div" >
            <div class="container"> 
                <div class="row"> 
                    <div class="col-md-8">
                    <div class="col-md-8">   
                         <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Gender</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="gender_inreview">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="g1_inreview" name="gender[]" value="Male" />
                                                    <label for="g1_inreview"><span></span>Male</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g2_inreview"  name="gender[]" value="Female" />
                                                    <label for="g2_inreview"><span></span> Female</label>
                                                </li>
                                     <!--   <li>
                                                    <input type="checkbox" id="g2"  name="gender" value="All" />
                                                    <label for="g2"><span></span> Both</label>
                                                </li> -->
                                              
                                            </ul>
                                        </div>
                                    </div> </div>
                                             <div class="col-md-8">                                          
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Location</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="location_inreview" >
                                            <ul class="careerfy-checkbox">
                                            @foreach($cities as $city) 
                                                <li>
                                                    <input type="checkbox" id="r{{$city->id}}_inreview" name="city[]" value="{{$city->id}}" />
                                                    <label for="r{{$city->id}}_inreview"><span></span>{{$city->name}}</label>
                                                </li> 
                                            @endforeach 
                                            </ul> 
                                        </div>
                                    </div> </div>

                        <div class="col-md-8">       
                        <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Job Function</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="profession_inreview">
                                            <ul class="careerfy-checkbox">
                                               @foreach($professions as $profession)
                                                <li>
                                                    <input type="checkbox" id="r_{{$profession->id}}_inreview" name="profession[]" value="{{$profession->id}}" />
                                                    <label for="r_{{$profession->id}}_inreview"><span></span>{{$profession->name}}</label>
                                                    <small>10</small>
                                                </li>
                                                @endforeach 
                                            </ul> 
                                        </div>
                                    </div>
                            </div>

                                    <div class="col-md-8">
        <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Career Level</a></h2>
                                        <div class="careerfy-checkbox-toggle croll_div" id="career_level_inreview">
                                            <ul class="careerfy-checkbox">
                                  @foreach($jobcareer_levels as $jobcareer_level)
                                                <li>
                                 <input type="checkbox" id="jc{{$jobcareer_level->id}}_inreview" name="career_level[]" value="{{$jobcareer_level->id}}" />
                                                    <label for="jc{{$jobcareer_level->id}}_inreview"><span></span>{{$jobcareer_level->name}}</label>
                                                    <small>4</small>
                                                </li>
                                @endforeach
                                          
                                            </ul>
                                        </div>
                                    </div>

                                    </div>
                    </div>
                </div>

                <div class="row"> 
                <div class="col-md-8">
                    <div class="col-md-8"> 
                  <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Minimum Salary</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="salary_inreview">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="salary1_inreview" name="salary[]" value="N50,000-N100,000" />
                                                    <label for="salary1_inreview"><span></span>N50,000-N100,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary2_inreview" name="salary[]" value="N150,000-N250,000" />
                                                    <label for="salary2_inreview"><span></span>N150,000-N250,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary3_inreview"  name="salary[]" value="N350,000-N600,000" />
                                                    <label for="salary3_inreview"><span></span>N350,000-N600,000</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="salary4_inreview"  name="salary[]" value="N750,000-N1,000," />
                                                    <label for="salary4_inreview"><span></span>N750,000-N1,000,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary5_inreview"  name="salary[]" value="N1,000,000-N5,000,000" />
                                                    <label for="salary5_inreview"><span></span>N1,000,000-N5,000,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary6_inreview"  name="salary[]" value="N550,000-N10,000,000" />
                                                    <label for="salary6_inreview"><span></span>N5,050,000-N10,000,000</label>
                                                </li>
                                                  <li>
                                                    <input type="checkbox" id="salary7_inreview"  name="salary[]" value="N10,000,000-N15,000,000" />
                                                    <label for="salary7_inreview"><span></span>N10,000,000-N15,000,000</label>
                                                </li>
                                                  <li>
                                                    <input type="checkbox" id="salary8_inreview"  name="salary[]" value="N15,000,000-Above" />
                                                    <label for="salary8_inreview"><span></span>N15,000,000-Above</label>
                                                </li>

                                            </ul>
                                        </div>
                                </div></div>
                    <div class="col-md-8"> 
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Availability</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="availability_inreview">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="avail1_inreview" name="avail[]" value="now" />
                                                    <label for="avail1_inreview"><span></span>Immediate</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail2_inreview" name="avail[]" value="1 week" />
                                                    <label for="avail2_inreview"><span></span>1 week</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail3_inreview"  name="avail[]" value="2 weeks" />
                                                    <label for="avail3_inreview"><span></span>2 weeks</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="avail4_inreview"  name="avail[]" value="1 month" />
                                                    <label for="avail4_inreview"><span></span>1 month</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail5_inreview"  name="avail[]" value="2 months" />
                                                    <label for="avail5_inreview"><span></span>2 months</label>
                                                </li>
                                            <!--   <li>
                                                    <input type="checkbox" id="avail6_hired"  name="avail[]" value="Specific date" />
                                                    <label for="avail6_hired"><span></span>Specific date</label>
                                                </li> -->
                                            </ul>
                                        </div>
                                </div>  </div>
                    <div class="col-md-8"> 
                    <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Years Of Experience</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="yearofexperience_inreview">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="g1yoe_inreview" name="yoe[]" value="0-5" />
                                                    <label for="g1yoe_inreview"><span></span>0-5</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g2yoe_inreview"  name="yoe[]" value="6-10" />
                                                    <label for="g2yoe_inreview"><span></span>6-10</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="g3yoe_inreview"  name="yoe[]" value="11-15" />
                                                    <label for="g3yoe_inreview"><span></span>11-15</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g4yoe_inreview"  name="yoe[]" value="16-20" />
                                                    <label for="g4yoe_inreview"><span></span>16-20</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g5yoe_inreview"  name="yoe[]" value="20 Above" />
                                                    <label for="g5yoe_inreview"><span></span>20 Above</label>
                                                </li>
                                            </ul>
                                        </div>
                                </div> </div> 
                </div> 
                </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-8">                                <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Age</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="age_inreview">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="rag1_inreview" name="ag" value="18-25" />
                                                    <label for="rag1_inreview"><span></span>18-25</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="rag2_inreview" name="ag" value="26-30" />
                                                    <label for="rag2_inreview"><span></span>26-30</label>
                                                </li>
                                                    <li>
                                                    <input type="checkbox" id="rag3_inreview" name="ag" value="31-35" />
                                                    <label for="rag3_inreview"><span></span>31-35</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="rag4_inreview" name="ag" value="36-40" />
                                                    <label for="rag4_inreview"><span></span>36-40</label>
                                                </li>
                                                     <li>
                                                    <input type="checkbox" id="rag5_inreview" name="ag" value="41-45" />
                                                    <label for="rag5_inreview"><span></span>41-45</label>
                                                </li> 
                                                <li>
                                                    <input type="checkbox" id="rag6_inreview" name="ag" value="46-50" />
                                                    <label for="rag6_inreview"><span></span>46-50</label>
                                                </li> 
                                                <li>
                                                    <input type="checkbox" id="rag7_inreview" name="ag" value="51 Above" />
                                                    <label for="rag7_inreview"><span></span>51 Above</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> </div>
                            <div class="col-md-8">                                
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Qualification</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div"  >
                                             <div id="qualify_inreview">

                                            <ul class="careerfy-checkbox">
                                             @foreach($educationallevels as $educational_level)
                                                    <li>
                                         <input type="checkbox" id="qu_{{$educational_level->id}}_rejected" name="qu[]" value="{{$educational_level->id}}" />
                                                    <label for="qu_{{$educational_level->id}}_rejected"><span></span>{{$educational_level->name}}</label>
                                                </li>
                                                @endforeach
                                        
                                                 </ul>
                                                 </div>
                                        </div>
                                    </div> </div>
     
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-8"> 
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Employement Terms</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="job_terms_inreview">
                                            <ul class="careerfy-checkbox">
                                  @foreach($employement_terms as $employement_term)
                                                <li>
                                   <input type="checkbox" id="jr{{$employement_term->id}}_inreview" name="job[]" value="{{$employement_term->id}}" />
                                                    <label for="jr{{$employement_term->id}}_inreview"><span></span>{{$employement_term->name}}</label>
                                                    <small>4</small>
                                                </li>
                                @endforeach
                                          
                                            </ul>
                                        </div>
                                    </div></div>
                            
                        </div> 
                    </div>
            
            </div>
        </div>
          </div> 
                                                <div class="tab-content" id="review">
                                                 @if(!$review_list->isEmpty())
                                                         <?php $reviewb = 0; ?>
                                                @forelse($review_list as $review_applicant) 
                                                  @if($reviewb === 0)
                                                 <div class="tab-pane active" id="tab_6_1{{$review_applicant->id}}">
                                                 @else
                                                 <div class="tab-pane fade" id="tab_6_1{{$review_applicant->id}}">
                                                 @endif  

 
 @foreach($documentList as $document)
@if($review_applicant->document_id === $document->id)  
              <div class="col-md-12 cv_content">

                    <div id="savedescription{{$review_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="rejected" name="rejected{{$review_applicant->id}}">
                    <input type="hidden" value="{{$review_applicant->id}}" name="application_id{{$review_applicant->id}}">
                    <input type="hidden" value="{{$review_applicant->user_id}}" name="user_id{{$review_applicant->id}}">
                     <input type="hidden" value="{{$review_applicant->tag_id}}" name="job_id{{$review_applicant->tag_id}}">
                        <i class="icon-plus"></i> REJECT
                    </div>
                                   
                     <div id="in_review{{$review_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="in_review" name="in_review{{$review_applicant->id}}">
                    <input type="hidden" value="{{$review_applicant->id}}" name="application_id{{$review_applicant->id}}">
                    <input type="hidden" value="{{$review_applicant->user_id}}" name="user_id{{$review_applicant->id}}">
                     <input type="hidden" value="{{$review_applicant->tag_id}}" name="job_id{{$review_applicant->tag_id}}">
                        <i class="icon-plus"></i> KEEP IN VIEW
                    </div>
 
                 <div id="shortlist{{$review_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="in_review" name="shortlist{{$review_applicant->id}}">
                    <input type="hidden" value="{{$review_applicant->id}}" name="application_id{{$review_applicant->id}}">
                    <input type="hidden" value="{{$review_applicant->user_id}}" name="user_id{{$review_applicant->id}}">
                     <input type="hidden" value="{{$review_applicant->tag_id}}" name="job_id{{$review_applicant->tag_id}}">
                        <i class="icon-plus"></i> SHORTLIST
                    </div> 

                  <div id="offered{{$review_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="offer" name="offer{{$review_applicant->id}}">
                    <input type="hidden" value="{{$review_applicant->id}}" name="application_id{{$review_applicant->id}}">
                    <input type="hidden" value="{{$review_applicant->user_id}}" name="user_id{{$review_applicant->id}}">
                     <input type="hidden" value="{{$review_applicant->tag_id}}" name="job_id{{$review_applicant->tag_id}}">
                        <i class="icon-plus"></i> OFFER
                    </div>
            <div id="hire{{$review_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="hire" name="hire{{$review_applicant->id}}">
                    <input type="hidden" value="{{$review_applicant->id}}" name="application_id{{$review_applicant->id}}">
                    <input type="hidden" value="{{$review_applicant->user_id}}" name="user_id{{$review_applicant->id}}">
                     <input type="hidden" value="{{$review_applicant->tag_id}}" name="job_id{{$review_applicant->tag_id}}">
                        <i class="icon-plus"></i> HIRE
                    </div>
                       <div id="toggle{{$review_applicant->id}}" class="btn  mt-ladda-btn mini_header" data-toggle="collapse" data-target="#expand_inreview" >
                   
                       <i class="careerfy-icon careerfy-sort"></i> Sort
                    </div>
      

                                </div>
                                  <div class="space">&nbsp;</div> 
                                  <div id="emalForm">
  <button type="button" class="btn blue mt-ladda-btn ladda-button btn-outline" data-toggle="collapse" data-target="#{{$review_applicant->id}}"><i class="careerfy-icon careerfy-envelope" ></i>Send Email</button>
            <div class="space">&nbsp;</div> 
                                 <div class="lds-ripplee{{$review_applicant->user_id}}" style="display: none;"><div></div><div></div></div>
                              <div id="info{{$review_applicant->user_id}}"></div>
<div id="emailsent{{$review_applicant->user_id}}"></div>
  <div id="{{$review_applicant->id}}" class="collapse">
     <div class="col-md-7">
        <div class="row" id="sendEmailStatus{{$review_applicant->user_id}}">
        
 {!! Form::model($review_applicant, ['files' => true]) !!}
  {{ csrf_field() }}
<div class="space"></div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-body settings-block">
 <div class="space">&nbsp;</div> 
   <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            {!! Form::label('title', 'Subject') !!} 
            <input type="text" name="title{{$review_applicant->user_id}}" class="form-control" required="required"> 
            <input type="hidden" name="email_address" value="{{$review_applicant->email}}">
            <input type="hidden" name="name" value="{{$review_applicant->candidates_name}}">
            <small class="text-danger">{{ $errors->first('title') }}</small>
          </div>
 <div class="space">&nbsp;</div> 
          <div class="form-group{{ $errors->has('body_of_email') ? ' has-error' : '' }}">
            {!! Form::label('body_of_email', 'Email') !!}
         <textarea name="body_of_email{{$review_applicant->user_id}}" class="form-control" required="required"></textarea> 
            <small class="text-danger">{{ $errors->first('body_of_email') }}</small>
          </div>
    <div class="space">&nbsp;</div> 
    <button class="btn blue mt-ladda-btn ladda-button btn-outline btn-block" id="sendEmail{{$review_applicant->user_id}}">Send Email</button> 
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}   
        
        </div>
      </div>
  </div>
  </div>

   <div class="space">&nbsp;</div>
<div class="col-md-12 cv_content">  
<div class="" id="user_profile"> 
 <div class="pageactionIn">
 <div class="title4">
<div class="user_name"> <h4 class="highlightable">{{$document->candidates_name}}</h4> </div>  
                                        
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Age</span>

<span class="detail highlightable"><strong>{{$document->age}}</strong></span>

</div>

 <div class="overviewtitle2">
<span class="ovtitle">Date of Birth</span>
<span class="detail highlightable"><strong>{{ date('M d, Y', strtotime($document->date_of_birth)) }}  </strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Gender</span>
<span class="detail highlightable"><strong> {{$document->gender}} </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Nationality</span>
<span class="detail highlightable"><strong> @foreach($countries as $country)  @if($country->code === $review_applicant->nationality) {{$country->name_en}} @endif @endforeach </strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Location</span>
<span class="detail highlightable"><strong>  {{$review_applicant->city_id}}</strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Email</span>
<span class="detail highlightable"><strong>{{$document->email}}</strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Willing to relocate:</span>
<span class="detail highlightable"><strong>{{$review_applicant->relocate_nationaly}} </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Educational Level:</span>
<span class="detail highlightable"><strong>       
@foreach($educationallevels as $educational_level)
                                      @if($educational_level->id === $document->educational_level)
                                                    {{$educational_level->name}} 
                                             @endif
                                                @endforeach </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Employment Terms:</span>
<span class="detail highlightable"><strong> @foreach($employement_terms as $employement_term) @if($employement_term->id == $review_applicant->d_employment_term) {{$employement_term->name}} @endif @endforeach</strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Career Level:</span>
<span class="detail highlightable"><strong> @foreach($jobcareer_levels as $job_career_level) @if($job_career_level->id == $document->career_level) {{$job_career_level->name}}  @endif @endforeach{{$review_applicant->career_level}} </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle"> Minimum Salary:</span>
<span class="detail highlightable"><strong>{{$review_applicant->minimum_salary}} / Year</strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Availability:</span>
<span class="detail highlightable"><strong> {{$review_applicant->availability}}</strong></span>
</div> 
 </div> 
</div>
</div>
@endif
@endforeach



<div class="space">&nbsp;</div>
 
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="education_topsection">
<div class="title4">
<p class="editov2"> </p>
 
<h4>Career Objective / Summary</h4>
@foreach($careerlist as $career)
@if($career->resume_id === $review_applicant->resume_id)
{{ $career->summary }}
@endif
@endforeach
 
 </div>
</div>
</div>
<div class="space">&nbsp;</div>

<div class="col-md-12 cv_content">
<div class="pageactionIn" id="education_topsection"> 
<div class="title4">
<h4><i class="careerfy-icon careerfy-design-skills"></i>Specialties and Skills</h4>
</div>
 
<div class="skills_inner">
@foreach($jobskills as $jobskill)
@if($jobskill->resumeid === $review_applicant->resume_id)
 
 <span class="jellybean">{{$jobskill->job_skill}}</span> 
@endif
@endforeach

</div>
</div> </div>
<div class="space">&nbsp;</div>
 

<div class="col-md-12 cv_content">
<div class="pageactionIn" id="education_topsection">
<div class="title4">
<h4> <i class="careerfy-icon careerfy-mortarboard"></i>Educational History </h4>
</div>
@foreach($educationaList as $educational)
@if($educational->resume_id === $review_applicant->resume_id)
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
 @endif
@endforeach
</div>
</div>
 
<div class="space">&nbsp;</div>
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="work_history_topsection">
<div class="title4">
 
<h4> <i class="careerfy-icon careerfy-social-media"></i>Work History</h4>
</div>
 
@foreach($work_histories as $work_history)
@if($work_history->resumefk === $review_applicant->resume_id)
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
@endif
@endforeach
</div>
</div>
<div class="space">&nbsp;</div>
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="certifications_topsection several2">
<div class="title4">
 
<h4>Certifications</h4>
</div>
@foreach($jobcertifications as $jobcertification)
@if($jobcertification->user_id === $review_applicant->user_id)
<div class="certification_inner several2">
 
<div class="overviewtitle2">
<span class="ovtitle">Certification Name</span>
<span class="highlightable"><strong> {{$jobcertification->name}} </strong></span>
</div>
<div class="overviewtitle2">
<span class="ovtitle">Date Received</span>
<span class="highlightable">{{ date('M, Y', strtotime($jobcertification->date_received)) }}</span>
</div>

</div>
@endif
@endforeach
</div>
</div>

<div class="space">&nbsp;</div>
<div class="col-md-12 cv_content" >
<div class="pageactionIn" id="additional_information_topsection">
<div class="title4">
 
<h4>Personal Information</h4>
</div>
@foreach($person_info_list as $person_info)
@if($person_info->user_id === $review_applicant->user_id)
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
<span class="ovtitle">Personal page</span>
<span class="highlightable"><a class="breakword" href="" rel="external">{{$person_info->personal_page}}</a></span>
</div>
@endif
@endforeach
</div>
 </div>


                                                    </div>
                                                     <?php $reviewb++; ?>
                                                    @empty
                                           <div class="careerfy-employer-confitmation">
<div align="center">   <img src="{{asset('img/NoRecordFound.png')}}" height="300" width="300" alt="" align="center"></div>
<div class="clearfix"></div>
</div>
                                                    @endforelse

                                                    @else
                                           <div class="careerfy-employer-confitmation">
<div align="center">   <img src="{{asset('img/NoRecordFound.png')}}" height="300" width="300" alt="" align="center"></div>
<div class="clearfix"></div>
</div>
          
                                                    @endif
                                                </div>
                                            </div>

                                </div>
 


                                <div class="tab-pane" id="tab_13"> 
 
   <aside class="careerfy-column-4"> 
<div class="careerfy-typo-wrap">
<form class="careerfy-search-filter"> 
<div class="careerfy-candidate careerfy-candidate-default">

<div class="careerfy-search-filter-wrap careerfy-without-toggle">
<div >
<div id="" data-toggle="collapse" data-target="#expand_shortlist"> 
<i class="careerfy-icon careerfy-sort"></i>  <h2>Filter Shortlisted</h2>
</div>
</div></div>

<ul class="careerfy-row nav-tabs tabs-left" id="shortlist_section">
<!-- <ul> -->
 @if(!$shortlisted_list->isEmpty())
 <?php $reviewc = 0; ?>
@forelse($shortlisted_list as $shortlisted)
                            <li class="careerfy-column-12">
                                  <a href="#tab_6_1{{$shortlisted->id}}" data-toggle="tab">
                                     <?php $record = \App\RecruitProfilePix::where('status', 1)->where('user_id', $shortlisted->user_id)->orderBy('created_at', 'DESC')->first(); ?>
                                            <div class="careerfy-candidate-default-wrap"> 
                                                <figure>
                                                @if($record)<img src="/uploads/avatars/{{ $record->pix }}" alt="">@else  
                                                @endif
                                               </figure> 
                                                <div class="careerfy-candidate-default-text">
                                                    <div class="careerfy-candidate-default-left">
                                                        <h2>
                            @foreach($documentList as $document) @if($shortlisted->document_id === $document->id) {{$document->candidates_name}} @endif @endforeach  <i class="careerfy-icon careerfy-check-mark"></i></h2>
                                                        <ul class="careerfy-column-12" > 
                                                        <!-- to get work experience; get job_id from application table and resume_id, then goto workexperience table and find by resume_id and jpob_id  --> 
                                                        @foreach($work_experiences as $work_experience)
                                                        @if($work_experience->userfk === $shortlisted->user_id && $work_experience->present === 1)
                                                            <li>{{$work_experience->position_title}} at <span href="#" class="careerfy-candidate-default-studio">{{$work_experience->company_name}}</span></li>
                                                            @endif
                                                        @endforeach
                                                        </ul>
                                                    </div>
                                              <!--       <a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a> -->
                                                </div>
                                            </div> </a>
                                        </li>

 <?php $reviewc++; ?>
@empty
@endforelse

@else
<li class="careerfy-column-12"> No Record(s) Found</li>
@endif
 
                                    </ul>
                                </div> 
                            </form> 
                            </div>
                        </aside>  


                                            <div class="col-md-8 col-sm-8 col-xs-8">
                                                    <div id="expand_shortlist" class="collapse"> 
  <div class="cscroll_div scroll_div">
            <div class="container ">  
                <div class="row"> 
                    <div class="col-md-8">
                    <div class="col-md-8">   

                         <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Gender</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="gender_shortlist">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="g1_shortlist" name="gender[]" value="Male" />
                                                    <label for="g1_shortlist"><span></span>Male</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g2_shortlist"  name="gender[]" value="Female" />
                                                    <label for="g2_shortlist"><span></span> Female</label>
                                                </li>
                                     <!--   <li>
                                                    <input type="checkbox" id="g2"  name="gender" value="All" />
                                                    <label for="g2"><span></span> Both</label>
                                                </li> -->
                                              
                                            </ul>
                                        </div>
                                    </div> </div>
                                             <div class="col-md-8">                                          
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Location</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="location_shortlist" >
                                            <ul class="careerfy-checkbox">
                                            @foreach($cities as $city) 
                                                <li>
                                                    <input type="checkbox" id="r{{$city->id}}_shortlist" name="city[]" value="{{$city->id}}" />
                                                    <label for="r{{$city->id}}_shortlist"><span></span>{{$city->name}}</label>
                                                </li> 
                                            @endforeach 
                                            </ul> 
                                        </div>
                                    </div> </div>

                        <div class="col-md-8">       <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Job Function</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="profession_shortlist">
                                            <ul class="careerfy-checkbox">
                                               @foreach($professions as $profession)
                                                <li>
                                                    <input type="checkbox" id="r_{{$profession->id}}_shortlist" name="profession[]" value="{{$profession->id}}" />
                                                    <label for="r_{{$profession->id}}_shortlist"><span></span>{{$profession->name}}</label>
                                                    <small>10</small>
                                                </li>
                                                @endforeach 
                                            </ul> 
                                        </div>
                                    </div>
                            </div>

                                    <div class="col-md-8">
        <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Career Level</a></h2>
                                        <div class="careerfy-checkbox-toggle croll_div" id="career_level_shortlist">
                                            <ul class="careerfy-checkbox">
                                  @foreach($jobcareer_levels as $jobcareer_level)
                                                <li>
                                 <input type="checkbox" id="jc{{$jobcareer_level->id}}_shortlist" name="career_level[]" value="{{$jobcareer_level->id}}" />
                                                    <label for="jc{{$jobcareer_level->id}}_shortlist"><span></span>{{$jobcareer_level->name}}</label>
                                                    <small>4</small>
                                                </li>
                                @endforeach
                                          
                                            </ul>
                                        </div>
                                    </div>

                                    </div>
                    </div>
                </div>

                <div class="row"> 
                <div class="col-md-8">
                    <div class="col-md-8"> 
                  <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Minimum Salary</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="salary_shortlist">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="salary1_shorlist" name="salary[]" value="N50,000-N100,000" />
                                                    <label for="salary1_shorlist"><span></span>N50,000-N100,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary2_shorlist" name="salary[]" value="N150,000-N250,000" />
                                                    <label for="salary2_shortlist"><span></span>N150,000-N250,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary3_shorlist"  name="salary[]" value="N350,000-N600,000" />
                                                    <label for="salary3_shortlist"><span></span>N350,000-N600,000</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="salary4_shorlist"  name="salary[]" value="N750,000-N1,000," />
                                                    <label for="salary4_shorlist"><span></span>N750,000-N1,000,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary5_shorlist"  name="salary[]" value="N1,000,000-N5,000,000" />
                                                    <label for="salary5_shorlist"><span></span>N1,000,000-N5,000,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary6_shorlist"  name="salary[]" value="N550,000-N10,000,000" />
                                                    <label for="salary6_shorlist"><span></span>N5,050,000-N10,000,000</label>
                                                </li>
                                                  <li>
                                                    <input type="checkbox" id="salary7_shorlist"  name="salary[]" value="N10,000,000-N15,000,000" />
                                                    <label for="salary7_shortlist"><span></span>N10,000,000-N15,000,000</label>
                                                </li>
                                                  <li>
                                                    <input type="checkbox" id="salary8_shorlist"  name="salary[]" value="N15,000,000-Above" />
                                                    <label for="salary8_shorlist"><span></span>N15,000,000-Above</label>
                                                </li>

                                            </ul>
                                        </div>
                                </div></div>
                    <div class="col-md-8">                 <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Availability</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="availability_shorlist">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="avail1_shorlist" name="avail[]" value="now" />
                                                    <label for="avail1_shorlist"><span></span>Immediate</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail2_shorlist" name="avail[]" value="1 week" />
                                                    <label for="avail2_shorlist"><span></span>1 week</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail3_shorlist"  name="avail[]" value="2 weeks" />
                                                    <label for="avail3_shorlist"><span></span>2 weeks</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="avail4_shorlist"  name="avail[]" value="1 month" />
                                                    <label for="avail4_shorlist"><span></span>1 month</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail5_shorlist"  name="avail[]" value="2 months" />
                                                    <label for="avail5_shorlist"><span></span>2 months</label>
                                                </li>
  <!--                                               <li>
                                                    <input type="checkbox" id="avail6_hired"  name="avail[]" value="Specific date" />
                                                    <label for="avail6_hired"><span></span>Specific date</label>
                                                </li> -->
                                            </ul>
                                        </div>
                                </div>  </div>
                    <div class="col-md-8"> 
                    <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Years Of Experience</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="yearofexperience_shorlist">
                                            <ul class="careerfy-checkbox">
                                          
                                                <li>
                                                    <input type="checkbox" id="g2yoe_shorlist"  name="yoe[]" value="5-10" />
                                                    <label for="g2yoe_shorlist"><span></span>5-10</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="g3yoe_shorlist"  name="yoe[]" value="11-15" />
                                                    <label for="g3yoe_shorlist"><span></span>11-15</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g4yoe_shorlist"  name="yoe[]" value="16-20" />
                                                    <label for="g4yoe_shorlist"><span></span>16-20</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g5yoe_shorlist"  name="yoe[]" value="20 Above" />
                                                    <label for="g5yoe_shorlist"><span></span>20 Above</label>
                                                </li>
                                            </ul>
                                        </div>
                                </div> </div> 
                </div> 
                </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-8">                                <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Age</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="age_shorlist">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="rag1_shorlist" name="ag" value="18-25" />
                                                    <label for="rag1_shorlist"><span></span>18-25</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="rag2_shorlist" name="ag" value="26-30" />
                                                    <label for="rag2_shorlist"><span></span>26-30</label>
                                                </li>
                                                    <li>
                                                    <input type="checkbox" id="rag3_shorlist" name="ag" value="31-35" />
                                                    <label for="rag3_shorlist"><span></span>31-35</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="rag4_shorlist" name="ag" value="36-40" />
                                                    <label for="rag4_shorlist"><span></span>36-40</label>
                                                </li>
                                                     <li>
                                                    <input type="checkbox" id="rag5_shorlist" name="ag" value="41-45" />
                                                    <label for="rag5_shorlist"><span></span>41-45</label>
                                                </li> 
                                                <li>
                                                    <input type="checkbox" id="rag6_shorlist" name="ag" value="46-50" />
                                                    <label for="rag6_shorlist"><span></span>46-50</label>
                                                </li> 
                                                <li>
                                                    <input type="checkbox" id="rag7_shorlist" name="ag" value="51 Above" />
                                                    <label for="rag7_shorlist"><span></span>51 Above</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> </div>
                            <div class="col-md-8">                                
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Qualification</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div"  >
                                             <div id="qualify_shorlist">

                                            <ul class="careerfy-checkbox">
                                             @foreach($educationallevels as $educational_level)
                                                    <li>
                                         <input type="checkbox" id="qu_{{$educational_level->id}}_shorlist" name="qu[]" value="{{$educational_level->id}}" />
                                                    <label for="qu_{{$educational_level->id}}_shorlist"><span></span>{{$educational_level->name}}</label>
                                                </li>
                                                @endforeach
                                        
                                                 </ul>
                                                 </div>
                                        </div>
                                    </div> </div>
     
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-8"> 
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Employement Terms</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="job_terms_shorlist">
                                            <ul class="careerfy-checkbox">
                                  @foreach($employement_terms as $employement_term)
                                                <li>
                                   <input type="checkbox" id="jr{{$employement_term->id}}_shorlist" name="job[]" value="{{$employement_term->id}}" />
                                                    <label for="jr{{$employement_term->id}}_shorlist"><span></span>{{$employement_term->name}}</label>
                                                    <small>4</small>
                                                </li>
                                @endforeach
                                          
                                            </ul>
                                        </div>
                                    </div></div>
                            
                        </div> 
                    </div>
            
            </div>
        </div>
          </div> 
                                                <div class="tab-content" id="shortlist_me">
                                                 @if(!$shortlisted_list->isEmpty())
                                                         <?php $reviewb = 0; ?>
                                                @forelse($shortlisted_list as $shortlisted)
                                                
                                                  @if($reviewb === 0)
                                                 <div class="tab-pane active" id="tab_6_1{{$shortlisted->id}}">
                                                 @else
                                                 <div class="tab-pane fade" id="tab_6_1{{$shortlisted->id}}">
                                                 @endif  

 
 @foreach($documentList as $document)
@if($shortlisted->document_id === $document->id)  
              <div class="col-md-12 cv_content"  >

                    <div id="savedescription{{$shortlisted->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="rejected" name="rejected{{$shortlisted->id}}">
                    <input type="hidden" value="{{$shortlisted->id}}" name="application_id{{$shortlisted->id}}">
                    <input type="hidden" value="{{$shortlisted->user_id}}" name="user_id{{$shortlisted->id}}">
                     <input type="hidden" value="{{$shortlisted->tag_id}}" name="job_id{{$shortlisted->tag_id}}">
                        <i class="icon-plus"></i> REJECT
                    </div>
                                   
                     <div id="in_review{{$shortlisted->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="in_review" name="in_review{{$shortlisted->id}}">
                    <input type="hidden" value="{{$shortlisted->id}}" name="application_id{{$shortlisted->id}}">
                    <input type="hidden" value="{{$shortlisted->user_id}}" name="user_id{{$shortlisted->id}}">
                     <input type="hidden" value="{{$shortlisted->tag_id}}" name="job_id{{$shortlisted->tag_id}}">
                        <i class="icon-plus"></i> IN VIEW
                    </div>
 
                 <div id="shortlist{{$shortlisted->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="in_review" name="shortlist{{$shortlisted->id}}">
                    <input type="hidden" value="{{$shortlisted->id}}" name="application_id{{$shortlisted->id}}">
                    <input type="hidden" value="{{$shortlisted->user_id}}" name="user_id{{$shortlisted->id}}">
                     <input type="hidden" value="{{$shortlisted->tag_id}}" name="job_id{{$shortlisted->tag_id}}">
                        <i class="icon-plus"></i> SHORTLIST
                    </div> 

                  <div id="offered{{$shortlisted->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="offer" name="offer{{$shortlisted->id}}">
                    <input type="hidden" value="{{$shortlisted->id}}" name="application_id{{$shortlisted->id}}">
                    <input type="hidden" value="{{$shortlisted->user_id}}" name="user_id{{$shortlisted->id}}">
                     <input type="hidden" value="{{$shortlisted->tag_id}}" name="job_id{{$shortlisted->tag_id}}">
                        <i class="icon-plus"></i> OFFER
                    </div>
            <div id="hire{{$shortlisted->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="hire" name="hire{{$shortlisted->id}}">
                    <input type="hidden" value="{{$shortlisted->id}}" name="application_id{{$shortlisted->id}}">
                    <input type="hidden" value="{{$shortlisted->user_id}}" name="user_id{{$shortlisted->id}}">
                     <input type="hidden" value="{{$shortlisted->tag_id}}" name="job_id{{$shortlisted->tag_id}}">
                        <i class="icon-plus"></i> HIRE
                    </div>
     
          <div id="toggle{{$shortlisted->id}}" class="btn  mt-ladda-btn mini_header" data-toggle="collapse" data-target="#expand_shortlist" >
                   
                       <i class="careerfy-icon careerfy-sort"></i> Sort
                    </div>
      

                                </div>
                                  <div class="space">&nbsp;</div> 
                                  <div id="emalForm">
  <button type="button" class="btn blue mt-ladda-btn ladda-button btn-outline" data-toggle="collapse" data-target="#{{$shortlisted->id}}"><i class="careerfy-icon careerfy-envelope" ></i>Send Email</button>
            <div class="space">&nbsp;</div> 
              <div class="lds-ripplee{{$shortlisted->user_id}}" style="display: none;"><div></div><div></div></div>
                              <div id="info{{$shortlisted->user_id}}"></div>
<div id="emailsent{{$shortlisted->user_id}}"></div>
  <div id="{{$shortlisted->id}}" class="collapse">
     <div class="col-md-7">
        <div class="row" id="sendEmailStatus{{$shortlisted->user_id}}">
        
 {!! Form::model($shortlisted, ['files' => true]) !!}
  {{ csrf_field() }}
<div class="space"></div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-body settings-block">
 <div class="space">&nbsp;</div> 
   <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            {!! Form::label('title', 'Subject') !!}  
            <input type="text" name="title{{$shortlisted->user_id}}" required="required" class="form-control">
            <input type="hidden" name="email_address{{$shortlisted->user_id}}" value="{{$shortlisted->email}}">
            <input type="hidden" name="name{{$shortlisted->user_id}}" value="{{$shortlisted->candidates_name}}">
            <small class="text-danger">{{ $errors->first('title') }}</small>
          </div>
 <div class="space">&nbsp;</div> 
          <div class="form-group{{ $errors->has('body_of_email') ? ' has-error' : '' }}">
            {!! Form::label('body_of_email', 'Email') !!}
         <textarea name="body_of_email{{$shortlisted->user_id}}" class="form-control" required="required"></textarea> 
            <small class="text-danger">{{ $errors->first('body_of_email') }}</small>
          </div>
    <div class="space">&nbsp;</div>  
    <button class="btn blue mt-ladda-btn ladda-button btn-outline btn-block" id="sendEmail{{$shortlisted->user_id}}">Send Email</button>
     
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}   
        
        </div>
      </div>
  </div>
  </div>

   <div class="space">&nbsp;</div>
<div class="col-md-12 cv_content">  
<div class="" id="user_profile"> 
 <div class="pageactionIn">
 <div class="title4">
<div class="user_name"> <h4 class="highlightable">{{$document->candidates_name}}</h4> </div>  
                                        
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Age</span>

<span class="detail highlightable"><strong>{{$document->age}}</strong></span>

</div>

 <div class="overviewtitle2">
<span class="ovtitle">Date of Birth</span>
<span class="detail highlightable"><strong>{{ date('M d, Y', strtotime($document->date_of_birth)) }}  </strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Gender</span>
<span class="detail highlightable"><strong> {{$document->gender}} </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Nationality</span>
<span class="detail highlightable"><strong> @foreach($countries as $country)  @if($country->code === $shortlisted->nationality) {{$country->name_en}} @endif @endforeach </strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Location</span>
<span class="detail highlightable"><strong>  {{$shortlisted->city_id}}</strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Email</span>
<span class="detail highlightable"><strong>{{$document->email}}</strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Willing to relocate:</span>
<span class="detail highlightable"><strong>{{$shortlisted->relocate_nationaly}} </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Educational Level:</span>
<span class="detail highlightable"><strong>       
@foreach($educationallevels as $educational_level)
                                      @if($educational_level->id === $document->educational_level)
                                                    {{$educational_level->name}} 
                                             @endif
                                                @endforeach </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Employment Terms:</span>
<span class="detail highlightable"><strong> @foreach($employement_terms as $employement_term) @if($employement_term->id == $shortlisted->d_employment_term) {{$employement_term->name}} @endif @endforeach</strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Career Level:</span>
<span class="detail highlightable"><strong> @foreach($jobcareer_levels as $job_career_level) @if($job_career_level->id == $document->career_level) {{$job_career_level->name}}  @endif @endforeach{{$shortlisted->career_level}} </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle"> Minimum Salary:</span>
<span class="detail highlightable"><strong>{{$shortlisted->minimum_salary}} / Year</strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Availability:</span>
<span class="detail highlightable"><strong> {{$shortlisted->availability}}</strong></span>
</div> 
 </div> 
</div>
</div>
@endif
@endforeach



<div class="space">&nbsp;</div>
 
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="education_topsection">
<div class="title4">
<p class="editov2"> </p>
 
<h4>Career Objective / Summary</h4>
@foreach($careerlist as $career)
@if($career->resume_id === $shortlisted->resume_id)
{{ $career->summary }}
@endif
@endforeach
 
 </div>
</div>
</div>
<div class="space">&nbsp;</div>

<div class="col-md-12 cv_content">
<div class="pageactionIn" id="education_topsection"> 
<div class="title4">
<h4><i class="careerfy-icon careerfy-design-skills"></i>Specialties and Skills</h4>
</div>
 
<div class="skills_inner">
@foreach($jobskills as $jobskill)
@if($jobskill->resumeid === $shortlisted->resume_id)
 
 <span class="jellybean">{{$jobskill->job_skill}}</span> 
@endif
@endforeach

</div>
</div> </div>
<div class="space">&nbsp;</div>
 

<div class="col-md-12 cv_content">
<div class="pageactionIn" id="education_topsection">
<div class="title4">
<h4> <i class="careerfy-icon careerfy-mortarboard"></i>Educational History </h4>
</div>
@foreach($educationaList as $educational)
@if($educational->resume_id === $shortlisted->resume_id)
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
 @endif
@endforeach
</div>
</div>
 
<div class="space">&nbsp;</div>
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="work_history_topsection">
<div class="title4">
 
<h4> <i class="careerfy-icon careerfy-social-media"></i>Work History</h4>
</div>
 
@foreach($work_histories as $work_history)
@if($work_history->resumefk === $shortlisted->resume_id)
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
@endif
@endforeach
</div>
</div>
<div class="space">&nbsp;</div>
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="certifications_topsection several2">
<div class="title4">
 
<h4>Certifications</h4>
</div>
@foreach($jobcertifications as $jobcertification)
@if($jobcertification->user_id === $shortlisted->user_id)
<div class="certification_inner several2">
 
<div class="overviewtitle2">
<span class="ovtitle">Certification Name</span>
<span class="highlightable"><strong> {{$jobcertification->name}} </strong></span>
</div>
<div class="overviewtitle2">
<span class="ovtitle">Date Received</span>
<span class="highlightable">{{ date('M, Y', strtotime($jobcertification->date_received)) }}</span>
</div>

</div>
@endif
@endforeach
</div>
</div>

<div class="space">&nbsp;</div>
<div class="col-md-12 cv_content" >
<div class="pageactionIn" id="additional_information_topsection">
<div class="title4">
 
<h4>Personal Information</h4>
</div>
@foreach($person_info_list as $person_info)
@if($person_info->user_id === $shortlisted->user_id)
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
<span class="ovtitle">Personal page</span>
<span class="highlightable"><a class="breakword" href="#" rel="external">{{$person_info->personal_page}}</a></span>
</div>
@endif
@endforeach
</div>
 </div>
 
                                                    </div>
                                                     <?php $reviewb++; ?>
                                                    @empty
                                           <div class="careerfy-employer-confitmation">
<div align="center">   <img src="{{asset('img/NoRecordFound.png')}}" height="300" width="300" alt="" align="center"></div>
<div class="clearfix"></div>
</div>
                                                    @endforelse

                                                    @else
                                           <div class="careerfy-employer-confitmation">
<div align="center">   <img src="{{asset('img/NoRecordFound.png')}}" height="300" width="300" alt="" align="center"></div>
<div class="clearfix"></div>
</div>
                                                    @endif
                                                </div>
                                            </div>

                                </div> 

   <div class="tab-pane" id="tab_14">  
   <aside class="careerfy-column-4"> 
<div class="careerfy-typo-wrap">
<form class="careerfy-search-filter"> 
<div class="careerfy-candidate careerfy-candidate-default">
<div class="careerfy-search-filter-wrap careerfy-without-toggle">
<div >
<div id="" data-toggle="collapse" data-target="#expand_offered"> 
<i class="careerfy-icon careerfy-sort"></i>  <h2>Filter Offered</h2>
</div>
</div></div>

<ul class="careerfy-row nav-tabs tabs-left" id="offered_section">
<!-- <ul> -->
 @if(!$offered_list->isEmpty())
 
@forelse($offered_list as $offered_applicant)
   
<li class="careerfy-column-12"> 
      <a href="#tab_6_1{{$offered_applicant->id}}" data-toggle="tab"> 
        <?php $record = \App\RecruitProfilePix::where('status', 1)->where('user_id', $offered_applicant->user_id)->orderBy('created_at', 'DESC')->first(); ?>
                                            <div class="careerfy-candidate-default-wrap"> 
                                                <figure>@if($record) <img src="/uploads/avatars/{{ $record->pic }}" alt=""> @else
                                                    <img src="/uploads/avatars/{{ $user->avatar }}" alt="">
                                                    @endif
                                                </figure> 
                                                <div class="careerfy-candidate-default-text">
                                                    <div class="careerfy-candidate-default-left">
                                                        <h2>
                            @foreach($documentList as $document) @if($offered_applicant->document_id === $document->id) {{$document->candidates_name}} @endif @endforeach  <i class="careerfy-icon careerfy-check-mark"></i></h2>
                                                        <ul class="careerfy-column-12" >

                                                        <!-- to get work experience; get job_id from application table and resume_id, then goto workexperience table and find by resume_id and jpob_id  -->
                                                   
                                                        @foreach($work_experiences as $work_experience)
                                                        @if($work_experience->userfk === $offered_applicant->user_id && $work_experience->present === 1)
                                                            <li>{{$work_experience->position_title}} at <span href="#" class="careerfy-candidate-default-studio">{{$work_experience->company_name}}</span></li>
                                                            @endif
                                                        @endforeach
                                                        </ul>
                                                    </div>
                                              <!-- <a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a> -->
                                                </div>
                                            </div> </a>
                                        </li>

 
@empty
@endforelse

@else
<li class="careerfy-column-12"> No Record(s) Found</li>
@endif
 
                                    </ul>
                                </div> 
                                </form>
 
                            </div>
                        </aside>  


                                            <div class="col-md-8 col-sm-8 col-xs-8">

                                             <div id="expand_offered" class="collapse"> 
  <div class="cscroll_div scroll_div">
            <div class="container ">  
                <div class="row"> 
                    <div class="col-md-8">
                    <div class="col-md-8">   

                         <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Gender</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="gender_offered">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="g1_offered" name="gender[]" value="Male" />
                                                    <label for="g1_offered"><span></span>Male</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g2_offered"  name="gender[]" value="Female" />
                                                    <label for="g2_offered"><span></span> Female</label>
                                                </li>
                                     <!--   <li>
                                                    <input type="checkbox" id="g2"  name="gender" value="All" />
                                                    <label for="g2"><span></span> Both</label>
                                                </li> -->
                                              
                                            </ul>
                                        </div>
                                    </div> </div>
                                             <div class="col-md-8">                                          
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Location</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="location_offered" >
                                            <ul class="careerfy-checkbox">
                                            @foreach($cities as $city) 
                                                <li>
                                                    <input type="checkbox" id="r{{$city->id}}_offered" name="city[]" value="{{$city->id}}" />
                                                    <label for="r{{$city->id}}_offered"><span></span>{{$city->name}}</label>
                                                </li> 
                                            @endforeach 
                                            </ul> 
                                        </div>
                                    </div> </div>

                        <div class="col-md-8">       <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Job Function</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="profession_offered">
                                            <ul class="careerfy-checkbox">
                                               @foreach($professions as $profession)
                                                <li>
                                                    <input type="checkbox" id="r_{{$profession->id}}_offered" name="profession[]" value="{{$profession->id}}" />
                                                    <label for="r_{{$profession->id}}_offered"><span></span>{{$profession->name}}</label>
                                                    <small>10</small>
                                                </li>
                                                @endforeach 
                                            </ul> 
                                        </div>
                                    </div>
                            </div>

                                    <div class="col-md-8">
        <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Career Level</a></h2>
                                        <div class="careerfy-checkbox-toggle croll_div" id="career_level_offered">
                                            <ul class="careerfy-checkbox">
                                  @foreach($jobcareer_levels as $jobcareer_level)
                                                <li>
                                 <input type="checkbox" id="jc{{$jobcareer_level->id}}_offered" name="career_level[]" value="{{$jobcareer_level->id}}" />
                                                    <label for="jc{{$jobcareer_level->id}}_offered"><span></span>{{$jobcareer_level->name}}</label>
                                                    <small>4</small>
                                                </li>
                                @endforeach
                                          
                                            </ul>
                                        </div>
                                    </div>

                                    </div>
                    </div>
                </div>

                <div class="row"> 
                <div class="col-md-8">
                    <div class="col-md-8"> 
                  <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Minimum Salary</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="salary_offered">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="salary1_offered" name="salary[]" value="N50,000-N100,000" />
                                                    <label for="salary1_offered"><span></span>N50,000-N100,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary2_offered" name="salary[]" value="N150,000-N250,000" />
                                                    <label for="salary2_offered"><span></span>N150,000-N250,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary3_offered"  name="salary[]" value="N350,000-N600,000" />
                                                    <label for="salary3_offered"><span></span>N350,000-N600,000</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="salary4_offered"  name="salary[]" value="N750,000-N1,000," />
                                                    <label for="salary4_offered"><span></span>N750,000-N1,000,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary5_offered"  name="salary[]" value="N1,000,000-N5,000,000" />
                                                    <label for="salary5_offered"><span></span>N1,000,000-N5,000,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary6_offered"  name="salary[]" value="N550,000-N10,000,000" />
                                                    <label for="salary6_offered"><span></span>N5,050,000-N10,000,000</label>
                                                </li>
                                                  <li>
                                                    <input type="checkbox" id="salary7_offered"  name="salary[]" value="N10,000,000-N15,000,000" />
                                                    <label for="salary7_offered"><span></span>N10,000,000-N15,000,000</label>
                                                </li>
                                                  <li>
                                                    <input type="checkbox" id="salary8_offered"  name="salary[]" value="N15,000,000-Above" />
                                                    <label for="salary8_offered"><span></span>N15,000,000-Above</label>
                                                </li>

                                            </ul>
                                        </div>
                                </div></div>
                    <div class="col-md-8">                 <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Availability</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="availability_offered">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="avail1_offered" name="avail[]" value="now" />
                                                    <label for="avail1_offered"><span></span>Immediate</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail2_offered" name="avail[]" value="1 week" />
                                                    <label for="avail2_shorlist"><span></span>1 week</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail3_offered"  name="avail[]" value="2 weeks" />
                                                    <label for="avail3_offered"><span></span>2 weeks</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="avail4_offered"  name="avail[]" value="1 month" />
                                                    <label for="avail4_offered"><span></span>1 month</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail5_offered"  name="avail[]" value="2 months" />
                                                    <label for="avail5_offered"><span></span>2 months</label>
                                                </li>
 
                                            </ul>
                                        </div>
                                </div>  </div>
                    <div class="col-md-8"> 
                    <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Years Of Experience</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="yearofexperience_offered">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="g1yoe_offered" name="yoe[]" value="0-5" />
                                                    <label for="g1yoe_offered"><span></span>0-5</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g2yoe_offered"  name="yoe[]" value="6-10" />
                                                    <label for="g2yoe_offered"><span></span>6-10</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="g3yoe_offered"  name="yoe[]" value="11-15" />
                                                    <label for="g3yoe_offered"><span></span>11-15</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g4yoe_offered"  name="yoe[]" value="16-20" />
                                                    <label for="g4yoe_offered"><span></span>16-20</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g5yoe_offered"  name="yoe[]" value="20 Above" />
                                                    <label for="g5yoe_offered"><span></span>20 Above</label>
                                                </li>
                                            </ul>
                                        </div>
                                </div> </div> 
                </div> 
                </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-8">                                <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Age</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="age_shorlist">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="rag1_offered" name="ag" value="18-25" />
                                                    <label for="rag1_offered"><span></span>18-25</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="rag2_offered" name="ag" value="26-30" />
                                                    <label for="rag2_offered"><span></span>26-30</label>
                                                </li>
                                                    <li>
                                                    <input type="checkbox" id="rag3_offered" name="ag" value="31-35" />
                                                    <label for="rag3_offered"><span></span>31-35</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="rag4_offered" name="ag" value="36-40" />
                                                    <label for="rag4_offered"><span></span>36-40</label>
                                                </li>
                                                     <li>
                                                    <input type="checkbox" id="rag5_offered" name="ag" value="41-45" />
                                                    <label for="rag5_offered"><span></span>41-45</label>
                                                </li> 
                                                <li>
                                                    <input type="checkbox" id="rag6_offered" name="ag" value="46-50" />
                                                    <label for="rag6_offered"><span></span>46-50</label>
                                                </li> 
                                                <li>
                                                    <input type="checkbox" id="rag7_shorlist" name="ag" value="51 Above" />
                                                    <label for="rag7_offered"><span></span>51 Above</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> </div>
                            <div class="col-md-8">                                
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Qualification</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div"  >
                                             <div id="qualify_offered">

                                            <ul class="careerfy-checkbox">
                                             @foreach($educationallevels as $educational_level)
                                                    <li>
                                         <input type="checkbox" id="qu_{{$educational_level->id}}_offered" name="qu[]" value="{{$educational_level->id}}" />
                                                    <label for="qu_{{$educational_level->id}}_offered"><span></span>{{$educational_level->name}}</label>
                                                </li>
                                                @endforeach
                                        
                                                 </ul>
                                                 </div>
                                        </div>
                                    </div> </div>
     
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-8"> 
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Employement Terms</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="job_terms_offered">
                                            <ul class="careerfy-checkbox">
                                  @foreach($employement_terms as $employement_term)
                                                <li>
                                   <input type="checkbox" id="jr{{$employement_term->id}}_offered" name="job[]" value="{{$employement_term->id}}" />
                                                    <label for="jr{{$employement_term->id}}_offered"><span></span>{{$employement_term->name}}</label>
                                                    <small>4</small>
                                                </li>
                                @endforeach
                                          
                                            </ul>
                                        </div>
                                    </div></div>
                            
                        </div> 
                    </div>
            
            </div>
        </div>
          </div> 
                                                <div class="tab-content">
                                                 @if(!$offered_list->isEmpty())
                                                         <?php $reviewo = 0; ?>
                                                @forelse($offered_list as $offered_applicant)
                                                
                                                  @if($reviewo === 0)
                                                 <div class="tab-pane active" id="tab_6_1{{$offered_applicant->id}}">
                                                 @else
                                                 <div class="tab-pane" id="tab_6_1{{$offered_applicant->id}}">
                                                 @endif  

 
 @foreach($documentList as $document)
@if($offered_applicant->document_id === $document->id)  
              <div class="col-md-12 cv_content"  >

                    <div id="savedescription{{$offered_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="rejected" name="rejected{{$offered_applicant->id}}">
                    <input type="hidden" value="{{$offered_applicant->id}}" name="application_id{{$offered_applicant->id}}">
                    <input type="hidden" value="{{$offered_applicant->user_id}}" name="user_id{{$offered_applicant->id}}">
                     <input type="hidden" value="{{$offered_applicant->tag_id}}" name="job_id{{$offered_applicant->tag_id}}">
                        <i class="icon-plus"></i> REJECT
                    </div>
                                   
                  <!--    <div id="in_review{{$offered_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="in_review" name="in_review{{$offered_applicant->id}}">
                    <input type="hidden" value="{{$offered_applicant->id}}" name="application_id{{$offered_applicant->id}}">
                    <input type="hidden" value="{{$offered_applicant->user_id}}" name="user_id{{$offered_applicant->id}}">
                     <input type="hidden" value="{{$offered_applicant->tag_id}}" name="job_id{{$offered_applicant->tag_id}}">
                        <i class="icon-plus"></i> KEEP IN VIEW
                    </div> -->
 
             <!--     <div id="shortlist{{$offered_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="in_review" name="shortlist{{$offered_applicant->id}}">
                    <input type="hidden" value="{{$offered_applicant->id}}" name="application_id{{$offered_applicant->id}}">
                    <input type="hidden" value="{{$offered_applicant->user_id}}" name="user_id{{$offered_applicant->id}}">
                     <input type="hidden" value="{{$offered_applicant->tag_id}}" name="job_id{{$offered_applicant->tag_id}}">
                        <i class="icon-plus"></i> SHORTLIST
                    </div>  -->

      <!--             <div id="offered{{$offered_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header"  >
                    <input type="hidden" value="offer" name="offer{{$offered_applicant->id}}">
                    <input type="hidden" value="{{$offered_applicant->id}}" name="application_id{{$offered_applicant->id}}">
                    <input type="hidden" value="{{$offered_applicant->user_id}}" name="user_id{{$offered_applicant->id}}">
                     <input type="hidden" value="{{$offered_applicant->tag_id}}" name="job_id{{$offered_applicant->tag_id}}">
                        <i class="icon-plus"></i> OFFER
                    </div> -->
            <div id="hire{{$offered_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="hire" name="hire{{$offered_applicant->id}}">
                    <input type="hidden" value="{{$offered_applicant->id}}" name="application_id{{$offered_applicant->id}}">
                    <input type="hidden" value="{{$offered_applicant->user_id}}" name="user_id{{$offered_applicant->id}}">
                     <input type="hidden" value="{{$offered_applicant->tag_id}}" name="job_id{{$offered_applicant->tag_id}}">
                        <i class="icon-plus"></i> HIRE
                    </div>
  
        <div id="toggle{{$offered_applicant->id}}" class="btn  mt-ladda-btn mini_header" data-toggle="collapse" data-target="#expand_offered" >
                   
                       <i class="careerfy-icon careerfy-sort"></i> Sort
                    </div>
                                </div>
                                  <div class="space">&nbsp;</div> 
                                  <div id="emalForm">
  <button type="button" class="btn blue mt-ladda-btn ladda-button btn-outline" data-toggle="collapse" data-target="#{{$offered_applicant->id}}"><i class="careerfy-icon careerfy-envelope" ></i>Send Email</button>
            <div class="space">&nbsp;</div> 
      <div class="lds-ripplee{{$offered_applicant->user_id}}" style="display: none;"><div></div><div></div></div>
                              <div id="info{{$offered_applicant->user_id}}"></div>
<div id="emailsent{{$offered_applicant->user_id}}"></div>
  <div id="{{$offered_applicant->id}}" class="collapse">
     <div class="col-md-7">
        <div class="row" id="sendEmailStatus{{$offered_applicant->user_id}}">
        
 {!! Form::model($offered_applicant, [ 'files' => true]) !!}
  {{ csrf_field() }}
<div class="space"></div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-body settings-block">
 <div class="space">&nbsp;</div> 
   <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            {!! Form::label('title', 'Subject') !!}  
            <input type="text" name="title{{$offered_applicant->user_id}}" class="form-control" required="required">
            <input type="hidden" name="email_address{{$offered_applicant->user_id}}" value="{{$offered_applicant->email}}">
            <input type="hidden" name="name{{$offered_applicant->user_id}}" value="{{$offered_applicant->candidates_name}}">
            <small class="text-danger">{{ $errors->first('title') }}</small>
          </div>
 <div class="space">&nbsp;</div> 
          <div class="form-group{{ $errors->has('body_of_email') ? ' has-error' : '' }}">
            {!! Form::label('body_of_email', 'Email') !!}
         <textarea name="body_of_email{{$offered_applicant->user_id}}" class="form-control" required="required"></textarea> 
            <small class="text-danger">{{ $errors->first('body_of_email') }}</small>
          </div>
    <div class="space">&nbsp;</div> 
       <button class="btn blue mt-ladda-btn ladda-button btn-outline btn-block" id="sendEmail{{$offered_applicant->user_id}}">Send Email</button>
  
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}   
        
        </div>
      </div>
  </div>
  </div>

   <div class="space">&nbsp;</div>
<div class="col-md-12 cv_content">  
<div class="" id="user_profile"> 
 <div class="pageactionIn">
 <div class="title4">
<div class="user_name"> <h4 class="highlightable">{{$document->candidates_name}}</h4> </div>  
                                        
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Age</span>

<span class="detail highlightable"><strong>{{$document->age}}</strong></span>

</div>

 <div class="overviewtitle2">
<span class="ovtitle">Date of Birth</span>
<span class="detail highlightable"><strong>{{ date('M d, Y', strtotime($document->date_of_birth)) }}  </strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Gender</span>
<span class="detail highlightable"><strong> {{$document->gender}} </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Nationality</span>
<span class="detail highlightable"><strong> @foreach($countries as $country)  @if($country->code === $offered_applicant->nationality) {{$country->name_en}} @endif @endforeach </strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Location</span>
<span class="detail highlightable"><strong>  {{$offered_applicant->city_id}}</strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Email</span>
<span class="detail highlightable"><strong>{{$document->email}}</strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Willing to relocate:</span>
<span class="detail highlightable"><strong>{{$offered_applicant->relocate_nationaly}} </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Educational Level:</span>
<span class="detail highlightable"><strong>       
@foreach($educationallevels as $educational_level)
                                      @if($educational_level->id === $document->educational_level)
                                                    {{$educational_level->name}} 
                                             @endif
                                                @endforeach </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Employment Terms:</span>
<span class="detail highlightable"><strong> @foreach($employement_terms as $employement_term) @if($employement_term->id == $offered_applicant->d_employment_term) {{$employement_term->name}} @endif @endforeach</strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Career Level:</span>
<span class="detail highlightable"><strong> @foreach($jobcareer_levels as $job_career_level) @if($job_career_level->id == $document->career_level) {{$job_career_level->name}}  @endif @endforeach{{$offered_applicant->career_level}} </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle"> Minimum Salary:</span>
<span class="detail highlightable"><strong>{{$offered_applicant->minimum_salary}} / Year</strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Availability:</span>
<span class="detail highlightable"><strong> {{$offered_applicant->availability}}</strong></span>
</div> 
 </div> 
</div>
</div>
@endif
@endforeach



<div class="space">&nbsp;</div>
 
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="education_topsection">
<div class="title4">
<p class="editov2"> </p>
 
<h4>Career Objective / Summary</h4>
@foreach($careerlist as $career)
@if($career->resume_id === $offered_applicant->resume_id)
{{ $career->summary }}
@endif
@endforeach
 
 </div>
</div>
</div>
<div class="space">&nbsp;</div>

<div class="col-md-12 cv_content">
<div class="pageactionIn" id="education_topsection"> 
<div class="title4">
<h4><i class="careerfy-icon careerfy-design-skills"></i>Specialties and Skills</h4>
</div>
 
<div class="skills_inner">
@foreach($jobskills as $jobskill)
@if($jobskill->resumeid === $offered_applicant->resume_id)
 
 <span class="jellybean">{{$jobskill->job_skill}}</span> 
@endif
@endforeach

</div>
</div> </div>
<div class="space">&nbsp;</div>
 

<div class="col-md-12 cv_content">
<div class="pageactionIn" id="education_topsection">
<div class="title4">
<h4> <i class="careerfy-icon careerfy-mortarboard"></i>Educational History </h4>
</div>
@foreach($educationaList as $educational)
@if($educational->resume_id === $offered_applicant->resume_id)
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
 @endif
@endforeach
</div>
</div>
 
<div class="space">&nbsp;</div>
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="work_history_topsection">
<div class="title4">
 
<h4> <i class="careerfy-icon careerfy-social-media"></i>Work History</h4>
</div>
 
@foreach($work_histories as $work_history)
@if($work_history->resumefk === $offered_applicant->resume_id)
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
@endif
@endforeach
</div>
</div>
<div class="space">&nbsp;</div>
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="certifications_topsection several2">
<div class="title4">
 
<h4>Certifications</h4>
</div>
@foreach($jobcertifications as $jobcertification)
@if($jobcertification->user_id === $offered_applicant->user_id)
<div class="certification_inner several2">
 
<div class="overviewtitle2">
<span class="ovtitle">Certification Name</span>
<span class="highlightable"><strong> {{$jobcertification->name}} </strong></span>
</div>
<div class="overviewtitle2">
<span class="ovtitle">Date Received</span>
<span class="highlightable">{{ date('M, Y', strtotime($jobcertification->date_received)) }}</span>
</div>

</div>
@endif
@endforeach
</div>
</div>

<div class="space">&nbsp;</div>
<div class="col-md-12 cv_content" >
<div class="pageactionIn" id="additional_information_topsection">
<div class="title4">
 
<h4>Personal Information</h4>
</div>
@foreach($person_info_list as $person_info)
@if($person_info->user_id === $offered_applicant->user_id)
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
<span class="ovtitle">Personal page</span>
<span class="highlightable"><a class="breakword" href="#" rel="external">{{$person_info->personal_page}}</a></span>
</div>
@endif
@endforeach
</div>
 </div>
 
                                                    </div>
                                                     <?php $reviewo++; ?>
                                                    @empty
                                           <div class="careerfy-employer-confitmation">
<div align="center">   <img src="{{asset('img/NoRecordFound.png')}}" height="300" width="300" alt="" align="center"></div>
<div class="clearfix"></div>
</div>
                                                    @endforelse

                                                    @else
                                           <div class="careerfy-employer-confitmation">
<div align="center">   <img src="{{asset('img/NoRecordFound.png')}}" height="300" width="300" alt="" align="center"></div>
<div class="clearfix"></div>
</div>
                                                    @endif
                                                </div>
                                            </div>

                                </div>



 <div class="tab-pane" id="tab_15">  
   <aside class="careerfy-column-4"> 
<div class="careerfy-typo-wrap">
<form class="careerfy-search-filter"> 

<div class="careerfy-search-filter-wrap careerfy-without-toggle">
<div >
<div id="" data-toggle="collapse" data-target="#expand_hired"> 
<i class="careerfy-icon careerfy-sort"></i>  <h2>Filter Hired</h2>
</div>
</div></div>
<div class="careerfy-candidate careerfy-candidate-default">
<ul class="careerfy-row nav-tabs tabs-left" id="hire_section">
<!-- <ul> -->
 @if(!$hired_list->isEmpty())
 <?php $reviewcf = 0; ?>
@forelse($hired_list as $hired_applicant)
   
<li class="careerfy-column-12">
 @if($reviewcf === 0)
      <a href="#tab_6_1{{$hired_applicant->id}}" data-toggle="tab">
                                                 @else
 <a href="#tab_6_1{{$hired_applicant->id}}" data-toggle="tab">
                                                 @endif 
                   <?php $record = \App\RecruitProfilePix::where('status', 1)->where('user_id', $hired_applicant->user_id)->orderBy('created_at', 'DESC')->first(); ?>
                                            <div class="careerfy-candidate-default-wrap"> 
                                                <figure>

                                                 @if($record)<img src="/uploads/avatars/{{ $record->pix }}" alt="">@else  
                                                    @endif
                                                </figure> 
                                                <div class="careerfy-candidate-default-text">
                                                    <div class="careerfy-candidate-default-left">
                                                        <h2>
                            @foreach($documentList as $document) @if($hired_applicant->document_id === $document->id) {{$document->candidates_name}} @endif @endforeach  <i class="careerfy-icon careerfy-check-mark"></i></h2>
                                                        <ul class="careerfy-column-12" >

                                                        <!-- to get work experience; get job_id from application table and resume_id, then goto workexperience table and find by resume_id and jpob_id  -->
                                                   
                                                        @foreach($work_experiences as $work_experience)
                                                        @if($work_experience->userfk === $hired_applicant->user_id && $work_experience->present === 1)
                                                            <li>{{$work_experience->position_title}} at <span href="#" class="careerfy-candidate-default-studio">{{$work_experience->company_name}}</span></li>
                                                            @endif
                                                        @endforeach
                                                        </ul>
                                                    </div>
                                              <!--       <a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a> -->
                                                </div>
                                            </div> </a>
                                        </li>

 <?php $reviewcf++; ?>
@empty
@endforelse

@else
<li class="careerfy-column-12"> No Record(s) Found</li>
@endif
 
                                    </ul>
                                </div> 
                                </form>
 
                            </div>
                        </aside>  

                                            <div class="col-md-8 col-sm-8 col-xs-8">
                                                 <div id="expand_hired" class="collapse"> 
  <div class="cscroll_div scroll_div" >
            <div class="container "> 
            
                <div class="row"> 
                    <div class="col-md-8">
                    <div class="col-md-8">   

                         <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Gender</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="gender_hired">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="g1hired" name="gender_hired[]" value="Male" />
                                                    <label for="g1hired"><span></span>Male</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g2hired"  name="gender_hired[]" value="Female" />
                                                    <label for="g2hired"><span></span> Female</label>
                                                </li>
                                     <!--            <li>
                                                    <input type="checkbox" id="g2"  name="gender" value="All" />
                                                    <label for="g2"><span></span> Both</label>
                                                </li> -->
                                              
                                            </ul>
                                        </div>
                                    </div> </div>
                                                           <div class="col-md-8">                                          
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Location</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="location_hired" >
                                            <ul class="careerfy-checkbox">
                                            @foreach($cities as $city) 
                                                <li>
                                                    <input type="checkbox" id="r{{$city->id}}_hired" name="city[]" value="{{$city->id}}" />
                                                    <label for="r{{$city->id}}_hired"><span></span>{{$city->name}}</label>
                                                </li> 
                                            @endforeach 
                                            </ul> 
                                        </div>
                                    </div> </div>

                        <div class="col-md-8">       <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Job Function</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="profession_hired">
                                            <ul class="careerfy-checkbox">
                                               @foreach($professions as $profession)
                                                <li>
                                                    <input type="checkbox" id="r_{{$profession->id}}_hired" name="profession[]" value="{{$profession->id}}" />
                                                    <label for="r_{{$profession->id}}_hired"><span></span>{{$profession->name}}</label>
                                                    <small>10</small>
                                                </li>
                                                @endforeach 
                                            </ul> 
                                        </div>
                                    </div>
                            </div>

                                    <div class="col-md-8">
        <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Career Level</a></h2>
                                        <div class="careerfy-checkbox-toggle croll_div" id="career_level_hired">
                                            <ul class="careerfy-checkbox">
                                  @foreach($jobcareer_levels as $jobcareer_level)
                                                <li>
                                 <input type="checkbox" id="jc{{$jobcareer_level->id}}_hired" name="career_level[]" value="{{$jobcareer_level->id}}" />
                                                    <label for="jc{{$jobcareer_level->id}}_hired"><span></span>{{$jobcareer_level->name}}</label>
                                                    <small>4</small>
                                                </li>
                                @endforeach
                                          
                                            </ul>
                                        </div>
                                    </div>

                                    </div>
                    </div>
                </div>

                <div class="row"> 
                <div class="col-md-8">
                    <div class="col-md-8"> 
                  <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Minimum Salary</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="salary_hired">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="salary1_hired" name="salary[]" value="N50,000-N100,000" />
                                                    <label for="salary1_hired"><span></span>N50,000-N100,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary2_hired" name="salary[]" value="N150,000-N250,000" />
                                                    <label for="salary2_hired"><span></span>N150,000-N250,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary3_hired"  name="salary[]" value="N350,000-N600,000" />
                                                    <label for="salary3_hired"><span></span>N350,000-N600,000</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="salary4_hired"  name="salary[]" value="N750,000-N1,000," />
                                                    <label for="salary4_hired"><span></span>N750,000-N1,000,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary5_hired"  name="salary[]" value="N1,000,000-N5,000,000" />
                                                    <label for="salary5_hired"><span></span>N1,000,000-N5,000,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary6_hired"  name="salary[]" value="N550,000-N10,000,000" />
                                                    <label for="salary6_hired"><span></span>N5,050,000-N10,000,000</label>
                                                </li>
                                                  <li>
                                                    <input type="checkbox" id="salary7_hired"  name="salary[]" value="N10,000,000-N15,000,000" />
                                                    <label for="salary7_hired"><span></span>N10,000,000-N15,000,000</label>
                                                </li>
                                                  <li>
                                                    <input type="checkbox" id="salary8_hired"  name="salary[]" value="N15,000,000-Above" />
                                                    <label for="salary8_hired"><span></span>N15,000,000-Above</label>
                                                </li>

                                            </ul>
                                        </div>
                                </div></div>
                    <div class="col-md-8">                 <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Availability</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="availability_hired">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="avail1_hired" name="avail[]" value="now" />
                                                    <label for="avail1_hired"><span></span>Immediate</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail2_hired" name="avail[]" value="1 week" />
                                                    <label for="avail2_hired"><span></span>1 week</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail3_hired"  name="avail[]" value="2 weeks" />
                                                    <label for="avail3_hired"><span></span>2 weeks</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="avail4_hired"  name="avail[]" value="1 month" />
                                                    <label for="avail4_hired"><span></span>1 month</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail5_hired"  name="avail[]" value="2 months" />
                                                    <label for="avail5_hired"><span></span>2 months</label>
                                                </li>
  <!--                                               <li>
                                                    <input type="checkbox" id="avail6_hired"  name="avail[]" value="Specific date" />
                                                    <label for="avail6_hired"><span></span>Specific date</label>
                                                </li> -->
                                            </ul>
                                        </div>
                                </div>  </div>
                    <div class="col-md-8"> 
                    <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Years Of Experience</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="yearofexperience_hired">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="g1yoe_hired" name="yoe[]" value="0-5" />
                                                    <label for="g1yoe_hired"><span></span>0-5</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g2yoe_hired"  name="yoe[]" value="6-10" />
                                                    <label for="g2yoe_hired"><span></span>6-10</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="g3yoe_hired"  name="yoe[]" value="11-15" />
                                                    <label for="g3yoe_hired"><span></span>11-15</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g4yoe_hired"  name="yoe[]" value="16-20" />
                                                    <label for="g4yoe_hired"><span></span>16-20</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g5yoe_hired"  name="yoe[]" value="20 Above" />
                                                    <label for="g5yoe_hired"><span></span>20 Above</label>
                                                </li>
                                            </ul>
                                        </div>
                                </div> </div> 
                </div> 
                </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-8">                                <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Age</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="age_hired">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="rag1_hired" name="ag" value="18-25" />
                                                    <label for="rag1_hired"><span></span>18-25</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="rag2_hired" name="ag" value="26-30" />
                                                    <label for="rag2_hired"><span></span>26-30</label>
                                                </li>
                                                    <li>
                                                    <input type="checkbox" id="rag3_hired" name="ag" value="31-35" />
                                                    <label for="rag3_hired"><span></span>31-35</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="rag4_hired" name="ag" value="36-40" />
                                                    <label for="rag4_hired"><span></span>36-40</label>
                                                </li>
                                                     <li>
                                                    <input type="checkbox" id="rag5_hired" name="ag" value="41-45" />
                                                    <label for="rag5_hired"><span></span>41-45</label>
                                                </li> 
                                                <li>
                                                    <input type="checkbox" id="rag6_hired" name="ag" value="46-50" />
                                                    <label for="rag6_hired"><span></span>46-50</label>
                                                </li> 
                                                <li>
                                                    <input type="checkbox" id="rag7_hired" name="ag" value="51 Above" />
                                                    <label for="rag7_hired"><span></span>51 Above</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> </div>
                            <div class="col-md-8">                                
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Qualification</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div"  >
                                        <div id="qualify_hired">
                                        <ul class="careerfy-checkbox">
                                   
                                             @foreach($educationallevels as $educational_level)
                                                    <li>
                                         <input type="checkbox" id="qu_{{$educational_level->id}}" name="qu[]" value="{{$educational_level->id}}" />
                                                    <label for="qu_{{$educational_level->id}}"><span></span>{{$educational_level->name}}</label>
                                                </li>
                                                @endforeach
                                        
                                                 </ul>
                                 

 
                                                 </div>
                                        </div>
                                    </div> </div>
     
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-8"> 
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Employement Terms</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="job_terms_hired">
                                            <ul class="careerfy-checkbox">
                                  @foreach($employement_terms as $employement_term)
                                                <li>
                                   <input type="checkbox" id="jr{{$employement_term->id}}_hired" name="job[]" value="{{$employement_term->id}}" />
                                                    <label for="jr{{$employement_term->id}}_hired"><span></span>{{$employement_term->name}}</label>
                                                    <small>4</small>
                                                </li>
                                @endforeach
                                          
                                            </ul>
                                        </div>
                                    </div></div>
                            
                        </div>


                    </div>
            
            </div>
        </div>
          </div> 

                                                <div class="tab-content"  id="resume_body">
                                                 @if(!$hired_list->isEmpty())
                                                         <?php $reviewo = 0; ?>
                                                @forelse($hired_list as $hired_applicant)
                                                
                                                  @if($reviewo === 0)
                                                 <div class="tab-pane active" id="tab_6_1{{$hired_applicant->id}}">
                                                 @else
                                                 <div class="tab-pane fade" id="tab_6_1{{$hired_applicant->id}}">
                                                 @endif  

 

              <div class="col-md-12 cv_content"  >

    <!--                 <div id="savedescription{{$hired_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="rejected" name="rejected{{$hired_applicant->id}}">
                    <input type="hidden" value="{{$hired_applicant->id}}" name="application_id{{$hired_applicant->id}}">
                    <input type="hidden" value="{{$hired_applicant->user_id}}" name="user_id{{$hired_applicant->id}}">
                     <input type="hidden" value="{{$hired_applicant->tag_id}}" name="job_id{{$hired_applicant->tag_id}}">
                        <i class="icon-plus"></i> REJECT
                    </div> -->
                                   
<!--                      <div id="in_review{{$hired_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="in_review" name="in_review{{$hired_applicant->id}}">
                    <input type="hidden" value="{{$hired_applicant->id}}" name="application_id{{$hired_applicant->id}}">
                    <input type="hidden" value="{{$hired_applicant->user_id}}" name="user_id{{$hired_applicant->id}}">
                     <input type="hidden" value="{{$hired_applicant->tag_id}}" name="job_id{{$hired_applicant->tag_id}}">
                        <i class="icon-plus"></i> kEEP IN VIEW
                    </div> -->
 
       <!--           <div id="shortlist{{$hired_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="in_review" name="shortlist{{$hired_applicant->id}}">
                    <input type="hidden" value="{{$hired_applicant->id}}" name="application_id{{$hired_applicant->id}}">
                    <input type="hidden" value="{{$hired_applicant->user_id}}" name="user_id{{$hired_applicant->id}}">
                     <input type="hidden" value="{{$hired_applicant->tag_id}}" name="job_id{{$hired_applicant->tag_id}}">
                        <i class="icon-plus"></i> SHORTLIST
                    </div>  -->

             <!--      <div id="offered{{$hired_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="offer" name="offer{{$hired_applicant->id}}">
                    <input type="hidden" value="{{$hired_applicant->id}}" name="application_id{{$hired_applicant->id}}">
                    <input type="hidden" value="{{$hired_applicant->user_id}}" name="user_id{{$hired_applicant->id}}">
                     <input type="hidden" value="{{$hired_applicant->tag_id}}" name="job_id{{$hired_applicant->tag_id}}">
                        <i class="icon-plus"></i> OFFER
                    </div> -->
<!--             <div id="hire{{$hired_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <input type="hidden" value="hire" name="hire{{$hired_applicant->id}}">
                    <input type="hidden" value="{{$hired_applicant->id}}" name="application_id{{$hired_applicant->id}}">
                    <input type="hidden" value="{{$hired_applicant->user_id}}" name="user_id{{$hired_applicant->id}}">
                     <input type="hidden" value="{{$hired_applicant->tag_id}}" name="job_id{{$hired_applicant->tag_id}}">
                        <i class="icon-plus"></i> HIRE
                    </div> -->

                    <div id="toggle{{$hired_applicant->id}}" class="btn  mt-ladda-btn mini_header" data-toggle="collapse" data-target="#expand_hired" >
                   
                       <i class="careerfy-icon careerfy-sort"></i> Sort
                    </div>
                     <div class="space">&nbsp;</div> 
 

                                </div>



                                  <div class="space">&nbsp;</div> 
                                  <div id="emalForm">
  <button type="button" class="btn blue mt-ladda-btn ladda-button btn-outline" data-toggle="collapse" data-target="#{{$hired_applicant->id}}"><i class="careerfy-icon careerfy-envelope" ></i>Send Email</button>
            <div class="space">&nbsp;</div> 
      <div class="lds-ripplee{{$hired_applicant->user_id}}" style="display: none;"><div></div><div></div></div>
                              <div id="info{{$hired_applicant->user_id}}"></div>
<div id="emailsent{{$hired_applicant->user_id}}"></div>
  <div id="{{$hired_applicant->id}}" class="collapse">
     <div class="col-md-7">
        <div class="row" id="sendEmailStatus{{$hired_applicant->user_id}}">
        
        
 {!! Form::model($hired_applicant, [ 'files' => true]) !!}
  {{ csrf_field() }}
<div class="space"></div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-body settings-block">
 <div class="space">&nbsp;</div> 
   <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            {!! Form::label('title', 'Subject') !!}  
            <input type="text" name="title{{$hired_applicant->user_id}}"  class="form-control">
            <input type="hidden" name="email_address{{$hired_applicant->user_id}}" value="{{$hired_applicant->email}}">
            <input type="hidden" name="name{{$hired_applicant->user_id}}" value="{{$hired_applicant->candidates_name}}">
            <small class="text-danger">{{ $errors->first('title') }}</small>
          </div>
 <div class="space">&nbsp;</div> 
          <div class="form-group{{ $errors->has('body_of_email') ? ' has-error' : '' }}">
            {!! Form::label('body_of_email', 'Email') !!}
          
            <textarea class="form-control" name="body_of_email{{$hired_applicant->user_id}}"> </textarea>
            <small class="text-danger">{{ $errors->first('body_of_email') }}</small>
          </div>
    <div class="space">&nbsp;</div> 
    <button class="btn blue mt-ladda-btn ladda-button btn-outline btn-block" id="sendEmail{{$hired_applicant->user_id}}">Send Email</button>

        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}   
        
        </div>
      </div>
  </div>
  </div>

   @foreach($documentList as $document)

@if($hired_applicant->document_id === $document->id)  

   <div class="space">&nbsp;</div>
<div class="col-md-12 cv_content">  
<div class="" id="user_profile"> 
 <div class="pageactionIn">
 <div class="title4">
<div class="user_name"> <h4 class="highlightable">{{$document->candidates_name}}</h4> </div>  
                                        
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Age</span>

<span class="detail highlightable"><strong>{{$document->age}}</strong></span>

</div>

 <div class="overviewtitle2">
<span class="ovtitle">Date of Birth</span>
<span class="detail highlightable"><strong>{{ date('M d, Y', strtotime($document->date_of_birth)) }}  </strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Gender</span>
<span class="detail highlightable"><strong> {{$document->gender}} </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Nationality</span>
<span class="detail highlightable"><strong> @foreach($countries as $country)  @if($country->code === $hired_applicant->nationality) {{$country->name_en}} @endif @endforeach </strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Location</span>
<span class="detail highlightable"><strong>  {{$hired_applicant->city_id}}</strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Email</span>
<span class="detail highlightable"><strong>{{$document->email}}</strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Willing to relocate:</span>
<span class="detail highlightable"><strong>{{$hired_applicant->relocate_nationaly}} </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Educational Level:</span>
<span class="detail highlightable"><strong>       
@foreach($educationallevels as $educational_level)
                                      @if($educational_level->id === $document->educational_level)
                                                    {{$educational_level->name}} 
                                             @endif
                                                @endforeach </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Employment Terms:</span>
<span class="detail highlightable"><strong> @foreach($employement_terms as $employement_term) @if($employement_term->id == $hired_applicant->d_employment_term) {{$employement_term->name}} @endif @endforeach</strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Career Level:</span>
<span class="detail highlightable"><strong> @foreach($jobcareer_levels as $job_career_level) @if($job_career_level->id == $document->career_level) {{$job_career_level->name}}  @endif @endforeach{{$hired_applicant->career_level}} </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle"> Minimum Salary:</span>
<span class="detail highlightable"><strong>{{$hired_applicant->minimum_salary}} / Year</strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Availability:</span>
<span class="detail highlightable"><strong> {{$hired_applicant->availability}}</strong></span>
</div> 
 </div> 
</div>
</div>
@endif
@endforeach



<div class="space">&nbsp;</div>
 
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="education_topsection">
<div class="title4">
<p class="editov2"> </p>
 
<h4>Career Objective / Summary</h4>
@foreach($careerlist as $career)
@if($career->resume_id === $hired_applicant->resume_id)
{{ $career->summary }}
@endif
@endforeach
 
 </div>
</div>
</div>
<div class="space">&nbsp;</div>

<div class="col-md-12 cv_content">
<div class="pageactionIn" id="education_topsection"> 
<div class="title4">
<h4><i class="careerfy-icon careerfy-design-skills"></i>Specialties and Skills</h4>
</div>
 
<div class="skills_inner">
@foreach($jobskills as $jobskill)
@if($jobskill->resumeid === $hired_applicant->resume_id)
 
 <span class="jellybean">{{$jobskill->job_skill}}</span> 
@endif
@endforeach

</div>
</div> </div>
<div class="space">&nbsp;</div>
 

<div class="col-md-12 cv_content">
<div class="pageactionIn" id="education_topsection">
<div class="title4">
<h4> <i class="careerfy-icon careerfy-mortarboard"></i>Educational History </h4>
</div>
@foreach($educationaList as $educational)
@if($educational->resume_id === $hired_applicant->resume_id)
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
 @endif
@endforeach
</div>
</div>
 
<div class="space">&nbsp;</div>
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="work_history_topsection">
<div class="title4">
 
<h4> <i class="careerfy-icon careerfy-social-media"></i>Work History</h4>
</div>
 
@foreach($work_histories as $work_history)
@if($work_history->resumefk === $hired_applicant->resume_id)
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
@endif
@endforeach
</div>
</div>
<div class="space">&nbsp;</div>
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="certifications_topsection several2">
<div class="title4">
 
<h4>Certifications</h4>
</div>
@foreach($jobcertifications as $jobcertification)
@if($jobcertification->user_id === $hired_applicant->user_id)
<div class="certification_inner several2">
 
<div class="overviewtitle2">
<span class="ovtitle">Certification Name</span>
<span class="highlightable"><strong> {{$jobcertification->name}} </strong></span>
</div>
<div class="overviewtitle2">
<span class="ovtitle">Date Received</span>
<span class="highlightable">{{ date('M, Y', strtotime($jobcertification->date_received)) }}</span>
</div>

</div>
@endif
@endforeach
</div>
</div>

<div class="space">&nbsp;</div>
<div class="col-md-12 cv_content" >
<div class="pageactionIn" id="additional_information_topsection">
<div class="title4">
 
<h4>Personal Information</h4>
</div>
@foreach($person_info_list as $person_info)
@if($person_info->user_id === $hired_applicant->user_id)
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
<span class="ovtitle">Personal page</span>
<span class="highlightable"><a class="breakword" href="#" rel="external">{{$person_info->personal_page}}</a></span>
</div>
@endif
@endforeach
</div>
 </div>
 
                                                    </div>
                                                     <?php $reviewo++; ?>
                                                    @empty
                                           <div class="careerfy-employer-confitmation">
<div align="center">   <img src="{{asset('img/NoRecordFound.png')}}" height="300" width="300" alt="" align="center"></div>
<div class="clearfix"></div>
</div>
                                                    @endforelse

                                                    @else
                                           <div class="careerfy-employer-confitmation">
<div align="center">   <img src="{{asset('img/NoRecordFound.png')}}" height="300" width="300" alt="" align="center"></div>
<div class="clearfix"></div>
</div>
                                                    @endif
                                                </div>
                                            </div>

                                </div>




 <div class="tab-pane" id="tab_16">  
   <aside class="careerfy-column-4"> 
<div class="careerfy-typo-wrap">
<form class="careerfy-search-filter"> 

<div class="careerfy-search-filter-wrap careerfy-without-toggle">
<div >
<div id="" data-toggle="collapse" data-target="#expand_auto"> 
<i class="careerfy-icon careerfy-sort"></i>  <h2>Filter Automach</h2>
</div>
</div></div>
<div class="careerfy-candidate careerfy-candidate-default">
<ul class="careerfy-row nav-tabs tabs-left" id="auto_section">
<!-- <ul> -->
 @if(!$hired_list->isEmpty())
 <?php $reviewcf = 0; ?>
@forelse($hired_list as $hired_applicant)
   
<li class="careerfy-column-12">
 @if($reviewcf === 0)
      <a href="#tab_6_1{{$hired_applicant->id}}" data-toggle="tab">
                                                 @else
 <a href="#tab_6_1{{$hired_applicant->id}}" data-toggle="tab">
                                                 @endif 
                   <?php $record = \App\RecruitProfilePix::where('status', 1)->where('user_id', $hired_applicant->user_id)->orderBy('created_at', 'DESC')->first(); ?>
                                            <div class="careerfy-candidate-default-wrap"> 
                                                <figure>

                                                 @if($record)<img src="/uploads/avatars/{{ $record->pix }}" alt="">@else 
                                                    <!-- <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> -->
                                                    @endif
                                                </figure> 
                                                <div class="careerfy-candidate-default-text">
                                                    <div class="careerfy-candidate-default-left">
                                                        <h2>
                            @foreach($documentList as $document) @if($hired_applicant->document_id === $document->id) {{$document->candidates_name}} @endif @endforeach  <i class="careerfy-icon careerfy-check-mark"></i></h2>
                                                        <ul class="careerfy-column-12" >

                                                        <!-- to get work experience; get job_id from application table and resume_id, then goto workexperience table and find by resume_id and jpob_id  -->
                                                   
                                                        @foreach($work_experiences as $work_experience)
                                                        @if($work_experience->userfk === $hired_applicant->user_id && $work_experience->present === 1)
                                                            <li>{{$work_experience->position_title}} at <span href="#" class="careerfy-candidate-default-studio">{{$work_experience->company_name}}</span></li>
                                                            @endif
                                                        @endforeach
                                                        </ul>
                                                    </div>
                                              <!--       <a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a> -->
                                                </div>
                                            </div> </a>
                                        </li>

 <?php $reviewcf++; ?>
@empty
@endforelse

@else
<li class="careerfy-column-12"> No Record(s) Found</li>
@endif
 
                                    </ul>
                                </div> 
                                </form>
 
                            </div>
                        </aside>  

                                            <div class="col-md-8 col-sm-8 col-xs-8">
                                                 <div id="expand_hired" class="collapse"> 
  <div class="cscroll_div scroll_div" >
            <div class="container "> 
            
                <div class="row"> 
                    <div class="col-md-8">
                    <div class="col-md-8">   

                         <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Gender</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="gender_hired">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="g1hired" name="gender_hired[]" value="Male" />
                                                    <label for="g1hired"><span></span>Male</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g2hired"  name="gender_hired[]" value="Female" />
                                                    <label for="g2hired"><span></span> Female</label>
                                                </li>
                                     <!--            <li>
                                                    <input type="checkbox" id="g2"  name="gender" value="All" />
                                                    <label for="g2"><span></span> Both</label>
                                                </li> -->
                                              
                                            </ul>
                                        </div>
                                    </div> </div>
                                                           <div class="col-md-8">                                          
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Location</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="location_hired" >
                                            <ul class="careerfy-checkbox">
                                            @foreach($cities as $city) 
                                                <li>
                                                    <input type="checkbox" id="r{{$city->id}}_hired" name="city[]" value="{{$city->id}}" />
                                                    <label for="r{{$city->id}}_hired"><span></span>{{$city->name}}</label>
                                                </li> 
                                            @endforeach 
                                            </ul> 
                                        </div>
                                    </div> </div>

                        <div class="col-md-8">       <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Job Function</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="profession_hired">
                                            <ul class="careerfy-checkbox">
                                               @foreach($professions as $profession)
                                                <li>
                                                    <input type="checkbox" id="r_{{$profession->id}}_hired" name="profession[]" value="{{$profession->id}}" />
                                                    <label for="r_{{$profession->id}}_hired"><span></span>{{$profession->name}}</label>
                                                    <small>10</small>
                                                </li>
                                                @endforeach 
                                            </ul> 
                                        </div>
                                    </div>
                            </div>

                                    <div class="col-md-8">
        <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Career Level</a></h2>
                                        <div class="careerfy-checkbox-toggle croll_div" id="career_level_hired">
                                            <ul class="careerfy-checkbox">
                                  @foreach($jobcareer_levels as $jobcareer_level)
                                                <li>
                                 <input type="checkbox" id="jc{{$jobcareer_level->id}}_hired" name="career_level[]" value="{{$jobcareer_level->id}}" />
                                                    <label for="jc{{$jobcareer_level->id}}_hired"><span></span>{{$jobcareer_level->name}}</label>
                                                    <small>4</small>
                                                </li>
                                @endforeach
                                          
                                            </ul>
                                        </div>
                                    </div>

                                    </div>
                    </div>
                </div>

                <div class="row"> 
                <div class="col-md-8">
                    <div class="col-md-8"> 
                  <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Minimum Salary</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="salary_hired">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="salary1_hired" name="salary[]" value="N50,000-N100,000" />
                                                    <label for="salary1_hired"><span></span>N50,000-N100,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary2_hired" name="salary[]" value="N150,000-N250,000" />
                                                    <label for="salary2_hired"><span></span>N150,000-N250,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary3_hired"  name="salary[]" value="N350,000-N600,000" />
                                                    <label for="salary3_hired"><span></span>N350,000-N600,000</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="salary4_hired"  name="salary[]" value="N750,000-N1,000," />
                                                    <label for="salary4_hired"><span></span>N750,000-N1,000,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary5_hired"  name="salary[]" value="N1,000,000-N5,000,000" />
                                                    <label for="salary5_hired"><span></span>N1,000,000-N5,000,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary6_hired"  name="salary[]" value="N550,000-N10,000,000" />
                                                    <label for="salary6_hired"><span></span>N5,050,000-N10,000,000</label>
                                                </li>
                                                  <li>
                                                    <input type="checkbox" id="salary7_hired"  name="salary[]" value="N10,000,000-N15,000,000" />
                                                    <label for="salary7_hired"><span></span>N10,000,000-N15,000,000</label>
                                                </li>
                                                  <li>
                                                    <input type="checkbox" id="salary8_hired"  name="salary[]" value="N15,000,000-Above" />
                                                    <label for="salary8_hired"><span></span>N15,000,000-Above</label>
                                                </li>

                                            </ul>
                                        </div>
                                </div></div>
                    <div class="col-md-8">                 <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Availability</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="availability_hired">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="avail1_hired" name="avail[]" value="now" />
                                                    <label for="avail1_hired"><span></span>Immediate</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail2_hired" name="avail[]" value="1 week" />
                                                    <label for="avail2_hired"><span></span>1 week</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail3_hired"  name="avail[]" value="2 weeks" />
                                                    <label for="avail3_hired"><span></span>2 weeks</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="avail4_hired"  name="avail[]" value="1 month" />
                                                    <label for="avail4_hired"><span></span>1 month</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail5_hired"  name="avail[]" value="2 months" />
                                                    <label for="avail5_hired"><span></span>2 months</label>
                                                </li>
  <!--                                               <li>
                                                    <input type="checkbox" id="avail6_hired"  name="avail[]" value="Specific date" />
                                                    <label for="avail6_hired"><span></span>Specific date</label>
                                                </li> -->
                                            </ul>
                                        </div>
                                </div>  </div>
                    <div class="col-md-8"> 
                    <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Years Of Experience</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="yearofexperience_hired">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="g1yoe_hired" name="yoe[]" value="0-5" />
                                                    <label for="g1yoe_hired"><span></span>0-5</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g2yoe_hired"  name="yoe[]" value="6-10" />
                                                    <label for="g2yoe_hired"><span></span>6-10</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="g3yoe_hired"  name="yoe[]" value="11-15" />
                                                    <label for="g3yoe_hired"><span></span>11-15</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g4yoe_hired"  name="yoe[]" value="16-20" />
                                                    <label for="g4yoe_hired"><span></span>16-20</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g5yoe_hired"  name="yoe[]" value="20 Above" />
                                                    <label for="g5yoe_hired"><span></span>20 Above</label>
                                                </li>
                                            </ul>
                                        </div>
                                </div> </div> 
                </div> 
                </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-8">                                <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Age</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="age_hired">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="rag1_hired" name="ag" value="18-25" />
                                                    <label for="rag1_hired"><span></span>18-25</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="rag2_hired" name="ag" value="26-30" />
                                                    <label for="rag2_hired"><span></span>26-30</label>
                                                </li>
                                                    <li>
                                                    <input type="checkbox" id="rag3_hired" name="ag" value="31-35" />
                                                    <label for="rag3_hired"><span></span>31-35</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="rag4_hired" name="ag" value="36-40" />
                                                    <label for="rag4_hired"><span></span>36-40</label>
                                                </li>
                                                     <li>
                                                    <input type="checkbox" id="rag5_hired" name="ag" value="41-45" />
                                                    <label for="rag5_hired"><span></span>41-45</label>
                                                </li> 
                                                <li>
                                                    <input type="checkbox" id="rag6_hired" name="ag" value="46-50" />
                                                    <label for="rag6_hired"><span></span>46-50</label>
                                                </li> 
                                                <li>
                                                    <input type="checkbox" id="rag7_hired" name="ag" value="51 Above" />
                                                    <label for="rag7_hired"><span></span>51 Above</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> </div>
                            <div class="col-md-8">                                
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Qualification</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div"  >
                                        <div id="qualify_hired">
                                        <ul class="careerfy-checkbox">
                                   
                                             @foreach($educationallevels as $educational_level)
                                                    <li>
                                         <input type="checkbox" id="qu_{{$educational_level->id}}" name="qu[]" value="{{$educational_level->id}}" />
                                                    <label for="qu_{{$educational_level->id}}"><span></span>{{$educational_level->name}}</label>
                                                </li>
                                                @endforeach
                                        
                                                 </ul>
                                 

 
                                                 </div>
                                        </div>
                                    </div> </div>
     
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-8"> 
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Employement Terms</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="job_terms_hired">
                                            <ul class="careerfy-checkbox">
                                  @foreach($employement_terms as $employement_term)
                                                <li>
                                   <input type="checkbox" id="jr{{$employement_term->id}}_hired" name="job[]" value="{{$employement_term->id}}" />
                                                    <label for="jr{{$employement_term->id}}_hired"><span></span>{{$employement_term->name}}</label>
                                                    <small>4</small>
                                                </li>
                                @endforeach
                                          
                                            </ul>
                                        </div>
                                    </div></div>
                            
                        </div>


                    </div>
            
            </div>
        </div>
          </div> 

                                                <div class="tab-content"  id="resume_body">
                                                 @if(!$hired_list->isEmpty())
                                                         <?php $reviewo = 0; ?>
                                                @forelse($hired_list as $hired_applicant)
                                                
                                                  @if($reviewo === 0)
                                                 <div class="tab-pane active" id="tab_6_1{{$hired_applicant->id}}">
                                                 @else
                                                 <div class="tab-pane fade" id="tab_6_1{{$hired_applicant->id}}">
                                                 @endif  

 

              <div class="col-md-12 cv_content"  >

    

                    <div id="toggle{{$hired_applicant->id}}" class="btn  mt-ladda-btn mini_header" data-toggle="collapse" data-target="#expand_auto" >
                   
                       <i class="careerfy-icon careerfy-sort"></i> Sort
                    </div>
                     <div class="space">&nbsp;</div> 
 

                                </div>



                                  <div class="space">&nbsp;</div> 
                                  <div id="emalForm">
  <button type="button" class="btn blue mt-ladda-btn ladda-button btn-outline" data-toggle="collapse" data-target="#{{$hired_applicant->id}}"><i class="careerfy-icon careerfy-envelope" ></i>Send Email</button>
            <div class="space">&nbsp;</div> 
      <div class="lds-ripplee{{$hired_applicant->user_id}}" style="display: none;"><div></div><div></div></div>
                              <div id="info{{$hired_applicant->user_id}}"></div>
<div id="emailsent{{$hired_applicant->user_id}}"></div>
  <div id="{{$hired_applicant->id}}" class="collapse">
     <div class="col-md-7">
        <div class="row" id="sendEmailStatus{{$hired_applicant->user_id}}">
        
        
 {!! Form::model($hired_applicant, [ 'files' => true]) !!}
  {{ csrf_field() }}
<div class="space"></div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-body settings-block">
 <div class="space">&nbsp;</div> 
   <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            {!! Form::label('title', 'Subject') !!}  
            <input type="text" name="title{{$hired_applicant->user_id}}"  class="form-control">
            <input type="hidden" name="email_address{{$hired_applicant->user_id}}" value="{{$hired_applicant->email}}">
            <input type="hidden" name="name{{$hired_applicant->user_id}}" value="{{$hired_applicant->candidates_name}}">
            <small class="text-danger">{{ $errors->first('title') }}</small>
          </div>
 <div class="space">&nbsp;</div> 
          <div class="form-group{{ $errors->has('body_of_email') ? ' has-error' : '' }}">
            {!! Form::label('body_of_email', 'Email') !!}
          
            <textarea class="form-control" name="body_of_email{{$hired_applicant->user_id}}"> </textarea>
            <small class="text-danger">{{ $errors->first('body_of_email') }}</small>
          </div>
    <div class="space">&nbsp;</div> 
    <button class="btn blue mt-ladda-btn ladda-button btn-outline btn-block" id="sendEmail{{$hired_applicant->user_id}}">Send Email</button>

        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}   
        
        </div>
      </div>
  </div>
  </div>

   @foreach($documentList as $document)

@if($hired_applicant->document_id === $document->id)  

   <div class="space">&nbsp;</div>
<div class="col-md-12 cv_content">  
<div class="" id="user_profile"> 
 <div class="pageactionIn">
 <div class="title4">
<div class="user_name"> <h4 class="highlightable">{{$document->candidates_name}}</h4> </div>  
                                        
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Age</span>

<span class="detail highlightable"><strong>{{$document->age}}</strong></span>

</div>

 <div class="overviewtitle2">
<span class="ovtitle">Date of Birth</span>
<span class="detail highlightable"><strong>{{ date('M d, Y', strtotime($document->date_of_birth)) }}  </strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Gender</span>
<span class="detail highlightable"><strong> {{$document->gender}} </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Nationality</span>
<span class="detail highlightable"><strong> @foreach($countries as $country)  @if($country->code === $hired_applicant->nationality) {{$country->name_en}} @endif @endforeach </strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Location</span>
<span class="detail highlightable"><strong>  {{$hired_applicant->city_id}}</strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Email</span>
<span class="detail highlightable"><strong>{{$document->email}}</strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Willing to relocate:</span>
<span class="detail highlightable"><strong>{{$hired_applicant->relocate_nationaly}} </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Educational Level:</span>
<span class="detail highlightable"><strong>       
@foreach($educationallevels as $educational_level)
                                      @if($educational_level->id === $document->educational_level)
                                                    {{$educational_level->name}} 
                                             @endif
                                                @endforeach </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Employment Terms:</span>
<span class="detail highlightable"><strong> @foreach($employement_terms as $employement_term) @if($employement_term->id == $hired_applicant->d_employment_term) {{$employement_term->name}} @endif @endforeach</strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Career Level:</span>
<span class="detail highlightable"><strong> @foreach($jobcareer_levels as $job_career_level) @if($job_career_level->id == $document->career_level) {{$job_career_level->name}}  @endif @endforeach{{$hired_applicant->career_level}} </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle"> Minimum Salary:</span>
<span class="detail highlightable"><strong>{{$hired_applicant->minimum_salary}} / Year</strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Availability:</span>
<span class="detail highlightable"><strong> {{$hired_applicant->availability}}</strong></span>
</div> 
 </div> 
</div>
</div>
@endif
@endforeach



<div class="space">&nbsp;</div>
 
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="education_topsection">
<div class="title4">
<p class="editov2"> </p>
 
<h4>Career Objective / Summary</h4>
@foreach($careerlist as $career)
@if($career->resume_id === $hired_applicant->resume_id)
{{ $career->summary }}
@endif
@endforeach
 
 </div>
</div>
</div>
<div class="space">&nbsp;</div>

<div class="col-md-12 cv_content">
<div class="pageactionIn" id="education_topsection"> 
<div class="title4">
<h4><i class="careerfy-icon careerfy-design-skills"></i>Specialties and Skills</h4>
</div>
 
<div class="skills_inner">
@foreach($jobskills as $jobskill)
@if($jobskill->resumeid === $hired_applicant->resume_id)
 
 <span class="jellybean">{{$jobskill->job_skill}}</span> 
@endif
@endforeach

</div>
</div> </div>
<div class="space">&nbsp;</div>
 

<div class="col-md-12 cv_content">
<div class="pageactionIn" id="education_topsection">
<div class="title4">
<h4> <i class="careerfy-icon careerfy-mortarboard"></i>Educational History </h4>
</div>
@foreach($educationaList as $educational)
@if($educational->resume_id === $hired_applicant->resume_id)
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
 @endif
@endforeach
</div>
</div>
 
<div class="space">&nbsp;</div>
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="work_history_topsection">
<div class="title4">
 
<h4> <i class="careerfy-icon careerfy-social-media"></i>Work History</h4>
</div>
 
@foreach($work_histories as $work_history)
@if($work_history->resumefk === $hired_applicant->resume_id)
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
@endif
@endforeach
</div>
</div>
<div class="space">&nbsp;</div>
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="certifications_topsection several2">
<div class="title4">
 
<h4>Certifications</h4>
</div>
@foreach($jobcertifications as $jobcertification)
@if($jobcertification->user_id === $hired_applicant->user_id)
<div class="certification_inner several2">
 
<div class="overviewtitle2">
<span class="ovtitle">Certification Name</span>
<span class="highlightable"><strong> {{$jobcertification->name}} </strong></span>
</div>
<div class="overviewtitle2">
<span class="ovtitle">Date Received</span>
<span class="highlightable">{{ date('M, Y', strtotime($jobcertification->date_received)) }}</span>
</div>

</div>
@endif
@endforeach
</div>
</div>

<div class="space">&nbsp;</div>
<div class="col-md-12 cv_content" >
<div class="pageactionIn" id="additional_information_topsection">
<div class="title4">
 
<h4>Personal Information</h4>
</div>
@foreach($person_info_list as $person_info)
@if($person_info->user_id === $hired_applicant->user_id)
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
<span class="ovtitle">Personal page</span>
<span class="highlightable"><a class="breakword" href="#" rel="external">{{$person_info->personal_page}}</a></span>
</div>
@endif
@endforeach
</div>
 </div>
 
                                                    </div>
                                                     <?php $reviewo++; ?>
                                                    @empty
                                           <div class="careerfy-employer-confitmation">
<div align="center">   <img src="{{asset('img/NoRecordFound.png')}}" height="300" width="300" alt="" align="center"></div>
<div class="clearfix"></div>
</div>
                                                    @endforelse

                                                    @else
                                           <div class="careerfy-employer-confitmation">
<div align="center">   <img src="{{asset('img/NoRecordFound.png')}}" height="300" width="300" alt="" align="center"></div>
<div class="clearfix"></div>
</div>
                                                    @endif
                                                </div>
                                            </div>

                                </div>


 
 </div>

    </div>
</div>
</div>
  <div class="space">&nbsp;</div> 
 
            <!-- Main Section -->
            
        <!-- Footer -->
               @include('partials.job_footer')
        <!-- Footer -->
    </div>
    <!-- Wrapper -->

    <!-- ModalLogin Box -->
  
    <!-- Modal Signup Box -->
 
      
@if(session()->has('flash-message'))
    <div class="alert alert-danger text-center" role="alert">
        {{ session()->get('flash-message') }}
    </div>
@endif


<div class="modal fade bs-modal-lg" id="static_summary" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">Send Email</h4>
</div>
<div class="modal-body">

<!-- BEGIN EXAMPLE TABLE PORTLET-->
<!-- <div class="portlet light bordered">
<div class="portlet-body"> -->
 <!-- <pre> Specifications</pre> -->
<form class="form-horizontal" action="" method="post" role="form">
{{ csrf_field() }}
<!-- <form role="form"> -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-12">
Title <span class="required">*</span>
<textarea class="form-control" placeholder="A result-driven and dedicated Application Developer, seeking a software engineering position to utilize logical thinking skills and programming expertise to provide the company with excellent software solutions" name="career_summary" required="required"></textarea> 
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


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 
    <script src="{{ asset('recruit/script/jquery.js')}}"></script>
    <script src="{{ asset('recruit/script/bootstrap.js')}}"></script>
    <script src="{{ asset('recruit/script/slick-slider.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/counter.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/fancybox.pack.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/isotope.min.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/functions.js')}}"></script>
    <script src="{{ asset('recruit/script/functions.js')}}"></script>
    <script src="{{ asset('css/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('css/assets/global/plugins/bootstrap-summernote/summernote.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('css/assets/global/plugins/jquery-repeater/jquery.repeater.js')}}" type="text/javascript"></script>
         <script src="{{ asset('css/assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('css/assets/pages/scripts/form-repeater.min.js')}}" type="text/javascript"></script>
   <script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
</script>
 
 <script>
    
    $("#qualification").change(function() { 
    
    if ( $(this).val() == "Specific Qualification") {

    $("#qualification").hide();

    $("#availability_date").show();

}
    else{
    
        $("#qualification").show();
        $("#availability_date").hide();
    }

});


$("#present").click(function(){
  //  alert($(this).val());
    //$("#end_month").hide();
    //document.getElementById('myInput').value = ''
  document.getElementById('end_month_work').value = ''; 
  document.getElementById('end_year').value = ''; 
  
});

  $("#end_month").change(function() { 
//alert($(this).val());
    if ( $(this).val() !=null) {

        $("#present2").show();
        $("#present").hide();
  //document.getElementById('present').style.display = 'none';
   //document.getElementById('work_to_present').style.display = 'block';
        
    }
    else{
document.getElementById('work_to_present').style.display = 'none';
document.getElementById('present').style.display = 'block';
 
    }
}); 

  </script>

 <script type="text/javascript">
 function isEmpty(obj) {
    for(var key in obj) {
        if(obj.hasOwnProperty(key))
            return false;
    }
    return true;
}


 


// $('#fpdId').click(function(){
//     var files = new Array();

//     //xzyId is table id.
//     $('#g tbody tr  input:checkbox').each(function() {
//       if ($(this).is(':checked')) {
//       files.push(this.value);
//       }
//     });

//     console.log(files);
//  });
  $('#savedescription').click(function() {
 alert('here');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterByCategory', 
            data:{
                '_token':$('input[name=_token').val(),
                'location':$('input[name=city]:checked').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
           $('#items').empty();   
        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
          $("#sec20").append('<i class="btn-success btn-xs"> Done </i>');
 
  });
 
    });


  //  applicants
 @foreach($List_applicants_by_job_id as $List_applicant)  
  $('#savedescription{{$List_applicant->id}}').click(function() {
 alert('Rejected Here hhhhhhh');
 //when user clicks on reject 
 //adjust the records on applicants_list
 //adjust the records on reject list
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/reject_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$List_applicant->id}}]').val(),
                'application_id':$('input[name=application_id{{$List_applicant->id}}]').val(),
                'user_id':$('input[name=user_id{{$List_applicant->id}}]').val(),
                'job_id':$('input[name=job_id{{$List_applicant->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
             $('#review_count').empty();
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty(); 
            $("#hired_count").empty();
            $("#applicants_list").empty(); 
            $("#move_to").empty(); 
            $("#reject_section").empty(); 
           // window.location.href+"#tab_11>*", "";
            $("#tab_rejected").load(location.href+" #tab_rejected>*", "");
        //window.location.reload(); review_section
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
        var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var hired_count = data.hired_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var new_reject_list = data.new_reject_list;
        var work_experiences = data.work_experiences;
        var hired_list = data.hired_list;
        //console.log(rejected);
        //console.log(newapplication_list);

            if(isEmpty(newapplication_list)) {
            $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
            $('#resume_body').empty();
            $('#resume_body').append('No Record(s) Found'); 
 
            }

            $("#reject_count").append(rejected);
            $('#sorted_count').append(sorted_count);
            $("#review_count").append(in_review_count);
            $("#shortlist_count").append(shortlisted_count); 
            $("#hired_count").append(hired_count); 

        var count = 0;
        var status = '';
        var content_v = '';
         $.each(hired_list, function(key, value){
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);

            //loop through experience to get candidates 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#hire_section").append(content); 

 });
         count++;

 $.each(new_reject_list, function(key, value){
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);

            //loop through experience to get candidates 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
 
 });
 count++;
      $.each(newapplication_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            } 
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  

 
        });
           count++;
 
  });
 
    });



    $('#in_review{{$List_applicant->id}}').click(function() {
        alert('in_reviewssss');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/review_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$List_applicant->id}}]').val(),
                'application_id':$('input[name=application_id{{$List_applicant->id}}]').val(),
                'user_id':$('input[name=user_id{{$List_applicant->id}}]').val(),
                'job_id':$('input[name=job_id{{$List_applicant->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
           //console.log(data);
            $('#review_count').empty();
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty();
            $("#applicants_list").empty(); 
            $("#move_to").empty();
            $("#review_section").empty();
            $("#reject_section").empty();
          location.reload();
        $("#review").load(location.href+" #review>*", "");
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var new_reject_list = data.new_reject_list;
        var new_reivew_list = data.review_list;
        var work_experiences = data.work_experiences;
        var user_record = data.user;
 
        console.log(new_reivew_list);
        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $('#sorted_count').append(sorted_count);
        $('#shortlist_count').append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hired_count").append(hired_count);

        if(isEmpty(newapplication_list)) {
        $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
         var count = 0;
        var status = '';
        var content_v = '';
        var uprofile = null;

// // update rejected List
 $.each(new_reject_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
 
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
 });
  count++;
// update In-review List
  $.each(new_reivew_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
 
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates
            var review_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#review_section").append(review_content); 
 });
   count++;

      $.each(newapplication_list, function(key, value) {
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            var pix = null;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  

 
        });
   count++;

  });
 
    });
function compare_ID(user1) {
  // body...
 var user_rec = null;
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/view_user_record', 
            data:{
                '_token':$('input[name=_token').val(),
                'user_id':user1,  
            }, 
            success:function(data){
      
     },
     complete:function(data){ 
    $("#loader").hide();
    },
    }).done(function (data) {  
            console.log(data['user_record']);
              console.log(data['user_record']['firstname']);
    var code = data['user_record']['id'];
   $("#uprofile").append(data['user_record']['name']);
  });
  return user_rec;
}
   $('#shortlist{{$List_applicant->id}}').click(function() {
        alert('shortlist');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/shortlist_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$List_applicant->id}}]').val(),
                'application_id':$('input[name=application_id{{$List_applicant->id}}]').val(),
                'user_id':$('input[name=user_id{{$List_applicant->id}}]').val(),
                'job_id':$('input[name=job_id{{$List_applicant->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $('#review_count').empty();   
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty();
            $("#offered_count").empty(); 
            $("#hire_count").empty();
            $('#shortlist_section').empty(); 
            $('#applicants_list').empty(); 
$("#shortlist_me").load(location.href+" #shortlist_me>*", "");
        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hire_count = data.hire_count; 
        var work_experiences = data.work_experiences;
        var shortlisted_list = data.shortlisted_list;
        var newapplication_list = data.newapplication_list;

        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $("#sorted_count").append(sorted_count);
        $("#shortlist_count").append(shortlisted_count); 
        $("#offered_count").append(offered_count);
        $("#hire_count").append(hire_count);

        console.log(newapplication_list);
        if(isEmpty(newapplication_list)) {
        $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }

        var count = 0;
        var status = '';
        var content_v = '';
        var uprofile = null;

         $.each(shortlisted_list, function(key, value) {
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id; 
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates

            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#shortlist_section').append(content);  

 
        });
          count++;
         $.each(newapplication_list, function(key, value) {
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id; 
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  

 
        });
 count++;
  });
 
    });



   $('#offered{{$List_applicant->id}}').click(function() {
        alert('offered');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/offered_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$List_applicant->id}}]').val(),
                'application_id':$('input[name=application_id{{$List_applicant->id}}]').val(),
                'user_id':$('input[name=user_id{{$List_applicant->id}}]').val(),
                'job_id':$('input[name=job_id{{$List_applicant->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $("#review_count").empty();   
            $("#reject_count").empty(); 
           $("#sorted_count").empty();
           $("#shortlist_count").empty(); 
           $("#offered_count").empty();
            $("#hire_count").empty();   

        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hire_count = data.hire_count;

        console.log(in_review_count);
        console.log(sorted_count);
        console.log(rejected);
    $("#reject_count").append(rejected);
    $("#review_count").append(in_review_count);
    $("#sorted_count").append(sorted_count);
   $("#shortlist_count").append(shortlisted_count);
   $("#offered_count").append(offered_count);
    $("#hire_count").append(hire_count);

     $.each(hired_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
 
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
 
            //loop through experience to get
        var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+ ' ' +'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#hire_section").append(content); 
 });
           $.each(newapplication_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            // var company = value.id;
            // var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);

   
    
    console.log(company);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+ ' ' +'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  
 
});

  });
 
    });
   
$('#hire{{$List_applicant->id}}').click(function() {
        alert('Hire Now');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/hire_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$List_applicant->id}}]').val(),
                'application_id':$('input[name=application_id{{$List_applicant->id}}]').val(),
                'user_id':$('input[name=user_id{{$List_applicant->id}}]').val(),
                'job_id':$('input[name=job_id{{$List_applicant->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $("#review_count").empty();   
            $("#reject_count").empty(); 
           $("#sorted_count").empty();
           $("#shortlist_count").empty(); 
           $("#offered_count").empty();
           $("#hired_count").empty();  

            $("#applicants_list").empty(); 
            $("#move_to").empty();
            $("#hire_section").empty();
            // $("#reject_section").empty();

         //window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hired_count = data.hired_count;
        var in_review_count = data.review_count;
        var newapplication_list = data.newapplication_list;
        var hired_list = data.hired_list;
        var review_list = data.review_list;
        var work_experiences = data.work_experiences;
        var documents = data.documents;


        console.log(in_review_count);
        console.log(sorted_count);
        console.log(hired_list);
        console.log(review_list);
        console.log(newapplication_list);
        
        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $("#sorted_count").append(sorted_count);
        $("#shortlist_count").append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hired_count").append(hired_count);

  

        if(isEmpty(hired_list)) {  
        $('#hire_section').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
        
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 

        var count = 0;
        var status = '';
        var content_v = '';
        var user = null;
        var title = null;
        var company = null;
// // update rejected applicant List coming from in-review Tab
 $.each(hired_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
 
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
    // console.log(company);
    // console.log(documents);
       // $.each(work_experiences, function(key, value){
       //  if (true) {}
       // });      

            //loop through experience to get candidates experience@foreach($documentList as $document) 
        var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+ ' ' +'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#hire_section").append(content); 
 });

// update rejected applicants Resume list

// update In-review List
  $.each(review_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content_r = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+ ' ' +'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#review_section").append(content_r); 
 });


      $.each(newapplication_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            // var company = value.id;
            // var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);

   
    
    console.log(company);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+ ' ' +'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  
        // $("#review_section").append(content); 


        count++;
        content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });
    $("#move_to").append(content_v); 




  });
 
    });
 @endforeach



  // End automatch applicants



   @foreach($rejected_list as $rejected_applicant)  
  $('#savedescription{{$rejected_applicant->id}}').click(function() {
 alert('Rejected on reject section');
 alert($('input[name=rejected{{$rejected_applicant->id}}]').val());
 
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/reject_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$rejected_applicant->id}}]').val(),
                'application_id':$('input[name=application_id{{$rejected_applicant->id}}]').val(),
                'user_id':$('input[name=user_id{{$rejected_applicant->id}}]').val(),
                'job_id':$('input[name=job_id{{$rejected_applicant->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
         $('#review_count').empty();
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty();
            $("#applicants_list").empty(); 
            $("#move_to").empty();
            $("#review_section").empty();
            $("#reject_section").empty();

        //window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
        var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        console.log(rejected);
            $("#reject_count").append(rejected);
            $('#sorted_count').append(sorted_count);
            $("#review_count").append(in_review_count);
            $("#shortlist_count").append(shortlisted_count);
 
  });
 
    });
    $('#in_review{{$rejected_applicant->id}}').click(function() {
        alert('in_review on rejected section');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/review_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$rejected_applicant->id}}]').val(),
                'application_id':$('input[name=application_id{{$rejected_applicant->id}}]').val(),
                'user_id':$('input[name=user_id{{$rejected_applicant->id}}]').val(),
                'job_id':$('input[name=job_id{{$rejected_applicant->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $('#review_count').empty();
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $("#hired_count").empty();
            $('#shortlist_count').empty(); 
            $("#move_to").empty();
            $("#review_section").empty();
            $("#reject_section").empty();
            // hide review Side display
      // window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
            var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var new_reject_list = data.new_reject_list;
        var hired_count = data.hired_count;
        var work_experiences = data.work_experiences;
        var review_list = data.review_list;
        console.log(new_reject_list);
        // console.log(newapplication_list);

        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $('#sorted_count').append(sorted_count);
        $('#shortlist_count').append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hired_count").append(hired_count);

        if(isEmpty(newapplication_list)) {
        $('#review_section').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 

        var count = 0;
        var status = '';
        var content_v = ''; 
        var user = null;
        var title = null;
        var company = null;
// // update rejected applicant List coming from in-review Tab
 $.each(new_reject_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
       console.log(candidates_name);
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to 
        var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
 });

// update rejected applicants Resume list

// update In-review List
  $.each(review_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get  
            var content_r = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#review_section").append(content_r); 
 });

    $("#move_to").append(content_v); 

});
 

    });
    $('#shortlist{{$rejected_applicant->id}}').click(function() {
        alert('shortlist');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/shortlist_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$rejected_applicant->id}}]').val(),
                'application_id':$('input[name=application_id{{$rejected_applicant->id}}]').val(),
                'user_id':$('input[name=user_id{{$rejected_applicant->id}}]').val(),
                'job_id':$('input[name=job_id{{$rejected_applicant->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $("#review_count").empty();   
            $("#reject_count").empty(); 
           $("#sorted_count").empty();
           $("#shortlist_count").empty(); 
           $("#offered_count").empty();
            $("#hire_count").empty();   

         window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
           var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var new_reject_list = data.new_reject_list;
        var hire_count = data.hire_count;
        var review_list = data.review_list;
        console.log(review_list);
        console.log(newapplication_list);
        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $('#sorted_count').append(sorted_count);
        $('#shortlist_count').append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hire_count").append(hire_count);

        if(isEmpty(newapplication_list)) {
        $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 

        var count = 0;
        var status = '';
        var content_v = '';
// // update rejected applicant List coming from in-review Tab
 $.each(new_reject_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
        var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
 });

// update rejected applicants Resume list

// update In-review List
  $.each(review_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content_r = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#review_section").append(content_r); 
 });



  });
 
    });
   


   $('#offered{{$rejected_applicant->id}}').click(function() {
        alert('Offer');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/offered_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$rejected_applicant->id}}]').val(),
                'application_id':$('input[name=application_id{{$rejected_applicant->id}}]').val(),
                'user_id':$('input[name=user_id{{$rejected_applicant->id}}]').val(),
                'job_id':$('input[name=job_id{{$rejected_applicant->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $("#review_count").empty();   
            $("#reject_count").empty(); 
           $("#sorted_count").empty();
           $("#shortlist_count").empty(); 
           $("#offered_count").empty();
            $("#hire_count").empty();   

         window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
    var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var new_reject_list = data.new_reject_list;
        var hire_count = data.hire_count;
        var review_list = data.review_list;
        var offered_count = data.offered_count;

        console.log(review_list);//

        console.log(newapplication_list);
        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $('#sorted_count').append(sorted_count);
        $('#shortlist_count').append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hire_count").append(hire_count);

        if(isEmpty(newapplication_list)) {
        $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 

        var count = 0;
        var status = '';
        var content_v = '';
// // update rejected applicant List coming from in-review Tab
 $.each(new_reject_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
        var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
 });

// update rejected applicants Resume list

// update In-review List
  $.each(review_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content_r = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#review_section").append(content_r); 
 });


  });
 
    });
   
$('#hire{{$rejected_applicant->id}}').click(function() {
        alert('shortlist');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/hire_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$rejected_applicant->id}}]').val(),
                'application_id':$('input[name=application_id{{$rejected_applicant->id}}]').val(),
                'user_id':$('input[name=user_id{{$rejected_applicant->id}}]').val(),
                'job_id':$('input[name=job_id{{$rejected_applicant->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $("#review_count").empty();   
            $("#reject_count").empty(); 
           $("#sorted_count").empty();
           $("#shortlist_count").empty(); 
           $("#offered_count").empty();
           $("#hire_count").empty();  

          window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
         var offered_count = data.offered_count;
        var hired_count = data.hired_count;

        console.log(in_review_count);
        console.log(sorted_count);
        console.log(rejected);
    $("#reject_count").append(rejected);
    $("#review_count").append(in_review_count);
    $("#sorted_count").append(sorted_count);
   $("#shortlist_count").append(shortlisted_count);
   $("#offered_count").append(offered_count);
   $("#hire_count").append(hire_count);

  });
 
    });
 @endforeach


// in Review Section
   @foreach($review_list as $review)  
  $('#savedescription{{$review->id}}').click(function() {
    alert('Rejected review hereeerereerexxxxxxxxxxx');
   // alert($('input[name=rejected{{$review->id}}]').val());
         
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/reject_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$review->id}}]').val(),
                'application_id':$('input[name=application_id{{$review->id}}]').val(),
                'user_id':$('input[name=user_id{{$review->id}}]').val(),
                'job_id':$('input[name=job_id{{$review->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
             $('#review_count').empty();
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty();
            $("#applicants_list").empty(); 
            $("#move_to").empty();
            $("#review_section").empty();
            $("#reject_section").empty();

         window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
        var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var review_list = data.review_list;
        var new_reject_list = data.new_reject_list;
        console.log(rejected);
        console.log(newapplication_list);

            if(isEmpty(newapplication_list)) {
            $('#applicants_list_j').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
            $('#resume_body').empty();
            $('#resume_body').append('No Record(s) Found'); 
 
            }

            $("#reject_count").append(rejected);
            $('#sorted_count').append(sorted_count);
            $("#review_count").append(in_review_count);
            $("#shortlist_count").append(shortlisted_count); 

        var count = 0;
        var status = '';
        var content_v = '';
         $.each(new_reject_list, function(key, value){

        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
 });
    $.each(review_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#review_section").append(content); 
      
 });

      $.each(newapplication_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  
        // $("#review_section").append(content); 


        count++;
        content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';

           });
          
 
  });
 
    });
 
    $('#in_review{{$review->id}}').click(function() {
        alert('in_review review nowsssssssssssssssssssss');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/review_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$review->id}}]').val(),
                'application_id':$('input[name=application_id{{$review->id}}]').val(),
                'user_id':$('input[name=user_id{{$review->id}}]').val(),
                'job_id':$('input[name=job_id{{$review->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $('#review_count').empty();
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty();
            $("#applicants_list").empty(); 
            $("#move_to").empty();
            $("#review_section").empty();
            $("#reject_section").empty();
            $("#hired_count").empty();
         //window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var new_reject_list = data.new_reject_list;
        var review_list = data.review_list;
        var hired_count = data.hired_count;
        console.log(rejected);
        console.log(newapplication_list); 
        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $('#sorted_count').append(sorted_count);
        $('#shortlist_count').append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hired_count").append(hired_count);

        if(isEmpty(newapplication_list)) {
        $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 

        var count = 0;
        var status = '';
        var content_v = '';
// // update rejected List
 $.each(review_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#review_section").append(content); 
 });
// update In-review List
  $.each(review_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content_r = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content_r); 
 });


      $.each(newapplication_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  
        // $("#review_section").append(content); 


        count++;
        content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });


  });
 
    });

   $('#shortlist{{$review->id}}').click(function() {
        alert('shortlisting applicant in REview Section ?' );
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/shortlist_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$review->id}}]').val(),
                'application_id':$('input[name=application_id{{$review->id}}]').val(),
                'user_id':$('input[name=user_id{{$review->id}}]').val(),
                'job_id':$('input[name=job_id{{$review->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $('#review_count').empty();   
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty();
            $("#offered_count").empty(); 
            $("#hired_count").empty();  
            $("#review_section").empty();
            $("#shortlist_section").empty(); 

       //window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hired_count = data.hired_count;

        var newapplication_list = data.newapplication_list;
        var shortlisted_list = data.shortlisted_list;
        var new_review_list = data.new_review_list;
        var work_experiences  = data.work_experiences;


        console.log(shortlisted_list);
        console.log(newapplication_list);

        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $('#sorted_count').append(sorted_count);
        $('#shortlist_count').append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hired_count").append(hired_count);

        if(isEmpty(new_review_list)) {
        $('#review_section').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 
        var count = 0;
        var status = '';
        var content_v = '';
        var company = '';
        var title = '';
        var candidates_name = '';

  $.each(shortlisted_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            candidates_name = value.candidates_name; 
            company = value.id;
            title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);

            //loop through experience to get candidates experience  
            var content_r = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#shortlist_section").append(content_r); 
 });


      $.each(new_review_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            candidates_name = value.candidates_name; 
                company = value.id;
                title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
            company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
                // $('#e').append(newapplication_content);  
       $("#review_section").append(newapplication_content); 


        count++;
        // content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });


  });
 
});



   $('#offered{{$review->id}}').click(function() {
        alert('Offered from shortlist');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/offered_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$review->id}}]').val(),
                'application_id':$('input[name=application_id{{$review->id}}]').val(),
                'user_id':$('input[name=user_id{{$review->id}}]').val(),
                'job_id':$('input[name=job_id{{$review->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $("#review_count").empty();   
            $("#reject_count").empty(); 
           $("#sorted_count").empty();
           $("#shortlist_count").empty(); 
           $("#offered_count").empty();
            $("#hire_count").empty();  
            $("#review_section").empty();
            $("#offered_section").empty();   

        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hired_count = data.hired_count;

        var newapplication_list = data.newapplication_list;
        var new_review_list = data.new_review_list;
        var new_offered_list = data.new_offered_list;
        var work_experiences  = data.work_experiences; 

        console.log(in_review_count);
        console.log(sorted_count);
        console.log(rejected);
    $("#reject_count").append(rejected);
    $("#review_count").append(in_review_count);
    $("#sorted_count").append(sorted_count);
   $("#shortlist_count").append(shortlisted_count);
   $("#offered_count").append(offered_count); 
     $("#hired_count").append(hired_count);

            if(isEmpty(new_offered_list)) {
        $('#review_section').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 
        var count = 0;
        var status = '';
        var content_v = '';
        var company = '';
        var title = '';
        var candidates_name = '';

  $.each(new_offered_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            candidates_name = value.candidates_name; 
            company = value.id;
            title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);

            //loop through experience to get candidates experience  
            var content_r = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#offered_section").append(content_r); 
 });


      $.each(new_review_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            candidates_name = value.candidates_name; 
                company = value.id;
                title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
            company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
                // $('#e').append(newapplication_content);  
       $("#review_section").append(newapplication_content); 


        count++;
        // content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });

  });
 
    });
   
$('#hire{{$review->id}}').click(function() {
        alert('shortlist');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/hire_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$review->id}}]').val(),
                'application_id':$('input[name=application_id{{$review->id}}]').val(),
                'user_id':$('input[name=user_id{{$review->id}}]').val(),
                'job_id':$('input[name=job_id{{$review->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $("#review_count").empty();   
            $("#reject_count").empty(); 
           $("#sorted_count").empty();
           $("#shortlist_count").empty(); 
           $("#offered_count").empty();
           $("#hired_count").empty();  
            $("#review_section").empty();
            $("#hire_section").empty();   

        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
         var offered_count = data.offered_count;
        var hired_count = data.hired_count;

      
        var newapplication_list = data.newapplication_list;
        var new_review_list = data.new_review_list;
        var hired_list = data.hired_list;
        var work_experiences  = data.work_experiences; 
        console.log(hired_count);
        console.log(hired_list);
        console.log(new_review_list); 
    $("#reject_count").append(rejected);
    $("#review_count").append(in_review_count);
    $("#sorted_count").append(sorted_count);
   $("#shortlist_count").append(shortlisted_count);
   $("#offered_count").append(offered_count);
    $("#hired_count").append(hired_count);


            if(isEmpty(hired_list)) {
        $('#review_section').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 
        var count = 0;
        var status = '';
        var content_v = '';
        var company = '';
        var title = '';
        var candidates_name = '';

  $.each(hired_list, function(key, value){
    console.log(value.id);
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            candidates_name = value.candidates_name; 
            company = value.id;
            title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);

            //loop through experience to get candidates experience  
            var content_r = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#hire_section").append(content_r); 
 });


      $.each(new_review_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            candidates_name = value.candidates_name; 
                company = value.id;
                title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
            company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
                // $('#e').append(newapplication_content);  
       $("#review_section").append(newapplication_content); 


        count++;
        // content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });
  });
 
    });

   @endforeach



@foreach($shortlisted_list as $shortlisted)
  $('#savedescription{{$shortlisted->id}}').click(function() {
    alert('Rejected shortlisted hereeerereerexxxxxxxxxxx'); 
         
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/reject_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$shortlisted->id}}]').val(),
                'application_id':$('input[name=application_id{{$shortlisted->id}}]').val(),
                'user_id':$('input[name=user_id{{$shortlisted->id}}]').val(),
                'job_id':$('input[name=job_id{{$shortlisted->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
             $('#review_count').empty();
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty();
            $("#applicants_list").empty(); 
            $("#move_to").empty();
            $("#review_section").empty();
            $("#reject_section").empty();
            $("#shortlist_section").empty();

         //window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
        var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var review_list = data.review_list;
        var new_reject_list = data.new_reject_list;
        var new_shortlisted = data.new_shortlisted;
        console.log(rejected);
        console.log(newapplication_list);

            if(isEmpty(newapplication_list)) {
            $('#applicants_list_j').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
            $('#resume_body').empty();
            $('#resume_body').append('No Record(s) Found'); 
 
            }

            $("#reject_count").append(rejected);
            $('#sorted_count').append(sorted_count);
            $("#review_count").append(in_review_count);
            $("#shortlist_count").append(shortlisted_count); 

        var count = 0;
        var status = '';
        var content_v = '';
         $.each(new_reject_list, function(key, value){

        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
           company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
 });
    $.each(review_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
           company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#review_section").append(content); 
      
 });
        $.each(new_shortlisted, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
           company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#shortlist_section").append(content); 
      
 });

      $.each(newapplication_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
           company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  
        // $("#review_section").append(content); 


        count++;
        content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });
          
 
  });
 
    });
 
    $('#in_review{{$shortlisted->id}}').click(function() {
        alert('in_review shortlisted');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/review_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$shortlisted->id}}]').val(),
                'application_id':$('input[name=application_id{{$shortlisted->id}}]').val(),
                'user_id':$('input[name=user_id{{$shortlisted->id}}]').val(),
                'job_id':$('input[name=job_id{{$shortlisted->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $('#review_count').empty();
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty();
            $("#applicants_list").empty(); 
            $("#move_to").empty();
            $("#review_section").empty();
            $("#reject_section").empty();
            $("#hired_count").empty();
            $("#shortlist_section").empty();
         //window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var new_reject_list = data.new_reject_list;
        var review_list = data.review_list;
        var hired_count = data.hired_count;
        var shortlisted_list = data.shortlisted_list;
        var work_experiences = data.work_experiences;
        console.log(rejected);
        console.log(newapplication_list);
        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $('#sorted_count').append(sorted_count);
        $('#shortlist_count').append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hired_count").append(hired_count);

        if(isEmpty(newapplication_list)) {
        $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 

        var count = 0;
        var status = '';
        var content_v = '';
// // update rejected List
 $.each(new_reject_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
           company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
 });
// update In-review List
  $.each(review_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
           company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#review_section").append(content); 
 });
   $.each(shortlisted_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
           company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#shortlist_section").append(content); 
 });

 
      $.each(newapplication_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
           company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  
        // $("#review_section").append(content); 


        count++;
        content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });


  });
 
    });

   $('#shortlist{{$shortlisted->id}}').click(function() {
        alert('shortlist...s dddddddddddddddd');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/shortlist_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$shortlisted->id}}]').val(),
                'application_id':$('input[name=application_id{{$shortlisted->id}}]').val(),
                'user_id':$('input[name=user_id{{$shortlisted->id}}]').val(),
                'job_id':$('input[name=job_id{{$shortlisted->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
                $('#review_count').empty();   
                $('#reject_count').empty(); 
                $('#sorted_count').empty();
                $('#shortlist_count').empty();
                $("#offered_count").empty(); 
                $("#hire_count").empty();  

       //window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hire_count = data.hire_count;

        console.log(in_review_count);
        console.log(sorted_count);
        console.log(rejected);
    $("#reject_count").append(rejected);
    $("#review_count").append(in_review_count);
    $("#sorted_count").append(sorted_count);
   $("#shortlist_count").append(shortlisted_count); 
  $("#offered_count").append(offered_count);
   $("#hire_count").append(hire_count);

  });
 
    });

   $('#offered{{$shortlisted->id}}').click(function() {
        alert('From shortlist, make na offer');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/offered_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$shortlisted->id}}]').val(),
                'application_id':$('input[name=application_id{{$shortlisted->id}}]').val(),
                'user_id':$('input[name=user_id{{$shortlisted->id}}]').val(),
                'job_id':$('input[name=job_id{{$shortlisted->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $("#review_count").empty();   
            $("#reject_count").empty(); 
            $("#sorted_count").empty();
            $("#shortlist_count").empty(); 
            $("#offered_count").empty();
            $("#hired_count").empty();   
            $("#shortlist_section").empty(); 
            $("#offered_section").empty();  
    
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hired_count = data.hired_count;

        var newshortlist = data.shortlisted_list; 
        var new_offered_list = data.new_offered_list;
        var work_experiences = data.work_experiences

        console.log(in_review_count);
        console.log(sorted_count);
        console.log(rejected);

        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $("#sorted_count").append(sorted_count);
        $("#shortlist_count").append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hired_count").append(hired_count);

        console.log(rejected);
        console.log(newshortlist); 

        if(isEmpty(newshortlist)) {
        $('#shortlist_section').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 

        var count = 0;
        var status = '';
        var content_v = '';
// // update rejected List
 $.each(newshortlist, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#shortlist_section").append(content); 
 });
// update In-review List
  $.each(new_offered_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
            company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content_r = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#offered_section").append(content_r); 
 });

 


  });
 
    });
   
$('#hire{{$shortlisted->id}}').click(function() {
        alert('hire now');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/hire_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$shortlisted->id}}]').val(),
                'application_id':$('input[name=application_id{{$shortlisted->id}}]').val(),
                'user_id':$('input[name=user_id{{$shortlisted->id}}]').val(),
                'job_id':$('input[name=job_id{{$shortlisted->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
                $("#review_count").empty();   
                $("#reject_count").empty(); 
                $("#sorted_count").empty();
                $("#shortlist_count").empty(); 
                $("#offered_count").empty();
                $("#hire_count").empty();  

        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hired_count = data.hired_count;
        var newapplication_list = data.review_list;
        var hired_list = data.hired_list;
        var offer_list = data.offer_list;

        console.log(in_review_count);
        console.log(sorted_count);
        console.log(hire_count);
            $("#reject_count").append(rejected);
            $("#review_count").append(in_review_count);
            $("#sorted_count").append(sorted_count);
            $("#shortlist_count").append(shortlisted_count);
            $("#offered_count").append(offered_count);
            $("#hired_count").append(hired_count);

  if(isEmpty(newapplication_list)) {
            $('#applicants_list_j').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
            $('#resume_body').empty();
            $('#resume_body').append('No Record(s) Found'); 
            }

            $("#reject_count").append(rejected);
            $('#sorted_count').append(sorted_count);
            $("#review_count").append(in_review_count);
            $("#shortlist_count").append(shortlisted_count); 

        var count = 0;
        var status = '';
        var content_v = '';
        var company = '';
        var title = '';

        // update Hired List
         $.each(hired_list, function(key, value){

        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
              company = value.id;
              title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
            company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
 });
         // update Offerlist
    $.each(review_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
            company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#review_section").append(content); 
      
 });

      $.each(newapplication_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
            company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  
        // $("#review_section").append(content); 


        count++;
        content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });
          

  });
 
    });
@endforeach

@foreach($offered_list as $offered)

 $('#savedescription{{$offered->id}}').click(function() {
    alert('Rejected offered hereeerereerexxxxxxxxxxx'); 
         
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/reject_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$offered->id}}]').val(),
                'application_id':$('input[name=application_id{{$offered->id}}]').val(),
                'user_id':$('input[name=user_id{{$offered->id}}]').val(),
                'job_id':$('input[name=job_id{{$offered->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
             $('#review_count').empty();
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty();
            $("#applicants_list").empty(); 
            $("#move_to").empty();
            $("#review_section").empty();
            $("#reject_section").empty();

         window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
        var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var review_list = data.review_list;
        var new_reject_list = data.new_reject_list;
        console.log(rejected);
        console.log(newapplication_list);

            if(isEmpty(newapplication_list)) {
            $('#applicants_list_j').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
            $('#resume_body').empty();
            $('#resume_body').append('No Record(s) Found'); 
 
            }

            $("#reject_count").append(rejected);
            $('#sorted_count').append(sorted_count);
            $("#review_count").append(in_review_count);
            $("#shortlist_count").append(shortlisted_count); 

        var count = 0;
        var status = '';
        var content_v = '';
         $.each(new_reject_list, function(key, value){

        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
 });
    $.each(review_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#review_section").append(content); 
      
 });

      $.each(newapplication_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  
        // $("#review_section").append(content); 


        count++;
        content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });
          
 
  });
 
    });
 
    $('#in_review{{$offered->id}}').click(function() {
        alert('in_review offered nowsssssssssssssssssssss');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/review_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$offered->id}}]').val(),
                'application_id':$('input[name=application_id{{$offered->id}}]').val(),
                'user_id':$('input[name=user_id{{$offered->id}}]').val(),
                'job_id':$('input[name=job_id{{$offered->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $('#review_count').empty();
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty();
            $("#applicants_list").empty(); 
            $("#move_to").empty();
            $("#review_section").empty();
            $("#reject_section").empty();
         window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var new_reject_list = data.new_reject_list;
        var new_reivew_list = data.new_reivew_list;
        var hired_count = data.hired_count;
        console.log(rejected);
        console.log(newapplication_list);
        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $('#sorted_count').append(sorted_count);
        $('#shortlist_count').append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hired_count").append(hired_count);

        if(isEmpty(newapplication_list)) {
        $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 

        var count = 0;
        var status = '';
        var content_v = '';
// // update rejected List
 $.each(new_reject_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
 });
// update In-review List
  $.each(new_reivew_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content_r = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content_r); 
 });


      $.each(newapplication_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  
        // $("#review_section").append(content); 


        count++;
        content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });


  });
 
    });

   $('#shortlist{{$offered->id}}').click(function() {
        alert('shortlist...s dddddddddddddddd');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/shortlist_appllicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$offered->id}}]').val(),
                'application_id':$('input[name=application_id{{$offered->id}}]').val(),
                'user_id':$('input[name=user_id{{$offered->id}}]').val(),
                'job_id':$('input[name=job_id{{$offered->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $('#review_count').empty();   
            $('#reject_count').empty(); 
           $('#sorted_count').empty();
           $('#shortlist_count').empty();
             $("#offered_count").empty(); 
            $("#hire_count").empty();  

       window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hire_count = data.hire_count;

        console.log(in_review_count);
        console.log(sorted_count);
        console.log(rejected);
    $("#reject_count").append(rejected);
    $("#review_count").append(in_review_count);
    $("#sorted_count").append(sorted_count);
   $("#shortlist_count").append(shortlisted_count); 
  $("#offered_count").append(offered_count);
   $("#hire_count").append(hire_count);

  });
 
    });



   $('#offered{{$offered->id}}').click(function() {
        alert('Offered');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/offered_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$offered->id}}]').val(),
                'application_id':$('input[name=application_id{{$offered->id}}]').val(),
                'user_id':$('input[name=user_id{{$offered->id}}]').val(),
                'job_id':$('input[name=job_id{{$offered->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $("#review_count").empty();   
            $("#reject_count").empty(); 
           $("#sorted_count").empty();
           $("#shortlist_count").empty(); 
           $("#offered_count").empty();
            $("#hire_count").empty();   

        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hire_count = data.hire_count;

        console.log(in_review_count);
        console.log(sorted_count);
        console.log(rejected);
    $("#reject_count").append(rejected);
    $("#review_count").append(in_review_count);
    $("#sorted_count").append(sorted_count);
   $("#shortlist_count").append(shortlisted_count);
   $("#offered_count").append(offered_count);
    $("#hire_count").append(hire_count);

  });
 
    });
   
$('#hire{{$offered->id}}').click(function() {
        alert('hire now offered');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/hire_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$offered->id}}]').val(),
                'application_id':$('input[name=application_id{{$offered->id}}]').val(),
                'user_id':$('input[name=user_id{{$offered->id}}]').val(),
                'job_id':$('input[name=job_id{{$offered->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $("#review_count").empty();   
            $("#reject_count").empty(); 
           $("#sorted_count").empty();
           $("#shortlist_count").empty(); 
           $("#offered_count").empty();
           $("#hired_count").empty();
           $("#hire_section").empty();
           $("#offered_section").empty();    
           

        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hired_count = data.hired_count; 
        var hired_list = data.hired_list;
        var newoffered_list = data.newoffered_list; 
        var work_experiences = data.work_experiences;
  
     
        if(isEmpty(newoffered_list)) {
        $('#offered_section').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 

    console.log(rejected); 
    console.log(in_review_count);
    console.log(sorted_count);
    console.log(hired_count);
        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $("#sorted_count").append(sorted_count);
        $("#shortlist_count").append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hired_count").append(hired_count);
        var company = '';
        var title = '';

      $.each(newoffered_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
                company = value.id;
                title = value.id;
            var tag_id = value.tag_id;
 
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#offered_section').append(newapplication_content);  
        // $("#review_section").append(content); 
  
        });


            $.each(hired_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
                company = value.id;
                title = value.id;
            var tag_id = value.tag_id;
 
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#hire_section').append(newapplication_content);  
        // $("#review_section").append(content); 
  
        });

  });
 
    });

@endforeach

@foreach($hired_list as $hired)
  $('#savedescription{{$hired->id}}').click(function() {
 alert('Rejected From Hire'); 
 
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/reject_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$hired->id}}]').val(),
                'application_id':$('input[name=application_id{{$hired->id}}]').val(),
                'user_id':$('input[name=user_id{{$hired->id}}]').val(),
                'job_id':$('input[name=job_id{{$hired->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
             $('#review_count').empty();
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty();
            $("#applicants_list").empty(); 
            $("#move_to").empty();
            $("#review_section").empty();
            $("#reject_section").empty();

        //window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
        var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var new_reject_list = data.new_reject_list;
        var work_experiences = data.work_experiences;
        var hired_list = data.hired_list;
        console.log(rejected);
        console.log(newapplication_list);

            if(isEmpty(newapplication_list)) {
            $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
            $('#resume_body').empty();
            $('#resume_body').append('No Record(s) Found'); 
 
            }

            $("#reject_count").append(rejected);
            $('#sorted_count').append(sorted_count);
            $("#review_count").append(in_review_count);
            $("#shortlist_count").append(shortlisted_count); 

        var count = 0;
        var status = '';
        var content_v = '';
 $.each(new_reject_list, function(key, value){
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
             content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
 });

 $("#move_to").append(content_v); 

      $.each(newapplication_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  
        // $("#review_section").append(content); 


        count++;
        content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });
          
 
  });
 
    });
    $('#in_review{{$hired->id}}').click(function() {
        alert('in_reviewssss');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/review_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$hired->id}}]').val(),
                'application_id':$('input[name=application_id{{$hired->id}}]').val(),
                'user_id':$('input[name=user_id{{$hired->id}}]').val(),
                'job_id':$('input[name=job_id{{$hired->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $('#review_count').empty();
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty();
            $("#applicants_list").empty(); 
            $("#move_to").empty();
            $("#review_section").empty();
            $("#reject_section").empty();
          window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var new_reject_list = data.new_reject_list;
        var new_reivew_list = data.new_reivew_list;
        console.log(rejected);
        console.log(newapplication_list);
        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $('#sorted_count').append(sorted_count);
        $('#shortlist_count').append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hire_count").append(hire_count);

        if(isEmpty(newapplication_list)) {
        $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 

        var count = 0;
        var status = '';
        var content_v = '';
// // update rejected List
 $.each(new_reject_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
 });
// update In-review List
  $.each(new_reivew_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content_r = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content_r); 
 });


      $.each(newapplication_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  
        // $("#review_section").append(content); 


        count++;
        content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });
    $("#move_to").append(content_v); 



  });
 
    });

   $('#shortlist{{$hired->id}}').click(function() {
        alert('shortlist');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/shortlist_appllicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$hired->id}}]').val(),
                'application_id':$('input[name=application_id{{$hired->id}}]').val(),
                'user_id':$('input[name=user_id{{$hired->id}}]').val(),
                'job_id':$('input[name=job_id{{$hired->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $('#review_count').empty();   
            $('#reject_count').empty(); 
           $('#sorted_count').empty();
           $('#shortlist_count').empty();
             $("#offered_count").empty(); 
            $("#hire_count").empty();  

        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hire_count = data.hire_count;

        console.log(in_review_count);
        console.log(sorted_count);
        console.log(rejected);
    $("#reject_count").append(rejected);
    $("#review_count").append(in_review_count);
    $("#sorted_count").append(sorted_count);
   $("#shortlist_count").append(shortlisted_count); 
  $("#offered_count").append(offered_count);
   $("#hire_count").append(hire_count);

  });
 
    });



   $('#offered{{$hired->id}}').click(function() {
        alert('Offered');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/offered_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$hired->id}}]').val(),
                'application_id':$('input[name=application_id{{$hired->id}}]').val(),
                'user_id':$('input[name=user_id{{$hired->id}}]').val(),
                'job_id':$('input[name=job_id{{$hired->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $("#review_count").empty();   
            $("#reject_count").empty(); 
           $("#sorted_count").empty();
           $("#shortlist_count").empty(); 
           $("#offered_count").empty();
            $("#hire_count").empty();   

          window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hire_count = data.hire_count;

        console.log(in_review_count);
        console.log(sorted_count);
        console.log(rejected);
    $("#reject_count").append(rejected);
    $("#review_count").append(in_review_count);
    $("#sorted_count").append(sorted_count);
   $("#shortlist_count").append(shortlisted_count);
   $("#offered_count").append(offered_count);
    $("#hire_count").append(hire_count);

  });
 
    });
   
$('#hire{{$hired->id}}').click(function() {
        alert('Hire Now');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/hire_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$hired->id}}]').val(),
                'application_id':$('input[name=application_id{{$hired->id}}]').val(),
                'user_id':$('input[name=user_id{{$hired->id}}]').val(),
                'job_id':$('input[name=job_id{{$hired->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $("#review_count").empty();   
            $("#reject_count").empty(); 
           $("#sorted_count").empty();
           $("#shortlist_count").empty(); 
           $("#offered_count").empty();
           $("#hire_count").empty();  

         window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hired_count = data.hired_count;
        var in_review_count = data.review_count;
        var newapplication_list = data.newapplication_list;
        var new_reject_list = data.new_reject_list;
        var review_list = data.review_list;


        console.log(in_review_count);
        console.log(sorted_count);
        console.log(rejected);
        console.log(review_list);
        console.log(newapplication_list);
        
        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $("#sorted_count").append(sorted_count);
        $("#shortlist_count").append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hired_count").append(hired_count);

  

        if(isEmpty(newapplication_list)) {
        $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 

        var count = 0;
        var status = '';
        var content_v = '';
// // update rejected applicant List coming from in-review Tab
 $.each(hired_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
        var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
 });

//   applicants Resume list

// push applicants Resume list
  $.each(review_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content_r = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#review_section").append(content_r); 
 });


      $.each(newapplication_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  
        // $("#review_section").append(content); 


        count++;
        content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });
    $("#move_to").append(content_v); 


  });
 
    });


@endforeach


// Old search filter to be removed
$('#profession').change(function() {
  var values = [];
    var cboxArray = []; 
    function itemExistsChecker(cboxValue) {
          
    var len = cboxArray.length;
          
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (cboxArray[i] == cboxValue) {
          return true;
        }
      }
    }
          
    cboxArray.push(cboxValue);
  } 
   
  {
    $('#profession :checked').each(function() { 
     var cboxValue = $(this).val();
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
    console.log(cboxArray);
  }
});
 
$('#gender').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = []; 
    var location = [];
    var qualify = [];
    var job_terms = [];

    function itemExistsChecker(cboxValue) {
          
    var len = gender.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (gender[i] == cboxValue) {
          return true;
        }
      }
    }
          
    gender.push(cboxValue);
  } 
   
  {
    $('#gender :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(gender);
 
 filterByGenderd(gender,yeo_array,age,location,qualify,job_terms);
 
  }
});
 
$('#qulification').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = []; 
    var location = [];
    var job_terms = [];
    var qualify = [];
    function itemExistsChecker(cboxValue) {
          
    var len = cboxArray.length;
          
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (cboxArray[i] == cboxValue) {
          return true;
        }
      }
    }
          
    cboxArray.push(cboxValue);
  } 
    
    $('#qulification :checked').each(function() { 
     var cboxValue = $(this).val();
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
    });

  filterByGenderd(gender,yeo_array,age,location,qualify,job_terms);
 
});

 

$('#job_terms').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = []; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    function itemExistsChecker(cboxValue) {
          
    var len = job_terms.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (job_terms[i] == cboxValue) {
          return true;
        }
      }
    }
          
    job_terms.push(cboxValue);
  } 
   
  {
    $('#job_terms :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(job_terms);
 
 filterByGenderd(gender,yeo_array, age, location,qualify,job_terms);
 
  }
});
 

$('#age').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = []; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    function itemExistsChecker(cboxValue) {
          
    var len = age.length;
          
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (age[i] == cboxValue) {
          return true;
        }
      }
    }
          
    age.push(cboxValue);
  } 
  {
    $('#age :checked').each(function() {
    var cboxValue= $(this).val();

      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);

    });
    filterByGenderd(gender,yeo_array, age, location,qualify,job_terms);
    // console.log(cboxArray);
  }
});


$('#yearofexperience').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = []; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    function itemExistsChecker(cboxValue) {
          
    var len = yeo_array.length;
          
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (yeo_array[i] == cboxValue) {
          return true;
        }
      }
    }
          
    yeo_array.push(cboxValue);
  } 
   
  {
    $('#yearofexperience :checked').each(function() { 
     var cboxValue = $(this).val();
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    });  

filterByGenderd(gender,yeo_array, age,location,qualify,job_terms);
  }
});

$('#qualify').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = []; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    function itemExistsChecker(cboxValue) {
          
    var len = qualify.length;
          
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (qualify[i] == cboxValue) {
          return true;
        }
      }
    }
          
    qualify.push(cboxValue);
  } 
   
  {
    $('#qualify :checked').each(function() { 
     var cboxValue = $(this).val();
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    });  
 console.log(qualify);
filterByGenderd(gender,yeo_array, age, location,qualify,job_terms);
  }
});

$('#location').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = []; 
    var location = [];
    function itemExistsChecker(cboxValue) {
          
    var len = location.length;
          
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (location[i] == cboxValue) {
          return true;
        }
      }
    }
          
    location.push(cboxValue);
  } 
   
  {
    $('#location :checked').each(function() { 
     var cboxValue = $(this).val();
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    });  
 console.log(location);
 filterByGenderd(gender,yeo_array,age, location, job_terms);
  }
});



$('#career_level').change(function() {
  var values = [];
    var cboxArray = []; 
    function itemExistsChecker(cboxValue) {
          
    var len = cboxArray.length;
          
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (cboxArray[i] == cboxValue) {
          return true;
        }
      }
    }
          
    cboxArray.push(cboxValue);
  } 
   
  {
    $('#career_level :checked').each(function() { 
     var cboxValue = $(this).val();
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
    console.log(cboxArray);
  }
});
 
function filterByGenderd(gender, yeo, age, location, qualify, job_terms){
 // alert(location);
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/searchConditions', 
            data:{
                '_token':$('input[name=_token').val(),
                'gender':gender,
                'years_of_experience':yeo,
                'age':age,
                'location':location,
                'qualification':qualify,
                'job_terms':job_terms,
                'job_id':{{$job_id}},
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
    
             },
            success:function(data){
           // console.log(data);
           $('#applicants_list').empty();
           $('#hire_section').empty();
        // $("#industry-div").hide();
        // window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
       // $('#applicants_list').empty();
    $("#loader").hide();
    },
    }).done(function (data) {
  var code = data.applications;
  var sorted_applications = data.sorted_applications;
  var work_experiences = data.work_experiences;
  var new_hired_list = data.new_hired_list;
  var jobs_list = data.jobs_list;
  var candidates_name = '';
  var user = null;
  var resume_id = null;
  var job_id = data.job_id;

    if(isEmpty(code['data'])) {
        $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
          // $('#pages').empty();   
    }
       console.log(code['data']);
       console.log(sorted_applications); 
      console.log(job_id);
      console.log(new_hired_list);

      // hired list
      $.each(new_hired_list['data'], function(key, value){
            var id = value.id;
            resume_id = value.resume_id;
            user = value.user_id;
            var document_id = value.document_id;
            console.log(value.document_id);
            var tag_id = value.tag_id;
 
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);

  // $.each(sorted_applications, function(key, value){
    if(resume_id === value.resume_id){

        candidates_name = value.candidates_name;
    }
    
   // });
            //loop through experience to get candidates experience@foreach($documentList as $document) 
      var content ='<li class="careerfy-column-12"><a href="#tab_6_1'+value.id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        // $("#applicants_list").append(content); 
        $('#hire_section').append(content);

      });
 
 $.each(code['data'], function(key, value){
            var id = value.id;
            resume_id = value.resume_id;
            user = value.user_id;
            var document_id = value.document_id;
 //console.log(value.document_id);
            var tag_id = value.tag_id;
 
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);

  // $.each(sorted_applications, function(key, value){
    if(resume_id === value.resume_id){

        candidates_name = value.candidates_name;
    }
    
   // });
            //loop through experience to get candidates experience@foreach($documentList as $document) 
      var content ='<li class="careerfy-column-12"><a href="#tab_6_1'+value.id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#applicants_list").append(content); 
        $('#hire_section').append(content);
 });
 
  });
}


// beign unsorted section from


$('#gender_unsorted').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = gender.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (gender[i] == cboxValue) {
          return true;
        }
      }
    }
          
    gender.push(cboxValue);
  } 
   
  {
    $('#gender_unsorted :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(gender);
 
UnsortedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});


$('#location_unsorted').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = location.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (location[i] == cboxValue) {
          return true;
        }
      }
    }
          
    location.push(cboxValue);
  } 
   
  {
    $('#location_unsorted :checked').each(function() { 
     var cboxValue = $(this).val(); 
      //alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(location);
 
 UnsortedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
$('#availability_unsorted').change(function() {
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = availability.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (availability[i] == cboxValue) {
          return true;
        }
      }
    }
          
    availability.push(cboxValue);
  } 
   
  {
    $('#availability_unsorted :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(availability);
 
UnsortedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#career_level_unsorted').change(function() {
          var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = career_level.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (career_level[i] == cboxValue) {
          return true;
        }
      }
    }
          
    career_level.push(cboxValue);
  } 
   
  {
    $('#career_level_unsorted :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(career_level);
 
UnsortedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#job_terms_unsorted').change(function() {
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = career_level.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (job_terms[i] == cboxValue) {
          return true;
        }
      }
    }
          
    job_terms.push(cboxValue);
  } 
   
  {
    $('#job_terms_unsorted :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(job_terms);
 
 
UnsortedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
//

$('#age_unsorted').change(function() {
   
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

 
  {
    $('#age_unsorted :checked').each(function() { 
     age = $(this).val(); 
      //salert(age);
   
      $(this).prop('checked', true);
 
 
    }); 
   console.log(age);
 
 
UnsortedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});


 $('#yearofexperience_unsorted').change(function() {
        var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = yeo_array.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (yeo_array[i] == cboxValue) {
          return true;
        }
      }
    }
          
    yeo_array.push(cboxValue);
  } 
   
  {
    $('#yearofexperience_unsorted :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(yeo_array);
 
UnsortedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

  $('#salary_unsorted').change(function() {
   
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = salary.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (salary_hired[i] == cboxValue) {
          return true;
        }
      }
    }
          
    salary.push(cboxValue);
  } 
   
  {
    $('#salary_unsorted :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(salary);
 
UnsortedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
 
   $('#profession_unsorted').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = []; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = profession.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (profession[i] == cboxValue) {
          return true;
        }
      }
    }
          
    profession.push(cboxValue);
  } 
   
  {
    $('#profession_unsorted :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(profession);
 
UnsortedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
   $('#qualify_unsorted').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = qualify.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (profession[i] == cboxValue) {
          return true;
        }
      }
    }
          
    qualify.push(cboxValue);
  } 
   
  {
    $('#qualify_unsorted :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(qualify);
 
UnsortedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

 function UnsortedApplicantsFilter(gender, yeo, age, location, qualify, job_terms, career_level, availability, salary, profession){
    console.log(gender);
    console.log(yeo);
    console.log(age);
    console.log(location);
    console.log(qualify);
    console.log(job_terms);
    console.log(availability);
    console.log(profession);
    var check_section = 'unsorted';
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterUnsorted', 
            data:{
                '_token':$('input[name=_token').val(),
                'gender_unsorted':gender,
                'years_of_experience':yeo,
                'age':age,
                'location':location,
                'qualification':qualify,
                'job_terms':job_terms,
                'job_id':{{$job_id}},
                'check_section': check_section,
                'career_level':career_level,
                'availability':availability,
                'salary':salary,
                'profession':profession,
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
    
             },
            success:function(data){
          console.log(data); 
           $('#applicants_list').empty();
        // $("#industry-div").hide();
        // window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
       // $('#applicants_list').empty();
    $("#loader").hide();
    },
    }).done(function (data) {
  var code = data.applications;
  var sorted_applications = data.sorted_applications;
  var work_experiences = data.work_experiences;
  var default_unsorted_list = data.default_unsorted_list;
  var jobs_list = data.jobs_list;
  var candidates_name = '';
  var user = null;
  var resume_id = null;
  var job_id = data.job_id;

    if(isEmpty(code['data'])) {
        $('#applicants_list').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
          // $('#pages').empty();   
    }
       console.log(code['data']);
      console.log(job_id);
      // console.log(new_hired_list);

      // hired list
      $.each(code['data'], function(key, value){
            var id = value.id;
            resume_id = value.resume_id;
            user = value.user_id;
            var document_id = value.document_id;
            console.log(value.document_id);
            var tag_id = value.tag_id;
  if(resume_id === value.resume_id && value.sorted === 0){
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);

  // $.each(sorted_applications, function(key, value){ 
        candidates_name = value.candidates_name; 
   // });
            //loop through experience to get candidates experience@foreach($documentList as $document) 
      var content ='<li class="careerfy-column-12"><a href="#tab_6_1'+value.id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';

        $('#applicants_list').append(content);

}else{
console.log('am here');
}


      });
   
  });
}

// begin rejected


$('#gender_rejected').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = gender.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (gender[i] == cboxValue) {
          return true;
        }
      }
    }
          
    gender.push(cboxValue);
  } 
   
  {
    $('#gender_rejected :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(gender);
 
RejectedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});


$('#location_rejected').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = location.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (location[i] == cboxValue) {
          return true;
        }
      }
    }
          
    location.push(cboxValue);
  } 
   
  {
    $('#location_rejected :checked').each(function() { 
     var cboxValue = $(this).val(); 
      //alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(location);
 
 RejectedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
$('#availability_rejected').change(function() {
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = availability.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (availability[i] == cboxValue) {
          return true;
        }
      }
    }
          
    availability.push(cboxValue);
  } 
   
  {
    $('#availability_rejected :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(availability);
 
RejectedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#career_level_rejected').change(function() {
          var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = career_level.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (career_level[i] == cboxValue) {
          return true;
        }
      }
    }
          
    career_level.push(cboxValue);
  } 
   
  {
    $('#career_level_rejected :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(career_level);
 
RejectedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#job_terms_rejected').change(function() {
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = career_level.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (job_terms[i] == cboxValue) {
          return true;
        }
      }
    }
          
    job_terms.push(cboxValue);
  } 
   
  {
    $('#job_terms_rejected :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(job_terms);
 
 
RejectedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
//

$('#age_rejected').change(function() {
   
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

 
  {
    $('#age_rejected :checked').each(function() { 
     age = $(this).val(); 
      //salert(age);
   
      $(this).prop('checked', true);
 
 
    }); 
   console.log(age);
 
 
RejectedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});


 $('#yearofexperience_rejected').change(function() {
        var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = yeo_array.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (yeo_array[i] == cboxValue) {
          return true;
        }
      }
    }
          
    yeo_array.push(cboxValue);
  } 
   
  {
    $('#yearofexperience_rejected :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(yeo_array);
 
RejectedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

  $('#salary_rejected').change(function() {
   
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = salary.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (salary_hired[i] == cboxValue) {
          return true;
        }
      }
    }
          
    salary.push(cboxValue);
  } 
   
  {
    $('#salary_rejected :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(salary);
 
RejectedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
 
   $('#profession_rejected').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = []; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = profession.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (profession[i] == cboxValue) {
          return true;
        }
      }
    }
          
    profession.push(cboxValue);
  } 
   
  {
    $('#profession_rejected :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(profession);
 
RejectedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
   $('#qualify_rejected').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = qualify.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (profession[i] == cboxValue) {
          return true;
        }
      }
    }
          
    qualify.push(cboxValue);
  } 
   
  {
    $('#qualify_rejected:checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(qualify);
 
RejectedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

 function RejectedApplicantsFilter(gender, yeo, age, location, qualify, job_terms, career_level, availability, salary, profession){
    console.log(gender);
    console.log(yeo);
    console.log(age);
    console.log(location);
    console.log(qualify);
    console.log(job_terms);
    console.log(availability);
    console.log(profession);
    var check_section = 'rejected';
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterRejected', 
            data:{
                '_token':$('input[name=_token').val(),
                'gender_unsorted':gender,
                'years_of_experience':yeo,
                'age':age,
                'location':location,
                'qualification':qualify,
                'job_terms':job_terms,
                'job_id':{{$job_id}},
                'check_section': check_section,
                'career_level':career_level,
                'availability':availability,
                'salary':salary,
                'profession':profession,
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
    
             },
            success:function(data){
          console.log(data); 
           $('#reject_section').empty();
        // $("#industry-div").hide();
        // window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
       // $('#applicants_list').empty();
    $("#loader").hide();
    },
    }).done(function (data) {
  var code = data.applications;
  var sorted_applications = data.sorted_applications;
  var work_experiences = data.work_experiences;
  var default_unsorted_list = data.default_unsorted_list;
  var jobs_list = data.jobs_list;
  var candidates_name = '';
  var user = null;
  var resume_id = null;
  var job_id = data.job_id;

    if(isEmpty(code['data'])) {
        $('#reject_section').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
          // $('#pages').empty();   
    }
    console.log(code['data']);
    console.log(job_id);
      // console.log(new_hired_list);

      // hired list
      $.each(code['data'], function(key, value){
            var id = value.id;
            resume_id = value.resume_id;
            user = value.user_id;
            var document_id = value.document_id;
            console.log(value.document_id);
            var tag_id = value.tag_id;
  if(resume_id === value.resume_id && value.rejected === 1){
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);

  // $.each(sorted_applications, function(key, value){ 
        candidates_name = value.candidates_name; 
   // });
            //loop through experience to get candidates experience@foreach($documentList as $document) 
      var content ='<li class="careerfy-column-12"><a href="#tab_6_1'+value.id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';

        $('#reject_section').append(content);

}else{
console.log('am here');

}


      });
   
  });
}

// in review Section 


$('#gender_inreview').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = gender.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (gender[i] == cboxValue) {
          return true;
        }
      }
    }
          
    gender.push(cboxValue);
  } 
   
  {
    $('#gender_inreview :checked').each(function() { 
     var cboxValue = $(this).val(); 
  alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(gender);
 
InReviewApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});


$('#location_inreview').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = location.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (location[i] == cboxValue) {
          return true;
        }
      }
    }
          
    location.push(cboxValue);
  } 
   
  {
    $('#location_inreview :checked').each(function() { 
     var cboxValue = $(this).val(); 
      //alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(location);
 
 InReviewApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#availability_inreview').change(function() {
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = availability.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (availability[i] == cboxValue) {
          return true;
        }
      }
    }
          
    availability.push(cboxValue);
  } 
   
  {
    $('#availability_inreview :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(availability);
 
InReviewApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#career_level_inreview').change(function() {
          var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = career_level.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (career_level[i] == cboxValue) {
          return true;
        }
      }
    }
          
    career_level.push(cboxValue);
  } 
   
  {
    $('#career_level_inreview :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(career_level);
 
InReviewApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#job_terms_inreview').change(function() {
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = career_level.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (job_terms[i] == cboxValue) {
          return true;
        }
      }
    }
          
    job_terms.push(cboxValue);
  } 
   
  {
    $('#job_terms_inreview:checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(job_terms);
 
 
InReviewApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
//

$('#age_inreview').change(function() {
   
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

 
  {
    $('#age_inreview :checked').each(function() { 
     age = $(this).val(); 
      //salert(age);
   
      $(this).prop('checked', true);
 
 
    }); 
   console.log(age);
 
 
InReviewApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});


 $('#yearofexperience_inreview').change(function() {
        var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = yeo_array.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (yeo_array[i] == cboxValue) {
          return true;
        }
      }
    }
          
    yeo_array.push(cboxValue);
  } 
   
  {
    $('#yearofexperience_inreview :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(yeo_array);
 
InReviewApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

  $('#salary_inreview').change(function() {
   
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = salary.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (salary_hired[i] == cboxValue) {
          return true;
        }
      }
    }
          
    salary.push(cboxValue);
  } 
   
  {
    $('#salary_inreview :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(salary);
 
InReviewApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
 
   $('#profession_inreview').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = []; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = profession.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (profession[i] == cboxValue) {
          return true;
        }
      }
    }
          
    profession.push(cboxValue);
  } 
   
  {
    $('#profession_inreview :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(profession);
 
InReviewApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
   $('#qualify_inreview').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = qualify.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (profession[i] == cboxValue) {
          return true;
        }
      }
    }
          
    qualify.push(cboxValue);
  } 
   
  {
    $('#qualify_inreview:checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(qualify);
 
InReviewApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

 function InReviewApplicantsFilter(gender, yeo, age, location, qualify, job_terms, career_level, availability, salary, profession){
    console.log(gender);
    // console.log(yeo);
    // console.log(age);
    // console.log(location);
    // console.log(qualify);
    // console.log(job_terms);
    // console.log(availability);
    // console.log(profession);
    var check_section = 'inreview';
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterInReview', 
            data:{
                '_token':$('input[name=_token').val(),
                'gender':gender,
                'years_of_experience':yeo,
                'age':age,
                'location':location,
                'qualification':qualify,
                'job_terms':job_terms,
                'job_id':{{$job_id}},
                'check_section': check_section,
                'career_level':career_level,
                'availability':availability,
                'salary':salary,
                'profession':profession,
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
    
             },
            success:function(data){
          console.log(data); 

           $('#review_section').empty();

        // $("#industry-div").hide();
        // window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
       // $('#applicants_list').empty();
    $("#loader").hide();
    },
    }).done(function (data) {
  var code = data.applications;
  var sorted_applications = data.sorted_applications;
  var work_experiences = data.work_experiences;
  var default_unsorted_list = data.default_unsorted_list;
  var jobs_list = data.jobs_list;
  var candidates_name = '';
  var user = null;
  var resume_id = null;
  var job_id = data.job_id;

    if(isEmpty(code['data'])) {
        $('#review_section').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
          // $('#pages').empty();   
    }
       console.log(code['data']);
      console.log(job_id);
      // console.log(new_hired_list);

      // hired list
      $.each(code['data'], function(key, value){
            var id = value.id;
            resume_id = value.resume_id;
            user = value.user_id;
            var document_id = value.document_id;
            console.log(value.document_id);
            var tag_id = value.tag_id;
  if(resume_id === value.resume_id && value.in_review === 1){
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);

  // $.each(sorted_applications, function(key, value){ 
        candidates_name = value.candidates_name; 
   // });
            //loop through experience to get candidates experience@foreach($documentList as $document) 
      var content ='<li class="careerfy-column-12"><a href="#tab_6_1'+value.id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';

        $('#review_section').append(content);

}else{
console.log('am here');
}


      });
   
  });
}


// begin Offered

$('#gender_offered').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = gender.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (gender[i] == cboxValue) {
          return true;
        }
      }
    }
          
    gender.push(cboxValue);
  } 
   
  {
    $('#gender_offered :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }

    }); 
   console.log(gender);
 
OfferedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});


$('#location_offered').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = location.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (location[i] == cboxValue) {
          return true;
        }
      }
    }
          
    location.push(cboxValue);
  } 
   
  {
    $('#location_offered :checked').each(function() { 
     var cboxValue = $(this).val(); 
      //alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(location);
 
 OfferedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#availability_offered').change(function() {
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = availability.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (availability[i] == cboxValue) {
          return true;
        }
      }
    }
          
    availability.push(cboxValue);
  } 
   
  {
    $('#availability_offered :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(availability);
 
OfferedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#career_level_offered').change(function() {
          var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = career_level.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (career_level[i] == cboxValue) {
          return true;
        }
      }
    }
          
    career_level.push(cboxValue);
  } 
   
  {
    $('#career_level_offered :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(career_level);
 
OfferedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#job_terms_offered').change(function() {
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = career_level.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (job_terms[i] == cboxValue) {
          return true;
        }
      }
    }
          
    job_terms.push(cboxValue);
  } 
   
  {
    $('#job_terms_offered:checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(job_terms);
 
 
OfferedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
//

$('#age_offered').change(function() {
   
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

 
  {
    $('#age_offered :checked').each(function() { 
     age = $(this).val(); 
      //salert(age);
   
      $(this).prop('checked', true);
 
 
    }); 
   console.log(age);
 
 
OfferedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});


 $('#yearofexperience_offered').change(function() {
        var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = yeo_array.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (yeo_array[i] == cboxValue) {
          return true;
        }
      }
    }
          
    yeo_array.push(cboxValue);
  } 
   
  {
    $('#yearofexperience_offered :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(yeo_array);
 
OfferedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

  $('#salary_offered').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = salary.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (salary_hired[i] == cboxValue) {
          return true;
        }
      }
    }
          
    salary.push(cboxValue);
  } 
   
  {
    $('#salary_offered:checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(salary);
 
OfferedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
 
   $('#profession_offered').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = []; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = profession.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (profession[i] == cboxValue) {
          return true;
        }
      }
    }
          
    profession.push(cboxValue);
  } 
   
  {
    $('#profession_offered :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(profession);
 
OfferedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
   $('#qualify_offered').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = qualify.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (profession[i] == cboxValue) {
          return true;
        }
      }
    }
          
    qualify.push(cboxValue);
  } 
   
  {
    $('#qualify_offered :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(qualify);
 
OfferedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

 function OfferedApplicantsFilter(gender, yeo, age, location, qualify, job_terms, career_level, availability, salary, profession){
    console.log(gender);
    console.log(yeo);
    console.log(age);
    console.log(location);
    console.log(qualify);
    console.log(job_terms);
    console.log(availability);
    console.log(profession);
    var check_section = 'offered';
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterOffered', 
            data:{
                '_token':$('input[name=_token').val(),
                'gender':gender,
                'years_of_experience':yeo,
                'age':age,
                'location':location,
                'qualification':qualify,
                'job_terms':job_terms,
                'job_id':{{$job_id}},
                'check_section': check_section,
                'career_level':career_level,
                'availability':availability,
                'salary':salary,
                'profession':profession,
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
    
             },
            success:function(data){
          console.log(data); 
           $('#offered_section').empty();
        // $("#industry-div").hide();
        // window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
       // $('#applicants_list').empty();
    $("#loader").hide();
    },
    }).done(function (data) {
  var code = data.applications;
  var sorted_applications = data.sorted_applications;
  var work_experiences = data.work_experiences;
  var default_unsorted_list = data.default_unsorted_list;
  var jobs_list = data.jobs_list;
  var candidates_name = '';
  var user = null;
  var resume_id = null;
  var job_id = data.job_id;

    if(isEmpty(code['data'])) {
        $('#offered_section').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
          // $('#pages').empty();   
    }
            console.log(code['data']);
            console.log(job_id); 
      // hired list
      $.each(code['data'], function(key, value){
            var id = value.id;
            resume_id = value.resume_id;
            user = value.user_id;
            var document_id = value.document_id;
            console.log(value.document_id);
            var tag_id = value.tag_id;
  if(value.offered === 1){
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
 
    candidates_name = value.candidates_name; 
 
            //loop through experience to get candidates experience@foreach($documentList as $document) 
      var content ='<li class="careerfy-column-12"><a href="#tab_6_1'+value.id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';

        $('#offered_section').append(content);

}else{
console.log('am here');
}


      });
   
  });
}


// begin Shortlist Section

$('#gender_shortlist').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = gender.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (gender[i] == cboxValue) {
          return true;
        }
      }
    }
          
    gender.push(cboxValue);
  } 
   
  {
    $('#gender_shortlist :checked').each(function() { 
     var cboxValue = $(this).val(); 
     alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(gender);
 
ShortlistApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});


$('#location_shortlist').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = location.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (location[i] == cboxValue) {
          return true;
        }
      }
    }
          
    location.push(cboxValue);
  } 
   
  {
    $('#location_shortlist :checked').each(function() { 
     var cboxValue = $(this).val(); 
      //alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(location);
 
 ShortlistApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#availability_shortlist').change(function() {
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = availability.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (availability[i] == cboxValue) {
          return true;
        }
      }
    }
          
    availability.push(cboxValue);
  } 
   
  {
    $('#availability_shortlist :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(availability);
 
ShortlistApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#career_level_shortlist').change(function() {
          var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = career_level.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (career_level[i] == cboxValue) {
          return true;
        }
      }
    }
          
    career_level.push(cboxValue);
  } 
   
  {
    $('#career_level_shortlist :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(career_level);
 
ShortlistApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#job_terms_shortlist').change(function() {
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = career_level.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (job_terms[i] == cboxValue) {
          return true;
        }
      }
    }
          
    job_terms.push(cboxValue);
  } 
   
  {
    $('#job_terms_shortlist :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(job_terms);
 
 
ShortlistApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
//

$('#age_inreview').change(function() {
   
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

 
  {
    $('#age_shortlist :checked').each(function() { 
     age = $(this).val(); 
      //salert(age);
   
      $(this).prop('checked', true);
 
 
    }); 
   console.log(age);
 
 
ShortlistApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});


 $('#yearofexperience_shortlist').change(function() {
        var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = yeo_array.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (yeo_array[i] == cboxValue) {
          return true;
        }
      }
    }
          
    yeo_array.push(cboxValue);
  } 
   
  {
    $('#yearofexperience_shortlist :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(yeo_array);
 
ShortlistApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

  $('#salary_shortlist').change(function() {
   
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = salary.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (salary_hired[i] == cboxValue) {
          return true;
        }
      }
    }
          
    salary.push(cboxValue);
  } 
   
  {
    $('#salary_shortlist :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(salary);
 
ShortlistApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
 
   $('#profession_shortlist').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = []; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = profession.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (profession[i] == cboxValue) {
          return true;
        }
      }
    }
          
    profession.push(cboxValue);
  } 
   
  {
    $('#profession_shortlist :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(profession);
 
ShortlistApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
   $('#qualify_shortlist').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = qualify.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (profession[i] == cboxValue) {
          return true;
        }
      }
    }
          
    qualify.push(cboxValue);
  } 
   
  {
    $('#qualify_shortlist:checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(qualify);
 
ShortlistApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

 function ShortlistApplicantsFilter(gender, yeo, age, location, qualify, job_terms, career_level, availability, salary, profession){
    console.log(gender);
    console.log(yeo);
    console.log(age);
    console.log(location);
    console.log(qualify);
    console.log(job_terms);
    console.log(availability);
    console.log(profession);
    var check_section = 'shortlist';
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterShortlist', 
            data:{
                '_token':$('input[name=_token').val(),
                'gender':gender,
                'years_of_experience':yeo,
                'age':age,
                'location':location,
                'qualification':qualify,
                'job_terms':job_terms,
                'job_id':{{$job_id}},
                'check_section': check_section,
                'career_level':career_level,
                'availability':availability,
                'salary':salary,
                'profession':profession,
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
    
             },
            success:function(data){
          console.log(data); 

           $('#shortlist_section').empty();
 
     },
     complete:function(data){
    // Hide image container 
       // $('#applicants_list').empty();
    $("#loader").hide();
    },
    }).done(function (data) {
  var code = data.applications;
  var sorted_applications = data.sorted_applications;
  var work_experiences = data.work_experiences;
  var default_unsorted_list = data.default_unsorted_list;
  var jobs_list = data.jobs_list;
  var candidates_name = '';
  var user = null;
  var resume_id = null;
  var job_id = data.job_id;

    if(isEmpty(code['data'])) {
        $('#shortlist_section').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
       
    }
        console.log(code['data']);
        console.log(job_id);
      // console.log(new_hired_list);

      // hired list
      $.each(code['data'], function(key, value){
            var id = value.id;
            resume_id = value.resume_id;
            user = value.user_id;
            var document_id = value.document_id;
           
            var tag_id = value.tag_id;
  if(value.shortlisted === 1){
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);

  // $.each(sorted_applications, function(key, value){ 
        candidates_name = value.candidates_name; 
   // });
            //loop through experience to get candidates experience@foreach($documentList as $document) 
      var content ='<li class="careerfy-column-12"><a href="#tab_6_1'+value.id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';

        $('#shortlist_section').append(content);

}else{
console.log('am here');
}

      });
   
  });
}



// begin Hired Section /// 
$('#gender_hired').change(function() {
   
       var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary_hired = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = gender.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (gender[i] == cboxValue) {
          return true;
        }
      }
    }
          
    gender.push(cboxValue);
  } 
   
  {
    $('#gender_hired :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(gender);
 
HireApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary_hired, profession);
 
  }
});


$('#location_hired').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary_hired = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = location.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (location[i] == cboxValue) {
          return true;
        }
      }
    }
          
    location.push(cboxValue);
  } 
   
  {
    $('#location_hired :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(location);
 
HireApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary_hired, profession);
 
  }
});
$('#availability_hired').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary_hired = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = availability.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (availability[i] == cboxValue) {
          return true;
        }
      }
    }
          
    availability.push(cboxValue);
  } 
   
  {
    $('#availability_hired :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(availability);
 
HireApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary_hired, profession);
 
  }
});

$('#career_level_hired').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary_hired = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = career_level.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (career_level[i] == cboxValue) {
          return true;
        }
      }
    }
          
    career_level.push(cboxValue);
  } 
   
  {
    $('#career_level_hired :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(career_level);
 
HireApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary_hired, profession);
 
  }
});

$('#job_terms_hired').change(function() {
     var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary_hired = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = career_level.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (job_terms[i] == cboxValue) {
          return true;
        }
      }
    }
          
    job_terms.push(cboxValue);
  } 
   
  {
    $('#job_terms_hired :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(job_terms);
 
HireApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary_hired, profession);
 
  }
});
//

$('#age_hired').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary_hired = [];
    var career_level = [];
    var availability = [];
    var profession = [];

 
  {
    $('#age_hired :checked').each(function() { 
     age = $(this).val(); 
      //salert(age);
   
      $(this).prop('checked', true);
 
 
    }); 
   console.log(age);
 
HireApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary_hired, profession);
 
  }
});


 $('#yearofexperience_hired').change(function() {
     var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary_hired = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = yeo_array.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (yeo_array[i] == cboxValue) {
          return true;
        }
      }
    }
          
    yeo_array.push(cboxValue);
  } 
   
  {
    $('#yearofexperience_hired :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(yeo_array);
 
HireApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary_hired, profession);
 
  }
});

  $('#salary_hired').change(function() {
   
     var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary_hired = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = salary_hired.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (salary_hired[i] == cboxValue) {
          return true;
        }
      }
    }
          
    salary_hired.push(cboxValue);
  } 
   
  {
    $('#salary_hired :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(salary_hired);
 
HireApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary_hired, profession);
 
  }
});
 
   $('#profession_hired').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary_hired = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = profession.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (profession[i] == cboxValue) {
          return true;
        }
      }
    }
          
    profession.push(cboxValue);
  } 
   
  {
    $('#profession_hired :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(profession);
 
HireApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary_hired, profession);
 
  }
});
   $('#qualify_hired').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary_hired = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = qualify.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (profession[i] == cboxValue) {
          return true;
        }
      }
    }
          
    qualify.push(cboxValue);
  } 
   
  {
    $('#qualify_hired :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(qualify);
 
HireApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary_hired, profession);
 
  }
});

 function HireApplicantsFilter(gender, yeo, age, location, qualify, job_terms, career_level, availability, salary_hired, profession){
    console.log(gender);
    console.log(yeo);
    console.log(age);
    console.log(location);
    console.log(qualify);
    console.log(job_terms);
    console.log(availability);
    console.log(profession);
    var check_section = 'hired';
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/searchConditions', 
            data:{
                '_token':$('input[name=_token').val(),
                'gender_hired':gender,
                'years_of_experience':yeo,
                'age':age,
                'location':location,
                'qualification':qualify,
                'job_terms':job_terms,
                'job_id':{{$job_id}},
                'check_section': check_section,
                'career_level':career_level,
                'availability':availability,
                'salary':salary_hired,
                'profession':profession,
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
    
             },
            success:function(data){
          console.log(data); 
           $('#hire_section').empty();
        // $("#industry-div").hide();
        // window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
       // $('#applicants_list').empty();
    $("#loader").hide();
    },
    }).done(function (data) {
  var code = data.applications;
  var sorted_applications = data.sorted_applications;
  var work_experiences = data.work_experiences;
  var new_hired_list = data.new_hired_list;
  var jobs_list = data.jobs_list;
  var candidates_name = '';
  var user = null;
  var resume_id = null;
  var job_id = data.job_id;

    if(isEmpty(code['data'])) {
        $('#hire_section').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
          // $('#pages').empty();   
    }
       console.log(code['data']);
      console.log(job_id);
      // console.log(new_hired_list);

      // hired list
      $.each(code['data'], function(key, value){
            var id = value.id;
            resume_id = value.resume_id;
            user = value.user_id;
            var document_id = value.document_id;
            console.log(value.document_id);
            var tag_id = value.tag_id;
  if(resume_id === value.resume_id && value.hired === 1){
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);

  // $.each(sorted_applications, function(key, value){ 
        candidates_name = value.candidates_name; 
   // });
            //loop through experience to get candidates experience@foreach($documentList as $document) 
      var content ='<li class="careerfy-column-12"><a href="#tab_6_1'+value.id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';

        $('#hire_section').append(content);

}
      });
   
  });
}





  $(document.getElementsByName('gender1')).click(function() {
 
       // alert($('input[name=gender]:checked').val() + $('input[name=salary]:checked').val());
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterByCategory', 
            data:{
                '_token':$('input[name=_token').val(),
                'location':$('input[name=city]:checked').val(),
                'job_type':$('input[name=job]:checked').val(),
                'gender':$('input[name=gender]:checked').val(),
                'availability':$('input[name=avail]:checked').val(),
                'age':$('input[name=age]:checked').val(),
                'salary':$('input[name=salary]:checked').val(),
                'yoe':$('input[name=yoe]:checked').val(),
                'qu':$('input[name=qu]:checked').val(),
                'industry':$('input[name=industry]:checked').val(),
                'profession':$('input[name=profession]:checked').val(),
                 'career_level':$('input[name=career_level]:checked').val(),
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
    
             },
            success:function(data){
            console.log(data);
           $('#items').empty();
        // $("#industry-div").hide();
        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
 var code = data.documents_location;
    if(isEmpty(code['data'])) {
        $('#items').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
          // $('#pages').empty();   
    }
     console.log(data);
      
      // var experiences = data.work_experiences;
      // getWorkExperience(experiences);
        $.each(code['data'], function(key, value) {  
            //console.log(value.email);
            var candidates_name = value.candidates_name;
            var email = value.email;
            var user = value.user_id;
            
            //loop through experience to get candidates experience
            var content ='<li class="careerfy-column-12">  <div class="careerfy-candidate-default-wrap"><figure><a href="#"><img src="extra-images/" alt=""></a></figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2><a href="#">' +candidates_name+ '</a></h2> <ul><li> work_experiences at <a href="#" class="careerfy-candidate-default-studio">InteractiveLabs</a></li><li><i class="fa fa-map-marker"></i> Netherlands, Rotterdam</li><li><i class="careerfy-icon careerfy-envelope"></i> <a href="#">' +email+ '</a></li></ul> </div><a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a></div></div></li> <div class="space">&nbsp;</div>'; 
        $('#items').append(content);    
 
        });
 
$("#results2").append('<i class="btn-success btn-xs">'+ 's' + '</i>'); 
  });
 
    });

   $(document.getElementsByName('industry')).click(function() {
   // alert($('input[name=industry]:checked').val());
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterByCategory', 
            data:{
                '_token':$('input[name=_token').val(),
                'location':$('input[name=city]:checked').val(),
                'job_type':$('input[name=job]:checked').val(),
                'gender':$('input[name=gender]:checked').val(),
                'availability':$('input[name=avail]:checked').val(),
                'age':$('input[name=age]:checked').val(),
                'salary':$('input[name=salary]:checked').val(),
                'yoe':$('input[name=yoe]:checked').val(),
                'qu':$('input[name=qu]:checked').val(),
                'industry':$('input[name=industry]:checked').val(),
                'profession':$('input[name=profession]:checked').val(),
                 'career_level':$('input[name=career_level]:checked').val(),
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
           $('#items').empty(); 
            $('#items').hide();
         $("#industry-div").show();
        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
 var code = data.documents_location;
     if(isEmpty(code['data'])) {
        $('#items').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
          $('#pages').empty();   
    }
     console.log(data);
      // var experiences = data.work_experiences;
      // getWorkExperience(experiences);
        $.each(code['data'], function(key, value) {  
            //console.log(value.email);
            var candidates_name = value.candidates_name;
            var email = value.email;
            var user = value.user_id; 
            //loop through experience to get candidates experience
            var content ='<li class="careerfy-column-12">  <div class="careerfy-candidate-default-wrap"><figure><a href="#"><img src="" alt=""></a></figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2><a href="#">' +candidates_name+ '</a></h2> <ul><li> work_experiences at <a href="#" class="careerfy-candidate-default-studio">InteractiveLabs</a></li><li><i class="fa fa-map-marker"></i> Netherlands, Rotterdam</li><li><i class="careerfy-icon careerfy-envelope"></i> <a href="#">' +email+ '</a></li></ul> </div><a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a></div></div></li> <div class="space">&nbsp;</div>'; 
        $('#items').append(content);    
 
        });
 
$("#results2").append('<i class="btn-success btn-xs">'+ 's' + '</i>'); 
  });
 
    });


   $(document.getElementsByName('salary')).click(function() {
         //alert($('input[name=salary]:checked').val());
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterByCategory', 
            data:{
                '_token':$('input[name=_token').val(),
                'location':$('input[name=city]:checked').val(),
                'job_type':$('input[name=job]:checked').val(),
                'gender':$('input[name=gender]:checked').val(),
                'availability':$('input[name=avail]:checked').val(),
                'age':$('input[name=age]:checked').val(),
                'salary':$('input[name=salary]:checked').val(),
                'yoe':$('input[name=yoe]:checked').val(),
                'qu':$('input[name=qu]:checked').val(),
                'industry':$('input[name=industry]:checked').val(),
                'profession':$('input[name=profession]:checked').val(),
                 'career_level':$('input[name=career_level]:checked').val(),
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
           $('#items').empty();   
        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
 var code = data.documents_location;

       if(isEmpty(code['data'])) {
        $('#items').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
          $('#pages').empty();   
    }
     console.log(code['data']);
      // var experiences = data.work_experiences;
      // getWorkExperience(experiences);
        $.each(code['data'], function(key, value) {  
            //console.log(value.email);
            var candidates_name = value.candidates_name;
            var email = value.email;
            var user = value.user_id; 
            //loop through experience to get candidates experience
            var content ='<li class="careerfy-column-12">  <div class="careerfy-candidate-default-wrap"><figure><a href="#"><img src="" alt=""></a></figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2><a href="#">' +candidates_name+ '</a></h2> <ul><li> work_experiences at <a href="#" class="careerfy-candidate-default-studio">InteractiveLabs</a></li><li><i class="fa fa-map-marker"></i> Netherlands, Rotterdam</li><li><i class="careerfy-icon careerfy-envelope"></i> <a href="#">' +email+ '</a></li></ul> </div><a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a></div></div></li> <div class="space">&nbsp;</div>'; 
        $('#items').append(content);    
 
        });
 
$("#results2").append('<i class="btn-success btn-xs">'+ 's' + '</i>'); 
  });
 
    });

   $(document.getElementsByName('avail')).click(function() {
        //alert($('input[name=avail]:checked').val());
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterByCategory', 
            data:{
                '_token':$('input[name=_token').val(),
                'location':$('input[name=city]:checked').val(),
                'job_type':$('input[name=job]:checked').val(),
                'gender':$('input[name=gender]:checked').val(),
                'availability':$('input[name=avail]:checked').val(),
                'age':$('input[name=age]:checked').val(),
                'salary':$('input[name=salary]:checked').val(),
                'yoe':$('input[name=yoe]:checked').val(),
                'qu':$('input[name=qu]:checked').val(),
                'industry':$('input[name=industry]:checked').val(),
                'profession':$('input[name=profession]:checked').val(),
                 'career_level':$('input[name=career_level]:checked').val(),
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
           $('#items').empty(); 
            $('#items').hide();
         $("#industry-div").show();
        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
 var code = data.documents_location;
    if(isEmpty(code['data'])) {
        $('#items').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
          $('#pages').empty();   
    }    //  console.log(code['data']);
     console.log(data);
      // var experiences = data.work_experiences;
      // getWorkExperience(experiences);
        $.each(code['data'], function(key, value) {  
            //console.log(value.email);
            var candidates_name = value.candidates_name;
            var email = value.email;
            var user = value.user_id; 
            //loop through experience to get candidates experience
            var content ='<li class="careerfy-column-12">  <div class="careerfy-candidate-default-wrap"><figure><a href="#"><img src="" alt=""></a></figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2><a href="#">' +candidates_name+ '</a></h2> <ul><li> work_experiences at <a href="#" class="careerfy-candidate-default-studio">InteractiveLabs</a></li><li><i class="fa fa-map-marker"></i> Netherlands, Rotterdam</li><li><i class="careerfy-icon careerfy-envelope"></i> <a href="#">' +email+ '</a></li></ul> </div><a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a></div></div></li> <div class="space">&nbsp;</div>'; 
        $('#items').append(content);    
 
        });
 
$("#results2").append('<i class="btn-success btn-xs">'+ 's' + '</i>'); 
  });
 
    });

   $(document.getElementsByName('yoe')).click(function() {
        //alert($('input[name=yoe]:checked').val());
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterByCategory', 
            data:{
                '_token':$('input[name=_token').val(),
                'location':$('input[name=city]:checked').val(),
                'job_type':$('input[name=job]:checked').val(),
                'gender':$('input[name=gender]:checked').val(),
                'availability':$('input[name=avail]:checked').val(),
                'age':$('input[name=age]:checked').val(),
                'salary':$('input[name=salary]:checked').val(),
                'yoe':$('input[name=yoe]:checked').val(),
                'qu':$('input[name=salary]:checked').val(),
                'industry':$('input[name=industry]:checked').val(),
                'profession':$('input[name=profession]:checked').val(),
                 'career_level':$('input[name=career_level]:checked').val(),
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
           $('#items').empty(); 
            // $('#items').hide();
         // $("#industry-div").show();
        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
 var code = data.documents_location;
    if(isEmpty(code['data'])) {
        $('#items').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
          // $('#pages').empty();   
    }
     //console.log(data);
      // var experiences = data.work_experiences;
      // getWorkExperience(experiences);
        $.each(code['data'], function(key, value) {  
            //console.log(value.email);
            var candidates_name = value.candidates_name;
            var email = value.email;
            var user = value.user_id; 
            //loop through experience to get candidates experience
            var content ='<li class="careerfy-column-12">  <div class="careerfy-candidate-default-wrap"><figure><a href="#"><img src="" alt=""></a></figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2><a href="#">' +candidates_name+ '</a></h2> <ul><li> work_experiences at <a href="#" class="careerfy-candidate-default-studio">InteractiveLabs</a></li><li><i class="fa fa-map-marker"></i> Netherlands, Rotterdam</li><li><i class="careerfy-icon careerfy-envelope"></i> <a href="#">' +email+ '</a></li></ul> </div><a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a></div></div></li> <div class="space">&nbsp;</div>'; 
        $('#items').append(content);    
 
        });
 
$("#results2").append('<i class="btn-success btn-xs">'+ 's' + '</i>'); 
  });
 
    });  

     $(document.getElementsByName('job')).click(function() {
 
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterByCategory', 
            data:{
                '_token':$('input[name=_token').val(),
                'location':$('input[name=city]:checked').val(),
                'job_type':$('input[name=job]:checked').val(),
                'gender':$('input[name=gender]:checked').val(),
                'availability':$('input[name=avail]:checked').val(),
                'age':$('input[name=age]:checked').val(),
                'salary':$('input[name=salary]:checked').val(),
                'yoe':$('input[name=yoe]:checked').val(),
                'qu':$('input[name=salary]:checked').val(),
                'industry':$('input[name=industry]:checked').val(),
                'profession':$('input[name=profession]:checked').val(),
                 'career_level':$('input[name=career_level]:checked').val(),
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show(); 
             },
            success:function(data){
            console.log(data);
           $('#items').empty();
      $("#industry-div").hide();
        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
 var code = data.documents_location;
      console.log(code['data']);
     //console.log(data.work_experiences);

       if(isEmpty(code['data'])) {
        $('#items').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
          $('#pages').empty();   
    }
      // var experiences = data.work_experiences;
      // getWorkExperience(experiences);
    var msg = '';
        $.each(code['data'], function(key, value) {  
            //console.log(value.email);
            var candidates_name = value.candidates_name;
            var email = value.email;
            var user = value.user_id;
            
            //loop through experience to get candidates experience
            var content ='<li class="careerfy-column-12">  <div class="careerfy-candidate-default-wrap"><figure><a href="#"><img src="" alt=""></a></figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2><a href="#">' +candidates_name+ '</a></h2> <ul><li> work_experiences at <a href="#" class="careerfy-candidate-default-studio">InteractiveLabs</a></li><li><i class="fa fa-map-marker"></i> Netherlands, Rotterdam</li><li><i class="careerfy-icon careerfy-envelope"></i> <a href="#">' +email+ '</a></li></ul> </div><a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a></div></div></li> <div class="space">&nbsp;</div>'; 
            console.log(content)
        
    $('#items').append(content);  
        });

 
  });
 
    });


     $(document.getElementsByName('career_level')).click(function() {
 
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterByCategory', 
            data:{
                '_token':$('input[name=_token').val(),
                'location':$('input[name=city]:checked').val(),
                'job_type':$('input[name=job]:checked').val(),
                'gender':$('input[name=gender]:checked').val(),
                'availability':$('input[name=avail]:checked').val(),
                'age':$('input[name=age]:checked').val(),
                'salary':$('input[name=salary]:checked').val(),
                'yoe':$('input[name=yoe]:checked').val(),
                'qu':$('input[name=salary]:checked').val(),
                'industry':$('input[name=industry]:checked').val(),
                'profession':$('input[name=profession]:checked').val(),
                'career_level':$('input[name=career_level]:checked').val(),
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show(); 
             },
            success:function(data){
            console.log(data);
           $('#items').empty();
      $("#industry-div").hide();
        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
    var code = data.documents_location;
      console.log(code['data']);
     //console.log(data.work_experiences); 
       if(isEmpty(code['data'])) {
        $('#items').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
          // $('#pages').empty();   
    }
      // var experiences = data.work_experiences;
      // getWorkExperience(experiences);
        var msg = '';
        $.each(code['data'], function(key, value) {  
            //console.log(value.email);
            var candidates_name = value.candidates_name;
            var email = value.email;
            var user = value.user_id;
            
            //loop through experience to get candidates experience
            var content ='<li class="careerfy-column-12">  <div class="careerfy-candidate-default-wrap"><figure><a href="#"><img src="" alt=""></a></figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2><a href="#">' +candidates_name+ '</a></h2> <ul><li> work_experiences at <a href="#" class="careerfy-candidate-default-studio">InteractiveLabs</a></li><li><i class="fa fa-map-marker"></i> Netherlands, Rotterdam</li><li><i class="careerfy-icon careerfy-envelope"></i> <a href="#">' +email+ '</a></li></ul> </div><a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a></div></div></li> <div class="space">&nbsp;</div>'; 
            // console.log(content)
        
    $('#items').append(content);  
        });

 
  });
 
    });

//career_level


     $(document.getElementsByName('city')).click(function() {
     // var evaluation10 = document.getElementsByName('evaluation14');
  //alert($('input[name=city]:checked').val() + $('input[name=gender]:checked').val());
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // body...
  
        $.ajax({
            type:'post',
            url:'/filterByCategory', 
            data:{
            '_token':$('input[name=_token').val(),
                'location':$('input[name=city]:checked').val(),
                'job_type':$('input[name=job]:checked').val(),
                'gender':$('input[name=gender]:checked').val(),
                'availability':$('input[name=avail]:checked').val(),
                'age':$('input[name=age]:checked').val(),
                'salary':$('input[name=salary]:checked').val(),
                'yoe':$('input[name=yoe]:checked').val(),
                'qu':$('input[name=salary]:checked').val(),
                'industry':$('input[name=industry]:checked').val(),
                'profession':$('input[name=profession]:checked').val(),
                'career_level':$('input[name=career_level]:checked').val(),
            },
             beforeSend: function(){
    // Show image container
            $("#loader").show(); 
             },
            success:function(data){
             console.log(data);
            $('#items').empty();
         
        // $("#industry-div").hide();
        //  window.location.reload();
  
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
        }).done(function (data) {
     var code = data.documents_location;
      console.log(code['data']);
    // console.log(data.work_experiences);
      // var experiences = data.work_experiences;
      // getWorkExperience(experiences);

        $.each(code['data'], function(key, value) {

            //console.log(value.email);
            var candidates_name = value.candidates_name;
            var email = value.email;
            var user = value.user_id;
            
            //loop through experience to get candidates experience
            var content ='<li class="careerfy-column-12">  <div class="careerfy-candidate-default-wrap"><figure><a href="#"><img src="" alt=""></a></figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2><a href="#">' +candidates_name+ '</a></h2> <ul><li> work_experiences at <a href="#" class="careerfy-candidate-default-studio">InteractiveLabs</a></li><li><i class="fa fa-map-marker"></i> Netherlands, Rotterdam</li><li><i class="careerfy-icon careerfy-envelope"></i> <a href="#">' +email+ '</a></li></ul> </div><a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a></div></div></li> <div class="space">&nbsp;</div>'; 
        $('#items').append(content);    
        // $.each(value, function(key2, value2){ 
        // console.log(value2);
        //  $('#items').append('<option value="'+ value +'">'+ value2 +'</option>');
       // $('select[name="zemployee_payslip_type"]').append('<option value="'+ value +'">'+ value +'</option>');
        });

       

        $("#results2").append('<i class="btn-success btn-xs">'+ 's' + '</i>');
            
  });
    });




     function getWorkExperienceTitle(experiences, user) {
var title = '';
        //console.log(experiences);
           $.each(experiences, function(key2, value2) {  
            if (user === value2['userfk'] && value2['present'] === 1) {  
            console.log(value2['present']);
             // console.log(value2['userfk']);
             title = value2['position_title'];
             } 
         });

        return title;
     }


     function getWorkExperienceCompanyName(experiences, user) {
var company_name = '';
// var name_title = [];
        //console.log(experiences);
           $.each(experiences, function(key2, value2) {  
//             if ( value2['present'] === 1) {  
//             console.log(value2['present']);
//              // console.log(value2['userfk']);
//              company_name = value2['company_name'];
// // name_title = [value2.company_name, value2.position_title ];
//              } 
        if (user === value2['userfk'] && value2['present'] === 1) {  
           // console.log(user);
             // console.log(value2['userfk']);
             company_name = value2['company_name'];
             } 

         });
// console.log(name_title[0]);
        return company_name;
     }

    // function getCandidatesProfile(argument) {
    //           $.each(documents, function(key2, value) {  
    //         if (application_document_id === value.id ) {  
    //         console.log(user);
 
    //         profile = value;
    //          } 
    //      });
    //           return profile;
    // }

      $('#insert3').click(function(e) {
        
        e.preventDefault(); 
        alert($('input[name=p_section_id3]').val());

         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // body...
 
        $.ajax({
            type:'post',
            url:'/addmangereveluation', 
            data:{
                '_token':$('input[name=_token').val(),
                'e_section_id':$('input[name=p_section_id3]').val(),
                'manager_evaluates':$('textarea[name=manager_evaluates3]').val() 
            },
            success:function(data){
              console.log(data);
            location.reload();
            window.location.reload();

            },

        });
    });
 
</script>
 <script>
    <?php foreach ($applications as $key => $value): ?>
        
    
     $("#sendEmail{{$value->user_id}}").click(function(e) {
        
        e.preventDefault();  
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // body...
 
        $.ajax({
            type:'post',
            url:'/send-candidates-email', 
            data:{
                '_token':$('input[name=_token').val(),
                'email_address':$('[name=email_address{{$value->user_id}}]').val(),
                'candidate_name':$('input[name=name{{$value->user_id}}]').val(),
                'subject':$('input[name=subject{{$value->user_id}}]').val(),
                'body':$('textarea[name=body_of_email{{$value->user_id}}]').val(),
            }
            ,
              beforeSend: function(){
            //Show image container
            $("#loader").show(); 
            $(".lds-ripplee{{$value->user_id}}").show(); 
            $("#info{{$value->user_id}}").append('<i class="btn-success btn-xs" style="color:#ffffff;"> Sending email... </i>'); 
             $("#sendEmailStatus{{$value->user_id}}").hide(); 
             },

             
            success:function(data){
            console.log(data); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    $(".lds-ripplee{{$value->user_id}}").hide(); 
    $("#info{{$value->user_id}}").hide(); 

    },
}).done(function (data) { 
    var message = data.msg;
      console.log(data); 
    $('#emailsent{{$value->user_id}}').append('<i class="btn-success btn-xs" style="color:#ffffff;"> '+message+' </i>');
 
  });


    });
<?php endforeach ?>
    $(".delete").on("submit", function(){
        return confirm("Do you want to delete this item?");
    });
</script>
 <!-- <a href="javascript:clearChecks('group1')">clear</a> -->

<script type="text/javascript">

function clearChecks(radioName) {
    var radio = document.form1[radioName]
    for(x=0;x<radio.length;x++) {
        document.form1[radioName][x].checked = false
    }
}



    $(document).ready(function() {
        $('#summernote_1').summernote({
            height:'300px',
            placeholder:'Body of email here...',


        });
        // body...
    });

    $(document).ready(function() {
        $('#summernote_2').summernote({
            height:'300px',
            placeholder:"Make a list of your Educaitonal Qualifications Eg. BSc Maths/ Computer Sc. etc...",


        });
        // body...
    });

    $('#clear').on('click', function() {
        $('#summernote_1').summernote('code', null);

    });
        $('#clear').on('click', function() {
        $('#summernote_2').summernote('code', null);

    });
        function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function validate() {
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;

    var emailFilter = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
    var phoneFilter = /^http:\/\//;

    if (!emailFilter.test(email)) {
        alert('Please enter a valid e-mail address.');
        return false;
    }

    if (!phoneFilter.test(phone)) {
        alert('Please correct your phone number.');
        return false;
    }

    return true;
}
// document.getElementById('frm').onsubmit = validate;

 


</script>
 <script>
        <?php foreach ($applications as $key => $value): ?>
   $(".lds-ripple{{$value->user_id}}").hide();
   $(".lds-ripplee{{$value->user_id}}").hide();
   
     <?php endforeach ?>
    $(".delete").on("submit", function(){
        return confirm("Do you want to delete this item?");
    });
</script>

<!-- 
<select class="width-full" required="" id="category_id" data-parsley-error-message="Please select a job function" name="category_id[]">
<option value="">Select...</option>
<option value="14">Accounting &amp; Auditing</option>
<option value="3">Administrative</option>
<option value="21">Art &amp; Design</option>
<option value="47">Building &amp; Architecture</option>
<option value="34">Consulting &amp; Strategy</option>
<option value="22">Customer Service &amp; Support</option>
<option value="19">Engineering</option>
<option value="7">Farming</option>
<option value="48">Food Services</option>
<option value="27">IT &amp; Telecoms</option>
<option value="28">Legal</option>
<option value="18">Management</option>
<option value="31">Marketing &amp; Communications</option>
<option value="33">Medicine &amp; Pharmaceutical</option>
<option value="20">Project Management</option>
<option value="45">Property Management</option>
<option value="36">Quality Control &amp; Assurance </option>
<option value="26">Recruitment</option>
<option value="49">Research</option>
<option value="38" selected="selected">Sales &amp; Business Development</option>
<option value="35">Social Development</option>
<option value="29">Supply Chain &amp; Procurement</option>
<option value="23">Teaching &amp; Training</option>
<option value="40">Trades &amp; Services</option></select>

Industry

<select class="width-full" required="" data-parsley-error-message="Please select an industry" id="industry_id" name="industry_id">
<option value="">Select...</option>
<option value="15">Advertising</option>
<option value="1">Agriculture</option>
<option value="4">Banking &amp; Finance</option>
<option value="3">Construction</option>
<option value="2">Creative</option>
<option value="5" selected="selected">Education</option>
<option value="6">Energy</option>
<option value="7">Government</option>
<option value="8">Healthcare</option>
<option value="9">Hospitality &amp; Leisure</option>
<option value="10">Human Resources</option>
<option value="12">Law</option>
<option value="13">Logistics &amp; Transportation</option>
<option value="14">Manufacturing</option>
<option value="16">Media &amp; Entertainment</option>
<option value="17">Mining &amp; Metals</option>
<option value="18">NGO</option>
<option value="21">Real Estate</option>
<option value="19">Retail &amp; FMCG</option>
<option value="20">Security</option>
<option value="11">Technology &amp; Communication</option>
<option value="22">Tours &amp; Travel</option></select>
-->
 <script type="text/javascript">
//  setInterval(function(){
//$("#tabs").load(location.href+" #tabs>*", "");
 //}, 1000);
//    setInterval(function(){
// $("#tab_12").load(location.href+"#tab_12>*", "");
//    }, 200000);
//       setInterval(function(){
// $("#tab_13").load(location.href+"#tab_13>*", "");
//    }, 200000);
//          setInterval(function(){
// $("#tab_14").load(location.href+"#tab_14>*", "");
//    }, 200000);
//  setInterval(function(){
// $("#tab_15").load(location.href+"#tab_15>*", "");
//    }, 200000);

 </script>
 <div id="tabs"></div>
</body>

</html>
