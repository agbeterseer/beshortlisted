            @if(Auth::check())
            @if(Auth::user()->account_type === 'employer')
           <div class="clearfix"></div>
            <div class="careerfy-breadcrumb" style="margin-top: -7px;">
            <!--     <span ><div style="margin-bottom: -190px;"></div><a href="#">CV BANK</a> </span> -->
                <ul>
                <li style="background-color: orange;"><span><a href="{{route('list.all')}}">CV BANK</a> </span></li> 
                   <li><a href="{{route('dashboard')}}">DASHBOARD</a></li>
                    <li><a href="{{route('employer.edit', Auth::user()->id )}}"> PROFILE</a></li> 
                    <li><a href="{{route('manage.jobs')}}">MANAGE JOBS</a></li> 
                    <li><a href="{{route('dashboard')}}">SHORTLIST</a></li> 
                     <li><a href="{{route('employer.edit', Auth::user()->id )}}">SETTINGS</a></li> 
                    <li><a href="{{route('post.jobs')}}"> POST A JOB</a></li> 
                    <li>Units<span class="badge" style="background-color: orange">
                                        @if($units) {{$units->units}} @else 0 @endif 
                                    </span> </li>
                </ul>
            </div>
            @endif
            @endif
            <nav aria-label="breadcrumb">
  <ol class="breadcrumb cyan lighten-4">
    <li class="breadcrumb-item active">Home</li>
  </ol>
</nav>