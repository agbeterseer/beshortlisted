<template>
<div>
         
   <!-- <div class="careerfy-candidate-default-wrap">   -->
   
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
            <applicants v-bind:jobid="job_id"></applicants>  
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
                                              <div class="tab-pane active" id="tab_6_1">
 

                                                            {{ unsortedapplicant }}
                                                   <div class="col-md-12 cv_content" >


                    <div id="savedescription" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >

                        <i class="icon-plus"></i> REJECT
                    </div>
                                   
                     <div id="" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                   
                                  <i class="icon-plus"></i> KEEP IN VIEW
                    </div>
 
                 <div id="" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                
                           <i class="icon-plus"></i> SHORTLIST
                    </div> 

                  <div id="offered" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >
                    
                             <i class="icon-plus"></i> OFFER
                    </div>
            <div id="hire" class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" >

                          <i class="icon-plus"></i> HIRE
                    </div>
              <div id="hire" class="btn  mt-ladda-btn mini_header" data-toggle="collapse" data-target="#expand_unsorted" >
                   
                       <i class="careerfy-icon careerfy-sort"></i> Sort
                    </div>
                     <div class="space">&nbsp;</div> 

                                </div>
                                               <h2>Filter</h2>

                                          <div class="careerfy-employer-confitmation">
                                          <div align="center">   <img :src="'/img/NoRecordFound.png'" height="300" width="300" alt="" align="center"></div>
                                          <div class="clearfix"></div>
                                          </div>


                                                 </div>                   
 
                                                </div>
                                            </div>
                              <!--  load_unsorted_cv -->
                         </div>
 

              


            
</template>



<script>


 export default {
props: ['jobid', 'unsortedapplicant'],
    mounted () {
        this.jobid = ''
        // Do something useful with the data in the template
       
    
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
      work_histories: [],
      educationaList: [],
      citylist: [],
      city:{
      	id: '',
      	name: ''
      },		
		industryprofessions: [],
		industry_profession: {
		id: '',
		name: ''
		},
      checkedCities: [],
      pagination: {}

    }
  },
  created() {
  // run automatically 
    //this.fetchApplicantsByJobID(); 
    //this.fetchCities();
  },
  methods:{

    fetchApplicantsByJobID(page_url) {
      let vm = this;
    page_url = page_url || "/api/job/applicants/" + this.jobid
    // let url = "/api/job/applicants/" + this.job_id;
      
    fetch(page_url)
    .then(res => res.json())
    .then(res => {
     // console.log(res.data);

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
    fetchCities() {
		fetch('/api/cities')
		.then(res => res.json())
		.then(res => {
			
				this.citylist = res.cities;
			})
			.catch(err => console.log(err));
	},
	fetchIndustryProfession() {
		fetch('/api/industryprofessions')
		.then(res => res.json())
		.then(res => {
				this.industryprofessions = res.industry_professions;
			})
			.catch(err => console.log(err));
		},
		rejectCV(id){
    	//console.log();
		url = '/api/job/rejectcv/' + id
    	fetch(url)
    	.then(res => res.json())
    	.then(res => {
    		alert('CV Rjected');
 			this.fetchApplicantsByJobID(); 
    	})
    	.catch(err => console.log(err));
    } 
  }
 
};
</script>