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
  'page' => '',
  'role' => '',
  'user' => '',
  'logo' => 'active'
]) 

@section('content')
  
                        @if(Session()->has('success'))
                        <div class="alert alert-success"> 
                        {!! Session::get('success') !!}
                        </div>
                        @endif
     <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Upload Logo</div>
                <div class="panel-body">
                 <form class="form-horizontal" method="PUT" action="{{ route('logos.update', $logo->id) }}" enctype="multipart/form-data">
                        {{ method_field('PATCH')}}
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$logo->id}}">
                        <!--    
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
                         </div> --> 

                        <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                            <label for="logo" class="col-md-4 control-label">Upload Logo</label> 
                            <div class="col-md-6">
                        <input type="file" name="logo">
                                @if ($errors->has('logo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('logo') }}</strong>
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
