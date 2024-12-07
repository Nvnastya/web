<script setup>
import { ref } from 'vue'
import axios from 'axios'

const login = ref('')
const password = ref('')
const loginError = ref('')
const passwordError = ref('')
const apiError = ref('')

const singIn = async (event) => {
    event.preventDefault()

    loginError.value = ''
    passwordError.value = ''
    apiError.value = ''

    if (login.value.length === 0) {
        loginError.value = 'Заполните имя пользователя'
    }
    if (password.value.length === 0) {
        passwordError.value = 'Заполните пароль'
    }

    if (loginError.value || passwordError.value) {
        return
    }

    try {
        const response = await axios.post('/login/', {
            username: login.value,
            password: password.value
        })

        if (response.data.success) {
            window.location.href = '/'
        } else {
            apiError.value = 'Неверные данные для входа'
        }
    } catch (error) {
        apiError.value = 'Ошибка при авторизации'
    }
}
</script>

<template>
<body class="base">
    <div class="container">
        <h2 class="tit">Авторизация</h2>
        <form @submit="singIn">
            <div class="input-group">
                <label for="username">Имя пользователя</label>
                <input type="text" required name="username" v-model="login">
                <div class="error">{{ loginError }}</div>
            </div>
            <div class="input-group">
                <label for="password">Пароль</label>
                <input type="password" required name="password" v-model="password">
                <div class="error">{{ passwordError }}</div>
            </div>
            <button type = "submit" class="but_a">Войти</button>
            <div class="error">{{ apiError }}</div>
            <p class="message">Не зарегистрированы? <router-link to="/registration">Создайте аккаунт</router-link></p>
        </form>  
    </div>
</body>
</template>
