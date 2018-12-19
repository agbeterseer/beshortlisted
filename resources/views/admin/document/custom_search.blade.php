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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content=" e" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
 
        <link href="{{ asset('css/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('css/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ asset('css/assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ asset('css/assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
       
        <link href="{{ asset('css/assets/apps/css/ticket.min.css')}}" rel="stylesheet" type="text/css" />
             <link href="{{ asset('css/assets/pages/css/search.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{ asset('css/assets/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ asset('css/assets/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css" />


   
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
                        <h1 class="page-title"> Search Results 4
                            <small>search results</small>
                        </h1>
                          <form name="candidateForm" action="{{route('extract.word')}}" enctype="multipart/form-data" method="post" >
                           {{ csrf_field() }}

                           <input type="file" name="extract">
                             
                            <button class="btn grey bold uppercase btn-block">Extract</button>
                       
                           </form>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="search-page search-content-3">
                            <div class="row">
                                <div class="col-lg-3">
                                <form action="{{route('advanced.search')}}" method="GET">
                                   {{ csrf_field() }}
                                    <div class="search-filter ">
                                        <div class="search-label uppercase" style="margin-top: 15px;">Search By</div>
                                        <div class="input-icon right">
                                            <i class="icon-magnifier"></i>
                                            <input type="text" class="form-control" placeholder="Filter by keywords"> </div>
                                        <div class="search-label uppercase" style="margin-top: 15px;">Sort By Years Of Experience</div>
                                        <select class="form-control" name="years_of_experience">
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
                                         <option value="...select one ...">...select one ...</option>
                                        @foreach($sort_categories_list as $sort_category)
                                            <option value="{{$sort_category->id}}">
                   
                                          <a href="" ><i class="icon-shield" style="background-color: green"></i> {{$sort_category->name}} </a>
                                            </option>
                                            @endforeach
                                     
                                        </select>
                                       <div class="search-label uppercase" style="margin-top: 15px;">Sort By Profession</div>
                                       <select name="profession" class="form-control">
                                       <option value="...select one ...">...select one ...</option>
                                       @foreach($professions as $profession)

                                    <option value="{{$profession->id}}">{{$profession->name}}</option>  
                                       @endforeach
                                       </select>
                                      
                                <div class="search-label uppercase" style="margin-top: 15px;">Sort By Location</div>
                                <select name="location" class="form-control">
                                <option value="...select one ...">...select one ...</option>
                                @foreach($cities as $city)

                               <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                                </select>
                              
                                        <button class="btn green bold uppercase btn-block">Update Search Results</button>
                                        <div class="search-filter-divider bg-grey-steel"></div>
                                        
                                        <div class="row">
                                            <div class="col-xs-7">
                                                <button class="btn grey bold uppercase btn-block">Reset Search</button>
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
                   @forelse($documents as $key => $document)
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
                                 @foreach($document->professions as $proferssion)
                              
                              {{$proferssion->name}}
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
                            <td>{{$document->city->name}} </td>
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
                                                 @empty 
                             @endforelse   
            </tbody>
            </table>


                        {{ $documents->appends(['s' => $s])->links() }}
                        </div>
 
                                    </div>
                                    <div class="search-pagination pagination-rounded">
                                        <ul class="pagination">
                                            <li class="page-active">
                                                <a href="javascript:;"> 1 </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"> 2 </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"> 3 </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"> 4 </a>
                                            </li>
                                        </ul>
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