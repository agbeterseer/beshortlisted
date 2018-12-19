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

  <!-- SubHeader -->
        <div class="careerfy-subheader">
            <span class="careerfy-banner-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="careerfy-page-title">
                            <h1>Current Industries</h1>
                            <!-- <p>Yes! You make or may not find the right job for you, but that’s ok.</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SubHeader -->

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
                    <!--             <div class="careerfy-filterable">
                                    <h2>Showing 0-12 of 37 results</h2>
                                    <ul>
                                        <li>
                                            <i class="careerfy-icon careerfy-sort"></i>
                                            <div class="careerfy-filterable-select">
                                                <select>
                                                    <option>Sort</option>
                                                    <option>Sort</option>
                                                    <option>Sort</option>
                                                </select>
                                            </div>
                                        </li>
                                        <li><a href="#"><i class="careerfy-icon careerfy-squares"></i> Grid</a></li>
                                        <li><a href="#"><i class="careerfy-icon careerfy-list"></i> List</a></li>
                                    </ul>
                                </div> -->
                                <!-- FilterAble -->
                                <!-- JobGrid -->
                                     <!-- Main Section -->
            <div class="" >
                <!-- <div class="container">
                    <div class="row"> -->
        <section class="careerfy-element-text" align="center">
        <h2>Industries</h2> 
        </section> 
          <div class="col-md-12 careerfy-typo-wrap">
            
                          <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Industry</th>
        <th>#</th>
      </tr>
    </thead>
    <tbody>
    <?php $count = 0; ?>

  @forelse($industries as $key => $industry)
        <tr>
        <td width="25%">{{$count}}</td>
        <td width="50%"> <i class="careerfy-icon careerfy-filter-tool-black-shape"></i>{{$industry->name}} </td>
        <td width="25%"># </td>
      </tr>
      <?php  $count++; ?>
        @empty
     @endforelse
  
 
    </tbody>
  </table>
        <div class="space">&nbsp;</div>
        <div class="space">&nbsp;</div>
                          </div> 

              <!--       </div>
                </div> -->
            </div>


                             <div class="space">&nbsp;</div>
                    <div class="space">&nbsp;</div>
                
                                <!-- Pagination -->
                                <div class="careerfy-pagination-blog">
                            <ul class="page-numbers">
                           
                             {{ $industries->appends(['s' => $s])->links() }}
                             
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Main Section -->

@endsection