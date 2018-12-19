@extends('layouts.admin_layout', [
  'page_header' => 'Packages',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' => '',
  'policy' => '',
  'package' => 'active',
])

@section('content')
    <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> All Fields</span>  
                    </div>
                </div>
                       @if(session()->has('message.level'))
                        <div class="alert alert-{{ session('message.level') }}"> 
                        {!! session('message.content') !!}
                        </div>
                        @endif

                        @if(Session()->has('success'))
                        <div class="alert alert-success"> 
                        {!! Session::get('success') !!}
                        </div>
                        @endif
                    <form class="form-horizontal" method="POST" action="{{route('add.field')}}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label"> Title
                            <span class="required">*</span>
                            </label>
                            <div class="col-md-6">
       <input id="title" type="text" class="form-control" name="title" placeholder="title" required>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('displayname') ? ' has-error' : '' }}">
                            <label for="displayname" class="col-md-4 control-label">Displayname
                            <span class="required">*</span>
                            </label> 
                            <div class="col-md-6">
                    <input id="displayname" type="text" class="form-control" name="displayname" placeholder="displayname" required>
                                @if ($errors->has('displayname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('displayname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>


                    </form>
                  



                </div>
            </div>
        </div>
  

@endsection