<template lang="html">
   <div class="message">
      <p>{{ comment.comment }}</p>
      <small>{{ comment.user.name }}</small>
   </div>
</template>

<script>
export default {
   props: ['comment']
}
</script>

<style lang="css">
.message {
   padding: 0.5rem;
}
</style>
