<template>
    <div class="container">
      <h2>Articles</h2>
          
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
      job_category: '',
      job_type: ''
      },
      industries: [],
      industry_professions: [],
      pagination: {}

    }
  },
  created() {
  // run automatically
    this.fetchJobs();  
  },
  methods:{
    fetchJobs(page_url) {
    page_url = page_url || '/api/jobs'
    fetch(page_url)
    .then(res => res.json())
    .then(res => {
        this.jobs = res.data; 
      })
      .catch(err => console.log(err));
    }
  }
 
}


</script>