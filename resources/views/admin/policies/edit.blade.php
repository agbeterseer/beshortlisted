@extends('layouts.admin_layout', [
  'page_header' => 'Policy',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' => '',
    'policy' => 'active', 
  'package' => '',
  'page' => ' ',
     'role' => '',
  'user' => '',
])

@section('content')
 
                             <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light form-fit bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-puzzle font-red"></i>
                                            <span class="caption-subject font-red bold uppercase">Policy Editor</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group">
                                                <a class="btn green-haze btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a href="{{route('preview.code', $policy->id)}}"> Preview</a>
                                                    </li>
                                                    <li class="divider"> </li>
                                                    <li>
                                                        <a href="javascript:;">Publish</a>
                                                    </li>
                                                  
                                                </ul>
                                            </div>
                                        </div>
                                    </div>


<div class="panel-body"> 
        <span id="resulto"></span>
 <div class="form-horizontal form-bordered">
 <input type="text" name="policy_id" hidden="hidden" value="{{$policy->id}}">
               <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title" class="col-md-2 control-label">Title 
                <span class="required"> *</span>
                </label>
                <div class="col-md-8">
         <input id="title" type="text" class="form-control" name="title" placeholder="Enter Title" value="{{$policy->title}}"   required>
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
  </div>
    </div>
          <div class="form-group"> <br>
          <label class="control-label col-md-2">Policy Editor</label>
                                                    <div class="col-md-10">
                      <textarea name="description" id="summernote_1" class="form-control" >{{$policy->description}}</textarea>
                                                        <div >   </div>
                                                    </div>
                                            
                                            </div>
 
                    <p></p>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <button type="submit" class="btn dark" id="update_policy_markdown">
                                    <i class="fa fa-check"></i> Submit</button>
                                <button type="button" class="btn default">Cancel</button>
                            </div>
                        </div>
                    </div>
                         
</div>
                                
                                </div>



                      


                            </div>
                        </div>



@endsection