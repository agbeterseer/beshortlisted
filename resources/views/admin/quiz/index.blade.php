@extends('layouts.admin', [
  'page_header' => 'Quiz',
  'dash' => '',
  'quiz' => 'active',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => ''
])

@section('content')
  <div class="margin-bottom">
    <button type="button" class="btn btn-wave" data-toggle="modal" data-target="#createModal">Add Quiz</button>
  </div>
  <!-- Create Modal -->
  <div id="createModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Quiz</h4>
        </div>
        {!! Form::open(['method' => 'POST', 'action' => 'TopicController@store']) !!}
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                  {!! Form::label('title', 'Quiz Title') !!}
                  <span class="required">*</span>
                  {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Please Enter Quiz Title', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('title') }}</small>
                </div>
                <div class="form-group{{ $errors->has('per_q_mark') ? ' has-error' : '' }}">
                  {!! Form::label('per_q_mark', 'Per Question Mark') !!}
                  <span class="required">*</span>
                  {!! Form::number('per_q_mark', null, ['class' => 'form-control', 'placeholder' => 'Please Enter Per Question Mark', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('per_q_mark') }}</small>
                </div>
                <div class="form-group{{ $errors->has('timer') ? ' has-error' : '' }}">
                  {!! Form::label('timer', 'Quiz Time (in minutes)') !!}
                  {!! Form::number('timer', null, ['class' => 'form-control', 'placeholder' => 'Please Enter Quiz Total Time (In Minutes)']) !!}
                  <small class="text-danger">{{ $errors->first('timer') }}</small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                  {!! Form::label('description', 'Description') !!}
                  {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Please Enter Quiz Description', 'rows' => '8']) !!}
                  <small class="text-danger">{{ $errors->first('description') }}</small>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              {!! Form::reset("Reset", ['class' => 'btn btn-default']) !!}
              {!! Form::submit("Add", ['class' => 'btn btn-wave']) !!}
            </div>
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <div class="box">
    <div class="box-body table-responsive">
      <table id="search" class="table table-hover table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Quiz Title</th>
            <th>Description</th>
            <th>Per Question Mark</th>
            <th>Time</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @if ($topics)
            @php($i = 1)
            @foreach ($topics as $topic)
              <tr>
                <td>
                  {{$i}}
                  @php($i++)
                </td>
                <td>{{$topic->title}}</td>
                <td title="{{$topic->description}}">{{str_limit($topic->description, 50)}}</td>
                <td>{{$topic->per_q_mark}}</td>
                <td>{{$topic->timer}} mins</td>
                <td>
                <!--Send Link -->
                <a  href="{{route('sendlink.index', ['id' => $topic->id])}}" class="btn btn-info btn-xs" ><i class="fa fa-edit"></i> Send link</a>
                  <!-- Edit Button -->
                  <a type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#{{$topic->id}}EditModal"><i class="fa fa-edit"></i> Edit</a>
                  <!-- Delete Button -->
                  <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$topic->id}}deleteModal"><i class="fa fa-close"></i> Delete</a>
                  <div id="{{$topic->id}}deleteModal" class="delete-modal modal fade" role="dialog">
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
                          {!! Form::open(['method' => 'DELETE', 'action' => ['TopicController@destroy', $topic->id]]) !!}
                            {!! Form::reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) !!}
                            {!! Form::submit("Yes", ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <!-- send Link -->

              <!-- edit model -->
              <div id="{{$topic->id}}EditModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Edit Quiz</h4>
                    </div>
                    {!! Form::model($topic, ['method' => 'PATCH', 'action' => ['TopicController@update', $topic->id]]) !!}
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                              {!! Form::label('title', 'Topic Title') !!}
                              <span class="required">*</span>
                              {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Please Enter Quiz Title', 'required' => 'required']) !!}
                              <small class="text-danger">{{ $errors->first('title') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('per_q_mark') ? ' has-error' : '' }}">
                              {!! Form::label('per_q_mark', 'Per Question Mark') !!}
                              <span class="required">*</span>
                              {!! Form::number('per_q_mark', null, ['class' => 'form-control', 'placeholder' => 'Please Enter Per Question Mark', 'required' => 'required']) !!}
                              <small class="text-danger">{{ $errors->first('per_q_mark') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('timer') ? ' has-error' : '' }}">
                              {!! Form::label('timer', 'Quiz Time (in minutes)') !!}
                              {!! Form::number('timer', null, ['class' => 'form-control', 'placeholder' => 'Please Enter Quiz Total Time (In Minutes)']) !!}
                              <small class="text-danger">{{ $errors->first('timer') }}</small>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                              {!! Form::label('description', 'Description') !!}
                              {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Please Enter Quiz Description']) !!}
                              <small class="text-danger">{{ $errors->first('description') }}</small>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <div class="btn-group pull-right">
                          {!! Form::submit("Update", ['class' => 'btn btn-wave']) !!}
                        </div>
                      </div>
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>



            @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
@endsection
