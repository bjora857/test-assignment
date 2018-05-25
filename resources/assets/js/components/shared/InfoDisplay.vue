<template>
    <div v-show="message"
         v-text="message"
         class="af-info-display"
    />
</template>

<script>
  export default {
    name: "info-display",
    props: ['message']
  }
</script>
