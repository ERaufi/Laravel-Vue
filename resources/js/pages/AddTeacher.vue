<template>
    <div class="card">
        <div class="card-body">
            <form @submit.prevent="addTeacher">
                <div class="row">
                    <div class="col-md-3">
                        <label>Name</label>
                        <input type="text" v-model="name" />
                        <div v-if="v$.name.$error" class="error">{{ v$.name.$errors[0].$message }}</div>
                    </div>
                    <div class="col-md-3">
                        <label>Email</label>
                        <input type="text" v-model="email" />
                        <div v-if="v$.email.$error" class="error">{{ v$.email.$errors[0].$message }}</div>
                    </div>
                    <div class="col-md-3">
                        <label>Phone</label>
                        <input type="text" v-model="phone" />
                        <div v-if="v$.phone.$error" class="error">{{ v$.phone.$errors[0].$message }}</div>

                    </div>
                    <div class="col-md-3">
                        <label>Salary</label>
                        <input type="text" v-model="salary" />
                        <div v-if="v$.salary.$error" class="error">{{ v$.salary.$errors[0].$message }}</div>

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
import { useVuelidate } from '@vuelidate/core';
import { required, email as emailValidate, numeric, minLength, maxValue } from '@vuelidate/validators';
export default {
    setup() {
        const name = ref('');
        const email = ref('');
        const phone = ref('');
        const salary = ref('');
        const router = useRouter();

        const rules = {
            name: { required },
            email: { required, emailValidate },
            phone: { required, minLength: minLength(10), numeric },
            salary: { required, numeric, maxValue: maxValue(1000) },
        };

        const v$ = useVuelidate(rules, {
            name,
            email,
            phone,
            salary,
        });



        function addTeacher() {

            if (v$.value.$invalid) {
                v$.value.$touch();
                return;
            }

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
            v$,
        }
    }
}
</script>

<style scope>
.error {
    color: red;
}
</style>