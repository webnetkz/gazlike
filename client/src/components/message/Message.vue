<template>
  <p class="message">{{ text }}</p>
</template>

<script>
  export default {
    name: 'MessageComponent',

    props: {
    text: {
      type: String,
      //required: true
    },
    type: {
      type: String,
      default: 'info'
    }
  }
  }
</script>

<style scoped>
  .message {
    position: fixed;
    height: 100px;
    border: 3px solid red;
    z-index: 99;
  }
</style>
