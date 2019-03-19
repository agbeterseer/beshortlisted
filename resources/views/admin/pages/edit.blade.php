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
  'page' => 'active',
     'role' => '',
  'user' => '',
])
@section('content')
    <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Update Page</span>  
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
    <form class="form-horizontal" action="{{route('pages.update',$page->id)}}" method="POST" role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH')}}
                        {{ csrf_field() }}
                        <input type="hidden" name="post_type" value="blog" required="required">
                            <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                            <label for="link" class="col-md-4 control-label"> Link
                            </label>
                        <div class="col-md-6">
                    <input id="link" type="text" class="form-control" name="link" value="{{$page->url}}">
                                @if ($errors->has('link'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label"> Title
                            <span class="required">*</span>
                            </label>
                        <div class="col-md-6">
                    <input id="title" type="text" class="form-control" name="title"  value="{{$page->title}}" required>
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('catgory') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label"> Category
                            <span class="required">*</span>
                            </label>
                        <div class="col-md-6">
                    <input id="category" type="text" class="form-control" name="category" value="{{$page->category}}" required>
                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                   
                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="content" class="col-md-4 control-label">Body
                            <span class="required">*</span>
                            </label> 
                            <div class="col-md-8">
                            <textarea id="summernote_1" name="content">{{$page->content}}</textarea> 
                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                 <!--       <div class="form-group{{ $errors->has('jobs_posting') ? ' has-error' : '' }}">
                            <label for="jobs_posting" class="col-md-4 control-label">Jobs Posting
                            <span class="required">*</span>
                            </label> 
                            <div class="col-md-6">
                                <input id="jobs_posting" type="number" class="form-control" name="jobs_posting" placeholder="jobs posting" required>

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
                                <input id="featured_jobs" type="number" class="form-control" name="featured_jobs" placeholder="featured jobs" required>

                                @if ($errors->has('featured_jobs'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('featured_jobs') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('leave_condition') ? ' has-error' : '' }}">
                            <label for="leave_condition" class="col-md-4 control-label">Renew Jobs   <samp class="required">*</samp></label>
                           
                            <div class="col-md-6">
                                <input id="leave_condition" type="number" class="form-control" name="renew_jobs" placeholder="renew jobs" required="required">

                                @if ($errors->has('leave_condition'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('renew_jobs') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">  Job Duration </label>

                            <div class="col-md-6">
                       <input type="number" name="job_duration" class="form-control">

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->
                       <div class="form-group{{ $errors->has('banner') ? ' has-error' : '' }}">
                            <label for="top_banner" class="col-md-4 control-label">Upload Top Banner
                            <span class="required">*</span>
                            </label> 
                            <div class="col-md-6">
                              <input type="file" name="top_banner" > 
                                @if ($errors->has('top_banner'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('top_banner') }}</strong>
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
        
  

@endsection