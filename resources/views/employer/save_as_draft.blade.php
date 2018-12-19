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
<style type="text/css">
 .nac{
    padding-top: 15px;
    padding-bottom: 15px;
 }
 table{

  }
  td{
    width: 100px;
  }
</style>
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
    .make_x{
        background-color: #ffffff; border-color: #ffffff; color: red;
    }
    .make_red{
        background-color: red; border-color: red;
    }

</style>
 <div class="space">&nbsp;</div>
<nav class="nav-tabs navbar-inverse">
@include('partials.employer_sub_menu')

                         @if(session()->has('message.level'))
                        <div class="alert alert-{{ session('message.level') }}"> 
                        {!! session('message.content') !!}
                        </div>
                        @endif
            <div class="careerfy-main-section careerfy-dashboard-fulltwo">
                <div class="container">
                    <div class="row"> 
                        <div class="careerfy-column-6">
                            <div class="careerfy-typo-wrap">
                                <div class="careerfy-employer-dasboard">
                                    <div class="careerfy-employer-box-section">
                                        <!-- Profile Title -->
                                      <nav class="careerfy-employer-jobnav">
                                            <ul> <li class="active">
                            <a href="">
                                 <i class="careerfy-icon careerfy-checked"></i> 
                                 <span>Job Post Successfull</span></a></li>

                                 <li> </li>
                                            </ul>
                                        </nav>
                                        <!-- Confitmation -->
                   <div class="careerfy-employer-confitmation">
                                  <div align="center">   <img src="{{asset('img/employer-confirmation-icon.png')}}" alt="" align="center"></div>
    <form method="POST" action="{{route('save.draft')}}" name="form-draft" >
     {{ csrf_field() }}
     <input type="hidden" name="tag_id" value="{{$tag->id}}">
       <span style="color:red;"> You may wish to save as draft</span> <input type="checkbox" name="draft" value="draft" required="required"> 
                                            <div class="clearfix"></div>

    <div class="modal-footer">

    <button type="submit" class="btn green">Save Draft</button>
  
    </div>
        </form>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
          
                    </div>
                </div>
            </div>

                        
            <!-- Main Section -->
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
     <script src="{{ asset('js/selectform.js') }}"></script>
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

 

  </script>
</body>

</html>
