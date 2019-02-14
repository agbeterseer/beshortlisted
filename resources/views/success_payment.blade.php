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
    p{
        font-family:  'Open Sans', sans-serif;
    }
</style>
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
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div>
      <div class="careerfy-main-section careerfy-dashboard-fulltwo">
                <div class="container " id="page" style="" >
            <div class="careerfy-employer-dasboard">
<div class="careerfy-employer-box-section" style="background-color: #FFFFFF;"> 

                        <div class="careerfy-column-12">
                            <div class="careerfy-typo-wrap">
                                <div class="careerfy-employer-dasboard">
                                    <div class="careerfy-employer-box-section">
                                        <!-- Profile Title --> 
                                        <!-- New Job -->
                                        <nav class="careerfy-employer-jobnav"> 
                                        </nav>
                                        <!-- Confitmation -->
                                        <div class="careerfy-employer-confitmation">
                                        <div align="center"> <img src="{{asset('img/employer-confirmation-icon.png')}}" alt="" align="center"></div> 
                                            <h2>Your Payment has been successful</h2> 
                                            <div class="clearfix"></div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                                                            </div>
                                </div>
                            </div>
                        </div>
@endsection