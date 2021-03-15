<template>
  <div class="mt-5">
    <h4>Assign MAC address</h4>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Designation</th>
          <th scope="col">MAC Address</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(user, i) in user_list" :key="i">
          <th scope="row">{{ i + 1 }}</th>
          <td>{{ user.name }}</td>
          <td>{{ user.designation }}</td>
          <td v-if="!user.is_editing">
            {{ user.mac_address ? user.mac_address : "N/A" }}
            <button class="ml-3 btn btn-primary" @click="editMacAddress(user)">
              Edit
            </button>
          </td>
          <td v-else style="position: relative">
            <div style="position: absolute; top: 5px">
              <input type="text" v-model="user.mac_address" />
              <button
                class="ml-3 btn btn-primary"
                @click="saveMacAddress(user)"
              >
                Save
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <div v-if="is_more" class="text-center">
      <button class="btn btn-primary" @click="loadMoreUser">Load More</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user_list: [],
      page_no: 1,
      loading: false,
      is_more: true,
    };
  },
  mounted() {
    this.getUserData();
  },
  methods: {
    getUserData() {
      if (this.loading) return;
      let url = "/api/attendances?per_page=10&page=" + this.page_no;
      this.loading = true;
      axios
        .get(url)
        .then((res) => {
          console.log(res);
          this.user_list = [...this.user_list, ...res.data.data];
          if (res.data.data.length < 10) this.is_more = false;
          this.page_no++;
          this.loading = false;
        })
        .catch((err) => {
          this.loading = false;
          console.log(err);
        });
    },
    loadMoreUser() {
      this.getUserData();
    },
    editMacAddress(user) {
      this.$set(user, "is_editing", true);
    },
    saveMacAddress(user) {
      let url = "/api/change-mac";
      axios
        .post(url, { id: user.id, mac: user.mac_address })
        .then(() => {
          this.$set(user, "is_editing", false);
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style>
</style>