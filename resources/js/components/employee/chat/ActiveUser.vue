<template>
  <div class="d-flex flex-column p-3">
    <div class="d-flex justify-content-center p-3">
      <h5>All User</h5>
    </div>
    <div class="container user">
      <p
        class="user-name m-2 bg-info p-2"
        v-for="(user, i) in userList"
        :key="i"
        @click="$emit('select-user', i)"
      >
        {{ user.name }}
      </p>
    </div>
  </div>
</template>
<script>
export default {
  name: "ActiveUser",
  props: ["userList"],
  data() {
    return {};
  },
  methods: {},
};
</script>
<style scoped>
.user-name {
  cursor: pointer;
}
</style>