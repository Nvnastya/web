<script setup>
import Item from '@/components/Sale/Item.vue';
import Carusel from '@/components/Carusel/Carusel.vue';
const items = 
[
  {
    id: 1,  
    name:'Гель для душа FELCE AZZURRA White Musk delicate essence',
    price: 342
  },
  {
    id: 2, 
    name:'Увлажняющий мусс для тела с пробиотиками и экстрактом банана DARLING* Tofu Scramble',
    price: 770
  },
  {
    id: 3, 
    name:'Лосьон для тела La Sultane de Saba AYURVEDIQUE- AMBRE VANILLE PATCHOULI',
    price: 7153
  },
  {
    id: 4, 
    name:'Набор из 3-х скрабов для тела The Act Best-Selling Scrub Trio',
    price: 1153
  }
]
</script>

<template>
    <Carusel/>
    <h1 class="title">Подарок к заказу от 5000₽</h1>
    <section class="row list_products">
      <div class="product_column" v-for="item in items">
        <Item :item="item"/>
      </div>
    </section>
</template>
