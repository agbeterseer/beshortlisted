            @if(Auth::check())
            @if(Auth::user()->account_type === 'employer')
           <div class="clearfix"></div>
            <div class="careerfy-breadcrumb" style="margin-top: 0px;">
            <!--     <span ><div style="margin-bottom: -190px;"></div><a href="#">CV BANK</a> </span> -->
                <ul>
                <!-- <li style="background-color: orange;"><span><a href="{{route('list.all')}}">CV BANK</a> </span></li>  -->
                   <li><a href="{{route('dashboard')}}">DASHBOARD</a></li>
                    <li><a href="{{route('employer.edit', Auth::user()->id )}}"> PROFILE</a></li> 
                    <li><a href="{{route('manage.jobs')}}">MANAGE JOBS</a></li> 
                    <li><a href="{{route('dashboard')}}">SHORTLIST</a></li> 
                     <li><a href="{{route('employer.edit', Auth::user()->id )}}">SETTINGS</a></li> 
                    <li><a href="{{route('post.jobs')}}"> POST A JOB</a></li> 
                    <li><a href="{{url('/pricing')}}">Units &nbsp;<span class="badge" style="background-color: orange">
                                        @if($units) {{$units->units}} @else 0 @endif 
                                    </span></a> </li>
                </ul>
            </div>
            @endif
            @endif 
<!--       <div class="careerfy-breadcrumb" style="background-color: #E3E3E3 !important; color: #000000 !important;  margin-top: -2px;">
                <ul>
                    <li><a href="javascript: history.go(-1)" style="color: #000000;">Previous</a></li>
                </ul>
            </div>
 -->