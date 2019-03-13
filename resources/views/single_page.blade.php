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
 <div class="careerfy-main-content">

 <div class="space">&nbsp;</div>
 <div class="space">&nbsp;</div>

          <div class="careerfy-main-section">
                <div class="container"> 
              @if($page) 
                      {!! $page->content !!} 
              @else 
                      Page Not Found!
              @endif
               </div> 
          </div>

    <!--         <div class="careerfy-main-section careerfy-parallex-full">
                <div class="container">
                    <div class="row">
                    
                    </div>
                </div>
            </div> -->
</div>
@endsection