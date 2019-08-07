<template>
	         <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle" style="background-color: #ffffff;">
                                        <h2><a href="#" class="careerfy-click-btn">Vacancy Type</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="job_terms">
                                            <ul class="careerfy-checkbox">
                                  
        <li v-for="employement_term in employement_term_list" v-bind:key="employement_term.id">
        <input type="checkbox"  name="employement_term[]" :value="employement_term.id" :id="'v_'+employement_term.id" />
        <label :for="'v_'+employement_term.id"><span></span>{{employement_term.name}}</label>
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
			employement_term_list: [],
			employement_term: {
			id: '',
			name: ''
			},
			pagination: {} 
		}
	},
	created() {
	// run automatically
		this.fetchVacancyTypes(); 
	},
	methods:{
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