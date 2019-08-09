<template>

                                    
	   <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle" style="background-color: #ffffff;">
                                        <h2><a href="#" class="careerfy-click-btn">Job Function</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="job_profession">
                                            <ul class="careerfy-checkbox">
                                  
    <li v-for="industry_profession in industryprofessions" v-bind:key="industry_profession.id">
        <input type="checkbox"  name="industry[]" :value="industry_profession.id" :id="'c_'+industry_profession.id"/>
        <label :for="'c_'+industry_profession.id"><span></span>{{industry_profession.name}}</label>
        <small></small>
       </li>
                                          
                                            </ul> 
                                        </div>
                                    </div>

 
  
</template>

<script>
 export default {
	data() {
		return {
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
		}
	},
	created() {
	// run automatically 
		this.fetchIndustryProfession(); 
		this.fetchIndustries();
		this.fetchCities();
		this.fetchVacancyTypes();
	},
	methods:{
		 
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
		} 
		
	}
 
};
</script>