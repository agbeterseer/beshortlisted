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
 
			industryprofessions: [],
			industry_profession: {
			id: '',
			name: ''
			}
			 
		}
	},
	created() {
	// run automatically 
		this.fetchIndustryProfession(); 
	},
	methods:{
		 
			fetchIndustryProfession() {
		fetch('/api/industryprofessions')
		.then(res => res.json())
		.then(res => {
				this.industryprofessions = res.industry_professions;
			})
			.catch(err => console.log(err));
		} 
		
	}
 
};
</script>