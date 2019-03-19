              @if(Auth::check())
              @if(Auth::user()->account_type === 'employee')
             <div class="clearfix"></div>
            <div class="careerfy-breadcrumb" style="margin-top: 0px;">
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
             <div class="space">&nbsp;</div>
<div class="container">
  <nav aria-label="breadcrumb" style="background-color: #E3E3E3; color: #000000;">
    <ol class="breadcrumb" style="background-color: #E3E3E3; color: #000000;">
      <li class="breadcrumb-item active">
        <h5 class="mr-3 mb-0"><strong> <a href="javascript: history.go(-1)"  style="color: #000000; margin-top: 9px;"> || Previous</a> </strong></h5>
      </li> 
    </ol>
  </nav>
</div>
