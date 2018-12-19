@extends('layouts.candidate')


@section('content')
 <div class="col-md-12">
 
  <div class="profile-content">
<div class="row">
<div class="col-md-12">
<div class="portlet light ">
<div class="portlet-title tabbable-line">
    <div class="caption caption-md">
        <i class="icon-globe theme-font hide"></i>
        <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
    </div>
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#tab_1_1" data-toggle="tab">Verification Information</a>
        </li>
    
 
    </ul>
</div>
<div class="portlet-body form">
    <div class="tab-content">
        <!-- PERSONAL INFO TAB -->
        <div class="tab-pane active" id="tab_1_1">
    
            
                    <div class="row">
             <div class="col-md-6">
           <div class="form-group">
              
            
                      
                                                   
 
</div>
                </div>
   
   <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Full Name   <span class="required"><font color="red">*</font></span></label>
                    <input type="text" name="name" required="required"  class="form-control" value="{{ $user->name }}" /> </div>
                    <div class="col-md-6">
           <div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }}">
              <label for="region" class="cols-sm-2 control-label">Region
               <span class="required"><font color="red">*</font></span>
              </label>
              <div class="cols-sm-10">
                <div class="input-group">
              {{$user->region_id}}
              </div>
            </div> 
          </div>


          <div class="col-md-6">
            <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}" >
              <label for="location" class="cols-sm-2 control-label" >State
               <span class="required"><font color="red">*</font></span>
              </label>
              <div class="cols-sm-10">
                <div class="input-group">
                 
   {{$user->location}}
                </div>
              </div>
            </div>

          </div>
                       <div class="form-group">
                                    <label class="control-label">Contact Address</label>
                                    <textarea  name="home_address" required class="form-control" rows="3" placeholder="Current Location"></textarea>
                                    </div>
               <div class="form-group">
                    <label class="control-label">Phone Number</label>
                    <input type="number" name="phone_number" required="required" placeholder="+1 646 580  (6284)" class="form-control" /> 
                    </div> 

                 <div class="margiv-top-10">
                    <button  class="btn green" type="Submit"> Print 
                    </button>  
                </div> 
                </div>
                </div>
           
            
        </div>
        <!-- END PERSONAL INFO TAB -->
        <!-- CHANGE AVATAR TAB -->
       
        <!-- END CHANGE AVATAR TAB -->
        <!-- CHANGE PASSWORD TAB user.changePassword-->
 
    <!-- END CHANGE PASSWORD TAB -->
    <!-- PRIVACY SETTINGS TAB -->
    
    <!-- END PRIVACY SETTINGS TAB -->
</div>
</div>
</div>
</div>
</div>
</div>
</div>


@endsection