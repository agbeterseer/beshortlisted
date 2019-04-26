        
@extends('ticket', [
  'page_header' => 'Candidates',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' => '',
  'resume_' => 'active'
])

@section('content')
<style type="text/css">
table {
  width: 80%;
  font-size: 12px;
  border-color: #EEEEEE;
   border-collapse: collapse;
}
th, td {
  width: 20px;
}
th, td {
  height: 20px;
}
thead{
   height: 10px;
  background-color: #ECECEC;
}
table, tr,  {
  border: 1px solid #cccccc;
}
</style>
<div class="space">&nbsp;</div>
 <div class="container" >
             <table class="table" style="background-color: #FFFFFF;">
                                              <thead>
                                            <tr>
                                                <td colspan="6" style="background-color: #cccccc;"> <span style="font-weight: bold"> Open Tickets</span></td>
                                                </tr> 
                                                  </thead>
                    <thead>
                                                    <tr>
                                                        <th>Ticket ID</th>
                                                        <th>Summary</th>
                                                        <th>Reason</th>
                                                        <th>Status</th>
                                                         <th>Opened</th> 
                                                        <th>Date Applied</th> 
                                                    </tr>
                                                </thead>
                                              
                                                @forelse($tickets as $ticket) 
                                                    <tr>
                                                        <td>{{$ticket->id}} </td>
                                                        <td>{{$ticket->subject}} </td>
                                                        <td>{{$ticket->reason}}</td>
                                                        <td>{{$ticket->status}} </td>
                                                        <td>@if($ticket->open === 0)<i> Not yet</i> @else <i> Open</i> @endif </td>
                                                        <td>{{$ticket->created_at}} </td>
                                                    </tr> 

                                                    @empty
                                      
                                                    @endforelse  
                                                     <tr>
                                                      <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td> <a href="{{route('ticket.create')}}" style="color: red"> Open a new Support Ticket</a></td>
                                                      </tr> 
                                          </table>
                                        </div>
<div class="space">&nbsp;</div>
          <div class="careerfy-main-section">
         <div class="container">
                                   
                                        <div class="careerfy-candidate-savedjobs-wrap">

           
                                              <table style="background-color: #FFFFFF;" class="table" id="example">
                                          <thead>
                                            <tr>
                                                <td colspan="6" style="background-color: #cccccc;"><span style="font-weight: bold">Recently Closed Tickets</span></td>
                                                </tr> 
                                                  </thead>
                                                <thead>
                                                    <tr>
                                                        <th>Ticket ID</th>
                                                        <th>Summary</th>
                                                        <th>Reason</th>
                                                        <th>Status</th>
                                                         <th>Opened</th> 
                                                        <th>Date Applied</th> 
                                                    </tr>
                                                </thead>
                                              
                                                @forelse($tickets_closed as $ticket_) 
                                                    <tr>
                                                        <td>{{$ticket_->id}} </td>
                                                        <td>{{$ticket_->subject}} </td>
                                                        <td>{{$ticket_->reason}}</td>
                                                        <td>{{$ticket_->status}} </td>
                                                        <td>@if($ticket_->open === 0)<i> Not yet</i> @else <i> {{$ticket_->open_date}}</i> @endif</td>
                                                        <td>{{$ticket->created_at}} </td>
                                                    </tr>  
                                                    @empty
                                                         <tr> 
                                                        <td colspan="6"> No Record(s) Found</a></td>
                                                      </tr>
                                                    @endforelse
                                                    

                                                     <tr>
                                                      <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp; </td>
                                                      </tr> 
                                              
                                            </table>
                                          </div>
                                   
                                      </div>

                                  <div class="space">&nbsp;</div>
 
               </div>
       

@endsection