  
@extends('layouts.admin_layout', [
  'page_header' => 'Pages',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => 'active',
  'candidate' => '',
  'policy' => '',
  'package' => '',
  'page' => '',
  'role' => '',
  'user' => ''
]) 

@section('content')
<div class="container">
    
                        @if(Session()->has('success'))
                        <div class="alert alert-success"> 
                        {!! Session::get('success') !!}
                        </div>
                        @endif
    <div class="">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Show Banner</div>
                <div class="panel-body">
 <form class="form-horizontal" method="POST" action="{{ route('banner.update', $banner->id) }}" enctype="multipart/form-data">
 
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="catpion" class="col-md-4 control-label">Title</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$banner->name}}" required autofocus value="{{$banner->name}}"> 
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('catpion') ? ' has-error' : '' }}">
                            <label for="catpion" class="col-md-4 control-label">Caption</label>

                            <div class="col-md-6">
                                <input id="catpion" type="text" class="form-control" name="catpion" value="{{$banner->caption_one}}" autofocus >

                                @if ($errors->has('catpion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('catpion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('caption2') ? ' has-error' : '' }}">
                            <label for="caption2" class="col-md-4 control-label">Caption 2</label>

                            <div class="col-md-6">
                            <input id="caption2" type="text" class="form-control" name="caption2" value="{{$banner->caption_two}}" required autofocus>

                                @if ($errors->has('caption2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('caption2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 
                        <div class="form-group{{ $errors->has('banner') ? ' has-error' : '' }}">
                            <label for="banner" class="col-md-4 control-label">Banner</label>
                            <div class="col-md-6">
                            <img src="{{asset('uploads/banners')}}/{{$banner->banner}}" alt="them" height="150px" width="200px;">
                        </div>
                        </div>
                 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
