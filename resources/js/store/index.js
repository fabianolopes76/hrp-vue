import Vue from 'vue'
import Vuex from 'vuex'

import category from './modules/category'
import mutations from './mutations'
import getters from './getters'
import * as actions from './actions'

Vue.use(Vuex);

export const store = new Vuex.store({
    modules: {
        category
    },
    state: {

    },
    mutations,
    actions,
    getters
})
