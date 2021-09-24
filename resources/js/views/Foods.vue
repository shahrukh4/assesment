<template>
  <!-- Food Section Begins -->
  <div class="food-section mt-5">
    <div class="grid grid-cols-1 md:grid-cols-2">
      <Food :key="food.id" :food="food" v-for="food in foods.foods" />
    </div>
  </div> <!-- Food Section Ends -->
</template>

<script>
  import {Food} from '@/js/components'
  import { mapState, mapActions } from 'vuex'
  import {GET_FOOD_DATA} from '@/js/store/action.types'

  export default {
    name: 'Foods',
    components: {Food},
    computed: {
      ...mapState({
        foods: state => state.food
      })
    },
    created() {
      this.getFoods()
    },
    methods: {
      ...mapActions({
        getFoods: `food/${GET_FOOD_DATA}`
      })
    }
  }
</script>

<style lang="scss" scoped>

</style>