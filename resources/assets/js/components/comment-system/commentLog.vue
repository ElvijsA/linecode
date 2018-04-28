<template lang="html">
   <div class="chat-log">
      <comment-message v-for="comment in comments" :comment="comment" v-bind:key="comment.text"></comment-message>
      <div class="empty" v-show="comments.length === 0">No Comments Added Yet</div>
   </div>
</template>

<script>
export default {
   props: ['comments']
}
</script>

<style lang="css">
.empty{
   font-size: 0.8rem;
   color: #ccc;
   text-align: center;
   padding: 1rem;
}
</style>
