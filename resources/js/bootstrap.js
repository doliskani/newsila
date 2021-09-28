Vue.config.devtools = true;

import Vue from 'vue';
import Axios from 'axios';

window.Vue = Vue;
window.axios = Axios;

window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
};