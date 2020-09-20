import Vue from "vue";

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

//vue 

window.Vue = require('vue');

Vue.config.productionTip = false;

const app = new Vue({

    el: '#app',
});