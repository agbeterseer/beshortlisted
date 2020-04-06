 
<div class="page-header navbar navbar-fixed-top" style="background-color:#011627;">  
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">                      
                <img src="{{asset('logo/logo-white.png')}}" alt="Logo" width="150px" height="30px" class="logo-default"/> 
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                       <form class="search-form" action="{{route('document.search_category')}}" method="POST">
                                             {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control input-sm" placeholder="Search..." name="query" id="query">
                            <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit" type="submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                        </div>
                    </form>
                        <ul class="nav navbar-nav pull-right">
                  
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
  @if(Auth::user())
    <img alt="" class="img-circle" src="/uploads/avatars/{{ Auth::user()->avatar }}" />
    
                   
              
                     <span class="username username-hide-on-mobile" > {{ Auth::user()->name }} </span>
                                @else
<span class="username username-hide-on-mobile" > Admin </span>
                                @endif
                                   <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                <a href="{{ url('user/profile')}}"><i class="icon-user"></i> My Profile
                    </a> </li>
 
                                    <li>
                                    <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="icon-key"></i> Logout
                                        </a>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
 
                                    </li>

                                </ul>
                            </li>
                              
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-quick-sidebar-toggler">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <i class="icon-logout"></i>
                                </a>
                            </li>
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>