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
    'page' => '', 
  'role' => '',
  'user' => '',
  'page' => '',
])

@section('content')
    <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
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

                        @if(Session()->has('error'))
                        <div class="alert alert-danger"> 
                        {!! Session::get('error') !!}
                        </div>
                        @endif
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Properties</span>  
                    </div>
                
                </div>

           <form class="mt-repeater form-horizontal" method="POST" action="{{route('add.property')}}">
                        {{ csrf_field() }}
     <input type="hidden" name="package_id" value="{{$package->id}}"> 
                          
<!-- 
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Price
                            <span class="required">*</span>
                            </label> 
                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control" name="price" placeholder="price" required>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
            -->
<div class="col-md-6">
 
                <div class="portlet-body form"> 
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="mt-repeater form-horizontal">
                                          <p>Enter properties for this Job such as:<br> 3 job posting, Featured On Demand, Job displayed for 20 days </p>
                                            <div data-repeater-list="group_b">
                                                <div data-repeater-item class="mt-repeater-item">
                                                
                                        <div class="mt-repeater-input" >
                                            <label class="control-label"> Property</label>
                                            <br/>

                          <textarea name="job_property" class="form-control" required="required" placeholder="3 job posting, Featured On Demand "> </textarea>
                                     </div>

                          
                          
                                                    <div class="mt-repeater-input">
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete">
                                                            <i class="fa fa-close"></i> Delete</a>
                                                    </div>
                                                </div>
                                         
                                            </div>
                                            <a href="javascript:;" data-repeater-create class="btn btn-success mt-repeater-add">
                                                <i class="fa fa-plus"></i> Add</a>
                                        </div>
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
                   


                </div>
            </div>
        </div>
  

@endsection