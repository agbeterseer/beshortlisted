@extends('layouts.admin_layout', [
  'page_header' => 'Resume Builder',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' => 'active'
])

@section('content')
 
	<div class="panel panel-default">
	<div class="panel-body">
	{!! $policy->description !!}

	</div>
	</div>
  
@endsection