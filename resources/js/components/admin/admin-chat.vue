<template>
    <div class="messaging">
        <div class="inbox_msg">
            <div class="mesgs">
                <div class="msg_history" ref="messages">
                    <admin-message v-for="message in messages" :message="message"
                                   :key="'message-'+message.id"></admin-message>
                </div>
                <admin-send-box :chat="chat" @sendMessage="sendMessage"/>
            </div>
        </div>
    </div>
</template>

<script>
import AdminSendBox from "./admin-send-box";
import AdminMessage from "./admin-message";

export default {
    name: "admin-chat",
    components: {AdminMessage, AdminSendBox},
    props: ['chat'],
    data() {
        return {
            messages: [],
        }
    },
    created() {
        this.getMessages();
        Echo.private('chat-' + this.chat).listen('MessageEvent', e => {
            this.messages.push(e.message);
        });
    },
    updated() {
        this.scrollDown();
    },
    methods: {
        scrollDown() {
            var container = this.$refs.messages;
            container.scrollTop = container.scrollHeight;
        },
        getMessages() {
             const res = axios.get('/messages/'+this.chat, {
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              }).then((resp) => {
                  this.messages = resp.data.messages;
                  this.chat_id = resp.data.chat_id;
              }).then((resp) => {
                  this.scrollDown();
              });
        },
        sendMessage(message) {
            this.messages.push(message);
        }
    }
}
</script>

<style scoped>

</style>
