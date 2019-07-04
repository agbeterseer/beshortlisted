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
        <div class="careerfy-main-content" style="margin-top: -45px;">
<style type="text/css">
    .scroll_div{
    overflow:scroll;
    overflow-x:hidden;
    overflow-y:scroll;
    height:200px;
    }

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

.lds-ripplee {
  display: inline-block;
  position: relative;
  width: 64px;
  height: 64px;

}
.lds-ripplee div {
  position: absolute;
  border: 4px solid #13B5EA;
  opacity: 1;
  border-radius: 50%;
  animation: lds-ripplee 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;

}
.lds-ripplee div:nth-child(2) {
  animation-delay: -0.5s;
}
@keyframes lds-ripplee {
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
</style>
  <!-- SubHeader -->
<!--         <div class="careerfy-subheader careerfy-subheader-without-bg">
  
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="careerfy-page-title">
                            <h1>Jobs For Good Programmers</h1>
                            <p>Yes! You make or may not find the right job for you, but that’s ok.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- SubHeader -->

        <!-- Main Content -->
        <div class="careerfy-main-content"> 
            <!-- Main Section -->
            <p></p>
            <div class="space">&nbsp;</div>
            <div class="space">&nbsp;</div>
            <div class="space">&nbsp;</div>
            <div class="careerfy-main-section careerfy-subheader-form-full">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 careerfy-typo-wrap"> 
                            <div class="careerfy-subheader-form">
                                <div class="careerfy-banner-search"  >
                           
                             <div class="col-md-12 ">
                             <ul>
                             <li style="width: 90%;"> 
                              <input placeholder="Job Title, Keywords" type="text" name="job_title" class="form-control"></li>

                             <li class="careerfy-banner-submit"> <input type="submit" value="" id="filter_keyword"> <i class="careerfy-icon careerfy-search"></i> </li>
                             </ul>
                  <!-- <input type="submit" value="" id="filter_keyword2"> <i class="careerfy-icon careerfy-search"></i> -->

                  </div>
            <!--                         <ul class="col-md-12">
                                        <li class="col-md-12">
                                            <input placeholder="Job Title, Keywords" onblur="if(this.value == '') { this.value ='Job Title, Keywords'; }" onfocus="if(this.value =='Job Title, Keywords') { this.value = ''; }" type="text" name="job_title" class="form-control">
                                        </li>
                                        <li>
                                            <input placeholder="City, State" onblur="if(this.value == '') { this.value ='City, State or ZIP'; }" onfocus="if(this.value =='City, State') { this.value = ''; }" type="text" name="candidate_city">
                                            <i class="careerfy-icon careerfy-location"></i>
                                        </li>
                                        <li>
                                            <div class="careerfy-select-style" >
                                                <select name="profession">
                                                @foreach($professions as $profession)
                                                    <option value="{{$profession->id}}">{{$profession->name}}</option>
                                                @endforeach 
                                                    <option> <a href="{{url('/employer/candidates-listing')}}"> All</a></option>
                                                </select>
                                            </div>
                                        </li>
                                          <li class="careerfy-banner-submit"> <input type="submit" value="" id="filter_keyword2"> <i class="careerfy-icon careerfy-search"></i> </li>
                                    </ul> -->
                                </div>
                            </div>
                            <!-- Sub Header Form -->
                        </div>       

                    </div>
                </div>
            </div>
            <!-- Main Section -->

        <!-- SubHeader -->
 
        <!-- SubHeader -->
   
   <!-- Main Section -->

     <div class="careerfy-main-section"  style="background-color: #ffffff;">
                <div class="container">
                    <div class="row">
                        
         <aside class="careerfy-column-4">
 
                            <div class="careerfy-typo-wrap">
                                <div class="careerfy-search-filter">
                          <!--           <div class="careerfy-search-filter-wrap careerfy-without-toggle">
                                        <h2><a href="#">Find Candidates</a></h2>
                                        <div class="careerfy-search-box"  id="filter_keyword">
                               <input placeholder="Job Title, Keywords" onblur="if(this.value == '') { this.value ='Job Title, Keywords'; }" onfocus="if(this.value =='Job Title, Keywords') { this.value = ''; }" type="text" name="job_title" >
                                      <input type="submit" value=""> <i class="careerfy-icon careerfy-search"></i>
                                         
                                        </div>
                                        <div class="careerfy-location-box">
                                            <input value="All Locaions" onblur="if(this.value == '') { this.value ='All Locaions'; }" onfocus="if(this.value =='All Locaions') { this.value = ''; }" type="text">
                                            <i class="careerfy-icon careerfy-location"></i>
                                        </div>
                                    </div> -->
                                    <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Gender</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="genderall">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="g1gender" name="gender[]" value="Male" />
                                                    <label for="g1gender"><span></span>Male</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g2gender"  name="gender[]" value="Female" />
                                                    <label for="g2gender"><span></span> Female</label>
                                                </li>
                                              
                                            </ul>
                                        </div>
                                    </div>
                          
                              <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Job Function</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="profession_all">
                                            <ul class="careerfy-checkbox">
                                               @foreach($professions as $profession)
                                                <li>
                                                    <input type="radio" id="r_{{$profession->id}}" name="profession[]" value="{{$profession->id}}" />
                                                    <label for="r_{{$profession->id}}"><span></span>{{$profession->name}}</label>
                                                    <small>10</small>
                                                </li>
                                                @endforeach 
                                            </ul>
                              <!-- 
                              <a href="#" class="careerfy-seemore">+ see more</a> -->
                                        </div>
                                    </div>
                                    <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Industries</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="industry_all">
                                            <ul class="careerfy-checkbox">
                                            @foreach($industries as $industry)  
                                                <li>
                                                <input type="checkbox" id="i_{{$industry->id}}" name="industry[]" value="{{$industry->id}}" />
                                                    <label for="i_{{$industry->id}}"><span></span>{{$industry->name}}</label>
                                                    <small>10</small>
                                                </li>
                                                @endforeach
                                       
                                            </ul>
                                        
                                        </div>
                                    </div>

                  <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Minimum Salary</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="min_salary">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="salary1" name="salary[]" value="N50,000-N100,000" />
                                                    <label for="salary1"><span></span>N50,000-N100,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary2" name="salary[]" value="N150,000-N250,000" />
                                                    <label for="salary2"><span></span>N150,000-N250,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary3"  name="salary[]" value="N350,000-N600,000" />
                                                    <label for="salary3"><span></span>N350,000-N600,000</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="salary4"  name="salary[]" value="N750,000-N1,000," />
                                                    <label for="salary4"><span></span>N750,000-N1,000,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary5"  name="salary[]" value="N1,000,000-N5,000,000" />
                                                    <label for="salary5"><span></span>N1,000,000-N5,000,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary6"  name="salary[]" value="N550,000-N10,000,000" />
                                                    <label for="salary6"><span></span>N5,050,000-N10,000,000</label>
                                                </li>
                                                  <li>
                                                    <input type="checkbox" id="salary7"  name="salary[]" value="N10,000,000-N15,000,000" />
                                                    <label for="salary7"><span></span>N10,000,000-N15,000,000</label>
                                                </li>
                                                  <li>
                                                    <input type="checkbox" id="salary8"  name="salary[]" value="N15,000,000-Above" />
                                                    <label for="salary8"><span></span>N15,000,000-Above</label>
                                                </li>

                                            </ul>
                                        </div>
                                </div>
                                <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Availability</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="availability_all">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="avail1" name="avail[]" value="now" />
                                                    <label for="avail1"><span></span>Immediate</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail2" name="avail[]" value="1 week" />
                                                    <label for="avail2"><span></span>1 week</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail3"  name="avail[]" value="2 weeks" />
                                                    <label for="avail3"><span></span>2 weeks</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="avail4"  name="avail[]" value="1 month" />
                                                    <label for="avail4"><span></span>1 month</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail5"  name="avail[]" value="2 months" />
                                                    <label for="avail5"><span></span>2 months</label>
                                                </li>
                                         <!--      <li>
                                                    <input type="radio" id="avail6"  name="avail" value="Specific date" />
                                                    <label for="avail6"><span></span>Specific date</label>
                                                </li> -->
                                            </ul>
                                        </div>
                                </div>
                                               <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Years Of Experience</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="yoe_all">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="g1yoe" name="yoe" value="0-5" />
                                                    <label for="g1yoe"><span></span>0-5</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g2yoe"  name="yoe" value="6-10" />
                                                    <label for="g2yoe"><span></span>6-10</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="g3yoe"  name="yoe" value="11-15" />
                                                    <label for="g3yoe"><span></span>11-15</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g4yoe"  name="yoe" value="16-20" />
                                                    <label for="g4yoe"><span></span>16-20</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g5yoe"  name="yoe" value="20 Above" />
                                                    <label for="g5yoe"><span></span>20 Above</label>
                                                </li>
                                            </ul>
                                        </div>
                                </div>
                                <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Age</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="age_all">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="rag1" name="ag" value="18-25" />
                                                    <label for="rag1"><span></span>18-25</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="rag2" name="ag" value="26-30" />
                                                    <label for="rag2"><span></span>26-30</label>
                                                </li>
                                                    <li>
                                                    <input type="checkbox" id="rag3" name="ag" value="31-35" />
                                                    <label for="rag3"><span></span>31-35</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="rag4" name="ag" value="36-40" />
                                                    <label for="rag4"><span></span>36-40</label>
                                                </li>
                                                     <li>
                                                    <input type="checkbox" id="rag5" name="ag" value="41-45" />
                                                    <label for="rag5"><span></span>41-45</label>
                                                </li> 
                                                <li>
                                                    <input type="checkbox" id="rag6" name="ag" value="46-50" />
                                                    <label for="rag6"><span></span>46-50</label>
                                                </li> 
                                                <li>
                                                    <input type="checkbox" id="rag7" name="ag" value="51 Above" />
                                                    <label for="rag7"><span></span>51 Above</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                               <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Qualification</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="qualification_all">
                                            <ul class="careerfy-checkbox">
                                             @foreach($educational_levels as $educational_levels)
                                                    <li>
                                                    <input type="checkbox" id="qu_{{$educational_levels->id}}" name="qu[]" value="{{$educational_levels->id}}" />
                                                    <label for="qu_{{$educational_levels->id}}"><span></span>{{$educational_levels->name}}</label>
                                                </li>
                                                @endforeach
                                        
                                                 </ul>
                                        </div>
                                    </div>
                            
                                         <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Location</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="location_all" >
                                            <ul class="careerfy-checkbox">
                                            @foreach($cities as $city) 
                                                <li>
                                                    <input type="checkbox" id="r{{$city->id}}" name="city[]" value="{{$city->id}}" />
                                                    <label for="r{{$city->id}}"><span></span>{{$city->name}}</label>
                                                </li> 
                                            @endforeach 
                                            </ul> 
                                        </div>
                                    </div>
                                 
                         
                                    <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Employement Terms</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="employement_term_all">
                                            <ul class="careerfy-checkbox">
                                  @foreach($employement_terms as $employement_term)
                                                <li>
                                                    <input type="checkbox" id="jr{{$employement_term->id}}" name="job[]" value="{{$employement_term->id}}" />
                                                    <label for="jr{{$employement_term->id}}"><span></span>{{$employement_term->name}}</label>
                                                    <small>4</small>
                                                </li>
                                @endforeach
                                          
                                            </ul>
                                        </div>
                                    </div>

                             <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Career Level</a></h2>
                                        <div class="careerfy-checkbox-toggle croll_div" id="career_all">
                                            <ul class="careerfy-checkbox">
                                  @foreach($jobcareer_levels as $jobcareer_level)
                                                <li>
                                                    <input type="checkbox" id="jc{{$jobcareer_level->id}}" name="career_level[]" value="{{$jobcareer_level->id}}" />
                                                    <label for="jc{{$jobcareer_level->id}}"><span></span>{{$jobcareer_level->name}}</label>
                                                    <small>4</small>
                                                </li>
                                @endforeach
                                          
                                            </ul>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </aside>
 
                                <!-- JobGrid -->
                   <div class="careerfy-column-8"  style="background-color: #ffffff;">
                            <div class="careerfy-typo-wrap">
                                <!-- FilterAble -->
                                <div class="careerfy-filterable">
                                    <h2>Showing 0-12 of 37 results</h2>
                                    <ul>
                                        <li>
                                            <i class="careerfy-icon careerfy-sort"></i>
                                            <div class="careerfy-filterable-select">
                              
                                                <select id="filter_by_color"  style="height: 50px;" >
                                                    <option value=""> Filter Colors <div class="badge"></div></option>
                                                    <option value="red">&nbsp;Red <div class="badge" style="background-color: red"></div></option>
                                                    <option value="blue">&nbsp;Blue<div class="badge"></div></option>
                                                    <option value="yellow">&nbsp;Yellow<div class="badge"></div></option>
                                                    <option value="green">&nbsp;Green<div class="badge"></div></option>
                                                    <option value="black">&nbsp;Black<div   style=" background-color: #000000;"></div></option> 
                                                </select>
                                            </div>
                                        </li>
                                        <li><a href="{{url('/employer/candidates-listing')}}"> All</a></li>
                                        <li><a href="#"><i class="careerfy-icon careerfy-squares"></i> Grid</a></li>
                                        <li><a href="#"><i class="careerfy-icon careerfy-list"></i> List</a></li>
                                    </ul>
                                </div>

                                <!-- Candidate Listings -->

                                <div class="careerfy-candidate careerfy-candidate-default">

                                <div class="lds-ripplee"><div></div><div></div></div>
                         <div id="info"></div>
                        <ul class="careerfy-row"> 
                            <div id="items">
                            <?php $count = 0; ?>
                                    @forelse($documents as $document)
                       
                                        <li class="careerfy-column-12">
                                            <div class="careerfy-candidate-default-wrap">
                                            @foreach($users as $user)
                                                @if($document->user_id === $user->id)
                                                <figure><a href="#"><img src="/uploads/avatars/{{ $user->avatar }}" alt=""></a></figure>
                                                @endif
                                                @endforeach
                                                <div class="careerfy-candidate-default-text">
                                                    <div class="careerfy-candidate-default-left">
                                                        <h2><a href="{{route('candidate.resume', ['resume'=>$document->resume_id, 'candidates_id' => $document->user_id])}}"> {{$document->candidates_name}}</a> <i class="careerfy-icon careerfy-check-mark" ></i> </h2>
                                                        <ul class="careerfy-column-12" >
                                                        @foreach($work_experiences as $work_experience)
                                                        @if($work_experience->userfk === $document->user_id && $work_experience->present === 1)
                                                            <li>{{$work_experience->position_title}} at <a href="#" class="careerfy-candidate-default-studio">{{$work_experience->company_name}}</a></li>
                                                            @endif
                                                        @endforeach
                                                            <li><i class="fa fa-map-marker"></i>@foreach($countries as $country) @if($country->code === $document->nationality) {{$country->name_en}} @endif @endforeach, 
                                                            @foreach($cities as $city) @if($city->name === $document->city_id)   {{$city->name}} @endif @endforeach</li>
                                                            <li><i class="careerfy-icon careerfy-envelope"></i> <a href="#">{{$document->email}}</a></li>
                                                        </ul>
                                                    </div>

                                                    <div id="shortlist_btn{{$count}}">
                                                    @if($document->blue === 1)
                                                    <a href="#show_resume" class="btn blue careerfy-candidate-default-btn"  data-toggle="collapse" data-target="#view_resume{{$count}}"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a>
                                                    @elseif($document->red === 1)
      <a href="#show_resume" class="btn red careerfy-candidate-default-btn"  data-toggle="collapse" data-target="#view_resume{{$count}}"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a>
                                                    @elseif($document->green === 1)
      <a href="#show_resume" class="btn green careerfy-candidate-default-btn"  data-toggle="collapse" data-target="#view_resume{{$count}}"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a>
                                                    @elseif($document->yellow === 1)
      <a href="#show_resume" class="btn yellow careerfy-candidate-default-btn"  data-toggle="collapse" data-target="#view_resume{{$count}}"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a>
      @else

            <a href="#show_resume" class="careerfy-candidate-default-btn"  data-toggle="collapse" data-target="#view_resume{{$count}}"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a>
      @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                         <div class="space">&nbsp;</div>
                                          <div class="careerfy-candidate-default-text">
                                         <ul class="careerfy-column-12"> 
                                            <li> 
                   <div id="view_resume{{$count}}" class="collapse"> 
                                   <div class="col-md-12 cv_content">
                    <div id="blue{{$count}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    <!-- <input type="radio" name="color" value="1"> -->
                    <input type="hidden" value="0" name="red{{$count}}">
                    <input type="hidden" value="1" name="blue{{$count}}">
                    <input type="hidden" value="0" name="green{{$count}}">
                     <input type="hidden" value="0" name="yellow{{$count}}">
                        <i class="icon-plus"></i> BLUE
                    </div>
                        <div id="red{{$count}}" class="btn red mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                 <!-- <input type="radio" name="color" >  -->
                    <input type="hidden" value="1" name="red{{$count}}">
                     <!-- <input type="hidden" value="{{$document->id}}" name="document"> -->
                    <input type="hidden" value="0" name="blue{{$count}}">
                    <input type="hidden" value="0" name="green{{$count}}">
                     <input type="hidden" value="0" name="yellow{{$count}}">
                        <i class="icon-plus"></i> RED
                    </div>
                        <div id="green{{$count}}" class="btn green mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                        <!-- <input type="radio" name="color" > -->
                    <input type="hidden" value="0" name="red{{$count}}">
                    <input type="hidden" value="0" name="blue{{$count}}">
                    <input type="hidden" value="1" name="green{{$count}}">
                     <input type="hidden" value="0" name="yellow{{$count}}">
                        <i class="icon-plus"></i> GREEN
                    </div>
                    <div id="yellow{{$count}}" class="btn yellow mt-ladda-btn careerfy-employer-profile-submit mini_header" >

                    <input type="hidden" value="0" name="red{{$count}}">
                    <input type="hidden" value="0" name="blue{{$count}}">
                    <input type="hidden" value="0" name="green{{$count}}">
                     <input type="hidden" value="1" name="yellow{{$count}}">
                        <i class="icon-plus"></i> YELLOW
                    </div> 
            
                                   </div>

                 <div class="space">&nbsp;</div>
                 <br>
            <h2>Profile</h2>
            <strong> Age:</strong> {{$document->age}}<br>
            <strong>Date Of Birth:</strong> {{ date('M d, Y', strtotime($document->date_of_birth)) }}<br>
            <strong> Gender:</strong>{{$document->gender}}<br>
            <strong> Salary:</strong> {{$document->minimum_salary}} / Year<br>
            <strong>Career Level</strong> @foreach($jobcareer_levels as $job_career_level) @if($job_career_level->id == $document->career_level) {{$job_career_level->name}}  @endif @endforeach 
            <div class="space">&nbsp;</div>
            <h2>Education</h2>
 
<?php
    $dt->year   = $document->start_year;
    $dt->month  = $document->start_month;

    $ddt->year   = $document->end_year;
    $ddt->month  = $document->end_month;
  
    $yer = $ddt->diffInYears($dt);     
    $weeks = $ddt->diffInWeeks($dt);                  // 62
    $months = $ddt->diffInMonths($dt);  
?>
 <strong>Degree</strong> {{$document->qualification}} {{$document->feild_of_study}} <br>
 <strong>Graduation period:</strong> {{ date('M, Y', strtotime($dt)) }} - {{ date('M, Y', strtotime($ddt)) }}  ( {{$yer}} years, ) <br>
  <strong>School:</strong>{{$document->school_name}}<br>
  <strong>Country:</strong> @foreach($countries as $country)  @if($country->code === $document->country) {{$country->name_en}} @endif @endforeach  
<div class="space">&nbsp;</div>
    <h2>Work Experience</h2>

  @foreach($documents3 as $work_history)   
@if($document->id === $work_history->id)


<?php 
    $dt->year = $work_history->start_year;
    $dt->month = $work_history->start_month;

    $ddt->year = $work_history->end_year;
    $ddt->month = $work_history->end_month;
  
    $yer = $ddt->diffInYears($dt);     
    // $weeks = $ddt->diffInWeeks($dt);                  // 62
    $months = $ddt->diffInMonths($dt);    
?>

 
<strong> Position Title </strong>{{$work_history->position_title}} <br>
<strong>Employment period:</strong> {{ date('M, Y', strtotime($dt)) }} - 
@if($work_history->end_year === null && $work_history->end_month === null && $work_history->present == '1') Present
@elseif($work_history->end_year === null && $work_history->end_month === null && $work_history->present == '2')
Previous
@else
 {{ date('M, Y', strtotime($ddt)) }}  ({{$yer}} year(s) ) @endif<br>
<strong>Company:</strong>{{$work_history->company_name}}<br>
<strong>Country:</strong> @foreach($countries as $country) @if($work_history->country === $country->code) {{$country->name_en}} @endif @endforeach <br>
<strong> Position Description:</strong>{!! $work_history->responsibilities !!}<br>
<div class="space">&nbsp;</div>

@endif 
<p></p>
 @endforeach
                   
                                          
    <div class="space">&nbsp;</div> 
      <div class="lds-ripple"><div></div><div></div></div>
       <div id="success_message{{$count}}"></div>
<div id="emailForm{{$count}}">
  <button type="button" class="btn blue mt-ladda-btn ladda-button btn-outline" style="padding-top: 5px; padding-bottom: 5px; padding-left: 5px; padding-right: 5px;" data-toggle="collapse" data-target="#1_{{$count}}"><i class="careerfy-icon careerfy-envelope" style="padding-top: 3px;" ></i>Send Email</button>
     
      
   <div class="space">&nbsp;</div> 

  <div id="1_{{$count}}" class="collapse">
     <div class="col-md-7">
        <div class="row">
        
        
 
<div class="space"></div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-body settings-block">
 <div class="space">&nbsp;</div> 
   <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
      
                Subject
              <input type="text" name="title{{$count}}" class="form-control">
            <input type="hidden" name="email_address{{$count}}" value="{{$document->email}}">
            <input type="hidden" name="name{{$count}}" value="{{$document->candidates_name}}">
            <small class="text-danger">{{ $errors->first('title') }}</small>
          </div>
 <div class="space">&nbsp;</div> 
          <div class="form-group{{ $errors->has('body_of_email') ? ' has-error' : '' }}">
        
            Email
            <textarea class="form-control" name="body_of_email{{$count}}"></textarea>
            <small class="text-danger">{{ $errors->first('body_of_email') }}</small>
          </div>
    <div class="space">&nbsp;</div> 
    
              <input type="button" value="Send Email" id="sendCandidateEmail{{$count}}" class="btn blue mt-ladda-btn ladda-button btn-outline btn-block">
        </div>
      </div>
    </div> 
  </div> 
 
        
        </div>
      </div>
  </div>

   <div class="space">&nbsp;</div> 
      <div class="space">&nbsp;</div> 
  </div>
  
                                           </div>
                                           </li>
                                         </ul>

                                         </div>

                              <?php $count++; ?>
                                         @empty
                                         
                                        @endforelse


                                </div> 
                                    </ul>
                                </div>
                                <!-- Pagination -->

                                <div class="careerfy-pagination-blog" id="pages">
                                    <ul class="page-numbers">
                                    {{ $documents->appends(['s' => $s])->links() }}
                                     
                                    </ul>
                                </div>
                            </div>
                        </div>
 
                        </div>
                        </div>
                        </div>


 
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



  $('#filter_by_color').change(function() {
        
        alert($(this).val());
 
       // 'location':$('input[name=city]:checked').val(),
       // 'job_type':$('input[name=job]:checked').val(),
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
         var id =
 
        $.ajax({
            type:'post',
            url:'/filterByColor', 
            data:{
                '_token':$('input[name=_token').val(),
                'filtercolor':$(this).val(),
               
            },
              beforeSend: function(){
            //Show image container
            $(".lds-ripplee").show(); 
            $('#items').empty();
             },
            success:function(data){
            console.log(data);
             //$('#shortlist_btn{{$count}}').empty();
            $('#items').empty(); 
            // $('#items').hide();
  
     },
     complete:function(data){
    // Hide image container 
   
    $(".lds-ripplee").hide(); 
    },
    }).done(function (data) {
               //$('#info').empty();  
 var code = data.documents;
 var jobcareer_levels = data.jobcareer_levels;
 var work_experiences = data.work_experiences;
 var image_path = data.image_url;
 var last_page = last_page;
 var next_page_url = next_page_url;
 var countries = data.countries;
 var job_educations = data.job_educations;
 var company = '';
 var title = '';
 var count = 0;
 var blue = '';
 var red = '';
 var green = '';
 var yellow = '';
 var shortlist_color = '';
  var career_level_name = '';
  var country_name = '';
  var position_title = '';
  var school_name = '';
  var feild_of_study = '';
  var position_title = '';
  var qualification = '';
  var start_year = '';
  var start_month ='';
  var end_month = '';
  var end_year = '';

    if(isEmpty(code['data'])) {
        $('#items').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
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
             if(value.black_list === 0){
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
    console.log(title);
  
  if(value.blue === 1){
     shortlist_color = '<a href="#show_resume" class="btn blue careerfy-candidate-default-btn"  data-toggle="collapse" data-target="#view_resume'+count+'"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a>';
    }else if (value.red === 1) {
     shortlist_color = '<a href="#show_resume" class="btn blue careerfy-candidate-default-btn"  data-toggle="collapse" data-target="#view_resume'+count+'"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a>';
    }else if (value.green === 1) {
     shortlist_color = '<a href="#show_resume" class="btn blue careerfy-candidate-default-btn"  data-toggle="collapse" data-target="#view_resume'+count+'"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a>';
    }else if (value.yellow === 1) {
     shortlist_color = '<a href="#show_resume" class="btn blue careerfy-candidate-default-btn"  data-toggle="collapse" data-target="#view_resume'+count+'"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a>';
    }else{
        shortlist_color = '<a href="#show_resume" class="careerfy-candidate-default-btn" data-toggle="collapse" data-target="#view_resume'+count+'"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a> ';
console.log(count);
    } 
    $.each(jobcareer_levels, function(key, jobcareer_level) {
        if (jobcareer_level.id == value.career_level) {

            career_level_name = jobcareer_level.name;
        }
    });
        $.each(countries, function(key, country) {
          //$country->code === $document->country  
        if (country.code === value.country) {

            country_name = country.name_en;
        }
    });

        $.each(job_educations, function(key, job_educations) {
           
        if (value.resume_id === job_educations.resume_id ) {
            start_month = job_educations.start_month;
            start_year = job_educations.start_year;
            end_year = job_educations.end_year;
            end_month = job_educations.end_month;
            qualification = job_educations.qualification;

            country_name = job_educations.country;
            school_name = job_educations.school_name;
            position_title = job_educations.position_title;
            feild_of_study = job_educations.feild_of_study;
        }
    });
 
            //loop through experience to get candidates experience{{ $user->avatar }}
var content ='<li class="careerfy-column-12">  <div class="careerfy-candidate-default-wrap"><figure><a href="#"><img src="'+image_path+'{{ $user->avatar }}" alt=""></a></figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2><a href="#">'+candidates_name+ '</a></h2> <ul><li> '+title+' at <a href="#" class="careerfy-candidate-default-studio">'+ company +'</a></li><li><i class="fa fa-map-marker"></i> '+value.nationality+', '+count+'</li><li><i class="careerfy-icon careerfy-envelope"></i> <a href="#">' +email+ '</a></li></ul> </div><div id="shortlist_btn'+count+'"> '+shortlist_color+'</div></div></div></li> <div class="space">&nbsp;</div><div class="careerfy-candidate-default-text"><ul class="careerfy-column-12"><li> <div id="view_resume'+count+'" class="collapse"> <div class="col-md-12 cv_content"> <div id="blue'+count+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" > <input type="hidden" value="0" name="red'+count+'"> <input type="hidden" value="1" name="blue'+count+'"> <input type="hidden" value="0" name="green'+count+'"> <input type="hidden" value="0" name="yellow'+count+'"> <i class="icon-plus"></i> BLUE </div> <div id="red'+count+'" class="btn red mt-ladda-btn careerfy-employer-profile-submit mini_header" > <input type="hidden" value="1" name="red'+count+'"><input type="hidden" value="0" name="blue'+count+'"> <input type="hidden" value="0" name="green'+count+'"><input type="hidden" value="0" name="yellow'+count+'"> <i class="icon-plus"></i> RED</div><div id="green'+count+'" class="btn green mt-ladda-btn careerfy-employer-profile-submit mini_header"><input type="hidden" value="0" name="red'+count+'"><input type="hidden" value="0" name="blue'+count+'"><input type="hidden" value="1" name="green'+count+'"><input type="hidden" value="0" name="yellow'+count+'"><i class="icon-plus"></i> GREEN</div><div id="yellow'+count+'" class="btn yellow mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="0" name="red'+count+'"><input type="hidden" value="0" name="blue'+count+'"><input type="hidden" value="0" name="green'+count+'"><input type="hidden" value="1" name="yellow'+count+'"><i class="icon-plus"></i> YELLOW </div></div><div class="space">&nbsp;</div><br><h2>Profile</h2> <strong>Name</strong> '+candidates_name+ ' <br><strong> Age:</strong>'+value.age+'<br><strong>Date Of Birth:</strong> {{ date('M d, Y', strtotime('+value.date_of_birth+')) }}<br><strong> Gender:</strong>'+value.gender+'<br><strong> Salary:</strong> '+value.minimum_salary+' / Year<br><strong>Career Level</strong> '+career_level_name+' <div class="space">&nbsp;</div><h2>Education</h2> <strong>Degree</strong> '+ feild_of_study +' '+qualification+' <br> <strong>Graduation period:</strong> {{ date('M, Y', strtotime('+$dt+')) }} - {{ date('M, Y', strtotime($ddt)) }}  ( {{$yer}} years, ) <br>  <strong>School:</strong>'+school_name+'<br> <strong>Country:</strong> '+ country_name +'<div class="space">&nbsp;</div>      <div class="space">&nbsp;</div>   <div id="success_message'+count+'"></div> <div id="emailForm'+count+'"> <button type="button" class="btn blue mt-ladda-btn ladda-button btn-outline" style="padding-top: 5px; padding-bottom: 5px; padding-left: 5px; padding-right: 5px;" data-toggle="collapse" data-target="#1_'+count+'"><i class="careerfy-icon careerfy-envelope" style="padding-top: 3px;" ></i>Send Email</button> <div class="space">&nbsp;</div> <div id="1_'+count+'" class="collapse"> <div class="col-md-7"> <div class="row"> <div class="space"></div> <div class="row"> <div class="col-md-12"> <div class="box"> <div class="box-body settings-block"> <div class="space">&nbsp;</div> <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}"> Subject <input type="text" name="title'+count+'" class="form-control"> <input type="hidden" name="email_address'+count+'" value="'+email+'"> <input type="hidden" name="name'+count+'" value="'+candidates_name +'"> <small class="text-danger">{{ $errors->first('title') }}</small> </div> <div class="space">&nbsp;</div> <div class="form-group{{ $errors->has('body_of_email') ? ' has-error' : '' }}"> Email <textarea class="form-control" name="body_of_email'+count+'"></textarea> <small class="text-danger">{{ $errors->first('body_of_email') }}</small> </div> <div class="space">&nbsp;</div> <input type="button" value="Send Email" id="sendCandidateEmail'+count+'" class="btn blue mt-ladda-btn ladda-button btn-outline btn-block"> </div> </div> </div> </div>    </div> </div> </div>   </div></li></ul></div>';

    $('#items').append(content);    
 }
    count++;
    
        });

$("#results2").append('<i class="btn-success btn-xs">'+ 's' + '</i>'); 
  });
 
  });

<?php $count = 0; ?>
 @foreach($documents as $document)  
  $('#blue{{$count}}').click(function() {
 // alert('blue{{$count}}');
 
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
         var id =
 
        $.ajax({
            type:'post',
            url:'/make-blue-{{$document->id}}', 
            data:{
                '_token':$('input[name=_token').val(),
                'blue':$('input[name=blue{{$document->id}}]').val(),
                'red':$('input[name=red{{$document->id}}]').val(),
                'green':$('input[name=green{{$document->id}}]').val(),
                'yellow':$('input[name=yellow{{$document->id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
             $('#shortlist_btn{{$count}}').empty();
       

        //window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
        var details = data.document; 
        var work_experiences = data.work_experiences;
        console.log(details); 

            // if(isEmpty(newapplication_list)) {
            // $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
            // $('#resume_body').empty();
            // $('#resume_body').append('No Record(s) Found'); 
 
            // }
           var content = '<a href="#show_resume" class="btn blue careerfy-candidate-default-btn"  data-toggle="collapse" data-target="#view_resume{{$count}}"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a>'

            $("#shortlist_btn{{$count}}").append(content);
            // $('#sorted_count').append(sorted_count);
            // $("#review_count").append(in_review_count);
            // $("#shortlist_count").append(shortlisted_count); 

        var count = 0;
        var status = '';
        var content_v = '';
 // $.each(new_reject_list, function(key, value){
 //            var application_id = value.id;
 //            var email = value.email;
 //            var user = value.user_id;
 //            var candidates_name = value.candidates_name; 
 //            var company = value.id;
 //            var title = value.id;
 //            var tag_id = value.tag_id;
 //            if (count === 0 ) {
 //                status = 'active';
 //            }else{
 //                status = '';
 //            }
 //    company = getWorkExperienceCompanyName(work_experiences, user);
 //    title = getWorkExperienceTitle(work_experiences, user);

 //            //loop through experience to get candidates experience@foreach($documentList as $document) 
 //            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
 //        $("#reject_section").append(content); 
 //             content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
 // });

 
  });
  });


  $('#red{{$count}}').click(function() {
 // alert('red');
 
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/make-red-{{$document->id}}', 
            data:{
                  '_token':$('input[name=_token').val(),
                'blue':$('input[name=blue{{$count}}]').val(),
                'red':$('input[name=red{{$count}}]').val(),
                'green':$('input[name=green{{$count}}]').val(),
                'yellow':$('input[name=yellow{{$count}}]').val(),
               
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
         $('#shortlist_btn{{$count}}').empty();

      
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
            var details = data.document; 
        var work_experiences = data.work_experiences;
      
  

            // if(isEmpty(newapplication_list)) {
            // $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
            // $('#resume_body').empty();
            // $('#resume_body').append('No Record(s) Found'); 
 
            // }
                       var content = '<a href="#show_resume" class="btn red careerfy-candidate-default-btn"  data-toggle="collapse" data-target="#view_resume{{$count}}"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a>'

            $("#shortlist_btn{{$count}}").append(content);

        var count = 0;
        var status = '';
        var content_v = '';
 // $.each(new_reject_list, function(key, value){
 //            var application_id = value.id;
 //            var email = value.email;
 //            var user = value.user_id;
 //            var candidates_name = value.candidates_name; 
 //            var company = value.id;
 //            var title = value.id;
 //            var tag_id = value.tag_id;
 //            if (count === 0 ) {
 //                status = 'active';
 //            }else{
 //                status = '';
 //            }
 //    company = getWorkExperienceCompanyName(work_experiences, user);
 //    title = getWorkExperienceTitle(work_experiences, user);

 //            //loop through experience to get candidates experience@foreach($documentList as $document) 
 //            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
 //        $("#reject_section").append(content); 
 //             content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
 // });

 
  });
  });


  $('#green{{$count}}').click(function() {
 // alert('green');
 
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/make-green-{{$document->id}}', 
            data:{
                '_token':$('input[name=_token').val(),
                   'blue':$('input[name=blue{{$count}}]').val(),
                'red':$('input[name=red{{$count}}]').val(),
                'green':$('input[name=green{{$count}}]').val(),
                'yellow':$('input[name=yellow{{$count}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
           $('#shortlist_btn{{$count}}').empty();

        //window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
var details = data.document; 
       

            // if(isEmpty(newapplication_list)) {
            // $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
            // $('#resume_body').empty();
            // $('#resume_body').append('No Record(s) Found'); 
 
            // }
                       var content = '<a href="#show_resume" class="btn green careerfy-candidate-default-btn"  data-toggle="collapse" data-target="#view_resume{{$count}}"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a>'

            $("#shortlist_btn{{$count}}").append(content);

        var count = 0;
        var status = '';
        var content_v = '';
 // $.each(details, function(key, value){
 //            var application_id = value.id;
 //            var email = value.email;
 //            var user = value.user_id;
 //            var candidates_name = value.candidates_name; 
 //            var company = value.id;
 //            var title = value.id;
 //            var tag_id = value.tag_id;
 //            if (count === 0 ) {
 //                status = 'active';
 //            }else{
 //                status = '';
 //            }
 //    company = getWorkExperienceCompanyName(work_experiences, user);
 //    title = getWorkExperienceTitle(work_experiences, user);

 //            //loop through experience to get candidates experience@foreach($documentList as $document) 
 //            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
 //        $("#reject_section").append(content); 
 //             content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
 // });

 
  });
  });



   $('#yellow{{$count}}').click(function() {
 // alert('yellow');
 
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'post',
            url:'/make-yellow-{{$document->id}}', 
            data:{
                '_token':$('input[name=_token').val(),
                 'blue':$('input[name=blue{{$count}}]').val(),
                'red':$('input[name=red{{$count}}]').val(),
                'green':$('input[name=green{{$count}}]').val(),
                'yellow':$('input[name=yellow{{$count}}]').val()

            },
              beforeSend: function(){
            //Show image container
          $(".lds-ripplee").show(); 
            $("#info").append('<i class="btn-success btn-xs" style="color:#ffffff;"> grouping cv with color </i>');
             },
            success:function(data){
            console.log(data);
     $('#shortlist_btn{{$count}}').empty();

        //window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $(".lds-ripplee").hide();
    },



    }).done(function (data) {
             var details = data.document;  

            // if(isEmpty(newapplication_list)) {
            // $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
            // $('#resume_body').empty();
            // $('#resume_body').append('No Record(s) Found'); 
 
            // }

                         var content = '<a href="#show_resume" class="btn yellow careerfy-candidate-default-btn"  data-toggle="collapse" data-target="#view_resume{{$count}}"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a>'

            $("#shortlist_btn{{$count}}").append(content);

        var count = 0;
        var status = '';
        var content_v = '';
 // $.each(new_reject_list, function(key, value){
 //            var application_id = value.id;
 //            var email = value.email;
 //            var user = value.user_id;
 //            var candidates_name = value.candidates_name; 
 //            var company = value.id;
 //            var title = value.id;
 //            var tag_id = value.tag_id;
 //            if (count === 0 ) {
 //                status = 'active';
 //            }else{
 //                status = '';
 //            }
 //    company = getWorkExperienceCompanyName(work_experiences, user);
 //    title = getWorkExperienceTitle(work_experiences, user);

 //            //loop through experience to get candidates experience@foreach($documentList as $document) 
 //            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
 //        $("#reject_section").append(content); 
 //             content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
 // });

 
  });
  });
 <?php $count++; ?>
 @endforeach

    $('#filter_keyword2').click(function() {
  alert($('input[name=job_title2]').val());
 
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
  
        $.ajax({
            type:'post',
            url:'/filterbyJobTitle', 
            data:{
                '_token':$('input[name=_token').val(),
                'job_title':$('input[name=job_title]').val(),
                'candidate_city':$('input[name=candidate_city]').val(),
                'category':$('input[name=category]').val() 
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
             $('#items').empty();
             $('#pages').empty();

        //window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
             var work_experiences = data.work_experiences;  

            if(isEmpty(work_experiences)) {
            $('#items').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
            // $('#resume_body').empty();
            // $('#resume_body').append('No Record(s) Found'); 
 
            }

            // var content = '<a href="#show_resume" class="btn yellow careerfy-candidate-default-btn"  data-toggle="collapse" data-target="#view_resume{{$count}}"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a>'

            // $("#shortlist_btn{{$count}}").append(content);

        var count = 0;
        var status = '';
        var content_v = '';
 $.each(work_experiences, function(key, value){
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


        $("#items").append(content); 


             content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
 });

 
  });
  });

   $('#filter_keyword').click(function() {
  alert($('input[name=job_title]').val());
 
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
  
        $.ajax({
            type:'post',
            url:'/filterbyJobTitle', 
            data:{
                '_token':$('input[name=_token').val(),
                'job_title':$('input[name=job_title]').val(),
                'candidate_city':$('input[name=candidate_city]').val(),
                'category':$('input[name=category]').val() 
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
             $('#items').empty();
             $('#pages').empty();

        //window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
             var work_experiences = data.work_experiences;  

            if(isEmpty(work_experiences)) {
            $('#items').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
            // $('#resume_body').empty();
            // $('#resume_body').append('No Record(s) Found'); 
 
            }

            // var content = '<a href="#show_resume" class="btn yellow careerfy-candidate-default-btn"  data-toggle="collapse" data-target="#view_resume{{$count}}"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a>'

            // $("#shortlist_btn{{$count}}").append(content);

        var count = 0;
        var status = '';
        var content_v = '';
 $.each(work_experiences, function(key, value){
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


        $("#items").append(content); 


             content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
 });

 
  });
  });


   $('#genderall').change(function() {


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
    var industry = [];
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
    $('#genderall :checked').each(function() { 
      //  alert($(this).val());
     var cboxValue = $(this).val(); 
      // alert(cboxValue); 
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue); 
    });
 
  
   console.log(gender);
 
GroupFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession, industry);
 
  }
});


   $('#industry_all').change(function() {

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
    var industry = [];
    function itemExistsChecker(cboxValue) { 
    var len = industry.length;  
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (industry[i] == cboxValue) {
          return true;
        }
 
      }
    }
          
    industry.push(cboxValue); 
  } 
   
  {
    $('#industry_all :checked').each(function() { 
      //  alert($(this).val());
     var cboxValue = $(this).val(); 
      // alert(cboxValue); 
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue); 
    });
 
  
   console.log(industry);
 
GroupFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession, industry);
 
  }
});
   

 $('#min_salary').change(function() {

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
    var industry = [];
 
    function itemExistsChecker(cboxValue) {
 
    var len = salary.length;
    if (len > 0) {
      for (var i = 0; i < len; i++) {
 
         if (salary[i] == cboxValue) {
          return true;
        }
      }
    }
 
    salary.push(cboxValue)
  } 
   
  {
 
$('#min_salary :checked').each(function() { 
      //  alert($(this).val());
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
 

    console.log(salary)
 
 
GroupFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession, industry);
 
  }
});

 $('#qualification_all').change(function() {

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
    var industry = [];
    function itemExistsChecker(cboxValue) {
 
    var len = qualify.length;
    if (len > 0) {
      for (var i = 0; i < len; i++) {
 
         if (qualify[i] == cboxValue) {
          return true;
        }
      }
    }
 
    qualify.push(cboxValue)
  } 
   
  {
 
$('#qualification_all :checked').each(function() { 
      //  alert($(this).val());
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
 

    console.log(qualify)
 
 
GroupFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession, industry);
 
  }
});
   $('#availability_all').change(function() {

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
    var industry = [];
    function itemExistsChecker(cboxValue) {
 
    var len = availability.length;
    if (len > 0) {
      for (var i = 0; i < len; i++) {
 
         if (availability[i] == cboxValue) {
          return true;
        }
      }
    }
 
    availability.push(cboxValue)
  } 
   
  {
 
$('#availability_all :checked').each(function() { 
      //  alert($(this).val());
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
 

    console.log(availability)
 
 
GroupFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession, industry);
 
  }
}); 


   $('#location_all').change(function() {

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
    var industry = [];
    function itemExistsChecker(cboxValue) {
 
    var len = location.length;
    if (len > 0) {
      for (var i = 0; i < len; i++) {
 
         if (location[i] == cboxValue) {
          return true;
        }
      }
    }
 
    location.push(cboxValue)
  } 
   
  {
 
$('#location_all :checked').each(function() { 
      //  alert($(this).val());
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
 
 
GroupFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession, industry);
 
  }
});

   $('#yoe_all').change(function() {

    var yeo_array = '';
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    var industry = [];
  //   function itemExistsChecker(cboxValue) {
 
  //   var len = yeo_array.length;
  //   if (len > 0) {
  //     for (var i = 0; i < len; i++) {
 
  //        if (yeo_array[i] == cboxValue) {
  //         return true;
  //       }
  //     }
  //   }
 
  //   yeo_array.push(cboxValue)
  // } 
   
  {
 
$('#yoe_all :checked').each(function() { 
      //  alert($(this).val());
    yeo_array = $(this).val(); 
    alert(yeo_array);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
     // itemExistsChecker(cboxValue);
    // }
 
    }); 
 

    console.log(yeo_array);
 
 
GroupFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession, industry);
 
  }
});  


$('#age_all').change(function() {
   
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
    var industry = [];

 
  {
    $('#age_all :checked').each(function() { 
     age = $(this).val(); 
      //salert(age);
   
      $(this).prop('checked', true);
 
 
    }); 
   console.log(age);
 
 
GroupFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession, industry);
 
  }
});
 

function GroupFilter(gender, yeo_array, age, location, qualify, job_terms, career_level, availability, salary, profession, industry) {
 
       // alert($('input[name=gender]:checked').val() + $('input[name=salary]:checked').val());
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
  var check_section = 'filter';
        $.ajax({
            type:'post',
            url:'/filterByCategory', 
            data:{
                '_token':$('input[name=_token').val(),
                 'yoe':yeo_array,
                'age':age,
                'location':location,
                'qualification':qualify,
                'job_terms':job_terms,
                'check_section': check_section,
                'career_level':career_level,
                'availability':availability,
                'salary':salary,
                'profession':profession,
                'gender':gender,
                'industry':industry,
            },
            beforeSend: function(){
    // Show image container
            $(".lds-ripplee").show(); 
             $('#items').empty();
            //$('#emailForm{{$count}}').empty();
               $("#info").append('<i class="btn-success btn-xs" style="color:#ffffff;"> fetching data... </i>');
             },

            success:function(data){
              console.log(data);
             $('#items').empty();
            // $("#success_message{{$count}}").empty();
         

            },
     complete:function(data){
    // Hide image container  
    $(".lds-ripplee").hide(); 
 
    },
 
    }).done(function (data) {
         $('#info').empty();
 var code = data.documents_location;
 var jobcareer_levels = data.jobcareer_levels;
 var work_experiences = data.work_experiences;
 var image_path = location.href ='/uploads/avatars/{{$user->avatar}}';
 var resume_rul = data.resume_url;
 var last_page = last_page;
 var next_page_url = next_page_url;
 var countries = data.countries;
 var job_educations = data.job_educations;

 var company = '';
 var title = '';
 var count = 0;
 var blue = '';
 var red = '';
 var green = '';
 var yellow = '';
 var shortlist_color = '';
  var career_level_name = '';
  var country_name = '';
  var position_title = '';
  var school_name = '';
  var feild_of_study = '';
  var position_title = '';
  var qualification = '';
  var start_year = '';
  var start_month ='';
  var end_month = '';
  var end_year = '';
    if(isEmpty(code['data'])) {
        $('#items').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
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
             if(value.black_list === 0){
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
    console.log(title);
  
  if(value.blue === 1){
     shortlist_color = '<a href="#show_resume" class="btn blue careerfy-candidate-default-btn"  data-toggle="collapse" data-target="#view_resume'+count+'"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a>';
    }else if (value.red === 1) {
     shortlist_color = '<a href="#show_resume" class="btn blue careerfy-candidate-default-btn"  data-toggle="collapse" data-target="#view_resume'+count+'"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a>';
    }else if (value.green === 1) {
     shortlist_color = '<a href="#show_resume" class="btn blue careerfy-candidate-default-btn"  data-toggle="collapse" data-target="#view_resume'+count+'"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a>';
    }else if (value.yellow === 1) {
     shortlist_color = '<a href="#show_resume" class="btn blue careerfy-candidate-default-btn"  data-toggle="collapse" data-target="#view_resume'+count+'"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a>';
    }else{
        shortlist_color = '<a href="#show_resume" class="careerfy-candidate-default-btn" data-toggle="collapse" data-target="#view_resume'+count+'"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a> ';
console.log(count);
    } 
    $.each(jobcareer_levels, function(key, jobcareer_level) {
        if (jobcareer_level.id == value.career_level) {

            career_level_name = jobcareer_level.name;
        }
    });
        $.each(countries, function(key, country) {
          //$country->code === $document->country  
        if (country.code === value.country) {

            country_name = country.name_en;
        }
    });

        $.each(job_educations, function(key, job_educations) {
           
        if (value.resume_id === job_educations.resume_id ) {
            start_month = job_educations.start_month;
            start_year = job_educations.start_year;
            end_year = job_educations.end_year;
            end_month = job_educations.end_month;
            qualification = job_educations.qualification;

            country_name = job_educations.country;
            school_name = job_educations.school_name;
            position_title = job_educations.position_title;
            feild_of_study = job_educations.feild_of_study;
        }
    });
 
            //loop through experience to get candidates experience
var content ='<li class="careerfy-column-12">  <div class="careerfy-candidate-default-wrap"><figure><a href="#"><img src="'+image_path+'" alt=""></a></figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2><a href="'+resume_rul+ +value.resume_id+'">'+candidates_name+ '</a></h2> <ul><li> '+title+' at <a href="#" class="careerfy-candidate-default-studio">'+ company +'</a></li><li><i class="fa fa-map-marker"></i> '+value.nationality+', '+count+'</li><li><i class="careerfy-icon careerfy-envelope"></i> <a href="#">' +email+ '</a></li></ul> </div><div id="shortlist_btn'+count+'"> '+shortlist_color+'</div></div></div></li> <div class="space">&nbsp;</div><div class="careerfy-candidate-default-text"><ul class="careerfy-column-12"><li> <div id="view_resume'+count+'" class="collapse"> <div class="col-md-12 cv_content"> <div id="blue'+count+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" > <input type="hidden" value="0" name="red'+count+'"> <input type="hidden" value="1" name="blue'+count+'"> <input type="hidden" value="0" name="green'+count+'"> <input type="hidden" value="0" name="yellow'+count+'"> <i class="icon-plus"></i> BLUE </div> <div id="red'+count+'" class="btn red mt-ladda-btn careerfy-employer-profile-submit mini_header" > <input type="hidden" value="1" name="red'+count+'"><input type="hidden" value="0" name="blue'+count+'"> <input type="hidden" value="0" name="green'+count+'"><input type="hidden" value="0" name="yellow'+count+'"> <i class="icon-plus"></i> RED</div><div id="green'+count+'" class="btn green mt-ladda-btn careerfy-employer-profile-submit mini_header"><input type="hidden" value="0" name="red'+count+'"><input type="hidden" value="0" name="blue'+count+'"><input type="hidden" value="1" name="green'+count+'"><input type="hidden" value="0" name="yellow'+count+'"><i class="icon-plus"></i> GREEN</div><div id="yellow'+count+'" class="btn yellow mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="0" name="red'+count+'"><input type="hidden" value="0" name="blue'+count+'"><input type="hidden" value="0" name="green'+count+'"><input type="hidden" value="1" name="yellow'+count+'"><i class="icon-plus"></i> YELLOW </div></div><div class="space">&nbsp;</div><br><h2>Profile</h2> <strong>Name</strong> '+candidates_name+ ' <br><strong> Age:</strong>'+value.age+'<br><strong>Date Of Birth:</strong> {{ date('M d, Y', strtotime('+value.date_of_birth+')) }}<br><strong> Gender:</strong>'+value.gender+'<br><strong> Salary:</strong> '+value.minimum_salary+' / Year<br><strong>Career Level</strong> '+career_level_name+' <div class="space">&nbsp;</div><h2>Education</h2> <strong>Degree</strong> '+ feild_of_study +' '+qualification+' <br> <strong>Graduation period:</strong> {{ date('M, Y', strtotime('+$dt+')) }} - {{ date('M, Y', strtotime($ddt)) }}  ( {{$yer}} years, ) <br>  <strong>School:</strong>'+school_name+'<br> <strong>Country:</strong> '+ country_name +'<div class="space">&nbsp;</div>      <div class="space">&nbsp;</div>   <div id="success_message'+count+'"></div> <div id="emailForm'+count+'"> <button type="button" class="btn blue mt-ladda-btn ladda-button btn-outline" style="padding-top: 5px; padding-bottom: 5px; padding-left: 5px; padding-right: 5px;" data-toggle="collapse" data-target="#1_'+count+'"><i class="careerfy-icon careerfy-envelope" style="padding-top: 3px;" ></i>Send Email</button> <div class="space">&nbsp;</div> <div id="1_'+count+'" class="collapse"> <div class="col-md-7"> <div class="row"> <div class="space"></div> <div class="row"> <div class="col-md-12"> <div class="box"> <div class="box-body settings-block"> <div class="space">&nbsp;</div> <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}"> Subject <input type="text" name="title'+count+'" class="form-control"> <input type="hidden" name="email_address'+count+'" value="'+email+'"> <input type="hidden" name="name'+count+'" value="'+candidates_name +'"> <small class="text-danger">{{ $errors->first('title') }}</small> </div> <div class="space">&nbsp;</div> <div class="form-group{{ $errors->has('body_of_email') ? ' has-error' : '' }}"> Email <textarea class="form-control" name="body_of_email'+count+'"></textarea> <small class="text-danger">{{ $errors->first('body_of_email') }}</small> </div> <div class="space">&nbsp;</div> <input type="button" value="Send Email" id="sendCandidateEmail'+count+'" class="btn blue mt-ladda-btn ladda-button btn-outline btn-block"> </div> </div> </div> </div>    </div> </div> </div>   </div></li></ul></div>';

    $('#items').append(content);    
 }
    count++;
    
        });

$("#results2").append('<i class="btn-success btn-xs">'+ 's' + '</i>'); 
  });
 
    }

function getUserImage(user) {
  
   return user
}
 

     function getWorkExperienceTitle(experiences, user) {
        var title = '';
        console.log(experiences);
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
        console.log(experiences);
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




     function getWorkExperience(experiences) {

        console.log(experiences);
           $.each(experiences, function(key2, value2) {  
            if (user === value2['userfk'] && value2['present'] === 1) {  
            console.log(user);
             // console.log(value2['userfk']);
             var experience = value2['position_title'];
             } 
         });

        return experience;
     }

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
             beforeSend: function(){
    // Show image container
      
             },
            success:function(data){
              console.log(data);
            $('#items').empty();
            //location.reload();
            //window.location.reload();

            },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },


        });
    });

       <?php $count = 0; ?>
      @forelse($documents as $document)

      $('#sendCandidateEmail{{$count}}').click(function(e) {
        
        e.preventDefault(); 
        // alert($('input[name=email_address{{$count}}]').val());
        // alert($('textarea[name=body_of_email{{$count}}]').val());
        // alert($('input[name=title{{$count}}]').val());
        // alert($('input[name=name{{$count}}]').val());

         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 

        $.ajax({
            type:'post',
            url:'/send-candidates-email', 
            data:{
                '_token':$('input[name=_token').val(),
                'email_address':$('input[name=email_address{{$count}}]').val(),
                'body_of_email':$('textarea[name=body_of_email{{$count}}]').val(),
                'title':$('input[name=title{{$count}}]').val(),
                'candidates_name':$('input[name=name{{$count}}]').val(),
            },
             beforeSend: function(){
    // Show image container
            $(".lds-ripple").show(); 
            $('#emailForm{{$count}}').empty();
               $("#success_message{{$count}}").append('<i class="btn-success btn-xs" style="color:#ffffff;"> sending email... </i>');
             },

            success:function(data){
              console.log(data);
          //  $('#emailForm{{$count}}').empty();
             $("#success_message{{$count}}").empty();
         

            },
     complete:function(data){
    // Hide image container  
    $(".lds-ripple").hide(); 
 $("#success_message{{$count}}").empty();
    $("#success_message{{$count}}").append('<i class="btn-success btn-xs" style="color:#ffffff;"> email sent successfully</i>');
    },

        });
    });

<?php $count++; ?>
        @empty
        @endforelse

//

</script>
 <script>
   $(".lds-ripple").hide();
 

   $(".lds-ripplee").hide();
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
 
</script>
<script type="text/javascript" language="">
     var num1 = 100;
 if(isNaN(num1)){
  document.write(num1 + " is not a number <br/>");
 }else{
  document.write(num1 + " is a number <br/>");


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
</body>

</html>
