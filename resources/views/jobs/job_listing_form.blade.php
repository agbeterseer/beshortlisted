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
                            <p>Yes! You make or may not find the right job for you, but that’s ok......</p>
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
                                    <select name="s"  >
                                    <option value="">Select Industry</option>
                                    @foreach($industries as $industry)
                       
                                 
                                             <option value="{{$industry->id}}"> <div style="width: 50px;">{{$industry->name}}</div></option> 
                                
                                        @endforeach  
                                        
                                    </select>
                                </div> 
                            </li>
                            <li>
             <div class="careerfy-select-style"> 
                                    <select name="location">
                                    <option value="">Select City</option>
                                    @foreach($cities as $city)
                                 
    <option value="{{$city->id}}">{{$city->name}}</option> 
                                 
                                        @endforeach 
                                    </select>
                                </div> 
                               
                            </li>
                            <li>
                                <div class="careerfy-select-style" >
                                    <select name="job_function" >
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
                     <aside class="careerfy-column-4 careerfy-typo-wrap"  style="background-color: #ffffff;">
                            <div class="careerfy-typo-wrap" >
                                <form class="careerfy-search-filter"> 
    <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Location</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="job_location" >
                                            <ul class="careerfy-checkbox"> 
                                            @foreach($cities as $city_record) 
                                                <li> 
       <input type="checkbox" id="r{{$city_record->id}}" name="city[]" value="{{$city_record->id}}" />
         <label for="r{{$city_record->id}}"><span></span>{{$city_record->name}}</label>
           <small> @foreach($city_count as $city_) @if($city_->city === $city_record->name) {{$city_->total}}  @endif @endforeach</small> 
                                                </li> 
                                            @endforeach 
                                            </ul> 
                                        </div>
                                    </div> 
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
                                                        <ul style="color: #13b5ea;">
                                                      
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
