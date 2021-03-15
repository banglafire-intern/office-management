<template>
    <div>
        <component v-bind:is="'navbar'"></component>
        <div>
            <div>
                <h2 class="text-center">Leave Request</h2>
            </div>
            <form @submit.prevent="processForm">
                <div>
                    Current Policy:
                </div>
                <div>
                    Type of leave
                    <select
                        v-model="type_of_leave"
                        class="form-select"
                        aria-label="Default select example"
                    >
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div>
                    Start date
                    <input
                        type="date"
                        name="start_time"
                        v-model="start_date"
                        id="start_time"
                    />
                </div>
                <div>
                    End Date
                    <input
                        type="date"
                        name="end_time"
                        id="end_time"
                        v-model="end_date"
                    />
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            type_of_leave: "",
            start_date: "",
            end_date: ""
        };
    },
    methods: {
        processForm: async function() {
            console.log({
                type: this.type_of_leave,
                start_date: this.start_date
            });
            // const response = await axios.post(
        }
    }
};
</script>

<style></style>
