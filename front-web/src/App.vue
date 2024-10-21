<script setup>
import { RouterLink, RouterView } from 'vue-router'

</script>

<template>
  <header>
    <div class="top_menu row between vertical-center">
        <nav>
            <ul class="row">
              <li><router-link to="/">Главная</router-link></li>
              <li><router-link to="/authorization">Личный кабинет</router-link></li>
              <li><router-link to="/basket">Корзина</router-link></li>
              <li><router-link to="/sale">Ваш подарок</router-link></li>
            </ul>
        </nav>
        <img class="logo" src="https://cdn1.flamp.ru/cafbfe0fa17cf6b5758195a42ded9564.jpg" />
    </div>
  </header>
  <RouterView />
  <footer class="row between vertical-center">
    <div>
        <nav>
          <ul class="row">
            <li><router-link to="/shops">Наши магазины</router-link></li>
            <li><router-link to="/contact">Контакты</router-link></li>
            <li><router-link to="/doc">Пользовательское соглашение</router-link></li>
          </ul>
        </nav>
    </div>
    <div>©2024 Никольская А.В. КБ-211</div>
  </footer>
</template>

