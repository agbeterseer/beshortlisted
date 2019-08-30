  
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
<div >
    
                        @if(Session()->has('success'))
                        <div class="alert alert-success"> 
                        {!! Session::get('success') !!}
                        </div>
                        @endif
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Create About Us</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('aboutus.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                               <div class="form-group{{ $errors->has('history') ? ' has-error' : '' }}">
                            <label for="history" class="col-md-4 control-label">History <span class="required">*</span></label>

                            <div class="col-md-6">
                        
                    <textarea id="summernote_1" name="history" placeholder="Enter company history"> </textarea> 
                                @if ($errors->has('history'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('history') }}</strong>
                                    </span>
                                @endif
                            </div>


                         </div>
                        <div class="form-group{{ $errors->has('mission') ? ' has-error' : '' }}">
                            <label for="mission" class="col-md-4 control-label">Mission</label>

                            <div class="col-md-6">
                              <textarea name="mission" class="form-control" placeholder="Enter mission"></textarea>

                                @if ($errors->has('mission'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mission') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('vision') ? ' has-error' : '' }}">
                            <label for="vision" class="col-md-4 control-label">Vision</label>

                            <div class="col-md-6">
                        <textarea name="vision" class="form-control" placeholder="Enter vision"></textarea>

                                @if ($errors->has('vision'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vision') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('philosophy') ? ' has-error' : '' }}">
                            <label for="philosophy" class="col-md-4 control-label">Philosophy</label>

                            <div class="col-md-6">
                        <textarea name="philosophy" class="form-control" placeholder="Enter philosophy"></textarea>

                                @if ($errors->has('philosophy'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('philosophy') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                        <div class="form-group{{ $errors->has('core_values') ? ' has-error' : '' }}">
                            <label for="core_values" class="col-md-4 control-label">Core Values/ Our Principle</label>

                            <div class="col-md-6">
                        <textarea name="core_values" class="form-control" placeholder="Enter values"></textarea>

                                @if ($errors->has('core_values'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('core_values') }}</strong>
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
    </div>
</div>
@endsection
