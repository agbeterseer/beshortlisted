      
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

 <div class="space">&nbsp;</div>
 <div class="space">&nbsp;</div>
 <div class="space">&nbsp;</div>
 <div class="space">&nbsp;</div> 
 <div class="space">&nbsp;</div> 
 <div class="space">&nbsp;</div>
@include('partials.employee_breadcomb')
      <div class="careerfy-main-section careerfy-dashboard-fulltwo">
                <div class="container " id="page" style="" >
            <div class="careerfy-employer-dasboard">
<div class="careerfy-employer-box-section" style="background-color: #FFFFFF;"> 

    <div class="col-md-12 "  >
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
           
 <div class="portlet light bordered" >

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
                        <span class="caption-subject bold  ">PR Caption (this will be visible to employers)</span>
                    </div>                
                </div> 
<form class="form-horizontal" action="{{ route('add.caption') }}" method="post" role="form" name="caption_form" >
{{ csrf_field() }}
<input type="hidden" name="old_name" value="{{$recruit_resume}}">
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
<div class="col-md-12">
Title  
<input id="name" type="text" class="form-control" name="name" placeholder=" Enter title here"    required>
@if ($errors->has('name'))
<span class="help-block">
<strong>{{ $errors->first('name') }}</strong>
</span>
@endif
</div>
</div>
<pre>Eg. "Marketing Manager, Media, Tokyo", "Bilingual Sales, Airlines, Osaka", <br>"PHP Programmer, Education, California." (Position, industry, location, years of experience, certificates)</pre>
<div class="modal-footer">
<button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
<!--    <button type="button" class="btn green">Continue Task</button> -->
<button  type="submit" class="btn blue mt-ladda-btn ladda-button btn-outline" data-style="slide-left" data-spinner-color="#333">
<span class="ladda-label">
<i class="icon-plus"></i> Submit</span>
</button>
</div>

</form>
</div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->
 
 
   </div>
</div>
 </div>
</div>
@endsection