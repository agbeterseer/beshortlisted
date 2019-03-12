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


        <!-- Main Content -->
        <div class="careerfy-main-content">
            
            <!-- Main Section -->
           
            <!-- Main Section -->
 <!-- Main Section -->
            <div class="careerfy-main-section" style="background-color: #ffffff;">
                <div class="container">
                    <div class="row">

                        <div class="careerfy-column-12">
                            <div class="careerfy-typo-wrap">
                                <!-- FilterAble -->
 
                                <!-- FilterAble -->
                                <!-- JobGrid -->
                                     <!-- Main Section -->
            <div class="" >
                <!-- <div class="container">
                    <div class="row"> -->
        <section class="careerfy-element-text" align="center">
        <h2>Industries</h2> 
        </section> 
   

                                      <div class="" style="background-color: #ffffff;">
                <div class="container">
                    <div class="row">
          <div class="col-md-12 careerfy-typo-wrap">
                 <div class="space">&nbsp;</div>
                  <div class="space">&nbsp;</div>
                          </div>
                        <div class="col-md-15 careerfy-typo-wrap ">
                            @foreach($industries as $industry)
                            <div class="col-md-4">
                                <li>@foreach($job_function_count as $function_count) @if($function_count->job_category === $industry->id) <span style="font-weight: bold;"> ({{ $function_count->total}}) </span> 
                                          @endif  @endforeach <a href="{{route('job_opening', $industry->id)}}"> {{$industry->name}} </a>
                                </li>
                            </div>
                            @endforeach
 
                        </div>
                    <div class="space">&nbsp;</div>
                    <div class="space">&nbsp;</div>
                    <div class="space">&nbsp;</div>
                    <div class="space">&nbsp;</div>
                    </div>
                </div>
            </div>

              <!--       </div>
                </div> -->
            </div>


                             <div class="space">&nbsp;</div>
                    <div class="space">&nbsp;</div>
                
                                <!-- Pagination -->
                       
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Main Section -->

@endsection