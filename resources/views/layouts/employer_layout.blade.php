<!DOCTYPE html>
<html lang="en">
<head>
    <title>Job Board</title>
    <!-- Css -->
        @include('partials.job_board_header')
 <!-- <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet"> -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    .careerfy-parallex-box {
    background: url(img/parallex-box-bg.png);
    background-position: left bottom;
    background-repeat: no-repeat;
    background-color: #4f87fb;
    padding: 137px 60px 136px 60px;
    text-align: center;
}
    .search-web {
    background: url(img/search-web.png);
    background-position: left bottom;
    background-repeat: no-repeat; 
    text-align: center;
}
.singup a:hover {
 color: #ffffff;
}

</style>
   <style type="text/css">
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    height: 10px;
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    border-color: #13B5EA;
}

tr:hover {background-color:#f5f5f5;}
.responsive {
  width: 100%;
  height: auto;
}
   </style> 
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
@include('partials.employer_breadcomb') 
        <!-- Banner -->
        <!-- Main Content -->
             <div class="careerfy-main-content" style="margin-top: -60px;">
            <!-- Main Section -->
                <!-- <section id="app"></section> -->      
            <!-- Main Section -->
<div class="careerfy-main-section careerfy-dashboard-fulltwo">
                <div class="container">
                    <div class="row">

     <aside class="careerfy-column-3 page">
                            <div class="careerfy-typo-wrap" style="background-color: #ffffff;">
                                <div class="careerfy-employer-dashboard-nav" style="background-color: #ffffff;">
                                    <figure>
                                    <div class="resume_pic_outer">
<div class="resume_pic" id="imagesection">
 <img src="/uploads/avatars/{{ $recruit_profile_pix->pix }}"  alt="Picture" class="employer-dashboard-thumb" >
                <div class="careerfy-fileUpload">
                <span><i class="careerfy-icon careerfy-add"></i><a href="{{route('upload.images', Auth::user()->id )}}">  Upload Logo</span>
              
                </div>
</div>
</div>
  
                                    </figure>
 

                             

                                             <ul>
                                        <li class="{{$profile}}" ><a href="{{route('employer.edit', Auth::user()->id )}}"><i class="careerfy-icon careerfy-user"></i> Company Profile</a></li>
                                        <li class="{{$manage_jobs}}"><a href="{{route('manage.jobs')}}"><i class="careerfy-icon careerfy-briefcase-1"></i> Manage Jobs</a></li>
                                        <li class="{{$transaction}}"><a href=""><i class="careerfy-icon careerfy-salary"></i> Transactions</a></li>
                                        <li class="{{$shortlisted}}"><a href="{{route('dashboard')}}"><i class="careerfy-icon careerfy-heart"></i> Shortlisted Resumes</a></li>
                                        <li class="{{$package}}"><a href="{{route('employer.packages')}}"><i class="careerfy-icon careerfy-credit-card-1"></i> Packages</a></li>
                                        <li class="{{$job_post}}"><a href="{{route('post.jobs')}}"><i class="careerfy-icon careerfy-plus"></i> Post a New Job</a></li>
                                  <!--       <li><a href="employer-dashboard-manage-jobs.html"><i class="careerfy-icon careerfy-alarm"></i> Job Alerts</a></li> -->
                                        <li><a href="{{ url('/password/reset') }}"><i class="careerfy-icon careerfy-multimedia"></i> Change Password</a></li>
                                        <li>
                                    <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="careerfy-icon careerfy-logout"></i>  Logout
                                        </a>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                    </ul>
 
                                   
                                </div>
                            </div>
                        </aside>
 
    
    <div class="careerfy-column-9">
           @yield('content')      

</div>

</div>
</div>
 
        </div>
        <!-- Main Content -->
        
        <!-- Footer -->
               @include('partials.job_footer')
        <!-- Footer -->
   
    </div>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

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
     <script src="{{ asset('js/selectform.js') }}" type="text/javascript"></script>
      <script src="{{ asset('js/pagination.js') }}" type="text/javascript"></script>
    <script src="{{ asset('css/assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
    <script src="{{ asset('css/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('css/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>

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
                'profession':$('input[name=profession]:checked').val()
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
                'profession':$('input[name=profession]:checked').val()
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
                'profession':$('input[name=profession]:checked').val()
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
                'profession':$('input[name=profession]:checked').val()
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
                'profession':$('input[name=profession]:checked').val()
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
                'profession':$('input[name=profession]:checked').val()
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


//


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
                'profession':$('input[name=profession]:checked').val()
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

$('#summernote_1').summernote({
       height:'300px',
         placeholder:'Technical Requirements:',
        toolbar: [
          ['undo', ['undo',]],
          ['redo', ['redo',]],
          ['style', ['bold', 'italic', 'underline',]],
          ['font', ['strikethrough',]],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['font-family', ['FontAwesome', 'icomoon']],
        ],
    callbacks: {
        onPaste: function (e) {
            var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

            e.preventDefault();

            // Firefox fix
            setTimeout(function () {
                document.execCommand('insertText', false, bufferText);
            }, 10);
        }
    }

});
$('#summernote_1').summernote('fontSize', 14);

//     $(document).ready(function(e) {
//         $('#summernote_1').summernote({
//             height:'300px',
//             placeholder:'Content here...',

//         toolbar: [
//           ['undo', ['undo',]],
//           ['redo', ['redo',]],
//           ['style', ['bold', 'italic', 'underline',]],
//           ['font', ['strikethrough',]],
//           ['fontsize', ['fontsize']],
//           ['color', ['color']],
//           ['para', ['ul', 'ol', 'paragraph']],
//           ['font-family', ['FontAwesome', 'icomoon']],
//         ]
// onPaste: function (e) {
//         var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
//         e.preventDefault();
//         document.execCommand('insertText', false, bufferText);
//     }

//         });
 
//    $('#summernote_1').summernote('fontSize', 14);
//      $('#summernote_1').summernote('<p>', '#777777');
//     });
 
$('#summernote_3').summernote({
       height:'300px',
         placeholder:'Job Functions',
        toolbar: [
          ['undo', ['undo',]],
          ['redo', ['redo',]],
          ['style', ['bold', 'italic', 'underline',]],
          ['font', ['strikethrough',]],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['font-family', ['FontAwesome', 'icomoon']],
        ],
    callbacks: {
        onPaste: function (e) {
            var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

            e.preventDefault();

            // Firefox fix
            setTimeout(function () {
                document.execCommand('insertText', false, bufferText);
            }, 10);
        }
    }

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
 

 
@foreach($recruit_profile_pix_list as $recruit_profile)
 $('#image_section-{{$recruit_profile->id}}').change(function() {

    alert('hereeee');
    var location = [];
    var profession = [];
    var job_type = [];

 
  {
   
     var cboxValue = $(this).val(); 
      alert(cboxValue);
 
      $(this).prop('checked', true);
 
 
  
 console.log(profession);
 
selectImage(location,profession,job_type);
 
  }
});
 @endforeach

function isEmpty(obj) {
    for(var key in obj) {
        if(obj.hasOwnProperty(key))
            return false;
    }
    return true;
}



  $(document.getElementsByName('draft')).click(function() {
 alert($('input[name=draft]:checked').val());
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/employer/post-jobs', 
            data:{
                '_token':$('input[name=_token').val(),
                'draft':$('input[name=draft]:checked').val(),
           
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show(); 
             },
            success:function(data){
            console.log(data);
   
       window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
 
 
  });
 
    });
  
   $(document.getElementsByName('save_job')).click(function() {
 alert($('input[name=job_title]').val());
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/tag/save-job', 
            data:{
                // '_token':$('input[name=_token').val(), 
                // 'job_title':$('input[name=job_title]').val(),
                // 'email_address':$('input[name=email_address]').val(),
                // 'job_category':$('input[name=job_category]').val(),
                // 'job_type':$('input[name=job_type]').val(),
                // 'p_job_level':$('input[name=p_job_level').val(),
                // 'p_gender':$('input[name=p_gender]').val(),
                // 'p_salary_range':$('input[name=p_salary_range]').val(),
                // 'p_experience':$('input[name=p_experience]').val(),
                // 'p_industry':$('input[name=p_industry]').val(),
                // 'p_qualification':$('input[name=p_qualification]').val(),
                // 'end_date':$('input[name=end_date]').val(),
                // 'fieldsos':$('input[name=fieldsos]').val(),
                // 'description':$('textarea[name=description]').val(),
                // 'p_country':$('input[name=p_country]').val(),
                // 'region':$('input[name=region]').val(),
                // 'location':$('input[name=location]').val(),
                // 'full_address':$('textarea[name=full_address]').val(),
                // 'group_a':$('input[name=group_a]').val(),
                // 'group_b':$('input[name=group_b]').val(),
                // 'group_c':$('input[name=group_c]').val(),
           
            },
              beforeSend: function(){
            //Show image container
            $(".lds-ripplee").show(); 
            $(".hideme").hide();
            $("#info").append('<i class="btn-success btn-xs" style="color:#ffffff;"> sending data to the server... </i>');
             },
            success:function(data){
            console.log(data); 
     },
     complete:function(data){
    // Hide image container 
    $(".lds-ripplee").hide();
    $("#info").hide();
    },
    }).done(function (data) {
     $(".hideme").hide();
        var code = data.tagid; 
        var success_image = data.success_image; 
        var dashboard = data.dashboard; 
        var job_detail = data.job_detail;
        console.log(dashboard);
        console.log(job_detail);

        var  success  =  '<div class="careerfy-column-9"><div class="careerfy-typo-wrap"><div class="careerfy-employer-dasboard"> <div class="careerfy-employer-box-section" style="background-color: #ffffff;"> <nav class="careerfy-employer-jobnav"> </nav> <div class="careerfy-employer-confitmation"><div align="center"> <img src="'+success_image+'" alt="" align="center"></div> <h2>Thank you for submitting</h2> <p>Your job will be reviewed by our team and published soon. If you need help please contact us via email hr@rhizomeng.com</p> <div class="clearfix"></div> <a href="'+dashboard+'">Dashboard</a> <a href="'+job_detail +'/'+ code;'">View Job</a></div> </div> </div> </div> </div>';
  
       $('#confirmation').append(success);  
  });
 
    });

 function selectImage(image_id){

 
    var check_section = 'rejected';
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/employer-select-image', 
            data:{
                '_token':$('input[name=_token').val(),
                'image_id':image_id,
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
    
             },
            success:function(data){
          console.log(data); 
           $('#imagesection').empty(); 
     },
     complete:function(data){
    // Hide image container  
    $("#loader").hide();
    },
    }).done(function (data) {
  var code = data.jobs; 
  var employement_term_list = data.employement_term_list;
  var industry_professions = data.industry_professions;
  var jobs_list = data.jobs_list;
  var candidates_name = '';
  var user = null;
  var resume_id = null;
  var job_id = data.job_id;
   // var route_name = location.href ='/job/job-detail';
   var apply_route = location.href ='/uploads/avatars/';

    if(isEmpty(code['data'])) {
        $('#imagesection').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
          // $('#pages').empty();   
    }
    console.log(code['data']); 
  var job_title = '';
  var job_terms = '';
  var job_title = '';
  var category = '';
 
    
//       // hired list
//       $.each(code['data'], function(key, value){
// //             var id = value.id; 

//    if(value.status === 1 && value.order === 1){

// //     employement_term = getJobTerms(employement_term_list, value.job_type);
// //     profession_name = getJobFunction(industry_professions, value.job_category);
// //     job_title = value.job_title;
// //     category = getJobTermsCategory(employement_term_list, value.job_type);
 

//       var content2 = '<img src="'+apply_route+'/ '+value.pix+'" alt="Picture" class="employer-dashboard-thumb" > ';

//        $('#imagesection').append(content2);

// // }else{
// // console.log('am here');

//  }
// //       });
   
  });
}

</script>

 <script>

   $(".lds-ripple").hide();
   $(".lds-ripplee").hide();
   $(".info").hide();
    $(".delete").on("submit", function(){
        return confirm("Do you want to delete this item?");
    });
</script>
</body>

</html>
