
@extends('layouts.jobboard', [
  'page_header' => 'Employer',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'employer' => 'active'
])

@section('content')
@include('partials.employer_sub_menu') 

        <div class="careerfy-main-content" >
            
            <!-- Main Section -->
            <div class="careerfy-main-section careerfy-dashboard-fulltwo" >
                <div class="container">
                    <div class="row">

                        <aside class="careerfy-column-3" >
                            <div class="careerfy-typo-wrap"> 
                                <div class="careerfy-employer-dashboard-nav"  style="background-color: #ffffff;">
                                    <figure>
                                        <a href="#" class="employer-dashboard-thumb"><img src="extra-images/employer-dashboard-1.png" alt=""></a>
                                        <figcaption>
                                            <div class="careerfy-fileUpload">
                                                <span><i class="careerfy-icon careerfy-add"></i> Upload Photo</span>
                                                <input type="file" class="careerfy-upload" />
                                            </div>
                                            <h2>Graveholdings</h2>
                                        </figcaption>
                                    </figure>
                                    <ul>
                                        <li class="active"><a href="employer-dashboard-profile-seting.html"><i class="careerfy-icon careerfy-user"></i> Company Profile</a></li>
                                        <li><a href="#employer-dashboard-manage-jobs.html"><i class="careerfy-icon careerfy-briefcase-1"></i> Manage Jobs</a></li>
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
                        <div class="careerfy-column-9" >
                            <div class="careerfy-typo-wrap">
                              <form class="careerfy-employer-dasboard" action="{{route('employer.store')}}" method="POST">
     {{ csrf_field() }}
                                    <div class="careerfy-employer-box-section" style="background-color: #ffffff;">
                                        <div class="careerfy-profile-title"><h2>Welcome Graveholdings</h2></div>
                                        <ul class="careerfy-row careerfy-employer-profile-form">
                                            <li class="careerfy-column-6">
                                                <label>Company Name *</label>
                                                <input name="name"  type="text" required="required">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Email *</label>
                                                <input name="email"  type="email" required="required">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Phone *</label>
                                                <input name="" required="required" type="number">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Website</label>
                                                <input value="http://themeforest.net" onblur="if(this.value == '') { this.value ='http://themeforest.net'; }" onfocus="if(this.value =='http://themeforest.net') { this.value = ''; }" type="text">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Category</label>
                                                <div class="careerfy-profile-select">
                                                    <select>
                                                        <option>Accountancy</option>
                                                        <option>Accountancy</option>
                                                    </select>
                                                </div>
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Founded Date *</label>
                                                <input value="10/10/2008" onblur="if(this.value == '') { this.value ='10/10/2008'; }" onfocus="if(this.value =='10/10/2008') { this.value = ''; }" type="text">
                                            </li>
                                            <li class="careerfy-column-12">
                                                <label>Description *</label>
                                                <textarea>Nulla bibendum commodo rhoncus. Sed mattis magna nunc, ac varius quam pharetra vitae. Praesent vitae ipsum eu magna pretium aliquam. Curabitur interdum quis velit non tincidunt. Donec pretium gravida erat, a faucibus velit egestas eget. Nulla bibendum commodo rhoncus. Sed mattis magna nunc, ac varius quam itae ipsum eu magna pretium aliquam. Curabitur interdum quis velit non tincidunt. Donec pretium gravida erat, a faucibus velit egestas eget.</textarea>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="careerfy-employer-box-section" style="background-color: #ffffff;">
                                        <div class="careerfy-profile-title"><h2>Address / Location</h2></div>
                                        <ul class="careerfy-row careerfy-employer-profile-form">
                                            <li class="careerfy-column-6">
                                                <label>Country *</label>
                                                <div class="careerfy-profile-select">
                                                    <select>
                                                        <option>United Kingdom</option>
                                                        <option>United Kingdom</option>
                                                    </select>
                                                </div>
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Region *</label>
                                                <div class="careerfy-profile-select">
                                                    <select>
                                                        <option>London</option>
                                                        <option>London</option>
                                                    </select>
                                                </div>
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>City / Town *</label>
                                                <div class="careerfy-profile-select">
                                                    <select>
                                                        <option>London</option>
                                                        <option>London</option>
                                                    </select>
                                                </div>
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Postcode *</label>
                                                <input value="746000" onblur="if(this.value == '') { this.value ='746000'; }" onfocus="if(this.value =='746000') { this.value = ''; }" type="text">
                                            </li>
                                            <li class="careerfy-column-10">
                                                <label>Full Address *</label>
                                                <input value="Ha Dong - Ha Noi - Viet Nam" onblur="if(this.value == '') { this.value ='Ha Dong - Ha Noi - Viet Nam'; }" onfocus="if(this.value =='Ha Dong - Ha Noi - Viet Nam') { this.value = ''; }" type="text">
                                            </li>
                                            <li class="careerfy-column-2">
                                                <button class="careerfy-findmap-btn">Find on Map</button>
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Latitude</label>
                                                <input value="51.4935825" onblur="if(this.value == '') { this.value ='51.4935825'; }" onfocus="if(this.value =='51.4935825') { this.value = ''; }" type="text">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Longitude</label>
                                                <input value="-0.16803379999998924" onblur="if(this.value == '') { this.value ='-0.16803379999998924'; }" onfocus="if(this.value =='-0.16803379999998924') { this.value = ''; }" type="text">
                                            </li>
                                            <li class="careerfy-column-12">
                                                <div class="careerfy-profile-map"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d22589232.038285658!2d-103.9763543971716!3d46.28054447273778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1507595834401"></iframe></div>
                                                <span class="careerfy-short-message">For the precise location, you can drag and drop the pin.</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="careerfy-employer-box-section" style="background-color: #ffffff;">
                                        <div class="careerfy-profile-title"><h2>Company Social</h2></div>
                                        <ul class="careerfy-row careerfy-employer-profile-form">
                                            <li class="careerfy-column-6">
                                                <label>Facebook</label>
                                                <input value="https://facebook.com/" onblur="if(this.value == '') { this.value ='https://facebook.com/'; }" onfocus="if(this.value =='https://facebook.com/') { this.value = ''; }" type="text">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Twitter</label>
                                                <input value="https://twiiter.com/" onblur="if(this.value == '') { this.value ='https://twiiter.com/'; }" onfocus="if(this.value =='https://twiiter.com/') { this.value = ''; }" type="text">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Google Plus</label>
                                                <input value="https://google-plus.com/" onblur="if(this.value == '') { this.value ='https://google-plus.com/'; }" onfocus="if(this.value =='https://google-plus.com/') { this.value = ''; }" type="text">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Youtube</label>
                                                <input value="https://youtube.com/" onblur="if(this.value == '') { this.value ='https://youtube.com/'; }" onfocus="if(this.value =='https://youtube.com/') { this.value = ''; }" type="text">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Vimeo</label>
                                                <input value="https://vimeo.com/" onblur="if(this.value == '') { this.value ='https://vimeo.com/'; }" onfocus="if(this.value =='https://vimeo.com/') { this.value = ''; }" type="text">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Linkedin</label>
                                                <input value="https://linkedin.com/" onblur="if(this.value == '') { this.value ='https://linkedin.com/'; }" onfocus="if(this.value =='https://linkedin.com/') { this.value = ''; }" type="text">
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="careerfy-employer-box-section" style="background-color: #ffffff;">
                                        <div class="careerfy-profile-title"><h2>Comapany Photos</h2></div>
                                        <div class="careerfy-company-photo">
                                            <img src="images/employer-profile-nonphoto.png" alt="">
                                            <h2>Drag & Drop Photos here to upload</h2>
                                            <small>You can upload up to 5 images under your profile</small>
                                            <div class="careerfy-fileUpload">
                                                <span><i class="careerfy-icon careerfy-upload"></i> Upload Images</span>
                                                <input type="file" class="careerfy-upload" />
                                            </div>
                                        </div>
                                        <div class="careerfy-company-gallery none-element">
                                            <ul class="careerfy-row">
                                                <li class="careerfy-column-3">
                                                    <figure>
                                                        <a href="#"><img src="extra-images/employer-company-photo-1.jpg" alt=""></a>
                                                        <figcaption>
                                                            <span>Peca8 World</span>
                                                            <div class="careerfy-company-links">
                                                                <a href="#" class="careerfy-icon careerfy-edit"></a>
                                                                <a href="#" class="careerfy-icon careerfy-rubbish"></a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                                <li class="careerfy-column-3">
                                                    <figure>
                                                        <a href="#"><img src="extra-images/employer-company-photo-1.jpg" alt=""></a>
                                                        <figcaption>
                                                            <span>Peca8 World</span>
                                                            <div class="careerfy-company-links">
                                                                <a href="#" class="careerfy-icon careerfy-edit"></a>
                                                                <a href="#" class="careerfy-icon careerfy-rubbish"></a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                                <li class="careerfy-column-3">
                                                    <figure>
                                                        <a href="#"><img src="extra-images/employer-company-photo-1.jpg" alt=""></a>
                                                        <figcaption>
                                                            <span>Peca8 World</span>
                                                            <div class="careerfy-company-links">
                                                                <a href="#" class="careerfy-icon careerfy-edit"></a>
                                                                <a href="#" class="careerfy-icon careerfy-rubbish"></a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                                <li class="careerfy-column-3">
                                                    <figure>
                                                        <a href="#"><img src="extra-images/employer-company-photo-1.jpg" alt=""></a>
                                                        <figcaption>
                                                            <span>Peca8 World</span>
                                                            <div class="careerfy-company-links">
                                                                <a href="#" class="careerfy-icon careerfy-edit"></a>
                                                                <a href="#" class="careerfy-icon careerfy-rubbish"></a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                                <li class="careerfy-column-3">
                                                    <figure>
                                                        <a href="#"><img src="extra-images/employer-company-photo-1.jpg" alt=""></a>
                                                        <figcaption>
                                                            <span>Peca8 World</span>
                                                            <div class="careerfy-company-links">
                                                                <a href="#" class="careerfy-icon careerfy-edit"></a>
                                                                <a href="#" class="careerfy-icon careerfy-rubbish"></a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <input type="submit" class="careerfy-employer-profile-submit" value="Save Setting">
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Main Section -->

        </div>
        <!-- Main Content --> 
        @endsection