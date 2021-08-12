const state = {
  demoProduct: 'demoProduct2',
  products: {},
  kakigoriProducts: {},
}

const getters = {}

const mutations = {
  setProducts(state, obj) {
    state.products = obj;
  },
  setKakigoriProducts(state, obj) {
    state.kakigoriProducts = obj;
  }
}

const actions = {
  setProducts(context, obj) {
    context.commit('setProducts', obj);
  },
  setKakigoriProducts(context, obj) {
    let kakigoriProductsObj = {};

    Object.keys(obj)
      .filter((key) => key.match(/^K/))
      .forEach((key) => (kakigoriProductsObj[key] = obj[key]));

    context.commit("setKakigoriProducts", kakigoriProductsObj);
  }
};

export default {
  namespace: true,
  state,
  getters,
  mutations,
  actions
}