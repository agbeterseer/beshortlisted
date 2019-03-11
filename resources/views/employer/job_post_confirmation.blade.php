@extends('layouts.employer_layout', [
  'page_header' => 'Employer',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'employer' => '',
  'profile' => '',
  'manage_jobs' => '',
  'job_post' => 'active',
  'profile' => '',
  'shortlisted' => '',
  'transaction' => '',
  'package' => '',
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
                        <div class="careerfy-column-9">
                            <div class="careerfy-typo-wrap">
                                <div class="careerfy-employer-dasboard">
                                    <div class="careerfy-employer-box-section" style="background-color: #ffffff;">
                            
                                        <nav class="careerfy-employer-jobnav">
                                        </nav>
                                        <div class="careerfy-employer-confitmation">
                                        <div align="center"> <img src="{{asset('img/employer-confirmation-icon.png')}}" alt="" align="center"></div>
                                            <h2>Thank you for submitting</h2>
                                            <p>Your job will be reviewed by our team and published soon. If you need help please contact us via email hr@rhizomeng.com</p>
                                            <div class="clearfix"></div>
                                            <a href="{{route('dashboard')}}">Dashboard</a>
                                            <a href="{{route('job.details', $tag->id)}}">View Job</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

@endsection