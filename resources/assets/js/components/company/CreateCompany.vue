<template>
    <div>
        <div class="block h-12 mb-4">
            <error-display :message="errorMessage"/>
            <info-display :message="infoMessage"/>
        </div>

        <div class="flex">
            <div class="w-1/3 px-4">
                <form v-on:submit.prevent="addCompany">

                    <label>Add new Company</label>
                    <input class="af-text-input"
                           id="employeeName"
                           type="text"
                           v-model="company.name"
                           placeholder="Name"
                           required
                    />
                    <button
                            class="af-submit-button mt-4"
                            type="submit"
                            v-text="'Add Company'"
                    />
                </form>
            </div>

            <div class="w-1/3 px-4">
                <label>All companies</label>
                <company-select
                        :companies="companies"
                        :placeholder="'Select company to see employees'"
                        v-on:selected:company="companySelected($event)"
                />
            </div>
            <div class="w-1/3 px-4">
                <company-employees :company="selectedCompany" :employees="employees" :removeEmployee="removeEmployee"/>
            </div>
        </div>
    </div>
</template>

<script>
  import axios from 'axios';

  export default {
    name: "create-company",
    data() {
      return {
        company: {
          name: null
        },
        companies: [],
        employees: [],
        selectedCompany: null,
        errorMessage: null,
        infoMessage: null
      }
    },

    created() {
      this.fetchCompanies();
    },

    methods: {
      addCompany() {
        this.errorMessage = null;

        axios.post('/companies', this.company)
          .then(res => {
            this.fetchCompanies();
            this.infoMessage = this.company.name + ' was added as company';
            this.company.name = null;
          })
          .catch((error) => {
            this.errorMessage = 'Could not create company: ' + this.company.name;
          });
      },
      companySelected(a) {
        this.selectedCompany = a;
        this.fetchEmployees();
      },

      fetchEmployees() {
        axios.get('/company-employees/' + this.selectedCompany).then(res => {
          this.employees = res.data;
        }).catch(error => {
        });
      },
      removeEmployee(id) {
        axios.delete('/company-employees/' + id).then(res => {
            this.fetchEmployees();
            this.infoMessage = 'Employee was removed';
          }
        ).catch(error => {
        });
      },

      fetchCompanies() {
        axios.get('/companies')
          .then(res => {
            this.companies = res.data;
          }).catch(error => {
        });
      },
    }
  }
</script>
