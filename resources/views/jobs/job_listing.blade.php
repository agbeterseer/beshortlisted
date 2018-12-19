@extends('layouts.jobboard', [
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
  <!-- SubHeader -->
        <div class="careerfy-subheader">
            <span class="careerfy-banner-transparent"></span>
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
        </div>
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
                     <form class="careerfy-banner-search" action="{{route('job.listing')}}" method="GET">
                     
                        <ul>
                            <li>
                        <div class="careerfy-select-style">
                                    <select name="s" class="careerfy-banner-search" >
                                    <option value="">Select Industry</option>
                                    @foreach($industries as $industry)
                                    @if($s)
                                    @if($s === $industry->id)
                         <option value="{{$industry->id}}" selected="selected"> <div style="width: 50px;">{{$industry->name}}</div></option> 
                                        @else
                                             <option value="{{$industry->id}}"> <div style="width: 50px;">{{$industry->name}}</div></option> 
                                        @endif
                                        @endif
                                        @endforeach  
                                        
                                    </select>
                                </div> 
                            </li>
                            <li>
             <div class="careerfy-select-style"> 
                                    <select name="location"  class="careerfy-banner-search">
                                    <option value="">Select City</option>
                                    @foreach($cities as $city)
                                    @if($location)
                                    @if($city->name === $location->name)

                                        <option value="{{$city->id}}" selected="selected">{{$city->name}}</option> 
                                        @else
    <option value="{{$city->id}}">{{$city->name}}</option> 
                                        @endif
                                        @endif
                                        @endforeach 
                                    </select>
                                </div> 
                               
                            </li>
                            <li>
                                <div class="careerfy-select-style" >
                                    <select name="job_function"  class="careerfy-banner-search" >
                                    <option value="">Select Job Function</option>
                                    @foreach($industry_professions as $industry_profession)
                                        <option value="{{$industry_profession->id}}">{{$industry_profession->name}}</option>

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
            <div class="careerfy-main-section">
                <div class="container">
                    <div class="row"> 
                     <aside class="careerfy-column-4 careerfy-typo-wrap">
                            <div class="careerfy-typo-wrap">
                                <form class="careerfy-search-filter">
                   
    <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
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


                    <!--                 <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Date Posted</a></h2>
                                        <div class="careerfy-checkbox-toggle">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="r5" name="rr" />
                                                    <label for="r5"><span></span>Last Hour</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="r6" name="rr" />
                                                    <label for="r6"><span></span>Last 24 hours</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="r7" name="rr" />
                                                    <label for="r7"><span></span>Last 7 days</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="r8" name="rr" />
                                                    <label for="r8"><span></span>Last 14 days</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="r9" name="rr" />
                                                    <label for="r9"><span></span>Last 30 days</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="r10" name="rr" />
                                                    <label for="r10"><span></span>All</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> -->
                         <!--            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Vacancy Type</a></h2>
                                        <div class="careerfy-checkbox-toggle">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="r11" name="rr" />
                                                    <label for="r11"><span></span>Freelance</label>
                                                    <small>13</small>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="r12" name="rr" />
                                                    <label for="r12"><span></span>Full Time</label>
                                                    <small>4</small>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="r13" name="rr" />
                                                    <label for="r13"><span></span>Internship</label>
                                                    <small>12</small>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="r14" name="rr" />
                                                    <label for="r14"><span></span>Part Time</label>
                                                    <small>22</small>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="r15" name="rr" />
                                                    <label for="r15"><span></span>Temporary</label>
                                                    <small>5</small>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="r16" name="rr" />
                                                    <label for="r16"><span></span>Volunteer</label>
                                                    <small>20</small>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> -->

                                       <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
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
                                     <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
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
                                    <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Industry</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="job_profession">
                                            <ul class="careerfy-checkbox">
                                               @foreach($industries as $industry)
                                                <li>
                                                    <input type="checkbox" id="r_{{$industry->id}}" name="industry[]" value="{{$industry->id}}" />
                                                    <label for="r_{{$industry->id}}"><span></span>{{$industry->name}}</label>
                                                    <small>10</small>
                                                </li>
                                                @endforeach 
                                            </ul> 
                                        </div>
                                    </div>
                          <!--           <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Categories</a></h2>
                                        <div class="careerfy-checkbox-toggle">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="r17" name="rr" />
                                                    <label for="r17"><span></span>Accountancy</label>
                                                    <small>10</small>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="r18" name="rr" />
                                                    <label for="r18"><span></span>Banking</label>
                                                    <small>2</small>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="r19" name="rr" />
                                                    <label for="r19"><span></span>Charity & Voluntary</label>
                                                    <small>6</small>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="r20" name="rr" />
                                                    <label for="r20"><span></span>Digital & Creative</label>
                                                    <small>4</small>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="r21" name="rr" />
                                                    <label for="r21"><span></span>Estate Agency</label>
                                                    <small>19</small>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="r22" name="rr" />
                                                    <label for="r22"><span></span>Graduate</label>
                                                    <small>5</small>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="r23" name="rr" />
                                                    <label for="r23"><span></span>IT Contractor</label>
                                                    <small>10</small>
                                                </li>
                                            </ul>
                                            <a href="#" class="careerfy-seemore">+see more</a>
                                        </div>
                                    </div> -->
                                </form>
                            </div>
                        </aside>
                        <div class="careerfy-column-8 careerfy-typo-wrap">
                            <div class="careerfy-typo-wrap">
                                <!-- FilterAble -->
                                <div class="careerfy-filterable">
                                    <h2>Showing 0-12 of 37 results</h2>
                                    <ul>
                                        <li>
                                           <a href=""> <i class="careerfy-icon careerfy-sort"></i>Filter</a></li>
                                        <li><a href="#"><i class="careerfy-icon careerfy-squares"></i> Grid</a></li>
                                        <li><a href="#"><i class="careerfy-icon careerfy-list"></i> List</a></li>
                                    </ul>
                                </div>
                                <!-- FilterAble -->
                                <!-- JobGrid -->
                                <div class="careerfy-job careerfy-joblisting-classic">
                                    <ul class="careerfy-row" id="job_section">
                                    @forelse($tags as $tag)
                                        <li class="careerfy-column-12">
                                            <div class="careerfy-joblisting-classic-wrap">
                                                <figure><a href="{{route('apply.job', $tag->id)}}"><img src="/img/extra-images/job-listing-logo-1.png" alt=""></a></figure>
                                                <div class="careerfy-joblisting-text">
                                                    <div class="careerfy-list-option">
                                                        <h2><a href="{{route('apply.job', $tag->id)}}"> {{$tag->job_title}} </a> <!-- <span>Featured</span> --> </h2>
                                                        <ul>
                                                      
                                                            <li><i class="careerfy-icon careerfy-maps-and-flags"></i> {{$tag->country}}, {{$tag->city}}</li>
                                                            <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> @foreach($industry_professions as $profession) @if($profession->id === $tag->job_category){{$profession->name}} @endif @endforeach</li>
                                                            <li></li>
                                                        </ul>
                                                    </div>

                                                    <div class="careerfy-job-userlist">
                                                    @foreach($employement_term_list as $employement_term) 
                                                    @if($employement_term->id === $tag->job_type)
                                 <a href="{{route('apply.job', $tag->id)}}" class="careerfy-option-btn  careerfy-{{$employement_term->category}}">APPLY </a>
                                 @endif @endforeach
                                                        <a href="#" class="careerfy-job-like"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </li>
                                        @empty
                                       <li> No Record(s) Found</li>
                                        @endforelse
                                       
                                    </ul>
                                </div>
                                <!-- Pagination -->

                                <div class="careerfy-pagination-blog" id="pages">
                                    <ul class="page-numbers">
                                    {{ $tags->appends(['s' => $s])->links() }}
                                     
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Main Section -->

@endsection
