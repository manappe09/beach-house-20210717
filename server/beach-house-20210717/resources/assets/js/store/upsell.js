const state = {
  selectedIceList: [],
  totalPrice: 0,
  upsellResultValue: null,
  upsellResultList: [],
  upsellResultObj: null,
};

const getters = {};

const mutations = {
  updateSelectedIceLists(state, selectedIceList) {
    state.selectedIceList = selectedIceList;
  },
  updateTotalPrice(state, totalPrice) {
    state.totalPrice = totalPrice;
  },
  updateUpsellResultValue(state, upsellResultValue) {
    state.upsellResultValue = upsellResultValue;
  },
  updateUpsellResultList(state, upsellResultList) {
    state.upsellResultList = upsellResultList;
  },
  updateUpsellResultObj(state, upsellResultObj) {
    state.upsellResultObj = upsellResultObj;
  },
};

const actions = {
  updateSelectedIceLists(context, selectedIceList) {
    // watchで更新するので不要かも…。やっぱいる
    context.commit("updateSelectedIceLists", selectedIceList);
  },
  updateTotalPrice(context, totalPrice) {},
  updateUpsellResultValue(context, upsellResultValue) {},
  updateUpsellResultList(context, upsellResultList) {},
  updateUpsellResultObj(context, upsellResultObj) {},
};

export default {
  namespace: true,
  state,
  getters,
  mutations,
  actions,
};
