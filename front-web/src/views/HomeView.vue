<script setup>
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
  <main>
    <h1 class="title">Каталог</h1>
    <section class="row list_products">
      <div class="product_column" v-for="item in items">
        <div class="product_item">
          <div class="img_container"><img src="https://pcdn.goldapple.ru/p/p/19760322898/web/696d674d61696e5f38626136623233313035313634326136383764363339636531363566663434368dc895e66a8f188fullhd.webp" /></div>
          <h3><router-link :to="{name:'item-info', params:{id:item.id}}" class="item">{{ item.name }}</router-link></h3>
          <div class="price">{{item.price}}₽</div>
        </div>
      </div>
    </section>
  </main>
</template>
