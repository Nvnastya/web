<script setup>
defineProps({
    item: {}
})
</script>

<template>
    <div class="product_item">
          <div class="img_container"><img src="https://pcdn.goldapple.ru/p/p/19760322898/web/696d674d61696e5f38626136623233313035313634326136383764363339636531363566663434368dc895e66a8f188fullhd.webp" /></div>
          <h3><router-link :to="{name:'item-info', params:{id:item.id}}" class="item">{{ item.name }}</router-link></h3>
          <div class="price">{{item.price}}₽</div>
        </div>
</template>
