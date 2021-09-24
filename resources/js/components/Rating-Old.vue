<template>
  <div v-if="screenWidth < 1024 && textOnTouch" :class="fillClass(stars)" class="margin-left-20">
    {{ stars }}
  </div>
  <ul v-else-if="useFa"
      :class="[{'width-180': setRatingContWidth},{ 'shrink': shrink }, { 'shrink-more': shrinkMore }, { 'enlarge-mobile': enlargeMobile }, { 'business-widget': businessStatsWidget }, { 'reviews-widget': reviewsWidget }]">
    <li v-for="n in 5" :class="fillClass(n)">
      <i class="fas fa-star" :class="`${css}`" aria-hidden="true"></i>
    </li>
  </ul>
  <div v-else
       :class="[{'width-180': setRatingContWidth},{ 'shrink': shrink }, { 'shrink-more': shrinkMore }, { 'enlarge-mobile': enlargeMobile }, { 'business-widget': businessStatsWidget }, { 'reviews-widget': reviewsWidget }]">
    <!--<img :src="`/static/img/ratings/${stars}-star.png`" :alt="`star-rating-${stars}`" v-if="stars > 0">-->
    <img
      :src="`/images/ratings/${stars}-star.png`"
      :alt="`star-rating-${stars}`"
      :srcset="`/images/ratings/${stars}-star.png, /images/ratings/${stars}-star-2x.png 2x, /images/ratings/${stars}-star-3x.png 3x`"
      v-if="stars > 0"
    >
  </div>
</template>

<script>
  export default {
    name: 'RatingOld',
    props: {
      stars: {
        type: Number,
        default: 0
      },
      useFa: {
        type: Boolean,
        default: false
      },
      css: {
        type: String,
        default: ''
      },
      shrink: {
        type: Boolean,
        default: false
      },
      shrinkMore: {
        type: Boolean,
        default: false
      },
      enlargeMobile: {
        type: Boolean,
        default: false
      },
      businessStatsWidget: {
        type: Boolean,
        default: false
      },
      reviewsWidget: {
        type: Boolean,
        default: false
      },
      setRatingContWidth: {
        type: [String, Boolean],
        default: true
      },
      textOnTouch: {
        type: Boolean,
        default: false
      }
    },
    methods: {
      fillClass (index) {
        let colour = 'grey'

        if (this.stars === 5) {
          colour = 'green'
        } else if (index === 1 && this.stars === 1) {
          colour = 'red'
        } else if (this.stars > 1 && index <= this.stars) {
          if (this.stars === 4) {
            colour = 'light-green'
          }
          if (this.stars === 3) {
            colour = 'yellow'
          }
          if (this.stars === 2) {
            colour = 'orange'
          }
        }
        return colour
      }
    }
  }
</script>

<style scoped>
  ul {
    list-style-type: none;
    margin-left: 0 !important;
    margin-top: 0 !important;
  }

  ul.width-180 {
    width: 180px;
  }

  .shrink {
    width: 120px;
    margin-left: auto;
    margin-right: auto;
  }

  .shrink.enlarge-mobile {
    width: 150px;
  }

  .shrinkMore {
    width: 110px;
    margin-left: auto;
    margin-right: auto;
  }

  li {
    display: inline;
    font-size: 1.5em;
    margin-left: 3px;
  }

  .business-widget {
    font-size: 1rem;
    width: 150px !important;
  }

  .business-widget > li:not(:first-child) {
    margin-left: 8px;
  }

  .reviews-widget {
    font-size: 0.6rem;
    width: 120px !important;
  }

  .reviews-widget > li {
    font-size: 1.2em;
    margin-left: 0;
  }

  .reviews-widget > li:not(:first-child) {
    margin-left: 8px;
  }

  @media screen and (max-width: 768px) {
    ul {
      width: 135px;
    }

    li {
      font-size: 1.2em;
    }
  }

  @media screen and (max-width: 767px) {
    ul {
      width: 108px;
    }

    li {
      font-size: 1.2em;
    }
  }
</style>
