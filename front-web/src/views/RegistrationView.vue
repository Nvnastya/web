<script setup>
</script>

<template>
<body class="base">
    <div class="container">
        <h2 class="tit">Регистрация</h2>
        <form action="#" method="POST">
            <div class="input-group">
                <label for="name">ФИО</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="input-group">
                <label for="tel">Номер телефона</label>
                <input type="tel" id="tel" name="tel" required>
            </div>
            <div class="input-group">
                <label for="username">Имя пользователя</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button  class="but_a">Зарегестрироваться</button>
        </form>
    </div>
</body>
</template>
