<template>
    <div v-if="message.type=='Admin'" class="outgoing_msg">
        <div class="sent_msg">
            <p>{{ message.message }}</p>
            <span class="time_date"> {{ message.created_at }}</span>
        </div>
    </div>
    <div v-else class="incoming_msg">
        <div v-if="message.sender.name" class="incoming_msg_img"> {{ message.sender.name }}</div>
        <div class="received_msg">
            <div class="received_withd_msg">
                <p>{{ message.message }}</p>
                <span class="time_date">{{ created_at }}</span></div>
        </div>
    </div>

</template>

<script>
import * as dayjs from 'dayjs'

export default {
    name: "admin-message",
    props: {

        message: {
            type: Object,
            required: true
        }
    },
    data() {
        return {}
    },
    created() {
        console.log(this.message)
    },
    computed: {
        created_at: function () {
            return dayjs(this.message.created_at).format('YYYY-MM-DD HH:mm::ss')
        }
    },

}
</script>

<style scoped>

</style>
