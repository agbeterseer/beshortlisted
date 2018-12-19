     <header id="careerfy-header" class="careerfy-header-one">
            <div class="container">
                <div class="row">
                    <aside class="col-md-2"> <a href="{{asset('/')}}" class="careerfy-logo"><img src="{{asset('logo/logo2.jpg')}}" alt="TREEPHR"></a> </aside>
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
                                 <li class="active"><a href="{{asset('/')}}" style="padding-top: 40px; padding-bottom: 10px;">HOME</a>
 
                                    </li>  
                              
                                    <li><a href="#" style="padding-top: 40px; padding-bottom: 10px;"> JOBS</a> </li>
                                  <li><a href="{{route('employer_infor')}}" style="padding-top: 40px; padding-bottom: 10px;">EMPLOYER</a> 
                      
                                  </li>
                                        
                        <li><a href="{{route('candidates')}}" style="padding-top: 40px; padding-bottom: 10px;">CANDIDATES</a> 
                  
                    </li>
                       <li><a href="" style="padding-top: 40px; padding-bottom: 10px;">CONTACT</a>  
                    </li>                       
 
             </div>
                      </nav>
                    </aside>
                    <aside class="col-md-4">
                        <div class="careerfy-right">
                            <ul class="careerfy-user-section">
                                     @if(!Auth::user())
                               <li><a class="careerfy-color" href="{{ route('register') }}">REGISTER</a>
                               </li>
                       
                               <li><a class="careerfy-color" href="{{ route('auth.login') }}">SIGN IN</a></li>
                                @else
                                         <li>
                                    <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="icon-key"></i> LOGOUT  
                                        </a>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
 
                                    </li>
                                    <li>UNITS<span class="badge" style="background-color: orange">{{$units->jobs_remaining}}</span> </li>
                                @endif
                            </ul> 
                            <a href="{{route('post.jobs')}}" class="careerfy-simple-btn careerfy-bgcolor"><span> <i class="careerfy-icon careerfy-arrows-2"></i> Post Job</span></a>
                         
                        </div>
                    </aside>
                </div>
            </div>
        </header>