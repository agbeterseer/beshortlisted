                  @if(Auth::check())
              @if(Auth::user()->account_type === 'employee')
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
             @endif 


<!--       <div class="careerfy-breadcrumb" style="background-color: #E3E3E3 !important; color: #000000 !important;  margin-top: -2px;">
                <ul>
                    <li><a href="javascript: history.go(-1)" style="color: #000000;">Previous</a></li>
                </ul>
            </div> -->
