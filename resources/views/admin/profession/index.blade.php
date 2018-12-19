@extends('admin.document.layout.document')
@section('content')
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Professions</span>
                    </div>
                
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">

<a class="btn btn-success" href="{{route('profession.create')}}"><i class="fa fa-plus"></i>Create Profession</a>
                                </div>
                            </div>
      
                        </div>
                        @if(session()->has('message.level'))
                        <div class="alert alert-{{ session('message.level') }}"> 
                        {!! session('message.content') !!}
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
                               <th> Actions </th>
                           
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($professions as $profession)

                              <tr class="odd gradeX">
                                                    <td>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" />
                                                            <span></span>
                                                        </label>
                                </td>
                                <td>{{$profession->name}}</td>
                                 <td>
                        
                                 
                                 {{$profession->display_name}}

                                 </td>
                                  <td>{{$profession->description}}</td>
                                                 
                                                    <td>
                                                        <div class="btn-group">
                           <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                     
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{route('profession.edit', $profession->id)}}">
                            <i class="icon-docs"></i> Edit </a>
                         
                        </li>
                        <li class="divider"> </li>
                        <form action="{{route('profession.destroy', $profession->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
        <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                 
                                                                </form> 
                                                            </ul> 
                                                        </div>
                                                    </td>
                                                </tr>
                                                 @empty
      
                            
                             @endforelse
 
                                            </tbody>
                                        </table>
       

                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
       


@endsection

