import {createRouter, createWebHistory} from "vue-router";

const LoginComponent = () => import('@/components/auth/LoginComponent.vue')
const RegisterComponent = () => import('@/components/auth/RegisterComponent.vue')
const HomeComponent = () => import('@/components/HomeComponent.vue')
const ShopComponent = () => import('@/components/shop/ShopComponent.vue')
const CartComponent = () => import('@/components/shop/CartComponent.vue')
const OrdersComponent = () => import('@/components/shop/OrdersComponent.vue')
const OrderProductsComponent = () => import('@/components/shop/OrderProductsComponent.vue')

//Setting up Routes
const routes = [

    {
        path: '/',
        component: HomeComponent,
        name: 'home',
        children: [
            {
                path: '/',
                component: ShopComponent,
                name: 'shop',
                meta: {
                    middleware: "guest",
                    title: `Shop`
                }
            },
            {
                path: '/login',
                component: LoginComponent,
                name: 'login',
                meta: {
                    middleware: "guest",
                    title: `Login`
                }
            },
            {
                path: '/register',
                component: RegisterComponent,
                name: 'register',
                meta: {
                    middleware: "guest",
                    title: `Login`
                }
            },
            {
                path: '/cart',
                component: CartComponent,
                name: 'cart',
                meta: {
                    middleware: "guest",
                    title: `Cart`
                }
            },
            {
                path: '/orders',
                component: OrdersComponent,
                name: 'orders',
                meta: {
                    middleware: "guest",
                    title: `Orders`
                }
            },
            {
                path: '/products/:id',
                component: OrderProductsComponent,
                name: 'products',
                meta: {
                    middleware: "guest",
                    title: `Products`
                }
            },
        ]
    },
];

//Registering routes
const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes
});

/*
router.beforeEach((to, from, next) => {
    document.title = to.meta.title
    if (to.meta.middleware == "guest") {
        if (store.state.auth.authenticated) {
            next({ name: "dashboard" })
        }
        next()
    } else {
        if (store.state.auth.authenticated) {
            next()
        } else {
            next({ name: "login" })
        }
    }
})
*/
export default router