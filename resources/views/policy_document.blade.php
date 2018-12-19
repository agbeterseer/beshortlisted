        
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
          <div class="careerfy-main-section">
                <div class="container">
               
                {!! $policy->description !!}
               </div>

               </div>



@endsection