<template>
	         <div class="careerfy-search-filter-wrap careerfy-search-filter-toggle" style="background-color: #ffffff;">
                                        <h2><a href="#" class="careerfy-click-btn">Location</a></h2>
                                        <div class="careerfy-checkbox-toggle scroll_div" id="job_industry">
                                            <ul class="careerfy-checkbox">
                                  
                                                <li v-for="city in citylist" v-bind:key="city.id">
                                   <input type="checkbox"  name="industry[]" :value="city.id" :id="'c_'+city.id" v-model="citylist"/>
                                   <label :for="'c_'+city.id"><span></span>{{city.name}}</label>
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
			} 
		}
	},
	created() {
	// run automatically
		this.fetchCities(); 
	},
	methods:{
		fetchCities() {
		fetch('/api/cities')
		.then(res => res.json())
		.then(res => {
				this.citylist = res.cities;
			})
			.catch(err => console.log(err));
},

	  job_terms: function (event) {
	  	var location = [];
		var profession = [];
		var job_type = [];
		var industry = [];

      // `this` inside methods points to the Vue instance
      alert('Hello ' + this.name + '!')
      // `event` is the native DOM event
      if (event) {

        alert(event.target.tagName)
      }


    }



	}
 
};
</script>