<script setup>
import Item from '@/components/Sale/Item.vue';
import Carusel from '@/components/Carusel/Carusel.vue';
import axios from "axios";
import { ref, computed } from 'vue';

const products = ref([]);
const categories = ref([]);
const selectedCategories = ref([]);

axios.get('/products/')
  .then((response) => {
    products.value = response.data;
  })
  .catch((error) => {
    console.error("Ошибка при получении продуктов: ", error);
  });

axios.get('/categories/')
  .then((response) => {
    categories.value = response.data;
  })
  .catch((error) => {
    console.error("Ошибка при получении категорий: ", error);
  });

const filteredProducts = computed(() => {
  if (selectedCategories.value.length === 0) {
    return products.value;
  }
  return products.value.filter((product) =>
    selectedCategories.value.includes(product.category_id)
  );
});

const toggleCategory = (category) => {
  const index = selectedCategories.value.indexOf(category);
  if (index === -1) {
    selectedCategories.value.push(category);
    console.log(`Добавлена категория: ${category}`);
  } else {
    selectedCategories.value.splice(index, 1);
    console.log(`Удалена категория: ${category}`);
  }
  console.log(`Выбранные категории: ${selectedCategories.value.join(', ')}`);
};
</script>

<template>
  <Carusel />
  <main>
    <h1 class="title">Каталог</h1>
    <div class="catalog-container">
      <section class="catalog-filter">
        <div class="filter-container">
          <div><b>Категория продукта</b></div>
          <ul>
            <li v-for="(category, index) in categories" :key="index">
              <label>
                <input
                  type="checkbox"
                  :value="category.id"
                  @change="toggleCategory(category.id)"
                />
                {{ category.name }}
              </label>
            </li>
          </ul>
        </div>
      </section>

      <section class="row list_products content">
        <div class="product_column" v-for="product in filteredProducts" :key="product.id">
          <Item :product="product" />
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
  min-height: 29.9vh;
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
.content {
  flex: 1;
}
</style>
