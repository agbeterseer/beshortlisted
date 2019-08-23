@extends('layouts.jobboard', [
  'page_header' => 'Candidates',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' => 'active',
  'resume_' => ''
])

@section('content') 
@include('partials.employee_breadcomb')  
 <div class="careerfy-main-content">
            
            <!-- Main Section -->
            <div class="careerfy-main-section careerfy-dashboard-fulltwo">
                <div class="container">
                    <div class="row">
 @include('partials.job_board_sidebar')
               
                        <div class="careerfy-column-9">
  <div class="careerfy-employer-dashboard-nav" style="background-color: #ffffff;">
      <figure>
            <form action="{{route('post.image')}}" role="form" enctype="multipart/form-data" method="POST">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                        <div class="form-group">
         <img src="/uploads/avatars/{{ $user->avatar }}"  alt="Picture" class="employer-dashboard-thumb" >

                                            <div class="fileinput fileinput-new" data-provides="fileinput"> 
                                                <div>
                                                    <span class="btn default btn-file">
                                                        <span class="fileinput-new"> Select image </span>
                                                        <span class="fileinput-exists"> Change </span>
                                            <input type="file" name="avatar">
                                             </span>
                                                    <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>
                                            <div class="clearfix margin-top-10">
                                                <span class="label label-danger">NOTE! </span>
                                                <span>Please ensure you upload a clear picture</span>
                                            </div>
                                        </div>
                                        <div class="margin-top-10">
                                    <button class="btn green" type="Submit"> Submit</button>
                                     <button type="reset"  class="btn default"> Cancel </button>
                                        </div>
                                    </form>
   </figure>
 
<hr>
 
</div>


                        </div>

                    </div>
                </div>
            </div>
            <!-- Main Section -->

        </div>
        <!-- Main Content -->
   
                   
 
 
@endsection

 