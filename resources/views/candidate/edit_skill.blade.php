      
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
    <div class="col-md-8" id="page">
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
        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
 <a href=""  data-toggle="tooltip" data-placement="top" title="Do you need help with working on this page?"><i class="fa fa-question-circle"></i> <font color="red">Need Help?</font></a>
                                </div>
                            </div>
                       
                        </div>
  <div class="portlet-title">
<div class="pageactionIn pageaction forml" id="work_history_topsection">
<div class="title">
<div class="actions">
 </div>
<h3>Edit Skills</h3>
</div>
  </div>
 </div>
<div align="center">
<div class="modal-body">

<!-- BEGIN EXAMPLE TABLE PORTLET-->
 <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="form-group">
                                        <form action="{{ route('add.skill') }}" class="mt-repeater form-horizontal" method="POST">
                                          {{ csrf_field() }} 
                                          <input type="hidden" name="resume" value="{{$resume->id}}">
                                            <input type="hidden" name="section" value="skill">
                                            <div data-repeater-list="group-a">
                                                <div data-repeater-item class="mt-repeater-item">
                                                    <!-- jQuery Repeater Container -->
                                                    <div class="mt-repeater-input">
                                                    
                                        <div class="form-group">
                                              
                                                <div class="col-md-12">
                                                    <div class="mt-repeater">
                                                        <div data-repeater-list="group_b">

                                                        @foreach($skill_list as $jobskill)
                                                            <div data-repeater-item class="row">
                                                                <div class="col-md-7">
                                                                    <label class="control-label">Skill</label>
                                              <input type="text" placeholder="Eg. Java" value="{{$jobskill->job_skill}}" class="form-control" name="skill" /> </div>
                                                                <div class="col-md-3">
                                                                    <label class="control-label"> (%)</label>
                                                                    <input type="text" placeholder="80" class="form-control" name="percentage" value="{{$jobskill->percentage}}" /> </div>
                                                                <div class="col-md-1">
                                                                    <label class="control-label">&nbsp;</label>
                                             <a href="{{route('delete.skill', array('code'=> $resume->id, 'job_skill' =>$jobskill->id) )}}" data-repeater-delete class="btn btn-danger">
                                                                        <i class="fa fa-close"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            @endforeach


                                   
                                                   
                                                        </div>
                                                        <hr>
                                                        <a href="javascript:;" data-repeater-create class="btn btn-info mt-repeater-add">
                                                            <i class="fa fa-plus"></i> Add Input</a>
                                                        <br>
                                                        <br> </div>
                                                </div>
                                            </div>
                                                        </div>
                                                    <div class="mt-repeater-input">
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete">
                                                            <i class="fa fa-close"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                           
<a  href="{{url('/index/resume')}}"  class="btn dark btn-outline" data-dismiss="modal">Close</a>
<button type="submit" class="btn green">Save changes</button>
 
                       
                                        </form>
                                    </div>
                                </div>
   </div>
 
<!-- END EXAMPLE TABLE PORTLET-->
</div>
</div>
</div>

</div> 
 </div>
</div>
</div>

</div> 
@endsection