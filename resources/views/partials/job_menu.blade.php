<!--      <nav class="navbar navbar-fixed-top" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io"> 
      <img src="{{asset('logo/logo2.jpg')}}" alt="TREEPHR" width="112" height="">
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
        @foreach($menus as $menu)
     <a class="navbar-item" href="{{$menu->routes}}"> {{strtoupper($menu->name)}}</a> 
        @endforeach 
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
           @if(!Auth::user()) 
          <a href="{{ route('register') }}" class="button is-primary">
            <strong>REGISTER</strong>
          </a>
          <a class="button is-light">
            SIGN IN
          </a>
          @else
             <a class="button is-light">
            LOGOUT
          </a>
           @endif
           @if(Auth::user())
 <a href="{{ route('post.jobs') }}" class="button is-primary">
            <strong>Post Job</strong>
          </a>
          @endif
          @if(!Auth::user())
 <a href="{{ route('post.jobs') }}" class="button is-primary">
            <strong>Post Job</strong>
          </a>
          @endif
        </div>
      </div>
    </div>
  </div>
</nav>
 -->
<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar w/ text</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
    </ul>
    <span class="navbar-text">
      Navbar text with an inline element
    </span>
  </div>
</nav> -->
 

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
                                        </form> </li>
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
