  <div class="careerfy-column-9 careerfy-typo-wrap">
                            <div class="careerfy-typo-wrap">
                              <div class="lds-ripplee" style="display: none;"><div></div><div></div></div>
                              <div id="info"></div>
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
                                          @if(!$tags->isEmpty()) 
                                     @foreach($tags as $job)  
 <li class="careerfy-column-12"><div class="careerfy-joblisting-classic-wrap"><div class="careerfy-joblisting-text">
    <div class="col-md-12 careerfy-list-option" >
      <div class="col-md-6">  <a href="{{route('get.applicants_byid', $job->id)}}" style="font-weight: 400px; font-size: 17px"> <h2>   {{$job->job_title}}  </h2> </a>   </div>
      <div class="col-md-6" align="right"> <div class="status-mark" align="right"><div class=""></div> 
      STATUS: @if($job->status === 1 && $job->active === 1)<span class="badge" style="background-color: green;"> ONLINE</span> @else<span class="badge" style="background-color: red;">OFFLINE</span>  @endif  </div> </div>
    </div>
    <hr style="height: 2px;">
    <div class="careerfy-list-option"> 
     <ul>  
     <li><i class="careerfy-icon careerfy-maps-and-flags"></i> {{$job->country}}, {{$job->city}}</li>
     <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i>@foreach($professions as $profession) @if($profession->id === $job->job_category) {{$profession->name}} @endif @endforeach</li>
     </ul> </div>
     <div class="space">&nbsp;</div>  
     <div class="row"><div class="col-md-12"> 
 <div class="col-md-2" align="center">
    <div class="badge" style="background-color: #ffffff;"><font style=" font-weight: bold; font-size: 35px; color: orange;">
    <?php  
            $unsorted_co = 0;
            $total = 0;
            $shortlisted = 0;
            $in_review = 0;
            $rejected = 0;
            $offered = 0;
            $hired = 0;
    ?> 
   
     <?php  $total = \App\Application::where('sorted', 0)->where('tag_id',$job->id)->count(); ?>
        
{{$total}}
    </font> <br><br><p></p>  <font  style="font-size: 20px; color: orange;"> Unsorted </font></div></div>
 
    <div class="col-md-2" align="center">
    <div class="badge" style="background-color: #ffffff;"><font style=" font-weight: bold; font-size: 35px; color: orange;">
<?php  $in_review = \App\Application::where('in_review', 1)->where('tag_id',$job->id)->count(); ?>
{{$in_review}}
    </font>   <br><br><p></p>  <font  style="font-size: 20px; color: orange;"> In Review </font></div></div>
 
    <div class="col-md-2" align="center"><div align="center" class="badge" style=" background-color: #ffffff;"><font  style="font-weight: bold; font-size: 35px; color: orange;"> 
<?php  $shortlisted = \App\Application::where('shortlisted', 1)->where('tag_id',$job->id)->count(); ?>
{{$shortlisted}}
    </font> <br><br><p></p>
    <font  style="font-size: 20px; color: red;">  Shortlisted</font></div></div>

    <div class="col-md-2" align="center">  <div class="badge" style=" background-color: #ffffff;"><font  style="font-weight: bold; font-size: 35px; color: red;">  
<?php  $rejected = \App\Application::where('rejected', 1)->where('tag_id',$job->id)->count(); ?>
{{$rejected}}
    </font>  <br><br><p></p>
    <font  style="font-size: 20px; color: red;">  Rejected</font>
    </div></div>

    <div class="col-md-2" align="center"> <div class="badge" style=" background-color: #ffffff;"><font style="font-weight: bold; font-size: 35px; color: green;">
    <?php  $offered = \App\Application::where('offered', 1)->where('tag_id',$job->id)->count(); ?>
{{$offered}}
    </font><br><br><p></p>
    <font  style="font-size: 20px; color: green;">  Offered</font>

    </div><br></div>
    <div class="col-md-1" align="center"><div align="center" class="badge" style=" background-color: #ffffff;"><font  style="font-weight: bold; font-size: 35px; color: green;"> 
   
  <?php  $hired = \App\Application::where('hired', 1)->where('tag_id',$job->id)->count(); ?>
{{$hired}} 
  </font><br><br><p></p>
    <font  style="font-size: 20px; color: green;">  Hired</font>
    </div></div> 
    </div></div>

 

<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div>
<hr>  
    <div class="col-sm-12">
    <div class="col-sm-6" align="left">
  <div class="careerfy-job-userlist2 careerfy-list-option" > <ul><li>Published  {{ date('M, d, Y', strtotime($job->created_at)) }}</li> <li>  Expires in {{ date('M, d, Y', strtotime($job->end_date)) }}</li></ul>   </div></div>
      
 <div class="col-sm-6" align="right">
    <div class="careerfy-job-userlist">@foreach($employement_terms as $employement_term) @if($job->job_type === $employement_term->id)<span class="careerfy-option-btn careerfy-{{$employement_term->category}}"><a href="{{route('get.applicants_byid', $job->id)}}" style="color: #ffffff;"> view</a></span>@endif @endforeach 

      </div>

     </div>
    </div>

    <div class="clearfix"></div></div></div></li>  <div class="space">&nbsp;</div>

                                     @endforeach 
                                  
 @else

<li> 
<div class="careerfy-employer-confitmation">
<div align="center">   <img src="{{asset('img/NoJobFound.png')}}" height="400" width="400" alt="" align="center"></div>
<div class="clearfix"></div>
</div> </li> @endif
 
    </div> </ul></div>
                                <!-- Pagination -->
                                <div class="careerfy-pagination-blog">
                                    <ul class="pagination">
                         {{ $tags->links() }}
                                    </ul>
                                </div>
                            </div>
                        </div>