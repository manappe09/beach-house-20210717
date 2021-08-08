export const initProductsData = {
  data() {
    return {
      products: {},
    };
  },
  mounted() {
    this.products = products;
  },
  computed: {
    kakigoriProducts() {
      let kakigoriProductsObj = {};

      Object.keys(this.products)
        .filter((key) => key.match(/^K/))
        .forEach(
          (key) => (kakigoriProductsObj[key] = this.products[key])
        );

      return kakigoriProductsObj;
    },
  },
};

// @TODO: Vuexでかき氷のみのデータを返したり、アップセルの状態管理など、外出しできる処理を外へ
