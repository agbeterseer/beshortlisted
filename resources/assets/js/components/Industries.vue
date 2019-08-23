<template>

	   <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle" style="background-color: #ffffff;">
                                        <h2><a href="#" class="careerfy-click-btn">Industries</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="job_industry">
                                       <ul class="careerfy-checkbox">
                                  
                      <li v-for="industry in industries">

  <input type="checkbox"  :value="industry.id"  :id="'r_'+industry.id" v-model="checkedNames"/> 
        <label :for="'r_'+industry.id"><span></span>{{industry.name}}</label>
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
			industries: [],
			industry: {
			id: '',
			name: ''
			},
			checkedNames: [] 
		}
	},
	created() {
	// run automatically 
		this.fetchIndustries(); 
	},
	methods:{
 
		fetchIndustries() {
		fetch('/api/industries')
		.then(res => res.json())
		.then(res => {
				this.industries = res.industries;
			})
			.catch(err => console.log(err));
		}
		// check: function(e) {
  //     if (e.target.checked) {
  //       console.log(e.target.value)
  //     }
  //   }
	}
 
};
</script>