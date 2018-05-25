<template>
    <div>
        <label v-if="company">{{ company }} Employees</label>
        <div v-for="employee in employees">
            <div class="flex justify-between py-2  border-b-2 border-grey border-gray border-solid">
                <div>
                    {{ employee.name }}
                </div>
                <div class="bg-red hover:bg-red-dark text-white text-sm font-bold py-1 px-2 rounded cursor-pointer"
                     @click="removeEmployee(employee.id)">x
                </div>
            </div>
        </div>

        <div v-if="employees.length === 0 && company">{{ company }} has no employees</div>
    </div>
</template>

<script>
  import axios from 'axios';

  export default {
    name: "company-employees",
    'props': ['company', 'employees', 'removeEmployee'],
  }
</script>
