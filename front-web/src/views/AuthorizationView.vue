<script setup>
</script>

<template>
<body class="base">
    <div class="container">
        <h2 class="tit">Авторизация</h2>
        <form action="#" method="POST">
            <div class="input-group">
                <label for="username">Имя пользователя</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button  class="but_a">Войти</button>
            <p class="message">Не зарегистрированы? <router-link to="/registration">Создайте аккаунт</router-link></p>
        </form>
    </div>
</body>
</template>
