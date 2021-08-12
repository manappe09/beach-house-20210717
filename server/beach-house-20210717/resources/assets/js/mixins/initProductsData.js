// 商品データの初期化処理は、多くのページで必要なのでmixinで共通化
export const initProductsData = {
  mounted() {
    // productsは、blade内で定義しConst値の内容が代入されたグローバル変数。$productsとかにしたほうがいいかなぁ。
    this.$store.dispatch("setProducts", products);
    // 1個にまとめたほうがいいのか、分かりやすさ重視でそのままがいいのか……。
    this.$store.dispatch("setKakigoriProducts", products);
  },
};
