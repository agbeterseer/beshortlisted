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
                        <span class="caption-subject bold uppercase"> About Us</span>
                    </div> 
                </div>
                <div class="portlet-body">
                   <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">

<a class="btn btn-success" href="{{route('aboutus.create')}}"><i class="fa fa-plus"></i>Create AboutUs</a>
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
                        @forelse($about_us as $about) 
                    <tr class="odd gradeX"> 
                        <td>{{$about->history}}</td> 
                        <td>{{$about->created_at}}
                        </td>#<td>
     <div class="btn-group">
                           <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                              <i class="fa fa-angle-down"></i>
               </button>
                      <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{route('aboutus.edit', $about->id)}}">
                            <i class="icon-docs"></i> Edit </a>
                        </li>
                        <li>      <a href="{{route('aboutus.show', $about->id)}}">
                            <i class="icon-docs"></i> Show </a></li> 
                        <li class="divider"> </li>
                        <form action="{{route('aboutus.destroy', $about->id)}}" method="POST">
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