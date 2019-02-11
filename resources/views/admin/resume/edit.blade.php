      


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
  'resume' => 'active',
    'policy' => '',
  'package' => '',
  'page' => '',
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
                        <span class="caption-subject bold uppercase"> Edit Template</span>
                    </div>
                
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
 <a href=""  data-toggle="tooltip" data-placement="top" title="Do you need help with working on this page?"><i class="fa fa-question-circle"></i> Need Help?</a>
                                </div>
                            </div>
                       
                        </div>
     @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                        @if(Session()->has('success'))
                <div class="alert alert-success"> 
                {!! Session::get('success') !!}
                </div>
                        @endif
                    </div>
             <form class="form-horizontal" action="{{route('resume.update', $resume_builder->id)}}" enctype="multipart/form-data" method="post" role="form">
                            {{ method_field('PATCH')}}
                        {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" maxlength="25" value="{{$resume_builder->name}}"  required>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                <label for="display_name" class="col-md-4 control-label">Displayname <span class="required">*</span></label>
                <div class="col-md-6">
                    <input  type="text" class="form-control" name="display_name" value="{{$resume_builder->display_name}}" maxlength="25" id="maxlength_defaultconfig"  required>
                        <span class="help-block"> Maxlength is 25 chars. The badge will show up by default when the remaining chars are 10 or less. </span>
                    @if ($errors->has('display_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('display_name') }}</strong>
                        </span>
                    @endif
                </div>

            </div>


            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="description" class="col-md-4 control-label">Descritption</label>

                <div class="col-md-6">
                <textarea id="maxlength_textarea" name="description"  class="form-control" maxlength="55" rows="2" required>{{$resume_builder->description}}</textarea>
                 <!--    <input id="description" type="text" class="form-control" maxlength="55" value="{{$resume_builder->description}}" name="description" required> -->
<pre><span style="color: red">Note Eg. This template is for freshers and starters with limited features </span> </pre>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>

            </div>
<!-- <div class="form-group">
<label class="control-label col-md-3">Textarea</label>
<div class="col-md-6">
<textarea id="maxlength_textarea" name="me" class="form-control" maxlength="55" rows="2" placeholder="This textarea has a limit of 225 chars."></textarea>
@if ($errors->has('maxlength_textarea'))
<span class="help-block">
<strong>{{ $errors->first('maxlength_textarea') }}</strong>
</span>
@endif
</div>
</div> -->

     <div class="form-group{{ $errors->has('resume_template') ? ' has-error' : '' }}">
               <label for="description" class="col-md-4 control-label">Category<span class="required">*</span></label>
              <div class="col-md-6">

<select name="category" class="form-control" required="required" id="category">
<option value="{{$resume_builder->category}}">{{$resume_builder->category}}</option>
<option value="">...Select one...</option>
    <option value="fresher">Fresher</option>
     <option value="creative">Creative</option>
      <option value="experienced">Experienced</option>

</select>
                    @if ($errors->has('resume_template'))
                        <span class="help-block">
                            <strong>{{ $errors->first('resume_template') }}</strong>
                        </span>
                    @endif
                </div>
                </div>
                 <div class="form-group{{ $errors->has('url_link') ? ' has-error' : '' }}">
                <label for="url_link" class="col-md-4 control-label">URL <span class="required">*</span></label>
                <div class="col-md-6">
                    <input  type="text" class="form-control" name="url_link"   required>
    
                    @if ($errors->has('url_link'))
                        <span class="help-block">
                            <strong>{{ $errors->first('url_link') }}</strong>
                        </span>
                    @endif
                </div>

            </div>

            <div class="form-group{{ $errors->has('resume_template') ? ' has-error' : '' }}">
               <label for="description" class="col-md-4 control-label">Template </label>
              <div class="col-md-6">
              <input type="file" name="resume_template" class="form-control">
				  
                    @if ($errors->has('resume_template'))
                        <span class="help-block">
                            <strong>{{ $errors->first('resume_template') }}</strong>
                        </span>
                    @endif
				</div>
                </div>
                <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Edit Template
                    </button>
                </div>
            </div>
                    </form>
                                    
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
  
@endsection
