<template>
	
<div>
                 <div class="tabbable-line boxless tabbable-reversed">


                 <shortlistcount v-bind:jobid="jobid" v-on:shortlistCount="updateData($event)"></shortlistcount>
                   
                                      <div class="tab-content">
                                        <div class="tab-pane active" id="tab_01">

   <aside class="careerfy-column-4">
<div class="careerfy-typo-wrap" >

<div class="careerfy-search-filter"> 
<div class="careerfy-candidate careerfy-candidate-default">
<div class="careerfy-search-filter-wrap careerfy-without-toggle">
 
<div id="" data-toggle="collapse" data-target="#expand_unsorted"> 
<i class="careerfy-icon careerfy-sort"></i>  <h2>Filter Unsorted</h2>
</div> 
 </div>
      
      <!--  Load Unsorted filter  -->   

                <ul class="careerfy-row nav-tabs tabs-left" id="applicants_list"> 
<li class="careerfy-column-12 " v-for="applicant in unsortedapplicants" v-bind:key="applicant.id" v-model="unsortedapplicant" v-on:click="getCV(applicant.id)" >
 <a v-bind:href="'#tab_6_1'+applicant.id" data-toggle="tab" >
                                          
 
                                            <div class="careerfy-candidate-default-wrap butt"> 
                                                <figure> 
                                        <img v-bind:src="'/uploads/avatars/' + applicant.avatar"  />
                                               </figure> 
                                                <div class="careerfy-candidate-default-text">
                                                    <div class="careerfy-candidate-default-left">
                                                        <h2>
                                                        {{ applicant.candidates_name}}
                                                        <i class="careerfy-icon careerfy-check-mark"></i></h2>
                                                        <ul class="careerfy-column-12" >

                                                        <!-- to get work experience; get job_id from application table and resume_id, then goto workexperience table and find by resume_id and job_id  -->
                                                  
                                                            <li> {{ applicant.city_id}} <span href="#" class="careerfy-candidate-default-studio">
                                                                {{ applicant.email}}
                                                            </span></li>
                                                    
                                                        </ul>
                                                    </div>
                                              <!--       <a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a> -->
                                                </div>
                                            </div>

                                             </a>   
                                        </li> 
                                        <p>
                                            <br>
                                        </p>
  
 
<!-- <li class="careerfy-column-12"> No Record(s) Found</li> -->
 


                             </ul>

                                  <div class="careerfy-pagination-blog">
                                    <ul class="pagination">
                 <li v-bind:class="[{disabled: !pagination.prev_page_url}]"><a class="prev page-numbers" href="#" @click="fetchApplicantsByJobID(pagination.prev_page_url)"><span><i class="careerfy-icon careerfy-arrows4"></i></span></a></li>
 <li v-for="n in pagination.last_page" v-bind:key="n" v-bind:class="[{active: pagination.current_page == n}]" class="page-item"><span  class="page-link" @click="fetchApplicantsByJobID(pagination.path_page + n)">{{ n }} </span></li>
                                            
            <li v-bind:class="[{disabled: !pagination.next_link}]" ><span class="next page-numbers" @click="fetchApplicantsByJobID(pagination.next_link)"><span><i class="careerfy-icon careerfy-arrows4"></i></span></span></li>

 
                                    </ul>

                                </div>
 
      <!-- Load Unsorted filter   -->   
     
                               </div> 
                                </div>
 
                            </div>
                        </aside>  


                                  <!--  Load Unsorted CV and cv filter -->  
                                 <div class="col-md-8 col-sm-8 col-xs-8">

                                                     <div id="expand_unsorted" class="collapse"> 
                                                                <div class="cscroll_div scroll_div" >
                                                                           
                                                                          <unsortedfilter></unsortedfilter>
                                                                           
                                                                </div>
                                                      </div> 
                    
                                                <div class="tab-content">
                                          
                      <div >


  <div class="tab-pane" v-if="applicant.id" :id="'tab_6_1' + applicant.id" >
 
<rejectbutton v-bind:jobid="jobid" v-bind:applicantid="applicant.id" v-on:rejectResume="updateRejectedData($event)"></rejectbutton>
<reviewbutton v-bind:jobid="jobid" v-bind:applicantid="applicant.id" v-on:reviewResume="updateReviewData($event)"></reviewbutton>  
<shortlistbutton v-bind:jobid="jobid" v-bind:applicantid="applicant.id" v-on:shortlistResume="updateShortlistedData($event)"></shortlistbutton>

<offerbutton v-bind:jobid="jobid" v-bind:applicantid="applicant.id" v-on:offerResume="updateOfferData($event)"></offerbutton>
<hirebutton v-bind:jobid="jobid" v-bind:applicantid="applicant.id" v-on:hireResume="updateHireData($event)"></hirebutton>

<div :id="'toggle'+applicant.id" class="btn  mt-ladda-btn mini_header" data-toggle="collapse" data-target="#expand_unsorted" >
                   
                       <i class="careerfy-icon careerfy-sort"></i> Sort
                    </div>
 
   <div class="space">&nbsp;</div>
 
<div class="col-md-12 cv_content">  
<div class="" id="user_profile"> 
 <div class="pageactionIn">
 <div class="title4">
<div class="user_name"> <h4 class="highlightable">{{ applicant.candidates_name }}</h4> </div>  
                                        
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Age</span>

<span class="detail highlightable"><strong>{{ applicant.age }}</strong></span>

</div>

 <div class="overviewtitle2">
<span class="ovtitle">Date of Birth</span>
<span class="detail highlightable"><strong> {{ applicant.date_of_birth }} </strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Gender</span>
<span class="detail highlightable"><strong> {{ applicant.gender }} </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Nationality</span>
<span class="detail highlightable" v-for="country in countries" v-if="country.code == applicant.nationality"><strong> {{ country.name_en }}</strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Location</span>
<span class="detail highlightable"><strong>  {{ applicant.city_id }}</strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Email</span>
<span class="detail highlightable"><strong>{{ applicant.email }}</strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Willing to relocate:</span>
<span class="detail highlightable"><strong>{{ applicant.relocate_nationaly }} </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Educational Level:</span>
<span class="detail highlightable" v-for="educationallevel in educationallevels" v-if="educationallevel.id === applicant.educational_level"><strong> {{ educationallevel.name }} </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Employment Terms:</span>
<span class="detail highlightable" v-for="employement in employement_terms" v-if="employement.id == applicant.d_employment_term"><strong> {{ employement.name }}</strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Career Level:</span>
<span class="detail highlightable" v-for="jobcareer_level in jobcareer_levels" v-if="jobcareer_level.id == applicant.career_level"><strong> {{ jobcareer_level.name }}  </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle"> Minimum Salary:</span>
<span class="detail highlightable"><strong> {{ applicant.minimum_salary }} </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Availability:</span>
<span class="detail highlightable"><strong> {{ applicant.availability }} </strong></span>
</div> 
 </div> 
</div>
</div>

<div class="space">&nbsp;</div>
 
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="education_topsection">
<div class="title4">
<p class="editov2"> </p>
 <h4>Career Objective / Summary</h4>

 {{ objective.summary }}
 </div>
</div>
</div>

<div class="space">&nbsp;</div>

<div class="col-md-12 cv_content">
<div class="pageactionIn" id="education_topsection"> 
<div class="title4">
<h4><i class="careerfy-icon careerfy-design-skills"></i> &nbsp;Specialties and Skills</h4>
</div>
 
<div class="skills_inner" v-for="jobskill in jobskills">
 <span class="jellybean">{{ jobskill.job_skill }}</span> 
</div>

</div> 
</div>

<div class="space">&nbsp;</div>

<div class="col-md-12 cv_content" v-for="educational in educationaList">
<div class="pageactionIn" id="education_topsection">
<div class="title4">
<h4> <i class="careerfy-icon careerfy-mortarboard"></i>&nbsp;Educational History </h4>
</div>

<div class="education_inner several2">
<div class="actions">

</div>

<div class="overviewtitle2">
<span class="ovtitle">Degree</span>
<span class="detail">{{ educational.qualificaiton }}<strong> {{ educational.feild_of_study }}</strong></span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Graduation period</span>
<span class="highlightable"> {{ educational.start_year }} - {{ educational.end_year }}</span>
 
</div>

<div class="overviewtitle2">
<span class="ovtitle">School</span>
<span class="highlightable">
{{ educational.school_name }}
 </span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Country</span>
<span class="highlightable"  v-for="country in countries" v-if="country.code == educational.country"> {{ country.name_en }} </span>
</div>

</div>

</div>
</div>


 
<div class="space">&nbsp;</div>
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="work_history_topsection">
<div class="title4">
 
<h4> <i class="careerfy-icon careerfy-social-media"></i> &nbsp;Work History</h4>
</div>
 
 
<div class="workhistory_inner several2" v-for="work_history in work_histories">

<div class="overviewtitle2">
<span class="ovtitle">Position Title</span>
<span class="highlightable"><strong> {{ work_history.position_title }}  </strong></span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Employment period</span>
<span class="highlightable">{{ work_history.start_year }} - {{ work_history.end_year }} </span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Company</span>
<span class="highlightable" >{{ work_history.company_name }}</span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Country</span>
<span class="highlightable" v-for="country in countries" v-if="country.code == work_history.country">  {{ country.name_en }} </span>
</div>

<!-- 
<div class="overviewtitle2">
<span class="ovtitle">Industry</span>
<span class="highlightable">  {{ work_history.industries }} Industry</span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Position Type</span>
<span class="highlightable"> {{ work_history.industryprofessions }} Position Type</span>
</div> -->

<div class="overviewtitle2">
<span class="ovtitle">Position Description</span>
<span class="job_description detail highlightable">
 {{ work_history.responsibilities }} </span>
</div>
</div>
 
</div>
</div>




<div class="space">&nbsp;</div>
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="certifications_topsection several2">
<div class="title4">
 
<h4 v-if="jobcertifications">Certifications</h4>
</div>
 
<div class="certification_inner several2" v-for="jobcertification in jobcertifications">
 
<div class="overviewtitle2">
<span class="ovtitle">Certification Name</span>
<span class="highlightable"><strong> {{ jobcertification.name }} </strong></span>
</div>
<div class="overviewtitle2">
<span class="ovtitle">Date Received</span>
<span class="highlightable">{{ jobcertification.date_received  }}</span>
</div>

</div>
 
</div>
</div>


<div class="space">&nbsp;</div>
<div class="col-md-12 cv_content" >
<div class="pageactionIn" id="additional_information_topsection" v-for="person_info in person_info_list">
<div class="title4">
 
<h4>Personal Information</h4>
</div>

<div class="overviewtitle2 overviewtype3 several2">
<span class="ovtitle">Interests</span>
<div class="highlightable">{{ person_info.interest }}</div>
</div>

<div class="overviewtitle2 overviewtype3 several2">
<span class="ovtitle">Associations</span>
<div class="highlightable">{{ person_info.association }} </div>
</div>

<div class="overviewtitle2 overviewtype3 several2">
<span class="ovtitle">Awards</span>
<div class="highlightable"> None {{ person_info.award }} </div>
</div>

<div class="overviewtitle2 overviewtype3 several2">
<span class="ovtitle">Personal page</span>
<span class="highlightable"><a class="breakword" href="#" rel="external">{{ person_info.personal_page }}</a></span>
</div>
 
</div>
 </div>

 
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div>
</div>




                                                 </div>                   
 
                                                </div> 

                                            </div>
                              <!--  load_unsorted_cv -->

                                         
                                        

                                          </div>



                              <!--  load_unsorted_cv -->
                            


                                <div class="tab-pane" id="tab_11">
                               <!--  <h2>Rejected</h2> -->
   <aside class="careerfy-column-4">
 
<div class="careerfy-typo-wrap">
<form class="careerfy-search-filter"> 
<div class="careerfy-candidate careerfy-candidate-default">
<div class="careerfy-search-filter-wrap careerfy-without-toggle">
<div >
<div id="" data-toggle="collapse" data-target="#expand_rejected"> 
<i class="careerfy-icon careerfy-sort"></i>  <h2>Filter Rejected</h2>
</div>
</div></div>
    
       <rejected :jobid="jobid"></rejected>
                   
                    
                                </div> 
                                </form>
 
                            </div>
                        </aside>  
 
                                                      <div class="col-md-8 col-sm-8 col-xs-8">

                                                     <div id="expand_rejected" class="collapse"> 
                                                                <div class="cscroll_div scroll_div" >
                                                                          <div class="container "> 
                                                                           <unsortedfilter></unsortedfilter>
                                                                          
                                                                          </div>
                                                                      </div>
                                                                        </div> 
                    
                                                <div class="tab-content" id="tab_rejected">
                 
                                              <div class="tab-pane active" id="tab_6_1">
                                                  <loadcv :applicantid="applicant.id" :jobid="jobid"></loadcv>
                                     <!-- <nocontent ></nocontent> -->


                                                 </div>                   
 
                                                </div>
                                            </div>

                                </div>
 <!--  End of Rejected Tab -->

                                <div class="tab-pane" id="tab_12"> 
 
   <aside class="careerfy-column-4"> 
<div class="careerfy-typo-wrap">
<form class="careerfy-search-filter"> 
<div class="careerfy-candidate careerfy-candidate-default">

<div class="careerfy-search-filter-wrap careerfy-without-toggle">
<div >
<div id="" data-toggle="collapse" data-target="#expand_inreview"> 
<i class="careerfy-icon careerfy-sort"></i>  <h2>Filter In-Review</h2>
</div>
</div></div>

            <!--  End of load_inreview Filter  Tab --> 
                  <reviewapplicants :jobid="jobid"></reviewapplicants>
            
              <!--  End of load_inreview Filter Tab -->

                                </div> 
                                </form>
 
                            </div>
                        </aside>  

 <div class="col-md-8 col-sm-8 col-xs-8">
                                                    <div id="expand_shortlist" class="collapse"> 
                                                              <div class="cscroll_div scroll_div">
                                                                        <div class="container ">  
                                                             
                                                                         <unsortedfilter></unsortedfilter>
                                                                        </div>
                                                                    </div>
                                                                      </div> 
                                                <div class="tab-content" id="in_review">
                                           
                                                 <div class="tab-pane active" id="tab_6_3">

                                                         <nocontent></nocontent>
 
                                                    </div>
                                                    
  
                                                </div>
                                            </div>
  </div>
 
<!--  End of load_inreview_cv Tab -->

                                <div class="tab-pane" id="tab_13"> 
 
   <aside class="careerfy-column-4"> 
<div class="careerfy-typo-wrap">
<form class="careerfy-search-filter"> 
<div class="careerfy-candidate careerfy-candidate-default">

<div class="careerfy-search-filter-wrap careerfy-without-toggle">
<div >
<div id="" data-toggle="collapse" data-target="#expand_shortlist"> 
<i class="careerfy-icon careerfy-sort"></i>  <h2>Filter Shortlisted</h2>
</div>
</div></div>

         <div class="shortlisted_filter" id="shortlisted_filter"> 
         <shortlisted :jobid="jobid"></shortlisted>
        <!--load_shortlisted_filter -->
        </div>
                                </div> 
                            </form> 
                            </div>
                        </aside>  
                                            <div class="col-md-8 col-sm-8 col-xs-8">
                                                    <div id="expand_shortlist" class="collapse"> 
                                                              <div class="cscroll_div scroll_div">
                                                                        <div class="container ">  
                                                              <unsortedfilter></unsortedfilter>
                                                                        
                                                                        </div>
                                                                    </div>
                                                                      </div> 
                                                <div class="tab-content" id="shortlist_me">
                                           
                                                 <div class="tab-pane active" id="tab_6_3">

                                                       <nocontent></nocontent>
 
                                                    </div>
                                                    
  
                                                </div>
                                            </div>
                                </div> 
                        <!--  End of load_inreview_cv Tab -->



   <div class="tab-pane" id="tab_14">  
   <aside class="careerfy-column-4"> 
<div class="careerfy-typo-wrap">
<form class="careerfy-search-filter"> 
<div class="careerfy-candidate careerfy-candidate-default">
<div class="careerfy-search-filter-wrap careerfy-without-toggle">
<div >
<div id="" data-toggle="collapse" data-target="#expand_offered"> 
<i class="careerfy-icon careerfy-sort"></i>  <h2>Filter Offered</h2>
</div>
</div></div>

          <div class="offered_filter" id="offered_filter">
             
              <offered :jobid="jobid"></offered>
<!--load_offered_filter  -->
          </div> 

                                </div> 
                                </form>
 
                            </div>
                        </aside>  


                                            <div class="col-md-8 col-sm-8 col-xs-8">

                                             <div id="expand_offered" class="collapse"> 
                                                        <div class="cscroll_div scroll_div">
                                                                  <div class="container ">  
                                                                   <!--load_offered shortlist -->
                                                                  
                                                                  </div>
                                                              </div>
                                              </div> 

                                                <div class="tab-content">
                                           
               <div class="tab-pane active" id="tab_6_4">

                      <!--load_offered_cv  -->
            
                   <nocontent></nocontent>
                  </div>

                                    
                                                </div>
                                            </div>

                                </div>



 <div class="tab-pane" id="tab_15">  
   <aside class="careerfy-column-4"> 
<div class="careerfy-typo-wrap">
<form class="careerfy-search-filter"> 

<div class="careerfy-search-filter-wrap careerfy-without-toggle">
<div >
<div id="" data-toggle="collapse" data-target="#expand_hired"> 
<i class="careerfy-icon careerfy-sort"></i>  <h2>Filter Hired</h2>
</div>
</div></div>
<div class="careerfy-candidate careerfy-candidate-default">

                    <div class="hired_filter" id="hired_filter"> 

                      <!--load_hired_filter  -->
<hired :jobid="jobid"></hired>
                    </div> 
        

                                </div> 
                                </form>
 
                            </div>
                        </aside>  

                                            <div class="col-md-8 col-sm-8 col-xs-8">
                                                 <div id="expand_hired" class="collapse"> 
                                                        <div class="cscroll_div scroll_div" >
                                                                <div class="container "> 
                                                                
                                                            
                                                                
                                                                </div>
                                                            </div>
                                                              </div> 

                                                <div class="tab-content"  id="resume_body">
                                                
                                                 <div class="tab-pane active" id="tab_6_5">
                                                

                                                <!--load_hired_cv -->
                                                          <nocontent></nocontent>
 
                                                    </div>
       
                                                </div>
                                            </div>

                                </div>




 <div class="tab-pane" id="tab_16">  
   <aside class="careerfy-column-4"> 
<div class="careerfy-typo-wrap">
<form class="careerfy-search-filter"> 

<div class="careerfy-search-filter-wrap careerfy-without-toggle">
<div >
<div id="" data-toggle="collapse" data-target="#expand_auto"> 
<i class="careerfy-icon careerfy-sort"></i>  <h2>Filter Automach</h2>
</div>
</div></div>
<div class="careerfy-candidate careerfy-candidate-default">

                    <!--Filter Automatch -->
                      <h2>Filter Automach</h2>

 
                                </div> 
                                </form>
 
                            </div>
                        </aside>  

                                            <div class="col-md-8 col-sm-8 col-xs-8">
                                                 <div id="expand_hired" class="collapse"> 
                                                            <div class="cscroll_div scroll_div" >
                                                                      <div class="container "> 
                                                                      
                                                               
                                                                      
                                                                      </div>
                                                                  </div>
                                                                    </div> 

                                                <div class="tab-content"  id="resume_body">
                                                 
                                                 <div class="tab-pane active" id="tab_6_6">
                                               
                                                        <nocontent></nocontent>
  
 
                                                    </div>
                                                     
                                                </div>
                                            </div>

                                </div>


 


             </div>
         </div>





  <!-- <div class="careerfy-candidate-default-wrap">   -->
 

</div>


                
 


</template>

<script>

import Unsortedfilter from './Unsortedfilter.vue'; 
import Rejected from './Rejected.vue'; 
import ShortlistCount from './ShortlistCount.vue'; 

 export default { 
props: ['jobid'],
    mounted () {
        // Do something useful with the data in the template
     this.callFunction();
    this.getUnsortedCount(); 
    this.getRejectedCount();
    this.getInReviewCount();
    this.getShortlistCount();
    this.getOfferedCount();
    this.getHiredCount();
    },
   components: {
        'applicantsll': Unsortedfilter,
        'rejected' : Rejected,
        'shortlistcount' : ShortlistCount
        
    },

  data() {
    return {
      unsortedapplicants: [],
      applicant: {
        id: '',
        document_id: '',
        user_id: '',
        resume_id: '',
        email: '',
        phone_number:'' 

      },
      rejectedapplicants: [],
      reject: {
        id: '',
        document_id: '',
        user_id: '',
        resume_id: '',
        email: '',
        phone_number:'' 

      },
      employement_term_list: [],
      employement_term: {
      id: '',
      name: ''
      },
      pagination: {},
      unsortedapplicant: '',
      message: '',
      applicant_id: '',
      objective: {
        user_id: '',
        resume_id: '',
        summary: ''

      },
      jobskills:[],
      jobskill: {
        id: '',
        userid: '',
        resumeid: '',
        job_skill: ''
      },
      educationaList: [],
      educational: {
        start_year: '',
        start_month: '',
        end_year: '',
        end_month: '',
        qualificaiton: '',
        feild_of_study: '',
        school_name: '',
        country: ''
      },
        isActive: true,
        error: null,
      work_histories: [],
      work_history: {
        start_year: '',
        end_year: '',
        start_month: '',
        end_month: '',
        position_title: '',
        career_level: '',
        company_name: '',
        country: '',
        responsibilities: '',
        userfk: '',
        resumefk: '',
        present: ''
      },
      jobcertifications: [],
      jobcertification: {
        id: '',
        date_received: ''
      },
      person_info_list: [],
      person_info:{
      user_id: '',
      interest: '',
      association: '',
      award: '',
      personal_page: '',
      training: ''
      },
      sorted_count: '',
      rejected_count: '',
      review_count: '',
      shortlisted_count: '',
      offered_count: '',
      hired_count: '',
      newRejected: '',
      employement_terms: [],
      jobcareer_levels: [],
      educationallevels: [],
      countries: [],
      currentDateWithFormat: ''


    }
  },
  created() {
  // run automatically 
    this.fetchApplicantsByJobID();
    // this.fetchRejectedByJobID(); 

// count section
    this.getUnsortedCount(); 
    this.getRejectedCount();
    this.getInReviewCount();
    this.getShortlistCount();
    this.getOfferedCount();
    this.getHiredCount();
  },
  methods:{


    fetchApplicantsByJobID(page_url) {
      let vm = this;
    page_url = page_url || "/api/job/applicants/" + this.jobid
    // let url = "/api/job/applicants/" + this.jobid;
      
    fetch(page_url)
    .then(res => res.json())
    .then(res => {
     
      this.unsortedapplicants = res.data;
      vm.makePagination(res.meta, res.links);
 
     
      })
      .catch(err => console.log(err));
    },
     makePagination(meta, links){
      let pagination = {
      current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev,
        from_page: meta.from,
        to_page: meta.to,
        total_page: meta.total,
        path_page: meta.path+'?page=',
        first_link: links.first,
        last_link: links.last,
        prev_link: links.prev,
        next_link: links.next
      } 
      this.pagination = pagination;
    },
    getCV(event){

      // alert('Hello ' + event + ' - ' + this.jobid +'!')
      let page_url = "/api/singlecv/" + event
      fetch(page_url)
      .then(res => res.json())
      .then(res => {
      //console.log('single cv inside App.js');
        this.applicant = res.get_single_cv;
      })
    this.getCareerObjectives(event);

   
    },getNextCV(event){
      this.fetchApplicantsByJobID();

      // alert('Hello ' + event + ' - ' + this.jobid +'!')
      let page_url = "/api/singlecv/" + event
      fetch(page_url)
      .then(res => res.json())
      .then(res => {
        //console.log('get_single_cv' + res.get_single_cv);
        this.applicant = res.get_single_cv;
      })
    this.getCareerObjectives(event);

   
    },
    getCareerObjectives(code){

      let page_url = "/api/objective/" + code
      fetch(page_url)
      .then(res => res.json())
      .then(res => {
        // console.log(res.objective);
        this.objective = res.objective;
         this.jobskills = res.jobskills;
        this.educationaList = res.educationaList;
        this.work_histories = res.work_histories;
        this.jobcertifications = res.jobcertifications;
        this.person_info_list = res.person_info_list;
        this.educationallevels = res.educationallevels;
        this.employement_terms = res.employement_terms;
        this.jobcareer_levels = res.jobcareer_levels;
        this.countries = res.countries;
          // console.log(this.person_info_list);
   

      })
  
    },
    getDataFromServer: function(date) {
           console.log('begin date');
              console.log(date);
                //ajaxCall to get data from server
      
                //let's pretend the received date data was saved in a variable (serverDate)
                //let's hardcode for this ex.
                var serverDate = '2015-06-26';
      
                //format it and save to vue data property
                this.date = this.frontEndDateFormat(serverDate);
    },
      frontEndDateFormat: function(date) {
            return moment(date, 'YYYY-MM-DD').format('DD/MM/YYYY');
    },
    callFunction: function () {
   
            var currentDate = new Date();
            console.log(currentDate);
  
            var currentDateWithFormat = new Date().toJSON().slice(0,10).replace(/-/g,'/');
            console.log(currentDateWithFormat);
     
        },
      getSkills(code){

      let page_url = "/api/skill/" + code
      fetch(page_url)
      .then(res => res.json())
      .then(res => {
        // console.log(res.jobskills);
        this.jobskills = res.jobskills;

      })
    },
      getEducationalHistory(code){

      let page_url = "/api/educationalexperience/" + code
      fetch(page_url)
      .then(res => res.json())
      .then(res => {
        //console.log(res.educationaList);
        this.educationaList = res.educationaList;

      })
    },
    handleClick: function(event) {
      console.log(event)


    },
      getUnsortedCount(page_url) { 
    
    page_url = page_url || "/api/unsortedcount/" + this.jobid 

    fetch(page_url)
    .then(res => res.json())
    .then(res => { 
      
      this.sorted_count = res.sorted_count; 
      
      })
      .catch(err => console.log(err));
    },
      getRejectedCount(page_url) { 

    page_url = page_url || "/api/rejectedcount/" + this.jobid

    fetch(page_url)
    .then(res => res.json())
    .then(res => { 

      this.rejected_count = res.rejected_count; 
      
      })
      .catch(err => console.log(err));
    },
    getInReviewCount(page_url) { 

    page_url = page_url || "/api/reviewcount/" + this.jobid

    fetch(page_url)
    .then(res => res.json())
    .then(res => { 

      this.review_count = res.review_count; 
      
      })
      .catch(err => console.log(err));
    },
    getShortlistCount(page_url) { 

    page_url = page_url || "/api/shortlistcount/" + this.jobid

    fetch(page_url)
    .then(res => res.json())
    .then(res => { 

      this.shortlisted_count = res.shortlisted_count; 
      
      })
      .catch(err => console.log(err));
    },
    getOfferedCount(page_url) { 

    page_url = page_url || "/api/offeredcount/" + this.jobid

    fetch(page_url)
    .then(res => res.json())
    .then(res => { 

      this.offered_count = res.offered_count; 
      
      })
      .catch(err => console.log(err));
    },
       getHiredCount(page_url) { 

    page_url = page_url || "/api/hiredcount/" + this.jobid

    fetch(page_url)
    .then(res => res.json())
    .then(res => { 

      this.hired_count = res.hired_count; 
      
      })
      .catch(err => console.log(err));
    },
    updateRejectedData: function(jobid){ 

    this.fetchApplicantsByJobID(); 
    this.getUnsortedCount(); 
     this.getCV(jobid);
    },
    updateReviewData: function(jobid){ 
    this.fetchApplicantsByJobID(); 
    this.getUnsortedCount(); 
    // this.getInReviewCount();
       this.getCV(jobid);
       console.log('Ia m here now');
    
    },
    updateOfferData: function(jobid){ 
    this.fetchApplicantsByJobID(); 
    this.getUnsortedCount(); 
    this.getInReviewCount(); 
    this.getShortlistCount();
    this.getOfferedCount();
    this.getHiredCount(); 
    
    },
    updateShortlistedData: function(jobid){ 
    this.getUnsortedCount(); 
    this.fetchApplicantsByJobID(); 
    this.getInReviewCount();
    this.getShortlistCount();
    this.getOfferedCount();
    this.getHiredCount();    
    },
    updateData: function(jobid){ 

    this.getUnsortedCount(); 
    this.getRejectedCount();
    this.getInReviewCount();
    this.getShortlistCount();
    this.getOfferedCount();
    this.getHiredCount();
    },
updateHireData: function(jobid){ 
    this.fetchApplicantsByJobID(); 
    this.getUnsortedCount(); 
    this.getRejectedCount();
    this.getInReviewCount();
    this.getShortlistCount();
    this.getOfferedCount();
    this.getHiredCount();
    }


  }
 
};
</script>