
     <aside class="careerfy-column-3 page"  style="background-color: #FFFFFF;">
                            <div class="careerfy-typo-wrap">
                                <div class="careerfy-employer-dashboard-nav">
                                    <figure>
                                    <div class="resume_pic_outer">
<div class="resume_pic">
<img src="{{asset('/img/terseer.jpg')}}" alt="Picture" class="employer-dashboard-thumb">
<p class="editov2"><a class="edits" ><i class="icon-plus"></i>Edit</a></p>
</div>
</div>
              <!--     <a href="#" class="employer-dashboard-thumb"><img src="extra-images/candidate-dashboard-navthumb.jpg" alt=""></a>
              <figcaption>
              <div class="careerfy-fileUpload">
              <span><i class="careerfy-icon careerfy-add"></i> Upload Photo</span>
              <input type="file" class="careerfy-upload" />
              </div>
              @if(Auth::user())
              <h2> {{Auth::user()->name}}</h2>
              <span class="careerfy-dashboard-subtitle">UI/UX Designer</span>
              @endif
              </figcaption> job.details-->
                                    </figure> 
                                             <ul>
                                        <li class="{{$profile}}" ><a href="{{route('employer.show', Auth::user()->id)}}"><i class="careerfy-icon careerfy-user"></i> Company Profile</a></li>
                                        <li class="{{$manage_jobs}}"><a href="{{route('manage.jobs')}}"><i class="careerfy-icon careerfy-briefcase-1"></i> Manage Jobs</a></li>
                                        <li><a href="employer-dashboard-transactions.html"><i class="careerfy-icon careerfy-salary"></i> Transactions</a></li>
                                        <li><a href="employer-dashboard-resumes.html"><i class="careerfy-icon careerfy-heart"></i> Shortlisted Resumes</a></li>
                                        <li><a href="employer-dashboard-packages.html"><i class="careerfy-icon careerfy-credit-card-1"></i> Packages</a></li>
                                        <li><a href="employer-dashboard-newjob.html"><i class="careerfy-icon careerfy-plus"></i> Post a New Job</a></li>
                                        <li><a href="employer-dashboard-manage-jobs.html"><i class="careerfy-icon careerfy-alarm"></i> Job Alerts</a></li>
                                        <li><a href="candidate-dashboard-changed-password.html"><i class="careerfy-icon careerfy-multimedia"></i> Change Password</a></li>
                                        <li><a href="index.html"><i class="careerfy-icon careerfy-logout"></i> Logout</a></li>
                                    </ul>
 
                                   
                                </div>
                            </div>
                        </aside>
 
             






