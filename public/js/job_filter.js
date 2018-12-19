
   @foreach($List_applicants_by_job_id as $List_applicant)  
  $('#savedescription{{$List_applicant->id}}').click(function() {
 alert('Rejected');
 //alert($('input[name=rejected{{$List_applicant->id}}]').val());
 
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
    $('#in_review{{$List_applicant->id}}').click(function() {
        alert('in_reviewssss');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/review_appllicant', 
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

   $('#shortlist{{$List_applicant->id}}').click(function() {
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



   $('#offered{{$List_applicant->id}}').click(function() {
        alert('shortlist');
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
            console.log(data);
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


        console.log(in_review_count);
        console.log(sorted_count);
        console.log(hired_list);
        console.log(review_list);
        console.log(newapplication_list);
        
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
    // console.log(company);
    // console.log(documents);
       // $.each(work_experiences, function(key, value){
       //  if (true) {}
       // });      

            //loop through experience to get candidates experience@foreach($documentList as $document) 
        var content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+ ' ' +'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
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

            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var content_r = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+ ' ' +'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
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

   
    
    console.log(company);
            //loop through experience to get candidates experience@foreach($documentList as $document) 
            var newapplication_content = '<li class="careerfy-column-12"><a href="#tab_6_1'+application_id+'" data-toggle="tab"><div class="careerfy-candidate-default-wrap"> <figure> <img src="/uploads/avatars/{{ $user->avatar }}" alt=""> </figure><div class="careerfy-candidate-default-text"><div class="careerfy-candidate-default-left"><h2>'+candidates_name+'<i class="careerfy-icon careerfy-check-mark"></i></h2><ul class="careerfy-column-12" ><li>'+title+ ' ' +'at <span href="#" class="careerfy-candidate-default-studio"> '+company+'</span></li> </ul> </div> </div> </div> </a></li>';
        $('#applicants_list').append(newapplication_content);  
        // $("#review_section").append(content); 


        count++;
        content_v = ' <div id="savedescription'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+application_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> REJECT</div><div id="in_review'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+application_id+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="shortlist" name="shortlist'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> SHORTLIST</div> <div id="offered'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer'+application_id+'"><input type="hidden" value="'+application_id+'" name="application_id'+application_id+'"><input type="hidden" value="'+user+'" name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> OFFER</div><div id="hire'+application_id+'" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire'+application_id+'"><input type="hidden" value="'+application_id+'"name="user_id'+user+'"><input type="hidden" value="'+tag_id+'" name="job_id'+tag_id+'"><i class="icon-plus"></i> HIRE</div>';
        });
    $("#move_to").append(content_v); 




  });
 
    });
 @endforeach


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
        console.log(rejected);
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
            $('#shortlist_count').empty();
            $("#applicants_list").empty(); 
            $("#move_to").empty();
            $("#review_section").empty();
            $("#reject_section").empty();
            // hide review Side display
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
        var hired_count = data.hired_count;
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
    alert('Rejected hereeerereerexxxxxxxxxxx');
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

        var bodyresume = '<div class="tab-pane fade" id="tab_6_1{{$rejected_applicant->id}}"> <div class="col-md-12 cv_content"><div id="savedescription{{$rejected_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="rejected" name="rejected{{$rejected_applicant->id}}"><input type="hidden" value="{{$rejected_applicant->id}}" name="application_id{{$rejected_applicant->id}}"><input type="hidden" value="{{$rejected_applicant->user_id}}" name="user_id{{$rejected_applicant->id}}"><input type="hidden" value="{{$rejected_applicant->tag_id}}" name="job_id{{$rejected_applicant->tag_id}}"><i class="icon-plus"></i> REJECT</div><div id="in_review{{$rejected_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="in_review{{$rejected_applicant->id}}"><input type="hidden" value="{{$rejected_applicant->id}}" name="application_id{{$rejected_applicant->id}}"><input type="hidden" value="{{$rejected_applicant->user_id}}" name="user_id{{$rejected_applicant->id}}"><input type="hidden" value="{{$rejected_applicant->tag_id}}" name="job_id{{$rejected_applicant->tag_id}}"><i class="icon-plus"></i> IN VIEW</div><div id="shortlist{{$rejected_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="in_review" name="shortlist{{$rejected_applicant->id}}"><input type="hidden" value="{{$rejected_applicant->id}}" name="application_id{{$rejected_applicant->id}}"><input type="hidden" value="{{$rejected_applicant->user_id}}" name="user_id{{$rejected_applicant->id}}"><input type="hidden" value="{{$rejected_applicant->tag_id}}" name="job_id{{$rejected_applicant->tag_id}}"><i class="icon-plus"></i> SHORTLIST</div><div id="offered{{$rejected_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="offer" name="offer{{$rejected_applicant->id}}"><input type="hidden" value="{{$rejected_applicant->id}}" name="application_id{{$rejected_applicant->id}}"><input type="hidden" value="{{$rejected_applicant->user_id}}" name="user_id{{$rejected_applicant->id}}"><input type="hidden" value="{{$rejected_applicant->tag_id}}" name="job_id{{$rejected_applicant->tag_id}}"><i class="icon-plus"></i> OFFER</div><div id="hire{{$rejected_applicant->id}}" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" ><input type="hidden" value="hire" name="hire{{$rejected_applicant->id}}"><input type="hidden" value="{{$rejected_applicant->id}}" name="application_id{{$rejected_applicant->id}}"><input type="hidden" value="{{$rejected_applicant->user_id}}" name="user_id{{$rejected_applicant->id}}"><input type="hidden" value="{{$rejected_applicant->tag_id}}" name="job_id{{$rejected_applicant->tag_id}}"><i class="icon-plus"></i> HIRE</div> </div> <div class="space">&nbsp;</div>'; 



        });
          
 
  });
 
    });
 
    $('#in_review{{$review->id}}').click(function() {
        alert('in_review nowsssssssssssssssssssss');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/review_appllicant', 
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


  });
 
    });

   $('#shortlist{{$review->id}}').click(function() {
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



   $('#offered{{$review->id}}').click(function() {
        alert('shortlist');
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

   @endforeach



@foreach($shortlisted_list as $shortlisted)
  $('#savedescription{{$shortlisted->id}}').click(function() {
    alert('Rejected hereeerereerexxxxxxxxxxx'); 
         
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
 
    $('#in_review{{$shortlisted->id}}').click(function() {
        alert('in_review nowsssssssssssssssssssss');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/review_appllicant', 
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
            url:'/shortlist_appllicant', 
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

   $('#offered{{$shortlisted->id}}').click(function() {
        alert('shortlist');
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
        var newapplication_list = data.newapplication_list;
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

        // update Hired List
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
@endforeach

@foreach($offered_list as $offered)

 $('#savedescription{{$offered->id}}').click(function() {
    alert('Rejected hereeerereerexxxxxxxxxxx'); 
         
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
        alert('in_review nowsssssssssssssssssssss');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $.ajax({
            type:'post',
            url:'/review_appllicant', 
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
        var hired_count = data.hired_count;
        var newapplication_list = data.newapplication_list;
        var new_reject_list = data.new_reject_list; 
  
     
        if(isEmpty(newapplication_list)) {
        $('#applicants_list').append('<li class="careerfy-column-12"> <p>No Record(s) Found</p></li>');  
        $('#resume_body').empty();
        $('#resume_body').append('No Record(s) Found'); 

        }
 

    console.log(rejected);
    console.log(newapplication_list);
    console.log(in_review_count);
    console.log(sorted_count);
    console.log(hire_count);
        $("#reject_count").append(rejected);
        $("#review_count").append(in_review_count);
        $("#sorted_count").append(sorted_count);
        $("#shortlist_count").append(shortlisted_count);
        $("#offered_count").append(offered_count);
        $("#hired_count").append(hired_count);

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

@endforeach

@foreach($hired_list as $hired)
  $('#savedescription{{$hired->id}}').click(function() {
 alert('Rejected'); 
 
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
            url:'/review_appllicant', 
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
        $("#applicants_list").append(content); 
        $('#hire_section').append(content);
 });
 
  });
}

$('#gender_hired').change(function() {
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
 
 HireApplicantsFilter(gender,yeo_array,age,location,qualify,job_terms);
 
  }
});

 
 function HireApplicantsFilter(gender, yeo, age, location, qualify, job_terms){
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
        $("#applicants_list").append(content); 
        $('#hire_section').append(content);
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




     function getWorkExperienceTitle(experiences, user) {
var title = '';
        console.log(experiences);
           $.each(experiences, function(key2, value2) {  
            if (user === value2['userfk'] && value2['present'] === 1) {  
            console.log(value2['present']);
             // console.log(value2['userfk']);
             title = value2['position_title'];
             } 
         });

        return title;
     }


     function getWorkExperienceCompanyName(experiences, user) {
var company_name = '';
// var name_title = [];
        console.log(experiences);
           $.each(experiences, function(key2, value2) {  
//             if ( value2['present'] === 1) {  
//             console.log(value2['present']);
//              // console.log(value2['userfk']);
//              company_name = value2['company_name'];
// // name_title = [value2.company_name, value2.position_title ];
//              } 
        if (user === value2['userfk'] && value2['present'] === 1) {  
           // console.log(user);
             // console.log(value2['userfk']);
             company_name = value2['company_name'];
             } 

         });
// console.log(name_title[0]);
        return company_name;
     }

    // function getCandidatesProfile(argument) {
    //           $.each(documents, function(key2, value) {  
    //         if (application_document_id === value.id ) {  
    //         console.log(user);
 
    //         profile = value;
    //          } 
    //      });
    //           return profile;
    // }

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
 
 