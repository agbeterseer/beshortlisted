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
        <link href="{{ asset('css/assets/global/plugins/bootstrap-summernote/summernote.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('css/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
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
    <style>
p.dotted {border-style: dotted;}
p.dashed {border-style: dashed;}
p.solid {border-style: solid;}
p.double {border-style: double;}
p.groove {border-style: groove;}
p.ridge {border-style: ridge;}
p.inset {border-style: inset;}
p.outset {border-style: outset;}
p.none {border-style: none;}
p.hidden {border-style: hidden;}
p.mix {border-style: dotted dashed solid double;}

.make_line{
 border-style: groove;

 margin: auto;
 padding: 10px;
}
.ladda-label-color: #CCCCCC;

.center {
    margin: auto;
    width: 60%;
    border: 3px solid #73AD21;
    padding: 10px;
}
.middleDiv {
   
    width    : 200px;
    height   : 200px;
    left     : 50%;
    top      : 50%;
 
}

.add_button{
 border-style: groove;
 margin: auto;
 padding: 10px;
 background-color: #CCCCCC;
 height: 50%;

}
hr { 
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
}
</style>
    <title>Rhizome Consulting |Job Applicaition Form</title>
  </head>
  <body>

        
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

 <div class="col-md-8 col-md-offset-2">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Application</span>
                    </div>
                </div>
       
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>

        <div class="col-md-12 " style="background-color: #4E4E4E;">
            <div class="portlet light bordered">
                 

               
          
        <form class="mt-repeater" name="candidateForm" action="{{route('job.application')}}" enctype="multipart/form-data" method="post"> 
 {{ csrf_field() }}
 


             <div class="col-md-12" style="background-color: #F7F7F7;">
                 <div class="form-group"> 
                  <h3 class="mt-repeater-title" style="margin-top: 30px;">Profile</h3>
                 <hr style="width:auto; font-weight: bold;">


                            <div class="row"> 
                               <div class="col-md-6">
                            <div class="form-group">
                          <label for="candidates_name" class="cols-sm-2 control-label">Full Name
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
                            <!-- /input-group -->
                            </div>
              
                            <!-- /.col-md-6 -->
                            <div class="col-md-6">
                            <div class="form-group">
                             <label for="candidates_name" class="cols-sm-2 control-label">    Email Address
                      <span class="required"><font color="red">*</font></span>
              </label>
                           <div class="cols-sm-10">
                       
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope fa-lg" aria-hidden="true"></i></span>
                  <input type="email" class="form-control" name="email" id="email"  placeholder="Enter your Email"  required="required" />
                </div>
              </div>

                            </div>
                            <!-- /input-group -->
                            </div>
                            <!-- /.col-md-6 -->
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
                            <!-- /input-group -->
                            </div>
                            <!-- /.col-md-6 -->
                            <div class="col-md-6">
              <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
              
              <label for="date_of_birth" class="cols-sm-2 control-label">Date of Birth
              <span class="required"><font color="red">*</font></span>
              </label>
                    <div class="cols-sm-10">
                <div class="input-group">
                 <span class="input-group-addon"><i class="fa fa-globe fa" aria-hidden="true"></i></span>
                 <input type="date" name="date_of_birth" id="date_of_birth" value="" required="required"  size="10" maxlength="10">
           
                                @if ($errors->has('date_of_birth'))
                        <span class="help-block">
                            <strong>{{ $errors->first('date_of_birth') }}</strong>
                        </span>
                    @endif
                </div>
              </div>
                            </div>
                            </div>
                            <!-- /.col-md-6 -->
                            </div>


                                  <div class="row"> 
                               <div class="col-md-6">
                        <div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }}">
              <label for="region" class="cols-sm-2 control-label">Your Region
               <span class="required"><font color="red">*</font></span>
              </label>
                     <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-plane fa" aria-hidden="true"></i></span>
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
                            <!-- /input-group -->
                            </div>
              
                            <!-- /.col-md-6 -->
                            <div class="col-md-6">
                             <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}" >
              <label for="location" class="cols-sm-2 control-label" >State Of Origin
               <span class="required"><font color="red">*</font></span>
              </label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-search fa-lg" aria-hidden="true"></i></span>
                     <select name="location" id="location" class="form-control" required="required" >
                                <option value="">...Select Region...</option>
                            </select>
                            
                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif

                </div>
              </div>
            </div>
                            <!-- /input-group -->
                            </div>
                            <!-- /.col-md-6 -->
                            </div>
<!-- end row -->

      <div class="row"> 
                               <div class="col-md-6">
                            <div class="form-group">
              <label for="d_employment_term" class="cols-sm-2 control-label">Desired Employement Terms
             
              </label>
              <div class="cols-sm-10">
                <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-briefcase fa" aria-hidden="true"></i></span>
              <select name="d_employment_term" id="d_employment_term"  class="form-control" >
                <option value="">Select One</option> 
                                       <option value="All Contracts">All Contracts</option>
                                        <option value="Full Time">Full Time</option>
                                         <option value="Part Time">Part Time</option>
                                          <option value="Contract">Contract</option>
                                           <option value="Temp (Dispatch)">Temp (Dispatch)</option>
                                            <option value="Internship">Internship</option>
                                            <option value="Seasonal">Seasonal</option>
                                            <option value="Freelance">Freelance</option> 
              </select>
                    @if ($errors->has('d_employment_term'))
                        <span class="help-block">
                            <strong>{{ $errors->first('d_employment_term') }}</strong>
                        </span>
                    @endif
              </div>
            </div> 
           </div> 
                            <!-- /input-group -->
                            </div>
              
                            <!-- /.col-md-6 -->
                            <div class="col-md-6">
                       <div class="form-group{{ $errors->has('other_profession') ? ' has-error' : '' }}" >
              <label for="other_profession" class="cols-sm-2 control-label" >Phone Number
                <span class="required"><font color="red">*</font></span>
              </label>
              <div class="cols-sm-10">
                <div class="input-group">

          <span class="input-group-addon"><i class="fa fa-phone fa-lg" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" required name="phonenumber" id="phonenumber"  placeholder="Enter your Phnone number"   />

             @if ($errors->has('phonenumber'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phonenumber') }}</strong>
                        </span>
                    @endif

                </div>
              </div>
            </div> 
                            <!-- /input-group -->
                            </div>
                            <!-- /.col-md-6 -->
                            </div>

                            <!-- end row -->

      <div class="row"> 
                               <div class="col-md-6">
                             <div class="form-group">
              <label for="profession" class="cols-sm-2 control-label">Educational Level             
              </label>
              <div class="cols-sm-10">
                <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lg" aria-hidden="true"></i></span>
<select name="educational_level" class="form-control">
                  <option value="">Select One</option> 
                  <option value="High School or equivalent">High School or equivalent</option>
                  <option value="Associate/2-Year Degree">Associate/2-Year Degree</option>
                  <option value="Bachelor's Degree">Bachelor's Degree</option>
                  <option value="Master's Degree">Master's Degree</option>
                  <option value="Doctorate">Doctorate</option>                    
</select>
              @if ($errors->has('profession'))
                  <span class="help-block">
                      <strong>{{ $errors->first('profession') }}</strong>
                  </span>
                    @endif
              </div>
            </div> 
           </div> 
                            <!-- /input-group -->
                            </div>
              
                            <!-- /.col-md-6 -->
                            <div class="col-md-6">
                     <div class="form-group{{ $errors->has('career_level') ? ' has-error' : '' }}" >
              <label for="career_level" class="cols-sm-2 control-label" >Career Level
              </label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-briefcase fa-lg" aria-hidden="true"></i></span>
          <select name="career_level" id="career_level"  class="form-control" >
                <option value="">Select One</option> 
                  <option value="Student (High School)">Student (High School)</option>
                  <option value="Student (Undergraduate/Graduate)">Student (Undergraduate/Graduate)</option>
                  <option value="Entry Level">Entry Level</option>
                  <option value="Experienced (Non-Manager)">Experienced (Non-Manager)</option>
                  <option value="Manager (Manager/Supervisor of Staff)">Manager (Manager/Supervisor of Staff)</option>
                  <option value="Executive (SVP, VP, Department Head, etc)">Executive (SVP, VP, Department Head, etc)</option>
                <option value="Senior Executive (President, CFO, etc)">Senior Executive (President, CFO, etc)</option>
                                   
              </select>


              @if ($errors->has('career_level'))
                        <span class="help-block">
                            <strong>{{ $errors->first('career_level') }}</strong>
                        </span>
                    @endif

                </div>
              </div>
            </div> 
                            <!-- /input-group -->
                            </div>
                            <!-- /.col-md-6 -->
                            </div>

<!-- e -->

      <div class="row"> 
                               <div class="col-md-6">
                             <div class="form-group">
             <label for="availability" class="cols-sm-2 control-label">Availability
              <span class="required"><font color="red">*</font></span>
              </label>
              <div class="cols-sm-10">
                <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-briefcase fa" aria-hidden="true"></i></span>
     <select name="availability" id="availability"  class="form-control" >
                <option value="">Select One</option> 
                  <option value="Immediate">Immediate</option>
                  <option value="1 week">1 week</option>
                  <option value="2 weeks">2 weeks</option>
                  <option value="1 month">1 month</option>
                  <option value="Temp (Dispatch)">Temp (Dispatch)</option>
                  <option value="2 months">2 months</option>
                  <option value="Specific date">Specific date</option>            
              </select>
              @if ($errors->has('availability'))
                  <span class="help-block">
                      <strong>{{ $errors->first('availability') }}</strong>
                  </span>
                    @endif
              </div>
            </div> 
           </div> 
                            <!-- /input-group -->
                            </div>
              
                            <!-- /.col-md-6 -->
                   <div class="col-md-6"  style="display:none;" id="availability_date"> 
        
               <div class="form-group{{ $errors->has('availability_date') ? ' has-error' : '' }}" >
              <label for="availability_date" class="cols-sm-2 control-label" >Availability Date</label>
              <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-globe fa" aria-hidden="true"></i></span>
   <input type="date" name="availability_date" id="availability_date" value=""   size="10" maxlength="10">
           
                    @if ($errors->has('availability_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('availability_date') }}</strong>
                        </span>
                    @endif  
                </div>
              </div>
            </div> 
              </div> 
                            <!-- /.col-md-6 -->
                            </div>

<!-- end row -->

      <div class="row"> 
                        <div class="col-md-6">
          <div class="form-group{{ $errors->has('years_of_experience') ? ' has-error' : '' }}">
              <label for="years_of_experience" class="cols-sm-2 control-label" >Years of Experience
               <span class="required"><font color="red">*</font></span>
              </label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-history fa-lg" aria-hidden="true"></i></span>
      <input  type="number" id="years_of_experience" class="form-control" placeholder="Enter years Of Experience" name="years_of_experience" required > 
                         @if ($errors->has('years_of_experience'))
                        <span class="help-block">
                            <strong>{{ $errors->first('years_of_experience') }}</strong>
                        </span>
                    @endif
                </div>
              </div>
            </div> 
          </div>  

              
                            <!-- /.col-md-6 -->
                            <div class="col-md-6">
                            <div class="form-group">
                            <label class="control-label col-md-3">
                             </label>
                            <div class="col-md-10">
                       
                            </div>

                            </div>
                            <!-- /input-group -->
                            </div>
                            <!-- /.col-md-6 -->
                            </div>
             

              <h3 class="mt-repeater-title" style="margin-top: 30px;">Educational Qualifications</h3>
                 <hr style="width:auto; font-weight: bold;">



                 <div>
 
               <textarea class="form-control" name="educational_history" id="summernote_2"></textarea>
</div>


               
              <label class="control-label col-md-3"> </label>

<div class="mt-repeater">
 
             <h3 class="mt-repeater-title" style="margin-top: 30px;">Employment History</h3>
                 <hr style="width:auto; font-weight: bold;">
                                            <div data-repeater-list="group_a">
                                                <div data-repeater-item class="mt-repeater-item">
                                                    <!-- jQuery Repeater Container -->
                                                      <div class="mt-repeater-input">
                                                        <label class="control-label">Date In </label>
                                                        <br/>
                                                        <input class="input-group form-control form-control-inline date date-picker" size="16" type="text" value="" name="date_joined" data-date-format="dd/mm/yyyy" /> </div>
                                                        <div class="mt-repeater-input">
                                                        <label class="control-label">Date Out</label>
                                                        <br/>
                                                        <input class="input-group form-control form-control-inline date date-picker" size="16" type="text" value="" name="date_out" data-date-format="dd/mm/yyyy" /> </div>
                                                        <div class="mt-repeater-input">
                                                        <label class="control-label">Position</label>
                                                        <br/>
                                                        <input type="text" name="position" class="form-control" value="John Smith" /> </div>
                                                  
                                                    <div class="mt-repeater-input mt-repeater-textarea">
                                                        <label class="control-label">Name Of Organisation</label>
                                                        <br/>
                                                        <input type="text" name="organisation" class="form-control" value="Name Of Organisation" /> 
                                                
                                                    </div>
                                                
                                           
                                                    <div class="mt-repeater-input">
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete">
                                                            <i class="fa fa-close"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="javascript:;" data-repeater-create class="btn btn-success mt-repeater-add">
                                                <i class="fa fa-plus"></i> Add</a>

       <div class="portlet-title" style="margin-top: 50px;">
                    <div class="caption font-dark">
                 
                        <span class="caption-subject bold">Upload  A CV</span>
                         <!-- <span class="caption-subject " style="padding-left: 356px;">   <i class="icon-docs"></i>Edit</span>-->
                    </div>

                </div>

    <div >
 
              
           <input id="file" type="file" class="form-control" name="file" required="required">
                    @if ($errors->has('file'))
                        <span class="help-block">
                            <strong>{{ $errors->first('file') }}</strong>
                        </span>
                    @endif
                        <span class="note note-danger"><font color="red"> NOTE: allowed file extensions are : 'doc,docx,pdf,rtf,odt'</font></span>
          
             
            </div>

                                       
                            <div align:center>

                             <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
</div>
                                        </form>



 

             </div>
        </div>



 
  
                </div>
            </div>
        </div>
 


  </body>


         <script src="{{ asset('css/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('css/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('css/assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('css/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('css/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('css/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{ asset('css/assets/global/plugins/jquery-repeater/jquery.repeater.js')}}" type="text/javascript"></script>
        <script src="{{ asset('css/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{ asset('css/assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ asset('css/assets/pages/scripts/form-repeater.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('css/assets/pages/scripts/components-date-time-pickers.min.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{ asset('css/assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('css/assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('css/assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('css/assets/layouts/global/scripts/quick-nav.min.js')}}" type="text/javascript"></script>

  <script src="{{ asset('js/selectform.js') }}"></script>
<script src="{{ asset('css/assets/global/plugins/bootstrap-summernote/summernote.min.js')}}" type="text/javascript"></script>

     <!--      <script src="{{ asset('css/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
<!--<script src="{{ asset('css/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script> -->

<!--<script src="{{ asset('css/assets/global/plugins/jquery-repeater/jquery.repeater.js')}}" type="text/javascript"></script>-->
 <!--  <script src="{{ asset('css/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('css/assets/pages/scripts/form-samples.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('css/assets/global/scripts/app.min.js') }}" type="text/javascript"></script>

    <script src="{{asset('css/assets/pages/scripts/form-repeater.min.js')}}" type="text/javascript"></script> -->


<script>
$(document).ready(function() {
    var max_fields      = 10;
    var wrapper         = $(".container1");
    var add_button      = $(".add_form_field");
  
    var x = 1;
    $(add_button).click(function(e){
        e.preventDefault();
        if(x < max_fields){
            x++;

            $(wrapper).append('<div> Date of Employment: <input type="text" name="date_of_employment1[]" placeholder="Date Of Employment" class="form-control" required="required" />Position: <input type="text" name="position1[]" placeholder="Position" class="form-control" required="required" />Organisation: <input type="text" name="organisation1[]" placeholder="Enter Organisation" class="form-control" required="required" /><a href="#" class="delete">Delete</a></div>'); //add input box
        }
  else
  {
  alert('You Reached the limits')
  }
    });
  
    $(wrapper).on("click",".delete", function(e){
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>
<script type="text/javascript">
    $("#availability").change(function() { 
    
    if ( $(this).val() == "Specific date") {

    $("#cboState").hide();

    $("#availability_date").show();

}
    else{
    
        $("#cboState").show();
        $("#availability_date").hide();
    }

});


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
</script>

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