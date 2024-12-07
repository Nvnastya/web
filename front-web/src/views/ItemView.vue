<script setup>
import { useRoute } from "vue-router";
import axios from "axios";
import { ref } from "vue";

const id = useRoute().params.id;
const product = ref({});
const isLoading = ref(true);

axios.get('products/' + id)
    .then((response) => {
        product.value = response.data;
        isLoading.value = false;
    })
    .catch(error => {
        console.error('Ошибка при загрузке данных:', error);
        isLoading.value = false;
    });

import Carusel from '@/components/Carusel/Carusel.vue';

const buy = () => {
    // alert('Товар добавлен в корзину');
    console.log(product.value.id);
    const cartItemData = {
        cart_id: 11,
        product_id: product.value.id,
        quantity: 1,
        sum: product.value.price
    };

    axios.post('/cart_items/', cartItemData)
        .then(response => {
            console.log('Товар добавлен в корзину:', response.data);
            alert('Товар добавлен в корзину!');
        })
        .catch(error => {
            console.error('Ошибка при добавлении товара в корзину:', error);
            alert('Произошла ошибка. Попробуйте снова.');
        });
};
</script>

<template>
    <Carusel />
    <main class = "weight">
        <div v-if="!isLoading">
            <div><h2>{{ product.name }}</h2></div>
            <section class="row">
                <section class="list_product">
                    <div class="product_photo">
                        <img :src="product.image_url" alt="Фото товара" />
                    </div>
                </section>
                <section class="product">
                    <div>
                        <h2>Описание</h2>
                        <p class="description">{{ product.description }}</p>
                    </div>
                    <div class="row vertical-center">
                        <div class="price">{{ product.price }} ₽</div>
                        <div>
                            <button @click="buy">
                                Купить
                            </button>
                        </div>
                    </div>
                </section>
            </section>
        </div>
        <div v-else>
            <p class="load">Загрузка...</p>
        </div>
    </main>
</template>

<style scoped>
.weight {
  padding: 20px;
  min-height: 43vh;
}

.load {
    font-size: 2rem;
    font-weight: bold;
    color: black;
    text-align: center;
    margin-top: 10px;
}
</style>