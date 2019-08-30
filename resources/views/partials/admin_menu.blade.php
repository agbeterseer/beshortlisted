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
                            <!--       <form class="sidebar-search" action="" method="POST">
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
                     
                              <li class="nav-item start">
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
               
                                <li class="nav-item {{ $page }}">
                                  <a href="javascript:;" class="nav-link nav-toggle">
                                      <i class="icon-puzzle"></i>
                                      <span class="title">Pages</span>
                                        <span class="arrow open"></span>
                                  </a>
                                   <ul class="sub-menu">
                                   <li class="nav-item ">
                                      <a href="{{ route('pages.index') }}" class="nav-link "> 
                                     <span class="title">All Pages</span>
                                      </a>
                                
                                      </li>
                                  <li class="nav-item ">
                                          <a href="{{ route('pages.create') }}" class="nav-link ">
                                              <span class="title">Add Blog Post</span>
                                          </a>
                                      </li>  
                                <li class="nav-item {{ $request->segment(1) == 'policies' ? 'active' : '' }}">
                                          <a href="{{route('policies.index')}}" class="nav-link ">
                                        <span class="title">@lang('cvmanagement.policies.title') </span>
                                          </a>
                                      </li> 
                             <li class="nav-item {{ $request->segment(1) == 'pageinfor' ? 'active' : '' }}">
                                     <a href="{{route('allpages')}}" class="nav-link ">
                                        <span class="title">Core Pages </span>
                                          </a>
                                </li>
                            <!-- 
                                  <li class="nav-item">
                                     <a href="{{route('policies.index')}}" class="nav-link ">
                                        <span class="title">Employer </span>
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
          
                                    </ul> 
                                  </li>  
                              <li class="nav-item {{ $sett }}">
                                  <a href="javascript:;" class="nav-link nav-toggle">
                                      <i class="icon-settings"></i>
                                      <span class="title">Extra</span>
                                      <span class="arrow"></span>
                                  </a>
                                  <ul class="sub-menu">
                                  
                                      <!-- <li class="nav-item ">
                                          <a href="{{route('backupsys.importExport')}}" class="nav-link ">
                                        <span class="title">Export CSV </span>
                                          </a>
                                      </li> -->

                                  <li class="nav-item ">
                                          <a href="{{route('backupsys.backups')}}" class="nav-link ">
                                        <span class="title">Back up cv </span>
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
                               <!-- 
                               <li class="nav-item ">
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
                                   </ul> 
                                  </li> -->
                                
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
                         <!-- END SIDEBAR MENU -->
                          <!-- END SIDEBAR MENU -->
                     </div>
                      <!-- END SIDEBAR -->
                  </div>