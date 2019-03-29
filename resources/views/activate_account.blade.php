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
<!--  <div class="careerfy-main-content" style="background-color: #ffffff;"> -->
             <!-- Main Section -->
      
            <div class="careerfy-main-section careerfy-parallex-full" style="margin-top: -10px;">
                <div class="container">
                    <div class="row">

                        <aside class="col-md-12 careerfy-typo-wrap">
                            <div class="careerfy-parallex-text">
                                <h2>Congratulations!!! Your accout is now active.</h2>
                             
                                @if($account_type === 'employer')
                                   <p>Proceed to post a job</p>
                                <a href="{{route('post.jobs')}}" class="careerfy-static-btn careerfy-bgcolor"><span>Post a Job</span></a>
                                @else
                                   <p>See available Jobs, or <a href="{{url('/login')}}" style="color: red">login</a> to explore</p>
              <a href="{{route('list.job', 'job-list')}}" class="careerfy-static-btn careerfy-bgcolor"><span>Click here</span></a>
                                @endif
                            </div>
                        </aside>
                   

                    </div>
                </div>
            </div>


 <!-- </div> -->
@endsection