@extends('admin.tags.layout.tags')
@section('content')
 


                 <div class="search-page search-content-3">
                            <div class="row">

                           
                                <div class="col-lg-3">
                     
                                    <div class="search-filter ">
                              
                                    <!--     <ul>
                                        @foreach($industries as $industry)

                                            <li>{{$industry->name}}</li>

                                        @endforeach
                                        </ul> -->
         <div class="portlet-body">
         Edit
<!--                                         <div id="tree_1" class="tree-demo">
                                            <ul>
                                                <li> Root Industries <strong>( {{$industry_count}} ) </strong>

                                                    <ul>
                                                         @foreach($industries as $industry)
                                                 
                                                  <li data-jstree='{ "icon" : "fa fa-briefcase icon-state-success " , "opened" : true}'>
                                                   <a href="{{$industry->id}}" >{{$industry->name}} </a> </li>
                                                
                                                        @endforeach

                                                    </ul>
                                                </li>
 
                                            </ul>
                                        </div> -->
                                    </div>
           
        
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
<div class="note note-primary">
<a class="edits" data-toggle="modal" data-style="slide-left" data-spinner-color="#333" href="#static_qualification">Add Qualifications</a>({{$qualifications}})  

</div>

   <div class="note note-primary">

<h3> Adding Industry List</h3>
<p> 1. Enter industry in the text field provided and then click on the 'Add' button  <br>
 
</div>
                        <div class="note note-danger">
<h3> Tips on adding Professions to Industry</h3>
<p> 1. Enter requirement(s), as intended for your job Ad and then click on the 'Add' button  <br>
2. Leave "Value" on "Ture" for every question you enter.<br>
3. click on 'Delete' to remove a requirement 
</p>
</div>
                        <div class="note note-primary" style="height: 150px;">
<h3>  </h3>
 <p><div class="space">&nbsp;</div>
 <div class="space">&nbsp;</div>
 <div class="space">&nbsp;</div></p>
</div>
                         <div class="search-label uppercase" style="margin-top: 15px;">
                                    </div>
                                        <div class="search-filter-divider bg-grey-steel"></div>
                                        <div class="search-filter-divider bg-grey-steel"></div>
                                
           
                                    </div>

                                </div>

            <div class="col-md-8">

            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">

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
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Industry</span>
                    </div>
                
                </div>



     <form class="form-horizontal" action="{{route('add.industry')}} " method="post" role="form">
                        {{ csrf_field() }}
  
<div class="row">
 
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Industry
                        <span class="required" >*</span>
                </label>

                <div class="col-md-4">
                    <input id="name" type="text" class="form-control" name="name" placeholder="Enter Industry"   required>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
          
             <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                </button>
                            </div>
                        </div>
       
  
 </div>
 </form>

           
            </div>

      <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Industry List</span>
                    </div>
                
                </div>
        <form class="form-horizontal" action="{{route('add.industry')}}" method="post" role="form">
                        {{ csrf_field() }}
 
<div class="row">
 
    
       <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                        <th>#</th>
                                <th> Name </th>
                                <th> Action </th>
                             
                           
                            </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
 @foreach($industries as $industry)
             <tr class="odd gradeX">
               <td> {{$i}}
                  @php($i++)</td>
                        <td>  {{$industry->name}} </td>
                        <td>      <div class="btn-group">
           <button class="btn btn-xs btn-primary" type="button" data-toggle="modal" data-target="#myModal-{{$industry->id}}"> Update.. <i class="fa fa-angle-down"></i> </button>                                   
        <div class="modal fade" id="myModal-{{$industry->id}}" tabindex="1" role="dialog" aria-labelledby="myModalLabel" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                 <span aria-hidden="true"></span>   </button>
            <h4 class="modal-title" id="myModalLabel" > Update Industry {{$industry->name}}</h4>
                        </div>
                        <div class="modal-body">
    <form action="{{route('update.industry')}}" method="post" role="form" >
    <input type="text" name="id" value="{{$industry->id}}" hidden="hidden">
                            {{csrf_field()}}  
                        <div class="form-group">
                       
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Industry
                        <span class="required" >*</span>
                </label>

                <div class="col-md-4">
                    <input id="name" type="text" class="form-control" name="name"  value="{{$industry->name}}"  required>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
                          </div>
                                       <div >
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary">Save changes</button>

                        </div>
                        </form>
                      </div>
           
                    </div>
                 </div>
              </div>
            </div> </td>
                         
                          

                        </tr>
                        @endforeach
                        </tbody>

                        </table>
          
             <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
       
  
 </div>
 

           
            </div>


  <div>
<!--   <div class="note note-danger">
<h3> Job Requirement</h3>
<p> 1. Enter requirement(s), as intended for your job Ad and then click on the 'Add' button  <br>
2. Leave "Value" on "Ture" for every question you enter.<br>
3. click on 'Delete' to remove a requirement 
</p>
</div> -->
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered" >
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Add professions to Industry</span>
                    </div>
                
                </div> 
          <form class="form-horizontal mt-repeater" action="{{route('assing.profession')}}" method="post">
                        {{ csrf_field() }}
  
            <div class="form-group{{ $errors->has('industry') ? ' has-error' : '' }}">
                <div class="col-md-4"> 
                Industry <span class="required">*</span>
                <select name="industry" class="form-control">
                    <option value="">...select one...</option>
                         @foreach($industries as $industry)
                    <option value="{{$industry->id}}">{{$industry->name}} </option>
                          @endforeach
                </select> 
                    @if ($errors->has('industry'))
                        <span class="help-block">
                            <strong>{{ $errors->first('industry') }}</strong>
                        </span>
                    @endif
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
                                        <div  class="mt-repeater form-horizontal">
                                            
                                            <div data-repeater-list="groupa">
                                                <div data-repeater-item class="mt-repeater-item">
                                                    
                                                    <div class="mt-repeater-input"  >
                                                        <label class="control-label search-label">Enter Profession</label>
                                                        <br/>
                                                        <input type="text" name="profession" class="form-control"  placeholder="Enter Profession" /> </div>
                                               
                                           
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
 <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save Profession
                                </button>
                            </div>
                        </div>


                            </form>

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


            <!-- END EXAMPLE TABLE PORTLET-->
        </div>





 
            <!-- <div class="portlet light bordered" style="padding-left: 34px;">               -->
   <!--          <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Job Assessment</span>
                    </div>
                
                </div> -->
        <!--         <div class="portlet-body form"> 
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="mt-repeater form-horizontal">
                                            
                                            <div data-repeater-list="group-a">
                                                <div data-repeater-item class="mt-repeater-item">
                                                
                                                    <div class="mt-repeater-input" >
                                                        <label class="control-label"> Question</label>
                                                        <br/>
                                    <textarea name="text-input" class="form-control" required="required"></textarea>
                             </div>
                                               
                                                 
                                                   
                                                    <div class="mt-repeater-input mt-checkbox-inline">
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
                                                    </div>

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


                            </div> -->
        
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
            <!-- </div> -->

        </div>
                     
    

                            </div>
  
        <div class="modal fade " id="static_qualification" tabindex="-1" role="dialog" aria-hidden="true">

<div class="modal-dialog ">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">Add Qualification</h4>
</div>
<div class="modal-body">

<!-- BEGIN EXAMPLE TABLE PORTLET-->
<!-- <div class="portlet light bordered">
<div class="portlet-body"> -->
 <!-- <pre> Specifications</pre> -->
<form class="form-horizontal" action="{{ route('add.qualification') }}" method="post" role="form">
{{ csrf_field() }}
<!-- <form role="form"> -->
<div class="row">
<div class="col-md-8">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-8">
Qaulification:
   
              
                    <input id="name" type="text" class="form-control" name="name" placeholder="Eg. BSc., MSc., LLB" required>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                 
            

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->

<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<!-- </form> -->

<!-- END EXAMPLE TABLE PORTLET-->

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


 
  
@endsection
