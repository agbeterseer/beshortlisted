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
    <!--  <link href="{{ asset('css/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet"> -->
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
</style>
    <title>Rhizome Consulting |Job Applicaition Form</title>
  </head>
  <body >
  
     <nav class="navbar navbar-default  ">
            <ul class="nav nav">
        <li>  
         <img src="{{asset('logo/rhizome.jpg')}}" alt="Logo"  width="190px" height="50px"  class="logo-default" style="margin-left: 40px; margin-top: 13px;" />   </li>
        </ul>
        </nav>
        <p></p>
        <p></p>
        <p></p>
  <table class="navbar" border="1" align="center"  width="100%" >
        <tr>
        <td align="center"> <h3></h3> </td>    
    </tr>
</table>
<div align="center" >
 <strong style="color: green"> Welcome, Kindly complete the form below.Thank You.</strong>
</div>
<div align="center" >
  <p><b>Note: </b> Application for ....in IE8, unless a !DOCTYPE is declared.</p>
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
 
 
   <div class=" make_line" style="width: 70%; background-color: #F2F2F2;">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                 
                        <span class="caption-subject bold"> Personal Information</span>
                    </div>
                </div>
     <div >
          <a class="btn grey mt-ladda-btn ladda-button btn-outline add_button" type="submit"  data-toggle="modal" data-target="#Personal" data-style="slide-left" data-spinner-color="#333">
      
                  <span class="ladda-label ladda-label-color"  style="height: 50%; color: black;">
            <i class="icon-plus"></i> Add Personal Information</span>

               </a> 

          <form class="mt-repeater form-horizontal" name="candidateForm" action="{{route('job.application')}}" enctype="multipart/form-data" method="post">
                           {{ csrf_field() }}

              <div class="row">

              <!-- /.col-md-6 -->
              <div class="col-md-12">
              <div class="form-group"> 

              <label class="control-label col-md-3"> </label>
              <div class="col-md-10">         

           <div class="row">
               <div class="col-md-6">
 <div class="form-group{{ $errors->has('candidates_name') ? ' has-error' : '' }}">
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
          </div> 
      </div>

           <div class="col-md-6"> 
              <div class="form-group" >
              <label for="password" class="cols-sm-2 control-label" >Email Address  <span class="required"><font color="red">*</font></span>
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
  <!-- <div class="form-group{{ $errors->has('ethnicity') ? ' has-error' : '' }}">
               
                <label for="ethnicity" class="cols-sm-2 control-label" >Ethnicity&ensp;&ensp; 
                </label>
                <div class="cols-sm-10">
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                    <select name="ethnicity" id="ethnicity"  class="form-control" >
                    <option value="">Select One</option>
                    <option value="Black">Black</option>
                    <option value="White">White</option>
                    <option value="Asian">Asian</option>
                    <option value="Other">Other</option>  
                    </select>
                    
         @if ($errors->has('date_of_birth'))
                        <span class="help-block">
                            <strong>{{ $errors->first('date_of_birth') }}</strong>
                        </span>
                    @endif
                </div>
                </div>
              
</div> -->
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
        </div>
           <div class="row"> 
          <div class="col-md-6">
           <div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }}">
              <label for="region" class="cols-sm-2 control-label">Current Region
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
          </div>


          <div class="col-md-6">
            <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}" >
              <label for="location" class="cols-sm-2 control-label" >Current Location
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

          </div>

            
         </div>
           <div class="row">
         <div class="col-md-6">
           <div class="form-group">
              <label for="profession" class="cols-sm-2 control-label">Desired Employement Terms
             
              </label>
              <div class="cols-sm-10">
                <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-briefcase fa" aria-hidden="true"></i></span>
              <select name="demployment_terms" id="demployment_terms"  class="form-control" >
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
                    @if ($errors->has('profession'))
                        <span class="help-block">
                            <strong>{{ $errors->first('profession') }}</strong>
                        </span>
                    @endif
              </div>
            </div> 
           </div> 
          </div>
              
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


          </div> 
        </div>

    <div class="row">
         <div class="col-md-6">
           <div class="form-group">
              <label for="profession" class="cols-sm-2 control-label">Educational Level             
              </label>
              <div class="cols-sm-10">
                <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-briefcase fa" aria-hidden="true"></i></span>
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
          </div>
              
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
          </div> 
        </div>

    <div class="row"> 
          <div class="col-md-6">


       <div class="form-group{{ $errors->has('availability') ? ' has-error' : '' }}">
             
              <label for="availability" class="cols-sm-2 control-label" style="margin-left:15px;">Availability
              <span class="required"><font color="red">*</font></span>
              </label>
              <div class="cols-sm-10">
                <div class="input-group">
 
                
                  <span class="input-group-addon"><i class="fa fa-briefcase fa-lg" aria-hidden="true"></i></span>
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
 
          </div>
 
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
        </div> 
       
   
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


        </div>

                                        
</div>

</div>


<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
</div>

</div>


       
              
                 
<!--  View Profile -->
<!-- 
                <div class="portlet-title" style="margin-top: 50px;">
                    <div class="caption font-dark">
                 
                        <span class="caption-subject bold">Language Abilities</span>
                         <span class="caption-subject " style="padding-left: 356px;">   <i class="icon-docs"></i>Edit</span>
                    </div>
                </div>

              <button class="btn grey mt-ladda-btn ladda-button btn-outline" type="submit" data-style="slide-left" data-spinner-color="#333" >
                                    <span class="ladda-label ladda-label-color">
                                    <i class="icon-plus"></i> Language Abilities</span>
               </button> 
-->

                 <div class="portlet-title" style="margin-top: 50px;">
                    <div class="caption font-dark">
                 
                        <span class="caption-subject bold">Career Objectives and Summary</span>
                         <!-- <span class="caption-subject " style="padding-left: 356px;">   <i class="icon-docs"></i>Edit</span>-->
                    </div>
                </div>
     <div>
           <!-- <a class="btn grey mt-ladda-btn ladda-button btn-outline add_button" type="submit" data-style="slide-left" data-spinner-color="#333">
           <span class="ladda-label ladda-label-color"  style="height: 50%; color: black;">
              <i class="icon-plus"></i> Add Career Objectives</span>
               </a> -->
  
            <div class="form-group{{ $errors->has('career_objective') ? ' has-error' : '' }}" >
              <label for="career_objective" class="cols-sm-2 control-label" >Career Objectives
               <span class="required"><font color="red">*</font></span>
              </label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-search fa-lg" aria-hidden="true"></i></span>
                <textarea name="career_objective" class="form-control" rows="4" cols="10"></textarea>
                                @if ($errors->has('career_objective'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('career_objective') }}</strong>
                                    </span>
                                @endif
                </div>
              </div>
            </div>

      
               </div>

                 <!-- 
                 <div class="portlet-title" style="margin-top: 50px;">
                    <div class="caption font-dark">
                        <span class="caption-subject bold">Specialties and Skills</span>
                        <span class="caption-subject " style="padding-left: 356px;">   <i class="icon-docs"></i>Edit</span>
                    </div>  
                </div>
 
             <a class="btn grey mt-ladda-btn ladda-button btn-outline" type="submit"  data-toggle="modal" data-target="#Specialties" data-style="slide-left" data-spinner-color="#333" >
                    <span class="ladda-label ladda-label-color">
                  <i class="icon-plus"></i> Add Specialties and Skills</span>
               </a> -->

                  <div class="portlet-title" style="margin-top: 50px;">
                    <div class="caption font-dark">
               
                        <span class="caption-subject bold "> Employment History</span>
                       <!-- <span class="caption-subject " style="padding-left: 356px;">   <i class="icon-docs"></i>Edit</span>-->
                    </div>
                </div>
                     <div >
        <!-- <a class="btn grey mt-ladda-btn ladda-button btn-outline add_button" type="submit"  data-toggle="modal" data-target="#Specialties" data-style="slide-left" data-spinner-color="#333" >
                    <span class="ladda-label ladda-label-color"  style="height: 50%; color: black;">
                  <i class="icon-plus"></i>Add Employment History</span>
               </a> -->
 
</div>

       

                                       
  <div class="mt-repeater form-horizontal">
   
                                            <h3 class="mt-repeater-title">Human Resource Management</h3>
                                            <div data-repeater-list="group-a">
                                                <div data-repeater-item class="mt-repeater-item">
                                                    <!-- jQuery Repeater Container -->
                                                    <div class="mt-repeater-input">
                                                        <label class="control-label">Name</label>
                                                        <br/>
                                                        <input type="text" name="text-input" class="form-control" value="John Smith" /> </div>
                                                    <div class="mt-repeater-input">
                                                        <label class="control-label">Joined Date</label>
                                                        <br/>
                                                        <input class="input-group form-control form-control-inline date date-picker" size="16" type="text" value="01/08/2016" name="date-input" data-date-format="dd/mm/yyyy" /> </div>
                                                    <div class="mt-repeater-input mt-repeater-textarea">
                                                        <label class="control-label">Job Description</label>
                                                        <br/>
                                                        <textarea name="textarea-input" class="form-control" rows="3">This role is to follow up with all meetings and ensure that each operational process flow moves accordingly in a timely manner.</textarea>
                                                    </div>
                                                    <div class="mt-repeater-input mt-radio-inline">
                                                        <label class="control-label">Tier</label>
                                                        <br/>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="optionsRadios" id="optionsRadios25" value="junior" checked=""> Junior
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="optionsRadios" id="optionsRadios26" value="senior" checked=""> Senior
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="mt-repeater-input mt-checkbox-inline">
                                                        <label class="control-label">Language</label>
                                                        <br/>
                                                        <label class="mt-checkbox">
                                                            <input type="checkbox" id="inlineCheckbox21" value="option1"> English
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-checkbox">
                                                            <input type="checkbox" id="inlineCheckbox22" value="option2"> French
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="mt-repeater-input">
                                                        <label class="control-label">Department</label>
                                                        <br/>
                                                        <select name="select-input" class="form-control">
                                                            <option value="A" selected>Marketing</option>
                                                            <option value="B">Creative</option>
                                                            <option value="C">Development</option>
                                                        </select>
                                                    </div>
                                                    <div class="mt-repeater-input">
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete">
                                                            <i class="fa fa-close"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="javascript:;" data-repeater-create class="btn btn-success mt-repeater-add">
                                                <i class="fa fa-plus"></i> Add</a>
                                        
                         
 
                            <div data-repeater-list="group">
                            <div data-repeater-item class="mt-repeater-item">
                            <!-- jQuery Repeater Container -->
                            <div class="mt-repeater-input">
                           <br/>
          
                          <!-- /input-group --> 
Date:<input type="text" name="date_of_employment" placeholder="eg. 03/08/2016 - 03/08/2018" class="form-control"   />
Position:<input type="text" name="position" placeholder="Position held in the Organisation" class="form-control"   />
Organisation:<input type="text" name="company_name" placeholder="Name of the Organisation"  class="form-control"   />


                            </div>


                            <div class="mt-repeater-input">
                            <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete">
                            <i class="fa fa-close"></i> Delete</a>
                            </div>
                            </div>
                            </div>
                            <a href="javascript:;" data-repeater-create class="btn grey mt-ladda-btn ladda-button btn-outline mt-repeater-add btn-outline add_button" >
                            <i class="fa fa-plus"></i> Add Employment History</a>
                            <div class="modal-footer">
                           
                            <!--    <button type="button" class="btn green">Continue Task</button> -->

                          
                            </div>
                            </div>


                <div class="portlet-title" style="margin-top: 50px;">
                    <div class="caption font-dark">
                 
                        <span class="caption-subject bold">Educational History</span>
                         <!-- <span class="caption-subject " style="padding-left: 356px;">   <i class="icon-docs"></i>Edit</span>-->
                    </div>

                </div>
                 <div>
      <!--  <a class="btn grey mt-ladda-btn ladda-button btn-outline add_button"  type="submit"  data-toggle="modal" data-target="#Specialties" data-style="slide-left" data-spinner-color="#333" >
                    <span class="ladda-label ladda-label-color"  style="height: 50%; color: black;">
                  <i class="icon-plus"></i>Add Educational History</span>
               </a> -->


               <textarea class="form-control" name="educational_history" id="summernote_2"></textarea>
</div>

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


     <div >
     <p></p>
     <button class="btn btn-primary" type="submit" id="add">
                    <span class="glyphicon glyphicon-plus"></span> Submit Application
                    </button>
               
            </div>
</form>




                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                <span style="color: red;">
                @if(count($errors))
                    <ul>
                        @foreach($errors->all() as $error)
                           <li> {{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                </span>
                    </div>
                </div>
            </div>
        </div>



   <form name="candidateForm" action="{{route('job.application')}}" enctype="multipart/form-data" method="post"  >
                           {{ csrf_field() }}
   
              
    
   
       
<!--
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
        </div>
       

        <div class="row"> 
          <div class="col-md-6">
          
            <div class="form-group{{ $errors->has('annual_salary') ? ' has-error' : '' }}">
              <label for="annual_salary" class="cols-sm-2 control-label">Annual Salary
               <span class="required"><font color="red">*</font></span>
              </label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-money fa" aria-hidden="true"></i></span>
   <select name="annual_salary" id="annual_salary"  class="form-control" required="required"  >
                              
                <option value="" selected="">Select one</option>
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
            </div> 
            
            
          </div>

  <div class="col-md-6">
            
  </div>
 
         </div>
 
         

       
  <div class="form-group{{ $errors->has('career_highlights') ? ' has-error' : '' }}">
              <label for="confirm" class="cols-sm-2 control-label">Career highlights
              
              </label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-app fa-lg" aria-hidden="true"></i></span>
               <div id="border">
            <textarea id='text' name="career_highlights" class="form-control" required="required"></textarea>
        </div>
 
        <div id="result">
       <span class="note note-success"><font color="red"> not more than 200  Words:<span id="wordCount">0</span></font></span>
              
        </div>


                    @if ($errors->has('career_highlights'))
                        <span class="help-block">
                            <strong>{{ $errors->first('career_highlights') }}</strong>
                        </span>
                    @endif
               
                </div>
              </div>
            </div>
       
         

                        <div class="form-group ">
     <button class="btn btn-primary" type="submit" id="add">
                    <span class="glyphicon glyphicon-plus"></span> Submit
                    </button>
               
            </div>
            
          </form>
-->
         
                                       
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>

     </div>

             <!-- Employment History -->
    <div id="Specialties" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Details</h4>
                    </div>
           
                      <div class="modal-body">
                        <div class="row">
                             <div class="col-md-6">
             <div class="form-group">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 210px;">
                       
                         </div> 
                       </div>
                      </div>
<div class="form-group">
     <label class="control-label"><strong> Full Name :</strong>  
      </label>
        </div>
           <div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }}">
        
                <div class="input-group">
               <strong>Region :</strong> </div>
               
            </div> 
            <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}" >
                   
            <div class="input-group">
              <strong> State  :</strong>  State </div> 
            </div> 
                  
        <div class="form-group">
        <label class="control-label"><strong> Contact Address: </strong> </label>
        </div>

        <div class="form-group">
        <label class="control-label"><strong> Phone Number:</strong>  </label>

        </div> 

                          </div>
                          <div class="col-md-4">
                                     <small class="text-danger">{{ $errors->first('question_text') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('correct') ? ' has-error' : '' }}">
                                <small class="text-danger">{{ $errors->first('correct') }}</small>
                            </div>
                          </div>
                          
                          <div class="col-md-4">
                            <div class="form-group{{ $errors->has('code_snippet') ? ' has-error' : '' }}">
                                          <small class="text-danger">{{ $errors->first('code_snippet') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('answer_ex') ? ' has-error' : '' }}">
                                           <small class="text-danger">{{ $errors->first('answer_ex') }}</small>
                            </div>
                          </div>
                     
                        </div>
                      </div>
                   
              </div>
                </div>



                 <!-- Specialties -->
    <div id="Specialties" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Details</h4>
                    </div>
           
                      <div class="modal-body">
                        <div class="row">
                             <div class="col-md-6">
             <div class="form-group">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 210px;">
                       
                         </div> 
                       </div>
                      </div>
<div class="form-group">
     <label class="control-label"><strong> Full Name  :</strong>  
      </label>
        </div>
           <div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }}">
        
                <div class="input-group">
               <strong>Region :</strong> </div>
               
            </div> 
            <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}" >
                   
            <div class="input-group">
              <strong> State  :</strong>  State </div> 
            </div> 
                  
        <div class="form-group">
        <label class="control-label"><strong> Contact Address: </strong> </label>
        </div>

        <div class="form-group">
        <label class="control-label"><strong> Phone Number:</strong>  </label>

        </div> 

                          </div>
                          <div class="col-md-4">
                                     <small class="text-danger">{{ $errors->first('question_text') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('correct') ? ' has-error' : '' }}">
                                <small class="text-danger">{{ $errors->first('correct') }}</small>
                            </div>
                          </div>
                          
                          <div class="col-md-4">
                            <div class="form-group{{ $errors->has('code_snippet') ? ' has-error' : '' }}">
                                          <small class="text-danger">{{ $errors->first('code_snippet') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('answer_ex') ? ' has-error' : '' }}">
                                           <small class="text-danger">{{ $errors->first('answer_ex') }}</small>
                            </div>
                          </div>
                     
                        </div>
                      </div>
                   
              </div>
                </div>


                      <!-- Personal Information -->
    <div id="Personal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Profile</h4>
                    </div>
           
                      <div class="modal-body">

   <form name="candidateForm" action="{{route('job.application')}}" enctype="multipart/form-data" method="post">
                           {{ csrf_field() }}

                           <div class="row">
 
                                            <!-- /.col-md-6 -->
                                            <div class="col-md-12">
                                              <div class="form-group"> 

                            <label class="control-label col-md-3"> </label>
                                            <div class="col-md-10">
                           

           <div class="row">
               <div class="col-md-6">
 <div class="form-group{{ $errors->has('candidates_name') ? ' has-error' : '' }}">
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
          </div> 
            </div>


           <div class="col-md-6">

              <div class="form-group" >
              <label for="password" class="cols-sm-2 control-label" >Email Address  <span class="required"><font color="red">*</font></span>
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
  <!-- <div class="form-group{{ $errors->has('ethnicity') ? ' has-error' : '' }}">
               
                <label for="ethnicity" class="cols-sm-2 control-label" >Ethnicity&ensp;&ensp; 
                </label>
                <div class="cols-sm-10">
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                    <select name="ethnicity" id="ethnicity"  class="form-control" >
                    <option value="">Select One</option>
                    <option value="Black">Black</option>
                    <option value="White">White</option>
                    <option value="Asian">Asian</option>
                    <option value="Other">Other</option>  
                    </select>
                    
         @if ($errors->has('date_of_birth'))
                        <span class="help-block">
                            <strong>{{ $errors->first('date_of_birth') }}</strong>
                        </span>
                    @endif
                </div>
                </div>
              
</div> -->
 <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
              
              <label for="date_of_birth" class="cols-sm-2 control-label">Date of Birth
              <span class="required"><font color="red">*</font></span>
              </label>
              <div class="cols-sm-10">
                <div class="input-group">
                 <span class="input-group-addon"><i class="fa fa-globe fa" aria-hidden="true"></i></span>
                 <input type="date" name="date_of_birth" id="date_of_birth" value=""  size="10" maxlength="10">
           
                                @if ($errors->has('date_of_birth'))
                        <span class="help-block">
                            <strong>{{ $errors->first('date_of_birth') }}</strong>
                        </span>
                    @endif
                </div>
              </div>
           
        </div>
          </div> 
        </div>
           <div class="row">
         <div class="col-md-6">
           <div class="form-group">
              <label for="profession" class="cols-sm-2 control-label">Desired Employement Terms
             
              </label>
              <div class="cols-sm-10">
                <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-briefcase fa" aria-hidden="true"></i></span>
              <select name="demployment_terms" id="demployment_terms"  class="form-control" >
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
                    @if ($errors->has('profession'))
                        <span class="help-block">
                            <strong>{{ $errors->first('profession') }}</strong>
                        </span>
                    @endif
              </div>
            </div> 
           </div> 
          </div>
              
              <div class="col-md-6">
          
    

          <div class="form-group{{ $errors->has('other_profession') ? ' has-error' : '' }}" >
              <label for="other_profession" class="cols-sm-2 control-label" >Phone Number
              
              </label>
              <div class="cols-sm-10">
                <div class="input-group">

          <span class="input-group-addon"><i class="fa fa-phone fa-lg" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" required name="phonenumber" id="phonenumber"  placeholder="Enter your Phnone number"   />

             @if ($errors->has('availability'))
                        <span class="help-block">
                            <strong>{{ $errors->first('availability') }}</strong>
                        </span>
                    @endif

                </div>
              </div>
            </div> 


          </div> 
        </div>

    <div class="row">
         <div class="col-md-6">
           <div class="form-group">
              <label for="profession" class="cols-sm-2 control-label">Educational Level             
              </label>
              <div class="cols-sm-10">
                <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-briefcase fa" aria-hidden="true"></i></span>
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
          </div>
              
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
          </div> 
        </div>
    <div class="row"> 
          <div class="col-md-6">


       <div class="form-group{{ $errors->has('availability') ? ' has-error' : '' }}">
             
              <label for="availability" class="cols-sm-2 control-label" style="margin-left:15px;">Availability
              <span class="required"><font color="red">*</font></span>
              </label>
              <div class="cols-sm-10">
                <div class="input-group">
     
                
                  <span class="input-group-addon"><i class="fa fa-briefcase fa-lg" aria-hidden="true"></i></span>
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
                        </span
                @endif
                </div>
              </div>
            </div>
 
          </div>

          <div class="col-md-6"> 
        
               <div class="form-group{{ $errors->has('availability_date') ? ' has-error' : '' }}" >
              <label for="availability_date" class="cols-sm-2 control-label" >Availability Date</label>
              <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-globe fa" aria-hidden="true"></i></span>
   <input type="date" name="availability_date" id="availability_date" value=""  size="10" maxlength="10">
           
                    @if ($errors->has('availability_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('availability_date') }}</strong>
                        </span>
                    @endif  
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
          </div>


          <div class="col-md-6">
            <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}" >
              <label for="location" class="cols-sm-2 control-label" >Current Location
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

          </div>

            
         </div>
                                   <div class="form-group ">
     <button class="btn btn-primary" type="submit" id="add">
                    <span class="glyphicon glyphicon-plus"></span> Submit
                    </button>
               
            </div>
                                        
</div>
</div>


<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
</div>

</div>


</form>
</div>

</div>
</div>


</div>
 

<script src="{{ asset('css/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('css/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('css/assets/global/plugins/jquery-repeater/jquery.repeater.js')}}" type="text/javascript"></script>
   <script src="{{ asset('css/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('css/assets/pages/scripts/form-samples.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('css/assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/selectform.js') }}"></script>
    <script src="{{asset('css/assets/pages/scripts/form-repeater.min.js')}}" type="text/javascript"></script>
     <script src="{{ asset('css/assets/global/plugins/bootstrap-summernote/summernote.min.js')}}" type="text/javascript"></script>
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
  </body>
</html>