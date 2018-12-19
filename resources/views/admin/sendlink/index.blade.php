@extends('layouts.admin', [
  'page_header' => "Users ",
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => 'active',
  'top_re' => '',
  'all_re' => '',
  'sett' => ''
])

 @section('content')
    
 <div class="box">
    <div class="box-body table-responsive">
  {!! Form::open(['method' => 'POST', 'action' => 'SendLinkController@SendLinkToMultipleCandidates', 'files' => true]) !!}

      <table id="search" class="table table-hover table-striped">
        <thead>
          <tr>
            <th>#</th>
 <th>
<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
<input type="checkbox"   class="group-checkable" data-set="#sample_1 .checkboxes"  onclick="toggle(this);" />
<span></span>
</label>
 </th> 
            <th>Name</th>
            <th>Email</th>
            <th>Test</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

          @if ($users)
            @foreach ($users as $key => $user)
        
              <tr>
                <td>
                  {{$key+1}}
                </td>
                <td>
                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                <input type="checkbox" id="checkAll" class="checkboxes" value="{{$user->id}}" name="check_user[]" />
                <span></span>
                </label>
                </td>
                <td>{{$user->name }}</td>
                <td>{{$user->email }}</td>
                <td>test </td>
        
                <td>
                  <!-- Edit Button -->
 
                  
                  <!-- Delete Button -->
                  <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$user->id}}deleteModal"><i class="fa fa-close"></i> Delete</a>
                  <div id="{{$user->id}}deleteModal" class="delete-modal modal fade" role="dialog">
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
               
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <!-- edit model -->
            
            @endforeach
          @endif
        </tbody>
      </table>
   <div class="modal-footer">
            <div class="btn-group pull-left">
              {!! Form::reset("Reset", ['class' => 'btn btn-default']) !!}
              {!! Form::submit("Send Link To All", ['class' => 'btn btn-wave']) !!}
            </div>
          </div>
        {!! Form::close() !!}

    </div>
  </div>

  @endsection
