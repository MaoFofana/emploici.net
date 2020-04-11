require('./bootstrap');

window.Vue = require('vue');
let  VueResource = require('vue-resource');
Vue.use(VueResource);
Vue.component('job', require('./component/SendJob.vue').default);
const app = new Vue({
    el: '#app'
});
