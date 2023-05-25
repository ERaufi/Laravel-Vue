import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Register from './components/auth/Register.vue';

export default [
    { path: '/', component: Home },
    { path: '/about', component: About },
    { path: '/register', component: Register },

];