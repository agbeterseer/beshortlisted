<template>
{{ applicantid }}
 <div v-if="applicantid">
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
<span class="detail highlightable"><strong> {{ applicant.nationality }}</strong></span>
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
<span class="detail highlightable"><strong> {{ applicant.educational_level }} </strong></span>
</div>

 <div class="overviewtitle2">
<span class="ovtitle">Employment Terms:</span>
<span class="detail highlightable"><strong> {{ applicant.d_employment_term }}</strong></span>
</div>
 <div class="overviewtitle2">
<span class="ovtitle">Career Level:</span>
<span class="detail highlightable"><strong> {{ applicant.career_level }}  </strong></span>
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
<h4><i class="careerfy-icon careerfy-design-skills"></i>Specialties and Skills</h4>
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
<h4> <i class="careerfy-icon careerfy-mortarboard"></i>Educational History </h4>
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
<span class="highlightable"> Graduation period</span>
 
</div>

<div class="overviewtitle2">
<span class="ovtitle">School</span>
<span class="highlightable">
{{ educational.school_name }}
 </span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Country</span>
<span class="highlightable"> {{ educational.country }} </span>
</div>

</div>

</div>
</div>


 
<div class="space">&nbsp;</div>
<div class="col-md-12 cv_content">
<div class="pageactionIn" id="work_history_topsection">
<div class="title4">
 
<h4> <i class="careerfy-icon careerfy-social-media"></i>Work History</h4>
</div>
 
 
<div class="workhistory_inner several2" v-for="work_history in work_histories">

<div class="overviewtitle2">
<span class="ovtitle">Position Title</span>
<span class="highlightable"><strong> {{ work_history.position_title }}  </strong></span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Employment period</span>
<span class="highlightable">Employment period </span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Company</span>
<span class="highlightable">{{ work_history.company_name }}</span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Country</span>
<span class="highlightable">  {{ work_history.country }} </span>
</div>


<div class="overviewtitle2">
<span class="ovtitle">Industry</span>
<span class="highlightable">  {{ work_history.industries }} Industry</span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Position Type</span>
<span class="highlightable"> {{ work_history.industryprofessions }} Position Type</span>
</div>

<div class="overviewtitle2">
<span class="ovtitle">Position Description</span>
<span class="job_description detail highlightable">
 {!! work_history.responsibilities !!} </span>
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
</div>

 <div v-else>
 <nocontent></nocontent>
 </div>

 
</template>

<script>
 
import { bus } from '../app';
import NoContent from './NoContent.vue'; 

export default {

 props: ['jobid', 'applicantid'],

   components: {
        'nocontent': NoContent
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
      }

    }
  },
  created() {
  // run automatically
  // listening to the event through a live cicle hook
  // this firs when the conponent is first created
    bus.$on('displayRejectedCV', (data) => { 
          
          console.log(data);

    //this.getCareerObjectives(data);


    })
  },
  methods:{
 	getCareerObjectives(code){

      let page_url = "/api/objective/" + code
      fetch(page_url)
      .then(res => res.json())
      .then(res => {

        this.objective = res.objective;
         this.jobskills = res.jobskills;
        this.educationaList = res.educationaList;
        this.work_histories = res.work_histories;
        this.jobcertifications = res.jobcertifications;
        this.person_info_list = res.person_info_list;
        this.applicant = res.applicant;

        console.log(this.person_info_list);

      })
    }


  }
 
 
};

  
</script>