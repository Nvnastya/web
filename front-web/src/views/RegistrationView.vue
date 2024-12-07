<script setup>
import axios from "axios";
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();

const login = ref('');
const password = ref('');
const email = ref('');

const loginError = ref('');
const passwordError = ref('');
const emailError = ref('');

const singIn = (event) => {
    event.preventDefault();

    loginError.value = '';
    passwordError.value = '';
    emailError.value = '';

    let isValid = true;

    if (login.value.length === 0) {
        loginError.value = 'Заполните имя пользователя';
        isValid = false;
    }

    if (password.value.length === 0) {
        passwordError.value = 'Заполните пароль';
        isValid = false;
    }

    if (email.value.length === 0) {
        emailError.value = 'Заполните email';
        isValid = false;
    }

    if (isValid) {
        axios.post('/register/', { 
            name: login.value, 
            password: password.value, 
            email: email.value, 
            password_confirmation: password.value 
        })
        .then(response => {
            console.log('Форма отправлена', response);
            router.push({ name: 'authorization' });
        })
        .catch(error => {
            console.error('Ошибка при регистрации:', error);
        });
    }
};

</script>

<template>
  <body class="base">
    <div class="container">
        <h2 class="tit">Регистрация</h2>
        <form @submit="singIn">
            <div class="input-group">
                <label for="email">Электронная почта</label>
                <input type="email" name="email" v-model="email">
                <div class="error">{{ emailError }}</div>
            </div>
            <div class="input-group">
                <label for="username">Имя пользователя</label>
                <input type="text" name="username" v-model="login">
                <div class="error">{{ loginError }}</div>
            </div>
            <div class="input-group">
                <label for="password">Пароль</label>
                <input type="password" name="password" v-model="password">
                <div class="error">{{ passwordError }}</div>
            </div>
            <button type="submit" class="but_a">Зарегистрироваться</button>
        </form>
    </div>
  </body>
</template>
