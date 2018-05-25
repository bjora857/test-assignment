<template>
    <form v-on:submit.prevent="addEmployee">
        <div class="block h-12 mb-4">
            <error-display :message="errorMessage"/>
            <info-display :message="infoMessage"/>
        </div>
        <div class="mb-4 w-1/3">
            <label>Employee Name</label>
            <input class="af-text-input"
                   type="text"
                   v-model="employee.name"
                   placeholder="Name"
                   required
            />
        </div>
        <div class="w-1/3 mb-4">
            <label>Company</label>
            <company-select
                    :companies="companies"
                    :selected="employee.company"
                    :placeholder="'Select company'"
                    v-on:selected:company="employee.company = $event"
            />
        </div>
        <div class="w-1/3">
            <button
                    class="af-submit-button"
                    type="submit"
                    v-text="'Add Employee'"
            />
        </div>
    </form>
</template>

<script>
  import axios from 'axios';

  export default {
    name: "CreateEmployee",

    data() {
      return {
        employee: {
          name: null,
          company: null
        },
        companies: [],
        errorMessage: null,
        infoMessage: null,
      }
    },
    created() {
      this.fetchCompanies();
    },

    methods: {
      fetchCompanies() {
        axios.get('/companies')
          .then(res => {
            this.companies = res.data;
          })
          .catch(error => {
            console.warn("Could not fetch companies");
          });
      },
      addEmployee() {
        this.errorMessage = null;
        this.infoMessage = null;

        axios.post('/employees', this.employee).then(res => {
          this.infoMessage = this.employee.name + ' was added.';
          this.employee.name = null;
          this.employee.company = null;

        }).catch(error => {
          this.displayErrorMessage(error)
        });
      },
      displayErrorMessage(error) {
        this.errorMessage = 'Something went wrong'
      }
    }
  }
</script>
