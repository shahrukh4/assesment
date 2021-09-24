<template>
  <!-- Food Card Section Begins -->
  <div class="food-card-section">
    <div class="card mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg m-1">
      <div class="card-body">
        <img class="rounded w-100 mb-2" :src="`https://lorempixel.com/400/200/food?${food.id}`" :alt="food.name">
        <h5 class="card-title">{{food.name}}</h5>
        <p class="card-text">{{food.description.substring(0, 100)}}</p>
        <!-- Action Section Begins -->
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="quantity">Quanity</label>
              <input type="number" class="form-control" min="1" step="1" v-model.number="order.quantity">
            </div>
          </div>
          <div class="col d-flex justify-content-start align-items-end">
            <div class="form-group w-100">
              <button
                type="button"
                class="btn btn-primary w-100"
                :disabled="!order.quantity || order.booking"
                @click="handleOrderFood(food.id)"
              >
                {{order.booking ? 'Placing...' : 'Place order'}}
              </button>
            </div>
          </div>
        </div> <!-- Action Section Ends -->
      </div>
    </div>
  </div> <!-- Food Card Section Ends -->
</template>

<script>
  import { mapActions } from 'vuex'
  import {ORDER_FOOD} from '@/js/store/action.types'

  export default {
    name: 'Food',
    props: {
      food: {
        required: true,
        type: Object
      }
    },
    data () {
      return {
        order: {
          quantity: 0,
          booking: false
        }
      }
    },
    methods: {
      ...mapActions({
        orderFood: `order/${ORDER_FOOD}`
      }),
      /**
       * Handle food orders
       * @param number foodId
       * @return void
       */
      handleOrderFood (foodId) {
        this.order.booking = true
        this.orderFood({
          foodId: foodId,
          userId: this.$userId,
          quantity: this.order.quantity
        })
        .then(() => {
          this.order.booking = false
          this.order.quantity = 0
          window.location.href = 'orders'
        })
      }
    }
  }
</script>

<style lang="scss" scoped>

</style>