@extends('admin.shortlist.layout.shortlist')
@section('content')
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Shortlisted Candidates</span>
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
                    <p></p>
                    <p></p>

                
                    <span class="note note-default"  >Filter shortlisted CV's by clicking on any of the colours available </span>
                    <br>
                     <p></p>
                        <div class="row"> 
                    
 
                        <table width="10%" align="center">
                                  <tr>
                          <td colspan="2" style="padding-left: 43px;">
                            
                              <form action="{{route('get.unsorted', '0')}}" method="GET">
          <input type="text" name="sorted" value="0"  hidden="hidden"> 
           <button class="btn btn-xs brown dropdown-toggle" data-toggle="tooltip" data-placement="top" title="Unsorted CV">[.][.][.]</button>
           </form>
                          </td>
 
                        </tr>
                            <tr>
          <td style="padding-left: 43px;">
               
          <form action="{{route('get.red')}}" method="POST">
          <input type="text" name="red" value="1"  hidden="hidden">
                                                            {{csrf_field()}}
           <button class="btn btn-xs red dropdown-toggle" data-toggle="tooltip" data-placement="top" title="Red CV">[.]</button>
           </form>
                       </td>
                        
                        <td> 
     <form  action="{{route('get.blue')}}" method="POST">
     <input type="text" name="blue" value="1"  hidden="hidden">
                                  {{ csrf_field()}}
                              
     <button class="btn btn-xs blue dropdown-toggle" data-toggle="tooltip" data-placement="top" title="Blue CV" >[.]</button> 
     </form>
                          </td> 
                            </tr>

            <tr>
            <td style="padding-left: 43px;">
               
  <form  action="{{route('get.green')}}" method="POST">
  <input type="text" name="green" value="1"  hidden="hidden">
             {{csrf_field()}}
   <button class="btn btn-xs green dropdown-toggle" data-toggle="tooltip" data-placement="top" title="Green CV">[.]</button>
   </form>
                       </td> <td> 
     <form action="{{route('get.yellow')}}" method="POST">
       <input type="text" name="yellow" value="1"  hidden="hidden">
                                  {{ csrf_field()}} 
   <button class="btn btn-xs yellow dropdown-toggle" data-toggle="tooltip" data-placement="top" title="Yellow CV">[.]</button>  
                                 
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
            
                <th> Years Of Experience </th>
                <th> Shortlist</th>
        <th>Details</th>
                <th> File </th>
                <th> Actions </th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th> Candidate's name </th>
                
                <th> Years Of Experience </th>
                <th> Shortlist </th>
        <th>Details</th>
                <th> File </th>
                <th> Actions </th>
            </tr>
        </tfoot>
        <tbody>
                   @forelse($shortlist as $document)
                       <tr class="odd gradeX">
                    
 
                            <td>{{ title_case($document->candidates_name)}}</td>
                         
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
                                <td>  <a href="{{route('get_single.document', $document->id)}}"> Details  </a> </td>
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


                      

                         {{ $shortlist->appends(request()->query())->links() }}

                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div> 


@endsection
 
