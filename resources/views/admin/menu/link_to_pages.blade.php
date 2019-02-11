@extends('layouts.admin_layout', [
  'page_header' => 'Menu',
  'dash' => '',
  'staffmgt' => '',
  'users' => '',
  'menu' => 'active',
  'department' => '',
  'probation' => '',
  'sett' => '',
  'candidate' =>'',
  'taxcalculator' => '',
  'finance' => '',
  'email' => '',
])
@section('content')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Menu</div>
                <div class="panel-body">
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
                    <form class="form-horizontal" method="POST" action="">
                        {{ csrf_field() }}

                     <div class="form-group{{ $errors->has('menu_order') ? ' has-error' : '' }}">
                            <label for="menu_order" class="col-md-4 control-label"> Menu
                                   <span class="required">*</span>
                            </label>
                            <div class="col-md-6">
                                    {{$menu->display_name}}

                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('page') ? ' has-error' : '' }}">
                            <label for="page" class="col-md-4 control-label">Select Page
                            <span class="required">*</span>
                            </label>
                            <div class="col-md-6">
                                <select name="page" class="form-control">
                                     <option value="">...Select one...</option>
                                    @foreach($pages as $page)
                                   <option value="{{$page->id}}">{{$page->display_name}}</option>
                                    @endforeach
                                </select>                            
                                @if ($errors->has('page'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('page') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label"> Display Name
                                
                            </label>
                            <div class="col-md-6">
              <input id="display_name" type="text" class="form-control" name="display_name" value="{{ old('display_name') }}"  placeholder="Display Name">
                                @if ($errors->has('display_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('display_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                <div class="form-group{{ $errors->has('tag_line') ? ' has-error' : '' }}">
                <label for="tag_line" class="col-md-4 control-label">Tag line
   <span class="required">*</span>
                </label>
                <div class="col-md-6">
                    <textarea class="form-control" placeholder="Enter Description" name="tag_line" required></textarea>
                    @if ($errors->has('tag_line'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tag_line') }}</strong>
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