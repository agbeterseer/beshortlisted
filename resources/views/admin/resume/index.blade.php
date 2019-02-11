      
@extends('layouts.admin_layout', [
  'page_header' => 'Resume Builder',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' => '',
  'policy' => '',
  'package' => '',
  'page' => 'active',
  'role' => '',
  'user' => '',
])

@section('content')
 <style>
* {
    box-sizing: border-box;
}

.zoom {
    /*padding: 50px;*/
    /*background-color: green;*/
    transition: transform .2s;
    /*width: 200px;*/
    /*height: 200px;*/
    margin: 0 auto;
}

.zoom:hover {
    -ms-transform: scale(5.5); /* IE 9 */
    -webkit-transform: scale(5.5); /* Safari 3-8 */
    transform: scale(5.5); 
}
</style>

        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> All Templates</span>
                    </div>
                
                </div>
                <div class="portlet-body">
                   <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">

<a class="btn btn-success" href="{{route('resume.create')}}"><i class="fa fa-plus"></i>Create Template</a>
                                </div>
                            </div>
                        </div>

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
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
                    <th>  <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" />
                                                            <span></span>
                                                        </label></th>
                                <th> Template </th>
                                <th> Name </th>
                                <th> Display Name </th>
                               
                               <th> Description </th>
                               <th> Action </th>
                           
                            </tr>
                        </thead>
                        <tbody>
                  @forelse($resume_templates as $resume_template)

                              <tr class="odd gradeX">
                                                    <td>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" />
                                                            <span></span>
                                                        </label>
                                </td>
                          <td>
                        <a href="{{route('resume.show', $resume_template->id)}}">
                        <img alt="template" title="{{$resume_template->name}}" src="/uploads/ResumeTemplates/{{ $resume_template->template_link }}"  class="zoom" height="30" width="30" />
                        </a>
                                </td>
                                <td>{{$resume_template->name}}</td>
                                 <td>
                                 {{$resume_template->display_name}}

                                 </td>
                                  <td>{{$resume_template->description}}</td>
                            
                                                    <td>
                                                        <div class="btn-group">
                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                        <i class="fa fa-angle-down"></i>
                        </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{route('resume.edit', $resume_template->id)}}">
                            <i class="icon-docs"></i> Edit </a> 
                        </li>
                        <li class="divider"> </li>
                        <form action="{{route('resume.destroy', $resume_template->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                                           <button class="btn red-mint" data-toggle="confirmation" data-placement="left" data-btn-ok-label="Continue" data-btn-ok-icon="icon-like" data-btn-ok-class="btn-success" data-btn-cancel-label="Stop!"
                                            data-btn-cancel-icon="icon-close" data-btn-cancel-class="btn-danger">delete</button>
                                                    </form>
                                                  
                                                       
                                                 
                                                              
                                                            </ul>
                                                  


                                                        </div>
                                                    </td>
                                                </tr>
                                                 @empty
                                    
                                </tbody>
                             @endforelse
 
                   </tbody>
                        </table>

          </div>

          </div>
      </div>
      <!-- END EXAMPLE TABLE PORTLET-->
  </div>



       

@endsection

 