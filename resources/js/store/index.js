import { createStore } from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import auth from '@/store/auth'
import filter from '@/store/filter'
import cart from '@/store/cart'
const store = createStore({
    plugins:[
        createPersistedState()
    ],
    modules:{
        auth,
        filter,
        cart
    }
})
export default store