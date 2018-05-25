<template>
    <div>

    <div v-for="employee in unemployed" class="mb-4">
        <label class="w-1/2">{{ employee.name }}</label>
        <company-select
                :companies="companies"
                :placeholder="'Select employer'"
                :selected="null"
                v-on:selected:company="companySelected(employee, $event)"
        />
    </div>
    </div>
</template>

<script>
  import axios from 'axios';

  export default {
    name: "unemployed",
    data() {
      return {
        employees: [],
        companies: []
      }
    },
    created() {
        this.fetchCompanies();
        this.fetchEmployees();
    },
    computed: {
      unemployed() {
        return this.employees.filter(employee => {
            return employee.company === null;
        });
      }
    },
    methods: {
      companySelected(employee, company) {
        const payload = {
          employee: employee.id,
          company: company
        };

        axios.post('/company-employees', payload).then(res => {
          this.fetchEmployees();
        }).catch()
      },


      fetchEmployees() {
        axios.get('/employees').then(res => {
          this.employees = res.data;
        });
      },
      fetchCompanies() {
        axios.get('/companies').then(res => {
          this.companies = res.data;
        })
      }
    }
  }
</script>
