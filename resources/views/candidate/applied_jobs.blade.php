        
@extends('layouts.jobboard', [
  'page_header' => 'Candidates',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' => '',
  'resume_' => 'active'
])

@section('content')
        <!-- Main Content -->
        @include('partials.employee_breadcomb')
        <div class="careerfy-main-content">
            
            <!-- Main Section -->
            <div class="careerfy-main-section careerfy-dashboard-full">
                <div class="container">
                    <div class="row">

                      @include('partials.job_board_sidebar')
                                       <div class="careerfy-column-9">
                            <div class="careerfy-typo-wrap">
                                <div class="careerfy-employer-box-section" style="background-color: #ffffff;">
                                    <div class="careerfy-profile-title">
                                        <h2>Saved Jobs</h2>
                       <!--                  <form class="careerfy-employer-search">
                                            <input value="Search orders" onblur="if(this.value == '') { this.value ='Search orders'; }" onfocus="if(this.value =='Search orders') { this.value = ''; }" type="text">
                                            <input value="" type="submit">
                                            <i class="careerfy-icon careerfy-search"></i>
                                        </form> -->
                                    </div>
                                    <div class="careerfy-candidate-savedjobs">
                                        <div class="careerfy-candidate-savedjobs-wrap">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Job Title</th>
                                                        <th>Company</th>
                                                        <th>Date Applied</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($job_applied_by_candidate as $job_applied)
 
                                                    <tr>
                                                        <td>
                                        <a href="#" class="careerfy-savedjobs-thumb">
                                        <img src="{{asset('img/candidate-saved-jobs-thumb.png')}}" alt=""></a>
                                                       <a href="{{route('job.description', $job_applied->id)}}">   {{$job_applied->job_title}} </a>
                                                        </td>
                                                        <td><span> {{$job_applied->email_address}} </span></td>
                                                        <td>{{ date('M d, Y', strtotime($job_applied->created_at)) }}</td>
                                                        <td>
                                                            <a href="#" class="careerfy-savedjobs-links"><i class="careerfy-icon careerfy-rubbish"></i></a>
                                                            <a href="#" class="careerfy-savedjobs-links"><i class="careerfy-icon careerfy-view"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- Pagination -->
                                    {{ $job_applied_by_candidate->appends(['s' => $s])->links() }}



                                </div>
                            </div>
                        </div>
         
                    </div>
                </div>
            </div>
            <!-- Main Section -->

        </div>
        <!-- Main Content -->

        @endsection