                                        <div class="careerfy-column-12 careerfy-typo-wrap">
                            <div class="careerfy-typo-wrap">
                                <!-- FilterAble -->
                         <!--        <div class="careerfy-filterable">
                                    <h2>Showing 0-12 of 37 results</h2>
                                    <ul>
                                        <li>
                                            <i class="careerfy-icon careerfy-sort"></i>
                                            <div class="careerfy-filterable-select">
                                                <select>
                                                    <option>Sort</option>
                                                    <option>Sort</option>
                                                    <option>Sort</option>
                                                </select>
                                            </div>
                                        </li>
                                        <li><a href="#"><i class="careerfy-icon careerfy-squares"></i> Grid</a></li>
                                        <li><a href="#"><i class="careerfy-icon careerfy-list"></i> List</a></li>
                                    </ul>
                                </div> -->
                                <!-- FilterAble -->
                                <!-- JobGrid -->
                                <div class="careerfy-job careerfy-joblisting-classic">
                                    <ul class="careerfy-row">
                                       <div id="joblist">
                                         @if(!$jobs_draft_list->isEmpty())
                                         @if($jobs_draft_list)
         @foreach($jobs_draft_list as $job)
   <li class="careerfy-column-12"><div class="careerfy-joblisting-classic-wrap"><div class="careerfy-joblisting-text">
    <div class="col-md-12 careerfy-list-option" >
      <div class="col-md-6">  <a href="{{route('get.applicants_byid', $job->id)}}" style="font-weight: 400px; font-size: 17px"> <h2>   {{$job->job_title}}  </h2> </a> <!-- <span>Featured</span> -->  </div>
      <div class="col-md-6" align="right"> <div class="status-mark" align="right"><div class=""></div> 
      STATUS: @if($job->status === 1 && $job->active === 1)<span class="badge" style="background-color: green;"> ONLINE</span> @else<span class="badge" style="background-color: red;">OFFLINE</span>  @endif </div> </div>
    </div>
    <hr style="height: 2px;">
    <div class="careerfy-list-option"> 
     <ul>  
     <li><i class="careerfy-icon careerfy-maps-and-flags"></i> {{$job->country}}, {{$job->city}}</li>
     <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i>@foreach($professions as $profession) @if($profession->id === $job->job_category) {{$profession->name}} @endif @endforeach</li>
     </ul> </div>
     <div class="space">&nbsp;</div>  
     <div class="row"><div class="col-md-12"> 
 
@include('jobs.load_count')

    </div></div>

<div class="space">&nbsp;</div>
<hr>  
    <div class="col-sm-12">
    <div class="col-sm-6" align="left">
  <div class="careerfy-job-userlist2 careerfy-list-option">  <strong> Published</strong> {{ date('M, d, Y', strtotime($job->created_at)) }} | Expires in {{ date('M, d, Y', strtotime($job->end_date)) }}  </div></div>
      
 <div class="col-sm-6" align="right">
    <div class="careerfy-job-userlist ">@foreach($employement_terms as $employement_term) @if($job->job_type === $employement_term->id)<span class="careerfy-option-btn careerfy-{{$employement_term->category}}"><a href="{{route('get.applicants_byid', $job->id)}}" style="color: #ffffff;"> view</a></span>@endif @endforeach 

      </div>

     </div>
    </div>

    <div class="clearfix"></div></div></div></li>  <div class="space">&nbsp;</div> 
    
    @endforeach    
@endif
    @else

<li> 
<div class="careerfy-employer-confitmation">
<div align="center">   <img src="{{asset('img/NoJobFound.png')}}" height="400" width="400" alt="" align="center"></div>
<div class="clearfix"></div>
</div> </li> @endif


    </div> </ul></div>
                                <!-- Pagination -->
                                <div class="careerfy-pagination-blog">
                                    <ul class="page-numbers">
                                {{ $jobs_draft_list->links() }}
                                    </ul>
                                </div>
                            </div>
                        </div>