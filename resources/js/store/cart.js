export default {
    namespaced: true,
    state:{
        products: [],
        count: 0

    },
    getters:{
        products(state){
            return state.products
        },
    },
    mutations:{
        ADD_PRODUCT (state, value) {
            console.log(value)
            let newProduct = true;
            state.products.forEach(data => {
                if (data.id === value.id){
                    data.count++;
                    newProduct = false;
                }
            });

            if (newProduct){
                state.products.push({
                    ...value,
                    count: 1
                });
            }
            console.log(value)

            state.count++;
            console.log(value)
        },
        REMOVE_PRODUCT (state, id) {
            let removeProduct = true;

            state.products.forEach(data => {
                if ( data.id === id){
                    data.count--;
                    removeProduct = data.count <= 0;
                    state.count--;
                }
            });
            if (removeProduct){
                state.products = state.products.filter( data => data.id !== id);
            }

        },
        REMOVE_FROM_CART (state, id){
            state.products = state.products.filter( data =>{
                if (data.id === id) {
                    state.count-=data.count
                }
                return  data.id !== id;
            });

        }

    },
    actions:{
        addProduct({commit, state}, product){
            commit('ADD_PRODUCT',product)
        },
        removeProduct({commit, state}, id){
            commit('REMOVE_PRODUCT',id)

        },
        removeFromCart({commit, state}, id){
            console.log('vfs')
            commit('REMOVE_FROM_CART',id)

        },

    }
}