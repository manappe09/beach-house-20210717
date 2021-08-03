<template>
    <div class="ice__wrapper">
      <h3>かき氷</h3>
    <hr>
    <ul class="ice__list">
      <li v-for="(product, key) in products" :key="key" class="ice__item">
        <!-- かき氷のみ表示 -->
        <template v-if="key.match(/^K/)">
          <img :src="`/images/${product.image}`" alt="" width="150" height="200"><br>
          <input :id="key" type="checkbox" :value="product.name" v-model="selectedIceLists">
          <label :for="key">{{ product.name }}</label>
          <p><small>{{ product.text }}</small></p>
        </template>
      </li>
    </ul>
    <!-- <div class="ice__selected">
      <p>アップセル結果：{{ upsellResultValue }}番の商品です！</p>
    </div> -->
    <h4>ご一緒にこちらもいかがですか？</h4>
    <hr>
    <template v-if="upsellResultObj">
      <img :src="`/images/${upsellResultObj.image}`" alt="" width="150" height="200"><br>
      <input :id="key" type="checkbox" :value="upsellResultObj.name" v-model="selectedIceLists">
      <label :for="key">{{ upsellResultObj.name }}</label>
      <p><small>{{ upsellResultObj.text }}</small></p>
    </template>
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
      upsellResultObj: null
    }
  },
  mounted() {
    this.products = products;
  },
  watch: {
    selectedIceLists() {
      console.log('リストが更新されました');

      // 今後処理色々することも考えて、商品名でなく商品ごとのオブジェクトで持ったほうがいいかも…。
      this.isIncludedBluehawaii = this.checkIncludeOneProduct(this.selectedIceLists, 'ブルーハワイ');

      // 合計金額の更新
      this.updateTotalPrice(this.selectedIceLists);

      // アップセル結果の表示
      this.updateUpsellResultValue(this.selectedIceLists);
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

      // console.log(selectedPropertyLists);
      // console.log(selectedProductsPrices);

      // @TODO: 処理分ける / 価格合計を計算するパート
      selectedProductsPrices.forEach(selectedProductsPrice => {
        totalPrice += selectedProductsPrice;
      })

      this.totalPrice = totalPrice;
    },
    updateUpsellResultValue(array) {
      let upsellResult;
      if (array.includes('ブルーハワイ') && array.includes('メロン')) {
        upsellResult = 0;
      // } else if (array.includes('メロン') && array.includes('K04')) {
      //   upsellResult = 2;
      } else if (array.includes('メロン')) {
        upsellResult = 1;
      } else if (this.totalPrice >= 300) {
        upsellResult = 2;
      }
      this.upsellResultValue = upsellResult;

      this.showUpsellResult();
    },
    showUpsellResult() {
      this.upsellResultObj = this.products[this.upsellResultList[this.upsellResultValue]];
    },
  }
}
</script>