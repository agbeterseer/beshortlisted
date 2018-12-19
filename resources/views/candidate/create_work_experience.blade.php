
<div class="modal fade bs-modal-lg" id="static_work" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">Add Work History</h4>
</div>
<div class="modal-body">

<!-- BEGIN EXAMPLE TABLE PORTLET-->
<!-- <div class="portlet light bordered">
<div class="portlet-body"> -->
 <!-- <pre> Specifications</pre> -->
 
<form class="form-horizontal" action="{{ route('add.work_history') }}" method="post" role="form" name="workform">
{{ csrf_field() }} 
<input type="hidden" name="resume" value="{{$user_single_resume_by_date->id}}">
   <input type="hidden" value="workhistory" name="work_history">
 <div class="row">
<div class="col-md-6"> 
<div class="form-group"> 
<div class="col-md-8" style="overflow-x:auto;">
<label>From: <span class="required">*</span>  </label> 
<div class="careerfy-three-column-row"> 
<div class="careerfy-profile-select careerfy-three-column">
    <select name="work_from_year" id="from_year" required="required" style="font-size: 16px; color: #000000;">
    <option value="" selected="selected">Year</option>
        @foreach($recruityear_list as $recruityear)
      <option value="{{$recruityear->name}}">{{$recruityear->name}}</option>
      @endforeach
                </select>
            </div>
 
                <div class="careerfy-profile-select careerfy-three-column">                                                
<select name="work_from_month" id="work_from_month" required="required" style="font-size: 16px; color: #000000;">
 <option value="" selected="selected">Month</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>
                                       
                </div>
            </div>
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->


<div class="col-md-6">
<div class="form-group"> 
<div class="col-md-8" style="overflow-x:auto;">
<label> To: <span class="required">*</span> </label>
<div class="careerfy-three-column-row"> 
           <div class="careerfy-profile-select careerfy-three-column">
  <select name="end_year" id="end_year"  style="font-size: 16px; color: #000000; display: block;" >
 
    <option value="" selected="selected">Year</option>
    @foreach($recruityear_list as $recruityear)
      <option value="{{$recruityear->name}}">{{$recruityear->name}}</option>
      @endforeach
 </select>
<!--    <select name="end_year" id="end_year2" style="font-size: 16px; color: #000000; display: none;"  >
 
    <option value="" >Year</option>
    @foreach($recruityear_list as $recruityear)
      <option value="{{$recruityear->name}}">{{$recruityear->name}}</option>
      @endforeach
 </select> -->
     </div>
<div class="careerfy-profile-select careerfy-three-column">                                            
<select name="end_month" id="end_month_work" style="font-size: 16px; color: #000000; display: block;">
<option value="" selected="selected">Month</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>
 </div>
 
<input type="checkbox" name="current" value="1" id="present" style="display: block;"> 
 
<input type="checkbox" name="current" value="0" id="present2" hidden="hidden"> 
    </div>
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->

 </div>
<p></p>
 <div class="workhistory_inner several2">
<!-- <form role="form"> -->
<div class="row">
<div class="col-md-6">
<div class="form-group"> 

<div class="col-md-8">
 <label> Position Title <span class="required">*</span></label>  
 
 <input type="text" name="position_title" id="position_title" placeholder="Eg. Software Developer" class="form-control" required="required">

<p></p>
 <label>Career Level:<span class="required">*</span> </label> 
 <select name="career_level" class="form-control" id="career_level" required="required">
  <option value="" selected="selected">Please Select</option>
 @foreach($job_career_levelList as $job_career_level)
    <option value="{{$job_career_level->id}}">{{$job_career_level->name}}</option>
    @endforeach

</select> 

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->


<div class="col-md-6">
<div class="form-group"> 
<div class="col-md-8">
 <label> Company Name <span class="required">*</span></label>
 <input type="text" class="form-control" name="company_name" required="required" placeholder="Enter Company Name">
<p></p>

 
<label>Work Location <span class="required">*</span></label>

<select name="country" class="form-control" required="required" >
  <option value="" selected="selected">Please Select</option>

@foreach($countries as $country)
 <option value="{{$country->code}}">{{$country->name_en}}</option>
@endforeach
</select>
   
</div>
</div>
<!-- /input-group -->
</div>



<!-- /.col-md-6 -->
</div>
</div>
<!-- /.row -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-12 pageaction forml">
Industries <span class="required">*</span>
<div class="boxheights" style="font-size: smaller;">
<ul class="jsize7_2 sizespace2 selectfield">
@foreach($industries as $industry)
<li>
<label><input type="checkbox" name="work_industries[]" id="work_industries_{{$industry->id}}" value="{{$industry->id}}"> {{$industry->name}}</label></li>
 
@endforeach
---------------------------

</ul>

<div class="clear"></div>
</div>
 
</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->

<!-- /.col-md-6 -->
</div>


<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-12 pageaction forml">
Functions: <span class="required">*</span>
<div class="boxheights" style="font-size: smaller;">
<ul class="jsize7_2 sizespace2 selectfield">
 @foreach($industries as $industry)
 <li class="group-parent">{{$industry->name}}</li>
 @foreach($industry_profession as $industry_pr)
 @if($industry->id === $industry_pr->industry_id)
<li>
<label class="group_children" for="function-{{$industry_pr->id}}">
<input type="checkbox" id="function-{{$industry_pr->id}}" name="professions_[]" class="group_function_{{$industry_pr->id}}" value="{{$industry_pr->id}}">{{$industry_pr->name}}</label></li>
@endif
 @endforeach
 @endforeach
---------- ---- ----
 </ul>
 </div>
</div>
</div>
</div>
</div>

<!-- </form> -->
 
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-12">
Responsibilities and Achievements
 <textarea name="responsibilities" class="form-control" id="summernote_2" ></textarea>
<!-- <textarea name="responsibilities" id="summernote_1" class="form-control" ></textarea> -->
<!-- <textarea class="form-control" placeholder="Design and Implementation of Document Management System 
• Analysis and design of database and user interface Unit testing 
• Developing user manuals" name="responsibilities" style="margin-top: 0px; margin-bottom: 0px; height: 130px;"></textarea>  -->
 

 
</div>

</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->

<!-- /.col-md-6 -->
</div>
 
    </div>
    <div class="modal-footer">
    <button type="submit" class="btn dark btn-outline" data-dismiss="modal">Close</button>
    <button type="submit" class="btn green">Save changes</button>

    </div>
    </form>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
