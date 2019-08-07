<template>
<div class="container">

          <div class="careerfy-column-8 careerfy-typo-wrap" >

                            <div class="careerfy-typo-wrap" v-for="job in jobs" v-bind:key="job.id">
                                <!-- FilterAble --> 
                                <!-- JobGrid -->
                                <div class="careerfy-job careerfy-joblisting-classic">
                                    <ul class="careerfy-row" >
                                     <li class="careerfy-column-12">
                                            <div class="careerfy-joblisting-classic-wrap">
                                                <figure><a href=""></a></figure>
                                                <div class="careerfy-joblisting-text">
                                                    <div class="careerfy-list-option">
                                                    <h2><a href=""> {{ job.job_title }} </a>  </h2>
                              <ul> 
                            <li >
                               <i class="careerfy-icon careerfy-maps-and-flags"></i> countryname and cityname</li>
                            <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> professionname</li>
                            <li> Industryname</li>
                                                        </ul>
                                                    </div>

                                                    <div class="careerfy-job-userlist"> 
                                                    <a href="" class="careerfy-option-btn  careerfy-blue">APPLY </a>
                                
                                                    </div>
                                                <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
  
                        </div>
                                  <div class="careerfy-pagination-blog">
                                    <ul class="pagination">
                                        <li v-bind:class="[{disabled: !pagination.prev_page_url}]"><a class="prev page-numbers" href="#" @click="fetchJobs(pagination.prev_page_url)"><span><i class="careerfy-icon careerfy-arrows4"></i></span></a></li>
                 <li v-for="n in pagination.last_page" v-bind:key="n" v-bind:class="[{active: !pagination.current_page == n}]" class="page-item"><span  class="page-link" @click="fetchJobs(pagination.path_page + n)">{{ n }} </span></li>
                                            
                                        <li v-bind:class="[{disabled: !pagination.next_link}]" ><span class="next page-numbers"   @click="fetchJobs(pagination.next_link)"><span><i class="careerfy-icon careerfy-arrows4"></i></span></span></li>

 
                                    </ul>

                                </div>
                    </div>
                                                           <!-- Pagination --> 
                      
  
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
      let vm = this;
    page_url = page_url || '/api/jobs'
    fetch(page_url)
    .then(res => res.json())
    .then(res => {
        this.jobs = res.data;  
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
      console.log(pagination.last_page)
      this.pagination = pagination;
    }

  }
 
 
};

 


</script>