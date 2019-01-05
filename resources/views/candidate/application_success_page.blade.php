@extends('layouts.jobboard', [
  'page_header' => 'Candidates',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' => 'active'
])

@section('content')
@include('partials.employee_breadcomb')
    <div class="careerfy-wrapper">
        <!-- Header -->
       
        <!-- Header -->
        
        <!-- SubHeader -->
 
        <!-- SubHeader -->

        <!-- Main Content -->
        <div class="careerfy-main-content">
            
            <!-- Main Section -->
            <div class="careerfy-main-section careerfy-dashboard-fulltwo">
                <div class="container">
                    <div class="row"> 
                        <div class="careerfy-column-12">
                            <div class="careerfy-typo-wrap">
                                <div class="careerfy-employer-dasboard">
                                    <div class="careerfy-employer-box-section">
                                        <!-- Profile Title -->
                                      <nav class="careerfy-employer-jobnav">
                                            <ul>
                                      
                                 <li class="active"><a href=""><i class="careerfy-icon careerfy-checked"></i> <span>Application Successfull</span></a></li>
                                            </ul>
                                        </nav>
                                        <!-- Confitmation -->
                                        <div class="careerfy-employer-confitmation">
                                            <img src="images/employer-confirmation-icon.png" alt="">
                                            <h2>Thank you for submitting your application</h2>
                                             Please note: Only shortlisted candidates will be contacted 
                                            <div class="clearfix"></div>
                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
              <div class="careerfy-section-title"><h2>Other jobs you may like</h2></div>
                                <div class="careerfy-job careerfy-joblisting-classic careerfy-jobdetail-joblisting">
                                      <ul class="careerfy-row">
                                       @foreach($get_Job_by_common_industries as $common_job)                             
                                        <li class="careerfy-column-12">
                                            <div class="careerfy-joblisting-classic-wrap">
                                                <figure><a href="#"><img src="img/extra-images/job-listing-logo-1.png" alt=""></a></figure>
                                                <div class="careerfy-joblisting-text">
                                                    <div class="careerfy-list-option">
                                                        <h2><a href="#"> {{$common_job->job_title}}</a> <span>Featured</span></h2>
                                                        <ul>
                                                            <li><a href="#">@ Massimo Artemisis</a></li>
                                                            <li><i class="careerfy-icon careerfy-maps-and-flags"></i>{{$common_job->country}}, {{$common_job->city}}</li>
                                                            <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> @foreach($industry_professions as $profession) @if($profession->id === $common_job->job_category){{$profession->name}} @endif @endforeach </li>
                                                        </ul>
                                                    </div>
                                                    <div class="careerfy-job-userlist">
                                                    @foreach($employement_terms as $employement)
                                                    @if($employement->id === $common_job->job_type)
                                                        <a href="#" class="careerfy-option-btn careerfy-{{$employement->category}}">Freelance</a>
                                                        @endif
                                                        @endforeach
                                                        <a href="#" class="careerfy-job-like"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                               </ul>
                          </div>
                    </div>
                </div>
            </div>
            <!-- Main Section -->

        </div>
        <!-- Main Content -->
        
        <!-- Footer -->
           <!-- Footer -->

    </div>
    <!-- Wrapper -->
@endsection