@extends('layouts.admin_layout', [
  'page_header' => 'Policy',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' => '',
    'policy' => 'active', 
  'package' => '',
  'page' => ' ',
     'role' => '',
  'user' => '',
])
@section('content')
     


                                @if(Session()->has('success'))
                        <div class="alert alert-success"> 
                        {!! Session::get('success') !!}
                        </div>
                        @endif
                       @if(Session()->has('error'))
                        <div class="alert alert-danger"> 
                        {!! Session::get('error') !!}
                        </div>
                        @endif
 <form class="form-horizontal" action="{{route('tag.store')}}" method="post" role="form">
                        {{ csrf_field() }}
                        <input type="hidden" name="admin" value="admin_check">
 
                 <div class="search-page search-content-3">
                            <div class="row">
                                <div class="col-lg-3">
                     
                                    <div class="search-filter ">
                                    
                                        <div class="search-label uppercase" style="margin-top: 15px;">Organisation
                                             <span class="required" style="color:red" > *</span>
                                        </div> 
 
                        <select name="client" multiple="multiple" required="required" class="form-control"> 
                        <div class="container">
                                <div class="row">
                            @foreach($clients as $client)
                        <option value="{{$client->id}}">    {{$client->name}}</option>
                                @endforeach
                                </div>
                                </div>              
                            </select>
                   <div class="search-label uppercase" style="margin-top: 15px;">Select Industry
                    <span class="required" style="color:red" > *</span>
                                    </div>
                    <select name="p_industry" class="form-control" required="required" multiple="multiple">
                    @foreach($industries as $industry)
                    <option value="{{$industry->id}}">{{$industry->name}}</option>  
                    @endforeach
                    </select>
                                          
           <div class="search-label uppercase" style="margin-top: 15px;">Job Category / Position
             <span class="required" style="color:red" > *</span>
           </div>
            <select name="job_category" class="form-control"  required="required" > 
            <option value="">Select a Category</option>
            @foreach($industry_professions as $industry_profession)
            <option value="{{$industry_profession->id}}">{{$industry_profession->name}}</option> 
            @endforeach 
            </select>  
    
         <div class="search-label uppercase" style="margin-top: 15px;">Job Type *
         <span class="required" style="color:red" > *</span>
                                    </div>

                <select name="job_type" required="required" class="form-control">
                <option value="">Select a Type</option>
                @foreach($employement_terms as $employement_term)
                <option value="{{$employement_term->id}}">{{$employement_term->name}}</option>
                @endforeach
                </select>
         <div class="search-label uppercase" style="margin-top: 15px;">Job Level *
         <span class="required" style="color:red" > *</span>
                                    </div>
 
<select name="p_job_level" required="required" class="form-control" >
<option>Select a Level</option>
@foreach($jobcareer_levels as $jobcareer_level)
<option value="{{$jobcareer_level->id}}">{{$jobcareer_level->name}}</option>
@endforeach
</select> 
                           <div class="search-label uppercase" style="margin-top: 15px;">Select Salary Expectation
                           <span class="required" style="color:red" > *</span>
                                    </div> 
                                            <select name="p_salary_range" required="required" class="form-control">
                                            <option value="">Select Salary Range</option>
                                            <option value="N50,000-N100,000">N50,000-N100,000</option>
                                            <option value="N150,000-N250,000">N150,000-N250,000</option>
                                            <option value="N350,000-N600,000">N350,000-N600,000</option>
                                            <option value="N750,000-N1,000,000">N750,000-N1,000,000</option>
                                            <option value="N1,000,000-N5,000,000">N1,000,000-N5,000,000</option>
                                            <option value="N5,050,000-N10,000,000">N5,050,000-N10,000,000</option>
                                            <option value="N10,000,000-N15,000,000">N10,000,000-N15,000,000</option>
                                            <option value="N15,000,000-Above">N15,000,000-Above</option>

                                            </select>
                                             <div class="search-label uppercase" style="margin-top: 15px;">Select Years of Expectation
                                             <span class="required" style="color:red" > *</span>
                                    </div>
                                    <select name="p_experience" required="required" class="form-control">
                                    <option value="">Select Experience</option>
                                        <option value="0-5">0-5</option>
                                        <option value="6-10">6-10</option>
                                        <option value="11-15">11-15</option>
                                        <option value="16-20">16-20</option>
                                        <option value="25 Above">25 Above</option>
                                    </select>
 
                                <div class="search-label uppercase" style="margin-top: 15px;">Qualification*
                                             <span class="required" style="color:red" > *</span>
                                    </div>
                <select name="p_qualification" required="required" class="form-control">
                <option value="">Select Qualification</option>
                @foreach($educational_levels as $educational_levels)
                <option value="{{$educational_levels->id}}">{{$educational_levels->name}}</option>
                @endforeach   
                </select>
        <div class="search-label uppercase" style="margin-top: 15px;">Gender*
                                             <span class="required" style="color:red" > *</span>
                                    </div>
 
  
        <select name="p_gender" required="required" class="form-control">
        <option>Select Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="All">All</option>
        </select>

    <div class="search-label uppercase" style="margin-top: 15px;">Make Feature
   
    </div>
  
        <select name="feature" class="form-control">
        <option value="">...Select One...</option>
        <option value="1">YES</option>
        <option value="0">NO</option> 
        </select>
       
<!--                     <div class="multiselect">
    <div class="selectBox" onclick="showCheckboxes()">
        
        <select class="form-control" >
            <option>Select an option</option>

        </select>
        <div class="overSelect"></div>

    </div>
       <?php $count = 0;  ?>
 
      <div id="checkboxes">

       @foreach($professions as $profession)
    <label for="one{{$profession->id}}"><input type="checkbox" id="one{{$profession->id}}"  name="" value="{{$profession->id}}">{{$profession->name}}</label>
    
  @endforeach
    <?php $count++;  ?>
 
</div>       
</div> -->


        <script>
    var expanded = false;
    function showCheckboxes() {
        // body...
        var chechboxes = document.getElementById("checkboxes");
        if (!expanded) {
            chechboxes.style.display = "block";
            expanded = true;
        }else{
            checkboxes.style.display = "none";
            expanded = false;
        }
    }

</script>
                      
                         <div class="search-label uppercase" style="margin-top: 15px;">
                                    </div>
                                        <div class="search-filter-divider bg-grey-steel"></div>
                                        <div class="search-filter-divider bg-grey-steel"></div>
                                    </div>
                                </div>



 
                                      <div class="col-md-8">
                                      <div class="note note-success">
<h3> Job Details</h3>
 
</div>
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Job Details</span>
                    </div>
                
                </div>
       
<div class="row">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">End Date
                        <span class="required" >*</span>
                </label>

                <div class="col-md-4">
                    <input id="end_date" type="date" class="form-control" name="end_date" required>

                    @if ($errors->has('end_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('end_date') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name
                        <span class="required" >*</span>
                </label>

                <div class="col-md-4">
                    <input id="name" type="text" class="form-control" name="name" placeholder="Enter TAG name"   required>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('job_title') ? ' has-error' : '' }}">
                <label for="job_title" class="col-md-4 control-label">Job Title
                <span class="required" >*</span>
                </label>

                <div class="col-md-4">
                    <input id="job_title" type="text" class="form-control" name="job_title" placeholder="Enter Job Title"   required>

                    @if ($errors->has('job_title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('job_title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        
            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                <label for="display_name" class="col-md-4 control-label">Displyname</label>
                <div class="col-md-4">
                    <input id="" type="text" class="form-control" name="display_name" placeholder="Enter Display name" >

                    @if ($errors->has('display_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('display_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
                <h2> Address</h2>
            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                <label for="display_name" class="col-md-4 control-label">Country *</label>
                <div class="col-md-4">
                        <select name="p_country" required="required" id="country" class="form-control">
                        <option value="">Select Country</option>
                        @foreach($countries as $country) 
                        <option>{{$country->name_en}}</option>
                        @endforeach
                        </select>
                    @if ($errors->has('display_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('display_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group{{ $errors->has('region') ? ' has-error' : '' }}">
            <label for="region" class="col-md-4 control-label">Region *</label>
            <div class="col-md-4">
                <select name="region" required="required" class="form-control">
                <option value="">Select Region</option>
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


            <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
            <label for="location" class="col-md-4 control-label">City / Town  *</label>
            <div class="col-md-4">
 <select name="location" id="location" class="form-control" required="required" >
           <option value="">...Select City...</option>
   </select> 
            @if ($errors->has('region'))
            <span class="help-block">
            <strong>{{ $errors->first('region') }}</strong>
            </span>
            @endif
            </div>
            </div>


             <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
            <label for="location" class="col-md-4 control-label">Full Address *</label>
            <div class="col-md-4">
            <textarea placeholder="Enter Full Address" required="required"  name="full_address" class="form-control"> </textarea>
 
            @if ($errors->has('region'))
            <span class="help-block">
            <strong>{{ $errors->first('region') }}</strong>
            </span>
            @endif
            </div>
            </div>
               
 
 </div>
 

                <div class="portlet-body">
                    <div class="">
                        <div class="row">
                            <div class="col-md-6">
 


                                <div class="btn-group">
 
                                </div>
                            </div>
                       
                        </div>
                    </div>



                                    
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>



  <div class="col-md-8">
  <div class="note note-danger">
<h3> Job Requirement</h3>
<p> 1. Enter requirement(s), as intended for your job Ad and then click on the 'Add' button  <br>
2. Leave "Value" on "Ture" for every question you enter.<br>
3. click on 'Delete' to remove a requirement 
</p>
</div>
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered" style="padding-left: 34px;">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Job Requirements</span>
                    </div>
                
                </div>
        <!--       <div class="form-group">
                                            <label class="control-label col-md-3">Requirements</label>
                                            <div class="col-md-12">
                                <input type="text" class="form-control input-large"  data-role="tagsinput" placeholder="this is the job requirements" name="requirement"> </div>
                                        </div> -->
 

                         <div class="portlet-body form">
 
                                <div class="form-body">
                                    <div class="form-group">
                                        <div action="#" class="mt-repeater form-horizontal">
                                            
                                            <div data-repeater-list="group_a">
                                                <div data-repeater-item class="mt-repeater-item">
                                                    
                                                    <div class="mt-repeater-input" style="width: 100%;">
                                                        <label class="control-label search-label">Enter Job requirements as applicable</label>
                                                        <br/>
                                   <input type="text" name="jrequirement" class="form-control" /> </div>
                                               
                                           
                                              <!--       <div class="mt-repeater-input mt-checkbox-inline">
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
                                                    </div> --> 
                                               
                                                    <div class="mt-repeater-input">
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete">
                                                            <i class="fa fa-close"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="javascript:;" data-repeater-create class="btn btn-success mt-repeater-add">
                                            <i class="fa fa-plus"></i> Add</a>
                                        </div>
                                    </div>
                                </div>
                            </div>  

                               @if(Session()->has('success'))
                        <div class="alert alert-success"> 
                        {!! Session::get('success') !!}
                        </div>
                        @endif
                       @if(Session()->has('error'))
                        <div class="alert alert-danger"> 
                        {!! Session::get('error') !!}
                        </div>
                        @endif
                
            </div>

            <div class="portlet-title">
            <div class="caption font-dark">

            <span class="caption-subject bold uppercase"></span>
            </div>
                
<div class="note note-success">
<h3> Job Assessment</h3>
<p> 1. Enter question(s), one at a time and then click 'Add' button <br>
2. Leave "Value" on "Ture" for every question you enter.<br>
3. click on 'Delete' to remove a question 
</p>
</div>
      </div>
            <div class="portlet light bordered" style="padding-left: 34px;">              
            <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Job Assessment</span>
                    </div>
                
                </div>
                <div class="portlet-body form"> 
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="mt-repeater form-horizontal">
                                            
                                            <div data-repeater-list="group_b">
                                                <div data-repeater-item class="mt-repeater-item">
                                                
                                                    <div class="mt-repeater-input" >
                                                        <label class="control-label"> Question</label>
                                                        <br/>
                                    <textarea name="assessment" class="form-control" required="required"></textarea>
                             </div>
                                               
                                                 
                                                   
                                                  <!--   <div class="mt-repeater-input mt-checkbox-inline">
                                                        <label class="control-label">Multiple Choice</label>
                                                        <br/>
                                                        <label class="mt-checkbox">
                                                            <input type="checkbox" id="inlineCheckbox21" value="option1"> English
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-checkbox">
                                                            <input type="checkbox" id="inlineCheckbox22" value="option2"> French
                                                            <span></span>
                                                        </label>
                                                    </div> -->

                                            <div class="mt-repeater-input">
                                                        <label class="control-label">Value</label>
                                                        <br/>
                                                        <select name="answer" class="form-control"  required="required">
                                                            <option value="YES" selected>True</option>
                                                            <option value="NO" disabled="disabled">False</option>
                                                            
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
                                        </div>
                                    </div>
                                </div>


                            </div>
        
<!--   <div class="form-group">
     <label class="control-label col-md-3">Job Assessment</label>
            <div class="col-md-12">
     <input type="text" class="form-control input-large"  data-role="tagsinput" placeholder="Experience in Project Finance and management of infrastructure funds." name="job_assessment">   </div>
                  </div>
 -->
  <!--    <div class="portlet-title">
                    <div class="caption font-dark">
                    
                        <span class="caption-subject bold uppercase"></span>
                    </div>
                
                </div>
 -->
            <!-- END EXAMPLE TABLE PORTLET-->
            </div>

        </div>
                     
     <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save Job
                                </button>
                            </div>
                        </div>

                            </div>


             

           </form>

  
@endsection
