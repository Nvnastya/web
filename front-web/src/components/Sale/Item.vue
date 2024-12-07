<script setup>
defineProps({
    product: {}
})
</script>

<template>
    <div class="product_item">
          <div class="img_container"><img :src="product.image_url" alt="product image" /></div>
          <h3><router-link :to="{name:'item-info', params:{id:product.id}}" class="item">{{ product.name }}</router-link></h3>
          <div class="price">{{product.price}}₽</div>
        </div>
</template>
