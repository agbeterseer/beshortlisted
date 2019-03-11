<header id="careerfy-header" class="careerfy-header-one">
            <div class="container">
                <div class="row">
                    <aside class="col-md-2">
  <a href="{{asset('/')}}" class="careerfy-logo" style="margin-top: 10px;" ><img src="{{asset('logo/logo2.jpg')}}" alt="TREEPHR" width="200" height="00">  </a> 
                
                   <!--   <a href="#" class="careerfy-logo" style="margin-top: 10px;"><img src="{{asset('logo/logo2.jpg')}}"" alt=""></a> --></aside> 
                    <aside class="col-md-6">
                        <nav class="careerfy-navigation">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#careerfy-navbar-collapse-1" aria-expanded="false">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="careerfy-navbar-collapse-1">
                                <ul class="navbar-nav">
                          @foreach($menus as $menu) 
                       <li> <a href="{{$menu->routes}}"> {{$menu->name}}</a> </li>
                          @endforeach 
                                </ul>
                            </div>
                      </nav>
                    </aside>
                    <aside class="col-md-4 showHide">
                        <div class="careerfy-right">
                            <ul class="careerfy-user-section">
                                @if(!Auth::user()) 
                                <li><a class="careerfy-color" href="{{route('register')}}">Register</a></li>
                                <li><a class="careerfy-color" href="{{route('auth.login')}}">Sign in</a></li>
                                @else
                                 <li> <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="icon-key"></i> Logout 
                                        </a>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> {{ csrf_field() }}
                                        </form>  
                                     </li>
                                @endif

                            </ul>
                              @if(Auth::user())
                                 
                            <a href="{{route('post.jobs')}}" class="careerfy-simple-btn careerfy-bgcolor post_job"><span> <i class="careerfy-icon careerfy-arrows-2"></i> Post Job</span></a>
                             @endif
                             @if(!Auth::user())
                          <a href="{{route('post.jobs')}}" class="careerfy-simple-btn careerfy-bgcolor post_job "><span> <i class="careerfy-icon careerfy-arrows-2"></i> Post Job</span></a>
                            @endif
                        </div>
                    </aside>
                </div>
            </div>
        </header>

