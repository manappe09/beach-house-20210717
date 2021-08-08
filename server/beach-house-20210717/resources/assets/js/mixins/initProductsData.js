export const initProductsData = {
  data() {
    return {
      products: {},
    }
  },
  mounted() {
    this.products = products;
    console.log('mixinが読み込まれました');
  }
}