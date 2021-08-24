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
  updateSelectedIceLists({ commit }, selectedIceLists) {
    commit("updateSelectedIceLists", selectedIceLists);
  },
  updateTotalPrice({ commit }) {
    const selectedIceLists = [...this.state.upsell.selectedIceList];
    const products = {...this.state.products.products};
    let totalPrice = 0;

    selectedIceLists.forEach((selectedIceKey) => {
      totalPrice += Number(products[selectedIceKey].price);
    });

    commit("updateTotalPrice", totalPrice);
  },
  updateUpsellResultValue({ dispatch, commit }, selectedIceLists) {
    let upsellResultValue;
    const totalPrice = this.state.upsell.totalPrice;

    if (selectedIceLists.includes("K01") && selectedIceLists.includes("K02")) {
      upsellResultValue = 0;
    } else if (
      selectedIceLists.includes("K03") &&
      selectedIceLists.includes("K04")
    ) {
      upsellResultValue = 1;
    } else if (selectedIceLists.includes("K05")) {
      upsellResultValue = 2;
    } else if (selectedIceLists.length === 1) {
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
