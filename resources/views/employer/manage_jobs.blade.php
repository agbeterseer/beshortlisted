

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
  'job_post' => 'active',
  'profile' => '',
  'shortlisted' => '',
  'transaction' => '',
  'package' => '',
])


@section('content')

                            <div class="careerfy-typo-wrap">
                                <div class="careerfy-employer-dasboard">
                                    <div class="careerfy-employer-box-section">
                                        <!-- Profile Title -->
                 
                                        <div class="careerfy-profile-title">
                                            <h2>Manage Jobs</h2>
                                            <form class="careerfy-employer-search">
                                                <input value="Search orders" onblur="if(this.value == '') { this.value ='Search orders'; }" onfocus="if(this.value =='Search orders') { this.value = ''; }" type="text">
                                                <input type="submit" value="">
                                                <i class="careerfy-icon careerfy-search"></i>
                                            </form>
                                        </div>
                                        <!-- Manage Jobs -->
                                        <div class="careerfy-managejobs-list-wrap">
                                            <div class="careerfy-managejobs-list">
                                                <!-- Manage Jobs Header -->
                                                <div class="careerfy-table-layer careerfy-managejobs-thead">
                                                    <div class="careerfy-table-row">
                                                        <div class="careerfy-table-cell">Job Title</div>
                                                        <div class="careerfy-table-cell">Applications</div>
                                                        <div class="careerfy-table-cell">Featured</div>
                                                        <div class="careerfy-table-cell">Status</div>
                                                        <div class="careerfy-table-cell"></div>
                                                    </div>
                                                </div>
                                                <!-- Manage Jobs Body -->

                                                     @foreach($tags as $tag)
                                                     @if($tag->status === 0)
                                               <div class="careerfy-table-layer careerfy-managejobs-tbody">
                                           
                                                    <div class="careerfy-table-row">
                                                        <div class="careerfy-table-cell">
                                                            <h6><a href="">{{$tag->job_title}}</a></h6>
                                                            <ul>
                                                                <li><i class="careerfy-icon careerfy-calendar"></i> Created: <span>{{ date('M d, Y', strtotime($tag->created_at)) }}</span></li>
                                                                <li><i class="careerfy-icon careerfy-calendar"></i> Expiry: <span>{{ date('M d, Y', strtotime($tag->end_date)) }}</span></li>
                                                                <li><i class="careerfy-icon careerfy-maps-and-flags"></i> {{$tag->country}}, </li>
                                                                <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> <a href="#">{{$tag->job_category}}</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="careerfy-table-cell"><a href="#" class="careerfy-managejobs-appli">@foreach($group_application as $group_) @if($tag->id == $group_->tag_id) {{$group_->total}} @endif @endforeach Application(s)</a></div>
                                                        <div class="careerfy-table-cell"><i class="fa fa-star-o"></i></div>
                                                        <div class="careerfy-table-cell"><span class="careerfy-managejobs-option">@if($tag->status === 0) Pending @elseif($tag->status === 1) Active  @elseif($tag->status === 2) Expired @endif</span></div>
                                                        <div class="careerfy-table-cell">
                                                            <div class="careerfy-managejobs-links">
                                                        <a href="" class="careerfy-icon careerfy-view"></a>
                                                        <a href="{{route('edit.jobpost', $tag->id)}}" class="careerfy-icon careerfy-edit"></a>
                                                        <a href="{{route('change.status', $tag->id)}}" class="careerfy-icon careerfy-rubbish"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                                @endif
                                                 @endforeach
                                          
                                                <!-- Manage Jobs Body -->
                                            </div>
                                        </div>
                                        <!-- Pagination -->
                                        <div class="careerfy-pagination-blog">
                                            <ul class="page-numbers">
                                             {{ $tags->appends(['s' => $s])->links() }}
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        
                 
        @endsection