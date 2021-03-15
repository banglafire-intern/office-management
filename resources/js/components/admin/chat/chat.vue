<template>
  <div>
    <component v-bind:is="'navbar'"></component>
    <div class="container mt-5">
      <div class="row">
        <div class="col-8">
          <chat-box :userList="userList[selectedUser]" />
        </div>
        <div class="col-4">
          <active-user
            :userList="userList"
            v-on:select-user="changeSelectUser"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ActiveUser from "./ActiveUser";
import chatBox from "./chat_box";
export default {
  data() {
    return {
      userList: [
        {
          name: "Test User 1",
          chats: [
            {
              from: "0",
              msg: "Hello",
            },
            {
              from: "1",
              msg: "Hi",
            },
            {
              from: "0",
              msg: "XD",
            },
          ],
        },
        {
          name: "Test User 2",
          chats: [
            {
              from: "0",
              msg: "Chat Testing!!",
            },
            {
              from: "1",
              msg: "Hi",
            },
            {
              from: "0",
              msg: ":')",
            },
          ],
        },
      ],
      selectedUser: 0,
    };
  },
  components: {
    chatBox,
    ActiveUser,
  },
  methods: {
    changeSelectUser(data) {
      this.selectedUser = data;
    },
  },
};
</script>
<style scoped>
/* div.fixed {
  position: fixed;
  width: 100%;
  bottom: 10px;
  /* border: 3px solid #8AC007; 
} */
</style>