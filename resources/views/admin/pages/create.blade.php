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
   <form class="form-horizontal" method="POST" action="{{route('pages.store')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
    <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Create Page</span>  
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
                                <option value="blog">Blog</option>
                                <option value="guidelines">Guidelines</option> 
                                <option value="helpcenter">Help Center</option> 
                                <option value="terms-of-use">Terms Of Use</option>s
                                <option value="plaintext">Plain Text</option>
                                <option value="others">Others</option>
                            </select>
                                 @if ($errors->has('catgory'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('catgory') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="content" class="col-md-4 control-label">Body
                            <span class="required">*</span>
                            </label> 
                            <div class="col-md-8">
                            <textarea id="summernote_1" name="content"></textarea> 
                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
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
             <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Page Settings</span>  
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
                            <label for="link" class="col-md-4 control-label"> Header:
                            </label>
                        <div class="col-md-6">
                            <select name="header">
                                <option value="Show">Show</option>
                                <option value="Hide">Hide</option>
                            </select>      
                                @if ($errors->has('link'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('footer') ? ' has-error' : '' }}">
                            <label for="footer" class="col-md-4 control-label"> Footer:
               
                            </label>
                        <div class="col-md-6">

                        <select name="footer">
                                <option value="Show">Show</option>
                                <option value="Hide">Hide</option>
                            </select>    
                
        
                                @if ($errors->has('footer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('footer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('catgory') ? ' has-error' : '' }}">
                            <label for="catgory" class="col-md-4 control-label"> Banner Top
                            <span class="required">*</span>
                            </label>
                        <div class="col-md-6">
                           <select name="top_banner">
                                <option value="Show">Show</option>
                                <option value="Hide">Hide</option>
                            </select>  
                                @if ($errors->has('catgory'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('catgory') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="content" class="col-md-4 control-label">Banner Buttom
                            <span class="required">*</span>
                            </label> 
                            <div class="col-md-6">
                                   <select name="banner_buttom">
                                <option value="Show">Show</option>
                                <option value="Hide">Hide</option>
                            </select>  
                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       <div class="form-group{{ $errors->has('banner') ? ' has-error' : '' }}">
                            <label for="banner" class="col-md-4 control-label">Upload Top Banner
                            <span class="required">*</span>
                            </label> 
                            <div class="col-md-6">
                              <input type="file" name="banner" > 
                                @if ($errors->has('banner'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('banner') }}</strong>
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
                   
           
                </div>
            </div>
               </form>
@endsection