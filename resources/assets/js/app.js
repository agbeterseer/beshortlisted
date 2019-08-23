
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('navbar', require('./components/Navbar.vue')); 
Vue.component('jobs', require('./components/Job.vue'));
Vue.component('searchbar', require('./components/SearchBar.vue'));
Vue.component('listjobs', require('./components/ListJob.vue'));
Vue.component('industries', require('./components/Industries.vue'));
Vue.component('listcities', require('./components/ListCity.vue'));
Vue.component('jobfunctions', require('./components/JobFunctions.vue'));
Vue.component('vacancytypes', require('./components/VacancyType.vue')); 
Vue.component('jobfilter', require('./components/JobFilter.vue'));
Vue.component('applicants', require('./components/App.vue'));
Vue.component('applicantscv', require('./components/UnsortedCV.vue'));
Vue.component('nocontent', require('./components/NoContent.vue'));
Vue.component('unsortedfilter', require('./components/Unsortedfilter'));
Vue.component('shortlistcount', require('./components/ShortlistCount'));
Vue.component('rejected', require('./components/Rejected')); 
Vue.component('reviewapplicants', require('./components/Review'));
Vue.component('shortlisted', require('./components/Shortlisted'));
Vue.component('offered', require('./components/Offered'));
Vue.component('hired', require('./components/Hire'));

Vue.component('rejectbutton', require('./components/RejectButton'));
Vue.component('reviewbutton', require('./components/ReviewButton'));
Vue.component('offerbutton', require('./components/OfferedButton'));
Vue.component('shortlistbutton', require('./components/ShortlistButton'));
Vue.component('hirebutton', require('./components/HireButton'));

Vue.component('loadcv', require('./components/LoadCV'));


export const bus = new Vue();


const app = new Vue({
    el: '#app'
});

 
