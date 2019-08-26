
 
 <?php $countme = 0; ?>
 @if(!$List_applicants_by_job_id->isEmpty())
@forelse($List_applicants_by_job_id as $List_applicant)
   
<li class="careerfy-column-12">
 
 <a href="#tab_6_1{{$List_applicant->id}}" data-toggle="tab">
                                          

                                            <div class="careerfy-candidate-default-wrap butt"> 
                                                <figure> 
                                              <img src="/uploads/avatars/{{ $List_applicant->avatar }}" alt="">
                                              </figure>
                                                <div class="careerfy-candidate-default-text">
                                                    <div class="careerfy-candidate-default-left">
                                                        <h2>
                                                         {{$List_applicant->candidates_name}}  <i class="careerfy-icon careerfy-check-mark"></i></h2>
                                                        <ul class="careerfy-column-12" >

                                                        <!-- to get work experience; get job_id from application table and resume_id, then goto workexperience table and find by resume_id and jpob_id  -->
                                                              
                                                            <li>{{$List_applicant->city_id}} <span href="#" class="careerfy-candidate-default-studio">{{$List_applicant->email}}</span></li>
                                                   
                                                        </ul>
                                                    </div>
                                              <!--       <a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a> -->
                                                </div>
                                            </div>

                                             </a>
                                        </li>


 <?php $countme++; ?>
@empty

@endforelse
@else
<li class="careerfy-column-12"> No Job(s) Found</li>
 
@endif

                             <div class="careerfy-pagination-blog">
                                    <ul class="pagination">
                         {{ $List_applicants_by_job_id->links() }}
                                    </ul>
                                </div>


 