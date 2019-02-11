      
@extends('layouts.admin_layout', [
  'page_header' => 'Resume Builder',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' => 'active',
   'policy' => '',
  'package' => '',
  'page' => '',
  'role' => '',
  'user' => '',
])

@section('content')
<style>
* {
    box-sizing: border-box;
}

.zoom {
    /*padding: 50px;*/
    /*background-color: green;*/
    transition: transform .2s;
/*    width: 200px;
    height: 200px;*/
    margin: 0 auto;
}

.zoom:hover {
    -ms-transform: scale(1.5); /* IE 9 */
    -webkit-transform: scale(1.5); /* Safari 3-8 */
    transform: scale(1.5); 
}
</style>
    <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Create Template</span>
                    </div>
                
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
 
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
                    </div>



             <form class="form-horizontal" action="{{route('resume.store')}}" enctype="multipart/form-data" method="post" role="form">
                        {{ csrf_field() }}
                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                <div class="zoom">     
                <a href="{{route('resume.show', $resume_builder->id)}}">
                        <img alt="template"  src="/uploads/ResumeTemplates/{{ $resume_builder->template_link }}"   />
                        </a></div>
      
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

           <!--  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" placeholder="Enter Template name"   required>

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
                    <input id="" type="text" class="form-control" name="display_name" placeholder="Enter Display name"  required>

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
                    <input id="" type="text" class="form-control"  name="description" required>

                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

     <div class="form-group{{ $errors->has('resume_template') ? ' has-error' : '' }}">
               <label for="description" class="col-md-4 control-label">Category<span class="required">*</span></label>
              <div class="col-md-6">
<select name="category" class="form-control" required="required">
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

            <div class="form-group{{ $errors->has('resume_template') ? ' has-error' : '' }}">
               <label for="description" class="col-md-4 control-label">Template<span class="required">*</span></label>
              <div class="col-md-6">

              <input type="file" name="resume_template" required="required" class="form-control">
				  
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
                        Create Template
                    </button>
                </div>
            </div> -->
                    </form>
                                    
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
  
@endsection
