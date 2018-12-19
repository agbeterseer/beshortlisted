@extends('admin.search.layout.search')
@section('content')
                              <div class="search-page search-content-2">
                            <div class="search-bar ">
                                <div class="row">

                                <form>
                                    <div class="col-md-7">

                                        <div class="input-group">

                                            <input type="text" class="form-control" name="candidates" placeholder="Search for...">
                                            <span class="input-group-btn">
                                                <button class="btn blue uppercase bold" type="submit">Search</button>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                    Years of Experience
               <select class="form-control" name="years_of_experience">
                                            <option> 1</option>
                                            <option> 2</option>
                                            <option> 3</option>
                                            <option> 4</option>
                                            <option> 5</option>
                                            <option> 6</option>
                                            <option> 7</option>
                                            <option> 8</option>
                                            <option> 9</option>
                                            <option> 10</option>
                                            <option> 11</option>
                                            <option> 12</option>
                                            <option> 13</option>
                                            <option> 14</option>
                                            <option> 15</option>
                                            <option> 16</option>
                                            <option> 17</option>
                                            <option> 18</option>
                                            <option> 19</option>
                                            <option> 20</option>
                                            <option> 21</option>
                                            <option> 22</option>
                                            <option> 23</option>
                                            <option> 24</option>
                                            <option> 25</option>
                                            <option> 26</option>
                                            <option> 27</option>
                                            <option> 28</option>
                                            <option> 29</option>
                                            <option> 30</option>
                                        </select>
                                                      Area Of Specializtion
                               <select name="profession"  class="form-control"  >
                                       @foreach($professions as $profession)
                                       <option value="{{$profession->id}}">{{$profession->name}}</option>
                                       @endforeach
                                   </select>
                     
                           
                                    </div>

</form>

                                </div>
                            </div>


 



                                        </div>

        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-body">
                    <div class="table-toolbar">
    
                <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
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
                                <th>Date Created</th>
                                <th> Location </th>
                                 <th> File </th>
                               <th> Actions </th>
                           
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
                                                     @foreach($document->professions as $proferssion)
                                                  
                                                  {{$proferssion->name}}
                                            @endforeach
                                                </td>
                                                <td>{{$document->years_of_experience}}</td>
                                                  <td>
                                                  {{$document->created_at}} 
                                                  </td>
                                                <td> 
                                                  {{$document->city->name}}

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
                                          <a href="{{route('document.edit', $document->id)}}">
                                                        <i class="icon-docs"></i> Add CV </a>
                                                     
                                                    </li>
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
                <!-- {{ $documents->links() }} END EXAMPLE TABLE PORTLET appends(['s' => $s])->-->
            </div>
    





@endsection