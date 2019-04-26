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
                        <span class="caption-subject bold uppercase"> {{$ticket->subject}}</span>
                    </div> 
                </div>
                <div class="portlet-body">
 
 
 <form class="form-horizontal" method="POST" action="{{ route('closed.ticket') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label"><strong>Subject</strong></label>

                            <div class="col-md-6">
                       {{$ticket->subject}} 
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label"><strong>Reason</strong></label>

                            <div class="col-md-6">
                                 {{$ticket->reason}}
 
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label"><strong>Description</strong></label>

                            <div class="col-md-6">
                               {!! $ticket->complain !!}
 
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label"><strong> Status</strong></label>

                            <div class="col-md-6">
                               <select name="status" class="form-control" required="required">
                                <option value="Select One">Select One</option>
                                 <option value="closed">Closed</option>
                               </select>
 
                            </div>
                        </div>

   
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>

          </div>
        </div> 
      </div>
      <!-- END EXAMPLE TABLE PORTLET-->
  </div>



@endsection