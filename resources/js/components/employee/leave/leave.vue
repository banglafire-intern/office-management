<template>
    <div>
        <component v-bind:is="'navbar'"></component>
        <div class="text-center">
            <h2>Request Leave</h2>
        </div>
        <div>
            <form action="">
                <div>Current Policy:</div>
                <div>
                    <select
                        class="form-select"
                        aria-label="Default select example"
                    >
                        <option selected>Type of Leave</option>
                    </select>
                    <div>Available Days:</div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style></style>
