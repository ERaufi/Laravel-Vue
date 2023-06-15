<template>
    <div class="card">
        <div class="card-body">
            <form @submit.prevent="addTeacher">
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
import { defineComponent, ref } from 'vue';
import { useRouter } from "vue-router";

export default {
    setup() {
        const name = ref('');
        const email = ref('');
        const phone = ref('');
        const salary = ref('');
        const router = useRouter();

        function addTeacher() {
            axios.post(`api/add_teacher`, {
                name: name.value,
                email: email.value,
                phone: phone.value,
                salary: salary.value,
            }, {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('token')}`
                }
            }).then((res) => {
                console.log(res);
                router.push('/teachers');
            }).catch((error) => {
                console.log(error);
            })
        }

        return {
            name,
            email,
            phone,
            salary,
            addTeacher,
        }
    }
}
</script>