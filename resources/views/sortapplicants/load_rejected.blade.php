
<!-- <ul> -->
  @if(!$rejected_list->isEmpty())
 <?php $reviewcr = 0; ?>
@forelse($rejected_list as $rejected_applicant)
   
<li class="careerfy-column-12"> 
      <a href="#tab_6_1{{$rejected_applicant->id}} " data-toggle="tab"> 
                                            <div class="careerfy-candidate-default-wrap butt"> 
                                             
                                                <figure>
                                                <img src="/uploads/avatars/{{ $rejected_applicant->avatar }}" alt="">  
                                               
                                                </figure> 
                                                <div class="careerfy-candidate-default-text">
                                                    <div class="careerfy-candidate-default-left">
                                                        <h2>
                                           {{$rejected_applicant->candidates_name}} 
                            <i class="careerfy-icon careerfy-check-mark"></i></h2>
                                                        <ul class="careerfy-column-12" >

                                                        <!-- to get work experience; get job_id from application table and resume_id, then goto workexperience table and find by resume_id and jpob_id  -->
                                                   
                                              
                                                            <li>{{$rejected_applicant->city_id}}  <span href="#" class="careerfy-candidate-default-studio">{{$rejected_applicant->email}}</span></li>
                                                           
                                                        </ul>
                                                    </div>
                                              <!--       <a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a> -->
                                                </div>
                                            </div> </a>
                                        </li>

 <?php $reviewcr++; ?>
@empty
                                           <div class="careerfy-employer-confitmation">
<div align="center">   <img src="{{asset('img/NoRecordFound.png')}}" height="400" width="400" alt="" align="center"></div>
<div class="clearfix"></div>
</div>
@endforelse
 
 @else
<li class="careerfy-column-12"> No Job(s) Found</li>
 @endif
                     