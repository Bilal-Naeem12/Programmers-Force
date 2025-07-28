import axios from 'axios'
import { defineStore } from 'pinia'

export const useProductStore = defineStore('product', {
  state: () => ({
    products: [],
    product: {},
    loading: false,
    error: null,
  }),

  actions: {
    // ✅ regular function to preserve `this`
    fetchAllProducts() {
      this.loading = true
      this.error = null
      axios
        .get('https://dummyjson.com/products')
        .then((res) => {
          this.products = res.data.products
        })
        .catch((err) => {
          console.error(err)
          this.error = 'Failed to fetch products'
        })
        .finally(() => {
          this.loading = false
        })
    },

    async fetchProduct(id) {
      this.loading = true
      this.error = null
      try {
        const res = await axios.get(`https://dummyjson.com/products/${id}`)
        this.product = res.data
        window.scrollTo({ top: 0, behavior: 'smooth' })
      } catch (err) {
        this.error = 'Product not found.'
        this.product = null
      } finally {
        this.loading = false
      }
    },
  },

  getters: {
    // optional: e.g., filter or sort
    productCount: (state) => state.products.length,
  },
})
