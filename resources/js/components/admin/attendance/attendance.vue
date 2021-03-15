<template>
  <div>
    <component v-bind:is="'navbar'"></component>
    <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a
            class="nav-link active"
            id="home-tab"
            data-toggle="tab"
            href="#home"
            role="tab"
            aria-controls="home"
            aria-selected="true"
            >Assign Mac</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            id="profile-tab"
            data-toggle="tab"
            href="#profile"
            role="tab"
            aria-controls="profile"
            aria-selected="false"
            >See Attendance</a
          >
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div
          class="tab-pane fade show active"
          id="home"
          role="tabpanel"
          aria-labelledby="home-tab"
        >
          <assign-mac />
        </div>
        <div
          class="tab-pane fade"
          id="profile"
          role="tabpanel"
          aria-labelledby="profile-tab"
        >
          <attendance-result />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import assignMac from "./assign_mac";
import attendanceResult from "./show_result";
export default {
  data() {
    return {};
  },
  components: {
    assignMac,
    attendanceResult,
  },
  mounted() {},
  methods: {},
};
</script>

<style>
</style>