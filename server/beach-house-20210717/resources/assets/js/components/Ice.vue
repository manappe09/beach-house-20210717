<template>
    <div class="ice__wrapper">
      <h3>かき氷</h3>
    <hr>
    <ul class="ice__list">
      <li v-for="(product, key) in products" :key="key" class="ice__item">
          <img :src="`/images/${product.image}`" alt="" width="150" height="200"><br>
          <input :id="key" type="checkbox" :value="product.name" v-model="selectedIceLists">
          <label :for="key">{{ product.name }}</label>
          <p><small>{{ product.text }}</small></p>
      </li>
      <!-- <li class="ice__item"> -->
          <!-- <input type="checkbox" name="{{ $item['name'] }}" id="{{ $item['name'] }}">
          <label for="{{ $item['name'] }}">{{ $item['name'] }}</label> -->
      <!-- </li> -->
    </ul>
    <div class="ice__selected">
      選択されたかき氷のリスト： {{ selectedIceLists }}
      <br>
      この中にブルーハワイは含まれてる？ => {{ isIncludedBluehawaii }}
    </div>
    <h4>ご一緒にこちらもいかがですか？</h4>
    <hr>
    <ul class="ice__list">
      <li class="ice__item">
          <img src="/images/miffy.jpg" alt="" width="150" height="200"><br>
          <!-- <input type="checkbox" name="{{ $item['name'] }}" id="{{ $item['name'] }}">
          <label for="{{ $item['name'] }}">{{ $item['name'] }}</label> -->
      </li>
    </ul>
    </div>
</template>

<script>
export default {
  // props: {
  //   products: Array
  // },
  data() {
    return {
      products: [],
      selectedIceLists: [],
      isIncludedBluehawaii: false,
    }
  },
  mounted() {
    this.products = products;
    console.log(this.products);
    console.log(this.products.K01);
  },
  watch: {
    selectedIceLists() {
      console.log('リストが更新されました');
      this.isIncludedBluehawaii = this.checkIncludeOneProduct(this.selectedIceLists, 'ブルーハワイ');
    }
  },
  methods: {
    checkIncludeOneProduct(array, product) {
      return array.includes(product);
    }
  }
  // mounted() {
  //   console.log(this.products);
  //   console.log(this.products.K01);
  //   console.log(this.products[0]);
  // }
}
</script>