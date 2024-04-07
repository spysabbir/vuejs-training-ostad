import {reactive, computed} from 'vue'
import {order} from './order'
const cart = reactive({
    items:{},
    totalCartItems:computed(()=>{
        let total = 0
        for(let id in cart.items){
            total += cart.items[id].quantity
        }
        return total
    }),
    totalPrice:computed(()=>{
        let total = 0
        for(let id in cart.items){
            total += cart.items[id].product.price * cart.items[id].quantity
        }
        return parseFloat(total.toFixed(2))
    }),
    addItem(product){
        if(this.items[product.id]){
            this.items[product.id].quantity++
        }else{
            this.items[product.id] = {
                product,
                quantity:1
            }
        }
        this.saveCartInLocalStorage()
    },
    removeItem(product){},
    emptyCart(){
        this.items = {}
        this.saveCartInLocalStorage()
    },
    saveCartInLocalStorage(){
        localStorage.setItem('cart', JSON.stringify(this.items))
    },
    getCartFromLocalStorage(){
        this.items = JSON.parse(localStorage.getItem('cart')) || {}
    },
    checkout(){
        order.placeOrder(this.totalPrice, this.items)
    }
})
cart.getCartFromLocalStorage()
export {cart}