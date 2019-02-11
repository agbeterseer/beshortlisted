@extends('layouts.admin_layout', [
  'page_header' => 'Menu',
  'dash' => '',
  'staffmgt' => '',
  'users' => '',
  'menu' => 'active',
  'department' => '',
  'probation' => '',
  'sett' => '',
  'candidate' =>'',
  'taxcalculator' => '',
  'finance' => '',
  'email' => '',
])
@section('content')
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Menu</span>                            
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                    <a  class="btn blue mt-ladda-btn ladda-button btn-outline" data-toggle="modal"  data-style="slide-left" data-spinner-color="#333" href="{{route('menu.create')}}">
                                    <span class="ladda-label">
                                    <i class="icon-plus"></i> Add Menu</span>
                                    </a>
                             </div>
                           </div>
     @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    @if(Session()->has('success'))
                <div class="alert alert-success"> 
                {!! Session::get('success') !!}
                </div>
                        @endif
                    </div>

               <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                        <span></span>
                                    </label>
                                </th>
                                <th> Name </th>
                                <th> Display Name </th>
                                <th> Description </th>
                                   <th> Position </th>
                               <th> Actions </th>
                            </tr>
                        </thead>
                             <tfoot>
                                <tr>
                                    <th> </th>
                                    <th> Name </th>
                                    <th> Display Name </th>
                                    <th> Description </th>
                                  <th> Position </th>
                                    <th> Actions </th>
                                </tr>
                            </tfoot>
                        <tbody>
                        @forelse($menus as $menu)

                              <tr class="odd gradeX">
                                                    <td>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" />
                                                            <span></span>
                                                        </label>
                                </td>
                                <td>{{$menu->name}}</td>
                                 <td>
                                    {{$menu->display_name}}
                                 </td>
                                  <td>{{$menu->description}}</td>
                                <td>{{$menu->menu_order}}</td>
                                                    <td>
                                                        <div class="btn-group">
                           <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                      <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{route('menu.edit', $menu->id)}}">
                            <i class="icon-docs"></i> Edit </a>
                        </li>
                       <li>
                            <a href="{{route('menu.show_submenu', $menu->id)}}">
                            <i class="icon-docs"></i> Add Submenu </a>
                        </li>
                            <li>
                            <a href="{{route('link_to_page', $menu->id)}}">
                            <i class="icon-docs"></i> link To Page </a>
                        </li> 
                        <li class="divider"> </li>
                        <form action="{{route('menu.destroy', $menu->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
        <input class="btn btn-sm btn-danger" type="submit" value="Delete"></form> 
                                                            </ul>
                                                       </div>
                                                    </td>
                                                </tr>
                                                 @empty
                                </tbody>
                             @endforelse
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                 <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                       <h4 class="modal-title">Add Roles</h4>
                 </div>
                                               
    <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">            
                <div class="portlet-body">
             <form class="form-horizontal" action="{{route('menu.store')}}" method="post" role="form">
                        {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" placeholder="Enter name of Role"   required>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
         <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" placeholder="Enter name of Role"   required>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                <label for="display_name" class="col-md-4 control-label">Displyname</label>
                <div class="col-md-6">
                    <input id="" type="text" class="form-control" name="display_name" placeholder="Enter Display name"  required>

                    @if ($errors->has('display_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('display_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="description" class="col-md-4 control-label">Descritption</label>
                <div class="col-md-6">
                    <input id="" type="text" class="form-control" placeholder="Enter Description" name="description" required>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                 <h3>Permissions</h3>
                 @foreach($permissions as $permission)
                  <input type="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->name}}
                    @endforeach
                    </div>
                </div>                                    
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                                 <!--    <button type="button" class="btn green">Continue Task</button> -->

         <button  type="submit" class="btn blue mt-ladda-btn ladda-button btn-outline" data-style="slide-left" data-spinner-color="#333">
                                                    <span class="ladda-label">
                                                        <i class="icon-plus"></i> Add Menu</span>
                                                </button>
  </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- edit  -->     
@endsection
 