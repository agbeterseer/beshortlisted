@extends('layouts.admin_layout', [
  'page_header' => 'Packages',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' => '',
  'policy' => '',
  'package' => 'active',
    'page' => '', 
  'role' => '',
  'user' => '',
])

@section('content')
    <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                       @if(session()->has('message.level'))
                        <div class="alert alert-{{ session('message.level') }}"> 
                        {!! session('message.content') !!}
                        </div>
                        @endif

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
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Properties</span>  
                    </div>
                
                </div>
                <h2>{{$package->title}} Plan</h2>

           <form class="mt-repeater form-horizontal" method="POST" action="{{route('add.property')}}">
                        {{ csrf_field() }}
     <input type="hidden" name="package_id" value="{{$package->id}}"> 
                          
<!-- 
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Price
                            <span class="required">*</span>
                            </label> 
                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control" name="price" placeholder="price" required>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
            -->
<div class="col-md-6">
 
                <div class="portlet-body form"> 
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="mt-repeater form-horizontal">
                                          <p><i>Enter properties for this Job such as:<br> 3 job posting, Featured On Demand, Job displayed for 20 days</i> </p>
                                            <div data-repeater-list="group_b">
                                                <div data-repeater-item class="mt-repeater-item">
                                                
                                        <div class="mt-repeater-input" >
                                            <label class="control-label"> Property</label>
                                            <br/>

                          <textarea name="job_property" class="form-control" required="required" placeholder="3 job posting, Featured On Demand "> </textarea>
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
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>


                    </form>
                   <hr>

  <!-- <h2>Select Package</h2> -->
                                             <table id="example" class="display" >
                                                <thead>
                                                    <tr>
                                                        <th>Select</th>
                                                         <th>Action</th>
                                                        <th>Title</th>
                                               
                                             
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                               @forelse($property_list as $property_)
                                                    <tr>
                                                        <td>
                                                            <div class="careerfy-payments-checkbox">
                                                                <input id="p3" name="rr" type="checkbox">
                                                                <label for="p3"><span></span></label>
                                                            </div>
                                                        </td>
                                                                            <td>
                                                <div class="btn-group">
                           <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                          <i class="fa fa-angle-down"></i> </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{route('plans.edit', $package->id)}}">
                            <i class="icon-docs"></i> Edit </a>
                         
                        </li>
                        
                        <li class="divider"> </li> 
                        <form action="{{route('delete.properties')}}" method="POST" class="delete">
                            {{csrf_field()}}
                          <input type="hidden" name="package_id" value="{{$property_->id}}">
                        <input class="btn btn-sm btn-danger" type="submit" value="Delete"  data-toggle="confirmation" data-singleton="true">
                                                    </form>   
                         </ul> 
                                                </div></td>
                             <td><span>    {{$property_->property}}</span>


       <div class="btn-group">
           <button class="btn btn-xs btn-primary" type="button" data-toggle="modal" data-target="#myModal-{{$property_->id}}"> edit.. <i class="fa fa-angle-down"></i> </button>                                   
        <div class="modal fade" id="myModal-{{$property_->id}}" tabindex="1" role="dialog" aria-labelledby="myModalLabel" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                 <span aria-hidden="true"></span>   </button>
            <h4 class="modal-title" id="myModalLabel" style="margin-left: 165px;">Eidt: Property </h4>
                        </div>
                        <div class="modal-body">
    <form action="{{route('update.property')}}" method="post" role="form" id="role-form-{{$property_->id}}">
                            {{csrf_field()}}
           
                        <div class="form-group" style="margin-left: 165px;">
                          Property:
                          <input type="text" name="jobproperty" value="{{$property_->property}}">
                           <input type="hidden" name="property_id" value="{{$property_->id}}">
                   
                          </div>
                        </form>
                      </div>
                        <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <button type="button" class="btn btn-primary" onclick="$('#role-form-{{$property_->id}}').submit()">Save changes</button>

                        </div>
                    </div>
                 </div>
              </div>
            </div>
                                                        </td>
                                                   
                                       
                                             
                                    
                                                    </tr>
                                                    @empty

                                                    @endforelse
                                                   </tbody>
                                            </table>
                </div>

            </div> 

     
  

@endsection