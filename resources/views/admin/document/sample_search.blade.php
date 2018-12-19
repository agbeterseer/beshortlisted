@extends('admin.document.layout.document')
@section('content')
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Candidates CV</span>
                    </div>
                 </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                    <div class="row">
          
                    <div class="col-md-6">
                    <div class="btn-group">

<a class="btn btn-success" href="{{route('document.create')}}"><i class="fa fa-plus"></i>Add CV</a>
                                </div>
                            </div>
                    </div>
                        <div class="row">


                        
                        <table width="100%">
                            <tr>
                                <td>
               
 <form  action="{{route('document.view_filter_by_city')}}"   method="post" role="form">
   {{ csrf_field() }}
     <a href="" class="btn btn-success form-control" style="width: 250px;  >
                          <i class="fa fa-search "></i>
                          Filter by City
                        </a>
                 <select name="location" class="form-control" style="width: 250px; " onchange="this.form.submit();" >
                       <option value="">...Select City...</option>
                           @foreach($cities as $city)
                           <option value="{{$city->id}}">{{$city->name}}</option>
                           @endforeach
                       </select>
                    </form>
                       </td>
                        
                        <td> 
     <form action="{{route('document.index')}}" method="get">
                                  {{ csrf_field()}}
                                  <table align="center" width="100%">
                                    <tr>
                                        <td>
<input type="text" name="s" class="form-control" placeholder="Enter candidates Name or Years of Experience" value="{{ isset($s) ? $s : ''}}">
                                        </td>
                                        <td>
                <button type="submit" class="btn btn-success">Search</button>
                                        </td>
                                        <span>Note: search for candidates Name and Years of Experience</span> 
                                    </tr>
                                </table>
                                  </form>
                          </td>
                           


                               <td>
      <form class="form-horizontal" action="{{route('document.view_filter_by_professions')}}" method="post" role="form">
                {{method_field('POST')}}
                {{ csrf_field() }}
                               <button class="btn btn-success " style="width: 250px; margin-top: -20px;"> 
                                 <i class="fa fa-search"></i>
                          Filter by Profession
                                 </button>  
  <select name="profession[]" multiple="multiple"  class="form-control" style="width: 250px; margin-bottom: : -60px;">
                                       @foreach($professions as $profession)
                                       <option value="{{$profession->id}}">{{$profession->name}}</option>
                                       @endforeach
                                   </select>
                            </form>
                                </td>
                            </tr>
                        </table>
                            </div>

                        </div>
         
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
                </div>
              

<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th> Candidate's name </th>
                <th> Profession </th>
                <th> Years Of Experience </th>
                <th> Shortlist</th>
                <th> Location </th>
                <th> File </th>
                <th> Actions </th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th> Candidate's name </th>
                <th> Profession </th>
                <th> Years Of Experience </th>
                <th> Shortlist </th>
                <th> Location </th>
                <th> File </th>
                <th> Actions </th>
            </tr>
        </tfoot>
        <tbody>
                   @forelse($documents as $document)
                       <tr class="odd gradeX">
                    
 
                            <td>{{ title_case($document->candidates_name)}}</td>
                            <td>
                                 @foreach($document->professions as $proferssion)
                              
                              {{$proferssion->name}}
                                     @endforeach
                            </td>
                            <td>{{$document->years_of_experience}}</td>
                            <td>
                            @if($document->red === 1) 
    <button class="btn btn-xs red dropdown-toggle">[red]</button>
                            @elseif($document->blue === 1)
                       
     <button class="btn btn-xs blue dropdown-toggle">[blue]</button>
                            @elseif($document->green === 1)
     <button class="btn btn-xs green dropdown-toggle">[green]</button>
                           
                              @elseif($document->yellow === 1)
      <button class="btn btn-xs yellow dropdown-toggle">[yellow]</button>
                             
                              @else
                            
      <button class="btn btn-xs white dropdown-toggle">[unsorted]</button>
                            @endif 
                            
                            </td>
                            <td>
                            {{$document->city->name}}
                            
                            </td>
                             <td>
      <form action="{{route('document.getFile')}}" method="POST">
        <input type="hidden" name="cv_file" value="{{ $document->cv_file }}">
                                                        {{csrf_field()}}
                                                        {{method_field('POST')}}

          <button class="btn btn-xs btn-primary  dropdown-toggle"  type="submit"> CV<i class="fa fa-download"></i></button>
             </form>
                                                      </td>
                                                      <td>
<div class="btn-group">
<button class="btn btn-xs green dropdown-toggle"  type="button" data-toggle="dropdown" aria-expanded="false"> Actions
<i class="fa fa-angle-down"></i>
</button>

                   @role(['admin'])
                                               <ul class="dropdown-menu" >
                                        
                                                  <li>
                                          <a href="{{route('document.edit', $document->id)}}">
                                                        <i class="icon-docs"></i> Edit CV </a>
                                                     
                                                    </li>
                                                    <li>
                                                    <form class="red" action="{{route('make.red', $document->id)}}" method="POST">
                                                    {{csrf_field()}}
                                                    <button class="btn btn-xs red dropdown-toggle">[red]</button></form><br>
                                                     <form class="blue" action="{{route('make.blue', $document->id)}}" method="POST">
                                                     {{csrf_field()}}
                                                    <button class="btn btn-xs blue dropdown-toggle">[blue]</button></form>
                                                    <br>
                                                    <form class="green" action="{{route('make.green', $document->id)}}" method="POST">
                                                    {{csrf_field()}}
                                                    <button class="btn btn-xs green dropdown-toggle">[green]</button></form>
                                                      <br>
                                                    <form class="yellow" action="{{route('make.yellow', $document->id)}}" method="POST">
                                                      {{csrf_field()}}
                                                    <button class="btn btn-xs yellow dropdown-toggle">[yellow]</button></form></li>
                                                    <li class="divider"> </li>
            <form  class="delete" action="{{route('document.destroy', $document->id)}}" method="POST">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                    <input class="btn btn-sm btn-danger" type="submit" value="Delete"></form> 
                                                            </ul>
                                                               @endrole
                                                        </div>  
                                                    </td>
                                                </tr>
                                                 @empty 
                             @endforelse   
            </tbody>
            </table>


                        {{ $documents->appends(['s' => $s])->links() }}

                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div> 


@endsection
 

 @extends('admin.document.layout.document')
@section('content')



                    <!-- BEGIN CONTENT BODY -->
  
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN THEME PANEL -->
                  
                        <!-- END THEME PANEL -->
                        <!-- BEGIN PAGE BAR -->
                       
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> Search Results 4
                            <small>search results</small>
                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="search-page search-content-3">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="search-filter ">
                                        <div class="search-label uppercase">Search By</div>
                                        <div class="input-icon right">
                                            <i class="icon-magnifier"></i>
                                            <input type="text" class="form-control" placeholder="Filter by keywords"> </div>
                                        <div class="search-label uppercase">Sort By</div>
                                        <select class="form-control">
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                            <option>Option 4</option>
                                            <option>Option 5</option>
                                        </select>
                                        <div class="search-label uppercase">Date</div>
                                        <div class="input-icon right">
                                            <i class="icon-calendar"></i>
                                            <input class="form-control date-picker" type="text" placeholder="Any Date" /> </div>
                                        <button class="btn green bold uppercase btn-block">Update Search Results</button>
                                        <div class="search-filter-divider bg-grey-steel"></div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <button class="btn grey bold uppercase btn-block">Reset Search</button>
                                            </div>
                                            <div class="col-xs-6">
                                                <button class="btn grey-cararra font-blue bold btn-block">Advanced Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="row">
                              <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th> Candidate's name </th>
                <th> Profession </th>
                <th> Years Of Experience </th>
                <th> Shortlist</th>
                <th> Location </th>
                <th> File </th>
                <th> Actions </th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th> Candidate's name </th>
                <th> Profession </th>
                <th> Years Of Experience </th>
                <th> Shortlist </th>
                <th> Location </th>
                <th> File </th>
                <th> Actions </th>
            </tr>
        </tfoot>
        <tbody>
                   @forelse($documents as $document)
                       <tr class="odd gradeX">
                    
 
                            <td>{{ title_case($document->candidates_name)}}</td>
                            <td>
                                 @foreach($document->professions as $proferssion)
                              
                              {{$proferssion->name}}
                                     @endforeach
                            </td>
                            <td>{{$document->years_of_experience}}</td>
                            <td>
                            @if($document->red === 1) 
    <button class="btn btn-xs red dropdown-toggle">[red]</button>
                            @elseif($document->blue === 1)
                       
     <button class="btn btn-xs blue dropdown-toggle">[blue]</button>
                            @elseif($document->green === 1)
     <button class="btn btn-xs green dropdown-toggle">[green]</button>
                           
                              @elseif($document->yellow === 1)
      <button class="btn btn-xs yellow dropdown-toggle">[yellow]</button>
                             
                              @else
                            
      <button class="btn btn-xs white dropdown-toggle">[unsorted]</button>
                            @endif 
                            
                            </td>
                            <td>
                            {{$document->city->name}}
                            
                            </td>
                             <td>
      <form action="{{route('document.getFile')}}" method="POST">
        <input type="hidden" name="cv_file" value="{{ $document->cv_file }}">
                                                        {{csrf_field()}}
                                                        {{method_field('POST')}}

          <button class="btn btn-xs btn-primary  dropdown-toggle"  type="submit"> CV<i class="fa fa-download"></i></button>
             </form>
                                                      </td>
                                                      <td>
<div class="btn-group">
<button class="btn btn-xs green dropdown-toggle"  type="button" data-toggle="dropdown" aria-expanded="false"> Actions
<i class="fa fa-angle-down"></i>
</button>

                   @role(['admin'])
                                               <ul class="dropdown-menu" >
                                        
                                                  <li>
                                          <a href="{{route('document.edit', $document->id)}}">
                                                        <i class="icon-docs"></i> Edit CV </a>
                                                     
                                                    </li>
                                                    <li>
                                                    <form class="red" action="{{route('make.red', $document->id)}}" method="POST">
                                                    {{csrf_field()}}
                                                    <button class="btn btn-xs red dropdown-toggle">[red]</button></form><br>
                                                     <form class="blue" action="{{route('make.blue', $document->id)}}" method="POST">
                                                     {{csrf_field()}}
                                                    <button class="btn btn-xs blue dropdown-toggle">[blue]</button></form>
                                                    <br>
                                                    <form class="green" action="{{route('make.green', $document->id)}}" method="POST">
                                                    {{csrf_field()}}
                                                    <button class="btn btn-xs green dropdown-toggle">[green]</button></form>
                                                      <br>
                                                    <form class="yellow" action="{{route('make.yellow', $document->id)}}" method="POST">
                                                      {{csrf_field()}}
                                                    <button class="btn btn-xs yellow dropdown-toggle">[yellow]</button></form></li>
                                                    <li class="divider"> </li>
            <form  class="delete" action="{{route('document.destroy', $document->id)}}" method="POST">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                    <input class="btn btn-sm btn-danger" type="submit" value="Delete"></form> 
                                                            </ul>
                                                               @endrole
                                                        </div>  
                                                    </td>
                                                </tr>
                                                 @empty 
                             @endforelse   
            </tbody>
            </table>


                        {{ $documents->appends(['s' => $s])->links() }}



                                    </div>
                                    <div class="search-pagination pagination-rounded">
                                        <ul class="pagination">
                                            <li class="page-active">
                                                <a href="javascript:;"> 1 </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"> 2 </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"> 3 </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"> 4 </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
            
                    <!-- END CONTENT BODY -->
          

                @endsection