<template>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-left">

                </div>
            </div>
            <div class="col-lg-5 col-12">
                <div id="auth-right">
                    <div class="auth-logo">
                        <a href="index.html"><img src="assets/images/logo.png" alt="Logo"> Atrana</a>
                    </div>
                    <h1 class="auth-title">Sign Up.</h1>
                    <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

                    <form @submit.prevent="register">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" v-model="email" placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" v-model="name" placeholder="Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" v-model="password"
                                placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>


                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" v-model="confirmPassword"
                                placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="file" class="form-control form-control-xl" accept="image/*" ref="photo">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Already have an account? <a href="auth-login.html" class="font-bold">Log
                                in</a>.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { defineComponent, ref } from 'vue';
export default {
    setup() {
        const email = ref('');
        const name = ref('');
        const password = ref('');
        const confirmPassword = ref('');
        const photo = ref(null);


        function register() {
            if (password.value !== confirmPassword.value) {
                alert('Password od not match');
                return;
            }

            const formData = new FormData();
            formData.append('email', email.value);
            formData.append('name', name.value);
            formData.append('password', password.value);
            formData.append('password_confirmation', confirmPassword.value);
            formData.append('photo', photo.value.files[0]);
            axios.post('api/register', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then((response) => {
                console.log(response);
                localStorage.setItem('token', response.data.token);
                location.href = '/';
            }).catch((error) => {
                console.log(error);
            })

        }

        return {
            email,
            name,
            password,
            confirmPassword,
            photo,
            register,
        }
    }
}
</script>