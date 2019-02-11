@extends('layouts.admin_layout', [
  'page_header' => 'Contact',
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
                        <span class="caption-subject bold uppercase"> Contacts</span>
                    </div>
                 </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">

<a class="btn btn-success" href="{{route('create.contact')}}"><i class="fa fa-plus"></i>Add Contact</a>
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
                                <th>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                        <span></span>
                                    </label>
                                </th>
                                <th> Postal Code</th>
                                <th> Email </th>
                                <th> Phone Number</th> 
                                <th>Status</th>
                                <th> Actions </th>
                                </tr>
                        </thead>
                        <tbody>
                        @forelse($contacts as $contact)

                              <tr class="odd gradeX">
                                                    <td>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" />
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                <td>{{$contact->postalcode}}</td>
                                                <td> {{$contact->email}}</td> 
                                                 <td>{{$contact->phonenumber}} </td>
                                                 <td>{{$contact->status}}</td> 
                                                    <td>
                                                        <div class="btn-group">
                     <button class="btn btn-xs green dropdown-toggle"  type="button" data-toggle="dropdown" aria-expanded="false"> Actions <i class="fa fa-angle-down"></i>
                                                            </button>
                                               <ul class="dropdown-menu" > 
                                                  <li>
                                          <a href="{{route('edit.contact', $contact->id)}}">
                                                        <i class="icon-docs"></i> Edit </a>
                                                     
                                                    </li>
                                            <li>
                                          <a href="{{route('publish.contact', $contact->id)}}">
                                                        <i class="icon-docs"></i> Publish </a>
                                                     
                                                    </li>
                                                    <li class="divider"> </li>
                                         
                                                    <form action="{{route('delete.contact')}}" method="POST">
                                                      <input type="hidden" name="delete" value="{{$contact->id}}">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                    <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                                             
                                                    </form>
                                                  
                                                       
                                                 
                                                              
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
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
       


@endsection