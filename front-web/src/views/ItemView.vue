<script setup>
import Carusel from '@/components/Carusel/Carusel.vue';
const buy = () => {
    alert('Товар добавлен в корзину')
    //send request to API
}
</script>

<template>
    <Carusel/>
    <main>
        <div><h2>Лосьон для тела La Sultane de Saba AYURVEDIQUE- AMBRE VANILLE PATCHOULI</h2></div>
        <section class="row">
            <section class="list_product">
                <div class="product_photo"><img src="https://pcdn.goldapple.ru/p/p/19760322898/web/696d67416464315f36636161383738633331373034653762623965323036366138643764333034378dc895e6aaf0a42fullhd.webp" /> </div>
                
            </section>
            <section class="product">
                <div>
                    <h2>Описание</h2>
                    <p class="description">
                        Лосьон, в основе формулы которого лежат натуральные масла ши, сладкого миндаля и кокосовое молоко, имеет легкую сатиновую текстуру, мгновенно питает кожу, укрепляет и делает ее нежнее.
                        Чарующий шлейфовый аромат лосьона надолго остается на теле и способен заменить парфюм: завораживающая теплая амбра, окутывающая ваниль и многогранный аромат пикантного пачули, аромат настолько манящий, что опьяняет и дарит ощущение комфорта, сравнимое разве что с объятиями любимого человека.
                        <br>Объем: 200мл
                    </p>
                </div>
                <div class="row vertical-center">
                    <div class="price">7 153₽</div>
                    <div>
                        <button @click="buy">
                            Купить
                        </button>
                    </div>
                </div>
            </section>
        </section>
    </main>
</template>