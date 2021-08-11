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
    context.commit("setKakigoriProducts", obj);
  }
};

export default {
  namespace: true,
  state,
  getters,
  mutations,
  actions
}