@extends('layouts.admin_layout', [
  'page_header' => 'Policy',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' => '',
    'policy' => 'active', 
  'package' => '',
  'page' => ' ',
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
                        <span class="caption-subject bold uppercase"> all Tags</span>
                    </div>
                
                </div>
                <div class="portlet-body">
                   <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">

<a class="btn btn-success" href="{{route('tag.create')}}"><i class="fa fa-plus"></i>Create Tag</a>
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
                                <th>Client</th>
                                <th>Status</th>
                                <th>Review </th>
                                <th>Edit</th>

                               <th> Delete </th>
                           
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($tags as $tag)

             <tr class="odd gradeX">
               
                        <td>{{$tag->job_title}}</td>
                        <td>@foreach($users as $client) @if($client->id == $tag->client) {{$client->name}} @endif @endforeach</td>
                        <td>
                        @if($tag->awaiting_aproval === 1)
                       <span class="label label-sm label-default "><i> Awaiting Approval</i></span>
                        @elseif($tag->draft === 1)
                        Save to draft
        
                        @elseif($tag->active === 0 && $tag->status === 3 && $tag->awaiting_aproval === 0 && $tag->draft === 0)
                        Blacklist
                        draft 0 status 1 active 1 
                        @elseif($tag->active === 1 &&  $tag->draft === 0 && $tag->status === 1 && $tag->awaiting_aproval === 0)
                        Active
                        @endif
                        

                        </td>
                        <td><a href="{{route('review.jobs', $tag->id)}}">open</a></td>
                        <td><a href="{{route('tag.edit', $tag->id)}}"> edit</a></td>            
                     
        <td>
     <form class="delete" action="{{route('tag.destroy', $tag->id)}}" method="POST">
                                  {{csrf_field()}}
                                  {{method_field('DELETE')}}
              <input class="btn btn-sm btn-danger" type="submit" value="Delete">
    </form>
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