@extends('admin.document.layout.document')
@section('content')

        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->

                  <div class="portlet light bordered">
     
                <div > 
                    <form class="form-horizontal" action="{{route('document.custome_search')}}" method="post" role="form">
    {{method_field('POST')}}
   {{ csrf_field() }}
    <div class="row"> 
          <div class="col-md-4">
           <div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }}">
          
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-plane fa" aria-hidden="true"></i></span>
                <select name="region" class="form-control"  required="required" style="width: 250px; margin-bottom: : -60px;">
                <option value="">...Select Region...</option>
                @foreach($regions as $region)
                <option value="{{$region->id}}">{{$region->name}}</option>
                @endforeach
                </select> 

                    @if ($errors->has('region'))
                        <span class="help-block">
                            <strong>{{ $errors->first('region') }}</strong>
                        </span>
                    @endif
             
                </div>
              </div>
            </div> 
          </div>

          <div class="col-md-4">
            <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}" >
         
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-search fa-lg" aria-hidden="true"></i></span>
                     <select name="location" id="location" class="form-control" style="width: 250px; margin-bottom: : -60px;" >
                                <option value="">...Select Region...</option>
                            </select>
                            
                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif

                </div>
              </div>
            </div>

          </div>
                <div class="col-md-4">
            <div class="form-group{{ $errors->has('years_of_experience') ? ' has-error' : '' }}" >
         
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-history fa-lg" aria-hidden="true"></i></span>

                 <input type="number" name="years_of_experience" required="required" class="form-control" placeholder="years_of_experience" style="width: 250px; margin-bottom: : -60px;">
                  
                                @if ($errors->has('years_of_experience'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('years_of_experience') }}</strong>
                                    </span>
                                @endif

                </div>
              </div>
            </div>

          </div>
         </div>

        <div class="row"> 
          <div class="col-md-4">
           <div class="form-group{{ $errors->has('profession') ? ' has-error' : '' }}">
   
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-briefcase fa-lg" aria-hidden="true"></i></span>
         <select name="profession[]" multiple="multiple"  class="form-control" style="width: 250px; margin-bottom: : -60px;" required="required">
                          @foreach($professionsList as $profession)
                          <option value="{{$profession->id}}">{{$profession->name}}</option>
                          @endforeach
                          </select>

                    @if ($errors->has('profession'))
                        <span class="help-block">
                            <strong>{{ $errors->first('profession') }}</strong>
                        </span>
                    @endif
             
                </div>
              </div>
            </div> 
          </div>
  <div class="col-md-4">
           <div class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}"> 
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-briefcase fa-lg" aria-hidden="true"></i></span>
         <select name="tag"  class="form-control" style="width: 250px; margin-bottom: : -60px;" onchange="this.form.submit();">
         <option value="">...Select Tag...</option>
                          @foreach($tags as $tag)
                          <option value="{{$tag->id}}">{{$tag->name}}</option>
                          @endforeach
         </select>

                    @if ($errors->has('tag'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tag') }}</strong>
                        </span>
                    @endif
             
                </div>
              </div>
            </div> 
          </div>

    
         </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                               <button class="btn blue mt-ladda-btn ladda-button btn-outline" type="submit" id="add">
              <span class="glyphicon glyphicon-magnify"></span> Search Records  
              </button>
                            </div>
                        </div>
        


 
  </form>
</div>
</div>

            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> CV Category Search</span>
                    </div>
                  </div>
                <div class="portlet-body">
                    <div class="table-toolbar"> 
             
<table id="example" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>
                              <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                        <span></span>
                                    </label>
                                </th>
                                <th> Candidate's name </th>
                                <th> Profession </th>
                                <th> Years Of Experience </th>
                                <th> Shortlist </th>
                                  <th>Details</th>
                                <th> Location </th>
                                 <th> File </th>
                               <th> Actions 
 </th>
                           
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($documents as $document)

                              <tr class="odd gradeX">
                                                    <td>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" />
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                <td>{{$document->candidates_name}}</td>
                                                <td> 
               
                                  {{$profession_name}}
                               

                                                </td>
                                                <td>{{$document->years_of_experience}}</td> 
                                                <td>   @if($document->red === 1) 
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
                               
                                                  <td>
                 <a href="{{route('get_single.document', $document->id)}}"> Details  </a> 
                                           
                                                  </td>
                                                <td> 
                        {{$city_name}}


                                                </td>
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
                                               <ul class="dropdown-menu" >
                                                    <li>
                                          <a href="{{route('document.uploadcv', $document->id)}}">
                                                        <i class="icon-docs"></i> Add CV </a>
                                                     
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
                                                    <form action="" method="POST">
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
                </div>
                    
         
                 <!--END EXAMPLE TABLE PORTLET appends(['s' => $s])-->
            </div>


            <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
  <div class="row">
    <div class="col-md-12">
            <div class="input-group" id="adv-search">
                <input type="text" class="form-control" placeholder="Search for snippets" />
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <form class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="filter">Filter by</label>
                                    <select class="form-control">
                                        <option value="0" selected>All Snippets</option>
                                        <option value="1">Featured</option>
                                        <option value="2">Most popular</option>
                                        <option value="3">Top rated</option>
                                        <option value="4">Most commented</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Author</label>
                                    <input class="form-control" type="text" />
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Contains the words</label>
                                    <input class="form-control" type="text" />
                                  </div>
                                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </form>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
          </div>
        </div>
  </div>
</div>
@endsection