import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Register from './components/auth/Register.vue';
import Login from './components/auth/Login.vue';
import Teachers from './pages/Teachers.vue';
import AddTeacher from './pages/AddTeacher.vue';
import EditTeacher from './pages/EditTeacher.vue';

export default [
    { path: '/', component: Home },
    { path: '/about', component: About },
    { path: '/register', component: Register },
    { path: '/login', component: Login },
    { path: '/teachers', component: Teachers },
    { path: '/add_teachers', component: AddTeacher },
    { path: '/edit_teacher/:id', component: EditTeacher },

];