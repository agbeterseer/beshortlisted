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
  'package' => '',
    'page' => 'active',
     'role' => '',
  'user' => '',
])
@section('content')
    <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> All Pages</span>  
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                    <a  class="btn blue mt-ladda-btn ladda-button btn-outline" data-toggle="modal"  data-style="slide-left" data-spinner-color="#333" href="{{route('pages.create')}}">
                                    <span class="ladda-label">
                                    <i class="icon-plus"></i> Add Page</span>
                                    </a>
                             </div>
                           </div>

                 @if(session()->has('message.level'))
                        <div class="alert alert-{{ session('message.level') }}"> 
                        {!! session('message.content') !!}
                        </div>
                        @endif
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
           
                    </div>


                                            <!-- <h2>Select Package</h2> -->
                                             <table id="example" class="display" >
                                                <thead>
                                                    <tr>
                                                        <th>Select</th>
                                                         <th>Action</th>
                                                        <th>Title</th> 
                                                        <th>Link</th>                                                 
                                                        <th>Post Type</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($all_pages as $page)
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
                            <a href="{{route('pages.edit', $page->id)}}">
                            <i class="icon-docs"></i> Edit </a> 
                        </li>
                        <li class="divider"> </li> 
                        <form action="{{route('pages.destroy', $page->id)}}" method="POST" class="delete">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                        <input class="btn btn-sm btn-danger" type="submit" value="Delete"  data-toggle="confirmation" data-singleton="true">
                                </form>   
                         </ul>
                                                </div></td>
                                                        <td><span>{{$page->name}}</span></td> 
                                                        <td>{{$page->head_line}}</td>
                                                        <td>{{$page->description}}</td> 
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