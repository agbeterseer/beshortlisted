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
  body{
    font-family: "Open Sans",sans-serif;
  }
</style>

         <div class="space">&nbsp;</div>
        <div class="space">&nbsp;</div> 
   <div class="careerfy-main-section" >
                <div class="container">
                    <div class="row"> 
                           <div class="careerfy-employer-box-section" style="background-color: #ffffff;">
                                  @if($page) 
                      {!! $page->content !!} 
              @else 
                      Page Not Found!
              @endif

                            </div>
                          </div>
                        </div>
                      </div>
@endsection