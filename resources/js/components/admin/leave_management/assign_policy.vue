<template>
  <div class="container p-3">
    <div class="row justify-content-lg-center">
      <div class="col col-xs-1">Username</div>
      <div class="col-xxl-auto">
        <div v-if="toggle">
          <select
            name="LeaveType"
            @change="onChange($event)"
            class="form-control form-control-md"
            v-model="key"
          >
            <!-- <button
              class="btn btn-secondary dropdown-toggle"
              type="button"
              id="dropdownMenuButton"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Policies
            </button> -->
            <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> -->
            <option value="">Select Policies</option>
            <option class="dropdown-item" value="1st Year">1st year</option>
            <option class="dropdown-item" value="2">2nd year</option>
            <!-- <option class="dropdown-item">Junior Developer</option>
              <option class="dropdown-item">Senior Developer</option> -->
            <!-- </div> -->
            <!-- </select>
            <option value="1">Annual Leave/ Off-Day</option>
            <option value="2">On Demand Leave</option>
             -->
          </select>
        </div>
        <div v-else>
          <p>Policy</p>
        </div>
      </div>

      <div class="col col-xs-1">
        <div v-if="toggle">
          <button
            v-on:click="handleSubmit"
            type="button"
            class="btn btn-outline-dark btn-sm rounded mx-3"
          >
            Save
          </button>
          <button
            v-on:click="toggle = !toggle"
            type="button"
            class="btn btn-outline-dark btn-sm rounded mx-3"
          >
            Cancel
          </button>
        </div>
        <div v-else>
          <button
            v-on:click="toggle = !toggle"
            type="button"
            class="btn btn-outline-dark btn-sm rounded mx-3"
          >
            Edit
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "AssignedPolicy",
  props: {},
  data() {
    return {
      toggle: false,
      key: "",
    };
  },
  components: {},
  mounted() {
    //const button = document.querySelector("#drop");
    // const tooltip = document.querySelector('#tooltip');
    //createPopper(button);
  },

  methods: {
    toggleAdd() {
      this.showAdd = !this.showAdd;
    },

    onChange(event) {
      console.log(event.target.value);
    },

    handleSubmit: function () {
      // console.log(this.$refs.item.value)
      this.toggle = !this.toggle;
      this.title = this.$refs.item.value;
    },
  },
};
</script>

<style>
</style>