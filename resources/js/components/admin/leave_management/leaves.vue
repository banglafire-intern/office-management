<template>
  <div>
    <div class="d-flex justify-content-between">
      <h4>Leaves: {{ policy.name ? policy.name : "" }}</h4>
      <div>
        <button class="btn btn-primary" @click.prevent="addNewLeave">
          Add new
        </button>
      </div>
    </div>
    <div v-if="showAddNewLeave">
      <form class="leave-input-container" @submit.prevent="insertNewLeave">
        <div class="form-group">
          <label for="name">Name</label>
          <input id="name" type="text" v-model="newLeaveName" />
        </div>
        <div class="form-group">
          <label for="payment_type">payment_type</label>
          <input id="payment_type" type="text" v-model="newLeavePaymentType" />
        </div>
        <div class="form-group">
          <label for="days">days</label>
          <input id="days" type="text" v-model="newLeaveDays" />
        </div>
        <button class="btn btn-primary" type="submit">Save</button>
      </form>
    </div>
    <div v-for="(leave, i) in allLeaves" :key="i">
      <div class="bg-info p-2 my-2">
        <div>
          {{ leave.name }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["policy"],
  data() {
    return {
      allLeaves: [],
      showAddNewLeave: false,
      newLeaveName: "",
      newLeavePaymentType: "",
      newLeaveDays: "",
    };
  },
  mounted() {
    this.getLeavesData();
  },
  watch: {
    policy: {
      handler() {
        this.getLeavesData();
      },
    },
  },
  methods: {
    async getLeavesData() {
      console.log("ID: ", this.policy.policy_id);
      let res = await axios.get("/api/policies/" + this.policy.policy_id);
      //console.log(res);
      this.allLeaves = res.data;
    },
    async insertNewLeave() {
      const response = await axios.post("/api/leaves", {
        name: this.newLeaveName,
        payment_type: this.newLeavePaymentType,
        days: this.newLeaveDays,
        policy_id: this.policy.policy_id,
      });
      console.log(response.data);
      this.showAddNewLeave = !this.showAddNewLeave;
    },
    addNewLeave() {
      this.showAddNewLeave = !this.showAddNewLeave;
    },
  },
};
</script>

<style>
.leave-input-container {
  padding: 20px;
}
</style>