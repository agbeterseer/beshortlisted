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
			<th>Subject</th>
			<th>URL</th>
			<th>Method</th>
			<th>Ip</th>
			<th width="300px">User Agent</th>
			<th>User Id</th>
			<th>Time</th>
			<th>Action</th>
                           
                            </tr>
                        </thead>
                               <tfoot>
                               <tr>
                    
			<th>No</th>
			<th>Subject</th>
			<th>URL</th>
			<th>Method</th>
			<th>Ip</th>
			<th width="300px">User Agent</th>
			<th>User Id</th>
			<th>Time</th>
			<th>Action</th>
                           
                            </tr>
                            </tfoot>
                        <tbody>
                        @if($logs->count())
			@foreach($logs as $key => $log)
			<tr class="odd gradeX">
				<td>{{ ++$key }}</td>
				<td>{{ $log->subject }}</td>
				<td class="text-success">{{ $log->url }}</td>
				<td><label class="label label-info">{{ $log->method }}</label></td>
				<td class="text-warning">{{ $log->ip }}</td>
				<td class="text-danger">{{ $log->agent }}</td>

				<td>{{ $log->user_id }}</td>
					<td class="text-danger">{{ $log->created_at }}</td>
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