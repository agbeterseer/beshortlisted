@extends('layouts.admin', [
  'page_header' => 'Settings',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => 'active'
])
@section('content')

  @php
    $setting = $settings[0];
  @endphp
  {!! Form::model($setting, ['method' => 'PATCH', 'action' => ['SettingController@update', $setting->id], 'files' => true]) !!}

  <div class="row">
    <div class="col-md-8">
      <div class="box">
        <div class="box-body settings-block">
          <div class="form-group{{ $errors->has('welcome_txt') ? ' has-error' : '' }}">
            {!! Form::label('welcome_txt', 'App Name') !!}
            <p class="label-desc">Please Enter Your App Name</p>
            {!! Form::text('welcome_txt', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('welcome_txt') }}</small>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                {!! Form::label('logo', 'Logo Select') !!}
                <p class="label-desc">Please Select Logo</p>
                {!! Form::file('logo') !!}
                <small class="text-danger">{{ $errors->first('logo') }}</small>
              </div>
              <div class="logo-block">
                <img src="{{asset('/images/logo/'. $setting->logo)}}" class="img-responsive"  alt="{{$setting->welcome_txt}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group{{ $errors->has('favicon') ? ' has-error' : '' }}">
                {!! Form::label('favicon', 'Favicon Select') !!}
                <p class="label-desc">Please Select Favicon</p>
                {!! Form::file('favicon') !!}
                <small class="text-danger">{{ $errors->first('favicon') }}</small>
              </div>
            </div>
          </div>
          {!! Form::submit("Save Setting", ['class' => 'btn btn-wave btn-block']) !!}
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}

 
 <a href="#" class="btn btn-success" data-toggle="modal" >Email Templates</a>

<p></p>
 <div class="dashboard-block">
    <div class="row">
      <div class="col-md-7">
        <div class="row">
        
        
 {!! Form::model($setting, ['method' => 'POST', 'action' => ['EmailTemaplateController@store'], 'files' => true]) !!}

  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-body settings-block">

   <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            {!! Form::label('title', 'Title') !!}
            <p class="label-desc">Please Enter Your Title</p>
            {!! Form::text('title', null, ['class' => 'form-control' ]) !!}
            <small class="text-danger">{{ $errors->first('title') }}</small>
          </div>

          <div class="form-group{{ $errors->has('body_of_email') ? ' has-error' : '' }}">
            {!! Form::label('body_of_email', 'Email') !!}
         
            {!! Form::textarea('body_of_email', null, ['class' => 'form-control', 'id' => 'summernote_1']) !!}
            <small class="text-danger">{{ $errors->first('body_of_email') }}</small>
          </div>
   
          {!! Form::submit("Save Email", ['class' => 'btn btn-wave btn-block']) !!}
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}   
        
        </div>
      </div>
   <div class="col-md-5">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h4 class="box-title">Email Templates</h4>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <ul class="users-list clearfix">
              @if ($emails)
                @foreach ($emails as $email)
                  <li>
                    <a class="users-list-name" href="#" title="{{$email->title}}"  >{{$email->title}} </a>
                    <span class="users-list-date">{{date('d-M-Y', strtotime($email->created_at))}}</span>
                        <a type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#{{$email->id}}EditModal"><i class="fa fa-edit"></i> Edit</a>
                  </li>



                    <!-- edit model -->
              <div id="{{$email->id}}EditModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
   
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Edit Email</h4>
                                      <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$email->id}}deleteModal"><i class="fa fa-close"></i> Delete</a>
                    </div>
        {!! Form::model($email, ['method' => 'PATCH', 'action' => ['EmailTemaplateController@update', $email->id], 'files' => true]) !!}
             
                 {{ method_field('PATCH')}}
                        {{ csrf_field() }}

                      <div class="modal-body">
                        <div class="row">
                          <div class="box-body settings-block">

   <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            {!! Form::label('title', 'Title') !!}
            <p class="label-desc">Please Enter Your Title</p>
            {!! Form::text('title', null, ['class' => 'form-control' ]) !!}
            <small class="text-danger">{{ $errors->first('title') }}</small>
          </div>

          <div class="form-group{{ $errors->has('body_of_email') ? ' has-error' : '' }}">
            {!! Form::label('body_of_email', 'Email') !!}
          
            {!! Form::textarea('body_of_email', $email->body, ['class' => 'form-control', 'id' => 'summernote_2']) !!}
            <small class="text-danger">{{ $errors->first('body_of_email') }}</small>
          </div>
   
              {!! Form::submit("Update", ['class' => 'btn btn-wave']) !!}
        </div>
                   
                        </div>
                      </div>
                      <div class="modal-footer">
                        <div class="btn-group pull-right">
                   
                        </div>
                      </div>
          {!! Form::close() !!} 


               
                  </div>
                </div>

                     
              </div>
  <div id="{{$email->id}}deleteModal" class="delete-modal modal fade" role="dialog">
                  <!-- Delete Modal -->
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <div class="delete-icon"></div>
                        </div>
                        <div class="modal-body text-center">
                          <h4 class="modal-heading">Are You Sure ?</h4>
                          <p>Do you really want to delete these records? This process cannot be undone.</p>
                        </div>
                        <div class="modal-footer">
                          {!! Form::open(['method' => 'DELETE', 'action' => ['EmailTemaplateController@destroy', $email->id]]) !!}
                            {!! Form::reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) !!}
                            {!! Form::submit("Yes", ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                        </div>
                      </div>
                    </div>
</div>
                @endforeach
              @endif
            </ul>
            <!-- /.users-list -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer text-center">
            <a href=" " class="uppercase">View All Email Templates</a>
          </div>
          <!-- /.box-footer -->
        </div>
      </div>
    </div>
  </div>
@endsection
