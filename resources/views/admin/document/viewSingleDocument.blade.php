@extends('admin.document.layout.document')
@section('content')
 
    <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">  Document</span>
                    </div>
                </div>
                <div   style="width: 700px;">
   
                       <div class="row">
                         <div class="col-md-6">
                         <div class="form-group{{ $errors->has('candidates_name') ? ' has-error' : '' }}">
                            <div class="form-group">
                            <label for="candidates_name" class="cols-sm-2 control-label"><strong>Name:</strong>
                            @if($document->candidates_name === null)
                                        N/A
                            @else
                            <span class="required"> {{$document->candidates_name}}</span>
                            @endif
                                      
                            </label>
                            <div class="cols-sm-10">
                                <div class="input-group"> 
                   
                                </div>
                            </div>
                        </div>
                </div>
            </div>


                     <div class="col-md-6">

                            <div class="form-group" >
                        <label for="password" class="cols-sm-2 control-label" ><strong>Email Address: </strong>
                            @if($document->email === null)
                            N/A
                            @else
                             <span class="required"> {{$document->email}} </span>  
                            @endif </label>
                            <div class="cols-sm-10">
                                <div class="input-group"> 
                        
                                </div>
                            </div>
                        </div>

                     </div>

                 </div>
 
                    <div class="row">
                 <div class="col-md-6">
                     <div class="form-group">
                            <label for="profession" class="cols-sm-2 control-label"><strong>Profession: </strong>
                        

                                @foreach($document->professions as $proferssion)
                                                  
                                                  {{$proferssion->name}}
                                            @endforeach
                            </label>
                            <div class="cols-sm-10">
                                <div class="input-group">
               
             
                            </div>
                        </div> 
                     </div> 
                    </div>
                        
                        <div class="col-md-6"> 
                            <label for="other_profession" class="cols-sm-2 control-label" ><strong>Other profession:</strong>
                            @if($document->other_profession === null)
                                        N/A
                            @else
                             <span class="required"> {{$document->other_profession}} </span>  
                            @endif 
                            </label>
                            <div class="cols-sm-10">
                                <div class="input-group"> 
      

                                </div>
                            </div>
                    
                    </div> 
                </div>

                                <div class="row">
                 <div class="col-md-6"> 
                    <label for="gender" class="cols-sm-2 control-label"><strong> Gender:</strong> 
                            @if($document->gender === null)
                                N/A
                            @else
                             <span class="required"> {{$document->gender}} </span>  
                            @endif  
                        </label>
                        <div class="cols-sm-10">
                        <div class="input-group"> 
                        </div> 

                        </div> 
                     
 

                    </div>
                        
                    <div class="col-md-6">
   <div class="form-group{{ $errors->has('ethnicity') ? ' has-error' : '' }}">                        
      <label for="ethnicity" class="cols-sm-2 control-label" > <strong> Ethnicity:&ensp;&ensp; </strong>
                            @if($document->ethnicity === null)
                                N/A
                            @else
                              <span class="required">{{$document->ethnicity}} </span>    
                            @endif  

     
                                </label>
                                <div class="cols-sm-10">
                                <div class="input-group"> 
                   
                 
                                </div>
                                </div>
                          
</div> 
                    </div> 
                </div>

        <div class="row"> 
                    <div class="col-md-6">
   <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                          
                    <label for="date_of_birth" class="cols-sm-2 control-label"><strong>Date of birth:</strong>
                            
                            @if($document->date_of_birth === null)
                                N/A
                            @else

                            <span class="required">{{$document->date_of_birth}} </span>     
                            @endif  

                            </label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                </div>
                            </div>
                     
</div>

                    </div>

                    <div class="col-md-6"> 
                    <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                    <label for="phonenumber" class="cols-sm-2 control-label" > <strong>Phone N0:</strong>
                    
                           @if($document->phonenumber === null)
                                N/A
                            @else

                            <span class="required">{{$document->phonenumber}} </span>     
                            @endif   
                            </label>
                            <div class="cols-sm-10">
                                <div class="input-group"> </div>
                            </div>
                        </div>
</div>
                  

                </div>


        <div class="row"> 
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('job_type') ? ' has-error' : '' }}">
                            <label for="job_type" class="cols-sm-2 control-label"> <strong>Job type:</strong>
          
                              @if($document->job_type === null)
                                N/A
                            @else

                            <span class="required">{{$document->job_type}} </span>     
                            @endif   

                            </label>
                            <div class="cols-sm-10">
                                <div class="input-group"> </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                 <div class="form-group{{ $errors->has('relocate_nationaly') ? ' has-error' : '' }}" >
                     <label for="relocate_nationaly" class="cols-sm-2 control-label" > <strong> Relocate nationally:</strong>    
                            
                            @if($document->relocate_nationaly === null)
                                N/A
                            @else 
                            <span class="required">{{$document->relocate_nationaly}} </span>     
                            @endif   
                            </label>       
                            <div class="cols-sm-10">
                                <div class="input-group">
             
     
                                </div>
                            </div>
                        </div>
                    </div> 
                </div> 
                
                <div class="row"> 
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('relocate_internationaly') ? ' has-error' : '' }}">
               <label for="username" class="cols-sm-2 control-label"> <strong> Relocate Internationally:</strong>
                            @if($document->relocate_internationaly === null)
                                N/A
                            @else    
                            <span class="required">{{$document->relocate_internationaly}}  </span> 
                            @endif 
             
               </label>  
                            <div class="cols-sm-10">
                                <div class="input-group">
                         
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group{{ $errors->has('availability') ? ' has-error' : '' }}" >
                       <label for="availability" class="cols-sm-7 control-label"><strong> Availability: </strong>
                           @if($document->availability === null)
                                N/A
                            @else    
                            <span class="required">{{$document->availability}}  </span> 
                            @endif 

                            </label>
                        <div class="cols-sm-10">
                        <div class="input-group">  </div>
                        </div>
                        </div>
                    </div> 
                </div>

                <div class="row"> 
                    <div class="col-md-6">
                <div class="form-group{{ $errors->has('annual_salary') ? ' has-error' : '' }}">
                <label for="annual_salary" class="cols-sm-2 control-label"><strong>Annual salary:</strong>
    
                            @if($document->annual_salary === null)
                                N/A
                            @else  

                            @if($document->annual_salary === 1 )
                                     <span class="required">Below NGN 100000</span>
                            @endif

                            @if($document->annual_salary === 2 )
                                 <span class="required">NGN 100000 - NGN 300000</option>
                            @endif 
                            @if($document->annual_salary === 3 )
                                   <span class="required">NGN 300000 - NGN 500000</option>
                            @endif 
                             @if($document->annual_salary === 4 )    
                                    <span class="required">NGN 500000 - NGN 750000</span>
                            @endif 
                             @if($document->annual_salary === 5 ) 
                                    <span class="required">NGN 750000 - NGN 1.0m</span>
                                 @endif 
                             @if($document->annual_salary === 6 ) 
                                     <span class="required">NGN 1.0m - NGN 1.5m</span>
                                @endif 
                                   @if($document->annual_salary === 7 ) 
                                     <span class="required">NGN 1.5m - NGN 2.0m</span>
                                    @endif
                        @if($document->annual_salary === 8 ) 
                                    <span class="required">NGN 2.0m - NGN 3.0m</span>
                                  @endif
                                  @if($document->annual_salary === 9 ) 
                                     <span class="required">NGN 3.0m - NGN 4.0m</span>
                                 @endif
                                     @if($document->annual_salary === 10 ) 
                                   <span class="required">NGN 4.0m - NGN 6.0m</span>
                                     @endif
                                    @if($document->annual_salary === 11 ) 
                                  <span class="required">NGN 6.0m - NGN 8.0m</span>
                                    @endif
                                    @if($document->annual_salary === 12 ) 
                                   <span class="required">NGN 8.0m - NGN 10.0m</span>
                                    @endif
                                    @if($document->annual_salary === 13 ) 
                                   <span class="required">NGN 10.0m - NGN 12.0m</span>
                                     @endif
                                      @if($document->annual_salary === 14 ) 
                                    <span class="required">NGN 12.0m - NGN 14.0m</span>
                                      @endif
                                        @if($document->annual_salary === 15 ) 
                                    <span class="required">NGN 14.0m - NGN 16.0m</span>
                                         @endif
                                          @if($document->annual_salary === 16 ) 
                                          <span class="required">NGN 16.0m - NGN 18.0m</sspan>
                                     @endif
                                      @if($document->annual_salary === 17 ) 
                                        <span class="required">NGN 18.0m - NGN 20.0m</span>
                                        @endif
                                          @if($document->annual_salary === 14 ) 
                                    <span class="required"> NGN 20.0m - NGN 30.0m</span>
                                    @endif
                                    @if($document->annual_salary === 19 ) 
                                   
                                   <span class="required">  NGN 30.0m - NGN 40.0m </span>
                                @endif
                               @if($document->annual_salary === 20 ) 
               
                            <span class="required">NGN 40.0m - NGN 60.0m  </span> 
                            @endif 
                            
                            @endif

                            </label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                              
                         </div>
                            </div>
                        </div>
                    </div>

            <div class="col-md-6">
                <div class="form-group{{ $errors->has('years_of_experience') ? ' has-error' : '' }}">
                    <label for="years_of_experience" class="cols-sm-2 control-label" ><strong>Years of Experience: </strong>  
                            @if($document->years_of_experience === null)
                                N/A
                            @else    
                            <span class="required">{{$document->years_of_experience}}  </span> 
                            @endif  
                            </label>
                            <div class="cols-sm-10">
                                <div class="input-group"> 
              
                                </div>
                            </div>
                </div>
            </div>
 
                 </div>
                    <div class="row"> 
                    <div class="col-md-6">
                     <div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }}">
                        <label for="region" class="cols-sm-2 control-label"> <strong>Current Region: </strong>
                            @if($document->region->name === null)
                                N/A
                            @else    
                             <span class="required"> {{$document->region->name}} </span> 
                            @endif  

                        
                            </label>
                            <div class="cols-sm-10">
                                <div class="input-group"> 
                                </div>
                            </div>
                        </div> 
                    </div>


                <div class="col-md-6">
                        <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}" >
                   <label for="location" class="cols-sm-2 control-label" > <strong>Current Location:</strong>
                            
                           @if($document->city->name === null)
                                N/A
                            @else  
                             <span class="required"> {{$document->city->name}} </span>   
                            @endif  
                            </label>
                            <div class="cols-md-10"> </div>

                        </div>

                    </div>
                </div>
                      
                        <div class="form-group{{ $errors->has('cv_file') ? ' has-error' : '' }}">
                            <label for="file" class="cols-sm-2 control-label"> <strong>CV</strong>
                            <span class="required"></span> 
                        <form action="{{route('document.getFile')}}" method="POST">
                      <input type="hidden" name="cv_file" value="{{ $document->cv_file }}">
                            {{csrf_field()}}
                            {{method_field('POST')}}

                      <button class="btn btn-xs btn-danger  dropdown-toggle"  type="submit"> CV<i class="fa fa-download"></i></button>
                      </form> 
                            </label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                </div>
                            </div>
 
                        </div>
                     
                <div class="form-group{{ $errors->has('career_highlights') ? ' has-error' : '' }}">
                    <label for="confirm" class="cols-sm-2 control-label"> <strong> Career highlights:</strong> 
                        
                           @if($document->career_highlights === null)
                                N/A
                            @else


        <textarea name=""  readonly="readonly" class="form-control"  style="margin: 0px -6px 0px 0px; width: 471px; height: 93px;">{{$document->career_highlights}}</textarea>
                               
                            @endif     

                            </label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                </div>
                            </div>
                    </div> 
          
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
  
@endsection
