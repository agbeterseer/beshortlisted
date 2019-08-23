<template>
 
            <div  class="btn blue mt-ladda-btn careerfy-employer-profile-submit mini_header" @click="offerCV(applicantid)" >
                
                           <i class="icon-plus"></i> OFFER
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
 
      offerCV: function(event) {
      //console.log(event)
      let page_url = "/api/addoffer/" + event
      fetch(page_url)
      .then(res => res.json())
      .then(res => {
        this.$emit('offerResume', this.jobid);  // shows new unsorted applicants list
        bus.$emit('newOffereList', this.jobid); // shows the new rejected applicants list 
      })
 

    } 
  }
 
};
</script>