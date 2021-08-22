<template>
    <div class="ice__wrapper">
      <h3>かき氷</h3>
      <hr>
      <ul class="ice__list">
        <li v-for="(kakigori, key) in kakigoriProducts" :key="key" class="ice__item">
          <!-- かき氷のみ表示 -->
            <img :src="`/images/${kakigori.image}`" alt="" width="120" height="120"><br>
            <input :id="key" type="checkbox" :value="key" v-model="selectedIceLists">
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
    this.products = this.$store.state.products.products;
    this.kakigoriProducts = this.$store.state.products.kakigoriProducts;
  },
  computed: {},
  watch: {
    selectedIceLists() {
      console.log('リストが更新されました');

      // 選択商品リストの更新
      this.$store.dispatch('updateSelectedIceLists', this.selectedIceLists);

      // 合計金額の更新 -> 処理はstoreへ
      // この辺り、mappingできるのでは
      this.$store.dispatch('updateTotalPrice');

      // アップセル結果の表示
      this.showUpsellResult();
    },
    upsellResultValue() {
      // @TODO: storeと組み合わせる
      this.runLoadingAnimation();
      this.goUpsellArea();
    }
  },
  methods: {
    checkIncludeOneProduct(array, product) {
      return array.includes(product);
    },
    async showUpsellResult() {
      await this.$store.dispatch('updateUpsellResultValue', this.selectedIceLists);
      const upsellResultValue = this.$store.state.upsell.upsellResultValue;

      this.upsellResultObj = await this.$store.state.upsell.upsellResultObj;

      this.runLoadingAnimation();
      this.goUpsellArea();
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