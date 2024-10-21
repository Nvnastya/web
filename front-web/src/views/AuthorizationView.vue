<script setup>
import {ref} from 'vue'
const login = ref('')
const password = ref('')
const loginError = ref('')
const passwordError = ref('')
const singIn = (event) => {
    if (login.value.length === 0) {
        loginError.value = 'Заполните имя пользователя'
    } else {
        loginError.value = ''
    }
    if (password.value.length === 0) {
        passwordError.value = 'Заполните пароль'
    } else {
        passwordError.value = ''
    }
    
    event.preventDefault()
}
</script>

<template>
<body class="base">
    <div class="container">
        <h2 class="tit">Авторизация</h2>
        <form @submit="singIn">
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
            <button  class="but_a">Войти</button>
            <p class="message">Не зарегистрированы? <router-link to="/registration">Создайте аккаунт</router-link></p>
        </form>  
    </div>
</body>
</template>
