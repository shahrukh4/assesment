require('./bootstrap');
import axios from "axios";

window.Vue = require('vue').default;
Vue.config.productionTip = false;

/**
 * Set userId if user is logged in
 */
if (document.querySelector("meta[name='userId']")) {
    Vue.prototype.$userId = document.querySelector("meta[name='userId']").getAttribute('content');
    localStorage.setItem('user', JSON.stringify({
        id: Vue.prototype.$userId
    }))
}

/**
 * Redirect user to login page, if any 500 error occurred in API or user is logged out
 */
axios.interceptors.response.use(function (response) {
    return response
}, function (error) {
    window.location.href = '/login'
    return Promise.reject(error)
})

// Import dependencies
import App from './App.vue'
import store from './store'
import router from './router'

// Registering global components
Vue.component('foods', require('./views/Foods.vue').default);

const app = new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App)
});
