<template>
	
<div>
	  <ul class="careerfy-row nav-tabs tabs-left" id="reject_section">

<li class="careerfy-column-12 " v-for="reject in rejectedapplicants" v-bind:key="reject.id"  v-on:click="getRejectedCV(reject.id)">
 
 <a v-bind:href="'#tab_6_1' + reject.id" data-toggle="tab">
                                          

                                            <div class="careerfy-candidate-default-wrap butt"> 
                                                <figure> 
                                        <img v-bind:src="'/uploads/avatars/' + reject.avatar"  />
                                               </figure> 
                                                <div class="careerfy-candidate-default-text">
                                                    <div class="careerfy-candidate-default-left">
                                                        <h2>
                                                        {{ reject.candidates_name}}
                                                        <i class="careerfy-icon careerfy-check-mark"></i></h2>
                                                        <ul class="careerfy-column-12" >

                                                        <!-- to get work experience; get job_id from application table and resume_id, then goto workexperience table and find by resume_id and job_id  -->
                                                  
                                                            <li> {{ reject.city_id}} <span href="#" class="careerfy-candidate-default-studio">
                                                                {{ reject.email}}
                                                            </span></li>
                                                    
                                                        </ul>
                                                    </div>
                                              <!--       <a href="#" class="careerfy-candidate-default-btn"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a> -->
                                                </div>
                                            </div>

                                             </a>   
                                        </li> 
                                        <p>
                                            <br>
                                        </p>
  
 
<!-- <li class="careerfy-column-12"> No Record(s) Found</li> -->
 


                             </ul>

                                  <div class="careerfy-pagination-blog">
                                    <ul class="pagination">
<li v-bind:class="[{disabled: !pagination.prev_page_url}]"><a class="prev page-numbers" href="#" @click="fetchRejectedByJobID(pagination.prev_page_url)"><span><i class="careerfy-icon careerfy-arrows4"></i></span></a></li>
<li v-for="n in pagination.last_page" v-bind:key="n" v-bind:class="[{active: pagination.current_page == n}]" class="page-item"><span  class="page-link" @click="fetchRejectedByJobID(pagination.path_page + n)">{{ n }} </span></li>
                                            
<li v-bind:class="[{disabled: !pagination.next_link}]" ><span class="next page-numbers" @click="fetchRejectedByJobID(pagination.next_link)"><span><i class="careerfy-icon careerfy-arrows4"></i></span></span></li>

                                    </ul>
                                </div>
</div>



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
      rejectedapplicants: [],
      reject: {
        id: '',
        document_id: '',
        user_id: '',
        resume_id: '',
        email: '',
        phone_number:'' 

      },
      pagination: {} 
    }
  },
  created() {
  // run automatically 
    this.fetchRejectedByJobID(); 

    bus.$on('newRejectedList', (data) => {
   
      this.fetchRejectedByJobID();
    })
  },
  methods:{

    fetchRejectedByJobID(page_url) {
      let vm = this;
    page_url = page_url || "/api/job/getrejectedapplicants/" + this.jobid 
      
    fetch(page_url)
    .then(res => res.json())
    .then(res => {
     // console.log(res.data);

      this.rejectedapplicants = res.data;
     // console.log(this.rejectedapplicants); 

      vm.makePagination(res.meta, res.links);

      })
      .catch(err => console.log(err));
    },
     makePagination(meta, links){
      let pagination = {
      current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev,
        from_page: meta.from,
        to_page: meta.to,
        total_page: meta.total,
        path_page: meta.path+'?page=',
        first_link: links.first,
        last_link: links.last,
        prev_link: links.prev,
        next_link: links.next
      } 
      this.pagination = pagination;
    },
    getCV(event){

      // alert('Hello ' + event + ' - ' + this.jobid +'!')
      let page_url = "/api/singlecv/" + event
      fetch(page_url)
      .then(res => res.json())
      .then(res => {
  
        this.applicant = res.get_single_cv;

      })
     
   
    },
    getRejectedCV: function(data) {

       
        bus.$emit('displayRejectedCV', data); // shows the new rejected applicants list 

    }


  }
 
};
</script>