import { createRouter, createWebHistory } from 'vue-router';
import HomePage from '../pages/HomePage.vue';
import CreateFeedbackPage from '../pages/CreateFeedbackPage.vue';

const routes = [
    {
        path: '/',
        component: HomePage,
    },
    {
        path: '/create',
        component: CreateFeedbackPage,
    }
];


const router = createRouter({
    history: createWebHistory(),
    routes
  });

  export default router;
