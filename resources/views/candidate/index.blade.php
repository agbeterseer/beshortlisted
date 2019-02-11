<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>Cv Database</title> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> 
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    </head>
    <body>
      <nav class="navbar navbar-default navbar-fixed-top">
            <ul class="nav nav">
            <li></li>
              <li >  
         <img src="/logo/rhizome.jpg" alt="Logo"  width="90px" height="30px"  class="logo-default" style="margin-left: 40px; margin-top: 13px;" />   </li> 
        </ul>
        </nav>
        <br><br><br><br>
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
                      @if(Session()->has('success'))
                <div class="alert alert-success"> 
                {!! Session::get('success') !!}
                </div>
                      @endif 
                @if (session('status'))
                    <div class="alert alert-success">
                      {{ session('status') }}
                    </div>
                @endif
            <div class="form-group row add"> 
                <div class="flex-center position-ref full-height"> 
                <div class="content">
                <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-body">
                  <div class="table-toolbar">
                    <div class="row">
                    <div class="col-md-6">
                    <div class="btn-group">
                    </div>
                </div>
            </div>
        </div>

            <!-- <p id="myElem" style="display:none">Saved</p> -->
 <table width="100%" border="0" cellpadding="0" cellspacing="0" >  
        <tr>
            <td valign="top"  width="20%" class="navbar navbar-default " >
      <table class="navbar navbar-default "  align="center"  width="100%" >
    <tr>
        <td align="center">
          <h3> <strong>Important Notice</strong> </h3>
        </td>
    </tr>
        <tr>
    <td>
       <ol style="color: red">
       <li> Enter your full Name for <i>[Candidates Name]</i></li>
       <li> Select your Profession</li>
       <li>Other Profession field is optional </li>
       <li> All fields with (*) are conpulsory fields  </li> 
       <li> Select Current Region to display Locations: please provide your current region you are presently as this will enable us do proper placement</li>
       <li> Location should be the current state you reside in </li>
       </ol> 
    </td>
    </tr>
</table>  </td>
            <td  width="100%">
  <form class="form-horizontal" name="candidateForm" action="{{route('candidate.addCandidate')}}" enctype="multipart/form-data" method="post" role="form">
                           {{ csrf_field() }}
   <div class="form-group{{ $errors->has('candidates_name') ? ' has-error' : '' }}">       
      <label for="candidates_name" class="col-md-4 control-label">Candidates Name
        <span class="required"><font color="red">*</font></span>
      </label>
                <div class="col-md-4">
         <input type="text" class="form-control"  id="candidates_name" name="candidates_name" placeholder="Enter name of candidates name"   required>
                    @if ($errors->has('candidates_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('candidates_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div> 
            <div class="form-group{{ $errors->has('profession') ? ' has-error' : '' }}">
                <label for="profession" class="col-md-4 control-label">Profession
                            <span class="required"><font color="red">*</font></span>
                </label>
                <div class="col-md-4"> 
                         <select name="profession" id="profession"  class="form-control" required="required">
                         <option value="">Select One</option>
                                       @foreach($aop as $profession)
                                       <option value="{{$profession->id}}">{{$profession->name}}</option>
                                       @endforeach
                                   </select>
                    @if ($errors->has('profession'))
                        <span class="help-block">
                            <strong>{{ $errors->first('profession') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
             <div class="form-group{{ $errors->has('other_profession') ? ' has-error' : '' }}">
                <label for="profession" class="col-md-4 control-label">Other Profession
                           
                </label>
                <div class="col-md-4"> 
  <input  type="text" id="other_profession" class="form-control" placeholder="Optional" name="other_profession" >
                    @if ($errors->has('other_profession'))
                        <span class="help-block">
                            <strong>{{ $errors->first('other_profession') }}</strong>
                        </span>
                    @endif
                </div>
            </div> 
   <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}"> 
      <label for="gender" class="col-md-4 control-label">Gender
        <span class="required"><font color="red">*</font></span>
      </label>
                <div class="col-md-4">
                    <select name="gender" id="gender"  class="form-control" required="required">
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
   <div class="form-group{{ $errors->has('ethnicity') ? ' has-error' : '' }}"> 
      <label for="ethnicity" class="col-md-4 control-label">Ethnicity 
      </label>
                <div class="col-md-4">
                    <select name="ethnicity" id="ethnicity"  class="form-control" >
                         <option value="">Select One</option> 
                                       <option value="Male">Black</option>
                                       <option value="White">White</option>
                                        <option value="Asia">Asia</option>
                                       <option value="Other">Other</option>  
                        </select>
                    @if ($errors->has('ethnicity'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ethnicity') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
   <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}"> 
      <label for="date_of_birth" class="col-md-4 control-label">Date of birth:
        <span class="required"><font color="red">*</font></span>
      </label>
                <div class="col-md-4">
         <input type="date" class="form-control"  id="date_of_birth" name="date_of_birth"   required>
                    @if ($errors->has('date_of_birth'))
                        <span class="help-block">
                            <strong>{{ $errors->first('date_of_birth') }}</strong>
                        </span>
                    @endif
                </div>
            </div> 
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">  
      <label for="email" class="col-md-4 control-label">Email:
        <span class="required"><font color="red">*</font></span>
      </label>
                <div class="col-md-4">
         <input type="email" class="form-control"  id="email" name="email" placeholder="Enter your email address"   required>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div> 
      <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">       
      <label for="phonenumber" class="col-md-4 control-label">Phone N0.:
        <span class="required"><font color="red">*</font></span>
      </label>
                <div class="col-md-4">
         <input type="text" class="form-control"  id="phonenumber" name="phonenumber" placeholder="Enter your phonenumber"  required>
                    @if ($errors->has('phonenumber'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phonenumber') }}</strong>
                        </span>
                    @endif
                </div>
            </div> 
              <div class="form-group{{ $errors->has('job_type') ? ' has-error' : '' }}">
                <label for="job_type" class="col-md-4 control-label">Job type:
                            <span class="required"><font color="red">*</font></span>
                </label>
                <div class="col-md-4">
                         <select name="job_type" id="job_type"  class="form-control" required="required">
                         <option value="">Select One</option>
                   <option value="Permanent">Permanent</option>
                   <option value="Interim / Freelance / Contract">Interim / Freelance / Contract</option>
                   <option value="Part-time">Part-time</option>
                   <option value="Business opportunities">Business opportunities</option>
                   <option value="Voluntary/trustee">Voluntary/trustee</option> 
                                   </select>
                    @if ($errors->has('job_type'))
                        <span class="help-block">
                            <strong>{{ $errors->first('job_type') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
  <div class="form-group{{ $errors->has('relocate_nationaly') ? ' has-error' : '' }}">
                <label for="relocate_nationaly" class="col-md-4 control-label">Relocate nationally?:
                </label>
                <div class="col-md-4">
             <select name="relocate_nationaly" id="relocate_nationaly"  class="form-control" >
             <option value="">Select One</option>                                  
            <option value="YES">YES</option>
            <option value="NO">NO</option>
                                   </select>
                    @if ($errors->has('relocate_nationaly'))
                        <span class="help-block">
                            <strong>{{ $errors->first('relocate_nationaly') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
  <div class="form-group{{ $errors->has('relocate_internationaly') ? ' has-error' : '' }}">
                <label for="relocate_nationaly" class="col-md-4 control-label">Relocate Internationally?:
                </label>
                <div class="col-md-4">
             <select name="relocate_internationaly" id="relocate_internationaly"  class="form-control" >
             <option value="">Select One</option>
            <option value="YES">YES</option>
            <option value="NO">NO</option>
       
                                   </select>
                    @if ($errors->has('relocate_internationaly'))
                        <span class="help-block">
                            <strong>{{ $errors->first('relocate_internationaly') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
  <div class="form-group{{ $errors->has('availability') ? ' has-error' : '' }}">
                <label for="relocate_nationaly" class="col-md-4 control-label">Availability: </label>
                <div class="col-md-4"> 
             <select name="availability" id="availability"  class="form-control" >
             <option value="">Select One</option>    
            <option value="Immediate">Immediate</option>
            <option value="Two Week">Two Week</option>
            <option value="One Month">One Month</option>
            <option value="Two Months">Two Months</option>
                                   </select>
                    @if ($errors->has('availability'))
                        <span class="help-block">
                            <strong>{{ $errors->first('availability') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
  <div class="form-group{{ $errors->has('career_highlights') ? ' has-error' : '' }}">
                <label for="career_highlights" class="col-md-4 control-label"> Career highlights:
                            <span class="required"><font color="red">*</font></span>
                </label>
                <div class="col-md-4">
        <div id="border">
            <textarea id='text' name="career_highlights" class="form-control" required="required"></textarea>
        </div>
        <div id="result">
          not more than 200  Words: <span id="wordCount">0</span><br/> 
        </div>
                    @if ($errors->has('career_highlights'))
                        <span class="help-block">
                            <strong>{{ $errors->first('career_highlights') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
       <div class="form-group{{ $errors->has('annual_salary') ? ' has-error' : '' }}">
                <label for="profession" class="col-md-4 control-label">Annual salary:
                            <span class="required"><font color="red">*</font></span>
                </label>
                <div class="col-md-4">
                 <select name="annual_salary" id="annual_salary"  class="form-control" required="required"  >
                <option value="" selected=""></option>
                <option value="1">Below NGN 100000</option>
                <option value="2">NGN 100000 - NGN 300000</option>
                <option value="3">NGN 300000 - NGN 500000</option>
                <option value="4">NGN 500000 - NGN 750000</option>
                <option value="5">NGN 750000 - NGN 1.0m</option>
                <option value="6">NGN 1.0m - NGN 1.5m</option>
                <option value="7">NGN 1.5m - NGN 2.0m</option>
                <option value="8">NGN 2.0m - NGN 3.0m</option>
                <option value="9">NGN 3.0m - NGN 4.0m</option>
                <option value="10">NGN 4.0m - NGN 6.0m</option>
                <option value="11">NGN 6.0m - NGN 8.0m</option>
                <option value="12">NGN 8.0m - NGN 10.0m</option>
                <option value="13">NGN 10.0m - NGN 12.0m</option>
                <option value="14">NGN 12.0m - NGN 14.0m</option>
                <option value="15">NGN 14.0m - NGN 16.0m</option>
                <option value="16">NGN 16.0m - NGN 18.0m</option>
                <option value="17">NGN 18.0m - NGN 20.0m</option>
                <option value="18">NGN 20.0m - NGN 30.0m</option>
                <option value="19">NGN 30.0m - NGN 40.0m</option>
                <option value="20">NGN 40.0m - NGN 60.0m</option>
                </select> 
                    @if ($errors->has('annual_salary'))
                        <span class="help-block">
                            <strong>{{ $errors->first('annual_salary') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('years_of_experience') ? ' has-error' : '' }}">
                <label for="description" class="col-md-4 control-label">Years of Experience
                            <span class="required"><font color="red">*</font></span>
                </label>

                <div class="col-md-4">
                    <input  type="number" id="years_of_experience" class="form-control" placeholder="Enter years Of Experience" name="years_of_experience" required>

                    @if ($errors->has('years_of_experience'))
                        <span class="help-block">
                            <strong>{{ $errors->first('years_of_experience') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }}">
                <label for="region_id" class="col-md-4 control-label">Current Region
                   <span class="required"><font color="red">*</font></span>
                </label>
                <div class="col-md-4">
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
            <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
                <label for="city_id" class="col-md-4 control-label">Current Location
                            <span class="required"><font color="red">*</font></span>
                </label>
                <div class="col-md-4">
                            <select name="location" id="location" class="form-control" >
                                <option value="">...Select Region...</option>
                            </select>    
                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                <label for="cv_file" class="col-md-4 control-label">Upload  A CV
                <span class="required"><font color="red">*</font></span>
                </label>
                <div class="col-md-4">
           <input id="file" type="file" class="form-control" name="file" required="required">
                    @if ($errors->has('file'))
                        <span class="help-block">
                            <strong>{{ $errors->first('file') }}</strong>
                        </span>
                    @endif
                        <span class="note note-danger"><font color="red"> NOTE: allowed file extensions are : 'doc,docx,pdf,rtf,odt'</font></span>
                </div>
            </div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                   <button class="btn btn-primary" type="submit" id="add">
                    <span class="glyphicon glyphicon-plus"></span> Submit
                    </button>
            <!-- <img id="loading" src="{{asset('uploads/ajax-loader.gif')}}" > -->
               <br>NOTE: Do not press Submit more than once. Your upload may take some time.
                </div>
                </div> 
                </form>
          </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
</table>
         <p class="error text-center alert alert-danger hidden" style="padding-left: 350px; width: 1000px;">
           </p>            
             </div>
          </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
            </div>
        </div>
    </div>
    </div>
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <script src="{{ asset('js/app.js') }}"></script>
      <script src="{{ asset('js/selectform.js') }}"></script>
    </body>
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
</html>