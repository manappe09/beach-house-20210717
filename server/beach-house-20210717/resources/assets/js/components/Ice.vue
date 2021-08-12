<template>
    <div class="ice__wrapper">
      <h3>かき氷</h3>
      <!-- store: {{ demoProduct }} -->
      <hr>
      <ul class="ice__list">
        <li v-for="(kakigori, key) in kakigoriProducts" :key="key" class="ice__item">
          <!-- かき氷のみ表示 -->
            <img :src="`/images/${kakigori.image}`" alt="" width="120" height="120"><br>
            <input :id="key" type="checkbox" :value="kakigori.name" v-model="selectedIceLists">
            <label :for="key">{{ kakigori.name }}</label>
            <p><small>{{ kakigori.text }}</small></p>
        </li>
      </ul>
      <h4>ご一緒にこちらもいかがですか？</h4>
      <hr>
      <template v-if="upsellResultObj">
        <div id="upsell_target" class="ice__upsell">
          <img :src="`/images/${upsellResultObj.image}`" alt="" width="150" height="150"><br>
          <p>{{ upsellResultObj.name }}</p>
          <p><small>{{ upsellResultObj.text }}</small></p>
        </div>
      </template>
      <div class="vld-parent">
          <loading :active.sync="isLoading" :is-full-page="fullPage"></loading>  
      </div>
    </div>
</template>

<script>
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
import { initProductsData } from '../mixins/initProductsData';

export default {
  mixins: [initProductsData],
  data() {
    return {
      selectedIceLists: [],
      totalPrice: 0,
      upsellResultValue: null,
      upsellTests: [
        `array.includes('ブルーハワイ') && array.includes('メロン')`,
      ],
      upsellResultList: [
        'T01',
        'T02',
        'T03',
        'G01',
        'G02',
        'G03',
      ],
      upsellResultObj: null,
      isLoading: false,
      fullPage: true,
      demoProduct: '',
      kakigoriProducts: {},
      products: {},
    }
  },
  components: {
    Loading
  },
  mounted() {
    // store demo
    this.demoProduct = this.$store.state.products.demoProduct;
    this.$store.dispatch('increment', 2);

    this.products = this.$store.state.products.products;
    this.kakigoriProducts = this.$store.state.products.kakigoriProducts;
  },
  computed: {},
  watch: {
    selectedIceLists() {
      console.log('リストが更新されました');

      // 今後処理色々することも考えて、商品名でなく商品ごとのオブジェクトで持ったほうがいいかも…。
      this.isIncludedBluehawaii = this.checkIncludeOneProduct(this.selectedIceLists, 'ブルーハワイ');

      // 合計金額の更新
      this.updateTotalPrice(this.selectedIceLists);

      // アップセル結果の表示
      this.updateUpsellResultValue(this.selectedIceLists);
    },
    upsellResultValue() {
      this.runLoadingAnimation();
      this.goUpsellArea();
    }
  },
  methods: {
    checkIncludeOneProduct(array, product) {
      return array.includes(product);
    },
    updateTotalPrice(array) {
      // 商品コード以下のプロパティ群を配列として持って、nameが選択済みアイテムと一致してたらそのpriceをリストに入れる。
      // その商品が何かは特定せず、あくまで名前に対応する価格をリストアップする。
      const productsPropertyLists = Object.values(this.products);
      let selectedPropertyLists = [];
      let selectedProductsPrices = [];
      let totalPrice = 0;

      // @TODO: 処理分ける / 価格リストを取得するパート
      array.forEach(selectedProduct => {
        selectedPropertyLists.push(...productsPropertyLists.filter(property => property.name === selectedProduct));
      })

      selectedPropertyLists.forEach(selectedProperty => {
        selectedProductsPrices.push(Number(selectedProperty.price));
      })

      // @TODO: 処理分ける / 価格合計を計算するパート
      selectedProductsPrices.forEach(selectedProductsPrice => {
        totalPrice += selectedProductsPrice;
      })

      this.totalPrice = totalPrice;
    },
    updateUpsellResultValue(array) {
      let upsellResult;
      if (array.includes('ブルーハワイ') && array.includes('イチゴ')) {
        upsellResult = 0;
      } else if (array.includes('メロン') && array.includes('チョコレート')) {
        upsellResult = 1;
      } else if (array.includes('魅惑のレインボー')) {
        upsellResult = 2;
      } else if (array.length === 1) {
        upsellResult = 3;
      } else if (this.totalPrice <= 500 && this.totalPrice >= 1) {
        upsellResult = 4;
      } else if (this.totalPrice <= 1000 && this.totalPrice >= 501) {
        upsellResult = 5;
      }

      this.upsellResultValue = upsellResult;

      this.showUpsellResult();
    },
    showUpsellResult() {
      this.upsellResultObj = this.products[this.upsellResultList[this.upsellResultValue]];
    },
    goUpsellArea() {
      this.$nextTick(() => {
        const target = document.getElementById('upsell_target');
        
        const targetPosition = target?target.getBoundingClientRect().y:0;
        const targetHeight = target?target.getBoundingClientRect().height:0;
        const upsellArea = targetPosition + targetHeight;

        window.scrollTo({
          top: upsellArea,
          behavior: 'smooth'
        })
      })
    },
    runLoadingAnimation() {
      this.isLoading = true;
      // simulate AJAX
      setTimeout(() => {
          this.isLoading = false
      }, 300)
    },
  }
}
</script>