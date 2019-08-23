<template>
	
    <div class="row" :id="'sendEmailStatus'+applicantid">
     <form @submit.prevent="pushEmail" class="mb-3">

<div class="space"></div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-body settings-block">
 <div class="space">&nbsp;</div> 
   <div class="form-group">
              
            <input type="text" v-model="applicant.title" class="form-control" required="required"> 
            <small class="text-danger"> </small>
          </div>
 <div class="space">&nbsp;</div> 
          <div class="form-group">
           
         <textarea v-model="applicant.body" class="form-control" required="required"></textarea> 
            <small class="text-danger"> </small>
          </div>
    <div class="space">&nbsp;</div> 
       <button class="btn blue mt-ladda-btn ladda-button btn-outline btn-block" :id="'sendEmail'+applicantid">Send Email</button>
  
        </div>
      </div>
    </div>
  </div>
  </form>  
        
        </div>
</template>

<script>
export default {
	data(){
		return{

			applicant: {
				id: '',
				title: '',
				body: ''
			},
			applicant_id: ''

		}
	},
	created(){

	},
	methods: {
	pushEmail() {
		 
				// Add
				fetch('api/article', {
				method: 'post',
				body: JSON.stringify(this.applicant),
				headers: {
				'content-type': 'application/json'
				}
				})
				.then(res => res.json())
				.then(data => {
				this.applicant.title = '';
				this.applicant.body = '';
				alert('Email Sent');
				//this.fetchArticles();
				})
				.catch(err => console.log(err));
		 
		}
	}
};	

</script>