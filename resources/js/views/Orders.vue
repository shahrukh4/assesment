<template>
  <!-- Order Section Begins -->
    <div class="order-section mt-2">
      <h2>Your Orders</h2>
      <hr>
      <div class="row">
        <div class="col-4" v-for="order in orders.orders">
          <Order :key="order.id" :order="order" @ratingSubmitted="getOrders" />
        </div>
      </div>
    </div> <!-- Order Section Ends -->
</template>

<script>
  import {Order} from '@/js/components'
  import { mapState, mapActions } from 'vuex'
  import {GET_FOOD_DATA} from '@/js/store/action.types'

  export default {
    name: 'Orders',
    components: {Order},
    computed: {
      ...mapState({
        orders: state => state.order
      })
    },
    created() {
      this.getOrders()
    },
    methods: {
      ...mapActions({
        getOrders: `order/${GET_FOOD_DATA}`
      })
    }
  }
</script>

<style scoped>

</style>