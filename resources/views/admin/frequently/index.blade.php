@extends('layouts.admin_layout', [
  'page_header' => 'Pages',
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
  'page' => '',
  'role' => '',
  'user' => ''
]) 
@section('content')
    
         <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> FAQ</span>
                    </div> 
                </div>
                <div class="portlet-body">
                   <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group"> 
<a class="btn btn-success" href="{{route('frequently.create')}}"><i class="fa fa-plus"></i>Create FAQ</a>
                                </div>
                            </div> 
                        </div> 
               @if(Session()->has('success'))
                <div class="alert alert-success"> 
                {!! Session::get('success') !!}
                </div>
                 @endif
                    </div>
<table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th> Name </th>
                                <th> Date Created</th>  
                               <th> Action </th> 
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($frequents as $frequent) 
                    <tr class="odd gradeX"> 
                        <td>{{$frequent->question}}</td> 
                        <td>{{$frequent->answer}}
                        </td>#<td>
     <div class="btn-group">
                           <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                              <i class="fa fa-angle-down"></i>
               </button>
                      <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{route('frequently.edit', $frequent->id)}}">
                            <i class="icon-docs"></i> Edit </a>
                        </li>
                        <li>      <a href="{{route('frequently.show', $frequent->id)}}">
                            <i class="icon-docs"></i> Show </a></li> 
                        <li class="divider"> </li>
                        <form action="{{route('frequently.destroy', $frequent->id)}}" method="POST" class="delete">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
        <input class="btn btn-sm btn-danger" type="submit" value="Delete"></form> 
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
      </div>
      <!-- END EXAMPLE TABLE PORTLET-->
  </div>



@endsection