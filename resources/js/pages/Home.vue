<template>
    <div>
        <h1>Home Page</h1>

        <h2>Name: <span>{{ user.name }}</span></h2>
        <h2>Email: <span>{{ user.email }}</span></h2>
        <img :src="getUserPhotoUrl()" style="width: 120px;" title="user photo" />
    </div>
</template>
<script>
import axios from 'axios';
import { defineComponent, ref } from 'vue';

export default defineComponent({
    setup() {
        const user = ref({});

        const getUserPhotoUrl = () => {
            if (user.value && user.value.photo) {
                return `${import.meta.env.VITE_APP_URL}${user.value.photo}`
            } else {
                return '';
            }
        }
        axios.get(`api/user`, {
            headers: {
                Authorization: `Bearer ${localStorage.getItem('token')}`
            }
        }).then((response) => {
            console.log(response);
            user.value = response.data;
        }).catch((error) => {
            console.log(error);
        });

        return {
            user,
            getUserPhotoUrl
        }
    }
})
</script>