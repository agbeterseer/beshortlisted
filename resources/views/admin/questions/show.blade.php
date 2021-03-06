@extends('layouts.admin', [
  'page_header' => "Questions / {$topic->title} ",
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => 'active',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' =>''
])

@section('content')
  <div class="margin-bottom">
    <button type="button" class="btn btn-wave" data-toggle="modal" data-target="#createModal">Add Question</button>
    <button type="button" class="btn btn-wave" data-toggle="modal" data-target="#importQuestions">Import Questions</button>
        <button type="button" class="btn btn-wave" data-toggle="modal" data-target="#importCandidates">Import Candidates</button>
  </div>
  <!-- Create Modal -->
  <div id="createModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Question</h4>
        </div>
        {!! Form::open(['method' => 'POST', 'action' => 'QuestionsController@store', 'files' => true]) !!}
          <div class="modal-body">
            <div class="row">
              <div class="col-md-4">
                {!! Form::hidden('topic_id', $topic->id) !!}
                <div class="form-group{{ $errors->has('question_text') ? ' has-error' : '' }}">                  
                  {!! Form::label('question_text', 'Question') !!}
                  <span class="required">*</span>
                  {!! Form::textarea('question_text', null, ['class' => 'form-control', 'placeholder' => 'Please Enter Question', 'rows'=>'8', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('question_text') }}</small>
                </div>
                <div class="form-group{{ $errors->has('correct') ? ' has-error' : '' }}">
               {!! Form::label('correct', 'Correct Answer', ['class' => 'control-label']) !!}
                <span class="required">*</span>
                    {!! Form::select('correct', $correct_options, old('correct'), ['class' => 'form-control select2', 'required' => 'required', 'placeholder'=>'']) !!}

                    <small class="text-danger">{{ $errors->first('correct') }}</small>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group{{ $errors->has('option1') ? ' has-error' : '' }}">
                  {!! Form::label('option1', 'A - Option') !!}
                  <span class="required">*</span>
                  {!! Form::text('option1', null, ['class' => 'form-control', 'placeholder' => 'Please Enter A Option', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('option1') }}</small>
                </div>
                <div class="form-group{{ $errors->has('option2') ? ' has-error' : '' }}">
                  {!! Form::label('option2', 'B - Option') !!}
                  <span class="required">*</span>
                  {!! Form::text('option2', null, ['class' => 'form-control', 'placeholder' => 'Please Enter B Option', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('option2') }}</small>
                </div>
                <div class="form-group{{ $errors->has('option3') ? ' has-error' : '' }}">
                  {!! Form::label('option3', 'C - Option') !!}
                  <span class="required">*</span>
                  {!! Form::text('option3', null, ['class' => 'form-control', 'placeholder' => 'Please Enter C Option', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('option3') }}</small>
                </div>
                <div class="form-group{{ $errors->has('option4') ? ' has-error' : '' }}">
                  {!! Form::label('option4', 'D - Option') !!}
                  <span class="required">*</span>
                  {!! Form::text('option4', null, ['class' => 'form-control', 'placeholder' => 'Please Enter D Option', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('option4') }}</small>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group{{ $errors->has('code_snippet') ? ' has-error' : '' }}">
                    {!! Form::label('code_snippet', 'Code Snippets') !!}
                    {!! Form::textarea('code_snippet', null, ['class' => 'form-control', 'placeholder' => 'Please Enter Code Snippets', 'rows' => '5']) !!}
                    <small class="text-danger">{{ $errors->first('code_snippet') }}</small>
                </div>
                <div class="form-group{{ $errors->has('answer_explanation') ? ' has-error' : '' }}">
                    {!! Form::label('answer_explanation', 'Answer Explanation') !!}
                    {!! Form::textarea('answer_explanation', null, ['class' => 'form-control', 'placeholder' => 'Please Enter Answer Explanation', 'rows' => '4']) !!}
                    <small class="text-danger">{{ $errors->first('answer_explanation') }}</small>
                </div>
              </div>
              <div class="col-md-12">
                <div class="extras-block">
                  <h4 class="extras-heading">Video And Image For Question</h4>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group{{ $errors->has('question_video_link') ? ' has-error' : '' }}">
                        {!! Form::label('question_video_link', 'Add Video To Question') !!}
                        {!! Form::text('question_video_link', null, ['class' => 'form-control', 'placeholder'=>'https://myvideolink.com/embed/..']) !!}
                        <small class="text-danger">{{ $errors->first('question_video_link') }}</small>
                        <p class="help">YouTube And Vimeo Video Support (Only Embed Code Link)</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group{{ $errors->has('question_img') ? ' has-error' : '' }}">
                        {!! Form::label('question_img', 'Add Image To Question') !!}
                        {!! Form::file('question_img') !!}
                        <small class="text-danger">{{ $errors->first('question_img') }}</small>
                         <p class="help">Please Choose Only .JPG, .JPEG and .PNG</p>
                      </div>
                    </div>
                  </div>
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
  <!-- Import Questions Modal -->
  <div id="importQuestions" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Import Questions (Excel File With Exact Header of DataBase Field)</h4>
        </div>
        {!! Form::open(['method' => 'POST', 'action' => 'QuestionsController@importExcelToDB', 'files' => true]) !!}
          <div class="modal-body">
            {!! Form::hidden('topic_id', $topic->id) !!}
            <div class="form-group{{ $errors->has('question_file') ? ' has-error' : '' }}">
              {!! Form::label('question_file', 'Import Question Via Excel File', ['class' => 'col-sm-3 control-label']) !!}
              <span class="required">*</span>
              <div class="col-sm-9">
                {!! Form::file('question_file', ['required' => 'required']) !!}
                <p class="help-block">Only Excel File (.CSV and .XLS)</p>
                <small class="text-danger">{{ $errors->first('question_file') }}</small>
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
            {!! Form::hidden('topic_id', $topic->id) !!}
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
  <div class="box">
    <div class="box-body table-responsive">
      <table id="questions_table" class="table table-hover table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Questions</th>
            <th>A - Option</th>
            <th>B - Option</th>
            <th>C - Option</th>
            <th>D - Option</th>
            <th>Correct Answer</th>
            <th>Code Snippet</th>
            <th>Answer Explanation</th>
            <th>Image</th>
            <th>Video Link</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @if ($questions)
            @foreach ($questions as $key => $question)
              @php
                $answer = strtolower($question->answer);
              @endphp
              <tr>
                <td>
                  {{$key+1}}
                </td>
                <td>{{$question->question_text}}</td>
                <td>{{$question->a}}</td>
                <td>{{$question->b}}</td>
                <td>{{$question->c}}</td>
                <td>{{$question->d}}</td>
                <td>{{$question->$answer}}</td>
                <td>
                  <pre>
                    {{{$question->code_snippet}}}
                  </pre>
                </td>
                <td>
                  {{$question->answer_exp}}
                </td>
                <td>
                  <img src="{{asset('/images/questions/'.$question->question_img)}}" class="img-responsive" alt="image">
                </td>
                <td>
                  {{$question->question_video_link}}
                </td>
                <td>
                  <!-- Edit Button -->
                  <a type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#{{$question->id}}EditModal"><i class="fa fa-edit"></i> Edit</a>
                  <!-- Delete Button -->
                  <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$question->id}}deleteModal"><i class="fa fa-close"></i> Delete</a>
                  <div id="{{$question->id}}deleteModal" class="delete-modal modal fade" role="dialog">
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
                          {!! Form::open(['method' => 'DELETE', 'action' => ['QuestionsController@destroy', $question->id]]) !!}
                            {!! Form::reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) !!}
                            {!! Form::submit("Yes", ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <!-- edit model -->
              <div id="{{$question->id}}EditModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Edit Question</h4>
                    </div>
                    {!! Form::model($question, ['method' => 'PATCH', 'action' => ['QuestionsController@update', $question->id], 'files' => true]) !!}
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-4">
                            {!! Form::hidden('topic_id', $topic->id) !!}
                            <div class="form-group{{ $errors->has('question_text') ? ' has-error' : '' }}">
                              {!! Form::label('question_text', 'Question') !!}
                              <span class="required">*</span>
                              {!! Form::textarea('question_text', null, ['class' => 'form-control', 'placeholder' => 'Please Enter Question', 'rows'=>'8', 'required' => 'required']) !!}
                              <small class="text-danger">{{ $errors->first('question_text') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('correct') ? ' has-error' : '' }}">
                               {!! Form::label('correct', 'Correct Answer', ['class' => 'control-label']) !!}
                <span class="required">*</span>
                    {!! Form::select('correct', $correct_options, old('correct'), ['class' => 'form-control select2', 'required' => 'required', 'placeholder'=>'']) !!}
                               
                                <small class="text-danger">{{ $errors->first('correct') }}</small>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group{{ $errors->has('option1') ? ' has-error' : '' }}">
                              {!! Form::label('option1', 'A - Option') !!}
                              <span class="required">*</span>
                              {!! Form::text('option1', null, ['class' => 'form-control', 'placeholder' => 'Please Enter A Option', 'required' => 'required']) !!}
                              <small class="text-danger">{{ $errors->first('option1') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('option2') ? ' has-error' : '' }}">
                              {!! Form::label('option2', 'B - Option') !!}
                              <span class="required">*</span>
                              {!! Form::text('option2', null, ['class' => 'form-control', 'placeholder' => 'Please Enter B Option', 'required' => 'required']) !!}
                              <small class="text-danger">{{ $errors->first('option2') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('option3') ? ' has-error' : '' }}">
                              {!! Form::label('option3', 'C - Option') !!}
                              <span class="required">*</span>
                              {!! Form::text('option3', null, ['class' => 'form-control', 'placeholder' => 'Please Enter C Option', 'required' => 'required']) !!}
                              <small class="text-danger">{{ $errors->first('option3') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('option4') ? ' has-error' : '' }}">
                              {!! Form::label('option4', 'D - Option') !!}
                              <span class="required">*</span>
                              {!! Form::text('option4', null, ['class' => 'form-control', 'placeholder' => 'Please Enter D Option', 'required' => 'required']) !!}
                              <small class="text-danger">{{ $errors->first('option4') }}</small>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group{{ $errors->has('code_snippet') ? ' has-error' : '' }}">
                                {!! Form::label('code_snippet', 'Code Snippets') !!}
                                {!! Form::textarea('code_snippet', null, ['class' => 'form-control', 'placeholder' => 'Please Enter Code Snippets', 'rows' => '5']) !!}
                                <small class="text-danger">{{ $errors->first('code_snippet') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('answer_ex') ? ' has-error' : '' }}">
                                {!! Form::label('answer_ex', 'Answer Explanation') !!}
                                {!! Form::textarea('answer_ex', null, ['class' => 'form-control',  'placeholder' => 'Please Enter Answer Explanation',  'rows' => '4']) !!}
                                <small class="text-danger">{{ $errors->first('answer_ex') }}</small>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="extras-block">
                              <h4 class="extras-heading">Images And Video For Question</h4>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group{{ $errors->has('question_video_link') ? ' has-error' : '' }}">
                                    {!! Form::label('question_video_link', 'Add Video To Question') !!}
                                    {!! Form::text('question_video_link', null, ['class' => 'form-control', 'placeholder'=>'https://myvideolink.com/embed/..']) !!}
                                    <small class="text-danger">{{ $errors->first('question_video_link') }}</small>
                                    <p class="help">YouTube And Vimeo Video Support (Only Embed Code Link)</p>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group{{ $errors->has('question_img') ? ' has-error' : '' }}">
                                    {!! Form::label('question_img', 'Add Image In Question') !!}
                                    {!! Form::file('question_img') !!}
                                    <small class="text-danger">{{ $errors->first('question_img') }}</small>
                                    <p class="help">Please Choose Only .JPG, .JPEG and .PNG</p>
                                  </div>
                                </div>
                              </div>
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
