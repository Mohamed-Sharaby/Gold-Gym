
require('./bootstrap');
import Vue from 'vue';
import Swal from 'sweetalert2';

import Axios from 'axios';
var $ = window.jQuery;
const files = require.context('./components/', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));


// require('alpinejs');


const app = new Vue({
    el: '#chat',
});

