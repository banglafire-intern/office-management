<template>
  <div>
    <div class="container">
      <div class="row justify-content-around">
        <div class="col-1">Username</div>
        <div class="col-1">Policy</div>
        <div class="col-1">Leave</div>
        <div class="col-1">Requested</div>
        <div class="col-1">Remaining</div>
        <div class="col-1">From</div>
        <div class="col-1">To</div>
        <div class="col-1">Selection</div>
      </div>
    </div>
    <div class="container leave">
      <div class="row justify-content-around">
        <div class="col-1">User_001</div>
        <div class="col-1">Junior Developer</div>
        <div class="col-1">Sick</div>
        <div class="col-1">10</div>
        <div class="col-1">5</div>
        <div class="col-1">11/03/2021</div>
        <div class="col-1">20/03/2021</div>
        <div class="col-1">
          <div v-if="toggleout">
            <button
              v-on:click="handleSubmitout"
              type="button"
              class="btn btn-outline-dark btn-sm rounded mx-3"
            >
              Approve
            </button>
            <button
              v-on:click="togglein = togglein"
              type="button"
              class="btn btn-outline-dark btn-sm rounded mx-3"
            >
              Reject
            </button>
          </div>
          <div v-else>
            <div v-if="togglein">
              <p>Approved</p>
            </div>
            <div v-else>
              <p>Rejected</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      togglein: "false",
      toggleout: "true",
    };
  },
  methods: {
    toggleAdd() {
      this.showAdd = !this.showAdd;
    },

    handleSubmitout: function () {
      // console.log(this.$refs.item.value)
      this.toggleout = !this.toggleout;
      //   this.title = this.$refs.item.value;
      this.handleSubmit();
    },
    handleSubmit: function () {
      // console.log(this.$refs.item.value)
      this.togglein = true;
      console.log(this.togglein);
      //   this.title = this.$refs.item.value;
    },
  },
};
</script>

<style scoped>
.leave {
  background-color: #e8e1fc;
}
</style>