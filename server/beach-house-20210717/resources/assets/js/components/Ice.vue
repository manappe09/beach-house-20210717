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
import { mapState } from 'vuex';
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
    }
  },
  components: {
    Loading
  },
  computed: {
    ...mapState({
      products: state => state.products.products,
      kakigoriProducts: state => state.products.kakigoriProducts,
    })
  },
  watch: {
    selectedIceLists() {
      console.log('リストが更新されました');

      // 選択商品リストの更新
      this.$store.dispatch('updateSelectedIceLists', this.selectedIceLists);

      // 合計金額の更新 -> 処理はstoreへ
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
    async showUpsellResult() {
      // storeに選択された商品を送り、返す商品を計算した結果を取得
      await this.$store.dispatch('updateUpsellResultValue', this.selectedIceLists);
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