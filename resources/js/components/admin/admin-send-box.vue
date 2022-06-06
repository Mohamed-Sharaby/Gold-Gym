<template>
    <form class="chat-form no-padding" v-on:submit.prevent="sendMessage" >
        <div class="type_msg">
            <div class="input_msg_write">
                <input type="text" v-model="message" class="write_msg" placeholder="اكتب الرسالة" />
                <input type="submit" value="إرسال" class="btn btn-success">
            </div>
        </div>

    </form>
</template>

<script>
import Swal from "sweetalert2";
export default {
    name: "admin-send-box",
    props:['chat']
    ,data(){
        return {
            message:''
        }
    },
    methods:{
        sendMessage(){
           axios.post('/messages/'+this.chat,{
               message:this.message,
               "_method":'PUT'
           }).then((resp)=>{
             let  data=resp.data;
               console.log(data)
               if (data.status){
                   Swal.fire({
                       text: data.text,
                       icon: 'success',
                       timer:2000,
                   })
                   this.$emit('sendMessage',data.message)

               }else{
                   Swal.fire({
                       text: data.msg,
                       icon: 'error',
                       timer:2000,
                   })
               }
               this.message='';
           })
        }
    }
}
</script>

<style scoped>

</style>
