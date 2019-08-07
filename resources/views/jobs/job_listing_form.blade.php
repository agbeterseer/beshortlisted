@extends('layouts.jobslayout', [
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
    
</style>
  <!-- SubHeader -->
 
@include('partials.employee_breadcomb') 
 
        <div class="space">&nbsp;</div> 
        <div class="space">&nbsp;</div>  
        <div class="space">&nbsp;</div> 
        <div class="space">&nbsp;</div>        
        <!-- SubHeader -->

        <!-- Main Content -->
        <div class="careerfy-main-content">
            
            <!-- Main Section -->
            <div class="space">&nbsp;</div>
              <div class="space">&nbsp;</div>
                <div class="space">&nbsp;</div>
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
                                    <select name="location">
                                    <option value=""><strong>Select City</strong></option>
                                    @foreach($cities as $city)
                                 
    <option value="{{$city->id}}"><strong>{{$city->name}}</strong></option> 
                                 
                                        @endforeach 

                                    </select>
                                </div>
 
                            </li>
                            <li>
                                 <div class="careerfy-select-style" >
                                    <select name="job_function" >
                                    <option value=""><strong>Select Job Function</strong></option>
                                    @foreach($industry_professions as $industry_profession)
                                        <option value="{{$industry_profession->id}}"><strong>{{$industry_profession->name}}</strong></option>

                                        @endforeach
                               
                                    </select>
                                </div>
                               
                            </li>
                            <li>
                                                        <div class="careerfy-select-style">
                                    <select name="s"  >
                                    <option value=""><strong>Select Industry</strong></option>
                                    @foreach($industries as $industry)
                       
                                 
                                             <option value="{{$industry->id}}"> <div style="width: 50px;"><strong>{{$industry->name}}</strong></div></option> 
                                
                                        @endforeach  
                                        
                                    </select>
                                </div>

                            </li>
                            <li class="careerfy-banner-submit"> <input type="submit" value="Find"> <i class="careerfy-icon careerfy-search"></i> </li>
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
                     <aside class="careerfy-column-4 careerfy-typo-wrap"  >
                            <div class="careerfy-typo-wrap" >
                                <form class="careerfy-search-filter"> 
    <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle" style="background-color: #ffffff;">
                                        <h2><a href="#" class="careerfy-click-btn"><strong>Location</strong></a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="job_location">
                                            <ul class="careerfy-checkbox" > 
                                            @foreach($cities as $city_record) 
                                                <li> 
       <input type="checkbox" id="r{{$city_record->id}}" name="city[]" value="{{$city_record->id}}" />
         <label for="r{{$city_record->id}}"><span></span><strong>{{$city_record->name}}</strong></label>
           <small> @foreach($city_count as $city_) @if($city_->city === $city_record->name) {{$city_->total}} @endif @endforeach</small> 
                                                </li> 
                                            @endforeach 
                                            </ul> 
                                        </div>
                                    </div>

                                <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle" style="background-color: #ffffff;">
                                        <h2><a href="#" class="careerfy-click-btn"><strong>Vacancy Type</strong></a></h2>
                                        <div class="careerfy-checkbox-toggle" id="job_terms">
                                            <ul class="careerfy-checkbox">
                                  @foreach($employement_term_list as $employement_term)
                                                <li>
                                                    <input type="checkbox" id="jr{{$employement_term->id}}" name="job[]" value="{{$employement_term->id}}" />
                                                    <label for="jr{{$employement_term->id}}"><span></span><strong>{{$employement_term->name}}</strong></label>
                                   <small> @foreach($job_type_count as $job_record) @if($job_record->job_type === $employement_term->id) {{$job_record->total}}  @endif @endforeach</small>
                                                </li>
                                @endforeach 
                                            </ul>
                                        </div>
                                        </div>
                                     <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle" style="background-color: #ffffff;">
                                        <h2><a href="#" class="careerfy-click-btn"><strong>Job Function</strong></a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="job_profession">
                                            <ul class="careerfy-checkbox">
                                               @foreach($industry_professions as $profession)
                                                <li>
                                                    <input type="checkbox" id="r_{{$profession->id}}" name="profession[]" value="{{$profession->id}}" />
                                                    <label for="r_{{$profession->id}}"><span></span><strong>{{$profession->name}}</strong></label>
                                                    <small></small>
                                                </li>
                                                @endforeach 
                                            </ul> 
                                        </div>
                                    </div>
                                    <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle" style="background-color: #ffffff; ">
                                        <h2><a href="#" class="careerfy-click-btn"><strong>Industry</strong></a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="job_industry">
                                            <ul class="careerfy-checkbox">
                                             @foreach($industries as $industry)
                                                <li style="color: #000000;">
                                                    <input type="checkbox" id="in_{{$industry->id}}" name="industry[]" value="{{$industry->id}}" />
                                                    <label for="in_{{$industry->id}}"><span></span><strong>{{$industry->name}}</strong></label>
                                                    <small></small>
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
                            <!--     <div class="careerfy-filterable">
                                    <h2>Showing 0-12 of 37 results</h2>
                                    <ul>
                                        <li>
                                           <a href=""> <i class="careerfy-icon careerfy-sort"></i>Filter</a></li>
                                        <li><a href="#"><i class="careerfy-icon careerfy-squares"></i> Grid</a></li>
                                        <li><a href="#"><i class="careerfy-icon careerfy-list"></i> List</a></li>
                                    </ul>
                                </div> -->
                                <!-- FilterAble -->
                                <!-- JobGrid -->
                                <div class="careerfy-job careerfy-joblisting-classic">
                                    <ul class="careerfy-row" id="job_section">
                                   
                                    
                                    @forelse($tags as $tag)
                                        <li class="careerfy-column-12">
                                            <div class="careerfy-joblisting-classic-wrap">
                                                <figure><a href="{{route('job.description', $tag->id)}}"><img src="{{asset('/img/job.png')}}" alt=""></a></figure>
                                                <div class="careerfy-joblisting-text">
                                                    <div class="careerfy-list-option">
                                                        <h2><a href="{{route('job.description', $tag->id)}}}"> {{$tag->job_title}} </a>
                                               <!--      @foreach($employement_term_list as $employement_term) 
                                                    @if($employement_term->id === $tag->job_type)
                                                    <span class="careerfy-option-btn careerfy-{{$employement_term->category}}"> {{$employement_term->name}} </span> @endif @endforeach @if($tag->featured === 1)<small class="careerfy-jobdetail-postinfo">Featured</small>@endif -->
                                                    </h2>
                                                    <p></p>
                                                        <ul> 
                                                          
                                                            <li style="color: #F1630D";><i class="careerfy-icon careerfy-filter-tool-black-shape"></i>  
<strong>Apply Before:</strong> {{ date('M d, Y', strtotime($tag->end_date)) }}
                                                            </li>
                                                            <li > @foreach($industries as $industry) @if($tag->industry === $industry->id){{$industry->name}} @endif @endforeach</li>
                                                        </ul>
                                                    </div>

                                                    <div class="careerfy-job-userlist">
                                                    @foreach($employement_term_list as $employement_term) 
                                                    @if($employement_term->id === $tag->job_type)
                                 <a href="{{route('apply.job', $tag->id)}}" class="careerfy-option-btn  careerfy-blue">APPLY </a>
                                 @endif @endforeach
                                                        <!-- <a href="#" class="careerfy-job-like"><i class="fa fa-heart"></i></a> -->
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
            </div>
            <!-- Main Section -->
@endsection
