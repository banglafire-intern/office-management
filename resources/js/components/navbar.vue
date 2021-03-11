<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Banglafire</a>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <template v-if="this.$store.state.role == 'admin'">
          <li class="nav-item active">
            <router-link tag="a" class="nav-link" to="/admin/home"
              >Home</router-link
            >
          </li>
          <li class="nav-item active">
            <router-link tag="a" class="nav-link" to="/admin/attendance"
              >Attendance</router-link
            >
          </li>
          <li class="nav-item active">
            <router-link tag="a" class="nav-link" to="/admin/employee-profile"
              >Employee Profile</router-link
            >
          </li>
          <li class="nav-item active">
            <router-link tag="a" class="nav-link" to="/admin/leave-management"
              >Leave Management</router-link
            >
          </li>
          <li class="nav-item active">
            <router-link tag="a" class="nav-link" to="/admin/chat"
              >Chat</router-link
            >
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/logout">Logout</a>
          </li>
        </template>
        <!-- Employee -->
        <template v-if="this.$store.state.role == 'employee'">
          <li class="nav-item active">
            <router-link tag="a" class="nav-link" to="/home">Home</router-link>
          </li>
          <li class="nav-item active">
            <router-link tag="a" class="nav-link" to="/profile"
              >Profile</router-link
            >
          </li>
          <li class="nav-item active">
            <router-link tag="a" class="nav-link" to="/leave"
              >Leave</router-link
            >
          </li>
          <li class="nav-item active">
            <router-link tag="a" class="nav-link" to="/chat">Chat</router-link>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/logout">Logout</a>
          </li>
        </template>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  created() {
    //console.log(this.$store.state.role);
  },
};
</script>

<style>
</style>