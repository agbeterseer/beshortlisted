<template>
    <div class="container">
      <h2>Articles</h2>
  
        <form class="careerfy-banner-search"  method="GET">
                     
                      <ul>
                         <li>
                                 <div class="careerfy-select-style"  v-model="citylist.name">
                                    <select name="job_function" >
                                    <option value="">Select City</option> 
                                  <option v-for="city in citylist" v-bind:value="city.id"> {{ city.name }} </option> 
                                    
                                    </select>
                                </div> 
                            </li>
                            <li>
                           <div class="careerfy-select-style"  v-model="industries.name">
                                    <select name="job_function" >
                                    <option value="">Select Job Function</option> 
                                  <option v-for="industry in industries" v-bind:value="industry.id"> {{ industry.name }} </option> 
                                    
                                    </select>
                                </div>
                               
                            </li>
                            <li>
                               <div class="careerfy-select-style">
                                    <select name="s">
                                    <option value="">Select Industry</option>
                                                                
                                    <option value="ID"> <div style="width: 50px;"> Name </div>
                                    </option> 
                                       
                                    </select>
                                </div>

                            </li>
                            <li class="careerfy-banner-submit"> <input type="submit" value=""> <i class="careerfy-icon careerfy-search"></i> </li>
                        </ul>

                    </form>

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
      industries: [],
      industry_professions: [],

    }
  },
  created() {
  // run automatically
    this.fetchCities(); 
    this.fetchIndustries();
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
     
    fetchIndustries() {
    fetch('/api/industries')
    .then(res => res.json())
    .then(res => {
        this.industries = res.industries;
      })
      .catch(err => console.log(err));
    }
 


  }
 
};


</script>
