const state = {
  demoProduct: 'demoProduct2',
  kakigoriProducts: {},
}

const getters = {}

const mutations = {
  setKakigoriProducts(state, obj) {
    state.kakigoriProducts = obj;
  }
}

const actions = {
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