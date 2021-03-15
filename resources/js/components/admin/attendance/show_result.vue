<template>
  <div class="mt-5">
    <h4>Employee Attendance</h4>
    <form action="">
      <div class="form-group">
        <label for="usr">Attendance on:</label>
        <input
          type="date"
          v-model="date"
          @change="searchAttendance"
          class="form-control"
          id="usr"
        />
      </div>
      <div v-if="isLoading" class="text-center">Loading...</div>
    </form>

    <table v-if="users.length > 0" class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Start Time</th>
          <th scope="col">End Time</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(user, i) in users" :key="i">
          <th scope="row">{{ i + 1 }}</th>
          <td>{{ user.user_name }}</td>
          <td>{{ user.start_time }}</td>
          <td>{{ user.end_time }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isLoading: false,
      date: "",
      users: [],
    };
  },
  methods: {
    searchAttendance() {
      this.isLoading = true;
      let url = "/api/search-attendances/" + this.date;
      axios
        .get(url)
        .then((res) => {
          //console.log(res);
          this.users = res.data.data;
          this.isLoading = false;
        })
        .catch((err) => {
          console.log(err);
          this.isLoading = false;
        });
    },
  },
};
</script>

<style>
</style>