import './bootstrap';
// import './files/single-script'

// home components
import frontSearch from './components/home/search'
Vue.component('frontSearch' , frontSearch);


const app = new Vue({
    el: '#app-single',
});
