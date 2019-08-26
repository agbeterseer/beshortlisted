
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

                                                  <img src="/uploads/avatars/{{ $hired_applicant->avatar }}" alt=""> 
                                                 
                                                </figure> 
                                                <div class="careerfy-candidate-default-text">
                                                    <div class="careerfy-candidate-default-left">
                                                        <h2>
                            {{$hired_applicant->candidates_name}} 

                            <i class="careerfy-icon careerfy-check-mark"></i></h2>
                                                        <ul class="careerfy-column-12" >

                                                        <!-- to get work experience; get job_id from application table and resume_id, then goto workexperience table and find by resume_id and jpob_id  -->
                                                   
                                                        
                                                            <li>{{$hired_applicant->city_id}} <span href="#" class="careerfy-candidate-default-studio">{{$hired_applicant->email}}</span></li>
                                                         
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
<li class="careerfy-column-12"> No Job(s) Found</li>
@endif
 