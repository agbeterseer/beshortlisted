<template>
	 
                    <div class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" @click="rejectCV(applicantid)"   >

                        <i class="icon-plus"></i> REJECT
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
 
      rejectCV: function(event) {
      
      let page_url = "/api/addrejectcv/" + event
      fetch(page_url)
      .then(res => res.json())
      .then(res => {
        this.$emit('rejectResume', this.jobid);  // shows new unsorted applicants list
        bus.$emit('newRejectedList', this.jobid); // shows the new rejected applicants list 
        
      })
 

    }
  }
 
};
</script>