@extends('layouts.admin_layout', [
  'page_header' => 'Policy',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' => '',
  'policy' => 'active', 
  'package' => '',
  'page' => ' ',
     'role' => '',
  'user' => '',
])

@section('content')
<style type="text/css">
  body{
    font-family: "Open Sans",sans-serif;
</style>
 
  <div class="panel panel-default">
  <div class="panel-body">
  {!! $policy->description !!}

  </div>
  </div>
  
@endsection