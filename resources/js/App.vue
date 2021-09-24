<template>
  <div class="container">
    <router-view />
  </div>
</template>

<script>
  import {Foods} from '@/js/views'
  export default {
    name: 'App',
    components: {Foods}
  }
</script>