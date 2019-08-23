@extends('layouts.jobslayout', [
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
 
<style type="text/css"> 
    .scroll_div{
    overflow:scroll;
    overflow-x:hidden;
    overflow-y:scroll;
    height:200px;
    }
    .mini_header{
border-color: white !important;

    }
    
</style>
  <!-- SubHeader -->
 
@include('partials.employee_breadcomb') 
 
        <div class="space">&nbsp;</div> 
        <div class="space">&nbsp;</div>  
        <div class="space">&nbsp;</div> 
        <div class="space">&nbsp;</div>        
        <!-- SubHeader -->
 
        <!-- Main Content -->
        <div id="app">
        <div class="careerfy-main-content">

            <!-- Main Section -->
            <div class="space">&nbsp;</div>  

            <div class="careerfy-main-section careerfy-subheader-form-full"> 
                <div class="container"> 
                    <div class="row"> 
                        <div class="col-md-12 careerfy-typo-wrap">
                            <!-- Sub Header Form --> 
                            <div class="careerfy-subheader-form"> 
                            <searchbar></searchbar>
                             <!-- <listjobs></listjobs>  -->
                            </div>   
                            <!-- Sub Header Form -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- Main Section -->
 <!-- Main Section -->
 
          
 <jobfilter></jobfilter>

         </div>   
  </div>

            <!-- Main Section -->
@endsection
