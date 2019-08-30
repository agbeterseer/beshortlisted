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
   <form class="form-horizontal" method="POST" action="{{route('add.page_infor')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
    <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Add Page Information</span>  
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
         
                        <input type="hidden" name="post_type" value="blog" required="required">
                            <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                            <label for="link" class="col-md-4 control-label"> Link
                            </label>
                        <div class="col-md-6">
                    <input id="link" type="text" class="form-control" name="link" placeholder="specify a name for the link:">
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
                <input id="title" type="text" class="form-control" name="title" placeholder="title" required>
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('catgory') ? ' has-error' : '' }}">
                            <label for="catgory" class="col-md-4 control-label"> Category
                            <span class="required">*</span>
                            </label>
                        <div class="col-md-6">
                            <select class="form-control" name="category" required>
                                <option value="">...Select one...</option> 
                                <option value="employer">Employer</option> 
                               <option value="employee">Employee</option>
                                <option value="index">Index</option>
                            </select>
                                 @if ($errors->has('catgory'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('catgory') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Body
                            <span class="required">*</span>
                            </label> 
                            <div class="col-md-8">
                            <textarea id="summernote_1" name="description"></textarea> 
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       <div class="form-group{{ $errors->has('blog_image') ? ' has-error' : '' }}">
                            <label for="blog_image" class="col-md-4 control-label">Upload Banner
                         
                            </label> 
                            <div class="col-md-6">
                              <input type="file" name="blog_image" > 
                                @if ($errors->has('blog_image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('blog_image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
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
@endsection