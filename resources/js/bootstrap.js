import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import * as bulma from 'bulma';
window.bulma = bulma;

import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;