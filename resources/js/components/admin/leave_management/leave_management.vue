<template>
  <div>
    <component v-bind:is="'navbar'"></component>
    <div class="container mt-5">
      <div class="row">
        <div class="col-6">
          <div class="d-flex justify-content-between mb-3">
            <h4>Policies</h4>
            <div v-if="!showAddNewPolicy">
              <button class="btn btn-primary" @click="addNewPolicy">
                Add new
              </button>
            </div>
            <div v-else>
              <form
                class="d-flex justify-content-between"
                @submit.prevent="insertNewPolicy"
              >
                <input type="text" v-model="newPolicyName" />
                <button class="btn btn-primary" type="submit">Save</button>
              </form>
            </div>
          </div>
          <div v-for="(policy, i) in allPolicies" :key="i">
            <div
              class="bg-info p-2 my-2"
              style="cursor: pointer"
              @click="renderLeaves(policy)"
            >
              {{ policy.name }}
            </div>
          </div>
        </div>

        <div class="col-6">
          <leaves v-if="selected_policy" :policy="selected_policy" />
        </div>
      </div>
      <div class="mt-5">
        <h3 class="text-center">Assign Policy</h3>
        <assign-policy />
      </div>
      <div class="mt-5">
        <h3 class="text-center">Leave Request</h3>
        <leave-request />
      </div>
    </div>
  </div>
</template>

<script>
import leaves from "./leaves";
import assignPolicy from "./assign_policy";
import leaveRequest from "./leave_request";
export default {
  components: {
    leaves,
    assignPolicy,
    leaveRequest,
  },
  data() {
    return {
      allPolicies: [],
      selected_policy: null,
      showAddNewPolicy: false,
      newPolicyName: "",
    };
  },
  async mounted() {
    const response = await axios.get("/api/policies");
    console.log(response.data);
    this.allPolicies = response.data;
  },
  methods: {
    async renderLeaves(policy) {
      this.selected_policy = policy;
    },
    async getAllPolicies() {
      const response = await axios.get("/api/policies");
      const data = response.data;
      console.log(data);
      this.allPolicies = data;
      console.log(this.allPolicies);
    },
    async insertNewPolicy() {
      const response = await axios.post("/api/policies", {
        name: this.newPolicyName,
      });
      console.log(response.data);
      this.showAddNewPolicy = !this.showAddNewPolicy;
    },
    addNewPolicy() {
      this.showAddNewPolicy = !this.showAddNewPolicy;
    },
  },
};
</script>

<style>
</style>
