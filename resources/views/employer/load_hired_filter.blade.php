<ul class="careerfy-row nav-tabs tabs-left" id="hire_section">
<!-- <ul> -->
 @if(!$hired_list->isEmpty())
 <?php $reviewcf = 0; ?>
@forelse($hired_list as $hired_applicant)
   
<li class="careerfy-column-12">
 @if($reviewcf === 0)
      <a href="#tab_6_1{{$hired_applicant->id}}" data-toggle="tab">
                                                 @else
 <a href="#tab_6_1{{$hired_applicant->id}}" data-toggle="tab">
                                                 @endif  
                                            <div class="careerfy-candidate-default-wrap butt"> 
                                                <figure>
                                                 <img src="/uploads/avatars/{{ $hired_applicant->user->avatar }}" alt=""> 
                                                </figure> 
                                                <div class="careerfy-candidate-default-text">
                                                    <div class="careerfy-candidate-default-left">
                                                        <h2>
                            @foreach($documentList as $document) @if($hired_applicant->document_id === $document->id) {{$document->candidates_name}} @endif @endforeach  <i class="careerfy-icon careerfy-check-mark"></i></h2>
                                                        <ul class="careerfy-column-12" >

                                                        <!-- to get work experience; get job_id from application table and resume_id, then goto workexperience table and find by resume_id and jpob_id  -->
                                                   
                                                        @foreach($work_experiences as $work_experience)
                                                        @if($work_experience->userfk === $hired_applicant->user_id && $work_experience->present === 1)
                                                            <li>{{$work_experience->position_title}} at <span href="#" class="careerfy-candidate-default-studio">{{$work_experience->company_name}}</span></li>
                                                            @endif
                                                        @endforeach
                                                        </ul>
                                                    </div>
                                              <!--       <a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a> -->
                                                </div>
                                            </div> </a>
                                        </li>

 <?php $reviewcf++; ?>
@empty
@endforelse

@else
<li class="careerfy-column-12"> No Record(s) Found</li>
@endif
 
                                    </ul>