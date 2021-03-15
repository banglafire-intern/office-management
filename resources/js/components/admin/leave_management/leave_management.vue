<template>
  <div>
    <component v-bind:is="'navbar'"></component>
    <div class="d-flex justify-content-evenly">
      <div class="bg-info fifty">
        <div v-if="showAddNewPolicy">
          <form
            class="d-flex justify-content-between"
            @submit.prevent="addNewPolicy"
          >
            <input type="text" v-model="newPolicyName" />
            <button type="submit">Save</button>
          </form>
        </div>
        <div class="d-flex justify-content-between">
          <div>Policies</div>
          <div>
            <button @click="addNewPolicy">Add new</button>
          </div>
        </div>
        <div v-for="(policy, i) in allPolicies" :key="i">
          <form class="d-flex justify-content-between">
            <button @click.prevent="renderLeaves(policy)">
              {{ policy.name }}
            </button>
            <div>
              <button>Edit</button>
            </div>
          </form>
        </div>
      </div>

      <div class="bg-danger fifty">
        <div v-if="showAddNewLeave">
          <form
            class="d-flex justify-content-between"
            @submit.prevent="insertNewLeave"
          >
            <label for="name">Name</label>
            <input id="name" type="text" v-model="newLeaveName" />
            <label for="payment_type">payment_type</label>
            <input
              id="payment_type"
              type="text"
              v-model="newLeavePaymentType"
            />
            <label for="days">days</label>
            <input id="days" type="text" v-model="newLeaveDays" />
            <button type="submit">Save</button>
          </form>
        </div>

        <div class="d-flex justify-content-between">
          <div>Leaves: {{ policy.name ? policy.name : "" }}</div>
          <div>
            <button @click.prevent="addNewLeave">Add new</button>
          </div>
        </div>
        <div v-for="(leave, i) in allLeaves" :key="i">
          <form class="d-flex justify-content-between">
            <div>
              {{ leave }}
            </div>
            <div>
              <button>Edit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      allPolicies: [],
      allLeaves: [],
      policy: {},
      showAddNewPolicy: false,
      showAddNewLeave: false,
      newPolicyName: "",
      newLeaveName: "",
      newLeavePaymentType: "",
      newLeaveDays: "",
    };
  },
  async mounted() {
    const response = await axios.get("http://localhost:8000/api/policies");
    console.log(response.data);
    this.allPolicies = response.data;
  },
  methods: {
    async renderLeaves(policy) {
      this.policy = policy;
      console.log(policy);
      // const response = await axios.post("");
    },
    async getAllPolicies() {
      const response = await axios.get("http://localhost:8000/api/policies");
      const data = response.data;
      console.log(data);
      this.allPolicies = data;
      console.log(this.allPolicies);
    },
    async addNewPolicy() {
      const response = await axios.post("http://localhost:8000/api/policies", {
        name: this.newPolicyName,
      });
      console.log(response.data);
    },
    async insertNewLeave() {
      if (!this.policy) {
        alart("please select policy type");
        return;
      }
      console.log(this.policy.policy_id);
      console.log(this.newLeaveName);
      console.log(this.newLeavePaymentType);
      console.log(this.newLeaveDays);
      const response = await axios.post("http://localhost:8000/api/leaves", {
        name: this.newLeaveName,
        payment_type: this.newLeavePaymentType,
        days: this.newLeaveDays,
        policy_id: this.policy.policy_id,
      });
      console.log(response.data);
    },
    addNewLeave() {
      this.showAddNewLeave = !this.showAddNewLeave;
      console.log(this.showAddNewleave);
    },
    addNewPolicy() {
      this.showAddNewPolicy = !this.showAddNewPolicy;
    },
  },
};
</script>

<style>
.fifty {
  width: 50%;
}
</style>
