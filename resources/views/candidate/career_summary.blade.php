      
@extends('layouts.jobboard', [
  'page_header' => 'Candidates',
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
    <div class="col-md-12 ">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
           
 <div class="portlet light bordered">

                 @if(session()->has('message.level'))
                        <div class="alert alert-{{ session('message.level') }}"> 
                        {!! session('message.content') !!}
                        </div>
                        @endif
                       @if(Session()->has('error'))
                        <div class="alert alert-danger"> 
                        {!! Session::get('error') !!}
                        </div>
                        @endif
                <div class="portlet-title table_header">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark "></i>
                        <span class="caption-subject bold "> CAREER OBJECTIVE / SUMMARY</span>
                    </div>                
                </div>


 
<form class="form-horizontal" action="{{ route('update.career_summary', $career->id) }}" method="post" role="form">
{{ csrf_field() }}
<!-- <form role="form"> -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-12">
Title <span class="required">*</span>
<textarea class="form-control" placeholder="A result-driven and dedicated Application Developer, seeking a software engineering position to utilize logical thinking skills and programming expertise to provide the company with excellent software solutions" name="career_summary" required="required">{{$career->summary}}</textarea> 
<input type="hidden" name="resume" value="{{$code}}" >
 <input type="hidden" name="career" value="{{$career->id}}" >
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->

<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->

<!-- END EXAMPLE TABLE PORTLET-->

</div>
<div class="modal-footer">
<a href="{{url('/index/resume')}}" class="btn dark btn-outline" data-dismiss="modal">Close</a>
<button type="submit" class="btn green">Save changes</button>
</div>
</form>
</div>
</div>
 
@endsection