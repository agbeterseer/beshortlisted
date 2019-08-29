        
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
<div class="space">&nbsp;</div>
   

                  <div class="careerfy-main-section" >
                <div class="container">
                    <div class="row"> 
                           <div class="careerfy-employer-box-section" style="background-color: #ffffff; text-align: justify;">
            {!! $policy->description !!}

                            </div>
                          </div>
                        </div>
                      </div>



@endsection