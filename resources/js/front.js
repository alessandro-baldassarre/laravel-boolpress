/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import Home from "./pages/Home";
import PostList from "./pages/PostList";
import Post from "./pages/Post";

const router = new VueRouter({
    mode: 'history',
    routes: [

        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/posts',
            name: 'posts',
            component: PostList
        },
        {
            path: '/post/:postId',
            name: 'post',
            component: Post
        },
    ]
})


import App from "./views/App";

const app = new Vue({
    el: '#root',
    render: h => h(App),
    router
});
