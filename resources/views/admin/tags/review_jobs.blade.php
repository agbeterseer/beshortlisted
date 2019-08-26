@extends('layouts.admin_layout', [
  'page_header' => 'Policy',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' => '',
    'policy' => 'active', 
  'package' => '',
  'page' => ' ',
     'role' => '',
  'user' => '',
])
@section('content')
 



                                @if(Session()->has('success'))
                        <div class="alert alert-success"> 
                        {!! Session::get('success') !!}
                        </div>
                        @endif
                       @if(Session()->has('error'))
                        <div class="alert alert-danger"> 
                        {!! Session::get('error') !!}
                        </div>
                        @endif



         <div class="col-md-12">
   

 |<div class="col-md-6">
                                    <a>
                                    <span class="ladda-label">
                                    <i class="icon-plus"></i>&nbsp;Current Status</span>
                                    </a>
@if($tag->awaiting_aproval === 1 &&  $tag->draft === 0 && $tag->status === 0)
                       <span class="label label-sm label-default "><i> &nbsp; Awaiting Approval</i></span>
                        @elseif($tag->draft === 1 && $tag->awaiting_aproval === 1 && $tag->active === 0 && $tag->status === 0)
                        Save to draft
        
                        @elseif($tag->active === 0 && $tag->status === 3 && $tag->awaiting_aproval === 0 && $tag->draft === 0)
                        
                           <span class="badge badge-empty badge-danger" style="background-color: black;"></span> Blacklist 
                        @elseif($tag->active === 1 &&  $tag->draft === 0 && $tag->status === 1 && $tag->awaiting_aproval === 0)
                <span class="item-status">
<span class="badge badge-empty badge-success"></span> &nbsp;Active</span>
                        @elseif($tag->active === 2 &&  $tag->draft === 0 && $tag->status === 2 && $tag->awaiting_aproval === 0)
                  
                        <span class="badge badge-empty badge-danger"></span> Offline 


                        @endif
                        @if($tag->active === 1 &&  $tag->draft === 0 && $tag->status === 1 && $tag->awaiting_aproval === 0 && $tag->featured === 1)
                        <span class="badge badge-empty badge-danger"></span> featured 
                        @endif
                             </div>   
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Job Title: {{$tag->job_title}}</span>
                    </div>
               
                </div>
           
 <!-- <span class="mt-comment-status mt-comment-status-pending">Pending</span> -->

                
  

<table> <tr>
    <td>   <form action="{{route('approve.job', $tag->id)}}" method="POST">
{{ csrf_field() }}
            <button type="submit" class="btn blue mt-ladda-btn ladda-button btn-outline" data-style="slide-left" data-spinner-color="#333">
            <span class="ladda-label">
            <i class="icon-plus"></i>&nbsp;Activate</span>
            </button>
      </form></td> <td>    <form action="{{route('turnoff.job', $tag->id)}}" method="POST" name="red">
{{ csrf_field() }}
            <button type="submit" class="btn red mt-ladda-btn ladda-button btn-outline" data-style="slide-left" data-spinner-color="#333">
            <span class="ladda-label">
            <i class="icon-plus"></i>&nbsp;De-Activate</span>
            </button>
      </form>  </td><td>
      <form action="{{route('blacklist.job', $tag->id)}}" method="POST" name="black">
{{ csrf_field() }}
            <button type="submit" class="btn black mt-ladda-btn ladda-button btn-outline" data-style="slide-left" data-spinner-color="#333">
            <span class="ladda-label">
            <i class="icon-plus"></i>&nbsp;BlackList</span>
            </button>
      </form> </td>
      <td>
              @if($tag->active === 1 &&  $tag->draft === 0 && $tag->status === 1 && $tag->awaiting_aproval === 0)                     
      <form action="{{route('make.featured', $tag->id)}}" method="POST" name="black">
{{ csrf_field() }}
            <button type="submit" class="btn red mt-ladda-btn ladda-button btn-outline" data-style="slide-left" data-spinner-color="#333">
            <span class="ladda-label">
            <i class="icon-plus"></i>Featured</span>
            </button>
      </form>  @endif</td>

</tr></table>


    <form class="form-horizontal" action="{{route('tag.store')}}" method="post" role="form">    
<div class="col-md-12">
<div class="row">
                    <div class="col-md-6">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label"><strong>End Date:</strong>
                        <span class="required" >*</span>
                </label>

                <div class="col-md-4">
        
                    @if ($errors->has('end_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('end_date') }}</strong>
                        </span>
                    @endif
                </div>
            </div>      </div>    
            <div class="col-md-6">          
            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                <label for="display_name" class="col-md-4 control-label"> Deadline Submission: </label>
             
             <label for="display_name" class="col-md-4 control-label">   {{$tag->deadline_submission}}</label>
  
            </div>
        </div>

</div>
<div class="row">
                    <div class="col-md-6">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label"><strong>Email:</strong>
                        <span class="required" >*</span>
                </label>

             <label for="name" class="col-md-4 control-label">
                 {{$tag->email_address}}
 
                </label>
            </div>      </div>    
            <div class="col-md-6">          
            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                <label for="display_name" class="col-md-4 control-label">Job Position:</label>
            <label for="display_name" class="col-md-4 control-label">
                {{$tag->industry}}
                </label>
            </div>
        </div>

</div>
  <div class="row">
                    <div class="col-md-6">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label"><strong>Job Type:</strong>
                        <span class="required" >*</span>
                </label>

                   <label for="name" class="col-md-4 control-label">
                    {{$tag->job_type}}
 
                </label>
            </div>      </div>    
            <div class="col-md-6">          
            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                <label for="display_name" class="col-md-4 control-label"> <strong>Job Level:</strong></label>
                  <label for="name" class="col-md-4 control-label">
                    {{$tag->job_level}}
                        </label>
            </div>
        </div>

</div>       
  <div class="row">
                    <div class="col-md-6">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label"><strong>Gender:</strong>
                        <span class="required" >*</span>
                </label>

                  <label for="name" class="col-md-4 control-label">
                    {{$tag->gender}}
 
                </label>
            </div>      </div>    
            <div class="col-md-6">          
            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                <label for="display_name" class="col-md-4 control-label"><strong>Salary Range:</strong></label>
                   <label for="name" class="col-md-4 control-label">
                {{$tag->salary_range}}
                    </label>
            </div>
                        </div>

</div>       

  <div class="row">
                    <div class="col-md-6">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label"><strong>Experience:</strong>
                        <span class="required" >*</span>
                </label>

                 <label for="name" class="col-md-4 control-label">
                   {{$tag->experience}}
 
                </label>
            </div>      </div>    
            <div class="col-md-6">          
            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                <label for="display_name" class="col-md-4 control-label"><strong>Industry:</strong></label>
                  <label for="name" class="col-md-4 control-label">
              {{$tag->industry}}
              </label>
                    
            </div>
                        </div>

</div>  
    <div class="row">
                    <div class="col-md-6">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label"><strong>Qualification:</strong>
                        <span class="required" >*</span>
                </label>

                  <label for="name" class="col-md-4 control-label">
                   {{$tag->qualification}}
 
                </label>
            </div>      </div>    
            <div class="col-md-6">          
            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                <label for="display_name" class="col-md-4 control-label"><strong>Application Deadline Date:</strong></label>
                  <label for="name" class="col-md-4 control-label">
                  {{$tag->end_date}}
                  
                    </label>
            </div>
                        </div>

</div>  
 </div>
 <div class="space"></div>
 <hr>
 <h2>Address </h2>
 <div class="col-md-12">
<div class="row">
                    <div class="col-md-6">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label"><strong>Country:</strong>
                        <span class="required" >*</span>
                </label>

                   <label for="name" class="col-md-4 control-label">
                    {{$tag->country}}
            
                </label>
            </div>      </div>    
            <div class="col-md-6">          
            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                <label for="display_name" class="col-md-4 control-label"><strong>Region:</strong></label>
                  <label for="name" class="col-md-4 control-label">
                   {{$tag->region}}
                    
                </label>
            </div>
        </div>

</div>
<div class="row">
         <div class="col-md-6">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label"><strong>City / Town: </strong>
                        <span class="required" >*</span>
                </label> 
                  <label for="name" class="col-md-4 control-label">
                  {{$tag->city}}
               
                </label>
            </div>      </div>    
            <div class="col-md-6">          
            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                <label for="display_name" class="col-md-4 control-label"><strong>Full Address:</strong></label>
                   <label for="name" class="col-md-4 control-label">
                   {{$tag->full_address}}
                
                </label>
            </div>
        </div>

</div> 
 
<div class="row" style="background-color: #cccccc;">
  <div class="col-md-3"> 
<h2>Required Skills</h2>
      <div class="skills_inner">
<ul>
    @if(!$jobskills->isEmpty())
@foreach($jobskills as $jobskill)
    <li>{{$jobskill->title}}</li>
    @endforeach
    @else
    No Records Found
    @endif
</ul>
</div> </div>
    <div class="col-md-3">
        <h2>Requirements</h2>
        <div class="skills_inner">
<ul>
    @if(!$jobrequirements->isEmpty())
@foreach($jobrequirements as $jobrequirement)
    <li>{{$jobrequirement->title}}</li>
    @endforeach
    @else
    No Records Found
    @endif
</ul>
</div>
    </div>
<div class="col-md-3"><h2>Assessment</h2>

<ol>
    @if(!$jobassessments->isEmpty())
@foreach($jobassessments as $jobassessment)
    <li>{{$jobassessment->question}}</li>
@endforeach
@else
No Records Found
@endif
</ol>
</div>

</div>
 
 
 </div>
 </form>

                <div class="portlet-body">
                    <div class="">
                        <div class="row">
                            <div class="col-md-6"> 

                                <div class="btn-group">
 
                                </div>
                            </div>
                       
                        </div>
                    </div> 
                                    
                </div>
            </div>


       
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>


  
@endsection
