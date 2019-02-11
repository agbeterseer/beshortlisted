@extends('layouts.admin_layout', [
  'page_header' => 'Contact',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => 'active',
  'candidate' => '',
  'policy' => '', 
  'package' => '',
  'page' => ' ',
  'role' => '',
  'user' => '',
])


@section('content')
 
                             <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light form-fit bordered">

                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-puzzle font-red"></i>
                                            <span class="caption-subject font-red bold uppercase">Add Contact</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group">
                                                <a class="btn green-haze btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                     <li>
                                                      <a href="javascript:;">Preview </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;"> Publish</a>
                                                    </li>
                                                    <li class="divider"> </li> 
                                                     <li>
                                                        <a href="javascript:;">Edit</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

          <div class="panel-body"> 
             <form class="form-horizontal" action="{{route('add.contact')}}" method="post" role="form">
                        {{ csrf_field() }}
     <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                <label for="country" class="col-md-2 control-label">Country 
                <span class="required"> *</span>
                </label>
                <div class="col-md-8">
                  <select name="country" class="form-control" required=""> 
                    @foreach($countries as $country)
                    <option value="{{$country->code}}">{{$country->name_en}} </option>
                    @endforeach
                  </select> 
                    @if ($errors->has('country'))
                        <span class="help-block">
                            <strong>{{ $errors->first('country') }}</strong>
                        </span>
                    @endif
  </div>
    </div>
         <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                <label for="state" class="col-md-2 control-label">State 
                <span class="required"> *</span>
                </label>
                <div class="col-md-8">
         <input id="state" type="text" class="form-control" name="state" placeholder="Enter State"   required>
                    @if ($errors->has('state'))
                        <span class="help-block">
                            <strong>{{ $errors->first('state') }}</strong>
                        </span>
                    @endif
      </div>
    </div>
    <div class="form-group{{ $errors->has('street_name') ? ' has-error' : '' }}">
                <label for="street_name" class="col-md-2 control-label">Street Name 
                <span class="required"> *</span>
                </label>
                <div class="col-md-8">
         <input id="street_name" type="text" class="form-control" name="street_name" placeholder="Enter Street Name"   required>
                    @if ($errors->has('street_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('street_name') }}</strong>
                        </span>
                    @endif
  </div>
    </div>
       
               <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                <label for="city" class="col-md-2 control-label">City / Town
                <span class="required"> *</span>
                </label>
                <div class="col-md-8">
         <input id="city" type="text" class="form-control" name="city" placeholder="Enter Title"   required>
                    @if ($errors->has('city'))
                        <span class="help-block">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                    @endif
  </div>
    </div>

         <div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
                <label for="postal_code" class="col-md-2 control-label">Postal Code 
                <span class="required"> *</span>
                </label>
                <div class="col-md-8">
         <input id="postal_code" type="text" class="form-control" name="postal_code" placeholder="Enter Postal Code"   required>
                    @if ($errors->has('postal_code'))
                        <span class="help-block">
                            <strong>{{ $errors->first('postal_code') }}</strong>
                        </span>
                    @endif
  </div>
    </div>
         <div class="form-group{{ $errors->has('official_number') ? ' has-error' : '' }}">
                <label for="official_number" class="col-md-2 control-label">Official Number 
                <span class="required"> *</span>
                </label>
                <div class="col-md-8">
         <input id="official_number" type="text" class="form-control" name="official_number" placeholder="Enter Official Number"   required>
                    @if ($errors->has('official_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('official_number') }}</strong>
                        </span>
                    @endif
  </div>
    </div>
             <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-2 control-label">Email 
                <span class="required"> *</span>
                </label>
                <div class="col-md-6">
         <input id="email" type="email" class="form-control" name="email" placeholder="Enter Email"   required>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
  </div>
    </div>

<div class="form-group"> <br>
<label class="control-label col-md-2">Full Address</label>
<div class="col-md-10">
<textarea name="description" id="summernote_1" class="form-control" required="required" ></textarea>
@if ($errors->has('description'))
<span class="help-block">
<strong>{{ $errors->first('description') }}</strong>
</span>
@endif
<div >   </div>
</div>

</div>
 
                    <p></p>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                              <input type="checkbox" name="preview" value="preview">Preview 
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check"></i> Submit</button>
                                <button type="button" class="btn default" id="clear">Cancel</button>
                            </div>
                        </div>
                    </div>
                         

                             </form>     
                                </div>

 
                            </div>
                          
                        </div>



@endsection