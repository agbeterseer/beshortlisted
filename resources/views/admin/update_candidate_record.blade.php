<!DOCTYPE html>
<html lang="en">
    <head> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Website CSS style -->
  <link href="{{ asset('css/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Website Font style -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/newscc.css')}}">
       <link href="{{ asset('css/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
     <!--    <link href="{{ asset('css/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet"> -->
         <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
         <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ asset('css/assets/global/css/components.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/assets/global/css/plugins.min.css') }}" rel="stylesheet">
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{ asset('css/assets/layouts/layout/css/layout.min.css') }}" rel="stylesheet">  
    <!-- Google Fonts --> 
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
    <title>Rhizome Consulting |CBT Print out</title>
  </head>
  <body >
  
     <nav class="navbar navbar-default navbar-fixed-top">
            <ul class="nav nav">
            <li></li>
              <li >  
         <img src="/logo/rhizome.jpg" alt="Logo"  width="190px" height="50px"  class="logo-default" style="margin-left: 40px; margin-top: 13px;" />   </li>
          
        </ul>
        </nav>
        <p></p>
        <p></p>
        <p></p>
  <table class="navbar" border="1" align="center"  width="100%" >
    
        <tr>
        <td align="center">
          <h3>  </h3>
        </td>
    
    </tr>
    
</table>
<div style="margin-left: 300px;">
 <strong style="color: green"> Welcome, Kindly complete the form below.Thank You.</strong> 
   
</div>
        
                @if(Session()->has('no-connection'))
                <div class="alert alert-danger"> 
                {!! Session::get('no-connection') !!}
                </div>
                        @endif 
                 @if(Session()->has('error'))
                <div class="alert alert-danger"> 
                {!! Session::get('error') !!}
                </div>
                   @endif 

        <div class="content" style="padding-left: 450px; width: 1000px;">

                    @if (count($errors))
                    <div class="alert alert-danger">
                    <ul >
                    @foreach ($errors->all() as $error)

                    <li>
                    <p class="error text-center alert alert-danger hidden"></p>
                    {{ $error }}
                    </li>

                    @endforeach 
                    </ul>

                    </div>
                    @endif 
                    </div>
  <div class="container">
      <div class="row main">
        <div class="main-login main-center">
       
            <form name="candidateForm" action="{{route('job.application')}}" enctype="multipart/form-data" method="post"  >
                           {{ csrf_field() }}
            
             <div class="row">
               <div class="col-md-6">
 <div class="form-group{{ $errors->has('candidates_name') ? ' has-error' : '' }}">
                <div class="form-group">
              <label for="candidates_name" class="cols-sm-2 control-label">Candidate's Name
                      <span class="required"><font color="red">*</font></span>
              </label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" required="required" name="candidates_name" id="candidates_name"  placeholder="Enter Candidate's Name"  >
              @if ($errors->has('candidates_name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('candidates_name') }}</strong>
                      </span>
                      @endif
                </div>
              </div>
            </div>
          </div>


            </div>


           <div class="col-md-6">

              <div class="form-group" >
              <label for="password" class="cols-sm-2 control-label" >Email Address 
                    <span class="required"><font color="red">*</font></span>
              </label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope fa-lg" aria-hidden="true"></i></span>
                  <input type="email" class="form-control" name="email" id="email"  placeholder="Enter your Email"  required="required" />
                </div>
              </div>
            </div>

           </div>

         </div>
 
         <div class="row"> 
          <div class="col-md-6">
           <div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }}">
              <label for="region" class="cols-sm-2 control-label">Current Region
               <span class="required"><font color="red">*</font></span>
              </label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-globe fa" aria-hidden="true"></i></span>
  <select name="region" class="form-control"  required="required" >
                <option value="">...Select Region...</option>
                        @foreach($regions as $region)
                <option value="{{$region->id}}">{{$region->name}}</option>
                @endforeach
                </select> 

                    @if ($errors->has('region'))
                        <span class="help-block">
                            <strong>{{ $errors->first('region') }}</strong>
                        </span>
                    @endif
             
                </div>
              </div>
            </div> 
          </div>


          <div class="col-md-6">
            <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}" >
              <label for="location" class="cols-sm-2 control-label" >Current Location
               <span class="required"><font color="red">*</font></span>
              </label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-globe fa-lg" aria-hidden="true"></i></span>
                     <select name="location" id="location" class="form-control" required="required" >
                                <option value="">...Select Location...</option>
                            </select>
                            
                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif

                </div>
              </div>
            </div>

          </div>
         </div>

                <div class="row">
         <div class="col-md-6">
   <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
        
            <label for="gender" class="cols-sm-2 control-label">Gender
            <span class="required"><font color="red">*</font></span>
            </label>
            <div class="cols-sm-10">
            <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
              <select name="gender" id="gender"  class="form-control" required="required" >
              <option value="">Select One</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option> 
              </select>
                @if ($errors->has('gender'))
                <span class="help-block">
                <strong>{{ $errors->first('gender') }}</strong>
                </span>
                @endif
            </div> 

            </div> 
           
      </div>

      </div>
              
     <div class="col-md-6">
       <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
             
              <label for="phonenumber" class="cols-sm-2 control-label" style="margin-left:15px;">Phone Number
              <span class="required"><font color="red">*</font></span>
              </label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone fa-lg" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" required name="phonenumber" id="phonenumber"  placeholder="Enter your Phnone number"   />
           @if ($errors->has('phonenumber'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phonenumber') }}</strong>
                        </span
                @endif
                </div>
              </div>
            </div>

          </div>
          </div>
        </div>

  
    
          
 
       <div class="tab-pane" id="picture">

                                     <p>Choose Your Picture </p>
             <form action="{{ url('/user/profile') }}" role="form" enctype="multipart/form-data" method="POST">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 210px;">
                        <img src="../hirs/public/uploads/avatars/{{ $user->avatar }}"  alt="" width=" 300px" height="300px" />
                         </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                <div>
                                                    <span class="btn default btn-file">
                                                        <span class="fileinput-new"> Select image </span>
                                                        <span class="fileinput-exists"> Change </span>
                                            <input type="file" name="avatar">
                                             </span>
                                                    <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>
                                            <div class="clearfix margin-top-10">
                                                <span class="label label-danger">NOTE! </span>
                                                <span>Please ensure you upload a clear picture</span>
                                            </div>
                                        </div>
                                        <div class="margin-top-10">
                                    <button class="btn green" type="Submit"> Submit</button>
                                     <button type="reset"  class="btn default"> Cancel </button>
                                        </div>
                                    </form>
                   
                                </div>
           

     
       
         

                        <div class="form-group ">
     <button class="btn btn-primary" type="submit" id="add">
                    <span class="glyphicon glyphicon-plus"></span> Submit
                    </button>
               
            </div>
            
          </form>
        </div>
      </div>
    </div>
    </div>


   <script src="{{ asset('css/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('css/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('css/assets/pages/scripts/form-samples.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('./laravel/public/js/app.js') }}"></script>
  <script src="{{ asset('./laravel/public/js/selectform.js') }}"></script>
   <script type="text/javascript">
        
        counter = function() {
    var value = $('#text').val();

    if (value.length == 0) {
        $('#wordCount').html(0);
        $('#totalChars').html(0);
        $('#charCount').html(0);
        $('#charCountNoSpace').html(0);
        return;
    }

    var regex = /\s+/gi;
    var wordCount = value.trim().replace(regex, ' ').split(' ').length;
    var totalChars = value.length;
    var charCount = value.trim().length;
    var charCountNoSpace = value.replace(regex, '').length;

    $('#wordCount').html(wordCount);
    $('#totalChars').html(totalChars);
    $('#charCount').html(charCount);
    $('#charCountNoSpace').html(charCountNoSpace);
};

$(document).ready(function() {
    $('#count').click(counter);
    $('#text').change(counter);
    $('#text').keydown(counter);
    $('#text').keypress(counter);
    $('#text').keyup(counter);
    $('#text').blur(counter);
    $('#text').focus(counter);
});
    </script>
  </body>
</html>