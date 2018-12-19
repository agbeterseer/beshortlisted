@extends('layouts.admin', [
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



  <div class="dashboard-block">
    <div class="row">
      <div class="col-md-7">
        <div class="row">
 
          <div class="col-md-6">
            <div class="small-box bg-green">
              <div class="inner">
                <h3> </h3>
                <p>All Active Candidates</p>
              </div>
              <div class="icon">
                <i class="fa fa-question-circle-o"></i>
              </div>
              <a href="{{url('/admin/candidate/active-candidate')}}" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
   
            <!-- All Delete Button -->
            <div id="AllDeleteModal" class="delete-modal modal fade" role="dialog">
              <!-- All Delete Modal -->
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="delete-icon"></div>
                  </div>
                  <div class="modal-body text-center">
                    <h4 class="modal-heading">Are You Sure ?</h4>
                    <p>Do you really want to delete "All these records"? This process cannot be undone.</p>
                  </div>
                  <div class="modal-footer">
             <!--All Ansers Destroy removed -->
                  </div>
                </div>
              </div>
            </div>
          </div>



        </div>
      </div>
 
    </div>
  </div>


  <div class="row">
    @if ($user_info)
      @foreach ($user_info as $key => $candidate)
        <div class="col-md-4">
          <div class="quiz-card">
            <h3 class="quiz-name">Job Code : {{ $candidate->job_code}}</h3> 
            <p title="{{$candidate->job_code}}">
             
            </p>
            <div class="row">
              <div class="col-xs-6 pad-0">
                <ul class="topic-detail">
       
                
                  <li>Total Candidates <i class="fa fa-long-arrow-right"></i></li>
                  <li>Total Time <i class="fa fa-long-arrow-right"></i></li>
                </ul>
              </div>
              <div class="col-xs-6">
                <ul class="topic-detail right">
                  
                  <li>
                    @php
                        $qu_count = 0;
                    @endphp
                  {{$qu_count}}
                        @php 
                          $qu_count++;
                        @endphp
           
                  </li>
                  <li>
                    {{$candidate->total}}
                  </li>
                  <li>
                    {{$candidate->job_code}} minutes
                  </li>
                </ul>
              </div>
            </div>
            <a href="{{url('/admin/candidate/verified', $candidate->job_code)}}" class="btn btn-wave">Show Candidates</a>
          </div>
        </div>
      @endforeach
    @endif
  </div>


@endsection
