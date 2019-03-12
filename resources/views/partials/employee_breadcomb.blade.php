              @if(Auth::user()->account_type === 'employee')
             <div class="clearfix"></div>
            <div class="careerfy-breadcrumb">
                <ul>
                <li><a href="{{route('show.resume')}}">ONLINE RESUME</a></li>                
                <li><a href="{{route('display.templates')}}">RESUME TEMPLATES</a></li>  
                <li><a href="{{route('display.pix')}}">ACCOUNT SETTINGS</a></li> 
                <li><a href="{{route('application.history')}}">APPLICATION HISTORY</a></li>    
                <li><a href="{{route('featured.jobs')}}">FEATURED JOBS</a></li>  
                </ul>
            </div>
             @endif