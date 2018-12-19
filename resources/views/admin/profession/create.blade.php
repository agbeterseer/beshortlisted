@extends('admin.document.layout.document')
@section('content')
 
    <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Add Profession</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
 
                    </div>
                </div>
            </div>
        </div>
             <form class="form-horizontal" action="{{route('profession.store')}}"  method="post" role="form">
                        {{ csrf_field() }}
            <div class="form-group{{ $errors->has('profession') ? ' has-error' : '' }}">
                <label for="profession" class="col-md-4 control-label">Profession Name
                <span class="required"> *</span>
                </label>
                <div class="col-md-6">
         <input id="" type="text" class="form-control" name="profession" placeholder="Enter name of profession"   required>
                    @if ($errors->has('profession'))
                        <span class="help-block">
                            <strong>{{ $errors->first('profession') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                <label for="display_name" class="col-md-4 control-label">Display Name</label>
                <div class="col-md-6 "> 
        <input type="text" name="display_name" class="form-control"  placeholder="Enter Display Name">
                    @if ($errors->has('display_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('display_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
 
           <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="description" class="col-md-4 control-label">Description</label>
                <div class="col-md-6 "> 
            <textarea name="description" class="form-control"></textarea>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
 
                <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Add Profession
                    </button>
                </div>
               </div>  
                   
                    </form>
                                       
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
  
@endsection
