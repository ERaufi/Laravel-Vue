import './bootstrap';
import { createApp } from 'vue';
import ExampleComponent from './components/ExampleComponent.vue';
import routes from './routes';
import { createRouter, createWebHistory } from 'vue-router';
import Register from './components/auth/Register.vue';
import Login from './components/auth/Login.vue';
import Teachers from './pages/Teachers.vue';
import AddTeacher from './pages/AddTeacher.vue';

const app = createApp({});
const router = createRouter({
    history: createWebHistory(),
    routes,
});
app.use(router);


app.component('example-component', ExampleComponent);
app.component('register', Register);
app.component('login', Login);
app.component('teachers', Teachers);
app.component('add-teacher', AddTeacher);


app.mount('#app');
