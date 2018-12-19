@extends('layouts.admin', [
  'page_header' => "Candidates  ",
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => 'active',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' => ''
])

@section('content')
  <div class="margin-bottom">
  <a href="{{url('/admin/candidate/verified/')}}"  class="btn btn-wave"> Verified Candidates</a>
  
<button type="button" class="btn btn-wave" data-toggle="modal" data-target="#importQuestions">Import Questions</button>
        <button type="button" class="btn btn-wave" data-toggle="modal" data-target="#importCandidates">Import Candidates</button>

  <a href="{{url('/downloadCandidateExcel/')}}"  class="btn btn-wave"> Verified Candidates</a>

 
  </div>
  <!-- Create Modal -->
 
  <!-- Import Questions Modal -->
 
    <!-- Import User Modal -->
  <div id="importCandidates" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Import Candidates (Excel File With Exact Header of DataBase Field)</h4>
        </div>
        {!! Form::open(['method' => 'POST', 'action' => 'QuestionsController@importCandidatesExcelToDB', 'files' => true]) !!}
          <div class="modal-body">
         
            <div class="form-group{{ $errors->has('candidate_file') ? ' has-error' : '' }}">
              {!! Form::label('candidate_file', 'Import Candidates Via Excel File', ['class' => 'col-sm-3 control-label']) !!}
              <span class="required">*</span>
              <div class="col-sm-9">
                {!! Form::file('candidate_file', ['required' => 'required']) !!}
                <p class="help-block">Only Excel File (.CSV and .XLS)</p>
                <small class="text-danger">{{ $errors->first('candidate_file') }}</small>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              {!! Form::reset("Reset", ['class' => 'btn btn-default']) !!}
              {!! Form::submit("Import", ['class' => 'btn btn-wave']) !!}
            </div>
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
        {!! Form::open(['method' => 'POST', 'action' => 'SendLinkController@SendVerificaitonLinkToMultipleCandidates', 'files' => true]) !!}
   
   <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
           <label for="name" class="col-md-2">Email Template <span class="required"> *</span></label>

 <select name="email_template" required="required" >
  
  <option value="">... select one...</option>
  @foreach($email_templates as $email)
  <option value="{{$email->id}}">{{$email->title}}</option>

  @endforeach
</select>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                          
                        </div>
  <div class="box">
    <div class="box-body table-responsive">


      <table id="questions_table" class="table table-hover table-striped">
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
            <th>Answer Explanation</th>
            <th>Image</th> 
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @if ($users)
            @foreach ($users as $key => $userd) 
              <tr>
                <td>
                  {{$key+1}}
                </td>
                <td> 
                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                <input type="checkbox" id="checkAll" class="checkboxes" value="{{$userd->id}}" name="check_user[]" />
                <span></span>
                </label>
                </td> 
                <td>{{$userd->name}}</td> 
                <td>{{$userd->email}}</td> 
                <td>{{$userd->application_code}}</td>
                <td><img src="{{asset('/images/questions/'.$userd->question_img)}}" class="img-responsive" alt="image">
                </td> 
                <td>
                  <!-- Edit Button -->
                  <a type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#{{$userd->id}}EditModal"><i class="fa fa-edit"></i> Edit</a>
                  <!-- Delete Button -->
                  <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$userd->id}}deleteModal"><i class="fa fa-close"></i> Delete</a>
                  <div id="{{$userd->id}}deleteModal" class="delete-modal modal fade" role="dialog">
                    <!-- Delete Modal --> 
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
              {!! Form::submit("Send Verification", ['class' => 'btn btn-wave']) !!}
            </div>
          </div>
           
      
    </div>
  </div>
    {!! Form::close() !!}

@endsection
