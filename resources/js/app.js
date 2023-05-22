import './bootstrap';
import { createApp } from 'vue';
import ExampleComponent from './components/ExampleComponent.vue';
import routes from './routes';
import { createRouter, createWebHistory } from 'vue-router';



const app = createApp({});
const router = createRouter({
    history: createWebHistory(),
    routes,
});
app.use(router);



app.component('example-component', ExampleComponent);


app.mount('#app');
