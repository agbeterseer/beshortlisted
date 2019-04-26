        
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

<div class="space">&nbsp;</div>
          <div class="careerfy-main-section">
         <div class="container">
                                  <div class="careerfy-candidate-savedjobs">
                                        <div class="careerfy-candidate-savedjobs-wrap">
                                          <table>
                                           <thead>
                                                 <tr>
                                                  <th></th>
                                                  <th></th>
                                                  <th></th>
                                                  <th></th>
                                                  <th></th> 
                                                  <th></th> 
                                                    </tr>
                                                </thead>
                                            <tr>
                                              <td> </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
    <tr></tr>
        <tr></tr>
                    <tr><td colspan="6" style="text-align: center; background-color: #FFFFFF;"><div style="font-size: 45px;"> We enjoy helping our customers</div> <br>
<div style="font-size: 16px;">However, please keep in mind that not all topics are within the scope of our support</div></td> </tr>
   <tr></tr>

                                          </table>
                                              <table style="background-color: #FFFFFF;">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th> 
                                                        <th></th> 
                                                    </tr>
                                                </thead>
                                                <tbody> 
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                    </tr> 
                                                    <tr></tr>
                                                    <tr></tr>
                                                    <tr><td colspan="6" style="text-align: center;">
<table width="100%">
  <tr>
    <table width="100%">
      <tr><td style="background-color: #cccccc;">Frequently Asked Questions</td> </tr> 
 </table>
  </tr>
 @foreach($frequentlis as $frequent)
     <tr><td>
    <a href="#static_personal{{$frequent->id}}" class="careerfy-resume-addbtn2" style="width: 30%" data-toggle="modal" data-style="slide-left" data-spinner-color="#333" ><span class="fa fa-plus"></span> {{$frequent->question}}  </a> 
        </td></tr>
       @endforeach
</table>
<!--   <div style="font-size: 45px;"> We enjoy helping our customers</div> <br>
<div style="font-size: 16px;">However, please keep in mind that not all topics are within the scope of our support</div> -->
</td> </tr>
<tr></tr> 
<tr></tr>
                                                     <tr> 
                                                      <td colspan="6">
                <form class="careerfy-employer-dasboard" method="POST" action="{{route('ticket.store')}}">
                 {{ csrf_field() }}
            <div class="careerfy-main-section careerfy-dashboard-fulltwo">  
            <div style="background-color: #FFFFFF;"> 
            <!-- BEGIN EXAMPLE TABLE PORTLET-->  
                                 
                                    <div class="careerfy-employer-box-section"  style="background-color: #ffffff; ">
                                        <div class="careerfy-profile-title"><h2>Open Tickect</h2></div>
                                        <ul class="careerfy-row careerfy-employer-profile-form"> 
                                         <li class="careerfy-column-6">
                                                <label>Summary *</label>
                                                <input type="text" name="summary" required="required" style="border-color: #cccccc;">
                                            </li>
                                          <li class="careerfy-column-6">
                                                <label>Reason*</label>
                                                <div class="careerfy-profile-select">
                                                    <select name="reason" required="required"style="border-color: #cccccc;">
                                                      <option value="">Select One</option>
                                                        <option value="Payment">Payment</option>
                                                        <option value="Accounts">Accounts</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                </div>
                                            </li> 
                                            <li class="careerfy-column-12">
                                                <label>Description</label>
                                                <textarea name="description" style="border-color: #cccccc;" id="summernote_1"> </textarea> 
                                            </li>
                       
                                        </ul>
                                      </div>

 
    </div> 
  </div> 
                                  <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
   </form>
      </td>
                                                          </tr> 
                                                </tbody>
                                            </table>
                                          </div>
                                        </div>
                                      </div>

                                  <div class="space">&nbsp;</div>

               </div>
 @foreach($frequentlis as $frequent)
       <div class="modal fade bs-modal-lg" id="static_personal{{$frequent->id}}" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">{{$frequent->question}}</h4>
</div>
<div class="modal-body">
 

<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3"> </label>
<div class="col-md-12">
{!! $frequent->answer !!}

</div>
</div>
<!-- /input-group -->
</div>
<!-- /.col-md-6 -->
<!-- /.col-md-6 -->
</div>
 
<!-- END EXAMPLE TABLE PORTLET-->
</div>
 
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
@endforeach
@endsection