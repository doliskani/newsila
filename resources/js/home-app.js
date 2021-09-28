import './bootstrap';

// home components
import frontSearch from './components/home/search'
Vue.component('frontSearch' , frontSearch);

import headlines from './components/home/headlines'
Vue.component('headlines' , headlines);

import categoryArticles from './components/home/category-articles.vue'
Vue.component('categoryArticles' , categoryArticles);

import vuePagination from 'laravel-vue-pagination';
Vue.component('pagination' , vuePagination);

import shareLink from './components/home/shares/share-link'
Vue.component('shareLink' , shareLink);




const app = new Vue({
    el: '#app',
});
