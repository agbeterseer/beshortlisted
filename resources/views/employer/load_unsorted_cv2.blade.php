        <div class="col-md-8 col-sm-8 col-xs-8">
         <div id="expand_unsorted" class="collapse"> 
  <div class="cscroll_div scroll_div" >
            <div class="container "> 
            
                <div class="row"> 
                    <div class="col-md-8">
                    <div class="col-md-8">   

                         <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Gender</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="gender_unsorted">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="g1_unsorted" name="gender[]" value="Male" />
                                                    <label for="g1_unsorted"><span></span>Male</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g2_unsorted"  name="gender[]" value="Female" />
                                                    <label for="g2_unsorted"><span></span> Female</label>
                                                </li>
                                     <!--            <li>
                                                    <input type="checkbox" id="g2"  name="gender" value="All" />
                                                    <label for="g2"><span></span> Both</label>
                                                </li> -->
                                              
                                            </ul>
                                        </div>
                                    </div> </div>
                                                           <div class="col-md-8">                                          
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Location</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="location_unsorted" >
                                            <ul class="careerfy-checkbox">
                                            @foreach($cities as $city) 
                                                <li>
                                                    <input type="checkbox" id="r{{$city->id}}_unsorted" name="city[]" value="{{$city->id}}" />
                                                    <label for="r{{$city->id}}_unsorted"><span></span>{{$city->name}}</label>
                                                </li> 
                                            @endforeach 
                                            </ul> 
                                        </div>
                                    </div> </div>

                        <div class="col-md-8">       <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Job Function</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="profession_unsorted">
                                            <ul class="careerfy-checkbox">
                                               @foreach($professions as $profession)
                                                <li>
                                                    <input type="checkbox" id="r_{{$profession->id}}_unsorted" name="profession[]" value="{{$profession->id}}" />
                                                    <label for="r_{{$profession->id}}_unsorted"><span></span>{{$profession->name}}</label>
                                                    <small></small>
                                                </li>
                                                @endforeach 
                                            </ul> 
                                        </div>
                                    </div>
                            </div>

                                    <div class="col-md-8">
        <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Career Level</a></h2>
                                        <div class="careerfy-checkbox-toggle croll_div" id="career_level_unsorted">
                                            <ul class="careerfy-checkbox">
                                  @foreach($jobcareer_levels as $jobcareer_level)
                                                <li>
                                 <input type="checkbox" id="jc{{$jobcareer_level->id}}_unsorted" name="career_level[]" value="{{$jobcareer_level->id}}" />
                                                    <label for="jc{{$jobcareer_level->id}}_unsorted"><span></span>{{$jobcareer_level->name}}</label>
                                                    <small>4</small>
                                                </li>
                                @endforeach
                                          
                                            </ul>
                                        </div>
                                    </div>

                                    </div>
                    </div>
                </div>

                <div class="row"> 
                <div class="col-md-8">
                    <div class="col-md-8"> 
                  <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Minimum Salary</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="salary_unsorted">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="salary1_unsorted" name="salary[]" value="N50,000-N100,000" />
                                                    <label for="salary1_unsorted"><span></span>N50,000-N100,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary2_unsorted" name="salary[]" value="N150,000-N250,000" />
                                                    <label for="salary2_unsorted"><span></span>N150,000-N250,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary3_unsorted"  name="salary[]" value="N350,000-N600,000" />
                                                    <label for="salary3_unsorted"><span></span>N350,000-N600,000</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="salary4_unsorted"  name="salary[]" value="N750,000-N1,000," />
                                                    <label for="salary4_unsorted"><span></span>N750,000-N1,000,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary5_unsorted"  name="salary[]" value="N1,000,000-N5,000,000" />
                                                    <label for="salary5_unsorted"><span></span>N1,000,000-N5,000,000</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="salary6_unsorted"  name="salary[]" value="N550,000-N10,000,000" />
                                                    <label for="salary6_unsorted"><span></span>N5,050,000-N10,000,000</label>
                                                </li>
                                                  <li>
                                                    <input type="checkbox" id="salary7_unsorted"  name="salary[]" value="N10,000,000-N15,000,000" />
                                                    <label for="salary7_unsorted"><span></span>N10,000,000-N15,000,000</label>
                                                </li>
                                                  <li>
                                                    <input type="checkbox" id="salary8_unsorted"  name="salary[]" value="N15,000,000-Above" />
                                                    <label for="salary8_unsorted"><span></span>N15,000,000-Above</label>
                                                </li>

                                            </ul>
                                        </div>
                                </div></div>
                    <div class="col-md-8">                 <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Availability</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="availability_unsorted">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="avail1_unsorted" name="avail[]" value="now" />
                                                    <label for="avail1_unsorted"><span></span>Immediate</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail2_unsorted" name="avail[]" value="1 week" />
                                                    <label for="avail2_unsorted"><span></span>1 week</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail3_unsorted"  name="avail[]" value="2 weeks" />
                                                    <label for="avail3_unsorted"><span></span>2 weeks</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="avail4_unsorted"  name="avail[]" value="1 month" />
                                                    <label for="avail4_unsorted"><span></span>1 month</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="avail5_unsorted"  name="avail[]" value="2 months" />
                                                    <label for="avail5_unsorted"><span></span>2 months</label>
                                                </li>
  <!--                                               <li>
                                                    <input type="checkbox" id="avail6_hired"  name="avail[]" value="Specific date" />
                                                    <label for="avail6_hired"><span></span>Specific date</label>
                                                </li> -->
                                            </ul>
                                        </div>
                                </div>  </div>
                    <div class="col-md-8"> 
                    <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Years Of Experience</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="yearofexperience_unsorted">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="g1yoe_unsorted" name="yoe[]" value="0-5" />
                                                    <label for="g1yoe_unsorted"><span></span>0-5</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g2yoe_unsorted"  name="yoe[]" value="6-10" />
                                                    <label for="g2yoe_unsorted"><span></span>6-10</label>
                                                </li>
                                               <li>
                                                    <input type="checkbox" id="g3yoe_unsorted"  name="yoe[]" value="11-15" />
                                                    <label for="g3yoe_unsorted"><span></span>11-15</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g4yoe_unsorted"  name="yoe[]" value="16-20" />
                                                    <label for="g4yoe_unsorted"><span></span>16-20</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="g5yoe_unsorted"  name="yoe[]" value="20 Above" />
                                                    <label for="g5yoe_unsorted"><span></span>20 Above</label>
                                                </li>
                                            </ul>
                                        </div>
                                </div> </div> 
                </div> 
                </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-8">                                <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Age</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="age_unsorted">
                                            <ul class="careerfy-checkbox">
                                                <li>
                                                    <input type="checkbox" id="rag1_unsorted" name="ag" value="18-25" />
                                                    <label for="rag1_unsorted"><span></span>18-25</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="rag2_unsorted" name="ag" value="26-30" />
                                                    <label for="rag2_unsorted"><span></span>26-30</label>
                                                </li>
                                                    <li>
                                                    <input type="checkbox" id="rag3_unsorted" name="ag" value="31-35" />
                                                    <label for="rag3_unsorted"><span></span>31-35</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="rag4_unsorted" name="ag" value="36-40" />
                                                    <label for="rag4_unsorted"><span></span>36-40</label>
                                                </li>
                                                     <li>
                                                    <input type="checkbox" id="rag5_unsorted" name="ag" value="41-45" />
                                                    <label for="rag5_unsorted"><span></span>41-45</label>
                                                </li> 
                                                <li>
                                                    <input type="checkbox" id="rag6_unsorted" name="ag" value="46-50" />
                                                    <label for="rag6_unsorted"><span></span>46-50</label>
                                                </li> 
                                                <li>
                                                    <input type="checkbox" id="rag7_unsorted" name="ag" value="51 Above" />
                                                    <label for="rag7_unsorted"><span></span>51 Above</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> </div>
                            <div class="col-md-8">                                
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Qualification</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div"  >
                               <div id="qualify_unsorted">

                                            <ul class="careerfy-checkbox">
                                             @foreach($educationallevels as $educational_level)
                                                    <li>
                                         <input type="checkbox" id="qu_{{$educational_level->id}}" name="qu[]" value="{{$educational_level->id}}" />
                                                    <label for="qu_{{$educational_level->id}}"><span></span>{{$educational_level->name}}</label>
                                                </li>
                                                @endforeach
                                        
                                                 </ul>
                                                 </div>
                                        </div>
                                    </div> </div>
     
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-8"> 
                            <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle">
                                        <h2><a href="#" class="careerfy-click-btn">Employement Terms</a></h2>
                                        <div class="careerfy-checkbox-toggle" id="job_terms_unsorted">
                                            <ul class="careerfy-checkbox">
                                  @foreach($employement_terms as $employement_term)
                                                <li>
                                   <input type="checkbox" id="jr{{$employement_term->id}}_unsorted" name="job[]" value="{{$employement_term->id}}" />
                                                    <label for="jr{{$employement_term->id}}_unsorted"><span></span>{{$employement_term->name}}</label>
                                                    <small>4</small>
                                                </li>
                                @endforeach
                                          
                                            </ul>
                                        </div>
                                    </div></div>
                            
                        </div>


                    </div>
            
            </div>
        </div>
          </div> 
                                                <div class="tab-content" > 
                                     
                                                 <div class="tab-pane active" id="tab_6_1">
                                            
   

 
         
                                                    </div> 
                                                </div>

                                            </div>

                                        </div>