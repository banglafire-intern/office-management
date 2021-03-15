<template>
  <div>
    <div class="container name p-2 mb-3">
      <h5 style="margin: 0px">{{ userList.name }}</h5>
    </div>
    <div class="chats-container">
      <div
        v-for="(chat, i) in userList.chats"
        :key="i"
        class="d-flex p-1"
        :class="{
          'justify-content-start': chat.from == '1',
          'justify-content-end': chat.from == '0',
        }"
      >
        <div
          class="d-inline-flex p-2 bd-highlight"
          style="background-color: #e2d9fa"
        >
          {{ chat.msg }}
        </div>
      </div>

      <!--<div class="d-flex">
        <div
          class="d-inline-flex p-2 bd-highlight"
          style="background-color: #e2d9fa"
        >
          Dummy text 2
        </div>
      </div>-->
    </div>

    <!-- trial  -->

    <div class="card-footer mt-3">
      <div class="input-group">
        <textarea
          class="form-control type_msg"
          placeholder="Type your message..."
          v-model="chat_msg"
        ></textarea>
        <div class="input-group-append">
          <span class="input-group-text send_btn">
            <button type="button" @click="sendMsg" class="btn btn-secondary">
              Send
            </button></span
          >
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["userList"],
  data() {
    return {
      chat_msg: "",
    };
  },
  methods: {
    sendMsg() {
      if (this.chat_msg) {
        this.userList.chats.push({
          from: "0",
          msg: this.chat_msg,
        });
        this.chat_msg = "";
      }
    },
  },
};
</script>

<style scoped>
.name {
  background-color: #ebebeb;
}
.chat {
  background-color: blueviolet;
}
.card-footer {
  border-radius: 0 0 15px 15px !important;
  border-top: 0 !important;
}

.attach_btn {
  border-radius: 15px 0 0 15px !important;
  background-color: rgba(0, 0, 0, 0.3) !important;
  border: 0 !important;
  color: white !important;
  cursor: pointer;
}
.chats-container {
  height: 300px;
  overflow-y: auto;
}
</style>