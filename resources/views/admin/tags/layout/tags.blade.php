

        <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title> Document management System | Admin Dashboard</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="cache-control" content="private, max-age=0, no-cache">
        <meta http-equiv="pragma" content="no-cache">
        <meta http-equiv="expires" content="0">
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
           <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/assets/global/plugins/bootstrap-multiselect/css/bootstrap-multiselect.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('css/assets/global/plugins/jstree/dist/themes/default/style.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
 
        <link href="{{ asset('css/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('css/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ asset('css/assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ asset('css/assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
           <link href="{{ asset('css/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
       
        <link href="{{ asset('css/assets/apps/css/ticket.min.css')}}" rel="stylesheet" type="text/css" />
             <link href="{{ asset('css/assets/pages/css/search.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{ asset('css/assets/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ asset('css/assets/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css" />

<style>

.multiselect{
    width: 100%;
}
.selectBox{
    position: relative;
}
.selectBox select {
    width: 100%;
    font-weight: bold;
}
.overSelect {
    position: absolute;
    left: 0; right: 0; top: 0; bottom: 0;
}
#checkboxes {
    display: none;
    border: 1px #dadada solid;
}
#checkboxes label {
    display: block;
}
#checkboxes label:hover {
    background-color: #EEF1F5;
}

 </style>



       
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <!-- BEGIN THEME GLOBAL STYLES -->

        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- <link href="../assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" /> -->
        <!-- END THEME LAYOUT STYLES -->
<!--         <link rel="shortcut icon" href="favicon.ico" /> -->
 </head>
    <!-- END HEAD -->
<!--  <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white page-sidebar-closed"> -->
           <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->

         @include('admin.layout.includes.header')

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
                               @if ($user->is_admin())
                              <li class="nav-item start active open">
                              <a href="{{route('board')}}" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>
                                      <span class="arrow open"></span>
                                  </a>
                              </li>
                              @else

                      <li class="nav-item start active open">
                              <a href="{{route('index')}}" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>
                                      <span class="arrow open"></span>
                                  </a>
                              </li>

                              @endif

                              @if ($user->is_admin())
                      <li class="nav-item  " id="roleid">
                                  <a href="javascript:;" class="nav-link nav-toggle">
                                      <i class="icon-briefcase"></i>
                                      <span class="title">Role Management</span>
                                  <span class="arrow"></span>
                                      <span class="selected"></span>
                                  </a>
                                  <ul class="sub-menu">
                                      <li class="nav-item ">
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
                              @endif

                                  <li class="nav-item">
                                  <a href="javascript:;" class="nav-link nav-toggle">
                                      <i class="icon-docs"></i>
                                      <span class="title">Document Management</span>
                                      <span class="arrow"></span>
                                  </a>
                                  <ul class="sub-menu">
                                   <li class="nav-item">
                                          <a href="{{route('profession.index')}}" class="nav-link ">
                                              <span class="title"> List Professions</span>
                                          </a>
                                      </li>
                                  
                                      <li class="nav-item ">
                                          <a href="{{route('document.index')}}" class="nav-link ">
                                              <span class="title">All CV's</span>
                                          </a>
                                      </li>
                                          <li class="nav-item ">
                                          <a href="{{route('document.uploadfromcsv')}}" class="nav-link ">
                                              <span class="title">Upload CV From CSV</span>
                                          </a>
                                      </li>
                                       <li class="nav-item">
                                          <a href="{{route('document.search_category')}}" class="nav-link ">
                                              <span class="title">Document Search</span>
                                          </a>
                                      </li>
                                     <li class="nav-item">
                                          <a href="{{route('shortlist.index')}}" class="nav-link ">
                                              <span class="title"> Shortlist</span>
                                          </a>
                                      </li>
<!--                                          <li class="nav-item">
                                          <a href="{{route('search.index')}}" class="nav-link ">
                                              <span class="title"> Advance Search</span>
                                          </a>
                                      </li> -->
                                    
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
                                 
                                   
                              <li class="nav-item  ">
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
                           <!--        <li class="nav-item ">
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
          <div class="page-bar">
      
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="index.html">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Components</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li>
                                            <a href="{{route('show.industry_settings')}}">
                                                <i class="icon-settings"></i> Settings</a>
                                        </li>
                                   <!--      <li>
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
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- END THEME PANEL -->
                        <!-- BEGIN PAGE BAR -->
                  
                            <!-- <img id="loading" src="assets/pages/img/login/ajax-loader.gif"> -->
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <!-- BEGIN DASHBOARD STATS 1-->
                                             
                        <!-- END DASHBOARD STATS 1-->
                     
                          <div class="row">
                                    @if (Session::has('added'))
      <div class="alert alert-success sessionmodal">
        {{session('added')}}
      </div>

      @endif
                    @include('alertify::alertify')
                              <!-- contect here -->
                         @yield('content')

                           
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
                    <a href="{{ route('user.index') }}"  class="active">
                        <span>Applicant</span>
                        <i class="icon-users"></i>
                    </a>
                </li>
                <li>
                    <a href="{{route('document.index')}}">
                        <span>Shortlisted</span>
                        <i class="icon-users"></i>
                    </a>
                </li>
                <li>
                    <a href="{{route('index')}}" >
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
    @include('partials.javascripts2')

  <script src="{{ asset('js/changepassword.js') }}"></script> 
@if (session('success'))

<script type="text/javascript">
    $(document).ready(function() {

        // alertify.success('{{session('success')}}');
    
    });
</script>
 @endif
@if (session('error'))

<script type="text/javascript">
    $(document).ready(function() {

        // alertify.error('{{session('error')}}');
     
    });
</script>
 @endif
<script>
    $(".delete").on("submit", function(){
        return confirm("Do you want to delete this item?");
    });
</script>

<script>
    $(".red").on("submit", function(){
        return confirm("Do you want to mark this CV red?");
    });
</script>
<script>
    $(".blue").on("submit", function(){
        return confirm("Do you want to mark this CV blue?");
    });
</script>
 <script>
    $(".green").on("submit", function(){
        return confirm("Do you want to mark this CV green?");
    });
</script>
 <script>
    $(".yellow").on("submit", function(){
        return confirm("Do you want to mark this CV yellow?");
    });
</script>
 <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

 
</script>


    </body>

</html>