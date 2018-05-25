<template>
    <select
            class="af-select"
            v-model="selectedCompany"
            @change="$emit('selected:company', selectedCompany)"
    >
        <option disabled v-text="placeholder"/>
        <option v-for="company in companies" v-text="company"/>
    </select>
</template>

<script>
  export default {
    name: "company-select",
    props: ['companies', 'selected', 'placeholder'],
    data() {
      return {
        selectedCompany: this.selected
      }
    },
    watch: {
      selected(val) {
        this.selectedCompany = val;
      }
    }
  }
</script>
