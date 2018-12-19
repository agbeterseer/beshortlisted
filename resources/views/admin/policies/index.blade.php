
@extends('layouts.admin_layout', [
  'page_header' => 'Resume Builder',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' => 'active'
])

@section('content')
 
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Policy Document</span>
                    </div>
                 </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">

<a class="btn btn-success" href="{{route('policies.create')}}"><i class="fa fa-plus"></i>Add Policy</a>
                                </div>
 
                            </div>
                        </div>

                        
           
                        @if(Session()->has('success'))
                <div class="alert alert-success"> 
                {!! Session::get('success') !!}
                </div>
                        @endif
                    </div>

                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                        <thead>
                            <tr>
                                <th>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                        <span></span>
                                    </label>
                                </th>
                                <th> Title</th>
                                <th> Description </th>
                                <th> Status</th>
                         
                                <th> Actions </th>
                                </tr>
                        </thead>
                        <tbody>
                        @forelse($policyList as $policy)

                              <tr class="odd gradeX">
                                                    <td>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" />
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                <td>{{$policy->title}}</td>
                                                <td>

                                                @if($policy->description)
                                             <note >available </note>    
                                                @endif

                                                 
                                        
                                                </td>
                                   
                                                 <td> </td>
                                                 
                                                    <td>
                                                        <div class="btn-group">
                     <button class="btn btn-xs green dropdown-toggle"  type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                               <ul class="dropdown-menu" >
                                   
                                                  <li>
                                          <a href="{{route('policies.edit', $policy->id)}}">
                                                        <i class="icon-docs"></i> Edit </a>
                                                     
                                                    </li>
                                                    <li class="divider"> </li>
                                         
                                                    <form action="{{route('policies.destroy', $policy->id)}}" method="POST">
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