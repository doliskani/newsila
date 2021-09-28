import './bootstrap';

// admin components
import sourcesPosts from './components/admin/sources-posts.vue';
import searchPost from './components/admin/search-post.vue';
import advertsTable from './components/admin/adverts-table.vue';
Vue.component('sourcesPosts', sourcesPosts);
Vue.component('searchPost', searchPost);
Vue.component('advertsTable', advertsTable);

import vuePagination from 'laravel-vue-pagination';
Vue.component('pagination' , vuePagination);








const app = new Vue({
    el: '#app',
});
