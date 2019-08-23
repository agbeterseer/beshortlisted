<template>
	 
              <div  class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" @click="shortList(applicantid)" >
                
                           <i class="icon-plus"></i> SHORTLIST
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
 
      shortList: function(event) {
        // console.log(event)
      let page_url = "/api/addshortlist/" + event
      fetch(page_url)
      .then(res => res.json())
      .then(res => {
 
        this.$emit('shortlistResume', this.jobid);  
        bus.$emit('newShortlist', this.jobid); // shows the new rejected applicants list 

      })
    }
  }
 
};
</script>