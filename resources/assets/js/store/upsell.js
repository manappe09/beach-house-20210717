const state = {
  selectedIceList: [],
  totalPrice: 0,
  upsellResultValue: null,
  upsellResultList: [
    "T01",
    "T02",
    "T03",
    "G01",
    "G02", 
    "G03",
  ],
  upsellResultObj: null,
};

const getters = {};

const mutations = {
  updateSelectedIceList(state, selectedIceList) {
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
  updateSelectedIceList({ commit }, selectedIceList) {
    commit("updateSelectedIceList", selectedIceList);
  },
  updateTotalPrice({ commit }) {
    const selectedIceList = [...this.state.upsell.selectedIceList];
    const products = {...this.state.products.products};
    let totalPrice = 0;

    selectedIceList.forEach((selectedIceKey) => {
      totalPrice += Number(products[selectedIceKey].price);
    });

    commit("updateTotalPrice", totalPrice);
  },
  updateUpsellResultValue({ dispatch, commit }, selectedIceList) {
    let upsellResultValue;
    const totalPrice = this.state.upsell.totalPrice;

    if (selectedIceList.includes("K01") && selectedIceList.includes("K02")) {
      upsellResultValue = 0;
    } else if (
      selectedIceList.includes("K03") &&
      selectedIceList.includes("K04")
    ) {
      upsellResultValue = 1;
    } else if (selectedIceList.includes("K05")) {
      upsellResultValue = 2;
    } else if (selectedIceList.length === 1) {
      upsellResultValue = 3;
    } else if (totalPrice <= 500 && totalPrice >= 1) {
      upsellResultValue = 4;
    } else if (totalPrice <= 1000 && totalPrice >= 501) {
      upsellResultValue = 5;
    }

    commit("updateUpsellResultValue", upsellResultValue);

    dispatch("updateUpsellResultObj", upsellResultValue);
  },
  updateUpsellResultObj({ commit }, upsellResultValue) {
    const products = this.state.products.products;
    const upsellResultList = this.state.upsell.upsellResultList;

    const upsellResultKey = upsellResultList[upsellResultValue];
    const upsellResultObj = products[upsellResultKey];
    
    commit("updateUpsellResultObj", upsellResultObj);
  },
};

export default {
  namespace: true,
  state,
  getters,
  mutations,
  actions,
};
