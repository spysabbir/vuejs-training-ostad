import { reactive } from 'vue'
import { authStore } from './store'
const wishlist = reactive({
    items: [],
    isWishListed(product) {
        return true;
    },
    async fetchWishlist() {
    },
    async toggleWishlist(product) {
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