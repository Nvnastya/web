<script setup>
import Item from '@/components/Sale/Item.vue';
import Carusel from '@/components/Carusel/Carusel.vue';
import axios from "axios";
import {ref} from 'vue';

const products = ref([])
axios.get('/products/gift/')
    .then((response) => products.value = response.data)

</script>

<template>
  <div>
    <Carusel/>
    <h1 class="title">Подарок к заказу от 5000₽</h1>
    <section class="row list_products wrap">
      <div class="product_column" v-for="product in products">
        <Item :product="product"/>
      </div>
    </section>
  </div>
</template>

<style>
.wrap {
  padding: 20px;
  min-height: 34.6vh;
}
</style>