export default {
    namespaced: true,
    state:{
        category: {},
        products: [],
        cost: [],

    },
    getters:{
        category(state){
            return state.category
        },
        products(state){
            return state.products
        },
        cost(state){
            return state.cost
        },
    },
    mutations:{
        SET_CATEGORY (state, value) {
            state.category = value
        },
        SET_PRODUCTS (state, value) {
            state.products = value
        },
        SET_COST (state, value) {
            state.cost = value
        },

    },
    actions:{
        setCost({commit}, cost){
            console.log(cost)
            commit('SET_COST',cost)
        },
        setCategory({commit}, category){
            console.log("category")
            console.log(category)
            commit('SET_CATEGORY',category)
        },
        filterProducts({commit, state, rootState}){
            const params = {}

            if (state.cost.length > 0){
                params.cost  = state.cost
            }

            if (state.category != null){
                params.category_id = state.category.id
            }

            return axios.get('/api/products', {params}).then(({data}) =>{
                const products = data.data.body;

                products.forEach(data => {
                    data.count = 0;
                    rootState.cart.products.forEach(product => {
                        if (product.id === data.id){
                            data.count = product.count;
                        }
                    });
                });
                console.log('ipdae')
                commit('SET_PRODUCTS',products)
            })
        }
    }
}