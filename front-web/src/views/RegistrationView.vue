<script setup>
import {ref} from 'vue'
const login = ref('')
const password = ref('')
const FIO = ref('')
const tel = ref('')

const loginError = ref('')
const passwordError = ref('')
const FIOError = ref('')
const telError = ref('')

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
    if (FIO.value.length === 0) {
        FIOError.value = 'Заполните пароль'
    } else {
        FIOError.value = ''
    }
    if (tel.value.length === 0) {
        telError.value = 'Заполните пароль'
    } else {
        telError.value = ''
    }
    
    event.preventDefault()
}
</script>

<template>
<body class="base">
    <div class="container">
        <h2 class="tit">Регистрация</h2>
        <form @submit="singIn">
            <div class="input-group">
                <label for="name">ФИО</label>
                <input type="text" name="name" v-model="FIO">
                <div class="error">{{ FIOError }}</div>
            </div>
            <div class="input-group">
                <label for="tel">Номер телефона</label>
                <input type="tel" name="tel" v-model="tel">
                <div class="error">{{ telError }}</div>
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
            <button  class="but_a">Зарегестрироваться</button>
        </form>
    </div>
</body>
</template>
