<template>
    <div class="card">
        <div class="card-body">
            <form @submit.prevent="editTeacher">
                <div class="row">
                    <div class="col-md-3">
                        <label>Name</label>
                        <input type="text" v-model="name" />
                    </div>
                    <div class="col-md-3">
                        <label>Email</label>
                        <input type="text" v-model="email" />
                    </div>
                    <div class="col-md-3">
                        <label>Phone</label>
                        <input type="text" v-model="phone" />
                    </div>
                    <div class="col-md-3">
                        <label>Salary</label>
                        <input type="text" v-model="salary" />
                    </div>
                </div>
                <button type="submit" class="btn btn-danger">Submit</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            name: null,
            email: null,
            phone: null,
            salary: null,
        }
    },
    mounted() {
        axios.get(`../api/get_teacher/${this.$route.params.id}`, {
            headers: {
                Authorization: `Bearer ${localStorage.getItem('token')}`
            }
        }).then((response) => {
            console.log(response);
            this.name = response.data.name;
            this.email = response.data.email;
            this.phone = response.data.phone;
            this.salary = response.data.salary;
        }).catch((error) => {
            console.log(error);
        })
    },
    methods: {
        editTeacher() {
            axios.post(`../api/update_teacher/${this.$route.params.id}`, {
                name: this.name,
                email: this.email,
                phone: this.phone,
                salary: this.salary,
            }, {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('token')}`
                }
            }).then((res) => {
                console.log(res);
                this.$router.push('/teachers');
            }).catch((error) => {
                console.log(error);
            })
        }
    }
}
</script>