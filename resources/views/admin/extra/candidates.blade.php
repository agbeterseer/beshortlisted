@extends('admin.log.layout.log')
@section('content')
 
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Log Activity Lists</span>
                    </div>
     
                </div>
 
                <div class="portlet-body"> 
                  
          <table id="example" class="display" cellspacing="0" width="100%" style="font-size: x-small;">
                        <thead>
                            <tr>
      <th>No</th>
      <th>Emails</th>
      <th>Status</th>
      <th>Created at</th>
      <th>Updated at</th>
     
      <th>Action</th>
                           
                            </tr>
                        </thead>
                               <tfoot>
                               <tr>
                    
        <th>No</th>
      <th>Emails</th>
      <th>Status</th>
      <th>Created at</th>
      <th>Updated at</th>
     
      <th>Action</th>
                           
                            </tr>
                            </tfoot>
                        <tbody>
              @if($candidates->count())
      @foreach($candidates as $key => $candidate)
      <tr class="odd gradeX">
        <td>{{ ++$key }}</td>
        <td>{{ $candidate->email }}</td>
        <td class="text-success">{{ $candidate->status }}</td>
        <td><label class="label label-info">{{ $candidate->created_at }}</label></td>
        <td class="text-warning">{{ $candidate->updated_at }}</td> 
        <td><button class="btn btn-danger btn-sm">Delete</button></td>
      </tr>
      @endforeach
    @endif 
                   </tbody>
                        </table>

          </div>

          </div>
      </div>
      <!-- END EXAMPLE TABLE PORTLET-->
  



@endsection