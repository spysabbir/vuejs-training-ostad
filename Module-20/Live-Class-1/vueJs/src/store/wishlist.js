import { reactive } from 'vue'
import { authStore } from './store'
const wishlist = reactive({
    items: [],
    isWishListed(product) {
        return this.items.includes(product.id)
    },
    async fetchWishlist() {
        const res = authStore.fetchProtectedApi('/api/wishlist', {}, 'GET')
        res.then(response => {
            this.items = response.wishlist
        })
    },
    async toggleWishlist(product) {
        const status = this.isWishListed(product)
        if (status) {
            const res = authStore.fetchProtectedApi(`/api/wishlist/${product.id}`, {}, 'DELETE')
            res.then(response => {
                this.items = this.items.filter(item => item !== product.id)
            })
        } else {
            const res = authStore.fetchProtectedApi('/api/wishlist', { product_id: product.id }, 'POST')
            res.then(response => {
                this.items.push(product.id)
            })
        }
    },
    getIcon(product) {
        if (this.isWishListed(product)) {
            return '//img.icons8.com/?size=60&id=59805&format=png'
        } else {
            return '//img.icons8.com/?size=96&id=85038&format=png'
        }
    },
    clearItems(){
        this.items = []
    }
})
export { wishlist }