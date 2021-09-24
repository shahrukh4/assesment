<template>
  <!-- Rating Section Begins -->
  <div class="rating-section" role="button" @mouseleave="handleBlur">
    <div v-if="!selected">
      <i
        class="fa-star ml-1 mr-1"
          :class="[
          {'far': true},
          {'fas': (mouse.hovering && figure.current >= n)},
          `is-${figure.current}`
        ]"
        @mouseover="handleHover(n)"
        @click="handleRatingSubmit(n)"
        v-for="n in 5"
      >
      </i>
    </div>
    <div v-else>
      <i
        class="fa-star ml-1 mr-1"
        :class="[
          {'far': true},
          {'fas': selected >= n},
          `is-${selected}`
        ]"
        @mouseover="handleHover(n)"
        v-for="n in 5"
      >
      </i>
    </div>
  </div> <!-- Rating Section Ends -->
</template>

<script>
  export default {
    name: 'Rating',
    props: {
      rating: {
        type: Number,
        default: 0
      }
    },
    data () {
      return {
        mouse: {
          hovering: true
        },
        figure: {
          current: 0,
          selected: 0
        }
      }
    },
    computed: {
      selected () {
        return this.figure.selected || this.rating
      }
    },
    methods: {
      /**
       * Handle mouse hover on icons
       * @params number rating
       * @returns void
       */
      handleHover (rating) {
        console.log(rating)
        this.figure.current = rating
        this.figure.selected = 0
      },
      /**
       * Handle mouse out from icons
       * @returns void
       */
      handleBlur () {
        this.figure.current = 0
      },
      /**
       * Handle rating submission
       * @params number rating
       * @returns void
       */
      handleRatingSubmit (rating) {
        this.figure.selected = rating
        this.$emit('rated', {
          rating
        })
      }
    }
  }
</script>

<style lang="scss" scoped>
  $ratings: 1, 2, 3, 4, 5;

  $ratings: (
      1: #E8441F,
      2: #ffb128,
      3: #ffd02d,
      4: #73d7a8,
      5: #31b744
  );

  @each $index, $rating in $ratings {
    .is-#{$index} {
      color: $rating;
    }
  }
</style>