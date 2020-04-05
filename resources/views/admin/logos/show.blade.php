  
@extends('layouts.admin_layout', [
  'page_header' => 'Pages',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' => '',
  'policy' => '',
  'package' => '',
  'page' => '',
  'role' => '',
  'user' => '',
  'logo' => 'active'
]) 

@section('content') 
    
                        @if(Session()->has('success'))
                        <div class="alert alert-success"> 
                        {!! Session::get('success') !!}
                        </div>
                        @endif
 <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Upload Logo</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="PUT" action="#" enctype="multipart/form-data">
                        {{ csrf_field() }} 
                      
                         <img src="{{ asset('/logo') }}/{{$logo->logo}}"> 

                    </form>
                </div>
            </div>
        </div> 
@endsection
