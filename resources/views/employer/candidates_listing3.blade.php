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
    <style type="text/css">
   
    </style>
</head>
<body>
<script>
 window.Laravel = <?php echo json_encode([
 'csrfToken' => csrf_token(),
 ]); ?>
 
</script>

<style type="text/css">
  
.lds-ripple {
  display: inline-block;
  position: relative;
  width: 64px;
  height: 64px;
}
.lds-ripple div {
  position: absolute;
  border: 4px solid #13B5EA;
  opacity: 1;
  border-radius: 50%;
  animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
}
.lds-ripple div:nth-child(2) {
  animation-delay: -0.5s;
}

@keyframes lds-ripple {
  0% {
    top: 28px;
    left: 28px;
    width: 0;
    height: 0;
    opacity: 1;
  }
  100% {
    top: -1px;
    left: -1px;
    width: 58px;
    height: 58px;
    opacity: 0;
  }
}
.butt{
  margin-top: 10px !important;
}
<?php foreach ($applications as $key => $value): ?> 
.lds-ripplee {
  display: inline-block;
  position: relative;
  width: 64px;
  height: 64px;

}
.lds-ripplee{{$value->user_id}} div {
  position: absolute;
  border: 4px solid #13B5EA;
  opacity: 1;
  border-radius: 50%;
  animation: lds-ripplee 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;

}
.lds-ripplee{{$value->user_id}} div:nth-child(2) {
  animation-delay: -0.5s;
}
@keyframes lds-ripplee{{$value->user_id}} {
  0% {
    top: 28px;
    left: 28px;
    width: 0;
    height: 0;
    opacity: 1;
  }
  100% {
    top: -1px;
    left: -1px;
    width: 58px;
    height: 58px;
    opacity: 0;
  }
}
  <?php endforeach ?>    

</style>
    <!-- Wrapper -->
    <div class="careerfy-wrapper">
        <!-- Header -->
@include('partials.employer_menu')
        <!-- Header -->     
        <!-- Banner -->
        <!-- Banner -->
        <!-- Main Content -->
        @include('partials.employer_breadcomb')
   <div class="careerfy-main-content" style="margin-top: -40px;">
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
 
 
        <!-- Main Content -->
        <div class="careerfy-main-content" style="margin-top: -40px;"> 
                    <div class="container">
                    <div class="col-md-12">
                       <div class="col-md-6"><h3><a href="{{route('dashboard')}}"> Manage Jobs</a></h3></div>
                         <div class="col-md-6"></div>
                    </div>

                          <div class="col-md-12"> 
                    <div class="col-md-6" style="text-align: left;">    <h3>{{$job_record->job_title}}</h3>
    @foreach($industries as $industry)
        @if($industry->id === $job_record->industry)
            {{$industry->name}}
        @endif
    @endforeach
                @foreach($professions as $industry_profession)
            @if($industry_profession->id === $job_record->job_category)
             {{$industry_profession->name}} || {{$job_record->city}}
            @endif
                @endforeach</div>
                    <div class="col-md-6" style="text-align: right;"> Status @if($job_record->status === 1 && $job_record->active === 1)<span class="badge" style="background-color: green;"> ONLINE</span> @else<span class="badge" style="background-color: red;">OFFLINE</span>  @endif</div>
                </div>
            </div>
 
            <!-- Main Section -->

        <!-- SubHeader -->
 
        <!-- SubHeader -->
   
   <!-- Main Section -->
<div id="app">
     <div class="careerfy-main-section" style="background-color: #ffffff;">
                <div class="container">

  <!-- begin tabs -->

  <applicants jobid="{{ $job_id }}"></applicants> 

<!--end of Tabs -->


    </div>
</div>

  </div>

  <div class="space">&nbsp;</div> 
 
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


<div class="modal fade bs-modal-lg" id="static_summary" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">Send Email</h4>
</div>
<div class="modal-body">

<!-- BEGIN EXAMPLE TABLE PORTLET-->
<!-- <div class="portlet light bordered">
<div class="portlet-body"> -->
 <!-- <pre> Specifications</pre> -->
<form class="form-horizontal" action="" method="post" role="form">
{{ csrf_field() }}
<!-- <form role="form"> -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-12">
Title <span class="required">*</span>
<textarea class="form-control" placeholder="A result-driven and dedicated Application Developer, seeking a software engineering position to utilize logical thinking skills and programming expertise to provide the company with excellent software solutions" name="career_summary" required="required"></textarea> 
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->
<div class="modal-footer">
<button type="submit" class="btn dark btn-outline" data-dismiss="modal">Close</button>
<button type="submit" class="btn green">Save changes</button>
</div>
</form>
<!-- END EXAMPLE TABLE PORTLET-->
</div>

</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 
    <script src="{{ asset('recruit/script/jquery.js')}}"></script>
    <script src="{{ asset('recruit/script/bootstrap.js')}}"></script>
<!--            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
       <script src="{{ asset('js/app.js') }}"></script>
   <script>
 

$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});

// $(document).ready( function(){
//  $('#auto').load('/employer/job/applicants');
//   refresh();
// });

// function refresh() {
 
//   setTimeout(function () {
//     $('#auto').fadeOut('slow').load('/employer/job/applicants').fadeIn('slow');
//     refresh();
//   }, 20000);
// }



$(function() {

          function getPaginationSelectedPage(url) {
            var chunks = url.split('?');
            var baseUrl = chunks[0];
            var querystr = chunks[1].split('&');
            var pg = 1;
            for (i in querystr) {
                var qs = querystr[i].split('=');
                if (qs[0] == 'page') {
                    pg = qs[1];
                    break;
                }
            }
            return pg;
        } 


    $('#load_unsorted').on('click', '.pagination a', function(e) { 
        $('#load a').css('color', '#dfecf6');
        $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="{{asset(`img/ajax-loader.gif`)}}" />');

        // var url = $(this).attr('href');  
        // getTags(url);
        // window.history.pushState("", "", url);
         
         e.preventDefault();
            var pg = getPaginationSelectedPage($(this).attr('href'));

            $.ajax({
                url: '/employer/job/applicants/unsorted',
                data: { page: pg }, 
                beforeSend: function(){
                    $(".lds-ripple").show(); 
              },
                success: function(data) {
                    $('#alljobs').html(data);
                }
            }).done(function(data){ 
                    $(".lds-ripple").hide(); 
            });


    });


    function getTags(url) {
        $.ajax({
            url : url  
        }).done(function (data) {
            $('.alljobs').html(data);  
        }).fail(function () {
            alert('Jobs could not be loaded.');
        });
    }



        $('#rejected').on('click', '.pagination a', function(e) {
            e.preventDefault();
            var pg = getPaginationSelectedPage($(this).attr('href'));

            $.ajax({
                url: '/employer/job/applicants/rejected',
                data: { page: pg },
                success: function(data) {
                    $('#rejected').html(data);
                }
            });
        });

        $('#inreview').on('click', '.pagination a', function(e) {
            e.preventDefault();
            var pg = getPaginationSelectedPage($(this).attr('href'));

            $.ajax({
                url: '/employer/dashboard/inreview',
                data: { page: pg },
                success: function(data) {
                    $('#draftjobs').html(data);
                }
            });
        });

}); 

    // $('#load_unsorted').load('/employer/job/applicants/unsorted?page=1');
   // $('#rejected').load('/employer/dashboard/rejected?page=1');
    // $('#rejected').load('api/load/rejectedcv');

</script>
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


 


// $('#fpdId').click(function(){
//     var files = new Array();

//     //xzyId is table id.
//     $('#g tbody tr  input:checkbox').each(function() {
//       if ($(this).is(':checked')) {
//       files.push(this.value);
//       }
//     });

//     console.log(files);
//  });
  $('#savedescription').click(function() {
 alert('here');
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
          $("#sec20").append('<i class="btn-success btn-xs"> Done </i>');
 
  });
 
    });


  //  applicants
 @foreach($List_applicants_by_job_id as $List_applicant)  
  $('#savedescription{{$List_applicant->id}}').click(function() {
 // confirm('Are you sure?');
 //when user clicks on reject 
 //adjust the records on applicants_list
 //adjust the records on reject list
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/reject_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$List_applicant->id}}]').val(),
                'application_id':$('input[name=application_id{{$List_applicant->id}}]').val(),
                'user_id':$('input[name=user_id{{$List_applicant->id}}]').val(),
                'job_id':$('input[name=job_id{{$List_applicant->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            //console.log(data);
             $('#review_count').empty();
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty(); 
            $("#hired_count").empty();
            $("#applicants_list").empty(); 
            $("#move_to").empty(); 
            $("#reject_section").empty(); 
           // window.location.href+"#tab_11>*", "";
            $("#tab_rejected").load(location.href+" #tab_rejected>*", "");
        //window.location.reload(); review_section
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        // $('.rejected_cv').html(data);
        // $('.rejected_filter').html(data);
        // $('.load_unsorted').html(data);
        // $('.load_unsorted_cv').html(data);

        var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var hired_count = data.hired_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var new_reject_list = data.new_reject_list;
        var work_experiences = data.work_experiences;
        var hired_list = data.hired_list;
        var userlist = data.userlist;
        //console.log(rejected);
        //console.log(newapplication_list);
 
            if(isEmpty(newapplication_list)) {
            $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
            $('#resume_body').empty();
            $('#resume_body').append('No Record(s) Found'); 
 
            }

            $("#reject_count").append(rejected);
            $('#sorted_count').append(sorted_count);
            $("#review_count").append(in_review_count);
            $("#shortlist_count").append(shortlisted_count); 
            $("#hired_count").append(hired_count); 

        var count = 0;
        var status = '';
        var content_v = '';
         $.each(hired_list, function(key, value){
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
   var avatar = getAvatar(userlist, value.user_id);
            //loop through experience to get candidates 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap butt"> <figure> <img src="/uploads/avatars/ ' + avatar +'" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#hire_section").append(content); 


 });
         count++;

 $.each(new_reject_list, function(key, value){
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
    var avatar = getAvatar(userlist, value.user_id);

            //loop through experience to get candidates 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap butt"> <figure> <img src="/uploads/avatars/'+ avatar +'" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
        $('#reject_section').load('/employer/job/applicants/');
 
 });
 count++;
      $.each(newapplication_list, function(key, value) {
  //console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
          
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            } 
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
    var avatar = getAvatar(userlist, value.user_id);

 //console.log(userlist);

            //loop through experience to get candidates
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap butt"> <figure> <img src="/uploads/avatars/'+ avatar +'" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  

        
 
        });

       //$//('#load_unsorted_cv').load('employer/job/applicants/');
           count++;
 
  });
 
    });



    $('#in_review{{$List_applicant->id}}').click(function() {
        //alert('in_reviewssss');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/review_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$List_applicant->id}}]').val(),
                'application_id':$('input[name=application_id{{$List_applicant->id}}]').val(),
                'user_id':$('input[name=user_id{{$List_applicant->id}}]').val(),
                'job_id':$('input[name=job_id{{$List_applicant->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
           //console.log(data);
            $('#review_count').empty();
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty();
            $("#applicants_list").empty(); 
            $("#move_to").empty();
            $("#review_section").empty();
            $("#reject_section").empty();
          //location.reload();
        $("#review").load(location.href+" #review>*", "");
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var new_reject_list = data.new_reject_list;
        var new_reivew_list = data.review_list;
        var work_experiences = data.work_experiences;
        var userlist = data.user;
 
        console.log(new_reivew_list);
        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $('#sorted_count').append(sorted_count);
        $('#shortlist_count').append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hired_count").append(hired_count);

        if(isEmpty(newapplication_list)) {
        $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
         var count = 0;
        var status = '';
        var content_v = '';
        var uprofile = null;

// // update rejected List
 $.each(new_reject_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
 
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
    var avatar = getAvatar(userlist, user);
            //loop through experience to get candidates
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap butt"> <figure> <img src="/uploads/avatars/'+ avatar +'" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
 });
  count++;
// update In-review List
  $.each(new_reivew_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
 
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
    var avatar = getAvatar(userlist, value.user_id);
            //loop through experience to get candidates
            var review_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap butt"> <figure> <img src="/uploads/avatars/'+ avatar +'" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#review_section").append(review_content); 
        // $('#review_section').load('/employer/job/applicants');
 });

   count++;

      $.each(newapplication_list, function(key, value) {
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            var pix = null;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
    var avatar = getAvatar(userlist, value.user_id);
            //loop through experience to get candidates
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap butt"> <figure> <img src="/uploads/avatars/'+ avatar +'" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  

 
        });
   count++;

  });
 
    });
function compare_ID(user1) {
  // body...
 var user_rec = null;
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/view_user_record', 
            data:{
                '_token':$('input[name=_token').val(),
                'user_id':user1,  
            }, 
            success:function(data){
      
     },
     complete:function(data){ 
    $("#loader").hide();
    },
    }).done(function (data) {  
            console.log(data['user_record']);
              console.log(data['user_record']['firstname']);
    var code = data['user_record']['id'];
   $("#uprofile").append(data['user_record']['name']);
  });
  return user_rec;
}
   $('#shortlist{{$List_applicant->id}}').click(function() {
        //alert('shortlist');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/shortlist_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$List_applicant->id}}]').val(),
                'application_id':$('input[name=application_id{{$List_applicant->id}}]').val(),
                'user_id':$('input[name=user_id{{$List_applicant->id}}]').val(),
                'job_id':$('input[name=job_id{{$List_applicant->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            //console.log(data);
            $('#review_count').empty();   
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty();
            $("#offered_count").empty(); 
            $("#hire_count").empty();
            $('#shortlist_section').empty(); 
            $('#applicants_list').empty(); 
//$("#shortlist_me").load(location.href+" #shortlist_me>*", "");
        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hire_count = data.hire_count; 
        var work_experiences = data.work_experiences;
        var shortlisted_list = data.shortlisted_list;
        var newapplication_list = data.newapplication_list;
        var userlist = data.user;

        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $("#sorted_count").append(sorted_count);
        $("#shortlist_count").append(shortlisted_count); 
        $("#offered_count").append(offered_count);
        $("#hire_count").append(hire_count);

        //console.log(newapplication_list);
        if(isEmpty(newapplication_list)) {
        $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }

        var count = 0;
        var status = '';
        var content_v = '';
        var uprofile = null;

         $.each(shortlisted_list, function(key, value) {
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id; 
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
    var avatar = getAvatar(userlist, user);
            //loop through experience to get candidates

            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap butt"> <figure> <img src="/uploads/avatars/'+avatar +'" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#shortlist_section').append(content);  

 
        });
          count++;
         $.each(newapplication_list, function(key, value) {
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id; 
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
    var avatar = getAvatar(userlist, user);
            //loop through experience to get candidates
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/'+ avatar+'" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  

 
        });
 count++;
  });
 
    });



   $('#offered{{$List_applicant->id}}').click(function() {
        alert('offered');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/offered_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$List_applicant->id}}]').val(),
                'application_id':$('input[name=application_id{{$List_applicant->id}}]').val(),
                'user_id':$('input[name=user_id{{$List_applicant->id}}]').val(),
                'job_id':$('input[name=job_id{{$List_applicant->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $("#review_count").empty();   
            $("#reject_count").empty(); 
           $("#sorted_count").empty();
           $("#shortlist_count").empty(); 
           $("#offered_count").empty();
            $("#hire_count").empty(); 
              $('#offered_section').empty();  
            $('#applicants_list').empty(); 


        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hire_count = data.hire_count;
        var new_offered_list = data.new_offered_list;
        var userlist = data.user;
        var work_experiences = data.work_experiences;
        var newapplication_list = data.newapplication_list;
           var count = 0;

 
    $("#reject_count").append(rejected);
    $("#review_count").append(in_review_count);
    $("#sorted_count").append(sorted_count);
   $("#shortlist_count").append(shortlisted_count);
   $("#offered_count").append(offered_count);
    $("#hire_count").append(hire_count);

     $.each(new_offered_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
 
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
    var avatar = getAvatar(userlist, user);
 
            //loop through experience to get
        var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/'+ avatar +'" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+ ' ' +'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#offered_section").append(content); 
 });
           $.each(newapplication_list, function(key, value) {
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            // var company = value.id;
            // var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
    var avatar = getAvatar(userlist, user); 

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/'+ avatar +'" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+ ' ' +'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  
 
});

  });
 
    });
   
$('#hire{{$List_applicant->id}}').click(function() {
        alert('Hire Now');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/hire_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$List_applicant->id}}]').val(),
                'application_id':$('input[name=application_id{{$List_applicant->id}}]').val(),
                'user_id':$('input[name=user_id{{$List_applicant->id}}]').val(),
                'job_id':$('input[name=job_id{{$List_applicant->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
           //console.log(data);
          $("#review_count").empty();   
          $("#reject_count").empty(); 
          $("#sorted_count").empty();
          $("#shortlist_count").empty(); 
          $("#offered_count").empty();
          $("#hired_count").empty();  

          $("#applicants_list").empty(); 
          $("#move_to").empty();
          $("#hire_section").empty();
            // $("#reject_section").empty();

         //window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hired_count = data.hired_count;
        var in_review_count = data.review_count;
        var newapplication_list = data.newapplication_list;
        var hired_list = data.hired_list;
        var review_list = data.review_list;
        var work_experiences = data.work_experiences;
        var documents = data.documents;
        var userlist = data.user;
 
        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $("#sorted_count").append(sorted_count);
        $("#shortlist_count").append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hired_count").append(hired_count);

  

        if(isEmpty(hired_list)) {  
        $('#hire_section').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
        
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 

        var count = 0;
        var status = '';
        var content_v = '';
        var user = null;
        var title = null;
        var company = null;
// // update rejected applicant List coming from in-review Tab
 $.each(hired_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
 
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
            company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            var avatar = getAvatar(userlist, user);

            //loop through experience to get candidates experience@foreach($documentList as $document) 
        var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/'+ avatar +'" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+ ' ' +'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#hire_section").append(content); 
 });

// update rejected applicants Resume list

// update In-review List
  $.each(review_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
    var avatar = getAvatar(userlist, user);

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content_r = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/'+ avatar +'" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+ ' ' +'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#review_section").append(content_r); 
 });


      $.each(newapplication_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            // var company = value.id;
            // var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
    var avatar = getAvatar(userlist, user); 

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/'+avatar +'" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+ ' ' +'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  
 

        count++;
        // content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });
    $("#move_to").append(content_v); 




  });
 
    });
 @endforeach



  // End automatch applicants



   @foreach($rejected_list as $rejected_applicant)  
  $('#savedescription{{$rejected_applicant->id}}').click(function() {
 alert('Rejected on reject section');
 alert($('input[name=rejected{{$rejected_applicant->id}}]').val());
 
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/reject_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$rejected_applicant->id}}]').val(),
                'application_id':$('input[name=application_id{{$rejected_applicant->id}}]').val(),
                'user_id':$('input[name=user_id{{$rejected_applicant->id}}]').val(),
                'job_id':$('input[name=job_id{{$rejected_applicant->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
         $('#review_count').empty();
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty();
            $("#applicants_list").empty(); 
            $("#move_to").empty();
            $("#review_section").empty();
            $("#reject_section").empty();

        //window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
        var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count; 
            $("#reject_count").append(rejected);
            $('#sorted_count').append(sorted_count);
            $("#review_count").append(in_review_count);
            $("#shortlist_count").append(shortlisted_count);
 
  });
 
    });




    $('#in_review{{$rejected_applicant->id}}').click(function() {


        alert('in_review on rejected section');


         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/review_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$rejected_applicant->id}}]').val(),
                'application_id':$('input[name=application_id{{$rejected_applicant->id}}]').val(),
                'user_id':$('input[name=user_id{{$rejected_applicant->id}}]').val(),
                'job_id':$('input[name=job_id{{$rejected_applicant->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $('#review_count').empty();
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $("#hired_count").empty();
            $('#shortlist_count').empty(); 
            $("#move_to").empty();
            $("#review_section").empty();
            $("#reject_section").empty();
            // hide review Side display
      // window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var new_reject_list = data.new_reject_list;
        var hired_count = data.hired_count;
        var work_experiences = data.work_experiences;
        var review_list = data.review_list;
        var userlist = data.user;
        //console.log(new_reject_list);
        // console.log(newapplication_list);

        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $('#sorted_count').append(sorted_count);
        $('#shortlist_count').append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hired_count").append(hired_count);

        if(isEmpty(new_reject_list)) {
        $('#reject_section').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 

        var count = 0;
        var status = '';
        var content_v = ''; 
        var user = null;
        var title = null;
        var company = null;
// // update rejected applicant List coming from in-review Tab
 $.each(new_reject_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
       console.log(candidates_name);
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
    var avatar = getAvatar(userlist, user); 

            //loop through experience to 
        var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap butt"> <figure> <img src="/uploads/avatars/'+ avatar +'" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
 });

// update rejected applicants Resume list

// update In-review List
  $.each(review_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
     var avatar = getAvatar(userlist, user); 
            //loop through experience to get  
            var content_r = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap butt"> <figure> <img src="/uploads/avatars/'+ avatar +'" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#review_section").append(content_r); 
 });

    $("#move_to").append(content_v); 

});
 

    });
    $('#shortlist{{$rejected_applicant->id}}').click(function() {
        alert('shortlist');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/shortlist_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$rejected_applicant->id}}]').val(),
                'application_id':$('input[name=application_id{{$rejected_applicant->id}}]').val(),
                'user_id':$('input[name=user_id{{$rejected_applicant->id}}]').val(),
                'job_id':$('input[name=job_id{{$rejected_applicant->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $("#review_count").empty();   
            $("#reject_count").empty(); 
           $("#sorted_count").empty();
           $("#shortlist_count").empty(); 
           $("#offered_count").empty();
            $("#hire_count").empty();   

         window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
           var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var new_reject_list = data.new_reject_list;
        var hire_count = data.hire_count;
        var review_list = data.review_list;
        console.log(review_list);
        console.log(newapplication_list);
        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $('#sorted_count').append(sorted_count);
        $('#shortlist_count').append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hire_count").append(hire_count);

        if(isEmpty(newapplication_list)) {
        $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 

        var count = 0;
        var status = '';
        var content_v = '';
// // update rejected applicant List coming from in-review Tab
 $.each(new_reject_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
        var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
 });

// update rejected applicants Resume list

// update In-review List
  $.each(review_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content_r = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#review_section").append(content_r); 
 });



  });
 
    });
   


   $('#offered{{$rejected_applicant->id}}').click(function() {
        alert('Offer');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/offered_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$rejected_applicant->id}}]').val(),
                'application_id':$('input[name=application_id{{$rejected_applicant->id}}]').val(),
                'user_id':$('input[name=user_id{{$rejected_applicant->id}}]').val(),
                'job_id':$('input[name=job_id{{$rejected_applicant->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $("#review_count").empty();   
            $("#reject_count").empty(); 
           $("#sorted_count").empty();
           $("#shortlist_count").empty(); 
           $("#offered_count").empty();
            $("#hire_count").empty();   

         window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
    var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var new_reject_list = data.new_reject_list;
        var hire_count = data.hire_count;
        var review_list = data.review_list;
        var offered_count = data.offered_count;

        console.log(review_list);//

        console.log(newapplication_list);
        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $('#sorted_count').append(sorted_count);
        $('#shortlist_count').append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hire_count").append(hire_count);

        if(isEmpty(newapplication_list)) {
        $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 

        var count = 0;
        var status = '';
        var content_v = '';
// // update rejected applicant List coming from in-review Tab
 $.each(new_reject_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
        var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
 });

// update rejected applicants Resume list

// update In-review List
  $.each(review_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content_r = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#review_section").append(content_r); 
 });


  });
 
    });
   
$('#hire{{$rejected_applicant->id}}').click(function() {
        alert('shortlist');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/hire_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$rejected_applicant->id}}]').val(),
                'application_id':$('input[name=application_id{{$rejected_applicant->id}}]').val(),
                'user_id':$('input[name=user_id{{$rejected_applicant->id}}]').val(),
                'job_id':$('input[name=job_id{{$rejected_applicant->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $("#review_count").empty();   
            $("#reject_count").empty(); 
           $("#sorted_count").empty();
           $("#shortlist_count").empty(); 
           $("#offered_count").empty();
           $("#hire_count").empty();  

          window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
         var offered_count = data.offered_count;
        var hired_count = data.hired_count;

        console.log(in_review_count);
        console.log(sorted_count);
        console.log(rejected);
    $("#reject_count").append(rejected);
    $("#review_count").append(in_review_count);
    $("#sorted_count").append(sorted_count);
   $("#shortlist_count").append(shortlisted_count);
   $("#offered_count").append(offered_count);
   $("#hire_count").append(hire_count);

  });
 
    });
 @endforeach


// in Review Section
   @foreach($review_list as $review)  
  $('#savedescription{{$review->id}}').click(function() {
    alert('Rejected review hereeerereerexxxxxxxxxxx');
   // alert($('input[name=rejected{{$review->id}}]').val());
         
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/reject_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$review->id}}]').val(),
                'application_id':$('input[name=application_id{{$review->id}}]').val(),
                'user_id':$('input[name=user_id{{$review->id}}]').val(),
                'job_id':$('input[name=job_id{{$review->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
             $('#review_count').empty();
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty();
            $("#applicants_list").empty(); 
            $("#move_to").empty();
            $("#review_section").empty();
            $("#reject_section").empty();

         window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
        var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var review_list = data.review_list;
        var new_reject_list = data.new_reject_list;
        console.log(rejected);
        console.log(newapplication_list);

            if(isEmpty(newapplication_list)) {
            $('#applicants_list_j').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
            $('#resume_body').empty();
            $('#resume_body').append('No Record(s) Found'); 
 
            }

            $("#reject_count").append(rejected);
            $('#sorted_count').append(sorted_count);
            $("#review_count").append(in_review_count);
            $("#shortlist_count").append(shortlisted_count); 

        var count = 0;
        var status = '';
        var content_v = '';
         $.each(new_reject_list, function(key, value){

        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
 });
    $.each(review_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#review_section").append(content); 
      
 });

      $.each(newapplication_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  
        // $("#review_section").append(content); 


        count++;
        content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';

           });
          
 
  });
 
    });
 
    $('#in_review{{$review->id}}').click(function() {
        alert('in_review review nowsssssssssssssssssssss');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/review_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$review->id}}]').val(),
                'application_id':$('input[name=application_id{{$review->id}}]').val(),
                'user_id':$('input[name=user_id{{$review->id}}]').val(),
                'job_id':$('input[name=job_id{{$review->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $('#review_count').empty();
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty();
            $("#applicants_list").empty(); 
            $("#move_to").empty();
            $("#review_section").empty();
            $("#reject_section").empty();
            $("#hired_count").empty();
         //window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var new_reject_list = data.new_reject_list;
        var review_list = data.review_list;
        var hired_count = data.hired_count;
        console.log(rejected);
        console.log(newapplication_list); 
        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $('#sorted_count').append(sorted_count);
        $('#shortlist_count').append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hired_count").append(hired_count);

        if(isEmpty(newapplication_list)) {
        $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 

        var count = 0;
        var status = '';
        var content_v = '';
// // update rejected List
 $.each(review_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#review_section").append(content); 
 });
// update In-review List
  $.each(review_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content_r = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content_r); 
 });


      $.each(newapplication_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  
        // $("#review_section").append(content); 


        count++;
        content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });


  });
 
    });

   $('#shortlist{{$review->id}}').click(function() {
        alert('shortlisting applicant in REview Section ?' );
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/shortlist_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$review->id}}]').val(),
                'application_id':$('input[name=application_id{{$review->id}}]').val(),
                'user_id':$('input[name=user_id{{$review->id}}]').val(),
                'job_id':$('input[name=job_id{{$review->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $('#review_count').empty();   
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty();
            $("#offered_count").empty(); 
            $("#hired_count").empty();  
            $("#review_section").empty();
            $("#shortlist_section").empty(); 

       //window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hired_count = data.hired_count;

        var newapplication_list = data.newapplication_list;
        var shortlisted_list = data.shortlisted_list;
        var new_review_list = data.new_review_list;
        var work_experiences  = data.work_experiences;


        console.log(shortlisted_list);
        console.log(newapplication_list);

        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $('#sorted_count').append(sorted_count);
        $('#shortlist_count').append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hired_count").append(hired_count);

        if(isEmpty(new_review_list)) {
        $('#review_section').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 
        var count = 0;
        var status = '';
        var content_v = '';
        var company = '';
        var title = '';
        var candidates_name = '';

  $.each(shortlisted_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            candidates_name = value.candidates_name; 
            company = value.id;
            title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);

            //loop through experience to get candidates experience  
            var content_r = '<li class="careerfy-column-12"><a href="#tab_6_1'+ application_id  +'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#shortlist_section").append(content_r); 
 });


      $.each(new_review_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            candidates_name = value.candidates_name; 
                company = value.id;
                title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
            company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
                // $('#e').append(newapplication_content);  
       $("#review_section").append(newapplication_content); 


        count++;
        // content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });


  });
 
});



   $('#offered{{$review->id}}').click(function() {
        alert('Offered from shortlist');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/offered_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$review->id}}]').val(),
                'application_id':$('input[name=application_id{{$review->id}}]').val(),
                'user_id':$('input[name=user_id{{$review->id}}]').val(),
                'job_id':$('input[name=job_id{{$review->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $("#review_count").empty();   
            $("#reject_count").empty(); 
           $("#sorted_count").empty();
           $("#shortlist_count").empty(); 
           $("#offered_count").empty();
            $("#hire_count").empty();  
            $("#review_section").empty();
            $("#offered_section").empty();   

        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hired_count = data.hired_count;

        var newapplication_list = data.newapplication_list;
        var new_review_list = data.new_review_list;
        var new_offered_list = data.new_offered_list;
        var work_experiences  = data.work_experiences; 

        console.log(in_review_count);
        console.log(sorted_count);
        console.log(rejected);
    $("#reject_count").append(rejected);
    $("#review_count").append(in_review_count);
    $("#sorted_count").append(sorted_count);
   $("#shortlist_count").append(shortlisted_count);
   $("#offered_count").append(offered_count); 
     $("#hired_count").append(hired_count);

            if(isEmpty(new_offered_list)) {
        $('#review_section').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 
        var count = 0;
        var status = '';
        var content_v = '';
        var company = '';
        var title = '';
        var candidates_name = '';

  $.each(new_offered_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            candidates_name = value.candidates_name; 
            company = value.id;
            title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);

            //loop through experience to get candidates experience  
            var content_r = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#offered_section").append(content_r); 
 });


      $.each(new_review_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            candidates_name = value.candidates_name; 
                company = value.id;
                title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
            company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
                // $('#e').append(newapplication_content);  
       $("#review_section").append(newapplication_content); 


        count++;
        // content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });

  });
 
    });
   
$('#hire{{$review->id}}').click(function() {
        alert('shortlist');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/hire_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$review->id}}]').val(),
                'application_id':$('input[name=application_id{{$review->id}}]').val(),
                'user_id':$('input[name=user_id{{$review->id}}]').val(),
                'job_id':$('input[name=job_id{{$review->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $("#review_count").empty();   
            $("#reject_count").empty(); 
           $("#sorted_count").empty();
           $("#shortlist_count").empty(); 
           $("#offered_count").empty();
           $("#hired_count").empty();  
            $("#review_section").empty();
            $("#hire_section").empty();   

        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
         var offered_count = data.offered_count;
        var hired_count = data.hired_count;

      
        var newapplication_list = data.newapplication_list;
        var new_review_list = data.new_review_list;
        var hired_list = data.hired_list;
        var work_experiences  = data.work_experiences; 
        console.log(hired_count);
        console.log(hired_list);
        console.log(new_review_list); 
    $("#reject_count").append(rejected);
    $("#review_count").append(in_review_count);
    $("#sorted_count").append(sorted_count);
   $("#shortlist_count").append(shortlisted_count);
   $("#offered_count").append(offered_count);
    $("#hired_count").append(hired_count);


            if(isEmpty(hired_list)) {
        $('#review_section').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 
        var count = 0;
        var status = '';
        var content_v = '';
        var company = '';
        var title = '';
        var candidates_name = '';

  $.each(hired_list, function(key, value){
    console.log(value.id);
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            candidates_name = value.candidates_name; 
            company = value.id;
            title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);

            //loop through experience to get candidates experience  
            var content_r = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#hire_section").append(content_r); 
 });


      $.each(new_review_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            candidates_name = value.candidates_name; 
                company = value.id;
                title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
            company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
                // $('#e').append(newapplication_content);  
       $("#review_section").append(newapplication_content); 


        count++;
        // content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });
  });
 
    });

   @endforeach



@foreach($shortlisted_list as $shortlisted)
  $('#savedescription{{$shortlisted->id}}').click(function() {
    alert('Rejected shortlisted hereeerereerexxxxxxxxxxx'); 
         
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/reject_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$shortlisted->id}}]').val(),
                'application_id':$('input[name=application_id{{$shortlisted->id}}]').val(),
                'user_id':$('input[name=user_id{{$shortlisted->id}}]').val(),
                'job_id':$('input[name=job_id{{$shortlisted->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
             $('#review_count').empty();
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty();
            $("#applicants_list").empty(); 
            $("#move_to").empty();
            $("#review_section").empty();
            $("#reject_section").empty();
            $("#shortlist_section").empty();

         //window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
        var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var review_list = data.review_list;
        var new_reject_list = data.new_reject_list;
        var new_shortlisted = data.new_shortlisted;
        console.log(rejected);
        console.log(newapplication_list);

            if(isEmpty(newapplication_list)) {
            $('#applicants_list_j').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
            $('#resume_body').empty();
            $('#resume_body').append('No Record(s) Found'); 
 
            }

            $("#reject_count").append(rejected);
            $('#sorted_count').append(sorted_count);
            $("#review_count").append(in_review_count);
            $("#shortlist_count").append(shortlisted_count); 

        var count = 0;
        var status = '';
        var content_v = '';
         $.each(new_reject_list, function(key, value){

        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
           company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
 });
    $.each(review_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
           company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#review_section").append(content); 
      
 });
        $.each(new_shortlisted, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
           company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#shortlist_section").append(content); 
      
 });

      $.each(newapplication_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
           company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  
        // $("#review_section").append(content); 


        count++;
        content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });
          
 
  });
 
    });
 
    $('#in_review{{$shortlisted->id}}').click(function() {
        alert('in_review shortlisted');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/review_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$shortlisted->id}}]').val(),
                'application_id':$('input[name=application_id{{$shortlisted->id}}]').val(),
                'user_id':$('input[name=user_id{{$shortlisted->id}}]').val(),
                'job_id':$('input[name=job_id{{$shortlisted->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $('#review_count').empty();
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty();
            $("#applicants_list").empty(); 
            $("#move_to").empty();
            $("#review_section").empty();
            $("#reject_section").empty();
            $("#hired_count").empty();
            $("#shortlist_section").empty();
         //window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var new_reject_list = data.new_reject_list;
        var review_list = data.review_list;
        var hired_count = data.hired_count;
        var shortlisted_list = data.shortlisted_list;
        var work_experiences = data.work_experiences;
        console.log(rejected);
        console.log(newapplication_list);
        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $('#sorted_count').append(sorted_count);
        $('#shortlist_count').append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hired_count").append(hired_count);

        if(isEmpty(newapplication_list)) {
        $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 

        var count = 0;
        var status = '';
        var content_v = '';
// // update rejected List
 $.each(new_reject_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
           company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
 });
// update In-review List
  $.each(review_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
           company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#review_section").append(content); 
 });
   $.each(shortlisted_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
           company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#shortlist_section").append(content); 
 });

 
      $.each(newapplication_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
           company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  
        // $("#review_section").append(content); 


        count++;
        content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });


  });
 
    });

   $('#shortlist{{$shortlisted->id}}').click(function() {
        alert('shortlist...s dddddddddddddddd');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/shortlist_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$shortlisted->id}}]').val(),
                'application_id':$('input[name=application_id{{$shortlisted->id}}]').val(),
                'user_id':$('input[name=user_id{{$shortlisted->id}}]').val(),
                'job_id':$('input[name=job_id{{$shortlisted->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
                $('#review_count').empty();   
                $('#reject_count').empty(); 
                $('#sorted_count').empty();
                $('#shortlist_count').empty();
                $("#offered_count").empty(); 
                $("#hire_count").empty();  

       //window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hire_count = data.hire_count;

        console.log(in_review_count);
        console.log(sorted_count);
        console.log(rejected);
    $("#reject_count").append(rejected);
    $("#review_count").append(in_review_count);
    $("#sorted_count").append(sorted_count);
   $("#shortlist_count").append(shortlisted_count); 
  $("#offered_count").append(offered_count);
   $("#hire_count").append(hire_count);

  });
 
    });

   $('#offered{{$shortlisted->id}}').click(function() {
        alert('From shortlist, make na offer');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/offered_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$shortlisted->id}}]').val(),
                'application_id':$('input[name=application_id{{$shortlisted->id}}]').val(),
                'user_id':$('input[name=user_id{{$shortlisted->id}}]').val(),
                'job_id':$('input[name=job_id{{$shortlisted->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $("#review_count").empty();   
            $("#reject_count").empty(); 
            $("#sorted_count").empty();
            $("#shortlist_count").empty(); 
            $("#offered_count").empty();
            $("#hired_count").empty();   
            $("#shortlist_section").empty(); 
            $("#offered_section").empty();  
    
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hired_count = data.hired_count;

        var newshortlist = data.shortlisted_list; 
        var new_offered_list = data.new_offered_list;
        var work_experiences = data.work_experiences

        console.log(in_review_count);
        console.log(sorted_count);
        console.log(rejected);

        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $("#sorted_count").append(sorted_count);
        $("#shortlist_count").append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hired_count").append(hired_count);

        console.log(rejected);
        console.log(newshortlist); 

        if(isEmpty(newshortlist)) {
        $('#shortlist_section').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 

        var count = 0;
        var status = '';
        var content_v = '';
// // update rejected List
 $.each(newshortlist, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#shortlist_section").append(content); 
 });
// update In-review List
  $.each(new_offered_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
            company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content_r = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#offered_section").append(content_r); 
 });

 


  });
 
    });
   
$('#hire{{$shortlisted->id}}').click(function() {
        alert('hire now');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/hire_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$shortlisted->id}}]').val(),
                'application_id':$('input[name=application_id{{$shortlisted->id}}]').val(),
                'user_id':$('input[name=user_id{{$shortlisted->id}}]').val(),
                'job_id':$('input[name=job_id{{$shortlisted->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
                $("#review_count").empty();   
                $("#reject_count").empty(); 
                $("#sorted_count").empty();
                $("#shortlist_count").empty(); 
                $("#offered_count").empty();
                $("#hire_count").empty();  

        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hired_count = data.hired_count;
        var newapplication_list = data.review_list;
        var hired_list = data.hired_list;
        var offer_list = data.offer_list;

        console.log(in_review_count);
        console.log(sorted_count);
        console.log(hire_count);
            $("#reject_count").append(rejected);
            $("#review_count").append(in_review_count);
            $("#sorted_count").append(sorted_count);
            $("#shortlist_count").append(shortlisted_count);
            $("#offered_count").append(offered_count);
            $("#hired_count").append(hired_count);

  if(isEmpty(newapplication_list)) {
            $('#applicants_list_j').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
            $('#resume_body').empty();
            $('#resume_body').append('No Record(s) Found'); 
            }

            $("#reject_count").append(rejected);
            $('#sorted_count').append(sorted_count);
            $("#review_count").append(in_review_count);
            $("#shortlist_count").append(shortlisted_count); 

        var count = 0;
        var status = '';
        var content_v = '';
        var company = '';
        var title = '';

        // update Hired List
         $.each(hired_list, function(key, value){

        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
              company = value.id;
              title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
            company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
 });
         // update Offerlist
    $.each(review_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
            company = getWorkExperienceCompanyName(work_experiences, user);
            title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#review_section").append(content); 
      
 });

      $.each(newapplication_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
            company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  
        // $("#review_section").append(content); 


        count++;
        content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });
          

  });
 
    });
@endforeach

@foreach($offered_list as $offered)

 $('#savedescription{{$offered->id}}').click(function() {
    alert('Rejected offered hereeerereerexxxxxxxxxxx'); 
         
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/reject_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$offered->id}}]').val(),
                'application_id':$('input[name=application_id{{$offered->id}}]').val(),
                'user_id':$('input[name=user_id{{$offered->id}}]').val(),
                'job_id':$('input[name=job_id{{$offered->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
             $('#review_count').empty();
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty();
            $("#applicants_list").empty(); 
            $("#move_to").empty();
            $("#review_section").empty();
            $("#reject_section").empty();

         window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
        var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var review_list = data.review_list;
        var new_reject_list = data.new_reject_list;
        console.log(rejected);
        console.log(newapplication_list);

            if(isEmpty(newapplication_list)) {
            $('#applicants_list_j').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
            $('#resume_body').empty();
            $('#resume_body').append('No Record(s) Found'); 
 
            }

            $("#reject_count").append(rejected);
            $('#sorted_count').append(sorted_count);
            $("#review_count").append(in_review_count);
            $("#shortlist_count").append(shortlisted_count); 

        var count = 0;
        var status = '';
        var content_v = '';
         $.each(new_reject_list, function(key, value){

        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
 });
    $.each(review_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#review_section").append(content); 
      
 });

      $.each(newapplication_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  
        // $("#review_section").append(content); 


        count++;
        content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });
          
 
  });
 
    });
 
    $('#in_review{{$offered->id}}').click(function() {
        alert('in_review offered nowsssssssssssssssssssss');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/review_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$offered->id}}]').val(),
                'application_id':$('input[name=application_id{{$offered->id}}]').val(),
                'user_id':$('input[name=user_id{{$offered->id}}]').val(),
                'job_id':$('input[name=job_id{{$offered->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $('#review_count').empty();
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty();
            $("#applicants_list").empty(); 
            $("#move_to").empty();
            $("#review_section").empty();
            $("#reject_section").empty();
         window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var new_reject_list = data.new_reject_list;
        var new_reivew_list = data.new_reivew_list;
        var hired_count = data.hired_count;
        console.log(rejected);
        console.log(newapplication_list);
        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $('#sorted_count').append(sorted_count);
        $('#shortlist_count').append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hired_count").append(hired_count);

        if(isEmpty(newapplication_list)) {
        $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 

        var count = 0;
        var status = '';
        var content_v = '';
// // update rejected List
 $.each(new_reject_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
 });
// update In-review List
  $.each(new_reivew_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content_r = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content_r); 
 });


      $.each(newapplication_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  
        // $("#review_section").append(content); 


        count++;
        content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });


  });
 
    });

   $('#shortlist{{$offered->id}}').click(function() {
        alert('shortlist...s dddddddddddddddd');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/shortlist_appllicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$offered->id}}]').val(),
                'application_id':$('input[name=application_id{{$offered->id}}]').val(),
                'user_id':$('input[name=user_id{{$offered->id}}]').val(),
                'job_id':$('input[name=job_id{{$offered->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $('#review_count').empty();   
            $('#reject_count').empty(); 
           $('#sorted_count').empty();
           $('#shortlist_count').empty();
             $("#offered_count").empty(); 
            $("#hire_count").empty();  

       window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hire_count = data.hire_count;

        console.log(in_review_count);
        console.log(sorted_count);
        console.log(rejected);
    $("#reject_count").append(rejected);
    $("#review_count").append(in_review_count);
    $("#sorted_count").append(sorted_count);
   $("#shortlist_count").append(shortlisted_count); 
  $("#offered_count").append(offered_count);
   $("#hire_count").append(hire_count);

  });
 
    });



   $('#offered{{$offered->id}}').click(function() {
        alert('Offered');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/offered_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$offered->id}}]').val(),
                'application_id':$('input[name=application_id{{$offered->id}}]').val(),
                'user_id':$('input[name=user_id{{$offered->id}}]').val(),
                'job_id':$('input[name=job_id{{$offered->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $("#review_count").empty();   
            $("#reject_count").empty(); 
           $("#sorted_count").empty();
           $("#shortlist_count").empty(); 
           $("#offered_count").empty();
            $("#hire_count").empty();   

        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hire_count = data.hire_count;

        console.log(in_review_count);
        console.log(sorted_count);
        console.log(rejected);
    $("#reject_count").append(rejected);
    $("#review_count").append(in_review_count);
    $("#sorted_count").append(sorted_count);
   $("#shortlist_count").append(shortlisted_count);
   $("#offered_count").append(offered_count);
    $("#hire_count").append(hire_count);

  });
 
    });
   
$('#hire{{$offered->id}}').click(function() {
        alert('hire now offered');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/hire_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$offered->id}}]').val(),
                'application_id':$('input[name=application_id{{$offered->id}}]').val(),
                'user_id':$('input[name=user_id{{$offered->id}}]').val(),
                'job_id':$('input[name=job_id{{$offered->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $("#review_count").empty();   
            $("#reject_count").empty(); 
           $("#sorted_count").empty();
           $("#shortlist_count").empty(); 
           $("#offered_count").empty();
           $("#hired_count").empty();
           $("#hire_section").empty();
           $("#offered_section").empty();    
           

        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hired_count = data.hired_count; 
        var hired_list = data.hired_list;
        var newoffered_list = data.newoffered_list; 
        var work_experiences = data.work_experiences;
  
     
        if(isEmpty(newoffered_list)) {
        $('#offered_section').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 

    console.log(rejected); 
    console.log(in_review_count);
    console.log(sorted_count);
    console.log(hired_count);
        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $("#sorted_count").append(sorted_count);
        $("#shortlist_count").append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hired_count").append(hired_count);
        var company = '';
        var title = '';

      $.each(newoffered_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
                company = value.id;
                title = value.id;
            var tag_id = value.tag_id;
 
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#offered_section').append(newapplication_content);  
        // $("#review_section").append(content); 
  
        });


            $.each(hired_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
                company = value.id;
                title = value.id;
            var tag_id = value.tag_id;
 
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#hire_section').append(newapplication_content);  
        // $("#review_section").append(content); 
  
        });

  });
 
    });

@endforeach

@foreach($hired_list as $hired)
  $('#savedescription{{$hired->id}}').click(function() {
 alert('Rejected From Hire'); 
 
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/reject_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$hired->id}}]').val(),
                'application_id':$('input[name=application_id{{$hired->id}}]').val(),
                'user_id':$('input[name=user_id{{$hired->id}}]').val(),
                'job_id':$('input[name=job_id{{$hired->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
             $('#review_count').empty();
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty();
            $("#applicants_list").empty(); 
            $("#move_to").empty();
            $("#review_section").empty();
            $("#reject_section").empty();

        //window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) {
        var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var new_reject_list = data.new_reject_list;
        var work_experiences = data.work_experiences;
        var hired_list = data.hired_list;
        console.log(rejected);
        console.log(newapplication_list);

            if(isEmpty(newapplication_list)) {
            $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
            $('#resume_body').empty();
            $('#resume_body').append('No Record(s) Found'); 
 
            }

            $("#reject_count").append(rejected);
            $('#sorted_count').append(sorted_count);
            $("#review_count").append(in_review_count);
            $("#shortlist_count").append(shortlisted_count); 

        var count = 0;
        var status = '';
        var content_v = '';
 $.each(new_reject_list, function(key, value){
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
             content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
 });

 $("#move_to").append(content_v); 

      $.each(newapplication_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  
        // $("#review_section").append(content); 


        count++;
        content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });
          
 
  });
 
    });
    $('#in_review{{$hired->id}}').click(function() {
        alert('in_reviewssss');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/review_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$hired->id}}]').val(),
                'application_id':$('input[name=application_id{{$hired->id}}]').val(),
                'user_id':$('input[name=user_id{{$hired->id}}]').val(),
                'job_id':$('input[name=job_id{{$hired->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $('#review_count').empty();
            $('#reject_count').empty(); 
            $('#sorted_count').empty();
            $('#shortlist_count').empty();
            $("#applicants_list").empty(); 
            $("#move_to").empty();
            $("#review_section").empty();
            $("#reject_section").empty();
          window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var rejected = data.reject_count;
        var sorted_count = data.sorted_count;
        var in_review_count = data.review_count;
        var shortlisted_count = data.shortlisted_count;
        var newapplication_list = data.newapplication_list;
        var new_reject_list = data.new_reject_list;
        var new_reivew_list = data.new_reivew_list;
        console.log(rejected);
        console.log(newapplication_list);
        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $('#sorted_count').append(sorted_count);
        $('#shortlist_count').append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hire_count").append(hire_count);

        if(isEmpty(newapplication_list)) {
        $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 

        var count = 0;
        var status = '';
        var content_v = '';
// // update rejected List
 $.each(new_reject_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
 });
// update In-review List
  $.each(new_reivew_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content_r = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content_r); 
 });


      $.each(newapplication_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  
        // $("#review_section").append(content); 


        count++;
        content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });
    $("#move_to").append(content_v); 



  });
 
    });

   $('#shortlist{{$hired->id}}').click(function() {
        alert('shortlist');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/shortlist_appllicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$hired->id}}]').val(),
                'application_id':$('input[name=application_id{{$hired->id}}]').val(),
                'user_id':$('input[name=user_id{{$hired->id}}]').val(),
                'job_id':$('input[name=job_id{{$hired->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $('#review_count').empty();   
            $('#reject_count').empty(); 
           $('#sorted_count').empty();
           $('#shortlist_count').empty();
             $("#offered_count").empty(); 
            $("#hire_count").empty();  

        //  window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hire_count = data.hire_count;

        console.log(in_review_count);
        console.log(sorted_count);
        console.log(rejected);
    $("#reject_count").append(rejected);
    $("#review_count").append(in_review_count);
    $("#sorted_count").append(sorted_count);
   $("#shortlist_count").append(shortlisted_count); 
  $("#offered_count").append(offered_count);
   $("#hire_count").append(hire_count);

  });
 
    });



   $('#offered{{$hired->id}}').click(function() {
        alert('Offered');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/offered_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$hired->id}}]').val(),
                'application_id':$('input[name=application_id{{$hired->id}}]').val(),
                'user_id':$('input[name=user_id{{$hired->id}}]').val(),
                'job_id':$('input[name=job_id{{$hired->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $("#review_count").empty();   
            $("#reject_count").empty(); 
           $("#sorted_count").empty();
           $("#shortlist_count").empty(); 
           $("#offered_count").empty();
            $("#hire_count").empty();   

          window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hire_count = data.hire_count;

        console.log(in_review_count);
        console.log(sorted_count);
        console.log(rejected);
    $("#reject_count").append(rejected);
    $("#review_count").append(in_review_count);
    $("#sorted_count").append(sorted_count);
   $("#shortlist_count").append(shortlisted_count);
   $("#offered_count").append(offered_count);
    $("#hire_count").append(hire_count);

  });
 
    });
   
$('#hire{{$hired->id}}').click(function() {
        alert('Hire Now');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/hire_applicant', 
            data:{
                '_token':$('input[name=_token').val(),
                'rejected':$('input[name=rejected{{$hired->id}}]').val(),
                'application_id':$('input[name=application_id{{$hired->id}}]').val(),
                'user_id':$('input[name=user_id{{$hired->id}}]').val(),
                'job_id':$('input[name=job_id{{$hired->tag_id}}]').val(),
               
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
            
             },
            success:function(data){
            console.log(data);
            $("#review_count").empty();   
            $("#reject_count").empty(); 
           $("#sorted_count").empty();
           $("#shortlist_count").empty(); 
           $("#offered_count").empty();
           $("#hire_count").empty();  

         window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    },
    }).done(function (data) { 
        var in_review_count = data.review_count;
        var sorted_count = data.sorted_count;
        var rejected = data.reject_count;
        var shortlisted_count = data.shortlisted_count;
        var offered_count = data.offered_count;
        var hired_count = data.hired_count;
        var in_review_count = data.review_count;
        var newapplication_list = data.newapplication_list;
        var new_reject_list = data.new_reject_list;
        var review_list = data.review_list;


        console.log(in_review_count);
        console.log(sorted_count);
        console.log(rejected);
        console.log(review_list);
        console.log(newapplication_list);
        
        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $("#sorted_count").append(sorted_count);
        $("#shortlist_count").append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hired_count").append(hired_count);

  

        if(isEmpty(newapplication_list)) {
        $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 

        var count = 0;
        var status = '';
        var content_v = '';
// // update rejected applicant List coming from in-review Tab
 $.each(hired_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
        var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#reject_section").append(content); 
 });

//   applicants Resume list

// push applicants Resume list
  $.each(review_list, function(key, value){
        var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content_r = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#review_section").append(content_r); 
 });


      $.each(newapplication_list, function(key, value) {
         console.log(value.id);
            var application_id = value.id;
            var email = value.email;
            var user = value.user_id;
            var candidates_name = value.candidates_name; 
            var company = value.id;
            var title = value.id;
            var tag_id = value.tag_id;
            if (count === 0 ) {
                status = 'active';
            }else{
                status = '';
            }

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  
        // $("#review_section").append(content); 


        count++;
        content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });
    $("#move_to").append(content_v); 


  });
 
    });


@endforeach


// Old search filter to be removed
$('#profession').change(function() {
  var values = [];
    var cboxArray = []; 
    function itemExistsChecker(cboxValue) {
          
    var len = cboxArray.length;
          
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (cboxArray[i] == cboxValue) {
          return true;
        }
      }
    }
          
    cboxArray.push(cboxValue);
  } 
   
  {
    $('#profession :checked').each(function() { 
     var cboxValue = $(this).val();
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
    console.log(cboxArray);
  }
});
 
$('#gender').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = []; 
    var location = [];
    var qualify = [];
    var job_terms = [];

    function itemExistsChecker(cboxValue) {
          
    var len = gender.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (gender[i] == cboxValue) {
          return true;
        }
      }
    }
          
    gender.push(cboxValue);
  } 
   
  {
    $('#gender :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(gender);
 
 filterByGenderd(gender,yeo_array,age,location,qualify,job_terms);
 
  }
});
 
$('#qulification').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = []; 
    var location = [];
    var job_terms = [];
    var qualify = [];
    function itemExistsChecker(cboxValue) {
          
    var len = cboxArray.length;
          
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (cboxArray[i] == cboxValue) {
          return true;
        }
      }
    }
          
    cboxArray.push(cboxValue);
  } 
    
    $('#qulification :checked').each(function() { 
     var cboxValue = $(this).val();
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
    });

  filterByGenderd(gender,yeo_array,age,location,qualify,job_terms);
 
});

 

$('#job_terms').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = []; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    function itemExistsChecker(cboxValue) {
          
    var len = job_terms.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (job_terms[i] == cboxValue) {
          return true;
        }
      }
    }
          
    job_terms.push(cboxValue);
  } 
   
  {
    $('#job_terms :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(job_terms);
 
 filterByGenderd(gender,yeo_array, age, location,qualify,job_terms);
 
  }
});
 

$('#age').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = []; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    function itemExistsChecker(cboxValue) {
          
    var len = age.length;
          
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (age[i] == cboxValue) {
          return true;
        }
      }
    }
          
    age.push(cboxValue);
  } 
  {
    $('#age :checked').each(function() {
    var cboxValue= $(this).val();

      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);

    });
    filterByGenderd(gender,yeo_array, age, location,qualify,job_terms);
    // console.log(cboxArray);
  }
});


$('#yearofexperience').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = []; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    function itemExistsChecker(cboxValue) {
          
    var len = yeo_array.length;
          
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (yeo_array[i] == cboxValue) {
          return true;
        }
      }
    }
          
    yeo_array.push(cboxValue);
  } 
   
  {
    $('#yearofexperience :checked').each(function() { 
     var cboxValue = $(this).val();
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    });  

filterByGenderd(gender,yeo_array, age,location,qualify,job_terms);
  }
});

$('#qualify').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = []; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    function itemExistsChecker(cboxValue) {
          
    var len = qualify.length;
          
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (qualify[i] == cboxValue) {
          return true;
        }
      }
    }
          
    qualify.push(cboxValue);
  } 
   
  {
    $('#qualify :checked').each(function() { 
     var cboxValue = $(this).val();
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    });  
 console.log(qualify);
filterByGenderd(gender,yeo_array, age, location,qualify,job_terms);
  }
});

$('#location').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = []; 
    var location = [];
    function itemExistsChecker(cboxValue) {
          
    var len = location.length;
          
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (location[i] == cboxValue) {
          return true;
        }
      }
    }
          
    location.push(cboxValue);
  } 
   
  {
    $('#location :checked').each(function() { 
     var cboxValue = $(this).val();
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    });  
 console.log(location);
 filterByGenderd(gender,yeo_array,age, location, job_terms);
  }
});



$('#career_level').change(function() {
  var values = [];
    var cboxArray = []; 
    function itemExistsChecker(cboxValue) {
          
    var len = cboxArray.length;
          
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (cboxArray[i] == cboxValue) {
          return true;
        }
      }
    }
          
    cboxArray.push(cboxValue);
  } 
   
  {
    $('#career_level :checked').each(function() { 
     var cboxValue = $(this).val();
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
    console.log(cboxArray);
  }
});
 
function filterByGenderd(gender, yeo, age, location, qualify, job_terms){
 // alert(location);
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/searchConditions', 
            data:{
                '_token':$('input[name=_token').val(),
                'gender':gender,
                'years_of_experience':yeo,
                'age':age,
                'location':location,
                'qualification':qualify,
                'job_terms':job_terms,
                'job_id':{{$job_id}},
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
    
             },
            success:function(data){
           // console.log(data);
           $('#applicants_list').empty();
           $('#hire_section').empty();
        // $("#industry-div").hide();
        // window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
       // $('#applicants_list').empty();
    $("#loader").hide();
    },
    }).done(function (data) {
  var code = data.applications;
  var sorted_applications = data.sorted_applications;
  var work_experiences = data.work_experiences;
  var new_hired_list = data.new_hired_list;
  var jobs_list = data.jobs_list;
  var candidates_name = '';
  var user = null;
  var resume_id = null;
  var job_id = data.job_id;

    if(isEmpty(code['data'])) {
        $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
          // $('#pages').empty();   
    }
       console.log(code['data']);
       console.log(sorted_applications); 
      console.log(job_id);
      console.log(new_hired_list);

      // hired list
      $.each(new_hired_list['data'], function(key, value){
            var id = value.id;
            resume_id = value.resume_id;
            user = value.user_id;
            var document_id = value.document_id;
            console.log(value.document_id);
            var tag_id = value.tag_id;
 
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);

  // $.each(sorted_applications, function(key, value){
    if(resume_id === value.resume_id){

        candidates_name = value.candidates_name;
    }
    
   // });
            //loop through experience to get candidates experience@foreach($documentList as $document) 
      var content ='<li class="careerfy-column-12"><a href="#tab_6_1'+value.id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        // $("#applicants_list").append(content); 
        $('#hire_section').append(content);

      });
 
 $.each(code['data'], function(key, value){
            var id = value.id;
            resume_id = value.resume_id;
            user = value.user_id;
            var document_id = value.document_id;
 //console.log(value.document_id);
            var tag_id = value.tag_id;
 
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);

  // $.each(sorted_applications, function(key, value){
    if(resume_id === value.resume_id){

        candidates_name = value.candidates_name;
    }
    
   // });
            //loop through experience to get candidates experience@foreach($documentList as $document) 
      var content ='<li class="careerfy-column-12"><a href="#tab_6_1'+value.id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $("#applicants_list").append(content); 
        $('#hire_section').append(content);
 });
 
  });
}


// beign unsorted section from


$('#gender_unsorted').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = gender.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (gender[i] == cboxValue) {
          return true;
        }
      }
    }
          
    gender.push(cboxValue);
  } 
   
  {
    $('#gender_unsorted :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(gender);
 
UnsortedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});


$('#location_unsorted').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = location.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (location[i] == cboxValue) {
          return true;
        }
      }
    }
          
    location.push(cboxValue);
  } 
   
  {
    $('#location_unsorted :checked').each(function() { 
     var cboxValue = $(this).val(); 
      //alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(location);
 
 UnsortedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
$('#availability_unsorted').change(function() {
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = availability.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (availability[i] == cboxValue) {
          return true;
        }
      }
    }
          
    availability.push(cboxValue);
  } 
   
  {
    $('#availability_unsorted :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(availability);
 
UnsortedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#career_level_unsorted').change(function() {
          var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = career_level.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (career_level[i] == cboxValue) {
          return true;
        }
      }
    }
          
    career_level.push(cboxValue);
  } 
   
  {
    $('#career_level_unsorted :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(career_level);
 
UnsortedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#job_terms_unsorted').change(function() {
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = career_level.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (job_terms[i] == cboxValue) {
          return true;
        }
      }
    }
          
    job_terms.push(cboxValue);
  } 
   
  {
    $('#job_terms_unsorted :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(job_terms);
 
 
UnsortedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
//

$('#age_unsorted').change(function() {
   
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

 
  {
    $('#age_unsorted :checked').each(function() { 
     age = $(this).val(); 
      //salert(age);
   
      $(this).prop('checked', true);
 
 
    }); 
   console.log(age);
 
 
UnsortedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});


 $('#yearofexperience_unsorted').change(function() {
        var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = yeo_array.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (yeo_array[i] == cboxValue) {
          return true;
        }
      }
    }
          
    yeo_array.push(cboxValue);
  } 
   
  {
    $('#yearofexperience_unsorted :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(yeo_array);
 
UnsortedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

  $('#salary_unsorted').change(function() {
   
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = salary.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (salary_hired[i] == cboxValue) {
          return true;
        }
      }
    }
          
    salary.push(cboxValue);
  } 
   
  {
    $('#salary_unsorted :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(salary);
 
UnsortedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
 
   $('#profession_unsorted').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = []; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = profession.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (profession[i] == cboxValue) {
          return true;
        }
      }
    }
          
    profession.push(cboxValue);
  } 
   
  {
    $('#profession_unsorted :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(profession);
 
UnsortedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
   $('#qualify_unsorted').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = qualify.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (profession[i] == cboxValue) {
          return true;
        }
      }
    }
          
    qualify.push(cboxValue);
  } 
   
  {
    $('#qualify_unsorted :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(qualify);
 
UnsortedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

 function UnsortedApplicantsFilter(gender, yeo, age, location, qualify, job_terms, career_level, availability, salary, profession){
    console.log(gender);
    console.log(yeo);
    console.log(age);
    console.log(location);
    console.log(qualify);
    console.log(job_terms);
    console.log(availability);
    console.log(profession);
    var check_section = 'unsorted';
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterUnsorted', 
            data:{
                '_token':$('input[name=_token').val(),
                'gender_unsorted':gender,
                'years_of_experience':yeo,
                'age':age,
                'location':location,
                'qualification':qualify,
                'job_terms':job_terms,
                'job_id':{{$job_id}},
                'check_section': check_section,
                'career_level':career_level,
                'availability':availability,
                'salary':salary,
                'profession':profession,
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
    
             },
            success:function(data){
          console.log(data); 
           $('#applicants_list').empty();
        // $("#industry-div").hide();
        // window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
       // $('#applicants_list').empty();
    $("#loader").hide();
    },
    }).done(function (data) {
  var code = data.applications;
  var sorted_applications = data.sorted_applications;
  var work_experiences = data.work_experiences;
  var default_unsorted_list = data.default_unsorted_list;
  var jobs_list = data.jobs_list;
  var candidates_name = '';
  var user = null;
  var resume_id = null;
  var job_id = data.job_id;

    if(isEmpty(code['data'])) {
        $('#applicants_list').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
          // $('#pages').empty();   
    }
       console.log(code['data']);
      console.log(job_id);
      // console.log(new_hired_list);

      // hired list
      $.each(code['data'], function(key, value){
            var id = value.id;
            resume_id = value.resume_id;
            user = value.user_id;
            var document_id = value.document_id;
            console.log(value.document_id);
            var tag_id = value.tag_id;
  if(resume_id === value.resume_id && value.sorted === 0){
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);

  // $.each(sorted_applications, function(key, value){ 
        candidates_name = value.candidates_name; 
   // });
            //loop through experience to get candidates experience@foreach($documentList as $document) 
      var content ='<li class="careerfy-column-12"><a href="#tab_6_1'+value.id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';

        $('#applicants_list').append(content);

}else{
console.log('am here');
}


      });
   
  });
}

// begin rejected


$('#gender_rejected').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = gender.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (gender[i] == cboxValue) {
          return true;
        }
      }
    }
          
    gender.push(cboxValue);
  } 
   
  {
    $('#gender_rejected :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(gender);
 
RejectedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});


$('#location_rejected').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = location.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (location[i] == cboxValue) {
          return true;
        }
      }
    }
          
    location.push(cboxValue);
  } 
   
  {
    $('#location_rejected :checked').each(function() { 
     var cboxValue = $(this).val(); 
      //alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(location);
 
 RejectedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
$('#availability_rejected').change(function() {
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = availability.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (availability[i] == cboxValue) {
          return true;
        }
      }
    }
          
    availability.push(cboxValue);
  } 
   
  {
    $('#availability_rejected :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(availability);
 
RejectedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#career_level_rejected').change(function() {
          var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = career_level.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (career_level[i] == cboxValue) {
          return true;
        }
      }
    }
          
    career_level.push(cboxValue);
  } 
   
  {
    $('#career_level_rejected :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(career_level);
 
RejectedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#job_terms_rejected').change(function() {
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = career_level.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (job_terms[i] == cboxValue) {
          return true;
        }
      }
    }
          
    job_terms.push(cboxValue);
  } 
   
  {
    $('#job_terms_rejected :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(job_terms);
 
 
RejectedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
//

$('#age_rejected').change(function() {
   
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

 
  {
    $('#age_rejected :checked').each(function() { 
     age = $(this).val(); 
      //salert(age);
   
      $(this).prop('checked', true);
 
 
    }); 
   console.log(age);
 
 
RejectedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});


 $('#yearofexperience_rejected').change(function() {
        var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = yeo_array.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (yeo_array[i] == cboxValue) {
          return true;
        }
      }
    }
          
    yeo_array.push(cboxValue);
  } 
   
  {
    $('#yearofexperience_rejected :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(yeo_array);
 
RejectedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

  $('#salary_rejected').change(function() {
   
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = salary.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (salary_hired[i] == cboxValue) {
          return true;
        }
      }
    }
          
    salary.push(cboxValue);
  } 
   
  {
    $('#salary_rejected :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(salary);
 
RejectedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
 
   $('#profession_rejected').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = []; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = profession.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (profession[i] == cboxValue) {
          return true;
        }
      }
    }
          
    profession.push(cboxValue);
  } 
   
  {
    $('#profession_rejected :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(profession);
 
RejectedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
   $('#qualify_rejected').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = qualify.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (profession[i] == cboxValue) {
          return true;
        }
      }
    }
          
    qualify.push(cboxValue);
  } 
   
  {
    $('#qualify_rejected:checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(qualify);
 
RejectedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

 function RejectedApplicantsFilter(gender, yeo, age, location, qualify, job_terms, career_level, availability, salary, profession){
    console.log(gender);
    console.log(yeo);
    console.log(age);
    console.log(location);
    console.log(qualify);
    console.log(job_terms);
    console.log(availability);
    console.log(profession);
    var check_section = 'rejected';
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterRejected', 
            data:{
                '_token':$('input[name=_token').val(),
                'gender_unsorted':gender,
                'years_of_experience':yeo,
                'age':age,
                'location':location,
                'qualification':qualify,
                'job_terms':job_terms,
                'job_id':{{$job_id}},
                'check_section': check_section,
                'career_level':career_level,
                'availability':availability,
                'salary':salary,
                'profession':profession,
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
    
             },
            success:function(data){
          console.log(data); 
           $('#reject_section').empty();
        // $("#industry-div").hide();
        // window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
       // $('#applicants_list').empty();
    $("#loader").hide();
    },
    }).done(function (data) {
  var code = data.applications;
  var sorted_applications = data.sorted_applications;
  var work_experiences = data.work_experiences;
  var default_unsorted_list = data.default_unsorted_list;
  var jobs_list = data.jobs_list;
  var candidates_name = '';
  var user = null;
  var resume_id = null;
  var job_id = data.job_id;

    if(isEmpty(code['data'])) {
        $('#reject_section').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
          // $('#pages').empty();   
    }
    console.log(code['data']);
    console.log(job_id);
      // console.log(new_hired_list);

      // hired list
      $.each(code['data'], function(key, value){
            var id = value.id;
            resume_id = value.resume_id;
            user = value.user_id;
            var document_id = value.document_id;
            console.log(value.document_id);
            var tag_id = value.tag_id;
  if(resume_id === value.resume_id && value.rejected === 1){
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);

  // $.each(sorted_applications, function(key, value){ 
        candidates_name = value.candidates_name; 
   // });
            //loop through experience to get candidates experience@foreach($documentList as $document) 
      var content ='<li class="careerfy-column-12"><a href="#tab_6_1'+value.id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';

        $('#reject_section').append(content);

}else{
console.log('am here');

}


      });
   
  });
}

// in review Section 


$('#gender_inreview').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = gender.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (gender[i] == cboxValue) {
          return true;
        }
      }
    }
          
    gender.push(cboxValue);
  } 
   
  {
    $('#gender_inreview :checked').each(function() { 
     var cboxValue = $(this).val(); 
  alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(gender);
 
InReviewApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});


$('#location_inreview').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = location.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (location[i] == cboxValue) {
          return true;
        }
      }
    }
          
    location.push(cboxValue);
  } 
   
  {
    $('#location_inreview :checked').each(function() { 
     var cboxValue = $(this).val(); 
      //alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(location);
 
 InReviewApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#availability_inreview').change(function() {
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = availability.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (availability[i] == cboxValue) {
          return true;
        }
      }
    }
          
    availability.push(cboxValue);
  } 
   
  {
    $('#availability_inreview :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(availability);
 
InReviewApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#career_level_inreview').change(function() {
          var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = career_level.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (career_level[i] == cboxValue) {
          return true;
        }
      }
    }
          
    career_level.push(cboxValue);
  } 
   
  {
    $('#career_level_inreview :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(career_level);
 
InReviewApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#job_terms_inreview').change(function() {
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = career_level.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (job_terms[i] == cboxValue) {
          return true;
        }
      }
    }
          
    job_terms.push(cboxValue);
  } 
   
  {
    $('#job_terms_inreview:checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(job_terms);
 
 
InReviewApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
//

$('#age_inreview').change(function() {
   
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

 
  {
    $('#age_inreview :checked').each(function() { 
     age = $(this).val(); 
      //salert(age);
   
      $(this).prop('checked', true);
 
 
    }); 
   console.log(age);
 
 
InReviewApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});


 $('#yearofexperience_inreview').change(function() {
        var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = yeo_array.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (yeo_array[i] == cboxValue) {
          return true;
        }
      }
    }
          
    yeo_array.push(cboxValue);
  } 
   
  {
    $('#yearofexperience_inreview :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(yeo_array);
 
InReviewApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

  $('#salary_inreview').change(function() {
   
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = salary.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (salary_hired[i] == cboxValue) {
          return true;
        }
      }
    }
          
    salary.push(cboxValue);
  } 
   
  {
    $('#salary_inreview :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(salary);
 
InReviewApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
 
   $('#profession_inreview').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = []; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = profession.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (profession[i] == cboxValue) {
          return true;
        }
      }
    }
          
    profession.push(cboxValue);
  } 
   
  {
    $('#profession_inreview :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(profession);
 
InReviewApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
   $('#qualify_inreview').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = qualify.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (profession[i] == cboxValue) {
          return true;
        }
      }
    }
          
    qualify.push(cboxValue);
  } 
   
  {
    $('#qualify_inreview:checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(qualify);
 
InReviewApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

 function InReviewApplicantsFilter(gender, yeo, age, location, qualify, job_terms, career_level, availability, salary, profession){
    console.log(gender);
    // console.log(yeo);
    // console.log(age);
    // console.log(location);
    // console.log(qualify);
    // console.log(job_terms);
    // console.log(availability);
    // console.log(profession);
    var check_section = 'inreview';
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterInReview', 
            data:{
                '_token':$('input[name=_token').val(),
                'gender':gender,
                'years_of_experience':yeo,
                'age':age,
                'location':location,
                'qualification':qualify,
                'job_terms':job_terms,
                'job_id':{{$job_id}},
                'check_section': check_section,
                'career_level':career_level,
                'availability':availability,
                'salary':salary,
                'profession':profession,
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
    
             },
            success:function(data){
          console.log(data); 

           $('#review_section').empty();

        // $("#industry-div").hide();
        // window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
       // $('#applicants_list').empty();
    $("#loader").hide();
    },
    }).done(function (data) {
  var code = data.applications;
  var sorted_applications = data.sorted_applications;
  var work_experiences = data.work_experiences;
  var default_unsorted_list = data.default_unsorted_list;
  var jobs_list = data.jobs_list;
  var candidates_name = '';
  var user = null;
  var resume_id = null;
  var job_id = data.job_id;

    if(isEmpty(code['data'])) {
        $('#review_section').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
          // $('#pages').empty();   
    }
       console.log(code['data']);
      console.log(job_id);
      // console.log(new_hired_list);

      // hired list
      $.each(code['data'], function(key, value){
            var id = value.id;
            resume_id = value.resume_id;
            user = value.user_id;
            var document_id = value.document_id;
            console.log(value.document_id);
            var tag_id = value.tag_id;
  if(resume_id === value.resume_id && value.in_review === 1){
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);

  // $.each(sorted_applications, function(key, value){ 
        candidates_name = value.candidates_name; 
   // });
            //loop through experience to get candidates experience@foreach($documentList as $document) 
      var content ='<li class="careerfy-column-12"><a href="#tab_6_1'+value.id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';

        $('#review_section').append(content);

}else{
console.log('am here');
}


      });
   
  });
}


// begin Offered

$('#gender_offered').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = gender.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (gender[i] == cboxValue) {
          return true;
        }
      }
    }
          
    gender.push(cboxValue);
  } 
   
  {
    $('#gender_offered :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }

    }); 
   console.log(gender);
 
OfferedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});


$('#location_offered').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = location.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (location[i] == cboxValue) {
          return true;
        }
      }
    }
          
    location.push(cboxValue);
  } 
   
  {
    $('#location_offered :checked').each(function() { 
     var cboxValue = $(this).val(); 
      //alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(location);
 
 OfferedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#availability_offered').change(function() {
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = availability.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (availability[i] == cboxValue) {
          return true;
        }
      }
    }
          
    availability.push(cboxValue);
  } 
   
  {
    $('#availability_offered :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(availability);
 
OfferedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#career_level_offered').change(function() {
          var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = career_level.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (career_level[i] == cboxValue) {
          return true;
        }
      }
    }
          
    career_level.push(cboxValue);
  } 
   
  {
    $('#career_level_offered :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(career_level);
 
OfferedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#job_terms_offered').change(function() {
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = career_level.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (job_terms[i] == cboxValue) {
          return true;
        }
      }
    }
          
    job_terms.push(cboxValue);
  } 
   
  {
    $('#job_terms_offered:checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(job_terms);
 
 
OfferedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
//

$('#age_offered').change(function() {
   
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

 
  {
    $('#age_offered :checked').each(function() { 
     age = $(this).val(); 
      //salert(age);
   
      $(this).prop('checked', true);
 
 
    }); 
   console.log(age);
 
 
OfferedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});


 $('#yearofexperience_offered').change(function() {
        var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = yeo_array.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (yeo_array[i] == cboxValue) {
          return true;
        }
      }
    }
          
    yeo_array.push(cboxValue);
  } 
   
  {
    $('#yearofexperience_offered :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(yeo_array);
 
OfferedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

  $('#salary_offered').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = salary.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (salary_hired[i] == cboxValue) {
          return true;
        }
      }
    }
          
    salary.push(cboxValue);
  } 
   
  {
    $('#salary_offered:checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(salary);
 
OfferedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
 
   $('#profession_offered').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = []; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = profession.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (profession[i] == cboxValue) {
          return true;
        }
      }
    }
          
    profession.push(cboxValue);
  } 
   
  {
    $('#profession_offered :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(profession);
 
OfferedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
   $('#qualify_offered').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = qualify.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (profession[i] == cboxValue) {
          return true;
        }
      }
    }
          
    qualify.push(cboxValue);
  } 
   
  {
    $('#qualify_offered :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(qualify);
 
OfferedApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

 function OfferedApplicantsFilter(gender, yeo, age, location, qualify, job_terms, career_level, availability, salary, profession){
    console.log(gender);
    console.log(yeo);
    console.log(age);
    console.log(location);
    console.log(qualify);
    console.log(job_terms);
    console.log(availability);
    console.log(profession);
    var check_section = 'offered';
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterOffered', 
            data:{
                '_token':$('input[name=_token').val(),
                'gender':gender,
                'years_of_experience':yeo,
                'age':age,
                'location':location,
                'qualification':qualify,
                'job_terms':job_terms,
                'job_id':{{$job_id}},
                'check_section': check_section,
                'career_level':career_level,
                'availability':availability,
                'salary':salary,
                'profession':profession,
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
    
             },
            success:function(data){
          console.log(data); 
           $('#offered_section').empty();
        // $("#industry-div").hide();
        // window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
       // $('#applicants_list').empty();
    $("#loader").hide();
    },
    }).done(function (data) {
  var code = data.applications;
  var sorted_applications = data.sorted_applications;
  var work_experiences = data.work_experiences;
  var default_unsorted_list = data.default_unsorted_list;
  var jobs_list = data.jobs_list;
  var candidates_name = '';
  var user = null;
  var resume_id = null;
  var job_id = data.job_id;

    if(isEmpty(code['data'])) {
        $('#offered_section').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
          // $('#pages').empty();   
    }
            console.log(code['data']);
            console.log(job_id); 
      // hired list
      $.each(code['data'], function(key, value){
            var id = value.id;
            resume_id = value.resume_id;
            user = value.user_id;
            var document_id = value.document_id;
            console.log(value.document_id);
            var tag_id = value.tag_id;
  if(value.offered === 1){
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);
 
    candidates_name = value.candidates_name; 
 
            //loop through experience to get candidates experience@foreach($documentList as $document) 
      var content ='<li class="careerfy-column-12"><a href="#tab_6_1'+value.id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';

        $('#offered_section').append(content);

}else{
console.log('am here');
}


      });
   
  });
}


// begin Shortlist Section

$('#gender_shortlist').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = gender.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (gender[i] == cboxValue) {
          return true;
        }
      }
    }
          
    gender.push(cboxValue);
  } 
   
  {
    $('#gender_shortlist :checked').each(function() { 
     var cboxValue = $(this).val(); 
     alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(gender);
 
ShortlistApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});


$('#location_shortlist').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = location.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (location[i] == cboxValue) {
          return true;
        }
      }
    }
          
    location.push(cboxValue);
  } 
   
  {
    $('#location_shortlist :checked').each(function() { 
     var cboxValue = $(this).val(); 
      //alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(location);
 
 ShortlistApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#availability_shortlist').change(function() {
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = availability.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (availability[i] == cboxValue) {
          return true;
        }
      }
    }
          
    availability.push(cboxValue);
  } 
   
  {
    $('#availability_shortlist :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(availability);
 
ShortlistApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#career_level_shortlist').change(function() {
          var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = career_level.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (career_level[i] == cboxValue) {
          return true;
        }
      }
    }
          
    career_level.push(cboxValue);
  } 
   
  {
    $('#career_level_shortlist :checked').each(function() { 
     var cboxValue = $(this).val(); 
     // alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(career_level);
 
ShortlistApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

$('#job_terms_shortlist').change(function() {
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = career_level.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (job_terms[i] == cboxValue) {
          return true;
        }
      }
    }
          
    job_terms.push(cboxValue);
  } 
   
  {
    $('#job_terms_shortlist :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(job_terms);
 
 
ShortlistApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
//

$('#age_inreview').change(function() {
   
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

 
  {
    $('#age_shortlist :checked').each(function() { 
     age = $(this).val(); 
      //salert(age);
   
      $(this).prop('checked', true);
 
 
    }); 
   console.log(age);
 
 
ShortlistApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});


 $('#yearofexperience_shortlist').change(function() {
        var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = yeo_array.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (yeo_array[i] == cboxValue) {
          return true;
        }
      }
    }
          
    yeo_array.push(cboxValue);
  } 
   
  {
    $('#yearofexperience_shortlist :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(yeo_array);
 
ShortlistApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

  $('#salary_shortlist').change(function() {
   
      var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = salary.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (salary_hired[i] == cboxValue) {
          return true;
        }
      }
    }
          
    salary.push(cboxValue);
  } 
   
  {
    $('#salary_shortlist :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   //console.log(salary);
 
ShortlistApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
 
   $('#profession_shortlist').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = []; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = profession.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (profession[i] == cboxValue) {
          return true;
        }
      }
    }
          
    profession.push(cboxValue);
  } 
   
  {
    $('#profession_shortlist :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(profession);
 
ShortlistApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});
   $('#qualify_shortlist').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = qualify.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (profession[i] == cboxValue) {
          return true;
        }
      }
    }
          
    qualify.push(cboxValue);
  } 
   
  {
    $('#qualify_shortlist:checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(qualify);
 
ShortlistApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary, profession);
 
  }
});

 function ShortlistApplicantsFilter(gender, yeo, age, location, qualify, job_terms, career_level, availability, salary, profession){
    console.log(gender);
    console.log(yeo);
    console.log(age);
    console.log(location);
    console.log(qualify);
    console.log(job_terms);
    console.log(availability);
    console.log(profession);
    var check_section = 'shortlist';
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/filterShortlist', 
            data:{
                '_token':$('input[name=_token').val(),
                'gender':gender,
                'years_of_experience':yeo,
                'age':age,
                'location':location,
                'qualification':qualify,
                'job_terms':job_terms,
                'job_id':{{$job_id}},
                'check_section': check_section,
                'career_level':career_level,
                'availability':availability,
                'salary':salary,
                'profession':profession,
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
    
             },
            success:function(data){
          console.log(data); 

           $('#shortlist_section').empty();
 
     },
     complete:function(data){
    // Hide image container 
       // $('#applicants_list').empty();
    $("#loader").hide();
    },
    }).done(function (data) {
  var code = data.applications;
  var sorted_applications = data.sorted_applications;
  var work_experiences = data.work_experiences;
  var default_unsorted_list = data.default_unsorted_list;
  var jobs_list = data.jobs_list;
  var candidates_name = '';
  var user = null;
  var resume_id = null;
  var job_id = data.job_id;

    if(isEmpty(code['data'])) {
        $('#shortlist_section').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
       
    }
        console.log(code['data']);
        console.log(job_id);
      // console.log(new_hired_list);

      // hired list
      $.each(code['data'], function(key, value){
            var id = value.id;
            resume_id = value.resume_id;
            user = value.user_id;
            var document_id = value.document_id;
           
            var tag_id = value.tag_id;
  if(value.shortlisted === 1){
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);

  // $.each(sorted_applications, function(key, value){ 
        candidates_name = value.candidates_name; 
   // });
            //loop through experience to get candidates experience@foreach($documentList as $document) 
      var content ='<li class="careerfy-column-12"><a href="#tab_6_1'+value.id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';

        $('#shortlist_section').append(content);

}else{
console.log('am here');
}

      });
   
  });
}



// begin Hired Section /// 
$('#gender_hired').change(function() {
   
       var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary_hired = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = gender.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (gender[i] == cboxValue) {
          return true;
        }
      }
    }
          
    gender.push(cboxValue);
  } 
   
  {
    $('#gender_hired :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(gender);
 
HireApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary_hired, profession);
 
  }
});


$('#location_hired').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary_hired = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = location.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (location[i] == cboxValue) {
          return true;
        }
      }
    }
          
    location.push(cboxValue);
  } 
   
  {
    $('#location_hired :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(location);
 
HireApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary_hired, profession);
 
  }
});
$('#availability_hired').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary_hired = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = availability.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (availability[i] == cboxValue) {
          return true;
        }
      }
    }
          
    availability.push(cboxValue);
  } 
   
  {
    $('#availability_hired :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(availability);
 
HireApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary_hired, profession);
 
  }
});

$('#career_level_hired').change(function() {
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary_hired = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = career_level.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (career_level[i] == cboxValue) {
          return true;
        }
      }
    }
          
    career_level.push(cboxValue);
  } 
   
  {
    $('#career_level_hired :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(career_level);
 
HireApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary_hired, profession);
 
  }
});

$('#job_terms_hired').change(function() {
     var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary_hired = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = career_level.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (job_terms[i] == cboxValue) {
          return true;
        }
      }
    }
          
    job_terms.push(cboxValue);
  } 
   
  {
    $('#job_terms_hired :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(job_terms);
 
HireApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary_hired, profession);
 
  }
});
//

$('#age_hired').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary_hired = [];
    var career_level = [];
    var availability = [];
    var profession = [];

 
  {
    $('#age_hired :checked').each(function() { 
     age = $(this).val(); 
      //salert(age);
   
      $(this).prop('checked', true);
 
 
    }); 
   console.log(age);
 
HireApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary_hired, profession);
 
  }
});


 $('#yearofexperience_hired').change(function() {
     var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary_hired = [];
    var career_level = [];
    var availability = [];
    var profession = [];

    function itemExistsChecker(cboxValue) {
          
    var len = yeo_array.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (yeo_array[i] == cboxValue) {
          return true;
        }
      }
    }
          
    yeo_array.push(cboxValue);
  } 
   
  {
    $('#yearofexperience_hired :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(yeo_array);
 
HireApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary_hired, profession);
 
  }
});

  $('#salary_hired').change(function() {
   
     var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary_hired = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = salary_hired.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (salary_hired[i] == cboxValue) {
          return true;
        }
      }
    }
          
    salary_hired.push(cboxValue);
  } 
   
  {
    $('#salary_hired :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(salary_hired);
 
HireApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary_hired, profession);
 
  }
});
 
   $('#profession_hired').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary_hired = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = profession.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (profession[i] == cboxValue) {
          return true;
        }
      }
    }
          
    profession.push(cboxValue);
  } 
   
  {
    $('#profession_hired :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(profession);
 
HireApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary_hired, profession);
 
  }
});
   $('#qualify_hired').change(function() {
   
    var yeo_array = [];
    var gender = [];
    var age = ''; 
    var location = [];
    var qualify = [];
    var job_terms = [];
    var salary_hired = [];
    var career_level = [];
    var availability = [];
    var profession = [];
    function itemExistsChecker(cboxValue) {
          
    var len = qualify.length; 
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        if (profession[i] == cboxValue) {
          return true;
        }
      }
    }
          
    qualify.push(cboxValue);
  } 
   
  {
    $('#qualify_hired :checked').each(function() { 
     var cboxValue = $(this).val(); 
      alert(cboxValue);
     // var cboxChecked = localStorage.getItem(cboxValue) == 'true' ? true : false;
    // On page load check if any of the checkboxes has previously been selected and mark it as "checked"
    // alert(cboxChecked);
    // if (cboxChecked) {
      $(this).prop('checked', true);
      itemExistsChecker(cboxValue);
    // }
 
    }); 
   console.log(qualify);
 
HireApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms, career_level, availability, salary_hired, profession);
 
  }
});

 function HireApplicantsFilter(gender, yeo, age, location, qualify, job_terms, career_level, availability, salary_hired, profession){
    console.log(gender);
    console.log(yeo);
    console.log(age);
    console.log(location);
    console.log(qualify);
    console.log(job_terms);
    console.log(availability);
    console.log(profession);
    var check_section = 'hired';
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/searchConditions', 
            data:{
                '_token':$('input[name=_token').val(),
                'gender_hired':gender,
                'years_of_experience':yeo,
                'age':age,
                'location':location,
                'qualification':qualify,
                'job_terms':job_terms,
                'job_id':{{$job_id}},
                'check_section': check_section,
                'career_level':career_level,
                'availability':availability,
                'salary':salary_hired,
                'profession':profession,
            },
              beforeSend: function(){
            //Show image container
            $("#loader").show();
    
             },
            success:function(data){
          console.log(data); 
           $('#hire_section').empty();
        // $("#industry-div").hide();
        // window.location.reload(); 
     },
     complete:function(data){
    // Hide image container 
       // $('#applicants_list').empty();
    $("#loader").hide();
    },
    }).done(function (data) {
  var code = data.applications;
  var sorted_applications = data.sorted_applications;
  var work_experiences = data.work_experiences;
  var new_hired_list = data.new_hired_list;
  var jobs_list = data.jobs_list;
  var candidates_name = '';
  var user = null;
  var resume_id = null;
  var job_id = data.job_id;

    if(isEmpty(code['data'])) {
        $('#hire_section').append('<li class="careerfy-column-12"> No Record(s) Found</li>');  
          // $('#pages').empty();   
    }
       console.log(code['data']);
      console.log(job_id);
      // console.log(new_hired_list);

      // hired list
      $.each(code['data'], function(key, value){
            var id = value.id;
            resume_id = value.resume_id;
            user = value.user_id;
            var document_id = value.document_id;
            console.log(value.document_id);
            var tag_id = value.tag_id;
  if(resume_id === value.resume_id && value.hired === 1){
    company = getWorkExperienceCompanyName(work_experiences, user);
    title = getWorkExperienceTitle(work_experiences, user);

  // $.each(sorted_applications, function(key, value){ 
        candidates_name = value.candidates_name; 
   // });
            //loop through experience to get candidates experience@foreach($documentList as $document) 
      var content ='<li class="careerfy-column-12"><a href="#tab_6_1'+value.id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';

        $('#hire_section').append(content);

}
      });
   
  });
}





  $(document.getElementsByName('gender1')).click(function() {
 
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
           // console.log(data);
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
            //console.log(data);
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
            //console.log(data);
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




     function getWorkExperienceTitle(experiences, user) {
var title = '';
        //console.log(experiences);
           $.each(experiences, function(key2, value2) {  
            if (user === value2['userfk'] && value2['present'] === 1) {  
            console.log(value2['present']);
             // console.log(value2['userfk']);
             title = value2['position_title'];
             } 
         });

        return title;
     }

     function getAvatar(users, user) {
 
           $.each(users, function(key2, value2) {  

        if (user === value2['id']) {  

             avatar = value2['avatar'];
             } 

         });
// console.log(name_title[0]);
        return avatar;
     }


     function getWorkExperienceCompanyName(experiences, user) {
var company_name = '';

           $.each(experiences, function(key2, value2) {  

        if (user === value2['userfk'] && value2['present'] === 1) {  

             company_name = value2['company_name'];
             } 

         });
// console.log(name_title[0]);
        return company_name;
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
    <?php foreach ($applications as $key => $value): ?>
        
    
     $("#sendEmail{{$value->user_id}}").click(function(e) {
        
        e.preventDefault();  
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // body...
 
        $.ajax({
            type:'post',
            url:'/send-candidates-email', 
            data:{
                '_token':$('input[name=_token').val(),
                'email_address':$('[name=email_address{{$value->user_id}}]').val(),
                'candidate_name':$('input[name=name{{$value->user_id}}]').val(),
                'subject':$('input[name=subject{{$value->user_id}}]').val(),
                'body':$('textarea[name=body_of_email{{$value->user_id}}]').val(),
            }
            ,
              beforeSend: function(){
            //Show image container
            $("#loader").show(); 
            $(".lds-ripplee{{$value->user_id}}").show(); 
            $("#info{{$value->user_id}}").append('<i class="btn-success btn-xs" style="color:#ffffff;"> Sending email... </i>'); 
             $("#sendEmailStatus{{$value->user_id}}").hide(); 
             },

             
            success:function(data){
            console.log(data); 
     },
     complete:function(data){
    // Hide image container 
    $("#loader").hide();
    $(".lds-ripplee{{$value->user_id}}").hide(); 
    $("#info{{$value->user_id}}").hide(); 

    },
}).done(function (data) { 
    var message = data.msg;
      console.log(data); 
    $('#emailsent{{$value->user_id}}').append('<i class="btn-success btn-xs" style="color:#ffffff;"> '+message+' </i>');
 
  });


    });
<?php endforeach ?>
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
// document.getElementById('frm').onsubmit = validate;

 


</script>
 <script>
        <?php foreach ($applications as $key => $value): ?>
   $(".lds-ripple{{$value->user_id}}").hide();
   $(".lds-ripplee{{$value->user_id}}").hide();
   
     <?php endforeach ?>
    $(".delete").on("submit", function(){
        return confirm("Do you want to delete this item?");
    });
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
 <script type="text/javascript">
//  setInterval(function(){
//$("#tabs").load(location.href+" #tabs>*", "");
 //}, 1000);
//    setInterval(function(){
// $("#tab_12").load(location.href+"#tab_12>*", "");
//    }, 200000);
//       setInterval(function(){
// $("#tab_13").load(location.href+"#tab_13>*", "");
//    }, 200000);
//          setInterval(function(){
// $("#tab_14").load(location.href+"#tab_14>*", "");
//    }, 200000);
//  setInterval(function(){
// $("#tab_15").load(location.href+"#tab_15>*", "");
//    }, 200000);

 </script>
 <!-- <div id="tabs"></div> -->
</body>

</html>
