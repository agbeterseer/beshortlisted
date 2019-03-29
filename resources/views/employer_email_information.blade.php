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
      
            <div class="careerfy-main-section careerfy-parallex-full" style="margin-top: -10px;">
                <div class="container">
                    <div class="row">

                        <aside class="col-md-12 careerfy-typo-wrap">
                            <div class="careerfy-parallex-text">
                                <h2>Your account has been created successfully.</h2>
                                <p>Please follow the link sent to your inbox to verify your email</p>
                                <!-- <a href="#" class="careerfy-static-btn careerfy-bgcolor"><span>Search Jobs</span></a> -->
                            </div>
                        </aside>
                   

                    </div>
                </div>
            </div>
@endsection