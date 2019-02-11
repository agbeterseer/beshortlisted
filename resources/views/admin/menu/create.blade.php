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
                    <form class="form-horizontal" method="POST" action="{{ route('menu.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name of Menu
                            <span class="required">*</span>
                            </label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="menu name">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                     <div class="form-group{{ $errors->has('menu_order') ? ' has-error' : '' }}">
                            <label for="menu_order" class="col-md-4 control-label"> Menu Order
                                   <span class="required">*</span>
                            </label>
                            <div class="col-md-6">
                            <input id="name" type="number" class="form-control" name="menu_order" value="{{ old('menu_order') }}" required placeholder="Menu Order">

                                @if ($errors->has('menu_order'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('menu_order') }}</strong>
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
                    <div class="form-group{{ $errors->has('menu_icon') ? ' has-error' : '' }}">
                <label for="menu_icon" class="col-md-4 control-label">Menu Icon 
                </label>
                <div class="col-md-6">
              <input type="text" class="form-control" placeholder="Enter menu_icon" name="menu_icon"> 
                    @if ($errors->has('menu_icon'))
                        <span class="help-block">
                            <strong>{{ $errors->first('menu_icon') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
             <div class="form-group{{ $errors->has('menu_route') ? ' has-error' : '' }}">
                <label for="menu_route" class="col-md-4 control-label">Route 
                </label>
                <div class="col-md-6">
              <input type="text" class="form-control" placeholder="Enter menu_route" name="menu_route"> 
                    @if ($errors->has('menu_route'))
                        <span class="help-block">
                            <strong>{{ $errors->first('menu_route') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
                      <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Menu
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    

@endsection