  
@extends('layouts.admin_layout', [
  'page_header' => 'Pages',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' => '',
  'policy' => '',
  'package' => '',
  'page' => '',
  'role' => '',
  'user' => '',
  'logo' => 'active'
]) 
@section('content')
    
         <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Logo</span>
                    </div> 
                </div>
                <div class="portlet-body">
                   <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">

<a class="btn btn-success" href="{{route('logos.create')}}"><i class="fa fa-plus"></i>Create Logo</a>
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
                              <th> Logo </th>
                                <th> Status</th>  
                               <th> Action </th> 
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($logos as $logo) 
                    <tr class="odd gradeX"> 
                        <td>{{$logo->logo}}</td> 
                        <td>{{$logo->status}}</td>
                        </td>#<td>
                    <div class="btn-group">
                           <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                              <i class="fa fa-angle-down"></i>
                          </button>
                      <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{route('logo.setlog', $logo->id)}}">
                            <i class="icon-docs"></i> Activate </a>
                        </li>
                        <li>
                            <a href="{{route('logos.edit', $logo->id)}}">
                            <i class="icon-docs"></i> Edit </a>
                        </li>
                        <li><a href="{{route('logos.show', $logo->id)}}">
                            <i class="icon-docs"></i> Show </a></li> 
                        <li class="divider"> </li>
                        <form action="{{route('logos.destroy', $logo->id)}}" method="POST">
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