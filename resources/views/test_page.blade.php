

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
   <form role="form" action="{{ url('/verify_candidate') }}" method="POST" enctype="multipart/form-data" >
            {{ csrf_field() }}
                 <div class="clearfix margin-top-10">
                        <span class="label label-danger">NOTE! </span>
                        <span>Picture should be less than 1mb </span>
                    </div>
                    <p></p>
                    <div class="row">
                       <div class="col-md-6">
           <div class="form-group">
                   <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 210px;">
                        <img src="uploads/avatars/{{ $user->avatar }}"  alt="" width=" 300px" height="300px" />
                         </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                            <div>
                                            <span class="btn default btn-file">
                                            <span class="fileinput-new"> Select image </span>
                                            <span class="fileinput-exists"> Change </span>
                                            <input type="file" name="avatar" required="required"> </span>
                                           </div>
                                            </div>
                                
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
              <label for="location" class="cols-sm-2 control-label" >State
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
                       <div class="form-group">
                                    <label class="control-label">Contact Address</label>
                                    <textarea  name="home_address" required class="form-control" rows="3" placeholder="Current Location"></textarea>
                                    </div>
               <div class="form-group">
                    <label class="control-label">Phone Number</label>
                    <input type="number" name="phone_number" required="required" placeholder="+1 646 580  (6284)" class="form-control" /> 
                    </div> 

                 <div class="margiv-top-10">
                    <button  class="btn green" type="Submit"> Save Changes 
                    </button> 
                    <button class="btn default" type="reset"> Cancel </button>
                </div> 
                </div>
                </div>
           
            </form>
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