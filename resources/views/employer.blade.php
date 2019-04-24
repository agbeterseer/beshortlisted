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
<style type="text/css">
 .nac{
    padding-top: 15px;
    padding-bottom: 15px;
 }
 table{

  }
  td{
    width: 100px;
  }
</style>
 
<style type="text/css">
    .scroll_div{
    overflow:scroll;
    overflow-x:hidden;
    overflow-y:scroll;
    height:200px;
    }

    .h2{
  font-size: 17px !important;
    margin-bottom: 0px !important;
    font-weight: 400 ;
    }
    hr{
      border: 1px solid #cccccc;
    }

</style>
 
    <?php  
            $unsorted_co = 0;
            $total = 0;
            $shortlisted = 0;
            $in_review = 0;
            $rejected = 0;
            $offered = 0;
            $hired = 0;
    ?> 

    <!-- Wrapper -->
    <div class="careerfy-wrapper">
        <!-- Header -->
        @include('partials.employer_menu')
        <!-- Header -->     
        <!-- Banner -->
        @include('partials.employer_breadcomb')
        <!-- Banner -->
        <!-- Main Content -->
   <!--      <div class="careerfy-main-content" style="margin-top: -50px;">
    <nav class="nav-tabs navbar-inverse">
  <div class="container-fluid">
 
    <ul class="nav navbar-nav">
    <li class="active"><a href="{{route('short.list')}}"  >Manage Jobs </a> </li>
      <li ><a href="#draft"  >Draft&nbsp; </a> </li>
      <li><a href="#awaiting"  >Awaiting Approval&nbsp; </a></li>
      <li><a href="#blacklist" >Blacklist&nbsp; </a></li>
      <li><a href="#not_active" >Not Active&nbsp; </a></li>
        <li><a href="#active" >Active&nbsp; </a></li>
    </ul>
  </div>
</nav>  -->
        <!-- Main Content -->
       
        <!-- <div class="space">&nbsp;</div> -->
        <div class="careerfy-main-content"> 
            <div class="careerfy-main-section"> 
                <div class="container">  
                    <div class="row"> 
      <div class="tabbable-line boxless tabbable-reversed">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                        <a href="#tab_0" data-toggle="tab">ALL JOBS  &nbsp;<span class="badge"> {{$jobs_count}}</span> </a>
                                        </li>
                                        <li>
                                      <a href="#tab_1" data-toggle="tab">DRAFT &nbsp;<span class="badge"> {{$job_draft_count}}</span></a>
                                        </li>
                                        <li>
                                            <a href="#tab_2" data-toggle="tab">AWAITING APROVAL &nbsp;<span class="badge">{{$job_awaiting_approval_count}}</span></a>
                                        </li>
                                        <li>
                                            <a href="#tab_3" data-toggle="tab">BLACKLIST &nbsp;<span class="badge">{{$job_blacklist_count}}</span></a>
                                        </li> 
                                        <li>
                                            <a href="#tab_4" data-toggle="tab">NOT ACTIVE &nbsp;<span class="badge">{{$job_not_activelist_count}}</span></a>
                                        </li>
                                         <li>
                                            <a href="#tab_5" data-toggle="tab">ACTIVE &nbsp;<span class="badge">{{$job_activelist_count}}</span></a>
                                        </li> 
                                    </ul>
                                      <div class="tab-content">
                                        <div class="tab-pane active" id="tab_0">
                        <aside class="careerfy-column-3 careerfy-typo-wrap" >
                            <div class="careerfy-typo-wrap">
                             
                                      <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle" style="background-color: #ffffff;">
                                      <h2><a href="#" class="careerfy-click-btn">Location</a></h2>
                                      <div class="careerfy-checkbox-toggle scroll_div" id="city_filter">
                                      <ul class="careerfy-checkbox" >
                                      @foreach($cities as $city) 
                                      <li>
                                      <input type="checkbox" id="r{{$city->id}}" name="city[]" value="{{$city->id}}" />
                                      <label for="r{{$city->id}}"><span></span>{{$city->name}}</label>
                                      </li> 
                                      @endforeach 
                                      </ul> 

                                      </div>
                                      </div>
                  
                                       <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle" style="background-color: #ffffff;">
                                        <h2><a href="#" class="careerfy-click-btn">Employement Terms</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="e_terms_filter">
                                            <ul class="careerfy-checkbox">
                                  @foreach($employement_terms as $employement_term)
                                                <li>
                                                    <input type="checkbox" id="jr{{$employement_term->id}}" name="e_terms[]" value="{{$employement_term->id}}"/>
                                                    <label for="jr{{$employement_term->id}}"><span></span>
                                                    {{$employement_term->name}}</label>
                                                    <small></small>
                                                </li>
                                  @endforeach 
                                            </ul>
                                        </div>
                                    </div>
                                    
                              <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle" style="background-color: #ffffff;">
                                        <h2><a href="#" class="careerfy-click-btn">Job Function</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="profession_filter">
                                            <ul class="careerfy-checkbox">
                                               @foreach($professions as $profession)
                                                <li>
                                                    <input type="checkbox" id="r_{{$profession->id}}" name="profession[]" value="{{$profession->id}}" />
                                                    <label for="r_{{$profession->id}}"><span></span>{{$profession->name}}</label>
                                                    <small>10</small>
                                                </li>
                                                @endforeach 
                                            </ul>
                              <!-- 
                              <a href="#" class="careerfy-seemore">+ see more</a> -->
                                        </div>
                                    </div>
                         
                            </div>
                        </aside>
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
                                          @if(!$jobs_draft_list->isEmpty())
                                          
                                            @if($tags)
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
                                     @endif
 @else

<li> 
<div class="careerfy-employer-confitmation">
<div align="center">   <img src="{{asset('img/NoRecordFound.png')}}" height="400" width="400" alt="" align="center"></div>
<div class="clearfix"></div>
</div> </li> @endif
 
    </div> </ul></div>
                                <!-- Pagination -->
                                <div class="careerfy-pagination-blog">
                                    <ul class="page-numbers">
                         
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                                        <div class="tab-pane" id="tab_1">
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
 
 <div class="col-md-2" align="center">
    <div class="badge" style="background-color: #ffffff;"><font style=" font-weight: bold; font-size: 35px; color: orange;">
  
     <?php  $total = \App\Application::where('sorted', 0)->where('tag_id',$job->id)->where('delete', 0)->count(); ?>
      
      {{$total}}
    </font>   <br><br><p></p>  <font  style="font-size: 20px; color: orange;"> Unsorted </font></div></div>
 
    <div class="col-md-2" align="center">
    <div class="badge" style="background-color: #ffffff;"><font style=" font-weight: bold; font-size: 35px; color: orange;">
      <?php  $in_review = \App\Application::where('in_review', 1)->where('tag_id',$job->id)->count(); ?>
{{$in_review}}</font>   <br><br><p></p>  <font  style="font-size: 20px; color: orange;"> In Review </font></div></div>

    <div class="col-md-2" align="center"><div align="center" class="badge" style=" background-color: #ffffff;"><font  style="font-weight: bold; font-size: 35px; color: orange;"><?php  $shortlisted = \App\Application::where('shortlisted', 1)->where('tag_id',$job->id)->count(); ?>
{{$shortlisted}}</font> <br><br><p></p>
    <font  style="font-size: 20px; color: red;">  Shortlisted</font></div></div>

    <div class="col-md-2" align="center">  <div class="badge" style=" background-color: #ffffff;"><font  style="font-weight: bold; font-size: 35px; color: red;"><?php  $rejected = \App\Application::where('rejected', 1)->where('tag_id',$job->id)->count(); ?>
{{$rejected}}</font>  <br><br><p></p>
    <font  style="font-size: 20px; color: red;">  Rejected</font>
    </div></div>

    <div class="col-md-2" align="center"> <div class="badge" style=" background-color: #ffffff;"><font style="font-weight: bold; font-size: 35px; color: green;">    <?php  $offered = \App\Application::where('offered', 1)->where('tag_id',$job->id)->count(); ?>
{{$offered}}</font><br><br><p></p>
    <font  style="font-size: 20px; color: green;">  Offered</font>

    </div><br></div>
    <div class="col-md-1" align="center"><div align="center" class="badge" style=" background-color: #ffffff;"><font  style="font-weight: bold; font-size: 35px; color: green;">  <?php  $hired = \App\Application::where('hired', 1)->where('tag_id',$job->id)->count(); ?>
{{$hired}} </font><br><br><p></p>
    <font  style="font-size: 20px; color: green;">  Hired</font>
    </div></div>

    </div></div>

 
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div>
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
<div align="center">   <img src="{{asset('img/NoRecordFound.png')}}" height="400" width="400" alt="" align="center"></div>
<div class="clearfix"></div>
</div> </li> @endif


    </div> </ul></div>
                                <!-- Pagination -->
                                <div class="careerfy-pagination-blog">
                                    <ul class="page-numbers">
                                {{ $jobs_draft_list->appends(['s' => $s])->links() }}
                                    </ul>
                                </div>
                            </div>
                        </div>
                                        </div>


                <div class="tab-pane" id="tab_2">
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
                                       <div>
                   @if(!$jobs_awaiting_approval_list->isEmpty())
                   @if($jobs_awaiting_approval_list)
                @foreach($jobs_awaiting_approval_list as $job)
      <li class="careerfy-column-12"><div class="careerfy-joblisting-classic-wrap"><div class="careerfy-joblisting-text">
    <div class="col-md-12 careerfy-list-option" >
      <div class="col-md-6">  <a href="{{route('get.applicants_byid', $job->id)}}" style="font-weight: 400px; font-size: 17px"> <h2>   {{$job->job_title}}  </h2> </a> <!-- <span>Featured</span> -->  </div>
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
     <div class="row"><div class="col-md-12">  <div class="col-md-2" align="center">
    <div class="badge" style="background-color: #ffffff;"><font style=" font-weight: bold; font-size: 35px; color: orange;">0</font>   <br><br><p></p>  <font  style="font-size: 20px; color: orange;"> Unsorted </font></div></div>
 
    <div class="col-md-2" align="center">
    <div class="badge" style="background-color: #ffffff;"><font style=" font-weight: bold; font-size: 35px; color: orange;">0</font>   <br><br><p></p>  <font  style="font-size: 20px; color: orange;"> In Review </font></div></div>

    <div class="col-md-2" align="center"><div align="center" class="badge" style=" background-color: #ffffff;"><font  style="font-weight: bold; font-size: 35px; color: orange;">0</font> <br><br><p></p>
    <font  style="font-size: 20px; color: red;">  Shortlisted</font></div></div>

    <div class="col-md-2" align="center">  <div class="badge" style=" background-color: #ffffff;"><font  style="font-weight: bold; font-size: 35px; color: red;"> 0</font>  <br><br><p></p>
    <font  style="font-size: 20px; color: red;">  Rejected</font>
    </div></div>

    <div class="col-md-2" align="center"> <div class="badge" style=" background-color: #ffffff;"><font style="font-weight: bold; font-size: 35px; color: green;">0</font><br><br><p></p>
    <font  style="font-size: 20px; color: green;">  Offered</font>

    </div><br></div>
    <div class="col-md-1" align="center"><div align="center" class="badge" style=" background-color: #ffffff;"><font  style="font-weight: bold; font-size: 35px; color: green;">0</font><br><br><p></p>
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

    <div class="clearfix"></div></div></div></li>  <div class="space">&nbsp;</div> @endforeach @endif @else <li> 
<div class="careerfy-employer-confitmation">
<div align="center">   <img src="{{asset('img/NoRecordFound.png')}}" height="400" width="400" alt="" align="center"></div>
<div class="clearfix"></div>
</div> </li> @endif </div> </ul></div>
                                <!-- Pagination -->
                                  <div class="careerfy-pagination-blog">
                                    <ul class="page-numbers">
                                {{ $jobs_awaiting_approval_list->appends(['s' => $s])->links() }}
                                    </ul>
                                </div>
                            </div>
                        </div>
                                        </div>
                                        <div class="tab-pane" id="tab_3">
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

                                   
                                       @if(!$job_black_list->isEmpty())
                                       @if($job_black_list)
                                    @foreach($job_black_list as $job)
      <li class="careerfy-column-12"><div class="careerfy-joblisting-classic-wrap"><div class="careerfy-joblisting-text">
    <div class="col-md-12 careerfy-list-option" >
      <div class="col-md-6">  <a href="{{route('get.applicants_byid', $job->id)}}" style="font-weight: 400px; font-size: 17px"> <h2>   {{$job->job_title}}  </h2> </a> <!-- <span>Featured</span> -->  </div>
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
     <div class="row"><div class="col-md-12">  <div class="col-md-2" align="center">
    <div class="badge" style="background-color: #ffffff;"><font style=" font-weight: bold; font-size: 35px; color: orange;">0</font>   <br><br><p></p>  <font  style="font-size: 20px; color: orange;"> Unsorted </font></div></div>
 
    <div class="col-md-2" align="center">
    <div class="badge" style="background-color: #ffffff;"><font style=" font-weight: bold; font-size: 35px; color: orange;">0</font>   <br><br><p></p>  <font  style="font-size: 20px; color: orange;"> In Review </font></div></div>

    <div class="col-md-2" align="center"><div align="center" class="badge" style=" background-color: #ffffff;"><font  style="font-weight: bold; font-size: 35px; color: orange;">0</font> <br><br><p></p>
    <font  style="font-size: 20px; color: red;">  Shortlisted</font></div></div>

    <div class="col-md-2" align="center">  <div class="badge" style=" background-color: #ffffff;"><font  style="font-weight: bold; font-size: 35px; color: red;"> 0</font>  <br><br><p></p>
    <font  style="font-size: 20px; color: red;">  Rejected</font>
    </div></div>

    <div class="col-md-2" align="center"> <div class="badge" style=" background-color: #ffffff;"><font style="font-weight: bold; font-size: 35px; color: green;">0</font><br><br><p></p>
    <font  style="font-size: 20px; color: green;">  Offered</font>

    </div><br></div>
    <div class="col-md-1" align="center"><div align="center" class="badge" style=" background-color: #ffffff;"><font  style="font-weight: bold; font-size: 35px; color: green;">0</font><br><br><p></p>
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

    <div class="clearfix"></div></div></div></li> <div class="space">&nbsp;</div> @endforeach  @endif  @else
<li> 
<div class="careerfy-employer-confitmation">
<div align="center">   <img src="{{asset('img/NoRecordFound.png')}}" height="400" width="400" alt="" align="center"></div>
<div class="clearfix"></div>
</div> </li>  @endif 

        </ul></div>
     
                                <!-- Pagination -->
                             
                            </div>
                        </div>

                                        </div>
                                        <div class="tab-pane" id="tab_4">
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

                                   
                                       @if(!$job_not_active_list->isEmpty())
                                       @if($job_not_active_list)
                                    @foreach($job_not_active_list as $job)
      <li class="careerfy-column-12"><div class="careerfy-joblisting-classic-wrap"><div class="careerfy-joblisting-text">
    <div class="col-md-12 careerfy-list-option" >
      <div class="col-md-6">  <a href="{{route('get.applicants_byid', $job->id)}}" style="font-weight: 400px; font-size: 17px"> <h2>   {{$job->job_title}}  </h2> </a> <!-- <span>Featured</span> -->  </div>
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
     <div class="row"><div class="col-md-12">  <div class="col-md-2" align="center">
    <div class="badge" style="background-color: #ffffff;"><font style=" font-weight: bold; font-size: 35px; color: orange;">0</font>   <br><br><p></p>  <font  style="font-size: 20px; color: orange;"> Unsorted </font></div></div>
 
    <div class="col-md-2" align="center">
    <div class="badge" style="background-color: #ffffff;"><font style=" font-weight: bold; font-size: 35px; color: orange;">0</font>   <br><br><p></p>  <font  style="font-size: 20px; color: orange;"> In Review </font></div></div>

    <div class="col-md-2" align="center"><div align="center" class="badge" style=" background-color: #ffffff;"><font  style="font-weight: bold; font-size: 35px; color: orange;">0</font> <br><br><p></p>
    <font  style="font-size: 20px; color: red;">  Shortlisted</font></div></div>

    <div class="col-md-2" align="center">  <div class="badge" style=" background-color: #ffffff;"><font  style="font-weight: bold; font-size: 35px; color: red;"> 0</font>  <br><br><p></p>
    <font  style="font-size: 20px; color: red;">  Rejected</font>
    </div></div>

    <div class="col-md-2" align="center"> <div class="badge" style=" background-color: #ffffff;"><font style="font-weight: bold; font-size: 35px; color: green;">0</font><br><br><p></p>
    <font  style="font-size: 20px; color: green;">  Offered</font>

    </div><br></div>
    <div class="col-md-1" align="center"><div align="center" class="badge" style=" background-color: #ffffff;"><font  style="font-weight: bold; font-size: 35px; color: green;">0</font><br><br><p></p>
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

    <div class="clearfix"></div></div></div></li>  <div class="space">&nbsp;</div> @endforeach @endif   @else
<li> 
<div class="careerfy-employer-confitmation">
<div align="center">   <img src="{{asset('img/NoRecordFound.png')}}" height="400" width="400" alt="" align="center"></div>
<div class="clearfix"></div>
</div> </li>  @endif 

        </ul></div>
     
                                <!-- Pagination -->
                             
                            </div>
                        </div>
                                        </div>
                                    <div class="tab-pane" id="tab_5">

         <div class="careerfy-column-12 careerfy-typo-wrap">
                            <div class="careerfy-typo-wrap">
                                <!-- FilterAble -->
                         <!-- <div class="careerfy-filterable">
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
                                       @if(!$job_active_list->isEmpty())
                                       @if($job_active_list)
                                    @foreach($job_active_list as $job)
                                    <?php 
                                        $h_hired = 0;
                                        $h_sorted = 0;
                                        $h_unsorted = 0;
                                        $h_rejected = 0;
                                        $h_shortlisted = 0;
                                        $h_offered = 0;
                                        $h_in_review = 0;
                                         ?>
      <li class="careerfy-column-12"><div class="careerfy-joblisting-classic-wrap"><div class="careerfy-joblisting-text">
    <div class="col-md-12 careerfy-list-option" >
      <div class="col-md-6">  <a href="{{route('get.applicants_byid', $job->id)}}" style="font-weight: 400px; font-size: 17px"> <h2>   {{$job->job_title}}  </h2> </a> <!-- <span>Featured</span> -->  </div>
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
     <div class="row"><div class="col-md-12">  <div class="col-md-2" align="center">
    <div class="badge" style="background-color: #ffffff;"><font style=" font-weight: bold; font-size: 35px; color: orange;"> 
       <?php  $h_shortlisted = \App\Application::where('sorted', 1)->where('tag_id',$job->id)->count(); ?>
    {{$h_shortlisted}} 
    </font>   <br><br><p></p>  <font  style="font-size: 20px; color: orange;"> Unsorted </font></div></div>
 
    <div class="col-md-2" align="center">
    <div class="badge" style="background-color: #ffffff;"><font style=" font-weight: bold; font-size: 35px; color: orange;">
       <?php  $h_shortlisted = \App\Application::where('in_review', 1)->where('tag_id',$job->id)->count(); ?>
    {{$h_shortlisted}} 
    </font>   <br><br><p></p>  <font  style="font-size: 20px; color: orange;"> In Review </font></div></div>

    <div class="col-md-2" align="center"><div align="center" class="badge" style=" background-color: #ffffff;"><font  style="font-weight: bold; font-size: 35px; color: orange;">
     <?php  $h_shortlisted = \App\Application::where('shortlisted', 1)->where('tag_id',$job->id)->count(); ?>
    {{$h_shortlisted}} 
    </font> <br><br><p></p>
    <font  style="font-size: 20px; color: red;">  Shortlisted</font></div></div>

    <div class="col-md-2" align="center">  <div class="badge" style=" background-color: #ffffff;"><font  style="font-weight: bold; font-size: 35px; color: red;">
     <?php  $h_rejected = \App\Application::where('rejected', 1)->where('tag_id',$job->id)->count(); ?>
    {{$h_rejected}} 
    </font>  <br><br><p></p>
    <font  style="font-size: 20px; color: red;">  Rejected</font>
    </div></div>

    <div class="col-md-2" align="center"> <div class="badge" style=" background-color: #ffffff;"><font style="font-weight: bold; font-size: 35px; color: green;">
  <?php  $h_offered = \App\Application::where('offered', 1)->where('tag_id',$job->id)->count(); ?>
{{$h_offered}} 
  </font><br><br><p></p>
    <font  style="font-size: 20px; color: green;">  Offered</font>

    </div><br></div>
    <div class="col-md-1" align="center"><div align="center" class="badge" style=" background-color: #ffffff;"><font  style="font-weight: bold; font-size: 35px; color: green;">

  <?php  $h_hired = \App\Application::where('hired', 1)->where('tag_id',$job->id)->count(); ?>
{{$h_hired}} 
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

    <div class="clearfix"></div></div></div></li> <div class="space">&nbsp;</div> @endforeach  @endif  @else
<li> 
<div class="careerfy-employer-confitmation">
<div align="center">   <img src="{{asset('img/NoRecordFound.png')}}" height="400" width="400" alt="" align="center"></div>
<div class="clearfix"></div>
</div> </li>  @endif 

        </ul></div>
     
                                <!-- Pagination -->
                             
                            </div>
                        </div>
 
                                        </div>
                                        </div>
 </div>
      </div>
         </div> 
            <!-- Main Section --> </div>
</div>
 
            <!-- Main Section -->
                <div class="container-fluid">
                  
                </div>
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
 <!-- 
    <script src="{{ asset('recruit/script/jquery.js')}}"></script> -->
     <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.4.min.js"></script>
    <script src="{{ asset('recruit/script/bootstrap.js')}}"></script>
    <script src="{{ asset('recruit/script/slick-slider.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/counter.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/fancybox.pack.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/isotope.min.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/functions.js')}}"></script> 
    <script src="{{ asset('css/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('css/assets/global/plugins/bootstrap-summernote/summernote.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('css/assets/global/plugins/jquery-repeater/jquery.repeater.js')}}" type="text/javascript"></script>
     
 <script src="{{ asset('css/assets/pages/scripts/form-repeater.min.js')}}" type="text/javascript"></script>
   <script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
</script>


<script>
   $('#city_filter').change(function() {
   
    var city = [];
    var employement_term = [];
    var job_function = []; 
 
    function itemExistsChecker(cboxValue) {
          
    var len = city.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (city[i] == cboxValue) {
          return true;
        }
      }
    }
          
    city.push(cboxValue);
  } 
   
  {
    $('#city_filter :checked').each(function() { 
     var cboxValue = $(this).val(); 

      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);

    }); 
   //console.log(city);
 
FilterAllJobs(city,employement_term,job_function);
 
  }
});



   $('#e_terms_filter').change(function() {
   
    var city = [];
    var employement_term = [];
    var job_function = []; 
 
    function itemExistsChecker(cboxValue) {
          
    var len = employement_term.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (employement_term[i] == cboxValue) {
          return true;
        }
      }
    }
          
    employement_term.push(cboxValue);
  } 
   
  {
    $('#e_terms_filter :checked').each(function() { 
     var cboxValue = $(this).val(); 
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    }); 
   //console.log(employement_term);
    FilterAllJobs(city,employement_term,job_function);
  }
});

   $('#profession_filter').change(function() {   
    var city = [];
    var employement_term = [];
    var job_function = []; 
    function itemExistsChecker(cboxValue) {
    var len = job_function.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (job_function[i] == cboxValue) {
          return true;
        }
      }
    }
          
    job_function.push(cboxValue);
  } 
   
  {
    $('#profession_filter :checked').each(function() { 
     var cboxValue = $(this).val(); 
       $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
     });
  // console.log(job_function);
FilterAllJobs(city,employement_term,job_function);
 
  }
});


function FilterAllJobs(city,employement_term,job_function){
    // console.log(city);
    // console.log(employement_term);
    // console.log(job_function);
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterjob', 
            data:{
                '_token':$('input[name=_token').val(),
                'location':city,
                'job_type':employement_term,
                'job_category':job_function, 
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show(); 
            $(".lds-ripplee").show(); 
            $("#info").append('<i class="btn-success btn-xs" style="color:#ffffff;"> fetching data... </i>');
            $("#joblist").hide();
             },
            success:function(data){
            //console.log(data);
          $('#joblist').empty();
          $("#industry-div").hide();
        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container

    $("#loader").hide();
    $(".lds-ripplee").hide(); 
    $("#info").hide();
    $("#joblist").show();

    },
    }).done(function (data) {
      var code = data.tags;
      var professions = data.professions;
      var employement_terms = data.employement_terms;
        if(isEmpty(code['data'])) {
        $('#joblist').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
          // $('#pages').empty();   
    } 
    var msg = '';
    var newname = '';
    var category = ''; 
       var terms_ = '';
        $.each(code['data'], function(key, value) {
          var id = value.id;
              var country = value.country;
              var city = value.city;
              var job_title = value.job_title;
              var job_category = value.job_category;
              var email = value.email_address;
              var job_type = value.job_type;
              var jobStatus = "";
       $.each(professions , function(key, value){
                var id = value.id;
                var name = value.name;
               // console.log(id);
                if (id === job_category) {
                newname = name;
                } 
         });
       $.each(employement_terms, function(key, value){    
                var id = value.id;
                var name = value.name;
                //console.log(id); 
                if (id === job_type) {
                category = value.category;
                terms_ = value.name;
                } 
         });
        if (value.status === 1 && value.active === 1) { 
        jobStatus = '<span class="badge" style="background-color: green;"> ONLINE</span>';
        }else{
        jobStatus = '<span class="badge" style="background-color: red;">OFFLINE</span>'
        }

 
 
          //loop through experience to get candidates experience <span>Featured</span>
            var content =' <li class="careerfy-column-12"><div class="careerfy-joblisting-classic-wrap"><div class="careerfy-joblisting-text"><div class="col-md-12 careerfy-list-option" ><div class="col-md-6"> <h2><a href="'+value.id+ '" style="font-weight: 400px; font-size: 17px"> '+ job_title +'  </a> </h2></div> <div class="col-md-6" align="right"> <div class="status-mark" align="right"><div class=""></div> STATUS: '+ jobStatus +' </div> </div> <hr><ul> <li><i class="careerfy-icon careerfy-maps-and-flags"></i> '+country +', '+ city +'</li><li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i>'+ newname +'</li></ul> </div><div class="row"><div class="col-md-12"><div class="col-md-2"><span class="badge" style="background-color: #ffffff;"><font  style="font-size: 35px;  color: orange;">0</font></span></div><div class="col-md-2"><span class="badge" style="background-color: #ffffff;"><font style="font-size: 35px; color: orange;">0</font></span></div><div class="col-md-2"><div align="center" class="badge" style=" background-color: #ffffff;"><font  style="font-size: 35px; color: orange;">0</font> </div></div><div class="col-md-2">  <span class="badge" style=" background-color: #ffffff;"><font  style="font-size: 35px; color: red;">0</font></span></div><div class="col-md-2"> <span class="badge" style=" background-color: #ffffff;"><font style="font-size: 35px; color: green;">0</font></span><br></div><div class="col-md-1"><div align="center" class="badge" style=" background-color: #ffffff;"><font  style="font-size: 35px; color: green;">'+0 +'</font></div></div></div></div><div class="row"><div class="col-md-12"><div class="col-md-2"><br><div style="font-weight: normal; size: 25px ">Unsorted</div> </div><div class="col-md-2"><br><div style="font-size: 20px; color: orange;">In Review </div> </div><div class="col-md-2"><br><div style="font-size: 20px;">Shortlisted</div></div><div class="col-md-2"><br><div style="font-size: 20px;">Rejected</div></div><div class="col-md-2"><br> <div style="font-size: 20px;">Offered</div></div><div class="col-md-1"><br> <div style="font-size: 20px;">Hired </div></div></div></div> <hr> <div class="col-sm-12"><div class="col-sm-6" align="left"><div class="careerfy-job-userlist2 careerfy-list-option" > <ul><li>Published  '+value.created_at+'</li> <li>  Expires in '+ value.end_date +'</li></ul>   </div></div> <div class="col-sm-6" align="right"><div class="careerfy-job-userlist"> <span class="careerfy-option-btn careerfy-'+category +'">'+terms_+'</span> <a href="#" class="careerfy-job-like"><i class="fa fa-heart"></i></a></div></div></div><div class="clearfix"></div></div></div></li><div class="space">&nbsp;</div>';  
    $('#joblist').append(content);  
        }); 
    });
} 


// console.log(
     $(document.getElementsByName('e_terms')).click(function() {
     // alert($('input[name=e_terms]:checked').val());
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterjob', 
            data:{
                '_token':$('input[name=_token').val(),
                'job_type':$('input[name=e_terms]:checked').val(),
                'location':$('input[name=city]:checked').val(),
                'job_category':$('input[name=profession]:checked').val(),
                'date_posted':$('input[name=date_posted]:checked').val()
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show(); 
             },
            success:function(data){
           // console.log(data);
           $('#joblist').empty();
      $("#industry-div").hide();
        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
    var code = data.tags; 
      var professions = data.professions;
      var employement_terms = data.employement_terms; 
       if(isEmpty(code['data'])) {
        $('#joblist').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
          // $('#pages').empty();   
    } 
    var msg = '';
    var newname = '';
    var category = '';
     var terms_ = '';
        $.each(code['data'], function(key, value) {  
                var country = value.country;
                var city = value.city;
                var job_title = value.job_title;
                var job_category = value.job_category;
                var email = value.email_address;
                var job_type_id = value.job_type; 
       $.each(professions , function(key, value){ 
                var id = value.id;
                var name = value.name;
                //console.log(id);  
                if (id === job_category) {
                newname = name;
                } 
         }); 
       $.each(employement_terms , function(key, value){ 
                var id = value.id;
                var name = value.name;
                //console.log(id);  
                if (id === job_type_id) {
                category = value.category;
                  terms_ = value.name;
                } 
         }); 
            //loop through experience to get candidates experience
            var content ='<li class="careerfy-column-12"><div class="careerfy-joblisting-classic-wrap"><div class="careerfy-joblisting-text"><div class="careerfy-list-option"> <h2><a href="#">'+ job_title +'  </a> <span>Featured</span></h2> <ul> <li><a href="#">'+email+'</a></li><li><i class="careerfy-icon careerfy-maps-and-flags"></i> '+country +', '+ city +'</li><li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i>'+ newname +'</li></ul> </div> <br><hr><div class="row"><div class="col-md-12"><div class="col-md-2"><span class="badge" style="background-color: #ffffff;"><font  style="font-size: 35px;  color: orange;">0</font></span></div><div class="col-md-2"><span class="badge" style="background-color: #ffffff;"><font style="font-size: 35px; color: orange;">0</font></span></div><div class="col-md-2"><div align="center" class="badge" style=" background-color: #ffffff;"><font  style="font-size: 35px; color: orange;">12</font> </div></div><div class="col-md-2">  <span class="badge" style=" background-color: #ffffff;"><font  style="font-size: 35px; color: red;">0</font></span></div><div class="col-md-2"> <span class="badge" style=" background-color: #ffffff;"><font style="font-size: 35px; color: green;">0</font></span><br></div><div class="col-md-1"><div align="center" class="badge" style=" background-color: #ffffff;"><font  style="font-size: 35px; color: green;">0</font></div></div></div></div><div class="row"><div class="col-md-12"><div class="col-md-2"><br><div style="font-weight: normal; size: 25px ">Unsorted</div> </div><div class="col-md-2"><br><div style="font-weight: normal;">In Review </div> </div><div class="col-md-2"><br><div style="font-weight: normal;">Shortlisted</div></div><div class="col-md-2"><br><div style="font-weight: normal;">Rejected</div></div><div class="col-md-2"><br> <div style="font-weight: normal;">Offered</div></div><div class="col-md-1"><br> <div style="font-weight: normal;">Hired </div></div></div></div> <hr> <div class="careerfy-job-userlist"> <span class="careerfy-option-btn careerfy-'+category +'">'+terms_+'</span> <a href="#" class="careerfy-job-like"><i class="fa fa-heart"></i></a></div><div class="clearfix"></div></div></div></li><div class="space">&nbsp;</div>'; 
     $('#joblist').append(content);  
        });
    });
});
 
 $(document.getElementsByName('date_posted')).click(function() {
     // alert($('input[name=date_posted]:checked').val());
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterjob', 
            data:{
                '_token':$('input[name=_token').val(),
                'job_type':$('input[name=e_terms]:checked').val(),
                'location':$('input[name=city]:checked').val(),
                'job_category':$('input[name=profession]:checked').val(),
                'date_posted':$('input[name=date_posted]:checked').val()
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show(); 
             },
            success:function(data){
           // console.log(data);
           $('#joblist').empty();
      $("#industry-div").hide();
        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
    var code = data.tags; 
      var professions = data.professions;
      var employement_terms = data.employement_terms; 
       if(isEmpty(code['data'])) {
        $('#joblist').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
          // $('#pages').empty();   
    } 
    var msg = '';
    var newname = '';
    var category = '';
    var terms_ = '';
        $.each(code['data'], function(key, value) {  
                var country = value.country;
                var city = value.city;
                var job_title = value.job_title;
                var job_category = value.job_category;
                var email = value.email_address;
                var job_type_id = value.job_type; 
       $.each(professions , function(key, value){ 
                var id = value.id;
                var name = value.name;
                //console.log(id);  
                if (id === job_category) {
                newname = name;
                } 
         });

       $.each(employement_terms , function(key, value){ 
                var id = value.id;
                var name = value.name;
                //console.log(id);  
                if (id === job_type_id) {
                category = value.category;
                terms_ = value.name; 
                } 
         });

            //loop through experience to get candidates experience
            var content ='<li class="careerfy-column-12"><div class="careerfy-joblisting-classic-wrap"><div class="careerfy-joblisting-text"><div class="careerfy-list-option"> <h2><a href="#">'+ job_title +'  </a> <span>Featured</span></h2> <ul> <li><a href="#">'+email+'</a></li><li><i class="careerfy-icon careerfy-maps-and-flags"></i> '+country +', '+ city +'</li><li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i>'+ newname +'</li></ul> </div> <br><hr><div class="row"><div class="col-md-12"><div class="col-md-2"><span class="badge" style="background-color: #ffffff;"><font  style="font-size: 35px;  color: orange;">10</font></span></div><div class="col-md-2"><span class="badge" style="background-color: #ffffff;"><font style="font-size: 35px; color: orange;">50</font></span></div><div class="col-md-2"><div align="center" class="badge" style=" background-color: #ffffff;"><font  style="font-size: 35px; color: orange;">12</font> </div></div><div class="col-md-2">  <span class="badge" style=" background-color: #ffffff;"><font  style="font-size: 35px; color: red;">52</font></span></div><div class="col-md-2"> <span class="badge" style=" background-color: #ffffff;"><font style="font-size: 35px; color: green;">35</font></span><br></div><div class="col-md-1"><div align="center" class="badge" style=" background-color: #ffffff;"><font  style="font-size: 35px; color: green;">11</font></div></div></div></div><div class="row"><div class="col-md-12"><div class="col-md-2"><br><div style="font-weight: normal; size: 25px ">Unsorted</div> </div><div class="col-md-2"><br><div style="font-weight: normal;">In Review </div> </div><div class="col-md-2"><br><div style="font-weight: normal;">Shortlisted</div></div><div class="col-md-2"><br><div style="font-weight: normal;">Rejected</div></div><div class="col-md-2"><br> <div style="font-weight: normal;">Offered</div></div><div class="col-md-1"><br> <div style="font-weight: normal;">Hired </div></div></div></div> <hr> <div class="careerfy-job-userlist"> <span class="careerfy-option-btn careerfy-'+category +'">'+terms_+'</span> <a href="#" class="careerfy-job-like"><i class="fa fa-heart"></i></a></div><div class="clearfix"></div></div></div></li><div class="space">&nbsp;</div>'; 
     $('#joblist').append(content);  
        });
    });
});


 $(document.getElementsByName('profession')).click(function() {
      //alert($('input[name=profession]:checked').val());
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterjob', 
            data:{
                '_token':$('input[name=_token').val(),
                'job_type':$('input[name=e_terms]:checked').val(),
                'location':$('input[name=city]:checked').val(),
                'job_category':$('input[name=profession]:checked').val(),
                'date_posted':$('input[name=date_posted]:checked').val()
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show(); 
             },
            success:function(data){
            //console.log(data);
           $('#joblist').empty();
      $("#industry-div").hide();
        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
    var code = data.tags;
     
      var professions = data.professions;
      var employement_terms = data.employement_terms; 
       if(isEmpty(code['data'])) {
        $('#joblist').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
          // $('#pages').empty();   
    } 
    var msg = '';
    var newname = '';
    var category = '';
        $.each(code['data'], function(key, value) {  
                var country = value.country;
                var city = value.city;
                var job_title = value.job_title;
                var job_category = value.job_category;
                var email = value.email_address;
                var job_type_id = value.job_type;
   
       $.each(professions , function(key, value){
                
                var id = value.id;
                var name = value.name;
                //console.log(id); 
               
                if (id === job_category) {
                newname = name;
                } 
         });

       $.each(employement_terms , function(key, value){
                
                var id = value.id;
                var name = value.name;
                //console.log(id); 
               
                if (id === job_type_id) {
                category = value.category;
                } 
         });

            //loop through experience to get candidates experience
            var content ='<li class="careerfy-column-12"><div class="careerfy-joblisting-classic-wrap"><div class="careerfy-joblisting-text"><div class="careerfy-list-option"> <h2><a href="#">'+ job_title +'  </a> <span>Featured</span></h2> <ul> <li><a href="#">'+email+'</a></li><li><i class="careerfy-icon careerfy-maps-and-flags"></i> '+country +', '+ city +'</li><li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i>'+ newname +'</li></ul> </div> <br><hr><div class="row"><div class="col-md-12"><div class="col-md-2"><span class="badge" style="background-color: #ffffff;"><font  style="font-size: 35px;  color: orange;">10</font></span></div><div class="col-md-2"><span class="badge" style="background-color: #ffffff;"><font style="font-size: 35px; color: orange;">50</font></span></div><div class="col-md-2"><div align="center" class="badge" style=" background-color: #ffffff;"><font  style="font-size: 35px; color: orange;">12</font> </div></div><div class="col-md-2">  <span class="badge" style=" background-color: #ffffff;"><font  style="font-size: 35px; color: red;">52</font></span></div><div class="col-md-2"> <span class="badge" style=" background-color: #ffffff;"><font style="font-size: 35px; color: green;">35</font></span><br></div><div class="col-md-1"><div align="center" class="badge" style=" background-color: #ffffff;"><font  style="font-size: 35px; color: green;">11</font></div></div></div></div><div class="row"><div class="col-md-12"><div class="col-md-2"><br><div style="font-weight: normal; size: 25px ">Unsorted</div> </div><div class="col-md-2"><br><div style="font-weight: normal;">In Review </div> </div><div class="col-md-2"><br><div style="font-weight: normal;">Shortlisted</div></div><div class="col-md-2"><br><div style="font-weight: normal;">Rejected</div></div><div class="col-md-2"><br> <div style="font-weight: normal;">Offered</div></div><div class="col-md-1"><br> <div style="font-weight: normal;">Hired </div></div></div></div> <hr> <div class="careerfy-job-userlist"> <span class="careerfy-option-btn careerfy-'+category +'">'+name+'</span> <a href="#" class="careerfy-job-like"><i class="fa fa-heart"></i></a></div><div class="clearfix"></div></div></div></li><div class="space">&nbsp;</div>'; 
     $('#joblist').append(content);  
        });
    });
});



</script>

 <script>
   $(".lds-ripple").hide();
   $(".lds-ripplee").hide();
   $(".info").hide();
    $(".delete").on("submit", function(){
        return confirm("Do you want to delete this item?");
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

  </script>
</body>

</html>
