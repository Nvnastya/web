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
  },
  {
    id: 5,  
    name:'Гель для душа FELCE AZZURRA White Musk delicate essence',
    price: 342
  },
  {
    id: 6, 
    name:'Увлажняющий мусс для тела с пробиотиками и экстрактом банана DARLING* Tofu Scramble',
    price: 770
  },
  {
    id: 7, 
    name:'Лосьон для тела La Sultane de Saba AYURVEDIQUE- AMBRE VANILLE PATCHOULI',
    price: 7153
  },
  {
    id: 8, 
    name:'Набор из 3-х скрабов для тела The Act Best-Selling Scrub Trio',
    price: 1153
  },
]

</script>

<template>
  <Carusel/>
  <main>
    <h1 class="title">Каталог</h1>
    <div class="catalog-container">
      <section class="catalog-filter">
        <div class="filter-container">
          <div><b>Категория продукта</b></div>
          <ul>
            <li><label><input type="checkbox">Для душа и ванны</label></li>
            <li><label><input type="checkbox">Для рук</label></li>
            <li><label><input type="checkbox">Для ног</label></li>
            <li><label><input type="checkbox">Скрабы и пилинги</label></li>
            <li><label><input type="checkbox">Корректирующие средства</label></li>
            <li><label><input type="checkbox">Дезодаранты</label></li>
            <li><label><input type="checkbox">Депиляция и эпиляция</label></li>
            <li><label><input type="checkbox">Мыло</label></li>
            <li><label><input type="checkbox">Мочалки и губки</label></li>
            <li><label><input type="checkbox">Массажеры и щетки</label></li>
          </ul>
        </div>
      </section>
      <section class="row list_products">
        <div class="product_column" v-for="item in items">
          <Item :item="item"/>
        </div>
      </section>
  </div>
  </main>
</template>

<style scoped>
  .catalog-container {
    display: flex;
  }
  .catalog-container .catalog-filter {
    min-width: 200px;
    background-color: rgb(242, 242, 242);
    padding: 15px;
  }
  .catalog-container .list_products {
    margin-left: 15px;
  }
  .filter-container {
    margin-bottom: 15px;
  }
  .filter-container ul {
    list-style: none;
    padding-left: 0px;
    margin-top: 5px;
  }
</style>