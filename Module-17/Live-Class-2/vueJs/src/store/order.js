import { reactive } from 'vue'
import { authStore } from './store'
import { cart } from './cart'
const order = reactive({
    orders: [],
    async fetchOrders() {
        const res = authStore.fetchProtectedApi('/api/orders')
        res.then(response => {
            this.orders = response.map(order => {
                return {
                    toggleProduct: false,
                    ...order,
                }
            })
            this.orders.reverse()
        })
    },
    async placeOrder(totalPrice, items) {
        const products = Object.values(items).map(item => {
            return {
                product_id: item.product.id,
                quantity: item.quantity,
                price: item.product.price
            }
        })
        const order = {
                total_amount: totalPrice,
                products: products,
            }
        
        const res = authStore.fetchProtectedApi('/api/orders', order, 'POST')
        res.then(response => {
            cart.emptyCart()
        })

    }
})

export { order }