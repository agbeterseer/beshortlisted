@extends('layouts.admin_layout', [
  'page_header' => 'Resume Builder',
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
    'page' => '', 
  'role' => '',
  'user' => '',
  'page' => '',
])

@section('content')
    <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> All Plans</span>  
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
              <form class="form-horizontal" action="{{route('plans.update',$package->id)}}" method="POST" role="form">
                        {{ method_field('PATCH')}}
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label"> Title
                            <span class="required">*</span>
                            </label>

                            <div class="col-md-6">
       <input id="title" type="text" class="form-control" name="title" placeholder="Title" required value="{{$package->title}}">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Price
                            <span class="required">*</span>
                            </label> 
                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control" name="price" value="{{$package->price}}" placeholder="price" required>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       <div class="form-group{{ $errors->has('jobs_posting') ? ' has-error' : '' }}">
                            <label for="jobs_posting" class="col-md-4 control-label">Jobs Posting
                            <span class="required">*</span>
                            </label> 
                            <div class="col-md-6">
                                <input id="jobs_posting" type="number" class="form-control" value="{{$package->jobs_posting}}" name="jobs_posting" placeholder="jobs posting" required>

                                @if ($errors->has('jobs_posting'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jobs_posting') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       <div class="form-group{{ $errors->has('featured_jobs') ? ' has-error' : '' }}">
                            <label for="featured_jobs" class="col-md-4 control-label">Featured Jobs
                            <span class="required">*</span>
                            </label> 
                            <div class="col-md-6">
                                <input id="featured_jobs" type="number" class="form-control" value="{{$package->featured_jobs}}" name="featured_jobs" placeholder="featured jobs" required>

                                @if ($errors->has('featured_jobs'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('featured_jobs') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('renew_jobs') ? ' has-error' : '' }}">
                            <label for="renew_jobs" class="col-md-4 control-label">Renew Jobs   <samp class="required">*</samp></label>
                           
                            <div class="col-md-6">
                                <input id="renew_jobs" type="number" class="form-control" value="{{$package->renew_jobs}}" name="renew_jobs" placeholder="Renew Jobs" required="required">

                                @if ($errors->has('renew_jobs'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('renew_jobs') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">  Job Duration </label>

                            <div class="col-md-6">
                       <input type="number" name="job_duration" value="{{$package->job_duration}}" class="form-control">

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
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