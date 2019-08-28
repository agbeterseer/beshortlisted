  
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
  
                        @if(Session()->has('success'))
                        <div class="alert alert-success"> 
                        {!! Session::get('success') !!}
                        </div>
                        @endif
    <div class="col-md-12">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Update About Us</div>
                <div class="panel-body">
 <form class="form-horizontal" method="POST" action="{{ route('aboutus.update', $about->id) }}" enctype="multipart/form-data">
                    {{ method_field('PATCH')}}
                        {{ csrf_field() }}
                               <div class="form-group{{ $errors->has('history') ? ' has-error' : '' }}">
                            <label for="history" class="col-md-4 control-label">History <span class="required">*</span></label>

                            <div class="col-md-6">
                                <textarea name="history" class="form-control" placeholder="Enter company history" style="height: 120px;">{{$about->history}}</textarea>
                   
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
                              <textarea name="mission" class="form-control" placeholder="Enter mission" style="height: 120px;">{{$about->mission}}</textarea>

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
                        <textarea name="vision" class="form-control" placeholder="Enter vision" style="height: 120px;">{{$about->vision}}</textarea>

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
                        <textarea name="philosophy" class="form-control" placeholder="Enter philosopy" style="height: 120px;">{{$about->philosophy}}</textarea>

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
                        <textarea name="core_values" class="form-control" placeholder="Enter values" style="height: 120px;">{{$about->values}}</textarea>

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
 
@endsection
