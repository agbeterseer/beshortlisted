@extends('layouts.employer_layout', [
  'page_header' => 'Employer',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'employer' => '',
  'profile' => '',
  'manage_jobs' => '',
  'job_post' => '',
  'profile' => '',
  'shortlisted' => '',
  'transaction' => '',
  'package' => 'active',
])

@section('content')
 
                            <div class="careerfy-typo-wrap"> 
                                <div class="careerfy-employer-dasboard" style="background-color: #ffffff;">
                                    <div class="careerfy-employer-box-section">
                                        <!-- Profile Title -->
                                        <div class="careerfy-profile-title">
                                            <h2>Packages</h2>
                                            <form class="careerfy-employer-search">
                                                <input value="Search orders" onblur="if(this.value == '') { this.value ='Search orders'; }" onfocus="if(this.value =='Search orders') { this.value = ''; }" type="text">
                                                <input type="submit" value="">
                                                <i class="careerfy-icon careerfy-search"></i>
                                            </form>
                                        </div>
                                        <!-- Transactions -->
                                        <div class="careerfy-employer-packages-wrap">
                                            <div class="careerfy-employer-packages">
                                                <div class="careerfy-table-layer careerfy-packages-thead">
                                                    <div class="careerfy-table-row">
                                                        <div class="careerfy-table-cell"> ID</div>
                                                        <div class="careerfy-table-cell">Package</div>
                                                        <div class="careerfy-table-cell">Total Jobs/CVs</div>
                                                        <div class="careerfy-table-cell">Used</div>
                                                        <div class="careerfy-table-cell">Remaining</div>
                                                        <!-- <div class="careerfy-table-cell">Job Duration</div> -->
                                                        <div class="careerfy-table-cell">Satus</div>
                                                    </div>
                                                </div>
                                                @foreach($employer_packages as $employer_package)
                                                <div class="careerfy-table-layer careerfy-packages-tbody">
                                                    <div class="careerfy-table-row">
                                                        <div class="careerfy-table-cell">{{$employer_package->id}}</div>
                                                        <div class="careerfy-table-cell"><span>{{$employer_package->package_id}}</span></div>
                                                        <div class="careerfy-table-cell">{{$employer_package->units}}</div>
                                                        <div class="careerfy-table-cell">{{$employer_package->jobs_remaining}}</div>
                                                        <div class="careerfy-table-cell"> {{$employer_package->units}}</div>
                                                        <!-- <div class="careerfy-table-cell">30 days</div> -->
                                                        <div class="careerfy-table-cell">@if($employer_package->status === 1) <i class="fa fa-circle"></i> Active @else <i class="fa fa-circle careerfy-packages-pending"></i> in-Active  @endif </div>
                                                    </div>
                                                </div>
                                                @endforeach
                             
                                            </div>
                                        </div>
                                        <!-- Pagination -->
                                        <!-- <div class="careerfy-pagination-blog">
                                            <ul class="page-numbers">
                                                <li><a class="prev page-numbers" href="#"><span><i class="careerfy-icon careerfy-arrows4"></i></span></a></li>
                                                <li><span class="page-numbers current">01</span></li>
                                                <li><a class="page-numbers" href="#">02</a></li>
                                                <li><a class="page-numbers" href="#">03</a></li>
                                                <li><a class="page-numbers" href="#">04</a></li>
                                                <li><a class="next page-numbers" href="#"><span><i class="careerfy-icon careerfy-arrows4"></i></span></a></li>
                                            </ul>
                                        </div> -->

                                    </div>
                                </div>
                            </div>
                 


@endsection