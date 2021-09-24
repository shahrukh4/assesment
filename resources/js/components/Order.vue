<template>
  <div class="order-section">
    <div class="card mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg m-1">
      <div class="card-body pb-0">
        <img class="rounded w-100 mb-2" :src="`https://lorempixel.com/400/200/food?${order.food.id}`" :alt="order.food.name">
        <h5 class="card-title">{{order.food.name}}</h5>
        <p class="card-text">{{order.food.description.substring(0, 100)}}</p>
        <div class="row">
          <div class="col"><b>Quantities</b></div>
          <div class="col text-right"><b>{{order.quantity}}</b></div>
        </div>
        <hr class="mt-0">
        <!-- Action Section Begins -->
        <label for="rating"><b>Ratings</b></label>
        <hr class="mt-0">
        <div class="row">
          <div class="col">
            For Food
          </div>
          <div class="col">
            <Rating :rating="(order.reviews.length > 0) ? order.reviews[0].rating : 0" @rated="storeRatings('food', $event)"/>
          </div>
        </div>
        <div class="row">
          <div class="col">
            For Service
          </div>
          <div class="col">
            <Rating :rating="(order.reviews.length > 0) ? order.reviews[1].rating : 0" @rated="storeRatings('service', $event)"/>
          </div>
        </div>
        <hr>
        <div class="row" v-if="!order.reviews.length && (rating.food && rating.service)">
          <div class="col d-flex justify-content-start align-items-end">
            <div class="form-group w-100">
              <button
                type="button"
                class="btn btn-primary w-100"
                :disabled="rating.inProcess || !(rating.food && rating.service)"
                @click="handleRating"
              >
                {{rating.inProcess ? 'Rating...' : 'Submit Rating'}}
              </button>
            </div>
          </div>
        </div> <!-- Action Section Ends -->
      </div>
    </div>
  </div>
</template>

<script>
  import Rating from '@/js/components/Rating'
  import { mapActions } from 'vuex'
  import {GET_FOOD_DATA, SUBMIT_ORDER_RATING} from '@/js/store/action.types'

  export default {
    name: 'Order',
    components: {Rating},
    props: {
      order: {
        required: true,
        type: Object
      }
    },
    data () {
      return {
        rating: {
          inProcess: false,
          food: 0,
          service: 0
        }
      }
    },
    methods: {
      ...mapActions({
        getFoods: `food/${GET_FOOD_DATA}`,
        submitRating: `rating/${SUBMIT_ORDER_RATING}`
      }),
      /**
       * Handle food orders
       * @param string ratingType
       * @return void
       */
      storeRatings (ratingType, $event) {
        this.rating[ratingType] = $event.rating
      },
      /**
       * Handle rating of food orders
       * @return void
       */
      handleRating () {
        this.rating.inProcess = true
        this.submitRating(Object.assign(
            this.rating,
            this.$delete(this.rating, 'inProcess'),
            {orderId: this.order.id, userId: this.$userId}
        ))
        .then(() => {
          this.rating.inProcess = false
          this.getFoods()
        })
        this.$emit('ratingSubmitted')
      }
    }
  }
</script>

<style scoped>

</style>