<template>
  <div>
    <component v-bind:is="'navbar'"></component>
    <div class="container mt-5">
      <div class="row">
        <div class="col-4">
          <div class="card" style="width: 18rem">
            <img
              class="card-img-top"
              src="/img/attendance-icon.jpg"
              alt="Card image cap"
            />
            <div class="card-body">
              <h5 class="card-title">Employee Attendance</h5>
              <router-link to="/admin/attendance" class="btn btn-primary"
                >See attendance</router-link
              >
            </div>
          </div>
        </div>

        <div class="col-4">
          <div class="card" style="width: 18rem">
            <img
              class="card-img-top"
              src="/img/leave.png"
              alt="Card image cap"
            />
            <div class="card-body">
              <h5 class="card-title">Leave Management</h5>
              <router-link to="/admin/leave-management" class="btn btn-primary"
                >See Leaves</router-link
              >
            </div>
          </div>
        </div>

        <div class="col-4">
          <div class="card" style="width: 18rem">
            <img
              class="card-img-top"
              src="/img/chat.png"
              alt="Card image cap"
            />
            <div class="card-body">
              <h5 class="card-title">Chat</h5>
              <router-link to="/admin/chat" class="btn btn-primary"
                >See chat</router-link
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
.card-img-top {
  height: 220px;
  object-fit: contain;
}
</style>