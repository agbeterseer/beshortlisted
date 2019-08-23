         <div class="careerfy-column-8 careerfy-typo-wrap"  id="load" style="position: relative;">
                            <div class="careerfy-typo-wrap">
                                <!-- FilterAble -->
                                <div class="careerfy-filterable">
                                    <h2>Available results of jobs</h2>
                                    <ul>
                                        <li>
                                           <a href="{{route('list.job', 'job-list')}}"> <i class="careerfy-icon careerfy-sort"></i>Show all</a></li>
                                   
                                    </ul>
                                </div>
                                <!-- FilterAble -->
                                <!-- JobGrid -->
                                <div class="careerfy-job careerfy-joblisting-classic">
                                    <ul class="careerfy-row" id="job_section">
                                   
                                    
                                    @forelse($tags as $tag)
                                        <li class="careerfy-column-12">
                                            <div class="careerfy-joblisting-classic-wrap">
                                                <figure><a href="{{route('job.description', $tag->id)}}"><img src="{{asset('/img/job.png')}}" alt=""></a></figure>
                                                <div class="careerfy-joblisting-text">
                                                    <div class="careerfy-list-option">
                                                        <h2><a href="{{route('job.description', $tag->id)}}}"> {{$tag->job_title}} </a>
                                                    </h2>
                                                    <p></p>
                                                        <ul> 
                                                          
                                                            <li style="color: #F1630D";><i class="careerfy-icon careerfy-filter-tool-black-shape"></i>  
<strong>Apply Before:</strong> {{ date('M d, Y', strtotime($tag->end_date)) }}
                                                            </li>
                                                            <li > @foreach($industries as $industry) @if($tag->industry === $industry->id){{$industry->name}} @endif @endforeach</li>
                                                        </ul>
                                                    </div>

                                                    <div class="careerfy-job-userlist">
                                                    @foreach($employement_term_list as $employement_term) 
                                                    @if($employement_term->id === $tag->job_type)
                                 <a href="{{route('apply.job', $tag->id)}}" class="careerfy-option-btn  careerfy-blue">APPLY </a>
                                 @endif @endforeach
                                                        <!-- <a href="#" class="careerfy-job-like"><i class="fa fa-heart"></i></a> -->
                                                    </div>
                                                <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </li>
                                        @empty
                                      <li> 
<div class="careerfy-employer-confitmation">
<div align="center">   <img src="{{asset('img/NoRecordFound.png')}}" height="400" width="400" alt="" align="center"></div>
<div class="clearfix"></div>
</div> </li>
                                        @endforelse
                                       
                                    </ul>
                                </div>
                                <!-- Pagination --> 
                          
                                <div class="careerfy-pagination-blog" id="paginate">
                                    <ul class="page-numbers">
                                    {{ $tags->links() }}
                                     
                                    </ul>
                                </div>

                            </div>
                        </div>