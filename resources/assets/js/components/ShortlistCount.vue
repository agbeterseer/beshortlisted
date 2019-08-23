<template>
	
   <ul class="nav nav-tabs">
                                        <li class="active">
                                        <a href="#tab_01" data-toggle="tab">UNSORTED  &nbsp;<span class="badge"> <div id="sorted_count">{{sorted_count}}</div></span> </a>
                                        </li>
                                        <li>
                                      <a href="#tab_11" data-toggle="tab">REJECTED &nbsp;<span class="badge"> 
                                      <div id="reject_count">{{rejected_count}}</div></span></a>
                                        </li>
                                        <li>
                                            <a href="#tab_12" data-toggle="tab"> IN REVIEW &nbsp;<span class="badge"><div id="review_count">{{review_count}}</div> </span></a>
                                        </li>
                                        <li>
                                            <a href="#tab_13" data-toggle="tab">SHORTLISTED &nbsp;<span class="badge">
                                            <div id="shortlist_count">{{shortlisted_count}}</div></span></a>
                                        </li> 

                                         <li>
                                            <a href="#tab_14" data-toggle="tab">OFFERED &nbsp;<span class="badge">
                                            <div id="offered_count">{{offered_count}}</div></span></a>
                                        </li> 
                                        <li>
                                            <a href="#tab_15" data-toggle="tab">HIRED &nbsp;<span class="badge"><div id="hired_count">{{hired_count}}</div></span></a>
                                        </li> 
                                        <li>
                                        <a href="#tab_16" data-toggle="tab">AUTOMATCH &nbsp;<span class="badge"><div id="auto_count">0</div></span></a> 
                                        </li>
                                    </ul>

</template>

<script>

import { bus } from '../app';

 export default { 

props: ['jobid'],
    mounted () {
        // Do something useful with the data in the template
        
    },
  data() {
    return {
      sorted_count: '',
      rejected_count: '',
      review_count: '',
      shortlisted_count: '',
      offered_count: '',
      hired_count: '',
      pagination: {} 
    }
  },
  created() {
  // run automatically 
    this.getUnsortedCount(); 
    this.getRejectedCount();
    this.getInReviewCount();
    this.getShortlistCount();
    this.getOfferedCount();
    this.getHiredCount();


    bus.$on('newShortlist', (data) => { 
    this.getUnsortedCount(); 
    this.getShortlistCount();

    })

    bus.$on('newReviewList', (data) => { 
    this.getUnsortedCount(); 
    this.getInReviewCount();

    })


    bus.$on('newRejectedList', (data) => { 
    this.getUnsortedCount(); 
    this.getRejectedCount();
    })

    bus.$on('newOffereList', (data) => { 
    this.getUnsortedCount(); 
    this.getOfferedCount();
    })
    
    bus.$on('newHireList', (data) => { 
    this.getUnsortedCount(); 
    this.getHiredCount();
    })
    
  },
  methods:{

  getUnsortedCount(page_url) { 
    
    page_url = page_url || "/api/unsortedcount/" + this.jobid 

    fetch(page_url)
    .then(res => res.json())
    .then(res => { 
      
      this.sorted_count = res.sorted_count; 
      
      })
      .catch(err => console.log(err));
    },
      getRejectedCount(page_url) { 

    page_url = page_url || "/api/rejectedcount/" + this.jobid

    fetch(page_url)
    .then(res => res.json())
    .then(res => { 

      this.rejected_count = res.rejected_count; 
      
      })
      .catch(err => console.log(err));
    },
    getInReviewCount(page_url) { 

    page_url = page_url || "/api/reviewcount/" + this.jobid

    fetch(page_url)
    .then(res => res.json())
    .then(res => { 

      this.review_count = res.review_count; 
      
      })
      .catch(err => console.log(err));
    },
    getShortlistCount(page_url) { 

    page_url = page_url || "/api/shortlistcount/" + this.jobid

    fetch(page_url)
    .then(res => res.json())
    .then(res => { 

      this.shortlisted_count = res.shortlisted_count; 
      
      })
      .catch(err => console.log(err));
    },
    getOfferedCount(page_url) { 

    page_url = page_url || "/api/offeredcount/" + this.jobid

    fetch(page_url)
    .then(res => res.json())
    .then(res => { 

      this.offered_count = res.offered_count; 
      
      })
      .catch(err => console.log(err));
    },
       getHiredCount(page_url) { 

    page_url = page_url || "/api/hiredcount/" + this.jobid

    fetch(page_url)
    .then(res => res.json())
    .then(res => { 

      this.hired_count = res.hired_count; 
      
      })
      .catch(err => console.log(err));
    },
 
  }
 
};
</script>