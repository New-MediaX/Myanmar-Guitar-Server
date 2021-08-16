/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('login-component' , require('./components/pages/LoginComponent.vue').default);
Vue.component('home-component' , require('./components/pages/HomeComponent.vue').default);

Vue.component('song-component' , require('./components/pages/Songs/ListComponent.vue').default);
Vue.component('create-song-component' , require('./components/pages/Songs/CreateComponent.vue').default);
Vue.component('edit-song-component' , require('./components/pages/Songs/EditComponent.vue').default);


Vue.component('album-component' , require('./components/pages/Albums/ListComponent.vue').default);
Vue.component('create-album-component' , require('./components/pages/Albums/CreateComponent.vue').default);
Vue.component('edit-album-component' , require('./components/pages/Albums/EditComponent.vue').default);

Vue.component('author-component' , require('./components/pages/Authors/ListComponent.vue').default);
Vue.component('create-author-component' , require('./components/pages/Authors/CreateComponent.vue').default);
Vue.component('edit-author-component' , require('./components/pages/Authors/EditComponent.vue').default);

Vue.component('token-component' , require('./components/pages/Token/EditComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
