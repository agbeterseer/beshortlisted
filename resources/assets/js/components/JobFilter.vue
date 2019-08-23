<template>                               
 
         <div class="careerfy-main-section">
                <div class="container">
                    <div class="row"> 
                     <aside class="careerfy-column-4 careerfy-typo-wrap"  >
                        <div class="careerfy-typo-wrap" >
                            <form class="careerfy-search-filter"> 
                           <!-- filters -->
         	         <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle" style="background-color: #ffffff;">
                                        <h2><a href="#" class="careerfy-click-btn">Location</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="job_industry">
                                            <ul class="careerfy-checkbox">
                                  
                                                <li v-for="city in citylist" v-bind:key="city.id">
                                   <input type="checkbox"  name="industry[]" :value="city.id" :id="'c_'+city.id" v-model="checkedCities"/>
                                   <label :for="'c_'+city.id"><span></span>{{city.name}}</label>
                                                    <small></small>
                                                </li> 
                                            </ul> 
                                        </div>
                                    </div> 
        	         <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle" style="background-color: #ffffff;">
                                        <h2><a href="#" class="careerfy-click-btn">Vacancy Type</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="job_terms">
                                            <ul class="careerfy-checkbox">
                                  
        <li v-for="employement_term in employement_term_list" v-bind:key="employement_term.id">
        <input type="checkbox"  name="employement_term[]" :value="employement_term.id" :id="'v_'+employement_term.id" v-model="filter"/>
        <label :for="'v_'+employement_term.id"><span></span>{{employement_term.name}}</label>
                                                    <small></small>
                                                </li>
                                          
                                            </ul> 
                                        </div>
                                    </div> 

	   <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle" style="background-color: #ffffff;">
                                        <h2><a href="#" class="careerfy-click-btn">Job Function</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="job_profession">
                                            <ul class="careerfy-checkbox">
                                  
    <li v-for="industry_profession in industryprofessions" v-bind:key="industry_profession.id">
        <input type="checkbox"  name="industry_professions[]" :value="industry_profession.id" :id="'c_'+industry_profession.id" v-model="filter"/>
        <label :for="'c_'+industry_profession.id"><span></span>{{industry_profession.name}}</label>
        <small></small>
       </li>
                                          
                                            </ul> 
                                        </div>
                                    </div>
	   <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle" style="background-color: #ffffff;">
                                        <h2><a href="#" class="careerfy-click-btn">Industries</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="job_industry">
                                       <ul class="careerfy-checkbox">
                                  
                      <li v-for="industry in industries">

  <input type="checkbox"  :value="industry.id" name="industry[]"  :id="'r_'+industry.id" v-model="checkedIndustries" @click="filterIndustries(industry.id)" /> 
        <label :for="'r_'+industry.id"><span></span>{{industry.name}}</label>
                                                    <small></small> 
                       </li>
                       
                                            
                                            </ul> 
                                        </div>
                                    </div> 
                            </form> 
                        </div> 
                    </aside> 
 
 <!-- Search result -->
            <div class="careerfy-column-8 careerfy-typo-wrap" >

                            <div class="careerfy-typo-wrap" v-for="job in jobs" v-bind:key="job.id">
                                <!-- FilterAble --> 
                                <!-- JobGrid -->
                                <div class="careerfy-job careerfy-joblisting-classic">
                                    <ul class="careerfy-row" >
                                     <li class="careerfy-column-12">
                                            <div class="careerfy-joblisting-classic-wrap">
                                                <figure><a v-bind:href="'/job/job-descriptions/' + job.id " ><img v-bind:src="'/img/job.png'" /> </a></figure>
                                                <div class="careerfy-joblisting-text">
                                                    <div class="careerfy-list-option">
                                                    <h2><a href=""> {{ job.job_title }} </a>  </h2>
                              <ul> 
                            <li style="color: #F1630D">
                             <i class="careerfy-icon careerfy-maps-and-flags"></i> <strong>Apply Before:</strong> : {{ job.end_date }} </li> 
                            <li> <i class="careerfy-icon careerfy-filter-tool-black-shape"></i>
                              <span v-for="industry in industries" v-bind:key="industry.id">
                                <span v-if="industry.id === job.industry">
                                  {{ industry.name }} 
                                </span>
                            
                            </span>
                            </li>
                           </ul>
                          </div>
 
                          <div class="careerfy-job-userlist" >   
                          <a v-bind:href="'/job/job-descriptions/' + job.id " class="careerfy-option-btn  careerfy-blue">APPLY </a>

                          </div>
                                                <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
  
                        </div>
                                  <div class="careerfy-pagination-blog">
                                    <ul class="pagination">
                                        <li v-bind:class="[{disabled: !pagination.prev_page_url}]"><a class="prev page-numbers" href="#" @click="fetchJobs(pagination.prev_page_url)"><span><i class="careerfy-icon careerfy-arrows4"></i></span></a></li>
                 <li v-for="n in pagination.last_page" v-bind:key="n" v-bind:class="[{active: !pagination.current_page == n}]" class="page-item"><span  class="page-link" @click="fetchJobs(pagination.path_page + n)">{{ n }} </span></li>
                                            
                                        <li v-bind:class="[{disabled: !pagination.next_link}]" ><span class="next page-numbers" @click="fetchJobs(pagination.next_link)"><span><i class="careerfy-icon careerfy-arrows4"></i></span></span></li>

 
                                    </ul>

                                </div>
                    </div>
       
 <!-- Search result --> 
                    </div>
                </div>
        </div>
        
</template>

<script>
 export default {
	data() {
		return {
			jobs: [],
			job: {
			id: '',
			job_title: '',
			country: '',
			city: '',
			end_date: '',
			job_category: '',
			job_type: '',
			industry: ''
			},
 			citylist: [],
			city: {
			id: '',
			name: ''
			},
			industryprofessions: [],
			industry_profession: {
			id: '',
			name: ''
			},
			employement_term_list: [],
			employement_term: {
			id: '',
			name: ''
			},
		 	industries: [],
			industry: {
			id: '',
			name: ''
			},
			pagination: {},
			filter:[],
			checkedCities: [],
			checkedIndustries: [],
			filterJob: { 
    			Ckeckedindustries: []
			}
		}
	},
	created() {
	// run automatically 
		this.fetchIndustryProfession(); 
		this.fetchIndustries();
		this.fetchCities();
		this.fetchVacancyTypes();
		this.fetchJobs();
	},
	computed: {
		filteredJobs: function(){
			return this.jobs.filter((job) => {
				return job.job_title.match(this.job)
			});
		}

	},
	methods:{
 
	fetchJobs(page_url) { 
      let vm = this;
    page_url = page_url || '/api/jobs'
    fetch(page_url)
    .then(res => res.json())
    .then(res => {
        this.jobs = res.data; 
   
        vm.makePagination(res.meta, res.links);
        console.log(res.links);
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
    fetchIndustryProfession() {
		fetch('/api/industryprofessions')
		.then(res => res.json())
		.then(res => {
				this.industryprofessions = res.industry_professions;
			})
			.catch(err => console.log(err));
		},
		fetchIndustries() {
		fetch('/api/industries')
		.then(res => res.json())
		.then(res => {
				this.industries = res.industries;
			})
			.catch(err => console.log(err));
		},
		check: function(e) {
      if (e.target.checked) {
        console.log(e.target.value)
      }
    },
		fetchCities() {
		fetch('/api/cities')
		.then(res => res.json())
		.then(res => {
			console.log(res.cities);
				this.citylist = res.cities;
			})
			.catch(err => console.log(err));
		},
		fetchVacancyTypes() { 
		fetch('/api/vacancytypes')
		.then(res => res.json())
		.then(res => {
				this.employement_term_list = res.employement_term_list;
			})
			.catch(err => console.log(err));
		},
		cityfilter: function (city_id) {
				// console.log(city_id);
				console.log(checkedCities);
			// if(city_id.target.checked){ 
			// 	console.log(e.target.value);

			// }

		},


		filterIndustries: function (industry_id) { 
			var industryList = [];
			var location = [];
			var profession = [];
			var job_type = [];
			var industry_id = [];

		function itemExistsChecker(cboxValue) {
		          
		    var len = industry_id.length; 
		    if (len > 0) {
		      for (var i = 0; i < len; i++) {
		        if (industry_id[i] == cboxValue) {
		          return true;
		        }
		      }
		    }
		          
		    industry_id.push(cboxValue);
		  }
		    {
		    	
		    $('#job_industry :checked').each(function() { 
		     var cboxValue = $(this).val(); 
		      $(this).prop('checked', true);
		      itemExistsChecker(cboxValue); 
		    }); 
		    
		  console.log(industry_id); 
	 
	    console.log(industry_id); 	

    	// fetch(`/api/industry/${industry_id}`)
		fetch('/api/industry/', {
			method: 'POST',
			body: JSON.stringify(this.filterJob),
			headers: {
			'content-type': 'application/json'
			}
		})
		.then(res => res.json())
		.then(res => {
			console.log(res.jobs);
				this.tags = res.jobs;
			})
    		.catch(err => console.log(err));
     

		  } 
    }


		
	}

 
};
</script>