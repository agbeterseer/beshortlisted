            <template>
    <div class="container">
      <h2>Find a job</h2>
  
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
                           <div class="careerfy-select-style"  v-model="industryprofessions.name">
                                    <select name="job_function" >
                                    <option value="">Select Job Function</option> 
               <option v-for="industry_profession in industryprofessions" v-bind:value="industry_profession.id"> 
               {{ industry_profession.name }} </option> 
                                    
                                    </select>
                                </div>
                               
                            </li>
                            <li>
                               <div class="careerfy-select-style">
                                    <select name="s">
                                    <option value="">Select Industry</option>
                                                                
                                   <option v-for="industry in industries" v-bind:value="industry.id"> {{ industry.name }} </option> 
                                    
                                    </select>
                                    </option> 
                                       
                                    </select>
                                </div>

                            </li>
                            <li class="careerfy-banner-submit"> <input type="submit" value="Find"> <i class="careerfy-icon careerfy-search"></i> </li>
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
      industry: {
      id: '',
      name: ''
      },
      industryprofessions: [],
      industry_profession: {
      id: '',
      name: ''
      }

    }
  },
  created() {
  // run automatically
    this.fetchCities(); 
    this.fetchIndustries();
    this.fetchIndustryProfession();
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
    },
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
