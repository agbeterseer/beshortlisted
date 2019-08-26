
<!-- <ul> -->
 @if(!$review_list->isEmpty())
 <?php $reviewc = 0; ?>
@forelse($review_list as $review_applicant) 
<li class="careerfy-column-12">
 
      <a href="#tab_6_1{{$review_applicant->id}}" data-toggle="tab">
 

                                            <div class="careerfy-candidate-default-wrap butt"> 
                                          <figure>
                                                <img src="/uploads/avatars/{{ $review_applicant->avatar }}" alt="">  
                                          </figure> 
                                                <div class="careerfy-candidate-default-text">
                                                    <div class="careerfy-candidate-default-left">
                                                        <h2>
                                                {{$review_applicant->candidates_name}} 

                                            <i class="careerfy-icon careerfy-check-mark"></i></h2>
                                                        <ul class="careerfy-column-12" >

                                                        <!-- to get work experience; get job_id from application table and resume_id, then goto workexperience table and find by resume_id and jpob_id  -->
                                                   
                                                 
                                                            <li>{{$review_applicant->city_id}} <span href="#" class="careerfy-candidate-default-studio"> {{$review_applicant->email}}</span></li>
                                                    
                                                        </ul>
                                                    </div>
                                              <!--       <a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a> -->
                                                </div>
                                            </div> </a>
                                        </li>

 <?php $reviewc++; ?>
@empty
@endforelse

@else
<li class="careerfy-column-12"> No Job(s) Found</li>
@endif
 