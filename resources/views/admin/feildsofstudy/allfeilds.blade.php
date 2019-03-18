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
  'package' => 'active',
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
                        <span class="caption-subject bold uppercase"> All Packages</span>  
                    </div>
                
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                    <a  class="btn blue mt-ladda-btn ladda-button btn-outline" data-toggle="modal"  data-style="slide-left" data-spinner-color="#333" href="{{route('plans.create')}}">
                                    <span class="ladda-label">
                                    <i class="icon-plus"></i> Add Plan</span>
                                    </a>
                             </div>
                           </div>

                        @if(Session()->has('success'))
                <div class="alert alert-success"> 
                {!! Session::get('success') !!}
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
                                                        <th>Price</th>
                                                        <th>Jobs Posting</th>
                                                        <th>Feature Jobs</th>
                                                        <th>Renew Jobs</th>
                                                        <th>Job Duration</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($packages as $package)
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
                            <a href="{{route('plans.edit', $package->id)}}">
                            <i class="icon-docs"></i> Edit </a>
                         
                        </li>
                        <li class="divider"> </li> 
                        <form action="{{route('plans.destroy', $package->id)}}" method="POST" class="delete">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                        <input class="btn btn-sm btn-danger" type="submit" value="Delete"  data-toggle="confirmation" data-singleton="true">
                                                    </form>   
                         </ul> 
                                                </div></td>
                                                        <td><span>{{$package->title}}</span></td>
                                                        <td>N{{$package->price}}</td>
                                                        <td>{{$package->jobs_posting}}</td>
                                                        <td>5{{$package->featured_jobs}}</td>
                                                        <td>2{{$package->renew_jobs}}</td>
                                                        <td>{{$package->job_duration}} days</td>
                                    
                                                    </tr>
                                                    @empty

                                                    @endforelse
                                                <!--     <tr>
                                                        <td>
                                                            <div class="careerfy-payments-checkbox">
                                                                <input id="p4" name="rr" type="checkbox">
                                                                <label for="p4"><span></span></label>
                                                            </div>
                                                        </td>
                                                        <td><span>Advanced</span></td>
                                                        <td>$20</td>
                                                        <td>2</td>
                                                        <td>10</td>
                                                        <td>6</td>
                                                        <td>30 days</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="careerfy-payments-checkbox">
                                                                <input id="p5" name="rr" type="checkbox">
                                                                <label for="p5"><span></span></label>
                                                            </div>
                                                        </td>
                                                        <td><span>Simple</span></td>
                                                        <td>$5</td>
                                                        <td>5</td>
                                                        <td>2</td>
                                                        <td>10</td>
                                                        <td>15 days</td>
                                                    </tr> -->
                                                </tbody>
                                            </table>
            

                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>

                            
@endsection