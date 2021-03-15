<template>
    <div>
        <component v-bind:is="'navbar'"></component>
        <div class="container mt-5">
            <h4>Employee list</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Email</th>
                        <th scope="col">Joining Date</th>
                        <th scope="col">Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(user, i) in user_list" :key="i">
                        <th scope="row">{{ i + 1 }}</th>
                        <td>{{ user.name }}</td>
                        <td>{{ user.designation }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.joining_date }}</td>
                        <td>{{ user.salary }}</td>
                    </tr>
                </tbody>
            </table>
            <div v-if="is_more" class="text-center">
                <button class="btn btn-primary" @click="loadMoreUser">
                    Load More
                </button>
            </div>
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
            is_more: true
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
                .then(res => {
                    console.log(res);
                    this.user_list = [...this.user_list, ...res.data.data];
                    if (res.data.data.length < 10) this.is_more = false;
                    this.page_no++;
                    this.loading = false;
                })
                .catch(err => {
                    this.loading = false;
                    console.log(err);
                });
        },
        loadMoreUser() {
            this.getUserData();
        }
    }
};
</script>

<style></style>
