import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import Post from '../components/Posts.vue';
import PostDetailes from '../components/PostDetailesComponent.vue';//post/slug

import CategoryPosts from '../components/CategoryPostsComponent.vue';
import AdminIndex from '../components/admin/AdminIndexComponent.vue';

const routes=[
    {path:'/',component: Post, name:'Post'},
    {path:'/post/:slug',component:PostDetailes, name:'PostDetailes'},
    {path:'/category/:slug/posts',component:CategoryPosts,name:'CategoryPosts' },
    {path:'/admin',component: AdminIndex, name:'AdminIndex'},
]

const router = new   VueRouter({
    routes,
    hashbang:false,
    mode:'history'
})


export default router;
