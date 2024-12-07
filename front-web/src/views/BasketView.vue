<script setup>
import { ref, computed } from 'vue';
import axios from 'axios';

const cartItems = ref([]);
const productsMap = ref({});
const isDataLoaded = ref(false);

axios
  .get('/cart_items/')
  .then((response) => {
    cartItems.value = response.data;
    fetchProductDetails();
  })
  .catch((error) => {
    console.error('Ошибка при загрузке корзины:', error);
  });

// Функция для загрузки данных о товарах
const fetchProductDetails = async () => {
  try {
    const { data } = await axios.get('/products/');
    productsMap.value = data.reduce((map, product) => {
      map[product.id] = {
        name: product.name,
        image: product.image_url || '/default-product.png',
      };
      return map;
    }, {});

    //добавлением `name` и `image`
    cartItems.value = cartItems.value.map((item) => ({
      ...item,
      name: productsMap.value[item.product_id]?.name || 'Неизвестный товар',
      image: productsMap.value[item.product_id]?.image || '/default-product.png',
    }));

    isDataLoaded.value = true;
  } catch (error) {
    console.error('Ошибка при загрузке данных о товарах:', error);
  }
};

const del = (id) => {
  axios
    .delete(`/cart_items/${id}`)
    .then(() => {
      cartItems.value = cartItems.value.filter((item) => item.id !== id);
    })
    .catch((error) => {
      console.error('Ошибка при удалении элемента из корзины:', error);
    });
};

const totalPrice = computed(() => {
  return cartItems.value.reduce((total, item) => total + item.sum * item.quantity, 0);
});
</script>

<template>
  <div class="page">
    <div class="wrapper">
      <h1 class="title">Корзина</h1>

      <div v-if="!isDataLoaded" class="loading">
        <p>Загрузка данных...</p>
      </div>

      <div v-else-if="cartItems.length === 0" class="empty-cart">
        <p>Ваша корзина пуста.</p>
      </div>

      <div v-else>
        <ul class="cart-list">
          <li v-for="item in cartItems" :key="item.id" class="cart-item">
            <div class="item-details">
              <div class="item-image">
                <img :src="item.image" alt="Product image" />
              </div>
              <div class="item-info">
                <h3 class="item-name">{{ item.name }}</h3>
                <p class="item-price">{{ item.sum }} ₽</p>
                <!-- <p class="item-quantity">Количество: {{ item.quantity }}</p> -->
              </div>
            </div>
            <button @click="del(item.id)" class="btn-delete">Заказать</button>
          </li>
        </ul>

        <div class="cart-summary">
          <p>Итоговая стоимость: <span class="total-price">{{ totalPrice }} ₽</span></p>
        </div>
      </div>
    </div>
  </div>
</template>


  
<style scoped>
  .page {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: rgb(249, 244, 238);
    padding: 20px;
  }
  
  .wrapper {
    background: rgb(236, 232, 225);
    max-width: 800px;
    width: 100%;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: margin 0.3s ease-out, transform 0.3s;
  }
  
  .wrapper:has(.cart-item:nth-child(5)) {
    margin-top: 20px;
  }
  
  .wrapper:not(:has(.cart-item:nth-child(5))) {
    transform: translateY(0);
  }
  
  .title {
    font-size: 2rem;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
    color: black;
  }
  
  .loading,
  .empty-cart {
    text-align: center;
    font-size: 1.2rem;
    color: #666;
  }
  
  .cart-list {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  
  .cart-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
    padding: 15px;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    transition: transform 0.2s, box-shadow 0.2s;
  }
  
  .cart-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  
  .item-details {
    display: flex;
    align-items: center;
  }
  
  .item-image img {
    width: 80px;
    height: 80px;
    border-radius: 8px;
    margin-right: 15px;
  }
  
  .item-info {
    display: flex;
    flex-direction: column;
  }
  
  .item-name {
    font-size: 1.2rem;
    font-weight: bold;
    color: #333;
    margin: 0;
  }
  
  .item-price {
    font-size: 1rem;
    color: #555;
    margin-top: 5px;
  }
  
  .item-quantity {
    font-size: 0.9rem;
    color: #777;
    margin-top: 5px;
  }
  
.btn-delete {
    width: 100px;
    background-color: black;
    border: none;
    color: rgb(249, 244, 238);
    border-radius: 4px;
    cursor: pointer;
    padding: 10px 15px;
    font-size: 1rem;
    font-weight: bold;
    transition: background 0.2s;
    margin-right: 30px;
    align-self: flex-end;
}

  
  .btn-delete:hover {
    background-color: rgb(177, 175, 169);
    color: #000;
  }
  
  .cart-summary {
    text-align: right;
    margin-top: 20px;
    font-size: 1.2rem;
    color: #333;
  }
  
  .total-price {
    font-size: 1.5rem;
    font-weight: bold;
    color: black;
  }
  </style>
  
  