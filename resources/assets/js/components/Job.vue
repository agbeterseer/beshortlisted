<template>
    <div class="container">
      <h2>Articles</h2>
      <form @submit.prevent="addArticle" class="mb-3">
        <div class="form-group"> 
          <input type="text" class="form-control" placeholder="Title" v-model="job.job_title">
        </div>
               <div class="form-group">
          <textarea class="form-control" placeholder="Body" v-model="job.description"> 
          </textarea>
          </div>
       
        <button type="submit" class="btn btn-light btn-block">Save</button>
      </form>
      <nav aria-label="Page navigation example">
  <ul class="pagination">
       <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#"
       @click="fetchJobs(pagination.prev_page_url)">Previous</a></li>

       <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>

       <li v-bind:class="[{disabled: !pagination.next_page_url}]"  class="page-item"><a class="page-link" href="#" @click="fetchJobs(pagination.next_page_url)">Next</a></li>
  </ul>
</nav>
      <div class="card card-body mb-2" v-for="job in jobs" v-bind:key="job.id">
        <h3>{{ job.job_title}}</h3>
        <p> {{ job.body }}</p>
        <hr>
        <button @click="editArticle(job)" class="btn btn-warning mb-2">Edit </button>
        <button @click="deleteArticle(job.id)" class="btn btn-danger">Delete </button>
      </div>

    </div>
 



</template>
<script>
export default{
  data() {
    return {
      jobs: [],
      job: {
        id: '',
        job_title: '',
        description: ''
      },
      job_id: '',
      pagination: {},
      edit: false
    }
  },
  created() {
    this.fetchJobs();
  },
  methods: {
    fetchJobs(page_url){
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
        prev_page_url: links.prev
      }
      this.pagination = pagination;
    },
    deleteJob(id){
      if(confirm('Are You Sure?')){
        fetch(`api/job/${id}`, {
        method: 'delete'
        })
        .then(res => res.json())
        .then(data => {
        alert('Job Removed');
        this.fetchJobs();
        })
        .catch(err => console.log(err))
      }
    },
    addJob() {
      if(this.edit === false) {
        // Add
        fetch('api/job', {
        method: 'post',
        body: JSON.stringify(this.job),
        headers: {
        'content-type': 'application/json'
        }
        })
        .then(res => res.json())
        .then(data => {
        this.job.job_title = '';
        this.job.description = '';
        alert('Job Added');
        this.fetchJobs();
        })
        .catch(err => console.log(err));
      }else{
      // update
        fetch('api/job', {
        method: 'put',
        body: JSON.stringify(this.job),
        headers: {
        'content-type': 'application/json'
        }
        })
        .then(res => res.json())
        .then(data => {
        this.job.job_title = '';
        this.job.description = '';
        alert('Job Updated');
        this.fetchJobs();
        })
        .catch(err => console.log(err));
      }
    },
    editJob(job) {
      this.edit = true;
      this.job.id = job.id;
      this.job.job_id = job.id;
      this.job.job_title = job.job_title;
      this.job.body = job.description;
    }
  }
};


</script>