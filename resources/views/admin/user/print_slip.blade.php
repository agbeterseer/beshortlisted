@extends('layouts.candidate')


@section('content')

<style type="text/css">
  table{
    border-collapse: collapse;
    border-color: green;
  }
  .col_left{

    padding-left: 34px;
  }

</style>
 <div class="col-md-12">
 
  <div class="profile-content">
<div class="row">
<div class="col-md-12">
<div class="portlet light ">
<div class="portlet-title tabbable-line">
    <div class="caption caption-md">
        <i class="icon-globe theme-font hide"></i>
        <span class="caption-subject font-blue-madison bold uppercase">CBT Verification Slip</span>
    </div> 
</div>
<div class="portlet-body form">
    <div class="tab-content">
        <!-- PERSONAL INFO TAB -->
        <div class="tab-pane active" id="tab_1_1">
        <div style="overflow-x:auto;">

        <table width="100%">
          <tr>
          <td>
            
          </td>
            <td width="25%">
            
                 <img src="{{asset('logo/rhizome.jpg')}}" alt="logo" class="logo-default"  width="150px"/>
            </td>
            <td align="right">
            <span>    

              <a href="javascript:window.print()" data-toggle="tooltip" data-placement="top" title=" Print">    <i class="icon-printer"></i></a>
            </span>
              
            </td>
          </tr>

        </table>
 <table width="100%" border="2" > 
 <tr>
   <th align="middle">Application No : {{$user->application_code}}
   <p></p>
   </th> <th> </th>
 </tr>
  <tr>
    <td class="col_left"> 
    <div class="form-group">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 210px;">
                        <img src="uploads/avatars/{{ $user->avatar }}"  alt="" width=" 300px" height="300px" />
                         </div> 
                       </div>
                      </div>

                       </td> 
                      <td class="col_left">
                        <div class="form-group">
     <label class="control-label"><strong> Full Name  :</strong> {{$user->name}} 
      </label>
        </div>
           <div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }}">
        
                <div class="input-group">
               <strong>Region :</strong>{{$region->name}}</div>
               
            </div> 
            <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}" >
                   
            <div class="input-group">
              <strong> State  :</strong> {{$city->name}} State </div> 
            </div> 
                  
        <div class="form-group">
        <label class="control-label"><strong> Contact Address: </strong>{{$user->contact_address}}</label>
        </div>

        <div class="form-group">
        <label class="control-label"><strong> Phone Number:</strong> {{$user->phone_number}}</label>

        </div> 
    </td>
  </tr>
    <tr>
    <td> 

    </td>
  </tr>
</table>
 
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