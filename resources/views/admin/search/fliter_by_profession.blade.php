<!DOCTYPE html>


<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>DBMS | Search</title>
           @include('partials.app_css') 
   
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white page-sidebar-closed">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
                 @include('admin.layout.includes.header')
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                 

   @include('admin.document.layout.includes.sidenav')



                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                   

         <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN THEME PANEL -->
           
                        <!-- END THEME PANEL -->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="index.html">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <a href="#">General</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Search</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li>
                                            <a href="#">
                                                <i class="icon-bell"></i> Action</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-shield"></i> Another action</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-user"></i> Something else here</a>
                                        </li>
                                        <li class="divider"> </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-bag"></i> Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> Search Results
                            <small> results</small>
                        </h1>
 
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                                            <div class="btn-group">

<a class="btn btn-success" href="{{route('document.create')}}"><i class="fa fa-plus"></i>Add CV</a>
                                </div>
                        <p></p>
                        <div class="search-page search-content-3">
                            <div class="row">
                                <div class="col-lg-3"> 
                                <form action="{{route('search.index')}}" method="GET">
                                   {{ csrf_field() }}
                                    <div class="search-filter ">
                                        <div class="search-label uppercase" style="margin-top: 15px;">Search By</div>
                                        <div class="input-icon right">
                                            <i class="icon-magnifier"></i>
                                            <input type="text" class="form-control" placeholder="Filter by keywords"> </div>
                                        <div class="search-label uppercase" style="margin-top: 15px;">Sort By Years Of Experience</div>
                                        <select class="form-control" name="years_of_experience">
                                        <option value="{{$years_of_experience}}">{{$years_of_experience}}</option>
                                        <option value="">...select one...</option>
                                            <option value="1"> 1</option>
                                            <option value="2"> 2</option>
                                            <option value="3"> 3</option>
                                            <option value="4"> 4</option>
                                            <option value="5"> 5</option>
                                            <option value="6"> 6</option>
                                            <option value="7"> 7</option>
                                            <option value="8"> 8</option>
                                            <option value="9"> 9</option>
                                            <option value="10"> 10</option>
                                            <option value="11"> 11</option>
                                            <option value="12"> 12</option>
                                            <option value="13"> 13</option>
                                            <option value="14"> 14</option>
                                            <option value="15"> 15</option>
                                            <option value="16"> 16</option>
                                            <option value="17"> 17</option>
                                            <option value="18"> 18</option>
                                            <option value="19"> 19</option>
                                            <option value="20"> 20</option>
                                            <option value="21"> 21</option>
                                            <option value="22"> 22</option>
                                            <option value="23"> 23</option>
                                            <option value="24"> 24</option>
                                            <option value="25"> 25</option>
                                            <option value="26"> 26</option>
                                            <option value="27"> 27</option>
                                            <option value="28"> 28</option>

                                        </select>
                                            <div class="search-label uppercase" style="margin-top: 15px;">Filter By Category</div>
                                        <select class="form-control" name="sort_category">
                                        @if($sort_category === null)

                                    <option value="">{{$default_cat}}</option>
                                        @else

                                       <option value="{{$sort_category}}">{{$sort_category}}</option> 
                                        @endif
 
                                         <option value="">...select one ...</option>
                                        @foreach($sort_categories_list as $sort_category)
                                            <option value="{{$sort_category->name}}">
                                        <a href=""><i class="icon-shield" style="background-color: green"></i> {{$sort_category->name}} </a>
                                            </option>
                                            @endforeach
                                     
                                        </select>
                                       <div class="search-label uppercase" style="margin-top: 15px;">Sort By Profession</div>
                                       <select name="profession" class="form-control">
                                       @if($profession === null)
                                        {{$default_profession}}
                                      <option value="">{{$default_profession}}</option>
                                      @else
                                     <option value="{{$profession->id}}">{{$profession->name}}</option> 
                                       @endif
                                    <option value="">...select one ...</option>
                                       @foreach($professions as $profession)

                                        <option value="{{$profession->id}}">{{$profession->name}}</option>  
                                       @endforeach
                                       </select>
                                      
                                <div class="search-label uppercase" style="margin-top: 15px;">Sort By Location</div>
                                <select name="location" class="form-control">
                                @if($location === null)

<option value="">{{$default_city}}</option>
                                @else
<option value="{{$location->id}}">{{$location->name}}</option>
                                @endif 
                                <option value=""> </option>
                                @foreach($cities as $city)

                               <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                                </select>
                                <button class="btn green bold uppercase btn-block">Update Search Results</button>
                                        <div class="search-filter-divider bg-grey-steel"></div>
                                        
                                        <div class="row">
                                            <div class="col-xs-7">
                                            <a href="{{route('document.index')}}" class="btn grey bold uppercase btn-block"> Reset Search</a>
                                           
                                            </div>
                                    
                                        </div>
                                </form>

                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="row">
                                    <div style="">    
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>

            <th># </th>
            <th> Sort</th>
                <th> Candidate's name </th>
                <th> Profession </th>
                <th> Years Of Experience </th>
                <th> Shortlist</th>
                <th> Location </th>
                
                <th> Actions </th>
            </tr>
        </thead>
        <tfoot>
            <tr>
            
            <th>#</th>
            <th>File</th>
                <th> Candidate's name </th>
                <th> Profession </th>
                <th> Years Of Experience </th>
                <th> Shortlist </th>
                <th> Location </th>
                <th> Actions </th>
                
            </tr>
        </tfoot>
        <tbody>
                   @forelse($document_professions as $key => $document_p)

                   @foreach($documents as $document)

                   @if($document->id == $document_p->document_id)

            
                 
                       <tr class="odd gradeX">
                       <td>{{$key+1}} </td>
                       <td> 
    <form action="{{route('document.getFile')}}" method="POST">
        <input type="hidden" name="cv_file" value="{{ $document->cv_file }}">
                                                        {{csrf_field()}}
                                                        {{method_field('POST')}}

          <button class="btn btn-xs btn-primary  dropdown-toggle"  type="submit"> CV<i class="fa fa-download"></i></button>
             </form>
                        </td>
                     
 
                            <td>{{ title_case($document->candidates_name)}}</td>
                            <td>
                            @foreach($document_professions as $profession_)

                           @if($document->id == $profession_->document_id)

                                @foreach($professions as $profession)
                           
                          @if($profession->id == $profession_->profession_id)
                           {{$profession->name}}  
                          @endif

                                @endforeach
                            @endif
                          

                            @endforeach
                            
                            </td>
                            <td>{{$document->years_of_experience}}</td>
                            <td>
                            @if($document->sort_by_cat === 'Red') 
                            <span class="badge badge-empty badge-danger" ></span>
    <button class="btn btn-xs red dropdown-toggle"></button>
                            @elseif($document->sort_by_cat === 'Blue')
                       <span class="badge badge-empty badge-blue blue" style="background-color: blue"></span>
     <button class="btn btn-xs blue dropdown-toggle"></button>
                            @elseif($document->sort_by_cat === 'Green')
                            <span class="badge badge-empty badge-success"></span>
     <button class="btn btn-xs green dropdown-toggle"></button>
                           
                              @elseif($document->sort_by_cat === 'Orange')
                              <span class="badge badge-empty badge-warning"></span>
      <button class="btn btn-xs yellow dropdown-toggle"></button>
                             
                              @else
                            
      <button class="btn btn-xs white dropdown-toggle">[unsorted]</button>
                            @endif 
                            
                            </td>
                            <td>
                             @if($location === null)
                             @foreach($cities as $city)
 
                             @if($city->id == $document->city_id)

                              {{$city->name}}

                              @endif
                              @endforeach
                             @else

                             {{$location->name}} 

                             @endif

                            </td>
                             <td>
                                  <div class="page-toolbar">
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn blue btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Categorise CV
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                    @foreach($sort_categories_list as $sort_category)
                                        <li>
                             
                                            <a href="{{route('sort.criteria', ['document_id' => $document->id, 'id' => $sort_category->name] )}}">
                                             @if($sort_category->name === 'Green') <i class="icon-shield" style="background-color: green"></i>
                                             @elseif($sort_category->name === 'Orange')
                                        <i class="icon-shield" style="background-color: orange"></i>

                                        @elseif($sort_category->name === 'Blue')
                                        <i class="icon-shield" style="background-color: blue"></i>

                                        @elseif($sort_category->name === 'Red')
                                        <i class="icon-shield" style="background-color: red"></i>

                                             @endif   
                                             {{$sort_category->name}}</a>
                                        </li>

                                        @endforeach
                           <li class="divider"> </li>
                           <li>
                             <a href="{{route('document.edit', $document->id)}}">
                                                        <i class="icon-docs"></i> Edit CV </a>
                                                     
                                                    </li>
                           <li class="divider"> </li>
            <form  class="delete" action="{{route('document.destroy', $document->id)}}" method="POST">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                    <input class="btn btn-sm btn-danger" type="submit" value="Delete"></form> 
                                       
                                    </ul>
                                </div>
                            </div>
  
                                                      </td>
                                                 
                                                </tr>
                                                  @endif

                   @endforeach
                                                 @empty 
                             @endforelse   
            </tbody>
            </table>

                        @if($location === null || $profession === null || $sort_category === null)
                        {{ $document_professions->appends(['years_of_experience' => $years_of_experience])->links() }}

                        @elseif($profession === null && $location === null)
                        {{ $document_professions->appends(['years_of_experience' => $years_of_experience, 'sort_category' => $sort_category])->links() }}
                        @else
                        {{ $document_professions->appends(['s' => $s])->links() }}
                        @endif
                        </div>
 
                                    </div>
                         
                                </div>
                            </div>
                        </div>
                    </div>


                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
                <!-- BEGIN QUICK SIDEBAR -->
                 
                <!-- END QUICK SIDEBAR -->
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
       @include('partials.footer')

            <!-- END FOOTER -->
        </div>
        <!-- BEGIN QUICK NAV -->
  
        <div class="quick-nav-overlay"></div>
        <!-- END QUICK NAV -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <!-- BEGIN CORE PLUGINS -->
    @include('partials.javascripts2')
    </body>

</html>