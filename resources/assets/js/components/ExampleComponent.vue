<template>
    <div class="container">
        <div class="mb-4">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
                Employee Name
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="employeeName" type="text" placeholder="Name">
        </div>

    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
