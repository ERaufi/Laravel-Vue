<template>
    <router-link to="/add_teachers" class="btn btn-success">Add</router-link>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <label>Name</label>
                    <input type="text" v-model="name" @keyup="getTeachers" />
                </div>
                <div class="col-md-3">
                    <label>Email</label>
                    <input type="text" v-model="email" @keyup="getTeachers" />
                </div>
                <div class="col-md-3">
                    <label>Phone</label>
                    <input type="text" v-model="phone" @keyup="getTeachers" />
                </div>
                <div class="col-md-3">
                    <label>Salary</label>
                    <input type="text" v-model="salary" @keyup="getTeachers" />
                </div>
            </div>
            <table class="table table-bordered text-center">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Salary</th>
                    <th>Action</th>
                </thead>
                <tbody v-if="teachers && teachers.length > 0">
                    <tr v-for="teacher in teachers" :key="teacher.id">
                        <td>{{ teacher.name }}</td>
                        <td>{{ teacher.email }}</td>
                        <td>{{ teacher.phone }}</td>
                        <td>{{ teacher.salary }}</td>
                        <td>
                            <router-link :to="'/edit_teacher/' + teacher.id" class="btn btn-success">Edit</router-link>
                            <input type="button" value="Delete" class="btn btn-danger" @click="deleteData(teacher.id)">
                        </td>
                    </tr>
                </tbody>
            </table>
            <paginate v-model="currentPage" :page-count="lastPage" :click-handler="getTeachers" :prev-text="'Preve'"
                :next-text="'Next'"></paginate>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import paginate from "vuejs-paginate-next";

export default {
    components: {
        paginate
    },
    data() {
        return {
            teachers: {
                type: Object,
                default: null
            },
            currentPage: 1,
            lastPage: 1,
            name: null,
            email: null,
            phone: null,
            salary: null,
        }
    },

    mounted() {
        this.getTeachers()
    },
    methods: {
        getTeachers() {
            axios.get(`api/teachres`, {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('token')}`
                },
                params: {
                    page: this.currentPage,
                    name: this.name,
                    email: this.email,
                    phone: this.phone,
                    salary: this.salary,
                }
            }).then((data) => {
                this.teachers = data.data.data;
                console.log(this.teachers);
                this.lastPage = data.data.last_page;

            }).catch((error) => {
                console.log(error);
            })
        },
        deleteData(id) {
            axios.delete(`api/delete_teacher/${id}`, {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('token')}`
                },
            }).then((response) => {
                this.getTeachers();
            }).catch((error) => {
                console.log(error);
            })
        }
    }
}
</script>
