<style type="text/css">
  /* Dropdown Button */
.dropbtn {

}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
  
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}
</style>
<script type="text/javascript">
  function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
<!-- <script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/unique-methods/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">window.dojoRequire(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us20.list-manage.com","uuid":"cec7f4a0933c7c0b27cadce4a","lid":"1b1e028f7f","uniqueMethods":true}) })</script> -->
 <header id="careerfy-header" class="careerfy-header-one">
            <div class="container">
                <div class="row">
                    <aside class="col-md-2">
  <a href="{{asset('/')}}" class="careerfy-logo"  ><img src="{{asset('logo/logo3.png')}}" alt="TREEPHR" width="200" height="00">  </a> 
                
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
                       <li  id="menu{{$menu->id}}"> <a href="{{asset($menu->routes)}}"> {{$menu->name}}</a> </li>
                          @endforeach 
                    
                   
                                </ul>
                            </div>
                      </nav>
                    </aside>
         
                    <aside class="col-md-4 ">
                        <div class="careerfy-right">
                           
                            <ul class="careerfy-user-section hide_inner">
                                @if(!Auth::user()) 
                                <li><a class="careerfy-color" href="{{route('sign.up')}}">Register</a></li>
                                <li><a class="careerfy-color" href="{{route('auth.login')}}">Sign in</a></li>
                                @else
                       <!-- <li>   -->
                              <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
<!--  <figure>
    <img  class="img-circle" src="/uploads/avatars/{{ Auth::user()->avatar }}" width="40" height="50" />
    </figure -->
                    @if(Auth::user())
              
                     <span class="username username-hide-on-mobile" >
                     Hi {{ str_limit(Auth::user()->name, $limit = 7, $end = '...') }} </span>
                                @else
<span class="username username-hide-on-mobile" > Admin </span>
                                @endif
                                   <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                <a href="{{url('/index/resume')}}"> <i class="fas fa-user-alt"></i> My Profile
                    </a> </li>
 
                                    <li>
                                    <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
 
                                    </li>

                                </ul>
                            </li>

<!-- <div class="dropdown">  
    <button onclick="myFunction()" class="dropbtn" style="background-color: #ffffff;"><i class="careerfy-icon careerfy-user"></i> &nbsp; Hi, {{ str_limit(Auth::user()->name, $limit = 7, $end = '...') }}</button>
  <div id="myDropdown" class="dropdown-content"> 
  <ul>
    <li><a href="{{url('/index/resume')}}">Profile </a> </li>
    <li>                                      <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout 
                                        </a> </li>
  </ul>


                                        </div> 

                                        </div>  -->
                                     <!-- </li> -->
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
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> {{ csrf_field() }}
                                        </form> 

 