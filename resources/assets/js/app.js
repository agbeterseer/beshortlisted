
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// window.Vue = require('vue');

// window.VueRouter=require('vue-router').default;

// window.VueAxios=require('vue-axios').default;

//window.Axios=require('axios').default;

//let AppLayout= require('./components/App.vue');

//import CandidateListing from './components/companies/CandidateListing.vue';

// show the list post template
//const CandidateListing=Vue.component('CandidateListing', require('./components/CandidateListing.vue'));

require('./bootstrap');

window.Vue = require('vue');

//import VueRouter from 'vue-router';
Vue.use(VueRouter);

// import VueAxios from 'vue-axios';
// import axios from 'axios';

// import App from './App.vue';
// Vue.use(VueAxios, axios);

// import HomeComponent from './components/HomeComponent.vue';
// import CreateComponent from './components/CreateComponent.vue';
// import IndexComponent from './components/IndexComponent.vue';
// import EditComponent from './components/EditComponent.vue';

Vue.component(
    'articles',
     require('./components/Articles.vue')
     
     );

const app = new Vue({
    el: '#app'
});

const routes = [
  {
      name: 'home',
      path: '/',
      component: HomeComponent
  },
  {
      name: 'create',
      path: '/create',
      component: CreateComponent
  },
  {
      name: 'posts',
      path: '/posts',
      component: IndexComponent
  },
  {
      name: 'edit',
      path: '/edit/:id',
      component: EditComponent
  }
];

//const router = new VueRouter({ mode: 'history'});
//const app = new Vue(Vue.util.extend({ router })).$mount('#app');
// registering Modules
//Vue.use(VueRouter,VueAxios, axios);

 

// const routes = [
//   {
//     name: 'CandidateListing',
//     path: '/',
//     component: CandidateListing
//   },
//   {
//     name: 'Addpost',
//     path: '/add-post',
//     component: Addpost
//   },
//   {
//     name: 'Editpost',
//     path: '/edit/:id',
//     component: Editpost
//   },
//   {
//     name: 'Deletepost',
//     path: '/post-delete',
//     component: Deletepost
//   },
//   {
//     name: 'Viewpost',
//     path: '/view/:id',
//     component: Viewpost
//   }
// ];


// const router = new VueRouter({ mode: 'history', routes: routes});

// new Vue(
//  Vue.util.extend(
//  { router },
//  AppLayout
//  )
// ).$mount('#app');



 
