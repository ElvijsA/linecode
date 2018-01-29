<template lang="html">
   <div class="chat-composer">
      <input type="text" placeholder="Start typing your comment..." v-model="commentText" @keyup.enter="sendComment">
      <button class="button" @click="sendComment" >Send</button>
   </div>
</template>

<script>
export default {
   data() {
      return {
          commentText: ''
      }
   },
   methods: {
      sendComment(){
         this.$emit('commentsend', {
            comment: this.commentText,
            user: {
               name: ""
            }
         });
         this.commentText = '';
      }
   }
}
</script>

<style lang="css">
.chat-composer {
   display: flex;
   padding-bottom: 20px;
}
.chat-composer input{
   flex: 1 auto;
   padding: 0.5rem;
}

.chat-composer button{
   border-radius: 0;
}
</style>
