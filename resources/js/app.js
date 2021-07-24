import { createApp } from '@vue/runtime-dom';
import { createRouter, createWebHashHistory } from 'vue-router';
import App from './components/App.vue';
import Home from './components/Home.vue';
import Task from './components/Task.vue';

// Route
const routes = [
    {
        path: '/', 
        component: Home
    },
    {
        path: '/task', 
        component: Task
    },
]
const router = createRouter({
  history: createWebHashHistory(),
  routes
})

const app = createApp(App)
app.use(router)
app.mount('#app')