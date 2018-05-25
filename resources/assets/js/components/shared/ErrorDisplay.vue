<template>
    <div v-show="message"
         v-text="message"
         class="af-error-display"
    />
</template>

<script>
  export default {
    name: "ErrorDisplay",
    props: ['message']
  }
</script>
