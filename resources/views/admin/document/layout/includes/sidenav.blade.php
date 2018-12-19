@inject('request', 'Illuminate\Http\Request')
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-closed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
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
                                <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                                    <a href="javascript:;" class="remove">
                                        <i class="icon-close"></i>
                                    </a>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <span class="input-group-btn">
                                            <a href="javascript:;" class="btn submit">
                                                <i class="icon-magnifier"></i>
                                            </a>
                                        </span>
                                    </div>
                                </form>
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
                              <a href="{{route('home')}}" class="nav-link nav-toggle">
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

                               <li class="nav-item active open">
                                  <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-docs"></i>
                                    <span class="title">Document Management</span>
                                    <span class="selected"></span>
                                    <span class="arrow open"></span>
                                  </a>
                                  <ul class="sub-menu">
                                   <li class="nav-item">
                                          <a href="{{route('profession.index')}}" class="nav-link ">
                                              <span class="title"> List Professions</span>
                                          </a>
                                      </li>
                                  
                                      <li class="nav-item ">
                                          <a href="{{route('document.index')}}" class="nav-link ">
                                              <span class="title">Custom Search</span>
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
                                              <span class="title">Add New</span>
                                          </a>
                                      </li> 
                                  </ul>
                                       <!--  <a href="{{ url('/register') }}">Register</a>  -->
                      
                              </li>



      <li class="nav-item">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-settings"></i>
            <span class="title">Online Test</span>
            <span class="arrow"></span>
        </a>
      <ul class="sub-menu">
                                  
      <li class="{{ $request->segment(1) == 'tests' ? 'active' : '' }}">
                <a href="{{ route('tests.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('cvmanagement.test.new')</span>
                </a>
            </li>

            <li class="{{ $request->segment(1) == 'results' ? 'active' : '' }}">
                <a href="{{ route('results.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('cvmanagement.results.title')</span>
                </a>
            </li>

            
            <li class="{{ $request->segment(1) == 'topics' ? 'active' : '' }}">
                <a href="{{ route('topics.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('cvmanagement.topics.title')</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'questions' ? 'active' : '' }}">
                <a href="{{ route('questions.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('cvmanagement.questions.title')</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'questions_options' ? 'active' : '' }}">
                <a href="{{ route('questions_options.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('cvmanagement.questions-options.title')</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('cvmanagement.user-management.title')</span>
                    <span class="fa arrow"></span>
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
                                        <span class="title">Backup exel </span>
                                          </a>
                                      </li>                                                  
                                      <li class="nav-item ">
                                          <a href="{{route('backupsys.backups')}}" class="nav-link ">
                                        <span class="title">Platform Backup </span>
                                          </a>
                                      </li>
                                         <li class="nav-item ">
                                          <a href="{{route('log.activity')}}" class="nav-link ">
                                        <span class="title">Log </span>
                                          </a>
                                      </li>
                                      </ul>
                                  </li> 
                    
                        </ul>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->
                    </div>

                    














                             
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
                              <li class="nav-item start ">
                              <a href="{{route('board')}}" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>
                                      <span class="arrow open"></span>
                                  </a>
                              </li>
                              @else

                      <li class="nav-item ">
                              <a href="{{route('home')}}" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>
                                      <span class="arrow open"></span>
                                  </a>
                              </li>

                              @endif

                              @if(Auth::user()->hasRole(['super-user', 'Managing Partner', 'admin']))
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
                               <!--     <li class="nav-item ">
                                          <a href="{{route('user.index')}}" class="nav-link ">
                                              <span class="title">Assign Roles</span>
                                          </a>
                                      </li> -->
                                  </ul>
                                       <!--  <a href="{{ url('/register') }}">Register</a>  -->
                      
                              </li>
                              @endif
              @role(['super-user', 'Managing Partner', 'general-user', 'Document Master', 'admin'])
                                  <li class="nav-item  start active open">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                      <i class="icon-docs"></i>
                                      <span class="title">Document Management</span>
                                      <span class="arrow down"></span>
                                  </a>
                                  <ul class="sub-menu">
                                      <li class="nav-item">
                                          <a href="{{route('profession.index')}}" class="nav-link ">
                                              <span class="title"> Professions</span>
                                          </a>
                                      </li>
                                  
                                      <li class="nav-item">
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
                                              <span class="title">CV Search</span>
                                          </a>
                                      </li>
                     
                                            <li class="nav-item">
                                          <a href="{{route('shortlist.index')}}" class="nav-link ">
                                              <span class="title"> Shortlist</span>
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
                      
                              </li>     <li class="nav-item">
                                  <a href="javascript:;" class="nav-link nav-toggle">
                                      <i class="icon-docs"></i>
                                      <span class="title">Clients</span>
                                      <span class="arrow"></span>
                                  </a>
                                   <ul class="sub-menu">
                                    <li class="nav-item ">
                                      <a href="{{route('client.index')}}" class="nav-link "> 
                                     <span class="title">All Clients</span>
                                      </a>
                                
                                      </li>
                                  <li class="nav-item ">
                                          <a href="{{route('client.create')}}" class="nav-link ">
                                              <span class="title">Add New</span>
                                          </a>
                                      </li> 
                    
                                  </ul>
                                       <!--  <a href="{{ url('/register') }}">Register</a>  -->
                      
                              </li>
             
                @endrole
              @role(['super-user', 'Managing Partner', 'admin'])
                              <li class="nav-item ">
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
                                          <a href="{{route('log.activity')}}" class="nav-link ">
                                        <span class="title">Log </span>
                                          </a>
                                      </li>

                                  </li>
                  @endrole
                
                          
                         <!-- END SIDEBAR MENU -->
                          <!-- END SIDEBAR MENU -->
                     </div>
                      <!-- END SIDEBAR -->
                