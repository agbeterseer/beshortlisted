
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title> Beshortlisted | Admin Dashboard</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    
         <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{ asset('css/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/assets/global/plugins/morris/morris.css') }}" rel="stylesheet">
        <link href="{{ asset('css/assets/global/plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/assets/global/plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/assets/global/plugins/jqvmap/jqvmap/jqvmap.css') }}" rel="stylesheet">
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ asset('css/assets/global/css/components.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/assets/global/css/plugins.min.css') }}" rel="stylesheet">
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{ asset('css/assets/layouts/layout/css/layout.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/assets/layouts/layout/css/themes/darkblue.min.css') }}" rel="stylesheet">
     <link href="{{ asset('css/assets/layouts/layout/css/custom.min.css') }}" rel="stylesheet">
        <!-- END THEME LAYOUT STYLES -->
<!--         <link rel="shortcut icon" href="favicon.ico" /> -->
 </head>

    <!-- END HEAD -->
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">
        <div class="page-wrapper">
            <!-- BEGIN HEADER --> 
          @include('partials.header')
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <div class="page-container">
                  <!-- BEGIN SIDEBAR -->
                  <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                  <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed --> 
         @inject('request', 'Illuminate\Http\Request')
<div class="page-sidebar-wrapper">

                      <!-- BEGIN SIDEBAR -->
                      <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                      <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                      <div class="page-sidebar navbar-collapse collapse">
                          <!-- BEGIN SIDEBAR MENU -->

                          <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                              <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                              <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                              <li class="sidebar-toggler-wrapper hide">
                                  <div class="sidebar-toggler">
                                      <span></span>
                                  </div>
                              </li>

                              <!-- END SIDEBAR TOGGLER BUTTON -->
                              <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                              <li class="sidebar-search-wrapper">
                                  <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                                  <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                                  <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                            <!--       <form class="sidebar-search" action="{{route('document.index')}}" method="POST">
                                   {{ csrf_field() }}
                                      <a href="javascript:;" class="remove">
                                          <i class="icon-close"></i>
                                      </a>
                                      <div class="input-group">
                 <input type="text" class="form-control" name="s"placeholder="Search...">
                                          <span class="input-group-btn">
                                 <a type="submit" href=" " class="btn submit">
                                                  <i class="icon-magnifier"></i>
                                              </a>
                                          </span>
                                      </div>
                                  </form> -->
                                  <!-- END RESPONSIVE QUICK SEARCH FORM -->
                              </li>
                     
                              <li class="nav-item start active open">
                              <a href="{{route('board')}}" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>
                                      <span class="arrow open"></span>
                                  </a>
                              </li>
          
                        <li class="nav-item">
                                  <a href="javascript:;" class="nav-link nav-toggle">
                                      <i class="icon-puzzle"></i>
                                      <span class="title">Menu</span>
                                      <span class="arrow"></span>
                                  </a>
                                   <ul class="sub-menu">
                                   <li class="nav-item">
                                      <a href="{{ route('menu.index') }}" class="nav-link "> 
                                     <span class="title">All Menu</span>
                                      </a>
                                      </li>
                                          <li class="nav-item ">
                                          <a href="{{ route('menu.create') }}" class="nav-link ">
                                              <span class="title">Add Menu</span>
                                          </a>
                                      </li> 
                                                   
                                  </ul> 
                      </li>
                      <li class="nav-item" id="roleid">
                                  <a href="javascript:;" class="nav-link nav-toggle">
                                      <i class="icon-briefcase"></i>
                                      <span class="title">Role Management</span>
                                  <span class="arrow"></span>
                                      <span class="selected"></span>
                                  </a>
                                  <ul class="sub-menu">
                                      <li class="nav-item">
                                          <a href="{{route('role.index')}}" class="nav-link">
                                              <span class="title">View Roles</span>
                                             <span class="selected"></span>
                                          </a>
                                      </li>
                            
                                    </ul>
                                  </li>
                                  
                                   <li class="nav-item  ">
                                  <a href="javascript:;" class="nav-link nav-toggle">
                                      <i class="icon-users"></i>
                                      <span class="title">User Mangement</span>
                                      <span class="arrow"></span>
                                  </a>
                                   <ul class="sub-menu">
                                      <li class="nav-item ">
                                      <a href="{{ route('user.index') }}" class="nav-link "> 
                                     <span class="title">User</span>
                                      </a>
                                
                                      </li>
                               </ul>
                                      
                      
                              </li> 

         
                             <li class="nav-item">
                                  <a href="javascript:;" class="nav-link nav-toggle">
                                      <i class="icon-docs"></i>
                                      <span class="title">TAGs</span>
                                      <span class="arrow"></span>
                                  </a>
                                   <ul class="sub-menu">
                                      <li class="nav-item ">
                                      <a href="{{ route('tag.index') }}" class="nav-link "> 
                                     <span class="title">All Tags</span>
                                      </a>
                                
                                      </li>
                  <li class="nav-item ">
                                          <a href="{{route('tag.create')}}" class="nav-link ">
                                              <span class="title">Add New Tag</span>
                                          </a>
                                      </li> 
                                  </ul> 
                      
                              </li>                
                                <li class="nav-item">
                                  <a href="javascript:;" class="nav-link nav-toggle">
                                      <i class="icon-puzzle"></i>
                                      <span class="title">Pages</span>
                                      <span class="arrow"></span>
                                  </a>
                                   <ul class="sub-menu">
                                   <li class="nav-item ">
                                      <a href="{{ route('pages.index') }}" class="nav-link "> 
                                     <span class="title">All Pages</span>
                                      </a>
                                
                                      </li>
                                  <li class="nav-item ">
                                          <a href="{{ route('pages.create') }}" class="nav-link ">
                                              <span class="title">Add Page</span>
                                          </a>
                                      </li>  
                                <li class="nav-item {{ $request->segment(1) == 'policies' ? 'active' : '' }}">
                                          <a href="{{route('policies.index')}}" class="nav-link ">
                                        <span class="title">@lang('cvmanagement.policies.title') </span>
                                          </a>
                                      </li> 
                             <li class="nav-item {{ $request->segment(1) == 'policies' ? 'active' : '' }}">
                                     <a href="{{route('page_infor')}}" class="nav-link ">
                                        <span class="title">Page Information </span>
                                          </a>
                                </li>
                                  <li class="nav-item {{ $request->segment(1) == 'policies' ? 'active' : '' }}">
                                     <a href="{{route('policies.index')}}" class="nav-link ">
                                        <span class="title">Employer </span>
                                          </a>
                                </li>         
                                  </ul>
                                </li>
                                <li class="nav-item">
                                  <a href="javascript:;" class="nav-link nav-toggle">
                                      <i class="icon-puzzle"></i>
                                      <span class="title">Job Post</span>
                                      <span class="arrow"></span>
                                  </a>
                                   <ul class="sub-menu">
                                   <li class="nav-item ">
                                      <a href="{{ route('tag.index') }}" class="nav-link "> 
                                     <span class="title">All Job Post</span>
                                      </a>
                                
                                      </li>
                        <li class="nav-item ">
                                          <a href="{{ route('tag.create') }}" class="nav-link ">
                                              <span class="title">Add New</span>
                                          </a>
                                      </li> 
                                                   
                                  </ul>
                                       <!--  <a href="{{ url('/register') }}">Register</a>  -->
                      
                              </li>
                           <li class="nav-item{{ $request->segment(1) == 'package' ? 'active' : '' }} " >
                                  <a href="javascript:;" class="nav-link nav-toggle">
                                      <i class="icon-puzzle"></i>
                                      <span class="title">Packages</span>
                                      <span class="arrow"></span>
                                  </a>
                                   <ul class="sub-menu">
                                   <li class="nav-item">
                                      <a href="{{ route('plans.index') }}" class="nav-link "> 
                                     <span class="title">All Packages</span>
                                      </a>
                                
                                      </li>
                                          <li class="nav-item ">
                                          <a href="{{ route('plans.create') }}" class="nav-link ">
                                              <span class="title">Add Package</span>
                                          </a>
                                      </li> 
                                                   
                                  </ul> 
                              </li>
 
 
                          <li class="nav-item {{ $request->segment(1) == 'resume' ? 'active' : '' }} ">
                                  <a href="javascript:;" class="nav-link nav-toggle">
                                      <i class="icon-settings"></i>
                                      <span class="title">Resume Builder</span>
                                      <span class="arrow"></span>
                                  </a>
                                  <ul class="sub-menu">
                                  
                                      <li class="nav-item ">
                                          <a href="{{route('resume.index')}}" class="nav-link ">
                                        <span class="title">Templates </span>
                                          </a>
                                      </li>

                                  <li class="nav-item ">
                                          <a href="{{route('resume.create')}}" class="nav-link ">
                                        <span class="title">Add Template </span>
                                          </a>
                                      </li>
                                    <li class="nav-item {{ $request->segment(1) == 'policies' ? 'active' : '' }}">
                                          <a href="{{route('policies.index')}}" class="nav-link ">
                                        <span class="title">@lang('cvmanagement.policies.title') </span>
                                          </a>
                                      </li>

                                    </ul> 
                                  </li>  
                              <li class="nav-item">
                                  <a href="javascript:;" class="nav-link nav-toggle">
                                      <i class="icon-settings"></i>
                                      <span class="title">Settings</span>
                                      <span class="arrow"></span>
                                  </a>
                                  <ul class="sub-menu">
                                  
                                      <li class="nav-item ">
                                          <a href="{{route('backupsys.importExport')}}" class="nav-link ">
                                        <span class="title">Back up cv </span>
                                          </a>
                                      </li>

                                  <li class="nav-item ">
                                          <a href="{{route('backupsys.backups')}}" class="nav-link ">
                                        <span class="title">Back up cv </span>
                                          </a>
                                      </li>
                                    <li class="nav-item {{ $request->segment(1) == 'policies' ? 'active' : '' }}">
                                          <a href="{{route('policies.index')}}" class="nav-link ">
                                        <span class="title">@lang('cvmanagement.policies.title') </span>
                                          </a>
                                      </li> 
                                  <li class="nav-item {{ $request->segment(1) == 'fields-of-study' ? 'active' : '' }}">
                                          <a href="{{route('create.field')}}" class="nav-link ">
                                        <span class="title">@lang('cvmanagement.fields-of-study.title') </span>
                                          </a>
                                      </li> 
                                    <li class="nav-item {{ $request->segment(1) == 'contact' ? 'active' : '' }}">
                                          <a href="{{route('show.contacts')}}" class="nav-link ">
                                        <span class="title">@lang('cvmanagement.contact.title') </span>
                                          </a>
                                      </li> 
                                       <li class="nav-item ">
                                          <a href="{{route('banner.index')}}" class="nav-link ">
                                        <span class="title">Banner </span>
                                          </a>
                                      </li> 
                                     <li class="nav-item ">
                                          <a href="{{route('aboutus.index')}}" class="nav-link ">
                                        <span class="title">AboutUs </span>
                                          </a>
                                      </li> 
                                  <li class="nav-item ">
                                          <a href="{{route('frequently.index')}}" class="nav-link ">
                                        <span class="title">Frequently Questions </span>
                                          </a>
                                      </li> 
                                        <li class="nav-item ">
                                          <a href="{{route('admin.tickets')}}" class="nav-link ">
                                        <span class="title">Support Tickets </span>
                                          </a>
                                      </li>
                                    <li class="nav-item ">
                                          <a href="{{route('show.industry_settings')}}" class="nav-link ">
                                        <span class="title">Industries </span>
                                          </a>
                                      </li>   
                                    </ul> 
                                  </li> 
                                   <li class="nav-item  ">
                                  <a href="javascript:;" class="nav-link nav-toggle">
                                      <i class="icon-settings"></i>
                                      <span class="title">Send Email</span>
                                      <span class="arrow"></span>
                                  </a>
                                  <ul class="sub-menu"> 
                                      <li class="nav-item ">
                                          <a href="{{route('show.uploademail')}}" class="nav-link ">
                                        <span class="title">Upload Emails </span>
                                          </a>
                                      </li>
                                        <!--    <li class="nav-item ">
                                          <a href="{{route('backupsys.backups')}}" class="nav-link ">
                                        <span class="title">Back up cv </span>
                                          </a>
                                      </li> -->
                              </ul>

                                  </li>
                         <!-- END SIDEBAR MENU -->
                          <!-- END SIDEBAR MENU -->
                     </div>
                      <!-- END SIDEBAR -->
                  </div>
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
                                    <a href="">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Dashboard</span>
                                </li>
                            </ul>
                    
                        </div>
                         <div class="content-wrapper">
    @if (Session::has('done'))
      <div class="alert alert-success sessionmodal">
        {{session('added')}}
      </div>
    @elseif (Session::has('updated'))
      <div class="alert alert-info sessionmodal">
        {{session('updated')}}
      </div>
    @elseif (Session::has('deleted'))
      <div class="alert alert-danger sessionmodal">
        {{session('deleted')}}
      </div>
    @endif
                            <!-- <img id="loading" src="assets/pages/img/login/ajax-loader.gif"> -->
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <!-- BEGIN DASHBOARD STATS 1-->
                                             
                        <!-- END DASHBOARD STATS 1-->
                <h1 class="page-title"> Admin Dashboard
                <small>Current Users, recent events and reports</small>
                        </h1>
                          <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-green-sharp">
                                             
                              <span data-counter="counterup" data-value="{{$documents}}">0</span>
                                        <!-- <small class="font-green-sharp">$</small> -->
                                            </h3>
                                            <small>TOTAL Applications's</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-puzzle"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                            <!--             <div class="progress">
                                            <span style="width: 30%;" class="progress-bar progress-bar-success green-sharp">
                                                <span class="sr-only">{{$documents}}% progress</span>
                                            </span>
                                        </div> -->
                                    <!--     <div class="status">
                                            <div class="status-title"> progress </div>
                                            <div class="status-number"> {{$documents}}% </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-red-haze">
                                                <span data-counter="counterup" data-value="{{$roles}}">0</span>
                                            </h3>
                                            <small>Roles</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-like"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                               <!--          <div class="progress">
                                            <span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
                                                <span class="sr-only">85</span>
                                            </span>
                                        </div> -->
                               <!--          <div class="status">
                                            <div class="status-title"> change </div>
                                            <div class="status-number"> 85% </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                   <!--          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-blue-sharp">
                                                <span data-counter="counterup" data-value="567"></span>
                                            </h3>
                                            <small>Updates</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-briefcase"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                         <div class="progress">
                                            <span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
                                                <span class="sr-only">45</span>
                                            </span>
                                        </div>  
                                        <div class="status">
                                            <div class="status-title"> grow </div>
                                            <div class="status-number"> 45% </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-purple-soft">
                                                <span data-counter="counterup" data-value="{{$users}}"></span>
                                            </h3>
                                            <small>USERS</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-user"></i>
                                        </div>
                                    </div>
                                <div class="progress-info">
                            <!--         <div class="progress">
                                        <span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">
                                            <span class="sr-only">56% change</span>
                                        </span>
                                        </div> -->
                           <!--              <div class="status">
                                            <div class="status-title"> change </div>
                                            <div class="status-number"> 57% </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                              <!-- contect here -->
                         @yield('content')
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
                <!-- BEGIN QUICK SIDEBAR -->
                <a href="javascript:;" class="page-quick-sidebar-toggler">
                    <i class="icon-login"></i>
                </a>
                <!-- END QUICK SIDEBAR -->
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <div class="page-footer">
                <div class="page-footer-inner"> 2017 &copy; cv management
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <!-- END FOOTER -->
        </div>
        <!-- BEGIN QUICK NAV -->
        <nav class="quick-nav">
            <a class="quick-nav-trigger" href="#0">
                <span aria-hidden="true"></span>
            </a>
            <ul>
                <li>
                    <a href="{{ route('test.dashborad') }}"  class="active">
                        <span>Online Test</span>
                        <i class="icon-users"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.index') }}" class="active">
                        <span>Applicant</span>
                        <i class="icon-users"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('document.index') }}" >
                        <span>Shortlisted</span>
                        <i class="icon-users"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('board') }}">
                        <span>Scheduled for Interview</span>
                        <i class="icon-graph"></i>
                    </a>
                </li>

            </ul>
            <span aria-hidden="true" class="quick-nav-bg"></span>
        </nav>
        <div class="quick-nav-overlay"></div>
        <!-- END QUICK NAV -->
        <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script>
<script src="assets/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
  <!--       <script type="text/javascript">
            @mixin my-mixin($some-number) {
            width: $some-number;
            }
         

        </script> -->
            <script src="{{ asset('css/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('css/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
      
        <script src="{{ asset('css/assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
 
<script src="{{ asset('css/assets/global/plugins/counterup/jquery.waypoints.min.js') }}" type="text/javascript"></script>
      
 <script src="{{ asset('css/assets/global/plugins/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>

        <script src="{{ asset('css/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('css/assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('css/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>

         <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->

         <script src="{{ asset('css/assets/global/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('css/assets/global/plugins/morris/raphael-min.js') }}" type="text/javascript"></script>
        
        <script src="{{ asset('css/assets/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
  
       
      <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
         
            <script src="{{ asset('css/assets/global/scripts/datatable.js') }}" type="text/javascript"></script>

          <script src="{{ asset('css/assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>

       <script src="{{ asset('css/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->

        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS --> 
        <script src="{{ asset('css/assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('css/assets/pages/scripts/table-datatables-managed.min.js') }}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
         <script src="{{ asset('css/assets/pages/scripts/dashboard.min.js') }}" type="text/javascript"></script>
        
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
         <script src="{{ asset('css/assets/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
       
        <script src="{{ asset('css/assets/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('css/assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('css/assets/layouts/global/scripts/quick-nav.min.js') }}" type="text/javascript"></script>
    </body>
    <script type="text/javascript">
     
var refresh_rate = 3600; //<-- In seconds, change to your needs
var last_user_action = 0;
var has_focus = false;
var lost_focus_count = 0;
var focus_margin = 10; // If we lose focus more then the margin we want to refresh

function reset() {
    last_user_action = 0;
    console.log("Reset");
}

function windowHasFocus() {
    has_focus = true;
}

function windowLostFocus() {
    has_focus = false;
    lost_focus_count++;
    console.log(lost_focus_count + " <~ Lost Focus");
}

setInterval(function () {
    last_user_action++;
    refreshCheck();
}, 1000);

function refreshCheck() {
    var focus = window.onfocus;
    if ((last_user_action >= refresh_rate && !has_focus && document.readyState == "complete") || lost_focus_count > focus_margin) {
        window.location.reload(); // If this is called no reset is needed
        reset(); // We want to reset just to make sure the location reload is not called.
    }

}
window.addEventListener("focus", windowHasFocus, false);
window.addEventListener("blur", windowLostFocus, false);
window.addEventListener("click", reset, false);
window.addEventListener("mousemove", reset, false);
window.addEventListener("keypress", reset, false);

 </script>


</html>