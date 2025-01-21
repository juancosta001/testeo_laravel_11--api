import {createRouter, createWebHistory} from 'vue-router'

import List from './components/ListComponent.vue'
import Save from './components/SaveComponent.vue'

const routes = [
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
