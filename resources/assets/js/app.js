
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
window.Vue.use(VueRouter);

import CompaniesIndex from './components/company/Index.vue';
import CompaniesCreate from './components/company/Create.vue';
import CompaniesEdit from './components/company/Edit.vue';

const routes = [
    {path: '/', components: {companiesIndex: CompaniesIndex}, name:'companiesIndex'},
    {path: '/admin/companies/create', component: CompaniesCreate, name:'companiesCreate'},
    {path: '/admin/companies/edit/:id', component: CompaniesEdit, name:'companiesEdit'},
];
const router = new VueRouter({ routes });

const app = new Vue({ router }).$mount('#app');
