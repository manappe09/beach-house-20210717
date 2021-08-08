import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

import products from './products';

const store = new Vuex.Store({
  modules: {
    products,
  },
  state: {
    count: 0,
  },
  mutations: {
    increment(state, number) {
      state.count += number;
    },
  },
  actions: {
    increment(context, number) {
      context.commit('increment', number);
    }
  },
});

export default store