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