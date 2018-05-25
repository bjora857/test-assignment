
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('create-employee', require('./components/employee/CreateEmployee'));
Vue.component('create-company', require('./components/company/CreateCompany'));
Vue.component('company-select', require('./components/company/Company-select'));
Vue.component('error-display', require('./components/shared/ErrorDisplay'));
Vue.component('info-display', require('./components/shared/InfoDisplay'));
Vue.component('company-employees', require('./components/company/CompanyEmployees'));
Vue.component('unemployed', require('./components/employee/unemployed'));

const app = new Vue({
    el: '#app'
});
