import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

import state from './main/state'
import getters from './main/getters'
import mutations from './main/mutations'
import qualifiers from "./modules/qualifiers";

export default new Vuex.Store({
    state: state,
    getters: getters,
    mutations: mutations,
    modules: qualifiers
})
