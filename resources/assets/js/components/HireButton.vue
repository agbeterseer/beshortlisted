<template>
	 
              <div  class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" @click="hireCV(applicantid)" >
            <i class="icon-plus"></i> Hire
          </div>                                  
 </template>

<script>

import { bus } from '../app';

 export default { 
props: ['applicantid', 'jobid'],
    mounted () {
        // Do something useful with the data in the template
       
    },
  data() {
    return {
       
     
    }
  },
  created() {
  // run automatically 
 
  },
  methods:{

      hireCV: function(event) {
      let page_url = "/api/addhire/" + event
      fetch(page_url)
      .then(res => res.json())
      .then(res => {})
 
        this.$emit('hireResume', this.jobid);  // shows new unsorted applicants list
        bus.$emit('newHireList', this.jobid); // shows the new rejected applicants list 
    }
  }
 
};
</script>