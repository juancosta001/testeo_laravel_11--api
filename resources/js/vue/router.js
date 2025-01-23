import {createRouter, createWebHistory} from 'vue-router'

import List from './components/ListComponent.vue'
import Save from './components/SaveComponent.vue'
import Login from './components/auth/LoginComponent.vue'

const routes = [
    {
        name: 'login',
        path: '/vue/login',
        component: Login,
        beforeEnter() {
            console.log('Ruta de login cargada');
        }
        },
    {
    name:'list',
    path:'/vue',
    component: List
    },
    {
        name:'save',
        path:'/vue/save/:slug?',
        component: Save
    }
]
const router = createRouter({
    history : createWebHistory(),
    routes:routes,

})

export default router
