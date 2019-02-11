@extends('layouts.jobboard', [
  'page_header' => 'Candidates',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' => '',
   'resume_' => 'active'
])

@section('content')
@include('partials.employee_breadcomb')
<style type="text/css"> 
    .scroll_div{
    overflow:scroll;
    overflow-x:hidden;
    overflow-y:scroll;
    height:200px;
    }
    .mini_header{
border-color: white !important;

    }

</style>
 <div class="careerfy-main-content" style="background-color: #ffffff;">

 <div class="space">&nbsp;</div>

<!--             <div class="careerfy-main-section careerfy-parallex-full">
                <div class="container">
                    <div class="row">
                        <aside class="col-md-6 careerfy-typo-wrap">
                            <div class="careerfy-parallex-text">
                                <h2>Millions of jobs. <br> Find the one that’s right for you.</h2>
                                <p>Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on over 600,000 companies worldwide. The right job is out there.</p>
                                <a href="" class="careerfy-static-btn careerfy-bgcolor"><span>Search Jobs</span></a>
                            </div>
                        </aside>
                        <aside class="col-md-6 careerfy-typo-wrap"> <div class="careerfy-right"><img src="extra-images/parallex-thumb-1.png" alt=""></div> </aside>
                    </div>
                </div>
            </div> -->
          <div class="careerfy-main-section">
                <div class="container">
              @if($page) 
                      {!! $page->content !!} 
              @else 
                      Page Not Found!
              @endif
               </div> 
          </div>

<!--             <div class="careerfy-main-section careerfy-parallex-full">
                <div class="container">
                    <div class="row">
                        <aside class="col-md-6 careerfy-typo-wrap">
                            <div class="careerfy-parallex-text">
                                <h2>Millions of jobs. <br> Find the one that’s right for you.</h2>
                                <p>Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on over 600,000 companies worldwide. The right job is out there.</p>
                                <a href="{{route('job.listing')}}" class="careerfy-static-btn careerfy-bgcolor"><span>Search Jobs</span></a>
                            </div>
                        </aside>
                        <aside class="col-md-6 careerfy-typo-wrap"> <div class="careerfy-right"><img src="extra-images/parallex-thumb-1.png" alt=""></div> </aside>
                    </div>
                </div>
            </div> -->
</div>
@endsection