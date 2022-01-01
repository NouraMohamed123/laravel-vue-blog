/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('posts', require('./components/Posts.vue').default);
Vue.component('global-home', require('./components/GlobalHomeComponent.vue').default);
Vue.component('register', require('./components/RegisterComponent.vue').default);
Vue.component('login', require('./components/LoginComponent.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));
//

/**
 * Next, we will create a fresh Vue application in
 * stance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import router from './routes/routes';
import Vuex from 'vuex';
import Axios from 'axios';
Vue.use(Vuex);
// state action  mutation getters
const store = new Vuex.Store({
    state:{
         userToken: null,
         user:null,

    },
    getters:{//center state in one place
      islogged(state){
          return !!state.userToken;
      },
      isAdmin(state){
        if(state.user){
            return state.user.is_admin
        }
        return null;
      }
    },
    mutations:{//chang state
       setUserToken(state,userToken){
        state.userToken = userToken;
        localStorage.setItem('userToken',JSON.stringify(userToken));
        axios.defaults.headers.common.Authorization = `Bearer  ${userToken}`;
       },
       removeUserToken(state){
        state.userToken =null;
        localStorage.removeItem('userToken');
       },
       setUser(state,user){
        state.user = user
       }
    },
    actions:{
        RegisterUser({commit},payload){
        axios.post('/api/register',payload).then(res=>{
            console.log(res);
            commit('setUserToken',res.data.token)
        })
        },
        LoginUser({commit},payload){
            axios.post('/api/login',payload).then(res=>{
                console.log(res);
                commit('setUserToken',res.data.token)
            axios.get('/api/user/').then(res=>{
                console.log(res.data)});
                commit('setUser',res.data.user)
            })

            }


    }
})
const app = new Vue({
    el: '#app',
    router,
    store:store
});
