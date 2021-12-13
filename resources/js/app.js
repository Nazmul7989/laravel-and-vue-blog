require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import {routes} from "./routes/admin/routes";
import {store} from "./store/admin/store";
import CxltToastr from 'cxlt-vue2-toastr';
import 'cxlt-vue2-toastr/dist/css/cxlt-vue2-toastr.css';
import Swal from 'sweetalert2';
import 'sweetalert2/src/sweetalert2.scss';
import ObjectToFD from 'vue-object-to-formdata';
import moment from 'moment';
Vue.component('pagination', require('laravel-vue-pagination'));



//Date format by using moment js
Vue.filter('dateFormat',(value)=>{
    return moment(value).format("MMM Do YYYY");
    // return moment(value, "YYYYMMDD").fromNow();
})
Vue.filter('shortLength',(value,length,sufix)=>{
    return value.substring(0,length) + sufix
})



Vue.use(VueRouter);
Vue.use(ObjectToFD);
Vue.use(CxltToastr);



//Toastr notification
var toastrConfigs = {
    position: 'top right',
    showDuration: 2000
}
Vue.use(CxltToastr, toastrConfigs)



//sweet alert
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
})
window.Toast = Toast


const router = new VueRouter({
    mode: 'history',
    routes,
    scrollBehavior(){
      return{
          x: 0,
          y: 0

      }
    },

})

// Vue.component('master', require('./components/frontend/master').default);


const app = new Vue({
    el: '#app',
    router,
    store,
});
