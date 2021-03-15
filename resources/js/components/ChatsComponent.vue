<template>
    <div class="row">
        <div class="col-8">
            <div class="card card-default">
                <div class="card-header">Messages</div>
                <div class="card-body p-0">
                    <ul
                        class="list-unstyled"
                        style="height:300px; overflow-y:scroll"
                    >
                        <li
                            class="p-2"
                            v-for="(message, index) in messages"
                            :key="index"
                        >
                            <strong>{{ "hi" }}</strong>
                            <!-- <strong>{{ message.user.name }}</strong> -->
                            {{ message.message }}
                        </li>
                    </ul>
                </div>

                <input
                    type="text"
                    @keyup.enter="sendMessages"
                    v-model="newMessage"
                    name="message"
                    placeholder="Enter your message"
                    class="form-control"
                />
            </div>
            <span class="text-muted">user is typing...</span>
        </div>

        <div class="col-4">
            <div class="card card-default">
                <div class="card-header">Active Users</div>
                <div class="card-body">
                    <ul>
                        <li class="py-2">Admin</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["user"],

    data() {
        return {
            messages: [],
            newMessage: ""
        };
    },

    created() {
        this.fetchMessages();
        Echo.join("Chat").listen("MessageSent", event => {
            this.messages.push(event.message);
        });
    },

    methods: {
        fetchMessages() {
            axios.get("messages").then(response => {
                this.messages = response.data;
            });
        },

        sendMessages() {
            this.messages.push({
                user: this.user,
                message: this.newMessage
            });
            axios.post("messages", { message: this.newMessage });

            this.newMessage = "";
        }
    }
};
</script>
