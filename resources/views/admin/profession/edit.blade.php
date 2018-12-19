@extends('admin.document.layout.document')
@section('content')
 
    <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Update Profession</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                <span style="color: red;">
                @if(count($errors))
                    <ul>
                        @foreach($errors->all() as $error)
                           <li> {{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                </span>
                    </div>
                </div>
            </div>
        </div>
             <form class="form-horizontal" action="{{route('profession.update',$profession->id)}}" method="POST" role="form">
                        {{ method_field('PATCH')}}
                        {{ csrf_field() }}

            <div class="form-group{{ $errors->has('profession') ? ' has-error' : '' }}">
                <label for="profession" class="col-md-4 control-label">Profession Name</label>
                <div class="col-md-6">
         <input id="" type="text" class="form-control" name="profession" value="{{$profession->name}}" placeholder="Enter name of profession"   required>
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
        <input type="text" name="display_name" class="form-control" value="{{$profession->display_name}}" placeholder="Enter Display Name of profession">
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
            <textarea name="description" class="form-control">{{$profession->description}} </textarea>
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
