@extends('layouts.admin', [
  'page_header' => 'Candidate',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' => 'active'
])

@section('content')
 
  <!-- Create Modal -->

  <div class="box">
    <div class="box-body table-responsive">
      <table id="search" class="table table-hover table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Job Code</th>
            <th>Applicaiton NO</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @if ($users)
            @php($i = 1)
            @foreach ($users as $candidate)
              <tr>
                <td>
                  {{$i}}
                  @php($i++)
                </td>
                <td>{{$candidate->name}}</td>
                <td title="{{$candidate->name}}">{{$candidate->email}}</td>
                <td>{{$candidate->job_code}}</td>
                <td>{{$candidate->application_code}} </td>
                <td>
                <!--Send Link -->
                
                  <!-- Edit Button -->
                  <a type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#{{$candidate->id}}EditModal"><i class="fa fa-edit"></i> View</a>
                  <!-- Delete Button -->
                  <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$candidate->id}}deleteModal"><i class="fa fa-close"></i> Delete</a>
                  <div id="{{$candidate->id}}deleteModal" class="delete-modal modal fade" role="dialog">
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
                          {!! Form::open(['method' => 'DELETE', 'action' => ['TopicController@destroy', $candidate->id]]) !!}
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
    <div id="{{$candidate->id}}EditModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Details</h4>
                    </div>
           
                      <div class="modal-body">
                        <div class="row">
                             <div class="col-md-6">
             <div class="form-group">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 210px;">
                        <img src="uploads/avatars/{{ $user->avatar }}"  alt="" width=" 300px" height="300px" />
                         </div> 
                       </div>
                      </div>
<div class="form-group">
     <label class="control-label"><strong> Full Name  :</strong> {{$candidate->name}} 
      </label>
        </div>
           <div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }}">
        
                <div class="input-group">
               <strong>Region :</strong>{{$candidate->region_id}}</div>
               
            </div> 
            <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}" >
                   
            <div class="input-group">
              <strong> State  :</strong> {{$candidate->city_id}} State </div> 
            </div> 
                  
        <div class="form-group">
        <label class="control-label"><strong> Contact Address: </strong>{{$candidate->contact_address}}</label>
        </div>

        <div class="form-group">
        <label class="control-label"><strong> Phone Number:</strong> {{$candidate->phone_number}}</label>

        </div> 

                          </div>
                          <div class="col-md-4">
                                     <small class="text-danger">{{ $errors->first('question_text') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('correct') ? ' has-error' : '' }}">
                                <small class="text-danger">{{ $errors->first('correct') }}</small>
                            </div>
                          </div>
                          
                          <div class="col-md-4">
                            <div class="form-group{{ $errors->has('code_snippet') ? ' has-error' : '' }}">
                                          <small class="text-danger">{{ $errors->first('code_snippet') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('answer_ex') ? ' has-error' : '' }}">
                                           <small class="text-danger">{{ $errors->first('answer_ex') }}</small>
                            </div>
                          </div>
                     
                        </div>
                      </div>
                   
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
