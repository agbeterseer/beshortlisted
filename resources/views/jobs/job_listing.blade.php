@extends('layouts.jobs', [
  'page_header' => 'Employer',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'employer' => 'active'
])

@section('content')
 
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
    body{background-color: #FAFAFA;}
</style>
@include('partials.employee_breadcomb') 
  <!-- SubHeader -->
       <div class="space">&nbsp;</div>
        <div class="space">&nbsp;</div>  
        <!-- SubHeader --> 
        <!-- Main Content -->
        <div class="careerfy-main-content"> 
            <!-- Main Section -->
            <div class="careerfy-main-section careerfy-subheader-form-full">
                <div class="container">
                    <div class="row"> 
                        <div class="col-md-12 careerfy-typo-wrap">
                            <!-- Sub Header Form -->
                            <div class="careerfy-subheader-form">
                       <form class="careerfy-banner-search" action="{{route('job.listing')}}" method="">
                     {{ csrf_field() }}
                        <ul>
                            <li>
                            <div class="careerfy-select-style"> 
                                    <select name="location" required="required">
                                    <option value="">Select City</option>
                                    @foreach($cities as $city)
                                 
    <option value="{{$city->id}}">{{$city->name}}</option> 
                                 
                                        @endforeach 
                                    </select>
                                </div> 
 
                            </li>
                            <li>
                            <div class="careerfy-select-style" >
                                    <select name="job_function" required="required" >
                                    <option value="">Select Job Function</option>
                                    @foreach($industry_professions as $industry_profession)
                                        <option value="{{$industry_profession->id}}">{{$industry_profession->name}}</option>

                                        @endforeach
                               
                                    </select>
                                </div> 
                            </li>
                            <li>
                        <div class="careerfy-select-style">
                                    <select name="s" required="required" >
                                    <option value="">Select Industry</option>
                                    @foreach($industries as $industry)
                       
                                 
                                             <option value="{{$industry->id}}"> <div style="width: 50px;">{{$industry->name}}</div></option> 
                                
                                        @endforeach  
                                        
                                    </select>
                                </div>
                            </li>
                            <li class="careerfy-banner-submit"> <input type="submit" value=""> <i class="careerfy-icon careerfy-search"></i> </li>
                        </ul>
                    </form>
                            </div>
                            <!-- Sub Header Form -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- Main Section -->
 <!-- Main Section -->
            <div class="careerfy-main-section" style="overflow-x:auto;">
                <div class="container">
                    <div class="row"> 
                     <aside class="careerfy-column-4 careerfy-typo-wrap">
                            <div class="careerfy-typo-wrap">
                                <form class="careerfy-search-filter">
                   
    <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle" style="background-color: #ffffff;">
                                        <h2><a href="#" class="careerfy-click-btn">Location</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="job_location" >
                                            <ul class="careerfy-checkbox">

                                            @foreach($cities as $city_record) 
                                                <li>
                                                @if($location)
                                                 @if($city_record->name === $location->name)
         <input type="checkbox" id="r{{$city_record->id}}" name="city[]" value="{{$city_record->id}}" checked="checkbox" />
         <label for="r{{$city_record->id}}"><span></span>{{$city_record->name}}</label>
           <small> @foreach($city_count as $city_) @if($city_->city === $city_record->name) {{$city_->total}}  @endif @endforeach</small>
           @else
       <input type="checkbox" id="r{{$city_record->id}}" name="city[]" value="{{$city_record->id}}" />
         <label for="r{{$city_record->id}}"><span></span>{{$city_record->name}}</label>
           <small> @foreach($city_count as $city_) @if($city_->city === $city_record->name) {{$city_->total}}  @endif @endforeach</small>

           @endif
           @endif
                                                </li> 
                                            @endforeach 
                                            </ul> 
                                        </div>
                                    </div>
 

                                       <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle" style="background-color: #ffffff;">
                                        <h2><a href="#" class="careerfy-click-btn">Vacancy Type</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="job_terms">
                                            <ul class="careerfy-checkbox">
                                  @foreach($employement_term_list as $employement_term)
                                                <li>
                                                    <input type="checkbox" id="jr{{$employement_term->id}}" name="job[]" value="{{$employement_term->id}}" />
                                                    <label for="jr{{$employement_term->id}}"><span></span>{{$employement_term->name}}</label>
                                   <small> @foreach($job_type_count as $job_record) @if($job_record->job_type === $employement_term->id) {{$job_record->total}}  @endif @endforeach</small>
                                                </li>
                                @endforeach
                                          
                                            </ul>
                                        </div>
                                        </div>
                                     <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle" style="background-color: #ffffff;">
                                        <h2><a href="#" class="careerfy-click-btn">Job Function</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="job_profession">
                                            <ul class="careerfy-checkbox">
                                               @foreach($industry_professions as $profession)
                                                <li>
                                                    <input type="checkbox" id="r_{{$profession->id}}" name="profession[]" value="{{$profession->id}}" />
                                                    <label for="r_{{$profession->id}}"><span></span>{{$profession->name}}</label>
                                                    <small>10</small>
                                                </li>
                                                @endforeach 
                                            </ul> 
                                        </div>
                                    </div>
                                    <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle" style="background-color: #ffffff;">
                                        <h2><a href="#" class="careerfy-click-btn">Industry</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="job_industry">
                                            <ul class="careerfy-checkbox">
                                             @foreach($industries as $industry)
                                                <li>
                                                    <input type="checkbox" id="in_{{$industry->id}}" name="industry[]" value="{{$industry->id}}" />
                                                    <label for="in_{{$industry->id}}"><span></span>{{$industry->name}}</label>
                                                    <small></small>
                                                </li>
                                                @endforeach 
                                            </ul> 
                                        </div>
                                    </div>
                  
                                </form>
                            </div>
                        </aside>
                  
                                <!-- FilterAble -->
                      
                                              <section class="jobslist">
                                                @include('jobs.load')
                                               </section>
                    </div>
                </div>
            </div>
            <!-- Main Section -->

@endsection
