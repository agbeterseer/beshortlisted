@extends('layouts.employer_layout', [
  'page_header' => 'Employer',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'employer' => '',
  'profile' => '',
  'manage_jobs' => '',
  'job_post' => 'active',
  'profile' => '',
  'shortlisted' => '',
  'transaction' => '',
  'package' => '',
])


@section('content')

   <div class="careerfy-employer-dashboard-nav" style="background-color: #ffffff;">
      <figure>
            <form action="{{route('post.image')}}" role="form" enctype="multipart/form-data" method="POST">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                        <div class="form-group">
         <img src="/uploads/avatars/{{ $recruit_profile_pix->pix }}"  alt="Picture" class="employer-dashboard-thumb" >

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
  <div class="careerfy-column-12 pageaction" align="center">
<div class="col-md-12">
@foreach($recruit_profile_pix_list as $recruit_profile)
 <form action="{{route('selete.image')}}" method="GET">
      <div class="col-md-2" >   
                               
          <figure>
            <div class="resume_pic_outer">
            <div class="resume_pic">
            <a href="#"></a>
            <input type="hidden" name="id" value="{{$recruit_profile->id}}">
       <button type="Submit">
           <div class="careerfy-checkbox-toggle" id="image_section-{{$recruit_profile->id}}" >    
            <img src="/uploads/avatars/{{ $recruit_profile->pix }}"  alt="Picture" class="employer-dashboard-thumb" >
             </div>
            </button>
          
 
            </div>
            </div>
          </figure>
          </form>
         
  </div>
 
  @endforeach
 
</div>
</div>
                   
 
                                   
      </div>
 
@endsection

 