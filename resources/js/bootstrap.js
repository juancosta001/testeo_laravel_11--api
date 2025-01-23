import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

//con estos podemos emplear la proteccion que tenemos en el api middleware
axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;
