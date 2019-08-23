<template>

                     <div class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" @click="keepInReview(applicantid)" >
                   
                       <i class="icon-plus"></i> KEEP IN VIEW
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
 
      keepInReview: function(event) {
         //console.log(event)
      let page_url = "/api/addreviewcv/" + event
      fetch(page_url)
      .then(res => res.json())
      .then(res => { 

        this.$emit('reviewResume', this.jobid);  // shows new unsorted applicants list
        bus.$emit('newReviewList', this.jobid); // shows the new review applicants list
      })

 

    } 
  }
 
};
</script>