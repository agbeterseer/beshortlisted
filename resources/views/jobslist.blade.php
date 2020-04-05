@extends('layouts.jobs', [
  'page_header' => 'Employer',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'employer' => 'active'
])

@section('content')

                  <section class="jobslist">
                        @include('jobs.load')
                  </section>

@endsection
