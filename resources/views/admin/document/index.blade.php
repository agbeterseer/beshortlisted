 <!DOCTYPE html>
<html lang="en">
<head>
    <title>Job Board</title>
    <!-- Css -->
        @include('partials.job_board_header')
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<script>
 window.Laravel = <?php echo json_encode([
 'csrfToken' => csrf_token(),
 ]); ?>
</script>
    <!-- Wrapper -->
    <div class="careerfy-wrapper">
        <!-- Header -->
@include('partials.employer_menu')
        <!-- Header -->     
        <!-- Banner -->
        <!-- Banner -->
        <!-- Main Content -->
        <div class="careerfy-main-content" style="margin-top: -50px;">
    
 
<style type="text/css">
    .scroll_div{
    overflow:scroll;
    overflow-x:hidden;
    overflow-y:scroll;
    height:200px;
    }

</style>

  <!-- SubHeader -->
        <div class="careerfy-subheader careerfy-subheader-without-bg">
  
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="careerfy-page-title">
                            <h1>Jobs For Good Programmers</h1>
                            <p>Yes! You make or may not find the right job for you, but that’s ok.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SubHeader -->

        <!-- Main Content -->
        <div class="careerfy-main-content">
            
            <!-- Main Section -->
            <div class="careerfy-main-section careerfy-subheader-form-full">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 careerfy-typo-wrap">
                    
                            <div class="careerfy-subheader-form">
                                <form class="careerfy-banner-search" action="{{route('job.title')}}" method="POST">
                                   {{ csrf_field() }}
                                    <ul>
                                        <li>
                                            <input placeholder="Job Title, Keywords" onblur="if(this.value == '') { this.value ='Job Title, Keywords'; }" onfocus="if(this.value =='Job Title, Keywords') { this.value = ''; }" type="text" name="job_title">
                                        </li>
                                        <li>
                                            <input placeholder="City, State" onblur="if(this.value == '') { this.value ='City, State or ZIP'; }" onfocus="if(this.value =='City, State') { this.value = ''; }" type="text" name="candidate_city">
                                            <i class="careerfy-icon careerfy-location"></i>
                                        </li>
                                        <li>
                                            <div class="careerfy-select-style" >
                                                <select>
                                                    <option>Categories</option>
                                                    <option>Categories</option>
                                                    <option> <a href="{{url('/employer/candidates-listing')}}"> All</a></option>
                                                </select>
                                            </div>
                                        </li>
                                        <li class="careerfy-banner-submit"> <input type="submit" value=""> <i class="careerfy-icon careerfy-search"></i> </li>
                                    </ul>
                                </form>
                            </div>
                            <!-- Sub Header Form -->
                        </div>       

                    </div>
                </div>
            </div>
            <!-- Main Section -->

        <!-- SubHeader -->
 
        <!-- SubHeader -->
   
   <!-- Main Section -->

     <div class="careerfy-main-section">
                <div class="container">
                    <div class="row">
                        
         <aside class="careerfy-column-4">
 
                            <div class="careerfy-typo-wrap">
                                <form class="careerfy-search-filter">
                          <!--           <div class="careerfy-search-filter-wrap careerfy-without-toggle">
                                        <h2><a href="#">Top Employer</a></h2>
                                        <div class="careerfy-search-box">
                                            <input value="Search" onblur="if(this.value == '') { this.value ='Search'; }" onfocus="if(this.value =='Search') { this.value = ''; }" type="text">
                                            <input type="submit" value="">
                                            <i class="careerfy-icon careerfy-search"></i>
                                        </div>
                                        <div class="careerfy-location-box">
                                            <input value="All Locaions" onblur="if(this.value == '') { this.value ='All Locaions'; }" onfocus="if(this.value =='All Locaions') { this.value = ''; }" type="text">
                                            <i class="careerfy-icon careerfy-location"></i>
                                        </div>
                                    </div> -->
                                    <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Gender</a></h2>
                                        <div class="careerfy-checkbox-toggle">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="radio" id="g1" name="gender" value="Male" />
                                                    <label for="g1"><span></span>Male</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="g2"  name="gender" value="Female" />
                                                    <label for="g2"><span></span> Female</label>
                                                </li>
                                              
                                            </ul>
                                        </div>
                                    </div>
                          
                              <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Job Function</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div">
                                            <ul class="careerfy-checkbox">
                                               @foreach($professions as $profession)
                                                <li>
                                                    <input type="radio" id="r_{{$profession->id}}" name="profession" value="{{$profession->id}}" />
                                                    <label for="r_{{$profession->id}}"><span></span>{{$profession->name}}</label>
                                                    <small>10</small>
                                                </li>
                                                @endforeach 
                                            </ul>
                              <!-- 
                              <a href="#" class="careerfy-seemore">+ see more</a> -->
                                        </div>
                                    </div>
                                    <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Industries</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div">
                                            <ul class="careerfy-checkbox">
                                            @foreach($industries as $industry)  
                                                <li>
                                                <input type="radio" id="i_{{$industry->id}}" name="industry" value="{{$industry->id}}" />
                                                    <label for="i_{{$industry->id}}"><span></span>{{$industry->name}}</label>
                                                    <small>10</small>
                                                </li>
                                                @endforeach
                                       
                                            </ul>
                                        
                                        </div>
                                    </div>

                  <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Minimum Salary</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="radio" id="salary1" name="salary" value="N50,000-N100,000" />
                                                    <label for="salary1"><span></span>N50,000-N100,000</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="salary2" name="salary" value="N150,000-N250,000" />
                                                    <label for="salary2"><span></span>N150,000-N250,000</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="salary3"  name="salary" value="N350,000-N600,000" />
                                                    <label for="salary3"><span></span>N350,000-N600,000</label>
                                                </li>
                                               <li>
                                                    <input type="radio" id="salary4"  name="salary" value="N750,000-N1,000," />
                                                    <label for="salary4"><span></span>N750,000-N1,000,000</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="salary5"  name="salary" value="N1,000,000-N5,000,000" />
                                                    <label for="salary5"><span></span>N1,000,000-N5,000,000</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="salary6"  name="salary" value="N550,000-N10,000,000" />
                                                    <label for="salary6"><span></span>N5,050,000-N10,000,000</label>
                                                </li>
                                                  <li>
                                                    <input type="radio" id="salary7"  name="salary" value="N10,000,000-N15,000,000" />
                                                    <label for="salary7"><span></span>N10,000,000-N15,000,000</label>
                                                </li>
                                                  <li>
                                                    <input type="radio" id="salary8"  name="salary" value="N15,000,000-Above" />
                                                    <label for="salary8"><span></span>N15,000,000-Above</label>
                                                </li>

                                            </ul>
                                        </div>
                                </div>
                                <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Availability</a></h2>
                                        <div class="careerfy-checkbox-toggle">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="radio" id="avail1" name="avail" value="now" />
                                                    <label for="avail1"><span></span>Immediate</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="avail2" name="avail" value="1 week" />
                                                    <label for="avail2"><span></span>1 week</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="avail3"  name="avail" value="2 weeks" />
                                                    <label for="avail3"><span></span>2 weeks</label>
                                                </li>
                                               <li>
                                                    <input type="radio" id="avail4"  name="avail" value="1 month" />
                                                    <label for="avail4"><span></span>1 month</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="avail5"  name="avail" value="2 months" />
                                                    <label for="avail5"><span></span>2 months</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="avail6"  name="avail" value="Specific date" />
                                                    <label for="avail6"><span></span>Specific date</label>
                                                </li>
                                            </ul>
                                        </div>
                                </div>
                                               <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Years Of Experience</a></h2>
                                        <div class="careerfy-checkbox-toggle">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="radio" id="g1yoe" name="yoe" value="0-5" />
                                                    <label for="g1yoe"><span></span>0-5</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="g2yoe"  name="yoe" value="6-10" />
                                                    <label for="g2yoe"><span></span>6-10</label>
                                                </li>
                                               <li>
                                                    <input type="radio" id="g3yoe"  name="yoe" value="11-15" />
                                                    <label for="g3yoe"><span></span>11-15</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="g4yoe"  name="yoe" value="16-20" />
                                                    <label for="g4yoe"><span></span>16-20</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="g5yoe"  name="yoe" value="20 Above" />
                                                    <label for="g5yoe"><span></span>20 Above</label>
                                                </li>
                                            </ul>
                                        </div>
                                </div>
                                <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Age</a></h2>
                                        <div class="careerfy-checkbox-toggle">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="radio" id="rag1" name="ag" value="18-25" />
                                                    <label for="rag1"><span></span>18-25</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="rag2" name="ag" value="26-30" />
                                                    <label for="rag2"><span></span>26-30</label>
                                                </li>
                                                    <li>
                                                    <input type="radio" id="rag3" name="ag" value="31-35" />
                                                    <label for="rag3"><span></span>31-35</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="rag4" name="ag" value="36-40" />
                                                    <label for="rag4"><span></span>36-40</label>
                                                </li>
                                                     <li>
                                                    <input type="radio" id="rag5" name="ag" value="41-45" />
                                                    <label for="rag5"><span></span>41-45</label>
                                                </li> 
                                                <li>
                                                    <input type="radio" id="rag6" name="ag" value="46-50" />
                                                    <label for="rag6"><span></span>46-50</label>
                                                </li> 
                                                <li>
                                                    <input type="radio" id="rag7" name="ag" value="51 Above" />
                                                    <label for="rag7"><span></span>51 Above</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                               <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Qualification</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div">
                                            <ul class="careerfy-checkbox">
                                             @foreach($educational_levels as $educational_levels)
                                                    <li>
                                                    <input type="radio" id="qu_{{$educational_levels->id}}" name="qu" value="{{$educational_levels->id}}" />
                                                    <label for="qu_{{$educational_levels->id}}"><span></span>{{$educational_levels->name}}</label>
                                                </li>
                                                @endforeach
                                        
                                                 </ul>
                                        </div>
                                    </div>
                            
                                         <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Location</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" >
                                            <ul class="careerfy-checkbox">
                                            @foreach($cities as $city) 
                                                <li>
                                                    <input type="radio" id="r{{$city->id}}" name="city" value="{{$city->id}}" />
                                                    <label for="r{{$city->id}}"><span></span>{{$city->name}}</label>
                                                </li> 
                                            @endforeach 
                                            </ul> 
                                        </div>
                                    </div>
                                 
                         
                                    <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Employement Terms</a></h2>
                                        <div class="careerfy-checkbox-toggle">
                                            <ul class="careerfy-checkbox">
                                  @foreach($employement_terms as $employement_term)
                                                <li>
                                                    <input type="radio" id="jr{{$employement_term->id}}" name="job" value="{{$employement_term->id}}" />
                                                    <label for="jr{{$employement_term->id}}"><span></span>{{$employement_term->name}}</label>
                                                    <small>4</small>
                                                </li>
                                @endforeach
                                          
                                            </ul>
                                        </div>
                                    </div>

                             <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Career Level</a></h2>
                                        <div class="careerfy-checkbox-toggle croll_div">
                                            <ul class="careerfy-checkbox">
                                  @foreach($jobcareer_levels as $jobcareer_level)
                                                <li>
                                                    <input type="radio" id="jc{{$jobcareer_level->id}}" name="career_level" value="{{$jobcareer_level->id}}" />
                                                    <label for="jc{{$jobcareer_level->id}}"><span></span>{{$jobcareer_level->name}}</label>
                                                    <small>4</small>
                                                </li>
                                @endforeach
                                          
                                            </ul>
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </aside>

                                <!-- JobGrid -->
                   <div class="careerfy-column-8">
                            <div class="careerfy-typo-wrap">
                                <!-- FilterAble -->
                                <div class="careerfy-filterable">
                                    <h2>Showing 0-12 of 37 results</h2>
                                    <ul>
                                        <li>
                                            <i class="careerfy-icon careerfy-sort"></i>
                                            <div class="careerfy-filterable-select">
                                                <select>
                                                    <option>Filter[]</option>
                                                    <option>Red[]</option>
                                                    <option>Blue[]</option>
                                                    <option>Orange[]</option>
                                                    <option>Black[]</option>
                                                </select>
                                            </div>
                                        </li>
                                        <li><a href="{{url('/employer/candidates-listing')}}"> All</a></li>
                                        <li><a href="#"><i class="careerfy-icon careerfy-squares"></i> Grid</a></li>
                                        <li><a href="#"><i class="careerfy-icon careerfy-list"></i> List</a></li>
                                    </ul>
                                </div>
 
                                <!-- Candidate Listings -->
                                <div class="careerfy-candidate careerfy-candidate-default">
                                    <ul class="careerfy-row">
                
                            <div id="items">
                                    @forelse($documents as $document)
                         
                                        <li class="careerfy-column-12">
                                            <div class="careerfy-candidate-default-wrap">
                                            @foreach($users as $user)
                                                @if($document->user_id === $user->id)
                                                <figure><a href="#"><img src="/uploads/avatars/{{ $user->avatar }}" alt=""></a></figure>
                                                @endif
                                                @endforeach
                                                <div class="careerfy-candidate-default-text">
                                                    <div class="careerfy-candidate-default-left">
                                                        <h2><a href="#"> {{$document->candidates_name}}</a> <i class="careerfy-icon careerfy-check-mark"></i></h2>
                                                        <ul class="careerfy-column-12" >
                                                        @foreach($work_experiences as $work_experience)
                                                        @if($work_experience->userfk === $document->user_id && $work_experience->present === 1)
                                                            <li>{{$work_experience->position_title}} at <a href="#" class="careerfy-candidate-default-studio">{{$work_experience->company_name}}</a></li>
                                                            @endif
                                                        @endforeach
                                                            <li><i class="fa fa-map-marker"></i>{{$document->nationality}}, @if($document->city_id === null) N/A @else {{$document->city_id}}@endif</li>
                                                            <li><i class="careerfy-icon careerfy-envelope"></i> <a href="#">{{$document->email}}</a></li>
                                                        </ul>
                                                    </div>
                                                    <a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a>
                                                </div>
                                            </div>
                                        </li>
                                         <div class="space">&nbsp;</div>
                                         @empty
                                         
                                        @endforelse
                                </div> 
                                    </ul>
                                </div>
                                <!-- Pagination -->
                                <div class="careerfy-pagination-blog" id="pages">
                                    <ul class="page-numbers">
                                    {{ $documents->appends(['s' => $s])->links() }}
                                     
                                    </ul>
                                </div>
                            </div>
                        </div>
 
                        </div>
                        </div>
                        </div>


 
            <!-- Main Section -->
            
        <!-- Footer -->
               @include('partials.job_footer')
        <!-- Footer -->
    </div>
    <!-- Wrapper -->

    <!-- ModalLogin Box -->
  
    <!-- Modal Signup Box -->
 
      
@if(session()->has('flash-message'))
    <div class="alert alert-danger text-center" role="alert">
        {{ session()->get('flash-message') }}
    </div>
@endif



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 
    <script src="{{ asset('recruit/script/jquery.js')}}"></script>
    <script src="{{ asset('recruit/script/bootstrap.js')}}"></script>
    <script src="{{ asset('recruit/script/slick-slider.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/counter.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/fancybox.pack.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/isotope.min.js')}}"></script>
    <script src="{{ asset('recruit/plugin-script/functions.js')}}"></script>
    <script src="{{ asset('recruit/script/functions.js')}}"></script>
    <script src="{{ asset('css/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('css/assets/global/plugins/bootstrap-summernote/summernote.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('css/assets/global/plugins/jquery-repeater/jquery.repeater.js')}}" type="text/javascript"></script>
         <script src="{{ asset('css/assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('css/assets/pages/scripts/form-repeater.min.js')}}" type="text/javascript"></script>
   <script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
</script>
 <script>
    
    $("#qualification").change(function() { 
    
    if ( $(this).val() == "Specific Qualification") {

    $("#qualification").hide();

    $("#availability_date").show();

}
    else{
    
        $("#qualification").show();
        $("#availability_date").hide();
    }

});


$("#present").click(function(){
  //  alert($(this).val());
    //$("#end_month").hide();
    //document.getElementById('myInput').value = ''
  document.getElementById('end_month_work').value = ''; 
  document.getElementById('end_year').value = ''; 
  
});

  $("#end_month").change(function() { 
//alert($(this).val());
    if ( $(this).val() !=null) {

        $("#present2").show();
        $("#present").hide();
  //document.getElementById('present').style.display = 'none';
   //document.getElementById('work_to_present').style.display = 'block';
        
    }
    else{
document.getElementById('work_to_present').style.display = 'none';
document.getElementById('present').style.display = 'block';
 
    }

}); 

  </script>

 <script type="text/javascript">
 function isEmpty(obj) {
    for(var key in obj) {
        if(obj.hasOwnProperty(key))
            return false;
    }
    return true;
}

  $(document.getElementsByName('gender')).click(function() {
 
       // alert($('input[name=gender]:checked').val() + $('input[name=salary]:checked').val());
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterByCategory', 
            data:{
                '_token':$('input[name=_token').val(),
                'location':$('input[name=city]:checked').val(),
                'job_type':$('input[name=job]:checked').val(),
                'gender':$('input[name=gender]:checked').val(),
                'availability':$('input[name=avail]:checked').val(),
                'age':$('input[name=age]:checked').val(),
                'salary':$('input[name=salary]:checked').val(),
                'yoe':$('input[name=yoe]:checked').val(),
                'qu':$('input[name=salary]:checked').val(),
                'industry':$('input[name=industry]:checked').val(),
                'profession':$('input[name=profession]:checked').val(),
                 'career_level':$('input[name=career_level]:checked').val(),
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
    
             },
            success:function(data){
            console.log(data);
           $('#items').empty();
        // $("#industry-div").hide();
        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
 var code = data.documents_location;
    if(isEmpty(code['data'])) {
        $('#items').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
          // $('#pages').empty();   
    }
     console.log(data);
      
      // var experiences = data.work_experiences;
      // getWorkExperience(experiences);
        $.each(code['data'], function(key, value) {  
            //console.log(value.email);
            var candidates_name = value.candidates_name;
            var email = value.email;
            var user = value.user_id;
            
            //loop through experience to get candidates experience
            var content ='<li class="careerfy-column-12">  <div class="careerfy-candidate-default-wrap"><figure><a href="#"><img src="extra-images/" alt=""></a></figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2><a href="#">' +candidates_name+ '</a></h2> <ul><li> work_experiences at <a href="#" class="careerfy-candidate-default-studio">InteractiveLabs</a></li><li><i class="fa fa-map-marker"></i> Netherlands, Rotterdam</li><li><i class="careerfy-icon careerfy-envelope"></i> <a href="#">' +email+ '</a></li></ul> </div><a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a></div></div></li> <div class="space">&nbsp;</div>'; 
        $('#items').append(content);    
 
        });
 
$("#results2").append('<i class="btn-success btn-xs">'+ 's' + '</i>'); 
  });
 
    });

   $(document.getElementsByName('industry')).click(function() {
   // alert($('input[name=industry]:checked').val());
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterByCategory', 
            data:{
                '_token':$('input[name=_token').val(),
                'location':$('input[name=city]:checked').val(),
                'job_type':$('input[name=job]:checked').val(),
                'gender':$('input[name=gender]:checked').val(),
                'availability':$('input[name=avail]:checked').val(),
                'age':$('input[name=age]:checked').val(),
                'salary':$('input[name=salary]:checked').val(),
                'yoe':$('input[name=yoe]:checked').val(),
                'qu':$('input[name=salary]:checked').val(),
                'industry':$('input[name=industry]:checked').val(),
                'profession':$('input[name=profession]:checked').val(),
                 'career_level':$('input[name=career_level]:checked').val(),
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
           $('#items').empty(); 
            $('#items').hide();
         $("#industry-div").show();
        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
 var code = data.documents_location;
     if(isEmpty(code['data'])) {
        $('#items').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
          $('#pages').empty();   
    }
     console.log(data);
      // var experiences = data.work_experiences;
      // getWorkExperience(experiences);
        $.each(code['data'], function(key, value) {  
            //console.log(value.email);
            var candidates_name = value.candidates_name;
            var email = value.email;
            var user = value.user_id; 
            //loop through experience to get candidates experience
            var content ='<li class="careerfy-column-12">  <div class="careerfy-candidate-default-wrap"><figure><a href="#"><img src="" alt=""></a></figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2><a href="#">' +candidates_name+ '</a></h2> <ul><li> work_experiences at <a href="#" class="careerfy-candidate-default-studio">InteractiveLabs</a></li><li><i class="fa fa-map-marker"></i> Netherlands, Rotterdam</li><li><i class="careerfy-icon careerfy-envelope"></i> <a href="#">' +email+ '</a></li></ul> </div><a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a></div></div></li> <div class="space">&nbsp;</div>'; 
        $('#items').append(content);    
 
        });
 
$("#results2").append('<i class="btn-success btn-xs">'+ 's' + '</i>'); 
  });
 
    });


   $(document.getElementsByName('salary')).click(function() {
         //alert($('input[name=salary]:checked').val());
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterByCategory', 
            data:{
                '_token':$('input[name=_token').val(),
                'location':$('input[name=city]:checked').val(),
                'job_type':$('input[name=job]:checked').val(),
                'gender':$('input[name=gender]:checked').val(),
                'availability':$('input[name=avail]:checked').val(),
                'age':$('input[name=age]:checked').val(),
                'salary':$('input[name=salary]:checked').val(),
                'yoe':$('input[name=yoe]:checked').val(),
                'qu':$('input[name=qu]:checked').val(),
                'industry':$('input[name=industry]:checked').val(),
                'profession':$('input[name=profession]:checked').val(),
                 'career_level':$('input[name=career_level]:checked').val(),
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
           $('#items').empty();   
        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
 var code = data.documents_location;

       if(isEmpty(code['data'])) {
        $('#items').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
          $('#pages').empty();   
    }
     console.log(code['data']);
      // var experiences = data.work_experiences;
      // getWorkExperience(experiences);
        $.each(code['data'], function(key, value) {  
            //console.log(value.email);
            var candidates_name = value.candidates_name;
            var email = value.email;
            var user = value.user_id; 
            //loop through experience to get candidates experience
            var content ='<li class="careerfy-column-12">  <div class="careerfy-candidate-default-wrap"><figure><a href="#"><img src="" alt=""></a></figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2><a href="#">' +candidates_name+ '</a></h2> <ul><li> work_experiences at <a href="#" class="careerfy-candidate-default-studio">InteractiveLabs</a></li><li><i class="fa fa-map-marker"></i> Netherlands, Rotterdam</li><li><i class="careerfy-icon careerfy-envelope"></i> <a href="#">' +email+ '</a></li></ul> </div><a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a></div></div></li> <div class="space">&nbsp;</div>'; 
        $('#items').append(content);    
 
        });
 
$("#results2").append('<i class="btn-success btn-xs">'+ 's' + '</i>'); 
  });
 
    });

   $(document.getElementsByName('avail')).click(function() {
        //alert($('input[name=avail]:checked').val());
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterByCategory', 
            data:{
                '_token':$('input[name=_token').val(),
                'location':$('input[name=city]:checked').val(),
                'job_type':$('input[name=job]:checked').val(),
                'gender':$('input[name=gender]:checked').val(),
                'availability':$('input[name=avail]:checked').val(),
                'age':$('input[name=age]:checked').val(),
                'salary':$('input[name=salary]:checked').val(),
                'yoe':$('input[name=yoe]:checked').val(),
                'qu':$('input[name=salary]:checked').val(),
                'industry':$('input[name=industry]:checked').val(),
                'profession':$('input[name=profession]:checked').val(),
                 'career_level':$('input[name=career_level]:checked').val(),
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
           $('#items').empty(); 
            $('#items').hide();
         $("#industry-div").show();
        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
 var code = data.documents_location;
    if(isEmpty(code['data'])) {
        $('#items').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
          $('#pages').empty();   
    }    //  console.log(code['data']);
     console.log(data);
      // var experiences = data.work_experiences;
      // getWorkExperience(experiences);
        $.each(code['data'], function(key, value) {  
            //console.log(value.email);
            var candidates_name = value.candidates_name;
            var email = value.email;
            var user = value.user_id; 
            //loop through experience to get candidates experience
            var content ='<li class="careerfy-column-12">  <div class="careerfy-candidate-default-wrap"><figure><a href="#"><img src="" alt=""></a></figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2><a href="#">' +candidates_name+ '</a></h2> <ul><li> work_experiences at <a href="#" class="careerfy-candidate-default-studio">InteractiveLabs</a></li><li><i class="fa fa-map-marker"></i> Netherlands, Rotterdam</li><li><i class="careerfy-icon careerfy-envelope"></i> <a href="#">' +email+ '</a></li></ul> </div><a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a></div></div></li> <div class="space">&nbsp;</div>'; 
        $('#items').append(content);    
 
        });
 
$("#results2").append('<i class="btn-success btn-xs">'+ 's' + '</i>'); 
  });
 
    });

   $(document.getElementsByName('yoe')).click(function() {
        //alert($('input[name=yoe]:checked').val());
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterByCategory', 
            data:{
                '_token':$('input[name=_token').val(),
                'location':$('input[name=city]:checked').val(),
                'job_type':$('input[name=job]:checked').val(),
                'gender':$('input[name=gender]:checked').val(),
                'availability':$('input[name=avail]:checked').val(),
                'age':$('input[name=age]:checked').val(),
                'salary':$('input[name=salary]:checked').val(),
                'yoe':$('input[name=yoe]:checked').val(),
                'qu':$('input[name=salary]:checked').val(),
                'industry':$('input[name=industry]:checked').val(),
                'profession':$('input[name=profession]:checked').val(),
                 'career_level':$('input[name=career_level]:checked').val(),
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
           $('#items').empty(); 
            // $('#items').hide();
         // $("#industry-div").show();
        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
 var code = data.documents_location;
    if(isEmpty(code['data'])) {
        $('#items').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
          // $('#pages').empty();   
    }
     //console.log(data);
      // var experiences = data.work_experiences;
      // getWorkExperience(experiences);
        $.each(code['data'], function(key, value) {  
            //console.log(value.email);
            var candidates_name = value.candidates_name;
            var email = value.email;
            var user = value.user_id; 
            //loop through experience to get candidates experience
            var content ='<li class="careerfy-column-12">  <div class="careerfy-candidate-default-wrap"><figure><a href="#"><img src="" alt=""></a></figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2><a href="#">' +candidates_name+ '</a></h2> <ul><li> work_experiences at <a href="#" class="careerfy-candidate-default-studio">InteractiveLabs</a></li><li><i class="fa fa-map-marker"></i> Netherlands, Rotterdam</li><li><i class="careerfy-icon careerfy-envelope"></i> <a href="#">' +email+ '</a></li></ul> </div><a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a></div></div></li> <div class="space">&nbsp;</div>'; 
        $('#items').append(content);    
 
        });
 
$("#results2").append('<i class="btn-success btn-xs">'+ 's' + '</i>'); 
  });
 
    });  

     $(document.getElementsByName('job')).click(function() {
 
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterByCategory', 
            data:{
                '_token':$('input[name=_token').val(),
                'location':$('input[name=city]:checked').val(),
                'job_type':$('input[name=job]:checked').val(),
                'gender':$('input[name=gender]:checked').val(),
                'availability':$('input[name=avail]:checked').val(),
                'age':$('input[name=age]:checked').val(),
                'salary':$('input[name=salary]:checked').val(),
                'yoe':$('input[name=yoe]:checked').val(),
                'qu':$('input[name=salary]:checked').val(),
                'industry':$('input[name=industry]:checked').val(),
                'profession':$('input[name=profession]:checked').val(),
                 'career_level':$('input[name=career_level]:checked').val(),
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show(); 
             },
            success:function(data){
            console.log(data);
           $('#items').empty();
      $("#industry-div").hide();
        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
 var code = data.documents_location;
      console.log(code['data']);
     //console.log(data.work_experiences);

       if(isEmpty(code['data'])) {
        $('#items').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
          $('#pages').empty();   
    }
      // var experiences = data.work_experiences;
      // getWorkExperience(experiences);
    var msg = '';
        $.each(code['data'], function(key, value) {  
            //console.log(value.email);
            var candidates_name = value.candidates_name;
            var email = value.email;
            var user = value.user_id;
            
            //loop through experience to get candidates experience
            var content ='<li class="careerfy-column-12">  <div class="careerfy-candidate-default-wrap"><figure><a href="#"><img src="" alt=""></a></figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2><a href="#">' +candidates_name+ '</a></h2> <ul><li> work_experiences at <a href="#" class="careerfy-candidate-default-studio">InteractiveLabs</a></li><li><i class="fa fa-map-marker"></i> Netherlands, Rotterdam</li><li><i class="careerfy-icon careerfy-envelope"></i> <a href="#">' +email+ '</a></li></ul> </div><a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a></div></div></li> <div class="space">&nbsp;</div>'; 
            console.log(content)
        
    $('#items').append(content);  
        });

 
  });
 
    });


     $(document.getElementsByName('career_level')).click(function() {
 
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterByCategory', 
            data:{
                '_token':$('input[name=_token').val(),
                'location':$('input[name=city]:checked').val(),
                'job_type':$('input[name=job]:checked').val(),
                'gender':$('input[name=gender]:checked').val(),
                'availability':$('input[name=avail]:checked').val(),
                'age':$('input[name=age]:checked').val(),
                'salary':$('input[name=salary]:checked').val(),
                'yoe':$('input[name=yoe]:checked').val(),
                'qu':$('input[name=salary]:checked').val(),
                'industry':$('input[name=industry]:checked').val(),
                'profession':$('input[name=profession]:checked').val(),
                'career_level':$('input[name=career_level]:checked').val(),
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show(); 
             },
            success:function(data){
            console.log(data);
           $('#items').empty();
      $("#industry-div").hide();
        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
    var code = data.documents_location;
      console.log(code['data']);
     //console.log(data.work_experiences); 
       if(isEmpty(code['data'])) {
        $('#items').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
          // $('#pages').empty();   
    }
      // var experiences = data.work_experiences;
      // getWorkExperience(experiences);
        var msg = '';
        $.each(code['data'], function(key, value) {  
            //console.log(value.email);
            var candidates_name = value.candidates_name;
            var email = value.email;
            var user = value.user_id;
            
            //loop through experience to get candidates experience
            var content ='<li class="careerfy-column-12">  <div class="careerfy-candidate-default-wrap"><figure><a href="#"><img src="" alt=""></a></figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2><a href="#">' +candidates_name+ '</a></h2> <ul><li> work_experiences at <a href="#" class="careerfy-candidate-default-studio">InteractiveLabs</a></li><li><i class="fa fa-map-marker"></i> Netherlands, Rotterdam</li><li><i class="careerfy-icon careerfy-envelope"></i> <a href="#">' +email+ '</a></li></ul> </div><a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a></div></div></li> <div class="space">&nbsp;</div>'; 
            // console.log(content)
        
    $('#items').append(content);  
        });

 
  });
 
    });

//career_level


     $(document.getElementsByName('city')).click(function() {
     // var evaluation10 = document.getElementsByName('evaluation14');
  //alert($('input[name=city]:checked').val() + $('input[name=gender]:checked').val());
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // body...
  
        $.ajax({
            type:'post',
            url:'/filterByCategory', 
            data:{
            '_token':$('input[name=_token').val(),
                'location':$('input[name=city]:checked').val(),
                'job_type':$('input[name=job]:checked').val(),
                'gender':$('input[name=gender]:checked').val(),
                'availability':$('input[name=avail]:checked').val(),
                'age':$('input[name=age]:checked').val(),
                'salary':$('input[name=salary]:checked').val(),
                'yoe':$('input[name=yoe]:checked').val(),
                'qu':$('input[name=salary]:checked').val(),
                'industry':$('input[name=industry]:checked').val(),
                'profession':$('input[name=profession]:checked').val(),
                'career_level':$('input[name=career_level]:checked').val(),
            },
             beforeSend: function(){
    // Show image container
            $("#loader").show(); 
             },
            success:function(data){
             console.log(data);
            $('#items').empty();
         
        // $("#industry-div").hide();
        //  window.location.reload();
  
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
        }).done(function (data) {
     var code = data.documents_location;
      console.log(code['data']);
    // console.log(data.work_experiences);
      // var experiences = data.work_experiences;
      // getWorkExperience(experiences);

        $.each(code['data'], function(key, value) {

            //console.log(value.email);
            var candidates_name = value.candidates_name;
            var email = value.email;
            var user = value.user_id;
            
            //loop through experience to get candidates experience
            var content ='<li class="careerfy-column-12">  <div class="careerfy-candidate-default-wrap"><figure><a href="#"><img src="" alt=""></a></figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2><a href="#">' +candidates_name+ '</a></h2> <ul><li> work_experiences at <a href="#" class="careerfy-candidate-default-studio">InteractiveLabs</a></li><li><i class="fa fa-map-marker"></i> Netherlands, Rotterdam</li><li><i class="careerfy-icon careerfy-envelope"></i> <a href="#">' +email+ '</a></li></ul> </div><a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a></div></div></li> <div class="space">&nbsp;</div>'; 
        $('#items').append(content);    
        // $.each(value, function(key2, value2){ 
        // console.log(value2);
        //  $('#items').append('<option value="'+ value +'">'+ value2 +'</option>');
       // $('select[name="zemployee_payslip_type"]').append('<option value="'+ value +'">'+ value +'</option>');
        });

       

        $("#results2").append('<i class="btn-success btn-xs">'+ 's' + '</i>');
            
  });
    });




     function getWorkExperience(experiences) {

        console.log(experiences);
           $.each(experiences, function(key2, value2) {  
            if (user === value2['userfk'] && value2['present'] === 1) {  
            console.log(user);
             // console.log(value2['userfk']);
             var experience = value2['position_title'];
             } 
         });

        return experience;
     }

      $('#insert3').click(function(e) {
        
        e.preventDefault(); 
        alert($('input[name=p_section_id3]').val());

         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // body...
 
        $.ajax({
            type:'post',
            url:'/addmangereveluation', 
            data:{
                '_token':$('input[name=_token').val(),
                'e_section_id':$('input[name=p_section_id3]').val(),
                'manager_evaluates':$('textarea[name=manager_evaluates3]').val() 
            },
            success:function(data){
              console.log(data);
            location.reload();
            window.location.reload();

            },

        });
    });



</script>
 <script>
    $(".delete").on("submit", function(){
        return confirm("Do you want to delete this item?");
    });
</script>
 <!-- <a href="javascript:clearChecks('group1')">clear</a> -->

<script type="text/javascript">

function clearChecks(radioName) {
    var radio = document.form1[radioName]
    for(x=0;x<radio.length;x++) {
        document.form1[radioName][x].checked = false
    }
}



    $(document).ready(function() {
        $('#summernote_1').summernote({
            height:'300px',
            placeholder:'Body of email here...',


        });
        // body...
    });

    $(document).ready(function() {
        $('#summernote_2').summernote({
            height:'300px',
            placeholder:"Make a list of your Educaitonal Qualifications Eg. BSc Maths/ Computer Sc. etc...",


        });
        // body...
    });

    $('#clear').on('click', function() {
        $('#summernote_1').summernote('code', null);

    });
        $('#clear').on('click', function() {
        $('#summernote_2').summernote('code', null);

    });
        function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function validate() {
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;

    var emailFilter = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
    var phoneFilter = /^http:\/\//;

    if (!emailFilter.test(email)) {
        alert('Please enter a valid e-mail address.');
        return false;
    }

    if (!phoneFilter.test(phone)) {
        alert('Please correct your phone number.');
        return false;
    }

    return true;
}
document.getElementById('frm').onsubmit = validate;
</script>

<!-- 
<select class="width-full" required="" id="category_id" data-parsley-error-message="Please select a job function" name="category_id[]">
<option value="">Select...</option>
<option value="14">Accounting &amp; Auditing</option>
<option value="3">Administrative</option>
<option value="21">Art &amp; Design</option>
<option value="47">Building &amp; Architecture</option>
<option value="34">Consulting &amp; Strategy</option>
<option value="22">Customer Service &amp; Support</option>
<option value="19">Engineering</option>
<option value="7">Farming</option>
<option value="48">Food Services</option>
<option value="27">IT &amp; Telecoms</option>
<option value="28">Legal</option>
<option value="18">Management</option>
<option value="31">Marketing &amp; Communications</option>
<option value="33">Medicine &amp; Pharmaceutical</option>
<option value="20">Project Management</option>
<option value="45">Property Management</option>
<option value="36">Quality Control &amp; Assurance </option>
<option value="26">Recruitment</option>
<option value="49">Research</option>
<option value="38" selected="selected">Sales &amp; Business Development</option>
<option value="35">Social Development</option>
<option value="29">Supply Chain &amp; Procurement</option>
<option value="23">Teaching &amp; Training</option>
<option value="40">Trades &amp; Services</option></select>

Industry

<select class="width-full" required="" data-parsley-error-message="Please select an industry" id="industry_id" name="industry_id">
<option value="">Select...</option>
<option value="15">Advertising</option>
<option value="1">Agriculture</option>
<option value="4">Banking &amp; Finance</option>
<option value="3">Construction</option>
<option value="2">Creative</option>
<option value="5" selected="selected">Education</option>
<option value="6">Energy</option>
<option value="7">Government</option>
<option value="8">Healthcare</option>
<option value="9">Hospitality &amp; Leisure</option>
<option value="10">Human Resources</option>
<option value="12">Law</option>
<option value="13">Logistics &amp; Transportation</option>
<option value="14">Manufacturing</option>
<option value="16">Media &amp; Entertainment</option>
<option value="17">Mining &amp; Metals</option>
<option value="18">NGO</option>
<option value="21">Real Estate</option>
<option value="19">Retail &amp; FMCG</option>
<option value="20">Security</option>
<option value="11">Technology &amp; Communication</option>
<option value="22">Tours &amp; Travel</option></select>
-->
</body>

</html>
